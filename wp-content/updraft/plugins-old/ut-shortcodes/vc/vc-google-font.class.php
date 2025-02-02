<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_VC_Google_Fonts' ) ) {
	
    class UT_VC_Google_Fonts {
        
        private $atts;
        
        private $option_key;
        
        private $shortcode;
        
        private $font_data;        
        
        function __construct( $atts, $option_key, $shortcode ) {
            
            if( empty( $atts ) || empty( $option_key ) || empty( $shortcode ) ) {
                return;
            }
            
            $this->atts       = $atts;
            $this->option_key = $option_key;
            $this->shortcode  = $shortcode;            
            
            /* get font data */
            $this->get_fonts_data();
            
            /* enqueue fonts */
            $this->enqueue_gogle_fonts();
            
        }
        
        function get_fonts_data() {
            
            $googleFontsParam = new Vc_Google_Fonts();
            
            $field = WPBMap::getParam( $this->shortcode, $this->option_key );
            $fieldSettings = isset( $field['settings'], $field['settings']['fields'] ) ? $field['settings']['fields'] : array();
            $this->font_data = strlen( $this->atts[ $this->option_key ] ) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes( $fieldSettings, $this->atts[ $this->option_key ] ) : '';
            
        }
        
        function get_google_fonts_css_styles() {
        
            $fontFamily = explode( ':', $this->font_data['values']['font_family'] );
            $fontStyles = explode( ':', $this->font_data['values']['font_style'] );
            
            $styles[] = 'font-family:' . $fontFamily[0] . ';';
            $styles[] = 'font-weight:' . $fontStyles[1] . ';';
            $styles[] = 'font-style:'  . $fontStyles[2] . ';';
    
            return $styles;
            
        }
        
        function enqueue_gogle_fonts() {
            
            /* Get extra subsets for settings (latin/cyrillic/etc) */
            $settings = get_option( 'wpb_js_google_fonts_subsets' );
            
            if ( is_array( $settings ) && ! empty( $settings ) ) {
            
                $subsets = '&subset=' . implode( ',', $settings );
            
            } else {
            
                $subsets = '';
                
            }
            
            /* enqueue font */
            if ( isset( $this->font_data['values']['font_family'] ) ) {
                wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $this->font_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $this->font_data['values']['font_family'] . $subsets );
            }
            
        }
    
    }

}