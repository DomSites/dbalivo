<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Front_CSS' ) ) {	
    
    class UT_Front_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            if( !is_front_page() ) {
                return;
            }
            
            ob_start(); ?>
            
            <style id="ut-frontpage-custom-css" type="text/css">
                
                
            
                
                

            </style>
            
            <?php 
 
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Front_CSS;