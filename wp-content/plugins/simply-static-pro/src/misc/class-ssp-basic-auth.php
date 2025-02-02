<?php

namespace simply_static_pro;

use Simply_Static\Options;

/**
 * Basic Auth class
 */
class Basic_Auth {

	/**
	 * Initialize
	 */
	public function __construct() {
		// Making sure WP CLI runs fine even if Basic Auth is ON.
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			return;
		}

		add_action( 'init', [ $this, 'auth' ] );
		add_action( 'update_option_simply-static', [ $this, 'update_htacces' ], 20, 2 );
	}

	public function update_htacces( $old_value, $new_value ) {
		$prev_auth_enabled = isset( $old_value['http_basic_auth_on'] ) ? $old_value['http_basic_auth_on'] : false;
		$new_auth_enabled = isset( $new_value['http_basic_auth_on'] ) ? $new_value['http_basic_auth_on'] : false;

		// Not set at all.
		if ( ! $prev_auth_enabled && ! $new_auth_enabled ) {
			return;
		}

		// Nothing changed.
		if ( $prev_auth_enabled && $new_auth_enabled ) {
			return;
		}

		// Disabled.
		// Or if we've enabled it, we'll remove it first just in case.
		$this->remove_basic_auth_htaccess();

		// It was enabled.
		if ( ! $prev_auth_enabled && $new_auth_enabled ) {
			$this->add_basic_auth_htaccess();
			return;
		}
	}

	protected function add_basic_auth_htaccess() {
		$filesystem = Helper::get_file_system();

		if ( ! $filesystem ) {
			return false;
		}

		$htaccess_path = trailingslashit( ABSPATH ) . '.htaccess';

		if ( ! $filesystem->exists( $htaccess_path ) ) {
			return false;
		}

		$htaccess = $filesystem->get_contents( $htaccess_path );
		$htaccess = preg_replace(
			"/RewriteEngine On/s",
			"RewriteEngine On\nRewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]",
			$htaccess
		);

		$htaccess = preg_replace("/\n+/", "\n", $htaccess);
		$filesystem->put_contents( $htaccess_path, $htaccess );
	}

	protected function remove_basic_auth_htaccess() {
		$filesystem = Helper::get_file_system();

		if ( ! $filesystem ) {
			return false;
		}

		$htaccess_path = trailingslashit( ABSPATH ) . '.htaccess';

		if ( ! $filesystem->exists( $htaccess_path ) ) {
			return false;
		}

		$htaccess = $filesystem->get_contents( $htaccess_path );
		$htaccess = preg_replace(
			"/RewriteRule \.\* - \[E=HTTP_AUTHORIZATION:%\{HTTP:Authorization\}\]/s",
			"",
			$htaccess
		);
		$htaccess = preg_replace("/\n+/", "\n", $htaccess);
		$filesystem->put_contents( $htaccess_path, $htaccess );
	}

	/**
	 * Check if Basic Auth is enabled and show form if needed.
	 *
	 * @return void
	 */
	public function auth() {
		$options = Options::instance();

		$enabled = $options->get( 'http_basic_auth_on' );

		if ( ! $enabled ) {
			return;
		}

		$auth_username = $options->get( 'http_basic_auth_username' );
		$auth_password = $options->get( 'http_basic_auth_password' );

		if ( ! $auth_username || ! $auth_password ) {
			return;
		}

		if ( ! isset( $_SERVER['PHP_AUTH_USER'] ) ) {
			$this->send_headers();
		}

		if ( ! isset( $_SERVER['PHP_AUTH_PW'] ) ) {
			$this->send_headers();
		}

		if ( $_SERVER['PHP_AUTH_USER'] !== $auth_username ) {
			$this->send_headers();
		}

		if ( $_SERVER['PHP_AUTH_PW'] !== $auth_password ) {
			$this->send_headers();
		}
	}

	/**
	 * Send Unauthorized headers.
	 *
	 * @return void
	 */
	protected function send_headers() {
		header( 'HTTP/1.1 401 Unauthorized' );
		header( 'WWW-Authenticate: Basic realm="Website"' );
		exit;
	}
}