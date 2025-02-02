<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Shortcodes_CSS' ) ) {	
    
    class UT_Shortcodes_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>

            <style id="ut-shortcode-custom-css" type="text/css">
                
                
                /* Animated Image
                ================================================== */ 
                .ut-animated-image-item {
                    text-align: inherit;
                    display: inline-block;                    
                }
                
                .ut-animated-image-item a {
                    position: relative;
                }

                .ut-image-gallery-item.animated img {
                    transform: scale(1.002);
                }
                
                
                /* Instagram
                ================================================== */ 
                .ut-instagram-module-loading {
                    display:none;
                }
                
                .ut-instagram-gallery-wrap {                
                    will-change: height;
                    -webkit-transition: all 0.5s linear;
                    -moz-transition: all 0.5s linear;
                    transition: all 0.5s linear;                
                }
                
                .ut-instagram-video-container {
                    display:none;
                }
                
                
                /* Team Member Swap
                ================================================== */ 
                .bklyn-team-member-avatar.bklyn-team-member-avatar-with-swap {
                    position: relative;
                }
                
                .bklyn-team-member-avatar.bklyn-team-member-avatar-with-swap .bklyn-team-member-secondary-image {
                    position: absolute;
                    top:0;
                    left:0;
                    opacity:0;
                    -webkit-transition: opacity 0.40s ease-in-out;
                    -moz-transition: opacity 0.40s ease-in-out;
                    -o-transition: opacity 0.40s ease-in-out;
                    transition: opacity 0.40s ease-in-out;
                }
                
                .bklyn-team-member:hover .bklyn-team-member-secondary-image {
                    opacity: 1;    
                }
                
                /* Buttons
                ================================================== */ 
                .ut-btn.dark:hover,
                .ut-btn.ut-pt-btn:hover { 
                    background: <?php echo $this->accent; ?>;  
                }
                
                .ut-btn.theme-btn {
                    background: <?php echo $this->accent; ?>;
                }
                
                /* Single Quote
                ================================================== */                
                .ut-rated i { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Social Follow
                ================================================== */
                .ut-social-follow-module a:hover,
                .ut-social-follow-module a:active,
                .ut-social-follow-module a:focus {
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Custom Icon
                ================================================== */
                .ut-custom-icon-link:hover i { 
                    color: <?php echo $this->accent; ?>;
                }
                .ut-custom-icon a:hover i:first-child {
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Blog Excerpt
                ================================================== */
                .light .ut-bs-wrap .entry-title a:hover, 
                .light .ut-bs-wrap a:hover .entry-title  { 
                    color: <?php echo $this->accent; ?>;
                }   
                
                /* Client Carousel
                ================================================== */ 
                .elastislide-wrapper nav span:hover { 
                    border-color: <?php echo $this->accent; ?>;
                    color: <?php echo $this->accent; ?>;
                }
                
                /* Twitter Rotator
                ================================================== */
                .ut-rq-icon-tw { 
                    color: <?php echo $this->accent; ?>; 
                }
                
                /* Quote Rotator
                ================================================== */
                .ut-rotate-quote .flex-direction-nav a,
                .ut-rotate-quote-alt .flex-direction-nav a { 
                    background:rgb(<?php echo $this->hex_to_rgb( $this->accent ); ?>); 
                    background:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.85); 
                }
                
                
                /* Service Column
                ================================================== */
                .ut-service-column h3 span  { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Social Icons
                ================================================== */
                .ut-social-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-social-link:hover .ut-social-icon { 
                    background:<?php echo $this->accent; ?> !important; 
                }
                
                /* List Icons
                ================================================== */
                .ut-icon-list i { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Alert
                ================================================== */
                .ut-alert.themecolor { 
                    background:<?php echo $this->accent; ?>; 
                }               
                
                /* Tabs
                ================================================== */
                .light .ut-nav-tabs li a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-nav-tabs li a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Probar
                ================================================== */
                .ut-skill-overlay { 
                    background:<?php echo $this->accent; ?>; 
                }
                
                /* Accordion
                ================================================== */
                .light .ut-accordion-heading a:hover { 
                    border-color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-accordion-heading a:hover { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                /* Dropcap
                ================================================== */
                .ut-dropcap-one, 
                .ut-dropcap-two { 
                    background: <?php echo $this->accent; ?>; 
                }                
                
                /* Vimeo Background
                ================================================== */
                .vimelar-container {
                    opacity: 0;
                    -webkit-transition: opacity 0.35s ease-in-out;
                    -moz-transition: opacity 0.35s ease-in-out;
                    -o-transition: opacity 0.35s ease-in-out;
                    transition: opacity 0.35s ease-in-out;
                }
                
                @media (min-width: 1025px) {
                
                    .vimelar-container.ut-vimeo-loaded {
                        opacity: 1;
                    }
                
                }
                
                /* Image Gallery
                ================================================== */
                .ut-vc-images-lightbox-caption {
                    display: none;
                }
                
                /* Slider Gallery
                ================================================== */
                figure.ut-gallery-slider-caption-wrap::before {
                    color:<?php echo $this->accent; ?>;    
                }
                
                
                /* Team Member ( Template )
                ================================================== */
                .member-social a:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .member-description .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-2 .ut-so-link:hover {
                    background: <?php echo $this->accent; ?> !important;    
                }
                
                .member-description-style-3 .ut-member-title { 
                    color:<?php echo $this->accent; ?>; 
                }
                
                .ut-member-style-3 .member-social a:hover { 
                    border-color: <?php echo $this->accent; ?>;  
                }
                
                .ut-hide-member-details:hover {
                    color:<?php echo $this->accent; ?>; 
                }
                
                .light .ut-hide-member-details {
                    color:<?php echo $this->accent; ?>; 
                }
                
                /* Icon Tabs
                ================================================== */ 
                .bklyn-icon-tabs li a:hover,
                .bklyn-icon-tabs li.active > a, 
                .bklyn-icon-tabs li.active > a:focus, 
                .bklyn-icon-tabs li.active > a:hover,
                .bklyn-icon-tabs li.active a .bkly-icon-tab {
                    color:<?php echo $this->accent; ?>;
                }
                                
                /* Video Shortcode
                ================================================== */ 
                .light .ut-shortcode-video-wrap .ut-video-caption { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption i { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.3); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption i { 
                    color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.3); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-shortcode-video-wrap .ut-video-caption:hover i { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .light .ut-video-loading { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .light .ut-video-loading { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .light .ut-video-caption-text { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 1); 
                }
                
                /* Pricing Tables
                ================================================== */ 
                .ut-pt-featured { 
                    background: <?php echo $this->accent; ?> !important;                 
                }
                
                .ut-pt-featured-table .ut-pt-info .fa-li  { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap.ut-pt-wrap-style-2 .ut-pt-featured-table .ut-pt-header { 
                    background: <?php echo $this->accent; ?>; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-info ul, 
                .ut-pt-wrap-style-3 .ut-pt-info ul li {
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.1);
                }
                
                .ut-pt-wrap-style-3 .ut-pt-header, 
                .ut-pt-wrap-style-3 .ut-custom-row, 
                .ut-pt-wrap-style-3 .ut-btn.ut-pt-btn,
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    border-color:rgba(<?php echo $this->hex_to_rgb( $this->accent ); ?>, 0.1); 
                }
            
                .ut-pt-wrap-style-3 .ut-btn { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    color: <?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-btn { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
            
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    color:<?php echo $this->accent; ?> !important; 
                }
                
                .ut-pt-wrap-style-3 .ut-pt-featured-table .ut-pt-title { 
                    text-shadow: 0 0 40px <?php echo $this->accent; ?>, 2px 2px 3px black; 
                }
                
                
                /* force height due to wrong JS Calculation of VC */                
                .vc_row.vc_row-o-full-height {
                    min-height: 100vh !important;
                }
                
                .vc_section[data-vc-full-width] > .ut-row-has-filled-cols:not([data-vc-full-width]) {
                    margin-left: 20px;
                    margin-right: 20px;
                }
                
                <?php 
                
                // VC Gap Row Calculation
            
                $vc_gap = array(
                    '0px' => '0',
                    '1px' => '1',
                    '2px' => '2',
                    '3px' => '3',
                    '4px' => '4',
                    '5px' => '5',
                    '10px' => '10',
                    '15px' => '15',
                    '20px' => '20',
                    '25px' => '25',
                    '30px' => '30',
                    '35px' => '35',
                    '40px' => '40'
                ); 
            
                foreach( $vc_gap as $key => $gap ) {
                    
                    echo '.vc_row.vc_column-gap-' . $gap . '{ 
                        margin-left: -' . ( $gap / 2 ) . 'px;
                        margin-right: -' . ( $gap / 2 ) . 'px;
                    }' . "\n";
                    
                } 
                
                foreach( $vc_gap as $key => $gap ) {
                    
                    echo '.vc_section[data-vc-full-width] > .vc_row:not(.vc_row-has-fill).vc_column-gap-' . $gap . ' { 
                        margin-left: ' . ( - ( $gap / 2 ) + 20 ) . 'px;
                        margin-right: ' . ( - ( $gap / 2 ) + 20 ) . 'px;
                    }' . "\n";
                    
                } 
            
                foreach( $vc_gap as $key => $gap ) {
                    
                    echo '
                    .ut-vc-200.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ' + .vc_row-full-width + .vc_row,
                    .ut-vc-160.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ' + .vc_row-full-width + .vc_row,
                    .ut-vc-120.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ' + .vc_row-full-width + .vc_row,
                    .ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ' + .vc_row-full-width + .vc_row {
                        margin-top: ' . ( 80 - ( $gap / 2 ) ) . 'px;
                    }' . "\n";
                    
                } 
                
                foreach( $vc_gap as $key => $gap ) {
                    
                    echo '
                    .ut-vc-200.vc_section > .vc_row + .vc_row-full-width + .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ',
                    .ut-vc-160.vc_section > .vc_row + .vc_row-full-width + .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ',
                    .ut-vc-120.vc_section > .vc_row + .vc_row-full-width + .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ',
                    .ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .vc_row.ut-row-has-filled-cols.vc_column-gap-' . $gap . ' {
                        margin-top: ' . ( 40 - ( $gap / 2 ) ) . 'px;
                    }' . "\n";
                    
                } ?>
                
                /* Shortcode Related Font Settings */
                <?php if( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ) ) : ?>
                        
                        .bkly-progress-circle.bkly-progress-circle-theme-font::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>;
                        }
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>;
                        }                             
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ) ) : ?>
                        
                        .bkly-progress-circle.bkly-progress-circle-theme-font::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>;
                        }
                        
                        .bkly-icon-tab-label.bkly-icon-tab-label-theme-font {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>;
                        }
                                        
                    <?php endif; ?>                
                
                <?php endif; ?>
                
                
                /* Call to Action Font
                ================================================== */ 
                <?php if( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ) ) : ?>
                        
                        .cta-btn a {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-family', '', true ); ?>
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-weight' ) ) : ?>
                        
                        .cta-btn a {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_global_google_headline_font_style', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php elseif( ot_get_option( 'ut_global_headline_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ) ) : ?>
                        
                        .cta-btn a {
                            font-family: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-family' ); ?>
                        }
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-weight' ) ) : ?>
                        
                        .cta-btn a {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_global_headline_websafe_font_style_settings', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                
                /* Gallery Slider
                ================================================== */ 
                <?php if( ot_get_option( 'ut_global_h3_font_type', 'ut-google' ) == 'ut-google' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_google_font_style', 'font-family', '', true ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-family', '', true ); ?>;
                        }                             
                
                    <?php endif; ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_google_font_style', 'font-weight' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_google_font_style', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                    
                
                <?php elseif( ot_get_option( 'ut_global_h3_font_type', 'ut-google' ) == 'ut-websafe' ) : ?>
                
                    <?php if( ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-family' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-family: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-family' ); ?>;
                        }
                                        
                    <?php endif; ?>                
                    
                    <?php if( ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-weight' ) ) : ?>
                        
                        figure.ut-gallery-slider-caption-wrap::before {
                            font-weight: <?php echo ut_get_option_attribute( 'ut_h3_websafe_font_style', 'font-weight' ); ?>
                        }
                
                    <?php endif; ?>
                
                <?php endif; ?>
                
                
                
                
                
                
                
            </style>
            
            <?php
            
            echo $this->minify_css( ob_get_clean() );
        
        }

    }

}

new UT_Shortcodes_CSS;