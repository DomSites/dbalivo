<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

global $pagenow;

/* used to change WordPress settings when activating the theme. 
 * https://codex.wordpress.org/Plugin_API/Action_Reference/after_switch_theme
 */

if( !function_exists('unite_theme_activation') ) {

    function unite_theme_activation() {
        
        /* create active flag for plugins */
		add_option('ut_theme_active');
		
		/* create flag so that the option only gets loaded on first installation */
		add_option('ut_layout_loaded');
		
        /* crop options */
        add_option( "medium_crop");
        add_option( "large_crop");
        
		/* create a starter layout for this theme */
		if( get_option('ut_layout_loaded') != 'active') {
			do_action('ut_load_layout');
		}
		
		/* insert a value for the created active state */
		update_option('ut_theme_active', 'active');
        
        /* disbale comments on theme activation */
        update_option('default_comment_status', 'closed');        
        
        /* activate cropping for large images */ 
        update_option('medium_crop', 1);
        update_option('large_crop', 1);
        
        update_option('large_size_w', '1160');
        update_option('large_size_h', '1160');
        
        
    }
    
    add_action( 'after_switch_theme', 'unite_theme_activation', 10 ,  2);  

}

/* used to change WordPress settings when de-activating the theme. 
 * https://codex.wordpress.org/Plugin_API/Action_Reference/switch_theme
 */

if( !function_exists('unite_theme_deactivation') ) {

    function unite_theme_deactivation() {
        
        update_option('ut_theme_active', 'inactive'); 
    
    }
    
    add_action( 'switch_theme', 'unite_theme_deactivation', 10 ,  2);  

}

/* used to redirect to theme welcome page. 
 */
        
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

    wp_redirect( admin_url('admin.php?page=unite-welcome-page') ); 
    
}   