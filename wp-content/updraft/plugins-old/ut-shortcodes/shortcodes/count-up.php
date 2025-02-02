<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Count_Up' ) ) {
	
    class UT_Count_Up {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_count_up';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Count Up Box', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/number-counter.png',
                        'category'        => 'Information',
                        'class'           => 'ut-vc-icon-module ut-information-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon',
                                'group'             => 'General',                                
                            ),
                            array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'or upload an own Icon', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'recommended size 32x32', 'ut_shortcodes' ),
                                'param_name'        => 'imageicon',
                                'group'             => 'General',                                
                            ),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Counter Color', 'ut_shortcodes' ),
                                'param_name'        => 'counter_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Caption Color', 'ut_shortcodes' ),
								'param_name'        => 'desccolor',
								'group'             => 'Colors'
						  	),                            
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Count Up to', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'to',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Counter Caption', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Counter Caption Text Transform', 'unitedthemes' ),
                                'param_name'        => 'caption_text_transform',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'None' , 'ut_shortcodes' )        => 'none',
                                    esc_html__( 'Capitalize' , 'ut_shortcodes' )  => 'capitalize',
                                    esc_html__( 'Inherit' , 'ut_shortcodes' )     => 'inherit',
                                    esc_html__( 'Lowercase' , 'ut_shortcodes' )   => 'lowercase',
                                    esc_html__( 'Uppercase' , 'ut_shortcodes' )   => 'uppercase'            
                                ),
                                
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Counter Caption Font Size', 'ut_shortcodes' ),
                                'param_name'        => 'caption_font_size',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
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
                'icon'                   => '',
                'imageicon'              => '',
                'color'                  => '',
                'counter_color'          => '',
                'desccolor'              => '',
                'caption_text_transform' => '',
                'caption_font_size'      => '',
                'to'                     => '1250',
                'opacity'                => '0.8',      /* deprecated */
                'width'                  => '',         /* deprecated */
                'last'                   => 'false',    /* deprecated */
                'animate_once'           => 'no',       /* deprecated */
                'background'             => '',         /* deprecated */
                'css'                    => '',
                'class'                  => ''
            ), $atts ) ); 
            
            
            /* deprecated - will be removed one day - start block */
            
                $grid = array( 
                    'third'   => 'ut-one-third',
                    'fourth'  => 'ut-one-fourth',
                    'half'    => 'ut-one-half'
                );  
                
                $classes[] = ( $last == 'true' ) ? 'ut-column-last' : '';
                $classes[] = !empty( $grid[$width] ) ? $grid[$width] : 'clearfix';
                $classes[] = $class;                             
                    
            /* deprecated - will be removed one day - end block */
            
            
            /* icon setting */
            if( !empty( $imageicon ) && is_numeric( $imageicon ) ) {
                $imageicon = wp_get_attachment_url( $imageicon );        
            }            
            
            /* overwrite default icon */
            $icon = empty( $imageicon ) ? $icon : $imageicon;
            
            /* check if icon is an image */
            $image_icon = strpos( $icon, '.png' ) !== false || strpos( $icon, '.jpg' ) !== false || strpos( $icon, '.gif' ) !== false || strpos( $icon, '.ico' ) !== false || strpos( $icon, '.svg' ) !== false ? true : false;
            
            /* font awesome icon */
            if( !$image_icon ) {
                
                /* fallback */
                $icon = str_replace('fa fa-', 'fa-', $icon );                
                
            }            
            
            /* inline css */
            $id = uniqid("ut_sc_");
            
            $css_style = '<style type="text/css" scoped>';
                    
                if( $color ) {
                    $css_style .= '#' . $id . ' .fa { color: ' . $color . '; }';  
                }
                
                if( $counter_color ) {
                    $css_style .= '#' . $id . ' .ut-count { color: ' . $counter_color . '; }';  
                }
                
                if( $desccolor ) {
                    $css_style .= '#' . $id . ' h3.ut-counter-details { color: ' . $desccolor . '; }';     
                }
                
                if( $caption_text_transform ) {
                    $css_style .= '#' . $id . ' h3.ut-counter-details { text-transform: ' . $caption_text_transform . '; }';     
                }
                
                if( $caption_font_size ) {
                    $css_style .= '#' . $id . ' h3.ut-counter-details { font-size: ' . $caption_font_size . '; }';     
                }
                
                if( $background ) {
                    $css_style .= '#' . $id . ' .ut-counter-box { background: rgba(' .  ut_hex_to_rgb( $background )  . ',' . $opacity . '); }';     
                }
                
                
            $css_style .= '</style>';                        
            
            /* start output */
            $output = '';
            
            /* add css */ 
            $output .= ut_minify_inline_css( $css_style );
            
            $output .= '<div id="' . $id . '" class="' . implode( ' ', $classes ) . '">';
                
                $output .= '<div data-animateonce="' . $animate_once . '" data-effecttype="counter" class="ut-counter-box ut-counter" data-counter="' . $to . '">';
                    
                    if( !empty( $icon ) ) {
                        
                        if( $image_icon ) {
                            
                            $output .= '<figure class="ut-custom-icon"><img alt="' . esc_html( 'Count Up to', 'ut_shortcodes' ) . ' ' . $to . '" src="' . $icon . '"></figure>'; 
                            
                        } else {
                            
                            $output .= '<i class="fa ' . $icon . ' fa-4x"></i>';
                            
                        }
                        
                    }
                    
                    $output .= '<span class="ut-count">' . $to . '</span>';
                    
                    $output .= '<h3 class="ut-counter-details">' . $content . '</h3>';
                    
                $output .= '</div>';
                
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
            
            return $output;
        
        }
            
    }

}

new UT_Count_Up;