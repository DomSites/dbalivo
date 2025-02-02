<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

class UT_Theme_Info {
    
    /**
     * Theme Info option key, and sidebar admin page slug
     * @var string
     */
    private $key = 'unite-theme-info';
    
    /**
     * Theme Info Title
     * @var string
     */
    protected $title = '';
    
    /**
     * Theme Info
     * @var string
     */
    protected $theme_info = ''; 
    
    /**
     * Configuration Strings
     * @var string
     */
     
    private $memory              = false;  
    private $post_max_size       = false; 
    private $max_input_vars      = false;
    private $max_execution       = false;
    private $upload_max_filesize = false;
    private $memory_limit        = false;          
    private $knowledgebase       = '';
    
    /**
     * Configuration Loop
     * @var string
     */
    private $current_config = array();    
    
    /**
     * Dashboard Notification
     * @var string
     */
    protected $daboard_notification = false; 
        
    /**
     * Constructor
     * @since     1.0.0
     * @version   1.0.0
     */
    public function __construct() {
        
        $this->title  = esc_html__( 'Server Health', 'unite-admin' );
        
        /* theme info */
        $this->theme_info = wp_get_theme();
        
        /* knowledgebase */
        $this->knowledgebase = esc_url( 'http://knowledgebase.unitedthemes.com/' );
        
        /* run hooks */
        $this->hooks();
            
    }
    
    /**
     * Initiate our hooks
     * @since     1.0.0
     * @version   1.0.0
     */
    public function hooks() {
        
        /* add menu item */
        add_action( 'admin_menu' , array( $this , 'add_menu_item' ) );
        
        /* WordPress Environment */
        add_action( 'admin_init', array ($this, 'wordpress_environment') );
        add_action( 'admin_init', array ($this, 'theme_environment') );
        add_action( 'admin_init', array ($this, 'plugin_environment') );
        add_action( 'admin_init', array ($this, 'php_environment') );
        
        /* check configuration settings */
        add_action( 'admin_init', array ($this, 'get_memory_limit') );
        add_action( 'admin_init', array ($this, 'get_post_max_size') );
        add_action( 'admin_init', array ($this, 'get_upload_max_filesize') );
        add_action( 'admin_init', array ($this, 'get_max_input_vars') );
        add_action( 'admin_init', array ($this, 'get_max_execution_time') );
        
        /* add dashboard notification */
        // add_action( 'admin_notices', array ($this, 'dashboard_notification') );        
        // add_action( 'wp_ajax_hide_health_notification', array($this, 'hide_dashboard_notification') );
        
        /* necessary scripts */ 
        if ( isset($_GET['page']) && $this->key == $_GET['page'] ) {
            
            /* load js */
            add_action( 'admin_enqueue_scripts', array( $this, 'register_js' ) );
        
        }
                   
    }
        
    /**
     * Theme Health JS
     * @since  1.2
     */
    public function register_js() {
        
        $min = NULL;
        
        if( !WP_DEBUG ){
            $min = '.min';
        } 
        
        wp_enqueue_script(
            'unite-clipboard', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/clipboard/clipboard.min.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-gauge', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/gauge/gauge' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-flot', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/flot/jquery.flot' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-flot-categories', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/flot/jquery.flot.categories' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-flot-pie', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/flot/jquery.flot.pie' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-flot-resize', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/flot/jquery.flot.resize' . $min . '.js', 
            array('jquery'), 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-theme-health', 
            FW_WEB_ROOT . '/core/admin/assets/js/unite-theme-health' . $min . '.js', 
            array( 'jquery', 'unite-flot', 'unite-gauge', 'unite-clipboard' ), 
            UT_VERSION
        );
    
    }
    
    /**
     * Add to menu
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function add_menu_item() {
        
        $this->options_page = add_submenu_page('unite-welcome-page', $this->title, $this->title, 'manage_options', $this->key, array( $this , 'admin_page_display' ) );
        
    }
    
    
    /**
     * WordPress Environment
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function wordpress_environment() {
        
        $this->current_config['report']['wordpress']['version']   = get_bloginfo('version');
        $this->current_config['report']['wordpress']['home_url']  = home_url();
        $this->current_config['report']['wordpress']['site_url']  = site_url();
        $this->current_config['report']['wordpress']['theme']     = $this->theme_info->get( 'Name' );
        $this->current_config['report']['wordpress']['multisite'] = is_multisite() ? 'yes' : 'no';
        $this->current_config['report']['wordpress']['language']  = get_locale();
    
    }
    
    /**
     * Theme Environment
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function theme_environment() {
    
        $this->current_config['report']['theme']['version']   = $this->theme_info->get( 'Version' );
        $this->current_config['report']['theme']['framework'] = UT_VERSION;
        $this->current_config['report']['theme']['browser']   = $_SERVER['HTTP_USER_AGENT'];
    
    }
    
    
    /**
     * PHP Environment
     *
     * @since     1.0.0
     * @version   1.0.0
     */
    public function php_environment() {
        
        $this->current_config['report']['php']['server'] = $_SERVER['SERVER_SOFTWARE'];
        $this->current_config['report']['php']['phpversion'] = function_exists( 'phpversion' ) ? phpversion() : esc_html__( 'not available', 'unite-admin' );
    
    }
    
