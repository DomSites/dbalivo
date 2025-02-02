<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Sidebar_CSS' ) ) {	
    
    class UT_Sidebar_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
            
            <style type="text/css">

                /* sidebar align */
                #primary { 
                    float: <?php echo ot_get_option('ut_sidebar_align' , 'right') == 'right' ? 'left' : 'right'; ?> ; 
                }
                
                <?php if( ot_get_option('ut_global_sidebar_widgets_headline_color') ) : ?>
            
                    /* Sidebar Widget Title */
                    #ut-sitebody #secondary .widget-title,
                    #ut-sitebody #secondary .widget-title a,
                    #ut-sitebody #secondary .widget-title a:hover,
                    #ut-sitebody #secondary .widget-title a:focus,
                    #ut-sitebody #secondary .widget-title a:active,
                    #ut-sitebody #secondary h1,
                    #ut-sitebody #secondary h2,
                    #ut-sitebody #secondary h3,
                    #ut-sitebody #secondary h4,
                    #ut-sitebody #secondary h5,
                    #ut-sitebody #secondary h6 {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_headline_color'); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php if( ot_get_option('ut_global_sidebar_widgets_text_color') ) : ?>
             
                    /* Sidebar Color */
                    #ut-sitebody #secondary,
                    #ut-sitebody #secondary select,
                    #ut-sitebody #secondary textarea,
                    #ut-sitebody #secondary input[type="text"],
                    #ut-sitebody #secondary input[type="tel"],
                    #ut-sitebody #secondary input[type="email"],
                    #ut-sitebody #secondary input[type="password"],
                    #ut-sitebody #secondary input[type="number"],
                    #ut-sitebody #secondary input[type="search"] {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_text_color'); ?> !important;
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_text_font_size') ) : ?>
                
                    /* Sidebar Font Size */
                    #ut-sitebody #secondary,
                    #ut-sitebody #secondary select,
                    #ut-sitebody #secondary textarea,
                    #ut-sitebody #secondary input[type="text"],
                    #ut-sitebody #secondary input[type="tel"],
                    #ut-sitebody #secondary input[type="email"],
                    #ut-sitebody #secondary input[type="password"],
                    #ut-sitebody #secondary input[type="number"],
                    #ut-sitebody #secondary input[type="search"] {
                        font-size:<?php echo ot_get_option('ut_global_sidebar_widgets_text_font_size'); ?> !important;
                    }
                
                <?php endif; ?>
                                
                <?php if( ot_get_option('ut_global_sidebar_widgets_text_line_height') ) : ?>
                
                    /* Sidebar Line Height */
                    #ut-sitebody #secondary {                   
                        line-height:<?php echo ot_get_option('ut_global_sidebar_widgets_text_line_height'); ?> !important;
                    }
                
                <?php endif; ?>
                
                <?php if( ot_get_option('ut_global_sidebar_widgets_link_color') ) : ?>
                
                    /* Sidebar Link */
                    #ut-sitebody #secondary a {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_link_color'); ?> !important;   
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_link_color_hover') ) : ?>
                
                    /* Sidebar Link Hover */
                    #ut-sitebody #secondary a:hover,
                    #ut-sitebody #secondary a:focus,
                    #ut-sitebody #secondary a:active {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_link_color_hover'); ?> !important;   
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_border_color') ) : ?>
                 
                    /* Sidebar Border Color */
                    #ut-sitebody #secondary .widget-title,
                    #ut-sitebody #secondary li,
                    #ut-sitebody #secondary .ut-archive-tags a,
                    #ut-sitebody #secondary .widget_tag_cloud a,
                    #ut-sitebody #secondary table,
                    #ut-sitebody #secondary tr,
                    #ut-sitebody #secondary td,
                    #ut-sitebody #secondary select,
                    #ut-sitebody #secondary textarea,
                    #ut-sitebody #secondary input[type="text"],
                    #ut-sitebody #secondary input[type="tel"],
                    #ut-sitebody #secondary input[type="email"],
                    #ut-sitebody #secondary input[type="password"],
                    #ut-sitebody #secondary input[type="number"],
                    #ut-sitebody #secondary input[type="search"] {
                        border-color:<?php echo ot_get_option('ut_global_sidebar_widgets_border_color'); ?> !important;
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_border_color_hover') ) : ?>
                
                    /* Sidebar Border Color Hover */
                    #ut-sitebody #secondary select:active,
                    #ut-sitebody #secondary textarea:active,
                    #ut-sitebody #secondary input[type="text"]:active,
                    #ut-sitebody #secondary input[type="tel"]:active,
                    #ut-sitebody #secondary input[type="email"]:active,
                    #ut-sitebody #secondary input[type="password"]:active,
                    #ut-sitebody #secondary input[type="number"]:active,
                    #ut-sitebody #secondary input[type="search"]:active,
                    #ut-sitebody #secondary select:focus,
                    #ut-sitebody #secondary textarea:focus,
                    #ut-sitebody #secondary input[type="text"]:focus,
                    #ut-sitebody #secondary input[type="tel"]:focus,
                    #ut-sitebody #secondary input[type="email"]:focus,
                    #ut-sitebody #secondary input[type="password"]:focus,
                    #ut-sitebody #secondary input[type="number"]:focus,
                    #ut-sitebody #secondary input[type="search"]:focus,
                    #ut-sitebody #secondary .ut-archive-tags a:hover,
                    #ut-sitebody #secondary .widget_tag_cloud a:hover,
                    #ut-sitebody #secondary .ut-archive-tags a:active,
                    #ut-sitebody #secondary .widget_tag_cloud a:active,
                    #ut-sitebody #secondary .ut-archive-tags a:focus,
                    #ut-sitebody #secondary .widget_tag_cloud a:focus {
                        border-color:<?php echo ot_get_option('ut_global_sidebar_widgets_border_color_hover'); ?> !important;
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_icon_color') ) : ?>
                
                    /* Sidebar Icons */
                    #ut-sitebody #secondary .fa,
                    #ut-sitebody #secondary  a .fa,
                    #ut-sitebody #secondary .widget_recent_comments li::before,
                    #ut-sitebody #secondary .widget_recent_comments li.recentcomments::before,
                    #ut-sitebody #secondary .widget_categories li::before, 
                    #ut-sitebody #secondary .widget_pages li::before, 
                    #ut-sitebody #secondary .widget_nav_menu li::before, 
                    #ut-sitebody #secondary .widget_recent_entries li::before, 
                    #ut-sitebody #secondary .widget_meta li::before, 
                    #ut-sitebody #secondary .widget_archive li::before,
                    #ut-sitebody #secondary .ut_widget_contact .ut-address::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-phone::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-fax::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-email::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-internet::before,
                    #ut-sitebody #secondary .tweet_list li::before {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_icon_color'); ?> !important;   
                    }
                
                <?php endif; ?>
            
                <?php if( ot_get_option('ut_global_sidebar_widgets_icon_color_hover') ) : ?>
                    
                    
                    #ut-sitebody #secondary a:hover .fa,
                    #ut-sitebody #secondary a:active .fa,
                    #ut-sitebody #secondary a:focus .fa,
                    #ut-sitebody #secondary .widget_recent_comments li:hover::before,
                    #ut-sitebody #secondary .widget_recent_comments li.recentcomments:hover::before,                    
                    #ut-sitebody #secondary .widget_categories li:hover::before, 
                    #ut-sitebody #secondary .widget_pages li:hover::before, 
                    #ut-sitebody #secondary .widget_nav_menu li:hover::before, 
                    #ut-sitebody #secondary .widget_recent_entries li:hover::before, 
                    #ut-sitebody #secondary .widget_meta li:hover::before, 
                    #ut-sitebody #secondary .widget_archive li:hover::before,
                    #ut-sitebody #secondary .ut_widget_contact .ut-address:hover::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-phone:hover::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-fax:hover::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-email:hover::before, 
                    #ut-sitebody #secondary .ut_widget_contact .ut-internet:hover::before,
                    #ut-sitebody #secondary .tweet_list li:hover::before {
                        color:<?php echo ot_get_option('ut_global_sidebar_widgets_icon_color_hover'); ?> !important;   
                    }
                
                <?php endif; ?>
                
                
                <?php
                
                /**
                 * Sidebar Widget Title Font
                 */                                 
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody #secondary h3.widget-title',
                    'font-type'          => ot_get_option('ut_global_blog_widgets_headline_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_global_blog_widgets_headline_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_global_blog_widgets_headline_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_global_blog_widgets_headline_websafe_font_style') 
                ) );  
                
                ?>                
                
                <?php if( ot_get_option('ut_global_sidebar_widgets_arrow_line_height') ) : ?>
                
                    #ut-sitebody #secondary .widget_categories li:before, 
                    #ut-sitebody #secondary .widget_pages li:before, 
                    #ut-sitebody #secondary .widget_nav_menu li:before, 
                    #ut-sitebody #secondary .widget_recent_entries li:before, 
                    #ut-sitebody #secondary .widget_meta li:before, 
                    #ut-sitebody #secondary .widget_archive li:before {
                        line-height:<?php echo ot_get_option('ut_global_sidebar_widgets_arrow_line_height'); ?> !important;   
                    }
                
                <?php endif; ?>

            </style>
            
            <?php 
                        
            /* output css */
            echo $this->minify_css( ob_get_clean() );    
        
        }  
            
    }

}

new UT_Sidebar_CSS;