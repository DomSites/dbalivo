<?php

namespace simply_static_pro;

use Simply_Static\Util;

/**
 * Class to handle Tiiny.host updates.
 */
class Tiiny_Updater {
	/**
	 * Create a ZIP file from temporary directory.
	 *
	 * @param object $options given options.
	 *
	 * @return string|\WP_Error
	 */
	public static function create_zip( object $options ) {
		$temp_dir = $options->get( 'temp_files_dir' );

		// check if temp directory is empty, if not delete old zip files.
		$temp_dir_empty = ! ( new \FilesystemIterator( $temp_dir ) )->valid();

		if ( ! $temp_dir_empty ) {
			foreach ( new \DirectoryIterator( $temp_dir ) as $file ) {
				if ( ! $file->isDir() ) {
					unlink( $file->getPathname() );
				}
			}
		}

		// Now we are creating a new zip file.
		$archive_dir  = $options->get_archive_dir();
		$zip_filename = untrailingslashit( $archive_dir ) . '.zip';
		$zip_archive  = new \PclZip( $zip_filename );

		Util::debug_log( 'Fetching list of files to include in zip' );

		$files    = array();
		$iterator = new \RecursiveIteratorIterator( new \RecursiveDirectoryIterator( $archive_dir, \RecursiveDirectoryIterator::SKIP_DOTS ) );

		foreach ( $iterator as $file_name => $file_object ) {
			$files[] = realpath( $file_name );
		}

		Util::debug_log( 'Creating zip archive' );

		if ( $zip_archive->create( $files, PCLZIP_OPT_REMOVE_PATH, $archive_dir ) === 0 ) {
			return new \WP_Error( 'create_zip_failed', __( 'Unable to create ZIP archive', 'simply-static' ) );
		}

		return $zip_archive->zipname;
	}

	/**
	 * Upload zip to Tiiny.host.
	 *
	 * @param string $zip_file path to the ZIP file.
	 * @param object $options given options.
	 *
	 * @return bool
	 */
	public static function upload_zip( string $zip_file, object $options ): bool {
		$curl = curl_init();

		// Check domain suffix.
		$suffix = '.tiiny.site';

		if ( ! empty( $options->get( 'tiiny_domain_suffix' ) ) ) {
			$suffix = '.' . $options->get( 'tiiny_domain_suffix' );
		}

		// Define arguments.
		$args = array(
			'email'        => $options->get( 'tiiny_email' ),
			'file'         => new \CURLFILE( $zip_file ),
			'subdomain'    => $options->get( 'tiiny_subdomain' ),
			'domainSuffix' => $suffix
		);

		// Maybe add password.
		if ( ! empty( $options->get( 'tiiny_password' ) ) ) {
			$args['passwordProtected'] = true;
			$args['password']          = $options->get( 'tiiny_password' );
		}

		curl_setopt_array( $curl, array(
			CURLOPT_URL            => 'https://api.tiiny.host/external/pub/upload',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => '',
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => 'POST',
			CURLOPT_POSTFIELDS     => $args,
			CURLOPT_HTTPHEADER     => array(
				'Content-Type: multipart/form-data',
				'x-app-key: 7fe5f69c-ddf7-49b5-8285-256f7eaafbc8'
			),
		) );

		$response = curl_exec( $curl );

		if ( ! curl_errno( $curl ) ) {
			$http_code = curl_getinfo( $curl, CURLINFO_HTTP_CODE );

			switch ( $http_code ) {
				case 200:
					Util::debug_log( 'Successfully transferred the ZIP file to Tiiny.host' );
					break;
				default:
					Util::debug_log( "We couldn't connect to Tiiny.host. There is maybe an error in your connection details." );
			}
		}
		curl_close( $curl );

		return true;
	}
}
