<?php

namespace simply_static_pro;

use Exception;
use Simply_Static;
use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Util;

/**
 * Class which handles SFTP Deployment.
 */
class SFTP_Deploy_Task extends Simply_Static\Task {

	use Simply_Static\canProcessPages;
	use Simply_Static\canTransfer;

	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'sftp_deploy';

	/**
	 * Given start time for the export.
	 *
	 * @var string
	 */
	protected $start_time;

	/**
	 * Get SFTP
	 * @var null|SFTP
	 */
	protected $sftp = null;

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

		$options          = Options::instance();
		$this->options    = $options;
		$this->temp_dir   = $options->get_archive_dir();
	}

	public function set_start_time() {
		$this->start_time = get_transient( 'ssp_sftp_deploy_start_time' );

		if ( ! $this->start_time ) {
			$start = Util::formatted_datetime();
			set_transient( 'ssp_sftp_deploy_start_time', $start, DAY_IN_SECONDS );
			$this->start_time = $start;
		}

		return $this->start_time;
	}

	/**
	 * Push a batch of files from the temp dir to SFTP folders.
	 *
	 * @return boolean true if done, false if not done.
	 * @throws Exception When the GitHub API returns an error.
	 */
	public function perform(): bool {
		$this->get_start_time();

		$sftp = $this->get_sftp();

		if ( ! $sftp ) {
			$this->save_status_message( __( 'We could not authenticate with SFTP. Stopping SFTP upload.', 'simply-static' ) );
			return true; // Returning TRUE to stop this task.
		}

		define('NET_SFTP_LOGGING', true);

		$done = $this->process_pages();

		if ( $done ) {
			// Maybe add 404.
			$this->add_404();

			self::delete_transients();

			// Removing cached time.
			delete_transient( 'ssp_sftp_deploy_start_time' );

			do_action( 'ssp_finished_sftp_transfer', $this->temp_dir );
		}

		return $done;
	}

	/**
	 * @param Page $static_page Page object.
	 *
	 * @return void
	 */
	protected function process_page( $static_page ) {
		$page_file_path   = $this->get_page_file_path( $static_page );
		$file_path        = $this->temp_dir . $page_file_path;
		$throttle_request = apply_filters( 'ssp_throttle_sftp_request', true );

		if ( ! is_dir( $file_path ) && file_exists( $file_path ) ) {
			$upload = $this->sftp->upload( $page_file_path );

			if ( is_wp_error( $upload ) ) {
				throw new \Exception( $upload->get_error_message() );
			}

			// Maybe throttle request.
			if ( $throttle_request ) {
				sleep( 1 );
			}
		}

		do_action( 'ssp_file_transferred_to_sftp', $static_page, $this->temp_dir );
	}


	/**
	 * Maybe add a custom 404 page.
	 *
	 * @return void
	 */
	public function add_404() {
		$options    = get_option( 'simply-static' );

		if ( $options['generate_404'] && realpath( $this->temp_dir . '404/index.html' ) ) {
			$this->get_sftp();
			$this->sftp->upload( '404/index.html' );
		}
	}

	/**
	 * @return false|SFTP|null
	 */
	public function get_sftp() {
		if ( $this->sftp === null ) {

			$this->sftp  = new \simply_static_pro\SFTP();
			return $this->sftp->get_sftp();

		}

		return $this->sftp;
	}

	protected function get_page_file_path( $static_page ) {
		return apply_filters( 'ss_get_page_file_path_for_transfer', $static_page->file_path, $static_page );
	}

	/**
	 * Upload files to DO Spaces.
	 *
	 * @param string $destination_dir The directory to put the files.
	 *
	 * @deprecated
	 *
	 * @return array
	 * @throws Exception When the upload fails.
	 */
	public function upload_static_files( string $destination_dir ): array {
		$batch_size       = apply_filters( 'ssp_sftp_batch_size', 250 );
		$throttle_request = apply_filters( 'ssp_throttle_sftp_request', true );

		// last_modified_at > ? AND.
		$static_pages    = Page::query()
		                       ->where( "file_path IS NOT NULL" )
		                       ->where( "file_path != ''" )
		                       ->where( "( last_transferred_at < ? OR last_transferred_at IS NULL )", $this->start_time )
		                       ->limit( $batch_size )
		                       ->find();
		$pages_remaining = count( $static_pages );
		$total_pages     = Page::query()
		                       ->where( "file_path IS NOT NULL" )
		                       ->where( "file_path != ''" )
		                       ->count();

		$pages_processed = $total_pages - $pages_remaining;
		Util::debug_log( 'Total pages: ' . $total_pages . '; Pages remaining: ' . $pages_remaining );

		$this->get_sftp();
		define('NET_SFTP_LOGGING', true);

		if ( $pages_processed !== 0 ) {
			// Showing message while uploading so users know what's happening
			$message = sprintf( __( 'Uploading %d of %d pages/files', 'simply-static' ), $pages_processed, $total_pages );
			$this->save_status_message( $message );
		}

		while ( $static_page = array_shift( $static_pages ) ) {
			$page_file_path = $this->get_page_file_path( $static_page );
			$file_path = $this->temp_dir . $page_file_path;

			try {
				if ( ! is_dir( $file_path ) && file_exists( $file_path ) ) {

					// SFTP UPLOAD
					$upload = $this->sftp->upload( $page_file_path );

					if ( is_wp_error( $upload ) ) {
						throw new Exception( $upload->get_error_message() );
					}

					// Maybe throttle request.
					if ( $throttle_request ) {
						sleep( 1 );
					}
				}

				do_action( 'ssp_file_transferred_to_sftp', $static_page, $destination_dir );

				$static_page->last_transferred_at = Util::formatted_datetime();
				$static_page->save();
			} catch (\Exception $e) {
				$static_page->last_transferred_at = Util::formatted_datetime(); // Adding this to avoid infinite loop.
				$static_page->error_message = $e->getMessage();
				$static_page->save();
			}


		}

		return array( $pages_processed, $total_pages );
	}

}