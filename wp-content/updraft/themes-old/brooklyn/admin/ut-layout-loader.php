<?php 

/*
|--------------------------------------------------------------------------
| Load Default Layout on Theme Activation
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'ut_load_layout_into_ot' ) ) {

	function ut_load_layout_into_ot( $ot_layout_file = false ) {
		
		$GLOBALS['ut_load_ot_layout'] = true;		
		
		/* default file for theme activation */
		$ot_layout_file = !empty( $ot_layout_file ) ? $ot_layout_file : false;
		
        /* needed option tree file for operation */
		include_once( THEME_DOCUMENT_ROOT . '/admin/includes/ot-functions-admin.php' );
        
        /* default images for system pages */
        $default_images = array();

        $default_images['ut_csection_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_csection_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_csection_background_image']['background-position'] = 'center center';
        $default_images['ut_csection_background_image']['background-size'] = 'cover';
        $default_images['ut_csection_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default-contact.jpg';

        $default_images['ut_search_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_search_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_search_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_search_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_search_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_404_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_404_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_404_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_404_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_404_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_favicon'] = THEME_WEB_ROOT . '/images/default/fav-32.png';
        $default_images['ut_apple_touch_icon_iphone'] = THEME_WEB_ROOT . '/images/default/fav-57.png';
        $default_images['ut_apple_touch_icon_ipad'] = THEME_WEB_ROOT . '/images/default/fav-72.png';
        $default_images['ut_apple_touch_icon_iphone_retina'] = THEME_WEB_ROOT . '/images/default/fav-114.png';
        $default_images['ut_apple_touch_icon_ipad_retina'] = THEME_WEB_ROOT . '/images/default/fav-144.png';
        
        if( $ot_layout_file == 'demo_twentynine.txt' || $ot_layout_file == 'demo_twentysix.txt' || $ot_layout_file == 'demo_five.txt' || $ot_layout_file == 'demo_thirty.txt' || $ot_layout_file == 'demo_thirtyone.txt' || $ot_layout_file == 'demo_thirtytwo.txt' ) {
            
            $default_images['ut_site_logo'] = '';
            $default_images['ut_site_logo_alt'] = '';
            
            set_theme_mod( 'ut_site_logo', '' );
            set_theme_mod( 'ut_site_logo_alt', '' );
            
        }
        
        if( !$ot_layout_file ) {
            
            $default_images['ut_site_logo'] = THEME_WEB_ROOT . '/images/default/bklyn-logo-white-normal.png';
            $default_images['ut_site_logo_alt'] = THEME_WEB_ROOT . '/images/default/bklyn-logo-dark-normal.png';
            
            set_theme_mod('ut_site_logo', THEME_WEB_ROOT . '/images/default/bklyn-logo-white.svg' );
            set_theme_mod('ut_site_logo_alt', THEME_WEB_ROOT . '/images/default/bklyn-logo-dark.svg' );
            
            update_option('ut_accentcolor', '#FFBF00');
            
        }
        
		if( $ot_layout_file ) {
		
            /* theme options file */ 
            $ot_layout_file = get_template_directory() . '/admin/assets/optionsdata/' . $ot_layout_file;

            if ( !is_readable( $ot_layout_file ) ) {
                return;
            }

            /* file rawdata */
            $rawdata = file_get_contents( $ot_layout_file );
        
        } else {
            
            include( THEME_DOCUMENT_ROOT . '/admin/optionsdata.php' );
            $rawdata = ut_theme_default_setting();
            
        }
        
		$options = isset( $rawdata ) ? unserialize( ot_decode( $rawdata ) ) : '';
				
		/* get settings array */
      	$settings = _ut_theme_options();		
		
		/* has options */
		if ( is_array( $options ) ) {
			
			/* validate options */
			if ( is_array( $settings ) ) {
				
				foreach( $settings['settings'] as $setting ) {
			  
					if ( isset( $options[$setting['id']] ) ) {
                        
                        if( array_key_exists( $setting['id'], $default_images ) ) {
                            
                            if( is_array( $options[$setting['id']] ) ) {
                                
                                $options[$setting['id']] = $default_images[$setting['id']];
                                
                            } else {
                                
                                $options[$setting['id']] = $default_images[$setting['id']];
                                
                            }                            
                                                    
                        }
                        
				  		$content = ot_stripslashes( $options[$setting['id']] );
				  		$options[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
				  
					}										
			  
				}
			
			} /* end validate */
            
			/* execute the action hook and pass the theme options to it */
        	do_action( 'ot_before_theme_options_save', $options );
            
			/* update the option tree array */
        	update_option('option_tree', $options);
			update_option('ut_layout_loaded' , 'active');
			
			$GLOBALS['ut_load_ot_layout'] = false;
		
		}
	
	}
	    
	add_action('ut_load_layout' , 'ut_load_layout_into_ot');
	
} ?>
