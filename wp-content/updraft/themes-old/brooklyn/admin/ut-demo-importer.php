<?php

/*
 * Custom Importer
 * by www.unitedthemes.com
  */

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

// Skip Slider Revolution
define('IMPORT_REV', true);

/*
|--------------------------------------------------------------------------
| Demo Importer Menu Item
|--------------------------------------------------------------------------
*/
add_action('admin_menu', 'ut_demo_importer_menu');

if ( !function_exists( 'ut_demo_importer_menu' ) ) {
	
	function ut_demo_importer_menu() {
	
		add_submenu_page( 'unite-welcome-page' , 'Demo Installer' , 'Demo Installer' , 'manage_options' , 'ut-demo-importer' , 'ut_view_updater' );
	
	}
	
}


/*
|--------------------------------------------------------------------------
| Demo Importer Styles
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_importer_admin_add_scripts' ) ) {

	function ut_importer_admin_add_scripts() {
			
		wp_enqueue_style(
            'ut-importer',
            THEME_WEB_ROOT . '/admin/assets/css/ut-importer.css'
        );
		
        wp_enqueue_script(
            'ut-importer', 
            THEME_WEB_ROOT . '/admin/assets/js/ut-importer.js'
        );
        
        
        /* array for notices */
        $importer_notices = array(
            'status'            => 'false',
            'missing_plugins'   => 'false',
            'missing_perm'      => 'false',
            'imported'          => get_option('ut_import_loaded') == 'active' ? "true" : "false",
            'imported_message'  => sprintf( esc_html__('Do not run the Demo Installer multiple times one after another, it will result in double content. %s To reset your installation we can recommend to use: %s', 'unitedthemes'), '<br /><br />' ,'<ul><li><span class="ut-modal-highlight">' . esc_html__('WordPress Database Reset Plugin', 'unitedthemes') . '</span></li></ul>' ),
            'error'             => '',
            'dashboard'         => get_admin_url() . 'admin.php?page=unite-welcome-page',
            'frontpage'         => esc_url( home_url( '/' ) )
        );
        
        if( isset($_GET['ut-import']) && $_GET['ut-import'] == 'success' ) {
            $importer_notices['status'] = 'true';
        }
        
        /* create message for possible errors */
        $error_message  = '';
        $plugin_message = array();
        $perm_message   = array();

        /* check upload folders */
        if( file_exists( ABSPATH . 'wp-content/uploads/' ) ) {
                        
            /* wp-content upload folder not writeable  */ 
            if( !ut_is_writable( ABSPATH . 'wp-content/uploads/' ) ) :
            
                $perm_message[] = '<span class="ut-modal-highlight">' . ABSPATH . 'wp-content/uploads/</span>';
                
            endif;
            
        
        } else {
        
            /* wp-content folder not writeable  */ 
            if( !ut_is_writable( ABSPATH . 'wp-content/' ) ) :
                
                $perm_message[] = '<span class="ut-modal-highlight">' . ABSPATH . 'wp-content/</span>';
                
            endif;
        
        }
        
        /* check for missing plugins */
        if( !ut_is_plugin_active('ut-portfolio/ut-portfolio.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Portfolio Management Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('ut-shortcodes/ut-shortcodes.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Shortcodes Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('ut-pricing/ut-pricing.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Pricing Table Management Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('js_composer/js_composer.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Visual Composer Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('revslider/revslider.php') ) :
                        
            //$plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Slider Revolution</span>', 'unitedthemes' );
            
        endif;
        
        
        /* missing permissions */
        if( !empty( $perm_message ) ) {
        
            /* flag for javascript */
            $importer_notices['missing_perm'] = 'true';
            
            /* modal content */
            $error_message .= esc_html__( 'Missing folder permissions! Please check the folder permissions for:', 'unitedthemes' ) . '<ul><li>' . implode( '</li><li>', $perm_message ) . '</li></ul>';        
        
        }
        
        /* missing plugins */
        if( !empty( $plugin_message ) ) {
            
            /* flag for javascript */
            $importer_notices['missing_plugins'] = 'true';
            
            /* modal content */            
            $error_message .= esc_html__( 'The following plugins are not active or installed, please activate / install them before importing the demo content.', 'unitedthemes' ) . '<ul><li>' . implode( '</li><li>', $plugin_message ) . '</li></ul>';
        
        }
        
        $importer_notices['error'] = $error_message;
        
        wp_localize_script( 'ut-importer', 'importer_notices', $importer_notices );
        
					
	}
	
}

if ( isset($_GET['page']) && $_GET['page'] == 'ut-demo-importer' ) {	
	add_action( 'admin_enqueue_scripts', 'ut_importer_admin_add_scripts' );
}


