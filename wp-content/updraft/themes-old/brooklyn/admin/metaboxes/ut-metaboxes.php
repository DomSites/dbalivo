<?php

if ( !function_exists( 'ut_bklyn_metabox_settings' ) ):

    function ut_bklyn_metabox_settings() {

        $post_type_support_1 = array( 'page', 'portfolio', 'product', 'post' );
        $post_type_support_2 = array( 'page', 'portfolio', 'product' );
        $post_type_support_3 = array( 'portfolio' );
        $post_type_support_4 = array( 'page' );

        $settings = apply_filters( 'ut_bklyn_metabox_settings', array(

            'id' => 'ut-metapanel',
            'title' => 'United Themes - Metapanel',
            'pages' => array( 'page', 'portfolio', 'product', /*'post'*/ ),
            'context' => 'normal',
            'type' => 'tabs',
            'priority' => 'low',
            'sections' => array(

                array(
                    'id' => 'ut-portfolio-details',
                    'title' => 'Portfolio Details',
                ),
                array(
                    'id' => 'ut-hero-type',
                    'title' => 'Hero Type',
                    'data' => array(
                        'portfolio' => esc_html__( 'One Page Portfolio Type', 'unitedthemes' ),
                        'page' => esc_html__( 'Hero Type', 'unitedthemes' )
                    )
                ),
                array(
                    'id' => 'ut-hero-settings',
                    'title' => 'Hero Content',
                    'subsection' => array(

                        array(
                            'title' => 'Hero Content Colors',
                            'id' => 'ut-hero-content-color-settings',
                        ),
                        array(
                            'title' => 'Hero Custom HTML',
                            'id' => 'ut-hero-content-custom-html-settings',
                        ),
                        array(
                            'title' => 'Hero Caption Slogan',
                            'id' => 'ut-hero-content-caption-slogan-settings',
                        ),
                        array(
                            'title' => 'Hero Caption Title',
                            'id' => 'ut-hero-content-caption-title-settings',
                        ),
                        array(
                            'title' => 'Hero Caption Description',
                            'id' => 'ut-hero-content-caption-description-settings',
                        ),
                        array(
                            'title' => 'Hero Buttons',
                            'id' => 'ut-hero-content-button-settings',
                        ),

                    ),
                ),
                array(
                    'id' => 'ut-hero-styling',
                    'title' => 'Hero Styling',
                ),
                array(
                    'id' => 'ut-page-header-settings',
                    'title' => 'Page Title Settings'
                ),
                array(
                    'id' => 'ut-page-settings',
                    'title' => 'Page Settings'
                ),
                array(
                    'id' => 'ut-color-settings',
                    'title' => 'Color Settings'
                ),
                array(
                    'id' => 'ut-section-settings',
                    'title' => 'Section Settings',
                ),
                array(
                    'id' => 'ut-section-parallax-settings',
                    'title' => 'Section Parallax Settings',
                ),
                array(
                    'id' => 'ut-section-video-settings',
                    'title' => 'Section Video Settings'
                ),
                array(
                    'id' => 'ut-section-overlay-settings',
                    'title' => 'Section Overlay Settings'
                ),
                array(
                    'id' => 'ut-manage-team',
                    'title' => 'Manage Team'
                ),
                array(
                    'id' => 'ut-contact-section',
                    'title' => 'Contact Section'
                ),
                array(
                    'id' => 'ut-navigation-section',
                    'title' => 'Navigation'
                ),

            ),

            'fields' => array(

                /** 
                 * Hero Settings 
                 */

                array(
                    'id' => 'ut-hero-settings',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Hero Type',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_type',
                    'type' => 'radio_group_button',
                    'label' => 'Page Type',
                    'metapanel' => 'ut-color-settings',
                    'std' => 'page',
                    'choices' => array(
                        array(
                            'label' => 'Use Page as Regular Page',
                            'for' => array(),
                            'value' => 'page'
                        ),
                        array(
                            'label' => 'Use Page as Section',
                            'for' => array(),
                            'value' => 'section'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_activate_page_hero',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Hero',
                    'desc' => 'Activate Hero for this page?',
                    'type' => 'radio_group_button',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on',
                            'for' => array(),
                            'class' => 'ut-on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off',
                            'for' => array(),
                            'class' => 'ut-off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_type',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Choose Hero Type',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_header_type' ),
                    'desc' => 'Choose between 8 different types.',
                    'choices' => array(

                        array(
                            'value' => 'image',
                            'label' => 'Hero Image',
                            'alt_label' => 'Single Image'
                        ),

                        array(
                            'value' => 'splithero',
                            'label' => 'Hero Highlighted (formerly Split Hero)'
                        ),

                        array(
                            'value' => 'video',
                            'label' => 'Hero Video',
                            'alt_label' => 'Video'
                        ),

                        array(
                            'value' => 'transition',
                            'label' => 'Hero Fancy Slider'
                        ),

                        array(
                            'value' => 'slider',
                            'label' => 'Hero Slider (will be updated)',
                            'alt_label' => 'Gallery'
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

                    ), /* end choices */
                    'required' => array(
                        'ut_activate_page_hero' => 'on'
                    ),
                    'pages' => $post_type_support_2,

                ),

                /**
                 * Image Tab Slider
                 */

                array(
                    'id' => 'ut_page_hero_tabs_headline',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Tablet Headline',
                    'desc' => 'This headline will be displayed above the tablet navigation.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs_headline_style',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Tablet Headline Font Style',
                    'desc' => 'Choose a font style for Tablet Headline. Choose "Default" if you like to use the global styling from the Theme Options Panel.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default'
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,

                ),


                array(
                    'id' => 'ut_page_hero_tabs_tablet_color',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Tablet Color',
                    'desc' => 'Select your desired tablet color.',
                    'type' => 'select',
                    'std' => 'black',
                    'choices' => array(
                        array(
                            'value' => 'black',
                            'label' => 'Black'
                        ),
                        array(
                            'value' => 'white',
                            'label' => 'White'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs_tablet_shadow',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Tablet Shadow',
                    'desc' => 'Activate a decent shadow?',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_tabs',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Manage Tablet Images',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'list-item',
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'description',
                            'label' => 'Image Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link_one_url',
                            'label' => 'Left Button URL',
                            'type' => 'text'
                        ),
                        array(
                            'id' => 'link_one_text',
                            'label' => 'Left Button Text',
                            'type' => 'text'
                        ),
                        array(
                            'id' => 'link_two_url',
                            'label' => 'Right Button URL',
                            'type' => 'text'
                        ),
                        array(
                            'id' => 'link_two_text',
                            'label' => 'Right Button Text',
                            'type' => 'text'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'tabs'
                    ),
                    'pages' => $post_type_support_2,

                ),

                /*
                | Image Type
                */

                array(
                    'id' => 'ut_page_hero_height', // new key
                    'label' => 'Custom Hero Height',
                    'desc' => 'Use the slider bar to set your desired height in %.',
                    'metapanel' => 'ut-hero-type',
                    'type' => 'numeric_slider',
                    'std' => '100',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|video|animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_parallax',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Parallax',
                    'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                    'type' => 'select',
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs',
                        'ut_page_hero_rain_effect' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_rain_effect',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Rain Effect',
                    'type' => 'select',
                    'std' => 'off',
                    'desc' => 'Keep in mind, activating this option can reduce your website performance.',
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_rain_sound',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Rain Sound',
                    'desc' => 'The sound of rain is one of the most relaxing sounds in existence and becomes available to your visitors with activating this option.',
                    'type' => 'select',
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero',
                        'ut_page_hero_rain_effect' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_image',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Background Image',
                    'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080 (optimal size) pixel. Also try to avoid uploading images with more than 200-300Kb size. Keep in mind, that you are not able to set a background position or attachment if the parallax option has been set to "on".',
                    'type' => 'background',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_image_tablet',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Background Image (Tablet)',
                    'desc' => 'Recommended size 1280x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'background',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_image_mobile',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Background Image (Mobile)',
                    'desc' => 'Recommended size 720x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'background',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'image|splithero|tabs'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_split_content_headline',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Content',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero'
                    ),
                ),
            
                array(
                    'id' => 'ut_page_hero_split_content_type',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Content Type',
                    'desc' => 'Wether you like to display an image, video or a contact form.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'image',
                            'for' => array( 'ut_page_hero_split_image', 'ut_page_hero_split_image_max_width', 'ut_page_hero_split_image_effect' ),
                            'label' => 'Image'
                        ),
                        array(
                            'value' => 'video',
                            'label' => 'Video'
                        ),
                        array(
                            'value' => 'form',
                            'label' => 'Contact Form 7'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_video',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Video',
                    'desc' => 'This video will display on the right side of the hero caption. It will not display on mobile devices! Please use the only embed codes from youtube or vimeo.',
                    'type' => 'textarea_simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_form',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Contact Form 7',
                    'desc' => 'This form will display on the right side of the hero caption.',
                    'type' => 'textarea_simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'form'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Highlighted Hero Video Box',
                    'desc' => 'Display a shadowed box around the video.',
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video'
                    ),
                    'pages' => $post_type_support_2
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box_style',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Video Box Style',
                    'desc' => 'Select between 3 nice box styles. The box style will additionally adjust its style depending on the chosen Hero Style.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'themecolor',
                            'label' => 'Themecolor'
                        ),
                        array(
                            'value' => 'light',
                            'label' => 'Light'
                        ),
                        array(
                            'value' => 'dark',
                            'label' => 'Dark'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video',
                        'ut_page_hero_split_video_box' => 'on'
                    ),
                    'pages' => $post_type_support_2
                ),

                array(
                    'id' => 'ut_page_hero_split_video_box_padding',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Video Box Padding',
                    'desc' => 'Set padding of the box in pixel e.g. 20px. default: 20px',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'video',
                        'ut_page_hero_split_video_box' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Image',
                    'desc' => 'This image will display on the right side of the Hero Caption. It will not display on mobile devices!',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image_effect',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Image Animation Effect',
                    'desc' => 'Choose animation effect for Highlighted Hero Image.',
                    'type' => 'select',
                    'std' => 'none',
                    'choices' => array(
                        array(
                            'value' => 'none',
                            'label' => 'No effect'
                        ),
                        array(
                            'value' => 'fadeIn',
                            'label' => 'Fade In'
                        ),
                        array(
                            'value' => 'slideInRight',
                            'label' => 'Slide in Right'
                        ),
                        array(
                            'value' => 'slideInLeft',
                            'label' => 'Slide in Left'
                        ),
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_split_image_max_width',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Highlighted Hero Image Max Width',
                    'desc' => 'Adjust this value until the Highlighted Hero Image fits inside the Hero. Default "60".',
                    'type' => 'numeric-slider',
                    'std' => '60',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'splithero',
                        'ut_page_hero_split_content_type' => 'image',
                    ),
                    'pages' => $post_type_support_2,
                ),

                /*
                | Animated Image Type
                */
            
                array(
                    'id' => 'ut_page_hero_animated_image_speed',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Animated Background Animation Speed',
                    'desc' => 'Set speed of animations, in seconds. e.g. 60',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_direction',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Animated Background Animation Direction',
                    'desc' => 'Set animation direction',
                    'type' => 'select',
                    'std' => 'left',
                    'choices' => array(
                        array(
                            'value' => 'right',
                            'label' => 'Right'
                        ),
                        array(
                            'value' => 'left',
                            'label' => 'Left'
                        ),                        
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_direction_alternate',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Alternate Animation?',
                    'desc' => 'Alternate Image Direction Animation after each animation cycle?',
                    'std' => 'on',   
                    'type' => 'select',
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
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_animated_image_cover',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Cover Image?',
                    'desc' => 'Scale the background image to be as large as possible so that the hero area is completely covered by the background image. This can cause jumping issues at the end of the animation if the uploaded image is larger than the screen.',
                    'std' => 'off',   
                    'type' => 'select',
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
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Animated Background Image',
                    'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_animated_image_mobile',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Fallback Image for Mobile',
                    'desc' => 'The Image Background Animation is turned off for mobiles. Therefore we recommend to upload a poster image which will display instead.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'animatedimage'
                    ),
                    'pages' => $post_type_support_2,
                ),            

                /*
                | Slider Type
                */
                array(
                    'id' => 'ut_page_hero_slider_animation_speed',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Animation Speed',
                    'desc' => 'Set speed of animations, in milliseconds.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_slideshow_speed',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Slideshow Speed',
                    'desc' => 'Set speed of the slideshow cycling, in milliseconds.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Slider Items',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'list-item',
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'style',
                            'label' => 'Hero Caption Style',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'ut-hero-style-1',
                                    'label' => 'Style One'
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
                                ),

                            )
                        ),

                        array(
                            'id' => 'font_style',
                            'label' => 'Hero Caption Font Style',
                            'desc' => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Settings).',
                            'type' => 'select',
                            'std' => 'global',
                            'choices' => array(
                                array(
                                    'value' => 'global',
                                    'label' => 'Default'
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
                            )
                        ),

                        array(
                            'id' => 'align',
                            'label' => 'Choose Caption Alignment',
                            'type' => 'select',
                            'desc' => '',
                            'std' => 'center',
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
                            ),
                        ),

                        array(
                            'id' => 'direction',
                            'label' => 'Caption Animation Direction',
                            'std' => 'top',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'top',
                                    'label' => 'Top'
                                ),
                                array(
                                    'value' => 'left',
                                    'label' => 'Left'
                                ),
                                array(
                                    'value' => 'right',
                                    'label' => 'Right'
                                ),
                                array(
                                    'value' => 'bottom',
                                    'label' => 'Bottom'
                                )
                            )
                        ),

                        array(
                            'id' => 'expertise',
                            'label' => 'Hero Caption Slogan',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),

                        array(
                            'id' => 'description',
                            'label' => 'Hero Caption',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'catchphrase',
                            'label' => 'Hero Caption Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'type' => 'text',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link_description',
                            'label' => 'Link Button Text',
                            'type' => 'text'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_slider_arrow_background_color',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Arrow Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_background_color_hover',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Arrow Background Color Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_color',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_hero_slider_arrow_color_hover',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Arrow Color Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'slider'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Fancy Slider
                 */

                array(
                    'id' => 'ut_page_hero_fancy_slider_height',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Slider Height',
                    'desc' => 'Select your desired slider height.',
                    'type' => 'select',
                    'std' => '75',
                    'choices' => array(
                        array(
                            'value' => '60',
                            'label' => '60% Height'
                        ),
                        array(
                            'value' => '75',
                            'label' => '75% Height'
                        ),
                        array(
                            'value' => '100',
                            'label' => '100% Height'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider_effect',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Slide Effect',
                    'desc' => 'Choose an effect for your slider, this effect will affect all slides.',
                    'type' => 'select',
                    'std' => 'fxSoftScale',
                    'choices' => array(
                        array(
                            'value' => 'fxSoftScale',
                            'label' => 'Soft scale'
                        ),
                        array(
                            'value' => 'fxPressAway',
                            'label' => 'Press away'
                        ),
                        array(
                            'value' => 'fxSideSwing',
                            'label' => 'Side Swing'
                        ),
                        array(
                            'value' => 'fxFortuneWheel',
                            'label' => 'Fortune wheel'
                        ),
                        array(
                            'value' => 'fxSwipe',
                            'label' => 'Swipe'
                        ),
                        array(
                            'value' => 'fxPushReveal',
                            'label' => 'Push reveal'
                        ),
                        array(
                            'value' => 'fxSnapIn',
                            'label' => 'Snap in'
                        ),
                        array(
                            'value' => 'fxLetMeIn',
                            'label' => 'Let me in'
                        ),
                        array(
                            'value' => 'fxStickIt',
                            'label' => 'Stick it'
                        ),
                        array(
                            'value' => 'fxArchiveMe',
                            'label' => 'Archive me'
                        ),
                        array(
                            'value' => 'fxVGrowth',
                            'label' => 'Vertical growth'
                        ),
                        array(
                            'value' => 'fxSlideBehind',
                            'label' => 'Slide Behind'
                        ),
                        array(
                            'value' => 'fxSoftPulse',
                            'label' => 'Soft Pulse'
                        ),
                        array(
                            'value' => 'fxEarthquake',
                            'label' => 'Earthquake'
                        ),
                        array(
                            'value' => 'fxCliffDiving',
                            'label' => 'Cliff diving'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_slider',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Fancy Slider Items',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'markup' => '1_1',
                    'type' => 'list-item',
                    'settings' => array(
                        array(
                            'id' => 'image',
                            'label' => 'Image',
                            'desc' => 'For best image results, we recommend to upload an image with minimum size of 1600 x (set height) pixel or maximum size of 1920x (set height) (optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size.',
                            'type' => 'upload',
                        ),
                        array(
                            'id' => 'style',
                            'label' => 'Hero Caption Style',
                            'type' => 'select',
                            'choices' => array(
                                array(
                                    'value' => 'ut-hero-style-1',
                                    'label' => 'Style One'
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
                                ),

                            ),

                        ),
                        array(
                            'id' => 'align',
                            'label' => 'Choose Caption Alignment',
                            'type' => 'select',
                            'std' => 'center',
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
                            )
                        ),
                        array(
                            'id' => 'expertise',
                            'label' => 'Hero Caption Slogan',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'description',
                            'label' => 'Hero Caption',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'catchphrase',
                            'label' => 'Hero Caption Description',
                            'type' => 'textarea-simple',
                            'rows' => '3'
                        ),
                        array(
                            'id' => 'link',
                            'label' => 'Link',
                            'desc' => 'Leave empty to add scroll effect to main content.',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'link_description',
                            'label' => 'Link Button Text',
                            'type' => 'text'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'transition',
                    ),
                    'pages' => $post_type_support_2,
                ),


                /**
                 * Video Type
                 */

                array(
                    'id' => 'ut_page_video_source',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video Source',
                    'desc' => 'Select your desired source for videos.',
                    'type' => 'select',
                    'std' => 'youtube',
                    'choices' => array(
                        array(
                            'value' => 'youtube',
                            'label' => 'Youtube'
                        ),
                        array(
                            'value' => 'vimeo',
                            'label' => 'Vimeo'
                        ),
                        array(
                            'value' => 'selfhosted',
                            'label' => 'Selfthosted'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        )
                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /* youtube video */
                array(
                    'id' => 'ut_page_video',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_video_start_at',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video Start At',
                    'desc' => '<strong>(optional)</strong>. Set the seconds the video should start at. e.g. 5',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_video_stop_at',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video End At',
                    'desc' => '<strong>(optional)</strong>. Set the seconds the video should stop at e.g. 5',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                /* vimeo video */
                array(
                    'id' => 'ut_page_video_vimeo',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g.  . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
            
            
            
            
            
                array(
                    'id' => 'ut_page_video_custom',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video Embedded Code',
                    'desc' => 'Please insert the complete embedded code of your favorite video hoster!',
                    'type' => 'textarea-simple',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mp4',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_ogg',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_webm',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_loop',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Loop Video',
                    'desc' => 'Whether the video should start over again when finished.',
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
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_preload',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Preload Video',
                    'desc' => 'Whether the video should be loaded when the page loads.',
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
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_sound',
                    'metapanel' => 'ut-hero-type',
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
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_volume',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Video Volume',
                    'desc' => '1-100 - default 5',
                    'std' => '5',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube|selfhosted|vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_mute_button',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Mute Button?',
                    'desc' => 'Whether the video mute button is displayed or not.',
                    'type' => 'select',
                    'std' => 'hide',
                    'choices' => array(
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )

                    ),
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                        'ut_page_video_source' => 'youtube|selfhosted|vimeo'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_video_poster',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Poster Image',
                    'desc' => 'This image will be displayed before the video starts.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_video_poster_tablet',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Poster Image Tablet',
                    'desc' => 'Recommended size 1280x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_video_poster_mobile',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Poster Image Mobile',
                    'desc' => 'Recommended size 720x1280. We recommend using <a href="https://goo.gl/Sj149K" target="_blank">Kraken.io</a> services for image optimization.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Custom Shortcode
                 */

                array(
                    'id' => 'ut_page_hero_custom_shortcode',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Custom Shortcode',
                    'desc' => 'Perfect for plugin shortcodes such as Revolution Slider or Layer Slider.',
                    'type' => 'text',
                    'required' => array(
                        'ut_activate_page_hero' => 'on',
                        'ut_page_hero_type' => 'custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Hero Styling
                 */

                array(
                    'id' => 'ut_page_hero_global_style_headline',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Styling',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_background_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Background Color',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_background_color' ),
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_hero_styling',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Caption Style',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_style_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Caption Style Settings?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_style',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Caption Style',
                    'desc' => 'Choose between 10 different Hero Caption styles. If you are using a slider as your desired header type, you can define an individual style for each slide.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_style' ),
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
                        ),

                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'splithero|image|animatedimage|tabs|video',
                        'ut_page_hero_style_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_page_hero_font_style_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Caption Font Style Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_font_style',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Caption Font Style',
                    'desc' => 'Please keep in mind, that your selected font needs to support the selected font weight.',
                    'type' => 'select',
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
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                        'ut_page_hero_font_style_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_width_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Content Width Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_width',
                    'label' => 'Hero Content Width',
                    'desc' => 'Decide if the hero content gets stretched to fullwidth or displays centered.',
                    'metapanel' => 'ut-hero-styling',
                    'std' => ot_get_option( 'ut_global_hero_width' ),
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => 'centered',
                            'label' => 'Grid Based'
                        ),
                        array(
                            'value' => 'fullwidth',
                            'label' => 'Fullwidth'
                        ),
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage',
                        'ut_page_hero_width_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_align_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Caption Alignment Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_align',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Choose Hero Caption Alignment',
                    'desc' => 'Specifies the default alignment for the caption inside the hero.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_align' ),
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
                    ),
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                        'ut_page_hero_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_v_align_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Caption Vertical Alignment Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage',
                    ),
                ),
            
                array(
                    'id' => 'ut_page_hero_v_align',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Choose Hero Caption Vertical Alignment',
                    'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_v_align' ),
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
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage',
                        'ut_page_hero_v_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_v_align_margin_bottom',
                    'label' => 'Hero Content Margin Bottom',
                    'desc' => 'Leave this field empty if you like to use the global value. Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
                    'metapanel' => 'ut-hero-styling',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_hero_type' => 'image|video|animatedimage',
                        'ut_page_hero_v_align' => 'bottom',
                        'ut_page_hero_v_align_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_hero_overlay_headline',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Overlay Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video|transition',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Overlay Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video|transition',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Activate Hero Overlay?',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'std' => ot_get_option( 'ut_global_hero_overlay' ),
                    'type' => 'select',
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
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video|transition',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Overlay Color',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_color' ),
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video|transition',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_page_hero_overlay_color_opacity',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Overlay Color Opacity',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'std' => ot_get_option( 'ut_global_hero_overlay_color_opacity' ),
                    'min_max_step' => '0,1,0.05',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video|transition',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_pattern',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Activate Hero Overlay Pattern',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_pattern' ),
                    'type' => 'select',
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
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_pattern_style',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Overlay Pattern Style',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_pattern_style' ),
                    'type' => 'select',
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
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video',
                        'ut_page_hero_overlay' => 'on',
                        'ut_page_hero_overlay_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_headline',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Overlay Effect Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),


                array(
                    'id' => 'ut_page_hero_overlay_effect_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Overlay Effect Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Activate Overlay Animation Effect?',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect' ),
                    'type' => 'select',
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
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_style',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Choose Overlay Animation Effect',
                    'desc' => '<strong>(optional)</strong>',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect_style' ),
                    'type' => 'select',
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
                        'ut_page_hero_overlay_effect' => 'on',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_overlay_effect_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Overlay Effect Color',
                    'desc' => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_overlay_effect_color' ),
                    'required' => array(
                        'ut_page_hero_overlay_effect' => 'on',
                        'ut_page_hero_overlay_effect_global_overwrite' => 'off',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_headline',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Hero Border Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Border Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Activate Border?',
                    'desc' => 'A customized CSS border at the bottom of the hero area.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_border_bottom' ),
                    'toplevel' => false,
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
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Border Bottom Color',
                    'type' => 'colorpicker',
                    'std' => 'ut_global_hero_border_bottom_color',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_width',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Border Bottom Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'std' => ot_get_option( 'ut_global_hero_border_bottom_width' ),
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'

                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_border_bottom_style',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Border Bottom Style',
                    'type' => 'select',
                    'std' => 'ut_global_hero_border_bottom_style',
                    'desc' => 'Creates a border at the bottom of the hero.',
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
                    'std' => 'solid',
                    'required' => array(
                        'ut_page_hero_border_bottom' => 'on',
                        'ut_page_hero_border_bottom_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_fancy_border_global_overwrite',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Use Global Hero Fancy Border Setting?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                ),

                array(
                    'id' => 'ut_page_hero_fancy_border',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Activate Fancy Border?',
                    'desc' => 'Allows you to create a nice fancy border at the bottom of your hero area.',
                    'type' => 'select',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border' ),
                    'toplevel' => false,
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
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_fancy_border_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Color',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_color' ),
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_fancy_border_background_color',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_background_color' ),
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_fancy_border_size',
                    'metapanel' => 'ut-hero-styling',
                    'label' => 'Size',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                    'type' => 'text',
                    'std' => ot_get_option( 'ut_global_hero_fancy_border_size' ),
                    'required' => array(
                        'ut_page_hero_fancy_border' => 'on',
                        'ut_page_hero_fancy_border_global_overwrite' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /**
                 * Hero Settings
                 */

                array(
                    'id' => 'ut_hero_color_settings',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Content Colors',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_hero_global_content_style',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Use Global Hero Content Color Settings?',
                    'desc' => '<strong>(optional)</strong>',
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

                    ), /* end choices */
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_color',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Caption Slogan Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative color for <strong>Hero Caption Slogan</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_global_content_style' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_background_color',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Caption Slogan Background Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative background color for <strong>Hero Caption Slogan</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_global_content_style' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_title_color',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Caption Title Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Hero Caption Title</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_global_content_style' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_color',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Caption Description Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Hero Caption Description</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_global_content_style' => 'off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_line_color',
                    'metapanel' => 'ut-hero-content-color-settings',
                    'label' => 'Hero Caption Description Line Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Hero Caption Description Line</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_hero_global_content_style' => 'off',
                        'ut_page_hero_style' => 'ut-hero-style-3',
                    ),
                    'pages' => $post_type_support_2,
                ),


                /* custom html */
                array(
                    'id' => 'ut_hero_settings',
                    'metapanel' => 'ut-hero-content-custom-html-settings',
                    'label' => 'Custom HTML',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_custom_hero_html',
                    'metapanel' => 'ut-hero-content-custom-html-settings',
                    'label' => 'Custom Hero HTML',
                    'desc' => 'This element appears above the Hero Caption Slogan.',
                    'type' => 'textarea',
                    'markup' => '1_1',
                    'rows' => '10',
                    'pages' => $post_type_support_2,
                ),

                /* caption slogan */
                array(
                    'id' => 'ut_hero_caption_slogan_headline',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Hero Caption Slogan Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Hero Caption Slogan',
                    'desc' => 'This element appears above the Hero Caption.',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_caption_description_top_websafe_font_style',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Hero Caption Slogan Font Setting',
                    'desc' => 'Please keeop in mind, that your global font needs to support the available font weight options.',
                    'type' => 'typography',
                    'markup' => '1_1',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_caption_slogan_margin',
                    'metapanel' => 'ut-hero-content-caption-slogan-settings',
                    'label' => 'Hero Caption Slogan Margin Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px)',
                    'type' => 'text',
                    'class' => '',
                    'pages' => $post_type_support_2,
                ),

                /* caption title */
                array(
                    'id' => 'ut_hero_caption_title_headline',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_title',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title',
                    'desc' => 'This field also accepts HTML tags and shortcodes.',
                    'htmldesc' => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                ),
                
                /*array(
                    'id' => 'ut_page_caption_title_word_rotator',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Activate Word Rotator?',
                    'desc' => 'Each new line in "Hero Caption Title" will be a separate rotation.',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),

                    ),
                    'pages' => $post_type_support_2,
            
                ),
                
                array(
                    'id'          => 'ut_page_caption_title_word_effect',
                    'metapanel'   => 'ut-hero-content-caption-title-settings',
                    'label'       => 'Word Rotator Animation Effect',
                    'desc'        => 'Select between 18 Amazing Word Rotator Animations Effects.',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'     => 'fx1',
                            'label'     => 'Franklin'
                        ),
                        array(
                            'value'     => 'fx2',
                            'label'     => 'Lawrence'
                        ),
                        array(
                            'value'     => 'fx3',
                            'label'     => 'Orange'
                        ),
                        array(
                            'value'     => 'fx4',
                            'label'     => 'Richmond'
                        ),
                        array(
                            'value'     => 'fx5',
                            'label'     => 'Abbey'
                        ),
                        array(
                            'value'     => 'fx6',
                            'label'     => 'Alice'
                        ),
                        array(
                            'value'     => 'fx7',
                            'label'     => 'Barberry'
                        ),
                        array(
                            'value'     => 'fx8',
                            'label'     => 'Cameron'
                        ),
                        array(
                            'value'     => 'fx9',
                            'label'     => 'Coffey'
                        ),
                        array(
                            'value'     => 'fx10',
                            'label'     => 'Dunham'
                        ),
                        array(
                            'value'     => 'fx11',
                            'label'     => 'Denton'
                        ),
                        array(
                            'value'     => 'fx12',
                            'label'     => 'Blake'
                        ),
                        array(
                            'value'     => 'fx13',
                            'label'     => 'Elm'
                        ),
                        array(
                            'value'     => 'fx14',
                            'label'     => 'Elton'
                        ),
                        array(
                            'value'     => 'fx5',
                            'label'     => 'Fillmore'
                        ),
                        array(
                            'value'     => 'fx6',
                            'label'     => 'Lancaster'
                        ),
                        array(
                            'value'     => 'fx17',
                            'label'     => 'Old Dock'
                        ),
                        array(
                            'value'     => 'fx18',
                            'label'     => 'Rock'
                        ),
                    ),
                    'required'    => array(
                        'ut_page_caption_title_word_rotator' => 'on'
                    ),
                    'pages'         => $post_type_support_2,
                ), */
            
                array(
                    'id' => 'ut_page_hero_font_size',
                    'metapanel'=> 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title Font Size',
                    'desc' => 'This allows you to overwrite the default font size of the theme options. Value in px, e.g. "100px". Keep in mind, that this is a max value. If there is not enough space, the theme will scale down the font.',
                    'type' => 'text',
                    'pages' => $post_type_support_2, 
                ),
                
                array(
                    'id' => 'ut_page_hero_font_weight',
                    'metapanel'=> 'ut-hero-content-caption-title-settings',
                    'desc' => 'This allows you to overwrite the default font weight of the theme options.',
                    'label' => 'Hero Caption Title Font Weight',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'value' => '',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'value' => 'normal',
                            'label' => 'normal'
                        ),
                        array(
                            'value' => '100',
                            'label' => '100'
                        ),
                        array(
                            'value' => '200',
                            'label' => '200'
                        ),
                        array(
                            'value' => '300',
                            'label' => '300'
                        ),
                        array(
                            'value' => '400',
                            'label' => '400'
                        ),  
                        array(
                            'value' => '500',
                            'label' => '500'
                        ),
                        array(
                            'value' => '600',
                            'label' => '600'
                        ),
                        array(
                            'value' => '700',
                            'label' => '700'
                        ),
                        array(
                            'value' => '800',
                            'label' => '800'
                        ),
                        array(
                            'value' => '900',
                            'label' => '900'
                        )
                    ),
                    'pages' => $post_type_support_2,            
                ),
                
                array(
                    'id' => 'ut_page_hero_font_line_height',
                    'metapanel'=> 'ut-hero-content-caption-title-settings',
                    'desc' => 'This allows you to overwrite the default font line height of the theme options.',
                    'label' => 'Hero Caption Title Font Line Height',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),
            
            
                array(
                    'id' => 'ut_page_caption_slogan_uppercase',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title Text Transform',
                    'desc' => 'Display the Hero Caption Title in uppercase letters?',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_slogan_glow',
                    'metapanel' => 'ut-hero-content-caption-title-settings',
                    'label' => 'Hero Caption Title Gloweffect',
                    'desc' => 'Activate Glow Effect for <strong>Hero Caption Title</strong>?',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* caption description */
                array(
                    'id' => 'ut_page_caption_description_headline',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Hero Caption Description Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Hero Caption Description',
                    'desc' => 'This field appears beneath the Hero Caption.',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_caption_description_websafe_font_style',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Hero Caption Description Font Setting',
                    'desc' => 'Please keeop in mind, that your global font needs to support the available font weight options.',
                    'type' => 'typography',
                    'markup' => '1_1',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_caption_description_margin',
                    'metapanel' => 'ut-hero-content-caption-description-settings',
                    'label' => 'Hero Caption Description Margin Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 10px (default: 10px)',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),
            
                /* buttons */
                array(
                    'id' => 'ut-hero-button-settings',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Hero Buttons Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Need a button inside the page hero?',
                    'desc' => 'A clickable button to link to a desired target such as a page or section.',
                    'type' => 'radio',
                    'toplevel' => true,
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    )
                ),

                array(
                    'id' => 'ut_page_main_hero_button_text',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Main Hero Button Text',
                    'desc' => 'Enter your desired text for this button.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                    
                ),

                array(
                    'id' => 'ut_page_main_hero_button_url_type',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Main Hero Button Link Type',
                    'desc' => 'Do you like to link to the content or an external URL?',
                    'type' => 'radio',
                    'std' => 'content',
                    'choices' => array(
                        array(
                            'value' => 'content',
                            'label' => 'link to the main content of this page!'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'link to an external url!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_url',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Main Hero Button URL',
                    'desc' => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_main_hero_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_target',
                    'metapanel' => 'ut-hero-settings',
                    'label' => 'Main Hero Button Target',
                    'desc' => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
                    'type' => 'select',
                    'std' => '_blank',
                    'choices' => array(
                        array(
                            'value' => '_blank',
                            'label' => 'blank'
                        ),
                        array(
                            'value' => '_self',
                            'label' => 'self'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_main_hero_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hero_button_style',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Choose Main Hero Button Style',
                    'desc' => 'Use our theme default button or design your own one.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        ),
                    ),
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_main_hrbtn',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Custom Button Styling',
                    'desc' => 'Makes it easy to style buttons.',
                    'markup' => '1_1',
                    'type' => 'button_builder',
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video',
                        'ut_page_main_hero_button_style' => 'custom'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_second_button_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Second Button Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_main_hero_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                ),            
            
                array(
                    'id' => 'ut_page_second_button',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Need a second button inside the page hero?',
                    'desc' => 'A clickable button to link to a desired target such as a page or section.',
                    'type' => 'radio',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                ),

                array(
                    'id' => 'ut_page_second_button_text',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Second Button Text',
                    'desc' => 'Enter your desired button text',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,            
                ),

                array(
                    'id' => 'ut_page_second_button_url_type',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Second Button Link Type',
                    'desc' => 'Do you like to link to a section or external URL?',
                    'type' => 'radio',
                    'std' => 'content',
                    'choices' => array(
                        array(
                            'value' => 'content',
                            'label' => 'link to the main content of this page!'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'link to an external url!'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_button_url',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Second Button URL',
                    'desc' => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
                    'type' => 'text',
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_second_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_button_target',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Second Button Target',
                    'desc' => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
                    'type' => 'select',
                    'std' => '_blank',
                    'choices' => array(
                        array(
                            'value' => '_blank',
                            'label' => 'blank'
                        ),
                        array(
                            'value' => '_self',
                            'label' => 'self'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_second_button_url_type' => 'external',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_button_style',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Choose Second Button Style',
                    'desc' => 'Use our theme default button or design your own one.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(
                        array(
                            'value' => 'default',
                            'label' => 'Default'
                        ),
                        array(
                            'value' => 'custom',
                            'label' => 'Custom'
                        ),
                    ),
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_second_hrbtn',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Custom Button Styling',
                    'desc' => 'Makes it easy to style buttons.',
                    'type' => 'button_builder',
                    'required' => array(
                        'ut_page_second_button' => 'on',
                        'ut_page_second_button_style' => 'custom',
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_hero_buttons_margin_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Buttons Spacing',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|tabs|video'
                    ),
                ),              
            
                array(
                    'id' => 'ut_page_hero_buttons_margin',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Buttons Margin Top',
                    'desc' => 'Increase the space between Hero Caption Title and Hero Buttons. (optional) - default 0px',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video'
                    ),
                ),
                
                array(
                    'id' => 'ut_page_scroll_down_arrow_headline',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_hero_type' => 'image|animatedimage|splithero|slider|tabs|video'
                    ),
                ),              
            
                array(
                    'id' => 'ut_page_scroll_down_arrow',
                    'label' => 'Activate Scroll Down Arrow?',
                    'desc' => 'A large double lined down arrow. Clicking the arrow automatically scrolls to the main content.',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'type' => 'radio',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'off',
                            'label' => 'no thanks!'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes please!'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_color',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Color',
                    'desc' => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_position',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Horizontal Position',
                    'desc' => 'Drag the handle to set your desired horizontal position.',
                    'type' => 'numeric_slider',
                    'std' => '50',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_scroll_down_arrow_position_vertical',
                    'metapanel' => 'ut-hero-content-button-settings',
                    'label' => 'Scroll Down Arrow Vertical Position',
                    'desc' => 'Drag the handle to set your desired vertical position.',
                    'type' => 'numeric_slider',
                    'std' => '10',
                    'required' => array(
                        'ut_page_scroll_down_arrow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /** 
                 * Portfolio
                 */

                array(
                    'id' => 'ut_portfolio_settings',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Portfolio Details',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_link_type',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Show Portfolio',
                    'type' => 'select',
                    'desc' => 'Choose how the portfolio content should be displayed. If you choose "inside a lightbox or slideup box", the portfolio item gets opened inside a lightbox or slideup box ( depends on your showcase settings ). The option "on a separate portfolio page" will redirect the user to a single portfolio page, where you can add way more content and media.',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'global (from showcase options)'
                        ),
                        array(
                            'value' => 'onepage',
                            'label' => 'inside a slideup box'
                        ),
                        array(
                            'value' => 'popup',
                            'label' => 'inside a lightbox'
                        ),
                        array(
                            'value' => 'internal',
                            'label' => 'on a separate portfolio page'
                        ),
                        array(
                            'value' => 'external',
                            'label' => 'on an external website'
                        )
                    ),
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_external_link',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Project Link',
                    'type' => 'text',
                    'desc' => 'Redirect the portfolio thumbnail directly to an external site.',
                    'required' => array(
                        'ut_portfolio_link_type' => 'external'
                    ),
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_portfolio_details',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Project Link',
                    'type' => 'list-item',
                    'desc' => 'Add a nice portfolio description list to this portfolio.',
                    'settings' => array(

                        array(
                            'id' => 'value',
                            'label' => 'Description',
                            'type' => 'text'
                        )

                    ),
                    'pages' => $post_type_support_3,
                ),

                array(
                    'id' => 'ut_single_portfolio_navigation',
                    'metapanel' => 'ut-portfolio-details',
                    'label' => 'Activate Portfolio Navigation?',
                    'desc' => 'A navigation with links to the previous and next portfolio post as well as a link to the page which holds the main portfolio overview. Only for Portfolio Single Pages!',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)',
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )
                    ),
                    'pages' => $post_type_support_3,
                ),    
            
            

                /** 
                 * Page Header Settings 
                 */

                array(
                    'id' => 'ut_page_settings',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_settings_info',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Global Hero Caption',
                    'desc' => 'Page Title Settings are only relevant if you are not using Visual Composer.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_display_section_header',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Show Page Title?',
                    'desc' => 'A page title typically forms the first element inside a section or page. It\'s located right above the content and contains the page title as well as an optional lead slogan which can be entered a few option beneath this one. With the help of this option you can easily hide this element.',
                    'type' => 'select',
                    'std' => 'global',
                    'class' => 'ut-section-header-state',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),            
                        array(
                            'label' => 'Show',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'Hide',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_align',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Alignment',
                    'desc' => 'only available when <strong>Section Width / Style</strong> width has been set to: "Centered" or "Fullwidth Content". This option can be found inside the "Section Settings" tab.',
                    'type' => 'select',
                    'std' => 'center',
                    'class' => 'ut-section-header-state',
                    'choices' => array(
                        array(
                            'label' => 'Center',
                            'value' => 'center'
                        ),
                        array(
                            'label' => 'Left',
                            'value' => 'left'
                        ),
                        array(
                            'label' => 'Right',
                            'value' => 'right'
                        )
                    ),
                    'required' => array(
                        'ut_section_width' => 'centered|fullwidth'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Width',
                    'desc' => 'It handles centering the content within the page title. Centered content has a max width of 1200px and fullwidth content 100%.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => '7/10 (default)',
                            'value' => 'seven'
                        ),
                        array(
                            'label' => '10/10 (fullwidth)',
                            'value' => 'ten'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_text_align',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Text Alignment',
                    'desc' => 'Not available for Section Style "Split Content"',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Center',
                            'value' => 'center'
                        ),
                        array(
                            'label' => 'Left',
                            'value' => 'left'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Style',
                    'desc' => 'Choose between one of these 7 nice page title styles. You can optionally change it\'s color inside the "Color Settings" tab. <a href="#" class="ut-header-preview">Preview Page Title Styles</a>',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Style One',
                            'value' => 'pt-style-1'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'pt-style-2'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'pt-style-3'
                        ),
                        array(
                            'label' => 'Style Four',
                            'value' => 'pt-style-4'
                        ),
                        array(
                            'label' => 'Style Five',
                            'value' => 'pt-style-5'
                        ),
                        array(
                            'label' => 'Style Six',
                            'value' => 'pt-style-6'
                        ),
                        array(
                            'label' => 'Style Seven',
                            'value' => 'pt-style-7'
                        )

                    ),
                    'pages' => $post_type_support_2,
                ),

                /*array(
                    'id' => 'ut_section_headline_style_1_type',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Decoration Line Location',
                    'desc' => 'Select between 2 different locations.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ), 
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
                        'ut_section_header_style' => 'pt-style-1'
                    )
                ),*/

                array(
                    'id' => 'ut_section_headline_style_2_color',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_headline_style_2_height',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Height',
                    'desc' => '<strong>(optional)</strong> - value in px , default: 1px',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_headline_style_2_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Two Decoration Line Width',
                    'desc' => '<strong>(optional)</strong> - value in % or px , default: 30px',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-2'
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_section_headline_style_4_width',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Style Four Decoration Line Width',
                    'desc' => 'Drag the handle to set the line width.',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,10,1',
                    'std' => '6',
                    'required' => array(
                        'ut_section_header_style' => 'pt-style-4'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_section_header_font_style',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Font Style',
                    'type' => 'select',
                    'std' => 'global',
                    'desc' => 'Choose between 6 different font styles. <a href="#" class="ut-font-preview">Preview Theme Font Style</a>',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'Extralight',
                            'value' => 'extralight'
                        ),
                        array(
                            'label' => 'Light',
                            'value' => 'light'
                        ),
                        array(
                            'label' => 'Regular',
                            'value' => 'regular'
                        ),
                        array(
                            'label' => 'Medium',
                            'value' => 'medium'
                        ),
                        array(
                            'label' => 'Semi Bold',
                            'value' => 'semibold'
                        ),
                        array(
                            'label' => 'Bold',
                            'value' => 'bold'
                        ),

                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Padding Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default: 30px). This option defines the space between header and content.',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'class' => '',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_header_margin_left',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Margin Left',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_header_margin_right',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Margin Right',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_slogan_headline',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Lead Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_section_slogan',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Page Title Lead', /* slogan */
                    'desc' => 'You can also insert HTML as well as for example button shortcodes. <a class="ut-faq-link" target="_blank" href="http://faq.unitedthemes.com/brooklyn/buttons/"> Learn more about: Button Shortcodes</a>',
                    'type' => 'textarea-simple',
                    'rows' => '5',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding_left',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Header Lead Padding Left',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_slogan_padding_right',
                    'metapanel' => 'ut-page-header-settings',
                    'label' => 'Header Lead Padding Right',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 0px).',
                    'type' => 'text',
                    'section_class' => 'ut-section-header-opt',
                    'pages' => $post_type_support_2,

                ),

                /** 
                 * Page Settings 
                 */

                array(
                    'id' => 'ut_page_settings',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_fullwidth',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Width',
                    'desc' => '<strong>This option is deprecated. Please use section or row streching options in order to create full width pages.</strong>',
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
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_padding_top',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Padding Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 80px.',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_page_padding_bottom',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Page Padding Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 40px.',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_site_border_headline',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Site Frame',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_page_site_border',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Show Site Frame?',
                    'desc' => 'A frame which embeds your entire site.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_site_border_status',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Frame Settings',
                    'desc' => 'You can optionally deactivate parts of the frame for design purposes.',
                    'type' => 'frame',
                    'markup' => '1_1',
                    'std' => '#FFFFFF',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                ),

                array(
                    'id' => 'ut_page_site_border_color',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Site Frame Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_page_site_border' => 'show'
                    ),
                ),

                array(
                    'id' => 'ut_page_top_header_headline',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Top Header',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_page_top_header',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Show Top Header?',
                    'desc' => 'The Top Header will be placed above header and navigation and contains additional elements like phone number, email address and social profile links. You can manage these fields inside the theme options panel.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'hide'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_footer_area_headline',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Footer Area',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_page_footerarea',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Show Footer Area?',
                    'desc' => 'You can optionally hide the footer widget area on this particular page.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_footerarea_width',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Make Footer Area Full Width?',
                    'desc' => 'It handles centering the content within the footer. Centered content has a max width of 1200px and fullwidth content 100%.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),    
            

                array(
                    'id' => 'ut_page_footer_skin',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Footer Color Skin',
                    'desc' => 'Select your desired footer color skin.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'value' => 'ut-footer-dark',
                            'label' => 'Dark'
                        ),
                        array(
                            'value' => 'ut-footer-light',
                            'label' => 'Light'
                        ),
                    ),
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_subfooter_area_headline',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Subfooter Area',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                ),
                
                array(
                    'id' => 'ut_page_subfooterarea',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Show Subfooter Area?',
                    'desc' => 'You can optionally hide the subfooter area on this particular page.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'value' => 'global',
                            'label' => 'Default (Theme Options)'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_page_subfooter_border_top',
                    'metapanel' => 'ut-page-settings',
                    'label' => 'Hide Subfooter Border Top?',
                    'desc' => 'You can optionally define a border top color inside the Theme Options Panel. If you like to hide this global border, please use this option.',
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
                    'pages' => $post_type_support_2,
                ),
            
                /** 
                 * Color Settings 
                 */

                array(
                    'id' => 'ut_color_accent_color_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Page Accent Color',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_page_accent_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Page Accent Color',
                    'desc' => 'This option lets you overwrite the default theme accent color.',
                    'type' => 'colorpicker',
                    'pages' => $post_type_support_2,
                ),


                array(
                    'id' => 'ut_color_skin_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Skin Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_color_skin_headline_info',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Global Hero Caption',
                    'desc' => 'These color settings are deprecated since 4.0 and are only kept for reference. We highly recommend using Visual Composer module settings instead.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_show_color_options',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Settings',
                    'type' => 'select',
                    'std' => 'hide',
                    'desc' => 'These color settings are deprecated since 4.0 and are only kept for reference. We highly recommend using Visual Composer module settings instead.',
                    'choices' => array(
                        array(
                            'label' => 'Show Deprecated Options',
                            'value' => 'show'
                        ),
                        array(
                            'label' => 'Hide Deprecated Options',
                            'value' => 'hide'
                        ),
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_section_skin',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Skin',
                    'type' => 'select',
                    'std' => 'global',
                    'desc' => 'If you are planing to use bright background images or bright background colors use the dark skin and the other way around. If these skins do not match your requirements, define your own colors beneath or add your own class inside the class field at the very bottom of this option set.',
                    'choices' => array(
                        array(
                            'label' => 'Dark',
                            'value' => 'dark'
                        ),
                        array(
                            'label' => 'Light',
                            'value' => 'light'
                        ),
                        array(
                            'label' => 'Global Colors',
                            'value' => 'global'
                        )
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )

                ),

                array(
                    'id' => 'ut_color_settings_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header and Lead Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_glow',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Activate Header Title Glow?',
                    'desc' => 'Note: Best result for transparent backgrounds.',
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
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_title_glow_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Glow Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_title_glow' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_slogan_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Header Lead Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_content_colors_headline',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Color Settings',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_background_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => 'Keep in mind that if you are planing to use a parallax background ( sections only ), this color is not visible anymore.',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_heading_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Content Headlines Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>. Affects all headlines from H1 to H6.',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_text_color',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Content Text Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),

                array(
                    'id' => 'ut_section_class',
                    'metapanel' => 'ut-color-settings',
                    'label' => 'Optional Class',
                    'desc' => 'Optional CSS Class. Simply enter the class name without a dot in front, this class will be added straight to the DIV named #primary. We recommend to place the class definition itself inside the Theme Options Panel under "Advanced" > "Custom CSS".',
                    'type' => 'text',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_show_color_options' => 'show'
                    )
                ),
                    

                /** 
                 * Contact Settings 
                 */

                array(
                    'id' => 'ut_contact_section',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Contact Section Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_activate_csection',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Display Contact Section?',
                    'desc' => 'Use this option to overwrite the global setting.',
                    'type' => 'select',
                    'std' => 'global',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'label' => 'yes, please!',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no, thanks!',
                            'value' => 'off'
                        )
                    ),
                    'pages' => $post_type_support_1,

                ),

                array(
                    'id' => 'ut_csection_background_image',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Background Image',
                    'desc' => 'You can individually change the Background Image per page.',
                    'type' => 'background',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_csection_overlay',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'type' => 'select',
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
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_csection_overlay_color',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay Color',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'colorpicker',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_csection_overlay' => 'on',
                        'ut_activate_csection' => 'on'
                    ),

                ),

                array(
                    'id' => 'ut_csection_overlay_opacity',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Overlay Color Opacity',
                    'desc' => '<strong>(optional)</strong> - default 0.8',
                    'std' => '0.8',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,1,0.1',
                    'pages' => $post_type_support_1,
                    'required' => array(
                        'ut_csection_overlay' => 'on',
                        'ut_activate_csection' => 'on'
                    ),
                ),

                array(
                    'id' => 'ut_show_scroll_up_button_headline',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Scroll Top',
                    'type' => 'section_headline',
                    'pages' => $post_type_support_1,
                ),

                array(
                    'id' => 'ut_show_scroll_up_button',
                    'metapanel' => 'ut-contact-section',
                    'label' => 'Scroll To Top Button',
                    'desc' => 'This "Back to top" link allows users to smoothly scroll back to the top of the page. Its a little detail which enhances navigation experience on website with long pages.',
                    'std' => 'global',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Default (Theme Options)',
                            'value' => 'global'
                        ),
                        array(
                            'value' => 'on',
                            'label' => 'yes, please!'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'no, thanks!'
                        )

                    ),
                    'pages' => $post_type_support_1,
                ),


                /**
                 * Team Management - Deprecated but supported since 4.1
                 */

                array(
                    'id' => 'ut_manage_team_headline',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Team Member Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_manage_team_info',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Global Hero Caption',
                    'desc' => 'The template based team Management is deprecated since 4.0 but is still supported in the future. We recommend to use the new Visual Composer Team Member Boxes.',
                    'type' => 'section_headline_info',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_member_in_row',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Member per row.',
                    'desc' => 'Display up to 4 Members in a row.',
                    'type' => 'select',
                    'std' => 'three',
                    'section_class' => 'ut-team-section',
                    'choices' => array(
                        array(
                            'label' => '1',
                            'value' => 'one'
                        ),
                        array(
                            'label' => '2',
                            'value' => 'two'
                        ),
                        array(
                            'label' => '3',
                            'value' => 'three'
                        ),
                        array(
                            'label' => '4',
                            'value' => 'four'
                        )

                    ),

                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_member_box_layout',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Member Style',
                    'desc' => 'Choose between 4 different member box styles.',
                    'section_class' => 'ut-team-section',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Style One',
                            'value' => 'style_one'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'style_two'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'style_three'
                        ),
                        array(
                            'label' => 'Style Four',
                            'value' => 'style_four'
                        )
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_team_member',
                    'metapanel' => 'ut-manage-team',
                    'label' => 'Manager your Team Members',
                    'desc' => '<strong>You can re-order with drag & drop, the order will update after saving.</strong>',
                    'type' => 'list-item',
                    'markup' => '1_1',
                    'section_class' => 'ut-team-section',
                    'settings' => array(
                        array(
                            'label' => 'Upload',
                            'id' => 'ut_member_pic',
                            'type' => 'upload',
                            'desc' => 'Member Avatar. Should be at least 560px x 420px.',
                        ),
                        array(
                            'label' => 'Upload',
                            'id' => 'ut_member_pic_alt',
                            'type' => 'upload',
                            'desc' => 'Alternate Member Avatar ( only for style four ). Should be at least 560px x 420px.',
                        ),
                        array(
                            'label' => 'Member Name',
                            'id' => 'ut_member_name',
                            'type' => 'text',
                        ),
                        array(
                            'label' => 'Member Title',
                            'id' => 'ut_member_title',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Description',
                            'id' => 'ut_member_description',
                            'type' => 'textarea-simple',
                            'desc' => 'this field also accepts shortcodes, for example skillbar shortcode',
                            'std' => '',
                            'rows' => '5',
                            'post_type' => '',
                            'taxonomy' => '',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Member Email',
                            'id' => 'ut_member_email',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Member Website',
                            'id' => 'ut_member_website',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Facebook',
                            'id' => 'ut_member_facebook',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Twitter',
                            'id' => 'ut_member_twitter',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Google',
                            'id' => 'ut_member_google',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Github',
                            'id' => 'ut_member_github',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Skype',
                            'id' => 'ut_member_skype',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Dribbble',
                            'id' => 'ut_member_dribbble',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Dropbox',
                            'id' => 'ut_member_dropbox',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Flickr',
                            'id' => 'ut_member_flickr',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Xing',
                            'id' => 'ut_member_xing',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Youtube',
                            'id' => 'ut_member_youtube',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Vimeo',
                            'id' => 'ut_member_vimeo',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'LinkedIn',
                            'id' => 'ut_member_linkedin',
                            'type' => 'text',
                            'class' => ''
                        ),
                        array(
                            'label' => 'Instagram',
                            'id' => 'ut_member_instagram',
                            'type' => 'text',
                            'class' => ''
                        ),
                    ),
                    'class' => 'ut-team-manager',
                    'pages' => $post_type_support_4,
                ),

                /**
                 *  Navigaton
                 */
                array(
                    'id' => 'ut_navigation_settings',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_config',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Use Global Navigation Settings from Theme Options?',
                    'desc' => 'You can create an individual navigation for this particular page or you use your global one.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'yes',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'no',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'yes',
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_layout',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Position',
                    'desc' => 'Select your desired Header and Navigation Position.',
                    'type' => 'select',
                    'std' => 'default',
                    'choices' => array(

                        array(
                            'value' => 'default',
                            'label' => 'Horizontal Top Navigation'
                        ),
                        array(
                            'value' => 'side',
                            'label' => 'Vertical Side Navigation'
                        )

                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off'
                    ),
                    'pages' => $post_type_support_2,

                ),            
                
                array(
                    'id' => 'ut_header_top_layout',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Layout',
                    'desc' => 'Select your desired Header and Navigation Layout.',
                    'type' => 'radio_image',
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
                        ),*/

                        array(
                            'value' => 'style-5',
                            'src' => 'header-05.svg',
                            'label' => 'Logo Centered - Navigation Below'
                        ),

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
                        ),*/

                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    )

                ),
                
                array(
                    'id' => 'ut_site_logo_max_height',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Logo Max Height',
                    'desc' => 'Use an alternate Logo max height. Note: This Option affects all logos. <br /><strong>Maximum value is: 120!</strong>',
                    'type' => 'numeric_slider',
                    'pages' => $post_type_support_2,
                    'std' => '60',
                    'min_max_step' => '0,120,1',
                    'required' => array(
                        'ut_navigation_config' => 'off'
                    ),
                ),

                array(
                    'id' => 'ut_site_logo',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Main Logo',
                    'desc' => '<strong>(optional)</strong>. The maximum height of the logo should be 60px. And for retina logo, please double the size of your logo by keeping the aspect ratio. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side|default'
                    ),
                ),

                array(
                    'id' => 'ut_site_logo_alt',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Alternate Logo',
                    'desc' => '<strong>(optional)</strong>. Upload an alternate Logo. Should be the same size as your Main Logo. This Logo will be used if 2 different navigations skins are available on the site. Example: The navigation switches from primary to secondary skin when reaching the main content.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                ),

                array(
                    'id' => 'ut_site_logo_retina',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Retina Main Logo',
                    'desc' => '<strong>(optional)</strong>. Upload a retina ready Main Logo. Simply double the size of your Main Logo. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side|default'
                    ),
                ),

                array(
                    'id' => 'ut_site_logo_alt_retina',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Retina Alternate Logo',
                    'desc' => '<strong>(optional)</strong>. Upload an alternate retina Logo. Should be the same size as your Retina Main Logo. By leaving this field empty, the theme will use the logos from theme options panel.',
                    'type' => 'upload',
                    'pages' => $post_type_support_2,
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                ),



                /**
                 * Vertical Side Navigation Options 
                 */

                array(
                    'id' => 'ut_side_header_align',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header and Navigation Align',
                    'desc' => 'Decide if header and navigation are located on the left or right side.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Display Search Form?',
                    'desc' => 'An optional search form beneath the navigation.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_copyright_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Copyright Color',
                    'desc' => 'Desired color for copyright information.',
                    'type' => 'colorpicker',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_activate_social_icons',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Display Social Icons?',
                    'desc' => 'An optional set of social icons.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),


                array(
                    'id' => 'ut_side_header_background_image',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Background Image',
                    'desc' => '',
                    'type' => 'background',
                    'markup' => '1_1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'pages' => $post_type_support_2,
                    )
                ),

                array(
                    'id' => 'ut_side_navigation_shadow',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Shadow',
                    'desc' => 'Activate Header Shadow?',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_navigation_border',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border',
                    'desc' => 'Activate Header Border?',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                    ),
                    'pages' => $post_type_support_2,
                ),                
            
                array(
                    'id' => 'ut_side_navigation_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_side_navigation_border' => 'on'    
                    ),
                    'pages' => $post_type_support_2,
                ),
            
            
            
                /**
                 * Horizontal Navigation Options 
                 */
                array(
                    'id' => 'ut_navigation_scroll_position',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Scroll Behaviour',
                    'desc' => 'Choose between a header always displaying fixed at top of your website or a header which is floating while scrolling. ',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ), 
            
                array(
                    'id' => 'ut_navigation_width',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Width',
                    'desc' => 'It handles centering the content within the header. Centered content has a max width of 1200px and fullwidth content 100%.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_height',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Height',
                    'desc' => 'Drag the handle to set the header height. Default: 80.',
                    'std' => '80',
                    'type' => 'numeric-slider',
                    'min_max_step' => '50,120,1',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_site_navigation_flush',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Activate Navigation Flush?',
                    'desc' => 'only applies of Page Border is active and Header Width has been set to fullwidth.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_navigation_width' => 'fullwidth',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_skin',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Color Skin',
                    'desc' => 'Brookyln provides 2 default color skins for your header and navigation. If these skins do not match your requirements simply use the custom option and individualize it to your needs.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default|side'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_darkskin_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Dark Skin Settings',
                    'desc' => 'Dark Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-dark',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_lightskin_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Light Skin Settings',
                    'desc' => 'Light Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-light',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* setting for both base skins */
                array(
                    'id' => 'ut_navigation_state',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Always show Header and Navigation?',
                    'desc' => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
                    'type' => 'select',
                    'std' => 'off',
                    'choices' => array(
                        array(
                            'value' => 'on',
                            'label' => 'On (with chosen skin)'
                        ),
                        array(
                            'value' => 'on_transparent',
                            'label' => 'On (transparent)'
                        ),
                        array(
                            'value' => 'off',
                            'label' => 'Off'
                        )
                    ),
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-dark|ut-header-light',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_shadow',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Shadow',
                    'desc' => 'Activate Header Shadow?',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                        'ut_navigation_state' => 'on|off'
                    ),
                    'pages' => $post_type_support_2,
                ),
            
                array(
                    'id' => 'ut_navigation_border_bottom',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border Bottom',
                    'desc' => 'Activate Header Border Bottom?',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-light',
                        'ut_navigation_state' => 'on|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_transparent_border',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Activate Navigation Border Bottom?',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-light|ut-header-dark',
                        'ut_navigation_state' => 'on_transparent'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_customskin_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Custom Skin Settings',
                    'desc' => 'Custom Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_customskin_state',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Always show Header and Navigation?',
                    'desc' => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to secondary skin on scroll!". The navigation will turn into the secondary skin when reaching the main content. There secondary skin settings will appear once you select this option."',
                    'type' => 'select',
                    'std' => 'on',
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
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),


                /* Primary Skin */
                array(
                    'id' => 'ut_navigation_customskin_primary_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Primary Skin Settings',
                    'desc' => 'Primary Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off',
                        'ut_header_layout' => 'default'
                    ),
                    'pages' => $post_type_support_2,
                ),
                array(
                    'id' => 'ut_side_navigation_customskin_primary_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Color Skin Settings',
                    'desc' => 'Color Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off',
                        'ut_header_layout' => 'side'
                    ),
                    'pages' => $post_type_support_2,
                ),


                array(
                    'id' => 'ut_header_ps_text_logo_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Text Logo Color',
                    'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_text_logo_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Text Logo Color Hover',
                    'desc' => 'RGBA Color. Only applies if no main logo has been uploaded and set. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_header_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_background_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_shadow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border Bottom Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_fl_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_dot_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Dot Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_active_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_fl_arrow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ps_sl_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_background_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_active_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_arrow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Arrow Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_shadow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_sl_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on|on_switch|off'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* optional hover state */
                array(
                    'id' => 'ut_subheadline_ps_hover_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Hover State Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_hover_state',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Add Hover State?',
                    'desc' => 'Add a hover state if you mouseover the header.',
                    'type' => 'select',
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
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_background_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Background Color on Hover',
                    'type' => 'colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_border_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border Color on Hover',
                    'type' => 'colorpicker',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ps_shadow_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Shadow Color on Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_hover_fl_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Link Color on Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ps_hover_fl_dot_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Dot Color on Hover',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch',
                        'ut_navigation_ps_hover_state' => 'on'
                    ),
                    'pages' => $post_type_support_2,
                ),

                /* Secondary Skin */
                array(
                    'id' => 'ut_navigation_customskin_secondary_settings_headline',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Secondary Skin Settings',
                    'desc' => 'Secondary Skin Settings',
                    'type' => 'section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_text_logo_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Text Logo Color',
                    'desc' => 'Only applies if no Main Logo has been uploaded and set.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,

                ),

                array(
                    'id' => 'ut_header_ss_text_logo_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Text Logo Color Hover',
                    'desc' => 'Only applies if no main logo has been uploaded and set. ',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ss_header_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_background_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_shadow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_header_layout' => 'default',
                        'ut_navigation_config' => 'off',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_header_ss_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Header Border Bottom Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ss_fl_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_dot_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Dot Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_fl_active_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation First Level Active Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_ss_sl_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_background_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Link Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Link Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(

                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_shadow_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Shadow Color',
                    'desc' => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_navigation_ss_sl_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Navigation Sub Menu Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'default',
                        'ut_navigation_skin' => 'ut-header-custom',
                        'ut_navigation_customskin_state' => 'on_switch'
                    ),
                    'pages' => $post_type_support_2,
                ),


                /*
                |--------------------------------------------------------------------------
                | Special Side Navigation Options 
                |--------------------------------------------------------------------------
                */
                array(
                    'id' => 'ut_subheadline_sh_form_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_icon_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Icon Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_background_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Background Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_placeholder_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Placeholder Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_background_focus_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Background Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_border_focus_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Border Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_search_form_placeholder_focus_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Search Form Placeholder Focus Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_subheadline_sh_si_colors',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Social Icons Colors',
                    'type' => 'sub_section_headline',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom',
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icon_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Icon Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icon_color_hover',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Icon Hover Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),

                array(
                    'id' => 'ut_side_header_social_icons_border_color',
                    'metapanel' => 'ut-navigation-section',
                    'label' => 'Border Color',
                    'desc' => 'RGBA Color. <br /><strong>You can also insert a HEX Color, it will be converterted it into a valid RGBA Color automatically.</strong>',
                    'type' => 'colorpicker',
                    'mode' => 'rgb',
                    'required' => array(
                        'ut_navigation_config' => 'off',
                        'ut_header_layout' => 'side',
                        'ut_navigation_skin' => 'ut-header-custom'
                    ),
                    'pages' => $post_type_support_2,
                ),









                /**
                 *  Section Settings
                 */

                array(
                    'id' => 'ut_section_settings',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Style',
                    'type' => 'select',
                    'desc' => 'Decide if your content is centered or full width. For regular content we recommend to use the "Centered Content" option and for Portfolios or Google Maps the "Full Width Content". If you use "Split Section" please use the featured image to display a poster image. This poster image is always located next to the content (left or right depending on "Split Content Align").',
                    'choices' => array(
                        array(
                            'label' => 'Centered Content',
                            'value' => 'centered'
                        ),
                        array(
                            'label' => 'Full Width Content',
                            'value' => 'fullwidth'
                        ),
                        array(
                            'label' => 'Split Content',
                            'value' => 'split'
                        )
                    ),
                    'std' => 'centered',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_content_align',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Content Align',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'left',
                            'value' => 'left'
                        ),
                        array(
                            'label' => 'right',
                            'value' => 'right'
                        )
                    ),
                    'std' => 'right',
                    'required' => array(
                        'ut_section_width' => 'split',
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_section_margin_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Section Margin Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default : 140px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_width' => 'split'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_split_section_margin_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Split Section Margin Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 130px (default : 70px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_width' => 'split'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_shadow',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Shadow',
                    'type' => 'select',
                    'desc' => 'Creates a smooth shadow for this section.',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_padding_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Padding Top',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 150px (default : 80px)',
                    'type' => 'text',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_padding_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Padding Bottom',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 130px (default : 60px)',
                    'type' => 'text',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Border at Top?',
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
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_top_style',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Top Style',
                    'desc' => 'Option for setting the line style.',
                    'type' => 'select',
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
                    'std' => 'solid',
                    'required' => array(
                        'ut_section_border_top' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Border at Bottom?',
                    'type' => 'select',
                    'toplevel' => false,
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
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_width',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Width',
                    'desc' => '<strong>(optional)</strong>',
                    'type' => 'numeric-slider',
                    'min_max_step' => '1,100',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_border_bottom_style',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Section Border Bottom Style',
                    'desc' => 'Option for setting the line style.',
                    'type' => 'select',
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
                    'std' => 'solid',
                    'required' => array(
                        'ut_section_border_bottom' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Activate Section Fancy Border',
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
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_background_color',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_fancy_border_size',
                    'metapanel' => 'ut-section-settings',
                    'label' => 'Size',
                    'desc' => '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_fancy_border' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Parallax
                 */

                array(
                    'id' => 'ut_parallax_section_head',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Parallax Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_parallax_section',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Parallax',
                    'desc' => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        ),
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        )
                    ),
                    'std' => 'off',
                    'class' => 'ut-section-parallax-state',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_parallax_image',
                    'metapanel' => 'ut-section-parallax-settings',
                    'label' => 'Upload Section Background Image',
                    'desc' => 'Keep in mind, that you are not able to set a background position or attachment if the parallax option above has been set to "on".',
                    'markup' => '1_1',
                    'type' => 'background',
                    'section_class' => 'ut-section-parallax-opt',
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Video
                 */

                array(
                    'id' => 'ut_section_video_state',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Section Video Settings',
                    'type' => 'panel_headline',
                    'section_class' => 'ut-settings-heading',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_state',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Activate Section Background Video?',
                    'desc' => 'Keep in mind, that video backgrounds do not support parallax effects, please deactivate the parallax option before. Activating the background video will also overwrite the section background settings like color and image.',
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
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_source',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video Source',
                    'desc' => 'Select your desired source for videos.',
                    'type' => 'select',
                    'std' => 'youtube',
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
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video URL',
                    'desc' => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code!',
                    'type' => 'text',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'youtube'
                    ),
                    'pages' => $post_type_support_4,
                ),
            
                array(
                    'id' => 'ut_section_video_mp4',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'MP4',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_ogg',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'OGG',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_webm',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'WEBM',
                    'desc' => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_loop',
                    'metapanel' => 'ut-section-video-settings',
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
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_preload',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Preload Video',
                    'desc' => 'Whether the video should be loaded when the page loads.',
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
                        'ut_section_video_state' => 'on',
                        'ut_section_video_source' => 'selfhosted'
                    ),
                    'pages' => $post_type_support_4,
                ),
                
                array(
                    'id' => 'ut_section_video_sound',
                    'metapanel' => 'ut-section-video-settings',
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
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),
                
                array(
                    'id' => 'ut_section_video_volume',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Video Volume',
                    'desc' => '1-100 - default 5',
                    'std' => '5',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,100,1',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_mute_button',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Show Mute Button?',
                    'desc' => 'Whether the video mute button is displayed or not.',
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
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_poster',
                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Poster Image',
                    'desc' => 'This image will be displayed instead of the video on mobile devices.',
                    'type' => 'upload',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_section_video_bgcolor',

                    'metapanel' => 'ut-section-video-settings',
                    'label' => 'Background Color',
                    'type' => 'colorpicker',
                    'desc' => '<strong>(optional)</strong>. If you do not wish to use a poster image on mobile devices, you can use a background color as well.',
                    'required' => array(
                        'ut_section_video_state' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                /**
                 * Section Overlay
                 */

                array(
                    'id' => 'ut_overlay_setting',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Settings',
                    'type' => 'panel_headline',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_section',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay',
                    'desc' => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'class' => 'ut-section-overlay-state',
                    'section_class' => 'ut-section-parallax-opt',
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_pattern',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Pattern',
                    'desc' => 'Add overlay design pattern.',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'On',
                            'value' => 'on'
                        ),
                        array(
                            'label' => 'Off',
                            'value' => 'off'
                        )
                    ),
                    'std' => 'off',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_pattern_style',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Pattern Style',
                    'desc' => '<strong>(optional)</strong>',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'select',
                    'choices' => array(
                        array(
                            'label' => 'Style One',
                            'value' => 'style_one'
                        ),
                        array(
                            'label' => 'Style Two',
                            'value' => 'style_two'
                        ),
                        array(
                            'label' => 'Style Three',
                            'value' => 'style_three'
                        )
                    ),
                    'std' => 'style_one',
                    'rows' => '',
                    'class' => '',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on',
                        'ut_overlay_pattern' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),

                array(
                    'id' => 'ut_overlay_color',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Section Overlay Color',
                    'type' => 'colorpicker',
                    'section_class' => 'ut-section-overlay-opt',
                    'desc' => '<strong>(optional)</strong>',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),


                array(
                    'id' => 'ut_overlay_color_opacity',
                    'metapanel' => 'ut-section-overlay-settings',
                    'label' => 'Overlay Color Opacity',
                    'section_class' => 'ut-section-overlay-opt',
                    'type' => 'numeric-slider',
                    'min_max_step' => '0,1,0.1',
                    'section_class' => 'ut-section-parallax-opt ut-section-overlay-opt',
                    'required' => array(
                        'ut_overlay_section' => 'on'
                    ),
                    'pages' => $post_type_support_4,
                ),





            ),

        ) );

        ot_register_meta_box( $settings );

    }

add_action( 'admin_init', 'ut_bklyn_metabox_settings' );

endif;



function _ut_search_meta_panel_for_id( $id, $array ) {

    foreach ( $array as $key => $val ) {

        if ( $val[ 'id' ] === $id ) {
            return $key;
        }

    }

    return false;

}



function _ut_remove_settings_from_panel( $metapanel ) {

    if ( ot_get_option( 'ut_front_hero_font_type' ) != 'ut-font' ) {

        $key = _ut_search_meta_panel_for_id( 'ut_page_hero_font_style', $metapanel[ 'fields' ] );

        if ( $key ) {
            unset( $metapanel[ 'fields' ][ $key ] );
        }

        $key = _ut_search_meta_panel_for_id( 'ut_page_hero_font_style_global_overwrite', $metapanel[ 'fields' ] );

        if ( $key ) {
            unset( $metapanel[ 'fields' ][ $key ] );
        }

    }

    return $metapanel;

}

add_filter( 'ut_bklyn_metabox_settings', '_ut_remove_settings_from_panel', 90, 1 );