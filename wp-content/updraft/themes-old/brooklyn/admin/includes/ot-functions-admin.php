<?php global $ut_load_ot_layout; if ( ! defined( 'OT_VERSION' ) && !$ut_load_ot_layout ) exit( 'No direct script access allowed' );
/**
 * Functions used only while viewing the admin UI.
 *
 * Limit loading these function only when needed 
 * and not in the front end.
 *
 * @package   OptionTree
 * @author    Derek Herman <derek@valendesigns.com>
 * @copyright Copyright (c) 2013, Derek Herman
 * @since     2.0
 */

/**
 * Registers the Theme Option page
 *
 * @uses      ot_register_settings()
 *
 * @return    void
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_register_theme_options_page' ) ) {

  function ot_register_theme_options_page() {
  
    /* get the settings array */
    $get_settings = _ut_theme_options();
    
    /* sections array */
    $sections = isset( $get_settings['sections'] ) ? $get_settings['sections'] : array();
    
    /* settings array */
    $settings = isset( $get_settings['settings'] ) ? $get_settings['settings'] : array();
    
    /* build the Theme Options */
    if ( function_exists( 'ot_register_settings' ) && OT_USE_THEME_OPTIONS ) {
      
      ot_register_settings( array(
          array(
            'id'                  => 'option_tree',
            'pages'               => array( 
              array(
                'id'              => 'ot_theme_options',
                'parent_slug'     => apply_filters( 'ot_theme_options_parent_slug', 'unite-welcome-page' ),
                'page_title'      => apply_filters( 'ot_theme_options_page_title', __( 'Theme Options', 'option-tree' ) ),
                'menu_title'      => apply_filters( 'ot_theme_options_menu_title', __( 'Theme Options', 'option-tree' ) ),
                'capability'      => $caps = apply_filters( 'ot_theme_options_capability', 'edit_theme_options' ),
                'menu_slug'       => apply_filters( 'ot_theme_options_menu_slug', 'ut_theme_options' ),
                'icon_url'        => apply_filters( 'ot_theme_options_icon_url', null ),
                'position'        => apply_filters( 'ot_theme_options_position', null ),
                'updated_message' => apply_filters( 'ot_theme_options_updated_message', __( 'Theme Options updated.', 'option-tree' ) ),
                'reset_message'   => apply_filters( 'ot_theme_options_reset_message', __( 'Theme Options reset.', 'option-tree' ) ),
                'button_text'     => apply_filters( 'ot_theme_options_button_text', __( 'Save Changes', 'option-tree' ) ),
                'screen_icon'     => 'themes',
                'sections'        => $sections,
                'settings'        => $settings
              )
            )
          )
        ) 
      );
      
      // Filters the options.php to add the minimum user capabilities.
      add_filter( 'option_page_capability_option_tree', create_function( '$caps', "return '$caps';" ), 999 );
    
    }
  
  }

}

/**
 * Registers the Settings page
 *
 * @uses      ot_register_settings()
 *
 * @return    void
 *
 * @access    public
 * @since     2.1
 */
if ( ! function_exists( 'ot_register_settings_page' ) ) {

  function ot_register_settings_page() {
  
    // Create the filterable pages array
    $ot_register_pages_array =  array( 
      array( 
        'id'              => 'ot',
        'page_title'      => __( 'OptionTree', 'option-tree' ),
        'menu_title'      => __( 'OptionTree', 'option-tree' ),
        'capability'      => 'edit_theme_options',
        'menu_slug'       => 'ot-settings',
        'icon_url'        => OT_URL . '/assets/images/ot-logo-mini.png',
        'position'        => 61,
        'hidden_page'     => true
      ),
      array(
        'id'              => 'settings',
        'parent_slug'     => 'ot-settings',
        'page_title'      => __( 'Settings', 'option-tree' ),
        'menu_title'      => __( 'Settings', 'option-tree' ),
        'capability'      => 'edit_theme_options',
        'menu_slug'       => 'ot-settings',
        'icon_url'        => null,
        'position'        => null,
        'updated_message' => __( 'Theme Options updated.', 'option-tree' ),
        'reset_message'   => __( 'Theme Options reset.', 'option-tree' ),
        'button_text'     => __( 'Save Settings', 'option-tree' ),
        'show_buttons'    => false,
        'screen_icon'     => 'themes',
        'sections'        => array(
          array(
            'id'          => 'import',
            'title'       => __( 'Import', 'option-tree' )
          ),
          array(
            'id'          => 'export',
            'title'       => __( 'Export', 'option-tree' )
          )
        ),
        'settings'        => array(
          array(
            'id'          => 'import_settings_text',
            'label'       => __( 'Settings', 'option-tree' ),
            'type'        => 'import-settings',
            'section'     => 'import'
          ),
          array(
            'id'          => 'import_data_text',
            'label'       => __( 'Theme Options', 'option-tree' ),
            'type'        => 'import-data',
            'section'     => 'import'
          ),
          array(
            'id'          => 'export_data_text',
            'label'       => __( 'Theme Options', 'option-tree' ),
            'type'        => 'export-data',
            'section'     => 'export'
          )          
        )
      )    
    );
    
    // Loop over the settings and remove as needed.
    foreach( $ot_register_pages_array as $key => $page ) {
      
      // Remove various options from the Settings UI.
      if ( $page['id'] == 'settings' ) {
        
        // Remove parts of the Imports UI
        if ( OT_SHOW_SETTINGS_IMPORT == false ) {
          
          foreach( $page['settings'] as $setting_key => $setting ) {
            if ( $setting['section'] == 'import' && in_array( $setting['id'], array('import_xml_text', 'import_settings_text' ) ) ) {
              unset($ot_register_pages_array[$key]['settings'][$setting_key]);
            }
          }
        
        }
      
      }
    
    }
    
    $ot_register_pages_array = apply_filters( 'ot_register_pages_array', $ot_register_pages_array );
    
    // Register the pages.
    ot_register_settings( array(
        array(
          'id'              => 'option_tree_settings',
          'pages'           => $ot_register_pages_array
        )
      )
    );
  
  }

}

