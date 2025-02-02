<?php

namespace simply_static_pro;

use Exception;
use Simply_Static;
use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Util;

/**
 * Class which handles AWS Deployment.
 */
class AWS_Deploy_Task extends Simply_Static\Task {

	use Simply_Static\canTransfer;
	use Simply_Static\canProcessPages;


	protected $throttle_request = true;

	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'aws_deploy';

	/**
	 * Temp directory.
	 *
	 * @var string
	 */
	private string $temp_dir;

	/**
	 * @var null|S3_Client;
	 */
	protected $client = null;


	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options          = Options::instance();
		$this->options    = $options;
		$this->temp_dir   = $options->get_archive_dir();
		$this->start_time = $options->get( 'archive_start_time' );
	}

	protected function get_page_file_path( $static_page ) {
		return apply_filters( 'ss_get_page_file_path_for_transfer', $static_page->file_path, $static_page );
	}

	/**
	 * Transfer directory to S3 bucket.
	 *
	 * @return boolean true if done, false if not done.
	 * @throws Exception When the GitHub API returns an error.
	 */
	public function perform(): bool {

		if ( $this->get_generate_type() === 'update' ) {
			$this->throttle_request = apply_filters( 'ssp_throttle_do_request', true );

			$done = $this->process_pages();
		} else {
			$done = $this->transfer_directory( $this->temp_dir );
		}

		// return true when done (no more pages).
		if ( $done ) {
			do_action( 'ssp_finished_aws_transfer', $this->temp_dir );

			self::delete_transients();
		}

		return $done;
	}

	/**
	 * Transfer directory to S3.
	 *
	 * @param string $directory The directory with the files to transfer.
	 *
	 * @return bool
	 * @throws Exception When the transfer fails.
	 */
	protected function transfer_directory( string $directory ) {
		$static_pages = Page::query()
		                    ->where( "file_path IS NOT NULL" )
		                    ->where( "file_path != ''" )
		                    ->where( "( last_transferred_at < ? OR last_transferred_at IS NULL )", $this->start_time )
		                    ->find();

		$pages_remaining = count( $static_pages );
		$total_pages     = Page::query()
		                       ->where( "file_path IS NOT NULL" )
		                       ->where( "file_path != ''" )
		                       ->count();

		$pages_processed = $total_pages - $pages_remaining;
		Util::debug_log( 'Total pages: ' . $total_pages . '; Pages remaining: ' . $pages_remaining );

		// Doing it all at the same time.
		$message = sprintf( __( 'Uploading %d of %d pages/files', 'simply-static' ), $pages_remaining, $total_pages );
		$this->save_status_message( $message );

		$bucket       = $this->options->get( 'aws_bucket' );
		$api_secret   = $this->options->get( 'aws_access_secret' );
		$api_key      = $this->options->get( 'aws_access_key' );
		$region       = $this->options->get( 'aws_region' );
		$subdirectory = $this->options->get( 'aws_subdirectory' );

		$client = new S3_Client();
		$client->set_bucket( $bucket )
		       ->set_api_secret( $api_secret )
		       ->set_api_key( $api_key )
		       ->set_region( $region );

		// Subdirectory?
		if ( $subdirectory ) {
			$client->transfer_directory( $this->temp_dir, $subdirectory );
		} else {
			$client->transfer_directory( $this->temp_dir );
		}

		while ( $static_page = array_shift( $static_pages ) ) {
			$page_file_path = $this->get_page_file_path( $static_page );
			$file_path = $this->temp_dir . $page_file_path;

			if ( ! is_dir( $file_path ) && file_exists( $file_path ) ) {
				do_action( 'ssp_file_transferred_to_aws', $static_page, $directory );
				$static_page->last_transferred_at = Util::formatted_datetime();
				$static_page->save();
			}
		}

		if ( $pages_processed >= $total_pages ) {
			$message = sprintf( __( 'Uploaded %d of %d pages/files', 'simply-static' ), $pages_processed, $total_pages );
			$this->save_status_message( $message );
		}

		return $pages_processed >= $total_pages;
	}

	protected function get_client() {
		if ( null === $this->client ) {
			$bucket     = $this->options->get( 'aws_bucket' );
			$api_secret = $this->options->get( 'aws_access_secret' );
			$api_key    = $this->options->get( 'aws_access_key' );
			$region     = $this->options->get( 'aws_region' );

			$client = new S3_Client();
			$client->set_bucket( $bucket )
			       ->set_api_secret( $api_secret )
			       ->set_api_key( $api_key )
			       ->set_region( $region );

			$this->client = $client;
		}

		return $this->client;
	}


	protected function process_page( $static_page ) {
		$subdirectory   = $this->options->get( 'aws_subdirectory' );
		$client         = $this->get_client();
		$page_file_path = $this->get_page_file_path( $static_page );
		$file_path      = $this->temp_dir . $page_file_path;

		if ( ! is_dir( $file_path ) && file_exists( $file_path ) ) {

			if ( $subdirectory ) {
				$page_file_path = trailingslashit( $subdirectory ) . $page_file_path;
			}

			$upload = $client->upload_file( $file_path, $page_file_path );

			// Maybe throttle request.
			if ( $this->throttle_request ) {
				sleep( 1 );
			}

			if ( ! $upload ) {
				throw new \Exception(__( 'Could not upload the file to AWS S3 Bucket', 'simply-static-pro' ) );
			}
		}

		do_action( 'ssp_file_transferred_to_aws', $static_page, $this->temp_dir );

	}


}
