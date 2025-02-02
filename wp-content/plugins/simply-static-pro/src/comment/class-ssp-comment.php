<?php

namespace simply_static_pro;

use Simply_Static\Page;
use Simply_Static\Plugin;

/**
 * Class to handle comments.
 */
class Comment {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Comment.
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
	 * Constructor for Comment.
	 */
	public function __construct() {
		add_filter( 'comment_form_default_fields', array( $this, 'filter_comment_default_fields' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'add_comment_scripts' ) );
		add_action( 'comment_post', array( $this, 'export_comment_post' ), 10, 2 );
	}

	/**
	 * Enqueue scripts for webhooks.
	 *
	 * @return void
	 */
	public function add_comment_scripts() {
		$options      = get_option( 'simply-static' );
		$use_comments = $options['use_comments'] ?? false;

		if ( $use_comments ) {
			wp_enqueue_script( 'ssp-comment-webhook', SIMPLY_STATIC_PRO_URL . '/assets/ssp-comment-webhook.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
		}
	}

	/**
	 * Filter comment form action.
	 *
	 * @param array $fields list of fields for the comment form.
	 *
	 * @return array
	 */
	public function filter_comment_default_fields( $fields ) {
		$options      = get_option( 'simply-static' );
		$use_comments = $options['use_comments'] ?? false;

		if ( $use_comments ) {
			unset( $fields['url'] );
			unset( $fields['cookies'] );
		}

		return $fields;
	}

	/**
	 * Run post export.
	 *
	 * @param int $comment_id given comment id.
	 * @param bool $comment_approved is comment approved?
	 *
	 * @return void
	 */
	public function export_comment_post( $comment_id, $comment_approved ) {
		if ( $comment_approved ) {
			$comment = get_comment( $comment_id );
			$post    = get_post( $comment->comment_post_ID );

			// Update option for using single.
			update_option( 'simply-static-use-single', $post->ID );

			// Clear records before run the export.
			Page::query()->delete_all();

			// Add URLs.
			Single::get_instance()->add_url( $post->ID );

			do_action( 'ssp_before_run_single' );

			// Start static export.
			$ss = Plugin::instance();
			$ss->run_static_export();
		}
	}
}