    /**
     * Plugin Environment
     *
     * @since     1.0.0
     * @version   1.0.0
     */     
    public function plugin_environment() {
        
        $plugin_report = array();
        
        /* get plugins */
        $active_plugins = get_option( 'active_plugins' ); 
        
        /* get multisite plugins */
        if ( is_multisite() ) {
        
            $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
            
        }
        
        /* loop */
        foreach ( $active_plugins as $plugin ) {
        
            $plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
            
            /* https://codex.wordpress.org/Function_Reference/get_plugin_data */
            if ( ! empty( $plugin_data['Name'] ) ) {
                
                $plugin_name = esc_html( $plugin_data['Name'] );
                
                $plugin_report[] = array(
                    'name'    => $plugin_name,
                    'version' => esc_html( $plugin_data['Version'] )
                );
                                                               
            
            }                                           
        
        
        }
        
        /* add to report */
        $this->current_config['report']['plugins'] = $plugin_report;
    
    }
    
    /**
     * Upload Max Filesize
     * @since     1.0.0
     * @version   1.0.0
     */ 
    function get_upload_max_filesize() {
    
        $this->upload_max_filesize = size_format( wp_max_upload_size() );
        
        if( $this->upload_max_filesize ) {
            
            /* remove MB */
            $this->upload_max_filesize = str_replace( 'MB', '', $this->upload_max_filesize);
                        
            /* title */    
            $this->current_config['upload_max_filesize']['title']= esc_html__( 'Max Upload Size', 'unite-admin' );
            
            /* report */
            $this->current_config['report']['php'][$this->current_config['upload_max_filesize']['title']] = $this->upload_max_filesize;
                        
            /* recommended value */
            $this->current_config['upload_max_filesize']['recommended']= 8;
            
            if( $this->upload_max_filesize < 8 ) {
                
                $this->current_config['upload_max_filesize']['color']  = '#FF2366';
                $this->current_config['upload_max_filesize']['status'] = 'down';
                $this->current_config['upload_max_filesize']['icon']   = 'angle-double-down';
            
            } else {
                
                $this->current_config['upload_max_filesize']['color']  = '#7ed321';
                $this->current_config['upload_max_filesize']['status'] = 'up';
                $this->current_config['upload_max_filesize']['icon']   = 'angle-double-up';
            
            }
                
        
        }
        
        
    }
    
    /**
     * Memory Limit
     *
     * @since     1.0.0
     * @version   1.0.0
     */        
    function get_memory_limit() {
        
        $this->memory_limit = (int) ini_get('memory_limit');
        
        if( $this->memory_limit ) {
            
            /* title */    
            $this->current_config['memory_limit']['title']= esc_html__( 'Memory Limit', 'unite-admin' );
            
            /* recommended value */
            $this->current_config['memory_limit']['recommended']= 96;
            
            /* report */
            $this->current_config['report']['php'][$this->current_config['memory_limit']['title']] = $this->memory_limit;
            
            if( $this->memory_limit < 96 ) {
                
                $this->current_config['memory_limit']['color']  = '#FF2366';
                $this->current_config['memory_limit']['info']   = sprintf( esc_html__( 'We recommend setting the memory limit at least to 96MB.', 'unite-admin' ), $this->memory_limit );
                $this->current_config['memory_limit']['status'] = 'down';
                $this->current_config['memory_limit']['icon']   = 'angle-double-down';
                
                
                /* knowledgebase article */
                $this->current_config['memory_limit']['artricle']  = 'how-to-increase-the-memory-limit-in-wordpress';
                
                /* show notification */
                $this->daboard_notification = true;
                
            } else {
                
                $this->current_config['memory_limit']['color']  = '#7ed321'; 
                $this->current_config['memory_limit']['info']   = $this->memory_limit . esc_html__( 'MB', 'unite-admin' );
                $this->current_config['memory_limit']['status'] = 'up';
                $this->current_config['memory_limit']['icon']   = 'angle-double-up';
            
            }
               
        }      
        
    }
    
     /**
     * Check Memory Usage
     *
     * @since     1.0.0
     * @version   1.0.0
     */        
    function get_memory_usage() {
        
        $this->memory['usage'] = function_exists( 'memory_get_usage' ) ? round( memory_get_usage() / 1024 / 1024, 2 ) : 0;
        
        if ( !empty( $this->memory['usage'] ) && $this->memory_limit ) {
        
            $this->memory['percent'] = round ($this->memory['usage'] / $this->memory_limit * 100, 0);
            $this->memory['color'] = '#7ed321';
            
            $this->memory['color'] = ( $this->memory['percent'] > 70 ) ? '#face15' : $this->memory['color'];
            $this->memory['color'] = ( $this->memory['percent'] > 85 ) ? '#FF2366' : $this->memory['color'];
            
        }
                
    }
    
    
    /**
     * Post Max Size
     * @since     1.0.0
     * @version   1.0.0
     */
      
