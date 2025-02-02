<?php

namespace simply_static_pro;

use Simply_Static\Util;
use Simply_Static\Options;

/**
 * Class to handle admin for forms.
 */
class Form_Settings {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Form_Settings.
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
	 * Constructor for Form_Settings.
	 */
	public function __construct() {
		$options = get_option( 'simply-static' );

		if ( empty( $options['use_forms'] ) ) {
			return;
		}

		add_action( 'init', array( $this, 'add_forms_post_type' ) );
		add_action( 'save_post_ssp-form', array( $this, 'update_config' ), 10, 3 );
		add_action( 'admin_menu', array( $this, 'add_submenu_page' ), 50 );
		add_filter( 'manage_ssp-form_posts_columns', array( $this, 'set_columns' ) );
		add_action( 'manage_ssp-form_posts_custom_column', array( $this, 'set_columns_content' ), 10, 2 );
		add_filter( 'simply_static_class_name', array( $this, 'check_class_name' ), 30, 2 );
		add_filter( 'parent_file', array( $this, 'show_parent_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_form_settings_scripts' ) );

		// Any form integrations using webhooks?
		$forms = get_posts( array(
			'post_type'  => 'ssp-form',
			'meta_query' => array(
				array(
					'key'   => 'form_type',
					'value' => 'webhook',
				),
			),
		) );

		if ( ! empty( $forms ) ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'add_webhook_scripts' ) );
		}
	}

	public function add_form_settings_scripts() {
		$screen = get_current_screen();

		if ( 'ssp-form' !== $screen->id ) {
			return;
		}

		wp_enqueue_script( 'simplystatic-forms', SIMPLY_STATIC_PRO_URL . '/src/form/build/index.js', array(
			'wp-api',
			'wp-components',
			'wp-element',
			'wp-api-fetch',
			'wp-data',
			'wp-i18n',
			'wp-block-editor'
		), SIMPLY_STATIC_PRO_VERSION, true );

		$post_id = get_the_id();

		$meta = array(
			'form_installation'    => get_post_meta( $post_id, 'form_installation', true ),
			'form_type'            => get_post_meta( $post_id, 'form_type', true ),
			'form_plugin'          => get_post_meta( $post_id, 'form_plugin', true ),
			'form_id'              => get_post_meta( $post_id, 'form_id', true ),
			'form_webhook'         => get_post_meta( $post_id, 'form_webhook', true ),
			'form_custom_css'      => get_post_meta( $post_id, 'form_custom_css', true ),
			'form_shortcode'       => get_post_meta( $post_id, 'form_shortcode', true ),
			'form_success_message' => get_post_meta( $post_id, 'form_success_message', true ),
			'form_error_message'   => get_post_meta( $post_id, 'form_error_message', true ),
			'form_use_redirect'    => get_post_meta( $post_id, 'form_use_redirect', true ),
			'form_redirect_url'    => get_post_meta( $post_id, 'form_redirect_url', true )
		);

		$args = apply_filters( 'ssp_forms_args', array(
			'screen'  => 'simplystatic-forms',
			'meta'    => $meta,
			'post_id' => $post_id
		) );

		wp_localize_script( 'simplystatic-forms', 'forms', $args );

		// Make the blocks translatable.
		if ( function_exists( 'wp_set_script_translations' ) ) {
			wp_set_script_translations( 'simplystatic-forms', 'simply-static', SIMPLY_STATIC_PRO_PATH . '/languages' );
		}

		wp_enqueue_style( 'simplystatic-forms-style', SIMPLY_STATIC_PRO_URL . '/src/form/build/style-index.css', array( 'wp-components' ) );
	}

	/**
	 * Enqueue scripts for webhooks.
	 *
	 * @return void
	 */
	public function add_webhook_scripts() {
		wp_enqueue_script( 'ssp-form-webhook-public', SIMPLY_STATIC_PRO_URL . '/assets/ssp-form-webhook-public.js', array(), SIMPLY_STATIC_PRO_VERSION, true );
	}

	/**
	 * Highlight parent menu when editing ssp form post.
	 *
	 * @param string $parent given parent.
	 *
	 * @return string
	 */
	public function show_parent_menu( $parent = '' ) {
		global $pagenow, $typenow;

		// If we're editing the form settings, we must be within the SS menu, so highlight that.
		if ( ( $pagenow === 'post.php' || $pagenow === 'post-new.php' ) && ( $typenow === 'ssp-form' ) ) {
			$parent = 'simply-static-generate';
		}

		return $parent;
	}

	/**
	 * Add submenu page for builds taxonomy.
	 *
	 * @return void
	 */
	public function add_submenu_page() {
		add_submenu_page(
			'simply-static-generate',
			__( 'Forms', 'simply-static-pro' ),
			__( 'Forms', 'simply-static-pro' ),
			apply_filters( 'ss_user_capability', 'publish_pages', 'forms' ),
			'edit.php?post_type=ssp-form',
			false
		);
	}

	/**
	 * Create forms custom post type.
	 *
	 * @see register_post_type() for registering custom post types.
	 */
	public function add_forms_post_type() {
		$labels = array(
			'name'                  => _x( 'Forms', 'Post type general name', 'simply-static-pro' ),
			'singular_name'         => _x( 'Form', 'Post type singular name', 'simply-static-pro' ),
			'menu_name'             => _x( 'Forms', 'Admin Menu text', 'simply-static-pro' ),
			'name_admin_bar'        => _x( 'Form', 'Add New on Toolbar', 'simply-static-pro' ),
			'add_new'               => __( 'Add New', 'simply-static-pro' ),
			'add_new_item'          => __( 'Add New Form', 'simply-static-pro' ),
			'new_item'              => __( 'New Form', 'simply-static-pro' ),
			'edit_item'             => __( 'Edit Form', 'simply-static-pro' ),
			'view_item'             => __( 'View Form', 'simply-static-pro' ),
			'all_items'             => __( 'All Forms', 'simply-static-pro' ),
			'search_items'          => __( 'Search Forms', 'simply-static-pro' ),
			'parent_item_colon'     => __( 'Parent Forms:', 'simply-static-pro' ),
			'not_found'             => __( 'No forms found.', 'simply-static-pro' ),
			'not_found_in_trash'    => __( 'No forms found in Trash.', 'simply-static-pro' ),
			'featured_image'        => _x( 'Form Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'simply-static-pro' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'simply-static-pro' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'simply-static-pro' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'simply-static-pro' ),
			'archives'              => _x( 'Form archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'simply-static-pro' ),
			'insert_into_item'      => _x( 'Insert into form', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'simply-static-pro' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this form', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'simply-static-pro' ),
			'filter_items_list'     => _x( 'Filter forms list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'simply-static-pro' ),
			'items_list_navigation' => _x( 'Forms list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'simply-static-pro' ),
			'items_list'            => _x( 'Forms list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'simply-static-pro' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'supports'           => array( 'title' ),
		);

		register_post_type( 'ssp-form', $args );

		// We need to flush permalinks.
		flush_rewrite_rules();
	}

	/**
	 * Set column headers.
	 *
	 * @param array $columns array of columns.
	 *
	 * @return array
	 */
	public function set_columns( array $columns ): array {
		unset( $columns['date'] );

		$columns['form_type']   = esc_html__( 'Form Type', 'simply-static-pro' );
		$columns['form_plugin'] = esc_html__( 'Form Plugin', 'simply-static-pro' );
		$columns['form_id']     = esc_html__( 'Form ID', 'simply-static-pro' );

		return $columns;
	}

	/**
	 * Add content to registered columns.
	 *
	 * @param string $column name of the column.
	 * @param int $post_id current id.
	 *
	 * @return void
	 */
	public function set_columns_content( string $column, int $post_id ): void {
		switch ( $column ) {
			case 'form_type':
				$form_type    = get_post_field( 'form_type', $post_id );
				$form_webhook = get_post_field( 'form_webhook', $post_id );

				if ( 'embedded' === $form_type ) {
					esc_html_e( 'Embedded', 'simply-static-pro' );
				} else {
					echo 'Webhook ' . ( ! empty( $form_webhook ) ? ' (' . esc_url( $form_webhook ) . ')' : '' );
				}
				break;
			case 'form_plugin':
				$form_plugins = array(
					'cf7'             => 'Contact Form 7',
					'wp_forms'        => 'WP Forms',
					'gravity_forms'   => 'Gravity Forms',
					'elementor_forms' => 'Elementor Forms',
					'ws_form'         => 'WS Form',
					'fluent_forms'    => 'Fluent Forms',
				);

				$form_plugin_slug = get_post_field( 'form_plugin', $post_id );

				echo esc_html( $form_plugins[ $form_plugin_slug ] );
				break;
			case 'form_id':
				echo esc_html( get_post_field( 'form_id', $post_id ) );
				break;
		}
	}

	/**
	 * Modify task class name in Simply Static.
	 *
	 * @param string $class_name current class name.
	 * @param string $task_name current task name.
	 *
	 * @return string
	 */
	public function check_class_name( $class_name, $task_name ) {
		if ( 'form_config' === $task_name ) {
			return 'simply_static_pro\\' . ucwords( $task_name ) . '_Task';
		}

		return $class_name;
	}

	/**
	 * Update form config if ssp-form post is saved.
	 *
	 *
	 * @return void
	 */
	public function update_config() {
		$this->create_config_file();
	}

	/**
	 * Create JSON file for forms config.
	 *
	 * @return string;
	 */
	public function create_config_file() {
		$filesystem = Helper::get_file_system();

		if ( ! $filesystem ) {
			return false;
		}

		// Get config file path.
		$upload_dir  = wp_upload_dir();
		$config_dir  = $upload_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'configs' . DIRECTORY_SEPARATOR;
		$config_file = $config_dir . 'forms.json';

		// Delete old index.
		if ( file_exists( $config_file ) ) {
			wp_delete_file( $config_file );
		}

		// Get static form configurations.
		$args      = array( 'numberposts' => - 1, 'post_type' => 'ssp-form', 'fields' => 'ids' );
		$ssp_forms = get_posts( $args );
		$forms     = array();

		// Replace WP Url with static URL.
		$regex = '/(https?:)?\/\/' . addcslashes( Util::origin_host(), '/' ) . '/i';

		switch ( Options::instance()->get( 'destination_url_type' ) ) {
			case 'absolute':
				$convert_to = Options::instance()->get_destination_url();
				break;
			case 'relative':
				// Adding \/? before end of regex pattern to convert url.com/ & url.com to relative path, ex. /path/.
				$regex      = '/(https?:)?\/\/' . addcslashes( Util::origin_host(), '/' ) . '\/?/i';
				$convert_to = Options::instance()->get( 'relative_path' );
				break;
			default:
				// Offline mode.
				// Adding \/? before end of regex pattern to convert url.com/ & url.com to relative path, ex. /path/.
				$regex      = '/(https?:)?\/\/' . addcslashes( Util::origin_host(), '/' ) . '\/?/i';
				$convert_to = '/';
		}

		if ( ! empty( $ssp_forms ) ) {
			foreach ( $ssp_forms as $form_id ) {
				$form                       = new \stdClass();
				$form->form_type            = get_post_meta( $form_id, 'form_type', true );
				$form->form_plugin          = get_post_meta( $form_id, 'form_plugin', true );
				$form->form_id              = get_post_meta( $form_id, 'form_id', true );
				$form->form_webhook         = get_post_meta( $form_id, 'form_webhook', true );
				$form->form_success_message = get_post_meta( $form_id, 'form_success_message', true );
				$form->form_error_message   = get_post_meta( $form_id, 'form_error_message', true );
				$form->form_use_redirect    = get_post_meta( $form_id, 'form_use_redirect', true );
				$form->form_redirect_url    = preg_replace( $regex, $convert_to, html_entity_decode( get_post_meta( $form_id, 'form_redirect_url', true ) ) );

				$forms[] = $form;
			}
		}

		// Now create the json file.
		$json = wp_json_encode( $forms );

		// Check if directory exists.
		if ( ! is_dir( $config_dir ) ) {
			wp_mkdir_p( $config_dir );
		}

		$filesystem->put_contents( $config_file, $json );

		return $config_file;
	}
}
