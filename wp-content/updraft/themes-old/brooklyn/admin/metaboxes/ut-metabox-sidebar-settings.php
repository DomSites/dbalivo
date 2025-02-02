<?php

if ( ! function_exists( 'ut_sidebar_settings' ) ) :
 
    function ut_sidebar_settings() {
        
        $ut_sidebar_settings = array(
            
            'id'          => 'ut_sidebar_settings',
            'title'       => 'Sidebar Settings',
            'pages'       => array( 'page'),
            'type'        => 'simple',
            'context'     => 'side',
            'priority'    => 'low',
            'fields'      => array(
                
                array(
                    'label'       => 'Select Sidebar',
                    'id'          => 'ut_select_sidebar',
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'label'     => 'No Sidebar',
                            'value'     => 'no_sidebar'
                        ),
                        array(
                            'label'     => 'Default Page Sidebar',
                            'value'     => 'page-widget-area'
                        ),
                    ),
                    'std'         => 'no_sidebar'
                ),
                
            ) /* close fields */
        
        ); /* close settings array */
        
        
        /* inject dynamic sidebar */
        $dynamic_sidebars = get_option('ut_theme_sidebars');
                
        if( !empty( $dynamic_sidebars ) && is_array( $dynamic_sidebars ) ) :
                          
            foreach( $dynamic_sidebars as $single_sidebar ) {
                 
                 $sidebar_setting = array();
                 
                 $sidebar_setting['label'] = $single_sidebar['sidebarname'];
                 $sidebar_setting['value'] = $single_sidebar['sidebar_id'];
                 
                 $counter = count( $ut_sidebar_settings['fields'][0]['choices'] );                 
                 $ut_sidebar_settings['fields'][0]['choices'][$counter+1] = $sidebar_setting;
                            
            }
        
        endif;
        
        /* get default sidebars */
        $ut_sidebar_settings['fields'][0]['choices'][] = array('label' => 'Blog Sidebar', 'value' => 'blog-widget-area');
        
        if( ut_is_plugin_active('woocommerce/woocommerce.php') ) {
            $ut_sidebar_settings['fields'][0]['choices'][] = array('label' => 'Shop Sidebar', 'value' => 'shop-widget-area');    
        }
        
        ot_register_meta_box( $ut_sidebar_settings );
        
    }

    add_action( 'admin_init', 'ut_sidebar_settings' );

endif;



if ( ! function_exists( 'ut_data_color_settings' ) ) :
 
    function ut_data_color_settings() {
        
        if( !ot_get_option('ut_date_color_skins') ) {
            return;
        }
        
        $ut_data_color_settings = array(
            
            'id'          => 'ut_date_color_settings',
            'title'       => 'Data Color Settings',
            'pages'       => array( 'post'),
            'type'        => 'simple',
            'context'     => 'side',
            'priority'    => 'low',
            'fields'      => array(
                
                array(
                    'label'       => 'Select Date Color Skin',
                    'id'          => 'ut_date_color_skin',
                    'type'        => 'select',
                    'choices'     => array(
                        array(
                            'label'     => 'Default (Theme Options)',
                            'value'     => 'default'
                        ),
                    ),
                    'std'         => 'default'
                ),
                
            ) /* close fields */
        
        ); /* close settings array */
        
        
        /* 
         * inject dynamic skins 
         */
        $ut_date_color_skins = ot_get_option('ut_date_color_skins');
        
        if( !empty( $ut_date_color_skins ) && is_array( $ut_date_color_skins ) ) :
                          
            foreach( $ut_date_color_skins as $skin ) {
                
                $ut_data_color_settings["fields"][0]["choices"][] = array(
                    
                    'label'     => $skin['title'],
                    'value'     => $skin['unique_id']
                    
                );
                
            }
        
        endif;
        
        ot_register_meta_box( $ut_data_color_settings );
        
        
    }

    add_action( 'admin_init', 'ut_data_color_settings' );

endif;