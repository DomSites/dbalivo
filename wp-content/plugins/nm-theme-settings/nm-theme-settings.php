<?php
/*
	Plugin Name: Savoy Theme - Settings Panel
	Plugin URI: http://themeforest.net/item/savoy-minimalist-ajax-woocommerce-theme/12537825
	Description: Enables the theme's settings panel.
	Version: 1.2.3
	Author: NordicMade
	Author URI: http://www.nordicmade.com
	Text Domain: nm-theme-settings
	Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NM_Theme_Settings {
	
    /* Init */
	function init() {
        // Constants
        define( 'NM_TS_DIR', plugin_dir_path( __FILE__ ) . 'includes' );
        define( 'NM_TS_URI', plugin_dir_url( __FILE__ ) );
        
        if ( ! class_exists( 'ReduxFramework' ) ) {
            require_once( NM_TS_DIR . '/options/redux-core/framework.php' );
            require_once( NM_TS_DIR . '/options/customizer.php' );
            
            /*if ( is_admin() ) {
                // Remove dashboard widget
                function nm_redux_remove_dashboard_widget() {
                    remove_meta_box( 'redux_dashboard_widget', 'dashboard', 'side' );
                }
                add_action( 'wp_dashboard_setup', 'nm_redux_remove_dashboard_widget', 100 );
            }*/
        }
        
        /* Add custom settings-panel styles */
        function remove_panel_css() {
            wp_dequeue_style( 'redux-admin-css' );
            
            wp_enqueue_style( 'nm-redux-admin', NM_TS_URI . '/assets/nm-redux-admin.css', array( 'farbtastic' ), '1.0', 'all' );
        }
        $load_default_styles = apply_filters( 'nm_theme_settings_default_styles', false );
        if ( ! $load_default_styles ) {
            add_action( 'redux/page/' . 'nm_theme_options' . '/enqueue', 'remove_panel_css' );
        }
        
        // Note: Including this file from the theme for now to avoid users clearing their "Custom Code" fields (in case this plugin hasn't been updated)
        // Include: Custom Code fields
        /*if ( ! class_exists( 'NM_Custom_Code' ) ) { // Make sure the class isn't defined from an older version of the "Savoy Theme - Content Element" plugin
            include( NM_TS_DIR . '/custom-code.php' );
        }*/
    }
	
}

$NM_Theme_Settings = new NM_Theme_Settings();
$NM_Theme_Settings->init();