/**
 * Runs directly after the Theme Options are save.
 *
 * @return    void
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_after_theme_options_save' ) ) {

  function ot_after_theme_options_save() {
  
    $page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
    $updated = isset( $_REQUEST['settings-updated'] ) && $_REQUEST['settings-updated'] == 'true' ? true : false;
    
    /* only execute after the theme options are saved */
    if ( apply_filters( 'ot_theme_options_menu_slug', 'ut_theme_options' ) == $page && $updated ) {
      
      /* check if cache is off and delete transients */
      #if( ot_get_option('ut_use_cache' , 'off') == 'off' ) {
        
        delete_transient('ut_css_cache');
        delete_transient('ut_js_cache');
        delete_transient('ut_front_page_query'); 
        
      #}
      
      /* get new logo value for WordPress Customizer */
      set_theme_mod('ut_site_logo', ot_get_option('ut_site_logo'));
      set_theme_mod('ut_site_logo_alt', ot_get_option('ut_site_logo_alt'));
      set_theme_mod('ut_site_logo_retina', ot_get_option('ut_site_logo_retina'));
      set_theme_mod('ut_site_logo_alt_retina', ot_get_option('ut_site_logo_alt_retina'));      
      
      /* get new theme accent color for WordPress Customizer */
      update_option('ut_accentcolor', ot_get_option('ut_accentcolor'));
      
      /* grab a copy of the theme options */
      $options = get_option( 'option_tree' );
      
      /* execute the action hook and pass the theme options to it */
      do_action( 'ot_after_theme_options_save', $options );
      
    }
  
  }

}

/**
 * Validate the options by type before saving.
 *
 * This function will run on only some of the option types
 * as all of them don't need to be validated, just the
 * ones users are going to input data into; because they
 * can't be trusted.
 *
 * @param     mixed     Setting value
 * @param     string    Setting type
 * @param     string    Setting field ID
 * @param     string    WPML field ID
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_validate_setting' ) ) {

  function ot_validate_setting( $input, $type, $field_id, $wmpl_id = '' ) {
    
    /* exit early if missing data */
    if ( ! $input || ! $type || ! $field_id )
      return $input;
    
    $input = apply_filters( 'ot_validate_setting', $input, $type, $field_id );
    
    /* WPML Register and Unregister strings */
    if ( ! empty( $wmpl_id ) ) {
    
      /* Allow filtering on the WPML option types */
      $single_string_types = apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple', 'upload' ) );
              
      if ( in_array( $type, $single_string_types ) ) {
      
        if ( ! empty( $input ) ) {
        
          ot_wpml_register_string( $wmpl_id, $input );
          
        } else {
        
          ot_wpml_unregister_string( $wmpl_id );
          
        }
      
      }
    
    }
            
    if ( 'background' == $type ) {
      
      $input['background-image'] = ot_validate_setting( $input['background-image'], 'upload', $field_id );
      
    } else if ( in_array( $type, array( 'css', 'text', 'textarea', 'textarea-simple' ) ) ) {
      
      if ( ! current_user_can( 'unfiltered_html' ) && OT_ALLOW_UNFILTERED_HTML == false ) {
      
        $input = wp_kses_post( $input );
        
      }
            
    } else if ( 'typography' == $type && isset( $input['font-color'] ) ) {
      
      $input['font-color'] = ot_validate_setting( $input['font-color'], 'colorpicker', $field_id );
    
    } else if ( 'upload' == $type ) {

      $input = sanitize_text_field( $input );
         
    }
    
    $input = apply_filters( 'ot_after_validate_setting', $input, $type, $field_id );
 
    return $input;
    
  }

}
  
/**
 * Returns the ID of a custom post type by post_name.
 *
 * @uses        get_results()
 *
 * @return      int
 *
 * @access      public
 * @since       2.0
 */
if ( ! function_exists( 'ot_get_media_post_ID' ) ) {

  function ot_get_media_post_ID() {
    
    // Option ID
    $option_id = 'ot_media_post_ID';
    
    // Get the media post ID
    $post_ID = get_option( $option_id, false );
    
    // Add $post_ID to the DB
    if ( $post_ID === false || empty( $post_ID ) ) {
      global $wpdb;
      
      // Get the media post ID
      $post_ID = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE `post_title` = 'Media' AND `post_type` = 'option-tree' AND `post_status` = 'private'" );
      
      // Add to the DB
      if ( $post_ID !== null )
        update_option( $option_id, $post_ID );

    }
    
    return $post_ID;
    
  }

}

/**
 * Register custom post type & create the media post used to attach images.
 *
 * @uses        get_results()
 *
 * @return      void
 *
 * @access      public
 * @since       2.0
 */
if ( ! function_exists( 'ot_create_media_post' ) ) {
  
  function ot_create_media_post() {
    
    $deprecated = 'register_' . 'post_type';
    
    $deprecated( 'option-tree', array(
      'labels'              => array( 'name' => __( 'Option Tree', 'option-tree' ) ),
      'public'              => false,
      'show_ui'             => false,
      'capability_type'     => 'post',
      'exclude_from_search' => true,
      'hierarchical'        => false,
      'rewrite'             => false,
      'supports'            => array( 'title', 'editor' ),
      'can_export'          => false,
      'show_in_nav_menus'   => false
    ) );
  
    /* look for custom page */
    $post_id = ot_get_media_post_ID();
      
    /* no post exists */
    if ( $post_id == 0 ) {
      
      /* create post object */
      $_p = array();
      $_p['post_title']     = 'Media';
      $_p['post_status']    = 'private';
      $_p['post_type']      = 'option-tree';
      $_p['comment_status'] = 'closed';
      $_p['ping_status']    = 'closed';
      
      /* insert the post into the database */
      wp_insert_post( $_p );
      
    }
  
  }

}

/**
 * Filter 'upload_mimes' and add xml. 
 *
 * @param     array     $mimes An array of valid upload mime types
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_upload_mimes' ) ) {

    function ot_upload_mimes( $mimes ) {
  
        $mimes['xml'] = 'application/xml';
        $mimes['svg'] = 'image/svg+xml';
    
        return $mimes;
    
    }
    
    add_filter('upload_mimes', 'ot_upload_mimes');
    
}

/**
 * Filters 'wp_mime_type_icon' and have xml display as a document.
 *
 * @param     string    $icon The mime icon
 * @param     string    $mime The mime type
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_xml_mime_type_icon' ) ) {

  function ot_xml_mime_type_icon( $icon, $mime ) {
  
    if ( $mime == 'application/xml' || $mime == 'text/xml' )
      return wp_mime_type_icon( 'document' );
      
    return $icon;
    
  }

}

/**
 * Import before the screen is displayed.
 *
 * @return    void
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_import' ) ) {

  function ot_import() {
    
    /* check and verify import theme options data nonce */
    if ( isset( $_POST['import_data_nonce'] ) && wp_verify_nonce( $_POST['import_data_nonce'], 'import_data_form' ) ) {
      
      /* default message */
      $message = 'failed';
      
      /* textarea value */
      $options = isset( $_POST['import_data'] ) ? unserialize( ot_decode( $_POST['import_data'] ) ) : '';
      
      /* get settings array */
      $settings = _ut_theme_options();
      
      /* has options */
      if ( is_array( $options ) ) {
        
        /* validate options */
        if ( is_array( $settings ) ) {
        
          foreach( $settings['settings'] as $setting ) {
          
            if ( isset( $options[$setting['id']] ) ) {
              
              $content = ot_stripslashes( $options[$setting['id']] );
              
              $options[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
              
            }
          
          }
        
        }
        
        /* execute the action hook and pass the theme options to it */
        do_action( 'ot_before_theme_options_save', $options );
      
        /* update the option tree array */
        update_option( 'option_tree', $options );
        
        $message = 'success';
        
      }
      
      /* redirect accordingly */
      wp_redirect( esc_url( add_query_arg( array( 'action' => 'import-data', 'message' => $message ), $_POST['_wp_http_referer'] ) ) );
      exit;
      
    }
    
    return false;

  }
  
}