/*
|--------------------------------------------------------------------------
| Check if wp-content is writeable for demo images
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_is_writable' ) ) {
	
	function ut_is_writable( $path ) {
        
		if ( $path{strlen($path)-1}=='/' ) {
			return ut_is_writable($path.uniqid(mt_rand()).'.tmp');
		}
		
		if (file_exists($path)) {
			if (!($f = @fopen($path, 'r+')))
				return false;
			fclose($f);
			return true;
		}
		
		if (!($f = @fopen($path, 'w')))
			return false;
		fclose($f);
		unlink($path);
		return true;
		
	}
	
}

function ut_recognized_demos() {
    
    return array(
        
        array(
            'name'      => 'Bklyn Demo #1 Classic',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/classic',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/classic',    
            'file'      => 'demo_one'             
        ),
        array(
            'name'      => 'Bklyn Demo #02',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo2',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo2',
            'file'      => 'demo_two'             
        ),
        array(
            'name'      => 'Bklyn Demo #03',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo3',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo3',
            'file'      => 'demo_three'             
        ),
        array(
            'name'      => 'Bklyn Demo #04',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/business',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/business',
            'file'      => 'demo_four'             
        ),
        array(
            'name'      => 'Bklyn Demo #05',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo5',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo5',
            'file'      => 'demo_five'             
        ),
        array(
            'name'      => 'Bklyn Demo #06',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo6',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo6',
            'file'      => 'demo_six'             
        ),
        array(
            'name'      => 'Bklyn Demo #07',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo7',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo7',
            'file'      => 'demo_seven'             
        ),
        array(
            'name'      => 'Bklyn Demo #08',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo8',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo8',
            'file'      => 'demo_two_b'             
        ),
        array(
            'name'      => 'Bklyn Demo #09',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo9',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo9',
            'file'      => 'demo_nine'             
        ),
        array(
            'name'      => 'Bklyn Demo #10',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo10',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo10',
            'file'      => 'demo_ten'             
        ),
        array(
            'name'      => 'Bklyn Demo #11',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo11',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo11',
            'file'      => 'demo_eleven'             
        ),
        array(
            'name'      => 'Bklyn Demo #12',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo12',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo12',
            'file'      => 'demo_twelve'             
        ),
        array(
            'name'      => 'Bklyn Demo #13',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo13',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo13',
            'file'      => 'demo_thirteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #14',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo14',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo14',
            'file'      => 'demo_fourteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #15',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo15',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo15',
            'file'      => 'demo_fifteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #16',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo16',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo16',
            'file'      => 'demo_sixteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #17',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo17',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo17',
            'file'      => 'demo_seventeen'             
        ),
        array(
            'name'      => 'Bklyn Demo #18',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo18',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo18',
            'file'      => 'demo_eighteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #19',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo19',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo19',
            'file'      => 'demo_nineteen'             
        ),
        array(
            'name'      => 'Bklyn Demo #20',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo20',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo20',
            'file'      => 'demo_twenty'             
        ),
        array(
            'name'      => 'Bklyn Demo #21',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo21',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo21',
            'file'      => 'demo_twentyone'             
        ),
        array(
            'name'      => 'Bklyn Demo #22',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo22',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo22',
            'file'      => 'demo_twentytwo'             
        ),
        array(
            'name'      => 'Bklyn Demo #23',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo23',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo23',
            'file'      => 'demo_twentythree'             
        ),
        array(
            'name'      => 'Bklyn Demo #24',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo24',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo24',
            'file'      => 'demo_twentyfour'             
        ),
        array(
            'name'      => 'Bklyn Demo #25',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo25',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo25',
            'file'      => 'demo_twentyfive'             
        ),
        array(
            'name'      => 'Bklyn Demo #26',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo26',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo26',    
            'file'      => 'demo_twentysix'             
        ),
        array(
            'name'      => 'Bklyn Demo #27',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo1',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo1',
            'file'      => 'demo_twentyseven'             
        ),
        array(
            'name'      => 'Bklyn Demo #28',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo28',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo28',
            'file'      => 'demo_twentyeight'             
        ),
        array(
            'name'      => 'Bklyn Demo #29',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo29',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo29',
            'file'      => 'demo_twentynine'             
        ),
        array(
            'name'      => 'Bklyn Demo #30',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo30',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo30',
            'file'      => 'demo_thirty'             
        ),
        array(
            'name'      => 'Bklyn Demo #31',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo31',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo31',
            'file'      => 'demo_thirtyone'             
        ),
        array(
            'name'      => 'Bklyn Demo #32',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo32',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo32',
            'file'      => 'demo_thirtytwo'             
        ),
        array(
            'name'      => 'The Old Landing Page',
            'url'       => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/landing',
            'xml_url'   => 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/landing',
            'file'      => 'demo_eight',
            'poster'    => 'extra_demo.jpg'
        ),
        
    
    );    
    
}

function ut_recognized_demo_file_names() {
    
    return apply_filters( 'ut_recognized_file_names', array( 
		  'demo_one', 'demo_two' , 'demo_two_b' , 'demo_three', 'demo_four', 'demo_five', 'demo_six' , 'demo_seven' , 'demo_eight' , 'demo_eight_b' , 'demo_nine', 'demo_ten', 
          'demo_eleven' , 'demo_twelve' , 'demo_thirteen' , 'demo_fourteen', 'demo_fifteen', 'demo_sixteen', 'demo_seventeen', 'demo_eighteen', 'demo_nineteen', 'demo_twenty', 
          'demo_twentyone', 'demo_twentytwo', 'demo_twentythree', 'demo_twentyfour', 'demo_twentyfive', 'demo_twentysix', 'demo_twentyseven', 'demo_twentyeight', 'demo_twentynine',
          'demo_thirty', 'demo_thirtyone' , 'demo_thirtytwo'   
    ) );
    
}


/*
|--------------------------------------------------------------------------
| Demo Importer Interface
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'ut_view_updater' ) ) {
	
	function ut_view_updater() { 
        
        /* current user */
        $user_id      = get_current_user_id();
        $current_user = wp_get_current_user();
        $avatar       = get_avatar( $user_id, 160 );
        
        ?>
		
        <div id="ut-admin-wrap" class="clearfix">
            
            <div id="ut-demo-importer-overlay">
            
                <div class="ut-panel-loader ut-panel-loader-demo-importer">
                        
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
                        
                        <h1><?php esc_html_e( 'Relax and lay back while we are preparing your Brooklyn powered Website!', 'unitedthemes' ); ?></h1>
                    
                    </div>
            
                </div>
            
            </div>
            
            <div id="ut-ui-admin-header" class="row-noBottom-noGutter">
        
                <div class="grid-10 medium-grid-15 tablet-grid-20 hide-on-mobile grid-parent">
                                
                    <div class="ut-admin-branding">
                        <a href="http://www.unitedthemes.com" target="_blank"><img src="<?php echo THEME_WEB_ROOT; ?>/unite-custom/admin/assets/img/icons/bklyn-logo-white.svg" alt="UnitedThemes"><span class="version-number">Version <?php echo UT_THEME_VERSION; ?></span></a>
                    </div>
                                            
                </div>
                
                <div class="grid-90 medium-grid-85 tablet-grid-80 mobile-grid-100 grid-parent">
                
                    <div class="ut-admin-header-title">
                    
                        <h1><?php esc_html_e('Demo Installer.', 'unite-admin'); ?></h1>
                    
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
                                <?php echo sprintf( __('Howdy, %1$s' , 'unite'), $current_user->display_name ); ?>
                            </span>                                            
                        </li>

                        <li>
                            <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-welcome-page"><div class="ut-dashboard-home"><img alt="Dashboard" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/dashboard.png"></div><span>Dashboard</span></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo get_admin_url(); ?>admin.php?page=unite-theme-info"><div class="ut-dashboard-server-health"><img alt="Server Health" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/server-health.png"></div><span>Server Health</span></a>
                        </li>
                        
                        <li>
                            <a href="<?php echo get_admin_url(); ?>admin.php?page=<?php echo apply_filters( 'ut_theme_options_page', 'unite-theme-options' ); ?>"><div class="ut-dashboard-theme-option"><img alt="Theme Options" src="<?php echo THEME_WEB_ROOT; ?>/unite/core/admin/assets/img/theme-options.png"></div><span>Theme Options</span></a>
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
                            
                    <h1>Hi Admin! Choose your desire demo!</h1>
                       
                    <div class="hide-on-mobile"><?php esc_html_e( 'Thank you for purchasing our theme. We\'re as excited as you are about the possibilities before you. Finally, its going to be far less complicated to make your WordPress website pages look and feel the way you want. We’ve assembled some links to get you started with the theme, maintain your site and help you to get an overview of all features available.', 'unite-admin' ); ?></div>
                            
                    </div>
                        
                    </div>
                        
                    <div class="clear"></div>
                    
                    <div id="ut-importer-form">
                        
                        <?php 
                        
                        $count = count( ut_recognized_demos() );
                        
                        foreach( ut_recognized_demos() as $key => $demo ) : ?>
                            
                            <div class="grid-33 medium-grid-50 tablet-grid-100 mobile-grid-100">
                                
                                <div class="ut-dashboard-widget">
                                
                                    <h3 class="xml-name"><?php echo $demo['name']; ?></h3>
                                    
                                    <input autocomplete="off" type="radio" id="<?php echo $demo['file']; ?>" name="ut_demo_file" value="<?php echo $demo['file']; ?>" class="ut-choose-demo-radio">
                                    <label class="ut-choose-demo-img" for="<?php echo $demo['file']; ?>">
                                        
                                        <span class="ut-new-badge"><?php echo ( $count == $key + 1 ) ? '0' : $key + 1; ?></span>
                                        <div class="ut-selected-overlay"></div>
                                        <img src="<?php echo THEME_WEB_ROOT; ?>/admin/assets/images/importer/<?php echo !empty( $demo['poster'] ) ? $demo['poster'] : 'demo' . ( $key + 1 ) .'.jpg'; ?>" />
                                        
                                    </label>
                                    
                                    <div class="xml-actions clearfix">
                                        
                                        <div class="xml-actions-left">
                                        
                                        <form action="<?php echo $demo['url']; ?>" target="_blank">
                                            <button class="ut-ui-button ut-ui-button-demo"><?php _e('Preview' , 'unitedthemes'); ?></button>
                                        </form>
                                        
                                        </div>
                                        
                                        <div class="xml-actions-right">
                                    
                                        <form data-demo="<?php echo $demo['name']; ?>" class="ut-import-demo-form" method="POST" action="?page=ut-demo-importer">
                                            <input type="hidden" name="ut_import_demo_content" value="true" />
                                            <input type="hidden" name="ut_demo_file" value="<?php echo $demo['file']; ?>" />
                                            <button data-for="<?php echo $demo['file']; ?>" type="submit" class="ut-ui-button ut-ui-button-blue ut-run-importer"><?php _e('Install' , 'unitedthemes'); ?></button>
                                        </form>
                                        
                                        </div>
                                        
                                    </div>
                                    
                                </div>    
                                
                            </div>
                        
                        <?php endforeach; ?>
                        
                    </div>        
                    
                </div>
            
            </div>
        
        </div>        
        
	<?php }
	
}

/*
|--------------------------------------------------------------------------
| Demo Importer
|--------------------------------------------------------------------------
*/
add_action( 'admin_init', 'ut_demo_importer' );

