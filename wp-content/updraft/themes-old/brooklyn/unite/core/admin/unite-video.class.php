<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

class UT_Admin_Video {
    
    /**
     * Slug
     * @var string
     */
    private $key = 'unite-video-tutorials';    
    
     /**
     * Theme Data
     * @var array
     */
    private $theme = array(); 
    
    /**
     * Home Title
     * @var string
     */
    protected $title = '';
    
    /**
     * Extra Message
     * @bolean
     */
    private $all_good = true;
    
    
    /**
     * Amazon Public Reporitory
     * @bolean
     */
    private $amazonaws;
    
    
    /**
     * Constructor
     * @since     1.0.0
     * @version   1.0.0
     */
    public function __construct() {
        
        $this->title = esc_html__( 'Video Tutorials', 'unite-admin' );
        $this->amazonaws = 'https://s3.eu-central-1.amazonaws.com/unitedthemes-help/';
        $this->hooks();        
            
    }
    
     /**
     * Initiate our hooks
     * @since     1.0.0
     * @version   1.0.0
     */
    public function hooks() {
        
        $this->theme = wp_get_theme();
        
        /* add menu item */
        add_action( 'admin_menu', array( $this, 'add_menu_item' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'lightbox' ) );
        
    }
    
    
    public function lightbox() {
        
        wp_enqueue_style(
            'unite-lightgallery', 
            THEME_WEB_ROOT . '/assets/vendor/lightGallery/css/lightgallery.min.css', 
            false, 
            UT_VERSION
        ); 
        
        wp_enqueue_script(
            'unite-lightgallery', 
            THEME_WEB_ROOT . '/assets/vendor/lightGallery/js/lightgallery-all.min.js', 
            array(), 
            UT_VERSION,
            true
        );
        
        wp_enqueue_script(
            'unite-hideseek', 
            FW_WEB_ROOT . '/core/admin/assets/vendor/hideseek/jquery.hideseek.min.js', 
            array(), 
            UT_VERSION,
            true
        );
        
        
        
        
    }
    
    
    
