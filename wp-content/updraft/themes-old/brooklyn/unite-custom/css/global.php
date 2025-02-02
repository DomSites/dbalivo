<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Global_CSS' ) ) {	
    
    class UT_Global_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            global $post;
            
            ob_start(); ?>

            <style id="ut-global-custom-css" type="text/css">
                
                    <?php 

                    /*
                     * Border Settings ( Site Frame )
                     */

                    // single pages and portfolio can have individual frame settings
                    if( is_page() || is_singular("portfolio") || is_home() ) {
                        
                        // check if we are using a global option
                        $ut_site_border_global = get_post_meta( $this->ID, 'ut_page_site_border', true );
                        
                        if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {
                            
                            $ut_site_border_status = ot_get_option( 'ut_site_border_status' );
                            
                        } else {
                            
                            $ut_site_border_status = get_post_meta( $this->ID, 'ut_page_site_border_status', true );
                            
                        }                        
                    
                    // all other pages are based on global settings    
                    } else {
                       
                        $ut_site_border_status = ot_get_option( 'ut_site_border_status' );
                        
                    }
                
                    if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) : ?>
                        
                        @media (min-width: 1025px) {    
                
                        <?php 
            
                        $status = $ut_site_border_status; 
                        $margin = array();
            
                        // header and top header spacing flags
                        $left = false;
                        $right = false;
            
                        if( !empty( $status ) && is_array( $status ) ) {
                            
                            foreach( $status as $key => $state ) {
                                
                                if( $state == "on" && $key == 'margin-left' ) {
                                    $left = true;
                                }

                                if( $state == "on" && $key == 'margin-right' ) {
                                    $right = true;
                                }                            

                                // add margin to html
                                if( $state == "on" && $key != 'margin-bottom' ) {

                                    // skip if top header is active
                                    if( $key == 'margin-top' && ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
                                        continue;
                                    }

                                    $margin[] = $key . ':40px;';

                                }

                            }

                            if( !empty( $margin ) ) {                        
                                echo 'html { ' . implode( ' ', $margin ) . ' }';
                            }

                        // fallback    
                        } else {

                            echo 'html { background: ' . ot_get_option( 'ut_site_border_color', '#FFF' ) . '; margin-left:40px; margin-right: 40px; };';

                        } ?>

                        <?php 
            
                        // no frame left
                        if( !$left && $right ) : ?>

                            .ha-header.bordered-navigation:not(.ut-header-fixed), 
                            .ha-header.bordered-navigation.ha-transparent:not(.ut-header-fixed) {
                                left: 0;
                                width: calc(100% - 40px);                            
                            }                

                            .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                padding-left: 40px;    
                            }

                            <?php if( ot_get_option( 'ut_top_header_background_color' ) ) : ?>

                                .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                    padding-right: 40px;    
                                }

                            <?php endif; ?> 

                        <?php endif; ?>

                        <?php 

                        // no frame right
                        if( $left && !$right ) : ?>

                            .ha-header.bordered-navigation:not(.ut-header-fixed), 
                            .ha-header.bordered-navigation.ha-transparent:not(.ut-header-fixed) {
                                width: calc(100% - 40px);
                            }                

                            .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                padding-right:40px;    
                            }

                            <?php if( ot_get_option( 'ut_top_header_background_color' ) ) : ?>

                                .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                    padding-left:40px;    
                                }

                            <?php endif; ?>                

                        <?php endif; ?>
                        
                        
                        <?php 

                        // no frame left and right
                        if( !$left && !$right ) : ?>    
                            
                            .ha-header.bordered-navigation, 
                            .ha-header.bordered-navigation.ha-transparent {
                                width: 100%;
                                left: 0;
                            }
                            
                            .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                padding-left: 40px;
                                padding-right: 40px;
                            }                            
                            
                        <?php endif; ?>    
                            
                
                        <?php 
            
                        // frame left and right and an active topheader with background color
                        if( $left && $right && ot_get_option( 'ut_top_header_background_color' ) ) : ?>
        
                            .ut-site-border.ut-has-top-header #ut-top-header:not(.ut-top-header-centered) .ut-header-inner {
                                padding-left:40px;
                                padding-right:40px;    
                            }

                        <?php endif; ?>
                            
                        <?php 

                        // page has no content - so we need to divide the border height from top ( only when set )
                        if( $post && empty( $post->post_content ) && ut_page_option( 'ut_footerarea', 'on' ) == 'off' && ut_return_csection_config('ut_activate_csection', 'on') == 'off' && isset( $status['margin-top'] ) && $status['margin-top'] == 'on' ) {

                            echo 'html { height: calc(100% - 40px); min-height: calc(100% - 40px); }';

                        } ?>

                        <?php if( get_post_meta( $post->ID, 'ut_page_site_border', true ) == 'global' ) : ?>

                            /* html border */
                            html { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; }
                            .ut-site-border-bottom-part { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' );?>; display: block; height: 40px; }

                            /* top header background */
                            #ut-top-header { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; }                
                            
                            <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>
                            
                                body { background: <?php echo ot_get_option( 'ut_site_border_color', '#FFF' ); ?>; }
                            
                            <?php endif; ?>
                            
                        <?php else : ?>

                            html { background: <?php echo ut_page_option( 'ut_site_border_color', '#FFF' ); ?>; }
                            .ut-site-border-bottom-part { background: <?php echo ut_page_option( 'ut_site_border_color', '#FFF' );?>; display: block; height: 40px; }

                            /* top header background */
                            #ut-top-header { background: <?php echo ut_page_option( 'ut_site_border_color', '#FFF' ); ?>; }
                            
                            <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>
                            
                                body { background: <?php echo ut_page_option( 'ut_site_border_color', '#FFF' ); ?>; }
                            
                            <?php endif; ?>                            
                            
                        <?php endif; ?>
                            
                        .ut-site-border .vc_section[data-vc-stretch-content="true"] {
                            padding-left: <?php if( $left ) : ?>40px<?php else: ?>0<?php endif; ?>;
                            padding-right: <?php if( $right ) : ?>40px<?php else: ?>0<?php endif; ?>;
                        }

                        .ut-site-border .vc_row,
                        .ut-site-border .vc_section[data-vc-stretch-content="true"] .vc_row {
                            padding-left: <?php if( $left ) : ?>40px<?php else: ?>0<?php endif; ?>;
                            padding-right: <?php if( $right ) : ?>40px<?php else: ?>0<?php endif; ?>;
                        }

                        .ut-site-border .vc_row[data-vc-stretch-content="true"],
                        .ut-site-border .vc_row.vc_row-no-padding[data-vc-stretch-content="true"] {
                            padding-left: <?php if( $left ) : ?>40px<?php else: ?>0<?php endif; ?>;
                            padding-right: <?php if( $right ) : ?>40px<?php else: ?>0<?php endif; ?>;
                        }    
                    
                    }
                    
                    @media (max-width: 1024px) {
                        
                        #header-section {
                            top: 0 !important;
                        }    
                        
                    }
                    
                <?php endif; ?>
                                
                <?php if( ot_get_option('ut_site_border_body_color' ) ) { ?>
                            
                    <?php if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) : ?>

                        #main-content { background: <?php echo ot_get_option('ut_site_border_body_color' ); ?>; }

                    <?php else : ?>

                        body, #main-content { background: <?php echo ot_get_option('ut_site_border_body_color' ); ?>; }

                    <?php endif; ?>


                <?php } ?>                
                
                    
                /* Global Accent Colors
                ================================================== */
                ::-moz-selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                ::selection { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                a { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .lead a,
                .wpb_text_column a,
                .ut-twitter-rotator h2 a,
                .ut-vc-disabled .entry-content a,
                .comment-content a:not(.more-link),
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-slider-maximize):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide) {
                    color: <?php echo ot_get_option('ut_linkcolor', $this->accent ); ?>;
                    text-decoration: <?php echo ot_get_option('ut_link_decoration', 'none'); ?>;
                    font-weight: <?php echo ot_get_option('ut_link_weight', 'normal'); ?>;
                }
                
                .lead a:hover,
                .lead a:active,
                .lead a:focus,
                .ut-twitter-rotator h2 a:hover,
                .ut-twitter-rotator h2 a:active,
                .ut-twitter-rotator h2 a:focus,
                .wpb_text_column a:hover,
                .wpb_text_column a:active,
                .wpb_text_column a:focus,
                .ut-vc-disabled .entry-content a:hover,
                .ut-vc-disabled .entry-content a:active,
                .ut-vc-disabled .entry-content a:focus,
                .comment-content a:not(.more-link):hover,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):hover,
                .comment-content a:not(.more-link):active,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):active,
                .comment-content a:not(.more-link):focus,
                .type-post .entry-content :not(.tags-links) a:not(.more-link):not([class*="mashicon-"]):not(.ut-prev-gallery-slide):not(.ut-next-gallery-slide):not(.ut-slider-maximize):not(.ut-owl-video-play-icon):not(.owl-item-link):not(.flex-prev):not(.flex-next):focus {
                    color: <?php echo ot_get_option('ut_linkcolor_hover', $this->accent ); ?>;     
                }
                
                ins, mark { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .page-title ins,
                .section-title ins {
                    background: transparent;
                    padding: 0;
                    color: <?php echo $this->accent; ?>;
                }
                
                .lead ins {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .themecolor  { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .lead span {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .comment-reply-link:hover i,
                .comment-reply-link:active i,
                .comment-reply-link:focus i {
                    color: <?php echo $this->accent; ?>; 
                }
                
                .themecolor-bg {
                    background:<?php echo $this->accent; ?>; 
                }                
                
                .img-hover { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);    
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }                
                
                .author-avatar img,
                .bypostauthor .comment-avatar img,
                .ut-hero-meta-author .ut-entry-avatar-image img,
                .ut-archive-hero-avatar img {
                    border-color: <?php echo $this->accent; ?>; 
                }
                
                .ha-transparent #navigation ul li a:not(.bklyn-btn):hover { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* glow effect */
                .ut-glow {
                    color: <?php echo $this->accent; ?>;
                    text-shadow:0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }                
                                
                .ut-language-selector a:hover { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                .ut-video-post-icon {
                    background:<?php echo $this->accent; ?>;     
                }
                
                /* 404 hero button */
                .error404 .hero-btn-holder .ut-btn:hover,
                .error404 .hero-btn-holder .ut-btn:active,
                .error404 .hero-btn-holder .ut-btn:focus {
                    background:<?php echo $this->accent; ?>;    
                }
                
                
                /* logo */
                @media (min-width: 1025px) {
                    .site-logo img { 
                        max-height: <?php echo ut_return_header_config('ut_site_logo_max_height' , '60'); ?>px; 
                    }
                }
                
                @media (min-width: 1601px) {
                
                    .side-site-logo img {
                        max-width: <?php echo ot_get_option( 'ut_site_logo_max_width', '100' ); ?>%;
                    }                
                
                }
                
                .ut-header-dark .site-logo .logo a:hover { 
                    color:<?php echo $this->accent; ?>;
                }
                
                /* blockquotes */
                blockquote { 
                    border-color:<?php echo $this->accent; ?>; 
                }
                
                blockquote span:not(.quote-right):not(.quote-left) { 
                    color:<?php echo $this->accent; ?>;  
                }
                
                
                .ut-format-link:hover,
                .ut-format-link:active,
                .ut-format-link:focus {
                    background:<?php echo $this->accent; ?>;
                }
                
                
                /* headlines */
                h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
                    color:<?php echo $this->accent; ?>;
                }
                
                /* forms */
                button,
                input[type="button"],
                input[type="submit"] {
                    color: <?php echo ot_get_option('ut_blog_button_text_color', '#FFF'); ?>;
                    background: <?php echo ot_get_option('ut_blog_button_background_color', '#151515'); ?>;
                    font-weight: <?php echo ot_get_option('ut_blog_button_font_weight', 'bold'); ?>;
                }
                
                
                <?php if( ot_get_option( 'ut_blog_button_body_font', 'off' ) == 'on' ) : ?>
                
                button,
                input[type="button"],
                input[type="submit"] {
                    font-family: initial;
                }
                
                <?php endif; ?>
                
                
                button:hover,
                button:focus,
                button:active,
                input[type="button"]:hover,
                input[type="button"]:focus,
                input[type="button"]:active,
                input[type="submit"]:hover,
                input[type="submit"]:focus,
                input[type="submit"]:active{
                    color: <?php echo ot_get_option('ut_blog_button_text_color_hover', '#FFF'); ?>;
                    background:<?php echo ot_get_option('ut_blog_button_background_color_hover', $this->accent ); ?>;                    
                }
                
                <?php if( ot_get_option( 'ut_blog_button_border', 'off' ) == 'on' ) : ?>
                
                    button,
                    input[type="button"],
                    input[type="submit"] {
                        -webkit-border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px; 
                        -moz-border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px; 
                        border-radius: <?php echo ot_get_option('ut_blog_button_border_radius', '3'); ?>px;
                    }               
                
                <?php endif; ?>
                
                .ut-footer-light button:hover,
                .ut-footer-light button:focus,
                .ut-footer-light button:active,
                .ut-footer-light input[type="button"]:hover,
                .ut-footer-light input[type="button"]:focus,
                .ut-footer-light input[type="button"]:active,
                .ut-footer-light input[type="submit"]:hover,
                .ut-footer-light input[type="submit"]:focus,
                .ut-footer-light input[type="submit"]:active {
                    background:<?php echo $this->accent; ?>;
                }
                
                .ut-footer-dark button, 
                .ut-footer-dark input[type="submit"], 
                .ut-footer-dark input[type="button"] {
                    background:<?php echo $this->accent; ?>;
                }
                
                .ut-footer-custom button, 
                .ut-footer-custom input[type="submit"], 
                .ut-footer-custom input[type="button"] {
                    color: <?php echo ot_get_option('ut_footer_button_text_color', '#FFFFFF'); ?>;
                    background:<?php echo ot_get_option('ut_footer_button_color', $this->accent ); ?>;
                }
                .ut-footer-custom button:hover,
                .ut-footer-custom button:focus,
                .ut-footer-custom button:active,
                .ut-footer-custom input[type="button"]:hover,
                .ut-footer-custom input[type="button"]:focus,
                .ut-footer-custom input[type="button"]:active,
                .ut-footer-custom input[type="submit"]:hover,
                .ut-footer-custom input[type="submit"]:focus,
                .ut-footer-custom input[type="submit"]:active{
                    color: <?php echo ot_get_option('ut_footer_button_text_color_hover', '#FFFFFF' ); ?>;
                    background:<?php echo ot_get_option('ut_footer_button_color_hover', '#151515' ); ?>;
                }
                
                <?php if( ot_get_option('ut_footer_button_border', 'off') == 'off' ) : ?>
                    
                    .ut-footer-light button, 
                    .ut-footer-light input[type="submit"], 
                    .ut-footer-light input[type="button"],
                    .ut-footer-dark button, 
                    .ut-footer-dark input[type="submit"], 
                    .ut-footer-dark input[type="button"],
                    .ut-footer-custom button, 
                    .ut-footer-custom input[type="submit"], 
                    .ut-footer-custom input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;
                    }
                
                <?php endif; ?>
                
                #contact-section.light button, 
                #contact-section.light input[type="submit"], 
                #contact-section.light input[type="button"],
                .ut-hero-form.light button, 
                .ut-hero-form.light input[type="submit"], 
                .ut-hero-form.light input[type="button"] {
                    background:<?php echo $this->accent; ?>;
                }
                
                #contact-section.dark button:hover,
                #contact-section.dark button:focus,
                #contact-section.dark button:active,
                #contact-section.dark input[type="button"]:hover,
                #contact-section.dark input[type="button"]:focus,
                #contact-section.dark input[type="button"]:active,
                #contact-section.dark input[type="submit"]:hover,
                #contact-section.dark input[type="submit"]:focus,
                #contact-section.dark input[type="submit"]:active {
                    background:<?php echo $this->accent; ?>;
                }
                
                
                #contact-section.light button, 
                #contact-section.light input[type="submit"], 
                #contact-section.light input[type="button"],
                #contact-section.dark button, 
                #contact-section.dark input[type="submit"], 
                #contact-section.dark input[type="button"] {
                    color: <?php echo ot_get_option('ut_csection_submit_button_text_color', '#FFFFFF' ); ?>;
                    background:<?php echo ot_get_option('ut_csection_submit_button_color', '#151515' ); ?>;    
                }
                
                #contact-section.light button:hover,
                #contact-section.light button:focus,
                #contact-section.light button:active,
                #contact-section.light input[type="button"]:hover,
                #contact-section.light input[type="button"]:focus,
                #contact-section.light input[type="button"]:active,
                #contact-section.light input[type="submit"]:hover,
                #contact-section.light input[type="submit"]:focus,
                #contact-section.light input[type="submit"]:active,
                #contact-section.dark button:hover,
                #contact-section.dark button:focus,
                #contact-section.dark button:active,
                #contact-section.dark input[type="button"]:hover,
                #contact-section.dark input[type="button"]:focus,
                #contact-section.dark input[type="button"]:active,
                #contact-section.dark input[type="submit"]:hover,
                #contact-section.dark input[type="submit"]:focus,
                #contact-section.dark input[type="submit"]:active {
                    color: <?php echo ot_get_option('ut_csection_submit_button_text_color_hover', '#FFFFFF'); ?>;
                    background:<?php echo ot_get_option('ut_csection_submit_button_color_hover', $this->accent ); ?>;
                    font-weight: <?php echo ot_get_option('ut_csection_submit_button_font_weight', 'bold'); ?>;
                }
                
                <?php if( ot_get_option('ut_csection_submit_button_border', 'off') == 'off' ) : ?>
                    
                    #contact-section.light button, 
                    #contact-section.light input[type="submit"], 
                    #contact-section.light input[type="button"],
                    #contact-section.dark button, 
                    #contact-section.dark input[type="submit"], 
                    #contact-section.dark input[type="button"] {
                     -webkit-border-radius:0;
                        -moz-border-radius:0;
                             border-radius:0;
                    }
                
                <?php endif; ?>
                
                /* wordpress media element */
                .mejs-controls .mejs-time-rail .mejs-time-current, 
                .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* more link */
                .more-link:hover i,
                .more-link:active i,
                .more-link:focus i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* post format */
                .format-link .entry-header a { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* misc */
                .ut-avatar-overlay { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85);  
                }
                
                /* contact form 7 */
                div.wpcf7-validation-errors { 
                    border-color:<?php echo $this->accent; ?>;  
                }
                
                /* deprecated */
                .count { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .team-member-details { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>);
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85 ); 
                }
                
                .about-icon { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                .cta-section { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                .icons-ul i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                #secondary a:hover, 
                .page-template-templatestemplate-archive-php a:hover { color:<?php echo $this->accent; ?>; }

                
                
                /* Preloader
                ================================================== */ 
                <?php echo $this->typography_css( '#qLpercentage', ot_get_option('ut_image_loader_percentage_font') ); ?>
                
                #ut-sitebody #qLoverlay .site-logo .logo {
                    color: <?php echo ot_get_option('ut_image_loader_bar_color'); ?>; 
                }
                
                #ut-loader-logo { 
                    max-width: <?php echo ot_get_option( 'ut_image_loader_logo_max_width', 100 ); ?>px;
                }
                
                #qLoverlay { 
                    background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style2 .ut-loading-bar-style2-ball-effect { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style3-outer { 
                    border-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style-3-inner { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>;
                }
                
                .ut-loader__bar4, .ut-loader__ball4 { 
                    background: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-loading-bar-style5-inner { 
                    color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                #qLoverlay .ut-double-bounce1, 
                #qLoverlay .ut-double-bounce2 {
                    background: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>;
                }

                .sk-cube-grid .sk-cube { 
                    background-color: <?php echo ot_get_option('ut_image_loader_bar_color' , '#FFF'); ?>; 
                }
                
                .ut-inner-overlay .ut-loading-text p { 
                    color: <?php echo ot_get_option('ut_image_loader_text_color' ); ?> !important; 
                }
                
                <?php echo $this->typography_css( '.ut-inner-overlay .ut-loading-text p', ot_get_option('ut_image_loader_font') ); ?>
                
                .ut-inner-overlay .ut-loading-text { 
                    margin-top: <?php echo ot_get_option( 'ut_image_loader_text_margin_top', 20 ); ?>px !important; 
                }
                
                .ut-loader-overlay { 
                    background: <?php echo ot_get_option('ut_image_loader_background' , '#FFF'); ?>;
                }
                

                <?php 
               
                /**
                 * Body Font
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'body',
                    'font-type'          => ot_get_option('ut_body_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_body_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_google_body_font_style'),
                    'websafe-font-style' => ot_get_option('ut_body_websafe_font_style') 
                ) ); 
                
                if( ot_get_option('ut_body_font_color') ) {
                    echo 'body { color: ' . ot_get_option('ut_body_font_color') . ' ;}';    
                }
               
                /**
                 * Headline Fonts
                 */
                foreach( array('h1','h2','h3','h4','h5','h6') as $headline ) {
                    
                    $selector = $headline == 'h2' ? $headline . ', .ut-quote-post-block' : $headline;
                    
                    echo $this->font_style_css( array(
                        'selector'           => $selector,
                        'font-type'          => ot_get_option('ut_global_' . $headline . '_font_type', 'ut-font' ),   
                        'font-style'         => ot_get_option('ut_'. $headline .'_font_style', 'regular' ),
                        'google-font-style'  => ot_get_option('ut_'. $headline .'_google_font_style'),
                        'websafe-font-style' => ot_get_option('ut_'. $headline .'_websafe_font_style') 
                    ) ); 
                
                    if( ot_get_option('ut_global_'.$headline.'_font_color') ) {
                        echo $headline . ' {  color: ' . ot_get_option('ut_global_'.$headline.'_font_color') . '; }'. "\n";
                    }
                
                }
                
                /**
                 * Content Widgets
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#ut-sitebody #primary .entry-content .widget-title',
                    'font-type'          => ot_get_option('ut_content_widgets_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_content_widgets_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_content_widgets_style'),
                    'websafe-font-style' => ot_get_option('ut_global_content_widgets_websafe_font_style') 
                ) );
                
                /**
                 * Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => 'blockquote:not(.ut-parallax-quote-title):not(.ut-quote-post-block)',
                    'font-type'          => ot_get_option('ut_blockquote_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_blockquote_websafe_font_style') 
                ) );                
                
                if( ot_get_option('ut_global_blockquote_headline_color') ) {
                    echo 'blockquote { color: ' . ot_get_option('ut_global_blockquote_headline_color') . ' ;}';
                }
                
                /**
                 * Single Blockquote Fonts
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.single blockquote:not(.ut-parallax-quote-title), .page blockquote:not(.ut-parallax-quote-title)',
                    'font-type'          => ot_get_option('ut_single_blockquote_font_type', 'ut-websafe' ),   
                    'font-style'         => ot_get_option('ut_single_blockquote_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_single_blockquote_font_style'),
                    'websafe-font-style' => ot_get_option('ut_single_blockquote_websafe_font_style') 
                ) );
                
                
                /**
                 * Global Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '.lead, .dark .lead, .taxonomy-description',
                    'font-type'          => ot_get_option('ut_global_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_lead_font_style', 'semibold' ),
                    'google-font-style'  => ot_get_option('ut_google_lead_font_style'),
                    'websafe-font-style' => ot_get_option('ut_lead_websafe_font_style') 
                ) ); 
                
                if( ot_get_option('ut_global_lead_color') ) {
                    echo '.lead p { color: ' . ot_get_option('ut_global_lead_color') . ' ;}';
                }
                

                /**
                 * Contact Section Header
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .parallax-title, #contact-section .section-title',
                    'font-type'          => ot_get_option('ut_csection_header_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_header_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_header_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_header_websafe_font_style') 
                ) );
                
                if( ot_get_option('ut_csection_header_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .parallax-title, #contact-section .section-title', ot_get_option('ut_csection_header_font_style_settings') );
                
                }
                
                /**
                 * Contact Section Lead
                 */
                echo $this->font_style_css( array(
                    'selector'           => '#contact-section .lead p',
                    'font-type'          => ot_get_option('ut_csection_lead_font_type', 'ut-font' ),   
                    'font-style'         => ot_get_option('ut_csection_lead_font_style', 'regular' ),
                    'google-font-style'  => ot_get_option('ut_csection_lead_google_font_style'),
                    'websafe-font-style' => ot_get_option('ut_csection_lead_websafe_font_style') 
                ) ); 
                
                if( ot_get_option( 'ut_csection_lead_color' ) ) {
                    echo '#contact-section .lead p { color: ' . ot_get_option('ut_csection_lead_color') . ' ;}';
                }
               
                if( ot_get_option('ut_csection_lead_font_type', 'ut-font' ) == 'ut-font' ) {
                
                    echo $this->typography_css( '#contact-section .lead', ot_get_option('ut_csection_lead_font_style_settings') );
                
                }
                    
                ?>
                
                
                
                <?php 
                
                /*
                 * Top Header
                 */
                 
                if( ut_page_option('ut_top_header' , 'hide' ) == 'show' ) : ?>
                    
                    /* top header background */
                    #ut-top-header { background: <?php echo ot_get_option( 'ut_top_header_background_color'); ?>; }
                    
                    /* top header colors */
                    .ut-header-inner { color: <?php echo ot_get_option( 'ut_top_header_text_color', '#888' ); ?>; }
                    
                    /* left */
                    #ut-top-header-left .fa { color: <?php echo ot_get_option( 'ut_top_header_icon_color', '#888' ); ?>; }
                    #ut-top-header-left a { color: <?php echo ot_get_option( 'ut_top_header_link_color', '#888' ); ?>; }
                    #ut-top-header-left a:hover { color: <?php echo ot_get_option( 'ut_top_header_link_color_hover', $this->accent ); ?>; }
                    
                    /* right */
                    #ut-top-header-right .fa { color: <?php echo ot_get_option( 'ut_top_header_social_icon_color', '#888' ); ?>; }
                    #ut-top-header-right .fa:hover { color: <?php echo ot_get_option( 'ut_top_header_social_icon_color_hover', $this->accent ); ?>; }
                    
                <?php endif; ?>
                
                /* LightGallery
                ================================================== */ 
                .lg-progress-bar .lg-progress { background-color: <?php echo $this->accent; ?>; }
                .lg-outer .lg-thumb-item.active, .lg-outer .lg-thumb-item:hover { border-color: <?php echo $this->accent; ?>; }
                
                /* Parallax Overlay 
                ================================================== */
                .parallax-overlay-pattern.style_one { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern.png") !important; }
                .parallax-overlay-pattern.style_two { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern2.png") !important; }
                .parallax-overlay-pattern.style_three { background-image: url(" <?php echo THEME_WEB_ROOT; ?>/images/overlay-pattern3.png") !important; }                
                
                <?php if( !unite_mobile_detection()->isMobile() && ot_get_option('ut_animate_sections' , 'on') == 'on' && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) : ?>
                    
                    /* Section Animation
                    ================================================== */
                    .js #main-content section .section-content,
                    .js #main-content section .section-header-holder {
                        opacity:0;
                    }
                        
                <?php endif; ?>
                
                
                
                
                /* Site Main Content Spacing
                ================================================== */
                
                @media (min-width: 1025px) {
                
                    .blog #primary,
                    .single #primary,
                    .search #primary,
                    .search-results #primary,
                    .archive #primary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_bottom') ); ?>;   
                    }

                    .blog #secondary,
                    .single #secondary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_padding_bottom') ); ?>;
                    }

                    .blog.has-no-hero #primary,
                    .single.has-no-hero #primary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_bottom') ); ?>;
                    }

                    .blog.has-no-hero #secondary,
                    .single.has-no-hero #secondary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_blog_no_hero_padding_bottom') ); ?>;
                    }

                    .page #primary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_bottom') ); ?>;   
                    }

                    .page #secondary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_padding_bottom') ); ?>;
                    }

                    .page.has-no-hero #primary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_bottom') ); ?>;  
                    }

                    .page.has-no-hero #secondary {
                        padding-top:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_top') ); ?>;
                        padding-bottom:<?php echo $this->add_px_value( ot_get_option('ut_page_no_hero_padding_bottom') ); ?>;
                    }
                
                }
                
                /* Extra Case Space Settings
                ================================================== */
                
                <?php if( is_page() || is_singular("portfolio") ) :?>
                    
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating') : ?>
                
                        .has-no-hero .vc_section.ut-first-section {
                            padding-top: <?php echo ot_get_option( 'ut_section_spacing_system', '80' ) + ut_return_header_config( 'ut_navigation_height', 80 ); ?>px;
                        }
                        
                    <?php else : ?>
                
                        .has-no-hero .vc_section.ut-first-section {
                            padding-top: <?php echo ot_get_option( 'ut_section_spacing_system', '80' ); ?>px;
                        }
                    
                    <?php endif; ?>
                
                    .has-no-hero .vc_section.ut-first-section.ut-first-row-has-fill {
                        padding-top: <?php echo ut_return_header_config( 'ut_navigation_height', 80 ); ?>px;
                    }

                    .ut-has-page-title.ut-vc-enabled .page-header {
                        margin-top: <?php echo ot_get_option( 'ut_section_spacing_system', '80' ); ?>px;
                    }                
                    
                    <?php if( ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating') : ?>                
                
                        .ut-has-page-title.has-no-hero.ut-vc-enabled.page .page-header,
                        .ut-has-page-title.has-no-hero.ut-vc-enabled.single-portfolio .page-header {
                            margin-top: <?php echo ot_get_option( 'ut_section_spacing_system', '80' ) + ut_return_header_config( 'ut_navigation_height', 80 ); ?>px;
                        }
                    
                    <?php else : ?>
                        
                        .ut-has-page-title.has-no-hero.ut-vc-enabled.page .page-header,
                        .ut-has-page-title.has-no-hero.ut-vc-enabled.single-portfolio .page-header {
                            margin-top: <?php echo ot_get_option( 'ut_section_spacing_system', '80' ); ?>px;
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                /* Site Offset Anchor Settings 
                ================================================== */
                .ut-vc-offset-anchor-top,
                .ut-vc-offset-anchor-bottom {
                    position:absolute;
                    width: 0px;
                    height: 0px;
                    display: block;
                    overflow: hidden;
                    visibility: hidden;
                }
                
                .ut-vc-offset-anchor-top {
                    top:0;
                    left:0;
                }
                
                .ut-vc-offset-anchor-bottom {
                    left:0;
                    bottom:0px;
                }
                
                .ut-scroll-up-waypoint-wrap {
                    position:relative;
                }

                .vc_section.bklyn-section-with-overlay > .vc_row {
                    z-index: 3;    
                }
            
            </style>
            
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
                    
        
        }

    }

}

new UT_Global_CSS;