    function get_post_max_size() {
        
        $this->post_max_size = (int) ini_get('post_max_size'); 
        
        if( $this->post_max_size ) {
            
            /* title */    
            $this->current_config['post_max_size']['title']= esc_html__( 'Post Max Size', 'unite-admin' );
            
            /* recommended value */
            $this->current_config['post_max_size']['recommended']= 8;
            
            /* report */
            $this->current_config['report']['php'][$this->current_config['post_max_size']['title']] = $this->post_max_size;
            
            if( $this->post_max_size < 8 ) {

                $this->current_config['post_max_size']['color']   = '#FF2366';
                $this->current_config['post_max_size']['info']    = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Set to 8 MB or higher.', 'unite-admin' ), $this->create_status_fix('how-to-increase-the-maximum-file-upload-size-in-wordpress') );    
                $this->current_config['post_max_size']['status']  = 'down';
                $this->current_config['post_max_size']['icon']    = 'angle-double-down';
                
                /* show notification */
                $this->daboard_notification = true; 
            
            } else {
                
                $this->current_config['post_max_size']['color']  = '#7ed321';    
                $this->current_config['post_max_size']['info']   = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Your setting is good.', 'unite-admin' ), $this->create_status_info('http://php.net/manual/en/ini.core.php#ini.post-max-size') );
                $this->current_config['post_max_size']['status'] = 'up';
                $this->current_config['post_max_size']['icon']   = 'angle-double-up';
                    
            }
        
        }
        
    }
    
    /**
     * Max Input Vars
     *
     * @since     1.0.0
     * @version   1.0.0
     */     
    function get_max_input_vars() {
        
        $this->max_input_vars = (int) ini_get('max_input_vars');
        
        if( $this->max_input_vars ) {
            
            /* title */    
            $this->current_config['max_input_vars']['title']= esc_html__( 'Max Input Vars', 'unite-admin' );
            
            /* recommended value */
            $this->current_config['max_input_vars']['recommended'] = 3000;
            
            /* report */
            $this->current_config['report']['php'][$this->current_config['max_input_vars']['title']] = $this->max_input_vars;
            
            if ( $this->max_input_vars < 3000 && $this->max_input_vars >= 2000 ) {
                
                $this->current_config['max_input_vars']['color']  = '#face15';
                $this->current_config['max_input_vars']['info']   = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Set to 3000 or higher.', 'unite-admin' ) , $this->create_status_fix('how-to-increase-the-max-input-vars-in-wordpress') );     
                $this->current_config['max_input_vars']['status'] = 'med';
                $this->current_config['max_input_vars']['icon']   = 'minus';
                
                /* show notification */
                $this->daboard_notification = true;
                
            } elseif( $this->max_input_vars < 2000 && $this->max_input_vars >= 1000 ) {     
                
                $this->current_config['max_input_vars']['color']  = '#FF2366';
                $this->current_config['max_input_vars']['info']   = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Set to 3000 or higher.', 'unite-admin' ) , $this->create_status_fix('how-to-increase-the-max-input-vars-in-wordpress') );
                $this->current_config['max_input_vars']['status'] = 'down';
                $this->current_config['max_input_vars']['icon']   = 'angle-double-down';
                
                /* show notification */
                $this->daboard_notification = true;
                
            } else {
                
                $this->current_config['max_input_vars']['color']  = '#7ed321';
                $this->current_config['max_input_vars']['info']   = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Your setting is good.', 'unite-admin' ), $this->create_status_info('http://php.net/manual/en/info.configuration.php#ini.max-input-vars') );            
                $this->current_config['max_input_vars']['status'] = 'up';
                $this->current_config['max_input_vars']['icon']   = 'angle-double-up';
            
            }
        
        }        
        
    }
    
    
   
