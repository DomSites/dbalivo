<?php if ( ! defined( 'OT_VERSION') ) exit( 'No direct script access allowed' );

if ( ! class_exists( 'OT_Settings' ) ) {

    class OT_Settings {
    
        /* the options array */
        private $options;
    
        /* hooks for targeting admin pages */
        private $page_hook;
    
        /* twitter feed */
        private $tweets = false;

        private $panel_list_open = false;
            
        /**
         * Constructor
         *
         * @param     array     An array of options
         * @return    void
         *
         * @access    public
         * @since     2.0
         */
        public function __construct( $args ) {
      
            $this->options = $args;
          
            /* return early if not viewing an admin page or no options */
            if ( ! is_admin() || ! is_array( $this->options ) ) {
                return false;
            }
            
            /* load everything */
            $this->hooks();
          
        }
    
        /**
         * Execute the WordPress Hooks
         *
         * @return    void
         *
         * @access    public
         * @since     2.0
         */
        public function hooks() {
          
            /* add pages & menu items */
            add_action( 'admin_menu', array( $this, 'add_page' ) );
          
            /* register sections */
            add_action( 'admin_init', array( $this, 'add_sections' ) );
          
            /* register settings */
            add_action( 'admin_init', array( $this, 'add_settings' ) );
                
            /* initialize settings */
            add_action( 'admin_init', array( $this, 'initialize_settings' ), 11 );
          
        }
        
  
        /**
         * Loads each admin page
         *
         * @return    void
         *
         * @access    public
         * @since     2.0
         */
        public function add_page() {
          
            /* loop through options */
            foreach( (array) $this->options as $option ) {
             
                /* loop through pages */
                foreach( (array) $this->get_pages( $option ) as $page ) {
              
                    /**
                      * Theme Check... stop nagging me about this kind of stuff.
                      * The damn admin pages are required for OT to function, duh!
                      */
                    $theme_check_bs   = 'add_menu_page';
                    $theme_check_bs2  = 'add_submenu_page';
              
                    /* load page in WP top level menu */
                    if ( ! isset( $page['parent_slug'] ) || empty( $page['parent_slug'] ) ) {
                    
                        $page_hook = $theme_check_bs( 
                            $page['page_title'], 
                            $page['menu_title'], 
                            $page['capability'], 
                            $page['menu_slug'], 
                            array( $this, 'display_page' ), 
                            $page['icon_url'],
                            $page['position'] 
                        );
                
                    /* load page in WP sub menu */
                    } else {
                    
                        $page_hook = $theme_check_bs2( 
                            $page['parent_slug'], 
                            $page['page_title'], 
                            $page['menu_title'], 
                            $page['capability'], 
                            $page['menu_slug'], 
                            array( $this, 'display_page' ) 
                        );
              
                    }
              
                    /* only load if not a hidden page */
                    if ( ! isset( $page['hidden_page'] ) ) {
                  
                        /* associate $page_hook with page id */
                        $this->page_hook[$page['id']] = $page_hook;
                  
                    }
              
                }
          
            }
          
            return false;
        
        }
    
     
    /**
     * Create Time Ago for Twitter Feed
     *
     * @return    void
     *
     * @access    public
     * @since     4.1
     */ 
     
    public function twitter_time_ago( $tweetdate, $currentdate ) {
        
        $timeCalc = $currentdate - $tweetdate;
		
		if ( $timeCalc > ( 60*60*24 ) ) { 

            return round( $timeCalc/60/60/24 ) . esc_html__(" days ago" , 'unitedthemes' ); 
        
        } else if ( $timeCalc > ( 60*60 ) ) { 
            
            return round( $timeCalc/60/60 ) . esc_html__(" hours ago" , 'unitedthemes' ); 
        
        } else if ( $timeCalc > 60 ) { 

            return round( $timeCalc/60 ) . esc_html__(" minutes ago" , 'unitedthemes' ); 
        
        } else if ( $timeCalc > 0 ) { 
            
            return esc_html__(" seconds ago" , 'unitedthemes' ); 
            
        }

    
    }    
    
    
    /**
     * Format Twitter Feeds
     *
     * @return    void
     *
     * @access    public
     * @since     4.1
     */ 
    
    public function format_tweet( $text ) {
		
        $text = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $text);
		$text = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $text);
		$text = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $text);
		
        /* hashtags */
        $text = preg_replace("/#(\w+)/", "<a href=\"https://twitter.com/search?q=%23\\1\" target=\"_blank\">#\\1</a>", $text);
		
        return $text;
        
	}
    
    /**
     * Display Twitter Feeds
     *
     * @return    void
     *
     * @access    public
     * @since     4.1
     */ 
     
    public function display_tweets() {
        
        $tweets = array();
        
        /* check for transient */
        if ( false === ( get_transient('ut_panel_twitter_feeds') ) ) {
            
            $tweets = wp_remote_retrieve_body( wp_remote_get('http://tweets.unitedthemes.com/') );
            
            if( !empty( $tweets ) && !isset( $tweets->errors[0]->code ) ) {
            
                set_transient( 'ut_panel_twitter_feeds', $tweets, 60 * 60 * 24 * 7 );
            
            }
        
        } else {
            
            $tweets = get_transient('ut_panel_twitter_feeds');
        
        }
        
        /* no tweets */
        if( empty( $tweets ) ) {
            
            return;
            
        }
        
        $tweets      = json_decode( $tweets);
        $currentdate = strtotime( date('Y-m-d H:i:s') ); 
        
        echo '<div id="ut-twitter-timeline">';
            
            $counter = 0;

            echo '<ul>';
            
            foreach( $tweets as $tweet ) {
                
                /* leave after 3 tweets */
                if( $counter == 3 ) {
                    break;
                }
                
                echo '<li class="ut-single-tweet">';    
                    
                    $date = new DateTime( $tweet->created_at );
                    $date = strtotime($date->format('Y-m-d H:i:s'));
                    
                    if( !empty( $tweet->entities->media ) && is_array( $tweet->entities->media ) ) {
                        
                        foreach( $tweet->entities->media as $media ) {
                            
                            echo '<img class="ut-tweet-image" alt="' . esc_attr( $tweet->user->screen_name ) . '" src="' . esc_url( $media->media_url_https ) . '">';    
                            
                        }
                        
                    }
                    
                    echo '<div class="ut-tweet-icon">';
                        
                        echo '<i class="fa fa-twitter" aria-hidden="true"></i>';
                            
                    echo '</div>';
                    
                    echo '<div class="ut-tweet-content">';
                    
                        echo '<span class="ut-tweet-text">' . $this->format_tweet( $tweet->text ) . '</span>';
                        echo '<span class="ut-tweet-time">' . $this->twitter_time_ago( $date, $currentdate ) . '</span>';
                    
                    echo '</div>';
                                    
                echo '</li>';
                                
                $counter++;
                
            }
            
            echo '</ul>';
            
            
            
        echo '</div>';
        
    
    }
    
    public function display_loader( $section_ID ) {
        
        ob_start(); ?>
            
            <div id="<?php echo $section_ID; ?>_loader" class="ut-panel-loader-wrap">
            
                <div class="ut-panel-loader">
                    
                    <div class="sk-cube-grid-wrap">
                                    
                        <div class="sk-cube-grid">
                            <div class="sk-cube sk-cube1"></div>
                            <div class="sk-cube sk-cube2"></div>
                            <div class="sk-cube sk-cube3"></div>
                            <div class="sk-cube sk-cube4"></div>
                            <div class="sk-cube sk-cube5"></div>
                            <div class="sk-cube sk-cube6"></div>
                            <div class="sk-cube sk-cube7"></div>
                            <div class="sk-cube sk-cube8"></div>
                            <div class="sk-cube sk-cube9"></div>
                        </div>
                    
                    </div>
            
                </div>
            
            </div>
        
        <?php
        
        echo ob_get_clean();
        
    }
        
    /** 
     * Loads the content for each page
     *
     * @return    string
     *
     * @access    public
     * @since     2.0
     */
    public function display_page() {
        
        /* current screen */
        $screen = get_current_screen();
        
        /* theme options restore defaults */
        $nonce = wp_create_nonce( 'ut-restore-defaults-nonce' );
        
        /* get current tab */        
        $current_tab = isset( $_COOKIE['ut_open_panel_section'] ) ? $_COOKIE['ut_open_panel_section'] : 'ut_general_settings' ;
        
        $current_sub_tab = false;
        
        /* current user */
        $user_id      = get_current_user_id();
        $current_user = wp_get_current_user();
        $avatar       = get_avatar( $user_id, 160 );  
        
        /* loop through settings */
        foreach( (array) $this->options as $option ) {
  
            /* loop through pages */
            foreach( (array) $this->get_pages( $option ) as $page ) {
          
                /* verify page */
                if ( ! isset( $page['hidden_page'] ) && $screen->id == $this->page_hook[$page['id']] ) { ?>
                
                    <?php echo ot_alert_message( $page ); ?>
                        
                    <?php settings_errors( 'option-tree' ); ?>
                    
                    <div id="ut-admin-wrap" class="clearfix">
                        
                        <div id="ut-ui-admin-header" class="clearfix">
                            
                            <div class="grid-10 medium-grid-15 tablet-grid-33 hide-on-mobile grid-parent">
                                
                                <div class="ut-admin-branding">
                                    <a href="http://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                                </div>
                                                        
                            </div>
                            
                            <div class="grid-90 medium-grid-85 tablet-grid-66 mobile-grid-100 grid-parent">
                
                                <div class="ut-admin-header-title">
                        
                                    <?php $theme = wp_get_theme(); ?>
                        
                                    <h1><?php esc_html_e( 'Theme Options.', 'unite-admin' ); ?><br />
                                    <button id="option-tree-settings-api-submit" class="ut-ui-button save-settings"><?php esc_html_e( 'Save Changes','unitedthemes' ); ?></button>
                                    <!-- <button data-nonce="<?php echo $nonce; ?>" id="option-tree-settings-api-restore" class="ut-ui-button ut-ui-button-yellow load-default-settings"><?php esc_html_e( 'Load Theme Defaults','unitedthemes' ); ?></button> -->
                                    </h1>
                    
                                </div>
                
                            </div>
                            
                            <ul id="ut-admin-outer-nav" class="ui-tabs-nav grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
                                
                                <?php foreach( (array) $page['sections'] as $section ) : 
                            
                                    $active_class = ''; 
                                    
                                    if( $section['id'] === $current_tab ) {
                                        
                                        $active_class    = 'ui-state-active ut-panel-loaded';
                                        $current_sub_tab = isset( $_COOKIE['ut_open_panel_subsection'] ) ? $_COOKIE['ut_open_panel_subsection'] : $section['def_section'];
                                    
                                    } ?>
                            
                                    <li class="<?php echo esc_attr( $active_class ); ?>" id="tab_<?php echo $section['id']; ?>">
                                
                                        <a href="#section_<?php echo $section['id']; ?>" data-section="<?php echo esc_attr( $section['id'] ); ?>" data-subsection="<?php echo esc_attr( $section['def_section'] ); ?>">
                            
                                            <?php if( !empty($section['icon']) ) : ?>
                                            
                                                <span class="ut-icon-bg"><img class="ut-panel-png-icon" src="<?php echo THEME_WEB_ROOT; ?>/admin/assets/images/panel_icons/<?php echo $section['icon']; ?>"></span>
                                            
                                            <?php endif; ?>
                                            
                                            <span class="icon-desc"><?php echo $section['title']; ?></span>
                            
                                        </a>
                            
                                    </li>
                            
                                <?php endforeach; ?>
                  
                            </ul>
                        
                        </div>
                            
                            <div class="ut-dashboard-nav-bg grid-10 hide-on-medium hide-on-tablet hide-on-mobile grid-parent">
                                
                                <ul class="ut-dashboard-nav">
                                
                                    <li>
                                        <div class="ut-dashboard-avatar">
                                            <?php echo $avatar; ?>
                                        </div>
                                        
                                        <span class="ut-hello-admin">
                                            <?php echo sprintf( __('Howdy, %1$s', 'unite'), $current_user->display_name ); ?>
                                        </span>                                            
                                    </li>

                                    <li>
                                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-welcome-page"><div class="ut-dashboard-home"><img alt="Dashboard" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/dashboard.png"></div><span>Dashboard</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info"><div class="ut-dashboard-server-health"><img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png"></div><span>Server Health</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_demo_importer_page', 'unite-demo-importer' ); ?>"><div class="ut-dashboard-demo-importer"><img alt="Demo Installer" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/demo-importer.png"></div><span>Demo Installer</span></a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-video-tutorials"><div class="ut-dashboard-video-tutorials"><img alt="Video Tutorials" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/video-tutorials.png"></div><span>Video Tutorials</span></a>
                                    </li>
                                    
                                    <li>
                                        <a target="_blank" href="http://helpdesk.unitedthemes.com/"><div class="ut-theme-support"><img alt="Theme Support" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-support.png"></div><span>Theme Support</span></a>
                                    </li>
                                
                                </ul>
                        
                            </div>
                            
                            <div class="ut-option-holder grid-90 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <form action="options.php" method="post" id="option-tree-settings-api">
      
                                <?php settings_fields( $option['id'] ); ?>
                    
                                <!-- field to store loaded panels - will be used on saving later on -->
                                <input id="ut-store-panels" name="ut_loaded_panels" value="" type="hidden">
                            
                                <?php $this->do_settings_sections( $_GET['page'], $current_sub_tab ); ?>
                            
                            </form>
                            
                            <div class="grid-20 grid-parent hide-on-medium hide-on-tablet hide-on-mobile">
                                
                                <div class="ut-tweets">
                                
                                <h3 class="ut-single-option-title"><?php esc_html_e( 'Latest News', 'unite-admin' ); ?></h3>
                                
                                <div class="ut-tweet-img">
                                
                                <div class="ut-tweet-avatar-holder"><div class="ut-tweet-avatar"></div></div>
                                
                                </div>
                                             
                                <?php echo $this->display_tweets(); ?>
                                
                                 </div>
                            
                            </div>
                        
                        </div>
                  
                    <div class="clear"></div>
                    
                    <div id="ut-ajax-editor-blueprint" class="ut-hide">
                        
                        <?php 
                            
                            /* will be used as reference for ajax requests */
                            wp_editor( '', 'ut-hidden-editor' ); 
                        
                        ?>
                    
                    </div>
                    
                    <?php 
                    
                    if( isset( $_GET['export'] ) ) {
                    
                        echo ot_type_export_data(); 
                    
                    }
                    
                    ?>
                    
                </div><!-- end #ut-admin-wrap --> 
              
                <?php 
          
                }
        
            }
      
        }
      
        return false;
      
    }
    
    /**
     * Adds sections to the page
     *
     * @return    void
     *
     * @access    public
     * @since     2.0
     */
    public function add_sections() {
      
      /* loop through options */
      foreach( (array) $this->options as $option ) {
          
        /* loop through pages */
        foreach( (array) $this->get_pages( $option ) as $page ) {
          
          /* loop through page sections */
          foreach( (array) $this->get_sections( $page ) as $section ) {
            
            /* add each section */
            add_settings_section( 
              $section['id'], 
              $section['title'], 
              array( $this, 'display_section' ), 
              $page['menu_slug'] 
            );
            
          }
  
        }
        
      }
      
      return false;
    }
    
    /**
     * Callback for add_settings_section()
     *
     * @return    string
     *
     * @access    public
     * @since     2.0
     */
    public function display_section() {
      /* currently pointless */
    }
    
    /**
     * Add settings the the page
     *
     * @return    void
     *
     * @access    public
     * @since     2.0
     */
    public function add_settings() {
      
      /* loop through options */
      foreach( (array) $this->options as $option ) {
          
        register_setting( $option['id'], $option['id'], array ( $this, 'sanitize_callback' ) );
          
        /* loop through pages */
        foreach( (array) $this->get_pages( $option ) as $page ) {
          
          /* loop through page settings */
          foreach( (array) $this->get_the_settings( $page ) as $setting ) {
            
            /* skip if no setting ID */
            if ( ! isset( $setting['id'] ) )
              continue;
              
            /* add get_option param to the array */
            $setting['get_option']  = $option['id'];
            
            /* add each setting */
            add_settings_field( 
              $setting['id'], 
              $setting['label'], 
              array( $this, 'display_setting' ), 
              $page['menu_slug'],
              $setting['section'],
              $setting
            );
  
          }
  
        }
        
      }
      
      return false;
    }
    
    /**
     * Callback for add_settings_field() to build each setting by type
     *
     * @param     array     Setting object array
     * @return    string
     *
     * @access    public
     * @since     2.0
     */
    public function display_setting( $args = array() ) {
      extract( $args );
      
      /* get current saved data */
      $options = get_option( $get_option, false );
      
      // Set field value
      $field_value = isset( $options[$id] ) ? $options[$id] : '';
      
      /* set standard value */
      if ( isset( $std ) ) {  
        $field_value = ot_filter_std_value( $field_value, $std );
      }

      /* build the arguments array */
      $_args = array(
        'type'              => $type,
        'field_id'          => $id,
        'field_name'        => $get_option . '[' . $id . ']',
        'field_toplevel'    => isset( $toplevel ) && $toplevel ? $toplevel : '',
        'field_value'       => $field_value,
        'field_label'       => isset( $label ) ? $label : '',
        'field_desc'        => isset( $desc ) ? $desc : '',
        'field_htmldesc'    => isset( $htmldesc ) ? $htmldesc : '',
        'field_std'         => isset( $std ) ? $std : '',
        'field_rows'        => isset( $rows ) && ! empty( $rows ) ? $rows : 15,
        'field_post_type'   => isset( $post_type ) && ! empty( $post_type ) ? $post_type : 'post',
        'field_taxonomy'    => isset( $taxonomy ) && ! empty( $taxonomy ) ? $taxonomy : 'category',
        'field_min_max_step'=> isset( $min_max_step ) && ! empty( $min_max_step ) ? $min_max_step : '0,100,1',
        'field_class'       => isset( $class ) ? $class : '',
        'field_choices'     => isset( $choices ) && ! empty( $choices ) ? $choices : array(),
        'field_settings'    => isset( $settings ) && ! empty( $settings ) ? $settings : array(),
        'field_mode'        => !empty( $mode ) ? $mode : 'hex',
        'field_markup'      => !empty( $markup ) ? $markup : '12_12',
        'field_list_title'  => isset( $list_title ) && !$list_title ? $list_title : true,
        'post_id'           => ot_get_media_post_ID(),
        'get_option'        => $get_option,
      );
      
      /* get the option HTML */
      echo ot_display_by_type( $_args );
    }
    
    /**
     * Sets the option standards if nothing yet exists.
     *
     * @return    void
     *
     * @access    public
     * @since     2.0
     */
    public function initialize_settings() {
  
      /* loop through options */
      foreach( (array) $this->options as $option ) {
        
        /* skip if option is already set */
        if ( isset( $option['id'] ) && get_option( $option['id'], false ) ) {
          return false;
        }
        
        $defaults = array();
        
        /* loop through pages */
        foreach( (array) $this->get_pages( $option ) as $page ) {
            
          /* loop through page settings */
          foreach( (array) $this->get_the_settings( $page ) as $setting ) {
            
            if ( isset( $setting['std'] ) ) {
              
              $defaults[$setting['id']] = ot_validate_setting( $setting['std'], $setting['type'], $setting['id'] );

            }
  
          }
        
        }
          
        update_option( $option['id'], $defaults );        
        
      }
  
      return false;
    }
    
    
    
    public function panels_options_to_load( $panels_to_load ) {
        
        /* default settings array */
        $default_settings = _ut_theme_options();
        
        /* get stored options */
        $stored_options = get_option('option_tree');
        
        /* array to store panel based options */
        $return_option_values = array();
        
        foreach( $default_settings['settings'] as $setting ) {
            
            if( in_array( $setting['section'], $panels_to_load ) ) {
                
                if( !empty( $stored_options ) && is_array( $stored_options ) ) { 
                                                           
                    foreach( $stored_options as $okey => $value ) {
                        
                        if( ( $okey == $setting['id'] ) ) {
                                        
                            $return_option_values[$okey] = $value;
                            continue; 
                        
                        }
                        
                    }
                
                }
                
            
            }
            
            
        }
        
        return $return_option_values;
    
    }
     
    public function panels_to_load( $loaded_panels ) {
                
        $panels_to_load = array();    
        
        /* default settings array */
        $sections = _ut_theme_options();
        $sections = $sections['sections'];
        
        foreach( $sections as $section ) {
            
            if( isset( $section['id'] ) && is_array( $loaded_panels ) && !in_array( $section['id'], $loaded_panels ) ) {
                
                array_push( $panels_to_load, $section['id'] );
                
            }
        
        }
        
        return $panels_to_load;
        
    }      
    
    /**
     * Sanitize callback for register_setting()
     *
     * @return    string
     *
     * @access    public
     * @since     2.0
     */     
    public function sanitize_callback( $input ) {
           
      /* loaded panels */
      $loaded_panels  = isset( $_POST['ut_loaded_panels'] ) ? explode( ',' , $_POST['ut_loaded_panels'] ) : '';
      $panels_to_load = $this->panels_to_load( $loaded_panels );
      
      $input = array_merge( $input, $this->panels_options_to_load( $panels_to_load ) );
            
      /* get the defaults */
      $current_settings = _ut_theme_options();
              
      /* loop through options */
      foreach( (array) $this->options as $option ) {
            
        /* loop through pages */
        foreach( (array) $this->get_pages( $option ) as $page ) {
                        
          /* loop through page settings */
          foreach( (array) $this->get_the_settings( $page ) as $setting ) {
            
            /* verify setting has a type & value */
            if ( isset( $setting['type'] ) && isset( $input[$setting['id']] ) ) {
              
              $current_options = get_option( $option['id'] );
                
              /* validate setting */
              if ( is_array( $input[$setting['id']] ) && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {

                /* required title setting */
                $required_setting = array(
                  array(
                    'id'        => 'title',
                    'label'     => __( 'Title', 'option-tree' ),
                    'desc'      => '',
                    'std'       => '',
                    'type'      => 'text',
                    'rows'      => '',
                    'class'     => 'option-tree-setting-title',
                    'post_type' => '',
                    'choices'   => array()
                  )
                );
                
                /* get the settings array */
                $settings = isset( $_POST[$setting['id'] . '_settings_array'] ) ? unserialize( ot_decode( $_POST[$setting['id'] . '_settings_array'] ) ) : array();
                
                /* settings are empty for some odd ass reason get the defaults */
                if ( empty( $settings ) ) {
                    $settings = 'slider' == $setting['type'] ? ot_slider_settings( $setting['id'] ) : ot_list_item_settings( $setting['id'] );
                }
                
                /* merge the two settings array */
                $settings = array_merge( $required_setting, $settings );
                
                /* create an empty WPML id array */
                $wpml_ids = array();
                
                foreach( $input[$setting['id']] as $k => $setting_array ) {

                  foreach( $settings as $sub_setting ) {
                    
                    /* setup the WPML ID */
                    $wpml_id = $setting['id'] . '_' . $sub_setting['id'] . '_' . $k;
                    
                    /* add id to array */
                    $wpml_ids[] = $wpml_id;
                      
                    /* verify sub setting has a type & value */
                    if ( isset( $sub_setting['type'] ) && isset( $input[$setting['id']][$k][$sub_setting['id']] ) ) {

                      /* validate setting */
                      $input[$setting['id']][$k][$sub_setting['id']] = ot_validate_setting( $input[$setting['id']][$k][$sub_setting['id']], $sub_setting['type'], $sub_setting['id'], $wpml_id );
                      
                    }
                    
                  }
                
                }

              } else {
                
                $input[$setting['id']] = ot_validate_setting( $input[$setting['id']], $setting['type'], $setting['id'], $setting['id'] );
                 
              }
            
            }
            
            /* unregister WPML strings that were deleted from lists and sliders */
            if ( isset( $current_settings['settings'] ) && isset( $setting['type'] ) && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
              
              if ( ! isset( $wpml_ids ) )
                $wpml_ids = array();
                
              foreach( $current_settings['settings'] as $check_setting ) {
              
                if ( $setting['id'] == $check_setting['id'] && ! empty( $current_options[$setting['id']] ) ) {
                
                  foreach( $current_options[$setting['id']] as $key => $value ) {
                
                    foreach( $value as $ckey => $cvalue ) {
                      
                      $id = $setting['id'] . '_' . $ckey . '_' . $key;
                      
                      if ( ! in_array( $id, $wpml_ids ) ) {
                      
                        ot_wpml_unregister_string( $id );
                        
                      }
                      
                    }
                  
                  }
                
                }
                
              }
              
            }
      
          }
        
        }
        
      }
      
      return $input;
      
    }
  
    /**
     * Helper function to get the pages array for an option
     *
     * @param     array     Option array
     * @return    mixed
     *
     * @access    public
     * @since     2.0
     */
    public function get_pages( $option = array() ) {
      
      if ( empty( $option ) )
        return false;
          
      /* check for pages */
      if ( isset( $option['pages'] ) && ! empty( $option['pages'] ) ) {
        
        /* return pages array */
        return $option['pages'];
        
      }
      
      return false;
    }
    
    /**
     * Helper function to get the sections array for a page
     *
     * @param     array     Page array
     * @return    mixed
     *
     * @access    public
     * @since     2.0
     */
    public function get_sections( $page = array() ) {
      
      if ( empty( $page ) )
        return false;
          
      /* check for sections */
      if ( isset( $page['sections'] ) && ! empty( $page['sections'] ) ) {
        
        /* return sections array */
        return $page['sections'];
        
      }
      
      return false;
    }
    
    /**
     * Helper function to get the settings array for a page
     *
     * @param     array     Page array
     * @return    mixed
     *
     * @access    public
     * @since     2.0
     */
    public function get_the_settings( $page = array() ) {
      
      if ( empty( $page ) )
        return false;
          
      /* check for settings */
      if ( isset( $page['settings'] ) && ! empty( $page['settings'] ) ) {
        
        /* return settings array */
        return $page['settings'];
        
      }
      
      return false;
    }
    
    /**
     * Prints out all settings sections added to a particular settings page
     *
     * @global    $wp_settings_sections   Storage array of all settings sections added to admin pages
     * @global    $wp_settings_fields     Storage array of settings fields and info about their pages/sections
     *
     * @param     string    The slug name of the page whos settings sections you want to output
     * @return    string
     *
     * @access    public
     * @since     2.0
     */
    public function do_settings_sections( $page, $current_sub_tab = false ) {
              
        global $wp_settings_sections, $wp_settings_fields;
  
        if ( ! isset( $wp_settings_sections ) || ! isset( $wp_settings_sections[$page] ) ) {
            return false;
        }
        
        /* cookie abrufen oder general settings laden */
        $current_tab = isset( $_COOKIE['ut_open_panel_section'] ) ? $_COOKIE['ut_open_panel_section'] : 'ut_general_settings' ;
                
        foreach ( (array) $wp_settings_sections[$page] as $section ) {
        
            if ( ! isset( $section['id'] ) ) {
                continue;
            }
                 
            $active_section = $section['id'] == $current_tab ? 'ut-panel-loaded ut-show' : 'ut-hide';
                          
            echo '<div id="section_' . $section['id'] . '" class="ut-options-outer-panel-group ' . $active_section .'">';
                
                echo '<div class="ut-options-outer-panel-group-append">';
            
                    call_user_func( $section['callback'], $section );
                
                    if ( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[$page] ) || ! isset( $wp_settings_fields[$page][$section['id']] ) ) {
                        continue;
                    }
                            
                    echo '<div class="grid-15 medium-grid-30 tablet-grid-33 grid-parent mobile-grid-100">';
                        
                        echo '<ul class="slicknav ut-admin-inner-nav clearfix">';
                            
                            echo '<li class="ut-admin-inner-nav-title"><span>' . esc_html__( 'Menu', 'unitedthemes' )  . '</span></li>';
                            
                            foreach( _ut_get_theme_options_submenu( $section['id'] ) as $submenu ) {
                                
                                $active_sub_section = $submenu['id'] == $current_sub_tab ? 'ui-state-active' : '';                                
                                                                
                                /* third level item */
                                if( isset( $submenu['subsections'] ) ) {

                                    echo '<li id="tab_' . $submenu['id'] . '" class="' . $active_sub_section . '"><div ' . ( isset( $submenu['def_section'] ) ? 'data-default-section="' . $submenu['def_section'] . '"' : '' ) . ' data-page="' . $page . '" data-section="' . ( isset( $submenu['def_section'] ) ? $submenu['def_section'] : $submenu['id'] ) . '" data-href="#section_' . $submenu['id'] . '" class="ut-slicknav-item-placeholder">' . $submenu['label'] . '<span class="slicknav_arrow"><i class="fa fa-angle-down"></i></span></div>';
                                
                                        echo '<ul aria-hidden="true" style="display:none;">';
                                        
                                            foreach( $submenu['subsections'] as $subsection ) {
                                                
                                                echo '<li id="tab_' . $subsection['id'] . '"><a data-page="' . $page . '" data-section="' . $subsection['id'] . '" href="#section_' . $subsection['id'] . '">' . $subsection['label'] . '</a></li>';
                                            
                                            }
                                        
                                        echo '</ul>';
                                    
                                    echo '</li>';
                                
                                } else {
                                
                                    echo '<li id="tab_' . $submenu['id'] . '" class="' . $active_sub_section . '"><a data-page="' . $page . '" data-section="' . $submenu['id'] . '" href="#section_' . $submenu['id'] . '">' . $submenu['label'] . '</a></li>';                                                                
                                
                                }
                                
                            }
                      
                            echo '<li class="ut-li-button"><button class="ut-ui-button save-settings">' . esc_html__( 'Save Changes','unitedthemes' ) .'</button></li>';
                        
                        echo '</ul>';
                        
                    echo '</div>';
                    
                    /* all other section options are getting loaded via ajax */
                    if( $section['id'] == $current_tab ) {
                        
                        /* start sub panel by united themes */
                        foreach( _ut_get_theme_options_submenu( $section['id'] ) as $submenu ) {
                        
                            $this->do_settings_subsections( $submenu, $page, $section, $current_sub_tab );
                            
                            if( isset( $submenu['subsections'] ) ) {
                            
                                foreach( $submenu['subsections'] as $subsection ) {
                                    
                                    $this->do_settings_subsections( $subsection, $page, $section, $current_sub_tab );        
                                    
                                }
                            
                            }
                        
                        }
                        /* end sub panel by united themes */
                        
                    }
                    /* start section placeholder with loader */
                    echo '<div id="' . $section['id'] . '_placeholder" class="ut-options-inner-panel-placeholder ut-hide">'; 
                        
                        echo '<div class="ut-panel-options-wrap grid-65 medium-grid-70 tablet-grid-66 mobile-grid-100 grid-parent">';
                            
                            $this->display_loader( $section['id'] );                        
                            
                        echo '</div>';
                        
                    echo '</div>';
                    /* end section placeholder with loader */
                    
                        
                echo '</div>'; 
                          
            echo '</div>';
        
        }
      
    }

    public function do_settings_subsections( $field, $page, $section, $subsection = false ) {
             
         $active = ( $subsection == $field['id'] ) ? 'ut-show' : 'ut-hide';
                             
         echo '<div id="section_' . $field['id'] . '" class="ut-options-inner-panel-group ' . $active . '">';
            
            echo '<div class="ut-panel-options-wrap grid-65 medium-grid-70 tablet-grid-66 mobile-grid-100 grid-parent">';
            
                $this->do_settings_fields( $page, $section['id'] , $field['id'] );
                
                if( $this->panel_list_open ) {
                    
                    echo '</ul>';
                    $this->panel_list_open = false;
                
                }
                                            
            echo '</div>';
            
         echo '</div>';
    
    }
    
    public function ajax_restore_theme_defaults() {
        
        
        
        
        
        //ut_load_layout_into_ot();
        
        die();
        
    }        
        
    public function ajax_do_settings_subsections() {
        
        global $wp_settings_sections, $wp_settings_fields;
        
        $page = 'ut_theme_options';
                
        $section_id = isset( $_POST['section'] ) ? $_POST['section'] : '';
                        
        if ( ! isset( $wp_settings_sections ) || ! isset( $wp_settings_sections[$page] ) ) {
            return false;
        }
        
        foreach ( (array) $wp_settings_sections[$page] as $section ) {
                                        
            if ( $section['id'] != $section_id ) {
                continue;
            }
                                                
            call_user_func( $section['callback'], $section );
            
            if ( ! isset( $wp_settings_fields ) || ! isset( $wp_settings_fields[$page] ) || ! isset( $wp_settings_fields[$page][$section['id']] ) ) {
                continue;
            }
            
            /* start sub panel by united themes */
            foreach( _ut_get_theme_options_submenu( $section['id'] ) as $submenu ) {
            
                $this->do_settings_subsections( $submenu, $page, $section );
                
                if( isset( $submenu['subsections'] ) ) {
                            
                    foreach( $submenu['subsections'] as $subsection ) {
                        
                        $this->do_settings_subsections( $subsection, $page, $section );        
                        
                    }
                
                }                        
            
            }
            /* end sub panel by united themes */
        
        }
                        
        exit;
    
    }
    
    public function do_before_settings_field( $type = '12_12') {
    
        if( $type == '12_12' ) {
            
            echo '<div class="grid-50 tablet-grid-100 mobile-grid-100">';    
        
        }
        
        if( $type == '1_1' ) {
            
            echo '<div class="grid-100 tablet-grid-100 mobile-grid-100 ut-panel-description-full">';
            
        }
            
    
    }    
    
    public function do_after_settings_field() {
        
        echo '</div>';
    
    }
    
    
    /**
     * Print out the settings fields for a particular settings section
     *
     * @global    $wp_settings_fields Storage array of settings fields and their pages/sections
     *
     * @param     string    $page Slug title of the admin page who's settings fields you want to show.
     * @param     string    $section Slug title of the settings section who's fields you want to show.
     * @return    string
     *
     * @access    public
     * @since     2.0
     */
    public function do_settings_fields( $page, $section, $subid ) {
      
        global $wp_settings_fields;
    
        if ( !isset($wp_settings_fields) || !isset($wp_settings_fields[$page]) || !isset($wp_settings_fields[$page][$section]) )  {
            return;
        }
        
        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
        
            $markup = !empty( $field['args']['markup'] ) ? $field['args']['markup'] : '12_12';
            
            if( isset($field['args']['subsection']) && $field['args']['subsection'] == $subid ) {
                
                
                /* field dependency */
                $dependency = !empty( $field['args']['required'] ) ? $field['args']['required'] : '';
                
                if( $field['args']['type'] == 'panel_headline' ) {
                    
                    echo '<div id="setting_' . $field['id'] . '" class="ut-panel-headline" ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';    
                    
                        call_user_func( $field['callback'], $field['args'] );
                    
                    echo '</div>';
                    
                } elseif( $field['args']['type'] == 'section_headline' ) {
                    
                    if( $this->panel_list_open ) {
                    
                        echo '</ul>';
                        $this->panel_list_open = false;
                    
                    }
                    
                    echo '<div id="setting_' . $field['id'] . '" class="ut-section-headline" ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';    
                    
                        call_user_func( $field['callback'], $field['args'] );
                    
                    echo '</div>';
                    
                } else if( $field['args']['type'] == 'sub_section_headline' ) {
                    
                    if( $this->panel_list_open ) {
                    
                        echo '</ul>';
                        $this->panel_list_open = false;
                    
                    }
                    
                    echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="ut-section-sub-headline" ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';    
                    
                        call_user_func( $field['callback'], $field['args'] );
                    
                    echo '</div>';
                    
                } else if( $field['args']['type'] == 'section_headline_info' ) {
                    
                    echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="ut-panel-infoheadline" ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';    
                    
                        call_user_func( $field['callback'], $field['args'] );
                    
                    echo '</div>';
                    
                } else if( $field['args']['type'] == 'textblock' ) {
                    
                    echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="grid-100 grid-parent" ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';
                        
                        echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';
                        
                            echo '<h3 class="ut-single-option-title">' . $field['title'] . '</h3>';
                        
                        echo '</div>';
                        
                        echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';
                            
                            /* verify a description */
                            $has_desc = !empty($field['args']['desc']) ? true : false;
                                        
                            /* description */
                            echo $has_desc ? '<div class="ut-panel-description">' . htmlspecialchars_decode( $field['args']['desc'] ) . '</div>' : '';
                        
                        echo '</div>';
                    
                    echo '</div>';
                    
                } else {
                    
                    if( !$this->panel_list_open ) {
                        
                        echo '<ul class="ut-panel-list">';
                        
                        $this->panel_list_open = true;
                        
                    }
                    
                    echo '<li ' . ut_create_dependency( $dependency, 'option_tree' ) . '>';
                        
                        echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="grid-100 grid-parent ut-panel-section">';
                            
                            echo '<div class="grid-100 tablet-grid-100 mobile-grid-100">';
                            
                                echo '<h3 class="ut-single-option-title">' . $field['title'] . '</h3>';
                            
                            echo '</div>';
                            
                            /* verify a description */
                            $has_desc = !empty($field['args']['desc']) ? true : false;
                            
                            if( $has_desc ) {
                            
                                /* setting description */
                                $this->do_before_settings_field( $markup );
                                
                                    /* description */
                                    echo '<div class="ut-panel-description">' . htmlspecialchars_decode( $field['args']['desc'] ) . '</div>';
                                
                                $this->do_after_settings_field();
                                /* end description */
                            
                            }
                            
                            /* setting display */
                            $this->do_before_settings_field( $markup );
                                
                                call_user_func( $field['callback'], $field['args'] );
                            
                            $this->do_after_settings_field();                    
                            /* end setting display */
                            
                            
                        echo '</div>';
                    
                    
                     echo '</li>';
                     
                    
                
                }
                
            }
            
        }
      
    }
    
    public function do_settings_fields_alt( $page, $section ) {
    
        global $wp_settings_fields;
    
        if ( !isset($wp_settings_fields) || !isset($wp_settings_fields[$page]) || !isset($wp_settings_fields[$page][$section]) ) {
            return;        
        }
        
        foreach ( (array) $wp_settings_fields[$page][$section] as $field ) {
            
            echo '<div id="setting_' . esc_attr( $field['id'] ) . '" class="format-settings">';
              
              echo '<div class="format-setting-wrap">';
              
                if ( $field['args']['type'] != 'textblock' && $field['args']['type'] != 'unique_id' && ! empty( $field['title'] ) ) {
                
                  echo '<div class="format-setting-label">';
              
                    echo '<h3 class="label">' . $field['title'] . '</h3>';     
                
                  echo '</div>';
                
                }
          
                call_user_func( $field['callback'], $field['args'] );
              
              echo '</div>';
        
            echo '</div>';
            
        }
      
    }
    
  }

}

/**
 * This method instantiates the settings class & builds the UI.
 *
 * @uses     OT_Settings()
 *
 * @param    array    Array of arguments to create settings
 * @return   void
 *
 * @access   public
 * @since    2.0
 */
if ( ! function_exists( 'ot_register_settings' ) ) {

    function ot_register_settings( $args ) {
    
        if ( ! $args ) {
          return;
        }
      
        $ot_settings = new OT_Settings( $args );
    
        add_action( 'wp_ajax_load_theme_panel_section'    , array( $ot_settings, 'ajax_do_settings_subsections' ) );
        add_action( 'wp_ajax_restore_theme_options'    , array( $ot_settings, 'ajax_restore_theme_defaults' ) );
      
    }

}

/* End of file ot-settings-api.php */
/* Location: ./includes/ot-settings-api.php */