/**
 * Helper function to display alert messages.
 *
 * @param     array     Page array
 * @return    mixed
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_alert_message' ) ) {

  function ot_alert_message( $page = array() ) {
    
    if ( empty( $page ) )
      return false;
    
    $action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';
    $message = isset( $_REQUEST['message'] ) ? $_REQUEST['message'] : '';
    $updated = isset( $_REQUEST['settings-updated'] ) ? $_REQUEST['settings-updated'] : '';
    
    if ( $action == 'save-settings' ) {
    
      if ( $message == 'success' ) {
        
        return '<div id="message" class="updated fade below-h2"><p>' . __( 'Settings updated.', 'option-tree' ) . '</p></div>';
        
      } else if ( $message == 'failed' ) {
        
        return '<div id="message" class="error fade below-h2"><p>' . __( 'Settings could not be saved.', 'option-tree' ) . '</p></div>';
        
      }
      
    } else if ( $action == 'import-xml' || $action == 'import-settings' ) {
      
      if ( $message == 'success' ) {
        
        return '<div id="message" class="updated fade below-h2"><p>' . __( 'Settings Imported.', 'option-tree' ) . '</p></div>';
        
      } else if ( $message == 'failed' ) {
        
        return '<div id="message" class="error fade below-h2"><p>' . __( 'Settings could not be imported.', 'option-tree' ) . '</p></div>';
        
      }
    } else if ( $action == 'import-data' ) {
      
      if ( $message == 'success' ) {
        
        return '<div id="message" class="updated fade below-h2"><p>' . __( 'Data Imported.', 'option-tree' ) . '</p></div>';
        
      } else if ( $message == 'failed' ) {
        
        return '<div id="message" class="error fade below-h2"><p>' . __( 'Data could not be imported.', 'option-tree' ) . '</p></div>';
        
      }
    
    } 
        
    do_action( 'ot_custom_page_messages' );
    
    if ( $updated == 'true' ) {  
       
      return '<div id="message" class="updated fade below-h2"><p>' . $page['updated_message'] . '</p></div>';
        
    } 
    
    return false;
    
  }
  
}

/**
 * Setup the default option types.
 *
 * The returned option types are filterable so you can add your own.
 * This is not a task for a beginner as you'll need to add the function
 * that displays the option to the user and validate the saved data.
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_option_types_array' ) ) {

  function ot_option_types_array() {
  
    return apply_filters( 'ot_option_types_array', array( 
      'background'                => 'Background',
      'category-checkbox'         => 'Category Checkbox',
      'category-select'           => 'Category Select',
      'checkbox'                  => 'Checkbox',
      'colorpicker'               => 'Colorpicker',
      'css'                       => 'CSS',
      'custom-post-type-checkbox' => 'Custom Post Type Checkbox',
      'custom-post-type-select'   => 'Custom Post Type Select',
      'list-item'                 => 'List Item',
      'numeric-slider'            => 'Numeric Slider',
      'page-checkbox'             => 'Page Checkbox',
      'page-select'               => 'Page Select',
      'post-checkbox'             => 'Post Checkbox',
      'post-select'               => 'Post Select',
      'radio'                     => 'Radio',
      'radio-image'               => 'Radio Image',
      'select'                    => 'Select',
      'sidebar-select'            => 'Sidebar Select', 
      'slider'                    => 'Slider',
      'tag-checkbox'              => 'Tag Checkbox',
      'tag-select'                => 'Tag Select',
      'taxonomy-checkbox'         => 'Taxonomy Checkbox',
      'taxonomy-select'           => 'Taxonomy Select',
      'text'                      => 'Text',
      'textarea'                  => 'Textarea',
      'textarea-simple'           => 'Textarea Simple',
      'textblock'                 => 'Textblock',
      'textblock-titled'          => 'Textblock Titled',
      'typography'                => 'Typography',
      'upload'                    => 'Upload'
    ) );
    
  }
}

/**
 * Map old option types for rebuilding XML and Table data.
 *
 * @param     string      $type The old option type
 * @return    string      The new option type
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_map_old_option_types' ) ) {

  function ot_map_old_option_types( $type = '' ) {
    
    if ( ! $type ) 
      return 'text';
      
    $types = array(
      'background'        => 'background',
      'category'          => 'category-select',
      'categories'        => 'category-checkbox',
      'checkbox'          => 'checkbox',
      'colorpicker'       => 'colorpicker',
      'css'               => 'css',
      'custom_post'       => 'custom-post-type-select',
      'custom_posts'      => 'custom-post-type-checkbox',                     
      'input'             => 'text',
      'image'             => 'upload',
      'page'              => 'page-select',
      'pages'             => 'page-checkbox',
      'post'              => 'post-select',
      'posts'             => 'post-checkbox',
      'radio'             => 'radio',
      'select'            => 'select',
      'slider'            => 'slider',
      'tag'               => 'tag-select',
      'tags'              => 'tag-checkbox',
      'textarea'          => 'textarea',
      'textblock'         => 'textblock',
      'typography'        => 'typography',
      'upload'            => 'upload'
    );
    
    if ( isset( $types[$type] ) )
      return $types[$type];
    
    return false;
    
  }
}

/**
 * Recognized google font subsets
 */
if ( ! function_exists( 'ot_recognized_google_subsets' ) ) {

  function ot_recognized_google_subsets( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_google_subsets', array(
      'latin'     		=> 'Latin',
      'latin-ext'   	=> 'Latin Extended',
      'greek' 			=> 'Greek',
	  'greek-ext' 		=> 'Greek Extended',
      'cyrillic'  		=> 'Cyrillic',
      'cyrillic-ext'    => 'Cyrillic Extended',
      'khmer'     		=> 'Khmer',
      'vietnamese' 		=> 'Vietnamese',
    ), $field_id );
    
  }

}

/**
 * Recognized google font styles
 */
if ( ! function_exists( 'ot_recognized_google_font_styles' ) ) {

  function ot_recognized_google_font_styles( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_google_font_styles', array(
      'regular'  => 'Normal',
      'italic'   => 'Italic'
    ), $field_id );
    
  }

}

/**
 * Recognized google font weight
 */