    /**
     * Add to menu
     *
     * @since     4.2.3
     * @version   1.0.0
     */
    public function add_menu_item() {
        
        $this->options_page = add_submenu_page(
            'unite-welcome-page', 
            $this->title, 
            $this->title, 
            'manage_options', 
            $this->key, 
            array( $this , 'admin_page_display' ) 
        );
        
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
                        
                        <?php $theme = wp_get_theme(); ?>
                        
                        <h1><?php esc_html_e( 'Video Tutorials.', 'unite-admin' ); ?></h1>
                    
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
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>"><div class="ut-dashboard-theme-option"><img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png"></div><span>Theme Options</span></a>
                    </li>

                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info"><div class="ut-dashboard-server-health"><img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png"></div><span>Server Health</span></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_demo_importer_page', 'unite-demo-importer' ); ?>"><div class="ut-dashboard-demo-importer"><img alt="Demo Installer" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/demo-importer.png"></div><span>Demo Installer</span></a>
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
                        
                            <h1><?php esc_html_e( 'Video Tutorials' , 'unite-admin' ); ?></h1>
                   
                            <div class="hide-on-mobile"><?php esc_html_e( 'In future you will find all available video tutorials inside this admin page.', 'unite-admin' ); ?></div>
                            
                            <input id="search-topics" class="ut-hide-seek" name="search" placeholder="Search Topics" data-list=".ut-topics" autocomplete="off" type="text">
                            
                            
                            
                        </div>
                    
                    </div>
                    
                    <div class="grid-100 grid-parent">
                        
                        <?php $header = array(
                            
                            'top-header-colors' => 'Where can I change the colors of my top header?',
                            'top-header-on-off' => 'Where can I activate the colors of my top header?',
                            'logo-size'     => 'My Company Logo is too small, where can I change my Company Logo size?',
                            'header-height' => 'Where can I change the header height?',
                            'header-width'  => 'Where can I change the header width?',
                            'hide-header-hero' => 'How can I hide the header on hero?',                            
                            'header-border-on-off'  => 'Where can I deactivate the header border?',
                            'header-custom-skin' => 'Where can I change the header colors?',
                            'header-color-skin' => 'Where can I can find the default header skins?',
                            'mobile-menu-colors' => 'Where can I change the colors of my mobile menu?',
                            'vertikal-horizontal-menu' => 'Where can I change the location of my navigation from top to side?',
            
                        ); ?>
                        
                        <div class="grid-50">
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">Header</h1>
                            </div>     
                                  
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $header as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>header/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                        
                        <div class="grid-50">
                            
                            <?php $blog = array(
                            
                                'blog-animation'      => 'How can I turn off the blog posts slide up animation?',
                                'blog-avatar-circle'  => 'How can I remove the image border radius from my blog avatars?',
                                'blog-border-radius'  => 'How can I remove the border radius from blog elements such as buttons?',
                                'blog-buttons-colors' => 'How can I change the colors of my buttons?',
                                'blog-layout' => 'How can I change the layout of my blog such as Grid or List for example?',
                                'blog-single-post-featured-image' => 'How can I hide the featured image on my single blog posts.',
                                'blog-single-post-featured-video' => 'How can I hide the featured video on my single blog posts.',
                                'blog-single-post-hero' => 'How can I turn off the the hero on my single blog posts.',
                                'blog-single-post-hero-height' => 'How can I change the height off the the hero on my single blog posts.',
                                'blog-single-post-title-in-hero' => 'How can I show my posts title in hero?',
                                'blog-single-post-title' => 'How can I hide the page title on my single blog posts.',
            
                            ); ?>
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">Blog</h1>
                            </div>
                            
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $blog as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>blog/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                        
                        <div class="clear"></div>
                        
                        <div class="grid-50">
                            
                            <?php $hero = array(
                            
                                'global-hero-color' => 'How can I globally change the color of hero hero caption (title, description, slogan)?',
                                'global-hero-caption-align' => 'How can I globally change the alignment of hero hero caption?',
                                'global-hero-overlay' => 'How can I globally change the visual appearance for the hero overlay?',
                                'global-hero-pattern-style' => 'How can I globally change the pattern for the hero overlay?',
                                'global-hero-border-bottom' => 'How can I globally activate the border at the bottom for the hero?',
                                'global-hero-fancy-border' => 'How can I globally activate the fancy border at the bottom for the hero?',
                                'global-hero-width' => 'How can I globally change the width for the hero?',
                                'global-hero-overlay-effect' => 'How can I globally activate the animated hero overlay effect for the hero?',
                                'global-hero-title-caption-style' => 'How can I globally change the style of the hero caption?'
            
                            ); ?>
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">Global Hero</h1>
                            </div>
                            
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $hero as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>hero/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                        
                        <div class="grid-50">
                            
                            <?php $hero = array(

                                'page-hero-parallax' => 'How can I activate the parallax effect of the hero?',
                                'page-hero' => 'How can turn off the hero on single pages?',
                                'page-hero-image' => 'How can I change the background image of the hero?',
                                'page-hero-height' => 'How can I change the height of the hero on single pages?',
                                'page-hero-title' => 'How can I change the title of the hero caption?',
                                'page-hero-caption-description' => 'How can I change the description of the hero caption?',
                                'page-hero-slogan' => 'How can I change the slogan of the hero caption?',
                                'page-hero-caption-alignment' => 'How can I change the alignment of hero hero caption?',
                                'page-hero-caption-colors' => 'How can I change the colors of the hero caption?',
                                'page-hero-title-caption-style' => 'How can I change the style of the hero caption?',
                                'page-hero-button' => 'How can I activate the button for the hero?',
                                'page-hero-button-second-button' => 'How can I activate the second button for the hero?',
                                'page-hero-button-colors' => 'How can I change color of the buttons?',
                                'page-hero-type' => 'How can I change the hero type (video,slider,image)?',
                                'page-hero-title-glow' => 'How can I activate the glow effect for hero title?',
                                'page-hero-scroll-down-arrow' => 'How can I activate the scroll down arrow for the hero?',
            
                            ); ?>
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">Page Hero</h1>
                            </div>
                            
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $hero as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>hero-page/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                        
                        <div class="clear"></div>
                        
                        <div class="grid-50">
                            
                            <?php $footer = array(
                                
                                'footer-skin' => 'How can I change the color skin (black,white) of the footer area?',
                                'footer-slogan' => 'How can I the text "We love"?',
                                'footer-scroll-top' => 'How can I activate the scroll to top button?',
                                'footer-custom-skin' => 'How can I change the colors of the footer area?',
            
                            ); ?>
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">Footer</h1>
                            </div>
                            
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $footer as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>footer/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                        
                        <div class="grid-50">
                            
                            <?php $general = array(
                                
                                'sidebar-color' => 'How can I change the colors of the sidebar?',
                                'site-frame' => 'How can I activate the site frame?',
                                'page-white-gap' => 'How can I remove/adjust the white gap on my pages?',
                                'contact-section-settings' => 'How can I change the content of the contact section?',
                                'templates' => 'How can I important theme templates?'
            
                            ); ?>
                            
                            <div class="ut-panel-headline-content">
                                <h1 class="ut-panel-title">General</h1>
                            </div>
                            
                            <div class="ut-dashboard-widget clearfix">
                                
                                <ul class="ut-topics">                                
                                    
                                    <?php foreach( $general as $gif => $text ) : ?>
                                    
                                        <li data-keywords="<?php echo esc_attr( $text ); ?>">
                                        
                                            <a class="ut-help-lightbox" href="<?php echo $this->amazonaws; ?>general/<?php echo $gif; ?>.gif" data-sub-html=".<?php echo $gif; ?>">
                                                <div class="<?php echo $gif; ?>">
                                                    <?php echo $text; ?>
                                                </div>
                                            </a>
                                        
                                        </li>
                                    
                                    <?php endforeach; ?>
                                    
                                </ul>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                    
                </div>
        
            </div>
            
        </div>

        
    <?php /* end admin page display */
    
    }
    
}

new UT_Admin_Video();