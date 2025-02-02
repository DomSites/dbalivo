<?php

namespace simply_static_pro;

/**
 * Class to handle form integration templates.
 */
class Form_Template_Handler {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Form_Template_Handler.
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
	 * Constructor for Form_Template_Handler.
	 */
	public function __construct() {
		add_filter( 'single_template', array( $this, 'set_form_connection_template' ) );
	}


	public function set_form_connection_template( $single ) {
		global $post;

		if ( $post->post_type == 'ssp-form' ) {
			if ( file_exists( SIMPLY_STATIC_PRO_PATH . '/src/form/templates/ssp-form-single.php' ) ) {
				return SIMPLY_STATIC_PRO_PATH . '/src/form/templates/ssp-form-single.php';
			}
		}

		return $single;
	}
}