if ( ! function_exists( 'ot_recognized_google_font_weights' ) ) {

  function ot_recognized_google_font_weights( $field_id = '' ) {
    
    return apply_filters( 'ot_recognized_google_font_weights', array(
      '100'       => '100',
      '200'       => '200',
      '300'       => '300',
      '400'       => '400',
      '500'       => '500',
      '600'       => '600',
      '700'       => '700',
      '800'       => '800',
      '900'       => '900'
    ), $field_id );
  
  }
  
}

/**
 * Recognized font sizes
 *
 * Returns an array of all recognized font sizes.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     2.0.12
 */
if ( ! function_exists( 'ot_recognized_font_sizes' ) ) {

  function ot_recognized_font_sizes( $field_id ) {
  
    $range = ot_range( 
      apply_filters( 'ot_font_size_low_range', 0, $field_id ), 
      apply_filters( 'ot_font_size_high_range', 150, $field_id ), 
      apply_filters( 'ot_font_size_range_interval', 1, $field_id )
    );
    
    $unit = apply_filters( 'ot_font_size_unit_type', 'px', $field_id );
    
    foreach( $range as $k => $v ) {
      $range[$k] = $v . $unit;
    }
    
    return $range;
  }

}

/**
 * Recognized font styles
 *
 * Returns an array of all recognized font styles.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_font_styles' ) ) {

  function ot_recognized_font_styles( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_font_styles', array(
      'normal'  => 'Normal',
      'italic'  => 'Italic',
      'oblique' => 'Oblique',
      'inherit' => 'Inherit'
    ), $field_id );
    
  }

}

/**
 * Recognized font variants
 *
 * Returns an array of all recognized font variants.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_font_variants' ) ) {

  function ot_recognized_font_variants( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_font_variants', array(
      'normal'      => 'Normal',
      'small-caps'  => 'Small Caps',
      'inherit'     => 'Inherit'
    ), $field_id );
  
  }
  
}

/**
 * Recognized font weights
 *
 * Returns an array of all recognized font weights.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_font_weights' ) ) {

  function ot_recognized_font_weights( $field_id = '' ) {
    
    return apply_filters( 'ot_recognized_font_weights', array(
      'normal'    => 'Normal',
      'bold'      => 'Bold',
      'bolder'    => 'Bolder',
      'lighter'   => 'Lighter',
      '100'       => '100',
      '200'       => '200',
      '300'       => '300',
      '400'       => '400',
      '500'       => '500',
      '600'       => '600',
      '700'       => '700',
      '800'       => '800',
      '900'       => '900',
      'inherit'   => 'Inherit'
    ), $field_id );
  
  }
  
}

/**
 * Recognized letter spacing
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     2.0.12
 */
if ( ! function_exists( 'ot_recognized_letter_spacing' ) ) {

  function ot_recognized_letter_spacing( $field_id ) {
  
    $range = ot_range( 
      apply_filters( 'ot_letter_spacing_low_range', -0.1, $field_id ), 
      apply_filters( 'ot_letter_spacing_high_range', 0.1, $field_id ), 
      apply_filters( 'ot_letter_spacing_range_interval', 0.01, $field_id )
    );
    
    $unit = apply_filters( 'ot_letter_spacing_unit_type', 'em', $field_id );
    
    foreach( $range as $k => $v ) {
      $range[$k] = $v . $unit;
    }
    
    return $range;
  }

}

/**
 * Recognized line heights
 *
 * Returns an array of all recognized line heights.
 *
 * @uses      apply_filters()
 *
 * @param     string  $field_id ID that's passed to the filters.
 * @return    array
 *
 * @access    public
 * @since     2.0.12
 */
if ( ! function_exists( 'ot_recognized_line_heights' ) ) {

  function ot_recognized_line_heights( $field_id ) {
  
    $range = ot_range( 
      apply_filters( 'ot_line_height_low_range', 0, $field_id ), 
      apply_filters( 'ot_line_height_high_range', 150, $field_id ),
      apply_filters( 'ot_line_height_range_interval', 1, $field_id )    
    );
    
    $unit = apply_filters( 'ot_line_height_unit_type', 'px', $field_id );
    
    foreach( $range as $k => $v ) {
      $range[$k] = $v . $unit;
    }
      
    return $range;
      
      
  }

}

if ( ! function_exists( 'ot_recognized_line_heights_for_option' ) ) {

    function ot_recognized_line_heights_for_option( $field_id ) {
      
        $line_heights = ot_recognized_line_heights( $field_id );
      
        $choices = array();
        
        $choices[] = array(
            'value' => '',
            'label' => 'Default (Theme Options)'
        );
        
        foreach( $line_heights as $key => $line_height ) {
          
            $choices[] = array(                
                'value' => $key,
                'label' => $line_height
            );
          
        }
    
        return $choices;
  
    }

}





/**
 * Recognized text decorations
 *
 * Returns an array of all recognized text decorations.
 * Keys are intended to be stored in the database
 * while values are ready for display in html.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0.10
 */
if ( ! function_exists( 'ot_recognized_text_decorations' ) ) {
  
  function ot_recognized_text_decorations( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_text_decorations', array(
      'blink'         => 'Blink',
      'inherit'       => 'Inherit',
      'line-through'  => 'Line Through',
      'none'          => 'None',
      'overline'      => 'Overline',
      'underline'     => 'Underline'
    ), $field_id );
    
  }

}

/**
 * Recognized text transformations
 *
 * Returns an array of all recognized text transformations.
 * Keys are intended to be stored in the database
 * while values are ready for display in html.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0.10
 */
if ( ! function_exists( 'ot_recognized_text_transformations' ) ) {
  
  function ot_recognized_text_transformations( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_text_transformations', array(
      'capitalize'  => 'Capitalize',
      'inherit'     => 'Inherit',
      'lowercase'   => 'Lowercase',
      'none'        => 'None',
      'uppercase'   => 'Uppercase'
    ), $field_id );
    
  }

}