    /**
     * Max Execution Time
     *
     * @since     1.0.0
     * @version   1.0.0
     */     
    function get_max_execution_time() {
        
        $this->max_execution = (int) ini_get('max_execution_time');
        
        if( $this->max_execution ) {
            
            /* title */    
            $this->current_config['max_execution_time']['title']= esc_html__( 'Max Execution Time', 'unite-admin' );
            
            /* recommended value */
            $this->current_config['max_execution_time']['recommended']= 90;            
            
            /* report */
            $this->current_config['report']['php'][$this->current_config['max_execution_time']['title']] = $this->max_execution;
            
            if( $this->max_execution < 30 ) {

                $this->current_config['max_execution_time']['color']   =  '#FF2366';
                $this->current_config['max_execution_time']['info']    =  sprintf( '<div class="ut-gaug-summary"><span>%s</span>%s</div>', esc_html__( 'Set to 90 or higher.', 'unite-admin' ), $this->create_status_fix('how-to-increase-the-max-execution-time-in-wordpress') );    
                $this->current_config['max_execution_time']['status']  =  'down';
                $this->current_config['max_execution_time']['icon']    =  'minus';
                
                /* show notification */
                $this->daboard_notification = true; 
            
            } elseif( $this->max_execution <= 60 ) {
                
                $this->current_config['max_execution_time']['color']   = '#face15';    
                $this->current_config['max_execution_time']['info']    = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Set to 90 or higher.', 'unite-admin' ), $this->create_status_fix('how-to-increase-the-max-execution-time-in-wordpress') );    
                $this->current_config['max_execution_time']['status']  = 'med';
                $this->current_config['max_execution_time']['icon']    = 'minus';
                
                /* show notification */
                $this->daboard_notification = true; 
                    
            } else {
                
                $this->current_config['max_execution_time']['color']  = '#7ed321';
                $this->current_config['max_execution_time']['info']   = sprintf( '<div class="ut-gaug-summary"><span>%s</span> %s</div>', esc_html__( 'Your setting is good.', 'unite-admin' ), $this->create_status_info('http://php.net/manual/en/info.configuration.php#ini.max-execution-time') );        
                $this->current_config['max_execution_time']['status'] = 'up';
                $this->current_config['max_execution_time']['icon']   = 'angle-double-up';
            
            }            
        
        }     
        
    }
    

    
    /**
     * Create Status Fix Icon
     *
     * @since     1.0.0
     * @version   1.0.0
     */    
    function create_status_fix( $article ) {
        return '<a title="' . esc_html__( 'Learn how to fix it.', 'unite-admin' ) . '" target="_blank" href="' . $this->knowledgebase . $article . '"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' . esc_html__( 'Learn how to fix it.', 'unite-admin' ) . ' </a>';
    }
    
    /**
     * Create Status Fix Icon
     *
     * @since     1.0.0
     * @version   1.0.0
     */    
    function create_status_info( $article ) {
        return '<a title="' . esc_html__( 'Learn more about it.', 'unite-admin' ) . '" target="_blank" href="' . esc_url( $article ) . '"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' . esc_html__( 'Learn more about it.', 'unite-admin' ) . ' </a>';
    }
    
    /**
     * Dashboard Notification
     * @since     1.0.0
     * @version   1.0.0
     */     
    function dashboard_notification() {
        
        if ( isset($_GET['page']) && $this->key == $_GET['page'] ) {
            return;
        }
        
        if( $this->daboard_notification && !get_option('hide_unite_health_dashboard_notification') ) {
        
            $class = 'notice notice-warning is-dismissible unite-health-status';
            $message = esc_html__( 'Please check theme health status page. Your action may be required.', 'unite-admin' );
            $link = '<a href="' . get_admin_url() . 'admin.php?page=unite-theme-info">' . esc_html__( 'View Health Status', 'unite-admin' ) . '</a>';
            
            printf( '<div class="%1$s"><p>%2$s %3$s</p></div>', $class, $message, $link ); 
        
        }
        
    }
        
    /**
     * Hide Dashboard Notification
     * @since     1.0.0
     * @version   1.0.0
     */      
    function hide_dashboard_notification() {
        
        update_option( 'hide_unite_health_dashboard_notification', 1 );
    
    }
    
    /**
     * Show Dashboard Notification
     * @since     1.0.0
     * @version   1.0.0
     */      
    function show_dashboard_notification() {
    
        update_option( 'hide_unite_health_dashboard_notification', 0 );            
    
    }