if ( !function_exists( 'ut_demo_importer' ) ) {

	function ut_demo_importer() {
		
		global $wpdb;
		        
		/* add option flag to wordpress */
		add_option('ut_import_loaded');
		
		/* security array for valid filenames */
		$ut_recognized_file_names = ut_recognized_demo_file_names();
        	
		if ( current_user_can( 'manage_options' ) && isset( $_POST['ut_import_demo_content'] ) && !empty( $_POST['ut_demo_file'] ) ) {
            
			if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
			
			if ( ! class_exists( 'WP_Importer' ) ) {
				$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
				include $class_wp_importer;
			}

			if ( ! class_exists('UT_WP_Import') ) { 
				$class_wp_import = THEME_DOCUMENT_ROOT . '/admin/includes/plugins/importer/wordpress-importer.php';
				include $class_wp_import;
			}	
			
			if ( class_exists( 'WP_Importer' ) && class_exists( 'UT_WP_Import' ) ) {
				
				/*
				|--------------------------------------------------------------------------
				| Import choosen XML
				|--------------------------------------------------------------------------
				*/
				
				$importer = new UT_WP_Import();
				
				$demo_file = sanitize_file_name($_POST['ut_demo_file']);
								
				if ( in_array( $demo_file , $ut_recognized_file_names) ) {
				    
                    if( $demo_file == 'demo_one' || $demo_file == 'demo_three' || $demo_file == 'demo_five' || $demo_file == 'demo_seven' || $demo_file == 'demo_twentythree' || $demo_file == 'demo_twentyfour' || $demo_file == 'demo_twentyfive' || $demo_file == 'demo_twentyseven' || $demo_file == 'demo_twentysix' || $demo_file == 'demo_twentyeight' || $demo_file == 'demo_twentynine' || $demo_file == 'demo_thirty' || $demo_file == 'demo_thirtyone' || $demo_file == 'demo_thirtytwo' ) {                    
                        
                        $theme_xml = THEME_DOCUMENT_ROOT . '/admin/assets/xml/unzip/' . $demo_file . '.xml';                    
                        
                    } else {
                        
                        $theme_xml = THEME_DOCUMENT_ROOT . '/admin/assets/xml/' . $demo_file . '.xml.gz';
                        
                    }
                    
					$importer->fetch_attachments = true;
					ob_start();
					$importer->import($theme_xml);
					ob_end_clean();					
					
				} else {
					
					wp_redirect( admin_url( 'admin.php?page=ut-demo-importer&utimport=failed' ) );
					
				}
				
                
				/*
				|--------------------------------------------------------------------------
				| Set Primary Navigation
				|--------------------------------------------------------------------------
				*/
												
				$locations = get_theme_mod( 'nav_menu_locations' ); 
				$menus = wp_get_nav_menus(); 
				
				if( is_array( $menus ) ) {
					foreach( $menus as $menu ) { // assign menus to theme locations
						
                        $main = ( $demo_file == 'demo_eight' || $demo_file == 'demo_eight_b' ) ? 'Menu 1' : 'Main';
                        $main = $demo_file == 'demo_twentyseven' ? 'Main Menu' : $main;
                        
                        if( $menu->name == $main ) {
							$locations['primary'] = $menu->term_id;
						}
                        
                        if( $demo_file == 'demo_twentyseven' && $menu->name == 'Mobile Menu' ) {
                            $locations['mobile'] = $menu->term_id;    
                        }
                        
					}
                    
				}
				
				set_theme_mod( 'nav_menu_locations', $locations );
				
				/*
				|--------------------------------------------------------------------------
				| Set Reading Options
				|--------------------------------------------------------------------------
				*/
				
				$homepage 	= get_page_by_title( 'Front Page' );
				$posts_page = get_page_by_title( 'Blog' );
				
                if( $demo_file == 'demo_eight' || $demo_file == 'demo_eight_b' ) {
                    $homepage 	= get_page_by_title( 'Frontpage' );
                }
                
                if( $demo_file == 'demo_five' || $demo_file == 'demo_seven' || $demo_file == 'demo_twentynine' ) {
                    $homepage 	= get_page_by_title( 'Home' );
                }
                
                if( $demo_file == 'demo_twentytwo' || $demo_file == 'demo_twentysix' ) {
                    $homepage 	= get_page_by_title( 'Home' );
                }
                
                if( $demo_file == 'demo_thirty' || $demo_file == 'demo_thirtyone' ) {
                    $homepage 	= get_page_by_title( 'Work' );
                }
                
                if( $demo_file == 'demo_twentyfive') {
                    $posts_page = get_page_by_title( 'News' );
                }
                
                if( $demo_file == 'demo_thirtyone') {
                    $posts_page = get_page_by_title( 'Articles' );
                }
                
                if( $demo_file == 'demo_thirtytwo') {
                    $homepage = get_page_by_title( 'Baby' );
                }
                
				if( isset( $homepage->ID ) && isset( $posts_page->ID ) ) {
					update_option('show_on_front', 'page');
					update_option('page_on_front',  $homepage->ID); // Front Page
					update_option('page_for_posts', $posts_page->ID); // Blog Page
				}
				
				/*
				|--------------------------------------------------------------------------
				| Update Theme Options
				|--------------------------------------------------------------------------
				*/
                
                /* run layout loader */
				ut_load_layout_into_ot( $demo_file . '.txt' );					
				
				/*
				|--------------------------------------------------------------------------
				| Revolution Slider Import
				|--------------------------------------------------------------------------
				*/
				    
                if( class_exists('RevSlider') && IMPORT_REV ) { 
                    
                    class UT_RevSlider_Import extends RevSlider {
                        
                        public function importSliderFromPost($updateAnim = true, $updateStatic = true, $exactfilepath = false, $is_template = false, $single_slide = false, $updateNavigation = true){
                            
                            $real_slider_id = '';
                            
                            try{
                                $upload_dir = wp_upload_dir();
                                $rem_path = $upload_dir['basedir'].'/rstemp/';
                                $d_path = $rem_path;
                                
                                $sliderID = RevSliderFunctions::getPostVariable("sliderid");
                                $sliderExists = !empty($sliderID);
                                
                                if($sliderExists)
                                    $this->initByID($sliderID);
                                
                                if($exactfilepath !== false){
                                    
                                    $filepath = $exactfilepath;
                                    
                                }else{
                                    
                                    $filepath = $_FILES["import_file"]["tmp_name"];
                                    
                                }
                                
                                if(file_exists($filepath) == false)
                                    RevSliderFunctions::throwError(__('Import file not found!!!', 'revslider'));
                                
                                $importZip = false;
                                
                                WP_Filesystem();
                                
                                global $wp_filesystem;
                                
                                $unzipfile = unzip_file( $filepath, $d_path);
                                
                                if( is_wp_error($unzipfile) ){
                                    
                                    define('FS_METHOD', 'direct'); //lets try direct. 
                                    
                                    WP_Filesystem();  //WP_Filesystem() needs to be called again since now we use direct !
                                    
                                    //@chmod($filepath, 0775);
                                    
                                    $unzipfile = unzip_file( $filepath, $d_path);
                                    if( is_wp_error($unzipfile) ){
                                        $d_path = RS_PLUGIN_PATH.'rstemp/';
                                        $rem_path = $d_path;
                                        $unzipfile = unzip_file( $filepath, $d_path);
                                        
                                        if( is_wp_error($unzipfile) ){
                                            $f = basename($filepath);
                                            $d_path = str_replace($f, '', $filepath);
                                            
                                            $unzipfile = unzip_file( $filepath, $d_path);
                                        }
                                    }
                                }
                                
                                if( !is_wp_error($unzipfile) ){
                                    $importZip = true; //raus damit..
                                    
                                    //read all files needed
                                    $content = ( $wp_filesystem->exists( $d_path.'slider_export.txt' ) ) ? $wp_filesystem->get_contents( $d_path.'slider_export.txt' ) : '';
                                    if($content == ''){
                                        RevSliderFunctions::throwError(__('slider_export.txt does not exist!', 'revslider'));
                                    }
                                    $animations = ( $wp_filesystem->exists( $d_path.'custom_animations.txt' ) ) ? $wp_filesystem->get_contents( $d_path.'custom_animations.txt' ) : '';
                                    $dynamic = ( $wp_filesystem->exists( $d_path.'dynamic-captions.css' ) ) ? $wp_filesystem->get_contents( $d_path.'dynamic-captions.css' ) : '';
                                    //$static = ( $wp_filesystem->exists( $d_path.'static-captions.css' ) ) ? $wp_filesystem->get_contents( $d_path.'static-captions.css' ) : '';
                                    $navigations = ( $wp_filesystem->exists( $d_path.'navigation.txt' ) ) ? $wp_filesystem->get_contents( $d_path.'navigation.txt' ) : '';
                                    
                                    $uid_check = ( $wp_filesystem->exists( $d_path.'info.cfg' ) ) ? $wp_filesystem->get_contents( $d_path.'info.cfg' ) : '';
                                    $version_check = ( $wp_filesystem->exists( $d_path.'version.cfg' ) ) ? $wp_filesystem->get_contents( $d_path.'version.cfg' ) : '';
                                    
                                    if($is_template !== false){
                                        if($uid_check != $is_template){
                                            return(array("success"=>false,"error"=>__('Please select the correct zip file, checksum failed!', 'revslider')));
                                        }
                                    }else{ //someone imported a template base Slider, check if it is existing in Base Sliders, if yes, check if it was imported
                                        if($uid_check !== ''){
                                            $tmpl = new RevSliderTemplate();
                                            $tmpl_slider = $tmpl->getThemePunchTemplateSliders();
                                            
                                            foreach($tmpl_slider as $tp_slider){
                                                if(!isset($tp_slider['installed'])) continue;
                                                
                                                if($tp_slider['uid'] == $uid_check){
                                                    $is_template = $uid_check;
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                    
                                    $db = new RevSliderDB();
                                    
                                    //update/insert custom animations
                                    $animations = @unserialize($animations);
                                    if(!empty($animations)){
                                        foreach($animations as $key => $animation){ //$animation['id'], $animation['handle'], $animation['params']
                                            $exist = $db->fetch(RevSliderGlobals::$table_layer_anims, $db->prepare("handle = %s", array($animation['handle'])));
                                            if(!empty($exist)){ //update the animation, get the ID
                                                if($updateAnim == "true"){ //overwrite animation if exists
                                                    $arrUpdate = array();
                                                    $arrUpdate['params'] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
                                                    $db->update(RevSliderGlobals::$table_layer_anims, $arrUpdate, array('handle' => $animation['handle']));
                                                    
                                                    $anim_id = $exist['0']['id'];
                                                }else{ //insert with new handle
                                                    $arrInsert = array();
                                                    $arrInsert["handle"] = 'copy_'.$animation['handle'];
                                                    $arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
                                                    
                                                    $anim_id = $db->insert(RevSliderGlobals::$table_layer_anims, $arrInsert);
                                                }
                                            }else{ //insert the animation, get the ID
                                                $arrInsert = array();
                                                $arrInsert["handle"] = $animation['handle'];
                                                $arrInsert["params"] = stripslashes(json_encode(str_replace("'", '"', $animation['params'])));
                                                
                                                $anim_id = $db->insert(RevSliderGlobals::$table_layer_anims, $arrInsert);
                                            }
                                            
                                            //and set the current customin-oldID and customout-oldID in slider params to new ID from $id
                                            $content = str_replace(array('customin-'.$animation['id'].'"', 'customout-'.$animation['id'].'"'), array('customin-'.$anim_id.'"', 'customout-'.$anim_id.'"'), $content);	
                                        }
                                        //dmp(__("animations imported!",'revslider'));
                                    }
                                    
                                    //overwrite/append static-captions.css
                                    /*if(!empty($static)){
                                        if($updateStatic == "true"){ //overwrite file
                                            RevSliderOperations::updateStaticCss($static);
                                        }elseif($updateStatic == 'none'){
                                            //do nothing
                                        }else{//append
                                            $static_cur = RevSliderOperations::getStaticCss();
                                            $static = $static_cur."\n".$static;
                                            RevSliderOperations::updateStaticCss($static);
                                        }
                                    }*/
                                    
                                    //overwrite/create dynamic-captions.css
                                    //parse css to classes
                                    $dynamicCss = RevSliderCssParser::parseCssToArray($dynamic);
                                    if(is_array($dynamicCss) && $dynamicCss !== false && count($dynamicCss) > 0){
                                        foreach($dynamicCss as $class => $styles){
                                            //check if static style or dynamic style
                                            $class = trim($class);
                                            
                                            if(strpos($class, ',') !== false && strpos($class, '.tp-caption') !== false){ //we have something like .tp-caption.redclass, .redclass
                                                $class_t = explode(',', $class);
                                                foreach($class_t as $k => $cl){
                                                    if(strpos($cl, '.tp-caption') !== false) $class = $cl;
                                                }
                                            }
                                            
                                            if((strpos($class, ':hover') === false && strpos($class, ':') !== false) || //before, after
                                                strpos($class," ") !== false || // .tp-caption.imageclass img or .tp-caption .imageclass or .tp-caption.imageclass .img
                                                strpos($class,".tp-caption") === false || // everything that is not tp-caption
                                                (strpos($class,".") === false || strpos($class,"#") !== false) || // no class -> #ID or img
                                                strpos($class,">") !== false){ //.tp-caption>.imageclass or .tp-caption.imageclass>img or .tp-caption.imageclass .img
                                                continue;
                                            }
                                            
                                            //is a dynamic style
                                            if(strpos($class, ':hover') !== false){
                                                $class = trim(str_replace(':hover', '', $class));
                                                $arrInsert = array();
                                                $arrInsert["hover"] = json_encode($styles);
                                                $arrInsert["settings"] = json_encode(array('hover' => 'true'));
                                            }else{
                                                $arrInsert = array();
                                                $arrInsert["params"] = json_encode($styles);
                                                $arrInsert["settings"] = '';
                                            }
                                            //check if class exists
                                            $result = $db->fetch(RevSliderGlobals::$table_css, $db->prepare("handle = %s", array($class)));
                                            
                                            if(!empty($result)){ //update
                                                $db->update(RevSliderGlobals::$table_css, $arrInsert, array('handle' => $class));
                                            }else{ //insert
                                                $arrInsert["handle"] = $class;
                                                $db->insert(RevSliderGlobals::$table_css, $arrInsert);
                                            }
                                        }
                                        //dmp(__("dynamic styles imported!",'revslider'));
                                    }
                                    
                                    //update/insert custom animations
                                    $navigations = @unserialize($navigations);
                                    if(!empty($navigations)){
                                        
                                        foreach($navigations as $key => $navigation){
                                            $exist = $db->fetch(RevSliderGlobals::$table_navigation, $db->prepare("handle = %s", array($navigation['handle'])));
                                            unset($navigation['id']);
                                            
                                            $rh = $navigation["handle"];
                                            if(!empty($exist)){ //create new navigation, get the ID
                                                if($updateNavigation == "true"){ //overwrite navigation if exists
                                                    unset($navigation['handle']);
                                                    $db->update(RevSliderGlobals::$table_navigation, $navigation, array('handle' => $rh));
                                                    
                                                }else{
                                                    //insert with new handle
                                                    $navigation["handle"] = $navigation['handle'].'-'.date('is');
                                                    $navigation["name"] = $navigation['name'].'-'.date('is');
                                                    $content = str_replace($rh.'"', $navigation["handle"].'"', $content);
                                                    $navigation["css"] = str_replace('.'.$rh, '.'.$navigation["handle"], $navigation["css"]); //change css class to the correct new class
                                                    $navi_id = $db->insert(RevSliderGlobals::$table_navigation, $navigation);
                                                    
                                                }
                                            }else{
                                                $navi_id = $db->insert(RevSliderGlobals::$table_navigation, $navigation);
                                            }
                                        }
                                        //dmp(__("navigations imported!",'revslider'));
                                    }
                                }else{
                                    $message = $unzipfile->get_error_message();
                                    
                                    $wp_filesystem->delete($rem_path, true);
                                    
                                    return(array("success"=>false,"error"=>$message));
                                }
                                
                                //$content = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $content); //clear errors in string //deprecated in newest php version
                                $content = preg_replace_callback('!s:(\d+):"(.*?)";!', array('RevSliderSlider', 'clear_error_in_string') , $content); //clear errors in string
                                
                                $arrSlider = @unserialize($content);
                                if(empty($arrSlider)){
                                    $wp_filesystem->delete($rem_path, true);
                                    RevSliderFunctions::throwError(__('Wrong export slider file format! Please make sure that the uploaded file is either a zip file with a correct slider_export.txt in the root of it or an valid slider_export.txt file.', 'revslider'));
                                }
                                
                                //update slider params
                                $sliderParams = $arrSlider["params"];
                                
                                if($sliderExists){
                                    $sliderParams["title"] = $this->arrParams["title"];
                                    $sliderParams["alias"] = $this->arrParams["alias"];
                                    $sliderParams["shortcode"] = $this->arrParams["shortcode"];
                                }
                                
                                if(isset($sliderParams["background_image"]))
                                    $sliderParams["background_image"] = RevSliderFunctionsWP::getImageUrlFromPath($sliderParams["background_image"]);
                                
                                
                                $import_statics = true;
                                if(isset($sliderParams['enable_static_layers'])){
                                    if($sliderParams['enable_static_layers'] == 'off') $import_statics = false;
                                    unset($sliderParams['enable_static_layers']);
                                }
                                
                                $sliderParams['version'] = $version_check;
                                
                                $json_params = json_encode($sliderParams);
                                
                                //update slider or create new
                                if($sliderExists){
                                    $arrUpdate = array("params"=>$json_params);	
                                    $this->db->update(RevSliderGlobals::$table_sliders,$arrUpdate,array("id"=>$sliderID));
                                }else{	//new slider
                                    $arrInsert = array();
                                    $arrInsert['params'] = $json_params;
                                    //check if Slider with title and/or alias exists, if yes change both to stay unique
                                    
                                    
                                    $arrInsert['title'] = RevSliderFunctions::getVal($sliderParams, 'title', 'Slider1');
                                    $arrInsert['alias'] = RevSliderFunctions::getVal($sliderParams, 'alias', 'slider1');	
                                    if($is_template === false){ //we want to stay at the given alias if we are a template
                                        $talias = $arrInsert['alias'];
                                        $ti = 1;
                                        while($this->isAliasExistsInDB($talias)){ //set a new alias and title if its existing in database
                                            $talias = $arrInsert['alias'] . $ti;
                                            $ti++;
                                        }
                                        
                                        if($talias !== $arrInsert['alias']){
                                            $sliderParams['title'] = $talias;
                                            $sliderParams['alias'] = $talias;
                                            $arrInsert['title'] = $talias;
                                            $arrInsert['alias'] = $talias;
                                            $json_params = json_encode($sliderParams);
                                            $arrInsert['params'] = $json_params;
                                        }
                                    }
                                    
                                    if($is_template !== false){ //add that we are an template
                                        $arrInsert['type'] = 'template';
                                        $sliderParams['uid'] = $is_template;
                                        $json_params = json_encode($sliderParams);
                                        $arrInsert['params'] = $json_params;
                                    }
                                    
                                    
                                    
                                    $sliderID = $this->db->insert(RevSliderGlobals::$table_sliders,$arrInsert);
                                }
                                
                                //-------- Slides Handle -----------
                                
                                //delete current slides
                                if($sliderExists)
                                    $this->deleteAllSlides();
                                
                                //create all slides
                                $arrSlides = $arrSlider["slides"];
                                
                                $alreadyImported = array();
                                
                                $content_url = content_url();
                                
                                //wpml compatibility
                                $slider_map = array();
                                foreach($arrSlides as $sl_key => $slide){
                                    $params = $slide["params"];
                                    $layers = $slide["layers"];
                                    $settings = (isset($slide["settings"])) ? $slide["settings"] : '';
                                    
                                    //convert params images:
                                    if($importZip === true){ //we have a zip, check if exists
                                        //remove image_id as it is not needed in import
                                        if(isset($params['image_id'])) unset($params['image_id']);
                                        
                                        if(isset($params["image"])){
                                            $params["image"] = RevSliderBase::check_file_in_zip($d_path, $params["image"], $sliderParams["alias"], $alreadyImported);
                                            $params["image"] = RevSliderFunctionsWP::getImageUrlFromPath($params["image"]);
                                        }
                                        
                                        if(isset($params["background_image"])){
                                            $params["background_image"] = RevSliderBase::check_file_in_zip($d_path, $params["background_image"], $sliderParams["alias"], $alreadyImported);
                                            $params["background_image"] = RevSliderFunctionsWP::getImageUrlFromPath($params["background_image"]);
                                        }
                                        
                                        if(isset($params["slide_thumb"])){
                                            $params["slide_thumb"] = RevSliderBase::check_file_in_zip($d_path, $params["slide_thumb"], $sliderParams["alias"], $alreadyImported);
                                            $params["slide_thumb"] = RevSliderFunctionsWP::getImageUrlFromPath($params["slide_thumb"]);
                                        }
                                        
                                        if(isset($params["show_alternate_image"])){
                                            $params["show_alternate_image"] = RevSliderBase::check_file_in_zip($d_path, $params["show_alternate_image"], $sliderParams["alias"], $alreadyImported);
                                            $params["show_alternate_image"] = RevSliderFunctionsWP::getImageUrlFromPath($params["show_alternate_image"]);
                                        }
                                        if(isset($params['background_type']) && $params['background_type'] == 'html5'){
                                            if(isset($params['slide_bg_html_mpeg']) && $params['slide_bg_html_mpeg'] != ''){
                                                $params['slide_bg_html_mpeg'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $params["slide_bg_html_mpeg"], $sliderParams["alias"], $alreadyImported, true));
                                            }
                                            if(isset($params['slide_bg_html_webm']) && $params['slide_bg_html_webm'] != ''){
                                                $params['slide_bg_html_webm'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $params["slide_bg_html_webm"], $sliderParams["alias"], $alreadyImported, true));
                                            }
                                            if(isset($params['slide_bg_html_ogv'])  && $params['slide_bg_html_ogv'] != ''){
                                                $params['slide_bg_html_ogv'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $params["slide_bg_html_ogv"], $sliderParams["alias"], $alreadyImported, true));
                                            }
                                        }
                                    }
                                    
                                    
                                    //convert layers images:
                                    foreach($layers as $key=>$layer){					
                                        //import if exists in zip folder
                                        if($importZip === true){ //we have a zip, check if exists
                                            if(isset($layer["image_url"])){
                                                $layer["image_url"] = RevSliderBase::check_file_in_zip($d_path, $layer["image_url"], $sliderParams["alias"], $alreadyImported);
                                                $layer["image_url"] = RevSliderFunctionsWP::getImageUrlFromPath($layer["image_url"]);
                                            }
                                            if(isset($layer["bgimage_url"])){
                                                $layer["bgimage_url"] = RevSliderBase::check_file_in_zip($d_path, $layer["bgimage_url"], $sliderParams["alias"], $alreadyImported);
                                                $layer["bgimage_url"] = RevSliderFunctionsWP::getImageUrlFromPath($layer["bgimage_url"]);
                                            }
                                            if(isset($layer['type']) && ($layer['type'] == 'video' || $layer['type'] == 'audio')){
                                                
                                                $video_data = (isset($layer['video_data'])) ? (array) $layer['video_data'] : array();
                                                
                                                if(!empty($video_data) && isset($video_data['video_type']) && $video_data['video_type'] == 'html5'){
                    
                                                    if(isset($video_data['urlPoster']) && $video_data['urlPoster'] != ''){
                                                        $video_data['urlPoster'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlPoster"], $sliderParams["alias"], $alreadyImported));
                                                    }
                                                    
                                                    if(isset($video_data['urlMp4']) && $video_data['urlMp4'] != ''){
                                                        $video_data['urlMp4'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlMp4"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    if(isset($video_data['urlWebm']) && $video_data['urlWebm'] != ''){
                                                        $video_data['urlWebm'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlWebm"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    if(isset($video_data['urlOgv']) && $video_data['urlOgv'] != ''){
                                                        $video_data['urlOgv'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlOgv"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    
                                                }elseif(!empty($video_data) && isset($video_data['video_type']) && $video_data['video_type'] != 'html5'){ //video cover image
                                                    if($video_data['video_type'] == 'audio'){
                                                        if(isset($video_data['urlAudio']) && $video_data['urlAudio'] != ''){
                                                            $video_data['urlAudio'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlAudio"], $sliderParams["alias"], $alreadyImported, true));
                                                        }
                                                    }else{
                                                        if(isset($video_data['previewimage']) && $video_data['previewimage'] != ''){
                                                            $video_data['previewimage'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["previewimage"], $sliderParams["alias"], $alreadyImported));
                                                        }
                                                    }
                                                }
                                                
                                                $layer['video_data'] = $video_data;
                                                
                                                if(isset($layer['video_image_url']) && $layer['video_image_url'] != ''){
                                                    $layer['video_image_url'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $layer["video_image_url"], $sliderParams["alias"], $alreadyImported));
                                                }
                                            }
                                            
                                            if(isset($layer['type']) && $layer['type'] == 'svg'){
                                                if(isset($layer['svg']) && isset($layer['svg']->src)){
                                                    $layer['svg']->src = $content_url.$layer['svg']->src;
                                                }
                                            }
                                            
                                        }
                                        
                                        $layer['text'] = stripslashes($layer['text']);
                                        $layers[$key] = $layer;
                                    }
                                    $arrSlides[$sl_key]['layers'] = $layers;
                                    
                                    //create new slide
                                    $arrCreate = array();
                                    $arrCreate["slider_id"] = $sliderID;
                                    $arrCreate["slide_order"] = $slide["slide_order"];
                                    
                                    $my_layers = json_encode($layers);
                                    if(empty($my_layers))
                                        $my_layers = stripslashes(json_encode($layers));
                                    $my_params = json_encode($params);
                                    if(empty($my_params))
                                        $my_params = stripslashes(json_encode($params));
                                    $my_settings = json_encode($settings);
                                    if(empty($my_settings))
                                        $my_settings = stripslashes(json_encode($settings));
                                    
                                    
                                    $arrCreate["layers"] = $my_layers;
                                    $arrCreate["params"] = $my_params;
                                    $arrCreate["settings"] = $my_settings;
                                    
                                    $last_id = $this->db->insert(RevSliderGlobals::$table_slides,$arrCreate);
                                    
                                    if(isset($slide['id'])){
                                        $slider_map[$slide['id']] = $last_id;
                                    }
                                }
                                
                                //change for WPML the parent IDs if necessary
                                if(!empty($slider_map)){
                                    foreach($arrSlides as $sl_key => $slide){
                                        if(isset($slide['params']['parentid']) && isset($slider_map[$slide['params']['parentid']])){
                                            $update_id = $slider_map[$slide['id']];
                                            $parent_id = $slider_map[$slide['params']['parentid']];
                                            
                                            $arrCreate = array();
                                            
                                            $arrCreate["params"] = $slide['params'];
                                            $arrCreate["params"]['parentid'] = $parent_id;
                                            $my_params = json_encode($arrCreate["params"]);
                                            if(empty($my_params))
                                                $my_params = stripslashes(json_encode($arrCreate["params"]));
                                            
                                            $arrCreate["params"] = $my_params;
                                            
                                            $this->db->update(RevSliderGlobals::$table_slides,$arrCreate,array("id"=>$update_id));
                                        }
                                        
                                        $did_change = false;
                                        foreach($slide['layers'] as $key => $value){
                                            if(isset($value['layer_action'])){
                                                if(isset($value['layer_action']->jump_to_slide) && !empty($value['layer_action']->jump_to_slide)){
                                                    $value['layer_action']->jump_to_slide = (array)$value['layer_action']->jump_to_slide;
                                                    foreach($value['layer_action']->jump_to_slide as $jtsk => $jtsval){
                                                        if(isset($slider_map[$jtsval])){
                                                            $slide['layers'][$key]['layer_action']->jump_to_slide[$jtsk] = $slider_map[$jtsval];
                                                            $did_change = true;
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            $link_slide = RevSliderFunctions::getVal($value, 'link_slide', false);
                                            if($link_slide != false && $link_slide !== 'nothing'){ //link to slide/scrollunder is set, move it to actions
                                                if(!isset($slide['layers'][$key]['layer_action'])) $slide['layers'][$key]['layer_action'] = new stdClass();
                                                switch($link_slide){
                                                    case 'link':
                                                        $link = RevSliderFunctions::getVal($value, 'link');
                                                        $link_open_in = RevSliderFunctions::getVal($value, 'link_open_in');
                                                        $slide['layers'][$key]['layer_action']->action = array('a' => 'link');
                                                        $slide['layers'][$key]['layer_action']->link_type = array('a' => 'a');
                                                        $slide['layers'][$key]['layer_action']->image_link = array('a' => $link);
                                                        $slide['layers'][$key]['layer_action']->link_open_in = array('a' => $link_open_in);
                                                        
                                                        unset($slide['layers'][$key]['link']);
                                                        unset($slide['layers'][$key]['link_open_in']);
                                                    case 'next':
                                                        $slide['layers'][$key]['layer_action']->action = array('a' => 'next');
                                                    break;
                                                    case 'prev':
                                                        $slide['layers'][$key]['layer_action']->action = array('a' => 'prev');
                                                    break;
                                                    case 'scroll_under':
                                                        $scrollunder_offset = RevSliderFunctions::getVal($value, 'scrollunder_offset');
                                                        $slide['layers'][$key]['layer_action']->action = array('a' => 'scroll_under');
                                                        $slide['layers'][$key]['layer_action']->scrollunder_offset = array('a' => $scrollunder_offset);
                                                        
                                                        unset($slide['layers'][$key]['scrollunder_offset']);
                                                    break;
                                                    default: //its an ID, so its a slide ID
                                                        $slide['layers'][$key]['layer_action']->action = array('a' => 'jumpto');
                                                        $slide['layers'][$key]['layer_action']->jump_to_slide = array('a' => $slider_map[$link_slide]);
                                                    break;
                                                    
                                                }
                                                $slide['layers'][$key]['layer_action']->tooltip_event = array('a' => 'click');
                                                
                                                unset($slide['layers'][$key]['link_slide']);
                                                
                                                $did_change = true;
                                            }
                                            
                                            
                                            if($did_change === true){
                                                
                                                $arrCreate = array();
                                                $my_layers = json_encode($slide['layers']);
                                                if(empty($my_layers))
                                                    $my_layers = stripslashes(json_encode($layers));
                                                
                                                $arrCreate['layers'] = $my_layers;
                                                
                                                $this->db->update(RevSliderGlobals::$table_slides,$arrCreate,array("id"=>$slider_map[$slide['id']]));
                                            }
                                        }
                                    }
                                }
                                
                                //check if static slide exists and import
                                if(isset($arrSlider['static_slides']) && !empty($arrSlider['static_slides']) && $import_statics){
                                    $static_slide = $arrSlider['static_slides'];
                                    foreach($static_slide as $slide){
                                        
                                        $params = $slide["params"];
                                        $layers = $slide["layers"];
                                        $settings = (isset($slide["settings"])) ? $slide["settings"] : '';
                                        
                                        //remove image_id as it is not needed in import
                                        if(isset($params['image_id'])) unset($params['image_id']);
                                        
                                        //convert params images:
                                        if(isset($params["image"])){
                                            //import if exists in zip folder
                                            if(strpos($params["image"], 'http') !== false){
                                            }else{
                                                if(trim($params["image"]) !== ''){
                                                    if($importZip === true){ //we have a zip, check if exists
                                                        $image = $wp_filesystem->exists( $d_path.'images/'.$params["image"] );
                                                        if(!$image){
                                                            echo $params["image"].__(' not found!<br>', 'revslider');
                                                        }else{
                                                            if(!isset($alreadyImported['images/'.$params["image"]])){
                                                                $importImage = RevSliderFunctionsWP::import_media($d_path.'images/'.$params["image"], $sliderParams["alias"].'/');
                    
                                                                if($importImage !== false){
                                                                    $alreadyImported['images/'.$params["image"]] = $importImage['path'];
                                                                    
                                                                    $params["image"] = $importImage['path'];
                                                                }
                                                            }else{
                                                                $params["image"] = $alreadyImported['images/'.$params["image"]];
                                                            }
                    
                    
                                                        }
                                                    }
                                                }
                                                $params["image"] = RevSliderFunctionsWP::getImageUrlFromPath($params["image"]);
                                            }
                                        }
                                        
                                        //convert layers images:
                                        foreach($layers as $key=>$layer){
                                            if(isset($layer["image_url"])){
                                                //import if exists in zip folder
                                                if(trim($layer["image_url"]) !== ''){
                                                    if(strpos($layer["image_url"], 'http') !== false){
                                                    }else{
                                                        if($importZip === true){ //we have a zip, check if exists
                                                            $image_url = $wp_filesystem->exists( $d_path.'images/'.$layer["image_url"] );
                                                            if(!$image_url){
                                                                echo $layer["image_url"].__(' not found!<br>','revslider');
                                                            }else{
                                                                if(!isset($alreadyImported['images/'.$layer["image_url"]])){
                                                                    $importImage = RevSliderFunctionsWP::import_media($d_path.'images/'.$layer["image_url"], $sliderParams["alias"].'/');
                                                                    
                                                                    if($importImage !== false){
                                                                        $alreadyImported['images/'.$layer["image_url"]] = $importImage['path'];
                                                                        
                                                                        $layer["image_url"] = $importImage['path'];
                                                                    }
                                                                }else{
                                                                    $layer["image_url"] = $alreadyImported['images/'.$layer["image_url"]];
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                $layer["image_url"] = RevSliderFunctionsWP::getImageUrlFromPath($layer["image_url"]);
                                            }
                                            if(isset($layer["bgimage_url"])){
                                                //import if exists in zip folder
                                                if(trim($layer["bgimage_url"]) !== ''){
                                                    if(strpos($layer["bgimage_url"], 'http') !== false){
                                                    }else{
                                                        if($importZip === true){ //we have a zip, check if exists
                                                            $bgimage_url = $wp_filesystem->exists( $d_path.'images/'.$layer["bgimage_url"] );
                                                            if(!$bgimage_url){
                                                                echo $layer["bgimage_url"].__(' not found!<br>','revslider');
                                                            }else{
                                                                if(!isset($alreadyImported['images/'.$layer["bgimage_url"]])){
                                                                    $importImage = RevSliderFunctionsWP::import_media($d_path.'images/'.$layer["bgimage_url"], $sliderParams["alias"].'/');
                                                                    
                                                                    if($importImage !== false){
                                                                        $alreadyImported['images/'.$layer["bgimage_url"]] = $importImage['path'];
                                                                        
                                                                        $layer["bgimage_url"] = $importImage['path'];
                                                                    }
                                                                }else{
                                                                    $layer["bgimage_url"] = $alreadyImported['images/'.$layer["bgimage_url"]];
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                                $layer["bgimage_url"] = RevSliderFunctionsWP::getImageUrlFromPath($layer["bgimage_url"]);
                                            }
                                            
                                            $layer['text'] = stripslashes($layer['text']);
                                                
                                            if(isset($layer['type']) && ($layer['type'] == 'video' || $layer['type'] == 'audio')){
                                                
                                                $video_data = (isset($layer['video_data'])) ? (array) $layer['video_data'] : array();
                                                
                                                if(!empty($video_data) && isset($video_data['video_type']) && $video_data['video_type'] == 'html5'){
                    
                                                    if(isset($video_data['urlPoster']) && $video_data['urlPoster'] != ''){
                                                        $video_data['urlPoster'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlPoster"], $sliderParams["alias"], $alreadyImported));
                                                    }
                                                    if(isset($video_data['urlMp4']) && $video_data['urlMp4'] != ''){
                                                        $video_data['urlMp4'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlMp4"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    if(isset($video_data['urlWebm']) && $video_data['urlWebm'] != ''){
                                                        $video_data['urlWebm'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlWebm"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    if(isset($video_data['urlOgv']) && $video_data['urlOgv'] != ''){
                                                        $video_data['urlOgv'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlOgv"], $sliderParams["alias"], $alreadyImported, true));
                                                    }
                                                    
                                                }elseif(!empty($video_data) && isset($video_data['video_type']) && $video_data['video_type'] != 'html5'){ //video cover image
                                                    if($video_data['video_type'] == 'audio'){
                                                        if(isset($video_data['urlAudio']) && $video_data['urlAudio'] != ''){
                                                            $video_data['urlAudio'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["urlAudio"], $sliderParams["alias"], $alreadyImported, true));
                                                        }
                                                    }else{
                                                        if(isset($video_data['previewimage']) && $video_data['previewimage'] != ''){
                                                            $video_data['previewimage'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $video_data["previewimage"], $sliderParams["alias"], $alreadyImported));
                                                        }
                                                    }
                                                }
                                                
                                                $layer['video_data'] = $video_data;
                                                
                                                if(isset($layer['video_image_url']) && $layer['video_image_url'] != ''){
                                                    $layer['video_image_url'] = RevSliderFunctionsWP::getImageUrlFromPath(RevSliderBase::check_file_in_zip($d_path, $layer["video_image_url"], $sliderParams["alias"], $alreadyImported));
                                                }
                                            }
                                            
                                            if(isset($layer['type']) && $layer['type'] == 'svg'){
                                                if(isset($layer['svg']) && isset($layer['svg']->src)){
                                                    $layer['svg']->src = $content_url.$layer['svg']->src;
                                                }
                                            }
                                            
                                            if(isset($layer['layer_action'])){
                                                if(isset($layer['layer_action']->jump_to_slide) && !empty($layer['layer_action']->jump_to_slide)){
                                                    foreach($layer['layer_action']->jump_to_slide as $jtsk => $jtsval){
                                                        if(isset($slider_map[$jtsval])){
                                                            $layer['layer_action']->jump_to_slide[$jtsk] = $slider_map[$jtsval];
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            $link_slide = RevSliderFunctions::getVal($layer, 'link_slide', false);
                                            if($link_slide != false && $link_slide !== 'nothing'){ //link to slide/scrollunder is set, move it to actions
                                                if(!isset($layer['layer_action'])) $layer['layer_action'] = new stdClass();
                                                
                                                switch($link_slide){
                                                    case 'link':
                                                        $link = RevSliderFunctions::getVal($layer, 'link');
                                                        $link_open_in = RevSliderFunctions::getVal($layer, 'link_open_in');
                                                        $layer['layer_action']->action = array('a' => 'link');
                                                        $layer['layer_action']->link_type = array('a' => 'a');
                                                        $layer['layer_action']->image_link = array('a' => $link);
                                                        $layer['layer_action']->link_open_in = array('a' => $link_open_in);
                                                        
                                                        unset($layer['link']);
                                                        unset($layer['link_open_in']);
                                                    case 'next':
                                                        $layer['layer_action']->action = array('a' => 'next');
                                                    break;
                                                    case 'prev':
                                                        $layer['layer_action']->action = array('a' => 'prev');
                                                    break;
                                                    case 'scroll_under':
                                                        $scrollunder_offset = RevSliderFunctions::getVal($value, 'scrollunder_offset');
                                                        $layer['layer_action']->action = array('a' => 'scroll_under');
                                                        $layer['layer_action']->scrollunder_offset = array('a' => $scrollunder_offset);
                                                        
                                                        unset($layer['scrollunder_offset']);
                                                    break;
                                                    default: //its an ID, so its a slide ID
                                                        $layer['layer_action']->action = array('a' => 'jumpto');
                                                        $layer['layer_action']->jump_to_slide = array('a' => $slider_map[$link_slide]);
                                                    break;
                                                    
                                                }
                                                $layer['layer_action']->tooltip_event = array('a' => 'click');
                                                
                                                unset($layer['link_slide']);
                                                
                                                $did_change = true;
                                            }
                                            
                                            $layers[$key] = $layer;
                                        }
                                        
                                        //create new slide
                                        $arrCreate = array();
                                        $arrCreate["slider_id"] = $sliderID;
                                        
                                        $my_layers = json_encode($layers);
                                        if(empty($my_layers))
                                            $my_layers = stripslashes(json_encode($layers));
                                        $my_params = json_encode($params);
                                        if(empty($my_params))
                                            $my_params = stripslashes(json_encode($params));
                                        $my_settings = json_encode($settings);
                                        if(empty($my_settings))
                                            $my_settings = stripslashes(json_encode($settings));
                                            
                                            
                                        $arrCreate["layers"] = $my_layers;
                                        $arrCreate["params"] = $my_params;
                                        $arrCreate["settings"] = $my_settings;
                                        
                                        if($sliderExists){
                                            unset($arrCreate["slider_id"]);
                                            $this->db->update(RevSliderGlobals::$table_static_slides,$arrCreate,array("slider_id"=>$sliderID));
                                        }else{
                                            $this->db->insert(RevSliderGlobals::$table_static_slides,$arrCreate);
                                        }
                                    }
                                }
                                
                                $c_slider = new RevSliderSlider();
                                $c_slider->initByID($sliderID);
                                
                                //check to convert styles to latest versions
                                RevSliderPluginUpdate::update_css_styles(); //set to version 5
                                RevSliderPluginUpdate::add_animation_settings_to_layer($c_slider); //set to version 5
                                RevSliderPluginUpdate::add_style_settings_to_layer($c_slider); //set to version 5
                                RevSliderPluginUpdate::change_settings_on_layers($c_slider); //set to version 5
                                RevSliderPluginUpdate::add_general_settings($c_slider); //set to version 5
                                RevSliderPluginUpdate::change_general_settings_5_0_7($c_slider); //set to version 5.0.7
                                RevSliderPluginUpdate::change_layers_svg_5_2_5_5($c_slider); //set to version 5.2.5.5
                                
                                $cus_js = $c_slider->getParam('custom_javascript', '');
                                
                                if(strpos($cus_js, 'revapi') !== false){
                                    if(preg_match_all('/revapi[0-9]*/', $cus_js, $results)){
                                        
                                        if(isset($results[0]) && !empty($results[0])){
                                            foreach($results[0] as $replace){
                                                $cus_js = str_replace($replace, 'revapi'.$sliderID, $cus_js);
                                            }
                                        }
                                        
                                        $c_slider->updateParam(array('custom_javascript' => $cus_js));
                                        
                                    }
                                    
                                }
                                
                                $real_slider_id = $sliderID;
                                
                                if($is_template !== false){ //duplicate the slider now, as we just imported the "template"
                                    if($single_slide !== false){ //add now one Slide to the current Slider
                                        $mslider = new RevSlider();
                                        
                                        //change slide_id to correct, as it currently is just a number beginning from 0 as we did not have a correct slide ID yet.
                                        $i = 0;
                                        $changed = false;
                                        foreach($slider_map as $value){
                                            if($i == $single_slide['slide_id']){
                                                $single_slide['slide_id'] = $value;
                                                $changed = true;
                                                break;
                                            }
                                            $i++;
                                        }
                                        
                                        if($changed){
                                            $return = $mslider->copySlideToSlider($single_slide);
                                        }else{
                                            return(array("success"=>false,"error"=>__('could not find correct Slide to copy, please try again.', 'revslider'),"sliderID"=>$sliderID));
                                        }
                                        
                                    }else{
                                        $mslider = new RevSlider();
                                        $title = RevSliderFunctions::getVal($sliderParams, 'title', 'slider1');	
                                        $talias = $title;
                                        $ti = 1;
                                        while($this->isAliasExistsInDB($talias)){ //set a new alias and title if its existing in database
                                            $talias = $title . $ti;
                                            $ti++;
                                        }
                                        $real_slider_id = $mslider->duplicateSliderFromData(array('sliderid' => $sliderID, 'title' => $talias));
                                    }
                    
                                }
                                
                                $wp_filesystem->delete($rem_path, true);
                                
                                
                            }catch(Exception $e){
                                $errorMessage = $e->getMessage();
                                
                                if(isset($rem_path)){
                                    $wp_filesystem->delete($rem_path, true);
                                }
                                return(array("success"=>false,"error"=>$errorMessage,"sliderID"=>$sliderID));
                            }
                            
                            do_action('revslider_slider_imported', $real_slider_id);
                            
                            return(array("success"=>true,"sliderID"=>$real_slider_id));    
                            
                            
                            
                                
                        
                        
                        }
                        
                    }
                     
                     
                     
                        
                    $rev_directory = THEME_DOCUMENT_ROOT . '/admin/assets/optionsdata/revslider/'; 
                    
                    foreach( glob( $rev_directory . '*.zip' ) as $filename ) {
                        
                        $_FILES["import_file"]["tmp_name"] = THEME_DOCUMENT_ROOT . '/admin/assets/optionsdata/revslider/' . basename( $filename );
                           
                        $slider = new UT_RevSlider_Import();
                        $slider->importSliderFromPost();
                        
                    }
                    
                    
                    /* old slider */                        
                    $rev_files = array();
                    
                    foreach( glob( $rev_directory . '*.txt' ) as $filename ) {
                        $filename = basename($filename);
                        $rev_files[] = THEME_WEB_ROOT . '/admin/assets/optionsdata/revslider/' . $filename ;
                    }
                                            
                    foreach( $rev_files as $rev_file ) {
                        
                        $get_file = wp_remote_get( $rev_file );
                        $arrSlider = unserialize( $get_file['body'] );
    
                        $sliderParams = $arrSlider["params"];
    
                        if(isset($sliderParams["background_image"])) {
                            $sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);
                        }
    
                        $json_params = json_encode($sliderParams);
    
                        $arrInsert = array();
                        $arrInsert["params"] = $json_params;
                        $arrInsert["title"] = UniteFunctionsRev::getVal($sliderParams, "title","Slider1");
                        $arrInsert["alias"] = UniteFunctionsRev::getVal($sliderParams, "alias","slider1");
    
                        $wpdb->insert(GlobalsRevSlider::$table_sliders, $arrInsert);
                        $sliderID = $wpdb->insert_id;
                       
                        //create all slides
                        $arrSlides = $arrSlider["slides"];
                        foreach( $arrSlides as $slide ){
                            
                            $params = $slide["params"];
                            $layers = $slide["layers"];
                            
                            //convert params images:
                            if(isset($params["image"])) {
                                $params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
                            }
                            
                            //convert layers images:
                            foreach($layers as $key=>$layer){					
                                if(isset($layer["image_url"])){
                                    $layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
                                    $layers[$key] = $layer;
                                }
                            }
                            
                            //create new slide
                            $arrCreate = array();
                            $arrCreate["slider_id"] = $sliderID;
                            $arrCreate["slide_order"] = $slide["slide_order"];				
                            $arrCreate["layers"] = json_encode($layers);
                            $arrCreate["params"] = json_encode($params);
    
                            $wpdb->insert(GlobalsRevSlider::$table_slides,$arrCreate);				
                        }
                    }
                }
				
				
				/*
				|--------------------------------------------------------------------------
				| Set Default Logo for Navigation
				|--------------------------------------------------------------------------
				*/
				$logo_to_demo = array(
					'demo_one'	        => 'brooklyn-logo-dark.png', 
					'demo_two'          => 'brooklyn-logo-light.png',
                    'demo_two_b'        => 'brooklyn-logo-light.png',  
					'demo_three'        => 'brooklyn-logo-dark.png', 
					'demo_four'	        => 'brooklyn-logo-light.png', 
					'demo_six'	        => 'brooklyn-logo-light.png',
					'demo_seven'        => 'brooklyn-logo-dark.png',
					'demo_eight'        => 'brooklyn-logo-dark.png',
                    'demo_eight_b'      => 'brooklyn-logo-dark.png',
                    'demo_nine'         => 'brooklyn-logo-light.png',
                    'demo_ten'          => 'brooklyn-logo-dark.png',
                    'demo_eleven'       => 'brooklyn-logo-light.png',
                    'demo_twelve'       => 'brooklyn-logo-gaming.png',
                    'demo_thirteen'     => 'brooklyn-logo-default.png',
                    'demo_fourteen'     => 'brooklyn-logo-dark.png',
                    'demo_fifteen'      => 'brooklyn-logo-dark.png',
                    'demo_sixteen'      => 'brooklyn-logo-light.png',
                    'demo_seventeen'    => 'brooklyn-logo-light.png',
                    'demo_eighteen'     => 'brooklyn-logo-dark.png',                    
                    'demo_nineteen'     => 'brooklyn-logo-light.png',
                    'demo_twenty'       => 'brooklyn-logo-dark.png',
                    'demo_twentytwo'    => 'brooklyn-logo-22.png',
                    'demo_twentythree'  => 'demo-24-logo-light.svg',
                    'demo_twentyseven'  => 'bklyn-logo-white.svg',
                    'demo_twentyeight'  => 'bklyn-logo-white.svg',
				);
				
                if( isset( $logo_to_demo[$demo_file] ) ) {
                
                    $default_logo = THEME_WEB_ROOT . '/images/default/' . $logo_to_demo[$demo_file];
                    set_theme_mod( 'ut_site_logo' , $default_logo );
                    
                    if($demo_file == 'demo_eleven') {
                        
                        $logo_alt_to_demo = array(
                            'demo_eleven'   => 'brooklyn-logo-dark.png',
                            'demo_thirteen' => 'brooklyn-logo-alternate.png'
                        );
                        
                        $default_alt_logo = THEME_WEB_ROOT . '/images/default/' . $logo_alt_to_demo[$demo_file];
                        set_theme_mod( 'ut_site_logo_alt' , $default_alt_logo );
                        
                    }
                    
                    if( $demo_file == 'demo_twentythree' ) {
                        
                        $default_alt_logo = THEME_WEB_ROOT . '/images/default/demo-24-logo-dark.svg';
                        set_theme_mod( 'ut_site_logo_alt' , $default_alt_logo );
                        
                    }
                    
                    if( $demo_file == 'demo_twentyseven' ) {
                        
                        $default_alt_logo = THEME_WEB_ROOT . '/images/default/bklyn-logo-dark.svg';
                        set_theme_mod( 'ut_site_logo_alt' , $default_alt_logo );
                        
                    }
                
                }
                
                // remove default logo for this demo
                if( $demo_file == 'demo_five' || $demo_file == 'demo_twentysix' || $demo_file == 'demo_twentynine' || $demo_file == 'demo_thirty' || $demo_file == 'demo_thirtyone' ) {
                        
                    set_theme_mod( 'ut_site_logo', '' );
                    set_theme_mod( 'ut_site_logo_alt', '' );

                }
                
                
				/*
				|--------------------------------------------------------------------------
				| Set Default Theme Color
				|--------------------------------------------------------------------------
				*/
				$color_to_demo = array(
					'demo_one'	        => '#FFBF00', 
					'demo_two'          => '#FF6E00',
                    'demo_two_b'        => '#0cb4ce', 
					'demo_three'        => '#0267C1', 
					'demo_four'	        => '#F1C40F', 
					'demo_five'	        => '#3498db',
					'demo_six'	        => '#FDA527',
					'demo_seven'        => '#FF3F00',
					'demo_eight'        => '#F2333A',
                    'demo_eight_b'      => '#D94118',
                    'demo_nine'         => '#FDA527',
                    'demo_ten'          => '#FDA527',
                    'demo_eleven'       => '#008ED6',
                    'demo_twelve'       => '#00E1FF',
                    'demo_thirteen'     => '#1abc9c',
                    'demo_fourteen'     => '#907557',
                    'demo_fifteen'      => '#CF0A2C',
                    'demo_sixteen'      => '#c39f76',
                    'demo_seventeen'    => '#c39f76',
                    'demo_eighteen'     => '#991b84',
                    'demo_nineteen'     => '#c39f76',
                    'demo_twenty'       => '#f1c40f',
                    'demo_twentyone'    => '#F5AB35',
                    'demo_twentytwo'    => '#0070c9',
                    'demo_twentythree'  => '#296AF5',
                    'demo_twentyfour'   => '#FF1654',
                    'demo_twentyfive'   => '#8EA604',
                    'demo_twentysix'    => '#ff3f00',
                    'demo_twentyseven'  => '#FFBF00',
                    'demo_twentyeight'  => '#0674EC',
                    'demo_twentynine'   => '#0674EC',
                    'demo_thirty'       => '#999999',
                    'demo_thirtyone'    => '#474973',
                    'demo_thirtytwo'    => '#FFCAD4'    
				);
                
				update_option('ut_accentcolor', $color_to_demo[$demo_file]);				
				
                
				/*
				|--------------------------------------------------------------------------
				| set default categories for portfolio showcase
				|--------------------------------------------------------------------------
				*/
				$showcase_to_demo = array(
					'demo_one'	        => array('Work'), 
					'demo_two'          => array('My Work', 'Portfolio Frontpage'),
                    'demo_two_b'        => array('My Work', 'Portfolio Frontpage'),  
					'demo_three'        => array('Portfolio Carousel Full Width','Portfolio Carousel','Portfolio Gap 60','Portfolio Gap 40','Portfolio Gap 20','Portfolio Title Below','Portfolio Full Width','Portfolio 4 No Gap','Portfolio 4 No Filter','Portfolio 4 Columns','Portfolio 3 Columns','Portfolio 2 Columns','Our Projects'), 
					'demo_four'	        => array('Grid Gallery'), 
					'demo_five'	        => array('Grid Gallery' , 'Portfolio Carousel'),
					'demo_six'	        => array('Grid Gallery'),
					'demo_seven'        => array('work'),
					'demo_eight'        => array('Grid Gallery'),
                    'demo_eight_b'      => array('Grid Gallery'),
                    'demo_nine'         => array('Grid Gallery' , 'Our Studio'),
                    'demo_ten'          => array('Grid Gallery'),
                    'demo_eleven'       => array('Grid Gallery'),
                    'demo_twelve'       => array('Grid Gallery'),
                    'demo_thirteen'     => array('Filterable Portfolio Gallery'),
                    'demo_fourteen'     => array('Filterable Portfolio Gallery'),
                    'demo_twenty'       => array('Our Projects','Grid 2 Column','Grid 3 Columns','Grid 4 Column'),
                    'demo_twentyone'    => array('Portfolio Front Page','Portfolio Page','Portfolio Grid 3 Columns','Portfolio Grid 4 Columns','Portfolio Grid 2 Columns','Filter Gallery 3 Columns','Filter Gallery 2 Columns','Filter Gallery 4 Columns','Filter Gallery Without Gaps','Portfolio Grid With Gaps','Portfolio Carousel 9 Column','Portfolio Carousel 8 Column','Portfolio Carousel 7 Column','Portfolio Carousel 6 Column','Portfolio Carousel 5 Column','Portfolio Carousel 4 Column','Portfolio Carousel 3 Column','Portfolio Carousel 2 Column','Portfolio Carousel 1 Column','Portfolio Popup Lightbox'),
                    'demo_twentytwo'    => array('Portfolio Popup Lightbox','Portfolio Carousel 1 Column','Portfolio Carousel 2 Column','Portfolio Carousel 3 Column','Portfolio Carousel 4 Column','Portfolio Carousel 5 Column','Portfolio Carousel 6 Column','Portfolio Grid With Gaps','Filter Gallery Without Gaps','Filter Gallery 4 Columns','Filter Gallery 2 Columns','Filter Gallery 3 Columns','Portfolio Grid 2 Columns','Portfolio Grid 4 Columns','Portfolio Grid 3 Columns','Portfolio Page','Portfolio Front Page'),
                    'demo_twentythree'  => array('My Work', 'Portfolio Frontpage', 'Work Page'),
                    'demo_twentysix'    => array('Demo 26 Showcase'),
                    'demo_twentyseven'  => array('Work'),
                    'demo_twentyeight'  => array('My Work', 'Portfolio Frontpage'),
                    'demo_twentynine'   => array('Portfolio Carousel','Packery Centered','Packery Full Width','Portfolio Gallery 3 Column','Portfolio Gallery 2 Column'),
                    'demo_thirty'       => array('demo30'),
                );
				
				/* fetch all used taxonomies first */
				$taxonomies = get_terms( 'portfolio-category' , array( 'hide_empty' => true ) );
				$portfolio_taxonomies = array();
				
				/* built array */
				foreach($taxonomies as $taxonomy ) {
					
					$portfolio_taxonomies[$taxonomy->term_id] = 'on';
									
				}
				
				/* update showcase */
				if( isset($showcase_to_demo[$demo_file]) ) {			
					foreach( $showcase_to_demo[$demo_file] as $showcase ) {
												
						$showcase = get_page_by_title( $showcase , 'OBJECT' , 'portfolio-manager' );
						update_post_meta($showcase->ID , 'ut_portfolio_categories' , $portfolio_taxonomies);
						
					}	
				}
								
				/*
				|--------------------------------------------------------------------------
				| Update Import Flag
				|--------------------------------------------------------------------------
				*/
				update_option('ut_import_loaded', 'active');
				
				/*
				|--------------------------------------------------------------------------
				| Redirect User
				|--------------------------------------------------------------------------
				*/
				wp_redirect( admin_url( 'admin.php?page=ut-demo-importer&ut-import=success' ) );
								
				
			}
		
		}
		
	}

} ?>