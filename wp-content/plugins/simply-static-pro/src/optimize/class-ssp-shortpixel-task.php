<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Page;
use Simply_Static\Plugin;
use Simply_Static\Util;

/**
 * Class which handles ShortPixel task.
 */
class Shortpixel_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'shortpixel';

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
	 * Temp directory.
	 *
	 * @var string
	 */
	private string $temp_dir;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options       = Simply_Static\Options::instance();
		$this->options = $options;

		if ( $this->options->get( 'shortpixel_next_page' ) ) {
			$this->page = $this->options->get( 'shortpixel_next_page' );
		}

		$this->temp_dir = $options->get_archive_dir();
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
		$total_pages = Page::query()
		                   ->where( "file_path IS NOT NULL" )
		                   ->where( "file_path != ''" )
		                   ->where( "content_type IN ('" . implode( "','", $this->get_allowed_content_types() ) . "')" )
		                   ->count();

		return $total_pages;
	}

	public function get_pages() {
		$offset = 0;

		if ( $this->page > 0 ) {
			$offset = $this->page - 1;
		}

		if ( $offset ) {
			$offset *= $this->per_page;
		}

		$pages = Page::query()
		             ->where( "file_path IS NOT NULL" )
		             ->where( "file_path != ''" )
		             ->where( "content_type IN ('" . implode( "','", $this->get_allowed_content_types() ) . "')" )
		             ->limit( $this->get_per_page() )
		             ->offset( $offset )
		             ->find();

		return $pages;
	}

	/**
	 * Push a batch of files from the temp dir to DO spaces.
	 *
	 * @return boolean true if done, false if not done.
	 * @throws Exception When the GitHub API returns an error.
	 */
	public function perform(): bool {
		try {
			list( $pages_processed, $total_pages ) = $this->upload_static_files( $this->temp_dir );

			if ( $pages_processed !== 0 ) {
				$message = sprintf( __( 'Uploading %d of %d pages/files to Shortpixel for optimization', 'simply-static' ), $pages_processed, $total_pages );
				$this->save_status_message( $message );
			}

			// return true when done (no more pages).
			if ( $pages_processed >= $total_pages ) {
				$message = sprintf( __( 'Uploaded %d of %d pages/files to Shortpixel', 'simply-static' ), $pages_processed, $total_pages );
				$this->save_status_message( $message );
				$this->delete_page_info();

				do_action( 'ssp_finished_shortpixel_upload', $this );
			}

			return $pages_processed >= $total_pages;
		} catch ( \Exception $e ) {
			$this->save_status_message( $e->getMessage(), static::$task_name . '-error' );
		}

		return true;
	}


	/**
	 * Upload files to Shortpixel.
	 *
	 * @param string $destination_dir The directory to put the files.
	 *
	 * @return array
	 * @throws Exception When the upload fails.
	 */
	public function upload_static_files( string $destination_dir ): array {
		$static_pages    = $this->get_pages();
		$total_pages     = $this->get_total_pages();
		$last_page       = $this->page > 0 ? $this->page - 1 : 0;
		$pages_processed = $last_page * $this->per_page;
		$pages_remaining = $total_pages - $pages_processed;

		Util::debug_log( 'Total pages: ' . $total_pages . '; Pages remaining: ' . $pages_remaining );

		/** @var Shortpixel $shortpixel */
		$shortpixel = Plugin::instance()->get_integration( 'shortpixel' );
		$pages      = array_filter( $static_pages, function ( $page ) use ( $shortpixel ) {
			return ! $shortpixel->is_optimized( $page->url ) && ! $shortpixel->is_queued( $page->url );
		} );

		if ( ! empty( $pages ) ) {
			$files = [];
			foreach ( $pages as $page ) {
				$files[] = [
					'page' => $page,
					'url'  => $page->url,
					'path' => $destination_dir . $page->file_path
				];
			}
			$shortpixel->queue_files( $files );
		}

		// We've processed this pages as well now.
		$pages_processed += count( $static_pages );

		$this->increase_page();

		return array( $pages_processed, $total_pages );
	}

	public function delete_page_info() {
		$this->options->destroy( 'shortpixel_next_page' );
		$this->options->save();
	}

	public function increase_page() {
		$next_page = $this->page + 1;
		$this->options->set( 'shortpixel_next_page', $next_page );
		$this->options->save();
	}


}
