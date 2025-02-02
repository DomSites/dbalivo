<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Dummy_Shortcode' ) ) {
	
    class UT_Dummy_Shortcode {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_portfolio_details';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Portfolio Details Box', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Information',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/portfolio-details.png',
                        'class'           => 'ut-vc-icon-module ut-information-module',    
                        'content_element' => true,
                        'params'          => array(
                             
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Portfolio Details Box Description', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Only for internal use. This adds a label to Visual Composer for an easier element identification.', 'ut_shortcodes' ),
                                'param_name'        => 'box_description',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),    
                    
                             array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Style', 'ut_shortcodes' ),
                                'param_name'        => 'style',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'List'  , 'ut_shortcodes' )  => 'list',
                                    esc_html__( 'Compact', 'ut_shortcodes' ) => 'compact',
                                    esc_html__( 'Inline' , 'ut_shortcodes' ) => 'inline'
                                ),
                             ),
                                
                             array(
                                'type'          => 'param_group',
                                'heading'       => esc_html__( 'Details', 'ut_shortcodes' ),
                                'group'         => 'General',
                                'param_name'    => 'values',
                                'params' => array(
                                    
                                    array(
                                        'type'          => 'textfield',
                                        'heading'       => esc_html__( 'Title', 'ut_shortcodes' ),
                                        'param_name'    => 'title',                                        
                                        'admin_label'   => true,
                                    ),
                                    
                                    array(
                                        'type'          => 'textfield',
                                        'heading'       => esc_html__( 'Description', 'ut_shortcodes' ),
                                        'param_name'    => 'description',                                        
                                        'admin_label'   => true,
                                    ),
                                    
                                    array(
                                        'type'          => 'checkbox',
                                        'heading'       => esc_html__( 'Description is a link?', 'unitedthemes' ),
                                        'param_name'    => 'is_link',
                                    ), 
                                    
                                    array(
                                        'type'          => 'vc_link',
                                        'heading'       => esc_html__( 'Link', 'ut_shortcodes' ),
                                        'param_name'    => 'link',
                                        'dependency'    => array(
                                            'element' => 'is_link',
                                            'value'   => array( 'true' ),
                                        )
                                    ),
                                    
                                ),

                            ),   
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Text Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => '',
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'center',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),
                            
                            array(
                                'type'              => 'range_slider',
                                'heading'           => esc_html__( 'Spacing between Detail Title and Description', 'ut_shortcodes' ),
                                'param_name'        => 'detail_spacing',
                                'group'             => 'General',
                                'value'             => array(
                                    'default' => '10',
                                    'min'     => '0',
                                    'max'     => '50',
                                    'step'    => '1',
                                    'unit'    => 'px'
                                ),
                            ),
                    
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
                                'group'             => 'General'
                            ),
                            
                            /* css colors */
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Title Color', 'ut_shortcodes' ),
								'param_name'        => 'title_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Description Color', 'ut_shortcodes' ),
								'param_name'        => 'description_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Description Link Color', 'ut_shortcodes' ),
								'param_name'        => 'description_link_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Description Link Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'description_link_hover_color',
								'group'             => 'Colors'
						  	),
                            
                            /* design options */
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
                'style'                         => 'list',
                'title'                         => '',
                'title_color'                   => '',
                'description'                   => '',
                'description_color'             => '',
                'description_link_color'        => '',
                'description_link_hover_color'  => '',
                'align'                         => 'left',
                'detail_spacing'                => '',
                'values'                        => '',
                'class'                         => '',
                'css'                           => ''
            ), $atts ) ); 
            
            $classes    = array();
            $classes[]  = $class;
            
            /* portfolio details */
            $values = vc_param_group_parse_atts( $values ); 
             
            /* start output */
            $output = '';
            
            if( !empty( $values ) && is_array( $values ) ) {
                
                /* unique listz ID */
                $id = uniqid("ut_pd_");
                
                $css_style  = '<style class="bklyn-inline-styles" type="text/css" scoped>';
                    
                    if( !empty( $title_color ) ) {
                        $css_style .= '#' . $id . '.ut-portfolio-info-details .widget-title { color: ' . $title_color . '; }';
                    }
                    
                    if( !empty( $description_color ) ) {
                        $css_style .= '#' . $id . '.ut-portfolio-info-details p { color: ' . $description_color . '; }';
                    }
                    
                    if( !empty( $description_link_color ) ) {
                        $css_style .= '#' . $id . '.ut-portfolio-info-details a { color: ' . $description_link_color . '; }';
                        $css_style .= '#' . $id . '.ut-portfolio-info-details a:visited { color: ' . $description_link_color . '; }';
                    }
                    
                    if( !empty( $description_link_hover_color ) ) {
                        $css_style .= '#' . $id . '.ut-portfolio-info-details a:hover { color: ' . $description_link_hover_color . '; }';
                        $css_style .= '#' . $id . '.ut-portfolio-info-details a:focus { color: ' . $description_link_hover_color . '; }';
                        $css_style .= '#' . $id . '.ut-portfolio-info-details a:active { color: ' . $description_link_hover_color . '; }';
                    }
                
                    if( $detail_spacing != '' ) {
                        $css_style .= '#' . $id . '.ut-portfolio-info-details .widget-title { margin-bottom: ' . $detail_spacing . 'px; }';
                    }
                    
                $css_style .= '</style>';
                
                /* attach CSS */
                $output .= ut_minify_inline_css( $css_style );
                
                /* start shortcode */
                $output .= '<div id="' . esc_attr( $id ) . '" class="ut-portfolio-info-details ut-portfolio-info-' . $align . ' ' . implode(' ', $classes ) . '">';    
                    
                    $output .= '<ul class="ut-portfolio-info-details-' . $style .' clearfix">';
                    
                    foreach( $values as $value ) {
                        
                        $output .= '<li>';
                        
                            $description = $title = '';
                            
                            $description = !empty( $value['description'] ) ?  $value['description'] : ''; 
                            $title       = !empty( $value['title'] ) ? $value['title'] : ''; 
                            
                            if( $title ) {
                                $output .= '<h6 class="widget-title">' . $value['title'] . '</h6>';
                            }
                            
                            if( isset( $value['is_link'] ) && $value['is_link'] && !empty( $value['link'] ) ) {
                                    
                                $link = vc_build_link( $value['link'] );
                                
                                $url    = !empty( $link['url'] )    ? $link['url'] : '';
                                $target = !empty( $link['target'] ) ? $link['target'] : '_self';
                                $title  = !empty( $link['title'] )  ? $link['title'] : '';
                                $rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
                                
                                $output .= '<p><a title="' . esc_attr( $title ) . '" href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '>' . $value['description'] . '</a></p>';
                                
                            } elseif( !empty( $description ) ) {
                            
                                $output .= '<p>' . $value['description'] . '</p>';
                            
                            }
                        
                        $output .= '</li>';
                    
                    }                    
                
                $output .= '</ul>';
            
            $output .= '</div>';
            
            }
                
            return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
        
        }
            
    }

}

new UT_Dummy_Shortcode;