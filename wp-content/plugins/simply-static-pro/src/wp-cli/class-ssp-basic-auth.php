<?php

namespace simply_static_pro\commands;

use Simply_Static\Options;
use Simply_Static\Util;
use simply_static_pro\Form_Settings;

/**
 * Manage Basic Auth
 */
class Basic_Auth {

	/**
	 * Show status of Basic Auth
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static basic-auth status
	 *
	 * @when after_wp_load
	 */
	function status( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$static_options = Options::instance();

		$enabled = $static_options->get( 'http_basic_auth_on' );

		if ( $enabled ) {
			\WP_CLI::line( 'Basic Auth is enabled.' );
		} else {
			\WP_CLI::line( 'Basic Auth is disabled.' );
		}

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Disable Basic Auth
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static basic-auth disable
	 *
	 * @when after_wp_load
	 */
	function disable( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$static_options = Options::instance();

		$static_options->set( 'http_basic_auth_on', 0 );
		$static_options->save();

		\WP_CLI::line( 'Basic Auth is disabled.' );

		$this->maybe_restore_blog( $options );
	}
}