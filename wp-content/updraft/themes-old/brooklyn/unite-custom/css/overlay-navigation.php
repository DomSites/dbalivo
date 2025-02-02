<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Overlay_Navigation_CSS' ) ) {	
    
    class UT_Overlay_Navigation_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-overlay-custom-css" type="text/css">
                
                <?php if( ot_get_option( 'ut_overlay_copyright_color' ) ) : ?>
                    
                    .ut-overlay-copyright {
                        color: <?php echo ot_get_option( 'ut_overlay_copyright_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option('ut_overlay_copyright_font_style') ) : ?>
                 
                    <?php echo $this->typography_css('.ut-overlay-copyright', ot_get_option('ut_overlay_copyright_font_style') ); ?>                

                <?php endif; ?>
                
                /* height for centering the icon */
                @media (min-width: 1025px) {
                    
                    .ut-hamburger-wrap {
                        height: <?php echo ut_return_header_config( 'ut_navigation_height', 80 ); ?>px;
                    }
                
                }
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_logo_color' ) ) : ?>
                    
                    #ut-overlay-menu .site-logo h1 a {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_logo_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_logo_color_hover' ) ) : ?>
                
                    #ut-overlay-menu .site-logo h1 a:hover,
                    #ut-overlay-menu .site-logo h1 a:active,
                    #ut-overlay-menu .site-logo h1 a:focus {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_logo_color_hover' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_menu_color' ) ) : ?>
                    
                    #ut-overlay-nav ul > li a {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_menu_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_menu_color_hover' ) ) : ?>
                
                    #ut-overlay-nav ul > li a:hover,
                    #ut-overlay-nav ul > li a:active,
                    #ut-overlay-nav ul > li a:focus {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_menu_color_hover' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_underline_color' ) ) : ?>
                    
                    #ut-overlay-nav.ut-overlay-nav-animation-on a::after {
                        background: <?php echo ot_get_option( 'ut_global_overlay_navigation_underline_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_color' ) ) : ?>
                    
                    #ut-overlay-nav ul.sub-menu > li a {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_color_hover' ) ) : ?>
                
                    #ut-overlay-nav ul.sub-menu > li a:hover,
                    #ut-overlay-nav ul.sub-menu > li a:active,
                    #ut-overlay-nav ul.sub-menu > li a:focus {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_color_hover' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_underline_color' ) ) : ?>
                    
                    #ut-overlay-nav.ut-overlay-nav-animation-on ul.sub-menu a::after {
                        background: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_underline_color' ); ?>
                    }

                <?php endif; ?>
                                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ) ) : ?>
                
                    #ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
                    #ut-open-overlay-menu.ut-hamburger span::before,
                    #ut-open-overlay-menu.ut-hamburger span::after {
                        background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ) ); ?>;
                        background:<?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ); ?>;
                    }

                <?php endif; ?>

                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ) ) : ?>

                    #ut-open-overlay-menu.ut-hamburger.is-active span::before,
                    #ut-open-overlay-menu.ut-hamburger.is-active span::after {
                        background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ) ); ?>;
                        background:<?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ); ?>;
                    }

                <?php endif; ?>

                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_hover_opacity' ) ) : ?>

                    #ut-open-overlay-menu.ut-hamburger:hover {
                        opacity: <?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_hover_opacity', 10 ) / 100; ?>;
                    } 

                <?php endif; ?>

                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width' ) ) : ?>

                    #ut-open-overlay-menu.ut-hamburger span, 
                    #ut-open-overlay-menu.ut-hamburger span::before,
                    #ut-open-overlay-menu.ut-hamburger span::after {
                        height: <?php echo $this->add_px_value( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width', 2 ) ); ?>;
                    } 

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_background_color' ) ) : ?>
                
                    #ut-overlay-menu {
                        background: <?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_background_color' ) ); ?> !important;
                        background:<?php echo ot_get_option( 'ut_global_overlay_navigation_background_color' ); ?> !important;
                    }
                
                <?php endif; ?>
                
                
                <?php 
                    
                    // Overlay Navigation Font
                    echo $this->font_style_css( array(
                        'selector'           => '#ut-overlay-nav ul > li',
                        'font-type'          => ot_get_option('ut_overlay_navigation_font_type', 'ut-websafe' ),   
                        'font-style'         => ot_get_option('ut_overlay_navigation_font_style', 'semibold' ),
                        'google-font-style'  => ot_get_option('ut_google_overlay_navigation_style'),
                        'websafe-font-style' => ot_get_option('ut_global_overlay_navigation_websafe_font_style') 
                    ) );
            
                ?>                
               
                #ut-overlay-nav ul.sub-menu > li { letter-spacing: normal; }
                
                <?php if( ot_get_option('ut_global_overlay_navigation_submenu_websafe_font_style') ) : ?>
                 
                    <?php echo $this->typography_css('#ut-overlay-nav ul.sub-menu > li', ot_get_option('ut_global_overlay_navigation_submenu_websafe_font_style') ); ?>                

                <?php endif; ?>
                
                
                <?php if( ot_get_option( 'ut_overlay_social_icons_color' ) ) : ?>
                    
                    ul.ut-overlay-footer-icons > li a {
                        color: <?php echo ot_get_option( 'ut_overlay_social_icons_color' ); ?>
                    }

                <?php endif; ?>
                
                <?php if( ot_get_option( 'ut_overlay_social_icons_color_hover' ) ) : ?>
                
                    ul.ut-overlay-footer-icons > li a:hover,
                    ul.ut-overlay-footer-icons > li a:active,
                    ul.ut-overlay-footer-icons > li a:focus {
                        color: <?php echo ot_get_option( 'ut_overlay_social_icons_color_hover' ); ?>
                    }

                <?php endif; ?>
                
                
                
            </style>            
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }  
            
    }

}

new UT_Overlay_Navigation_CSS;