<?php 

if( !function_exists('ut_metabox_navigation_settings') ) :
    
    add_action( 'admin_init', 'ut_metabox_navigation_settings' );
    
    function ut_metabox_navigation_settings() {

        $ut_metabox_navigation_settings = array(
            
            'id'          => 'ut_metabox_navigation_settings',
            'title'       => 'United Themes - Navigation Settings',
            'pages'       => array( 'page', 'portfolio', 'product' ),
            'context'     => 'normal',
            'priority'    => 'low',
            'fields'      => array()
        
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'          	=> 'ut_navigation_settings',
            'metapanel'     => 'ut-navigation-section',
            'label'       	=> 'Navigation Settings',
            'type'        	=> 'panel_headline'
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'         	=> 'ut_navigation_config',
            'metapanel'     => 'ut-navigation-section',
            'label'       	=> 'Use Global Navigation Settings from Theme Options?',
            'type'        	=> 'select',
            'desc'        	=> '',
            'choices'     	=> array(          
                array(
                    'label'     => 'yes',
                    'value'     => 'on'
                ),
                array(
                    'label'     => 'no',
                    'value'     => 'off'
                )	  
            ),
            'std'         	=> 'yes'
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'            => 'ut_navigation_scroll_position',
            'label'         => 'Header Scroll Behaviour',
            'desc'          => 'Choose between a header always displaying fixed at top of your website or a header which is floating while scrolling. ',
            'type'          => 'select',
            'metapanel'     => 'ut-navigation-section',
            'std'           => 'floating',
            'choices'       => array( 
                array(
                    'value' => 'fixed',
                    'label' => 'Header Fixed'
                ),
                array(
                    'value' => 'floating',
                    'label' => 'Header Floating'
                )
            ),
            'required'  => array(
                'ut_navigation_config'  => 'off'
            ),
        );        
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'            => 'ut_navigation_width',
            'label'         => 'Header Width',
            'desc'          => 'It handles centering the content within the header. Centered content has a max width of 1200px and fullwidth content 100%.',
            'type'          => 'select',
            'metapanel'     => 'ut-navigation-section',
            'std'           => 'centered',
            'choices'       => array( 
                array(
                    'value'     => 'centered',
                    'label'     => 'Centered'
                ),
                array(
                    'value'     => 'fullwidth',
                    'label'     => 'Fullwidth'
                )
            ),
            'required'  => array(
                'ut_navigation_config'  => 'off'
            ),
        );
        
        /* only show option if site border is active */
        if( ot_get_option( 'ut_site_border', 'hide' ) == 'show' ) {
        
            $ut_metabox_navigation_settings['fields'][] = array(
                'id'          => 'ut_site_navigation_flush',
                'label'       => 'Activate Navigation Flush?',
                'desc'        => 'Only applies of Site Border is active and Header Width has been set to fullwidth.',
                'type'        => 'select',
                'metapanel'   => 'ut-navigation-section',
                'std'         => 'no',
                'choices'     => array( 
                    array(
                        'value'     => 'yes',
                        'label'     => 'Yes'
                    ),
                    array(
                        'value'     => 'no',
                        'label'     => 'No'
                    )
                ),
                'required'  => array(
                    'ut_navigation_config'  => 'off',
                    'ut_navigation_width'   => 'fullwidth'
                ),
            );
        
        }
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'            => 'ut_navigation_skin',
            'label'         => 'Header Color Skin',
            'type'          => 'select',
            'metapanel'     => 'ut-navigation-section',
            'std'           => 'ut-header-light',
            'choices'       => array( 
                array(
                    'value'     => 'ut-header-dark',
                    'label'     => 'Dark'
                ),
                array(
                    'value'     => 'ut-header-light',
                    'label'     => 'Light'
                ),
                array(
                    'value'     => 'ut-header-custom',
                    'label'       => 'Custom Skin'
                )
            ),
            'required'  => array(
                'ut_navigation_config'  => 'off',
            ),            
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_darkskin_settings_headline',
            'label'     => 'Dark Skin Settings',
            'desc'      => 'Dark Skin Settings',
            'type'      => 'section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-dark'
            ),
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_lightskin_settings_headline',
            'label'     => 'Light Skin Settings',
            'desc'      => 'Light Skin Settings',
            'type'      => 'section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-light'
            ),            
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'         => 'ut_navigation_state',
            'label'      => 'Always show Header and Navigation?',
            'desc'       => 'This option makes header and navigation visible all the time. If you choose "On (transparent)". The navigation will turn into the chosen skin when reaching the main content."',
            'type'       => 'select',
            'metapanel'  => 'ut-navigation-section',
            'std'        => 'off',
            'choices'    => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On (with chosen skin)'
                ),
                array(
                    'value'     => 'on_transparent',
                    'label'     => 'On (transparent)'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-dark|ut-header-light',
            ),
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_shadow',
            'label'     => 'Header Shadow',
            'desc'      => 'Activate Header Shadow?',
            'type'      => 'select',
            'metapanel' => 'ut-navigation-section',
            'std'       => 'on',
            'choices'   => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-dark|ut-header-light',
                'ut_navigation_state'  => 'on|off'
            ),
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_transparent_border',
            'label'     => 'Activate Navigation Border Bottom?',
            'type'      => 'select',
            'metapanel' => 'ut-navigation-section',
            'std'       => 'off',
            'choices'   => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'On'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'Off'
                )
            ),
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_state'  => 'on_transparent',
                'ut_navigation_skin'   => 'ut-header-dark|ut-header-light',
            )
            
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_customskin_settings_headline',
            'label'     => 'Custom Skin Settings',
            'desc'      => 'Custom Skin Settings',
            'type'      => 'section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-custom',
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_customskin_state',
            'label'     => 'Always show Header and Navigation?',
            'desc'      => 'This option makes header and navigation visible all the time. If you choose "Yes, but switch to secondary skin on scroll!". The navigation will turn into the secondary skin when reaching the main content. There secondary skin settings will appear once you select this option."',
            'type'      => 'select',
            'metapanel' => 'ut-navigation-section',
            'std'       => 'on',
            'choices'   => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'Yes, with primary skin!'
                ),
                array(
                    'value'     => 'on_switch',
                    'label'     => 'Yes, but switch to secondary skin on scroll or hover!'
                ),
                array(
                    'value'     => 'off',
                    'label'     => 'No, but switch to primary skin on scroll!'
                )
            ),
            'required'  => array(
                'ut_navigation_config' => 'off',
                'ut_navigation_skin'   => 'ut-header-custom',
            )            
        );
        
        /* Primary Skin */
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_customskin_primary_settings_headline',
            'label'     => 'Primary Skin Settings',
            'desc'      => 'Primary Skin Settings',
            'type'      => 'section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_text_logo_color',
            'label'     => 'Text Logo Color',
            'desc'      => 'Only applies if no Main Logo has been set. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_text_logo_color_hover',
            'label'     => 'Text Logo Color Hover',
            'desc'      => 'Only applies if no Main Logo has been set. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ps_header_colors',
            'label'     => 'Header Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_background_color',
            'label'     => 'Header Background Color',
            'desc'      => 'RGBA Background Color for Header. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_shadow_color',
            'label'     => 'Header Shadow Color',
            'desc'      => 'You can turn off the shadow by settings its opacity to 0. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_border_color',
            'label'     => 'Header Border Bottom Color',
            'desc'      => 'RGBA Border Bottom Color for Header. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ps_fl_colors',
            'label'     => 'Navigation First Level Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_fl_color',
            'label'     => 'Navigation First Level Link Color',
            'desc'      => 'RGBA Link Color for all links inside the first level of theme main navigation. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_fl_color_hover',
            'label'     => 'Navigation First Level Link Hover Color',
            'desc'      => 'RGBA Link Color on hover for all links inside the first level of theme main navigation. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_fl_dot_color',
            'label'     => 'Navigation First Level Dot Color',
            'desc'      => 'RGBA Color for all dot seperators inside the first level of theme main navigation. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_fl_active_color',
            'label'     => 'Navigation First Level Active Link Color',
            'desc'      => 'RGBA Color for active links inside the first level of theme main navigation. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ps_sl_colors',
            'label'     => 'Navigation Sub Menu Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_sl_background_color',
            'label'     => 'Navigation Sub Menu Background Color',
            'desc'      => 'RGBA Background Color for Navigation Sub Menu. <br /><strong>You can also insert HEX Colors, it will be converterted it into a valid RGBA Color automatically.</strong>',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_sl_color',
            'label'     => 'Navigation Sub Menu Link Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_sl_color_hover',
            'label'     => 'Navigation Sub Menu Link Hover Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_sl_shadow_color',
            'label'     => 'Navigation Sub Menu Shadow Color',
            'desc'      => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_sl_border_color',
            'label'     => 'Navigation Sub Menu Border Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on|on_switch|off'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ps_hover_colors',
            'label'     => 'Hover State Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_hover_state',
            'label'     => 'Add Hover State?',
            'type'      => 'select',
            'metapanel' => 'ut-navigation-section',
            'std'       => 'off',
            'choices'   => array( 
                array(
                    'value'     => 'on',
                    'label'     => 'Yes'
                ),
                array(
                    'value'       => 'off',
                    'label'       => 'No'
                )
            ),
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_background_color_hover',
            'label'     => 'Header Background Color on Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_border_color_hover',
            'label'     => 'Header Border Color on Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ps_shadow_color_hover',
            'label'     => 'Header Shadow Color on Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_hover_fl_color',
            'label'     => 'Navigation First Level Link Color on Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ps_hover_fl_dot_color',
            'label'     => 'Navigation First Level Dot Color on Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch',
                'ut_navigation_ps_hover_state'   => 'on'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_customskin_secondary_settings_headline',
            'label'     => 'Secondary Skin Settings',
            'desc'      => 'Secondary Skin Settings',
            'type'      => 'section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )            
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ss_text_logo_color',
            'label'     => 'Text Logo Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ss_text_logo_color_hover',
            'label'     => 'Text Logo Color Hover',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ss_header_colors',
            'label'     => 'Header Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ss_background_color',
            'label'     => 'Header Background Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ss_shadow_color',
            'label'     => 'Header Shadow Color',
            'desc'      => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_header_ss_border_color',
            'label'     => 'Header Border Bottom Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ss_fl_colors',
            'label'     => 'Navigation First Level Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_fl_color',
            'label'     => 'Navigation First Level Link Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_fl_color_hover',
            'label'     => 'Navigation First Level Link Hover Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_fl_dot_color',
            'label'     => 'Navigation First Level Dot Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_fl_active_color',
            'label'     => 'Navigation First Level Active Link Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_subheadline_ss_sl_colors',
            'label'     => 'Navigation Sub Menu Colors',
            'type'      => 'sub_section_headline',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_sl_background_color',
            'label'     => 'Navigation Sub Menu Background Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_sl_color',
            'label'     => 'Navigation Sub Menu Link Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_sl_color_hover',
            'label'     => 'Navigation Sub Menu Link Hover Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_sl_shadow_color',
            'label'     => 'Navigation Sub Menu Shadow Color',
            'desc'      => 'You can turn off the shadow by settings its opacity to 0. Simply use the adjustment bar on the right of the colorpicker.',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
                
            )
        );
        
        $ut_metabox_navigation_settings['fields'][] = array(
            'id'        => 'ut_navigation_ss_sl_border_color',
            'label'     => 'Navigation Sub Menu Border Color',
            'type'      => 'colorpicker',
            'mode'      => 'rgb',
            'metapanel' => 'ut-navigation-section',
            'required'  => array(
                'ut_navigation_config'           => 'off',
                'ut_navigation_skin'             => 'ut-header-custom',
                'ut_navigation_customskin_state' => 'on_switch'
            )
        );
            
        ot_register_meta_box( $ut_metabox_navigation_settings );
    
    }

endif;    

?>