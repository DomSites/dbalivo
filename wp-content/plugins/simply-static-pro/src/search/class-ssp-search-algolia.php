<?php

namespace simply_static_pro;

use Simply_Static\Util;
use Algolia\AlgoliaSearch\SearchClient;


/**
 * Class to handle settings for deployment.
 */
class Search_Algolia {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Contains new Index client.
	 *
	 * @var object
	 */
	public $index;

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
		$options     = get_option( 'simply-static' );
		$use_search  = $options['use_search'] ?? false;
		$search_type = $options['search_type'] ?? 'fuse';

		if ( $use_search && 'algolia' === $search_type ) {
			// Maybe use constant instead of options.
			if ( defined( 'SSP_ALGOLIA' ) ) {
				$options = SSP_ALGOLIA;
			}

			if ( isset( $options['algolia_app_id'] ) && ! empty( $options['algolia_app_id'] ) && isset( $options['algolia_admin_api_key'] ) && ! empty( $options['algolia_admin_api_key'] ) ) {
				$client = SearchClient::create( $options['algolia_app_id'], $options['algolia_admin_api_key'] );
				$this->index = $client->initIndex( $options['algolia_index'] );

				add_action( 'wp_enqueue_scripts', array( $this, 'add_search_scripts' ) );
				add_action( 'ss_after_setup_task', array( $this, 'clear_index' ) );
				add_action( 'ss_after_setup_task', array( $this, 'add_config' ) );
			}
		}
	}

	/**
	 * Clear Algolia index on full static export to prevent duplicates.
	 *
	 * @return void
	 */
	public function clear_index() {
		$use_single = get_option( 'simply-static-use-single' );
		$use_build  = get_option( 'simply-static-use-build' );

		if ( empty( $use_build ) && empty( $use_single ) ) {
			$this->index->clearObjects();
		}
	}

	/**
	 * Enqueue scripts for Algolia Instant Search.
	 *
	 * @return void
	 */
	public function add_search_scripts() {
		$options     = get_option( 'simply-static' );
		$use_search  = $options['use_search'] ?? false;
		$search_type = $options['search_type'] ?? 'fuse';

		if ( $use_search && 'algolia' === $search_type ) {
			wp_enqueue_script( 'ssp-algolia', 'https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
			wp_enqueue_script( 'ssp-algolia-autocomplete', 'https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
			wp_enqueue_script( 'ssp-algolia-script', SIMPLY_STATIC_PRO_URL . '/assets/ssp-search-algolia.js', array(
				'ssp-algolia-autocomplete',
				'ssp-algolia'
			), SIMPLY_STATIC_PRO_VERSION, true );
			wp_enqueue_style( 'ssp-search-algolia', SIMPLY_STATIC_PRO_URL . '/assets/ssp-search-algolia.css', array(), SIMPLY_STATIC_PRO_VERSION, 'all' );
		}
	}

	/**
	 * Set up the index file and add it to Simply Static options.
	 *
	 * @return string|bool
	 */
	public function add_config() {
		$filesystem = Helper::get_file_system();

		if ( ! $filesystem ) {
			return false;
		}

		// Get config file path.
		$upload_dir  = wp_upload_dir();
		$config_dir  = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
		$config_file = $config_dir . 'algolia.json';

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
		if ( defined( 'SSP_ALGOLIA' ) ) {
			$options = SSP_ALGOLIA;
		}

		// Save Algolia settings to config file.
		$algolia_config = array(
			'app_id'      => $options['algolia_app_id'],
			'api_key'     => $options['algolia_search_api_key'],
			'index'       => $options['algolia_index'],
			'selector'    => $options['algolia_selector'],
			'use_excerpt' => apply_filters( 'ssp_algolia_use_excerpt', true ),
		);

		$filesystem->put_contents( $config_file, wp_json_encode( $algolia_config ) );

		return $config_file;
	}
}
