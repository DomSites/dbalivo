<?php

namespace simply_static_pro;

use Simply_Static\Util;


/**
 * Class to handle settings for fuse.
 */
class Search_Fuse {
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
		$options    = get_option( 'simply-static' );
		$use_search = $options['use_search'] ?? false;

		if ( $use_search ) {
			add_shortcode( 'ssp-search', array( $this, 'render_shortcode' ) );
			add_action( 'ss_after_setup_task', array( $this, 'add_config' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_search_scripts' ) );

			// Need to render markup?
			$fuse_selector = $options['fuse_selector'] ?? '';

			if ( '' !== $fuse_selector ) {
				add_action( 'wp_footer', array( $this, 'maybe_render_shortcode' ) );
			}
		}
	}

	/**
	 * Enqueue scripts for Algolia Instant Search.
	 *
	 * @return void
	 */
	public function add_search_scripts() {
		global $post;
		$options       = get_option( 'simply-static' );
		$use_search    = $options['use_search'] ?? false;
		$search_type   = $options['search_type'] ?? 'fuse';
		$fuse_selector = $options['fuse_selector'] ?? '';

		if ( ! $use_search || 'fuse' !== $search_type ) {
			return;
		}

		$enqueue      = false;
		$use_selector = false;

		if ( '' !== $fuse_selector ) {
			$enqueue      = true;
			$use_selector = true;
		}

		if ( ! $enqueue && $post && has_shortcode( $post->post_content, 'ssp-search' ) ) {
			$enqueue = true;
		}

		if ( ! $enqueue ) {
			return;
		}

		// Load scripts if shortcode is used.
		wp_enqueue_style( 'ssp-search', SIMPLY_STATIC_PRO_URL . '/assets/ssp-search.css', array(), SIMPLY_STATIC_PRO_VERSION, 'all' );
		wp_enqueue_script( 'ssp-fuse', SIMPLY_STATIC_PRO_URL . '/assets/fuse.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
		wp_enqueue_script( 'ssp-search', SIMPLY_STATIC_PRO_URL . '/assets/ssp-search.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
		wp_localize_script(
			'ssp-search',
			'ssp_search',
			array(
				'html'         => $this->render_shortcode(),
				'use_selector' => $use_selector
			)
		);
	}

	/**
	 * Add shortcode for markup if selector is used.
	 *
	 * @return void
	 */
	public function maybe_render_shortcode() {
		$options       = get_option( 'simply-static' );
		$fuse_selector = $options['fuse_selector'] ?? '';

		if ( '' !== $fuse_selector ) {
			echo '<span style="display:none">' . do_shortcode( '[ssp-search]' ) . '</span>';
		}
	}

	/**
	 * Render search box shortcode.
	 *
	 * @return string
	 */
	public function render_shortcode(): string {
		$options     = get_option( 'simply-static' );
		$use_search  = $options['use_search'] ?? false;
		$search_type = $options['search_type'] ?? 'fuse';

		if ( $use_search && $search_type === 'fuse' ) {
			ob_start();
			?>
            <div class="ssp-search">
                <form class="search-form">
                    <div class="form-row">
                        <div class="search-input-container">
                            <input class="search-input fuse-search" name="search-input"
                                   placeholder="<?php esc_html_e( 'Search', 'simply-static-pro' ); ?>"
                                   autocomplete="off"
                                   data-noresult="<?php esc_html_e( 'No results found.', 'simply-static-pro' ); ?>">
                            <div class="search-auto-complete"></div>
                            <button type='submit' class='search-submit'>
                                <svg viewBox='0 0 24 24'>
                                    <path d='M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z'/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
			<?php
			return ob_get_clean();
		}

		return '';
	}

	/**
	 * Updating local JSON index file.
	 *
	 * @param string $temp_dir given temp directory.
	 *
	 * @return false|void
	 */
	public function update_index_file( $temp_dir ) {
		$filesystem = Helper::get_file_system();

		if ( ! $filesystem ) {
			return false;
		}

		// Check if it's a full static export.
		$use_single = get_option( 'simply-static-use-single' );
		$use_build  = get_option( 'simply-static-use-build' );

		if ( isset( $use_build ) && ! empty( $use_build ) || isset( $use_single ) && ! empty( $use_single ) ) {
			return;
		}

		// Get config file path.
		$upload_dir  = wp_upload_dir();
		$config_dir  = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
		$config_file = $config_dir . 'fuse-index.json';

		// Delete old index.
		if ( file_exists( $config_file ) ) {
			wp_delete_file( $config_file );
		}

		// Check if directory exists.
		if ( ! is_dir( $config_dir ) ) {
			wp_mkdir_p( $config_dir );
		}

		// Add results to file.
		$search_results = get_transient( 'ssp_search_results' );
		$filesystem->put_contents( $config_file, wp_json_encode( $search_results ) );

		// Move file to directory.
		$temp_config_dir = $temp_dir . 'wp-content/uploads/simply-static/configs/';
		$filesystem->copy( $config_file, $temp_config_dir . 'fuse-index.json', true );
	}

	/**
	 * Set up the index file and add it to Simply Static options.
	 *
	 * @return string|bool
	 */
	public function add_config() {
		$filesystem = Helper::get_file_system();

		// Get config file path.
		$upload_dir  = wp_upload_dir();
		$config_dir  = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
		$config_file = $config_dir . 'fuse-config.json';

		// Delete old index.
		if ( file_exists( $config_file ) ) {
			wp_delete_file( $config_file );
		}

		// Check if directory exists.
		if ( ! is_dir( $config_dir ) ) {
			wp_mkdir_p( $config_dir );
		}

		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_FUSE' ) ) {
			$options = SSP_FUSE;
		}

		// Save Algolia settings to config file.
		$fuse_config = array(
			'selector' => $options['fuse_selector'] ?? '',
		);

		$filesystem->put_contents( $config_file, wp_json_encode( $fuse_config ) );

		return $config_file;
	}
}
