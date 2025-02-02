<?php

function _ut_theme_options() {

    $ut_settings = array(

        'sections' => array(

            array(
                'id' => 'ut_general_settings',
                'title' => 'General',
                'icon' => 'general-icon.png',
                'def_section' => 'ut_site_layout_settings',
                'subsections' => array(

                    array(
                        'label' => 'Site Mode',
                        'id' => 'ut_site_layout_settings'
                    ),

                    array(
                        'label' => 'Logo & Accent Color',
                        'id' => 'ut_customize_settings'
                    ),

                    array(
                        'label' => 'Apple Touch Icons',
                        'id' => 'ut_touch_settings'
                    ),

                    array(
                        'label' => 'Site Frame',
                        'id' => 'ut_border_settings'
                    ),

                    array(
                        'label' => 'Top Header',
                        'id' => 'ut_top_header_settings'
                    ),

                    array(
                        'label' => 'Global Header and Navigation',
                        'id' => 'ut_navigation_settings',
                    ),

                    array(
                        'label' => 'Mobile Navigation',
                        'id' => 'ut_mobile_navigation_settings',
                    ),
                
                    array(
                        'label' => 'Overlay Navigation',
                        'id' => 'ut_overlay_navigation_settings',
                    ),
        
                    array(
                        'label' => 'Sidebar Colors',
                        'id' => 'ut_global_sidebar_settings'
                    ),

                    array(
                        'label' => 'Footer',
                        'id' => 'ut_footer_settings',
                        'def_section' => 'ut_footer_colors',
                        'subsections' => array(
                    
                            array(
                                'label' => 'Settings',
                                'id' => 'ut_footer_area_settings'
                            ),
        
                            array(
                                'label' => 'Colors',
                                'id' => 'ut_footer_colors'
                            ),

                            array(
                                'label' => 'Scroll Top Button',
                                'id' => 'ut_scroll_top'
                            )

                        )
                    ),

                    array(
                        'label' => 'Subfooter',
                        'id' => 'ut_subfooter_settings'
                    ),
                )
            ),

            array(
                'id' => 'ut_typography_settings',
                'title' => 'Typography',
                'icon' => 'typography-icon.png',
                'def_section' => 'ut_global_body_settings',
                'subsections' => array(

                    array(
                        'label' => 'General',
                        'id' => 'ut_general_typography_settings',
                        'def_section' => 'ut_global_body_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Body',
                                'id' => 'ut_global_body_settings'
                            ),

                            array(
                                'label' => 'Logo and Navigation',
                                'id' => 'ut_global_navigation_menu_settings'
                            ),
        
                            array(
                                'label' => 'Overlay Navigation',
                                'id' => 'ut_global_overlay_navigation_settings'
                            ),

                            array(
                                'label' => 'Content Titles',
                                'id' => 'ut_global_htags_settings'
                            ),

                            array(
                                'label' => 'Content Widgets',
                                'id' => 'ut_global_content_widgets_settings'
                            ),

                            array(
                                'label' => 'Blog',
                                'id' => 'ut_global_blog_menu_settings'
                            ),

                            array(
                                'label' => 'Blockquotes',
                                'id' => 'ut_global_blockquote_settings'
                            ),

                            array(
                                'label' => 'Sidebar',
                                'id' => 'ut_global_blog_widgets_settings'
                            ),

                            array(
                                'label' => 'Footer',
                                'id' => 'ut_global_footer_typo_settings'
                            ),


                        )
                    ),

                    array(
                        'label' => 'Heroes',
                        'id' => 'ut_heroes_typography_settings',
                        'def_section' => 'ut_front_hero_font_style_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Heroes',
                                'id' => 'ut_front_hero_font_style_settings'
                            ),
                            array(
                                'label' => 'Highlighted Heroes',
                                'id' => 'ut_split_hero_font_style_settings'
                            ),
                            array(
                                'label' => 'Heroes Responsive',
                                'id' => 'ut_front_hero_font_responsive_settings'
                            ),                        
                            array(
                                'label' => 'Blog Hero',
                                'id' => 'ut_blog_font_style_settings'
                            ),


                        )
                    ),

                    array(
                        'label' => 'Pages',
                        'id' => 'ut_pages_typography_settings',
                        'def_section' => 'ut_global_page_title_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Page Titles',
                                'id' => 'ut_global_page_title_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Sections',
                        'id' => 'ut_sections_typography_settings',
                        'def_section' => 'ut_global_header_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Section Titles',
                                'id' => 'ut_global_header_settings'
                            ),

                            array(
                                'label' => 'Section Leads',
                                'id' => 'ut_global_lead_settings'
                            ),

                        )
                    ),
        
                    array(
                        'label' => 'Contact Section',
                        'id' => 'ut_csection_typography_settings',
                        'def_section' => 'ut_global_csection_header_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Section Titles',
                                'id' => 'ut_global_csection_header_settings'
                            ),

                            array(
                                'label' => 'Section Leads',
                                'id' => 'ut_global_csection_lead_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Portfolio',
                        'id' => 'ut_sections_typography_settings',
                        'def_section' => 'ut_global_portfolio_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Portfolio Showcase',
                                'id' => 'ut_global_portfolio_settings'
                            ),

                        )
                    ),

                )

            ),

            array(
                'id' => 'ut_global_hero_settings',
                'title' => 'Hero Settings',
                'icon' => 'hero-icon.png',
                'def_section' => 'ut_global_hero_caption_settings',
                'subsections' => array(

                    array(
                        'label' => 'Global Hero Styling',
                        'id' => 'ut_global_hero_styling_settings',
                        'def_section' => 'ut_global_hero_caption_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Caption',
                                'id' => 'ut_global_hero_caption_settings'
                            ),
                            array(
                                'label' => 'Background',
                                'id' => 'ut_global_hero_background_settings'
                            ),
                            array(
                                'label' => 'Overlay',
                                'id' => 'ut_global_hero_overlay_settings'
                            ),
                            array(
                                'label' => 'Border',
                                'id' => 'ut_global_hero_border_settings'
                            ),

                        )
                    ),

                    array(
                        'label' => 'Global Hero Type',
                        'id' => 'ut_global_hero_type_settings'
                    )

                )

            ),

            array(
                'id' => 'ut_blog_settings',
                'title' => 'Blog',
                'icon' => 'blog-icon.png',
                'def_section' => 'ut_blog_layout_setting',
                'subsections' => array(

                    array(
                        'label' => 'Blog Layout',
                        'id' => 'ut_blog_layout_setting'
                    ),
        
                    array(
                        'label' => 'Blog Colors',
                        'id' => 'ut_blog_color_setting'
                    ),

                    array(
                        'label' => 'Single Posts',
                        'id' => 'ut_single_posts_setting'
                    ),

                    array(
                        'label' => 'Sidebar Setting',
                        'id' => 'ut_blog_sidebar_setting'
                    ),

                    array(
                        'label' => 'Pagination',
                        'id' => 'ut_blog_pagination_setting'
                    ),

                )

            ),

            array(
                'id' => 'ut_portfolio_settings',
                'title' => 'Portfolio',
                'icon' => 'portfolio-icon.png',
                'def_section' => 'ut_portfolio_single_settings',
                'subsections' => array(

                    array(
                        'label' => 'Single Portfolio',
                        'id' => 'ut_portfolio_single_settings'
                    ),

                    array(
                        'label' => 'Showcase',
                        'id' => 'ut_portfolio_showcase_setting'
                    ),

                )

            ),

            array(
                'id' => 'ut_advanced_settings',
                'title' => 'Advanced',
                'icon' => 'advanced-icon.png',
                'def_section' => 'ut_csection_content_settings',
                'subsections' => array(

                    array(
                        'label' => 'Contact Section Content',
                        'id' => 'ut_csection_content_settings'
                    ),

                    array(
                        'label' => 'Contact Section Styling',
                        'id' => 'ut_csection_styling_setting',
                        'def_section' => 'ut_csection_color_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Colors',
                                'id' => 'ut_csection_color_settings'
                            ),
                            array(
                                'label' => 'Background',
                                'id' => 'ut_csection_background_settings'
                            ),
                            array(
                                'label' => 'Overlay',
                                'id' => 'ut_csection_overlay_settings'
                            ),
                            array(
                                'label' => 'Border',
                                'id' => 'ut_csection_border_settings'
                            ),
                            array(
                                'label' => 'Spacing',
                                'id' => 'ut_csection_spacing_settings'
                            ),
        
                        ),

                    ),

                    array(
                        'label' => 'Maintenance Mode',
                        'id' => 'ut_maintenace_mode_settings'
                    ),

                    array(
                        'label' => 'Section Animation',
                        'id' => 'ut_sanimation_settings'
                    ),

                    array(
                        'label' => 'Manage Preloader',
                        'id' => 'ut_loader_settings'
                    ),

                    array(
                        'label' => 'System Pages',
                        'id' => 'ut_system_page_settings',
                        'def_section' => 'ut_system_page_archive_settings',
                        'subsections' => array(

                            array(
                                'label' => 'Archive',
                                'id' => 'ut_system_page_archive_settings'
                            ),

                            array(
                                'label' => 'Search',
                                'id' => 'ut_system_page_search_settings'
                            ),

                            array(
                                'label' => '404',
                                'id' => 'ut_system_page_404_settings'
                            ),

                        )

                    ),

                    array(
                        'label' => 'Custom CSS',
                        'id' => 'ut_custom_css_settings'
                    ),

                    array(
                        'label' => 'SEO',
                        'id' => 'ut_seo_settings',
                    ),

                    /*array(
                        'label'     => 'Page Cache',
                        'id'        => 'ut_cache_settings'
                    ),*/

                    array(
                        'label' => 'Lightbox Settings',
                        'id' => 'ut_lightbox_settings'
                    ),

                    array(
                        'label' => 'Content Spacing Settings',
                        'id' => 'ut_content_spacing_settings'
                    ),
                
                    array(
                        'label' => 'Mailchimp Colors',
                        'id' => 'ut_mailchimp_settings'
                    ),
        

                )

            )

            /* end sections */

        ),

        'settings' => array(

            /*
            |--------------------------------------------------------------------------
            | Sub Section Logo and Themecolor
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_site_layout_panel_headline',
                'label' => 'Site Mode',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_site_layout_settings'
            ),

            array(
                'id' => 'ut_site_layout',
                'label' => 'Site Mode',
                'desc' => 'Decide if you like to use Brooklyn as a One Pager or as a Multisite. You might ask yourself, what is the mayor difference between those 2 styles? To keep it short and simple. The Onepager front page is seperated in sections and each section is a single page inside your WordPress installation. We recommend to use this option with cause. If you have used the demo installer, the installer decides which option is necessary.<br /><strong>Use this option with cause!</strong>',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_site_layout_settings',
                'std' => 'onepage',
                'markup' => '1_1',
                'choices' => array(
                    array(
                        'value' => 'onepage',
                        'label' => 'One Pager'
                    ),
                    array(
                        'value' => 'multisite',
                        'label' => 'Multisite'
                    )
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Section Logo and Themecolor
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_customize_panel_headline',
                'label' => 'Logo & Accent and Link Color',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings'
            ),

            array(
                'id' => 'ut_accentcolor',
                'label' => 'Accent Color',
                'desc' => 'Set your desired primary theme accent color. Keep in mind, that you can easily define own colors for each page or section by using the "Color Settings" tab beneath the WordPress Editor. You can also add a custom CSS class to each page or section by using the class field.',
                'type' => 'colorpicker_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_linkcolor',
                'label' => 'Link Color',
                'desc' => 'Set your primary link color for post or page content. All other link colors, be it sidebar, footer or main navigation can be adjusted in their particular theme options panel.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
        
            array(
                'id' => 'ut_linkcolor_hover',
                'label' => 'Link Hover Color',
                'desc' => 'Set your primary link hover color for post or page content. All other link colors, be it sidebar, footer or main navigation can be adjusted in their particular theme options panel. Accent Color is the default color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),
        
            array(
                'id' => 'ut_link_decoration',
                'label' => 'Link Decoration',
                'desc' => 'The text-decoration property specifies the decoration added to text.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'std' => 'none',
                'choices' => array(
                    array(
                        'value' => 'none',
                        'label' => 'none'
                    ),
                    array(
                        'value' => 'underline',
                        'label' => 'underline'
                    )

                )

            ),
            
            array(
                'id' => 'ut_link_weight',
                'label' => 'Link Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
                'std' => 'normal',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
                    )

                )

            ),
        
            array(
                'id' => 'ut_site_logo_max_height',
                'label' => 'Logo Max Height',
                'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>',
                'type' => 'numeric_slider',
                'std' => '60',
                'min_max_step' => '0,120,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo',
                'label' => 'Main Logo',
                'desc' => 'The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_alt',
                'label' => 'Alternate Logo',
                'desc' => 'Upload an alternate Logo. Should be the same size as your Main Logo. This Logo will be used if 2 different navigations skins are available on the site. Example: The navigation switches from primary to secondary skin when reaching the main content.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_retina',
                'label' => 'Retina Main Logo',
                'desc' => 'Upload a retina ready Main Logo. Simply double the size of your Main Logo.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            array(
                'id' => 'ut_site_logo_alt_retina',
                'label' => 'Retina Alternate Logo',
                'desc' => 'Upload an alternate retina Logo. Should be the same size as your Retina Main Logo.',
                'type' => 'upload_customizer',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_customize_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Section Touch Icons
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_touch_setting_headline',
                'label' => 'Apple Touch Icons',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_favicon',
                'label' => 'Favicon',
                'desc' => 'The dimension for the image must be 16x16 pixels or 32x32 pixels, using either 8-bit or 24-bit colors and the format must be one of PNG (a W3C standard), GIF, or ICO.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_iphone',
                'label' => 'Apple Touch Icon IPhone',
                'desc' => '57x57 pixel for iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_ipad',
                'label' => 'Apple Touch Icon IPad',
                'desc' => '72 x 72 pixel for IPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_iphone_retina',
                'label' => 'Apple Touch Icon IPhone (Retina)',
                'desc' => '114 x 114 pixel for high-resolution iPhone and iPod touch. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            array(
                'id' => 'ut_apple_touch_icon_ipad_retina',
                'label' => 'Apple Touch Icon IPad (Retina)',
                'desc' => '144 x 144 pixel for high-resolution iPad. <br /> <strong>Recommended format must be one of PNG, GIF, or JPG</strong>.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_touch_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Border Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_border_setting_headline',
                'label' => 'Site Frame',
                'desc' => 'This is your global setting. You can individually change this per page as well.',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
            ),

            array(
                'id' => 'ut_site_border',
                'label' => 'Display Site Frame?',
                'desc' => 'A frame which embeds your entire site.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => 'Show'
                    ),
                    array(
                        'value' => 'hide',
                        'label' => 'Hide'
                    )

                )

            ),
            
            array(
                'id' => 'ut_site_border_status',
                'label' => 'Frame Settings',
                'desc' => 'You can optionally deactivate parts of the frame for design purposes.',
                'type' => 'frame',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => '#FFFFFF',
                'required' => array(
                    'ut_site_border' => 'show'
                )
            ),
        
            array(
                'id' => 'ut_site_border_color',
                'label' => 'Frame Color',
                'desc' => 'Set your desired Site Frame Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
                'std' => '#FFFFFF',
            ),

            array(
                'id' => 'ut_site_border_body_color',
                'label' => 'Body Background Color',
                'desc' => 'Set your desired Body Background Color. We recommend to use the same color as your Site Frame Color or a complementary one.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_border_settings',
            ),
            
            /*
            |--------------------------------------------------------------------------
            | Top Header Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_top_header_setting_headline',
                'label' => 'Top Header',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header',
                'label' => 'Display Top Header?',
                'desc' => 'The Top Header will be placed above header and navigation and contains additional elements like phone number, email address and social profile links. You can individually turn it on and off per page.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'show',
                        'label' => 'Show'
                    ),
                    array(
                        'value' => 'hide',
                        'label' => 'Hide'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_top_header_width',
                'label' => 'Top Header Width',
                'desc' => 'It handles centering the content within the top header. Centered content has a max width of 1200px and fullwidth content 100%.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'fullwidth',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'Centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'Fullwidth'
                    )
                ),

            ),
        
            array(
                'id' => 'ut_top_header_font_size',
                'label' => 'Top Header Font Size',
                'desc' => 'Select desired font size preset.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => 'hide',
                'choices' => array(
                    array(
                        'value' => 'small',
                        'label' => 'small'
                    ),
                    array(
                        'value' => 'big',
                        'label' => 'big'
                    )
                ),
            ),

            array(
                'id' => 'ut_top_header_email',
                'label' => 'Email',
                'desc' => 'Please enter your company email.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_phone',
                'label' => 'Phone',
                'desc' => 'Please enter your company phone number.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => array(
                            array(
                                'value' => 'fa-adn',
                                'label' => 'Alpha'
                            ),
                            array(
                                'value' => 'fa-behance',
                                'label' => 'Behance'
                            ),
                            array(
                                'value' => 'fa-bitbucket',
                                'label' => 'Bitbucket'
                            ),
                            array(
                                'value' => 'fa-codepen',
                                'label' => 'Codepen'
                            ),
                            array(
                                'value' => 'fa-delicious',
                                'label' => 'Delicious'
                            ),
                            array(
                                'value' => 'fa-deviantart',
                                'label' => 'Deviantart'
                            ),
                            array(
                                'value' => 'fa-digg',
                                'label' => 'Digg'
                            ),
                            array(
                                'value' => 'fa-dribbble',
                                'label' => 'Dribbble'
                            ),
                            array(
                                'value' => 'fa-dropbox',
                                'label' => 'Dropbox'
                            ),
                            array(
                                'value' => 'fa-facebook',
                                'label' => 'Facebook'
                            ),
                            array(
                                'value' => 'fa-flickr',
                                'label' => 'Flickr'
                            ),
                            array(
                                'value' => 'fa-foursquare',
                                'label' => 'Foursquare'
                            ),
                            array(
                                'value' => 'fa-github',
                                'label' => 'Github'
                            ),
                            array(
                                'value' => 'fa-gittip',
                                'label' => 'Gittip'
                            ),
                            array(
                                'value' => 'fa-google-plus',
                                'label' => 'Google Plus'
                            ),
                            array(
                                'value' => 'fa-instagram',
                                'label' => 'Instagram'
                            ),
                            array(
                                'value' => 'fa-jsfiddle',
                                'label' => 'JSFiddle'
                            ),
                            array(
                                'value' => 'fa-linkedin',
                                'label' => 'LinkedIn'
                            ),
                            array(
                                'value' => 'fa-reddit',
                                'label' => 'Reddit'
                            ),
                            array(
                                'value' => 'fa-pinterest',
                                'label' => 'Pinterest'
                            ),
                            array(
                                'value' => 'fa-skype',
                                'label' => 'Skype'
                            ),
                            array(
                                'value' => 'fa-soundcloud',
                                'label' => 'Soundcloud'
                            ),
                            array(
                                'value' => 'fa-snapchat',
                                'label' => 'Snapchat'
                            ),
                            array(
                                'value' => 'fa-tumblr',
                                'label' => 'Tumblr'
                            ),
                            array(
                                'value' => 'fa-twitter',
                                'label' => 'Twitter'
                            ),
                            array(
                                'value' => 'fa-vimeo-square',
                                'label' => 'Vimeo'
                            ),
                            array(
                                'value' => 'fa-vk',
                                'label' => 'VK'
                            ),
                            array(
                                'value' => 'fa-xing',
                                'label' => 'Xing'
                            ),
                            array(
                                'value' => 'fa-youtube',
                                'label' => 'Youtube'
                            ),
                            array(
                                'value' => 'fa-spotify',
                                'label' => 'Spotify'
                            ),

                        ),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
            ),

            array(
                'id' => 'ut_top_header_color_setting_headline',
                'label' => 'Color Settings',
                'desc' => 'Color Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_background_color',
                'label' => 'Top Header Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => '',
            ),

            array(
                'id' => 'ut_top_header_text_color',
                'label' => 'Top Header Text Color',
                'desc' => 'Color for regular Text.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => '#888',
            ),

            array(
                'id' => 'ut_top_header_icon_color',
                'label' => 'Top Header Icon Color',
                'desc' => 'Color for Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => '#888',
            ),

            array(
                'id' => 'ut_top_header_link_color',
                'label' => 'Top Header Link Color',
                'desc' => 'Color for Links.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => '#888',
            ),

            array(
                'id' => 'ut_top_header_link_color_hover',
                'label' => 'Top Header Link Color Hover',
                'desc' => 'Color for Links on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
            ),

            array(
                'id' => 'ut_top_header_social_icon_color',
                'label' => 'Top Header Social Icon Color',
                'desc' => 'Color for Social Icons.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => '#888',
            ),

            array(
                'id' => 'ut_top_header_social_icon_color_hover',
                'label' => 'Top Header Social Icon Color Hover',
                'desc' => 'Color for Social Icons on hover.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_top_header_settings',
                'std' => get_option( 'ut_accentcolor', '#F1C40F' ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Header and Navigation Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_navigation_setting_headline',
                'label' => 'Header and Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
            ),

            array(
                'id' => 'ut_navigation_setting_Info',
                'label' => 'Navigation',
                'desc' => 'These are your global Header and Navigation settings for the entire site.',
                'type' => 'section_headline_info',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
            ),

            array(
                'id' => 'ut_header_layout',
                'label' => 'Header Position',
                'desc' => 'Select your desired Header and Navigation Position.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
                'choices' => array(

                    array(
                        'value' => 'default',
                        'label' => 'Top'
                    ),
                    array(
                        'value' => 'side',
                        'label' => 'Side'
                    )

                ),                

            ),
            
        
            /*
            array(
                'id' => 'ut_header_top_layout',
                'label' => 'Header Layout',
                'desc' => 'Select your desired Header and Navigation Layout.',
                'type' => 'radio_image',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
                'markup' => '1_1',
                'choices' => array(
                        
                    array(
                        'value' => 'default',
                        'src' => 'header-01.svg',
                        'label' => 'Logo Left - Navigation Right'
                    ),

                    /*array(
                        'value' => 'style-2',
                        'src' => 'header-02.svg',
                        'label' => 'Logo Right - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-3',
                        'src' => 'header-03.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/
                    
                    /*array(
                        'value' => 'style-4',
                        'src' => 'header-04.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),
                
                    array(
                        'value' => 'style-5',
                        'src' => 'header-05.svg',
                        'label' => 'Logo Centered - Navigation Below'
                    ), */

                    /*array(
                        'value' => 'style-6',
                        'src' => 'header-06.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-7',
                        'src' => 'header-07.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-8',
                        'src' => 'header-08.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-9',
                        'src' => 'header-09.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-10',
                        'src' => 'header-12.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/

                    /*array(
                        'value' => 'style-11',
                        'src' => 'header-13.svg',
                        'label' => 'Logo Left - Navigation Left'
                    ),*/
        
                    /*array(
                        'value' => 'style-12',
                        'src'   => 'header-13.svg',
                        'label' => 'Only Hamburger'
                    ),

                ),
                'required' => array(
                    'ut_header_layout' => 'default'
                )

            ), */
        
        
        
        
            /**
             * Vertical Side Navigation Options 
             */

            array(
                'id' => 'ut_side_header_align',
                'label' => 'Header and Navigation Align',
                'desc' => 'Decide if header and navigation are located on the left or right side.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'left',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => 'left'
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'right'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),
            
            array(
                'id' => 'ut_side_header_width_type',
                'label' => 'Header and Navigation Width',
                'desc' => 'Decide if you like to use a fixed side navigation width or a dynamic.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'dynamic',
                'choices' => array(
                    array(
                        'value' => 'fixed',
                        'label' => 'Fixed Width (275px)'
                    ),
                    array(
                        'value' => 'dynamic',
                        'label' => 'Dynamic Width'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),
        
            array(
                'id' => 'ut_side_header_width',
                'label' => 'Header and Navigation Dynamic Width',
                'desc' => 'Drag the handle to set the width. <br /><strong>Maximum value is: 50</strong>',
                'type' => 'numeric_slider',
                'std' => '25',
                'min_max_step' => '25,50,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_header_width_type' => 'dynamic'
                )
            ),


            array(
                'id' => 'ut_site_logo_max_width',
                'label' => 'Logo Max Width',
                'desc' => 'Use an alternate Logo max width. Note: This Option affects all logos. <br /><strong>Maximum value is: 100!</strong>',
                'type' => 'numeric_slider',
                'std' => '100',
                'min_max_step' => '0,100,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form',
                'label' => 'Display Search Form?',
                'desc' => 'An optional search form beneath the navigation.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'Yes'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'No'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_copyright',
                'label' => 'Copyright',
                'desc' => 'An optional copyright information.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_copyright_color',
                'label' => 'Copyright Color',
                'desc' => 'Desired color for copyright information.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_header_activate_social_icons',
                'label' => 'Display Social Icons?',
                'desc' => 'An optional set of social icons.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'Yes'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'No'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),


            array(
                'id' => 'ut_side_header_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => array(
                            array(
                                'value' => 'fa-adn',
                                'label' => 'Alpha'
                            ),
                            array(
                                'value' => 'fa-behance',
                                'label' => 'Behance'
                            ),
                            array(
                                'value' => 'fa-bitbucket',
                                'label' => 'Bitbucket'
                            ),
                            array(
                                'value' => 'fa-codepen',
                                'label' => 'Codepen'
                            ),
                            array(
                                'value' => 'fa-delicious',
                                'label' => 'Delicious'
                            ),
                            array(
                                'value' => 'fa-deviantart',
                                'label' => 'Deviantart'
                            ),
                            array(
                                'value' => 'fa-digg',
                                'label' => 'Digg'
                            ),
                            array(
                                'value' => 'fa-dribbble',
                                'label' => 'Dribbble'
                            ),
                            array(
                                'value' => 'fa-dropbox',
                                'label' => 'Dropbox'
                            ),
                            array(
                                'value' => 'fa-facebook',
                                'label' => 'Facebook'
                            ),
                            array(
                                'value' => 'fa-flickr',
                                'label' => 'Flickr'
                            ),
                            array(
                                'value' => 'fa-foursquare',
                                'label' => 'Foursquare'
                            ),
                            array(
                                'value' => 'fa-github',
                                'label' => 'Github'
                            ),
                            array(
                                'value' => 'fa-gittip',
                                'label' => 'Gittip'
                            ),
                            array(
                                'value' => 'fa-google-plus',
                                'label' => 'Google Plus'
                            ),
                            array(
                                'value' => 'fa-instagram',
                                'label' => 'Instagram'
                            ),
                            array(
                                'value' => 'fa-jsfiddle',
                                'label' => 'JSFiddle'
                            ),
                            array(
                                'value' => 'fa-linkedin',
                                'label' => 'LinkedIn'
                            ),
                            array(
                                'value' => 'fa-reddit',
                                'label' => 'Reddit'
                            ),
                            array(
                                'value' => 'fa-pinterest',
                                'label' => 'Pinterest'
                            ),
                            array(
                                'value' => 'fa-skype',
                                'label' => 'Skype'
                            ),
                            array(
                                'value' => 'fa-soundcloud',
                                'label' => 'Soundcloud'
                            ),
                            array(
                                'value' => 'fa-snapchat',
                                'label' => 'Snapchat'
                            ),
                            array(
                                'value' => 'fa-tumblr',
                                'label' => 'Tumblr'
                            ),
                            array(
                                'value' => 'fa-twitter',
                                'label' => 'Twitter'
                            ),
                            array(
                                'value' => 'fa-vimeo-square',
                                'label' => 'Vimeo'
                            ),
                            array(
                                'value' => 'fa-vk',
                                'label' => 'VK'
                            ),
                            array(
                                'value' => 'fa-xing',
                                'label' => 'Xing'
                            ),
                            array(
                                'value' => 'fa-youtube',
                                'label' => 'Youtube'
                            ),
                            array(
                                'value' => 'fa-spotify',
                                'label' => 'Spotify'
                            ),

                        ),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_header_activate_social_icons' => 'on'
                )
            ),

            array(
                'id' => 'ut_side_header_background_image',
                'label' => 'Header Background Image',
                'desc' => '',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side'
                )
            ),

            array(
                'id' => 'ut_side_navigation_shadow',
                'label' => 'Header Shadow',
                'desc' => 'Activate Header Shadow?',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side',
                )
            ),
        
            array(
                'id' => 'ut_side_navigation_border',
                'label' => 'Header Border',
                'desc' => 'Activate Header Border?',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'side',
                )
            ),
            
            array(
                'id' => 'ut_side_navigation_border_color',
                'label' => 'Header Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_side_navigation_border' => 'on',
                )
            ),
            

            /**
             * Horizontal Navigation Options 
             */
            
            array(
                'id' => 'ut_navigation_scroll_position',
                'label' => 'Header Scroll Behaviour',
                'desc' => 'Choose between a header always displaying fixed at top of your website or a header which is floating while scrolling. ',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'floating',
                'choices' => array(
                    array(
                        'value' => 'fixed',
                        'label' => 'Header Fixed'
                    ),
                    array(
                        'value' => 'floating',
                        'label' => 'Header Floating'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default'
                )
            ),       
        
            array(
                'id' => 'ut_navigation_width',
                'label' => 'Header Width',
                'desc' => 'It handles centering the content within the header. Centered content has a max width of 1200px and fullwidth content 100%.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'centered',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'Centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'Fullwidth'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_height',
                'label' => 'Header Height',
                'desc' => 'Drag the handle to set the header height. Default: 80.',
                'std' => '80',
                'type' => 'numeric-slider',
                'min_max_step' => '50,120,1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default'
                )
            ),
            
            array(
                'id' => 'ut_navigation_item_separator_style',
                'label' => 'Navigation Item Separator Style',
                'desc' => 'Separators are used as a divider between navigation items.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'default',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => 'Default (Dot)'
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                )
            ),

            array(
                'id' => 'ut_navigation_item_separator',
                'label' => 'Navigation Custom Item Separator',
                'desc' => 'Enter your desired custom separator. You can also leave this field empty if no separator is wished.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_item_separator_style' => 'custom',
                )
            ), 
        
            array(
                'id' => 'ut_site_navigation_flush',
                'label' => 'Activate Navigation Flush?',
                'desc' => 'only applies of Page Border is active and Header Width has been set to fullwidth.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'yes',
                        'label' => 'Yes'
                    ),
                    array(
                        'value' => 'no',
                        'label' => 'No'
                    )
                ),
                'required' => array(
                    'ut_site_border' => 'show',
                    'ut_navigation_width' => 'fullwidth',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_skin',
                'label' => 'Header Color Skin',
                'desc' => 'Brookyln provides 2 default color skins for your header and navigation. If these skins do not match your requirements simply use the custom option and individualize it to your needs.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'ut-header-light',
                'choices' => array(
                    array(
                        'value' => 'ut-header-dark',
                        'label' => 'Dark'
                    ),
                    array(
                        'value' => 'ut-header-light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'ut-header-custom',
                        'label' => 'Custom Skin'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default|side'
                )
            ),

            array(
                'id' => 'ut_navigation_darkskin_settings_headline',
                'label' => 'Dark Skin Settings',
                'desc' => 'Dark Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-dark',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_lightskin_settings_headline',
                'label' => 'Light Skin Settings',
                'desc' => 'Light Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-light',
                    'ut_header_layout' => 'default'
                )
            ),

            /* setting for both base skins */
            array(
                'id' => 'ut_navigation_state',
                'label' => 'Always show Header and Navigation?',
                'desc' => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'Show chosen skin on Hero and content.'
                    ),
                    array(
                        'value' => 'on_transparent',
                        'label' => 'Show transparent skin on Hero and switch to chosen skin on content.'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Hide Header on Hero and switch to show chosen skin on content.'
                    )
                ),
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-dark|ut-header-light',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_shadow',
                'label' => 'Header Shadow',
                'desc' => 'Activate Header Shadow?',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                    'ut_navigation_state' => 'on|off'
                )
            ),
        
            array(
                'id' => 'ut_navigation_border_bottom',
                'label' => 'Header Border Bottom',
                'desc' => 'Activate Header Border Bottom?',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light',
                    'ut_navigation_state' => 'on|off'
                )
            ),
        
            array(
                'id' => 'ut_navigation_transparent_border',
                'label' => 'Activate Navigation Border Bottom?',
                'desc' => 'A small decoration line.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                    'ut_navigation_state' => 'on_transparent'
                )
            ),

            array(
                'id' => 'ut_navigation_customskin_settings_headline',
                'label' => 'Custom Skin Settings',
                'desc' => 'Custom Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_header_layout' => 'default'
                )
            ),

            array(
                'id' => 'ut_navigation_customskin_state',
                'label' => 'Always show Header and Navigation?',
                'desc' => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to secondary skin on scroll!". The navigation will turn into the secondary skin when reaching the main content. There secondary skin settings will appear once you select this option."',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'on',
                'markup' => '1_1',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'Yes, with primary skin!'
                    ),
                    array(
                        'value' => 'on_switch',
                        'label' => 'Yes, but switch to secondary skin on scroll or hover!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'No, but switch to primary skin on scroll!'
                    )
                ),
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_header_layout' => 'default'
                )
            ),


            /* Primary Skin */
            array(
                'id' => 'ut_navigation_customskin_primary_settings_headline',
                'label' => 'Primary Skin Settings',
                'desc' => 'Primary Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off',
                    'ut_header_layout' => 'default'
                )
            ),
            array(
                'id' => 'ut_side_navigation_customskin_primary_settings_headline',
                'label' => 'Color Skin Settings',
                'desc' => 'Color Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off',
                    'ut_header_layout' => 'side'
                )
            ),


            array(
                'id' => 'ut_header_ps_text_logo_color',
                'label' => 'Text Logo Color',
                'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_text_logo_color_hover',
                'label' => 'Text Logo Color Hover',
                'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_subheadline_ps_header_colors',
                'label' => 'Header Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_background_color',
                'label' => 'Header Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_shadow_color',
                'label' => 'Header Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_header_ps_border_color',
                'label' => 'Header Border Bottom Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_subheadline_ps_fl_colors',
                'label' => 'Navigation First Level Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_color',
                'label' => 'Navigation First Level Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_color_hover',
                'label' => 'Navigation First Level Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_dot_color',
                'label' => 'Navigation First Level Dot Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_active_color',
                'label' => 'Navigation First Level Active Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_fl_arrow_color',
                'label' => 'Navigation First Level Arrow Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_subheadline_ps_sl_colors',
                'label' => 'Navigation Sub Menu Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_background_color',
                'label' => 'Navigation Sub Menu Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_color',
                'label' => 'Navigation Sub Menu Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_color_hover',
                'label' => 'Navigation Sub Menu Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_active_color',
                'label' => 'Navigation Sub Menu Active Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_arrow_color',
                'label' => 'Navigation Sub Menu Arrow Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_shadow_color',
                'label' => 'Navigation Sub Menu Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_sl_border_color',
                'label' => 'Navigation Sub Menu Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on|on_switch|off'
                )
            ),

            /* optional hover state */
            array(
                'id' => 'ut_subheadline_ps_hover_colors',
                'label' => 'Hover State Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_state',
                'label' => 'Add Hover State?',
                'desc' => 'Add a hover state if you mouseover the header.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'Yes'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'No'
                    )
                ),
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ps_background_color_hover',
                'label' => 'Header Background Color on Hover',
                'type' => 'colorpicker',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_border_color_hover',
                'label' => 'Header Border Color on Hover',
                'type' => 'colorpicker',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_header_ps_shadow_color_hover',
                'label' => 'Header Shadow Color on Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_color',
                'label' => 'Navigation First Level Link Color on Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            array(
                'id' => 'ut_navigation_ps_hover_fl_dot_color',
                'label' => 'Navigation First Level Dot Color on Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch',
                    'ut_navigation_ps_hover_state' => 'on'
                )
            ),

            /* Secondary Skin */
            array(
                'id' => 'ut_navigation_customskin_secondary_settings_headline',
                'label' => 'Secondary Skin Settings',
                'desc' => 'Secondary Skin Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_text_logo_color',
                'label' => 'Text Logo Color',
                'desc' => 'Only applies if no Main Logo has been uploaded and set.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )

            ),

            array(
                'id' => 'ut_header_ss_text_logo_color_hover',
                'label' => 'Text Logo Color Hover',
                'desc' => 'Only applies if no main logo has been uploaded and set. ',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_subheadline_ss_header_colors',
                'label' => 'Header Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_background_color',
                'label' => 'Header Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_shadow_color',
                'label' => 'Header Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_header_ss_border_color',
                'label' => 'Header Border Bottom Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_subheadline_ss_fl_colors',
                'label' => 'Navigation First Level Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_fl_color',
                'label' => 'Navigation First Level Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_fl_color_hover',
                'label' => 'Navigation First Level Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_fl_dot_color',
                'label' => 'Navigation First Level Dot Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_fl_active_color',
                'label' => 'Navigation First Level Active Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_subheadline_ss_sl_colors',
                'label' => 'Navigation Sub Menu Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_background_color',
                'label' => 'Navigation Sub Menu Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_color',
                'label' => 'Navigation Sub Menu Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_color_hover',
                'label' => 'Navigation Sub Menu Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_shadow_color',
                'label' => 'Navigation Sub Menu Shadow Color',
                'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),

            array(
                'id' => 'ut_navigation_ss_sl_border_color',
                'label' => 'Navigation Sub Menu Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'default',
                    'ut_navigation_skin' => 'ut-header-custom',
                    'ut_navigation_customskin_state' => 'on_switch'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Special Side Navigation Options 
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_subheadline_sh_form_colors',
                'label' => 'Search Form Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_icon_color',
                'label' => 'Search Form Icon Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_border_color',
                'label' => 'Search Form Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_placeholder_color',
                'label' => 'Search Form Placeholder Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_border_focus_color',
                'label' => 'Search Form Border Focus Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_search_form_placeholder_focus_color',
                'label' => 'Search Form Placeholder Focus Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_subheadline_sh_si_colors',
                'label' => 'Social Icons Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom',
                )
            ),

            array(
                'id' => 'ut_side_header_social_icon_color',
                'label' => 'Icon Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_social_icon_color_hover',
                'label' => 'Icon Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            array(
                'id' => 'ut_side_header_social_icons_border_color',
                'label' => 'Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                    'ut_navigation_skin' => 'ut-header-custom'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Mobile Navigation Configuration
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_mobile_navigation_setting_headline',
                'label' => 'Mobile Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_icon',
                'label' => 'Mobile Menu Open / Close Icon',
                'desc' => 'Select your desired mobile menu icon.',
                'type' => 'iconpicker',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_color',
                'label' => 'Mobile Menu Open / Close Button Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_trigger_color_hover',
                'label' => 'Mobile Menu Open / Close Button Hover and Active Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_background_color_closed',
                'label' => 'Background Color ( closed mobile nav )',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
                'required' => array(
                    'ut_header_layout' => 'side',
                )
            ),

            array(
                'id' => 'ut_mobile_navigation_background_color',
                'label' => 'Background Color ( opened mobile nav )',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_color',
                'label' => 'Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_color_hover',
                'label' => 'Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_dot_color',
                'label' => 'Dot Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_dot_color_hover',
                'label' => 'Dot Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_submenu_dot_color',
                'label' => 'Submenu Dot Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_submenu_dot_color_hover',
                'label' => 'Submenu Dot Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_background_color',
                'label' => 'Link Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_link_background_color_hover',
                'label' => 'Link Background Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),

            array(
                'id' => 'ut_mobile_navigation_border_color',
                'label' => 'Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_mobile_navigation_settings',
            ),
            
            /*
            |--------------------------------------------------------------------------
            | Overlay Navigation Configuration
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_global_overlay_navigation_setting_headline',
                'label' => 'Overlay Navigation',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_global_overlay_navigation',
                'label' => 'Activate Overlay Navigation (only)?',
                'desc' => 'A compact navigation covering your website on click. This navigation will replace the default navigation as well as the mobile navigation and currently only works for header with location top. We will add different combinations in the future.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'On',
                        'value' => 'on',
                    ),
                    array(
                        'label' => 'Off',
                        'value' => 'off',
                    )
                ),
            ),
            
            array(
                'id' => 'ut_global_overlay_content_width',
                'label' => 'Overlay Content Width?',
                'desc' => 'Centered content has a max width of 1200px and fullwidth 100%.',
                'type' => 'select',
                'std' => 'fullwidth',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'fullwidth'
                    )
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )    
            ), 
        
            array(
                'id' => 'ut_global_overlay_content_align',
                'label' => 'Overlay Content Horizontal Alignment',
                'desc' => 'Set your desired overlay content align.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'center',
                'choices' => array(
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                    array(
                        'label' => 'center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'right',
                        'value' => 'right'
                    ),
                    
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_content_vertical_align',
                'label' => 'Overlay Content Vertical Alignment',
                'desc' => 'Set your desired overlay content align.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'middle',
                'choices' => array(
                    array(
                        'label' => 'top',
                        'value' => 'top'
                    ),
                    array(
                        'label' => 'middle',
                        'value' => 'middle'
                    ),
                    array(
                        'label' => 'bottom',
                        'value' => 'bottom'
                    ),
                    
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
        
            ),
            
            array(
                'id' => 'ut_global_overlay_logo',
                'label' => 'Show Logo in Overlay?',
                'desc' => 'Decide if you like to display a logo, your site title or none of them.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    ),        
                    array(
                        'label' => 'Custom Logo',
                        'value' => 'custom'
                    ),
                    array(
                        'label' => 'Site Title',
                        'value' => 'text'
                    ),
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_overlay_logo',
                'label' => 'Overlay Logo',
                'desc' => 'The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_logo' => 'custom'
                )
            ),

            array(
                'id' => 'ut_overlay_logo_retina',
                'label' => 'Retina Overlay Logo',
                'desc' => 'Upload a retina ready Overlay Logo. Simply double the size of your Overlay Logo.',
                'type' => 'upload',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_logo' => 'custom'
                )    
            ),
        
            array(
                'id' => 'ut_global_overlay_link_animation',
                'label' => 'Activate Underline Animation Effect on Hover?',
                'desc' => 'A nice hover animation effect for navigation links.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    ),        
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),                    
                    
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
        
            ),
            
            array(
                'id' => 'ut_global_overlay_footer_reverse',
                'label' => 'Reverse Overlay Footer Boxes',
                'desc' => 'Using this option will swap the copyright area with your social icons area inside your footer.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    )
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
        
        
        
            array(
                'id' => 'ut_global_overlay_navigation_hamburger_headline',
                'label' => 'Hamburger Icon Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_hamburger_color',
                'label' => 'Hamburger Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_hover_opacity',
                'label' => 'Hamburger Hover Opacity',
                'desc' => 'Drag the handle to set the opacity value.',
                'type' => 'numeric-slider',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 30,
                'min_max_step' => '1,100,1',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_active_color',
                'label' => 'Hamburger Active Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_hamburger_line_width',
                'label' => 'Hamburger Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'std' => 2,
                'min_max_step' => '1,4,1',
                'required'   => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_colors_headline',
                'label' => 'Color Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),        
        
            array(
                'id' => 'ut_global_overlay_navigation_background_color',
                'label' => 'Overlay Navigation Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_logo_color',
                'label' => 'Overlay Site Title Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_logo' => 'text'
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_logo_color_hover',
                'label' => 'Overlay Site Title Color Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_logo' => 'text'
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_menu_color',
                'label' => 'Overlay Navigation Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_menu_color_hover',
                'label' => 'Overlay Navigation Link Color Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_underline_color',
                'label' => 'Overlay Navigation Underline Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_link_animation' => 'on'
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_submenu_color',
                'label' => 'Overlay Navigation Submenu Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_submenu_color_hover',
                'label' => 'Overlay Navigation Submenu Link Color Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_submenu_underline_color',
                'label' => 'Overlay Navigation Submenu Underline Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                    'ut_global_overlay_link_animation' => 'on'
                )
            ),
        
            array(
                'id' => 'ut_global_overlay_navigation_social_headline',
                'label' => 'Overlay Footer Social Icons',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),     
        
            array(
                'id' => 'ut_overlay_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Choose Social Icon',
                        'type' => 'select',
                        'class' => 'ut-select-setting-title',
                        'choices' => array(
                            array(
                                'value' => 'fa-adn',
                                'label' => 'Alpha'
                            ),
                            array(
                                'value' => 'fa-behance',
                                'label' => 'Behance'
                            ),
                            array(
                                'value' => 'fa-bitbucket',
                                'label' => 'Bitbucket'
                            ),
                            array(
                                'value' => 'fa-codepen',
                                'label' => 'Codepen'
                            ),
                            array(
                                'value' => 'fa-delicious',
                                'label' => 'Delicious'
                            ),
                            array(
                                'value' => 'fa-deviantart',
                                'label' => 'Deviantart'
                            ),
                            array(
                                'value' => 'fa-digg',
                                'label' => 'Digg'
                            ),
                            array(
                                'value' => 'fa-dribbble',
                                'label' => 'Dribbble'
                            ),
                            array(
                                'value' => 'fa-dropbox',
                                'label' => 'Dropbox'
                            ),
                            array(
                                'value' => 'fa-facebook',
                                'label' => 'Facebook'
                            ),
                            array(
                                'value' => 'fa-flickr',
                                'label' => 'Flickr'
                            ),
                            array(
                                'value' => 'fa-foursquare',
                                'label' => 'Foursquare'
                            ),
                            array(
                                'value' => 'fa-github',
                                'label' => 'Github'
                            ),
                            array(
                                'value' => 'fa-gittip',
                                'label' => 'Gittip'
                            ),
                            array(
                                'value' => 'fa-google-plus',
                                'label' => 'Google Plus'
                            ),
                            array(
                                'value' => 'fa-instagram',
                                'label' => 'Instagram'
                            ),
                            array(
                                'value' => 'fa-jsfiddle',
                                'label' => 'JSFiddle'
                            ),
                            array(
                                'value' => 'fa-linkedin',
                                'label' => 'LinkedIn'
                            ),
                            array(
                                'value' => 'fa-reddit',
                                'label' => 'Reddit'
                            ),
                            array(
                                'value' => 'fa-pinterest',
                                'label' => 'Pinterest'
                            ),
                            array(
                                'value' => 'fa-skype',
                                'label' => 'Skype'
                            ),
                            array(
                                'value' => 'fa-soundcloud',
                                'label' => 'Soundcloud'
                            ),
                            array(
                                'value' => 'fa-snapchat',
                                'label' => 'Snapchat'
                            ),
                            array(
                                'value' => 'fa-tumblr',
                                'label' => 'Tumblr'
                            ),
                            array(
                                'value' => 'fa-twitter',
                                'label' => 'Twitter'
                            ),
                            array(
                                'value' => 'fa-vimeo-square',
                                'label' => 'Vimeo'
                            ),
                            array(
                                'value' => 'fa-vk',
                                'label' => 'VK'
                            ),
                            array(
                                'value' => 'fa-xing',
                                'label' => 'Xing'
                            ),
                            array(
                                'value' => 'fa-youtube',
                                'label' => 'Youtube'
                            ),
                            array(
                                'value' => 'fa-spotify',
                                'label' => 'Spotify'
                            ),

                        ),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Enter Social Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                ),
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_overlay_social_icons_color',
                'label' => 'Social Icon Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_overlay_social_icons_color_hover',
                'label' => 'Social Icon Color Hover',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_copyright_headline',
                'label' => 'Overlay Footer Copyright',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_overlay_copyright',
                'label' => 'Copyright',
                'desc' => 'Add an additional copyright to the footer of this overlay.',
                'type' => 'text',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'rows' => '3',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_overlay_copyright_color',
                'label' => 'Copyright Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
            array(
                'id' => 'ut_overlay_copyright_font_style',
                'label' => 'Overlay Copyright Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_overlay_navigation_settings',
                'required' => array(
                    'ut_global_overlay_navigation' => 'on',
                )
            ),
        
        
        
        
        
        
        
        
        
            /*
            |--------------------------------------------------------------------------
            | Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_sidebar_colors_headline',
                'label' => 'Sidebar Colors',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_text_color',
                'label' => 'Sidebar Text Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_link_color',
                'label' => 'Sidebar Link Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_link_color_hover',
                'label' => 'Sidebar Link Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_icon_color',
                'label' => 'Sidebar Icons Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_icon_color_hover',
                'label' => 'Sidebar Icons Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_border_color',
                'label' => 'Sidebar Border Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_border_color_hover',
                'label' => 'Sidebar Border Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_global_sidebar_settings',
            ),

            /*
            |--------------------------------------------------------------------------
            | Footer
            |--------------------------------------------------------------------------
            */
            
            array(
                'id' => 'ut_footer_setting_headline',
                'label' => 'Footer Settings',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
            ),
            
            array(
                'id' => 'ut_footerarea',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
                'label' => 'Show Footer Area?',
                'desc' => 'Can also be individualized for each page.',
                'type' => 'select',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_footerarea_width',
                'label' => 'Make Footer Area Full Width?',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_area_settings',
                'desc' => 'It handles centering the content within the footer. Centered content has a max width of 1200px and fullwidth content 100%. Can also be individualized for each page.',
                'type' => 'select',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),               
        
            ),
        
            array(
                'id' => 'ut_footer_colors_setting_headline',
                'label' => 'Footer Colors',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
            ),

            array(
                'id' => 'ut_footer_skin',
                'label' => 'Footer Colors',
                'desc' => 'This option is deprecated and is only maintained due to compatibility reasons for older Brooklyn Versions. Please use the color options below.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'std' => 'ut-footer-light',
                'choices' => array(
                    array(
                        'value' => 'ut-footer-dark',
                        'label' => 'Dark'
                    ),
                    array(
                        'value' => 'ut-footer-light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'ut-footer-custom',
                        'label' => 'Custom Skin'
                    )
                )
            ),
            
            /*array(
                'id' => 'ut_footer_skin_background_image',
                'label' => 'Footer Background Image',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors'
            ),
        
            array(
                'id' => 'ut_footer_skin_overlay',
                'label' => 'Activate Footer Overlay?',
                'desc' => 'Covers your footer with an optional color.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) 
            ),

            array(
                'id' => 'ut_footer_skin_overlay_color',
                'label' => 'Footer Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_footer_skin_color_opacity',
                'label' => 'Footer Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for footer overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'min_max_step' => '0,1,0.1',
                'required' => array(
                    'ut_footer_skin_overlay' => 'on'
                )
            ), */
        
        
        
        
        
        
        
            array(
                'id' => 'ut_footer_skin_dark_bgcolor',
                'label' => 'Footer Skin Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is dark, we recommend to use a dark color as well.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-dark'
                )
            ),

            array(
                'id' => 'ut_footer_skin_light_bgcolor',
                'label' => 'Footer Skin Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your footer, since the base skin is light, we recommend to use a bright color as well.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-light'
                )
            ),

            array(
                'id' => 'ut_footer_color_cs_settings_headline',
                'label' => 'Individual Footer Colors',
                'desc' => 'Custom Skin Footer Colors',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
            
            array(
                'id' => 'ut_footer_skin_border',
                'label' => 'Footer Top Border Color',
                'desc' => 'Once set, a thin border gets applied to the top of your footer.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
        
            array(
                'id' => 'ut_footer_skin_bgcolor',
                'label' => 'Footer Background Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
        
            array(
                'id' => 'ut_footer_widgets_text_color',
                'label' => 'Footer Text Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_link_color',
                'label' => 'Footer Link Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_link_color_hover',
                'label' => 'Footer Link Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_icon_color',
                'label' => 'Footer Icons Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_icon_color_hover',
                'label' => 'Footer Social Icons Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_border_color',
                'label' => 'Footer Border Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_border_color_hover',
                'label' => 'Footer Border Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
            
        
             array(
                'id' => 'ut_footer_button_headline',
                'label' => 'Button Settings',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
            ),
            
            array(
                'id' => 'ut_footer_button_border',
                'label' => 'Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
        
            array(
                'id' => 'ut_footer_button_text_color',
                'label' => 'Button Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
        
            array(
                'id' => 'ut_footer_button_color',
                'label' => 'Button Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
            
            array(
                'id' => 'ut_footer_button_text_color_hover',
                'label' => 'Button Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),
        
            array(
                'id' => 'ut_footer_button_color_hover',
                'label' => 'Button Background Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_footer_colors',
                'required' => array(
                    'ut_footer_skin' => 'ut-footer-custom'
                )
            ),

            /*
             * Scroll To Top Button 
             */

            array(
                'id' => 'ut_footer_scroll_up_settings_headline',
                'label' => 'Scroll Top Button',
                'desc' => 'Scroll Top Button',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
            ),

            array(
                'id' => 'ut_show_scroll_up_button',
                'label' => 'Scroll To Top Button',
                'desc' => 'Display "Scroll To Top" button? You can change the state of this button individually on each page. This "Back to top" link allows users to smoothly scroll back to the top of the page. Its a little detail which enhances navigation experience on website with long pages.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                )
            ),
            
            array(
                'id' => 'ut_show_scroll_up_button_conditional',        
                'label' => 'Hide Scroll Top Button Global',
                'desc' => 'You can overwrite this option individually per page.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'choices' => array(
                    /*array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    /*array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),*/
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    ),
                    /*array(
                        'value' => 'is_archive',
                        'label' => 'Archive'
                    ),
                    array(
                        'value' => 'ut_is_search',
                        'label' => 'Search'
                    ),
                    array(
                        'value' => 'is_404',
                        'label' => '404'
                    )*/
                ),
                
            ),
        
        
            array(
                'id' => 'ut_scroll_up_button_icon_color',
                'label' => 'Scroll To Top Icon Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_icon_color_hover',
                'label' => 'Scroll To Top Icon Hover Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_background_color',
                'label' => 'Scroll To Top Background Color',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_shadow',
                'label' => 'Display Scroll To Top Button Shadow?',
                'desc' => 'Add an additional shadow.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            array(
                'id' => 'ut_scroll_up_button_border_radius',
                'label' => 'Display Scroll To Top Button Border Radius?',
                'desc' => 'Add an additional radius.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_scroll_top',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_show_scroll_up_button' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Sub Footer
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_subfooter_setting_headline',
                'label' => 'Subfooter',
                'type' => 'panel_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
            
            array(
                'id' => 'ut_subfooterarea',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'label' => 'Show Subfooter Area?',
                'desc' => 'Can also be individualized for each page.',
                'type' => 'select',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_subfooter_style',
                'label' => 'Subfooter Style',
                'desc' => 'Select between 2 different subfooter styles.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'style-1',
                'choices' => array(
                    array(
                        'value' => 'style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style-2',
                        'label' => 'Style Two'
                    )
                ),
            ),
            
            array(
                'id' => 'ut_subfooter_style_reverse',
                'label' => 'Reverse Subfooter Boxes',
                'desc' => 'Using this option will swap the slogan area with your social icons area inside your subfooter.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'no',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'yes',
                        'label' => 'yes, please!'
                    )
                ),
                'required' => array(
                    'ut_subfooter_style' => 'style-2'
                )
            ),
            
        
        
            array(
                'id' => 'ut_subfooter_padding_top',
                'label' => 'Subfooter Spacing Top',
                'desc' => '<strong>(optional)</strong> - value in pixel e.g. 10px. Default: 0px. If <strong>Subfooter Background Color</strong> has been set, default is: 20px.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_site_copyright',
                'label' => 'Slogan',
                'desc' => 'Add an additional slogan to the footer of this theme.',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'rows' => '3'
            ),

            array(
                'id' => 'ut_subfooter_font_weight',
                'label' => 'Copyright Font Weight',
                'desc' => 'Font weight for copyright.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'normal',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
            ),
            
            array(
                'id' => 'ut_subfooter_link_font_weight',
                'label' => 'Copyright Link Font Weight',
                'desc' => 'Font weight for links in copyright.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'Normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_subfooter_font_style',
                'label' => 'Copyright Font Size',
                'desc' => 'Font size for copyright.',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'type' => 'typography',
                //'markup'      => '1_1',
            ),

            array(
                'id' => 'ut_footer_social_icons',
                'label' => 'Social Icons',
                'desc' => 'Add your desired social profile icon and links. <br /><strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'settings' => array(
                    array(
                        'id' => 'icon',
                        'label' => 'Icon',
                        'class' => 'ut-select-setting-title',
                        'type' => 'select',
                        'choices' => array(
                            array(
                                'value' => 'fa-adn',
                                'label' => 'Alpha'
                            ),
                            array(
                                'value' => 'fa-behance',
                                'label' => 'Behance'
                            ),
                            array(
                                'value' => 'fa-bitbucket',
                                'label' => 'Bitbucket'
                            ),
                            array(
                                'value' => 'fa-codepen',
                                'label' => 'Codepen'
                            ),
                            array(
                                'value' => 'fa-delicious',
                                'label' => 'Delicious'
                            ),
                            array(
                                'value' => 'fa-deviantart',
                                'label' => 'Deviantart'
                            ),
                            array(
                                'value' => 'fa-digg',
                                'label' => 'Digg'
                            ),
                            array(
                                'value' => 'fa-dribbble',
                                'label' => 'Dribbble'
                            ),
                            array(
                                'value' => 'fa-dropbox',
                                'label' => 'Dropbox'
                            ),
                            array(
                                'value' => 'fa-facebook',
                                'label' => 'Facebook'
                            ),
                            array(
                                'value' => 'fa-flickr',
                                'label' => 'Flickr'
                            ),
                            array(
                                'value' => 'fa-foursquare',
                                'label' => 'Foursquare'
                            ),
                            array(
                                'value' => 'fa-github',
                                'label' => 'Github'
                            ),
                            array(
                                'value' => 'fa-gittip',
                                'label' => 'Gittip'
                            ),
                            array(
                                'value' => 'fa-google-plus',
                                'label' => 'Google Plus'
                            ),
                            array(
                                'value' => 'fa-instagram',
                                'label' => 'Instagram'
                            ),
                            array(
                                'value' => 'fa-jsfiddle',
                                'label' => 'JSFiddle'
                            ),
                            array(
                                'value' => 'fa-linkedin',
                                'label' => 'LinkedIn'
                            ),
                            array(
                                'value' => 'fa-reddit',
                                'label' => 'Reddit'
                            ),
                            array(
                                'value' => 'fa-pinterest',
                                'label' => 'Pinterest'
                            ),
                            array(
                                'value' => 'fa-skype',
                                'label' => 'Skype'
                            ),
                            array(
                                'value' => 'fa-soundcloud',
                                'label' => 'Soundcloud'
                            ),
                            array(
                                'value' => 'fa-snapchat',
                                'label' => 'Snapchat'
                            ),
                            array(
                                'value' => 'fa-tumblr',
                                'label' => 'Tumblr'
                            ),
                            array(
                                'value' => 'fa-twitter',
                                'label' => 'Twitter'
                            ),
                            array(
                                'value' => 'fa-vimeo-square',
                                'label' => 'Vimeo'
                            ),
                            array(
                                'value' => 'fa-vk',
                                'label' => 'VK'
                            ),
                            array(
                                'value' => 'fa-xing',
                                'label' => 'Xing'
                            ),
                            array(
                                'value' => 'fa-youtube',
                                'label' => 'Youtube'
                            ),
                            array(
                                'value' => 'fa-spotify',
                                'label' => 'Spotify'
                            ),

                        ),

                    ),
                    array(
                        'id' => 'link',
                        'label' => 'Link',
                        'type' => 'text',
                        'rows' => '3'
                    )
                )

            ),

            array(
                'id' => 'ut_subfooter_color_setting_headline',
                'label' => 'Subfooter Colors',
                'desc' => 'Subfooter Colors',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
            
            array(
                'id' => 'ut_subfooter_border_top_color',
                'label' => 'Subfooter Border Top Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),        
        
            array(
                'id' => 'ut_subfooter_bgcolor',
                'label' => 'Subfooter Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternative background color for your subfooter.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_text_color',
                'label' => 'Subfooter Text Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_link_color',
                'label' => 'Subfooter Link Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_link_color_hover',
                'label' => 'Subfooter Link Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_icon_color',
                'label' => 'Subfooter Icon Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),

            array(
                'id' => 'ut_subfooter_headline_color',
                'label' => 'Subfooter Headline Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
            
            array(
                'id' => 'ut_subfooter_social_icon_color',
                'label' => 'Subfooter Social Icons Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
                    
            array(
                'id' => 'ut_subfooter_social_icon_color_hover',
                'label' => 'Subfooter Social Icons Hover Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
        
            array(
                'id' => 'ut_subfooter_copyright_setting_headline',
                'label' => 'Subfooter Copyright',
                'desc' => 'Subfooter Copyright',
                'type' => 'section_headline',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
            ),
        
            array(
                'id' => 'ut_subfooter_copyright',
                'label' => 'Overwrite Copyright?',
                'desc' => 'Keeping our copyright is highly appreciated, however if you like, you can change it to your needs. You can do this by using this option. However changing any source copyyrights is not permitted.',
                'type' => 'select',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),

                ),
            ),
            
            array(
                'id' => 'ut_subfooter_copyright_text',
                'label' => 'Copyright',
                'desc' => 'Enter your custom copyright.',
                'type' => 'text',
                'section' => 'ut_general_settings',
                'subsection' => 'ut_subfooter_settings',
                'required' => array(
                     'ut_subfooter_copyright' => 'on'   
                )
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Typography - Body
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_body_headline',
                'label' => 'Body Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
            ),

            array(
                'id' => 'ut_body_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_body_font_color',
                'label' => 'Body Font Color',
                'desc' => 'Main body font color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings'
            ),

            array(
                'id' => 'ut_google_body_font_style',
                'label' => 'Body Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'required' => array(
                    'ut_body_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_body_font_style',
                'label' => 'Body Font Style',
                'desc' => '<strong>(optional)</strong> - default regular. <a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
                'std' => 'regular',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_body_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_body_websafe_font_style',
                'label' => 'Body Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_body_settings',
                'required' => array(
                    'ut_body_font_type' => 'ut-websafe'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Navigation
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_header_headline',
                'label' => 'Header Text Logo Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),


            array(
                'id' => 'ut_global_header_text_logo_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_header_text_google_font_style',
                'label' => 'Header Text Logo Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_header_text_logo_websafe_font_style',
                'label' => 'Header Text Logo Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_header_text_logo_font_style',
                'label' => 'Header Text Logo Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_header_text_logo_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_navigation_headline',
                'label' => 'Navigation Font',
                'desc' => 'Navigation Font',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_navigation_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_navigation_google_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well.',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_navigation_websafe_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_navigation_font_style',
                'label' => 'Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_navigation_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_side_navigation_arrow_line_height',
                'label' => 'Side Navigation Arrow Line Height',
                'desc' => 'Only affects vertical navigation.',
                'type' => 'text',
                'desc' => 'Defines the amount of space above and below e.g. 1.4',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_navigation_submenu_font_style',
                'label' => 'Navigation Submenu Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),


            array(
                'id' => 'ut_global_mobile_navigation_headline',
                'label' => 'Mobile Navigation Font',
                'desc' => 'Mobile Navigation Font',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_mobile_navigation_font_style',
                'label' => 'Mobile Navigation Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),

            array(
                'id' => 'ut_global_mobile_navigation_sub_font_style',
                'label' => 'Mobile Navigation Submenu Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_navigation_menu_settings',
            ),
            
        
            /*
            |--------------------------------------------------------------------------
            | Typography - Overlay Navigation
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_overlay_navigation_headline',
                'label' => 'Overlay Navigation Font',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
            ),

            array(
                'id' => 'ut_overlay_navigation_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_google_overlay_navigation_style',
                'label' => 'Overlay Navigation Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_overlay_navigation_websafe_font_style',
                'label' => 'Overlay Navigation Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_overlay_navigation_font_style',
                'label' => 'Overlay Navigation Font Style',
                'desc' => 'Font Settings will be applied to mobile menu as well. <a href="#" class="ut-font-preview">Font Styles</a>',
                'type' => 'select',
                'std' => 'semibold',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_overlay_navigation_font_type' => 'ut-font'
                )
            ),
            
            array(
                'id' => 'ut_global_overlay_navigation_submenu_websafe_font_style',
                'label' => 'Overlay Navigation Submenu Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_overlay_navigation_settings'                
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Hero Front Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_front_hero_font_style_headline',
                'label' => 'Heroes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
            ),
            array(
                'id' => 'ut_front_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),
            array(
                'id' => 'ut_google_front_page_hero_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_front_page_hero_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_front_page_hero_websafe_font_style',
                'label' => 'Hero Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_hero_font_type' => 'ut-websafe'
                )
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description Top
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_front_catchphrase_top_font_style_headline',
                'label' => 'Hero Caption Slogan Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
            ),

            array(
                'id' => 'ut_front_catchphrase_top_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-websafe',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_google_front_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-font'
                )
            ),
        
            array(
                'id' => 'ut_front_catchphrase_top_websafe_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_catchphrase_top_font_type' => 'ut-websafe'
                )
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_front_catchphrase_font_style_headline',
                'label' => 'Hero Caption Description Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
            ),

            array(
                'id' => 'ut_front_catchphrase_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'std' => 'ut-websafe',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_google_front_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_front_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-font'
                )
            ),
        
            array(
                'id' => 'ut_front_catchphrase_websafe_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_style_settings',
                'required' => array(
                    'ut_front_catchphrase_font_type' => 'ut-websafe'
                )
            ),
            
            /*
            |--------------------------------------------------------------------------
            | Hero Responsive Settings    
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_front_page_hero_responsive_font_styles',
                'label' => 'Heroes Title Responsive Settings',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_responsive_settings',
            ),
        
            array(
                'id' => 'ut_front_page_hero_websafe_font_style_tablet',
                'label' => 'Heroes Title Font Setting Tablet',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_responsive_settings',
            ),
        
            array(
                'id' => 'ut_front_page_hero_websafe_font_style_mobile',
                'label' => 'Heroes Title Font Setting Mobile',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_front_hero_font_responsive_settings',
            ),
            
        
            /*
            |--------------------------------------------------------------------------
            | Split Hero Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_split_hero_font_style_headline',
                'label' => 'Highlighted Heroes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
            ),
            array(
                'id' => 'ut_split_hero_custom_font',
                'label' => 'Highlighted Hero Title Custom Font',
                'desc' => 'Do you want to use a custom font settings for your Highlighted Hero Title? If set to "no, thanks!" the theme will use the default Hero Font Face settings.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'std' => 'no',
                'choices' => array(
                    array(
                        'value' => 'no',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'yes',
                        'label' => 'yes, please!'
                    ),                    
                ),
            ),        
            array(
                'id' => 'ut_split_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes'
                )
            ),
            array(
                'id' => 'ut_google_split_hero_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-google'
                )
            ),
            array(
                'id' => 'ut_split_hero_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-font'
                )
            ),
            array(
                'id' => 'ut_split_hero_websafe_font_style',
                'label' => 'Hero Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_split_hero_font_style_settings',
                'required' => array(
                    'ut_split_hero_custom_font' => 'yes',
                    'ut_split_hero_font_type' => 'ut-websafe'
                )
            ),
        
        
            /*
            |--------------------------------------------------------------------------
            | Hero Blog Font Style
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_font_style_headline',
                'label' => 'Blog Hero Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
            ),

            array(
                'id' => 'ut_blog_hero_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_google_blog_hero_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_hero_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_blog_hero_websafe_font_style',
                'label' => 'Hero Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_hero_font_type' => 'ut-websafe'
                )
            ),
            
            
            /*
            |--------------------------------------------------------------------------
            | Hero Caption Description Top
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_blog_catchphrase_top_font_style_headline',
                'label' => 'Blog Hero Caption Slogan Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-websafe',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_google_blog_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_top_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-font'
                )
            ),
        
            array(
                'id' => 'ut_blog_catchphrase_top_websafe_font_style',
                'label' => 'Hero Caption Slogan Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_catchphrase_top_font_type' => 'ut-websafe'
                )
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Blog Hero Caption Description
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_blog_catchphrase_font_style_headline',
                'label' => 'Blog Hero Caption Description Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
            ),

            array(
                'id' => 'ut_blog_catchphrase_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'std' => 'ut-websafe',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_google_blog_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blog_catchphrase_font_style',
                'label' => 'Hero Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-font'
                )
            ),
        
            array(
                'id' => 'ut_blog_catchphrase_websafe_font_style',
                'label' => 'Hero Caption Description Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
                'required' => array(
                    'ut_blog_catchphrase_font_type' => 'ut-websafe'
                )
            ),
        
            
            array(
                'id' => 'ut_hero_post_meta_description_font_style_headline',
                'label' => 'Single Post Hero Meta Description Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
            ),
            
            array(
                'id' => 'ut_hero_post_meta_description_websafe_font_style',
                'label' => 'Single Post Hero Meta Description Font Setting',
                'desc' => 'Post Hero Meta contains Post Date, Categories and Author.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_blog_font_style_settings',
            ),
        
        
            /*
            |--------------------------------------------------------------------------
            | Global Content Widgets Font Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_content_widgets_headline',
                'label' => 'Content Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_content_widgets_settings',
            ),

            array(
                'id' => 'ut_global_content_widgets_websafe_font_style',
                'label' => 'Content Widgets Titles Font Size',
                'desc' => 'Font size for content widgets titles such as portfolio detail titles.',
                'type' => 'typography',
                //'markup'      => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_content_widgets_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Headline Font Styles
            |--------------------------------------------------------------------------
            */

            #H1 
            array(
                'id' => 'ut_global_htags_headline_h1',
                'label' => 'H1',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h1_font_type',
                'label' => 'Choose font source for H1 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h1_font_color',
                'label' => 'Content H1 Font Color',
                'desc' => '',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h1_google_font_style',
                'label' => 'Content H1 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h1_websafe_font_style',
                'label' => 'Content H1 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h1_font_style',
                'label' => 'Content H1 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h1_font_type' => 'ut-font'
                )
            ),

            #H2
            array(
                'id' => 'ut_global_htags_headline_h2',
                'label' => 'H2',
                'desc' => 'H2',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h2_font_type',
                'label' => 'Choose font source for H2 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h2_font_color',
                'label' => 'Content H2 Font Color',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h2_google_font_style',
                'label' => 'Content H2 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h2_websafe_font_style',
                'label' => 'Content H2 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h2_font_style',
                'label' => 'Content H2 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h2_font_type' => 'ut-font'
                )
            ),

            #H3
            array(
                'id' => 'ut_global_htags_headline_h3',
                'label' => 'H3',
                'desc' => 'H3',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h3_font_type',
                'label' => 'Choose font source for H3 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h3_font_color',
                'label' => 'Content H3 Font Color',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h3_google_font_style',
                'label' => 'Content H3 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h3_websafe_font_style',
                'label' => 'Content H3 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h3_font_style',
                'label' => 'Content H3 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h3_font_type' => 'ut-font'
                )
            ),


            #H4
            array(
                'id' => 'ut_global_htags_headline_h4',
                'label' => 'H4',
                'desc' => 'H4',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h4_font_type',
                'label' => 'Choose font source for H4 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h4_font_color',
                'label' => 'Content H4 Font Color',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h4_google_font_style',
                'label' => 'Content H4 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h4_websafe_font_style',
                'label' => 'Content H4 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h4_font_style',
                'label' => 'Content H4 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h4_font_type' => 'ut-font'
                )
            ),

            #H5
            array(
                'id' => 'ut_global_htags_headline_h5',
                'label' => 'H5',
                'desc' => 'H5',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h5_font_type',
                'label' => 'Choose font source for H5 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h5_font_color',
                'label' => 'Content H5 Font Color',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h5_google_font_style',
                'label' => 'Content H5 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h5_websafe_font_style',
                'label' => 'Content H5 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h5_font_style',
                'label' => 'Content H5 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h5_font_type' => 'ut-font'
                )
            ),

            #H6      
            array(
                'id' => 'ut_global_htags_headline_h6',
                'label' => 'H6',
                'desc' => 'H6',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
            ),

            array(
                'id' => 'ut_global_h6_font_type',
                'label' => 'Choose font source for H6 tags',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_h6_font_color',
                'label' => 'Content H6 Font Color',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings'
            ),

            array(
                'id' => 'ut_h6_google_font_style',
                'label' => 'Content H6 Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_h6_websafe_font_style',
                'label' => 'Content H6 Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_h6_font_style',
                'label' => 'Content H6 Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. <br /> This option will affect content headlines. <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_htags_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_h6_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Header Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_header_styles_headline',
                'label' => 'General Section Headlines',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
            ),

            array(
                'id' => 'ut_global_headline_style',
                'label' => 'General Section Headlines Style',
                'desc' => '<strong>(optional)</strong> - default "Style One". This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'choices' => array(

                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),

                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),

                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),

                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),

                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),

                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),

                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),
            
            /*array(
                'id' => 'ut_global_headline_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'std' => 'section',
                'choices' => array(
                    array(
                        'value' => 'section',
                        'label' => 'Decoration Line as Linetrough'
                    ),
                    array(
                        'value' => 'parallax',
                        'label' => 'Decoration Line above Title'
                    ),
                ),
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-1'
                )
            ),*/
        
        
            array(
                'id' => 'ut_global_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_global_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),
            
            array(
                'id' => 'ut_global_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-2'
                )
            ),
            
            array(
                'id' => 'ut_global_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'required' => array(
                    'ut_global_headline_style' => 'pt-style-4'
                )
            ),
        
        
            array(
                'id' => 'ut_global_headline_width',
                'label' => 'General Section Headlines Width',
                'desc' => 'Set your desired section headline width.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => '7/10 (center)',
                        'value' => 'seven'
                    ),
                    array(
                        'label' => '10/10 (fullwidth)',
                        'value' => 'ten'
                    )
                ),
                'std' => 'seven'
            ),

            array(
                'id' => 'ut_global_headline_align',
                'label' => 'General Section Headlines Text Alignment',
                'desc' => 'Set your desired section headline text align.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                ),
                'std' => 'center'
            ),

            array(
                'id' => 'ut_global_header_font_headline',
                'label' => 'General Section Headlines Font Face',
                'desc' => 'General Section Headlines Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
            ),

            array(
                'id' => 'ut_global_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_headline_font_color',
                'label' => 'General Section Headlines Font Color',
                'desc' => 'Set your desired headline font color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
            ),

            array(
                'id' => 'ut_global_google_headline_font_style',
                'label' => 'General Section Headlines Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_headline_font_style',
                'label' => 'General Section Headlines Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. This option will affect section and single page headers. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_headline_font_style_settings',
                'label' => 'General Section Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_headline_websafe_font_style_settings',
                'label' => 'General Section Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_header_settings',
                'required' => array(
                    'ut_global_headline_font_type' => 'ut-websafe'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Global Page Titles Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_page_header_styles_headline',
                'label' => 'General Page Title',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
            ),
            
            array(
                'id' => 'ut_display_section_header',
                'metapanel' => 'ut-page-header-settings',
                'label' => 'Show Page Title?',
                'desc' => 'A page title typically forms the first element inside a section or page. It\'s located right above the content and contains the page title as well as an optional lead slogan. This is your global option, means you can turn it on and off per page individually.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',    
                'std' => 'show',
                'choices' => array(
                    array(
                        'label' => 'Show',
                        'value' => 'show'
                    ),
                    array(
                        'label' => 'Hide',
                        'value' => 'hide'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_global_page_headline_style',
                'label' => 'General Page Title Style',
                'desc' => '<strong>(optional)</strong> - default "Style One". This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header style individually for each page!</strong> <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'choices' => array(
                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),
            
            /*array(
                'id' => 'ut_global_page_headline_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'std' => 'section',
                'choices' => array(
                    array(
                        'value' => 'section',
                        'label' => 'Decoration Line as Linetrough'
                    ),
                    array(
                        'value' => 'parallax',
                        'label' => 'Decoration Line above Title'
                    ),
                ),
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-1'
                )
            ),*/
        
        
            array(
                'id' => 'ut_global_page_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => 'Set your desired headline decoration line color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-2'
                )
            ),
            
            array(
                'id' => 'ut_global_page_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'required' => array(
                    'ut_global_page_headline_style' => 'pt-style-4'
                )
            ),
        
            array(
                'id' => 'ut_global_page_headline_width',
                'label' => 'General Page Title Width',
                'desc' => 'Set your desired page headline width.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => '7/10 (center)',
                        'value' => 'seven'
                    ),
                    array(
                        'label' => '10/10 (fullwidth)',
                        'value' => 'ten'
                    )
                ),
                'std' => 'seven'
            ),

            array(
                'id' => 'ut_global_page_headline_align',
                'label' => 'General Page Title Alignment',
                'desc' => 'Set your desired section headline text align.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'Center',
                        'value' => 'center'
                    ),
                    array(
                        'label' => 'Left',
                        'value' => 'left'
                    ),
                ),
                'std' => 'center'
            ),

            array(
                'id' => 'ut_global_page_header_font_headline',
                'label' => 'General Page Title Font Face',
                'desc' => 'General Section Headlines Font Face',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
            ),

            array(
                'id' => 'ut_global_page_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_page_headline_font_color',
                'label' => 'General Page Title Font Color',
                'desc' => 'Set your desired page title font color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
            ),

            array(
                'id' => 'ut_global_page_google_headline_font_style',
                'label' => 'General Page Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_font_style',
                'label' => 'General Page Title Font Style',
                'desc' => '<strong>(optional)</strong> - default semibold. This option will affect single page titles. <br /> <strong>Keep in mind: You can change the header font style individually for each page!</strong> <a href="#" class="ut-font-preview">Preview Font Style</a>',
                'std' => 'semibold',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extralight'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_websafe_font_style_settings',
                'label' => 'General Page Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_page_headline_font_style_settings',
                'label' => 'General Page Title Font Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_page_title_settings',
                'required' => array(
                    'ut_global_page_headline_font_type' => 'ut-font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Header Lead  Typography and Styles
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_lead_headline',
                'label' => 'General Section Leads',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
            ),

            array(
                'id' => 'ut_global_lead_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_lead_color',
                'label' => 'Global Section Lead Color',
                'desc' => 'Can be overwritten by page / section settings as well as inside visual composer.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings'
            ),

            array(
                'id' => 'ut_google_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_lead_websafe_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'desc' => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_lead_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_lead_font_type' => 'ut-font'
                )
            ),
            
            /*
            |--------------------------------------------------------------------------
            | Global Contact Section Header Settings
            |--------------------------------------------------------------------------
            */
            
            array(
                'id' => 'ut_contact_header_setting_headline',
                'label' => 'Contact Section Header Style',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
            ),

            array(
                'id' => 'ut_csection_header_style',
                'label' => 'Header Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> Global Header Styles. <a href="#" class="ut-header-preview">Preview Header Styles</a>',
                'type' => 'select',
                'std' => 'global',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'choices' => array(
                    array(
                        'label' => 'Global',
                        'value' => 'global'
                    ),
                    array(
                        'value' => 'pt-style-1',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'pt-style-2',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'pt-style-3',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'pt-style-4',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'pt-style-5',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'pt-style-6',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'pt-style-7',
                        'label' => 'Style Seven'
                    )

                ),
            ),
            
            array(
                'id' => 'ut_csection_title_style_1_type',
                'label' => 'Decoration Line Location',
                'desc' => 'Select between 2 different locations.',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'std' => 'global',
                'choices' => array(
                    /*array(
                        'value' => 'global',
                        'label' => 'Global'
                    ),*/
                    array(
                        'value' => 'section',
                        'label' => 'Decoration Line as Linetrough'
                    ),
                    array(
                        'value' => 'parallax',
                        'label' => 'Decoration Line above Title'
                    ),
                ),
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-1'
                )
            ),
        
        
            array(
                'id' => 'ut_csection_headline_style_2_color',
                'label' => 'Style Two Decoration Line Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_csection_headline_style_2_height',
                'label' => 'Style Two Decoration Line Height',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),

            array(
                'id' => 'ut_csection_headline_style_2_width',
                'label' => 'Style Two Decoration Line Width',
                'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-2'
                )
            ),
        
            array(
                'id' => 'ut_csection_headline_style_4_width',
                'label' => 'Style Four Decoration Line Width',
                'desc' => 'Drag the handle to set the line width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,10,1',
                'std' => '6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_style' => 'pt-style-4'
                )
            ),

            array(
                'id' => 'ut_csection_header_padding_bottom',
                'label' => 'Header Margin Bottom',
                'desc' => '<strong>(optional)</strong> - include "px" in your string. e.g. 150px (default: 40px). This option defines the space between header and the following content.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
            ),
        
            array(
                'id' => 'ut_csection_header_font_headline',
                'label' => 'Contact Section Header',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
            ),        

            array(
                'id' => 'ut_csection_header_font_type',
                'label' => 'Choose font source for Header',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_header_slogan_color',
                'label' => 'Section Title Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
            ),                
        
            array(
                'id' => 'ut_csection_header_google_font_style',
                'label' => 'Header Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_csection_header_websafe_font_style',
                'label' => 'Header Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_csection_header_font_style',
                'label' => 'Header Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'choices' => array(
                    array(
                        'label' => 'Default',
                        'value' => 'global'
                    ),
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_csection_header_font_style_settings',
                'label' => 'Header Font Style Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_header_settings',
                'required' => array(
                    'ut_csection_header_font_type' => 'ut-font'
                )
            ),
        
            /*
            |--------------------------------------------------------------------------
            | Global Contact Section Lead Settings
            |--------------------------------------------------------------------------
            */        
        
            array(
                'id' => 'ut_csection_lead_headline',
                'label' => 'Contact Section Lead',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
            ),

            array(
                'id' => 'ut_csection_lead_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_lead_color',
                'label' => 'Global Section Lead Color',
                'desc' => 'Can be overwritten by Page and Section Settings.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
            ),

            array(
                'id' => 'ut_csection_lead_google_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_csection_lead_websafe_font_style',
                'label' => 'General Section Leads Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_csection_lead_font_style',
                'label' => 'General Section Leads Font Style',
                'desc' => '<a href="#" class="ut-font-preview">General Section Leads Font Style</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_csection_lead_font_style_settings',
                'label' => 'Header Font Style Settings',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_csection_lead_settings',
                'required' => array(
                    'ut_csection_lead_font_type' => 'ut-font'
                )
            ),
            	
        
        
            /*
            |--------------------------------------------------------------------------
            | Portolio Hover
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_portfolio_title_headline',
                'label' => 'Portfolio Hover Title',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),

            array(
                'id' => 'ut_global_portfolio_title_color',
                'label' => 'Portfolio Title on Hover Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),

            array(
                'id' => 'ut_global_portfolio_title_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_title_font_style',
                'label' => 'Portfolio Title Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-websafe'
                )
            ),
        
            array(
                'id' => 'ut_global_portfolio_title_below_headline',
                'label' => 'Portfolio Title Below',
                'desc' => 'Portfolio Title Below',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),
        
            array(
                'id' => 'ut_global_portfolio_title_below_color',
                'label' => 'Portfolio Title Below Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),
        
            array(
                'id' => 'ut_global_portfolio_title_below_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_portfolio_title_below_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_title_below_font_style',
                'label' => 'Portfolio Title Below Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_title_font_type' => 'ut-websafe'
                )
            ),
        
            array(
                'id' => 'ut_global_portfolio_category_headline',
                'label' => 'Portfolio Hover Category and Custom Text',
                'desc' => 'Portfolio Hover Category',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
            ),

            array(
                'id' => 'ut_global_portfolio_category_color',
                'label' => 'Portfolio Hover Category Color',
                'desc' => 'Can be overwritten by Showcase Settings.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings'
            ),

            array(
                'id' => 'ut_global_portfolio_category_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_portfolio_category_font_style',
                'label' => 'Header Font Style',
                'desc' => '<strong>(optional)</strong> - default : Typography -> General Headlines. <a href="#" class="ut-font-preview">Preview Font Styles</a>',
                'type' => 'select',
                'std' => 'regular',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_google_portfolio_category_font_style',
                'label' => 'Category Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_websafe_portfolio_category_font_style',
                'label' => 'Category Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_portfolio_settings',
                'required' => array(
                    'ut_global_portfolio_category_font_type' => 'ut-websafe'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Blockquote
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blockquote_headline',
                'label' => 'Blockquotes Font Face',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
            ),

            array(
                'id' => 'ut_blockquote_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_blockquote_headline_color',
                'label' => 'Global Blockquote Font Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
            ),

            array(
                'id' => 'ut_google_blockquote_font_style',
                'label' => 'Blockquote Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_blockquote_websafe_font_style',
                'label' => 'Blockquote Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_blockquote_font_style',
                'label' => 'Blockquote Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_blockquote_font_type' => 'ut-font'
                )
            ),

            array(
                'id' => 'ut_single_blockquote_websafe_font_style',
                'label' => 'Single Posts Blockquote Font Styling',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blockquote_settings'
            ),




            /*
            |--------------------------------------------------------------------------
            | Typography - Blog
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blog_settings_headline',
                'label' => 'Blog',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
            ),

            array(
                'id' => 'ut_global_blog_titles_font_style',
                'label' => 'Classic Blog Posts Title Font Setting',
                'desc' => 'Especially for Classic Blog and Mixed Grid Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings'
            ),
            
            array(
                'id' => 'ut_global_grid_blog_titles_font_style',
                'label' => 'Grid Blog Posts Title Font Setting',
                'desc' => 'Especially for Grid Blog and Mixed Grid Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings'
            ),
            
            array(
                'id' => 'ut_global_list_blog_titles_font_style',
                'label' => 'List Blog Posts Title Font Setting',
                'desc' => 'Only for List Blog Layouts.',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings'
            ),
        
            array(
                'id' => 'ut_global_blog_single_settings_headline',
                'label' => 'Single Posts',
                'desc' => 'Single Posts',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings',
            ),

            array(
                'id' => 'ut_global_blog_single_titles_font_style',
                'label' => 'Single Post Title Font Setting',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_menu_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Typography - Blog Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_blog_widgets_headline',
                'label' => 'Sidebar Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_headline_color',
                'label' => 'Sidebar Widgets Headlines Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_google_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_websafe_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_global_blog_widgets_headline_font_style',
                'label' => 'Sidebar Widgets Headlines Font Style',
                'desc' => '<a href="#" class="ut-font-preview">Blockquote Font Styles</a>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
                'choices' => array(
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_global_blog_widgets_headline_font_type' => 'ut-font'
                )
            ),
            
            array(
                'id' => 'ut_global_blog_widgets_text_headline',
                'label' => 'Sidebar Widgets Text',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),
        
            array(
                'id' => 'ut_global_sidebar_widgets_text_font_size',
                'label' => 'Sidebar Text Font Size',
                'desc' => 'Value in px: e.g. 14px.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),
        
            array(
                'id' => 'ut_global_sidebar_widgets_text_line_height',
                'label' => 'Sidebar Text Line Height',
                'desc' => 'Value in px: e.g. 14px.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),

            array(
                'id' => 'ut_global_sidebar_widgets_arrow_line_height',
                'label' => 'Sidebar Widgets Arrows Line Height',
                'type' => 'text',
                'desc' => 'Defines the amount of space above and below e.g. 1.6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_blog_widgets_settings',
            ),




            /*
            |--------------------------------------------------------------------------
            | Typography - Footer
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_footer_widgets_headline',
                'label' => 'Footer Widgets',
                'type' => 'panel_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),

            array(
                'id' => 'ut_footer_widgets_headline_color',
                'label' => 'Footer Widgets Headlines Color',
                'desc' => 'HEX Color.',
                'type' => 'colorpicker',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),

            array(
                'id' => 'ut_footer_widgets_headline_font_type',
                'label' => 'Choose Font Source',
                'desc' => sprintf( 'Select your desired font source. The theme currently supports %s and %s. The installed theme default font is %s.', '<a href="http://www.w3schools.com/cssref/css_websafe_fonts.asp" target="_blank">Web Safe Fonts</a>', '<a href="https://fonts.google.com/" target="_blank">Google Fonts</a>', '<a href="https://www.fontsquirrel.com/fonts/raleway" target="_blank">Raleway</a>' ),
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'std' => 'ut-font',
                'choices' => array(
                    array(
                        'value' => 'ut-font',
                        'label' => 'Theme Font'
                    ),
                    array(
                        'value' => 'ut-websafe',
                        'label' => 'Web Safe Fonts'
                    ),
                    array(
                        'value' => 'ut-google',
                        'label' => 'Google Font'
                    )
                ),
            ),

            array(
                'id' => 'ut_footer_widgets_headline_google_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'type' => 'googlefont',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-google'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_headline_websafe_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-websafe'
                )
            ),

            array(
                'id' => 'ut_footer_widgets_headline_font_style',
                'label' => 'Footer Widgets Headlines Font Style',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
                'choices' => array(
                    array(
                        'label' => 'Default',
                        'value' => 'global'
                    ),
                    array(
                        'value' => 'extralight',
                        'label' => 'Extra Light'
                    ),
                    array(
                        'value' => 'light',
                        'label' => 'Light'
                    ),
                    array(
                        'value' => 'regular',
                        'label' => 'Regular'
                    ),
                    array(
                        'value' => 'medium',
                        'label' => 'Medium'
                    ),
                    array(
                        'value' => 'semibold',
                        'label' => 'Semi Bold'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'Bold'
                    )
                ),
                'required' => array(
                    'ut_footer_widgets_headline_font_type' => 'ut-font'
                )
            ),
            
            array(
                'id' => 'ut_footer_widgets_text_headline',
                'label' => 'Footer Widgets Text',
                'type' => 'section_headline',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),        
        
            array(
                'id' => 'ut_footer_widgets_text_font_size',
                'label' => 'Footer Text Font Size',
                'type' => 'text',
                'desc' => 'Value in px: e.g. 14px.',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),
            
            array(
                'id' => 'ut_footer_widgets_text_line_height',
                'label' => 'Footer Text Line Height',
                'desc' => 'Value in px: e.g. 14px.',
                'type' => 'text',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),
        
            array(
                'id' => 'ut_footer_widgets_arrow_line_height',
                'label' => 'Footers Widgets Arrows Line Height',
                'type' => 'text',
                'desc' => 'Defines the amount of space above and below e.g. 1.6',
                'section' => 'ut_typography_settings',
                'subsection' => 'ut_global_footer_typo_settings',
            ),



            /*
            |--------------------------------------------------------------------------
            | Global Hero Settings 
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_styling_headline',
                'label' => 'Global Hero Caption Styling',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_setting_Info',
                'label' => 'Global Hero Caption',
                'desc' => 'These are your global Hero Styling settings for the entire site. However, in order to give you more freedom while individualizing your Brooklyn powered website. You can overwrite these settings by using the "Hero Styling" tab inside the Front Page or Blog Section as well as on single pages or portfolios. Means you can differentiate the visual appearance on different parts of your website.',
                'type' => 'section_headline_info',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_style',
                'label' => 'Hero Caption Style',
                'desc' => 'Choose between 10 different hero caption styles. If you are using a slider as your desired hero type, you can define an individual style for each slide.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'choices' => array(
                    array(
                        'value' => 'ut-hero-style-1',
                        'label' => 'Style One',
                        'src' => ''
                    ),
                    array(
                        'value' => 'ut-hero-style-2',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'ut-hero-style-3',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'ut-hero-style-4',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'ut-hero-style-5',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'ut-hero-style-6',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'ut-hero-style-7',
                        'label' => 'Style Seven'
                    ),
                    array(
                        'value' => 'ut-hero-style-8',
                        'label' => 'Style Eight'
                    ),
                    array(
                        'value' => 'ut-hero-style-9',
                        'label' => 'Style Nine'
                    ),
                    array(
                        'value' => 'ut-hero-style-10',
                        'label' => 'Style Ten'
                    )
                   
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_width',
                'label' => 'Choose Hero Width',
                'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'Grid Based'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'Fullwidth'
                    ),
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_align',
                'label' => 'Choose Hero Caption Alignment',
                'desc' => 'Specifies the default alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'center',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'choices' => array(
                    array(
                        'value' => 'center',
                        'label' => 'Center'
                    ),
                    array(
                        'value' => 'left',
                        'label' => 'Left'
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_v_align',
                'label' => 'Choose Hero Caption Vertical Alignment',
                'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                'type' => 'select',
                'std' => 'middle',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'choices' => array(
                    array(
                        'value' => 'top',
                        'label' => 'top'
                    ),
                    array(
                        'value' => 'middle',
                        'label' => 'middle'
                    ),
                    array(
                        'value' => 'bottom',
                        'label' => 'bottom'
                    ),
                ),

            ),
        
            array(
                'id' => 'ut_global_hero_v_align_margin_bottom',
                'label' => 'Enter Hero Content Margin Bottom',
                'desc' => 'Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'type' => 'text',
                'required' => array(
                    'ut_global_hero_v_align' => 'bottom'    
                )
            ),
        
            array(
                'id' => 'ut_global_hero_background_settings_headline',
                'label' => 'Global Hero Background Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_background_settings',
            ),

            array(
                'id' => 'ut_global_hero_background_color',
                'label' => 'Hero Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_background_settings',
            ),

            array(
                'id' => 'ut_global_hero_overlay_settings_headline',
                'label' => 'Global Hero Overlay Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
            ),

            array(
                'id' => 'ut_global_hero_overlay',
                'label' => 'Activate Hero Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_global_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom Pattern'
                    )

                ),
                'required' => array(
                    'ut_global_hero_overlay' => 'on',
                    'ut_global_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_custom_pattern',
                'label' => 'Custom Pattern',
                'desc' => '',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay' => 'on',
                    'ut_global_hero_overlay_pattern' => 'on',
                    'ut_global_hero_overlay_pattern_style' => 'custom'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_settings_headline',
                'label' => 'Global Hero Overlay Effect Settings',
                'desc' => 'Global Hero Overlay Effect Settings',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect',
                'label' => 'Activate Overlay Animation Effect?',
                'desc' => '<strong>(optional)</strong> Keep in mind, that this effect uses canvas objects for animation. Old Browsers do not support this feature!',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_style',
                'label' => 'Overlay Animation Effect',
                'desc' => 'choose between 2 awesome animation effects!',
                'std' => 'dots',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'dots',
                        'label' => 'Connecting Dots'
                    ),
                    array(
                        'value' => 'bubbles',
                        'label' => 'Rising Bubbles'
                    )
                ),
                'required' => array(
                    'ut_global_hero_overlay_effect' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_overlay_effect_color',
                'label' => 'Overlay Effect Color',
                'desc' => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
                'type' => 'colorpicker',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_overlay_settings',
                'required' => array(
                    'ut_global_hero_overlay_effect' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_setting_headline',
                'label' => 'Global Hero Border Settings',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_border_bottom',
                'label' => 'Activate Hero Border Bottom?',
                'desc' => 'Display a custom border at the bottom of hero.',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
                'std' => 'off',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_color',
                'label' => 'Border Bottom Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_width',
                'label' => 'Border Bottom Width',
                'desc' => 'Drag the handle to set the bottom border width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,100',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_border_bottom_style',
                'label' => 'Border Bottom Style',
                'desc' => 'Choose from 4 different border styles.',
                'type' => 'select',
                'std' => 'solid',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'choices' => array(
                    array(
                        'label' => 'dashed',
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => 'dotted',
                        'value' => 'dotted'
                    ),
                    array(
                        'label' => 'solid',
                        'value' => 'solid'
                    ),
                    array(
                        'label' => 'double',
                        'value' => 'double'
                    )
                ),
                'required' => array(
                    'ut_global_hero_border_bottom' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_setting_headline',
                'label' => 'Global Hero Fancy Border Settings',
                'desc' => 'Global Hero Fancy Border',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
            ),

            array(
                'id' => 'ut_global_hero_fancy_border',
                'label' => 'Activate Fancy Border?',
                'desc' => 'Allows you to create a nice fancy border at the bottom of your hero area.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_color',
                'label' => 'Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_background_color',
                'label' => 'Background Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_global_hero_fancy_border_size',
                'label' => 'Size',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_border_settings',
                'required' => array(
                    'ut_global_hero_fancy_border' => 'on'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Content Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_expertise_slogan_settings_headline',
                'label' => 'Global Hero Caption Colors',
                'type' => 'section_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_expertise_slogan_color',
                'label' => 'Hero Caption Slogan Color',
                'desc' => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Slogan</strong>.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_expertise_slogan_background_color',
                'label' => 'Hero Caption Slogan Background Color',
                'desc' => '<strong>(optional)</strong> - set an alternate background color for <strong>Hero Caption Slogan</strong>. Not available for Hero Title Style 3.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_company_slogan_color',
                'label' => 'Hero Caption Title Color',
                'desc' => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Title</strong>.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_catchphrase_color',
                'label' => 'Hero Caption Description Color',
                'desc' => '<strong>(optional)</strong>- set an alternate color for <strong>Hero Caption Description</strong>.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
            ),

            array(
                'id' => 'ut_global_hero_catchphrase_line_color',
                'label' => 'Hero Caption Description Line Color',
                'desc' => '<strong>(optional)</strong>- set an alternate color for <strong>Hero Caption Description Line</strong>.',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_caption_settings',
                'required' => array(
                    'ut_global_hero_style' => 'ut-hero-style-3'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Global Hero Type
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_global_hero_type_headline',
                'label' => 'Global Hero Type',
                'type' => 'panel_headline',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
            ),

            array(
                'id' => 'ut_global_hero_header_type',
                'label' => 'Global Hero Type',
                'desc' => 'Set your global hero type.',
                'type' => 'select',
                'section' => 'ut_global_hero_settings',
                'subsection' => 'ut_global_hero_type_settings',
                'choices' => array(
                    array(
                        'value' => 'image',
                        'label' => 'Hero Image',
                    ),
                    array(
                        'value' => 'splithero',
                        'label' => 'Hero Highlighted (formerly Split Hero)'
                    ),

                    array(
                        'value' => 'video',
                        'label' => 'Hero Video',
                    ),

                    array(
                        'value' => 'transition',
                        'label' => 'Hero Fancy Slider'
                    ),

                    array(
                        'value' => 'slider',
                        'label' => 'Hero Slider (will be updated)',
                    ),

                    array(
                        'value' => 'tabs',
                        'label' => 'Hero Tablet Slider (will be updated)'
                    ),

                    array(
                        'value' => 'custom',
                        'label' => 'Hero Custom Shortcode (e.g. Slider Revolution etc.)'
                    ),

                    array(
                        'value' => 'animatedimage',
                        'label' => 'Hero Animated Image (will be updated)'
                    ),
                   
                ),
        
            ),

            /*
            |--------------------------------------------------------------------------
            | Blog Layout
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_layout_setting_headline',
                'label' => 'Blog Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),

            array(
                'id' => 'ut_blog_layout',
                'label' => 'Blog Layout',
                'desc' => 'Choose from 4 nice blog layouts.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'standard',
                'choices' => array(
                    array(
                        'value' => 'classic',
                        'label' => 'Classic'
                    ),
                    array(
                        'value' => 'grid',
                        'label' => 'Grid'
                    ),
                    array(
                        'value' => 'mixed-grid',
                        'label' => 'Mixed Grid'
                    ),
                    array(
                        'value' => 'list-grid',
                        'label' => 'List'
                    ),

                ),

            ),
            
            array(
                'id' => 'ut_blog_background_color',
                'label' => 'Blog Background Color.',
                'desc' => 'Allows you to emphasize the visual appearance of blog posts boxes.',
                'type' => 'colorpicker',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting'               
            ),        
            
            array(
                'id' => 'ut_blog_elements_border',
                'label' => 'Blog Element Border Radius',
                'desc' => 'By default image and a bunch of other elements have a 4px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
            
            array(
                'id' => 'ut_blog_elements_border_radius',
                'label' => 'Blog Element Border Custom Radius',
                'desc' => 'Drag the handle to set the border radius. Default: 4',
                'std' => '4',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_elements_border' => 'on'
                )
            ),
        
            array(
                'id' => 'ut_blog_avatar_border',
                'label' => 'Blog Avatar Shape',
                'desc' => 'By default avatars are round.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'round'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'square'
                    ),

                ),

            ),

            array(
                'id' => 'ut_animate_blog_articles',
                'label' => 'Animate Posts on Blog?',
                'desc' => 'Animates your posts inside your blog with a fade in up animation.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
            
            array(
                'id' => 'ut_blog_grid_excerpt_length',
                'label' => 'Blog Grid Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'grid'
                )
            ),

            array(
                'id' => 'ut_blog_list_excerpt_length',
                'label' => 'Blog List Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'list'
                )
            ),

            array(
                'id' => 'ut_blog_mixed_grid_excerpt_length',
                'label' => 'Blog Grid Excerpt Length',
                'desc' => 'Desired Excerpt Length in Words. e.g. 20',
                'type' => 'text',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_layout' => 'mixed-grid'
                )
            ),        
            
            array(
                'id' => 'ut_blog_button_settings_headline',
                'label' => 'Blog Button Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),

            array(
                'id' => 'ut_blog_button_border',
                'label' => 'Blog Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),        

            ),
            
            array(
                'id' => 'ut_blog_button_border_radius',
                'label' => 'Button Border Radius',
                'desc' => 'Drag the handle to set the border radius. Default: 3',
                'std' => '3',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'required' => array(
                    'ut_blog_button_border' => 'on'
                )
            ),
        
            array(
                'id' => 'ut_blog_button_text_color',
                'label' => 'Blog Button Text Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),        
            array(
                'id' => 'ut_blog_button_background_color',
                'label' => 'Blog Button Background Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_text_color_hover',
                'label' => 'Blog Button Text Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            array(
                'id' => 'ut_blog_button_background_color_hover',
                'label' => 'Blog Button Background Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
            ),
            
            array(
                'id' => 'ut_blog_button_body_font',
                'label' => 'Apply Body Font to Button?',
                'desc' => 'By default buttons are displaying with a sans serif font. However, if you are using a serif font as your primary body font use this option the remove the sans serif.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    )

                )

            ),
        
            array(
                'id' => 'ut_blog_button_font_weight',
                'label' => 'Blog Button Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_layout_setting',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
                    )

                )

            ),        
        
            array(
                'id' => 'ut_blog_overview_settings_headline',
                'label' => 'Blog Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_overview_article_title_color',
                'label' => 'Blog Article Title Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_article_title_color_hover',
                'label' => 'Blog Article Title Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_meta_icon_color',
                'label' => 'Blog Meta Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_meta_link_color',
                'label' => 'Blog Meta Link Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_meta_link_color_hover',
                'label' => 'Blog Meta Link Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_overview_meta_link_font_style',
                'label' => 'Blog Meta Link Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),    
                
        
            array(
                'id' => 'ut_blog_date_settings_headline',
                'label' => 'Blog Date and Caption Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_date_body_font',
                'label' => 'Apply Body Font to Date?',
                'desc' => 'By default the date is displaying with a sans serif font. However, if you are using a serif font as your primary body font use this option the remove the sans serif.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    ),
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    )

                )

            ),
        
            array(
                'id' => 'ut_blog_overview_date_color',
                'label' => 'Blog Date (Day) Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>Only applies if date is not placed on images. Such as in "Classic" blog.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ), 
            
            array(
                'id' => 'ut_blog_overview_date_color_bottom',
                'label' => 'Blog Date (Month Year) Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>Only applies if date is not placed on images. Such as in "Classic" blog.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            
            array(
                'id' => 'ut_date_color_skins',
                'label' => 'Date and Caption Color Skins',
                'desc' => 'Depending on selected Blog Layout. The Date and Caption are placed on the image. This can cause illegible characters, especially if date color and image color are in the same color space. Therefore you can create individual Date Color Skins and assign these Skins to your single post by using the "Date Skins" dropdown on the right side of your post Editor.',
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'settings' => array(
                    
                    array(
                        'id' => 'title',
                        'label' => 'Enter a Skin Title',
                        'desc' => 'Used for internal use.',
                        'type' => 'text',
                        'class' => 'option-tree-setting-title',    
                    ),
                    
                    // automated unique ID for later use
                    array(
                        'id' => 'unique_id',
                        'label' => 'ID',
                        'type' => 'unique_id',
                    ),    
        
                    array(
                        'id' => 'date_color',
                        'label' => 'Blog Date (Day) Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ), 

                    array(
                        'id' => 'date_color_bottom',
                        'label' => 'Blog Date (Month Year) Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),
                    
                    array(
                        'id' => 'caption_color',
                        'label' => 'Caption Color',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',
                    ),        
        
                ) 
        
        
            ), 
        
            array(
                'id' => 'ut_blog_overview_media_settings_headline',
                'label' => 'Blog Overview Media Colors',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_overview_pformat_icon_color',
                'label' => 'Blog Post Format Icon Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_pformat_icon_background_color',
                'label' => 'Blog Post Format Icon Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),        
        
            array(
                'id' => 'ut_blog_overview_gallery_arrow_color',
                'label' => 'Blog Gallery Carousel Arrow Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_gallery_arrow_color_hover',
                'label' => 'Blog Gallery Carousel Arrow Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_overview_gallery_arrow_background_color',
                'label' => 'Blog Gallery Carousel Arrow Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_overview_gallery_arrow_background_color_hover',
                'label' => 'Blog Gallery Carousel Arrow Background Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_read_more_settings_headline',
                'label' => 'Blog Read More Colors & Icon',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_read_more_font_style',
                'label' => 'Read More Font Setting',
                'desc' => '<strong>optional</strong>',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_read_more_align',
                'label' => 'Read More Align',
                'desc' => 'Read More Button Align for Blog.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'std' => 'right',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => 'Left'
                    ),
                    array(
                        'value' => 'center',
                        'label' => 'Center'
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right'
                    )
                ),
            ),
        
        
            array(
                'id' => 'ut_blog_read_more_color',
                'label' => 'Blog Read More Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_read_more_color_hover',
                'label' => 'Blog Read More Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_read_more_icon_color',
                'label' => 'Blog Read More Iocn Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_blog_read_more_icon_color_hover',
                'label' => 'Blog Read More Icon Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => '<strong>optional</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_blog_read_more_icon_source',
                'label' => 'Blog Read More Icon',
                'desc' => 'Change the read more icon or turn it completely off.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'std' => 'default',
                'choices' => array(
                    array(
                        'value' => 'default',
                        'label' => 'Theme Default Icon'
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom Icon'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'No Iocn'
                    ),

                ),        

            ),    
        
            array(
                'id' => 'ut_blog_read_more_custom_icon',
                'label' => 'Select Custom Icon',
                'desc' => 'Choose your desired read more icon.',
                'type' => 'iconpicker',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
                'required' => array(
                    'ut_blog_read_more_icon_source' => 'custom'
                )
            ),
            
            
        
            /*
            |--------------------------------------------------------------------------
            | Blog Color Settings
            |--------------------------------------------------------------------------
            */
            
            array(
                'id' => 'ut_author_bio_setting_headline',
                'label' => 'Author Biography Box',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_author_archive_link_color',
                'label' => 'Author Archive Link Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_author_archive_link_color_hover',
                'label' => 'Author Archive Link Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_author_archive_link_arrow_color',
                'label' => 'Author Archive Link Arrow Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_author_archive_link_arrow_color_hover',
                'label' => 'Author Archive Link Arrow Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>. Default theme accent color.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
        
            array(
                'id' => 'ut_author_bio_social_icon_color',
                'label' => 'Author Bio Social Icon Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            
            array(
                'id' => 'ut_author_bio_social_icon_color_hover',
                'label' => 'Author Bio Social Icon Hover Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>. Default theme accent color.',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_color_setting',
            ),
            

            /*
            |--------------------------------------------------------------------------
            | Single Post Setting
            |--------------------------------------------------------------------------
            */
            array(
                'id' => 'ut_single_posts_setting_headline',
                'label' => 'Single Post Settings',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),

            array(
                'id' => 'ut_single_posts_sidebar',
                'label' => 'Activate Sidebar for Single Posts?',
                'desc' => 'Please make sure to place at least 1 Widgets into "Blog Sidebar" under Appearance > Widgets.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),

            array(
                'id' => 'ut_single_posts_hero_settings_headline',
                'label' => 'Single Post Hero Settings',
                'type' => 'section_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),

            array(
                'id' => 'ut_global_post_hero',
                'label' => 'Show Hero by default?',
                'desc' => 'You can individually show or hide the hero for each post. This here is your global default value.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
            
            array(
                'id' => 'ut_global_post_hero_height',
                'label' => 'Singe Post Hero Height',
                'desc' => 'Drag the handle to set the hero height. Default: 120',
                'std' => '50',
                'type' => 'numeric-slider',
                'min_max_step' => '50,100,1',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),
            
            array(
                'id' => 'ut_global_post_hero_title',
                'label' => 'Show Title and or Post Meta in Hero?',
                'desc' => 'Shows your page title or a custom title as well as the post publish date, author avatar and post categories inside your hero area.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label' => 'yes, show title and post meta!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'yes, but only show post title!',
                        'value' => 'only_title'
                    ),
                    array(
                        'label' => 'yes, but only show post meta!',
                        'value' => 'only_meta'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
        
                ),

            ),
            
            array(
                'id' => 'ut_global_post_hero_mute_button',
                'label' => 'Show Mute Button',
                'desc' => 'Only available for video post format.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )

                ),

            ),

            array(
                'id' => 'ut_global_post_hero_video_sound',
                'label' => 'Activate Video Sound',
                'desc' => 'Only available for video post format.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'off',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )

                ),

            ),
        
            array(
                'id' => 'ut_single_posts_settings_headline',
                'label' => 'Single Post Content Settings',
                'type' => 'section_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),        
        
            array(
                'id' => 'ut_global_post_title',
                'label' => 'Show Title?',
                'desc' => 'This option allows you to hide the post title in your main content.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )
        
                ),

            ),
        
            array(
                'id' => 'ut_global_post_thumbnail',
                'label' => 'Show Featured Image?',
                'desc' => 'This option allows you to hide the featured image in your main content.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )
        
                ),

            ),
        
            array(
                'id' => 'ut_global_post_video',
                'label' => 'Show Featured Video?',
                'desc' => 'This option allows you to hide the featured video in your main content. Only for post format video.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )
        
                ),

            ),
        
            array(
                'id' => 'ut_author_hero_settings_headline',
                'label' => 'Author Hero Settings',
                'type' => 'section_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
            ),        
        
            array(
                'id' => 'ut_author_hero_highlight',
                'label' => 'Highlight Author Surname in Hero?',
                'desc' => 'This option allows you to highlight the author surname inside the hero area on author pages.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_single_posts_setting',
                'std' => 'on',
                'choices' => array(
                    array(
                        'label'     => 'yes, please!',
                        'value'     => 'on'
                    ),
                    array(
                        'label'     => 'no, thanks!',
                        'value'     => 'off'
                    )
        
                ),

            ),
        
        
        
            /*
            |--------------------------------------------------------------------------
            | Blog Sidebar
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_sidebar_headline',
                'label' => 'Sidebar Align',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_sidebar_setting',
            ),

            array(
                'id' => 'ut_sidebar_align',
                'label' => 'Sidebar Align',
                'desc' => 'Sidebar align for blog.',
                'type' => 'select',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_sidebar_setting',
                'choices' => array(
                    array(
                        'value' => 'left',
                        'label' => 'Left'
                    ),
                    array(
                        'value' => 'right',
                        'label' => 'Right'
                    )
                ),
            ),

            /*
            |--------------------------------------------------------------------------
            | Blog Paginationm
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_blog_pagination_headline',
                'label' => 'Blog Pagination',
                'type' => 'panel_headline',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_height',
                'label' => 'Blog Pagination Height',
                'desc' => 'Drag the handle to set the pagination height. Default: 120',
                'std' => '120',
                'type' => 'numeric-slider',
                'min_max_step' => '0,300,10',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_background_color',
                'label' => 'Blog Pagination Background Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_arrow_color',
                'label' => 'Blog Pagination Arrow Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            array(
                'id' => 'ut_blog_pagination_arrow_hover_color',
                'label' => 'Blog Pagination Arrow Hover Color',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                'section' => 'ut_blog_settings',
                'subsection' => 'ut_blog_pagination_setting',
            ),

            /*
            |--------------------------------------------------------------------------
            | Portfolio Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_portfolio_content_headline',
                'label' => 'Single Portfolio',
                'type' => 'panel_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
            ),

            array(
                'id' => 'ut_single_portfolio_navigation',
                'label' => 'Activate Portfolio Navigation?',
                'desc' => 'A navigation with links to the previous and next portfolio post as well as a link to the page which holds the main portfolio overview. ',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_width',
                'label' => 'Portfolio Navigation Width?',
                'desc' => 'It handles centering the arrows and icon within the navigation. Centered arrows and icon have a max width of 1200px and fullwidth 100%.',
                'type' => 'select',
                'std' => 'centered',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'centered',
                        'label' => 'centered'
                    ),
                    array(
                        'value' => 'fullwidth',
                        'label' => 'fullwidth'
                    )
                ),
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),            
        
            array(
                'id' => 'ut_single_portfolio_navigation_arrow_style',
                'label' => 'Portfolio Arrow Style',
                'desc' => 'Customize the previous and next arrows.',
                'type' => 'select',
                'std' => 'centered',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'arrows',
                        'label' => 'Single Arrows'
                    ),
                    array(
                        'value' => 'arrows_with_title',
                        'label' => 'Arrows with Title'
                    ),
                    array(
                        'value' => 'title_only',
                        'label' => 'Title Only'
                    ),
                    array(
                        'value' => 'arrows_with_text',
                        'label' => 'Arrows with Custom Text'
                    ),
                    array(
                        'value' => 'text_only',
                        'label' => 'Custom Text Only'
                    ),
        
                ),
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
        
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_next_text',
                'label' => 'Next Portfolio',
                'desc' => 'Custom Text for Next Portfolio',
                'type' => 'text',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_text|text_only'   
                )
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_prev_text',
                'label' => 'Previous Portfolio',
                'desc' => 'Custom Text for Previous Portfolio',
                'type' => 'text',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_text|text_only'   
                )
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_height',
                'label' => 'Portfolio Navigation Height',
                'desc' => 'Drag the handle to set the portfolio navigation height. Default: 120.',
                'std' => '120',
                'type' => 'numeric-slider',
                'min_max_step' => '40,300,10',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_main_portfolio_page',
                'label' => 'Main Portfolio Page',
                'desc' => 'Select a page where your main showcase is located.',
                'type' => 'page_select',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )    
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_main_portfolio_icon',
                'label' => 'Select Main Portfolio Icon',
                'desc' => 'Choose your desired icon.',
                'type' => 'iconpicker',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_color_settings_headline',
                'label' => 'Navigation Colors',
                'type' => 'section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )    
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_background_color',
                'label' => 'Portfolio Navigation Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_arrow_color_settings_headline',
                'label' => 'Navigation Arrow and Icon Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
        
            array(
                'id' => 'ut_single_portfolio_navigation_arrow_color',
                'label' => 'Portfolio Navigation Arrow Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_arrow_hover_color',
                'label' => 'Portfolio Navigation Arrow Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),            
            
            array(
                'id' => 'ut_single_portfolio_back_to_main_color',
                'label' => 'Main Portfolio Link Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),

            array(
                'id' => 'ut_single_portfolio_back_to_main_hover_color',
                'label' => 'Main Portfolio Link Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
        
        
            array(
                'id' => 'ut_single_portfolio_navigation_text_color_settings_headline',
                'label' => 'Navigation Text Colors',
                'type' => 'sub_section_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on'
                )
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_underline_effect',
                'label' => 'Activate Underline Animation Effect on Hover?',
                'desc' => 'A nice hover animation effect for next and previous portfolio links.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                     'ut_single_portfolio_navigation' => 'on',        
                     'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'   
                )
            ),        
        
            array(
                'id' => 'ut_single_portfolio_navigation_text_color',
                'label' => 'Portfolio Navigation Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'    
                )
            ),

            array(
                'id' => 'ut_single_portfolio_navigation_text_hover_color',
                'label' => 'Portfolio Navigation Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_arrow_style' => 'arrows_with_title|title_only|arrows_with_text|text_only'
                )
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_underline_color',
                'label' => 'Portfolio Navigation Underline Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'mode' => 'rgb',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_underline_effect' => 'on'
                )
            ),
            
            array(
                'id' => 'ut_single_portfolio_navigation_font_style',
                'label' => 'Portfolio Navigation Font Setting',
                'desc' => '',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_single_settings',
                'required' => array(
                    'ut_single_portfolio_navigation' => 'on',
                    'ut_single_portfolio_navigation_underline_effect' => 'on'
                )
            ),
        
        
            /*
            |--------------------------------------------------------------------------
            | Portfolio Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_portfolio_showcase_headline',
                'label' => 'Packery Showcase Caption',
                'type' => 'panel_headline',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
            ),

            array(
                'id' => 'ut_portfolio_showcase_icon_type',
                'label' => 'Showcase Icon',
                'desc' => 'You can use a font awesome icon or upload your own.',
                'type' => 'select',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'std' => 'custom',
                'choices' => array(
                    array(
                        'value' => 'font',
                        'label' => 'Font Awesome Icon'
                    ),
                    array(
                        'value' => 'custom',
                        'label' => 'Custom Icon'
                    ),
                ),
            ),

            array(
                'id' => 'ut_portfolio_showcase_custom_icon',
                'label' => 'Custom Icon',
                'desc' => 'Upload your custom icon.',
                'type' => 'upload',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'custom'
                )
            ),
            
            array(
                'id' => 'ut_portfolio_showcase_custom_icon_size',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'label' => 'Custom Icon Size',
                'desc' => 'Drag the handle to set the icon width. Default: 40px.',
                'std' => '40',
                'type' => 'numeric-slider',
                'min_max_step' => '40,120,40',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'custom',
                )
            ),
            
        
            
        
        
        
        
            array(
                'id' => 'ut_portfolio_showcase_font_icon',
                'label' => 'Select Fontawesome Icon',
                'desc' => 'Choose your desired icon.',
                'type' => 'iconpicker',
                'section' => 'ut_portfolio_settings',
                'subsection' => 'ut_portfolio_showcase_setting',
                'required' => array(
                    'ut_portfolio_showcase_icon_type' => 'font'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Content
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_content_headline',
                'label' => 'Contact Section Content',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
            ),

            array(
                'id' => 'ut_activate_csection',
                'label' => 'Activate Contact Section',
                'desc' => 'You can individually decide if you like to activate or deactivate the contact section per page / portfolio.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'choices' => array(
                    array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    ),
                    array(
                        'value' => 'is_archive',
                        'label' => 'Archive'
                    ),
                    array(
                        'value' => 'ut_is_search',
                        'label' => 'Search'
                    ),
                    array(
                        'value' => 'is_404',
                        'label' => '404'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_header_slogan',
                'label' => 'Contact Header Slogan',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'htmldesc' => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '5'
            ),

            array(
                'id' => 'ut_csection_header_expertise_slogan',
                'label' => 'Contact Header Lead',
                'type' => 'textarea-simple',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '5'
            ),
            
            array(
                'id' => 'ut_csection_header_expertise_slogan_margin_top',
                'label' => 'Contact Header Lead Margin Top',
                'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
            ),
        
            array(
                'id' => 'ut_left_csection_content_area',
                'label' => 'Left Content Area',
                'desc' => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '25'
            ),

            array(
                'id' => 'ut_right_csection_content_area',
                'label' => 'Right Content Area',
                'desc' => '<p> For example : create a contact form with your desired form generator and insert the shortcode in here. We recommend to make use of Contact Form 7. P.S. This field is also a good place to place a Google map shortcode! Leave empty to hide the complete box. </p>',
                'type' => 'textarea',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_content_settings',
                'rows' => '25'
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Background
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_background_setting_headline',
                'label' => 'Contact Section Background',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings'
            ),

            array(
                'id' => 'ut_csection_background_type',
                'label' => 'Choose Background Type',
                'desc' => 'Choose between Image, Video or Google Map background.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'std' => 'image',
                'toplevel' => true,
                'choices' => array(
                    array(
                        'value' => 'image',
                        'label' => 'Image'
                    ),
                    array(
                        'value' => 'map',
                        'label' => 'Google Map'
                    ),
                    array(
                        'value' => 'video',
                        'label' => 'Video'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_video_source',
                'label' => 'Video Source',
                'desc' => 'Select your desired source for videos.',
                'type' => 'select',
                'std' => 'youtube',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'choices' => array(
                    array(
                        'value' => 'youtube',
                        'label' => 'Youtube'
                    ),
                    array(
                        'value' => 'selfhosted',
                        'label' => 'Selfthosted'
                    )
                ),
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Video URL',
                'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                'type' => 'text',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'youtube'
                )
            ),

            array(
                'id' => 'ut_csection_video_mp4',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'MP4',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_ogg',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'OGG',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_webm',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'WEBM',
                'type' => 'upload',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_loop',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Loop Video',
                'desc' => 'Whether the video should start over again when finished.',
                'type' => 'select',
                'choices' => array(

                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )

                ),
                'std' => 'on',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_preload',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Preload Video',
                'type' => 'select',
                'choices' => array(

                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )

                ),
                'std' => 'on',
                'required' => array(
                    'ut_csection_background_type' => 'video',
                    'ut_csection_video_source' => 'selfhosted'
                )
            ),

            array(
                'id' => 'ut_csection_video_sound',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Activate video sound after page is loaded?',
                'desc' => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
                'std' => 'off',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_volume',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Video Volume',
                'desc' => 'Drag the handle to set the video volume. Default: 5.',
                'std' => '5',
                'type' => 'numeric-slider',
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_mute_button',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Show Mute Button?',
                'desc' => 'whether the video mute button is displayed or not.',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
                'std' => 'off',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_video_poster',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'label' => 'Poster Image',
                'desc' => 'This image will be displayed instead of the video on mobile devices.',
                'type' => 'upload',
                'markup' => '1_1',
                'required' => array(
                    'ut_csection_background_type' => 'video'
                )
            ),

            array(
                'id' => 'ut_csection_background_image',
                'label' => 'Contact Section Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'required' => array(
                    'ut_csection_background_type' => 'image'
                )
            ),

            array(
                'id' => 'ut_csection_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_csection_background_type' => 'image'
                )
            ),

            array(
                'id' => 'ut_csection_map',
                'label' => 'Google Map Shortcode',
                'desc' => 'We recommend to use the Maps Marker plugin to display maps! Placing a shortcode will overwrite the background image. Also keep in mind, that activating the parallax effect does not work with maps.',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_background_settings',
                'required' => array(
                    'ut_csection_background_type' => 'map'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Contact Section Overlay
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_overlay_setting_headline',
                'label' => 'Contact Section Overlay',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'required' => array(
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay',
                'label' => 'Overlay',
                'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_color',
                'label' => 'Overlay Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_opacity',
                'label' => 'Overlay Color Opacity',
                'desc' => 'Drag the handle to set the overlay opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_pattern',
                'label' => 'Overlay Pattern',
                'desc' => 'Add overlay design pattern.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            array(
                'id' => 'ut_csection_overlay_pattern_style',
                'label' => 'Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'select',
                'std' => 'style_one',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_overlay_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    )
                ),
                'required' => array(
                    'ut_csection_overlay' => 'on',
                    'ut_csection_overlay_pattern' => 'on',
                    'ut_csection_background_type' => 'image|video'
                )
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Border Settings 
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_border_setting_headline',
                'label' => 'Contact Section Border Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_activate_csection_border',
                'label' => 'Activate Border at Top?',
                'desc' => 'A customized CSS border at the top of the contact section.',
                'type' => 'select',
                'std' => 'off',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_border_color',
                'label' => 'Border Top Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_border_width',
                'label' => 'Border Top Width',
                'desc' => 'Drag the handle to set the border width.',
                'type' => 'numeric-slider',
                'min_max_step' => '1,100',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_border_style',
                'label' => 'Border Top Style',
                'desc' => 'Creates a border at the bottom of the hero.',
                'type' => 'select',
                'std' => 'solid',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'choices' => array(
                    array(
                        'label' => 'dashed',
                        'value' => 'dashed'
                    ),
                    array(
                        'label' => 'dotted',
                        'value' => 'dotted'
                    ),
                    array(
                        'label' => 'solid',
                        'value' => 'solid'
                    ),
                    array(
                        'label' => 'double',
                        'value' => 'double'
                    )
                ),
                'required' => array(
                    'ut_activate_csection_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_hero_fancy_border_setting_headline',
                'label' => 'Fancy Border Settings',
                'desc' => 'Hero Fancy Border',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_csection_fancy_border',
                'label' => 'Activate Fancy Border?',
                'desc' => 'Allows you to create a nice fancy border at the bottom of your contact section area.',
                'type' => 'select',
                'choices' => array(
                    array(
                        'label' => 'yes, please!',
                        'value' => 'on'
                    ),
                    array(
                        'label' => 'no, thanks!',
                        'value' => 'off'
                    )
                ),
                'std' => 'off',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings'
            ),

            array(
                'id' => 'ut_csection_fancy_border_color',
                'label' => 'Primary Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_fancy_border_background_color',
                'label' => 'Secondary Color',
                'type' => 'colorpicker',
                'desc' => '<strong>(optional)</strong>',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),

            array(
                'id' => 'ut_csection_fancy_border_size',
                'label' => 'Size',
                'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_border_settings',
                'required' => array(
                    'ut_csection_fancy_border' => 'on'
                )
            ),


            /*
            |--------------------------------------------------------------------------
            | Contact Section Spacing
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_contact_padding_setting_headline',
                'label' => 'Contact Section Padding',
                'desc' => 'Contact Section Padding',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            array(
                'id' => 'ut_csection_padding_top',
                'label' => 'Contact Section Padding Top',
                'desc' => '<strong>(optional)</strong> - default 80px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            array(
                'id' => 'ut_csection_padding_bottom',
                'label' => 'Contact Section Padding Bottom',
                'desc' => '<strong>(optional)</strong> - default 40px',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_spacing_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Contact Section Color Settings
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_csection_color_setting_headline',
                'label' => 'Contact Section Color Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_csection_skin',
                'label' => 'Section Color Skin',
                'desc' => 'If you are planing to use light background images or colors use the dark skin and the other way around. If these skins do not match your requirements, you can define your own colors beneath. The Dark skin has been made fir pure white background in this case.',
                'type' => 'select',
                'std' => 'dark',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'choices' => array(
                    array(
                        'label' => 'Light',
                        'value' => 'light'
                    ),
                    array(
                        'label' => 'Dark',
                        'value' => 'dark'
                    )
                ),
            ),

            array(
                'id' => 'ut_csection_background_color',
                'label' => 'Section Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_left_csection_content_area_color',
                'label' => 'Left Content Area Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),

            array(
                'id' => 'ut_left_csection_content_area_opacity',
                'label' => 'Left Content Area Background Color Opacity',
                'desc' => 'Drag the handle to set the opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'min_max_step' => '0,1,0.05'
            ),

            array(
                'id' => 'ut_right_csection_content_area_color',
                'label' => 'Right Content Area Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
            ),

            array(
                'id' => 'ut_right_csection_content_area_opacity',
                'label' => 'Right Content Area Background Color Opacity',
                'desc' => 'Drag the handle to set the opacity.',
                'std' => '0.8',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'min_max_step' => '0,1,0.05'
            ),



            array(
                'id' => 'ut_csection_submit_button_headline',
                'label' => 'Submit Button Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),
            
            array(
                'id' => 'ut_csection_submit_button_border',
                'label' => 'Submit Button Border Radius',
                'desc' => 'By default buttons have a 3px border radius. With the help of this option, you can remove this border radius.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'on'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'off'
                    ),

                ),

            ),
        
            array(
                'id' => 'ut_csection_submit_button_text_color',
                'label' => 'Submit Button Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),
        
            array(
                'id' => 'ut_csection_submit_button_color',
                'label' => 'Submit Button Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),
        
            array(
                'id' => 'ut_csection_submit_button_text_color_hover',
                'label' => 'Submit Button Text Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),
        
            array(
                'id' => 'ut_csection_submit_button_color_hover',
                'label' => 'Submit Button Background Hover Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings'
            ),
            
            array(
                'id' => 'ut_csection_submit_button_font_weight',
                'label' => 'Submit Button Font Weight',
                'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_csection_color_settings',
                'std' => 'bold',
                'choices' => array(
                    array(
                        'value' => 'normal',
                        'label' => 'normal'
                    ),
                    array(
                        'value' => 'bold',
                        'label' => 'bold'
                    )

                )

            ),
            
        
        
        
            /*
            |--------------------------------------------------------------------------
            | Advanced Settings
            |--------------------------------------------------------------------------
            */

            /*
            | Section Animation
            */

            array(
                'id' => 'ut_sanimation_setting_headline',
                'label' => 'Section Animation',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
            ),

            array(
                'id' => 'ut_scrollto_effect',
                'label' => 'Scroll to Section Effect',
                'desc' => 'This option will activate / deactivate the section scroll animation.',
                'type' => 'easing',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
                'std' => 'easeInOutExpo'
            ),

            array(
                'id' => 'ut_scrollto_speed',
                'label' => 'Scroll to Section Effect Speed',
                'desc' => '<strong>(optional)</strong> - value in ms , default: 650',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_sanimation_settings',
            ),

            /*
            | Maintenace Mode
            */

            array(
                'id' => 'ut_maintenace_mode_settings_headline',
                'label' => 'Maintenance Mode',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
            ),

            array(
                'id' => 'ut_maintenace_mode',
                'label' => 'Activate Maintenance Mode',
                'desc' => 'This option will activate a maintenace mode for your website.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'std' => 'off',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
            ),

            array(
                'id' => 'ut_maintenance_hero_background_color',
                'label' => 'Hero Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
            ),

            array(
                'id' => 'ut_maintenance_hero_background_image',
                'label' => 'Hero Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings'
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay',
                'label' => 'Activate Hero Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_maintenance_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_maintenace_mode_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    )
                ),
                'required' => array(
                    'ut_maintenance_hero_overlay' => 'on',
                    'ut_maintenance_hero_overlay_pattern' => 'on'
                )
            ),








            /*
            | Pre Loader
            */

            array(
                'id' => 'ut_loader_setting_headline',
                'label' => 'Manage Preloader',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
            ),

            array(
                'id' => 'ut_use_image_loader',
                'label' => 'Use Image Preloader',
                'desc' => 'This option will activate a JavaScript based preloader.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
            ),

            array(
                'id' => 'ut_use_image_loader_on',
                'label' => 'Preloader Exceptions',
                'desc' => 'Activate theme image preloader for the following type of pages.',
                'type' => 'checkbox',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'is_front_page',
                        'label' => 'Home'
                    ),
                    array(
                        'value' => 'is_home',
                        'label' => 'Blog'
                    ),
                    array(
                        'value' => 'is_page',
                        'label' => 'Single Pages'
                    ),
                    array(
                        'value' => 'is_single',
                        'label' => 'Single Posts'
                    ),
                    array(
                        'value' => 'is_singular',
                        'label' => 'Single Portfolio Pages'
                    )
                ),
            ),

            array(
                'id' => 'ut_image_loader_style_headline',
                'label' => 'Select Preloader Style',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings'
            ),

            array(
                'id' => 'ut_image_loader_style',
                'label' => 'Preloader Style',
                'desc' => 'Choose between 6 awesome preloader styles.',
                'type' => 'select',
                'std' => 'style_one',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    ),
                    array(
                        'value' => 'style_four',
                        'label' => 'Style Four'
                    ),
                    array(
                        'value' => 'style_five',
                        'label' => 'Style Five'
                    ),
                    array(
                        'value' => 'style_six',
                        'label' => 'Style Six'
                    ),
                    array(
                        'value' => 'style_seven',
                        'label' => 'Style Seven'
                    ),
                    array(
                        'value' => 'style_eight',
                        'label' => 'Style Eight (Text Logo only)'
                    )
                ),

            ),

            array(
                'id' => 'ut_show_loader_bar',
                'label' => 'Display Loader Bar',
                'desc' => 'A visual indicator for the loading progress.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_barheight',
                'label' => 'Bar Height',
                'desc' => 'Drag the handle to set the desired bar height.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'min_max_step' => '1,100,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_one',
                    'ut_show_loader_bar' => 'on'
                )
            ),

            array(
                'id' => 'ut_show_loader_percentage',
                'label' => 'Display Loader Percentage',
                'desc' => 'A visual numeric indicator for the loading progress.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                ),
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_logo_headline',
                'label' => 'Upload Preloader Logo',
                'desc' => 'Upload Preloader Logo',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )
            ),

            array(
                'id' => 'ut_image_loader_logo',
                'label' => 'Logo',
                'desc' => 'A custom logo for theme preloader.',
                'type' => 'upload',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )    
            ),

            array(
                'id' => 'ut_image_loader_logo_max_width',
                'label' => 'Logo Max Width',
                'desc' => 'Drag the handle to set the maximum width.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'min_max_step' => '50,720,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_one|style_two|style_three|style_four|style_five|style_six|style_seven'
                )
            ),

            array(
                'id' => 'ut_image_loader_color_headline',
                'label' => 'Preloader Color Settings',
                'desc' => 'Preloader Color Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings'
            ),

            array(
                'id' => 'ut_image_loader_background',
                'label' => 'Preloader Backgroundcolor',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
            ),

            array(
                'id' => 'ut_image_loader_bar_color',
                'label' => 'Preloader Indicator Color',
                'desc' => '<strong>(optional)</strong> - default: accentcolor. Color for the element which visually indicates the loading. If you leave this field empty, the system will use the accentcolor which has been defined inside the theme customizer.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
            ),

            array(
                'id' => 'ut_image_loader_font_headline',
                'label' => 'Preloader Loading Text Font Settings',
                'desc' => 'Preloader Loading Text Font Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text',
                'label' => 'Preloader Loading Text',
                'desc' => '<strong>(optional)</strong> - default: "Loading".',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_color',
                'label' => 'Preloader Loading Text Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_font',
                'label' => 'Preloader Loading Text Font',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),

            array(
                'id' => 'ut_image_loader_text_margin_top',
                'label' => 'Preloader Loading Text Spacing Top',
                'desc' => 'Drag the handle to set the top spacing value.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'std' => 20,
                'min_max_step' => '0,100,1',
                'required' => array(
                    'ut_image_loader_style' => 'style_two|style_three|style_four|style_five'
                )
            ),      

            array(
                'id' => 'ut_image_loader_percentage_font_headline',
                'label' => 'Preloader Percentage Font Settings',
                'desc' => 'Preloader Percentage Font Settings',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_color',
                'label' => 'Preloader Percentage Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            array(
                'id' => 'ut_image_loader_percentage_font',
                'label' => 'Preloader Percentage Text Font',
                'type' => 'typography',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_loader_settings',
                'required' => array(
                    'ut_image_loader_style' => 'style_one'
                )
            ),

            /*
            | System Pages
            */

            array(
                'id' => 'ut_search_setting_headline',
                'label' => 'Search',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_background_color',
                'label' => 'Hero Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_search_hero_background_image',
                'label' => 'Hero Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings'
            ),

            array(
                'id' => 'ut_search_hero_overlay',
                'label' => 'Activate Hero Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_search_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'required' => array(
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_search_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    )
                ),
                'required' => array(
                    'ut_search_hero_overlay' => 'on',
                    'ut_search_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_settings_headline',
                'label' => 'Scroll Down Arrow',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_scroll_position',
                'label' => 'Scroll Down Arrow Horizontal Position',
                'desc' => 'Drag the handle to set your desired horizontal position.',
                'type' => 'numeric_slider',
                'std' => '50',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_scroll_position_vertical',
                'label' => 'Scroll Down Arrow Vertical Position',
                'desc' => 'Drag the handle to set your desired vertical position.',
                'type' => 'numeric_slider',
                'std' => '10',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            array(
                'id' => 'ut_search_hero_down_arrow_color',
                'label' => 'Scroll Down Arrow Color',
                'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_search_settings',
            ),

            /* 404 */

            array(
                'id' => 'ut_404_setting_headline',
                'label' => '404',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
            ),

            array(
                'id' => 'ut_404_hero_background_color',
                'label' => 'Hero Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
            ),

            array(
                'id' => 'ut_404_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_404_hero_background_image',
                'label' => 'Hero Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings'
            ),

            array(
                'id' => 'ut_404_hero_overlay',
                'label' => 'Activate Hero Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_404_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'required' => array(
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_404_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_404_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_404_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    )
                ),
                'required' => array(
                    'ut_404_hero_overlay' => 'on',
                    'ut_404_hero_overlay_pattern' => 'on'
                )
            ),

            /* Archive */

            array(
                'id' => 'ut_archive_setting_headline',
                'label' => 'Archive',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),
            
            array(
                'id' => 'ut_archive_hero_height',
                'label' => 'Hero Height for all Archives',
                'desc' => 'Drag the handle to set the hero height. Default: 120',
                'std' => '100',
                'type' => 'numeric-slider',
                'min_max_step' => '50,100,1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),
        
            array(
                'id' => 'ut_archive_hero_background_color',
                'label' => 'Hero Background Color',
                'desc' => '<strong>(optional)</strong>',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_parallax',
                'label' => 'Activate Parallax',
                'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                'std' => 'off',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'On'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'Off'
                    )
                )

            ),

            array(
                'id' => 'ut_archive_hero_background_image',
                'label' => 'Hero Background Image',
                'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option for this section has been set to "on".',
                'type' => 'background',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings'
            ),

            array(
                'id' => 'ut_archive_hero_overlay',
                'label' => 'Activate Hero Overlay?',
                'desc' => 'Covers your hero with an optional color and 3 different patterns.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!',
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ) /* end choices */
            ),

            array(
                'id' => 'ut_archive_hero_overlay_color',
                'label' => 'Hero Overlay Color',
                'desc' => 'Set your desired overlay color. You can use the handle below to change the color opacity.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'required' => array(
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_color_opacity',
                'label' => 'Hero Overlay Color Opacity',
                'desc' => 'Drag the handle to set the opacity for hero overlay color.',
                'type' => 'numeric-slider',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'min_max_step' => '0,1,0.05',
                'required' => array(
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_pattern',
                'label' => 'Activate Hero Overlay Pattern?',
                'desc' => 'A repeated decorative overlay pattern.',
                'std' => 'on',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'on',
                        'label' => 'yes, please!'
                    ),
                    array(
                        'value' => 'off',
                        'label' => 'no, thanks!'
                    )
                ),
                'required' => array(
                    'ut_archive_hero_overlay' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_overlay_pattern_style',
                'label' => 'Hero Overlay Pattern Style',
                'desc' => '<strong>(optional)</strong>',
                'std' => 'style_one',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
                'choices' => array(
                    array(
                        'value' => 'style_one',
                        'label' => 'Style One'
                    ),
                    array(
                        'value' => 'style_two',
                        'label' => 'Style Two'
                    ),
                    array(
                        'value' => 'style_three',
                        'label' => 'Style Three'
                    )
                ),
                'required' => array(
                    'ut_archive_hero_overlay' => 'on',
                    'ut_archive_hero_overlay_pattern' => 'on'
                )
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_settings_headline',
                'label' => 'Scroll Down Arrow',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_scroll_position',
                'label' => 'Scroll Down Arrow Horizontal Position',
                'desc' => 'Drag the handle to set your desired horizontal position.',
                'type' => 'numeric_slider',
                'std' => '50',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_scroll_position_vertical',
                'label' => 'Scroll Down Arrow Vertical Position',
                'desc' => 'Drag the handle to set your desired vertical position.',
                'type' => 'numeric_slider',
                'std' => '10',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            array(
                'id' => 'ut_archive_hero_down_arrow_color',
                'label' => 'Scroll Down Arrow Color',
                'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                'type' => 'colorpicker',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_system_page_archive_settings',
            ),

            /*
            | Custom CSS
            */

            array(
                'id' => 'ut_custom_css_settings_headline',
                'label' => 'Custom CSS',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_css_settings',
            ),

            array(
                'id' => 'ut_custom_css',
                'label' => 'Custom CSS',
                'desc' => 'Insert your custom CSS code right in here if you are not planing to use the delivered child theme. This custom CSS will be directly hooked into the wp head right after all other Stylesheets.',
                'type' => 'css',
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_custom_css_settings'
            ),

            /*
            | SEO
            */

            array(
                'id' => 'ut_seo_settings_headline',
                'label' => 'SEO',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings',
            ),

            array(
                'id' => 'ut_google_analytics',
                'label' => 'Google Analytics ID',
                'desc' => 'Enter your Google Analytics ID here to track your site with Google Analytics. <strong>Please insert ID only!</strong>',
                'type' => 'text',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_seo_settings'
            ),

            /*
            |--------------------------------------------------------------------------
            | Cache Options - needs overwork 
            |--------------------------------------------------------------------------
                
          
            array(
                'id'          => 'ut_cache_setting_headline',
                'label'       => 'One Page Cache',
                'type'        => 'panel_headline',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ),
          
            array(
                'id'          => 'ut_use_cache',
                'label'       => 'Use Cache',
                'desc'        => 'This option will cache your one page. We recommend to turn this option off when developing the site or adding new content. This cache stores CSS / JS and the main Query for our frontpage. For more and advanced caching options please use a Cache Plugin.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
                'std'          => 'off',
                'choices'     => array( 
                    array(
                        'value'       => 'off',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'on',
                        'label'       => 'on'
                    )
                ),
            ),
              
            array(
                'id'          => 'ut_cache_ltime',
                'label'       => 'Cache Lifetime',
                'desc'        => 'In Minutes, for example : 10',
                'type'        => 'text',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_cache_settings',
            ), */


            /*
            |--------------------------------------------------------------------------
            | Lightbox Options
            |--------------------------------------------------------------------------
            */

            array(
                'id' => 'ut_lightbox_setting_headline',
                'label' => 'Lightbox Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_lightbox_settings',
            ),
            
            array(
                'id'          => 'ut_lightgallery_download',
                'label'       => 'Enable download button in Lightbox?',
                'desc'        => 'You can optionally allow images to be downloaded from your lightbox.',
                'type'        => 'select',
                'section'     => 'ut_advanced_settings',
                'subsection'  => 'ut_lightbox_settings',
                'std'         => 'off',
                'choices'     => array( 
                    array(
                        'value'       => 'false',
                        'label'       => 'off'
                    ),
                    array(
                        'value'       => 'true',
                        'label'       => 'on'
                    )
                ),
            ),
            
            
        
            /*
            |--------------------------------------------------------------------------
            | Visual Composer Options
            |--------------------------------------------------------------------------
            */
            
            array(
                'id' => 'ut_spacing_settings_headline',
                'label' => 'Content Spacing Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),        
        
            array(
                'id' => 'ut_section_spacing_system',
                'label' => 'Select Default Section Spacing',
                'desc' => 'The theme has an automated way to calculate the default spacings between sections. With the help of this option you can adjust the default spacing. This setting can be individually overwritten by the section settings themselves. Default: 80. Note: This does not affect single posts.',
                'type' => 'select',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings',
                'std' => '80',
                'choices' => array(
                    array(
                        'value' => '200',
                        'label' => '200'
                    ),
                    array(
                        'value' => '160',
                        'label' => '160'
                    ),
                    array(
                        'value' => '120',
                        'label' => '120'
                    ),
                    array(
                        'value' => '80',
                        'label' => '80'
                    )
                ),
            ),
            
            array(
                'id' => 'ut_blog_with_hero_settings_headline',
                'label' => 'Blog with Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_padding_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_padding_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_without_hero_settings_headline',
                'label' => 'Blog without Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_no_hero_padding_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_blog_no_hero_padding_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px)',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_with_hero_settings_headline',
                'label' => 'Page with Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_padding_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_padding_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_without_hero_settings_headline',
                'label' => 'Page without Hero',
                'type' => 'section_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_no_hero_padding_top',
                'label' => 'Padding Top',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 80px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),

            array(
                'id' => 'ut_page_no_hero_padding_bottom',
                'label' => 'Padding Bottom',
                'type' => 'text',
                'desc' => 'include "px" in your string. e.g. 150px (default: 60px). Only works on pages, where Visual Composer is not being used.',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_content_spacing_settings'
            ),
        
        
            /*
            |--------------------------------------------------------------------------
            | Mailchimp Color Settings
            |--------------------------------------------------------------------------
            */
        
            array(
                'id' => 'ut_mailchimp_settings_headline',
                'label' => 'Mailchimp Settings',
                'type' => 'panel_headline',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_mailchimp_settings'
            ),         
        
            array(
                'id' => 'ut_mailchimp_color_skins',
                'label' => 'Mailchimp Color Skins',
                'desc' => sprintf( 'Create as many Mail Chimp Form Skins as you need. This option set is only for forms created with %s. Once you created a skin, please edit your mailchimp form, switch to the "Appearance" tab and select your skin.', '<a href="https://mc4wp.com/" target="_blank">Mailchimp for WordPress</a>' ),
                'type' => 'list-item',
                'list_title' => false,
                'markup' => '1_1',
                'section' => 'ut_advanced_settings',
                'subsection' => 'ut_mailchimp_settings',
                'settings' => array(
                    
                    array(
                        'id' => 'title',
                        'label' => 'Enter a Skin Title',
                        'desc' => 'Used for internal use.',
                        'type' => 'text',
                        'class' => 'option-tree-setting-title',    
                    ),
        
                    array(
                        'id' => 'unique_id',
                        'label' => 'ID',
                        'desc' => '',
                        'type' => 'unique_id',
                    ),
                    
                    array(
                        'id' => 'label_color',
                        'label' => 'Label Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
                    
                    array(
                        'id' => 'setting_headline',
                        'label' => 'Input Colors',
                        'type' => 'section_headline',                        
                    ),
        
                    array(
                        'id' => 'input_text_color',
                        'label' => 'Input Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
                    
                    array(
                        'id' => 'input_background_color',
                        'label' => 'Input Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'input_border_color',
                        'label' => 'Input Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'setting_headline',
                        'label' => 'Input Focus Colors',
                        'type' => 'section_headline',                        
                    ),
                    
                    array(
                        'id' => 'input_text_color_focus',
                        'label' => 'Input Focus Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'input_background_color_focus',
                        'label' => 'Input Focus Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'input_border_color_focus',
                        'label' => 'Input Focus Border Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'setting_headline',
                        'label' => 'Submit Button Colors',
                        'label' => 'Submit Button Colors',
                        'type' => 'section_headline',                        
                    ),
                    
                    array(
                        'id' => 'submit_button_text_color',
                        'label' => 'Submit Button Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
                    
                    array(
                        'id' => 'submit_button_background_color',
                        'label' => 'Submit Button Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
        
                    array(
                        'id' => 'submit_button_text_color_hover',
                        'label' => 'Submit Button Hover Text Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
                    
                    array(
                        'id' => 'submit_button_background_color_hover',
                        'label' => 'Submit Button Hover Background Color',
                        'desc' => '',
                        'type' => 'colorpicker',
                        'mode' => 'rgb',                        
                    ),
                    
                    array(
                        'id' => 'submit_button_font_weight',
                        'label' => 'Submit Button Font Weight',
                        'desc' => 'The font-weight property sets how thick or thin characters in text should be displayed.',
                        'type' => 'select',
                        'std' => 'bold',
                        'choices' => array(
                            array(
                                'value' => 'normal',
                                'label' => 'normal'
                            ),
                            array(
                                'value' => 'bold',
                                'label' => 'bold'
                            )

                        )

                    ),
        
                ),
        
            ),

        )

    );

    /* allow settings to be filtered before saving */
    return apply_filters( 'ut_theme_option_settings', $ut_settings );

}

add_action( 'admin_init', '_ut_theme_options' );


function _ut_get_theme_options_submenu( $panel_id ) {

    if ( empty( $panel_id ) ) {
        return;
    }

    $_ut_theme_options = _ut_theme_options();

    foreach ( $_ut_theme_options[ 'sections' ] as $section ) {

        if ( $section[ 'id' ] == $panel_id ) {

            return $section[ 'subsections' ];

        }

    }

}