<?php

/**
 * Hero Overlay
 *
 * @access    public 
 * @version   1.0.0
 */ 
 
if( !function_exists('ut_hero_overlay_start') ) :

    function ut_hero_overlay_start() { 
                
        if( ut_return_hero_config('ut_hero_overlay') == 'on') {
            
            /* overlay default class */
            $classes = array('parallax-overlay');
            
            /* pattern class */
            if( ut_return_hero_config('ut_hero_overlay_pattern' , 'on') == 'on' ) {
                $classes[] = 'parallax-overlay-pattern';
            }
            
            /* pattern style */
            $classes[] = ut_return_hero_config('ut_hero_overlay_pattern_style' , 'style_one');
                        
            echo '<div class="' . implode(' ', $classes ) . '">';
        
        }
        
    }

    add_action( 'ut_before_hero_content_hook', 'ut_hero_overlay_start' );
    
endif;


if( !function_exists('ut_hero_overlay_end') ) :

    function ut_hero_overlay_end() { 
        
        if( ut_return_hero_config('ut_hero_overlay') == 'on') {
        
            echo '</div>';
            
        }
        
    }

    add_action( 'ut_after_hero_content_hook', 'ut_hero_overlay_end' );
    
endif;