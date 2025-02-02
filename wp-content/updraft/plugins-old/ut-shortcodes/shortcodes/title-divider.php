<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Title_Divider' ) ) {
	
    class UT_Title_Divider {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_title_divider';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Title Divider', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/title-divider.png',
                        'category'        => 'Structual',                        
                        'class'           => 'ut-vc-icon-module ut-structual-module',
                        'content_element' => true,
                        'params'          => array(
                            array(
                                'type'        => 'textfield',
                                'admin_label' => true,
                                'heading'     => __( 'Title', 'ut_shortcodes' ),
                                'param_name'  => 'content',
                                'group'       => 'General'
                            )
                                                        
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'margin_top'    => '', /* deprecated */
                'class'         => ''
            ), $atts ) ); 
            
            $style = ( !empty($margin_top) ) ? 'style="margin-top:' . $margin_top . 'px;"' : ''; 
                        
            /* start output */
            return '<h6 class="ut-title-divider ' . esc_attr( $class ) . '" ' . $style . '><span>' . do_shortcode( $content ) . '</span></h6>';
        
        }
            
    }

}

new UT_Title_Divider;