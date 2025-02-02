<?php

namespace simply_static_pro;

use Simply_Static;

/**
 * Class to handle admin for builds.
 */
class Build_Settings {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Build_Settings.
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
	 * Constructor for Build_Settings.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'add_build_taxonomy' ) );
		add_filter( 'parent_file', array( $this, 'show_parent_menu' ) );
		add_action( 'admin_menu', array( $this, 'add_submenu_page' ), 60 );
		add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ) );
		add_action( 'ssp-build_edit_form', array( $this, 'hide_default_metaboxes' ) );
		add_action( 'ssp-build_add_form', array( $this, 'hide_default_metaboxes' ) );
		add_filter( 'manage_edit-ssp-build_columns', array( $this, 'unregister_admin_columns' ) );
	}

	/**
	 * Enqueue admin scripts.
	 */
	public function add_admin_scripts() {
		$screen = get_current_screen();

		if ( 'edit-tags' === $screen->base && 'ssp-build' === $screen->taxonomy || 'edit-ssp-build' === $screen->id ) {
			wp_enqueue_script( 'ssp-build-admin', SIMPLY_STATIC_PRO_URL . '/assets/ssp-build-admin.js', array( 'jquery' ), SIMPLY_STATIC_PRO_VERSION, true );

			wp_localize_script(
				'ssp-build-admin',
				'sspb_ajax',
				array(
					'ajax_url'           => admin_url() . 'admin-ajax.php',
					'run_build_nonce'    => wp_create_nonce( 'ssp-run-build' ),
					'delete_build_nonce' => wp_create_nonce( 'ssp-delete-build' ),
					'redirect_url'       => admin_url() . 'admin.php?page=simply-static',
					'delete_success'     => esc_html__( 'Successfully deleted files.', 'simply-static-pro' ),
					'delete_error'       => esc_html__( 'There was a problem deleting the files.', 'simply-static-pro' ),
					'rest_nonce'         => wp_create_nonce( 'wp_rest' ),
					'button_exporting'   => __( 'Export in Progress', 'simply-static-pro' ),
				)
			);
		}
	}

	/**
	 * Highlight parent menu when editing ssp form post.
	 *
	 * @param string $parent given parent.
	 *
	 * @return string
	 */
	public function show_parent_menu( $parent = '' ) {
		global $pagenow, $typenow, $taxnow;

		if ( ( ( $pagenow === 'edit-tags.php' ) || ( $pagenow === 'term.php' ) ) && ( $taxnow === 'ssp-build' ) ) {
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
			__( 'Builds', 'simply-static-pro' ),
			__( 'Builds', 'simply-static-pro' ),
			apply_filters( 'ss_user_capability', 'publish_pages', 'builds' ),
			'edit-tags.php?taxonomy=ssp-build',
			false
		);
	}

	/**
	 * Create two taxonomies, genres and writers for the post type "book".
	 *
	 * @see register_post_type() for registering custom post types.
	 */
	public function add_build_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Builds', 'taxonomy general name', 'simply-static-pro' ),
			'singular_name'              => _x( 'Build', 'taxonomy singular name', 'simply-static-pro' ),
			'search_items'               => __( 'Search Builds', 'simply-static-pro' ),
			'popular_items'              => __( 'Popular Builds', 'simply-static-pro' ),
			'all_items'                  => __( 'All Builds', 'simply-static-pro' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'name_field_description'     => __( 'Name of the build', 'simply-static-pro' ),
			'back_to_items'              => __( 'Back to Builds', 'simply-static-pro' ),
			'edit_item'                  => __( 'Edit Build', 'simply-static-pro' ),
			'update_item'                => __( 'Update Build', 'simply-static-pro' ),
			'add_new_item'               => __( 'Add New Build', 'simply-static-pro' ),
			'new_item_name'              => __( 'New Build Name', 'simply-static-pro' ),
			'separate_items_with_commas' => __( 'Separate builds with commas', 'simply-static-pro' ),
			'add_or_remove_items'        => __( 'Add or remove builds', 'simply-static-pro' ),
			'choose_from_most_used'      => __( 'Choose from the most used builds', 'simply-static-pro' ),
			'not_found'                  => __( 'No builds found.', 'simply-static-pro' ),
			'menu_name'                  => __( 'Builds', 'simply-static-pro' ),
		);

		$args = array(
			'hierarchical'       => true,
			'show_in_nav_menus'  => false,
			'show_in_menu'       => false,
			'publicly_queryable' => false,
			'labels'             => $labels,
			'show_admin_column'  => true,
		);

		$post_types = get_post_types( array( 'public' => true ) );

		register_taxonomy( 'ssp-build', $post_types, $args );
	}

	/**
	 * Hide default metaboxes from builds taxonomy.
	 *
	 * @return void
	 */
	public function hide_default_metaboxes() {
		?>
        <style>
            .term-description-wrap, .term-slug-wrap {
                display: none;
            }
        </style>
		<?php
	}

	/**
	 * Unregister admin columns for builds.
	 *
	 * @param array $columns given columns.
	 *
	 * @return array
	 */
	public function unregister_admin_columns( $columns ) {
		if ( isset( $columns['description'] ) ) {
			unset( $columns['description'] );
			unset( $columns['slug'] );
			unset( $columns['posts'] );
		}

		return $columns;
	}
}
