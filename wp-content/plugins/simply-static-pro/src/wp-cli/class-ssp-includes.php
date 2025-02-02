<?php

namespace simply_static_pro\commands;

use Simply_Static\Options;
use Simply_Static\Util;

/**
 * Manage Including of URLs and Files
 */
class Includes {

	/**
	 * Show all saved URLs to include when exporting.
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes list_urls
	 *
	 * @when after_wp_load
	 */
	function list_urls( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$plugin_options = Options::instance();
		$urls           = $plugin_options->get( 'additional_urls' );

		\WP_CLI::line( $urls );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Show all saved paths to files or directories to include when exporting.
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes list_files
	 *
	 * @when after_wp_load
	 */
	function list_files( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$plugin_options = Options::instance();
		$paths          = $plugin_options->get( 'additional_files' );

		\WP_CLI::line( $paths );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Add an URL to the included URLs.
	 *
	 * ## OPTIONS
	 *
	 * <url>
	 * : URL to be add to the list.
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes add_url https://url.com/to/remove
	 *
	 * @when after_wp_load
	 */
	function add_url( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$this->add( $args[0], 'additional_urls' );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Add path to a file or directory to the included Files & Directories.
	 *
	 * ## OPTIONS
	 *
	 * <path>
	 * : Path to be add to the list.
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static update includes add_file https://url.com/to/remove
	 *
	 * @when after_wp_load
	 */
	function add_file( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$this->add( $args[0], 'additional_files' );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Remove path to a file or directory from the included Files & Directories.
	 *
	 * ## OPTIONS
	 *
	 * <path>
	 * : Path to be removed from the list.
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes remove_file https://url.com/to/remove
	 *
	 * @when after_wp_load
	 */
	function remove_file( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$this->remove( $args[0], 'additional_files' );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Remove an URL from the included URLs.
	 *
	 * ## OPTIONS
	 *
	 * <url>
	 * : URL to be removed from the list.
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes remove_url https://url.com/to/remove
	 *
	 * @when after_wp_load
	 */
	function remove_url( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$this->remove( $args[0], 'additional_urls' );

		$this->maybe_restore_blog( $options );
	}

	protected function update( $value, $name ) {
		$options = Options::instance();
		$options->set( $name, $value );
		$options->save();
	}

	protected function add( $value, $option_name ) {
		$plugin_options = Options::instance();
		$values         = $plugin_options->get( $option_name );

		if ( ! $values ) {
			$values = [];
		} else {
			$values = Util::string_to_array( $values );
		}

		$index = array_search( $value, $values );

		if ( $index >= 0 ) {
			\WP_CLI::line( $value . ' is already added.' );

			return;
		}

		$values[] = $value;
		$values   = implode( "\n", $values );
		$this->update( $values, $option_name );
		\WP_CLI::success( $value . ' added.' );
	}

	protected function remove( $value, $option_name ) {
		$plugin_options = Options::instance();
		$values         = $plugin_options->get( $option_name );

		if ( ! $values ) {
			\WP_CLI::line( 'Nothing saved before. Nothing to remove.' );

			return;
		}

		$values = Util::string_to_array( $values );
		$index  = array_search( $value, $values );

		if ( $index < 0 ) {
			\WP_CLI::line( 'Nothing found. Nothing to remove.' );

			return;
		}

		unset( $values[ $index ] );
		$values = implode( "\n", $values );
		$this->update( $values, $option_name );
		\WP_CLI::success( $value . ' removed.' );
	}

	protected function maybe_switch_blog( $options ) {
		if ( ! is_multisite() ) {
			return;
		}

		if ( ! isset( $options['blog_id'] ) || ! absint( $options['blog_id'] ) ) {
			return;
		}

		switch_to_blog( absint( $options['blog_id'] ) );
	}

	protected function maybe_restore_blog( $options ) {
		if ( ! is_multisite() ) {
			return;
		}

		if ( ! isset( $options['blog_id'] ) || ! absint( $options['blog_id'] ) ) {
			return;
		}

		restore_current_blog();
	}

}