/**
 * Recognized background repeat
 *
 * Returns an array of all recognized background repeat values.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_background_repeat' ) ) {
  
  function ot_recognized_background_repeat( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_background_repeat', array(
      'no-repeat' => 'No Repeat',
      'repeat'    => 'Repeat All',
      'repeat-x'  => 'Repeat Horizontally',
      'repeat-y'  => 'Repeat Vertically',
      'inherit'   => 'Inherit'
    ), $field_id );
    
  }
  
}

/**
 * Recognized background attachment
 *
 * Returns an array of all recognized background attachment values.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_background_attachment' ) ) {

  function ot_recognized_background_attachment( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_background_attachment', array(
      "fixed"   => "Fixed",
      "scroll"  => "Scroll",
      "inherit" => "Inherit"
    ), $field_id );
    
  }

}

/**
 * Recognized background position
 *
 * Returns an array of all recognized background position values.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_recognized_background_position' ) ) {

  function ot_recognized_background_position( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_background_position', array(
      "left top"      => "Left Top",
      "left center"   => "Left Center",
      "left bottom"   => "Left Bottom",
      "center top"    => "Center Top",
      "center center" => "Center Center",
      "center bottom" => "Center Bottom",
      "right top"     => "Right Top",
      "right center"  => "Right Center",
      "right bottom"  => "Right Bottom"
    ), $field_id );
    
  }

}


/**
 * Recognized background size
 *
 * Returns an array of all recognized background size values.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'ot_recognized_background_size' ) ) {

  function ot_recognized_background_size( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_background_size', array(
      "auto"      	=> "auto",
      "cover"   	=> "cover"
    ), $field_id );
    
  }

} 



/**
 * Recognized easing effects
 *
 * Returns an array of all recognized easing.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'ot_recognized_easing_effects' ) ) {

  function ot_recognized_easing_effects( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_easing_effects', array(
		'linear'    		=> 'linear',
		'swing'     		=> 'swing',
		'easeInQuad'    	=> 'easeInQuad',
		'easeOutQuad'   	=> 'easeOutQuad',
		'easeInOutQuad'     => 'easeInOutQuad',
		'easeInCubic'       => 'easeInCubic',
		'easeOutCubic'      => 'easeOutCubic',
		'easeInOutCubic'    => 'easeInOutCubic',
		'easeInQuart'       => 'easeOutQuart',
		'easeInOutQuart'    => 'easeInOutQuart',
		'easeInQuint'       => 'easeInQuint',
		'easeOutQuint'      => 'easeOutQuint',
		'easeInOutQuint'    => 'easeInOutQuint',
		'easeInSine'   		=> 'easeInSine',
		'easeOutSine'   	=> 'easeOutSine',
		'easeInOutSine'   	=> 'easeInOutSine',
		'easeInExpo'   		=> 'easeInExpo',
		'easeOutExpo'   	=> 'easeOutExpo',
		'easeInOutExpo'   	=> 'easeInOutExpo',
		'easeInCirc'   		=> 'easeInCirc',
		'easeOutCirc'   	=> 'easeOutCirc',
		'easeInOutCirc'   	=> 'easeInOutCirc',
		'easeInElastic'   	=> 'easeInElastic',
		'easeOutElastic'   	=> 'easeOutElastic',
		'easeInOutElastic'  => 'easeInOutElastic',
		'easeInBounce'   	=> 'easeInBounce',
		'easeOutBounce'   	=> 'easeOutBounce',
		'easeInOutBounce'  	=> 'easeInOutBounce',
		'easeInBack'  		=> 'easeInBack',
		'easeOutBack'  		=> 'easeOutBack',
		'easeInOutBack' 	=> 'easeInOutBack'
    ), $field_id );
    
  }

}

/**
 * Recognized css transitions
 *
 * Returns an array of all recognized transitions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 */
if ( ! function_exists( 'ot_recognized_transition_effects' ) ) {

  function ot_recognized_transition_effects( $field_id = '' ) {
  
    return apply_filters( 'ot_recognized_transition_effects', array(
		
          'fxSoftScale'     => 'Soft scale',
          'fxPressAway'     => 'Press away',
          'fxSideSwing'     => 'Side Swing',
          'fxFortuneWheel'  => 'Fortune wheel',
          'fxSwipe'         => 'Swipe',
          'fxPushReveal'    => 'Push reveal',
          'fxSnapIn'        => 'Snap in',
          'fxLetMeIn'       => 'Let me in',
          'fxStickIt'       => 'Stick it',
          'fxArchiveMe'     => 'Archive me',
          'fxVGrowth'       => 'Vertical growth',
          'fxSlideBehind'   => 'Slide Behind',
          'fxSoftPulse'     => 'Soft Pulse',
          'fxEarthquake'    => 'Earthquake',
          'fxCliffDiving'   => 'Cliff diving'
		
    ), $field_id );
    
  }

}



/**
 * Measurement Units
 *
 * Returns an array of all available unit types.
 * Renamed in version 2.0 to avoid name collisions.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_measurement_unit_types' ) ) {
  
  function ot_measurement_unit_types( $field_id = '' ) {
  
    return apply_filters( 'ot_measurement_unit_types', array(
      'px' => 'px',
      '%'  => '%',
      'em' => 'em',
      'pt' => 'pt'
    ), $field_id );
    
  }

}

/**
 * Radio Images default array.
 *
 * Returns an array of all available radio images.
 * You can filter this function to change the images
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_radio_images' ) ) {
  
  function ot_radio_images( $field_id = '' ) {
  
    return apply_filters( 'ot_radio_images', array(
      array(
        'value'   => 'left-sidebar',
        'label'   => __( 'Left Sidebar', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/left-sidebar.png'
      ),
      array(
        'value'   => 'right-sidebar',
        'label'   => __( 'Right Sidebar', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/right-sidebar.png'
      ),
      array(
        'value'   => 'full-width',
        'label'   => __( 'Full Width (no sidebar)', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/full-width.png'
      ),
      array(
        'value'   => 'dual-sidebar',
        'label'   => __( 'Dual Sidebar', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/dual-sidebar.png'
      ),
      array(
        'value'   => 'left-dual-sidebar',
        'label'   => __( 'Left Dual Sidebar', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/left-dual-sidebar.png'
      ),
      array(
        'value'   => 'right-dual-sidebar',
        'label'   => __( 'Right Dual Sidebar', 'option-tree' ),
        'src'     => OT_URL . 'assets/images/layout/right-dual-sidebar.png'
      )
    ), $field_id );
    
  }

}

/**
 * Default List Item Settings array.
 *
 * Returns an array of the default list item settings.
 * You can filter this function to change the settings
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_list_item_settings' ) ) {

  function ot_list_item_settings( $id ) {
    
    $settings = apply_filters( 'ot_list_item_settings', array(
      array(
        'id'        => 'image',
        'label'     => __( 'Image', 'option-tree' ),
        'type'      => 'upload',
        'choices'   => array()
      ),
      array(
        'id'        => 'link',
        'label'     => __( 'Link', 'option-tree' ),
        'type'      => 'text',
        'choices'   => array()
      ),
      array(
        'id'        => 'description',
        'label'     => __( 'Description', 'option-tree' ),
        'type'      => 'textarea-simple',
        'choices'   => array()
      )
    ), $id );
    
    return $settings;
  
  }

}

/**
 * Default Slider Settings array.
 *
 * Returns an array of the default slider settings.
 * You can filter this function to change the settings
 * on a per option basis.
 *
 * @uses      apply_filters()
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_slider_settings' ) ) {

  function ot_slider_settings( $id ) {
    
    $settings = apply_filters( 'image_slider_fields', array(
      array(
        'name'      => 'image',
        'type'      => 'image',
        'label'     => __( 'Image', 'option-tree' ),
        'class'     => ''
      ),
      array(
        'name'      => 'link',
        'type'      => 'text',
        'label'     => __( 'Link', 'option-tree' ),
        'class'     => ''
      ),
      array(
        'name'      => 'description',
        'type'      => 'textarea',
        'label'     => __( 'Description', 'option-tree' ),
        'class'     => ''
      )
    ), $id );
    
    /* fix the array keys, values, and just get it 2.0 ready */
    foreach( $settings as $_k => $setting ) {
    
      foreach( $setting as $s_key => $s_value ) {
        
        if ( 'name' == $s_key ) {
        
          $settings[$_k]['id'] = $s_value;
          unset($settings[$_k]['name']);
          
        } else if ( 'type' == $s_key ) {
          
          if ( 'input' == $s_value ) {
          
            $settings[$_k]['type'] = 'text';
            
          } else if ( 'textarea' == $s_value ) {
          
            $settings[$_k]['type'] = 'textarea-simple';
            
          } else if ( 'image' == $s_value ) {
          
            $settings[$_k]['type'] = 'upload';
            
          }
          
        }
        
      } 
      
    }
    
    return $settings;
    
  }

}

