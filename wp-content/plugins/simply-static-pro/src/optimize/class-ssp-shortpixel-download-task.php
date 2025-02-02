<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Page;
use Simply_Static\Plugin;
use Simply_Static\Util;

/**
 * Class which handles ShortPixel task.
 */
class Shortpixel_Download_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'shortpixel_download';

	/**
	 * Current Page for SQL.
	 *
	 * @var int
	 */
	protected $page = 0;

	/**
	 * Per page for SQL.
	 *
	 * @var int
	 */
	protected $per_page = 10;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options       = Simply_Static\Options::instance();
		$this->options = $options;

		if ( $this->options->get( 'shortpixel_download_next_page' ) ) {
			$this->page = $this->options->get( 'shortpixel_download_next_page' );
		}
	}

	/**
	 * Get filtered par page.
	 *
	 * @return mixed|null
	 */
	protected function get_per_page() {
		return apply_filters( 'simply_static_shortpixel_per_page', $this->per_page );
	}

	protected function get_allowed_content_types() {
		return [
			'image/jpeg',
			'image/avif',
			'image/png',
			'image/gif',
			'image/webp'
		];
	}

	public function get_total_pages() {
		global $wpdb;

		$total_queued = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key=%s", '_queued_shortpixel' ), ARRAY_A );

		return $total_queued;
	}

	public function get_queued_files() {
		global $wpdb;

		$offset = 0;

		if ( $this->page > 0 ) {
			$offset = $this->page - 1;
		}

		if ( $offset ) {
			$offset *= $this->per_page;
		}

		$queued_data = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->postmeta} WHERE meta_key=%s LIMIT {$offset}, {$this->get_per_page()}", '_queued_shortpixel' ), ARRAY_A );

		/*$pages = Page::query()
		             ->where( "file_path IS NOT NULL" )
		             ->where( "file_path != ''" )
		             ->where("content_type IN ('" . implode( "','", $this->get_allowed_content_types() ) .  "')")
		             ->limit( $this->get_per_page() )
		             ->offset( $offset )
		             ->find();*/

		return $queued_data;
	}

	/**
	 * Push a batch of files from the temp dir to DO spaces.
	 *
	 * @return boolean true if done, false if not done.
	 * @throws \Exception When the GitHub API returns an error.
	 */
	public function perform(): bool {
		list( $pages_processed, $total_pages ) = $this->download_static_files();

		if ( $pages_processed !== 0 ) {
			$message = sprintf( __( 'Uploading %d of %d pages/files to Shortpixel for optimization', 'simply-static' ), $pages_processed, $total_pages );
			$this->save_status_message( $message );
		}

		// return true when done (no more pages).
		if ( $pages_processed >= $total_pages ) {
			do_action( 'ssp_finished_shortpixel_upload', $this );
		}

		return $pages_processed >= $total_pages;
	}


	/**
	 * Upload files to Shortpixel.
	 *
	 * @param string $destination_dir The directory to put the files.
	 *
	 * @return array
	 * @throws Exception When the upload fails.
	 */
	public function download_static_files() {

		$queued_files    = $this->get_queued_files();
		$total_pages     = $this->get_total_pages();
		$last_page       = $this->page > 0 ? $this->page - 1 : 0;
		$pages_processed = $last_page * $this->per_page;
		$pages_remaining = $total_pages - $pages_processed;

		Util::debug_log( 'Total pages: ' . $total_pages . '; Pages remaining: ' . $pages_remaining );

		/** @var Shortpixel $shortpixel */
		$shortpixel = Plugin::instance()->get_integration( 'shortpixel' );
		$file_urls  = [];
		foreach ( $queued_files as $meta ) {
			$files = maybe_unserialize( $meta['meta_value'] );

			if ( ! $files ) {
				continue;
			}

			foreach ( $files as $file_info ) {
				$file_urls[] = $file_info['img_url'];
			}
		}

		if ( ! empty( $file_urls ) ) {
			$shortpixel->download_files( $file_urls );
		}

		// We've processed this pages as well now.
		$pages_processed += count( $queued_files );

		return array( $pages_processed, $total_pages );
	}


}
