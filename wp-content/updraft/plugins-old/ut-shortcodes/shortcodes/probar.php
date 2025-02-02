<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Probar' ) ) {
	
    class UT_Probar {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_probar';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Progress Bar', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/probar.png',
                        'category'        => 'Information',
                        'class'           => 'ut-vc-icon-module ut-information-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Bar Description', 'ut_shortcodes' ),
                                'param_name'        => 'info',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                                                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Width', 'ut_shortcodes' ),
								'param_name'        => 'width',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => '%'
                                ),
								'group'             => 'General'
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Animate Bar Once?', 'ut_shortcodes' ),
								'param_name'        => 'animate_once',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no' , 'ut_shortcodes' ) => 'no',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'                                    
                                ),
						  	),
                                                      
                            /* Bar Colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Bar Description Color', 'ut_shortcodes' ),
								'param_name'        => 'info_color',
								'group'             => 'Bar Styling'
						  	), 
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Bar Color', 'ut_shortcodes' ),
								'param_name'        => 'color',
								'group'             => 'Bar Styling'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Bar Background Color', 'ut_shortcodes' ),
								'param_name'        => 'background_color',
								'group'             => 'Bar Styling'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Bar Percentage Color', 'ut_shortcodes' ),
								'param_name'        => 'percentage_color',
								'group'             => 'Bar Styling'
						  	),                         
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Border Radius', 'ut_shortcodes' ),
								'param_name'        => 'border_radius',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '30',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Bar Styling'
						  	),
                            
                            /* Font Settings */
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Description Font Size', 'ut_shortcodes' ),
								'param_name'        => 'info_font_size',
                                'value'             => array(
                                    'min'   => '0',
                                    'max'   => '100',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Font'
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Description Font Weight', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'You can additionally style H3 tags inside the theme options panel.', 'ut_shortcodes' ),
								'param_name'        => 'info_font_weight',
								'group'             => 'Font',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( '100' , 'ut_shortcodes' )                => '100',
                                    esc_html__( '200' , 'ut_shortcodes' )                => '200',
                                    esc_html__( '300' , 'ut_shortcodes' )                => '300',
                                    esc_html__( '400' , 'ut_shortcodes' )                => '400',
                                    esc_html__( '500' , 'ut_shortcodes' )                => '500',
                                    esc_html__( '600' , 'ut_shortcodes' )                => '600',
                                    esc_html__( '700' , 'ut_shortcodes' )                => '700',
                                    esc_html__( '800' , 'ut_shortcodes' )                => '800',
                                    esc_html__( '900' , 'ut_shortcodes' )                => '900',
                                    
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Description Letter Spacing', 'ut_shortcodes' ),
								'param_name'        => 'info_letter_spacing',
                                'value'             => array(
                                    'min'   => '-10',
                                    'max'   => '10',
                                    'step'  => '1',
                                    'unit'  => 'px'
                                ),
								'group'             => 'Font'
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Description Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'info_text_transform',
								'group'             => 'Font',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            
                            /* Animation */
                            
                            
                            
                            
                            
                            
                                                        
                            /* css */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ), 
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	)
                                                      
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                
                'color'               => '',
                'background_color'    => '',
                'info'                => '',
                'info_color'          => '',
                'info_font_size'      => '',
                'info_font_weight'    => '',
                'info_letter_spacing' => '',
                'info_text_transform' => '',
                'width'               => '50',
                'percentage_color'    => '',
                'animate_once'        => 'no',
                'border_radius'       => '',
                'css'                 => '',
                'class'               => '',  
                
            ), $atts ) ); 
            
            // strip % if user has entered it
            $width = str_replace('%' , '' , $width); /* deprecated */
            
            /* inline css */
            $id = uniqid("ut_pb_");
            
            $css_style = '<style type="text/css" scoped>';
                
                if( $info_color ) {
                    $css_style .= '#' . $id . ' .ut-skill-name { color: ' . $info_color . '; }';  
                } 
                
                if( $info_font_size ) {
                    $css_style .= '#' . $id . ' .ut-skill-name { font-size: ' . $info_font_size . 'px; }';  
                } 
                
                if( $info_font_weight ) {
                    $css_style .= '#' . $id . ' .ut-skill-name { font-weight: ' . $info_font_weight . '; }';  
                } 
                
                if( $info_letter_spacing ) {
                    $css_style .= '#' . $id . ' .ut-skill-name { letter-spacing: ' . $info_letter_spacing . 'px; }';  
                } 
                
                if( $info_text_transform ) {
                    $css_style .= '#' . $id . ' .ut-skill-name { text-transform: ' . $info_text_transform . '; }';  
                } 
                                
                if( $color ) {
                    $css_style .= '#' . $id . ' .ut-skill-overlay { background: ' . $color . '; }';  
                }
                
                if( $background_color ) {
                    $css_style .= '#' . $id . ' .ut-skill-bar { background: ' . $background_color . '; }';  
                }
                
                if( $percentage_color ) {
                    $css_style .= '#' . $id . ' .ut-skill-percent { color: ' . $percentage_color . '; }';  
                }             
                
                if( $border_radius ) {
                    $css_style .= '#' . $id . ' .ut-skill-bar { border-radius: ' . $border_radius . 'px; -moz-border-radius: ' . $border_radius . 'px; -webkit-border-radius: ' . $border_radius . 'px; }';
                    $css_style .= '#' . $id . ' .ut-skill-overlay { border-radius: ' . $border_radius . 'px; -moz-border-radius: ' . $border_radius . 'px; -webkit-border-radius: ' . $border_radius . 'px;}';       
                }
                
                
            $css_style .= '</style>'; 
            
            /* start output */
            $output = '';
            
            /* add css */ 
            $output .= ut_minify_inline_css( $css_style );            
            
            $output .= '<div id="' . esc_attr( $id ) . '" class="ut-skill ' . esc_attr( $class ) . '">';
                
                if( !empty( $info ) ) {
                    $output .= '<h3 class="ut-skill-name">' . $info . '</h3>';
                }
                
                $output .= '<div class="ut-skill-bar">';
                    $output .= '<div class="ut-skill-overlay ut-skill-active" data-animateonce="' . esc_attr( $animate_once ) . '" data-effecttype="skillbar" data-width="' . esc_attr( $width ) . '">';
                        $output .= '<span class="ut-skill-percent">' . $width . '%</span>';            
                    $output .= '</div>';
                $output .= '</div>';
                
            $output .= '</div>';
                
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
            
            return $output;
        
        }
            
    }

}

new UT_Probar;