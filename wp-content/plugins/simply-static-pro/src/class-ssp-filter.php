<?php

namespace simply_static_pro;

use MyThemeShop\Admin\Page;
use Simply_Static;

/**
 * Class to handle settings for fuse.
 */
class Filter {
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
		add_filter( 'ss_settings_args', array( $this, 'modify_settings_args' ) );
		add_filter( 'simplystatic.archive_creation_job.task_list', array( $this, 'modify_task_list' ), 20, 2 );
		add_filter( 'simply_static_class_name', array( $this, 'check_class_name' ), 10, 2 );
		add_filter( 'simply_static_converted_url', array( $this, 'change_url' ), 20, 2 );
		add_filter( 'simply_static_decoded_text_in_script', array( $this, 'change_url' ), 20, 2 );
		add_filter( 'simply_static_decoded_urls_in_script', array( $this, 'change_url' ), 20, 2 );
		add_filter( 'simply_static_force_replaced_urls_body', array( $this, 'change_url' ), 20, 2 );
		add_filter( 'ss_get_page_file_path_for_transfer', array( $this, 'change_path_for_transfer' ), 20, 2 );
		add_filter( 'simply_static_content_before_save', array( $this, 'run_body_content_optimization' ), PHP_INT_MAX, 2 );
		add_action( 'simply_static_page_handler_request_after_hooks', array( $this, 'run_optimization' ) );
	}

	/**
	 * Change File Path to apply optimizations.
	 *
	 * @param string $url File path.
	 * @param Simply_Static\Page $page Page object.
	 *
	 * @return array|mixed|string|string[]
	 */
	public function change_path_for_transfer( $url, $page ) {
		$url = '/' . $url; // Adding '/' as this is file path without it. Need it for regex to work.
		$url = $this->change_url( $url, $page );
		if ( 0 === stripos( $url, '/' ) ) {
			$url = substr( $url, 1 );
		}

		return $url;
	}

	/**
	 * Remove the comments from source code
	 *
	 * @param $m
	 *
	 * @return string
	 */
	public function _commentRemove( $m ) {
		return ( 0 === strpos( $m[1], '[' ) || false !== strpos( $m[1], '<![' ) )
			? $m[0]
			: '';
	}

	/**
	 *
	 * @param string $content Content.
	 * @param Simply_Static\Url_Extractor $extractor Extractor.
	 *
	 * @return string
	 */
	public function run_body_content_optimization( $content, $extractor ) {
		$options = Simply_Static\Options::instance();
		$find    = [];
		$replace = [];

		if ( $options->get( 'hide_comments' ) ) {
			$content = preg_replace_callback( '/<!--([\\s\\S]*?)-->/', array( $this, '_commentRemove' ), $content );
		}

		if ( $options->get( 'hide_version' ) ) {
			$find[]    = '/(\?|\&#038;|\&)ver=[0-9a-zA-Z\.\_\-\+]+(\&#038;|\&)/';
			$replace[] = '$1';

			$find[]    = '/(\?|\&#038;|\&)ver=[0-9a-zA-Z\.\_\-\+]+("|\')/';
			$replace[] = '$2';
		}

		//Remove the Generator link.
		if ( $options->get( 'hide_generator' ) ) {
			$find[]    = '/<meta[^>]*name=[\'"]generator[\'"][^>]*>/i';
			$replace[] = '';
		}

		//Remove WP prefetch domains that reveal the CMS.
		if ( $options->get( 'hide_prefetch' ) ) {
			$find[]    = '/<link[^>]*rel=[\'"]dns-prefetch[\'"][^>]*w.org[^>]*>/i';
			$replace[] = '';

			$find[]    = '/<link[^>]*rel=[\'"]dns-prefetch[\'"][^>]*wp.org[^>]*>/i';
			$replace[] = '';

			$find[]    = '/<link[^>]*rel=[\'"]dns-prefetch[\'"][^>]*wordpress.org[^>]*>/i';
			$replace[] = '';
		}

		if ( $options->get( 'hide_style_id' ) ) {
			$find[]    = '/(<link[^>]*rel=[^>]+)[\s]id=[\'"][0-9a-zA-Z._-]+[\'"]([^>]*>)/i';
			$replace[] = '$1 $2';

			$find[]    = '/(<style[^>]*)[\s]id=[\'"][0-9a-zA-Z._-]+[\'"]([^>]*>)/i';
			$replace[] = '$1 $2';

			$find[]    = '/(<script[^>]*)[\s]id=[\'"][0-9a-zA-Z._-]+[\'"]([^>]*>)/i';
			$replace[] = '$1 $2';
		}

		if ( $options->get( 'disable_xmlrpc' ) ) {
			$find[]    = '/(<link[\s])rel=[\'"]pingback[\'"][\s]([^>]+>)/i';
			$replace[] = '';
		}

		if ( empty( $find ) ) {
			return $content;
		}

		$content = preg_replace( $find, $replace, $content );


		return $content;
	}

	/**
	 * Run optimizations on each page.
	 *
	 * @param Simply_Static\Page_Handler $handler Object.
	 *
	 * @return void
	 */
	public function run_optimization( $handler ) {
		$options = Simply_Static\Options::instance();

		if ( $options->get( 'hide_rest_api' ) ) {
			remove_action( 'wp_head', 'rest_output_link_wp_head' );
			remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		}

		if ( $options->get( 'hide_rsd' ) ) {
			remove_action( 'wp_head', 'rsd_link' );
			remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		}

		if ( $options->get( 'hide_emotes' ) ) {
			add_filter( 'emoji_svg_url', '__return_false' );
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			add_filter( 'wp_resource_hints', [ $this, 'disable_emojis_remove_dns_prefetch' ], 10, 2 );
		}

		if ( $options->get( 'disable_xmlrpc' ) ) {
			add_filter( 'xmlrpc_enabled', '__return_false' );
		}

		if ( $options->get( 'disable_embed' ) ) {
			// Remove the REST API endpoint.
			remove_action( 'rest_api_init', 'wp_oembed_register_route' );

			// Turn off oEmbed auto discovery.
			// Don't filter oEmbed results.
			remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result' );

			// Remove oEmbed discovery links.
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

			// Remove oEmbed-specific JavaScript from the front-end and back-end.
			remove_action( 'wp_head', 'wp_oembed_add_host_js' );
		}

		if ( $options->get( 'disable_db_debug' ) ) {
			global $wpdb;
			$wpdb->hide_errors();
		}

		if ( $options->get( 'disable_wlw_manifest' ) ) {
			remove_action( 'wp_head', 'wlwmanifest_link' );
		}

	}

	public function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
		if ( 'dns-prefetch' == $relation_type ) {
			/** This filter is documented in wp-includes/formatting.php */
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

			$urls = array_diff( $urls, array( $emoji_svg_url ) );
		}

		return $urls;
	}

	public function change_url( $url, $page = null ) {
		$url = $this->change_author( $url );
		$url = $this->change_wp_uploads( $url );
		$url = $this->change_theme_style( $url );
		$url = $this->change_theme_name( $url );
		$url = $this->change_wp_plugins( $url );
		$url = $this->change_wp_themes( $url );
		$url = $this->change_wp_content( $url );
		$url = $this->change_wp_includes( $url );

		return $url;
	}

	public static function get_hashed_theme_names() {
		$dirs = scandir( WP_CONTENT_DIR . '/themes' );

		$only_dirs = array_filter( $dirs, function ( $item ) {
			return is_dir( WP_CONTENT_DIR . '/themes' . DIRECTORY_SEPARATOR . $item ) && ! in_array( $item, [
					".",
					".."
				] );
		} );

		if ( ! $only_dirs ) {
			return [];
		}

		$mapped = [];
		foreach ( $only_dirs as $theme_name ) {
			$mapped[ $theme_name ] = substr( md5( $theme_name ), 10 );
		}

		return $mapped;
	}

	public static function get_hashed_plugin_names() {
		$dirs = scandir( WP_PLUGIN_DIR );

		$only_dirs = array_filter( $dirs, function ( $item ) {
			return is_dir( WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . $item ) && ! in_array( $item, [ ".", ".." ] );
		} );

		if ( ! $only_dirs ) {
			return [];
		}

		$mapped = [];
		foreach ( $only_dirs as $plugin_name ) {
			$mapped[ $plugin_name ] = substr( md5( $plugin_name ), 10 );
		}

		return $mapped;
	}

	protected function change_theme_style( $url ) {
		$options   = Simply_Static\Options::instance();
		$new_style = $options->get( 'theme_style_name' );

		if ( ! $new_style ) {
			return $url;
		}

		$style_path     = 'wp-content/themes/' . get_stylesheet() . '/style.css';
		$new_style_path = 'wp-content/themes/' . get_stylesheet() . '/' . $new_style . '.css';

		return $this->change_directory_in_url( $url, $style_path, $new_style_path );
	}

	protected function change_theme_name( $url ) {
		$options = Simply_Static\Options::instance();

		if ( ! $options->get( 'rename_theme_directories' ) ) {
			return $url;
		}

		$theme_names = self::get_hashed_theme_names();

		if ( ! $theme_names ) {
			return $url;
		}

		foreach ( $theme_names as $theme_name => $hashed_name ) {
			$theme_path  = 'wp-content/themes/' . $theme_name;
			$hashed_path = 'wp-content/themes/' . $hashed_name;
			$url         = $this->change_directory_in_url( $url, $theme_path, $hashed_path );
		}

		return $url;
	}

	protected function change_author( $url ) {
		return $this->change_url_path( $url, 'author', 'author_url' );
	}

	protected function change_wp_uploads( $url ) {
		return $this->change_url_path( $url, 'wp-content/uploads', 'wp_uploads_directory' );
	}

	protected function change_wp_themes( $url ) {
		return $this->change_url_path( $url, 'wp-content/themes', 'wp_themes_directory' );
	}

	protected function change_wp_plugins( $url ) {
		return $this->change_url_path( $url, 'wp-content/plugins', 'wp_plugins_directory' );
	}

	protected function change_wp_content( $url ) {
		return $this->change_url_path( $url, 'wp-content', 'wp_content_directory' );
	}

	protected function change_wp_includes( $url ) {
		return $this->change_url_path( $url, 'wp-includes', 'wp_includes_directory' );
	}

	protected function change_url_path( $url, $origin_path, $option_name ) {
		$options = Simply_Static\Options::instance();
		$value   = $options->get( $option_name );

		if ( ! $value ) {
			return $url;
		}

		$new_directory = trim( $value );

		return $this->change_directory_in_url( $url, $origin_path, $new_directory );
	}

	protected function change_directory_in_url( $url, $origin_directory, $new_directory ) {
		$new_directory = trim( $new_directory );

		if ( ! $new_directory || '/' === $new_directory ) {
			return $url;
		}

		$new_directory = untrailingslashit( $new_directory );
		if ( '/' === $new_directory[0] ) {
			$new_directory = substr( $new_directory, '1' );
		}

		$origin_directory = untrailingslashit( $origin_directory );
		if ( '/' === $origin_directory[0] ) {
			$origin_directory = substr( $origin_directory, '1' );
		}

		if ( $origin_directory === $new_directory ) {
			return $url;
		}

		$regex      = "/\/" . addcslashes( $origin_directory, '/' ) . "\//i";
		$convert_to = "/{$new_directory}/";
		$url        = preg_replace( $regex, $convert_to, $url );

		// replace wp_json_encode'd urls, as used by WP's `concatemoji`.
		// e.g. {"concatemoji":"http:\/\/www.example.org\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.6.1"}.
		$regex = addcslashes( "/" . $origin_directory . "/", "/" );
		$url   = str_replace( $regex, addcslashes( $convert_to, "/" ), $url );

		return $url;
	}


	/**
	 * Modify settings args for pro.
	 *
	 * @param array $args given list of arguments.
	 *
	 * @return array
	 */
	public function modify_settings_args( array $args ): array {
		$args['plan']   = 'pro';
		$args['builds'] = [];
		$terms = get_terms(
			array(
				'taxonomy'   => 'ssp-build',
				'hide_empty' => false,
			)
		);

		if ( $terms ) {
			$args['builds'] = wp_list_pluck( $terms, 'name', 'term_id' );
		}

		return $args;
	}

	/**
	 * Add tasks to Simply Static task list.
	 *
	 * @param array $task_list current task list.
	 * @param string $delivery_method current delivery method.
	 *
	 * @return array
	 */
	public function modify_task_list( $task_list, $delivery_method ) {
		$options                   = get_option( 'simply-static' );
		$use_search                = $options['use_search'] ?? false;
		$use_minify                = $options['use_minify'] ?? false;
		$use_shortpixel            = $options['shortpixel_enabled'] ?? false;
		$aws_empty                 = $options['aws_empty'] ?? false;
		$generate_404              = $options['generate_404'] ?? false;
		$change_wp_content         = $options['wp_content_directory'] ?? false;
		$change_wp_includes        = $options['wp_includes_directory'] ?? false;
		$optimize_directories_task = false;

		if ( $change_wp_content && 'wp-content' !== $change_wp_content && '/' !== $change_wp_content ) {
			$optimize_directories_task = true;
		}

		if ( $change_wp_includes && 'wp-includes' !== $change_wp_includes && '/' !== $change_wp_includes ) {
			$optimize_directories_task = true;
		}

		// Reset original task list.
		$task_list = array( 'setup', 'fetch_urls' );

		// Add 404 task
		if ( $generate_404 ) {
			$task_list[] = 'generate_404';
		}

		// Add search task.
		if ( $use_search ) {
			$task_list[] = 'search';
		}

		// Add minify task.
		if ( $use_minify ) {
			$task_list[] = 'minify';
		}

		if ( $optimize_directories_task ) {
			$task_list[] = 'optimize_directories';
		}

		if ( $use_shortpixel ) {
			$task_list[] = 'shortpixel';
			$task_list[] = 'shortpixel_download';
		}

		// Add AWS S3 empty task.
		if ( $aws_empty && $delivery_method === 'aws_s3' ) {
			$task_list[] = 'aws_empty';
		}

		// Add deployment tasks.
		switch ( $delivery_method ) {
			case 'zip':
				$task_list[] = 'create_zip_archive';
				break;
			case 'local':
				$task_list[] = 'transfer_files_locally';
				break;
			case 'simply-cdn':
				$task_list[] = 'simply_cdn';
				break;
			case 'github':
				$task_list[] = 'github_commit';
				break;
			case 'cdn':
				$task_list[] = 'bunny_deploy';
				break;
			case 'tiiny':
				$task_list[] = 'tiiny_deploy';
				break;
			case 'aws-s3':
				$task_list[] = 'aws_deploy';
				break;
			case 'sftp':
				$task_list[] = 'sftp_deploy';
				break;
		}

		// Add wrapup task.
		$task_list[] = 'wrapup';

		return $task_list;
	}

	/**
	 * Modify task class name in Simply Static.
	 *
	 * @param string $class_name current class name.
	 * @param string $task_name current task name.
	 *
	 * @return string
	 */
	public function check_class_name( $class_name, $task_name ) {

		if ( 'github_commit' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'bunny_deploy' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'tiiny_deploy' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'search' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'minify' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'shortpixel_download' === $task_name ) {
			return 'simply_static_pro\\Shortpixel_Download_Task';
		}

		if ( 'shortpixel' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'aws_deploy' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'aws_empty' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		if ( 'optimize_directories' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name, '_' ) . '_Task';
		}

		if ( 'sftp_deploy' === $task_name ) {
			return 'simply_static_pro\\SFTP_Deploy_Task';
		}

		return $class_name;
	}

}
