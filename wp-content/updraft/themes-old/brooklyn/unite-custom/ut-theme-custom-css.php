<?php if (!defined('UT_VERSION')) {
    exit; // exit if accessed directly
}




function ut_custom_theme_accent_color( $color ) {
    
    if( isset( get_queried_object()->ID ) && get_post_meta( get_queried_object()->ID, 'ut_page_accent_color', true ) ) {
        
        return get_post_meta( get_queried_object()->ID, 'ut_page_accent_color', true );
        
    }
    
    return $color;
    
}

add_filter('pre_option_ut_accentcolor', 'ut_custom_theme_accent_color');




if( !class_exists( 'UT_Custom_CSS' ) ) {	
    
    class UT_Custom_CSS {
        
        public $css;
        
        /**
         * Accent Color
         * @var string
         */        
        public $accent;
        
        /**
         * Post ID
         * @var string
         */        
        public $ID;
        
        /**
         * Accent Color
         * @var array
         */
        public $google_fonts;
        
        /**
         * Theme Font Styles
         * @var array
         */
        public $theme_font_styles;
        
        /**
         * Font Styles
         * @var array
         */
        public $font_styles;
        
        
        /**
         * Font Styles
         * @var array
         */
        
        function __construct() {
            
            $this->google_fonts = ut_recognized_google_fonts();   
            
            $this->theme_font_styles = ut_recognized_font_styles();
            $this->font_styles = array( 'regular' => 'normal', 'normal'  => 'normal', 'italic'  => 'italic' );
            
            add_action('wp_head' , array( $this, 'setup_vars' ) );
            add_action('wp_head' , array( $this, 'custom_css' ) ); 
            
        }        
        
        public function setup_vars() {
            
            // default theme color
            $this->accent = !empty( $_GET['color'] ) ? '#' . $_GET['color'] : get_option('ut_accentcolor' , '#F1C40F');
            
            if( isset( get_queried_object()->ID ) ) {
                
                $this->ID = get_queried_object()->ID;
                
            }
            
            if( isset( $this->ID ) && get_post_meta( $this->ID, 'ut_page_accent_color', true ) ) {
        
                $this->accent = get_post_meta( $this->ID, 'ut_page_accent_color', true );

            }
            
        }
        
        /**
         * Changes HEX to RGBA
         *
         * @param     string HEX Color.
         * @param     int opacity.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        public function hex_to_rgba( $hex, $opacity = 0.5 ) {
            if( empty($hex) ) {
                return;
            }
                    
            $hex = preg_replace("/#/", "", $hex);
            $color = array();
         
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex, 0, 1) . $r);
                $color['g'] = hexdec(substr($hex, 1, 1) . $g);
                $color['b'] = hexdec(substr($hex, 2, 1) . $b);
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
            }
            
            $color['o'] = $opacity;
            
            return implode(',', $color);
        
        }
        
        
        /**
         * Changes HEX to RGB
         *
         * @param     string HEX Color.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        public function hex_to_rgb( $hex ) {            
            if( empty($hex) ) {
                return;
            }
                    
            $hex = preg_replace("/#/", "", $hex);
            $color = array();
         
            if(strlen($hex) == 3) {
                $color['r'] = hexdec(substr($hex, 0, 1) . $r);
                $color['g'] = hexdec(substr($hex, 1, 1) . $g);
                $color['b'] = hexdec(substr($hex, 2, 1) . $b);
            }
            else if(strlen($hex) == 6) {
                $color['r'] = hexdec(substr($hex, 0, 2));
                $color['g'] = hexdec(substr($hex, 2, 2));
                $color['b'] = hexdec(substr($hex, 4, 2));
            }
            
            return implode(',', $color);
        
        }
        
        
        /**
         * Changes RGBA to RGB for fallback
         *
         * @param     string RGBA Color.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        public function rgba_to_rgb( $rgba ) {
        
            if( empty( $rgba ) ) {
                return;
            }
            
            /* check if hex */
            if ( preg_match( '/^#[a-f0-9]{6}$/i', $rgba ) ) {
                $rgba = ut_hex_to_rgb( $rgba );
            }
            
            $rgb = preg_replace( '/[^0-9,]/', '', $rgba );
            $rgb = explode( ',', $rgb );
            
            if( count( $rgb ) === 4 ) {
                $stack = array_pop( $rgb );            
            }        
            
            $rgb = implode( ',', $rgb );
            
            return 'rgb(' . $rgb . ')';
        
        }
        
        
        /**
         * Create Section Headline CSS
         *
         * @param     string     .
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        
        public function section_headline_css( $div = '',  $style = 'pt-style-1', $color = '', $height = '', $width = '' ) {
            
            if( empty( $color ) ) {
                    return;
            }
            
            switch ( $style ) {
            
                case 'pt-style-1':
                    
                    return '';
                    
                break;
                
                case 'pt-style-2':
                    
                    return '
                        ' . $div . ' .pt-style-2 .page-title:after, 
                        ' . $div . ' .pt-style-2 .parallax-title:after, 
                        ' . $div . ' .pt-style-2 .section-title:after {
                            background-color: ' . $color . ';
                            height: ' . $height .';
                            width: ' . $width . ';
                        }
                    ';
                    
                break;
                
                case 'pt-style-3':
                    
                    return '
                        ' . $div . ' .pt-style-3 .page-title span, 
                        ' . $div . ' .pt-style-3 .parallax-title span, 
                        ' . $div . ' .pt-style-3 .section-title span { 
                            background:' . $color . ';            
                            -webkit-box-shadow:0 0 0 3px' . $color . '; 
                            -moz-box-shadow:0 0 0 3px' . $color . '; 
                            box-shadow:0 0 0 3px' . $color . '; 
                        }
                    ';                
                    
                break;
                
                case 'pt-style-4':
                    
                    return '
                        ' . $div . ' .pt-style-4 .page-title span, 
                        ' . $div . ' .pt-style-4 .parallax-title span, 
                        ' . $div . ' .pt-style-4 .section-title span {
                            border-color:' . $color . ';
                        }
                    ';
                    
                break;
                
                case 'pt-style-5':
                    
                    return '
                        ' . $div . ' .pt-style-5 .page-title span, 
                        ' . $div . ' .pt-style-5 .parallax-title span, 
                        ' . $div . ' .pt-style-5 .section-title span {
                            background:' . $color . ';            
                            -webkit-box-shadow:0 0 0 3px' . $color . '; 
                            -moz-box-shadow:0 0 0 3px' . $color . '; 
                            box-shadow:0 0 0 3px' . $color . '; 
                        }
                    ';
                    
                break;
                
                
                case 'pt-style-6':
                    
                    return '
                        ' . $div . ' .pt-style-6 .page-title:after, 
                        ' . $div . ' .pt-style-6 .parallax-title:after, 
                        ' . $div . ' .pt-style-6 .section-title:after {
                            border-bottom: 1px dotted ' . $color . ';
                        }
                    ';
                
                break;
                
                
            }
        
        }
        
        
        /**
         * Create CSS Background
         *
         * @access    public
         * @since     1.0
         */
        
        public function css_background( $object , $background_settings ) { 
                
            if( !is_array( $background_settings ) || empty( $object ) ) {
                return NULL;
            }
                    
            $skipfixed = false;
            
            $css = $object . '{';
            
            $key_exceptions = array( 'background-color' , 'background-image' , 'background-size' );
            
            /* exception for mobiles and tablets */
            if( unite_mobile_detection()->isMobile() && ( isset($background_settings['background-size']) && $background_settings['background-size'] == 'cover' ) && ( isset($background_settings['background-attachment']) && $background_settings['background-attachment'] == 'fixed' ) ) {
                $skipfixed = true;
            }
            
            foreach( $background_settings as $key => $value) {            
                
                if( in_array( $key , $key_exceptions ) ) {
                    
                    switch( $key ) {
                        
                        case 'background-color' : $css .= 'background: '.$value.';';
                        break;
                        
                        case 'background-image' : $css .= $key . ':' . 'url("'.$value.'");';
                        break;
                        
                        case 'background-size' : $css .= $key . ':' . $value . ' !important;';
                        
                    }
                    
                } else {
                    
                    if($skipfixed && $key == 'background-attachment') {    
                       
                       continue; 
                    
                    } else {
                    
                        $css .= $key . ':' . $value . ' !important;';
                    
                    }
                    
                }
                
            }
            
            $css .= '}';
            
            return $css;
                        
        }
        
        
        /**
         * Button Creator
         *
         * @param     string     .
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        
        public function create_button( $selector, $button_settings = array() ) {
            
            if( empty( $selector ) || empty( $button_settings ) ) {
                return;
            }
                
            $button = $selector . '{';
            
                if( !empty( $button_settings['font-size'] ) ) {
                    $button .= 'font-size:' . $button_settings['font-size'] . ' !important;';
                }
                
                if( !empty( $button_settings['text-transform'] ) ) {
                    $button .= 'text-transform:' . $button_settings['text-transform'] . ' !important;';
                }
                            
                if( !empty( $button_settings['color'] ) ) {
                    $button .= 'background:' . $button_settings['color'] . ' !important;';
                }
                
                if( !empty( $button_settings['text_color'] ) ) {
                    $button .= 'color:' . $button_settings['text_color'] . ' !important;';
                }
                
                if( !empty( $button_settings['border_radius'] ) ) {
                    $button .= '
                    -webkit-border-radius:' . $button_settings['border_radius'] . 'px !important;
                       -moz-border-radius:' . $button_settings['border_radius'] . 'px !important;
                            border-radius:' . $button_settings['border_radius'] . 'px !important;';
                }
                
                if( !empty( $button_settings['border_color'] ) ) {
                
                    $button .= 'border-color:' . $button_settings['border_color'] . ' !important;';
                
                } else {
                
                    $button .= 'border: none !important;';
                
                }
                
            $button .= '}';
            
            $button .= $selector.':hover {';
                
                if( !empty( $button_settings['hover_color'] ) ) {
                
                    $button .= 'background:' . $button_settings['hover_color'] . ' !important;';
                
                } 
                
                if( !empty( $button_settings['text_hover_color'] ) ) {
                
                    $button .= 'color:' . $button_settings['text_hover_color'] . ' !important;';
                
                }  
                
                if( !empty( $button_settings['border_hover_color'] ) ) {
                
                    $button .= 'border-color:' . $button_settings['border_hover_color'] . ' !important;';
                
                } 
                
            $button.= '}';
            
            return $button;    

        }
        
        
        /**
         * Add PX to Int
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         * @since     4.2
         */
         
        public function add_px_value( $option ) {
        
            if ( strpos( $option, 'px' ) !== false ) {
                
                return $option;
            
            } else {
                
                return $option . 'px';
            
            }
            
        }
        
        /**
         * Get Image Post ID by given URL
         *
         * @param     url       must be local.
         * @return    int
         *
         * @access    public
         * @since     4.2
         */
        
        public function get_image_id_by_url( $image_url ) {
        
            global $wpdb;
        
            if( empty( $image_url ) ) {
                return;
            }
            
            $prefix = $wpdb->prefix;
            $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", esc_url( $image_url ) ) ); 
            
            return isset($attachment[0]) ? $attachment[0] : '';     
        
        }
        
        /**
         * CSS Minify
         *
         * @param     string     Hex Color.
         * @return    string
         *
         * @access    public
         * @since     1.0
         */
        
        public function minify_css( $css ) { 
            
            if( WP_DEBUG ) {
                return $css = apply_filters( 'ut_custom_css', preg_replace('/^\h*\v+/m', '', $css ) );
            }
            
            $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
            $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
            
            return apply_filters( 'ut_custom_css', $css );            
        }
        
        
        /**
         * Typography String
         *
         * @param     array     Font Settings.
         * @return    string
         *
         * @access    public
         * @since     4.0
         */
        
        public function typography_css( $tag = '', $font_settings = '', $color = '' ) { 
        
            if( empty( $tag ) || empty( $font_settings ) ) {
                return;
            }
            
            $font_settings = array_filter( $font_settings );
            
            if( $color ) {
                $font_settings['color'] = $color;            
            }
            
            $font_settings = implode(' ', array_map(
                function ($v, $k) { 
                    
                    if( $k == 'font-family' ) {
                        
                        $font_families = ut_recognized_font_families();
                        return sprintf("%s:%s;", $k, $font_families[$v]);
                    
                    } elseif( $k == 'letter-spacing' && is_numeric( $v ) ) {
                        
                        return sprintf("%s:%s;", $k, $this->add_px_value($v) );                        
                        
                    } else {
                        
                        return sprintf("%s:%s;", $k, $v); 
                    
                    }
                
                },
                $font_settings,
                array_keys( $font_settings )
            ) );
            
            if( $font_settings ) {
                return $tag . '{' . $font_settings . '}';
            }
            
        }
        
        
        /**
         * Font Styles
         *
         * @param     array     Font Settings.
         * @return    string
         *
         * @access    public
         * @since     4.0
         */
        
        public function font_style_css( $settings ) {
            
            if( empty( $settings ) ) {
                return;
            }
            
            if( $settings['font-type'] == 'ut-google' ) {
                
                $google_font = ut_search_sub_array( $this->google_fonts, 'family', $settings['google-font-style']['font-family'] );
                
                if( !empty( $google_font['family'] ) ) {
                
                    $font = $settings['selector'] . ' {';
                        
                        $font .= 'font-family:"' . $google_font['family'] . '";';                    
                        
                        if( !empty( $settings['google-font-style']['font-weight']) ) {
                            $font .= ' font-weight: ' .  $settings['google-font-style']['font-weight'] . ';';    
                        }
                        
                        if( !empty( $settings['google-font-style']['font-size']) ) {
                            $font .= ' font-size: ' .  $settings['google-font-style']['font-size'] . ';';    
                        }
                        
                        if( !empty( $settings['google-font-style']['font-style']) && isset( $this->font_styles[ $settings['google-font-style']['font-style']] ) ) {
                            $font .= ' font-style: ' . $this->font_styles[ $settings['google-font-style']['font-style']] . ';';    
                        }
                        
                        if( !empty( $settings['google-font-style']['line-height']) ) {
                            $font .= ' line-height: ' .  $settings['google-font-style']['line-height'] . ';';    
                        }
                    
                        if( !empty( $settings['google-font-style']['letter-spacing'] ) ) {
                            $font .= ' letter-spacing: ' .  $this->add_px_value( $settings['google-font-style']['letter-spacing'] ) . ';';    
                        }
                        
                        if( !empty( $settings['google-font-style']['text-transform']) ) {
                            $font .= ' text-transform: ' .  $settings['google-font-style']['text-transform'] . ';';    
                        }
                        
                    $font .= '}';
                    
                    return $font;
                    
                } 
            
            } elseif( $settings['font-type'] == 'ut-websafe' ) {
                
                return $this->typography_css( $settings['selector'], $settings['websafe-font-style'] );    
                
            } elseif( $settings['font-type'] == 'ut-font' ) {
                
                if( isset( $this->theme_font_styles[$settings['font-style']]) ) {
                
                    return $settings['selector'] . ' { font-family: ' .  $this->theme_font_styles[$settings['font-style']] . ';}'. "\n";                     
                    
                }
                
                
            }
            
        }
        
        
        
        /**
         * Create Global Section Headline CSS
         *
         * @access    public
         * @since     1.0
         */
        
        public function global_headline_font_style( 
            
                $object                                 = '', 
                $font_style                             = '', 
                $global_font_type                       = 'ut_global_headline_font_type', 
                $global_google_font_style               = 'ut_global_google_headline_font_style', 
                $ut_global_headline_font_style          = 'ut_global_headline_font_style', 
                $ut_global_headline_font_style_settings = 'ut_global_headline_font_style_settings', 
                $ut_global_headline_websafe_font_style  = 'ut_global_headline_websafe_font_style_settings', 
                $ut_global_headline_font_color          = 'ut_global_headline_font_color' 
            
            ) {
        
            if( empty( $object ) ) {
                return;
            }
        
            $font = $font_attr = $font_color = NULL;
            
            /* font settings */
            if( $ut_global_headline_font_style_settings ) {
            
                $font_settings = ot_get_option( $ut_global_headline_font_style_settings );
                if( $font_settings && array_filter( $font_settings ) ) {
                
                    $font_attr = implode(';', array_map(
                        function ($v, $k) { 
                        
                            if( $k == 'font-family' ) {
                            
                                $font_families = ut_recognized_font_families();
                                return sprintf("%s:%s;", $k, $font_families[$v]);
                            
                            } elseif( $k == 'letter-spacing' && is_numeric( $v ) ) {
                                
                                return sprintf("%s:%s;", $k, $this->add_px_value($v) );
                                
                            } else {
                                
                                return sprintf("%s:%s;", $k, $v); 
                            
                            }                        
                        
                        },
                        array_filter( $font_settings ),
                        array_keys( array_filter( $font_settings ) )
                    ));
                
                }
            
            }
            
            /* global font color */
            if( ot_get_option($ut_global_headline_font_color) ) {
                
                $font_color = 'color: ' . ot_get_option($ut_global_headline_font_color) . ';';   
            
            }
            
            if( !empty( $font_style ) && $font_style != 'global' ) {
                
                return $object . '{ font-family: ' . $this->theme_font_styles[$font_style] . '; ' . $font_attr . '; ' . $font_color . ' }'. "\n";
            
            } else {
                
                if( ot_get_option( $global_font_type , 'ut-font') == 'ut-google' ) {
                
                    $ut_global_google_headline_font_style = ot_get_option($global_google_font_style);                
                    $google_font = ut_search_sub_array( $this->google_fonts, 'family', $ut_global_google_headline_font_style['font-family'] );
                    
                    if( !empty( $google_font['family'] ) ) {
                    
                        $font .= $object . ' {';
                            
                            $font .= 'font-family:"' . $google_font['family'] . '";';                    
                            
                            if( !empty($ut_global_google_headline_font_style['font-weight']) ) {
                                $font .= ' font-weight: ' . $ut_global_google_headline_font_style['font-weight'] . ';';    
                            }
                            
                            if( !empty($ut_global_google_headline_font_style['font-size']) ) {
                                $font .= ' font-size: ' . $ut_global_google_headline_font_style['font-size'] . ';';    
                            }
                            
                            if( !empty($ut_global_google_headline_font_style['font-style']) && isset($this->font_styles[$ut_global_google_headline_font_style['font-style']]) ) {
                                $font .= ' font-style: ' . $this->font_styles[$ut_global_google_headline_font_style['font-style']] . ';';    
                            }
                            
                            if( !empty($ut_global_google_headline_font_style['line-height']) ) {
                                $font .= ' line-height: ' . $ut_global_google_headline_font_style['line-height'] . ';';    
                            }
                        
                            if( !empty($ut_global_google_headline_font_style['letter-spacing']) ) {
                                $font .= ' letter-spacing: ' . $ut_global_google_headline_font_style['letter-spacing'] . 'px;';    
                            }
                            
                            if( !empty($ut_global_google_headline_font_style['text-transform']) ) {
                                $font .= ' text-transform: ' . $ut_global_google_headline_font_style['text-transform'] . ';';    
                            }
                            
                            $font .= $font_color;
                            
                        $font .= '}';
                        
                        return $font;
                    
                    } else {
                        
                        /* fallback if user has not chosen a google font yet */
                        $font_style = ot_get_option( $ut_global_headline_font_style , 'semibold' );
                        return $object . '{ font-family: ' . $this->theme_font_styles[$font_style] . '; ' . $font_attr . ' ' . $font_color . ' }'. "\n";
                        
                    }
                
                } elseif( ot_get_option( $global_font_type , 'ut-font') == 'ut-websafe' ) {
                    
                    return $this->typography_css( $object, ot_get_option( $ut_global_headline_websafe_font_style , 'semibold' ), ot_get_option($ut_global_headline_font_color) ) ;
                    
                } else {
                    
                    /* font face */
                    $font_style = ot_get_option( $ut_global_headline_font_style , 'semibold' );
                    return $object . '{ font-family: ' . $this->theme_font_styles[$font_style] . '; ' . $font_attr . ' ' . $font_color . ' }'. "\n";
                
                }
                
        
            }
        
        
        }
        
        public function custom_css() {
            
            $this->minify_css( $this->css );
            
        }  
            
    }

}

$UT_Custom_CSS = new UT_Custom_CSS;

/* additional Custom CSS files */
include( 'css/global.php' );
include( 'css/hero.php' );
include( 'css/deprecated.php' );
include( 'css/navigation.php' );
include( 'css/side-navigation.php' );
include( 'css/overlay-navigation.php' );
include( 'css/mobile-navigation.php' );
include( 'css/front.php' );
include( 'css/onepage.php' );
include( 'css/blog.php' );
include( 'css/sidebar.php' );
include( 'css/page.php' );
include( 'css/portfolio.php' );
include( 'css/shortcodes.php' );
include( 'css/mc4wp.php' );
include( 'css/contact.php' );
include( 'css/footer.php' );
include( 'css/responsive.php' );
include( 'css/custom.php' );
