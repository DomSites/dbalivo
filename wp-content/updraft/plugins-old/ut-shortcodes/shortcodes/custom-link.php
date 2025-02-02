<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Custom_Link' ) ) {
	
    class UT_Custom_Link {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_custom_link';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Custom Link', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/fancy-link.png',
                        'category'        => 'Structual',                        
                        'class'           => 'ut-vc-icon-module ut-structual-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'vc_link',
                                'heading'           => esc_html__( 'Link', 'ut_shortcodes' ),
                                'admin_label'       => true,
                                'param_name'        => 'link',
                                'group'             => 'General'
                            ),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'center',
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => 'left',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Icon to Link?', 'unitedthemes' ),
                                'param_name'        => 'icon',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'                                    
                                )                                
                            ),  
                            
                            array(
                                'type'          => 'dropdown',
                                'heading'       => esc_html__( 'Icon library', 'ut_shortcodes' ),
                                'description'   => esc_html__( 'Select icon library.', 'ut_shortcodes' ),
                                'param_name'    => 'icon_type', 
                                'group'         => 'General', 
                                'value'         => array(
                                    esc_html__( 'Brooklyn Icons', 'ut_shortcodes' ) => 'bklynicons',
                                    esc_html__( 'Font Awesome', 'ut_shortcodes' ) => 'fontawesome',
                                    //esc_html__( 'Custom Icon', 'ut_shortcodes' ) => 'custom',
                                ),
                                'dependency' => array(
                                    'element'   => 'icon',
                                    'value'     => 'yes',
                                ),
                                                              
                            ),
                    
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon_fontawesome',
                                'group'             => 'General',                                
                                'dependency' => array(
                                    'element'   => 'icon_type',
                                    'value'     => 'fontawesome',
                                ),
                            ),
                            
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Choose Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon_bklyn',
                                'group'             => 'General',
                                'settings' => array(
                                    'emptyIcon'     => true,
                                    'type'          => 'bklynicons',
                                ),
                                'dependency' => array(
                                    'element'   => 'icon_type',
                                    'value'     => 'bklynicons',
                                ),
                                                                
                            ),
                            
                            /*array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Custom Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon_image',
                                'group'             => 'General',
                                'dependency' => array(
                                    'element'   => 'icon_type',
                                    'value'     => 'custom',
                                ),    
                            ),*/
                    
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Icon Position', 'unitedthemes' ),
                                'param_name'        => 'icon_position',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'before', 'ut_shortcodes' ) => 'before',
                                    esc_html__( 'after', 'ut_shortcodes' ) => 'after'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'icon',
                                    'value'   => 'yes',
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Hover Animation to Icon?', 'unitedthemes' ),
                                'param_name'        => 'icon_animation',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => '',
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes'                                    
                                ),
                                'dependency'        => array(
                                    'element' => 'icon',
                                    'value'   => 'yes',
                                ),
                            ),
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'text_transform',
								'group'             => 'Link Font Settings',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                    
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'font_weight',
								'group'             => 'Link Font Settings',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold'
                                ),                              
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Color', 'ut_shortcodes' ),
								'param_name'        => 'link_color',
								'group'             => 'Link Colors'                                
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Link Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'link_color_hover',
								'group'             => 'Link Colors'                                
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Link Colors'                                
						  	),
                    
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color_hover',
								'group'             => 'Link Colors'                                
						  	),
                                                
                            // custom CSS class    
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
                                'group'             => 'General'
                            ),
                    
                    
                            // Design Options                          
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
                'link'              => '',
                'align'             => 'center',
                'icon'              => '',
                'icon_type'         => 'bklynicons',
                'icon_fontawesome'  => '',
                'icon_image'        => '',
                'icon_bklyn'        => '',
                'icon_position'     => 'before',
                'icon_animation'    => '',
                'font_weight'       => '',
                'text_transform'    => '',
                'link_color'        => '',
                'link_color_hover'  => '',
                'icon_color'        => '',
                'icon_color_hover'  => '',
                'css'               => '',
                'class'             => ''
            ), $atts ) ); 
            
            $link_icon = false;
            
            // classes
            $classes   = array();
            $classes[] = $class;
            
            if( $icon_animation ) {
                $classes[] = 'ut-custom-link-module-with-animation';
                $classes[] = 'ut-custom-link-module-icon-' . $icon_position; 
            }
            
            $classes[] = 'ut-custom-link-module-' . $align;
            
            // link settings
            if( function_exists('vc_build_link') && $link ) {
                
                $link = vc_build_link( $link );
                
                // assign link
                $url = !empty( $link['url'] ) ? $link['url'] : '#';
                
            } 
            
            $target = !empty( $link['target'] ) ? $link['target'] : '_self';
            $title = !empty( $link['title'] )  ? $link['title'] : '';
            $rel = !empty( $link['rel'] ) ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
            
            // icon settings
            if( $icon_type == 'bklynicons' && !empty( $icon_bklyn ) ) {
                    
                $link_icon = $icon_bklyn;

            } else {

                if( strpos( $icon_fontawesome, 'fa fa-' ) === false ) {
                    
                    $link_icon = str_replace('fa-', 'fa fa-', $icon_fontawesome );     
                    
                } else {
                    
                    $link_icon = $icon_fontawesome;
                    
                }
                
            }             
            
            // inline custom css 
            $id = uniqid("ut_cl_");
            
            $css_style = '';
            
            if( $align ) {
                $css_style .= '#' . $id . ' { text-align:' . $align . '; }';   
            }
            
            if( !empty( $link_color ) ) {
                $css_style .= '#' . $id . ' a { color:' . $link_color . '; }';
            }
            
            if( !empty( $link_color_hover ) ) {
                $css_style .= '#' . $id . ' a:hover { color:' . $link_color_hover . '; }';
                $css_style .= '#' . $id . ' a:active { color:' . $link_color_hover . '; }';
                $css_style .= '#' . $id . ' a:focus { color:' . $link_color_hover . '; }';
            }
                        
            if( !empty( $icon_color ) ) {
                $css_style .= '#' . $id . ' a i { color:' . $icon_color . '; }';
            }
            
            if( !empty( $icon_color_hover ) ) {
                $css_style .= '#' . $id . ' a:hover i { color:' . $icon_color_hover . '; }';
                $css_style .= '#' . $id . ' a:active i { color:' . $icon_color_hover . '; }';
                $css_style .= '#' . $id . ' a:focus i { color:' . $icon_color_hover . '; }';
            }
            
            if( !empty( $font_weight ) ) {
                $css_style .= '#' . $id . ' { font-weight:' . $font_weight . '; }';
            }
            
            if( !empty( $text_transform ) ) {
                $css_style .= '#' . $id . ' { text-transform:' . $text_transform . '; }';
            }
            
            /* start output */
            $output = '';
            
            // add css to output
            if( !empty( $css_style ) ) {
                $output .= ut_minify_inline_css( '<style type="text/css" scoped>' . $css_style . '</style>' );
            }
            
            $output .= '<div id="' . esc_attr( $id ) . '" class="ut-custom-link-module-holder ' . implode(' ', $classes ) . '">';
            
                $output .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '" class="ut-custom-link-module" ' . $rel . '>';

                    if( $icon && $link_icon && $icon_position == 'before' ) {

                        $output .= '<i class="' . $link_icon . '"></i>';    

                    }

                    $output .= $title;

                    if( $icon && $link_icon && $icon_position == 'after' ) {

                        $output .= '<i class="' . $link_icon . '"></i>';    

                    }

                $output .= '</a>';
            
            $output .= '</div>';
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }
            
            return $output;            
        
        }
            
    }

}

new UT_Custom_Link;