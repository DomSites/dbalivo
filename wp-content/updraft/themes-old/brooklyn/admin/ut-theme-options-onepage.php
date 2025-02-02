<?php

function _ut_theme_options_onepage( $base_settings ) {
    
    array_splice( $base_settings['sections'], 4, 0, array ( array(
        'id'          => 'ut_front_page_settings',
        'title'       => 'Front Page',
        'icon'        => 'frontpage-icon.png',
        'def_section' => 'ut_front_hero_styling_settings',
        'subsections' => array(
      
            array(
                'label'       => 'Hero Styling',
                'id'          => 'ut_front_hero_styling_settings',
                'def_section' => 'ut_front_hero_styling_settings',
                'subsections' => array(
                    
                    array(
                        'label'     => 'Caption',
                        'id'        => 'ut_front_caption_settings'
                    ),
                    
                    array(
                        'label'     => 'Overlay',
                        'id'        => 'ut_front_overlay_settings'                        
                    ),
                    
                    array(
                        'label'     => 'Border',
                        'id'        => 'ut_front_border_settings',
                    )                    
                
                )
                
            ),
            
            array(
                'label'       => 'Hero Type',
                'id'          => 'ut_front_hero_type_settings',
            ),
            
            array(
                'label'       => 'Hero Content',
                'id'          => 'ut_front_hero_content_settings',
                'def_section' => 'ut_front_hero_content_settings',
                'subsections' => array(
                    array(
                        'label'     => 'Custom HTML',
                        'id'        => 'ut_front_hero_caption_html'    
                    ),
                    array(
                        'label'     => 'Caption Slogan',
                        'id'        => 'ut_front_hero_caption_slogan'    
                    ),
                    array(
                        'label'     => 'Caption Title',
                        'id'        => 'ut_front_hero_caption_title'
                    ),
                    array(
                        'label'     => 'Caption Description',
                        'id'        => 'ut_front_hero_caption_description'
                    ),
                    array(
                        'label'     => 'Buttons',
                        'id'        => 'ut_front_hero_content_buttons'
                    ),
                                          
                )
            ),
            
            array(
                'label'     => 'Header and Navigation',
                'id'        => 'ut_front_navigation_settings'
            ),
            
        )
  
    ) ) );
    
    foreach( $base_settings['sections'] as $key => $section ) {
        
        if( $section['id'] == 'ut_blog_settings' ) {
                
            $base_settings['sections'][$key]['subsections'] = array_merge( array(
        
                    array(
                        'label'       => 'Hero Styling', 
                        'id'          => 'ut_blog_hero_styling_settings',
                        'def_section' => 'ut_blog_hero_styling_settings',
                        'subsections' => array(
                    
                            array(
                                'label'     => 'Caption',
                                'id'        => 'ut_blog_caption_settings'
                            ),
                            
                            array(
                                'label'     => 'Overlay',
                                'id'        => 'ut_blog_overlay_settings'                        
                            ),
                            
                            array(
                                'label'     => 'Border',
                                'id'        => 'ut_blog_border_settings',
                            )                    
                        
                        )

                    ),
                    
                    array(
                        'label'     => 'Hero Type',        
                        'id'        => 'ut_blog_hero_background_settings'
                    ),
                    
                    array(
                        'label'       => 'Hero Content',
                        'id'          => 'ut_blog_hero_settings',
                        'def_section' => 'ut_blog_hero_settings',
                        'subsections' => array(
                            array(
                                'label'     => 'Custom HTML',
                                'id'        => 'ut_blog_hero_caption_html'    
                            ),
                            array(
                                'label'     => 'Caption Slogan',
                                'id'        => 'ut_blog_hero_caption_slogan'    
                            ),
                            array(
                                'label'     => 'Caption Title',
                                'id'        => 'ut_blog_hero_caption_title'
                            ),
                            array(
                                'label'     => 'Caption Description',
                                'id'        => 'ut_blog_hero_caption_description'
                            ),
                            array(
                                'label'     => 'Buttons',
                                'id'        => 'ut_blog_hero_content_buttons'
                            ),
                                                  
                        )
                    ),
                     
                    array(
                        'label'     => 'Header and Navigation',
                        'id'        => 'ut_blog_navigation_settings'
                    ),
                
                ),
            
                $base_settings['sections'][$key]['subsections']
            
            );
            
            break;
        
        }
        
        if( $section['id'] == 'ut_advanced_settings' ) {
            
            $base_settings['sections'][$key]['subsections'] = array_merge( array(
                    
                    
                    
                ),
            
                $base_settings['sections'][$key]['subsections']
            
            );
            
            break;
        
        }        
    
    }
    
    $base_settings['settings'] = array_merge( $base_settings['settings'], array(
        
        /*
        |--------------------------------------------------------------------------
        | Hero Front Page
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_front_hero_styling_headline',
            'label'       => 'Hero Styling',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_styling_settings',
        ),
      
        array(
            'id'          => 'ut_front_hero_global_styling',
            'label'       => 'Use Global Hero Styling Settings?',
            'desc'        => 'Decide if you like to use individual settings for your front page hero or the global ones you set inside the <strong>Global Hero Settings</strong> tab.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_styling_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            
            ) 
        
        ),
                
        array(
            'id'          => 'ut_front_hero_caption_styling_headline',
            'label'       => 'Hero Caption Styling',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_caption_settings',
        ),        
        
        array(
            'id'          => 'ut_front_hero_caption_settings_info',
            'label'       => 'Hero Caption Styling',
            'desc'        => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Front Page</strong> > <strong>Hero Styling</strong>.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_caption_settings',
            'required'    => array(
                'ut_front_hero_global_styling'  => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_front_page_hero_style',
            'label'       => 'Hero Caption Style',
            'desc'        => 'Choose between 10 different hero caption styles. If you are using a slider as your desired hero type, you can define an individual style for each slide. <br /><a href="#" class="ut-hero-preview">Preview Hero Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_caption_settings',
            'choices'     => array( 
                array(
                    'value'     => 'ut-hero-style-1',
                    'label'     => 'Style One',
                ),
                array(
                    'value'     => 'ut-hero-style-2',
                    'label'     => 'Style Two'
                ),
                array(
                    'value'     => 'ut-hero-style-3',
                    'label'     => 'Style Three'
                ),
                array(
                    'value'     => 'ut-hero-style-4',
                    'label'     => 'Style Four'
                ),
                array(
                    'value'     => 'ut-hero-style-5',
                    'label'     => 'Style Five'
                ),
                array(
                    'value'     => 'ut-hero-style-6',
                    'label'     => 'Style Six'
                ),
                array(
                    'value'     => 'ut-hero-style-7',
                    'label'     => 'Style Seven'
                ),
                array(
                    'value'     => 'ut-hero-style-8',
                    'label'     => 'Style Eight'
                ),
                array(
                    'value'     => 'ut-hero-style-9',
                    'label'     => 'Style Nine'
                ),
                array(
                    'value'     => 'ut-hero-style-10',
                    'label'     => 'Style Ten'
                ),

            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_hero_align',
            'label'       => 'Choose Hero Caption Alignment',
            'desc'        => 'Specifies the default alignment for the caption inside the hero.',
            'type'        => 'select',
            'std'         => 'center',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_caption_settings',
            'choices'     => array( 
                array(
                    'value'       => 'center',
                    'label'       => 'Center'
                 ),
                array(
                    'value'       => 'left',
                    'label'       => 'Left'
                ),
                array(
                    'value'       => 'right',
                    'label'       => 'Right'
                )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
        ),
        
        
        array(
            'id'            => 'ut_front_page_overlay_settings_headline',
            'label'         => 'Hero Overlay Settings',
            'desc'          => 'Hero Overlay Settings',
            'type'          => 'panel_headline',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_overlay_settings',
        ),
        
        array(
            'id'           => 'ut_front_overlay_settings_info',
            'label'        => 'Hero Overlay Settings',
            'desc'         => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Front Page</strong> > <strong>Hero Styling</strong>.',
            'type'         => 'section_headline_info',
            'section'      => 'ut_front_page_settings',
            'subsection'   => 'ut_front_overlay_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_front_page_overlay',
            'label'       => 'Activate Hero Overlay?',
            'desc'        => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
            'std'         => 'on',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'yes, please!'
              ),
              array(
                'value'       => 'off',
                'label'       => 'no, thanks!'
              )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_color',
            'label'       => 'Hero Overlay Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay'         => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_color_opacity',
            'label'       => 'Hero Overlay Color Opacity',
            'desc'        => 'Drag the handle to set the opacity.',
            'type'        => 'numeric-slider',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'min_max_step'=> '0,1,0.1',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay'         => 'on'
            )        
        ),  
      
        array(
            'id'          => 'ut_front_page_overlay_pattern',
            'label'       => 'Activate Hero Overlay Pattern?',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'on',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'yes, please!'
              ),
              array(
                'value'       => 'off',
                'label'       => 'no, thanks!'
              )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay'         => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_pattern_style',
            'label'       => 'Hero Overlay Pattern Style',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'style_one',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'style_one',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'style_two',
                    'label'       => 'Style Two'
                )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay'         => 'on',
                'ut_front_page_overlay_pattern' => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_effect_settings_headline',
            'label'       => 'Hero Overlay Effect Settings',
            'desc'        => 'Hero Overlay Effect Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_effect',
            'label'       => 'Activate Overlay Animation Effect?',
            'desc'        => '<strong>(optional)</strong> Keep in mind, that this effect uses canvas objects for animation. Old Browsers do not support this feature!',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                 )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
            
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_effect_style',
            'label'       => 'Overlay Animation Effect',
            'desc'        => 'choose between 2 awesome animation effects!',
            'std'         => 'dots',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'dots',
                    'label'       => 'Connecting Dots'
                ),
                array(
                    'value'       => 'bubbles',
                    'label'       => 'Rising Bubbles'
                )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay_effect'  => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_overlay_effect_color',
            'label'       => 'Overlay Effect Color',
            'desc'        => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_overlay_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_page_overlay_effect'  => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_border_setting_headline',
            'label'       => 'Hero Border Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',           
        ),
        
        array(
            'id'           => 'ut_front_hero_border_settings_info',
            'label'        => 'Hero Overlay Settings',
            'desc'         => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Front Page</strong> > <strong>Hero Styling</strong>.',
            'type'         => 'section_headline_info',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_front_hero_border_bottom',
            'label'       => 'Activate Border',
            'desc'        => 'A customized CSS border at the bottom of the hero area.',
            'type'        => 'select',
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'std'         	=> 'off',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
            )
        ),
      
        array(
            'id'          	=> 'ut_front_hero_border_bottom_color',
            'label'       	=> 'Border Bottom Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_border_bottom'   => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_border_bottom_width',
            'label'       => 'Border Bottom Width',
            'desc'        => 'Drag the handle to set the border width.',
            'type'        => 'numeric-slider',
            'min_max_step'=> '1,100',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_border_bottom'   => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_border_bottom_style',
            'label'       => 'Border Bottom Style',
            'type'        => 'select',
            'desc'        => 'Creates a border at the bottom of the hero.',
            'std'         => 'solid',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',
            'choices'     => array(
                array(
                    'label'     => 'dashed',
                    'value'     => 'dashed'
                ),
                array(
                    'label'     => 'dotted',
                    'value'     => 'dotted'
                ),
                array(
                    'label'     => 'solid',
                    'value'     => 'solid'
                ),
                array(
                    'label'     => 'double',
                    'value'     => 'double'
                )
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_border_bottom'   => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_fancy_border_setting_headline',
            'label'       => 'Hero Fancy Border Settings',
            'desc'        => 'Hero Fancy Border',
            'type'        => 'section_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_fancy_border',
            'label'       => 'Activate Fancy Border?',
            'desc'        => 'Allows you to create a nice fancy border at the bottom of your hero area.',
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_border_settings',            
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
            )
        ),
      
        array(
            'id'          	=> 'ut_front_fancy_border_color',
            'label'       	=> 'Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_fancy_border'    => 'on'
            )
        ),
      
        array(
            'id'          	=> 'ut_front_fancy_border_background_color',
            'label'       	=> 'Background Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_fancy_border'    => 'on'
            )
        ),
      
        array(
            'id'            => 'ut_front_fancy_border_size',
            'label'         => 'Size',
            'desc'         	=> '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
            'type'          => 'text',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_border_settings',
            'required'      => array(
                'ut_front_hero_global_styling'  => 'off',
                'ut_front_hero_fancy_border'    => 'on'
            )
        ), 
      
        /*
        |--------------------------------------------------------------------------
        | Hero Type
        |--------------------------------------------------------------------------
        */
        
        array(
            'id'          => 'ut_front_hero_background_headline',
            'label'       => 'Hero Type',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
        ),
      
        array(
            'id'          => 'ut_front_page_header_type',
            'label'       => 'Select Hero Type',
            'desc'        => 'Choose between 8 individual hero types Brooklyn provides.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
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
        | Image Tab Slider
        */
      
        array(
            'id'          => 'ut_front_page_tabs_headline',
            'label'       => 'Tablet Headline',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'tabs'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_tabs_headline_style',
            'label'       => 'Tablet Headline Font Style',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => 'global',
            'choices'     => array( 
                array(
                    'value'       => 'global',
                    'label'       => 'Default'
                ),
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'tabs'
            )
        ),      
      
        array(
            'id'          => 'ut_front_page_tabs_tablet_color',
            'label'       => 'Tablet Color',
            'desc'        => 'Select your desired tablet color.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => 'black',
            'choices'     => array( 
                array(
                    'value'       => 'black',
                    'label'       => 'Black'
                ),
                array(
                    'value'       => 'white',
                    'label'       => 'White'
                ),
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'tabs'
            )
        ), 
      
        array(
            'id'          => 'ut_front_page_tabs_tablet_shadow',
            'label'       => 'Tablet Shadow',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                ),
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'tabs'
            )
        ),      
      
        array(
            'id'          => 'ut_front_page_tabs',
            'label'       => 'Manage Tablet Images',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'settings'    => array( 
              
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),                      
                array(
                    'id'          => 'description',
                    'label'       => 'Image Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),              
                array(
                    'id'          => 'link_one_url',
                    'label'       => 'Left Button URL',
                    'type'        => 'text'
                ),              
                array(
                    'id'          => 'link_one_text',
                    'label'       => 'Left Button Text',
                    'type'        => 'text'
                ),              
                array(
                    'id'          => 'link_two_url',
                    'label'       => 'Right Button URL',
                    'type'        => 'text'
                ),              
                array(
                    'id'          => 'link_two_text',
                    'label'       => 'Right Button Text',
                    'type'        => 'text'
                )
              
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'tabs'
            )
        ),
      
        /*
        | Image Type
        */
        
        array(
            'id' => 'front_hero_height',
            'label' => 'Custom Hero Height',
            'desc' => 'Use the slider bar to set your desired height in %.',
            'section' => 'ut_front_page_settings',
            'subsection' => 'ut_front_hero_type_settings',
            'type' => 'numeric_slider',
            'std' => '100',
            'required' => array(
                'ut_front_page_header_type' => 'image|video|animatedimage'
            ),
        ),
        
        array(
            'id' => 'ut_front_hero_v_align',
            'label' => 'Choose Hero Caption Vertical Alignment',
            'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
            'section' => 'ut_front_page_settings',
            'subsection' => 'ut_front_hero_type_settings',
            'type' => 'select',
            'std' => 'middle',
            'choices' => array(
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
                'ut_front_page_header_type' => 'image|video|animatedimage'
            ),
        ),

        array(
            'id' => 'ut_front_hero_v_align_margin_bottom',
            'label' => 'Hero Content Margin Bottom',
            'desc' => 'Leave this field empty if you like to use the global value. Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
            'section' => 'ut_front_page_settings',
            'subsection' => 'ut_front_hero_type_settings',
            'type' => 'text',
            'required' => array(
                'ut_front_page_header_type' => 'image|video|animatedimage',
                'ut_front_hero_v_align' => 'bottom'    
            ),
        ),
        
        array(
            'id'          => 'ut_front_header_parallax',
            'label'       => 'Activate Parallax',
            'desc'        => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'image|splithero|tabs|dynamic'
            )
        ),
      
        array(
            'id'          => 'ut_front_header_rain',
            'label'       => 'Activate Rain Effect',
            'desc'        => 'Keep in mind, that activating this option can reduce your website performance.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'std'         => 'off',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'image|splithero'
            )
        ),
      
        array(
            'id'          => 'ut_front_header_rain_sound',
            'label'       => 'Activate Rain Sound',
            'desc'        => 'The sound of rain is one of the most relaxing sounds in existence and now avilable for your website.',  
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'image|splithero'
            )
        ),
       
        array(
            'id'          => 'ut_front_header_image',
            'label'       => 'Background Image',
            'desc'        => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size. Keep in mind, that you are not able to set a background position or attachment if the parallax option has been set to "on".',
            'type'        => 'background',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'image|splithero|tabs|dynamic'
            )
        ),
      
        array(
            'id'          => 'ut_front_split_content_type',
            'label'       => 'Hero Split Content Type',
            'type'        => 'select',
            'choices'     => array( 
                array(
                    'value'       => 'image',
                    'label'       => 'Image'
                ),
                array(
                    'value'       => 'video',
                    'label'       => 'Video'
                )
            ),
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero'
            )
        ),
      
        array(
            'id'          => 'ut_front_split_video',
            'label'       => 'Hero Split Video',
            'desc'        => 'This video will display on the right side of the hero caption. It will not display on mobile devices! Please use the only embed codes from youtube or vimeo.',
            'type'        => 'textarea_simple',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'markup'     => '1_1',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_front_split_video_box',
            'label'       => 'Activate Hero Split Video Box',
            'desc'        => 'Display a shadowed box around the video.',
            'type'        => 'select',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'video'
            )
          
        ),
      
        array(
            'id'          => 'ut_front_split_video_box_style',
            'label'       => 'Hero Split Video Box Style',
            'type'        => 'select',
            'choices'     => array( 
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'dark',
                    'label'       => 'Dark'
                )
            ),
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'video',
                'ut_front_split_video_box'      => 'on'
            )
        ),
      
        array(
              'id'          => 'ut_front_split_video_box_padding',
              'label'       => 'Hero Split Video Box Padding',
              'desc'        => 'Set padding of the box in pixel e.g. 20px. default: 20px',
              'type'        => 'text',
              'section'     => 'ut_front_page_settings',
              'subsection'  => 'ut_front_hero_type_settings',
              'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'video',
                'ut_front_split_video_box'      => 'on'
            )
        ),      
      
        array(
            'id'          => 'ut_front_split_image',
            'label'       => 'Hero Split Image',
            'desc'        => 'This image will display on the right side of the hero caption. It will not display on mobile devices!',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'image'
            )
        ),
      
        array(
            'id'          => 'ut_front_split_image_effect',
            'label'       => 'Hero Split Image Animation Effect',
            'desc'        => 'Choose animation effect for Hero Split Image.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => 'none',
            'choices'     => array( 
                array(
                    'value'       => 'none',
                    'label'       => 'No effect'
                ),
                array(
                    'value'       => 'fadeIn',
                    'label'       => 'Fade In'
                ),
                array(
                    'value'       => 'slideInRight',
                    'label'       => 'Slide in Right'
                ),
                array(
                    'value'       => 'slideInLeft',
                    'label'       => 'Slide in Left'
                ),
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'image'
            )
        ), 
      
        array(
            'id'          => 'ut_front_split_image_max_width',
            'label'       => 'Image Max Width',
            'desc'        => 'Adjust this value until the image fits inside the hero. Default "60".',
            'type'        => 'numeric-slider',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => '60',
            'min_max_step'=> '0,100,1',
            'required'    => array(
                'ut_front_page_header_type'     => 'splithero',
                'ut_front_split_content_type'   => 'image'
            )
        ),
            
        /*
        | Animated Image Type
        */
        
        array(
            'id'          => 'ut_front_header_animatedimage',
            'label'       => 'Animated Background Image',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'animatedimage'
            )
        ),
      
        /*
        | Slider Type
        */
      
        array(
            'id'          => 'front_animation_speed',
            'label'       => 'Animation Speed',
            'desc'        => 'Set speed of animations, in milliseconds.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
      
        array(
            'id'          => 'front_slideshow_speed',
            'label'       => 'Slideshow Speed',
            'desc'        => 'Set speed of the slideshow cycling, in milliseconds.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
      
        array(
            'id'          => 'ut_front_page_slider',
            'label'       => 'Slider',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'settings'    => array( 
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'style',
                    'label'       => 'Caption / Hero Style',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'ut-hero-style-1',
                            'label'       => 'Style One'
                        ),
                        array(
                            'value'       => 'ut-hero-style-2',
                            'label'       => 'Style Two'
                        ),
                        array(
                            'value'       => 'ut-hero-style-3',
                            'label'       => 'Style Three'
                        ),
                        array(
                            'value'       => 'ut-hero-style-4',
                            'label'       => 'Style Four'
                        ),
                        array(
                            'value'       => 'ut-hero-style-5',
                            'label'       => 'Style Five'
                        ),
                        array(
                            'value'       => 'ut-hero-style-6',
                            'label'       => 'Style Six'
                        ),
                        array(
                            'value'       => 'ut-hero-style-7',
                            'label'       => 'Style Seven'
                        ),
                        array(
                            'value'       => 'ut-hero-style-8',
                            'label'       => 'Style Eight'
                        ),
                        array(
                            'value'       => 'ut-hero-style-9',
                            'label'       => 'Style Nine'
                        ),
                        array(
                            'value'       => 'ut-hero-style-10',
                            'label'       => 'Style Ten'
                        ),

                    ),
                ),
                array(
                    'id'          => 'font_style',
                    'label'       => 'Caption / Hero Font Style',
                    'desc'        => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Content).',
                    'type'        => 'select',
                    'std'         => 'global',
                    'choices'     => array( 
                        array(
                            'value'       => 'global',
                            'label'       => 'Default'
                        ),
                        array(
                            'value'       => 'extralight',
                            'label'       => 'Extra Light'
                        ),
                        array(
                            'value'       => 'light',
                            'label'       => 'Light'
                        ),
                        array(
                            'value'       => 'regular',
                            'label'       => 'Regular'
                         ),
                        array(
                            'value'       => 'medium',
                            'label'       => 'Medium'
                        ),
                        array(
                            'value'       => 'semibold',
                            'label'       => 'Semi Bold'
                        ),
                        array(
                            'value'       => 'bold',
                            'label'       => 'Bold'
                        )
                    ),
                ),
                array(
                    'id'          => 'align',
                    'label'       => 'Choose Caption Alignment',
                    'type'        => 'select',
                    'std'         => 'center',
                    'choices'     => array(     
                        array(
                            'value'       => 'center',
                            'label'       => 'Center'
                        ),
                        array(
                            'value'       => 'left',
                            'label'       => 'Left'
                        ),
                        array(
                            'value'       => 'right',
                            'label'       => 'Right'
                        )
                    ),
                ),
                array(
                    'id'          => 'direction',
                    'label'       => 'Caption Animation Direction',
                    'std'          => 'top',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'top',
                            'label'       => 'Top'
                        ),
                        array(
                            'value'       => 'left',
                            'label'       => 'Left'
                        ),
                        array(
                            'value'       => 'right',
                            'label'       => 'Right'
                        ),
                        array(
                            'value'       => 'bottom',
                            'label'       => 'Bottom'
                        )
                          
                    ),
                ),
                array(
                    'id'          => 'expertise',
                    'label'       => 'Caption Slogan',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                 ),
                array(
                    'id'          => 'description',
                    'label'       => 'Caption',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'catchphrase',
                    'label'       => 'Caption Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link',
                    'label'       => 'Link',
                    'type'        => 'text',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link_description',
                    'label'       => 'Link Button Text',
                    'type'        => 'text'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),    
      
        array(
            'id'          => 'front_slideshow_color_settings_headline',
            'label'       => 'Slider Navigation Color Settings',
            'desc'        => 'Slider Navigation Color Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
             'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
        
        array(
            'id'          => 'front_slideshow_arrow_background_color',
            'label'       => 'Arrow Background Color',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
             'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
        
        array(
            'id'          => 'front_slideshow_arrow_background_color_hover',
            'label'       => 'Arrow Background Color Hover',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
             'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
        
        array(
            'id'          => 'front_slideshow_arrow_color',
            'label'       => 'Arrow Color',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
             'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
        
        array(
            'id'          => 'front_slideshow_arrow_color_hover',
            'label'       => 'Arrow Color Hover',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
             'required'    => array(
                'ut_front_page_header_type'     => 'slider'
            )
        ),
            
        /*
        | Fancy Slider
        */
      
        array(
            'id'          => 'ut_front_page_fancy_slider',
            'label'       => 'Fancy Slider',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'settings'    => array( 
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'style',
                    'label'       => 'Caption / Hero Style',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'ut-hero-style-1',
                            'label'       => 'Style One'
                        ),
                        array(
                            'value'       => 'ut-hero-style-2',
                            'label'       => 'Style Two'
                        ),
                        array(
                            'value'       => 'ut-hero-style-3',
                            'label'       => 'Style Three'
                        ),
                        array(
                            'value'       => 'ut-hero-style-4',
                            'label'       => 'Style Four'
                        ),
                        array(
                            'value'       => 'ut-hero-style-5',
                            'label'       => 'Style Five'
                        ),
                        array(
                            'value'       => 'ut-hero-style-6',
                            'label'       => 'Style Six'
                        ),
                        array(
                            'value'       => 'ut-hero-style-7',
                            'label'       => 'Style Seven'
                        ),
                        array(
                            'value'       => 'ut-hero-style-8',
                            'label'       => 'Style Eight'
                        ),
                        array(
                            'value'       => 'ut-hero-style-9',
                            'label'       => 'Style Nine'
                        ),
                        array(
                            'value'       => 'ut-hero-style-10',
                            'label'       => 'Style Ten'
                        ),

                    ),            
                ),                
                array(
                    'id'          => 'font_style',
                    'label'       => 'Caption / Hero Font Style',
                    'desc'          => 'Setting this option to default will load the hero font style ( which has been set under Front Page Settings -> Hero Settings ).',
                    'type'        => 'select',
                    'std'          => 'global',
                    'choices'     => array( 
                         array(
                            'value'       => 'global',
                            'label'       => 'Default'
                        ),
                        array(
                            'value'       => 'extralight',
                            'label'       => 'Extra Light'
                        ),
                        array(
                            'value'       => 'light',
                            'label'       => 'Light'
                        ),
                        array(
                            'value'       => 'regular',
                            'label'       => 'Regular'
                        ),
                        array(
                            'value'       => 'medium',
                            'label'       => 'Medium'
                        ),
                        array(
                            'value'       => 'semibold',
                            'label'       => 'Semi Bold'
                        ),
                        array(
                            'value'       => 'bold',
                            'label'       => 'Bold'
                        )
                    ),
                ),
                array(
                    'id'          => 'align',
                    'label'       => 'Choose Caption Alignment',
                    'type'        => 'select',
                    'std'         => 'left',
                    'choices'     => array( 
                        array(
                            'value'       => 'center',
                            'label'       => 'Center'
                        ),
                        array(
                            'value'       => 'left',
                            'label'       => 'Left'
                        ),
                        array(
                            'value'       => 'right',
                            'label'       => 'Right'
                        )
                    ),
                ),
                
                array(
                    'id'          => 'expertise',
                    'label'       => 'Caption Slogan',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'description',
                    'label'       => 'Caption',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'catchphrase',
                    'label'       => 'Caption Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link',
                    'label'       => 'Link',
                    'type'        => 'text',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'scroll_to_target',
                    'label'       => 'Scroll to Content Target',
                    'desc'        => 'Select the page, section you like to scroll to. Leave empty to scroll to the first section.',
                    'type'        => 'section-select',
                ),
                array(
                    'id'          => 'link_description',
                    'label'       => 'Link Button Text',
                    'type'        => 'text'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'transition'
            )
        ),
      
        array(
            'id'          => 'front_fancy_slider_effect',
            'label'       => 'Slide Effect',
            'desc'        => 'Choose an effect for your slider, this effect will affect all slides.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'         => 'fxSoftScale',
            'choices'     => array( 
                array(
                    'value'       => 'fxSoftScale',
                    'label'       => 'Soft scale'
                ),
                array(
                    'value'       => 'fxPressAway',
                    'label'       => 'Press away'
                ),
                array(
                    'value'       => 'fxSideSwing',
                    'label'       => 'Side Swing'
                ),
                array(
                    'value'       => 'fxFortuneWheel',
                    'label'       => 'Fortune wheel'
                ),
                array(
                    'value'       => 'fxSwipe',
                    'label'       => 'Swipe'
                ),
                array(
                    'value'       => 'fxPushReveal',
                    'label'       => 'Push reveal'
                ),
                array(
                    'value'       => 'fxSnapIn',
                    'label'       => 'Snap in'
                ),
                array(
                    'value'       => 'fxLetMeIn',
                    'label'       => 'Let me in'
                ),
                array(
                    'value'       => 'fxStickIt',
                    'label'       => 'Stick it'
                ),
                array(
                    'value'       => 'fxArchiveMe',
                    'label'       => 'Archive me'
                ),
                array(
                    'value'       => 'fxVGrowth',
                    'label'       => 'Vertical growth'
                ),
                array(
                    'value'       => 'fxSlideBehind',
                    'label'       => 'Slide Behind'
                ),
                array(
                    'value'       => 'fxSoftPulse',
                    'label'       => 'Soft Pulse'
                ),
                array(
                    'value'       => 'fxEarthquake',
                    'label'       => 'Earthquake'
                ),
                array(
                    'value'       => 'fxCliffDiving',
                    'label'       => 'Cliff diving'
                )
              
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'transition'
            )
        ),
        
        array(
            'id'          => 'front_fancy_slider_height',
            'label'       => 'Slider Height',
            'desc'        => 'Set height of the slideshow in pixel e.g. 600px.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'transition'
            )
        ),
      
        /*
        | Custom Shortcode
        */
      
        array(
            'id'          => 'front_hero_custom_shortcode',
            'label'       => 'Custom Shortcode',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'custom'
            )
        ),
    
        /*
        | Video
        */
      
        array(
            'id'          => 'ut_front_video_setting_info',
            'label'       => 'Video',
            'desc'        => 'At the current stage the theme only supports youtube videos as well as selfhosted videos. Custom Player are possible, but using them will cause many hero options not taking effect. If a mobile or tablet device is visiting the site, the video hero support will be dropped and the theme will display a poster image instead. The main reason for this behavior is, that most mobile and tablet devices do not support video backgrounds.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_containment',
            'label'       => 'Set this Video as background too?',
            'desc'        => 'This option here places the video "behind" the entire front page instead of only inside the hero. As a result, the video appears "behind" each section which does not have a background color nor background image. While you are able to set a video per section, this option here makes sense if you need to use the same video again and again in several sections, so instead of placing the same video in 5 sections - make the affected section transparent, so that this video here will display inside ( behind ) the section. If you need different videos in different sections, skip this option here and set videos per page /section. This option does only effect on youtube and selfhosted videos. Custom Embedded Videos are not supported.',
            'std'         => 'hero',
            'type'        => 'select',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'body',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'hero',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_source',
            'label'       => 'Video Source',
            'desc'        => 'Select your desired source for videos.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'std'          => 'youtube',
            'choices'     => array( 
                array(
                    'value'       => 'youtube',
                    'label'       => 'Youtube'
                ),
                array(
                    'value'       => 'selfhosted',
                    'label'       => 'Selfthosted'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'Custom Embedded Code'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_front_video',
            'label'       => 'Video URL for Front Page.',
            'desc'        => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code! This video will be displayed on the front page.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_custom',
            'label'       => 'Video embedded code for front page.',
            'desc'        => 'Please insert the complete embedded code of your favorite video hoster! This video will be displayed on the front page. Keep in mind, that hero settings like "Hero Caption" do not display if this type of video source is active.',
            'type'        => 'textarea-simple',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'custom'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_mp4',
            'label'       => 'MP4',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_ogg',
            'label'       => 'OGG',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_webm',
            'label'       => 'WEBM',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_sound',
            'label'       => 'Activate video sound after page is loaded?',
            'desc'        => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube|selfhosted'
                
            )
        ),
      
        array(
            'id'              => 'ut_front_video_loop',
            'label'           => 'Loop Video?',
            'desc'            => 'Whether the video should start over again when finished.',
            'type'            => 'select',
            'section'         => 'ut_front_page_settings',
            'subsection'      => 'ut_front_hero_type_settings',
            'choices'         => array(
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )
              
            ),
            'std'             => 'on',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'            => 'ut_front_video_preload',
            'label'         => 'Preload Video?',
            'desc'          => 'whether the video should be loaded when the page loads',
            'type'          => 'select',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_hero_type_settings',
            'choices'       => array(
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'std'             => 'on',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'selfhosted'
            )
        ),
            
        array(
            'id'              => 'ut_video_mute_button',
            'label'           => 'Show Mute Button?',
            'desc'            => 'whether the video mute button is displayed or not.',
            'type'            => 'select',
            'section'         => 'ut_front_page_settings',
            'subsection'      => 'ut_front_hero_type_settings',
            'choices'         => array(
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'show'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'hide'
                )              
            ),
            'std'             => 'hide',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_front_video_volume',
            'label'       => 'Video Volume',
            'desc'        => 'Drag the handle to set the video volume.',
            'std'         => '5',
            'type'        => 'numeric-slider',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'min_max_step'=> '0,100,1',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube|selfhosted'
            )
        ),      
                  
        array(
            'id'          => 'ut_front_video_poster',
            'label'       => 'Poster Image',
            'desc'        => 'This image will be displayed instead of the video on mobile devices.',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_type_settings',
            'required'    => array(
                'ut_front_page_header_type'     => 'video',
                'ut_front_video_source'         => 'youtube|selfhosted'
            )
        ),
        
        
        
        
             
        /*
        |--------------------------------------------------------------------------
        | Hero Front Settings
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_front_hero_settings_headline',
            'label'       => 'Hero Content',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_settings',
        ),
      
        array(
            'id'          => 'ut_front_hero_global_content_styling',
            'label'       => 'Use Global Hero Content Color Settings?',
            'desc'        => '<strong>(optional)</strong>. Once you selected "no, thanks" additional colorpicker fields are becoming available inside the different option sections.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
                
            ) /* end choices */
        ),
        
        array(
            'id'          => 'ut_front_custom_html_settings_headline',
            'label'       => 'Hero Custom HTML',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_html',
        ),
        
        array(
            'id'          => 'ut_front_custom_slogan',
            'label'       => 'Custom Hero HTML',
            'desc'        => 'This field appears above the Hero Caption Slogan.',
            'type'        => 'textarea',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_html',
            'rows'        => '10'
        ),
        
        array(
            'id'          => 'ut_front_expertise_slogan_settings_headline',
            'label'       => 'Hero Caption Slogan',
            'desc'        => 'Hero Caption Slogan Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_slogan',
            
        ),
        
        array(
            'id'          => 'ut_front_expertise_slogan',
            'label'       => 'Hero Caption Slogan',
            'desc'        => 'This element appears above the Hero Caption.',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_slogan',
            'rows'        => '5'
        ),
        array(
            'id'          => 'ut_front_expertise_slogan_color',
            'label'       => 'Hero Caption Slogan Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Slogan</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_slogan',
            'required'    => array(
                'ut_front_hero_global_content_styling'      => 'off'
            )
        ),
        
        array(
            'id'          => 'ut_front_expertise_slogan_background_color',
            'label'       => 'Hero Caption Slogan Background Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate background color for <strong>Hero Caption Slogan</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_slogan',
            'required'    => array(
                'ut_front_hero_global_content_styling'      => 'off'
            )
        ),  
              
        array(
            'id'          => 'ut_front_company_slogan_settings_headline',
            'label'       => 'Hero Caption',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title',
        ),
      
        array(
            'id'          => 'ut_front_company_slogan',
            'label'       => 'Hero Caption Title',
            'desc'        => 'This field also accepts HTML tags and shortcodes such as word rotator for example.',
            'htmldesc'    => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title',
            'rows'        => '5'
        ),
      
        array(
            'id'          => 'ut_front_company_slogan_color',
            'label'       => 'Hero Caption Title Color',
            'desc'        => '<strong>(optional)</strong> - set an alternative for <strong>Hero Caption Title</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title',
            'required'    => array(
                'ut_front_hero_global_content_styling'      => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_company_slogan_letterspacing',
            'label'       => 'Hero Caption Title Letterspacing',
            'desc'        => '<strong>(optional)</strong> - include "px" in your string. e.g. 2px',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title'
        ),
           
        array(
            'id'          => 'ut_front_company_slogan_uppercase',
            'label'       => 'Hero Caption Title Text Transform',
            'desc'        => 'Display the Hero Caption Title in uppercase letters?',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title',
            'std'          => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
            )
        ),
            
        array(
            'id'          => 'ut_front_company_slogan_glow',
            'label'       => 'Hero Caption Title Gloweffect',
            'desc'        => 'Activate Glow Effect for Hero Caption Title?',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_title',
            'std'         => 'off',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'yes please!'
              ),
              array(
                'value'       => 'off',
                'label'       => 'no thanks!'
              ),
            )
        ),
        
        array(
            'id'          => 'ut_front_catchphrase_settings_headline',
            'label'       => 'Hero Caption Description Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_description',
        ),      
       
        array(
            'id'          => 'ut_front_catchphrase',
            'label'       => 'Hero Caption Description',
            'desc'        => 'This field appears beneath the Hero Caption.  ',
            'type'        => 'textarea-simple',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_description',
            'rows'        => '5'
        ),
      
        array(
            'id'          => 'ut_front_catchphrase_color',
            'label'       => 'Hero Caption Description Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Description</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_caption_description',
            'required'    => array(
                'ut_front_hero_global_content_styling'      => 'off'
            )
        ),
            
        array(
            'id'          => 'ut_front_button_settings_headline',
            'label'       => 'Hero Button Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
        ), 
      
        array(
            'id'          => 'ut_front_scroll_to_main',
            'label'       => 'Hero Main Button Text',
            'desc'        => 'Enter your desired text or leave this field empty to hide the button.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons'
        ),
      
        array(
            'id'          => 'ut_front_scroll_to_main_url_type',
            'label'       => 'Hero Main Button Link Type',
            'desc'        => 'Do you like to link to a section or external URL?',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => 'section',
            'choices'     => array( 
                array(
                    'value'       => 'section',
                    'label'       => 'to a section of the front page!'
                ),
                array(
                    'value'       => 'external',
                    'label'       => 'to an external url!'
                ),          
            )
        ),
      
        array(
            'id'          => 'ut_front_scroll_to_main_target',
            'label'       => 'Scroll to Section',
            'desc'        => 'Select the section you like to main button. <br />Leave empty (set to -- Choose One --) to scroll to the first section.',
            'type'        => 'section-select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_scroll_to_main_url_type'      =>  'section'
            )
        ),
      
        array(
            'id'          => 'ut_front_scroll_to_main_url',
            'label'       => 'Main Button URL',
            'desc'        => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_scroll_to_main_url_type'      =>  'external'
            )
        ),
      
        array(
            'id'          => 'ut_front_scroll_to_main_link_target',
            'label'       => 'Main Button Target',
            'desc'        => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => '_blank',
            'choices'     => array( 
                array(
                    'value'       => '_blank',
                    'label'       => 'blank'
                ),
                array(
                    'value'       => '_self',
                    'label'       => 'self'
                ),          
            ),
            'required'    => array(
                'ut_front_scroll_to_main_url_type'      =>  'external'
            )            
        ),
      
        array(
            'id'          => 'ut_front_scroll_to_main_style',
            'label'       => 'Choose Main Hero Button Style',
            'desc'        => 'Use our theme default button or design your own one.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => 'default',
            'choices'     => array( 
                array(
                    'value'       => 'default',
                    'label'       => 'default'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'custom'
                ),      
            ),
        ),
      
        array(
            'id'          => 'ut_front_hrbtn',
            'label'       => 'Custom Button Styling',
            'type'        => 'button_builder',
            'desc'        => 'Makes it easy to style buttons.',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_scroll_to_main_style'      =>  'custom'
            ) 
        ),
      
        array(
            'id'          => 'ut_front_second_button',
            'label'       => 'Need a second button inside the page hero?',
            'desc'        => 'A clickable button to link to a desired target such as a page or section.',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),          
            )
        ),
      
        array(
            'id'          => 'ut_front_second_button_text',
            'label'       => 'Second Button Text',
            'desc'        => 'Enter your desired button text.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_second_button'      =>  'on'
            ) 
        ),
      
        array(
            'id'          => 'ut_front_second_button_url_type',
            'label'       => 'Second Button Link Type',
            'desc'        => 'Would you like to link to a section or external URL?"',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => 'section',
            'choices'     => array( 
              array(
                'value'       => 'section',
                'label'       => 'to a section of the front page!'
              ),
              array(
                'value'       => 'external',
                'label'       => 'to an external url!'
              ),          
            ),
            'required'    => array(
                'ut_front_second_button'      =>  'on'
            )
        ),      
      
        array(
            'id'          => 'ut_front_second_button_scroll_target',
            'label'       => 'Scroll to Section (for second button)',
            'desc'        => 'Select the section you like to scroll to. Leave empty (set to -- Choose One --) to scroll to the first available section.',
            'type'        => 'section-select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_second_button'            => 'on',
                'ut_front_second_button_url_type'   => 'section'
            )
        ),
      
        array(
            'id'          => 'ut_front_second_button_url',
            'label'       => 'Second Button URL',
            'desc'        => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_second_button'            => 'on',
                'ut_front_second_button_url_type'   => 'external'
            )
        ),
      
        array(
            'id'          => 'ut_front_second_button_target',
            'label'       => 'Second Button Target',
            'desc'        => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => '_blank',
            'choices'     => array( 
                array(
                    'value'       => '_blank',
                    'label'       => 'blank'
                ),
                array(
                    'value'       => '_self',
                    'label'       => 'self'
                ),          
            ),
            'required'    => array(
                'ut_front_second_button'            => 'on',
                'ut_front_second_button_url_type'   => 'external'
            )
        ),
      
        array(
            'id'          => 'ut_front_second_button_style',
            'label'       => 'Choose hero second button style',
            'desc'        => 'Use our theme default button or design your own one.',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'         => 'default',
            'choices'     => array( 
                array(
                    'value'       => 'default',
                    'label'       => 'default'
                ),
                array(
                    'value'       => 'custom',
                    'label'       => 'custom'
                ),      
            ),
            'required'    => array(
                'ut_front_second_button'    => 'on',
            )                
        ),
      
        array(
            'id'          => 'ut_front_second_hrbtn',
            'label'       => 'Custom Button Styling',
            'type'        => 'button_builder',
            'desc'        => 'Makes it easy to style buttons.',
            'markup'      => '1_1',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_second_button'        => 'on',
                'ut_front_second_button_style'  => 'custom'
            )
        ),      
      
        array(
            'id'          => 'ut_front_hero_buttons_margin',
            'label'       => 'Buttons Margin Top',
            'desc'        => 'Increase the space between Hero Caption Title and Hero Buttons. (optional) - default 0px',
            'type'        => 'text',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
        ),      
      
        array(
            'id'          => 'ut_front_hero_down_arrow',
            'label'       => 'Activate Scroll Down Arrow?',
            'desc'        => 'A large double lined down arrow. Clicking the arrow automatically scrolls to the main content.',
            'type'        => 'radio',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'std'          => 'off',
            'choices'     => array( 
              array(
                'value'       => 'off',
                'label'       => 'no thanks!'
              ),
              array(
                'value'       => 'on',
                'label'       => 'yes please!'
              ),          
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_down_arrow_scroll_target',
            'label'       => 'Scroll to Section ( for Scroll Down Arrow )',
            'desc'        => 'Select the section you like to scroll to. <br />Leave empty ( set to -- Choose One -- ) to scroll to the first available section.',
            'type'        => 'section-select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_hero_down_arrow'      => 'on'
            )
        ),
    
        array(
            'id'          => 'ut_front_hero_down_arrow_scroll_position',
            'label'       => 'Scroll Down Arrow Horizontal Position',
            'desc'        => 'Drag the handle to set your desired horizontal position.',
            'type'        => 'numeric_slider',
            'std'         => '50',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_hero_down_arrow'      => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_front_hero_down_arrow_scroll_position_vertical',
            'label'       => 'Scroll Down Arrow Vertical Position',
            'desc'        => 'Drag the handle to set your desired vertical position.',
            'type'        => 'numeric_slider',
            'std'         => '80',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_hero_down_arrow'      => 'on'
            )
        ),      
      
        array(
            'id'          => 'ut_front_hero_down_arrow_color',
            'label'       => 'Scroll Down Arrow Color',
            'desc'        => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_hero_content_buttons',
            'required'    => array(
                'ut_front_hero_down_arrow'      => 'on'
            )
        ),      
      
        /*
        |--------------------------------------------------------------------------
        | Front Header Configuration
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_front_navigation_setting_headline',
            'label'       => 'Header and Navigation',
            'type'        => 'panel_headline',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
        ),

        array(
            'id'         	=> 'ut_front_navigation_config',
            'section'       => 'ut_front_page_settings',
            'subsection'    => 'ut_front_navigation_settings',
            'label'       	=> 'Use Global Navigation Settings?',
            'type'        	=> 'select',
            'choices'     	=> array(          
                array(
                    'label'       => 'yes',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no',
                    'value'       => 'off'
                )	  
            ),
            'std'         	=> 'on'
        ),
             
        array(
            'id'          => 'ut_front_navigation_skin',
            'label'       => 'Header and Navigation Color Skin',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'std'         => 'ut-header-light',
            'choices'     => array( 
                array(
                    'value'       => 'ut-header-dark',
                    'label'       => 'Dark'
                ),
                array(
                    'value'       => 'ut-header-light',
                    'label'       => 'Light'
                )
            ),
            'required'  => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
     
        array(
            'id'          => 'ut_front_navigation_shadow',
            'label'       => 'Header and Navigation Shadow',
            'desc'        => 'Activate Navigation / Header Shadow?',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'std'         => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
             'required'  => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
       
        array(
            'id'          => 'ut_front_navigation_width',
            'label'       => 'Header and Navigation Width',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'std'         => 'centered',
            'choices'     => array( 
                array(
                    'value'       => 'centered',
                    'label'       => 'Centered'
                ),
                array(
                    'value'       => 'fullwidth',
                    'label'       => 'Fullwidth'
                )
            ),
             'required'  => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_navigation_state',
            'label'       => 'Always show Header and Navigation?',
            'desc'        => 'This option makes the navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On (with chosen skin)'
                ),
                array(
                    'value'       => 'on_transparent',
                    'label'       => 'On (transparent)'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
             'required'   => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_navigation_transparent_border',
            'label'       => 'Activate Navigation Border Bottom?',
            'type'        => 'select',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
             'required'   => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
            
        array(
            'id'          => 'ut_front_navigation_level_one_color',
            'label'       => 'Header and Navigation First Level Color',
            'desc'        => 'Change the font color of the first navigation level.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'required'    => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_front_navigation_level_one_icon_color',
            'label'       => 'Header and Navigation First Level Dot Color',
            'desc'        => 'Change the dot color of the first navigation level.',
            'type'        => 'colorpicker',
            'section'     => 'ut_front_page_settings',
            'subsection'  => 'ut_front_navigation_settings',
            'required'    => array(
                'ut_front_navigation_config'    => 'off'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Hero Blog
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_hero_styling_headline',
            'label'       => 'Hero Styling',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_styling_settings',
        ),
      
        array(
            'id'          => 'ut_blog_hero_global_styling',
            'label'       => 'Use Global Hero Styling Settings?',
            'desc'        => 'Decide if you like to use individual settings for your blog hero or the global ones you set inside the <strong>Global Hero Settings</strong> tab.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_styling_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
                
            ) /* end choices */
        ),
      
        array(
            'id'          => 'ut_blog_hero_caption_styling_headline',
            'label'       => 'Hero Caption Styling',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_caption_settings',
        ),        
        
        array(
            'id'          => 'ut_blog_hero_caption_settings_info',
            'label'       => 'Hero Caption Styling',
            'desc'        => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Blog</strong> > <strong>Hero Styling</strong>.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_caption_settings',
            'required'    => array(
                'ut_blog_hero_global_styling'  => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_style',
            'label'       => 'Hero Caption Style',
            'desc'        => 'Choose between 10 different hero header styles. If you are using a slider as your desired hero type, you can define an individual style for each slide.<a href="#" class="ut-hero-preview">Preview Hero Styles</a>',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_caption_settings',
            'choices'     => array( 
                array(
                    'value'       => 'ut-hero-style-1',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'ut-hero-style-2',
                    'label'       => 'Style Two'
                ),
                array(
                    'value'       => 'ut-hero-style-3',
                    'label'       => 'Style Three'
                ),
                array(
                    'value'       => 'ut-hero-style-4',
                    'label'       => 'Style Four'
                ),
                array(
                    'value'       => 'ut-hero-style-5',
                    'label'       => 'Style Five'
                ),
                array(
                    'value'       => 'ut-hero-style-6',
                    'label'       => 'Style Six'
                ),
                array(
                    'value'       => 'ut-hero-style-7',
                    'label'       => 'Style Seven',
                ),
                array(
                    'value'       => 'ut-hero-style-8',
                    'label'       => 'Style Eight'
                ),
                array(
                    'value'       => 'ut-hero-style-9',
                    'label'       => 'Style Nine'
                ),
                array(
                    'value'       => 'ut-hero-style-10',
                    'label'       => 'Style Ten'
                ),

            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
     
        array(
            'id'          => 'ut_blog_hero_align',
            'label'       => 'Choose Hero Caption Alignment',
            'desc'        => 'Specifies the default alignment for the caption inside the hero.',
            'type'        => 'select',
            'std'         => 'center',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_caption_settings',
            'choices'     => array( 
                array(
                    'value'       => 'center',
                    'label'       => 'Center'
                ),
                array(
                    'value'       => 'left',
                    'label'       => 'Left'
                ),
                array(
                    'value'       => 'right',
                    'label'       => 'Right'
                )
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_overlay_settings_headline',
            'label'       => 'Hero Overlay Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
        ),
        
        array(
            'id'          => 'ut_blog_hero_overlay_settings_info',
            'label'       => 'Hero Caption Styling',
            'desc'        => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Blog</strong> > <strong>Hero Styling</strong>.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'required'    => array(
                'ut_blog_hero_global_styling'  => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay',
            'label'       => 'Activate Hero Overlay?',
            'desc'        => '<strong>(optional)</strong> A smooth overlay with optional design patterns.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                     'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay_color',
            'label'       => 'Overlay Color',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay'                   => 'on',
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay_color_opacity',
            'label'       => 'Color Opacity',
            'desc'        => 'Drag the handle to set the opacity.',
            'type'        => 'numeric-slider',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'min_max_step'=> '0,1,0.1',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay'                   => 'on',
            )
            
        ),
      
        array(
            'id'          => 'ut_blog_overlay_pattern',
            'label'       => 'Activate Overlay Pattern',
            'desc'        => '<strong>(optional)</strong>',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'On'
              ),
              array(
                'value'       => 'off',
                'label'       => 'Off'
              )
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay'                   => 'on',
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay_pattern_style',
            'label'       => 'Overlay Pattern Style',
            'desc'        => '<strong>(optional)</strong>',
            'std'         => 'style_one',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'style_one',
                    'label'       => 'Style One'
                ),
                array(
                    'value'       => 'style_two',
                    'label'       => 'Style Two'
                )
            ),
            'required'   => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay'                   => 'on',
            )
        ),
            
        array(
            'id'          => 'ut_blog_overlay_effect_settings_headline',
            'label'       => 'Hero Overlay Effect Settings',
            'desc'        => 'Hero Overlay Effect Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'required'    => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),      
      
        array(
            'id'          => 'ut_blog_overlay_effect',
            'label'       => 'Activate Overlay Animation Effect?',
            'desc'        => '<strong>(optional) Keep in mind, that this effect uses canvas objects for animation. Old Browsers do not support this feature!</strong>',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                 )
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay_effect_style',
            'label'       => 'Overlay Animation Effect',
            'desc'        => 'choose between 2 awesome animation effects!',
            'std'         => 'dots',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'choices'     => array( 
                array(
                    'value'       => 'dots',
                    'label'       => 'Connecting Dots'
                ),
                array(
                    'value'       => 'bubbles',
                    'label'       => 'Rising Bubbles'
                )
            ),
            'required'     => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay_effect'            => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_overlay_effect_color',
            'label'       => 'Overlay Effect Color',
            'desc'        => '<strong>(optional)</strong>. Leave this field empty if you like to keep the theme accentcolor as effect color.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_overlay_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_overlay_effect'            => 'on'
            )
        ),

        array(
            'id'          => 'ut_blog_border_setting_headline',
            'label'       => 'Hero Border Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
        ),
        
        array(
            'id'          => 'ut_blog_hero_border_settings_info',
            'label'       => 'Hero Caption Styling',
            'desc'        => 'You are using global hero styling settings. If you like to use individual styles for the front page hero caption please set <strong>Use Global Hero Styling Settings?</strong> to "no,thanks". You can find this option under <strong>Blog</strong> > <strong>Hero Styling</strong>.',
            'type'        => 'section_headline_info',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'required'    => array(
                'ut_blog_hero_global_styling'  => 'on'
            )
        ),
        
        array(
            'id'          => 'ut_blog_hero_border_bottom',
            'label'       => 'Activate Border?',
            'desc'        => 'A customized CSS border at the bottom of the hero area.',
            'std'         => 'off',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',                    
            'type'        => 'select',
            'choices'     => array(              
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
              ),
              array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
              ) 
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )

        ),
      
        array(
            'id'          => 'ut_blog_hero_border_bottom_color',
            'label'       => 'Border Bottom Color',
            'type'        => 'colorpicker',
            'desc'        => '<strong>(optional)</strong>',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_border_bottom'        => 'on'
            )
        ),
          
        array(
            'id'          => 'ut_blog_hero_border_bottom_width',
            'label'       => 'Border Bottom Width',
            'desc'        => 'Drag the handle to set the border width.',
            'type'        => 'numeric-slider',
            'min_max_step'=> '1,100',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_border_bottom'        => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_border_bottom_style',
            'label'       => 'Border Bottom Style',
            'type'        => 'select',
            'desc'        => 'Creates a border at the bottom of the hero.',
            'std'         => 'solid',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'choices'     => array(
              array(
                'label'     => 'dashed',
                'value'     => 'dashed'
              ),
              array(
                'label'     => 'dotted',
                'value'     => 'dotted'
              ),
              array(
                'label'     => 'solid',
                'value'     => 'solid'
              ),
              array(
                'label'     => 'double',
                'value'     => 'double'
              )
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_border_bottom'        => 'on'
            )
        ),
      
      
        array(
            'id'          => 'ut_blog_hero_fancy_border_setting_headline',
            'label'       => 'Fancy Border Settings',
            'desc'        => 'Hero Fancy Border',
            'type'        => 'section_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'required'    => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
                    
        array(
            'id'          => 'ut_blog_hero_fancy_border',
            'label'       => 'Activate Fancy Border?',
            'desc'        => 'Allows you to create a nice fancy border at the bottom of your hero area.',
            'type'        => 'select',
            'std'         => 'off',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_border_settings',
            'choices'     => array(              
              array(
                'label'       => 'yes, please!',
                'value'       => 'on'
              ),
              array(
                'label'       => 'no, thanks!',
                'value'       => 'off'
              )              
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),      
        
        array(
            'id'          	=> 'ut_blog_fancy_border_color',
            'label'       	=> 'Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_blog_settings',
            'subsection'    => 'ut_blog_border_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_fancy_border'         => 'on'
            )
        ),
              
        array(
            'id'          	=> 'ut_blog_fancy_border_background_color',
            'label'       	=> 'Background Color',
            'type'        	=> 'colorpicker',
            'desc'       	=> '<strong>(optional)</strong>',
            'section'       => 'ut_blog_settings',
            'subsection'    => 'ut_blog_border_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_fancy_border'         => 'on'
            )
        ),      
        
        array(
            'id'            => 'ut_blog_fancy_border_size',
            'label'         => 'Size',
            'desc'         	=> '<strong>(optional)</strong> -  include "px" in your string. e.g. 30px (default: 10px)',
            'type'          => 'text',
            'section'       => 'ut_blog_settings',
            'subsection'    => 'ut_blog_border_settings',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_hero_fancy_border'         => 'on'
            )
        ), 
      
        /*
        |--------------------------------------------------------------------------
        | Hero Blog Type
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_hero_background_headline',
            'label'       => 'Hero Type',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
        ),
      
        array(
            'id'          => 'ut_blog_header_type',
            'label'       => 'Select Hero Type',
            'desc'        => 'Choose between 8 individual hero types Brooklyn provides.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
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
        | Image Tab Slider
        */
      
        array(
            'id'          => 'ut_blog_tabs_headline',
            'label'       => 'Tablet Headline',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'tabs'
            )
        ),
      
        array(
            'id'          => 'ut_blog_tabs_headline_style',
            'label'       => 'Tablet Headline Font Style',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => 'global',
            'choices'     => array( 
                array(
                    'value'       => 'global',
                    'label'       => 'Default'
                ),
                array(
                    'value'       => 'extralight',
                    'label'       => 'Extra Light'
                ),
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'regular',
                    'label'       => 'Regular'
                ),
                array(
                    'value'       => 'medium',
                    'label'       => 'Medium'
                ),
                array(
                    'value'       => 'semibold',
                    'label'       => 'Semi Bold'
                ),
                array(
                    'value'       => 'bold',
                    'label'       => 'Bold'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'tabs'
            )
        ),      
      
        array(
            'id'          => 'ut_blog_tabs_tablet_color',
            'label'       => 'Tablet Color',
            'desc'        => 'Select your desired tablet color.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => 'black',
            'choices'     => array( 
                array(
                    'value'       => 'black',
                    'label'       => 'Black'
                ),
                array(
                    'value'       => 'white',
                    'label'       => 'White'
                ),
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'tabs'
            )
        ), 
      
        array(
            'id'          => 'ut_blog_tabs_tablet_shadow',
            'label'       => 'Tablet Shadow',
            'desc'        => 'Activate a decent shadow?',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                ),
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'tabs'
            )
        ),     
      
      
        array(
            'id'          => 'ut_blog_tabs',
            'label'       => 'Manage Tablet Images',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'settings'    => array( 
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'description',
                    'label'       => 'Image Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link_one_url',
                    'label'       => 'Left Button URL',
                    'type'        => 'text'
                ),
                array(
                    'id'          => 'link_one_text',
                    'label'       => 'Left Button Text',
                    'type'        => 'text'
                ),
                array(
                    'id'          => 'link_two_url',
                    'label'       => 'Right Button URL',
                    'type'        => 'text'
                ),
                array(
                    'id'          => 'link_two_text',
                    'label'       => 'Right Button Text',
                    'type'        => 'text'
                )
              
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'tabs'
            )
        ),
      
        /*
        | Image Type
        */
        
        array(
            'id' => 'blog_hero_height',
            'label' => 'Custom Hero Height',
            'desc' => 'Use the slider bar to set your desired height in %.',
            'section' => 'ut_blog_settings',
            'subsection' => 'ut_blog_hero_background_settings',
            'type' => 'numeric_slider',
            'std' => '100',
            'required' => array(
                'ut_blog_header_type' => 'image|video|animatedimage'
            ),
        ),
        
        array(
            'id' => 'ut_blog_hero_v_align',
            'label' => 'Choose Hero Caption Vertical Alignment',
            'desc' => 'Specifies the default vertical alignment for the caption inside the hero.',
            'section' => 'ut_blog_settings',
            'subsection' => 'ut_blog_hero_background_settings',
            'type' => 'select',
            'std' => 'middle',
            'choices' => array(
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
                'ut_blog_header_type' => 'image|video|animatedimage'
            ),
        ),

        array(
            'id' => 'ut_blog_hero_v_align_margin_bottom',
            'label' => 'Hero Content Margin Bottom',
            'desc' => 'Leave this field empty if you like to use the global value. Specifies the default bottom space for captions with vertical alignment bottom. Value in pixel e.g. 50px.',
            'section' => 'ut_blog_settings',
            'subsection'=> 'ut_blog_hero_background_settings',
            'type' => 'text',
            'required' => array(
                'ut_blog_header_type' => 'image|video|animatedimage',
                'ut_blog_hero_v_align' => 'bottom'
            ),
        ),
        
        
        
        array(
            'id'          => 'ut_blog_header_parallax',
            'label'       => 'Activate Parallax',
            'desc'       => 'Parallax involves the background moving at a slower rate to the foreground, creating a 3D effect as you scroll down the page.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'       => 'image|splithero|tabs|dynamic'
            )
        ),
      
        array(
            'id'          => 'ut_blog_header_rain',
            'label'       => 'Activate Rain Effect',
            'desc'        => 'Keep in mind, that activating this option can reduce your website performance.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'std'         => 'off',
            'subsection'  => 'ut_blog_hero_background_settings', 
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'       => 'image|splithero'
            )
        ),
      
        array(
            'id'          => 'ut_blog_header_rain_sound',
            'label'       => 'Activate Rain Sound',
            'desc'        => 'The sound of rain is one of the most relaxing sounds in existence and now avilable for your website.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'std'          => 'off',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'       => 'image|splithero',
                'ut_blog_header_rain'       => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_header_image',
            'label'       => 'Header Image',
            'desc'        => 'For best image results, we recommend to upload an image with minimum size of 1600x900 pixel or maximum size of 1920x1080(optimal) pixel. Also try to avoid uploading images with more than 200-300Kb size. Keep in mind, that you are not able to set a background position or attachment if the parallax option has been set to "on".',
            'type'        => 'background',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'image|splithero|tabs|dynamic'
            )
        ),
      
        array(
            'id'          => 'ut_blog_split_content_type',
            'label'       => 'Hero Split Content Type',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'image',
                    'label'       => 'Image'
                ),
                array(
                    'value'       => 'video',
                    'label'       => 'Video'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'splithero'
            )
        ),
      
        array(
            'id'          => 'ut_blog_split_video',
            'label'       => 'Hero Split Video',
            'desc'        => 'This video will display on the right side of the hero caption. It will not display on mobile devices! Please use the only embed codes from youtube or vimeo.',
            'type'        => 'textarea_simple',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'markup'      => '1_1',
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_blog_split_video_box',
            'label'       => 'Activate Hero Split Video Box',
            'desc'        => 'Display a shadowed box around the video.',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'type'        => 'select',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'video'
            )
                      
        ),
      
        array(
            'id'          => 'ut_blog_split_video_box_style',
            'label'       => 'Hero Split Video Box Style',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'light',
                    'label'       => 'Light'
                ),
                array(
                    'value'       => 'dark',
                    'label'       => 'Dark'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'video',
                'ut_blog_split_video_box'       => 'on'
            )
        ),       
      
        array(
            'id'          => 'ut_blog_split_video_box_padding',
            'label'       => 'Hero Split Video Box Padding',
            'desc'        => 'Set padding of the box in pixel e.g. 20px. default: 20px',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'video',
                'ut_blog_split_video_box'       => 'on'
            )
        ),
       
        array(
            'id'          => 'ut_blog_split_image',
            'label'       => 'Hero Split Image',
            'desc'        => 'This image will display on the right side of the hero caption. It will not display on mobile devices!',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'image'
            )
        ),
      
        array(
            'id'          => 'ut_blog_split_image_max_width',
            'label'       => 'Image Max Width',
            'desc'        => 'Adjust this value until the image fits inside the hero. Default "60".',
            'type'        => 'numeric-slider',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => '60',
            'min_max_step'=> '0,100,1',
            'required'    => array(
                'ut_blog_header_type'           => 'splithero',
                'ut_blog_split_content_type'    => 'image'
            )
        ),
      
        array(
            'id'          => 'ut_blog_split_image_effect',
            'label'       => 'Slide Effect',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => 'none',
            'choices'     => array( 
                array(
                    'value'       => 'none',
                    'label'       => 'No effect'
                ),
                array(
                    'value'       => 'fadeIn',
                    'label'       => 'Fade In'
                ),
                array(
                    'value'       => 'slideInRight',
                    'label'       => 'Slide in Right'
                ),
                array(
                    'value'       => 'slideInLeft',
                    'label'       => 'Slide in Left'
                ),
             
              
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'splithero',
                'ut_blog_split_content_type'    => 'image'
            )
        ),
      
      
        /*
        | Animated Image Type
        */
      
        array(
            'id'          => 'ut_blog_header_animatedimage',
            'label'       => 'Animated Image',
            'type'        => 'upload',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'markup'      => '1_1',
            'required'    => array(
                'ut_blog_header_type'       => 'animatedimage'
            )
        ),
      
        /*
        | Slider Type
        */
      
        /*array(
            'id'          => 'blog_animation',
            'label'       => 'Slide Effect',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
              array(
                'value'       => 'fade',
                'label'       => 'Fade'
              ),
              array(
                'value'       => 'slide',
                'label'       => 'Slide'
              )
            ),
        ),*/
      
        array(
            'id'          => 'blog_slideshow_speed',
            'label'       => 'Slideshow Speed',
            'desc'        => 'Set speed of the slideshow cycling, in milliseconds.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
      
        array(
            'id'          => 'blog_animation_speed',
            'label'       => 'Animation Speed',
            'desc'        => 'Set speed of animations, in milliseconds.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
      
        array(
            'id'          => 'ut_blog_slider',
            'label'       => 'Blog Slider',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'settings'    => array( 
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'style',
                    'label'       => 'Caption Style',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'ut-hero-style-1',
                            'label'       => 'Style One',
                        ),
                        array(
                            'value'       => 'ut-hero-style-2',
                            'label'       => 'Style Two'
                        ),
                        array(
                            'value'       => 'ut-hero-style-3',
                            'label'       => 'Style Three'
                        ),
                        array(
                            'value'       => 'ut-hero-style-4',
                            'label'       => 'Style Four'
                        ),
                        array(
                            'value'       => 'ut-hero-style-5',
                            'label'       => 'Style Five'
                        ),    
                        array(
                            'value'       => 'ut-hero-style-6',
                            'label'       => 'Style Six'
                        ),
                        array(
                            'value'       => 'ut-hero-style-7',
                            'label'       => 'Style Seven'
                        ),
                        array(
                            'value'       => 'ut-hero-style-8',
                            'label'       => 'Style Eight'
                        ),
                        array(
                            'value'       => 'ut-hero-style-9',
                            'label'       => 'Style Nine'
                        ),
                        array(
                            'value'       => 'ut-hero-style-10',
                            'label'       => 'Style Ten'
                        ),

                    ),
                ),
                array(
                    'id'          => 'font_style',
                    'label'       => 'Caption Font Style',
                    'desc'        => 'Setting this option to default will load the hero font style (which has been set under Blog Settings -> Hero Settings).',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'global',
                            'label'       => 'Default'
                        ),
                        array(
                            'value'       => 'extralight',
                            'label'       => 'Extra Light'
                        ),
                         array(
                            'value'       => 'light',
                            'label'       => 'Light'
                         ),
                         array(
                            'value'       => 'regular',
                            'label'       => 'Regular'
                         ),
                        array(
                            'value'       => 'medium',
                            'label'       => 'Medium'
                        ),
                        array(
                            'value'       => 'semibold',
                            'label'       => 'Semi Bold'
                        ),
                        array(
                            'value'       => 'bold',
                            'label'       => 'Bold'
                        )
                    ),
                ),
                array(
                    'id'          => 'align',
                    'label'       => 'Caption Alignment',
                    'type'        => 'select',
                    'std'         => 'center',
                    'choices'     => array(     
                        array(
                            'value'       => 'center',
                            'label'       => 'Center'
                        ),
                        array(
                            'value'       => 'left',
                            'label'       => 'Left'
                        ),
                        array(
                            'value'       => 'right',
                            'label'       => 'Right'
                        )
                    ),
                ),
                array(
                    'id'          => 'direction',
                    'label'       => 'Caption Animation Direction',
                    'std'          => 'top',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'top',
                            'label'       => 'Top'
                        ),
                        array(
                            'value'       => 'left',
                            'label'       => 'Left'
                        ),
                        array(
                            'value'       => 'right',
                            'label'       => 'Right'
                        ),
                        array(
                            'value'       => 'bottom',
                            'label'       => 'Bottom'
                        )                         
                    ),
                ),
                array(
                    'id'          => 'expertise',
                    'label'       => 'Caption Slogan',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'description',
                    'label'       => 'Caption',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'catchphrase',
                    'label'       => 'Caption Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link',
                    'label'       => 'Link',
                    'type'        => 'text'
                ),
                array(
                    'id'          => 'link_description',
                    'label'       => 'Link Button Text',
                    'type'        => 'text'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),    
      
      
        array(
            'id'          => 'ut_blog_slider_color_settings_headline',
            'label'       => 'Slider Navigation Color Settings',
            'desc'        => 'Slider Navigation Color Settings',
            'type'        => 'section_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
        
        array(
            'id'          => 'ut_blog_slider_arrow_background_color',
            'label'       => 'Arrow Background Color',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
        array(
            'id'          => 'ut_blog_slider_arrow_background_color_hover',
            'label'       => 'Arrow Background Color Hover',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
        
        array(
            'id'          => 'ut_blog_slider_arrow_color',
            'label'       => 'Arrow Color',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
        
        array(
            'id'          => 'ut_blog_slider_arrow_color_hover',
            'label'       => 'Arrow Color Hover',
            'type'        => 'colorpicker',
            'mode'        => 'rgb',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'slider'
            )
        ),
      
        /*
        | Fancy Slider
        */
      
        array(
            'id'          => 'ut_blog_fancy_slider',
            'label'       => 'Fancy Slider',
            'type'        => 'list-item',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'settings'    => array( 
                array(
                    'id'          => 'image',
                    'label'       => 'Image',
                    'type'        => 'upload',
                ),
                array(
                    'id'          => 'style',
                    'label'       => 'Caption / Hero Style',
                    'type'        => 'select',
                    'choices'     => array( 
                        array(
                            'value'       => 'ut-hero-style-1',
                            'label'       => 'Style One'
                        ),
                         array(
                            'value'       => 'ut-hero-style-2',
                            'label'       => 'Style Two'
                         ),
                        array(
                            'value'       => 'ut-hero-style-3',
                            'label'       => 'Style Three'
                        ),
                        array(
                            'value'       => 'ut-hero-style-4',
                            'label'       => 'Style Four'
                        ),
                        array(
                            'value'       => 'ut-hero-style-5',
                            'label'       => 'Style Five'
                        ),
                         array(
                            'value'       => 'ut-hero-style-6',
                            'label'       => 'Style Six'
                         ),
                         array(
                            'value'       => 'ut-hero-style-7',
                            'label'       => 'Style Seven'
                         ),
                        array(
                            'value'       => 'ut-hero-style-8',
                            'label'       => 'Style Eight'
                        ),
                        array(
                            'value'       => 'ut-hero-style-9',
                            'label'       => 'Style Nine'
                        ),
                        array(
                            'value'       => 'ut-hero-style-10',
                            'label'       => 'Style Ten'
                        ),

                    ),
                ),
                array(
                    'id'          => 'font_style',
                    'label'       => 'Caption / Hero Font Style',
                    'desc'        => 'Setting this option to default will load the hero font style (which has been set under Front Page Settings -> Hero Settings ).',
                    'type'        => 'select',
                    'std'         => 'global',
                    'choices'     => array( 
                         array(
                            'value'       => 'global',
                            'label'       => 'Default'
                        ),
                        array(
                            'value'       => 'extralight',
                            'label'       => 'Extra Light'
                        ),
                        array(
                            'value'       => 'light',
                            'label'       => 'Light'
                        ),
                        array(
                            'value'       => 'regular',
                            'label'       => 'Regular'
                         ),
                        array(
                            'value'       => 'medium',
                            'label'       => 'Medium'
                        ),
                        array(
                            'value'       => 'semibold',
                            'label'       => 'Semi Bold'
                        ),
                        array(
                            'value'       => 'bold',
                            'label'       => 'Bold'
                        )
                    ),
                ),
                array(
                    'id'          => 'expertise',
                    'label'       => 'Caption Slogan',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'description',
                    'label'       => 'Caption',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'catchphrase',
                    'label'       => 'Caption Description',
                    'type'        => 'textarea-simple',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link',
                    'label'       => 'Link',
                    'type'        => 'text',
                    'rows'        => '3'
                ),
                array(
                    'id'          => 'link_description',
                    'label'       => 'Link Button Text',
                    'type'        => 'text'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'transition'
            )
        ),
      
        array(
            'id'          => 'blog_fancy_slider_effect',
            'label'       => 'Slide Effect',
            'desc'        => 'Choose an effect for your slider, this effect will affect all slides.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'          => 'fxSoftScale',
            'choices'     => array( 
                array(
                    'value'       => 'fxSoftScale',
                    'label'       => 'Soft scale'
                ),
                array(
                    'value'       => 'fxPressAway',
                    'label'       => 'Press away'
                ),
                array(
                    'value'       => 'fxSideSwing',
                    'label'       => 'Side Swing'
                ),
                array(
                    'value'       => 'fxFortuneWheel',
                    'label'       => 'Fortune wheel'
                ),
                array(
                    'value'       => 'fxSwipe',
                    'label'       => 'Swipe'
                ),
                array(
                    'value'       => 'fxPushReveal',
                    'label'       => 'Push reveal'
                ),
                array(
                    'value'       => 'fxSnapIn',
                    'label'       => 'Snap in'
                ),
                array(
                    'value'       => 'fxLetMeIn',
                    'label'       => 'Let me in'
                ),
                array(
                    'value'       => 'fxStickIt',
                    'label'       => 'Stick it'
                ),
                array(
                    'value'       => 'fxArchiveMe',
                    'label'       => 'Archive me'
                ),
                array(
                    'value'       => 'fxVGrowth',
                    'label'       => 'Vertical growth'
                ),
                array(
                    'value'       => 'fxSlideBehind',
                    'label'       => 'Slide Behind'
                ),
                array(
                    'value'       => 'fxSoftPulse',
                    'label'       => 'Soft Pulse'
                ),
                array(
                    'value'       => 'fxEarthquake',
                    'label'       => 'Earthquake'
                ),
                array(
                    'value'       => 'fxCliffDiving',
                    'label'       => 'Cliff diving'
                )
              
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'transition'
            )
        ),    
      
        array(
            'id'          => 'blog_fancy_slider_height',
            'label'       => 'Slider Height',
            'desc'        => 'Set height of the slideshow in pixel e.g. 600px.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'transition'
            )
        ),
      
        /*
        | Custom Shortcode
        */
      
        array(
            'id'          => 'blog_hero_custom_shortcode',
            'label'       => 'Custom Shortcode',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'custom'
            )
        ),
           
        /*
        | Video
        */
            
        array(
            'id'          => 'ut_blog_video_setting_description',
            'label'       => 'Video',
            'desc'        => 'At the current stage the theme only supports youtube videos as well as selfhosted videos. Custom Player are possible, but using them will cause many hero options not taking effect. If a mobile or tablet device is visiting the site, the video hero support will be dropped and the theme will display a poster image instead. The main reason for this behavior is, that most mobile and tablet devices do not support the video backgrounds.',
            'type'        => 'textblock',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_source',
            'label'       => 'Video Source',
            'desc'        => 'Select your desired source for videos.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'std'         => 'youtube',
            'choices'     => array( 
                array(
                'value'       => 'youtube',
                'label'       => 'Youtube'
                ),
                array(
                'value'       => 'selfhosted',
                'label'       => 'Selfthosted'
                ),
                array(
                'value'       => 'custom',
                'label'       => 'Custom Embedded Code'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_containment',
            'label'       => 'Set this Video as background too?',
            'desc'        => 'This option here places the video "behind" the blog page instead of only inside the hero. As a result, transparent contact section will also contain this video. This option does only effect on youtube and selfhosted videos. Custom Embedded Videos are not supported.',
            'std'         => 'hero',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'value'       => 'body',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'hero',
                    'label'       => 'no, thanks!'
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'video'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video',
            'label'       => 'Video URL for blog.',
            'desc'        => 'Please insert the url only e.g. http://youtu.be/gvt_YFuZ8LA . Please do not insert the complete embedded code! This video will be displayed on the main blog page.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_custom',
            'label'       => 'Video embedded Code.',
            'desc'        => 'Please insert the complete embedded code of your favorite video hoster! This video will be displayed on the main blog page. Keep in mind, that hero settings like "Hero Caption" do not display if this type of video source is active.',
            'type'        => 'textarea-simple',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'markup'      => '1_1',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'custom'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_mp4',
            'label'       => 'MP4',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_ogg',
            'label'       => 'OGG',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_webm',
            'label'       => 'WEBM',
            'desc'        => 'In HTML5, there are 3 supported video formats: MP4, WebM, and Ogg. Please make sure you provide all 3 file types to grant best browser support.',
            'type'        => 'upload',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_sound',
            'label'       => 'Activate video sound after page is loaded?',
            'desc'        => '<strong>(optional)</strong>. Play sound directly when page is loaded.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'     => array( 
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'            
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off',
                )
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'              => 'ut_blog_video_loop',
            'label'           => 'Loop Video?',
            'desc'            => 'Whether the video should start over again when finished.',
            'type'            => 'select',
            'section'         => 'ut_blog_settings',
            'subsection'      => 'ut_blog_hero_background_settings',
            'choices'         => array(
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )              
            ),
            'std'             => 'on',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'            => 'ut_blog_video_preload',
            'label'         => 'Preload Video?',
            'desc'          => 'Whether the video should be loaded when the page loads.',
            'type'          => 'select',
            'section'       => 'ut_blog_settings',
            'subsection'    => 'ut_blog_hero_background_settings',
            'choices'       => array(
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'off'
                )
            ),
            'std'             => 'on',
            'required'    => array(
                'ut_blog_header_type'   => 'video|selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_video_mute_button_blog',
            'label'       => 'Show Mute Button?',
            'desc'        => 'Whether the video mute button is displayed or not.',
            'type'        => 'select',
            'std'         => 'hide',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'choices'         => array(          
                array(
                    'label'       => 'yes, please!',
                    'value'       => 'show'            
                ),
                array(
                    'label'       => 'no, thanks!',
                    'value'       => 'hide'            
                )          
            ),
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_volume',
            'label'       => 'Video Volume',
            'desc'        => 'Drag the handle to set the video volume.',
            'std'         => '5',
            'type'        => 'numeric-slider',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'min_max_step'=> '0,100,1',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube|selfhosted'
            )
        ),
      
        array(
            'id'          => 'ut_blog_video_poster',
            'label'       => 'Poster Image',
            'desc'        => 'This image will be displayed instead of the video on mobile devices.',
            'type'        => 'upload',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_background_settings',
            'required'    => array(
                'ut_blog_header_type'   => 'video',
                'ut_blog_video_source'  => 'youtube|selfhosted'
            )
        ),
      
        /*
        |--------------------------------------------------------------------------
        | Hero Blog Setting
        |--------------------------------------------------------------------------
        */ 
      
        array(
            'id'          => 'ut_blog_hero_settings_headline',
            'label'       => 'Hero Content',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_settings',
        ),
      
        array(
            'id'          => 'ut_blog_hero_global_content_styling',
            'label'       => 'Use Global Hero Content Color Settings?',
            'desc'        => '<strong>(optional)</strong>. Once you selected "no, thanks" additional colorpicker fields are becoming available inside the different option sections.',
            'std'         => 'off',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_settings',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes, please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no, thanks!'
                )
                
            ) /* end choices */
        ),
        
        array(
            'id'          => 'ut_blog_custom_html_settings_headline',
            'label'       => 'Hero Custom HTML',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_html',
        ),
      
        array(
            'id'          => 'ut_blog_custom_slogan',
            'label'       => 'Custom Hero HTML',
            'desc'        => 'This field appears above the Hero Caption Slogan.',
            'type'        => 'textarea',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_html',
            'rows'        => '10',
            'markup'      => '1_1'
        ),
      
        array(
            'id'          => 'ut_blog_expertise_slogan_settings_headline',
            'label'       => 'Hero Caption',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_slogan',
        ),
      
        array(
            'id'          => 'ut_blog_expertise_slogan',
            'label'       => 'Hero Caption Slogan',
            'desc'        => 'This element appears above the Hero Caption.',
            'type'        => 'textarea-simple',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_slogan',
            'rows'        => '5',
            'markup'      => '1_1'
        ),
            
        array(
            'id'          => 'ut_blog_expertise_slogan_color',
            'label'       => 'Hero Caption Slogan Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate color for <strong>Hero Caption Slogan</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_slogan',
            'required'    => array(
                'ut_blog_hero_global_content_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_expertise_slogan_background_color',
            'label'       => 'Hero Caption Slogan Background Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate background color for <strong>Hero Caption Slogan</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_slogan',
            'required'    => array(
                'ut_blog_hero_global_content_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_expertise_margin',
            'label'       => 'Spacing',
            'desc'        => 'Increase the space between Hero Caption Slogan and Hero Caption. (optional) - default 0px',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_slogan',
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan_settings_headline',
            'label'       => 'Hero Caption Title Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan',
            'label'       => 'Hero Caption Title',
            'desc'        => 'This field also accepts HTML tags and shortcodes such as word rotator for example.',
            'htmldesc'    => '&lt;span&gt; word &lt;/span&gt; = highlight word in themecolor',
            'type'        => 'textarea-simple',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
            'rows'        => '5',
            'markup'      => '1_1'
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan_color',
            'label'       => 'Hero Caption Title Color',
            'desc'        => '<strong>(optional)</strong> - set an alternative for Hero Caption Title.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
            'required'    => array(
                'ut_blog_hero_global_content_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan_letterspacing',
            'label'       => 'Hero Caption Title Letterspacing',
            'desc'        => '<strong>(optional)</strong> - include "px" in your string. e.g. 2px',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan_uppercase',
            'label'       => 'Hero Caption Title Text Transform',
            'desc'        => 'Display the Hero Caption Title in uppercase letters?',
            'type'        => 'radio',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
            'std'         => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
            )
        ),
      
        array(
            'id'          => 'ut_blog_company_slogan_glow',
            'label'       => 'Hero Caption Title Gloweffect',
            'desc'        => 'Activate Glow Effect for Hero Caption Title?',
            'type'        => 'radio',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_title',
            'std'         => 'off',
            'choices'     => array( 
              array(
                'value'       => 'on',
                'label'       => 'yes please!'
              ),
              array(
                'value'       => 'off',
                'label'       => 'no thanks!'
              ),
            )
        ),
      
        array(
            'id'          => 'ut_blog_catchphrase_settings_headline',
            'label'       => 'Hero Caption Description Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_description',
        ),
      
        array(
            'id'          => 'ut_blog_catchphrase',
            'label'       => 'Hero Caption Description',
            'desc'        => 'This field appears beneath the Hero Caption.',
            'type'        => 'textarea-simple',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_description',
            'rows'        => '5',
            'markup'      => '1_1'
        ),
      
        array(
            'id'          => 'ut_blog_catchphrase_color',
            'label'       => 'Hero Caption Description Color',
            'desc'        => '<strong>(optional)</strong> - set an alternate color for Hero Caption Description.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_caption_description',
            'required'    => array(
                'ut_blog_hero_global_content_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_button_settings_headline',
            'label'       => 'Hero Button Settings',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
        ),
      
        array(
            'id'          => 'ut_blog_scroll_to_main',
            'label'       => 'Scroll to Blog Text',
            'desc'        => 'Enter your desired text or leave this field empty to hide the button.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
        ),
      
        array(
            'id'          => 'ut_blog_scroll_to_main_style',
            'label'       => 'Choose Main Hero Button Style',
            'desc'        => 'Use our theme default button or design your own one.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'std'         => 'default',
            'choices'     => array( 
              array(
                'value'       => 'default',
                'label'       => 'default'
              ),
              array(
                'value'       => 'custom',
                'label'       => 'custom'
              ),      
            ),
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hrbtn',
            'label'       => 'Custom Button Styling',
            'type'        => 'button_builder',
            'desc'        => 'Makes it easy to style buttons.',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_scroll_to_main_style'      => 'custom'
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_button',
            'label'       => 'Need a second button inside the page hero?',
            'desc'        => 'A clickable button to link to a desired target such as a page or section.',
            'type'        => 'radio',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),          
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_button_text',
            'label'       => 'Second Button Text',
            'desc'        => 'Enter your desired button text',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'    => array(
                'ut_blog_second_button'     => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_button_url',
            'label'       => 'Second Button URL',
            'desc'        => 'Enter your desired URL. Do not forget to place "http://" in front of your link.',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'    => array(
                'ut_blog_second_button'     => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_button_target',
            'label'       => 'Second Button Target',
            'desc'        => 'Specifies where to open the linked document. <strong>_blank</strong> opens the linked document in a new window or tab. <strong>_self</strong> opens the linked document in the same frame as it was clicked.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'std'         => '_blank',
            'choices'     => array( 
              array(
                'value'       => '_blank',
                'label'       => 'blank'
              ),
              array(
                'value'       => '_self',
                'label'       => 'self'
              ),          
            ),
            'required'    => array(
                'ut_blog_second_button'     => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_button_style',
            'label'       => 'Second Button Style',
            'desc'        => 'Use our theme default button or design your own one.',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'std'         => 'default',
            'choices'     => array( 
                array(
                    'value'       => 'default',
                    'label'       => 'default'
                 ),
                array(
                    'value'       => 'custom',
                    'label'       => 'custom'
                ),      
            ),
            'required'      => array(
                    'ut_blog_hero_global_styling'       => 'off',
                    'ut_blog_second_button'             => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_second_hrbtn',
            'label'       => 'Custom Button Styling',
            'type'        => 'button_builder',
            'desc'        => 'Makes it easy to style buttons.',
            'markup'      => '1_1',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off',
                'ut_blog_second_button_style'       => 'custom'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_buttons_margin',
            'label'       => 'Buttons Margin Top',
            'desc'        => 'Increase the space between Hero Caption Title and Hero Buttons. (optional) - default 0px',
            'type'        => 'text',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'      => array(
                'ut_blog_hero_global_styling'       => 'off'
            )
        ),  
      
        array(
            'id'          => 'ut_blog_hero_down_arrow',
            'label'       => 'Activate Scroll Down Arrow?',
            'desc'        => 'A large double lined down arrow. Clicking the arrow automatically scrolls to the main content.',
            'type'        => 'radio',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'std'          => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'off',
                    'label'       => 'no thanks!'
                ),
                array(
                    'value'       => 'on',
                    'label'       => 'yes please!'
                ),          
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_down_arrow_scroll_position',
            'label'       => 'Scroll Down Arrow Horizontal Position',
            'desc'        => 'Drag the handle to set your desired horizontal position.',
            'type'        => 'numeric_slider',
            'std'         => '50',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'    => array(
                'ut_blog_hero_down_arrow'       => 'on'
            )
        ),
      
        array(
            'id'          => 'ut_blog_hero_down_arrow_scroll_position_vertical',
            'label'       => 'Scroll Down Arrow Vertical Position',
            'desc'        => 'Drag the handle to set your desired vertical position.',
            'type'        => 'numeric_slider',
            'std'         => '80',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'    => array(
                'ut_blog_hero_down_arrow'       => 'on'
            )
        ),      
      
        array(
            'id'          => 'ut_blog_hero_down_arrow_color',
            'label'       => 'Scroll Down Arrow Color',
            'desc'        => '<strong>(optional)</strong> - choose an alternative for <strong>Scroll Down Arrow</strong>.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_hero_content_buttons',
            'required'    => array(
                'ut_blog_hero_down_arrow'       => 'on'
            )
        ), 
      
        /*
        |--------------------------------------------------------------------------
        | Blog Header Configuration
        |--------------------------------------------------------------------------
        */
      
        array(
            'id'          => 'ut_blog_navigation_setting_headline',
            'label'       => 'Header and Navigation',
            'type'        => 'panel_headline',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
        ),

        array(
            'id'         	=> 'ut_blog_navigation_config',
            'section'       => 'ut_blog_settings',
            'subsection'    => 'ut_blog_navigation_settings',
            'label'       	=> 'Use Global Navigation Settings?',
            'type'        	=> 'select',
            'choices'     	=> array(          
                array(
                    'label'       => 'yes',
                    'value'       => 'on'
                ),
                array(
                    'label'       => 'no',
                    'value'       => 'off'
                )	  
            ),
            'std'         	=> 'on'
        ),
             
        array(
            'id'          => 'ut_blog_navigation_skin',
            'label'       => 'Header and Navigation Color Skin',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'std'         => 'ut-header-light',
            'choices'     => array( 
                array(
                    'value'       => 'ut-header-dark',
                    'label'       => 'Dark'
                ),
                array(
                    'value'       => 'ut-header-light',
                    'label'       => 'Light'
                )
            ),
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_navigation_shadow',
            'label'       => 'Header and Navigation Shadow',
            'desc'        => 'Activate Navigation / Header Shadow?',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'std'         => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
       
        array(
            'id'          => 'ut_blog_navigation_width',
            'label'       => 'Header and Navigation Width',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'std'         => 'centered',
            'choices'     => array( 
                array(
                    'value'       => 'centered',
                    'label'       => 'Centered'
                ),
                array(
                    'value'       => 'fullwidth',
                    'label'       => 'Fullwidth'
                )
            ),
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_navigation_state',
            'label'       => 'Always show Header and Navigation?',
            'desc'        => 'This option makes the navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On (with chosen skin)'
                ),
                array(
                    'value'       => 'on_transparent',
                    'label'       => 'On (transparent)'
                 ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_navigation_transparent_border',
            'label'       => 'Activate Navigation Border Bottom?',
            'type'        => 'select',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'std'         => 'off',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
            
        array(
            'id'          => 'ut_blog_navigation_level_one_color',
            'label'       => 'Header and Navigation First Level Color',
            'desc'        => 'Change the font color of the first navigation level.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
      
        array(
            'id'          => 'ut_blog_navigation_level_one_icon_color',
            'label'       => 'Header and Navigation First Level Dot Color',
            'desc'        => 'Change the dot color of the first navigation level.',
            'type'        => 'colorpicker',
            'section'     => 'ut_blog_settings',
            'subsection'  => 'ut_blog_navigation_settings',
            'required'      => array(
                'ut_blog_navigation_config'     => 'off'
            )
        ),
        
        
        /* Section Animation */
        array(
            'id'          => 'ut_animate_sections',
            'label'       => 'Animate Sections',
            'desc'        => 'This option will activate / deactivate the section fade animation.',
            'type'        => 'select',
            'section'     => 'ut_advanced_settings',
            'subsection'  => 'ut_sanimation_settings',
            'std'          => 'on',
            'choices'     => array( 
                array(
                    'value'       => 'on',
                    'label'       => 'On'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'Off'
                )
            ),
        ),
      
        array(
            'id'          => 'ut_animate_sections_timer',
            'label'       => 'Section Animation Timer',
            'desc'        => '<strong>(optional)</strong> - value in ms , default: 1600',
            'type'        => 'text',
            'section'     => 'ut_advanced_settings',
            'subsection'  => 'ut_sanimation_settings',
        ),
        
        
        
    ) );
        
    return $base_settings;
  
}

add_filter( 'ut_theme_option_settings', '_ut_theme_options_onepage' );