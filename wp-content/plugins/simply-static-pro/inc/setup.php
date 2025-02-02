<?php
/* raz0r
 * Hi there, do it by yourself.
*/
class sspFsNull {
    public function is_plan_or_trial__premium_only() {
        return true;
    }
	public function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_filter( $tag, $function_to_add, $priority, $accepted_args );
	}

	public function add_action( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_action( $tag, $function_to_add, $priority, $accepted_args );
	}
}
$rzr = get_option( 'fs_accounts' );
$rzr['plugin_data']['simply-static-pro']['connectivity_test']['connect'] = true;
$rzr['plugin_data']['simply-static-pro']['connectivity_test']['is_connected'] = true;
update_option( 'fs_accounts', $rzr );
if ( !function_exists( 'ssp_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ssp_fs() {
        global $ssp_fs;
        if ( !isset( $ssp_fs ) ) {
            // Activate multisite network integration.
            if ( !defined( 'WP_FS__PRODUCT_8420_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_8420_MULTISITE', true );
            }
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ssp_fs = new sspFsNull();
        }
        return $ssp_fs;
    }

    // Init Freemius.
    ssp_fs();
    // Signal that SDK was initiated.
    do_action( 'ssp_fs_loaded' );
    /**
     * Remove freemius pages.
     *
     * @param bool $is_visible indicates if visible or not.
     * @param int $submenu_id current submenu id.
     *
     * @return bool
     */
    function ssp_fs_is_submenu_visible(  $is_visible, $submenu_id  ) {
        return false;
    }

    ssp_fs()->add_filter(
        'is_submenu_visible',
        'ssp_fs_is_submenu_visible',
        10,
        2
    );
    /**
     * Add custom icon for Freemius.
     *
     * @return string
     */
    function ssp_fs_custom_icon() {
        return SIMPLY_STATIC_PRO_PATH . '/assets/simply-static-icon.png';
    }

    ssp_fs()->add_filter( 'plugin_icon', 'ssp_fs_custom_icon' );
    /**
     * Remove deactivation survey.
     *
     * @return bool
     */
    ssp_fs()->add_filter( 'show_deactivation_feedback_form', '__return_false' );
    ssp_fs()->add_filter( 'show_deactivation_subscription_cancellation', '__return_false' );
    /**
     * Clean up Simply Static Pro settings after uninstallation
     *
     * @return void
     */
    function ssp_fs_cleanup() {
        global $wpdb;
        // Delete all form integrations.
        $wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type='ssp-form'" );
        // Delete all builds.
        $terms = get_terms( array(
            'taxonomy'   => 'ssp-build',
            'fields'     => 'ids',
            'hide_empty' => false,
        ) );
        if ( !empty( $terms ) ) {
            foreach ( $terms as $term_id ) {
                wp_delete_term( $term_id, 'ssp-build' );
            }
        }
    }

    ssp_fs()->add_action( 'after_uninstall', 'ssp_fs_cleanup' );
}