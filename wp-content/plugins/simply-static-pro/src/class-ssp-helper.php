<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Util;

/**
 * Class to handle settings for fuse.
 */
class Helper {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Search_Settings.
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
	 * Constructor for Search_Settings.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'add_meta_tags' ) );
		add_action( 'wp_footer', array( $this, 'insert_post_id' ) );
		add_action( 'ss_after_setup_task', array( $this, 'add_configs' ), 99 );
		add_action( 'ss_finished_fetching_pages', array( $this, 'set_index_start_time' ) );
	}

	/**
	 * Add config URL path as meta tag.
	 *
	 * @return void
	 */
	public function add_meta_tags() {
		// Skip adding meta tags?
		$skip_meta = apply_filters( 'ssp_skip_meta', false );

		if ( $skip_meta ) {
			return;
		}

		$options              = get_option( 'simply-static' );
		$comment_endpoint_url = esc_url( untrailingslashit( get_bloginfo( 'url' ) ) . '/wp-comments-post.php' );

		// Check for Basic Auth.
		$http_basic_auth_username = $options['http_basic_auth_username'];
		$http_basic_auth_password = $options['http_basic_auth_password'];

		if ( ! empty( $http_basic_auth_username ) && ! empty( $http_basic_auth_password ) ) {
			$url_parts            = parse_url( $comment_endpoint_url );
			$comment_endpoint_url = $url_parts['scheme'] . '://' . $http_basic_auth_username . ':' . $http_basic_auth_password . '@' . $url_parts['host'];
		}

		// Get the config path.
		$upload_dir = wp_upload_dir();
		$config_dir = apply_filters( 'ssp_config_dir', $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR );

		if ( defined( 'SSP_CONFIG_DIR' ) ) {
			$config_dir = SSP_CONFIG_DIR;
		}

		if ( is_dir( $config_dir ) ) {
			$replace = '';

			if ( ! empty( $options['relative_path'] ) ) {
				$replace = untrailingslashit( $options['relative_path'] );
			}

			// We might have to overwrite base URL based on optimization settings.
			$base_url = untrailingslashit( $upload_dir['baseurl'] );

			if ( ! empty( $options['wp_uploads_directory'] ) && $options['wp_uploads_directory'] !== 'wp-content/uploads' ) {
				$base_url = untrailingslashit( str_replace( 'wp-content/uploads', $options['wp_uploads_directory'], $base_url ) );
			}

			$config_relative_path = apply_filters( 'ssp_config_relative_dir', str_replace( get_site_url(), $replace, $base_url . '/simply-static/configs/' ) );
			?>
			<?php if ( is_dir( $config_dir ) ) : ?>
                <meta name="ssp-config-path" content="<?php echo esc_html( $config_relative_path ); ?>">
			<?php endif; ?>

			<?php if ( isset( $options['use_comments'] ) && $options['use_comments'] ) : ?>
                <meta name="ssp-comment-redirect-url" content="<?php echo esc_url( $options['comment_redirect'] ); ?>">
                <meta name="ssp-comment-endpoint"
                      content="<?php echo base64_encode( $comment_endpoint_url ); ?>">
			<?php endif; ?>
			<?php
		}
	}

	/**
	 * Add post id to each page.
	 *
	 * @return void
	 */
	public function insert_post_id() {
		?>
        <span class="ssp-id" style="display:none"><?php echo esc_html( get_the_id() ); ?></span>
		<?php
	}

	/**
	 * Add configs to static export.
	 *
	 * @return void
	 */
	public function add_configs() {
		$upload_dir = wp_upload_dir();
		$config_dir = apply_filters( 'ssp_config_dir', $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR );


		if ( defined( 'SSP_CONFIG_DIR' ) ) {
			$config_dir = SSP_CONFIG_DIR;
		}

		if ( is_dir( $config_dir ) ) {
			$config_files = scandir( $config_dir );

			foreach ( $config_files as $config_file ) {
				if ( is_file( $config_dir . $config_file ) ) {
					$url = untrailingslashit( $upload_dir['baseurl'] ) . '/simply-static/configs/' . $config_file;
					Simply_Static\Util::debug_log( 'Adding config file to queue: ' . $url );
					$static_page = Simply_Static\Page::query()->find_or_initialize_by( 'url', $url );
					$static_page->set_status_message( __( 'Config File', 'simply-static-pro' ) );
					$static_page->found_on_id = 0;
					$static_page->save();
				}
			}
		}
	}

	/**
	 * Set the start time for the search index.
	 *
	 * @return void
	 */
	public function set_index_start_time() {
		$start = Util::formatted_datetime();
		set_transient( 'ssp_search_index_start_time', $start, DAY_IN_SECONDS );
	}

	/**
	 * Returns the global $wp_filesystem with credentials set.
	 * Returns null in case of any errors.
	 *
	 * @return \WP_Filesystem_Base|null
	 */
	public static function get_file_system() {
		global $wp_filesystem;

		$success = true;

		// Initialize the file system if it has not been done yet.
		if ( ! $wp_filesystem ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';

			$constants = array(
				'hostname'    => 'FTP_HOST',
				'username'    => 'FTP_USER',
				'password'    => 'FTP_PASS',
				'public_key'  => 'FTP_PUBKEY',
				'private_key' => 'FTP_PRIKEY',
			);

			$credentials = array();

			// We provide credentials based on wp-config.php constants.
			// Reference https://developer.wordpress.org/apis/wp-config-php/#wordpress-upgrade-constants
			foreach ( $constants as $key => $constant ) {
				if ( defined( $constant ) ) {
					$credentials[ $key ] = constant( $constant );
				}
			}

			$success = WP_Filesystem( $credentials );
		}

		if ( ! $success || $wp_filesystem->errors->has_errors() ) {
			return null;
		}

		return $wp_filesystem;
	}
}
