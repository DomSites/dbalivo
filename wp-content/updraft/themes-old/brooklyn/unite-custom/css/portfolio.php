<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Portfolio_CSS' ) ) {	
    
    class UT_Portfolio_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style id="ut-portfolio-custom-css" type="text/css">
                
                /* Portfolio CSS Fix
                ================================================== */
                .vc_row.vc_row-no-padding .ut-portfolio-detail .vc_row:not(.vc_row-no-padding) .vc_column_container > .vc_column-inner {
                    padding-left: 20px;
                    padding-right: 20px;
                }
                
                .ut-portfolio-detail-loader {
                    left: calc(50% - 40px);
                }
                
                /* Portfolio Showcase Default Colors
                ================================================== */
                .portfolio-caption { 
                    background:rgb(<?php echo ut_hex_to_rgb( $this->accent ); ?>);    
                    background:rgba(<?php echo ut_hex_to_rgb( $this->accent ); ?>, 0.85); 
                }
                
                .ut-portfolio-pagination.style_two a:hover,
                .ut-portfolio-pagination.style_two a.selected, 
                .ut-portfolio-pagination.style_two a.selected:hover { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-portfolio-menu.style_two li a:hover, 
                .ut-portfolio-menu.style_two li a.selected { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .light .ut-portfolio-menu li a:hover, 
                .light .ut-portfolio-pagination a:hover { 
                    border-color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-portfolio-list li strong { 
                    color:<?php echo $this->accent; ?> !important; 
                }                
                
                .light .ut-portfolio-menu.style_two li a.selected:hover { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                a.prev-portfolio-details:hover,
                a.next-portfolio-details:hover,
                .light a.prev-portfolio-details:hover,
                .light a.next-portfolio-details:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Portfolio Showcase Packery Custom Icon
                ================================================== */
                <?php if( ot_get_option('ut_portfolio_showcase_custom_icon_size', '40') ) : ?>
                        
                   .ut-portfolio-custom-icon { width: <?php echo ot_get_option('ut_portfolio_showcase_custom_icon_size','40'); ?>px; }

                <?php endif; ?>
                
                
                /* Single Portfolio Navigation
                ================================================== */ 
                
                <?php if( is_singular('portfolio') ) : ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_background_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap { background: <?php echo ot_get_option('ut_single_portfolio_navigation_background_color'); ?>;}
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_height') ) : ?>
                        
                        #ut-portfolio-navigation-wrap,
                        #ut-portfolio-navigation-wrap .ut-prev-portfolio,
                        #ut-portfolio-navigation-wrap .ut-next-portfolio,
                        #ut-portfolio-navigation-wrap .ut-main-portfolio-link {
                            height: <?php echo ot_get_option('ut_single_portfolio_navigation_height'); ?>px;
                        }
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_arrow_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap a { color: <?php echo ot_get_option('ut_single_portfolio_navigation_arrow_color'); ?>;}
                       #ut-portfolio-navigation-wrap a:visited { color: <?php echo ot_get_option('ut_single_portfolio_navigation_arrow_color'); ?>;}  
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_arrow_hover_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap a:hover { color: <?php echo ot_get_option('ut_single_portfolio_navigation_arrow_hover_color'); ?>;} 
                       #ut-portfolio-navigation-wrap a:focus { color: <?php echo ot_get_option('ut_single_portfolio_navigation_arrow_hover_color'); ?>;}
                       #ut-portfolio-navigation-wrap a:active { color: <?php echo ot_get_option('ut_single_portfolio_navigation_arrow_hover_color'); ?>;}
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_text_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap a span { color: <?php echo ot_get_option('ut_single_portfolio_navigation_text_color'); ?>;}
                       #ut-portfolio-navigation-wrap a:visited span { color: <?php echo ot_get_option('ut_single_portfolio_navigation_text_color'); ?>;}  
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_text_hover_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap a:hover span { color: <?php echo ot_get_option('ut_single_portfolio_navigation_text_hover_color'); ?>;} 
                       #ut-portfolio-navigation-wrap a:focus span { color: <?php echo ot_get_option('ut_single_portfolio_navigation_text_hover_color'); ?>;}
                       #ut-portfolio-navigation-wrap a:active span { color: <?php echo ot_get_option('ut_single_portfolio_navigation_text_hover_color'); ?>;}
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_navigation_underline_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap .ut-prev-portfolio.ut-underline-effect a span::after { background: <?php echo ot_get_option('ut_single_portfolio_navigation_underline_color'); ?>;}
                       #ut-portfolio-navigation-wrap .ut-next-portfolio.ut-underline-effect a span::after { background: <?php echo ot_get_option('ut_single_portfolio_navigation_underline_color'); ?>;}
                        
                    <?php endif; ?>
                
                    <?php if( ot_get_option('ut_single_portfolio_back_to_main_color') ) : ?>
                
                       #ut-portfolio-navigation-wrap .ut-main-portfolio-link a { color: <?php echo ot_get_option('ut_single_portfolio_back_to_main_color'); ?>;}
                       #ut-portfolio-navigation-wrap .ut-main-portfolio-link a:visited { color: <?php echo ot_get_option('ut_single_portfolio_back_to_main_color'); ?>;} 
                        
                    <?php endif; ?>
                    
                    <?php if( ot_get_option('ut_single_portfolio_back_to_main_hover_color') ) : ?>
                        
                       #ut-portfolio-navigation-wrap .ut-main-portfolio-link a:hover { color: <?php echo ot_get_option('ut_single_portfolio_back_to_main_hover_color'); ?>;} 
                       #ut-portfolio-navigation-wrap .ut-main-portfolio-link a:focus { color: <?php echo ot_get_option('ut_single_portfolio_back_to_main_hover_color'); ?>;}
                       #ut-portfolio-navigation-wrap .ut-main-portfolio-link a:active { color: <?php echo ot_get_option('ut_single_portfolio_back_to_main_hover_color'); ?>;}
                        
                    <?php endif; ?>
                
                    <?php if( ot_get_option('ut_single_portfolio_navigation_font_style') ) : ?>
                 
                        <?php echo $this->typography_css('#ut-portfolio-navigation-wrap .ut-prev-portfolio a span, #ut-portfolio-navigation-wrap .ut-next-portfolio a span', ot_get_option('ut_single_portfolio_navigation_font_style') ); ?>
                        <?php echo $this->typography_css('#ut-portfolio-navigation-wrap .ut-prev-portfolio.ut-underline-effect a span, #ut-portfolio-navigation-wrap .ut-next-portfolio.ut-underline-effect a span', ot_get_option('ut_single_portfolio_navigation_font_style') ); ?>

                    <?php endif; ?>
                
                    
                    #ut-portfolio-navigation-wrap .ut-prev-portfolio.ut-underline-effect a span, 
                    #ut-portfolio-navigation-wrap .ut-next-portfolio.ut-underline-effect a span {
                        text-overflow: ellipsis;
                        white-space: pre;
                        overflow: hidden;
                    }
                
                    #ut-portfolio-navigation-wrap .ut-prev-portfolio.ut-underline-effect a span::after, 
                    #ut-portfolio-navigation-wrap .ut-next-portfolio.ut-underline-effect a span::after {
                        bottom: 0;    
                    }
                
                
                
                <?php endif; ?>
                
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
            
        
        }
            
    }

}

new UT_Portfolio_CSS;