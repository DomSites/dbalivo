<?php

namespace simply_static_pro;

use Simply_Static;

/**
 * Class to handle settings for cors.
 */
class CORS {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of CORS.
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
	 * Constructor for CORS.
	 */
	public function __construct() {
		add_filter( 'allowed_http_origins', array( $this, 'add_allowed_origins' ) );
		add_filter( 'wp_headers', array( $this, 'send_cors_headers' ), 11, 1 );
		add_action( 'init', array( $this, 'handle_cors_on_init' ) );
	}

	/**
	 * Add static URL to allowed origins.
	 *
	 * @param array $origins list of allowed origins.
	 *
	 * @return array
	 */
	public function add_allowed_origins( $origins ) {
		$options    = get_option( 'simply-static' );
		$static_url = '';

		if ( ! empty( $options['static_url'] ) ) {
			$static_url = $options['static_url'];
		}

		if ( ! empty( $static_url ) && isset( $options['fix_cors'] ) ) {
			if ( 'allowed_http_origins' === $options['fix_cors'] ) {
				$origins[] = $options['static_url'];
			}
		}

		return $origins;
	}

	/**
	 * Send CORS via wp_header.
	 *
	 * @param array $headers current headers.
	 *
	 * @return array
	 */
	public function send_cors_headers( $headers ) {
		$options    = get_option( 'simply-static' );
		$static_url = '';

		if ( ! empty( $options['static_url'] ) ) {
			$static_url = $options['static_url'];
		}

		if ( ! empty( $static_url ) && isset( $options['fix_cors'] ) ) {
			if ( 'wp_headers' === $options['fix_cors'] ) {
				$allowed_domains = apply_filters( 'ssp_allowed_cors_origins', array( $static_url ) );

				if ( isset( $_SERVER['HTTP_ORIGIN'] ) ) {
					if ( ! in_array( $_SERVER['HTTP_ORIGIN'], $allowed_domains ) ) {
						return $headers;
					}
					$headers['Access-Control-Allow-Origin'] = $_SERVER['HTTP_ORIGIN'];
				}
			}
		}

		return $headers;
	}

	/**
	 * Handle CORS on init.
	 *
	 * @return void
	 */
	public function handle_cors_on_init() {
		$options    = get_option( 'simply-static' );
		$origin     = get_http_origin();
		$static_url = '';

		if ( ! empty( $options['static_url'] ) ) {
			$static_url = $options['static_url'];
		}

		if ( ! empty( $static_url ) ) {
			if ( $origin === $static_url ) {
				header( 'Access-Control-Allow-Origin: ' . $static_url );
				header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE' );
				header( 'Access-Control-Allow-Credentials: true' );
				header( 'Access-Control-Allow-Headers: Origin, X-Requested-With, X-WP-Nonce, Content-Type, Accept, Authorization ' );

				if ( 'OPTIONS' == $_SERVER['REQUEST_METHOD'] ) {
					status_header( 200 );
					exit();
				}
			}
		}
	}
}
