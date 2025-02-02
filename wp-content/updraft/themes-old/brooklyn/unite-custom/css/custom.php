<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_TO_CSS' ) ) {	
    
    class UT_TO_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            // This field is the last called file and should contain CSS which includes overwritting rules
            $this->css .= ot_get_option('ut_custom_css');
            
            if( !empty( $this->css ) ) {
                echo $this->minify_css( '<style id="ut-theme-option-css" type="text/css">' . $this->css . '</style>' );
            }
            
        }

    }

}

new UT_TO_CSS;