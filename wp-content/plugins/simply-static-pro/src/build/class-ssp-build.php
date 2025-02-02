<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Options;
use Simply_Static\Util;

/**
 * Class to handle settings for builds.
 */
class Build {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Build.
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
	 * Constructor for Build.
	 */
	public function __construct() {
		add_filter( 'ss_static_pages', array( $this, 'filter_static_pages' ), 10, 2 );
		add_filter( 'ss_remaining_pages', array( $this, 'filter_remaining_pages' ), 10, 2 );
		add_filter( 'ss_total_pages', array( $this, 'filter_total_pages' ) );
		add_filter( 'ss_export_type', array( $this, 'maybe_apply_build' ) );
		add_action( 'wp_ajax_apply_build', array( $this, 'apply_build' ) );
		add_action( 'wp_ajax_nopriv_apply_build', array( $this, 'apply_build' ) );
		add_action( 'wp_ajax_delete_build', array( $this, 'delete_build' ) );
		add_action( 'wp_ajax_nopriv_delete_build', array( $this, 'delete_build' ) );
		add_filter( 'ss_local_dir', array( $this, 'filter_output_directory' ) );
		add_action( 'ss_after_cleanup', array( $this, 'clear_build' ) );
		add_action( 'simply_static_child_page_found_on_url_before_save', array( $this, 'prepare_static_page' ), 20, 2 );
		 
	}

	/**
	 * Maybe Apply build if the export type is a Build ID.
	 *
	 * @param string|int $type
	 *
	 * @return string
	 */
	public function maybe_apply_build( $type ) {
		if ( 'update' === $type || 'export' === $type ) {
			return $type;
		}

		// IF not 'update' or 'export', it's a build ID.
		$this->prepare_build( $type );

		return 'export';
	}

	/**
	 * Prepare the static page.
	 *
	 * @param object $child_page given child page.
	 * @param object $parent_page given parent page.
	 *
	 * @return void
	 */
	public function prepare_static_page( $child_page, $parent_page ) {
		if ( $child_page->build_id ) {
			return;
		}

		if ( ! $this->is_build_export_running() ) {
			return;
		}

		if ( ! Util::is_local_asset_url( $child_page->url ) ) {
			return;
		}

		if ( ! $this->should_export_assets() ) {
			return;
		}

		$child_page->build_id = $parent_page->build_id;
	}

