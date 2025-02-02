<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Call_To_Action' ) ) {
	
    class UT_Call_To_Action {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_cta';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Call to Action', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/call-to-action.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Headline', 'ut_shortcodes' ),
                                'param_name'        => 'headline',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Font Size', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'value in px or em, eg "20px" or eg "3em" (optional)' , 'ut_shortcodes' ),
                                'param_name'        => 'headline_font_size',
								'group'             => 'General'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Headline Color', 'ut_shortcodes' ),
								'param_name'        => 'headline_color',
								'group'             => 'General'
						  	),
                            array(
                                'type'              => 'textarea',
                                'heading'           => esc_html__( 'Text', 'ut_shortcodes' ),
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Text Color', 'ut_shortcodes' ),
								'param_name'        => 'text_color',
								'group'             => 'General'
						  	),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Button Text', 'ut_shortcodes' ),
                                'param_name'        => 'button_text',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Button Link', 'ut_shortcodes' ),
                                'param_name'        => 'button_link',
                                'group'             => 'General'
                            ), 
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
								'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
								'group'             => 'General'
						  	),
                            
                            /* Button Colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Text Color', 'ut_shortcodes' ),
								'param_name'        => 'button_text_color',
								'group'             => 'Button Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Text Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_text_color_hover',
								'group'             => 'Button Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Color', 'ut_shortcodes' ),
								'param_name'        => 'button_background',
								'group'             => 'Button Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_background_hover',
								'group'             => 'Button Colors'
						  	),
                            
                            
                            /* Button Design */
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Button Size', 'ut_shortcodes' ),
								'param_name'        => 'button_size',
								'group'             => 'Button Design',
                                'value'             => array(
                                    esc_html__( 'Choose Button Size', 'ut_shortcodes' ) => '',
                                    esc_html__( 'mini'   , 'ut_shortcodes' ) => 'bklyn-btn-mini',
                                    esc_html__( 'small'  , 'ut_shortcodes' ) => 'bklyn-btn-small',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'bklyn-btn-normal',
                                    esc_html__( 'large'  , 'ut_shortcodes' ) => 'bklyn-btn-large',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Button Alignment', 'ut_shortcodes' ),
								'param_name'        => 'button_align',
								'group'             => 'Button Design',
                                'value'             => array(
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'bklyn-btn-center',
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => 'bklyn-btn-left',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'bklyn-btn-right',
                                ),
						  	),
                            array(
                                'type'              => 'checkbox',
                                'heading'           => esc_html__( 'Activate Button Border?', 'unitedthemes' ),
                                'param_name'        => 'button_custom_border',
                                'group'             => 'Button Design',                                
                            ),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'button_border_color',
								'group'             => 'Button Design',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'button_border_color_hover',
								'group'             => 'Button Design',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Border Style', 'ut_shortcodes' ),
								'param_name'        => 'button_border_style',
								'group'             => 'Button Design',
                                'value'             => array(
                                    esc_html__( 'solid' , 'ut_shortcodes' ) => 'solid',
                                    esc_html__( 'dotted', 'ut_shortcodes' ) => 'dotted',
                                    esc_html__( 'dashed', 'ut_shortcodes' ) => 'dashed',
                                    esc_html__( 'double', 'ut_shortcodes' ) => 'double',
                                    esc_html__( 'groove', 'ut_shortcodes' ) => 'groove',
                                    esc_html__( 'ridge' , 'ut_shortcodes' ) => 'ridge',
                                    esc_html__( 'inset' , 'ut_shortcodes' ) => 'inset',
                                    esc_html__( 'outset', 'ut_shortcodes' ) => 'outset',
                                ),
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Width', 'ut_shortcodes' ),
								'param_name'        => 'button_border_width',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '50',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Button Design',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'true',
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Radius', 'ut_shortcodes' ),
								'param_name'        => 'button_border_radius',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '50',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Button Design',
                                'dependency'        => array(
                                    'element' => 'button_custom_border',
                                    'value'   => 'true',
                                ),
						  	),
                            
                            /*
                            array(
                                'type'              => 'checkbox',
                                'heading'           => esc_html__( 'Use custom font for this button?', 'unitedthemes' ),
                                'param_name'        => 'button_custom_font',
                                'group'             => 'Button Fonts',                                
                            ),
                            array(
								'type'              => 'google_fonts',
								'heading'           => esc_html__( 'Google Font', 'ut_shortcodes' ),
                                'param_name'        => 'button_font',
								'group'             => 'Button Fonts',
                                'dependency'    => array(
                                    'element' => 'button_custom_font',
                                    'value'   => 'true',
                                ),
						  	),
                            */
                            
                            /* CSS Editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ),
                            
                                                       
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'headline'           => '',
                'headline_font_size' => '',
                'button_text'        => '',
                'button_link'        => '',
                'button_align'       => 'bklyn-btn-center',
                'button_size'        => 'bklyn-btn-normal',
                
                /* color settings */
                'button_text_color'         => '',
                'button_text_color_hover'   => '',
                'button_background'         => '',
                'button_background_hover'   => '',
                
                /* border settings */
                'button_custom_border'      => '',
                'button_border_color'       => '',
                'button_border_color_hover' => '',
                'button_border_style'       => '',
                'button_border_width'       => '',
                'button_border_radius'      => '',
                
                'button_font'    => '',
                'headline_color' => '',
                'text_color'     => '',
                'css'            => ''                
            ), $atts ) ); 

            /* button link */
            
            if( function_exists('vc_build_link') && $button_link ) {
                
                $button_link = vc_build_link( $button_link );
                
                /* assign link */
                $link = !empty( $button_link['url'] )    ? $button_link['url'] : '#';
                
            } else {
                
                $link = $button_link;
            
            }
            
            $target = !empty( $button_link['target'] ) ? $button_link['target'] : '_self';
            $title  = !empty( $button_link['title'] )  ? $button_link['title'] : '';
            $rel    = !empty( $button_link['rel'] )    ? 'rel="' . esc_attr( trim( $button_link['rel'] ) ) . '"' : '';
            
            
            /* inline css */
            $id        = uniqid('bklyn_cta_');
            $button_id = uniqid('bklyn_btn_');
            
            $css_style = '<style type="text/css" scoped>';
                
                if( $headline_color ) {
                    $css_style .= '#' . $id . ' .bklyn-call-to-action-title { color: ' . $headline_color . '; }';  
                }
                
                if( $headline_font_size ) {
                    $css_style .= '#' . $id . ' .bklyn-call-to-action-title { font-size: ' . $headline_font_size . '; }';  
                }
                
                if( $text_color ) {
                    $css_style .= '#' . $id . ' .bklyn-call-to-action-content { color: ' . $text_color . '; }';     
                }            
                
                /* button design */
                $button_design_array = array();                
                $button_design_array['button_custom_border'] = $button_custom_border;
                
                
                $button_design_array['default']['color']            = $button_text_color;
                $button_design_array['default']['border-color']     = $button_border_color;
                $button_design_array['default']['border-style']     = $button_border_style;
                $button_design_array['default']['border-width']     = $button_border_width  . 'px';
                $button_design_array['default']['border-radius']    = $button_border_radius . 'px';
                $button_design_array['default']['background-color'] = $button_background;
                
                $button_design_array['hover']['color']              = $button_text_color_hover;
                $button_design_array['hover']['border-color']       = $button_border_color_hover;
                $button_design_array['hover']['background-color']   = $button_background_hover;
                
                /* button styles */
                $css_style .= ut_create_button( $button_id, $button_design_array );                
                
            $css_style .= '</style>';            
            
            /* start output */
            $output = '';        
            
            $output .= ut_minify_inline_css( $css_style );
            
            $output .= '<div id="' . $id . '" class="bklyn-call-to-action-wrapper">';
                
                $output .= '<div class="bklyn-call-to-action-inner clearfix">';
                    
                    $output .= '<div class="bklyn-call-to-action-content">';
                        
                        if( $headline ) {
                            $output .= '<h3 class="bklyn-call-to-action-title">' . $headline . '</h3>';
                        }
                        
                        $output .= do_shortcode( wpautop( $content ) );
                        
                    $output .= '</div>';
                    
                    if( $button_text ) {
                    
                        $output .= '<div class="bklyn-call-to-action-button-holder">';
                            
                            $output .= '<div id="' . esc_attr( $button_id ) . '" class="bklyn-btn-holder ' . $button_align . '">';
                            
                                $output .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" class="bklyn-btn ' . $button_size . ' ' . ( $button_custom_border ? 'bklyn-btn-outline' : '' ) .'" ' . $rel . '>' . $button_text . '</a>';
                            
                            $output .= '</div>';
                            
                        $output .= '</div>';
                    
                    }
                    
                $output .= '</div>';
                
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                            
            return $output;
        
        }
            
    }

}

new UT_Call_To_Action;

if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_cta extends WPBakeryShortCode {
        
    }
    
}