    /**
     * Admin page markup
     * @since    1.0
     * @version  1.0.0
     */
    public function admin_page_display() { 
    
        /* current user */
        $user_id      = get_current_user_id();
        $current_user = wp_get_current_user();
        $avatar       = get_avatar( $user_id, 160 );
        
        ?>
        
        <div id="ut-admin-wrap" class="clearfix">
        
            <div id="ut-ui-admin-header">
        
                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">
                                
                    <div class="ut-admin-branding">
                        <a href="http://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>
                                            
                </div>
                
                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">
                
                <div class="ut-admin-header-title">
                
                    <h1><?php esc_html_e( 'Server Health.', 'unite-admin' ); ?></h1>
                
                </div>
                
                </div>
                
            </div>
            
            <div class="ut-dashboard-nav-bg grid-10 medium-grid-15 hide-on-tablet hide-on-mobile grid-parent">
                    
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
                            <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>"><div class="ut-dashboard-theme-option"><img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png"></div><span>Theme Options</span></a>
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
            
            <div class="ut-option-holder grid-90 medium-grid-85 tablet-grid-100 mobile-grid-100">
                
                <div id="ut-dashboard-content">
    
                    <div class="grid-70 prefix-15 medium-grid-100 tablet-grid-100 mobile-grid-100">
                
                    <div class="ut-dashboard-hero">
                
                    <h1>Hi Admin! Check your Server Health!</h1>
           
                    <div class="hide-on-mobile"><?php esc_html_e( 'Thank you for purchasing our theme. We\'re as excited as you are about the possibilities before you. Finally, its going to be far less complicated to make your WordPress website pages look and feel the way you want. We’ve assembled some links to get you started with the theme, maintain your site and help you to get an overview of all features available.', 'unite-admin' ); ?></div>
                
                    </div>
            
                </div>
                        
                        <div class="clear"></div>
                        
                        <?php if( $this->post_max_size ) : ?>
                         
                            <div class="grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                                
                                <div class="ut-dashboard-widget widget-post-max-size">
                                    
                                        <div class="ut-widget-hero">
                                            
                                            <h3><?php echo $this->current_config['post_max_size']['title']; ?></h3>
                                            
                                            <span class="ut-widget-counter <?php echo $this->current_config['post_max_size']['status']; ?>">
                                                <?php echo $this->post_max_size; ?> <?php esc_html_e( 'Megabyte', 'unite-admin' ); ?>
                                            </span>
                                            
                                            <span class="ut-dashboard-widget-status <?php echo $this->current_config['post_max_size']['status'];?>">
                                                <i class="fa fa-<?php echo $this->current_config['post_max_size']['icon']; ?>" aria-hidden="true"></i>
                                            </span>
                                             
                                        </div>
                                    
                                        <div class="hide-on-mobile">
                                        
                                        <div class="ut-gauge-chart">
                                        
                                            <canvas id="ut-gauge-post-max-size" width="270" height="180" data-plugin-options='{ "value": <?php echo ( $this->post_max_size > $this->current_config['post_max_size']['recommended'] ) ? $this->current_config['post_max_size']['recommended'] : $this->post_max_size; ?>, "maxValue": <?php echo $this->current_config['post_max_size']['recommended']; ?>, "colorStop" : "<?php echo $this->current_config['post_max_size']['color']; ?>", "colorStart" : "<?php echo $this->current_config['post_max_size']['color']; ?>" }'></canvas>
                                            
                                        </div>
                                        
                                        </div>
                                     
                                        <h4 class="hide-on-mobile">
                                            <?php echo $this->current_config['post_max_size']['title']; ?>: 
                                            <span class="<?php echo $this->current_config['post_max_size']['status']; ?>"><?php echo $this->post_max_size; ?> MB</span>
                                        </h4>
                                        
                                        <?php echo $this->current_config['post_max_size']['info']; ?>
                                    
                                </div>
                            
                            </div>                    
                        
                        <?php endif; ?>
                        
                        
                        <?php if( $this->max_execution ) : ?>
                        
                            <div class="grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                             
                                <div class="ut-dashboard-widget widget-timelimit">
                                        
                                        <div class="ut-widget-hero">
                                        
                                            <h3><?php echo $this->current_config['max_execution_time']['title']; ?></h3>
                                            
                                            <span class="ut-widget-counter <?php echo $this->current_config['max_execution_time']['status']; ?>">
                                                <?php echo $this->max_execution; ?> <?php esc_html_e( 'Seconds', 'unite-admin' ); ?>
                                            </span>
                                            
                                            <span class="ut-dashboard-widget-status <?php echo $this->current_config['max_execution_time']['status'];?>">
                                                <i class="fa fa-<?php echo $this->current_config['max_execution_time']['icon'];?>" aria-hidden="true"></i>
                                            </span>
                                            
                                        </div>
                                    
                                        <div class="hide-on-mobile">
                                        
                                        <div class="ut-gauge-chart">
                                        
                                            <canvas id="ut-gauge-max-execution" width="270" height="180" data-plugin-options='{ "value": <?php echo ( $this->max_execution > $this->current_config['max_execution_time']['recommended'] ) ? $this->current_config['max_execution_time']['recommended'] : $this->max_execution; ?>, "maxValue": <?php echo $this->current_config['max_execution_time']['recommended']; ?>, "colorStop" : "<?php echo $this->current_config['max_execution_time']['color']; ?>", "colorStart" : "<?php echo $this->current_config['max_execution_time']['color']; ?>" }'></canvas>
                                            
                                        </div>
                                        
                                        </div>
                                    
                                        <h4 class="hide-on-mobile">
                                            <?php echo $this->current_config['max_execution_time']['title']; ?>: 
                                            <span class="<?php echo $this->current_config['max_execution_time']['status'];?>"><?php echo $this->max_execution; ?> Sec</span>
                                        </h4>
                                        
                                        <?php echo $this->current_config['max_execution_time']['info']; ?>
                                    
                                </div>
                            
                            </div>
                        
                        <?php endif; ?>
                        
                        
                        <?php if( $this->max_input_vars ) : ?>
                        
                            <div class="grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                        
                                <div class="ut-dashboard-widget widget-max-input-vars ">
                            
                                        <div class="ut-widget-hero">
                                            
                                            <h3><?php echo $this->current_config['max_input_vars']['title']; ?></h3>
                                            
                                            <span class="ut-widget-counter <?php echo $this->current_config['max_input_vars']['status']; ?>">
                                                <?php echo $this->max_input_vars; ?> <?php esc_html_e( 'Variables', 'unite-admin' ); ?>
                                            </span>
                                            
                                            <span class="ut-dashboard-widget-status <?php echo $this->current_config['max_input_vars']['status'];?>">
                                                <i class="fa fa-<?php echo $this->current_config['max_input_vars']['icon'];?>" aria-hidden="true"></i>
                                            </span>
                                            
                                        </div>
                                          
                                    <div class="hide-on-mobile">
                                        
                                        <div class="ut-gauge-chart">
                                        
                                            <canvas id="ut-gauge-max-input-vars" width="270" height="180" data-plugin-options='{ "value": <?php echo $this->max_input_vars > $this->current_config['max_input_vars']['recommended'] ? $this->current_config['max_input_vars']['recommended'] : $this->max_input_vars ; ?>, "maxValue": <?php echo $this->current_config['max_input_vars']['recommended']; ?>, "colorStop" : "<?php echo $this->current_config['max_input_vars']['color']; ?>", "colorStart" : "<?php echo $this->current_config['max_input_vars']['color']; ?>" }'></canvas>
                                            
                                        </div>
                                    
                                    </div>
                                    
                                        <h4 class="hide-on-mobile">
                                            <?php echo $this->current_config['max_input_vars']['title']; ?>: 
                                            <span class="<?php echo $this->current_config['max_input_vars']['status'];?>"><?php echo $this->max_input_vars; ?> Vars</span>
                                        </h4>
                                        
                                        <?php echo $this->current_config['max_input_vars']['info']; ?>
                                        
                                </div>
                            
                            </div>
                    
                    <?php endif; ?>
                        
                    <div class="clear"></div>

                        <?php if( $this->memory_limit ) : ?>                        
                                
                                <div class="grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100">
                                
                                <div class="ut-dashboard-widget widget-memory-limit">
                                    
                                    <div class="grid-20 medium-grid-100 mobile-grid-100 tablet-grid-100">
                                            
                                        <div class="ut-widget-hero">
                                            
                                            <h3><?php esc_html_e('Memory Limit' , 'unite-admin' ); ?></h3>
                                            
                                            <span class="ut-widget-counter <?php echo $this->current_config['memory_limit']['status']; ?>">
                                                <?php echo $this->memory_limit; ?> Megabyte
                                            </span>
                                            
                                            <span class="ut-dashboard-widget-status <?php echo $this->current_config['memory_limit']['status']; ?>">
                                                <i class="fa fa-<?php echo $this->current_config['memory_limit']['icon']; ?>" aria-hidden="true"></i>
                                            </span>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="grid-80 medium-grid-100 tablet-grid-100 hide-on-mobile">
                                    
                                        <?php $this->get_memory_usage(); ?>
                                        
                                        <div data-memory-status="<?php echo $this->memory['color']; ?>" data-memory-usage="<?php echo esc_attr( $this->memory['percent'] ); ?>" class="ut-memory-chart" id="flotMemoryUsage"></div>
                                        
                                        <ul class="ut-memory-check clearfix">
                                            <li>
                                                <div class="ut-memory-status-ok"></div>
                                                <div class="legendLabel">
                                                    <?php esc_html_e('Memory Usage Normal','unite-admin'); ?>
                                                </div>                                        
                                            </li>
                                    
                                            <li>
                                                <div class="ut-memory-status-exhausted"></div>
                                                <div class="legendLabel">
                                                    <?php esc_html_e('Memory Usage Exhausted','unite-admin'); ?>
                                                </div>                                        
                                            </li>
                                    
                                            <li>
                                                <div class="ut-memory-status-critical"></div>
                                                <div class="legendLabel">
                                                    <?php esc_html_e('Memory Usage Critical','unite-admin'); ?>
                                                </div>                                        
                                            </li>  
                                        </ul>
                                    
                                    </div>
                                    
                                </div>
                                
                                </div>
                   
                    <?php endif; ?>                    
                      
                      <div class="eq-container equalHeight">
                        
                      <div class="eq-col grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-widget widget-wp-debug">
                                
                                    <?php if( WP_DEBUG ) : ?>
                                        
                                        <div class="ut-widget-hero">
                                            <h3><?php esc_html_e('Debug Mode' , 'unite-admin' ); ?></h3>
                                            <span class="ut-widget-counter down"><?php esc_html_e( 'On', 'unite-admin' ); ?></span>
                                            <span class="ut-dashboard-widget-status down">
                                                <i class="fa fa-angle-double-down" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        
                                    <?php else : ?>
                                        
                                        <div class="ut-widget-hero">
                                            <h3><?php esc_html_e('DEBUG MODE' , 'unite-admin' ); ?></h3>
                                            <span class="ut-widget-counter up"><?php esc_html_e( 'Off', 'unite-admin' ); ?></span>
                                            <span class="ut-dashboard-widget-status up">
                                                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                                            </span>
                                        </div>    
                                    
                                    <?php endif; ?>
                                
                            </div>
                        
                        </div>
                        
                        <div class="eq-col grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-table brooklyn-environment">
                            
                                <table class="form-table">
                                    
                                    <thead>
                                        
                                        <tr>
                                            <th colspan="2"><?php _e( 'About Brooklyn', 'unite-admin' ); ?></th>
                                        </tr>
                                        
                                    </thead>
                                            
                                    <tbody>
                                    
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Theme Version:', 'unite-admin' ); ?></th>
                                            <td><?php echo $this->theme_info->get( 'Version' ); ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Framework Version:', 'unite-admin' ); ?></th>
                                            <td><?php echo UT_VERSION; ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'User Agent:', 'unite-admin' ); ?></th>
                                            <td><?php echo $_SERVER['HTTP_USER_AGENT'] ; ?> </td>
                                        </tr>
                                        
