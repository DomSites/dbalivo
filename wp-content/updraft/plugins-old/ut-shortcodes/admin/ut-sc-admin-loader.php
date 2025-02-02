<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Admin JS Scripts
 *
 * @since     4.0
 */

if ( ! function_exists( 'load_ut_sc_admin_scripts' ) ) :

	function load_ut_sc_admin_scripts() {
	    
        wp_enqueue_style(
            'ut-vc-composer-css',
            UT_SHORTCODES_URL . '/vc/admin/assets/css/param-styles.css'
        );
        
        wp_enqueue_style(
            'ut-mceskin', 
            UT_SHORTCODES_URL . 'admin/css/ut.mceskin.css'
        );
        
        wp_enqueue_style(
            'ut-vc-styles', 
            UT_SHORTCODES_URL . 'admin/css/ut.vc.styles.css'
        );	
        			
		wp_register_script(
            'ut-vc-composer-js', 
            UT_SHORTCODES_URL .'/vc/admin/assets/js/vc-composer-functions.js', 
            array( 'jquery', 'jquery-ui-slider' )
        );
        
		wp_enqueue_script( 'ut-vc-composer-js' );		
		
	}

endif;


/**
 * Admin Init
 *
 * @since     4.0
 */
if ( ! function_exists( 'ut_sc_admin_init' ) ) :

    function ut_sc_admin_init() {
        
        
        add_action('admin_print_styles-post.php', 'load_ut_sc_admin_scripts');
        add_action('admin_print_styles-post-new.php', 'load_ut_sc_admin_scripts');
            
    }
    
    add_action( 'admin_init' , 'ut_sc_admin_init' );
    
endif;


/**
 * TinyMCE Extensions
 *
 * @since     1.0
 */
if ( ! function_exists( 'ut_tinymce' ) ) {

    function ut_tinymce() {        
        
        if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
            return;
        }
        
        if ( get_user_option('rich_editing') == 'true' ) {
            
            add_filter( 'mce_external_plugins', 'ut_add_js_plugin' );
            add_filter( 'mce_buttons', 'register_ut_tinymce_buttons' );
            
        }               
     
    }
    
    add_action('init', 'ut_tinymce');
    
}

/**
 * TinyMCE JS
 *
 * @since     1.0
 */

if ( ! function_exists( 'ut_add_js_plugin' ) ) {
    
    function ut_add_js_plugin( $plugin_array ) {
       
       $plugin_array['ut_buttons'] = UT_SHORTCODES_URL . 'admin/js/ut.tinymce.js';
       return $plugin_array;
       
    }

}


/**
 * TinyMCE Buttons
 *
 * @since     1.0
 */
if ( ! function_exists( 'register_ut_tinymce_buttons' ) ) {
    
    function register_ut_tinymce_buttons( $buttons ) {
        
        array_push( $buttons, 'ut_scgenerator' , 'ut_icons' , 'ut_buttons' );
        return $buttons; 
        
    }
    
}