<?php

namespace simply_static_pro;

use Algolia\AlgoliaSearch\SearchClient;
use Exception;
use Simply_Static\Page;
use Simply_Static\Plugin;
use Simply_Static\Options;
use Simply_Static\Url_Fetcher;
use Simply_Static\Util;
use voku\helper\HtmlDomParser;

/**
 * Class to handle settings for single.
 */
class Single {

	protected $export_assets = null;

	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Single.
	 *
	 * @return object
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor for Single.
	 */
	public function __construct() {
		add_action( 'simply_static_schedule_single_export', array( $this, 'run_scheduled_single_export' ) );
		add_action( 'save_post', array( $this, 'schedule_single_export' ) );
		add_action( 'elementor/editor/after_save', array( $this, 'schedule_single_export' ) );
		add_action( 'publish_future_post', array( $this, 'schedule_future_single_export' ) );
		add_filter( 'ss_static_pages', array( $this, 'filter_static_pages' ), 10, 2 );
		add_filter( 'ss_remaining_pages', array( $this, 'filter_remaining_pages' ), 10, 2 );
		add_filter( 'ss_total_pages', array( $this, 'filter_total_pages' ) );
		add_action( 'wp_ajax_apply_single', array( $this, 'apply_single' ) );
		add_action( 'wp_ajax_delete_single', array( $this, 'delete_single' ) );
		add_action( 'ss_after_cleanup', array( $this, 'clear_single' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ) );
		add_action( 'simply_static_child_page_found_on_url_before_save', array( $this, 'prepare_static_page' ), 20, 2 );
		add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );
	}

	public function rest_api_init() {

		register_rest_route( 'simplystatic/v1', '/apply-single', array(
			'methods'             => 'POST',
			'callback'            => [ $this, 'maybe_apply_single' ],
			'permission_callback' => function () {
				return current_user_can( apply_filters( 'ss_user_capability', 'manage_options', 'settings' ) );
			},
		) );
	}

	public function maybe_apply_single() {

		$homepage = get_option( 'page_on_front' );

		if ( ! $homepage ) {
			return json_encode( [ 'status' => 404, 'message' => __( 'Please select a homepage under WordPress Settings > Reading' ) ] );
		}

		$this->prepare_single_export( $homepage, false );

		// Start static export.
		$ss = Plugin::instance();
		$ss->run_static_export();

		// Exit now.
		$response = array( 'success' => true );
		print wp_json_encode( $response );
		exit;
	}

	public function schedule_single_export( $post_id ) {
		// Check if auto export is enabled.
		$auto_export = apply_filters( 'ssp_single_auto_export', false );

		if ( ! $auto_export ) {
			return;
		}

		// Don't schedule if we are on the post lists view.
		if ( isset( $_REQUEST['post_view'] ) && 'list' === $_REQUEST['post_view'] ) {
			return;
		}

		// Prevent schedule export if auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! wp_next_scheduled( 'simply_static_schedule_single_export' ) ) {
			wp_schedule_single_event( time(), 'simply_static_schedule_single_export', array( $post_id ) );
		}
	}

	public function schedule_future_single_export( $post_id ) {
		// Don't schedule if we are on the post lists view.
		if ( isset( $_REQUEST['post_view'] ) && 'list' === $_REQUEST['post_view'] ) {
			return;
		}

		// Prevent schedule export if auto save.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! wp_next_scheduled( 'simply_static_schedule_single_export' ) ) {
			wp_schedule_single_event( time(), 'simply_static_schedule_single_export', array( $post_id ) );
		}
	}

	/**
	 * Prepare static page.
	 *
	 * @param object $child_page given child page.
	 * @param object $parent_page given parent page.
	 *
	 * @return void
	 */
	public function prepare_static_page( $child_page, $parent_page ) {
		if ( $child_page->post_id ) {
			return;
		}

		if ( ! $this->is_single_export_running() ) {
			return;
		}

		if ( ! Util::is_local_asset_url( $child_page->url ) ) {
			return;
		}

		if ( ! $this->should_export_assets() ) {
			return;
		}

		$child_page->post_id = $parent_page->post_id;
	}

	/**
	 * Is Single Export Running?
	 *
	 * @return bool
	 */
	protected function is_single_export_running(): bool {
		$use_single = get_option( 'simply-static-use-single' );

		if ( empty( $use_single ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Should we also export assets?
	 *
	 * @return bool
	 */
	protected function should_export_assets(): bool {
		if ( $this->export_assets === null ) {
			$option = get_option( 'simply-static-single-export-assets' );
			if ( ! $option ) {
				$this->export_assets = false;
			} else {
				$this->export_assets = $option === '1';
			}
		}

		return $this->export_assets;
	}

	/**
	 * Automatically run a static export after post is saved.
	 *
	 * @param int $post_id given post id.
	 *
	 * @return void
	 */
	public function run_scheduled_single_export( int $post_id ) {
		$current_status = get_post_status( $post_id );

		if ( apply_filters( 'ssp_auto_export_status', 'publish' ) === $current_status ) {
			$additional_urls = apply_filters( 'ssp_single_export_additional_urls', array_merge( $this->get_related_urls( $post_id ), $this->get_related_attachments( $post_id ) ) );

			// Update option for using a single post.
			update_option( 'simply-static-use-single', $post_id );

			// Add URls for static export.
			$this->add_url( $post_id );
			$this->add_additional_urls( $additional_urls, $post_id );

			do_action( 'sch_before_run_single' );

			// Start static export.
			$ss = Plugin::instance();
			$ss->run_static_export();
		}
	}

	/**
	 * Enqueue scripts in WordPress.
	 *
	 * @return void
	 */
	public function add_admin_scripts( $hook ) {
		$allowed_hooks = [
			'post.php',
			'post-new.php'
		];

		if ( ! in_array( $hook, $allowed_hooks, true ) ) {
			return;
		}

		wp_enqueue_script( 'ssp-single-admin', SIMPLY_STATIC_PRO_URL . '/assets/ssp-single-admin.js', array( 'jquery' ), SIMPLY_STATIC_PRO_VERSION, true );

		wp_localize_script(
			'ssp-single-admin',
			'ssp_single_ajax',
			array(
				'ajax_url'     => admin_url() . 'admin-ajax.php',
				'single_nonce' => wp_create_nonce( 'ssp-single' ),
				'redirect_url' => admin_url() . 'admin.php?page=simply-static',
				'rest_nonce'   => wp_create_nonce( 'wp_rest' )
			)
		);
	}

	/**
	 * Generate single for static export.
	 *
	 * @return void
	 */
	public function apply_single() {
		// check nonce.
		if ( ! wp_verify_nonce( $_POST['nonce'], 'ssp-single' ) ) {
			$response = array( 'message' => 'Security check failed.' );
			print wp_json_encode( $response );
			exit;
		}

		// Check for single id.
		if ( empty( $_POST['single_id'] ) ) {
			$response = array( 'success' => false );
			print wp_json_encode( $response );
			exit;
		}

		$single_id = esc_html( $_POST['single_id'] );
		$assets    = isset( $_POST['assets'] ) && absint( $_POST['assets'] ) === 1;


		$this->prepare_single_export( $single_id, $assets );

		// Start static export.
		$ss = Plugin::instance();
		$ss->run_static_export();

		// Exit now.
		$response = array( 'success' => true );
		print wp_json_encode( $response );
		exit;
	}

	/**
	 * Prepare single exports by including additional URLs and files.
	 *
	 * @param int $single_id given post id.
	 *
	 * @return void
	 */
	public function prepare_single_export( int $single_id, bool $assets ) {
		$additional_urls = apply_filters( 'ssp_single_export_additional_urls', array_merge( $this->get_related_urls( $single_id ), $this->get_related_attachments( $single_id ), SS_Multilingual::get_related_translations( $single_id ) ) );

		// Update option for using a single post.
		update_option( 'simply-static-use-single', $single_id );
		update_option( 'simply-static-single-export-assets', $assets ? '1' : '0' );

		// Add URls for static export.
		$this->add_url( $single_id );
		$this->add_additional_urls( $additional_urls, $single_id );

		do_action( 'ssp_before_run_single' );
	}

	/**
	 * Get related URls to include in single export.
	 *
	 * @param int $single_id single post id.
	 *
	 * @return array
	 */
	public function get_related_urls( int $single_id ): array {
		$related_urls = array();

		// Skip related URLs?
		$skip_related_urls = apply_filters( 'ssp_skip_single_related_urls', false );

		if ( $skip_related_urls ) {
			return $related_urls;
		}

		// Get category URLs.
		$categories = get_the_terms( $single_id, 'category' );

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$related_urls[] = get_term_link( $category );
			}
		}

		// Get tag URLs.
		$tags = get_the_terms( $single_id, 'post_tag' );

		if ( ! empty( $tags ) ) {
			foreach ( $tags as $tag ) {
				$related_urls[] = get_term_link( $tag );
			}
		}

		// Add blog page.
		$blog_id        = get_option( 'page_for_posts' );
		$related_urls[] = get_permalink( $blog_id );

		// Add frontpage.
		$front_id       = get_option( 'page_on_front' );
		$related_urls[] = get_permalink( $front_id );

		// Get archive URL.
		$post_type      = get_post_type( $single_id );
		$related_urls[] = get_post_type_archive_link( $post_type );

		// Get RSS Feed URLs.
		$related_urls[] = get_bloginfo( 'rss2_url' );
		$related_urls[] = get_bloginfo( 'atom_url' );
		$related_urls[] = get_bloginfo( 'rss_url' );
		$related_urls[] = get_bloginfo( 'rdf_url' );

		return $related_urls;
	}

	/**
	 * Get related URls to include in single export.
	 *
	 * @param int $single_id single post id.
	 *
	 * @return array
	 */
	public function get_related_attachments( int $single_id ): array {
		$related_files = array();

		// Get all images from that post.
		$response = Url_Fetcher::remote_get( get_permalink( $single_id ) );

		if ( ! is_wp_error( $response ) ) {
			$dom = HtmlDomParser::str_get_html( wp_remote_retrieve_body( $response ) );

			foreach ( $dom->find( 'img' ) as $img ) {
				$related_files[] = $img->getAttribute( 'src' );
				$related_files[] = $img->getAttribute( 'srcset' );
			}
		}

		return $related_files;
	}

	/**
	 * Add single URL.
	 *
	 * @param int $single_id current single id.
	 *
	 * @return void
	 */
	public function add_url( int $single_id ) {
		// Add URL.
		$url = get_permalink( $single_id );

		if ( Util::is_local_url( $url ) ) {
			Util::debug_log( 'Adding related URL to queue: ' . $url );
			$static_page = Page::query()->find_or_initialize_by( 'url', $url );
			$static_page->set_status_message( __( 'Related URL', 'simply-static' ) );
			$static_page->post_id     = $single_id;
			$static_page->found_on_id = 0;
			$static_page->save();
		}
	}

	/**
	 * Ensure the user-specified Additional URLs are in the DB.
	 *
	 * @param array $additional_urls array of additional urls.
	 * @param int $single_id Given single id.
	 *
	 * @return void
	 */
	public function add_additional_urls( array $additional_urls, int $single_id ) {
		foreach ( $additional_urls as $url ) {
			if ( Util::is_local_url( $url ) ) {
				Util::debug_log( 'Adding additional URL to queue: ' . $url );
				$static_page = Page::query()->find_or_initialize_by( 'url', $url );
				$static_page->set_status_message( __( 'Additional URL', 'simply-static' ) );
				$static_page->found_on_id = $single_id;
				$static_page->post_id     = $single_id;
				$static_page->save();
			}
		}
	}

	/**
	 * Update related URLs for a single post.
	 *
	 * @param int $single_id post id.
	 *
	 * @return void
	 */
	public function update_related_urls( int $single_id ) {
		// set post to draft to exclude it from related URLs.
		wp_update_post( array( 'ID' => $single_id, 'post_status' => 'draft' ) );

		$related_urls = array_merge( $this->get_related_urls( $single_id ), SS_Multilingual::get_related_translations( $single_id ) );

		// Update option for using a single post.
		update_option( 'simply-static-use-single', $single_id );

		// Add URls for static export.
		$this->add_additional_urls( $related_urls, $single_id );

		// Start static export.
		$ss = Plugin::instance();
		$ss->run_static_export();
	}

	/**
	 * Clear selected single after export.
	 *
	 * @return void
	 */
	public function clear_single() {
		delete_option( 'simply-static-use-single' );
		delete_option( 'simply-static-single-export-assets' );
	}

	/**
	 * Filter static pages.
	 *
	 * @param array $results Results from database.
	 * @param string $archive_start_time timestamp.
	 *
	 * @return array
	 * @throws Exception Throws exception.
	 */
	public function filter_static_pages( $results, string $archive_start_time ) {
		$batch_size = apply_filters( 'simply_static_fetch_urls_batch_size', 500 );
		$use_single = get_option( 'simply-static-use-single' );

		if ( empty( $use_single ) ) {
			return $results;
		}

		$post_id = intval( $use_single );

		return Page::query()
		           ->where( 'last_checked_at < ? AND post_id = ?', $archive_start_time, $post_id )
		           ->limit( $batch_size )
		           ->find();
	}

	/**
	 * Filter remaining pages.
	 *
	 * @param array $results Results from database.
	 * @param string $archive_start_time timestamp.
	 *
	 * @return int|array
	 * @throws Exception Throws exception.
	 */
	public function filter_remaining_pages( $results, string $archive_start_time ) {
		$use_single = get_option( 'simply-static-use-single' );

		if ( empty( $use_single ) ) {
			return $results;
		}

		$post_id = intval( $use_single );

		return Page::query()
		           ->where( 'last_checked_at < ? AND post_id = ?', $archive_start_time, $post_id )
		           ->count();
	}


	/**
	 * Filter total pages.
	 *
	 * @param array $results Results from the database.
	 *
	 * @return int|array
	 * @throws Exception Throws exception.
	 */
	public function filter_total_pages( $results ) {
		$use_single = get_option( 'simply-static-use-single' );

		if ( empty( $use_single ) ) {
			return $results;
		}

		$post_id = intval( $use_single );

		return Page::query()
		           ->where( 'post_id = ?', $post_id )
		           ->count();
	}

	/**
	 * Delete file.
	 *
	 * @return void
	 */
	public function delete_single() {
		// check nonce.
		if ( ! wp_verify_nonce( $_POST['nonce'], 'ssp-single' ) ) {
			$response = array( 'message' => 'Security check failed.' );
			print wp_json_encode( $response );
			exit;
		}

		// Check for single id.
		if ( empty( $_POST['single_id'] ) ) {
			$response = array( 'success' => false );
			print wp_json_encode( $response );
			exit;
		}

		$single_id   = intval( $_POST['single_id'] );
		$options     = get_option( 'simply-static' );
		$use_search  = $options['use_search'] ?? false;
		$search_type = $options['search_type'] ?? 'fuse';
		$url         = get_permalink( $single_id );

		// Delete search results.
		if ( $use_search && $search_type === 'algolia' ) {
			if ( isset( $options['algolia_app_id'] ) && ! empty( $options['algolia_app_id'] ) && isset( $options['algolia_admin_api_key'] ) && ! empty( $options['algolia_admin_api_key'] ) ) {
				$client = SearchClient::create( $options['algolia_app_id'], $options['algolia_admin_api_key'] );
				$index  = $client->initIndex( $options['algolia_index'] );

				// Now we can delete the search result.
				$index->deleteObject( $single_id );
			}
		}

		// Check delivery method.
		$delivery_method = $options['delivery_method'];
		$origin_url      = untrailingslashit( get_bloginfo( 'url' ) );

		switch ( $delivery_method ) {
			case 'local':
				$relative_path = $options['local_dir'];

				// Build the path to delete.
				$path = untrailingslashit( $relative_path ) . str_replace( $origin_url, '', $url );

				// Delete direcory of file.
				if ( is_dir( $path ) ) {
					$filesystem = Helper::get_file_system();
					$filesystem->rmdir( $path, true );
				} else {
					// Delete directory.
					if ( file_exists( $path ) ) {
						wp_delete_file( $path, true );
					}
				}
				break;
			case 'github':
				// Build the path to delete.
				$path   = str_replace( $origin_url, '', $url );
				$path   = substr( $path, 1 );
				$github = Github_Repository::get_instance();

				// If path contains a . it's a file otherwise it's a directory.
				$is_file = strpos( $path, '.' );

				if ( false !== $is_file ) {
					$github->delete_file( $path, __( 'Deleted file on path', 'simply-static-pro' ) );
				} else {
					// We need to enhance the path with index.html.
					$index_path = $path . 'index.html';
					$github->delete_file( $index_path, __( 'Deleted file on path', 'simply-static-pro' ) );

					// We may also need to remove the RSS Feed.
					$feed_path = $path . 'feed/index.xml';
					$github->delete_file( $feed_path, __( 'Deleted file on path', 'simply-static-pro' ) );
				}
				break;
			case 'cdn':
				$sub_directory = $options['cdn_directory'];

				// Subdirectory or not?
				if ( ! empty( $sub_directory ) ) {
					$path = untrailingslashit( $sub_directory ) . str_replace( $origin_url, '', $url );
				} else {
					$path = str_replace( $origin_url, '', $url );
				}

				// Delete the file path.
				$bunny   = Bunny_Updater::get_instance();
				$deleted = $bunny->delete_file( $path );

				if ( ! $deleted ) {
					$response = array(
						'success' => false,
						'error'   => esc_html__( 'The file could not be deleted. Please check your access key in Simply Static -> Settings -> Deployment', 'simply-static-pro' ),
					);

					print wp_json_encode( $response );
					exit;
				}

				break;
			case 'aws-s3':
				$path = str_replace( $origin_url, '', $url );
				$file = trim( $path, '/' ) . '/index.html';

				$options    = Options::instance();
				$bucket     = $options->get( 'aws_bucket' );
				$api_secret = $options->get( 'aws_access_secret' );
				$api_key    = $options->get( 'aws_access_key' );
				$region     = $options->get( 'aws_region' );

				$client = new S3_Client();
				$client->set_bucket( $bucket )
				       ->set_api_secret( $api_secret )
				       ->set_api_key( $api_key )
				       ->set_region( $region );

				Util::debug_log( "Deleting file '{$file}' from S3..." );
				$result = $client->delete_file( $file );
				if ( $result ) {
					Util::debug_log( sprintf( 'Done. Statuscode: %s.',
							$result['@metadata']['statusCode'] ?? 0 )
					);
				}
				break;
		}

		// Run static single export to update blog/homepage and cat/tag pages.
		$this->update_related_urls( $single_id );

		do_action( 'ssp_after_delete_single' );

		// Exit now.
		$response = array( 'success' => true );
		print wp_json_encode( $response );
		exit;
	}
}