                                    </tbody>
                                    
                                </table>
                            
                            </div>
                            
                        </div>                        
                        
                        <div class="eq-col grid-33 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-table wordpress-environment">
                            
                                <table class="form-table">
                                    
                                    <thead>
                                        
                                        <tr>
                                            <th colspan="2"><?php _e( 'WordPress Environment', 'unite-admin' ); ?></th>
                                        </tr>
                                        
                                    </thead>
                                        
                                    <tbody>
                                    
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'WordPress Version:', 'unite-admin' ); ?></th>
                                            <td><?php echo get_bloginfo('version'); ?></td>
                                            
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Home URL:', 'unite-admin' ); ?></th>
                                            <td><?php echo home_url(); ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Site URL:', 'unite-admin' ); ?></th>
                                            <td><?php echo site_url(); ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Installed Theme:', 'unite-admin' ); ?></th>
                                            <td><?php echo $this->theme_info->get( 'Name' ); ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Multisite Installation:', 'unite-admin' ); ?></th>
                                            <td><?php echo is_multisite() ? 'yes' : 'no'; ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Current Language:', 'unite-admin' ); ?></th>
                                            <td><?php echo get_locale(); ?></td>
                                        </tr>
                                    
                                    </tbody>
                                    
                                </table>
                            
                            </div>
                            
                        </div>
                        
                        </div>
                        
                        <div class="eq-container equalHeight">
                        
                        <div class="eq-col grid-50 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-table server-environment">
                            
                                <table class="form-table">
                                    
                                    <thead>
                                        
                                        <tr>
                                            <th colspan="2"><?php _e( 'Server Environment', 'unite-admin' ); ?></th>
                                        </tr>
                                        
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'Server Info:', 'unite-admin' ); ?></th>
                                            <td><?php echo esc_html( $_SERVER['SERVER_SOFTWARE'] ); ?></td>
                                        </tr>
                                        
                                        <tr valign="top">
                                            <th scope="row"><?php esc_html_e( 'PHP Version:', 'unite-admin' ); ?></th>
                                            <td><?php if ( function_exists( 'phpversion' ) ) echo esc_html( phpversion() ); ?></td>
                                        </tr>
                                        
                                        <?php if( $this->max_execution ) : ?>
                                            
                                            <tr valign="top">
                                                <th scope="row"><?php echo $this->current_config['max_execution_time']['title']; ?>:</th>
                                                <td><span class="<?php echo $this->current_config['max_execution_time']['status'];?>"><?php echo $this->max_execution; ?> Sec</span></td>
                                            </tr>                                            
                                        
                                        <?php endif; ?>
                                        
                                        <?php if( $this->post_max_size ) : ?>
                                            
                                            <tr valign="top">
                                                <th scope="row"><?php echo $this->current_config['post_max_size']['title']; ?>:</th>
                                                <td><span class="<?php echo $this->current_config['post_max_size']['status'];?>"><?php echo $this->post_max_size; ?> MB</span></td>
                                            </tr>                                            
                                        
                                        <?php endif; ?>
                                        
                                        <?php if( $this->max_input_vars ) : ?>
                                            
                                            <tr valign="top">
                                                <th scope="row"><?php echo $this->current_config['max_input_vars']['title']; ?>:</th>
                                                <td><span class="<?php echo $this->current_config['max_input_vars']['status'];?>"><?php echo $this->max_input_vars; ?> Vars</span></td>
                                            </tr>                                            
                                        
                                        <?php endif; ?>
                                        
                                        <?php if( $this->memory_limit ) : ?>
                                            
                                            <tr valign="top">
                                                <th scope="row"><?php echo $this->current_config['memory_limit']['title']; ?>:</th>
                                                <td><span class="<?php echo $this->current_config['memory_limit']['status'];?>"><?php echo $this->memory_limit; ?> MB</span></td>
                                            </tr>                                            
                                        
                                        <?php endif; ?>
                                        
                                        <?php if( $this->upload_max_filesize ) : ?>
                                            
                                            <tr valign="top">
                                                <th scope="row"><?php echo $this->current_config['upload_max_filesize']['title']; ?>:</th>
                                                <td><span class="<?php echo $this->current_config['upload_max_filesize']['status'];?>"><?php echo $this->upload_max_filesize; ?> MB</span></td>
                                            </tr>                                            
                                        
                                        <?php endif; ?>
                                        
                                        
                                    </tbody>
                                                                    
                                </table> 
                            
                            </div>
                            
                        </div>
                        
                        <div class="eq-col grid-50 medium-grid-100 tablet-grid-100 mobile-grid-100">
                            
                            <div class="ut-dashboard-table plugin-environment">
                            
                                <table class="form-table">
                                    
                                    <thead>
                                        
                                        <tr>
                                            <th colspan="3"><?php esc_html_e( 'Plugin Environment', 'unite-admin' ); ?></th>
                                        </tr>
                                        
                                    </thead>
                                    
                                    <tbody> 
                                        
                                        <tr>
                                            <th><?php esc_html_e( 'Plugin Name:', 'unite-admin' ); ?></th>
                                            <th class="hide-on-xs hide-on-sm"><?php esc_html_e( 'Author:', 'unite-admin' ); ?></th>
                                            <th class="hide-on-xs hide-on-sm"><?php esc_html_e( 'Version:', 'unite-admin' ); ?></th>
                                        </tr>
                                                
                                        <?php 
                                        
                                            /* get plugins */
                                            $active_plugins = get_option( 'active_plugins' ); 
                                            
                                            /* get multisite plugins */
                                            if ( is_multisite() ) {
                                            
                                                $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
                                                
                                            }
                                            
                                            /* loop */
                                            foreach ( $active_plugins as $plugin ) {
                                            
                                                $plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
                                                
                                                /* https://codex.wordpress.org/Function_Reference/get_plugin_data */
                                                if ( ! empty( $plugin_data['Name'] ) ) {
                                                    
                                                    $plugin_name = esc_html( $plugin_data['Name'] );
                                                    
                                                    if ( ! empty( $plugin_data['PluginURI'] ) ) {
                                                        $plugin_name = '<a target="_blank" href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . __( 'Visit' , 'unite-admin' ) . '">' . $plugin_name . '</a>';
                                                    }                                                    
                                                    
                                                    echo '<tr valign="top">';
                                                        
                                                        echo '<td>' . $plugin_name . '</td>';
                                                        echo '<td class="hide-on-xs hide-on-sm">' . $plugin_data['Author'] . '</td>';
                                                        echo '<td class="right">' . esc_html( $plugin_data['Version'] ) . '</td>';
                                                    
                                                    echo '</tr>';                                                    
                                                
                                                }                                           
                                            
                                            
                                            }
                                                                                    
                                        ?>
                                        
                                    </tbody>
                                    
                                </table>
                            
                            </div>
                            
                        </div>
                        
                        </div>
                
                        <div class="grid-100 medium-grid-100 tablet-grid-100 mobile-grid-100">
                        
                        <div class="ut-dashboard-widget widget-system-report clearfix">
                        
                            <button class="ut-helpdesk-copy-info ut-ui-button ut-ui-button-health" data-clipboard-target="#ut-system-report"><?php esc_html_e( 'Create System Report','unite-admin' ); ?></button>
                        
                            <div id="ut-system-report-box" class="ut-hide">
                            
                                <p><?php esc_html_e( 'Please paste down these information when starting a support inquiry in our supportforum.' , 'unite-admin' ); ?></p>
                                
                                <textarea id="ut-system-report">
                                <?php 
                                    
                                    foreach( $this->current_config['report'] as $key => $part ) {
                                        
                                        echo "\n";
                                        echo '### ' . strtoupper($key) . ' ###' . "\n";
                                        
                                        foreach( $part as $dkey => $data ) {
                                            
                                            if( is_array( $data ) ) {
                                            
                                                echo $data['name'] . ' : ' . $data['version'] . "\n";
                                            
                                            } else {
                                            
                                                echo strtoupper($dkey) . ' : ' . $data . "\n";
                                                
                                            }
                                                
                                        }
                                        
                                    
                                    }                            
                                
                                ?>
                                </textarea>
                            
                            </div>
                        
                            </div>
                        </div>
                 
                </div>                
            
            </div>
            
        </div>
    
    <?php }
    
}

/* get it started */
if( apply_filters( 'ut_show_theme_info', false ) ) {
    
    new UT_Theme_Info();    
    
}
    
