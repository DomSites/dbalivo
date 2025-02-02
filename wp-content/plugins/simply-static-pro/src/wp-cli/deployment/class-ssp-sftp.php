<?php

namespace simply_static_pro\commands\deployment;

use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Query;
use Simply_Static\Util;

class SFTP {


	protected $sftp = null;

	protected $options = null;

	protected function setup() {
		if ( null === $this->options ) {
			$this->options = Options::instance();
		}
	}

	/**
	 * Check Login status.
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static deployment sftp login
	 *
	 * @when after_wp_load
	 */
	public function login() {
		$login = $this->get_sftp();
		if ( $login ) {
			\WP_CLI::success( "Logged in successfully." );
		} else {
			\WP_CLI::error( "Failed to login. Error: " . $this->sftp->getLastSFTPError()  );
		}
	}

	protected function get_page_file_path( $static_page ) {
		return apply_filters( 'ss_get_page_file_path_for_transfer', $static_page->file_path, $static_page );
	}

	/**
	 * Upload a single Static Page
	 *
	 * ## OPTIONS
	 *
	 * [--id=<id>]
	 * : Static Page ID.
	 *
	 * [--url=<url>]
	 * : Page URL
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static deployment sftp login
	 *
	 * @when after_wp_load
	 */
	public function upload( $args, $options ) {
		$this->setup();
		if ( ! empty( $options['id'] ) ) {
			$static_page = Page::query()->find_by( 'id',  $options['id'] );
		}

		if ( ! empty( $options['url'] ) ) {
			$static_page = Page::query()->find_or_create_by( 'url', $options['url'] );
		}

		if ( ! $static_page ) {
			\WP_CLI::error('Static Page not found.' );
		}

		$sftp   = $this->get_sftp();
		$folder = $this->options->get( 'sftp_folder' );
		define('NET_SFTP_LOGGING', \phpseclib3\Net\SFTP::LOG_COMPLEX);
		if ( $folder ) {
			$folder = trailingslashit( $folder );
		}

		$this->temp_dir   = $this->options->get_archive_dir();
		$page_file_path = $this->get_page_file_path( $static_page );
		$file_path = $this->temp_dir . $page_file_path;
		$upload_path = $folder .  $page_file_path;

		try {
			if ( ! is_dir( $file_path ) && file_exists( $file_path ) ) {

				\WP_CLI::line( 'Uploading File:' );
				\WP_CLI\Utils\format_items( 'table', [
					[
						'Info' => 'Upload Path',
						'Detail' => $upload_path
					],
					[
						'Info' => 'File Path',
						'Detail' => $file_path
					],
					[
						'Info' => 'Negotiated SFTP Version',
						'Detail' => $sftp->getNegotiatedVersion()
					],
					[
						'Info' => 'Supported SFTP Versions',
						'Detail' => $sftp->getSupportedVersions()
					]

				], array( 'Info', 'Detail' ) );

				// SFTP UPLOAD
				$upload	= $this->sftp->upload( $page_file_path );
				if ( is_wp_error( $upload ) ) {
					throw new \Exception( $upload->get_error_message() );
				}

			}

			do_action( 'ssp_file_transferred_to_sftp', $static_page );

			$static_page->last_transferred_at = Util::formatted_datetime();
			$static_page->save();
			\WP_CLI::success( "File uploaded successfully. File Path: " . $file_path );print_r( $sftp->getSFTPLog());
		} catch (\Exception $e) {
			$static_page->last_transferred_at = Util::formatted_datetime(); // Adding this to avoid infinite loop.
			$static_page->error_message = $e->getMessage();
			$static_page->save();

			\WP_CLI::error( $e->getMessage()  );
		}
	}

	/**
	 * @return false|\simply_static_pro\SFTP|null
	 */
	public function get_sftp() {
		if ( $this->sftp === null ) {

			$this->sftp  = new \simply_static_pro\SFTP();
			return $this->sftp->get_sftp();

		}

		return $this->sftp;
	}

}