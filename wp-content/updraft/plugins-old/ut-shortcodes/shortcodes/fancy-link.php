<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Fancy_Link' ) ) {
    
    class UT_Fancy_Link {
        
        function __construct() {
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( 'ut_fancy_link', array( $this, 'ut_create_shortcode' ) );    
            
        }
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Fancy Link', 'ut_shortcodes' ),
                        'base'            => 'ut_fancy_link',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/fancy-link.png',
                        'category'        => 'Structual',                        
                        'class'           => 'ut-vc-icon-module ut-structual-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Link Text', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'content',
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Link', 'ut_shortcodes' ),
                                'param_name'        => 'url',
                            ),
                            
                            array(
								'type'        => 'dropdown',
								'heading'     => esc_html__( 'Link Target', 'ut_shortcodes' ),
								'param_name'  => 'target',
								'value'       => array(
                                    esc_html__( 'blank', 'ut_shortcodes' ) => '_blank',
                                    esc_html__( 'self', 'ut_shortcodes' ) => '_self',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Color', 'ut_shortcodes' ),
								'param_name'        => 'link_color',
                                'edit_field_class'  => 'vc_col-sm-3',
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Line Color', 'ut_shortcodes' ),
								'param_name'        => 'line_color',
                                'edit_field_class'  => 'vc_col-sm-3',
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'link_hover_color',
                                'edit_field_class'  => 'vc_col-sm-3',
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Line Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'line_hover_color',
                                'edit_field_class'  => 'vc_col-sm-3',
						  	),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
                            ),
                                                        
                            
                        ),
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'link_color'        => '',
                'link_hover_color'  => '',
                'line_color'        => '',
                'line_hover_color'  => '',
                'url'               => '#',
                'target'            => '_blank',
                'class'             => ''
            ), $atts ) ); 

            $classes    = array();
            $classes[]  = $class;
            
            $output = '';
            
            /* unique ID */
            $id = uniqid("ut_fancy_link_");
            
            /* custom css */
            $css = '<style type="text/css" scoped>';
                
                if( $link_color ) {                
                    
                   $css .= '#' . $id . ' a { color: ' . $link_color . ' }'; 
                    
                }
                
                if( $link_hover_color ) {                
                    
                    $css .= '#' . $id . ' a:hover { color: ' . $link_hover_color . ' }'; 
                    
                }
                
                if( $line_color ) {
                    
                    $css .= '#' . $id . ' a::before { background: ' . $line_color . ' }';
                    $css .= '#' . $id . ' a::after { background: ' . $line_color . ' }';
                    
                }
                
                if( $line_hover_color ) {
                    
                    $css .= '#' . $id . ' a:hover::before { background: ' . $line_hover_color . ' }';
                    $css .= '#' . $id . ' a:hover::after { background: ' . $line_hover_color . ' }';
                    
                }
            
            $css .= '</style>';
            
            /* attach css */
            $output .= ut_minify_inline_css( $css );
            
            $output .= '<div class="wpb_content_element">';
            
                $output .= '<span id="' . esc_attr( $id ) . '" class="cta-btn cl-effect-18 ' . implode(' ', $classes ) . '"><a class="cl-effect-18" target="' . esc_attr( $target ) . '" href="' . esc_url( $url ) . '">' . do_shortcode( $content ) . '</a></span>';
            
            $output .= '</div>';
            
            return $output;
        
        }
            
    }

}

new UT_Fancy_Link;