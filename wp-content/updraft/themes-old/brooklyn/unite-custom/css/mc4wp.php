<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_MC4WP_CSS' ) ) {	
    
    class UT_MC4WP_CSS extends UT_Custom_CSS {
        
        public $class_prefix = '.mc4wp-form-';
        
        public function custom_css() {
            
            $mc4wp_color_skins = ot_get_option("ut_mailchimp_color_skins");
            
            if( !empty( $mc4wp_color_skins ) && is_array( $mc4wp_color_skins ) ) {
                
                foreach( $mc4wp_color_skins as $skin ) {
                    
                    $class = $this->class_prefix . $skin["unique_id"];
                    
                    if( !empty( $skin["label_color"] ) ) {
                        $this->css .= $class . ' label { color: ' . $skin["label_color"] . '; }';
                    }
                    
                    // input colors
                    if( !empty( $skin["input_text_color"] ) ) {
                        $this->css .= $class . ' input[type="text"] { color: ' . $skin["input_text_color"] . '; }';
                        $this->css .= $class . ' input[type="email"] { color: ' . $skin["input_text_color"] . '; }';
                    }
                    
                    if( !empty( $skin["input_background_color"] ) ) {
                        $this->css .= $class . ' input[type="text"] { background: ' . $skin["input_background_color"] . '; }';
                        $this->css .= $class . ' input[type="email"] { background: ' . $skin["input_background_color"] . '; }';
                    }
                    
                    if( !empty( $skin["input_border_color"] ) ) {
                        $this->css .= $class . ' input[type="text"] { border-color: ' . $skin["input_border_color"] . '; }';
                        $this->css .= $class . ' input[type="email"] { border-color: ' . $skin["input_border_color"] . '; }';
                    }
                    
                    // input focus colors
                    if( !empty( $skin["input_text_color_focus"] ) ) {
                        $this->css .= $class . ' input[type="text"]:focus { color: ' . $skin["input_text_color_focus"] . '; }';
                        $this->css .= $class . ' input[type="email"]:focus { color: ' . $skin["input_text_color_focus"] . '; }';
                    }
                    
                    if( !empty( $skin["input_background_color_focus"] ) ) {
                        $this->css .= $class . ' input[type="text"]:focus { background: ' . $skin["input_background_color_focus"] . '; }';
                        $this->css .= $class . ' input[type="email"]:focus { background: ' . $skin["input_background_color_focus"] . '; }';
                    }
                    
                    if( !empty( $skin["input_border_color_focus"] ) ) {
                        $this->css .= $class . ' input[type="text"]:focus { border-color: ' . $skin["input_border_color_focus"] . '; }';
                        $this->css .= $class . ' input[type="email"]:focus { border-color: ' . $skin["input_border_color_focus"] . '; }';
                    }
                    
                    // submit button colors
                    if( !empty( $skin["submit_button_text_color"] ) ) {
                        $this->css .= $class . ' input[type="submit"] { color: ' . $skin["submit_button_text_color"] . '; }';
                    }
                    
                    if( !empty( $skin["submit_button_background_color"] ) ) {
                        $this->css .= $class . ' input[type="submit"] { background: ' . $skin["submit_button_background_color"] . '; }';
                    }
                    
                    if( !empty( $skin["submit_button_text_color_hover"] ) ) {
                        $this->css .= $class . ' input[type="submit"]:hover { color: ' . $skin["submit_button_text_color_hover"] . '; }';
                        $this->css .= $class . ' input[type="submit"]:focus { color: ' . $skin["submit_button_text_color_hover"] . '; }';
                        $this->css .= $class . ' input[type="submit"]:active { color: ' . $skin["submit_button_text_color_hover"] . '; }';
                    }
                    
                    if( !empty( $skin["submit_button_background_color_hover"] ) ) {
                        $this->css .= $class . ' input[type="submit"]:hover { background: ' . $skin["submit_button_background_color_hover"] . '; }';
                        $this->css .= $class . ' input[type="submit"]:focus { background: ' . $skin["submit_button_background_color_hover"] . '; }';
                        $this->css .= $class . ' input[type="submit"]:active { background: ' . $skin["submit_button_background_color_hover"] . '; }';
                    }
                    
                    if( !empty( $skin["submit_button_font_weight"] ) ) {
                        $this->css .= $class . ' input[type="submit"] { font-weight: ' . $skin["submit_button_font_weight"] . '; }';
                    }
                    
                }
                
            }            
            
            if( !empty( $this->css ) ) {
                echo $this->minify_css( '<style id="ut-mc4wp-skin-css" type="text/css">' . $this->css . '</style>' );
            }
            
        }

    }

}

new UT_MC4WP_CSS;