/**
 * Normalize CSS
 *
 * Normalize & Convert all line-endings to UNIX format.
 *
 * @param     string    $css
 * @return    string
 *
 * @access    public
 * @since     1.1.8
 * @updated   2.0
 */
if ( ! function_exists( 'ot_normalize_css' ) ) {

  function ot_normalize_css( $css ) {
    
    /* Normalize & Convert */
    $css = str_replace( "\r\n", "\n", $css );
    $css = str_replace( "\r", "\n", $css );
    
    /* Don't allow out-of-control blank lines */
    $css = preg_replace( "/\n{2,}/", "\n\n", $css );
    
    return $css;
  }
  
}

/**
 * Helper function to loop over the option types.
 *
 * @param    array    $type The current option type.
 *
 * @return   string
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_loop_through_option_types' ) ) {

  function ot_loop_through_option_types( $type = '', $child = false ) {
  
    $content = '';
    $types = ot_option_types_array();
    
    if ( $child )
      unset($types['list-item']);
    
    foreach( $types as $key => $value )
      $content.= '<option value="' . $key . '" ' . selected( $type, $key, false ) . '>'  . $value . '</option>';
    
    return $content;
    
  }
  
}

/**
 * Helper function to loop over choices.
 *
 * @param    string     $name The form element name.
 * @param    array      $choices The array of choices.
 *
 * @return   string
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_loop_through_choices' ) ) {

  function ot_loop_through_choices( $name, $choices = array() ) {
    
    $content = '';
    
    foreach( $choices as $key => $choice )
      $content.= '<li class="ui-state-default list-choice">' . ot_choices_view( $name, $key, $choice ) . '</li>';
    
    return $content;
  }
  
}

/**
 * Helper function to loop over sub settings.
 *
 * @param    string     $name The form element name.
 * @param    array      $settings The array of settings.
 *
 * @return   string
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_loop_through_sub_settings' ) ) {

  function ot_loop_through_sub_settings( $name, $settings = array() ) {
    
    $content = '';
    
    foreach( $settings as $key => $setting )
      $content.= '<li class="ui-state-default list-sub-setting">' . ot_settings_view( $name, $key, $setting ) . '</li>';
    
    return $content;
  }
  
}

/**
 * Helper function to display setting choices.
 *
 * This function is used in AJAX to add a new choice
 * and when choices have already been added and saved.
 *
 * @param    string   $name The form element name.
 * @param    array    $key The array key for the current element.
 * @param    array    An array of values for the current choice.
 *
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_choices_view' ) ) {

  function ot_choices_view( $name, $key, $choice = array() ) {
  
    return '
    <div class="option-tree-setting">
      <div class="open">' . ( isset( $choice['label'] ) ? esc_attr( $choice['label'] ) : 'Choice ' . ( $key + 1 ) ) . '</div>
      <div class="button-section">
        <a href="javascript:void(0);" class="option-tree-setting-edit ut-ui-button left-item" title="' . __( 'Edit', 'option-tree' ) . '">
          <span class="icon pencil">' . __( 'Edit', 'option-tree' ) . '</span>
        </a>
        <a href="javascript:void(0);" class="option-tree-setting-remove ut-ui-button red light right-item" title="' . __( 'Delete', 'option-tree' ) . '">
          <span class="icon trash-can">' . __( 'Delete', 'option-tree' ) . '</span>
        </a>
      </div>
      <div class="option-tree-setting-body">
        <div class="format-settings">
          <div class="format-setting-label">
            <h5>' . __( 'Label', 'option-tree' ) . '</h5>
          </div>
          <div class="format-setting type-text wide-desc">
            <div class="format-setting-inner">
              <input type="text" name="' . esc_attr( $name ) . '[choices][' . esc_attr( $key ) . '][label]" value="' . ( isset( $choice['label'] ) ? esc_attr( $choice['label'] ) : '' ) . '" class="option-tree-setting-title" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="format-settings">
          <div class="format-setting-label">
            <h5>' . __( 'Value', 'option-tree' ) . '</h5>
          </div>
          <div class="format-setting type-text wide-desc">
            <div class="format-setting-inner">
              <input type="text" name="' . esc_attr( $name ) . '[choices][' . esc_attr( $key ) . '][value]" value="' . ( isset( $choice['value'] ) ? esc_attr( $choice['value'] ) : '' ) . '" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="format-settings">
          <div class="format-setting-label">
            <h5>' . __( 'Image Source (Radio Image only)', 'option-tree' ) . '</h5>
          </div>
          <div class="format-setting type-text wide-desc">
            <div class="format-setting-inner">
              <input type="text" name="' . esc_attr( $name ) . '[choices][' . esc_attr( $key ) . '][src]" value="' . ( isset( $choice['src'] ) ? esc_attr( $choice['src'] ) : '' ) . '" autocomplete="off" />
            </div>
          </div>
        </div>
    </div>';
    
  }

}

/**
 * Helper function to display list items.
 *
 * This function is used in AJAX to add a new list items
 * and when they have already been added and saved.
 *
 * @param     string    $name The form field name.
 * @param     int       $key The array key for the current element.
 * @param     array     An array of values for the current list item.
 *
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_list_item_view' ) ) {

  function ot_list_item_view( $name, $key, $list_item = array(), $post_id = 0, $get_option = '', $settings = array(), $type = '', $list_title = true ) {
    
    /* required title setting */
    $required_setting = array(
      array(
        'id'        => 'title',
        'label'     => __( 'Title', 'option-tree' ),
        'type'      => 'text',
        'class'     => 'option-tree-setting-title',
        'choices'   => array()
      )
    );
    
    if( !$list_title ) {
        
        /* remove required settings */
        $required_setting = array();
        
    }    
    
    /* load the old filterable slider settings */
    if ( 'slider' == $type ) {
      
      $settings = ot_slider_settings( $name );
    
    }
      
    /* if no settings array load the filterable list item settings */
    if ( empty( $settings ) ) {
      
      $settings = ot_list_item_settings( $name );
      
    }
    
    /* merge the two settings array */
    $settings = array_merge( $required_setting, $settings );
    
    echo '
    <div class="option-tree-setting ui-sortable-handle">
      
      <div class="open">' . ( isset( $list_item['title'] ) ? esc_attr( $list_item['title'] ) : '' ) . '</div>
      
      <div class="option-tree-setting-body">';
        
      foreach( $settings as $field ) {
        
        // Set field value
        $field_value = isset( $list_item[$field['id']] ) ? $list_item[$field['id']] : '';
        
        /* set default to standard value */
        if ( isset( $field['std'] ) ) {  
          $field_value = ot_filter_std_value( $field_value, $field['std'] );
        }
          
        /* make life easier */
        $_field_name = $get_option ? $get_option . '[' . $name . ']' : $name;
             
        /* build the arguments array */
        $_args = array(
          'type'              => $field['type'],
          'field_id'          => $name . '_' . $field['id'] . '_' . $key,
          'field_name'        => $_field_name . '[' . $key . '][' . $field['id'] . ']',
          'field_toplevel'    => isset( $field['toplevel'] ) && $field['toplevel'] ? $field['toplevel'] : false,
          'field_list_title'  => isset( $field['list_title'] ) && !$field['list_title'] ? false : true,
          'field_value'       => $field_value,
          'field_desc'        => isset( $field['desc'] ) ? $field['desc'] : '',
          'field_std'         => isset( $field['std'] ) ? $field['std'] : '',
          'field_rows'        => isset( $field['rows'] ) ? $field['rows'] : 10,
          'field_post_type'   => isset( $field['post_type'] ) && ! empty( $field['post_type'] ) ? $field['post_type'] : 'post',
          'field_taxonomy'    => isset( $field['taxonomy'] ) && ! empty( $field['taxonomy'] ) ? $field['taxonomy'] : 'category',
          'field_min_max_step'=> isset( $field['min_max_step'] ) && ! empty( $field['min_max_step'] ) ? $field['min_max_step'] : '0,100,1',
          'field_class'       => isset( $field['class'] ) ? $field['class'] : '',
          'field_choices'     => isset( $field['choices'] ) && ! empty( $field['choices'] ) ? $field['choices'] : array(),
          'field_settings'    => isset( $field['settings'] ) && ! empty( $field['settings'] ) ? $field['settings'] : array(),
          'field_mode'        => !empty( $field['mode'] ) ? $field['mode'] : 'hex',
          'field_markup'      => !empty( $field['markup'] ) ? $field['markup'] : '12_12',
          'post_id'           => $post_id,
          'get_option'        => $get_option
        );
          
        /* option label */
        echo '<div class="format-settings">';
          
        /* don't show title with textblocks */
        if ( $_args['type'] != 'textblock' && $_args['type'] != 'unique_id' && $_args['type'] != 'section_headline' && ! empty( $field['label'] ) ) {
          
            echo '<div class="format-setting-label">';
            
                echo '<h3 class="label">' . esc_attr( $field['label'] ) . '</h3>';

                if( !empty($_args['field_desc']) ) {

                  echo '<span>' . $_args['field_desc'] . '</span>';

                }              
            
            echo '</div>';
            
        } elseif( $_args['type'] == 'section_headline' && ! empty( $field['label'] ) ) {
            
            echo '<div class="ut-section-headline-content"><h2 class="ut-section-title">' . htmlspecialchars_decode( $field['label'] ) . '</h2></div>';
            
        }
        
        /* only allow simple textarea inside a list-item due to known DOM issues with wp_editor()*/
        if ( $_args['type'] == 'textarea' ) {
            $_args['type'] = 'textarea-simple';
        }
          
        /* option body, list-item is not allowed inside another list-item */
        if ( $_args['type'] !== 'list-item' && $_args['type'] !== 'slider' ) {
            echo ot_display_by_type( $_args );
        }
        
        echo '</div>';
      
      }
        
    echo
      '</div>
      
      <div class="button-section">
        <a href="javascript:void(0);" class="option-tree-setting-edit ut-ui-button ut-ui-button-blue" title="' . __( 'Edit', 'option-tree' ) . '">' . __( 'Edit', 'option-tree' ) . '</a>
        <a href="javascript:void(0);" class="option-tree-setting-remove ut-ui-button ut-ui-button-health" title="' . __( 'Delete', 'option-tree' ) . '">' . __( 'Delete', 'option-tree' ) . '</a>
      </div>
      
    </div>';
    
  }
  
}

