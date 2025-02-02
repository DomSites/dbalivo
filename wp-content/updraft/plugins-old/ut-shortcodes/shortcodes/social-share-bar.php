<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Social_Share_Bar' ) ) {
	
    class UT_Social_Share_Bar {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_social_share_bar';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Social Share Bar', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Information',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/social-share-bar.png',
                        'class'           => 'ut-vc-icon-module ut-information-module',    
                        'content_element' => true,
                        'params'          => array(
                            
                            /* General */                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Share Text', 'ut_shortcodes' ),
                                'description'       => __( '<strong>(optional)</strong> default: Share', 'ut_shortcodes' ),
                                'param_name'        => 'share_text',
                                'admin_label'       => true,
                                'group'             => 'General',

                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => 'left',
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'center',                                    
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Share Text Font Weight', 'ut_shortcodes' ),
								'description'       => __( '<strong>(optional)</strong>', 'ut_shortcodes' ),
                                'param_name'        => 'share_text_font_weight',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' ) => 'bold'
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Share Text Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'share_text_letter_spacing',
                                'group'             => 'General',
                                'value'             => array(
                                    'def'   => '0',
                                    'min'   => '-100',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								
						  	),                    
                            array(
                                'type'              => 'checkbox',
                                'heading'           => esc_html__( 'Activate Border?', 'unitedthemes' ),
                                'param_name'        => 'border',
                                'group'             => 'General',                                
                            ), 
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
								'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
								'group'             => 'General'
						  	), 
                            
                            /* colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Share Text Color', 'ut_shortcodes' ),
								'param_name'        => 'share_text_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Colors', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Colors Hover', 'ut_shortcodes' ),
								'param_name'        => 'icon_color_hover',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'border_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            
                            /* Design Options */
                            array(
                                'type'          => 'css_editor',
                                'param_name'    => 'css',
                                'group'         => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ),
                            
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'align'                     => 'left',
                'share_text'                => esc_html__( 'Share:', 'ut_shortcodes' ),
                'share_text_color'          => '',
                'share_text_font_weight'    => '',
                'share_text_letter_spacing' => '',
                'icon_color'                => '',
                'icon_color_hover'          => get_option('ut_accentcolor' , '#F1C40F'),
                'border'                    => '',
                'border_color'              => '',
                'class'                     => '',
                'css'                       => ''        
            ), $atts ) ); 
            
            $classes    = array();
            $classes[]  = $class;
            
            /* deactivate border */
            if( !$border ) {
                $classes[]  = 'no-border';    
            }            
            
            /* unique listz ID */
            $id = uniqid("ut_scb_");
            
            $css_style  = '<style class="bklyn-inline-styles" type="text/css" scoped>';
                
                if( $border && !empty( $border_color ) ) {
                    $css_style .= '#' . $id . '.ut-project-sc { border-color: ' . $border_color . '; }';
                }
                
                if( !empty( $share_text_color ) ) {
                    $css_style .= '#' . $id . '.ut-project-sc .widget-title { color: ' . $share_text_color . '; }';
                }
                
                if( $share_text_font_weight ) {
                    $css_style .= '#' . $id . '.ut-project-sc .widget-title { font-weight: ' . $share_text_font_weight . '; }';  
                } 
                
                if( $share_text_letter_spacing ) {
                    $css_style .= '#' . $id . '.ut-project-sc .widget-title { letter-spacing: ' . $share_text_letter_spacing . 'px; }';  
                } 
            
                if( !empty( $icon_color ) ) {
                    $css_style .= '#' . $id . ' .ut-share-link { color: ' . $icon_color . '; }';
                    $css_style .= '#' . $id . ' .ut-share-link:visited { color: ' . $icon_color . '; }';
                }
                
                if( !empty( $icon_color_hover ) ) {
                    $css_style .= '#' . $id . ' .ut-share-link:hover { color: ' . $icon_color_hover . '; }';
                    $css_style .= '#' . $id . ' .ut-share-link:focus { color: ' . $icon_color_hover . '; }';
                    $css_style .= '#' . $id . ' .ut-share-link:active { color: ' . $icon_color_hover . '; }';
                }                
             
            $css_style .= '</style>';
                        
            /* start output */
            $output = '';
            
            /* attach CSS */
            $output .= ut_minify_inline_css( $css_style );            
                
            $output .= '<ul id="' . esc_attr( $id ) . '" class="ut-project-sc ut-project-sc-' . $align . ' clearfix ' . implode(' ', $classes ) . '">';
                
                $output .= '<li><h6 class="widget-title"><span>' . $share_text . '</span></h6></li>';
                $output .= '<li><a class="ut-share-link sc-twitter" data-social="utsharetwitter"><i class="fa fa-twitter"></i></a></li>';
                $output .= '<li><a class="ut-share-link sc-facebook" data-social="utsharefacebook"><i class="fa fa-facebook"></i></a></li>';
                $output .= '<li><a class="ut-share-link sc-google" data-social="utsharegoogle"><i class="fa fa-google-plus"></i></a></li>';
                $output .= '<li><a class="ut-share-link sc-linkedin" data-social="utsharelinkedin"><i class="fa fa-linkedin"></i></a></li>';
                $output .= '<li><a class="ut-share-link sc-pinterest" data-social="utsharepinterest"><i class="fa fa-pinterest"></i></a></li>';
                $output .= '<li><a class="ut-share-link sc-xing" data-social="utsharexing"><i class="fa fa-xing"></i></a></li>';                
            
            $output .= '</ul>';
                
            return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>';             
        
        }
            
    }

}

new UT_Social_Share_Bar;