	/**
	 * Should we also export assets?
	 *
	 * @return bool
	 */
	protected function should_export_assets(): bool {
		$build_id      = get_option( 'simply-static-use-build' );
		$export_assets = get_term_meta( $build_id, 'export-assets', true );

		if ( ! $export_assets || $export_assets !== '1' ) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Is Build running?
	 * @return bool
	 */
	protected function is_build_export_running(): bool {
		$use_build = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Generate build for static export.
	 *
	 * @return void
	 */
	public function apply_build() {
		// check nonce.
		if ( ! wp_verify_nonce( $_POST['nonce'], 'ssp-run-build' ) ) {
			$response = array( 'message' => 'Security check failed.' );
			print wp_json_encode( $response );
			exit;
		}

		$build_id = esc_html( $_POST['term_id'] );

		$this->prepare_build( $build_id );

		// Start static export.
		$ss = Simply_Static\Plugin::instance();
		$ss->run_static_export();

		// Exit now.
		$response = array( 'success' => true );
		print wp_json_encode( $response );
		exit;
	}

	/**
	 * Run Build ID.
	 *
	 * @param int $build_id given Build ID.
	 *
	 * @return void
	 */
	public function prepare_build( $build_id ) {
		// Update option for using a build.
		update_option( 'simply-static-use-build', $build_id );

		// Add URLs.
		self::add_urls( $build_id );
		self::add_files( $build_id );

		do_action( 'ssp_before_run_build' );
	}

	/**
	 * Generate build for static export.
	 *
	 * @return void
	 */
	public function delete_build() {
		// check nonce.
		if ( ! wp_verify_nonce( $_POST['delete_nonce'], 'ssp-delete-build' ) ) {
			$response = array( 'message' => 'Security check failed.' );
			print wp_json_encode( $response );
			exit;
		}

		$build_id   = esc_html( $_POST['term_id'] );
		$options    = get_option( 'simply-static' );
		$origin_url = untrailingslashit( get_bloginfo( 'url' ) );

		// Get all URLs from a build.
		$urls = self::get_deletable_files( $build_id );

		foreach ( $urls as $url ) {
			$delivery_method = $options['delivery_method'];

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
					$sub_directory = $options['cdn-directory'];

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
		}

		// Exit now.
		$response = array( 'success' => true );
		print wp_json_encode( $response );
		exit;
	}

	/**
	 * Get a collection of URLs to delete.
	 *
	 * @param int $build_id added build id.
	 *
	 * @return array deletable URLs.
	 */
	public static function get_deletable_files( int $build_id ): array {
		$urls = apply_filters( 'ssp_build_urls', array_unique( Simply_Static\Util::string_to_array( get_term_meta( $build_id, 'additional-urls', true ) ) ) );

		// Get all posts attached to that term.
		$post_types = get_post_types( array( 'public' => true ) );

		$args = array(
			'post_type'   => $post_types,
			'numberposts' => - 1,
			'fields'      => 'ids',
			'tax_query'   => array(
				array(
					'taxonomy' => 'ssp-build',
					'field'    => 'term_id',
					'terms'    => $build_id
				)
			)
		);

		$posts = get_posts( $args );

		foreach ( $posts as $post_id ) {
			$urls[] = get_permalink( $post_id );
		}

		// Get all files assigned to the build.
		$additional_files = apply_filters( 'ssp_build_files', array_unique( Simply_Static\Util::string_to_array( get_term_meta( $build_id, 'additional-files', true ) ) ) );

		foreach ( $additional_files as $item ) {
			if ( file_exists( $item ) ) {
				if ( is_file( $item ) ) {
					$urls[] = self::convert_path_to_url( $item );
				} else {
					$iterator = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator( $item, \RecursiveDirectoryIterator::SKIP_DOTS ) );
					foreach ( $iterator as $file_name => $file_object ) {
						$urls[] = self::convert_path_to_url( $file_name );
					}
				}
			}
		}

		return $urls;
	}


	/**
	 * Filter additional urls
	 *
	 * @param int $build_id current build id.
	 *
	 * @return void
	 */
	public static function add_urls( int $build_id ) {
		$urls = apply_filters( 'ssp_build_urls', array_unique( Simply_Static\Util::string_to_array( get_term_meta( $build_id, 'additional-urls', true ) ) ) );

		// Return the URLs and done.

		$urls = self::maybe_add_wildcards( $urls );

		// Get all posts attached to that term.
		$post_types = get_post_types( array( 'public' => true ) );

		$args = array(
			'post_type'   => $post_types,
			'numberposts' => - 1,
			'fields'      => 'ids',
			'tax_query'   => array(
				array(
					'taxonomy' => 'ssp-build',
					'field'    => 'term_id',
					'terms'    => $build_id
				)
			)
		);

		$posts = get_posts( $args );

		foreach ( $posts as $post_id ) {
			$urls[] = get_permalink( $post_id );
		}

		foreach ( $urls as $url ) {
			if ( Simply_Static\Util::is_local_url( $url ) ) {
				Simply_Static\Util::debug_log( 'Adding additional URL to queue: ' . $url );
				$static_page = Simply_Static\Page::query()->find_or_initialize_by( 'url', $url );
				$static_page->set_status_message( __( "Additional URL", 'simply-static' ) );
				$static_page->build_id    = $build_id;
				$static_page->found_on_id = 0;
				$static_page->save();
			}
		}
	}

	/**
	 * Maybe Add Wildcards to the URLs.
	 *
	 * @param array $urls given list of URLs.
	 *
	 * @return array
	 */
	public static function maybe_add_wildcards( $urls ) {
		$wildcards_urls = self::find_wilcard_urls( $urls );
		$urls           = array_diff( $urls, $wildcards_urls ); // Leave only non wildcard urls.
		$wildcards      = self::prepare_wildcards( $wildcards_urls );

		/**
		 * Finding slugs (post_name) for each wildcard.
		 */
		foreach ( $wildcards as $index => $wildcard_config ) {

			foreach ( $wildcard_config['wildcards'] as $wildcard_index => $wildcard ) {
				$wildcard['found_slugs']                         = self::find_wildcard_slugs( $wildcard['wildcard'] );
				$wildcard_config['wildcards'][ $wildcard_index ] = $wildcard;
			}

			$wildcards[ $index ] = $wildcard_config;
		}

		/**
		 * Clean the Wildcards so we have only those that will work.
		 */
		$wildcards  = self::clean_wildcards( $wildcards );
		$built_urls = self::build_wildcard_urls( $wildcards ); // Build the URLs, replacing wildcards.

		if ( $built_urls ) {
			$urls = array_merge( $urls, $built_urls );
		}

		return $urls;
	}

	/**
	 * Build Wildcard URLs.
	 *
	 * Concatenate all the URL parts together and replace strings with wildcards with actual post_names (slugs).
	 * If a wildcard has more than 1 slug, it will have more than 1 URL built.
	 *
	 * @param array $wildcard_urls given list of wildcard URLs.
	 *
	 * @return array
	 */
	public static function build_wildcard_urls( $wildcard_urls ) {
		$urls     = [];
		$home_url = home_url( '/' );

		foreach ( $wildcard_urls as $url_index => $wildcards ) {

			$potential_urls = [];
			$url            = $wildcards['url'];
			$clean_url      = str_replace( $home_url, '', $url );
			$url_parts      = explode( '/', $clean_url );

			$last_position = null;

			foreach ( $wildcards['wildcards'] as $wildcard_index => $wildcard ) {
				$found_slugs = $wildcard['found_slugs'];

				// First wildcard, build urls from it.
				if ( $wildcard_index === 0 ) {
					$before_wildcard_url = $home_url;
					if ( $wildcard['url_position'] > 0 ) {
						$before_parts        = array_slice( $url_parts, 0, $wildcard['url_position'] );
						$before_wildcard_url .= implode( '/', $before_parts );
					}

					foreach ( $found_slugs as $slug ) {
						$potential_urls[] = trailingslashit( $before_wildcard_url ) . $slug['post_name'];
					}
				} else {
					$next_position = $last_position + 1;
					$before_slug   = [];
					if ( $next_position < $wildcard['url_position'] ) {
						$before_slug = array_slice( $url_parts, $next_position, $wildcard['url_position'] );
					}
					$before_slug_url    = ! empty( $before_slug ) ? implode( '/', $before_slug ) : '';
					$new_potential_urls = [];

					foreach ( $found_slugs as $slug ) {
						foreach ( $potential_urls as $potential_url ) {
							$new_potential_urls[] = trailingslashit( $potential_url ) . $before_slug_url . $slug['post_name'];
						}
					}

					$potential_urls = $new_potential_urls;
				}


				$last_position = $wildcard['url_position'];
			}

			if ( $last_position < ( count( $url_parts ) - 1 ) ) {
				$left_slugs     = array_slice( $url_parts, $last_position + 1 );
				$left_slugs     = implode( '/', $left_slugs );
				$potential_urls = array_map( function ( $item ) use ( $left_slugs ) {
					return trailingslashit( $item ) . $left_slugs;
				}, $potential_urls );
			}

			/**
			 * @todo
			 * if find children is true, fetch by last slug the page ID and build more urls.
			 */

			$urls = array_merge( $urls, $potential_urls );
		}

		return $urls;
	}


	/**
	 * Clean Wildcards.
	 * If a wildcard is a child element in URL, remove all found slugs that are not.
	 * In case there are no slugs remaining, remove the wildcard completely.
	 *
	 * @param array $wildcard_urls given list of wildcard URLs.
	 *
	 * @return array
	 */
	public static function clean_wildcards( $wildcard_urls ) {

		$cleaned_wildcards = [];
		foreach ( $wildcard_urls as $url_index => $wildcards ) {
			$exists = true;

			foreach ( $wildcards['wildcards'] as $wildcard_index => $wildcard ) {

				$found_slugs = $wildcard['found_slugs'];

				if ( $wildcard['has_parent'] ) {
					$found_slugs = array_filter( $found_slugs, function ( $item ) {
						return absint( $item['post_parent'] ) > 0;
					} );
				}

				// No slugs with parents, not a wildcard url we can build.
				if ( empty( $found_slugs ) ) {
					$exists = false;
					break;
				}

				$wildcard['found_slugs']      = $found_slugs;
				$wildcards[ $wildcard_index ] = $wildcard;
			}

			if ( ! $exists ) {
				continue;
			}

			$cleaned_wildcards[] = $wildcards;
		}

		return $cleaned_wildcards;
	}

	/**
	 * Find all slugs (post_name) for a wilecard.
	 *
	 * @param string $wildcard The string containing the wildcard. Example: sample-page-*.
	 *
	 * @return array|object|\stdClass[]|null
	 */
	public static function find_wildcard_slugs( $wildcard ) {
		global $wpdb;

		$prepared_wildcard = str_replace( '*', '%', $wildcard );

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT 
    					ID,post_type,post_name,post_parent 
						FROM {$wpdb->posts} 
						WHERE post_name 
			          	LIKE %s",
				$prepared_wildcard
			),
			ARRAY_A
		);
	}

	/**
	 * Prepare Wildcards.
	 *
	 * @param array $urls given URLs.
	 *
	 * @return array {
	 * @type string $url Wildcard URL.
	 * @type bool $find_children Flag if we should search for children or not. @todo
	 * @type array $wildcards {
	 *              Array of all wildcards. Each wildcard:
	 *
	 * @type string $wildcard The string with the wildcard.
	 * @type integer $position Position where the wildcard is found.
	 * @type integer $url_position Which part of URL is it in (after URL transformed into array)
	 * @type array $found_slugs An array of slugs (post_name) found for this wildcard.
	 * @type boolean $has_parent Flag if such wildcard is a child inside the URL.
	 *      }
	 * }
	 */
	public static function prepare_wildcards( $urls ) {
		$home_url      = home_url( '/' );
		$wildcard_urls = [];
		foreach ( $urls as $url ) {
			$clean_url     = str_replace( $home_url, '', $url );
			$url_parts     = explode( '/', $clean_url );
			$wildcards     = [];
			$count_parts   = count( $url_parts );
			$find_children = false;

			foreach ( $url_parts as $partIndex => $part ) {
				$position = strpos( $part, '*' );
				if ( $position !== false ) {
					$wildcards[] = [
						'wildcard'     => $part,
						'position'     => $position,
						'url_position' => $partIndex,
						'found_slugs'  => [],
						'has_parent'   => $partIndex > 0

					];

					if ( $count_parts === ( $partIndex + 1 ) && $position === ( strlen( $part ) - 1 ) ) {
						// Last part is a wildcard one without end, means we need to find children as well
						// example: url.com/some/page-* - we look for children as well
						// example: url.com/some/*-page - we don't look for children here
						$find_children = true;
					}
				}
			}

			$wildcard_urls[] = [
				'url'           => $url,
				'find_children' => $find_children,
				'wildcards'     => $wildcards
			];
		}

		return $wildcard_urls;
	}

	/**
	 * A recursive method to get all children pages for a Page ID.
	 *
	 * @param integer $parent_id Parent ID.
	 * @param array   $children list of children pages.
	 *
	 * @return array|array[]|int[]|\WP_Post[]
	 */
	public static function get_children( $parent_id, $children = [] ) {
		$_children = array_values( get_children( $parent_id, ARRAY_A ) );
		if ( empty( $_children ) ) {
			return $children;
		}

		foreach ( $_children as $index => $child_page ) {
			$_children[ $index ]['children'] = self::get_children( $child_page['ID'] );
		}

		return array_merge( $children, $_children );
	}

	/**
	 * Find URLs that are wildcards. Such URLs contain the '*' inside the URL.
	 *
	 * @param array $urls Array of URLs.
	 *
	 * @return array
	 */
	public static function find_wilcard_urls( $urls ) {
		$wildcards = [];
		$home_url  = home_url( '/' );
		foreach ( $urls as $url ) {
			$clean_url = str_replace( $home_url, '', $url );

			// The wildcard is somewhere in the url path.
			if ( strpos( $clean_url, '*' ) !== false ) {
				$wildcards[] = $url;
			}
		}

		return $wildcards;
	}


	/**
	 * Convert Additional Files/Directories to URLs and add them to the database.
	 *
	 * @param int $build_id current build id.
	 *
	 * @return void
	 */
	public static function add_files( $build_id ) {
		$additional_files = apply_filters( 'ssp_build_files', array_unique( Simply_Static\Util::string_to_array( get_term_meta( $build_id, 'additional-files', true ) ) ) );

		// Convert additional files to URLs and add to queue.
		foreach ( $additional_files as $item ) {
			if ( file_exists( $item ) ) {
				if ( is_file( $item ) ) {
					$url = self::convert_path_to_url( $item );

					Simply_Static\Util::debug_log( "File " . $item . ' exists; adding to queue as: ' . $url );

					$static_page = Simply_Static\Page::query()->find_or_create_by( 'url', $url );
					$static_page->set_status_message( __( "Additional File", 'simply-static' ) );
					$static_page->build_id    = $build_id;
					$static_page->found_on_id = 0;
					$static_page->save();
				} else {
					Simply_Static\Util::debug_log( "Adding files from directory: " . $item );
					$iterator = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator( $item, \RecursiveDirectoryIterator::SKIP_DOTS ) );

					foreach ( $iterator as $file_name => $file_object ) {
						$url = self::convert_path_to_url( $file_name );

						Simply_Static\Util::debug_log( "Adding file " . $file_name . ' to queue as: ' . $url );

						$static_page = Simply_Static\Page::query()->find_or_initialize_by( 'url', $url );
						$static_page->set_status_message( __( "Additional Dir", 'simply-static' ) );
						$static_page->build_id    = $build_id;
						$static_page->found_on_id = 0;
						$static_page->save();
					}
				}
			} else {
				Simply_Static\Util::debug_log( "File doesn't exist: " . $item );
			}
		}
	}

	/**
	 * Convert a directory path into a valid WordPress URL
	 *
	 * @param string $path The path to a directory or a file.
	 *
	 * @return string       The WordPress URL for the given path.
	 */
	public static function convert_path_to_url( $path ): string {
		$url = $path;
		if ( stripos( $path, WP_PLUGIN_DIR ) === 0 ) {
			$url = str_replace( WP_PLUGIN_DIR, WP_PLUGIN_URL, $path );
		} elseif ( stripos( $path, WP_CONTENT_DIR ) === 0 ) {
			$url = str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, $path );
		} elseif ( stripos( $path, get_home_path() ) === 0 ) {
			$url = str_replace( untrailingslashit( get_home_path() ), Util::origin_url(), $path );
		}

		return $url;
	}

	/**
	 * Clear selected build after export.
	 *
	 * @return void
	 */
	public function clear_build() {
		delete_option( 'simply-static-use-build' );
	}

	/**
	 * Filter the local output directory.
	 *
	 * @param string $local_directory local dir as string.
	 *
	 * @return string
	 */
	public function filter_output_directory( $local_directory ) {
		$use_build = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) ) {
			return $local_directory;
		}

		$build_id  = intval( $use_build );
		$directory = get_term_meta( $build_id, 'export-directory', true );

		if ( ! empty( $directory ) ) {
			return $directory;
		}

		return $local_directory;
	}

	/**
	 * Filter static pages.
	 *
	 * @param array $results results from database.
	 * @param array $archive_start_time timestamp.
	 *
	 * @return array
	 */
	public function filter_static_pages( $results, $archive_start_time ) {
		$batch_size = apply_filters( 'simply_static_fetch_urls_batch_size', 10 );
		$use_build  = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) ) {
			return $results;
		}

		$build_id = intval( $use_build );

		return Simply_Static\Page::query()
		                         ->where( 'last_checked_at < ? AND build_id = ?', $archive_start_time, $build_id )
		                         ->limit( $batch_size )
		                         ->find();
	}

	/**
	 * Filter remaining pages.
	 *
	 * @param array $results results from database.
	 * @param array $archive_start_time timestamp.
	 *
	 * @return array
	 */
	public function filter_remaining_pages( $results, $archive_start_time ) {
		$use_build = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) ) {
			return $results;
		}

		$build_id = intval( $use_build );

		return Simply_Static\Page::query()
		                         ->where( 'last_checked_at < ? AND build_id = ?', $archive_start_time, $build_id )
		                         ->count();
	}

	/**
	 * Filter total pages.
	 *
	 * @param array $results results from database.
	 *
	 * @return array
	 */
	public function filter_total_pages( $results ) {
		$use_build = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) ) {
			return $results;
		}

		$build_id = intval( $use_build );

		return Simply_Static\Page::query()
		                         ->where( 'build_id = ?', $build_id )
		                         ->count();
	}
}