/**
 * Helper function to validate option ID's
 *
 * @param     string      $input The string to sanitize.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_sanitize_option_id' ) ) {

  function ot_sanitize_option_id( $input ) {
  
    return preg_replace( '/[^a-z0-9]/', '_', trim( strtolower( $input ) ) );
      
  }

}

/**
 * Helper function to validate layout ID's
 *
 * @param     string      $input The string to sanitize.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_sanitize_layout_id' ) ) {

  function ot_sanitize_layout_id( $input ) {
  
    return preg_replace( '/[^a-z0-9]/', '-', trim( strtolower( $input ) ) );
      
  }

}

/**
 * Convert choices array to string
 *
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_convert_array_to_string' ) ) {

  function ot_convert_array_to_string( $input ) {

    if ( is_array( $input ) ) {

      foreach( $input as $k => $choice ) {
        $choices[$k] = $choice['value'] . '|' . $choice['label'];
        
        if ( isset( $choice['src'] ) )
          $choices[$k].= '|' . $choice['src'];
          
      }
      
      return implode( ',', $choices );
    }
    
    return false;
  }
}

/**
 * Convert choices string to array
 *
 * @return    array
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_convert_string_to_array' ) ) {

  function ot_convert_string_to_array( $input ) {
    
    if ( '' !== $input ) {
    
      /* empty choices array */
      $choices = array();
      
      /* exlode the string into an array */
      foreach( explode( ',', $input ) as $k => $choice ) {
        
        /* if ":" is splitting the string go deeper */
        if ( preg_match( '/\|/', $choice ) ) {
          $split = explode( '|', $choice );
          $choices[$k]['value'] = trim( $split[0] );
          $choices[$k]['label'] = trim( $split[1] );
          
          /* if radio image there are three values */
          if ( isset( $split[2] ) )
            $choices[$k]['src'] = trim( $split[2] );
            
        } else {
          $choices[$k]['value'] = trim( $choice );
          $choices[$k]['label'] = trim( $choice );
        }
        
      }
      
      /* return a formated choices array */
      return $choices;
    
    }
    
    return false;
    
  }
}

