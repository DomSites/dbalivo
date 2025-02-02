<?php if ( ! defined( 'OT_VERSION' ) ) exit( 'No direct script access allowed' );

/**
 * Registers the Theme Option page link for the admin bar.
 *
 * @uses      ot_register_settings()
 *
 * @return    void
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_register_theme_options_admin_bar_menu' ) ) {

  function ot_register_theme_options_admin_bar_menu( $wp_admin_bar ) {
    
    if ( ! current_user_can( apply_filters( 'ot_theme_options_capability', 'edit_theme_options' ) ) || ! is_admin_bar_showing() )
      return;
    
    $wp_admin_bar->add_node( array(
      'parent'  => 'appearance',
      'id'      => apply_filters( 'ot_theme_options_menu_slug', 'ut_theme_options' ),
      'title'   => apply_filters( 'ot_theme_options_page_title', __( 'Theme Options', 'option-tree' ) ),
      'href'    => admin_url( apply_filters( 'ot_theme_options_parent_slug', 'admin.php' ) . '?page=' . apply_filters( 'ot_theme_options_menu_slug', 'ut_theme_options' ) )
    ) );
    
  }
  
}

/* End of file ot-functions.php */
/* Location: ./includes/ot-functions.php */