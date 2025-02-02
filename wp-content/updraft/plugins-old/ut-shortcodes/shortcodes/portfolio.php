<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Showcase_Shortcode' ) ) {
	
    class UT_Showcase_Shortcode {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_showcase_shortcode';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Portfolio Showcase Module', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/portfolio.png',
                        'category'        => 'Plugin',
                        'class'           => 'ut-vc-icon-module ut-plugin-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Select UT Showcase', 'ut_shortcodes' ),
								'param_name'        => 'showcase_id',
								'group'             => 'General',
                                'admin_label'       => true, 
                                'value'             => ut_get_showcases()
						  	),
                            
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            )
                            
                        )                        
                        
                    )
                
                ); // end mapping
                
            } 
        
        }
        
        function ut_create_shortcode( $atts ) {
                
            extract( shortcode_atts( array (
                'showcase_id' => '',
                'css'         => ''
            ), $atts ) ); 
            
            if( !$showcase_id ) {                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . esc_html__( 'No Showcase selected!', 'ut_shortcodes' ) . '</div>';                
            }
            
            if( defined( 'WPB_VC_VERSION' ) ) {                 
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . do_shortcode( '[ut_showcase vc="true" id="' . esc_attr( $showcase_id ) . '"]' ) . '</div>';             
            }  
            
            /* start output */
            return do_shortcode( $content );
        
        }
            
    }

}

new UT_Showcase_Shortcode;