/**
 * Helper function - strpos() with arrays.
 *
 * @param     string    $haystack
 * @param     array     $needles
 * @return    bool
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_strpos_array' ) ) {

  function ot_strpos_array( $haystack, $needles = array() ) {
  
    foreach( $needles as $needle ) {
      $pos = strpos( $haystack, $needle );
      if ( $pos !== false ) {
        return true;
      }
    }
    
    return false;
  }

}

/**
 * Helper function - strpos() with arrays.
 *
 * @param     string    $haystack
 * @param     array     $needles
 * @return    bool
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_array_keys_exists' ) ) {
  
  function ot_array_keys_exists( $array, $keys ) {
    
    foreach($keys as $k) {
      if ( isset($array[$k]) ) {
        return true;
      }
    }
    
    return false;
  }
  
}

/**
 * Custom stripslashes from single value or array.
 *
 * @param       mixed   $input
 * @return      mixed
 *
 * @access      public
 * @since       2.0
 */
if ( ! function_exists( 'ot_stripslashes' ) ) {

  function ot_stripslashes( $input ) {
  
    if ( is_array( $input ) ) {
    
      foreach( $input as &$val ) {
      
        if ( is_array( $val ) ) {
        
          $val = ot_stripslashes( $val );
          
        } else {
        
          $val = stripslashes( trim( $val ) );
          
        }
        
      }
      
    } else {
    
      $input = stripslashes( trim( $input ) );
      
    }
    
    return $input;
    
  }

}

/**
 * Reverse wpautop.
 *
 * @param     string    $string The string to be filtered
 * @return    string
 *
 * @access    public
 * @since     2.0.9
 */
if ( ! function_exists( 'ot_reverse_wpautop' ) ) {

  function ot_reverse_wpautop( $string = '' ) {
    
    /* return if string is empty */
    if ( trim( $string ) === '' )
      return '';
      
    /* remove all new lines & <p> tags */
    $string = str_replace( array( "\n", "<p>" ), "", $string );
  
    /* replace <br /> with \r */
    $string = str_replace( array( "<br />", "<br>", "<br/>" ), "\r", $string );
  
    /* replace </p> with \r\n */
    $string = str_replace( "</p>", "\r\n", $string );
    
    /* return clean string */
    return trim( $string );
                
  }

}

/**
 * Returns an array of elements from start to limit, inclusive.
 *
 * Occasionally zero will be some impossibly large number to 
 * the "E" power when creating a range from negative to positive.
 * This function attempts to fix that by setting that number back to "0".
 *
 * @param     string    $start First value of the sequence.
 * @param     string    $limit The sequence is ended upon reaching the limit value.
 * @param     string    $step If a step value is given, it will be used as the increment 
 *                      between elements in the sequence. step should be given as a 
 *                      positive number. If not specified, step will default to 1.
 * @return    array
 *
 * @access    public
 * @since     2.0.12
 */
function ot_range( $start, $limit, $step = 1 ) {
  
  if ( $step < 0 )
    $step = 1;
    
  $range = range( $start, $limit, $step );
  
  foreach( $range as $k => $v ) {
    if ( strpos( $v, 'E' ) ) {
      $range[$k] = 0;
    }
  }
  
  return $range;
}

/**
 * Helper function to return encoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     2.0.13
 */
function ot_encode( $value ) {

  $func = 'base64' . '_encode';
  return $func( $value );
  
}

/**
 * Helper function to return decoded strings
 *
 * @return    string
 *
 * @access    public
 * @since     2.0.13
 */
function ot_decode( $value ) {

  $func = 'base64' . '_decode';
  return $func( $value );
  
}

/**
 * Helper function to open a file
 *
 * @access    public
 * @since     2.0.13
 */
function ot_file_open( $handle, $mode ) {

  $func = 'f' . 'open';
  return @$func( $handle, $mode );
  
}

/**
 * Helper function to close a file
 *
 * @access    public
 * @since     2.0.13
 */
function ot_file_close( $handle ) {

  $func = 'f' . 'close';
  return $func( $handle );
  
}

/**
 * Helper function to write to an open file
 *
 * @access    public
 * @since     2.0.13
 */
function ot_file_write( $handle, $string ) {

  $func = 'f' . 'write';
  return $func( $handle, $string );
  
}

/**
 * Helper function to filter standard option values.
 *
 * @param     mixed     $value Saved string or array value
 * @param     mixed     $std Standard string or array value
 * @return    mixed     String or array
 *
 * @access    public
 * @since     2.0.15
 */
function ot_filter_std_value( $value = '', $std = '' ) {    
  
  $std = maybe_unserialize( $std );
  
  if ( is_array( $value ) && is_array( $std ) ) {
  
    foreach( $value as $k => $v ) {
      
      if ( '' == $value[$k] && isset( $std[$k] ) ) {
      
        $value[$k] = $std[$k];
        
      }
      
    }
  
  } else if ( '' == $value && ! empty( $std ) ) {
  
    $value = $std;
    
  }

  return $value;
  
}


/**
 * Helper function to filter standard meta option values.
 *
 * @param     mixed     $value Saved string or array value
 * @param     mixed     $std Standard string or array value
 * @return    mixed     String or array
 *
 * @access    public
 * @since     2.0.15
 */
function ot_filter_meta_std_value( $value = '', $std = '', $id , $all_meta, $type = 'text' ) {
    
    $std = maybe_unserialize( $std );
    
    if( $type != 'colorpicker' && $type != 'text' ) {
    
        if ( is_array( $value ) && is_array( $std ) ) {
  
            foreach( $value as $k => $v ) {
      
                if ( '' == $value[$k] && isset( $std[$k] ) ) {
      
                    $value[$k] = $std[$k];
        
                }
      
            }
  
        } else if ( '' == $value && ! empty( $std ) ) {
  
            $value = $std;
    
        }
    
    } else {
        
        if( ! empty( $std ) ) {
            
            // since a colorpicker can be empty we only provide the default color once
            if( '' == $value && !array_key_exists( $id, $all_meta ) ) {
                
                $value = $std;    
                
            } 
            
        }        
        
    }
    
    return $value;
  
}



/**
 * Helper function to register a WPML string
 *
 * @access    public
 * @since     2.1
 */
function ot_wpml_register_string( $id, $value ) {

  if ( function_exists( 'icl_register_string' ) ) {
      
    icl_register_string( 'Theme Options', $id, $value );
      
  }
  
}

/**
 * Helper function to unregister a WPML string
 *
 * @access    public
 * @since     2.1
 */
function ot_wpml_unregister_string( $id ) {

  if ( function_exists( 'icl_unregister_string' ) ) {
      
    icl_unregister_string( 'Theme Options', $id );
      
  }
  
}

/* End of file ot-functions-admin.php */
/* Location: ./includes/ot-functions-admin.php */