<?php


if ( !function_exists( 'ut_bklyn_single_posts_metabox_settings' ) ):

    function ut_bklyn_single_posts_metabox_settings() {

        $metabox_settings = array(

            'id' => 'ut_single_post_hero_settings',
            'title' => 'Hero and Post Settings',
            'pages' => array( 'post' ),
            'type' => 'simple',
            'context' => 'normal',
            'priority' => 'low',
            'fields' => array(

                array(
                    'id' => 'ut_post_hero',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Hero',
                    'desc' => 'Activate Hero for this post?',
                    'type' => 'radio_group_button',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                ),

                array(
                    'id' => 'ut_post_hero_height',
                    'label' => 'Hero Height',
                    'desc' => 'Use the slider bar to set your desired height in %.',
                    'metapanel' => 'ut-hero-type',
                    'type' => 'numeric_slider',
                    'std' => '50',
                    'min_max_step' => '50,100,1',
                    'global' => 'on',
                    'prefix' => 'ut_',
                ),
                
                array(
                    'id' => 'ut_post_hero_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Title and or Post Meta in Hero?',
                    'desc' => 'Shows your page title or a custom title as well as the post publish date inside your hero area.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_hero_custom_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Hero Custom Title',
                    'desc' => 'This option will replace the original posts title with a custom title.',
                    'type' => 'textarea_simple',
                    //'global' => 'on',
                    //'prefix' => 'ut_',
                    'rows' => '3',
                ),
                
                array(
                    'id' => 'ut_post_hero_down_arrow',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Down Arrow',
                    'desc' => 'The arrow down arrows allows your website visitor to auto scroll to the article on click.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_hero_mute_button',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Mute Button',
                    'desc' => 'Only available for video post format.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_hero_video_sound',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Activate Video Sound',
                    'desc' => 'Only available for video post format.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Post Title?',
                    'desc' => 'If you are already displaying the post title inside the hero, you can optionally hide the posts title inside the main content.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_custom_title',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Post Custom Title',
                    'desc' => 'This option will replace the original posts title with a custom title. Requires an active post title.',
                    'type' => 'text',
                    'rows' => '3',
                ),
            
                array(
                    'id' => 'ut_post_thumbnail',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Featured Image?',
                    'desc' => 'This option allows you to hide the featured image in your main content.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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
                    'id' => 'ut_post_video',
                    'metapanel' => 'ut-hero-type',
                    'label' => 'Show Featured Video?',
                    'desc' => 'This option allows you to hide the featured video in your main content. Only for post format video.',
                    'type' => 'select',
                    'std' => 'on',
                    'global' => 'on',
                    'prefix' => 'ut_',
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

            ) /* close fields */

        ); /* close settings array */

        ot_register_meta_box( $metabox_settings );

    }

add_action( 'admin_init', 'ut_bklyn_single_posts_metabox_settings' );

endif;