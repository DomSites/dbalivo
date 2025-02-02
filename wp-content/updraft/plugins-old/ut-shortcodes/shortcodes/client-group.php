<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Client_Group' ) ) {
	
    class UT_Client_Group {
        
        private $shortcode;
        private $inner_shortcode;
        
        private $client_count;
        private $client_carousel;
        private $client_total_count;        
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode       = 'ut_client_group';
            $this->inner_shortcode = 'ut_client';
            
            $this->client_count       = NULL;
            $this->client_carousel    = FALSE;
            $this->client_total_count = NULL;
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );
            add_shortcode( $this->inner_shortcode, array( $this, 'ut_create_inner_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Client Carousel', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/client-carousel.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'as_parent'       => array( 'only' => $this->inner_shortcode ),
                        'content_element' => true,
                        'js_view'         => 'VcColumnView',
                        'params'          => array(
                            
                            array(
                                'type'              => 'checkbox',
                                'heading'           => esc_html__( 'Activate Carousel?', 'unitedthemes' ),
                                'param_name'        => 'carousel',
                                'group'             => 'General',                                
                            ),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                            
                            /* carousel colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Decoration Line Top Color', 'ut_shortcodes' ),
								'param_name'        => 'deco_line_color_top',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Decoration Line Bottom Color', 'ut_shortcodes' ),
								'param_name'        => 'deco_line_color_bottom',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_color',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_color_hover',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Background Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_background',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Hover Background Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_background_hover',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Border Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_border_color',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Arrow Hover Border Color', 'ut_shortcodes' ),
								'param_name'        => 'arrow_border_color_hover',
								'group'             => 'Colors',
                                'dependency'    => array(
                                    'element' => 'carousel',
                                    'value'   => array( 'true' ),
                                )
						  	),
                            
                            
                            
                            /* css editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            )                           
                            
                        )                                                
                        
                    )
                
                ); /* end mapping */
                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Client', 'ut_shortcodes' ),
                        'base'            => $this->inner_shortcode,
                        'as_child'        => array( 'only' => $this->shortcode ),
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/client.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            array(
                                'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Client Logo', 'ut_shortcodes' ),
                                'param_name'        => 'logo',
                                'group'             => 'General'
                            ),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Client Name', 'ut_shortcodes' ),
								'param_name'        => 'name',
                                'admin_label'       => true,
								'group'             => 'General'
						  	),
                            array(
								'type'              => 'vc_link',
								'heading'           => esc_html__( 'Client Website', 'ut_shortcodes' ),
								'param_name'        => 'url',
								'group'             => 'General'
						  	),
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                                                        
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'class'                    => '',
                'carousel'                 => 'off',
                'deco_line_color_top'      => '',
                'deco_line_color_bottom'   => '',
                'arrow_color'              => '',
                'arrow_color_hover'        => '',
                'arrow_background'         => '',
                'arrow_background_hover'   => '',
                'arrow_border_color'       => '',
                'arrow_border_color_hover' => '',
                'css'                      => ''
            ), $atts ) ); 
            
            $classes = array();
            
            /* extra element class */
            $classes[] = $class;
                        
            /* count clients */
            $this->client_total_count = substr_count( $content, '[ut_client' );
            
            /* start output */
            $output = '';
            
            $id       = uniqid("ut_cc_");
            $outer_id = uniqid("ut_cc_outer_");
            
            $css_style = '<style type="text/css" scoped>';
                
                $selector = '#' . $outer_id;
                
                if( $deco_line_color_top ) {
                    $css_style .= $selector . ' .elastislide-wrapper { border-top-color: ' . $deco_line_color_top . '; }';
                }
                
                if( $deco_line_color_bottom ) {
                    $css_style .= $selector . ' .elastislide-wrapper { border-bottom-color: ' . $deco_line_color_bottom . '; }';
                }
                
                if( $arrow_color ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span::before { color: ' . $arrow_color . '; }';
                }
                
                if( $arrow_color_hover ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span:hover::before { color: ' . $arrow_color_hover . '; }';
                }
                
                if( $arrow_background ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span { background: ' . $arrow_background . '; }';
                }
                
                if( $arrow_background_hover ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span:hover { background: ' . $arrow_background_hover . '; }';
                }
                
                if( $arrow_border_color ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span { border-color: ' . $arrow_border_color . '; }';
                }
                
                if( $arrow_border_color_hover ) {
                    $css_style .= $selector . ' .elastislide-wrapper nav span:hover { border-color: ' . $arrow_border_color_hover . '; }';
                }
                
            $css_style.= '</style>';
            
            
            if( !empty( $carousel ) && ( $carousel == 'on' || $carousel == 'true' ) ) {
                
                $this->client_carousel = true;
                
                /* add js */
                $output .= '
                <script type="text/javascript">
                    
                    (function($){
                                            
                        $(document).ready(function(){
                    
                            $( "#' . $id . '" ).elastislide();
                        
                        });
                            
                    })(jQuery);
                
                </script>'; 
                
                /* add css */ 
                $output .= ut_minify_inline_css( $css_style );
                
                $output  .= '<ul id="' . esc_attr( $id ) . '" class="ut-brands ' . esc_attr(  implode(' ', $classes ) ) . ' elastislide-list">';
                    $output .= do_shortcode( $content );
                $output .= '</ul>';
            
            } else {
                
                $output  .= '<div class="ut-brands ' . esc_attr(  implode(' ', $classes ) ) . ' clearfix">';
                      $output .= do_shortcode( $content );
                $output .= '</div>';
            
            }
            
            /* done - let's reset */
            $this->client_carousel = false;
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div id="' . $outer_id .'" class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
                
            return $output;
        
        }
        
        function ut_create_inner_shortcode( $atts, $content = NULL ) {
        
            extract( shortcode_atts( array(
                'name'        => '',
                'logo'        => '',
                'url'         => '#',        
                'target'      => '_blank',  /* deprecated */
                'class'       => ''        
            ), $atts ) );
            
            /* client grid */
            $grid = array(  
                1 => '100',
                2 => '50',
                3 => '33',
                4 => '25',
                5 => '20' 
            );
            
            /* prepare link setting */
            if( function_exists('vc_build_link') && !empty( $url ) && strpos( $url, 'url:') !== false ) {
                
                $link = vc_build_link( $url );
                
                $url    = !empty( $link['url'] )    ? $link['url'] : '#';
                $target = !empty( $link['target'] ) ? $link['target'] : '_self';
                $title  = !empty( $link['title'] )  ? $link['title'] : '';
                $rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
                
            } else {
                
                $title  = !empty( $name )  ? $name : 'Image';
                $rel    = '';
                
            }
            
            /* start output */
            $output = '';
            
            if( $this->client_carousel ) {
                
                $output .= '<li class="' . esc_attr( $class ) . '">';
            
                    if( !empty( $url ) ) {
                        
                        $output .= '<a target="' . esc_attr( $target ) . '" href="' . esc_attr( $url ) . '" ' . $rel . '>';
                        
                    }
                    
                    /* fallback */
                    if( empty( $logo ) ) {
                        
                        $output .= '<img alt="' . esc_attr( $title )  . '" src="' . esc_url( vc_asset_url( 'vc/no_image.png' ) ) . '">';
                        
                    }                    
                    
                    if( strpos( $logo, '.png' ) !== false || strpos( $logo, '.jpg' ) !== false || strpos( $logo, '.gif' ) !== false || strpos( $logo, '.ico' ) !== false ) {
                        
                        $output .= '<img alt="' . esc_attr( $title )  . '" src="' . esc_url( $logo ) . '">';
                    
                    } elseif( !empty( $logo ) ) {
                        
                        $output .= '<img alt="' . esc_attr( $title )  . '" src="' . wp_get_attachment_url( $logo ) . '">';
                    
                    }                    
                    
                    if( !empty( $url ) ) {    
                        
                        $output .= '</a>';
                        
                    }            
                
                $output .= '</li>';                
            
            } else {
                
                $grid_items = ( $this->client_total_count >= 5 ) ? 5 : $this->client_total_count;
                
                $output  = '<div class="grid-' . $grid[$grid_items] . ' tablet-grid-' . $grid[$grid_items] . ' mobile-grid-50 ' . $class . '">';
                
                    if( !empty($url) ) {
                        $output .= '<a target="' . esc_attr( $target ) . '" href="' . esc_attr( $url ) . '" ' . $rel . '>';
                    }
                        
                    if( strpos( $logo, '.png' ) !== false || strpos( $logo, '.jpg' ) !== false || strpos( $logo, '.gif' ) !== false || strpos( $logo, '.ico' ) !== false ) {
                        
                        $output .= '<img alt="' . esc_attr( $title )  . '" src="' . esc_url( $logo ) . '">';
                    
                    } else {
                        
                        $output .= '<img alt="' . esc_attr( $title )  . '" src="' . wp_get_attachment_url( $logo ) . '">';
                    
                    }
                    
                    if( !empty($url) ) {    
                        $output .= '</a>';
                    }
                    
                $output .= '</div>';
                
                /* global counter */
                $this->client_count++;
                
                /* if counter has reached the maximum of 5 per row , decrease the total counter */
                if( $this->client_count ==  5 && $this->client_total_count > 5) {
                    $this->client_total_count = $this->client_total_count - $this->client_count;
                    $this->client_count = 0;
                }
            
            }
            
            return $output;        
        
        }
            
    }

}

new UT_Client_Group;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_ut_client_group extends WPBakeryShortCodesContainer {
    
    }
    
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_client extends WPBakeryShortCode {
    
    }
    
}