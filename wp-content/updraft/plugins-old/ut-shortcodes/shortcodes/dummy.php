<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Dummy_Shortcode' ) ) {
	
    class UT_Dummy_Shortcode {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = '';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Service Box', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Brooklyn ( 4.0 )',
                        'class'           => '',
                        'content_element' => true,
                        'params'          => array(
                            
                            
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (

            ), $atts ) ); 
            
            /* start output */
            $output = '';
        

                
            return $output;
        
        }
            
    }

}

new UT_Dummy_Shortcode;