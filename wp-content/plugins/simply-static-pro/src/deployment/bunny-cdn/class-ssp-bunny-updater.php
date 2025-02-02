<?php

namespace simply_static_pro;

use Simply_Static\Util;

/**
 * Class to handle BunnyCDN updates.
 */
class Bunny_Updater {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Bunny_Updater.
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
	 * Get current pull zone.
	 *
	 * @return bool|array
	 */
	public static function get_pull_zone() {
		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_BUNNYCDN' ) ) {
			$options = SSP_BUNNYCDN;
		}

		// Get pullzones.
		$response = wp_remote_get(
			'https://api.bunny.net/pullzone',
			array(
				'headers' => array(
					'AccessKey'    => $options['cdn_api_key'],
					'Accept'       => 'application/json',
					'Content-Type' => 'application/json; charset=utf-8',
				),
			)
		);

		if ( ! is_wp_error( $response ) ) {
			if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
				$body       = wp_remote_retrieve_body( $response );
				$pull_zones = json_decode( $body );

				foreach ( $pull_zones as $pull_zone ) {
					if ( $pull_zone->Name === apply_filters( 'ssp_cdn_pull_zone', $options['cdn_pull_zone'] ) ) {
						return array(
							'name'       => $pull_zone->Name,
							'zone_id'    => $pull_zone->Id,
							'storage_id' => $pull_zone->StorageZoneId,
						);
					}
				}
			} else {
				$error_message = wp_remote_retrieve_response_message( $response );
				Util::debug_log( $error_message );

				return false;
			}
		} else {
			$error_message = $response->get_error_message();
			Util::debug_log( $error_message );

			return false;
		}
	}

	/**
	 * Get current storage zone.
	 *
	 * @return bool|array
	 */
	public static function get_storage_zone() {
		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_BUNNYCDN' ) ) {
			$options = SSP_BUNNYCDN;
		}

		// Get storage zones.
		$response = wp_remote_get(
			'https://api.bunny.net/storagezone',
			array(
				'headers' => array(
					'AccessKey'    => $options['cdn_api_key'],
					'Accept'       => 'application/json',
					'Content-Type' => 'application/json; charset=utf-8',
				),
			)
		);

		if ( ! is_wp_error( $response ) ) {
			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				$body          = wp_remote_retrieve_body( $response );
				$storage_zones = json_decode( $body );

				foreach ( $storage_zones as $storage_zone ) {
					if ( $storage_zone->Name === apply_filters( 'ssp_cdn_storage_zone', $options['cdn_storage_zone'] ) ) {
						return array(
							'name'       => $storage_zone->Name,
							'storage_id' => $storage_zone->Id,
							'password'   => $storage_zone->Password
						);
					}
				}
			} else {
				$error_message = wp_remote_retrieve_response_message( $response );
				Util::debug_log( $error_message );

				return false;
			}
		} else {
			$error_message = $response->get_error_message();
			Util::debug_log( $error_message );

			return false;
		}
	}

	/**
	 * Upload files to CDN.
	 *
	 * @param string $file_path path in local filesystem.
	 * @param string $to_path path to upload.
	 *
	 * @return void
	 */
	public static function upload_file( string $file_path, string $to_path ) {
		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_BUNNYCDN' ) ) {
			$options = SSP_BUNNYCDN;
		}

		$filesystem = Helper::get_file_system();
		$content    = $filesystem->get_contents( $file_path );

		$response = wp_remote_request(
			'https://' . $options['cdn_storage_host'] . '/' . $options['cdn_storage_zone'] . '/' . $to_path,
			array(
				'method'  => 'PUT',
				'headers' => array(
					'AccessKey' => $options['cdn_access_key'],
				),
				'body'    => $content,
			)
		);

		if ( ! is_wp_error( $response ) ) {
			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				Util::debug_log( 'Successfully uploaded ' . $file_path );
			} else {
				$error_message = wp_remote_retrieve_response_message( $response );
				Util::debug_log( $error_message );
			}
		} else {
			$error_message = $response->get_error_message();
			Util::debug_log( $error_message );
		}
	}

	/**
	 * Delete file from BunnyCDN storage.
	 *
	 * @param string $path given path to delete.
	 *
	 * @return bool
	 */
	public static function delete_file( string $path ): bool {
		$options      = get_option( 'simply-static' );
		$storage_zone = self::get_storage_zone();

		// Maybe use constant instead of options.
		if ( defined( 'SSP_BUNNYCDN' ) ) {
			$options = SSP_BUNNYCDN;
		}

		$response = wp_remote_request(
			'https://' . $options['cdn_storage_host'] . '/' . $storage_zone['name'] . $path,
			array(
				'method'  => 'DELETE',
				'headers' => array( 'AccessKey' => $options['cdn_access_key'] ),
			)
		);

		if ( ! is_wp_error( $response ) ) {
			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				return true;
			} else {
				$error_message = wp_remote_retrieve_response_message( $response );
				Util::debug_log( $error_message );

				return false;
			}
		} else {
			$error_message = $response->get_error_message();
			Util::debug_log( $error_message );

			return false;
		}
	}

	/**
	 * Purge Zone Cache in BunnyCDN pull zone.
	 *
	 * @return bool
	 */
	public static function purge_cache(): bool {
		$options   = get_option( 'simply-static' );
		$pull_zone = self::get_pull_zone();

		// Maybe use constant instead of options.
		if ( defined( 'SSP_BUNNYCDN' ) ) {
			$options = SSP_BUNNYCDN;
		}

		$response = wp_remote_post(
			'https://api.bunny.net/pullzone/' . $pull_zone['zone_id'] . '/purgeCache',
			array(
				'headers' => array(
					'AccessKey' => $options['cdn_api_key'],
				),
			)
		);

		if ( ! is_wp_error( $response ) ) {
			if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
