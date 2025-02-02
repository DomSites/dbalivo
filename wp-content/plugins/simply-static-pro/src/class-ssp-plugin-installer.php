<?php

namespace simply_static_pro;

/**
 * Class to handle settings for fuse.
 */
class Plugin_Installer {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Plugin_Installer.
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
	 * Get plugin data from WordPress.org.
	 *
	 * @param $plugin_slug
	 *
	 * @return array
	 */
	public function get_package_from_wp_org( $plugin_slug ) {
		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}
		$response = array();
		$api      = \plugins_api(
			'plugin_information',
			array(
				'slug'   => $plugin_slug,
				'fields' => array(
					'sections' => false,
				),
			)
		);

		if ( is_wp_error( $api ) ) {
			$response['error_message'] = $api->get_error_message();
			$response['status']        = 'error';
		} else {
			$response['status'] = 'success';
			$response['name']   = $api->name;
			$response['url']    = $api->download_link;
		}

		return $response;
	}

	/**
	 * Install package from WordPress.org.
	 *
	 * @param $slug
	 *
	 * @return array|mixed
	 */
	public function install_package_from_wp_org( $slug ) {
		return $this->install_package( $this->get_package_from_wp_org( $slug ) );
	}

	/**
	 * Install plugin from downloaded zip file.
	 *
	 * @param $package_data
	 *
	 * @return array|mixed
	 */
	public function install_package( $package_data ) {
		if ( ! class_exists( 'Plugin_Upgrader' ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		if ( ! function_exists( 'request_filesystem_credentials' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}

		if ( $package_data['status'] === 'error' ) {
			return $package_data;
		}

		$status = array();

		$status['name'] = $package_data['name'];

		$skin     = new \WP_Ajax_Upgrader_Skin();
		$upgrader = new \Plugin_Upgrader( $skin );
		$result   = $upgrader->install( $package_data['url'] );

		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			$status['debug'] = $skin->get_upgrade_messages();
		}

		if ( is_wp_error( $result ) ) {
			$status['error_code']    = $result->get_error_code();
			$status['error_message'] = $result->get_error_message();
			$status['status']        = 'error';
			// wp_send_json_error( $status );

		} elseif ( is_wp_error( $skin->result ) ) {
			$status['error_code']    = $skin->result->get_error_code();
			$status['error_message'] = $skin->result->get_error_message();
			$status['status']        = 'error';
			// wp_send_json_error( $status );

		} elseif ( $skin->get_errors()->has_errors() ) {
			$status['error_message'] = $skin->get_error_messages();
			$status['status']        = 'error';

			// wp_send_json_error( $status );
		} elseif ( is_null( $result ) ) {
			global $wp_filesystem;

			$status['error_code']    = 'unable_to_connect_to_filesystem';
			$status['error_message'] = __( 'Unable to connect to the filesystem. Please confirm your credentials.' );
			// Pass through the error from WP_Filesystem if one was raised.
			if ( $wp_filesystem instanceof \WP_Filesystem_Base && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->has_errors() ) {
				$status['error_message'] = esc_html( $wp_filesystem->errors->get_error_message() );
			}
			$status['status'] = 'error';
		} else {
			$status['status'] = 'success';
		}

		return $status;
	}
}
