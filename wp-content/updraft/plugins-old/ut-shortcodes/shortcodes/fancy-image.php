<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Fancy_Image' ) ) {
	
    class UT_Fancy_Image {
        
        function __construct() {
			
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( 'ut_fancy_image', array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Fancy Image', 'ut_shortcodes' ),
                        'base'            => 'ut_fancy_image',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/fancy-image.png',
                        'category'        => 'Media',
                        'class'           => 'ut-vc-icon-module ut-media-module',
                        'content_element' => true,
                        'params' => array(
                            array(
								'type'        => 'attach_image',
								'heading'     => esc_html__( 'Image', 'ut_shortcodes' ),
								'param_name'  => 'image',
								'group'       => 'General'
						  	),
                            array(
								'type'        => 'colorpicker',
								'heading'     => esc_html__( 'Image Overlay Color', 'ut_shortcodes' ),
								'param_name'  => 'overlay',
								'group'       => 'Colors'
						  	),
                            array(
								'type'        => 'colorpicker',
								'heading'     => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'  => 'border',
								'group'       => 'Colors'
						  	),
                            array(
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Title', 'ut_shortcodes' ),
								'param_name'  => 'title',
								'group'       => 'General',
                                'admin_label' => true,
						  	),
                            array(
								'type'        => 'colorpicker',
								'heading'     => esc_html__( 'Title Color', 'ut_shortcodes' ),
								'param_name'  => 'title_color',
								'group'       => 'Colors'
						  	),
                            array(
								'type'        => 'colorpicker',
								'heading'     => esc_html__( 'Title Hover Color', 'ut_shortcodes' ),
								'param_name'  => 'title_hover_color',
								'group'       => 'Colors'
						  	),
                            array(
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Very Short Description', 'ut_shortcodes' ),
								'param_name'  => 'content',
								'group'       => 'General'
						  	),
                            array(
								'type'        => 'colorpicker',
								'heading'     => esc_html__( 'Description Color', 'ut_shortcodes' ),
								'param_name'  => 'desc_color',
								'group'       => 'Colors'
						  	),
                            array(
								'type'        => 'vc_link',
								'heading'     => esc_html__( 'Link', 'ut_shortcodes' ),
								'param_name'  => 'link',
								'group'       => 'General'
						  	),
                            array(
								'type'        => 'textfield',
								'heading'     => esc_html__( 'Margin Bottom', 'ut_shortcodes' ),
                                'description' => esc_html__( 'value in px , eg "20px" (optional)' , 'ut_shortcodes' ),
								'param_name'  => 'margin_bottom',
								'group'       => 'Spacing'
						  	),
                            
                        ),
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'image'             => '',
                'title'             => '',
                'title_color'       => '',
                'title_hover_color' => '',
                'desc_color'        => '',
                'link'              => '#',
                'target'            => '_blank',
                'rel'               => '',
                'overlay'           => '',
                'border'            => '',
                'margin_bottom'     => '',      
                'class'             => ''
            ), $atts ) ); 
            
            if( empty( $image ) ) {
                return;
            }            
            
            $image = ut_resize( wp_get_attachment_url( $image ) , '1280', '720', true, true, true );
            
            /* unique id */
            $id = uniqid( 'ut_fancy_image_' );
            
            /* css */
            $css = '<style type="text/css" scoped>';
                
                if( !empty( $title_color ) ) {
                    $css .= '#' . $id . ' .ut-fancy-image figcaption h3 { color: ' . $title_color . '; }';
                }
                
                if( !empty( $title_hover_color ) ) {
                    $css .= '#' . $id . ' .ut-fancy-image:hover figcaption h3 { color: ' . $title_hover_color . '; }';
                }                
                
                if( !empty( $desc_color ) ) {
                    $css .= '#' . $id . ' .ut-fancy-image p { color: ' . $desc_color . '; }';
                }
                
                if( !empty( $overlay ) ) {
                    $css .= '#' . $id . ' .ut-fancy-image { background: ' . $overlay . '; }';
                }
                
                if( !empty( $border ) ) {
                    $css .= '#' . $id . ' .ut-fancy-image figcaption::before { border-color: ' . $border . '; }';
                    $css .= '#' . $id . ' .ut-fancy-image figcaption::after { border-color: ' . $border . '; }';
                }               
                
                if( !empty( $margin_bottom ) ) {
                    $css .= '#' . $id . '.ut-fancy-image-wrap { margin-bottom: ' . $margin_bottom  . '; }';
                }
                
            $css .= '</style>';
            
            /* start output */
            $output = '';
             
            /* add css */ 
            $output .= ut_minify_inline_css( $css );
                      
            /* html */
            $output .= '<div id="' . $id . '" class="ut-fancy-image-wrap">';
                
                /* get link config */
                if( function_exists('vc_build_link') && !empty( $link ) && strpos( $link, 'url:') !== false ) {

                    $link = vc_build_link( $link );
                    
                    $link['target'] = empty( $link['target'] ) ? '_self' : $link['target'];
                    $link['url']    = empty( $link['url'] )    ? '#'     : $link['url'];
                    $rel            = empty( $link['rel'] )    ? ''      : 'rel="' . $link['rel'] . '"';
                
                } else {
                    
                    $url = array();
                                        
                    $url['url']     = $link;
                    $url['target']  = $target;
                    $rel            = empty( $rel ) ? '' : 'rel="' . $rel . '"';
                    
                    $link = $url;                 
                
                }
                
                $output .= '<a target="' . esc_attr( $link['target'] ) . '" href="' . esc_url( $link['url'] ) . '" ' . $rel . '>';
                
                    $output .= '<figure class="ut-fancy-image">';
                        
                            $output .= '<img src="' . esc_url( $image ) . '" alt="' . esc_attr( $title ) . '"/>';        
                            
                            $output .= '<figcaption>';
                                
                                if( !empty( $title ) ) {
                                
                                    $output .= '<h3>' . $title . '</h3>';
                                
                                }
                                
                                if( !empty( $content ) ) {
                                    
                                    $output .= '<p class="hide-on-mobile">' . $content . '</p>';    
                                    
                                }
                                
                            $output .= '</figcaption>';                        
                                    
                    $output .= '</figure>';
                
                $output .= '</a>';
                
            $output .= '</div>';
                
            return $output;
        
        }
            
    }

}

