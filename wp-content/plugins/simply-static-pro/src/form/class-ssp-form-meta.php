<?php

namespace simply_static_pro;

/**
 * Class to handle meta for forms.
 */
class Form_Meta {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Form_Meta.
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
	 * Constructor for Form_Meta.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'init', array( $this, 'register_meta_fields' ) );
		add_action( 'init', array( $this, 'migrate_meta_fields' ) );
		add_action( 'rest_api_init', array( $this, 'rest_api_init' ) );
		add_filter( 'ssh_single_export_post_types', array( $this, 'exclude_forms_post_type' ) );
	}

	/**
	 * Adds the meta box container.
	 *
	 * @return void
	 */
	public function add_meta_boxes() {
		add_meta_box( 'form-configuration', __( 'Set up your static form', 'simply-static-pro' ), array(
			$this,
			'render_form_container'
		), 'ssp-form', 'normal', 'high' );
	}

	/**
	 * Register meta fields in WordPress.
	 *
	 * @return void
	 */
	public function register_meta_fields() {
		register_meta( 'post', 'form_installation', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
            'default'        => 'online',
		) );

		register_meta( 'post', 'form_type', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
            'default'        => 'embedded',
		) );

		register_meta( 'post', 'form_plugin', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );

		register_meta( 'post', 'form_id', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );

		register_meta( 'post', 'form_webhook', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );

		register_meta( 'post', 'form_shortcode', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );

		register_meta( 'post', 'form_custom_css', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );

		register_meta( 'post', 'form_success_message', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
			'default'        => __('Your message was sent successfully.', 'simply-static-pro'),
		) );

		register_meta( 'post', 'form_error_message', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
			'default'        => __('There was an error with your submission. Please review the fields, correct any errors and try again.', 'simply-static-pro'),
		) );

		register_meta( 'post', 'form_use_redirect', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
            'default'        => false,
            'type'           => 'boolean',
		) );

		register_meta( 'post', 'form_redirect_url', array(
			'object_subtype' => 'ssp-form',
			'single'         => true,
			'show_in_rest'   => true,
		) );
	}

	/**
	 * Maybe migrate old meta fields.
	 *
	 * @return void
	 */
	public function migrate_meta_fields() {
		$options = get_option( 'simply-static' );

        // Skip if already migrated.
		if ( ! empty( $options['form_migration'] ) ) {
			return;
		}

		$args      = array( 'numberposts' => - 1, 'post_type' => 'ssp-form', 'fields' => 'ids' );
		$ssp_forms = get_posts( $args );

		foreach ( $ssp_forms as $form_id ) {
			$old_meta_fields = array(
				'tool'         => get_post_meta( $form_id, 'tool', true ),
				'form-id'      => get_post_meta( $form_id, 'form_id', true ),
				'endpoint'     => get_post_meta( $form_id, 'endpoint', true ),
				'redirect-url' => get_post_meta( $form_id, 'redirect_url', true ),
			);

			if ( empty( $old_meta_fields['tool'] ) ) {
				$old_meta_fields['tool'] = 'cf7';
			}

			// Update new fields.
			update_post_meta( $form_id, 'form_plugin', $old_meta_fields['tool'] );
			update_post_meta( $form_id, 'form_id', $old_meta_fields['form-id'] );
			update_post_meta( $form_id, 'form_webhook', $old_meta_fields['endpoint'] );
			update_post_meta( $form_id, 'form_redirect_url', $old_meta_fields['redirect-url'] );
			update_post_meta( $form_id, 'form_use_redirect', true );

			// Now delete old meta fields.
			delete_post_meta( $form_id, 'tool' );
			delete_post_meta( $form_id, 'email' );
			delete_post_meta( $form_id, 'subject' );
			delete_post_meta( $form_id, 'name_attributes' );
			delete_post_meta( $form_id, 'message' );
			delete_post_meta( $form_id, 'additional_headers' );
		}

		// Disable migration.
		$options['form_migration'] = true;
		update_option( 'simply-static', $options );
	}

	/**
	 * Render form configuration metabox.
	 *
	 */
	public function render_form_container() {
		?>
        <div id="ssp-forms"></div>
		<?php
	}

	/**
	 * Register custom Rest API routes.
	 *
	 * @return void
	 */
	public function rest_api_init() {
		register_rest_route( 'simplystatic/v1', '/meta', array(
			'methods'             => 'POST',
			'callback'            => [ $this, 'save_meta' ],
			'permission_callback' => function () {
				return current_user_can( apply_filters( 'ss_user_capability', 'manage_options', 'update-form-meta' ) );
			},
		) );

		register_rest_route( 'simplystatic/v1', '/meta', array(
			'methods'             => 'GET',
			'callback'            => [ $this, 'get_meta' ],
			'permission_callback' => function () {
				return current_user_can( apply_filters( 'ss_user_capability', 'manage_options', 'get-form-meta' ) );
			},
		) );
	}

	/**
	 * Save meta via Rest API.
	 *
	 * @param object $request given request.
	 *
	 * @return false|string|void
	 */
	public function save_meta( object $request ) {
		if ( $request->get_params() ) {
			$params   = $request->get_params();
			$post_id  = esc_html( $params['post_id'] );
			$meta_key = esc_html( $params['meta_key'] );

			// Check which action to perform.
			if ( isset( $params['meta_value'] ) ) {
				$meta_value = sanitize_meta( $meta_key, $params['meta_value'], 'post' );
				update_post_meta( $post_id, $meta_key, $meta_value );
			} else if ( isset( $params['delete'] ) ) {
				delete_post_meta( $post_id, $meta_key );
			}

			return wp_json_encode( [ "status" => 200, "message" => "Ok" ] );
		}
	}

	/**
	 * Get meta via Rest API.
	 *
	 * @param object $request given request.
	 *
	 * @return false|string|void
	 */
	public function get_meta( object $request ) {
		if ( $request->get_params() ) {
			$params   = $request->get_params();
			$post_id  = esc_html( $params['post_id'] );
			$meta_key = esc_html( $params['meta_key'] );

			$meta = get_post_meta( $post_id, $meta_key, true );

			if ( ! empty( $meta ) ) {
				return wp_json_encode( [ "status" => 200, "message" => "Ok", "data" => $meta ] );
			} else {
				return wp_json_encode( [ "status" => 400, "message" => "Empty value", "data" => '' ] );
			}
		}
	}

	/**
	 * Exclude single export metabox from forms.
	 *
	 * @param array $post_types given list of post types.
	 *
	 * @return array
	 */
	public function exclude_forms_post_type( $post_types ) {
		if ( isset( $post_types['ssp-form'] ) ) {
			unset( $post_types['ssp-form'] );
		}

		return $post_types;
	}
}
