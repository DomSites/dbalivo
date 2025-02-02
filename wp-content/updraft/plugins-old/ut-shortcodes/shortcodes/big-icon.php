<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Big_Icon' ) ) {
	
    class UT_Big_Icon {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_big_icon';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Big Icon', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/big-icon.png',
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
                                'description'       => esc_html__( 'recommended size 128x128', 'ut_shortcodes' ),
                                'param_name'        => 'imageicon',
                                'group'             => 'General',                                
                            ),      
                            array(
                                'type'              => 'range_slider',
                                'heading'           => esc_html__( 'Icon Size', 'ut_shortcodes' ),
                                'param_name'        => 'icon_size',
                                'value'             => array(
                                    'default' => '60',
                                    'min'     => '40',
                                    'max'     => '100',
                                    'step'    => '10',
                                    'unit'    => 'px'
                                ),
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Icon Shape', 'ut_shortcodes' ),
								'param_name'        => 'shape',
								'group'             => 'General',
                                'value'             => array(
                                    'round'     => esc_html__( 'round', 'ut_shortcodes' ),
                                    'square'    => esc_html__( 'square', 'ut_shortcodes' ),
                                    'normal'    => esc_html__( 'normal', 'ut_shortcodes' )
                                ),
						  	),
                            array(
                                'type'              => 'range_slider',
                                'heading'           => esc_html__( 'Icon Spacing Bottom', 'ut_shortcodes' ),
                                'param_name'        => 'icon_margin_bottom',
                                'group'             => 'General',
                                'value'             => array(
                                    'default' => '20',
                                    'min'     => '0',
                                    'max'     => '80',
                                    'step'    => '1',
                                    'unit'    => 'px'
                                ),
                            ),
                    
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Link', 'ut_shortcodes' ),
                                'param_name'        => 'link',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Title', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'title',
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Slogan', 'ut_shortcodes' ),
                                'param_name'        => 'slogan',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Slogan Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'slogan_font_weight',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold'
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'slogan_text_transform',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' )            => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' )              => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' )              => 'lowercase'                                    
                                ),
						  	),
                            /*array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Alignment for Title and Slogan', 'ut_shortcodes' ),
								'param_name'        => 'text_align',
								'group'             => 'General',
                                'value'             => array(
                                    'center'    => esc_html__( 'center', 'ut_shortcodes' ),
                                    'left'      => esc_html__( 'left'  , 'ut_shortcodes' ),
                                    'right'     => esc_html__( 'right' , 'ut_shortcodes' ),
                                ),
						  	),*/
                            
                            /* colors */                          
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Background Color', 'ut_shortcodes' ),
                                'param_name'        => 'icon_background',
                                'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round','square' ),
                                )
						  	),                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_hover_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Background Hover Color', 'ut_shortcodes' ),
                                'param_name'        => 'icon_hover_background',
                                'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round','square' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Title Color', 'ut_shortcodes' ),
								'param_name'        => 'title_color',
								'group'             => 'Colors',
                                
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Slogan Color', 'ut_shortcodes' ),
								'param_name'        => 'slogan_color',
								'group'             => 'Colors'
						  	),
                            
                            
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'icon'                  => '',
                'icon_size'             => '',
                'icon_margin_bottom'    => '',
                'imageicon'             => '',
                'shape'                 => 'round',
                'title'                 => '',
                'title_color'           => '',
                'slogan'                => '',
                'slogan_color'          => '',
                'slogan_font_weight'    => '',
                'slogan_text_transform' => '',
                'text_align'            => 'center',
                'link'                  => '#',
                'icon_color'            => '',  
                'icon_hover_color'      => '',
                'icon_background'       => '',
                'icon_hover_background' => '',
            ), $atts ) ); 
            
            if( !empty( $link ) ) {
            
                /* attract link settings */
                $link = vc_build_link( $link );
                
                /* set link attributes */
                $link['target'] = empty( $link['target'] ) ? '_self' : $link['target'];
                $link['title']  = empty( $link['title'] )  ? ''      : 'title="' . esc_attr( $link['title'] ) . '"';
                $link['url']    = empty( $link['url'] )    ? '#'     : $link['url'];
                $rel            = empty( $link['rel'] )    ? ''      : 'rel="' . $link['rel'] . '"';
            
            }
            
            /* icon setting */
            if( !empty( $imageicon ) && is_numeric( $imageicon ) ) {
                $imageicon = wp_get_attachment_url( $imageicon );        
            }            
            
            /* overwrite default icon */
            $icon = empty( $imageicon ) ? $icon : $imageicon;
            
            /* check if icon is an image */
            $image_icon = strpos( $icon, '.png' ) !== false || strpos( $icon, '.jpg' ) !== false || strpos( $icon, '.gif' ) !== false || strpos( $icon, '.ico' ) !== false || strpos( $icon, '.svg' ) !== false ? true : false;
            
            /* inline css */
            $id = uniqid("ut_bi_");
            
            $css_style = '<style type="text/css" scoped>';
                
                if( !empty( $icon_color ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-link i { color: ' . $icon_color . '; }';    
                }
                
                if( !empty( $icon_background ) && $shape != 'normal' ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-link .bklyn-big-icon { background: ' . $icon_background . '; }';    
                }
                
                if( !empty( $icon_hover_color ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-link:hover i { color: ' . $icon_hover_color . '; }';    
                }
                
                if( !empty( $icon_hover_background )  && $shape != 'normal' ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-link:hover .bklyn-big-icon { background: ' . $icon_hover_background . '; }';    
                }
                
                if( $icon_margin_bottom != '' ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon { margin-bottom: ' . $icon_margin_bottom . 'px; }';
                }
            
            
                if( !empty( $slogan_color ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-slogan { color: ' . $slogan_color . '; }';    
                }
                
                if( !empty( $slogan_font_weight ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-slogan { font-weight: ' . $slogan_font_weight . '; }';    
                }
                
                if( !empty( $slogan_text_transform ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-slogan { text-transform: ' . $slogan_text_transform . '; }';
                    $css_style .= '#' . $id . ' .bklyn-big-icon-title { text-transform: ' . $slogan_text_transform . '; }';
                }                
                
                if( !empty( $title_color ) ) {
                    $css_style .= '#' . $id . ' .bklyn-big-icon-title { color: ' . $title_color . '; }';    
                }
                
                if( !empty( $icon_size ) ) {
                    
                    $css_style .= '
                    #' . $id . ' .bklyn-big-icon-round.bklyn-big-icon .fa, 
                    #' . $id . ' .bklyn-big-icon-square.bklyn-big-icon .fa { 
                        line-height: ' . ( $icon_size ) . 'px;
                    }                    
                    #' . $id . ' .bklyn-big-icon img {
                        max-height: ' . ( $icon_size ) . 'px;
                    }                     
                    #' . $id . ' .bklyn-big-icon { 
                        height: ' . ( $icon_size * 2 ) . 'px;
                        line-height: ' . ( $icon_size * 2 ) . 'px;
                        width: ' . ( $icon_size * 2 ) . 'px;
                        font-size: ' . ( $icon_size ) . 'px;
                    }';
                    
                    
                }
                
            $css_style .= '</style>';
            
            /* start output */
            $output = '';
            
            /* add css */ 
            $output .= ut_minify_inline_css( $css_style );            
            
            $output .= '<div id="' . $id . '" class="bklyn-big-icon-wrap">';
                
                $output .= '<a ' . $link['title'] . ' class="bklyn-big-icon-link" target="' . esc_attr( $link['target'] ) . '" href="' . esc_url( $link['url'] ) . '" ' . $rel . '>';
                    
                    if( !$image_icon ) {
                    
                        $output .= '<div class="bklyn-big-icon bklyn-big-icon-' . esc_attr( $shape ) . '"><div class="bklyn-big-icon-inner"><i class="' . esc_attr( $icon ) . '"></i></div></div>';
                    
                    } else {
                        
                        $output .= '<div class="bklyn-big-icon bklyn-big-icon-' . esc_attr( $shape ) . '"><div class="bklyn-big-icon-inner"><img alt="' . ( !empty( $title ) ? esc_attr( $title ) : 'icon' ) . '" src="' . esc_url( $icon ) . '"></div></div>'; 
                    
                    }
                    
                    
                    if( !empty( $title ) ) {
                    
                        $output .= '<h3 class="bklyn-big-icon-title">' . $title . '</h3>';
                    
                    }
                    
                    if( !empty( $slogan ) ) {
                        
                        $output .= '<div class="bklyn-big-icon-slogan">' . $slogan . '</div>';
                    
                    }
                
                $output .= '</a>';
                
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element">' . $output . '</div>'; 
            
            }
                            
            return $output;
        
        }
            
    }

}

new UT_Big_Icon;