new UT_Fancy_Image;


if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_fancy_image extends WPBakeryShortCode {
        
        function __construct( $settings ) {
            
            parent::__construct( $settings );
            $this->jsScripts();
            
        }
    
        public function jsScripts() {
            
            wp_register_script( 'zoom', vc_asset_url( 'lib/bower/zoom/jquery.zoom.min.js' ), array(), WPB_VC_VERSION );
            wp_register_script( 'vc_image_zoom', vc_asset_url( 'lib/vc_image_zoom/vc_image_zoom.min.js' ), array(
                'jquery',
                'zoom',
            ), WPB_VC_VERSION, true );
            
        }
    
        public function singleParamHtmlHolder( $param, $value ) {
            
            $output = '';
    
            $param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
            $type = isset( $param['type'] ) ? $param['type'] : '';
            $class = isset( $param['class'] ) ? $param['class'] : '';
    
            if ( 'attach_image' === $param['type'] && 'image' === $param_name ) {
                $output .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
                $element_icon = $this->settings( 'icon' );
                $img = wpb_getImageBySize( array(
                    'attach_id' => (int) preg_replace( '/[^\d]/', '', $value ),
                    'thumb_size' => 'thumbnail',
                ) );
                $this->setSettings( 'logo', ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail vc_general vc_element-icon"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) . '<span class="no_image_image vc_element-icon' . ( ! empty( $element_icon ) ? ' ' . $element_icon : '' ) . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '">' . __( 'Add image', 'js_composer' ) . '</a>' );
                $output .= $this->outputTitleTrue( $this->settings['name'] );
            } elseif ( ! empty( $param['holder'] ) ) {
                if ( 'input' === $param['holder'] ) {
                    $output .= '<' . $param['holder'] . ' readonly="true" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '">';
                } elseif ( in_array( $param['holder'], array( 'img', 'iframe' ) ) ) {
                    $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" src="' . $value . '">';
                } elseif ( 'hidden' !== $param['holder'] ) {
                    $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
                }
            }
    
            if ( ! empty( $param['admin_label'] ) && true === $param['admin_label'] ) {
                $output .= '<span class="vc_admin_label admin_label_' . $param['param_name'] . ( empty( $value ) ? ' hidden-label' : '' ) . '"><label>' . $param['heading'] . '</label>: ' . $value . '</span>';
            }
    
            return $output;
        }
    
        public function getImageSquareSize( $img_id, $img_size ) {
            if ( preg_match_all( '/(\d+)x(\d+)/', $img_size, $sizes ) ) {
                $exact_size = array(
                    'width' => isset( $sizes[1][0] ) ? $sizes[1][0] : '0',
                    'height' => isset( $sizes[2][0] ) ? $sizes[2][0] : '0',
                );
            } else {
                $image_downsize = image_downsize( $img_id, $img_size );
                $exact_size = array(
                    'width' => $image_downsize[1],
                    'height' => $image_downsize[2],
                );
            }
            $exact_size_int_w = (int) $exact_size['width'];
            $exact_size_int_h = (int) $exact_size['height'];
            if ( isset( $exact_size['width'] ) && $exact_size_int_w !== $exact_size_int_h ) {
                $img_size = $exact_size_int_w > $exact_size_int_h
                    ? $exact_size['height'] . 'x' . $exact_size['height']
                    : $exact_size['width'] . 'x' . $exact_size['width'];
            }
    
            return $img_size;
        }
    
        protected function outputTitle( $title ) {
            return '';
        }
    
        protected function outputTitleTrue( $title ) {
            return '<h4 class="wpb_element_title">' . $title . ' ' . $this->settings( 'logo' ) . '</h4>';
        }                
        
    }
    
}