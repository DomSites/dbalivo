<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Person_Module' ) ) {
	
    class UT_Person_Module {
        
        private $shortcode;
        private $link;
        private $social;
        private $social_border;
        private $output;
        private $name;
        private $occupation;
        private $content;
             
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_person_module';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'BKLYN5 Sneak Peak Person Module', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/team-member.png',
                        'class'           => 'ut-vc-icon-module ut-community-module', 
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'          => 'attach_image',
                                'heading'       => esc_html__( 'Avatar', 'ut_shortcodes' ),
                                'param_name'    => 'avatar',
                                'group'         => 'General'
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__( 'Name', 'ut_shortcodes' ),
                                'param_name'    => 'name',
                                'admin_label'   => true,
                                'group'         => 'General'
                            ),
                            array(
                                'type'          => 'textfield',
                                'heading'       => esc_html__( 'Occupation', 'ut_shortcodes' ),
                                'param_name'    => 'occupation',
                                'group'         => 'General'
                            ),
                            array(
                                'type'          => 'param_group',
                                'heading'       => esc_html__( 'Social Profiles', 'ut_shortcodes' ),
                                'group'         => 'General',
                                'param_name'    => 'social',
                                'params' => array(
                                    array(
                                        'type'          => 'iconpicker',
                                        'heading'       => esc_html__( 'Icon', 'ut_shortcodes' ),
                                        'param_name'    => 'icon'                                        
                                    ),
                                    array(
                                        'type'          => 'textfield',
                                        'heading'       => esc_html__( 'Title', 'ut_shortcodes' ),
                                        'admin_label'   => true,
                                        'param_name'    => 'title',
                                    ),
                                    array(
                                        'type'          => 'vc_link',
                                        'heading'       => esc_html__( 'Profile Link', 'ut_shortcodes' ),
                                        'param_name'    => 'link',
                                    ),
                                    
                                ),

                            ),
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Link', 'ut_shortcodes' ),
                                'param_name'        => 'link',
                                'group'             => 'General'
                            ),      
                    
                    
                            /* box design */
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Name Font Weight', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Please keep in mind, that the font needs to support the font weight.', 'ut_shortcodes' ),
								'param_name'        => 'name_font_weight',
								'group'             => 'Box Design',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'lighter' , 'ut_shortcodes' )  => 'lighter',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )   => 'bold',
                                    esc_html__( 'bolder' , 'ut_shortcodes' ) => 'bolder',
                                    esc_html__( '100' , 'ut_shortcodes' )    => '100',
                                    esc_html__( '200' , 'ut_shortcodes' )    => '200',
                                    esc_html__( '300' , 'ut_shortcodes' )    => '300',
                                    esc_html__( '400' , 'ut_shortcodes' )    => '400',
                                    esc_html__( '500' , 'ut_shortcodes' )    => '500',
                                    esc_html__( '600' , 'ut_shortcodes' )    => '600',
                                    esc_html__( '700' , 'ut_shortcodes' )    => '700',
                                    esc_html__( '800' , 'ut_shortcodes' )    => '800',
                                    esc_html__( '900' , 'ut_shortcodes' )    => '900',
                                ),
						  	),
                    
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Name Font Size', 'ut_shortcodes' ),
								'param_name'        => 'name_font_size',
                                'group'             => 'Box Design',
                                'value'             => array(
                                    'default'   => '18',
                                    'min'       => '0',
                                    'max'       => '50',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
						  	),
                        
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Name Color', 'ut_shortcodes' ),
								'param_name'        => 'name_color',
                                'group'             => 'Box Design',
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Name Decoration Line Color', 'ut_shortcodes' ),
								'param_name'        => 'name_decoration_line_color',
                                'group'             => 'Box Design',
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Ocupation Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'ocupation_font_weight',
                                'group'             => 'Box Design',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'lighter' , 'ut_shortcodes' )  => 'lighter',
                                    esc_html__( 'normal' , 'ut_shortcodes' ) => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )   => 'bold',
                                    esc_html__( 'bolder' , 'ut_shortcodes' ) => 'bolder',
                                    esc_html__( '100' , 'ut_shortcodes' )    => '100',
                                    esc_html__( '200' , 'ut_shortcodes' )    => '200',
                                    esc_html__( '300' , 'ut_shortcodes' )    => '300',
                                    esc_html__( '400' , 'ut_shortcodes' )    => '400',
                                    esc_html__( '500' , 'ut_shortcodes' )    => '500',
                                    esc_html__( '600' , 'ut_shortcodes' )    => '600',
                                    esc_html__( '700' , 'ut_shortcodes' )    => '700',
                                    esc_html__( '800' , 'ut_shortcodes' )    => '800',
                                    esc_html__( '900' , 'ut_shortcodes' )    => '900',
                                ),
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Occupation Color', 'ut_shortcodes' ),
								'param_name'        => 'ocupation_color',
								'group'             => 'Box Design'
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Social Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Box Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Social Icon Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color_hover',
								'group'             => 'Box Design'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Overlay Color', 'ut_shortcodes' ),
								'param_name'        => 'overlay_color',
								'group'             => 'Box Design',
						  	),
                            
                            /* css */
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
        
        function create_member_box_style_three( $member_link ) {
            
            if( $member_link ) {
            
                $target = !empty( $member_link['target'] ) ? $member_link['target'] : '_self';
                $title  = !empty( $member_link['title'] )  ? $member_link['title'] : '';
                $rel    = !empty( $member_link['rel'] )    ? 'rel="' . esc_attr( trim( $member_link['rel'] ) ) . '"' : '';
                $link   = !empty( $member_link['url'] )    ? $member_link['url'] : '';
            
            }
                
            $this->output .= '<div class="bklyn5-team-member-overlay">';
                
                $this->output .= '<div class="bklyn5-team-member-overlay-caption">';
                    
                    $this->output .= '<div class="bklyn5-team-member-info">';
                        
                        if( $member_link ) {
                        
                            $this->output .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '>';

                        }
            
                        if( $this->name ) {        
                            $this->output .= '<h3 class="bklyn5-team-member-name">' . $this->name . '</h3>';
                        }
                        
                        if( $this->occupation ) {
                            $this->output .= '<div class="bklyn5-team-member-ocupation">' . $this->occupation . '</div>';
                        }
                        
                        if( $member_link ) {
                        
                            $this->output .= '</a>';

                        }
            
                        $this->create_social_link();
                            
                    $this->output .= '</div>';
            
                $this->output .= '</div>';
                
            $this->output .= '</div>';                
               
        }
        
        function create_social_link() {
            
            if( !empty( $this->social ) && is_array( $this->social ) ) {
                    
                $this->output .= '<div class="bklyn5-team-member-social-icons ' . $this->social_border . '">';
                    
                    $this->output .= '<ul>';
                        
                        foreach( $this->social as $profile ) {
                            
                            if( !empty( $profile['link'] ) ) {
                            
                                /* link settings */
                                $link = vc_build_link( $profile['link'] );
                                
                                $url    = !empty( $link['url'] )    ? $link['url'] : '#';
                                $target = !empty( $link['target'] ) ? $link['target'] : '_self';
                                $title  = !empty( $link['title'] )  ? $link['title'] : '';
                                $rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
                                
                                /* profile icon */
                                $icon   = !empty( $profile['icon'] )?  $profile['icon'] : 'fa fa-circle';
                                       
                                $this->output .= '<li>';
                                    $this->output .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '><i class="' . esc_attr( $icon ) . '"></i></a>';
                                $this->output .= '</li>';
                            
                            }
                        
                        }
                        
                    $this->output .= '</ul>';
                
                $this->output .= '</div>';
            
            }
        
        }        
        
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'style'                         => 'member-style-3',
                'align'                         => 'left',
                'avatar'                        => '',
                'name'                          => '',
                'link'                          => '',
                'name_color'                    => '',
                'name_decoration_line_color'    => '',
                'name_font_size'                => '',
                'name_font_weight'              => '',
                'line'                          => 'on',
                'line_color'                    => '',
                'line_style'                    => '',
                'line_width'                    => '',
                'occupation'                    => '',
                'ocupation_color'               => '',
                'ocupation_font_weight'         => '',
                'description_color'             => '',
                'social'                        => '',
                'icon_color'                    => '',
                'icon_color_hover'              => get_option('ut_accentcolor'),
                'overlay_color'                 => '',
                'css'                           => ''
            ), $atts ) ); 

            $this->name          = $name;
            $this->occupation    = $occupation;
            $this->content       = $content;
            $this->social_border = $line == 'off' ? 'no-bklyn5-team-member-border' : '';            
            
            /* extract social items */
            if( !empty( $social ) && function_exists('vc_param_group_parse_atts') && vc_param_group_parse_atts( $social ) ) {
                
                $this->social = array_filter( vc_param_group_parse_atts( $social ) );
                
            }            
            
            /* avatar */
            $image_meta = get_post( $avatar );
            $alt        = '';
            
            if( get_post( $avatar ) ) {
                $alt = $image_meta->post_title;
            }
            
            if( $style == 'member-style-2' ) {
            
                $avatar = ut_resize( wp_get_attachment_url( $avatar ) , '280', '280', true, true, true );
                $align  = 'center';
                
            } else {
            
                $avatar = ut_resize( wp_get_attachment_url( $avatar ) , get_option('large_size_w'), get_option('large_size_h'), true, true, true );
            
            }            
                        
            /* fallback */
            if( empty( $avatar ) ) {
                
                $avatar = vc_asset_url( 'vc/no_image.png' );
                
            }
            
            /* link */
            $member_link = false;
            
            if( function_exists('vc_build_link') && $link ) {
                
                $member_link = vc_build_link( $link );
                
            } 

            /* unique listz ID */
            $id = uniqid("ut_tm_");
            
            $css_style = '';
                
            if( $name_color ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-name { color: ' . $name_color . '; }'; 
            }
            
            if( $name_decoration_line_color ) {
                $css_style .= '#' . $id . '.bklyn5-team-member .bklyn5-team-member-social-icons > *::before { background: ' . $name_decoration_line_color . '; }'; 
            }
            
            if( $name_font_size ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-name { font-size: ' . $name_font_size . 'px; }'; 
            }
            
            if( $name_font_weight ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-name { font-weight: ' . $name_font_weight . '; }'; 
            }
            
            if( $ocupation_color ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-ocupation { color: ' . $ocupation_color . '; }'; 
            }
            
            if( $ocupation_font_weight ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-ocupation { font-weight: ' . $ocupation_font_weight . '; }'; 
            }
            
            if( $description_color ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-description { color: ' . $description_color . '; }'; 
            }
            
            if( $icon_color ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-social-icons a { color: ' . $icon_color . '; }';
                $css_style .= '#' . $id . ' .bklyn5-team-member-social-icons a:visited { color: ' . $icon_color . '; }';  
            }
            
            $css_style .= '#' . $id . ' .bklyn5-team-member-social-icons a:hover { color: ' . $icon_color_hover . '; }';
            $css_style .= '#' . $id . ' .bklyn5-team-member-social-icons a:focus { color: ' . $icon_color_hover . '; }'; 
            $css_style .= '#' . $id . ' .bklyn5-team-member-social-icons a:active { color: ' . $icon_color_hover . '; }';  
            
            
            if( $overlay_color ) {
                $css_style .= '#' . $id . ' .bklyn5-team-member-overlay { background: ' . $overlay_color . '; }'; 
            }
            
            /* start output */
            $this->output = '';
            
            if( !empty( $css_style ) ) {
                $this->output .= ut_minify_inline_css( '<style type="text/css" scoped>' . $css_style . '</style>' );
            }
            
            $this->output .= '<div id="' . esc_attr( $id ) . '" class="bklyn5-team-member bklyn5-team-' . esc_attr( $style ) . ' bklyn5-team-member-' . $align . '">';
                
                if( !empty( $avatar ) ) {
                    
                    $this->output .= '<div class="bklyn5-team-member-avatar">';
                        
                        $this->output .= '<img alt="' . esc_attr( $alt ) . '" src="' . esc_url( $avatar ) .  '">';
                        
                    $this->output .= '</div>';
                    
                    $this->create_member_box_style_three( $member_link );
                
                } 
            
                
                
            $this->output .= '</div>';
            
            return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $this->output . '</div>';
        
        }
            
    }

}

new UT_Person_Module;


if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_person_module extends WPBakeryShortCode {
        
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
    
            if ( 'attach_image' === $param['type'] && 'avatar' === $param_name ) {
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