<?php

namespace simply_static_pro;

use Simply_Static\Options;
use Simply_Static\Util;

class SFTP {

	protected $sftp = null;

	protected $options = null;

	public function __construct() {
		$this->options = Options::instance();
	}

	public function upload( $page_file_path ) {
		$file_path      = $this->options->get_archive_dir() . $page_file_path;
		$folders        = explode( '/', $page_file_path );
		$filename       = array_pop( $folders );
		$sftp           = $this->get_sftp();
		$opened_folders = 0;
		// Current folders
		foreach ( $folders as $folder ) {
			$dirs = $sftp->rawlist( '.' );

			if ( empty( $dirs[ $folder ] ) ) {
				$sftp->mkdir( $folder );
			}

			$sftp->chdir( $folder );
			$opened_folders++;
		}

		// SFTP UPLOAD
		$upload = $sftp->put( $filename, $file_path, \phpseclib3\Net\SFTP::SOURCE_LOCAL_FILE );

		if ( $opened_folders ) {
			while( $opened_folders > 0 ) {
				// Move to parent folder.
				$sftp->chdir( '..' );
				$opened_folders--;
			}
		}

		if ( ! $upload ) {
			return new \WP_Error( 'sftp_failed_upload', 'File not uploaded. ' . $sftp->getLastSFTPError() );
		}

		return true;
	}

	/**
	 * SFTP class positioned in the selected folder.
	 *
	 * @return false|\phpseclib3\Net\SFTP
	 */
	public function get_sftp() {
		if ( $this->sftp === null ) {
			$host   = $this->options->get( 'sftp_host' );
			$user   = $this->options->get( 'sftp_user' );
			$pass   = $this->options->get( 'sftp_pass' );
			$port   = $this->options->get( 'sftp_port' );
			$folder = $this->options->get( 'sftp_folder' );

			if ( ! $port ) {
				$port = 22;
			}

			if ( strpos( $host, 'sftp://' ) === 0 ) {
				$host = str_replace( 'sftp://', '', $host );
			}

			$this->sftp  = new \phpseclib3\Net\SFTP( $host, absint( $port ) );
			$login = $this->sftp->login($user, $pass);

			if ( ! $login ) {
				Util::debug_log( 'Not able to login to SFTP' );
				return false;
			}

			if ( $folder ) {
				$folder = trailingslashit( $folder );
				$this->sftp->chdir( $folder );
			}
		}

		return $this->sftp;
	}

}