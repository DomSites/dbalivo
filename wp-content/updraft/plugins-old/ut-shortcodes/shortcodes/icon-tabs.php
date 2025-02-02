<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Icon_Tabs' ) ) {
	
    class UT_Icon_Tabs {
        
        private $shortcode;
        private $inner_shortcode;
        
        private $navigation;
        private $count;
        
        private $css;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_icon_tabs';
            $this->inner_shortcode = 'ut_icon_tab';
                
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );
            add_shortcode( $this->inner_shortcode, array( $this, 'ut_create_inner_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Icon Tabs', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Information',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/tabs.png',
                        'class'           => 'ut-vc-icon-module ut-information-module', 
                        'as_parent'       => array( 'only' => $this->inner_shortcode ),
                        'content_element' => true,
                        'is_container'    => true,
                        'params'          => array(
                                
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Alignment', 'ut_shortcodes' ) => '',
                                    esc_html__( 'center', 'ut_shortcodes' )           => 'center',
                                    esc_html__( 'left'  , 'ut_shortcodes' )           => 'left',
                                    esc_html__( 'right' , 'ut_shortcodes' )           => 'right',
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Apply Theme Font Face', 'ut_shortcodes' ),
								'description'       => esc_html__( 'By using this option, the label will use the global section headline font.', 'ut_shortcodes' ),
                                'param_name'        => 'label_text_font',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' ) => 'off',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'on'                                    
                                ),
						  	),
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Label Font Size', 'ut_shortcodes' ),
								'param_name'        => 'label_font_size',
                                'group'             => 'General',
                                'value'             => array(
                                    'default' => '12',
                                    'min'     => '12',
                                    'max'     => '20',
                                    'step'    => '1',
                                    'unit'    => 'px'
                                ),

						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Label Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'label_font_weight',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'normal' , 'ut_shortcodes' )             => 'normal',
                                    esc_html__( 'bold' , 'ut_shortcodes' )               => 'bold'
                                ),
						  	),
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Label Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'label_text_transform',
                                'edit_field_class'  => 'vc_col-sm-6',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' ) => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' ) => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' ) => 'lowercase'                                    
                                ),
						  	),
                            
                            
                        ),
                        'js_view'         => 'VcColumnView'
                        
                    )
                
                ); /* end mapping */
                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Icon Tab', 'ut_shortcodes' ),
                        'base'            => $this->inner_shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/toggle-item.png',
                        'class'           => 'ut-vc-icon-module ut-information-module', 
                        'as_child'        => array( 'only' => $this->shortcode ),
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Icon Source', 'ut_shortcodes' ),
								'param_name'        => 'icon_source',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'Font Awesome' , 'ut_shortcodes' )  => 'fontawesome',
                                    esc_html__( 'Brooklyn Icons', 'ut_shortcodes' ) => 'bklynicons',
                                    esc_html__( 'Custom Icon' , 'ut_shortcodes' )   => 'custom',
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
                                    'element'   => 'icon_source',
                                    'value'     => array( 'bklynicons' ),
                                ),
                                                                
                            ),
                            array(
								'type'              => 'iconpicker',
                                'heading'           => esc_html__( 'Icon', 'ut_shortcodes' ),
                                'param_name'        => 'icon',
                                'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'icon_source',
                                    'value'   => array( 'fontawesome' ),
                                )                                                                
                            ),
                            array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Icon', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'recommended size 128x128', 'ut_shortcodes' ),
                                'param_name'        => 'image_icon',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'icon_source',
                                    'value'   => array( 'custom' ),
                                )
                            ),
                            array(
								'type'              => 'attach_image',
                                'heading'           => esc_html__( 'Hover and Active Icon', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'optional - recommended size 128x128', 'ut_shortcodes' ),
                                'param_name'        => 'image_hover_icon',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'General',
                                'dependency'        => array(
                                    'element' => 'icon_source',
                                    'value'   => array( 'custom' ),
                                )
                            ),                                                      
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Tab Label', 'ut_shortcodes' ),
                                'param_name'        => 'label',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            array(
                                'type'              => 'textarea_html',
                                'heading'           => esc_html__( 'Tab Content', 'ut_shortcodes' ),
                                'param_name'        => 'content',
                                'group'             => 'Content'
                            ),
                            
                            /* colors */                          
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'icon_source',
                                    'value'   => array( 'fontawesome', 'bklynicons' ),
                                )
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Icon Hover and Active Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_hover_color',
								'group'             => 'Colors',
                                'dependency'        => array(
                                    'element' => 'icon_source',
                                    'value'   => array( 'fontawesome', 'bklynicons' ),
                                )
						  	),
                             array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Label Color', 'ut_shortcodes' ),
								'param_name'        => 'label_color',
								'group'             => 'Colors'
						  	),
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Label Hover and Active Color', 'ut_shortcodes' ),
								'param_name'        => 'label_hover_color',
								'group'             => 'Colors'
						  	),
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_inline_css() {
            
            $css_style = '';
            
            $css_style .= '<style type="text/css" scoped>';
            
                if( !empty( $this->css['label_font_size'] ) ) {
                    $css_style .= '#' . esc_attr( $this->css['globaL_style_id'] ) . ' .bkly-icon-tab-label {  font-size: ' . $this->css['label_font_size'] . 'px; }';
                }
            
                if( !empty( $this->css['label_font_weight'] ) ) {
                    $css_style .= '#' . esc_attr( $this->css['globaL_style_id'] ) . ' .bkly-icon-tab-label {  font-weight: ' . $this->css['label_font_weight'] . '; }';
                }
                
                if( !empty( $this->css['label_text_transform'] ) ) {
                    $css_style .= '#' . esc_attr( $this->css['globaL_style_id'] ) . ' .bkly-icon-tab-label {  text-transform: ' . $this->css['label_text_transform'] . '; }';
                }
                
                foreach( $this->navigation as $item ) {
                    
                    
                    if( $item['icon_source'] == 'fontawesome' || $item['icon_source'] == 'bklynicons' ) {
                    
                        if( !empty( $item['icon_color'] ) ) {
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . ' a .bkly-icon-tab {  color: ' . $item['icon_color'] . '; }';
                        }
                        
                        if( !empty( $item['icon_hover_color'] ) ) {
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . ' a:hover .bkly-icon-tab {  color: ' . $item['icon_hover_color'] . '; }';
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . '.active a .bkly-icon-tab {  color: ' . $item['icon_hover_color'] . '; }';
                        }
                    
                    } else {
                    
                        if( !empty( $item['image_icon'] ) ) {
                            
                            $image_icon = wp_get_attachment_url( $item['image_icon'] );        
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . ' .bkly-icon-tab.bkly-custom-icon-tab:after {  background-image: url( ' . esc_url( $image_icon ) . '); }';
                            
                        }
                        
                        if( !empty( $item['image_hover_icon'] ) ) {
                            
                            $image_icon = wp_get_attachment_url( $item['image_hover_icon'] );
                                    
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . ' a:hover .bkly-icon-tab.bkly-custom-icon-tab:after {  background-image: url( ' . esc_url( $image_icon ) . '); }';
                            $css_style .= '#' . esc_attr( $item['style_id'] ) . '.active a .bkly-icon-tab.bkly-custom-icon-tab:after {  background-image: url( ' . esc_url( $image_icon ) . '); }';
                            
                        }
                        
                    
                    }
                    
                    if( !empty( $item['label_color'] ) ) {
                        $css_style .= '#' . esc_attr( $item['style_id'] ) . ' a .bkly-icon-tab-label {  color: ' . $item['label_color'] . '; }';
                    }
                    
                    if( !empty( $item['label_hover_color'] ) ) {
                        $css_style .= '#' . esc_attr( $item['style_id'] ) . ' a:hover .bkly-icon-tab-label {  color: ' . $item['label_hover_color'] . '; }';
                        $css_style .= '#' . esc_attr( $item['style_id'] ) . '.active a .bkly-icon-tab-label {  color: ' . $item['label_hover_color'] . '; }';
                    }
                
                }
            
            $css_style .= '</style>';    
                        
            return ut_minify_inline_css( $css_style );
            
        }        
        
        function ut_create_tabs_navigation( $label_text_font ) {
            
            $navigation = $label_font = '';
            
            if( !empty( $label_text_font ) && $label_text_font == 'on' ) {
                 $label_font = 'bkly-icon-tab-label-theme-font';    
            }
            
            if( !empty( $this->navigation ) ) {
                
                $navigation .= '<ul class="bklyn-icon-tabs nav nav-tabs">';
                
                $first = true;
                
                foreach( $this->navigation as $item ) {
                    
                    $navigation .= '<li id="' . esc_attr( $item['style_id'] ) . '" ' . ( $first ? 'class="active"' : '' ) . '>';
                        
                        if( $item['icon_source'] == 'fontawesome' ) {
                            
                            $navigation .= '<a href="#' . esc_attr( $item['id'] ) . '" data-toggle="tab"><span class="bkly-icon-tab ' . esc_attr( $item['icon'] ) . '"></span><span class="bkly-icon-tab-label ' . $label_font . '">' . $item['label'] . '</span></a>';
                            
                        } elseif( $item['icon_source'] == 'bklynicons' ) { 
                            
                            $navigation .= '<a href="#' . esc_attr( $item['id'] ) . '" data-toggle="tab"><i class="bkly-icon-tab ' . esc_attr( $item['icon_bklyn'] ) . '"></i><span class="bkly-icon-tab-label ' . $label_font . '">' . $item['label'] . '</span></a>';
                        
                        }else {                       
                            
                            $navigation .= '<a href="#' . esc_attr( $item['id'] ) . '" data-toggle="tab"><span class="bkly-icon-tab bkly-custom-icon-tab"></span><span class="bkly-icon-tab-label ' . $label_font . '">' . $item['label'] . '</span></a>';
                        
                        }
                    
                    $navigation .= '</li>';
                    
                    $first = false;
                    
                }
                
                $navigation .= '</ul>';
            
            }
            
            return $navigation;
        
        }       
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'align'                 => 'center',
                'label_text_font'       => 'off',
                'label_font_weight'     => '',
                'label_font_size'       => '',
                'label_text_transform'  => ''
            ), $atts ) ); 
            
            $this->navigation = array();
            $this->count = 1;
            $this->css = array();
            
            /* excute inner already shortcodes */
            $tab = do_shortcode( $content );
            
            /* global css */
            $this->css['globaL_style_id']       = uniqid("ut_tabs_style_");
            $this->css['label_font_weight']     = $label_font_weight;
            $this->css['label_font_size']       = $label_font_size;
            $this->css['label_text_transform']  = $label_text_transform;
            
            /* start output */
            $output = '';
            
            $output .= $this->ut_create_inline_css();
            
            $output .= '<div id="' . esc_attr( $this->css['globaL_style_id'] ) . '" class="bklyn-icon-tabs-wrap bklyn-icon-tabs-' . esc_attr( $align ) . '">';
                
                /* create navigation */
                $output .= $this->ut_create_tabs_navigation( $label_text_font );
                
                $output .= '<div class="tab-content">';
                    
                    $output .= $tab;
                
                $output .= '</div>';
                
            $output .= '</div>';
            
            
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element">' . $output . '</div>'; 
            
            }
                
            return $output;
            
        
        }
        
        function ut_create_inner_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'icon_source'       => 'fontawesome',
                'icon'              => '',
                'icon_bklyn'        => '',
                'image_icon'        => '',
                'image_hover_icon'  => '',
                'label'             => '',
                'icon_color'        => '',
                'icon_hover_color'  => '',
                'label_color'       => '',
                'label_hover_color' => '',
            ), $atts ) );
            
            /* enhance array for tab navigation */
            $this->navigation[$this->count]['id']                = uniqid("ut_tab_");
            $this->navigation[$this->count]['label']             = $label;
            $this->navigation[$this->count]['icon_source']       = $icon_source;
            $this->navigation[$this->count]['icon']              = $icon;
            $this->navigation[$this->count]['icon_bklyn']        = $icon_bklyn;    
            $this->navigation[$this->count]['image_icon']        = $image_icon;
            $this->navigation[$this->count]['image_hover_icon']  = $image_hover_icon;
            $this->navigation[$this->count]['style_id']          = uniqid("ut_tab_style_");
            $this->navigation[$this->count]['icon_color']        = $icon_color;
            $this->navigation[$this->count]['icon_hover_color']  = $icon_hover_color;
            $this->navigation[$this->count]['label_color']       = $label_color;
            $this->navigation[$this->count]['label_hover_color'] = $label_hover_color;
            
            /* start output */
            $output = '';
            
            $output .= '<div data-size="auto" class="tab-pane fade ' . ( $this->count == 1 ? 'active' : '' ) . '" id="' . esc_attr( $this->navigation[$this->count]['id'] ) . '"> ';
            
                $output .= do_shortcode( $content );
            
            $output .= '</div>';
            
            /* increase internal counter */
            $this->count++;
                        
            return $output;
        
        }
            
    }

}

new UT_Icon_Tabs;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_ut_icon_tabs extends WPBakeryShortCodesContainer {
        
              
            
    }
    
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_icon_tab extends WPBakeryShortCode {
        
        
        
    }
    
}