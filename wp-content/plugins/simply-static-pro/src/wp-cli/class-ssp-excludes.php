<?php

namespace simply_static_pro\commands;

use Simply_Static\Options;
use Simply_Static\Util;

/**
 * Manage Excluding of URLs
 */
class Excludes {

	/**
	 * Show all saved URLs to be excluded when exporting.
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static excludes list_urls
	 *
	 * @when after_wp_load
	 */
	function list_urls( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$plugin_options = Options::instance();
		$urls           = $plugin_options->get( 'urls_to_exclude' );

		\WP_CLI\Utils\format_items( 'table', $urls, [ 'url', 'do_not_save', 'do_not_follow' ] );

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
	 * [--do_not_follow=<do_not_follow>]
	 * : Do not use this page to find additional URLs for processing
	 * ---
	 * default: 1
	 * options:
	 *   - 1
	 *   - 0
	 * ---
	 *
	 * [--do_not_save=<do_not_save>]
	 * : do not save a static copy of the page/file
	 * ---
	 * default: 1
	 * options:
	 *   - 1
	 *   - 0
	 * ---
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static excludes add_url https://url.com/to/exclude
	 *     wp simply-static excludes add_url https://url.com/to/exclude --do_not_follow=0
	 *
	 * @when after_wp_load
	 */
	function add_url( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$this->add( $args[0], $options['do_not_follow'], $options['do_not_save'] );

		$this->maybe_restore_blog( $options );
	}

	/**
	 * Update an URL to the included URLs.
	 *
	 * ## OPTIONS
	 *
	 * <url>
	 * : URL to be updated to the list.
	 *
	 * [--do_not_follow=<do_not_follow>]
	 * : Do not use this page to find additional URLs for processing
	 * ---
	 * default: 1
	 * options:
	 *   - 1
	 *   - 0
	 * ---
	 *
	 * [--do_not_save=<do_not_save>]
	 * : do not save a static copy of the page/file
	 * ---
	 * default: 1
	 * options:
	 *   - 1
	 *   - 0
	 * ---
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static excludes add_url https://url.com/to/exclude
	 *     wp simply-static excludes add_url https://url.com/to/exclude --do_not_follow=0
	 *
	 * @when after_wp_load
	 */
	function update_url( $args, $options ) {
		if ( ! isset( $options['do_not_follow'] ) ) {
			\WP_CLI::line( 'Option --do_not_follow not set. Will be updated to 1' );
		}

		if ( ! isset( $options['do_not_save'] ) ) {
			\WP_CLI::line( 'Option --do_not_save not set. Will be updated to 1' );
		}

		$plugin_options = Options::instance();
		$excludes       = $plugin_options->get( 'urls_to_exclude' );

		if ( ! isset( $excludes[ $args[0] ] ) ) {
			\WP_CLI::error( 'This URL does not exist in the URLs to exclude. Consider adding it.' );
		}

		$this->add_url( $args, $options );
	}

	/**
	 * Remove an URL from the excluded URLs.
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

		$this->remove( $args[0] );

		$this->maybe_restore_blog( $options );
	}

	protected function update( $value, $name ) {
		$options = Options::instance();
		$options->set( $name, $value );
		$options->save();
	}

	protected function add( $url, $do_not_follow = 1, $do_not_save = 1 ) {
		$plugin_options = Options::instance();
		$excludes       = $plugin_options->get( 'urls_to_exclude' );
		$exists         = 0;
		if ( ! $excludes ) {
			$excludes = [];
		}

		if ( isset( $excludes[ $url ] ) ) {
			\WP_CLI::line( $url . ' is already added. Updating it...' );
			$exists = 1;
		}

		$excludes[ $url ] = [
			'url'           => $url,
			'do_not_follow' => $do_not_follow,
			'do_not_save'   => $do_not_save
		];

		$this->update( $excludes, 'urls_to_exclude' );

		if ( ! $exists ) {
			\WP_CLI::success( $url . ' added.' );

			return;
		}

		\WP_CLI::success( $url . ' updated.' );
	}

	protected function remove( $url ) {
		$plugin_options = Options::instance();
		$excludes       = $plugin_options->get( 'urls_to_exclude' );

		if ( ! isset( $excludes[ $url ] ) ) {
			\WP_CLI::line( 'Such URL not saved. Nothing to remove.' );

			return;
		}

		unset( $excludes[ $url ] );

		$this->update( $excludes, 'urls_to_exclude' );
		\WP_CLI::success( $url . ' removed.' );
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