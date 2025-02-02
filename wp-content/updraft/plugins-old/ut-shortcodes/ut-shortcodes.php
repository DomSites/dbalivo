<?php
/*
 * Plugin Name: Shortcodes by United Themes 
 * Version: 4.5.2
 * Plugin URI: http://www.unitedthemes.com/
 * Description: Brooklyn Shortcodes for Visual Composer
 * Author: United Themes 
 * Author URI: http://www.unitedthemes.com/
 * Requires at least: 3.4
 * Tested up to: 4.8
 * 
 * @package WordPress
 * @author United Themes
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Basic Constants
 *
 * @since     1.0
 */

define('UT_SHORTCODES_DIR', plugin_dir_path(__FILE__) );
define('UT_SHORTCODES_URL', plugin_dir_url(__FILE__) );
define('UT_SHORTCODES_VERSION', '4.5.2');


/**
 * Plugin Check
 *
 * @return    string
 *
 * @access    private
 * @since     1.0
 */
 
if ( !function_exists( 'ut_is_plugin_active' ) ) {
	
	function ut_is_plugin_active( $plugin ) {
		
        if( is_multisite() && array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) ) ) {
                        
            return array_key_exists( $plugin , get_site_option('active_sitewide_plugins', array() ) );
            
        } elseif( is_multisite() && in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) ) {
                        
            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
            
        } else {
            
            return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
            
        }   
        
	}
	
}


/**
 * admin required files
 */
if( is_admin() ){

    require_once( UT_SHORTCODES_DIR . '/admin/ut-sc-admin-loader.php' );

}

/**
 * frontend required files
 */

require_once( UT_SHORTCODES_DIR . '/inc/ut-image-resize.php' );
require_once( UT_SHORTCODES_DIR . '/inc/ut-ajax-player.php' );
require_once( UT_SHORTCODES_DIR . '/inc/ut-instagram-api.php' );

if( defined( 'WPB_VC_VERSION' ) ) {

    require_once( UT_SHORTCODES_DIR . '/vc/vc-google-font.class.php' );

}

/**
 * Shortcode Base
 *
 * @since 1.0
 */
 
require_once( UT_SHORTCODES_DIR . '/ut-shortcode-functions.php' );
require_once( UT_SHORTCODES_DIR . '/deprecated.php' ); /* deprecated shortcodes */


/**
 * Shortcodes
 *
 * @since 4.0
 */

if( defined( 'WPB_VC_VERSION' ) ) {

    // Structual Modules
    include( UT_SHORTCODES_DIR . '/shortcodes/header.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/btn.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/title-divider.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/custom-shortcode.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/fancy-link.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/custom-link.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/fancy-list.php' );

    // Media Modules
    include( UT_SHORTCODES_DIR . '/shortcodes/animated-image.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/fancy-image.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/image-gallery.php' );
    // include( UT_SHORTCODES_DIR . '/shortcodes/instagram-gallery.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/gallery-slider.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/media-slider.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/video.php' );

    // Information Modules
    include( UT_SHORTCODES_DIR . '/shortcodes/big-icon.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/count-up.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/number-counter.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/service-box.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/service-column.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/service-column-vertical.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/service-icon-box.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/pricing.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/probar.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/probar-2.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/progress-circle.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/social-share-bar.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/icon-tabs.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/portfolio-details.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/word-rotator.php' );
    //include( UT_SHORTCODES_DIR . '/shortcodes/letter-effects.php' );

    // Community Modules
    include( UT_SHORTCODES_DIR . '/shortcodes/blog.php' );
    // include( UT_SHORTCODES_DIR . '/shortcodes/instagram-author.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/team-member.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/call-to-action.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/parallax-quote.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/quote-rotator.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/quote-rotator-2.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/single-quote.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/client-group.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/social-follow.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/person-module.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/twitter-rotator.php' );
    
    // Plugin Modules
    include( UT_SHORTCODES_DIR . '/shortcodes/mc4wp.php' );
    include( UT_SHORTCODES_DIR . '/shortcodes/portfolio.php' );
    
    // Deprecated
    include( UT_SHORTCODES_DIR . '/shortcodes/button.php' );

}

//require_once( UT_SHORTCODES_DIR . '/shortcodes/split-section.php' ); 

/**
 * Visual Composer Params
 *
 * @since 4.0
 */

if( defined( 'WPB_VC_VERSION' ) ) {
    
    require_once( UT_SHORTCODES_DIR . '/vc/vc-params.php' );
    
}

/**
 * Visual Composer Blueprints
 *
 * @since 4.0
 */

if( defined( 'WPB_VC_VERSION' ) ) {
    
    require_once( UT_SHORTCODES_DIR . '/vc/vc-blueprints.php' );
    
}



/**
 * Register Categories for Media Library
 * no released yet
 * 
 */

function ut_add_categories_to_attachments() {
    
    register_taxonomy_for_object_type( 'category', 'attachment' );
    
}

//add_action( 'init' , 'ut_add_categories_to_attachments' );








/*
|--------------------------------------------------------------------------
| Activation, Deactivation and Uninstall Functions
|--------------------------------------------------------------------------
*/ 
register_activation_hook( __FILE__ , 'ut_shortcodes_activation');
register_deactivation_hook( __FILE__ , 'ut_shortcodes_deactivation');


function ut_shortcodes_activation() {
    
    //actions to perform once on plugin activation    
    add_option('ut_shortcodes_options');
	add_option('ut_twitter_feed');
    
    //register uninstaller
    register_uninstall_hook(__FILE__, 'ut_shortcodes_uninstall');
    
}

function ut_shortcodes_deactivation() {
    
    // actions to perform once on plugin deactivation
        
}

function ut_shortcodes_uninstall(){
    
    //actions to perform once on plugin uninstall
    delete_option('ut_shortcodes_options');
	delete_option('ut_twitter_feed');
	
}


/*
 * load needed javascript
 */
function ut_shortcodes_enqueuescripts() {
    
    $ut_theme_active = ( get_option( 'ut_theme_active' ) == 'active' ) ? true : false; 
    
    /* base files */
    if( !is_admin() ) {
		
        $min = NULL;
        
        if( !WP_DEBUG ){
            $min = '.min';
        }       
        
        wp_enqueue_script(
            'modernizr',
            UT_SHORTCODES_URL . 'js/plugins/modernizr/modernizr' . $min .  '.js',
            array('jquery'),
            '2.6.2'
        );
        
        wp_enqueue_script(
            'ut-elastislider-js',
            UT_SHORTCODES_URL . 'js/plugins/elastislider/jquery.elastislide' . $min . '.js',
            array('jquery' , 'modernizr')
        );
        
		wp_enqueue_script( 
            'ut-tabs-toggles',
            UT_SHORTCODES_URL . 'js/tabs.collapse' . $min . '.js',
            array('jquery'),
            '1.0',
            true
        );
        
		wp_enqueue_script(
            'ut-appear',
            UT_SHORTCODES_URL . 'js/jquery.appear' . $min . '.js', 
            array('jquery'), 
            '1.0',
            true
        );
        
        wp_enqueue_script(
            'ut-fitvid', 
            UT_SHORTCODES_URL . 'js/jquery.fitvids' . $min . '.js', 
            array('jquery'),
            '1.0.3',
            true
        );
        
	    wp_enqueue_script( 
            'ut-sc-plugin',
            UT_SHORTCODES_URL . 'js/ut.scplugin' . $min . '.js',
            array('jquery'),
            UT_SHORTCODES_VERSION,
            true
        );
        
        wp_localize_script( 'ut-sc-plugin', 'utShortcode' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        
    }
    
}
add_action('wp_enqueue_scripts', 'ut_shortcodes_enqueuescripts');



/*
 * load needed styles
 */
function ut_shortcodes_enqueuestyles() {
    	
    if( !is_admin() ) {
        
        $min = NULL;
        
        if( !WP_DEBUG ){
            $min = '.min';
        }
        
		wp_enqueue_style(
            'ut-responsive-grid',
            UT_SHORTCODES_URL . 'css/ut-responsive-grid' . $min . '.css' 
        );
            
        wp_enqueue_style(
            'ut-animate', 
            UT_SHORTCODES_URL . 'css/ut.animate' . $min . '.css'
        );
          
        /* elastislider */
        $ut_elastislide = file_exists( get_template_directory() . '/css/ut.elastislide' . $min . '.css' ) ? get_template_directory_uri() . '/css/ut.elastislide' . $min . '.css' : UT_SHORTCODES_URL . 'css/ut.elastislide' . $min . '.css';
        wp_enqueue_style( 'ut-elastislide', $ut_elastislide );
        
        /* fancyrotator */
        $ut_fancyrotator = file_exists( get_template_directory() . '/css/ut.fancyrotator' . $min . '.css' ) ? get_template_directory_uri() . '/css/ut.fancyrotator' . $min . '.css' : UT_SHORTCODES_URL . 'css/ut.fancyrotator' . $min . '.css';
        wp_enqueue_style( 'ut-fancyrotator', $ut_fancyrotator );
        
        /* main shortcode css */
		$ut_shortcodes = file_exists( get_template_directory() . '/css/ut.shortcode' . $min . '.css' ) ? get_template_directory_uri() . '/css/ut.shortcode' . $min . '.css' : UT_SHORTCODES_URL . 'css/ut.shortcode' . $min . '.css';
		wp_enqueue_style( 'ut-shortcodes' , $ut_shortcodes );				
        
        /* visual composer css */
		$ut_vc_shortcodes = file_exists( get_template_directory() . '/css/ut.vc.shortcodes' . $min . '.css' ) ? get_template_directory_uri() . '/css/ut.vc.shortcodes' . $min . '.css' : UT_SHORTCODES_URL . 'css/ut.vc.shortcodes' . $min . '.css';
		wp_enqueue_style( 
            'ut-vc-shortcodes', 
            $ut_vc_shortcodes,
            array( 'js_composer_front', 'ut-shortcodes', 'ut-bklynicons' ),
            UT_SHORTCODES_VERSION
        );
        
		
    }
    
}
add_action('get_header', 'ut_shortcodes_enqueuestyles');


function ut_shortcodes_init(){
        
    if( is_admin() ) {
       
    }
	
	load_plugin_textdomain( 'ut_shortcodes', false, dirname(plugin_basename(__FILE__)).'/lang/' );
    
}
ut_shortcodes_init();


/*
 * Font Awesome Icons
 */
 
if ( !function_exists( 'ut_recognized_icons' ) ) {

    function ut_recognized_icons() {
        
        $icons = array (
              0 => 'fa-glass',
              1 => 'fa-music',
              2 => 'fa-search',
              3 => 'fa-envelope-o',
              4 => 'fa-heart',
              5 => 'fa-star',
              6 => 'fa-star-o',
              7 => 'fa-user',
              8 => 'fa-film',
              9 => 'fa-th-large',
              10 => 'fa-th',
              11 => 'fa-th-list',
              12 => 'fa-check',
              13 => 'fa-times',
              14 => 'fa-search-plus',
              15 => 'fa-search-minus',
              16 => 'fa-power-off',
              17 => 'fa-signal',
              18 => 'fa-cog',
              19 => 'fa-trash-o',
              20 => 'fa-home',
              21 => 'fa-file-o',
              22 => 'fa-clock-o',
              23 => 'fa-road',
              24 => 'fa-download',
              25 => 'fa-arrow-circle-o-down',
              26 => 'fa-arrow-circle-o-up',
              27 => 'fa-inbox',
              28 => 'fa-play-circle-o',
              29 => 'fa-repeat',
              30 => 'fa-refresh',
              31 => 'fa-list-alt',
              32 => 'fa-lock',
              33 => 'fa-flag',
              34 => 'fa-headphones',
              35 => 'fa-volume-off',
              36 => 'fa-volume-down',
              37 => 'fa-volume-up',
              38 => 'fa-qrcode',
              39 => 'fa-barcode',
              40 => 'fa-tag',
              41 => 'fa-tags',
              42 => 'fa-book',
              43 => 'fa-bookmark',
              44 => 'fa-print',
              45 => 'fa-camera',
              46 => 'fa-font',
              47 => 'fa-bold',
              48 => 'fa-italic',
              49 => 'fa-text-height',
              50 => 'fa-text-width',
              51 => 'fa-align-left',
              52 => 'fa-align-center',
              53 => 'fa-align-right',
              54 => 'fa-align-justify',
              55 => 'fa-list',
              56 => 'fa-outdent',
              57 => 'fa-indent',
              58 => 'fa-video-camera',
              59 => 'fa-picture-o',
              60 => 'fa-pencil',
              61 => 'fa-map-marker',
              62 => 'fa-adjust',
              63 => 'fa-tint',
              64 => 'fa-pencil-square-o',
              65 => 'fa-share-square-o',
              66 => 'fa-check-square-o',
              67 => 'fa-arrows',
              68 => 'fa-step-backward',
              69 => 'fa-fast-backward',
              70 => 'fa-backward',
              71 => 'fa-play',
              72 => 'fa-pause',
              73 => 'fa-stop',
              74 => 'fa-forward',
              75 => 'fa-fast-forward',
              76 => 'fa-step-forward',
              77 => 'fa-eject',
              78 => 'fa-chevron-left',
              79 => 'fa-chevron-right',
              80 => 'fa-plus-circle',
              81 => 'fa-minus-circle',
              82 => 'fa-times-circle',
              83 => 'fa-check-circle',
              84 => 'fa-question-circle',
              85 => 'fa-info-circle',
              86 => 'fa-crosshairs',
              87 => 'fa-times-circle-o',
              88 => 'fa-check-circle-o',
              89 => 'fa-ban',
              90 => 'fa-arrow-left',
              91 => 'fa-arrow-right',
              92 => 'fa-arrow-up',
              93 => 'fa-arrow-down',
              94 => 'fa-share',
              95 => 'fa-expand',
              96 => 'fa-compress',
              97 => 'fa-plus',
              98 => 'fa-minus',
              99 => 'fa-asterisk',
              100 => 'fa-exclamation-circle',
              101 => 'fa-gift',
              102 => 'fa-leaf',
              103 => 'fa-fire',
              104 => 'fa-eye',
              105 => 'fa-eye-slash',
              106 => 'fa-exclamation-triangle',
              107 => 'fa-plane',
              108 => 'fa-calendar',
              109 => 'fa-random',
              110 => 'fa-comment',
              111 => 'fa-magnet',
              112 => 'fa-chevron-up',
              113 => 'fa-chevron-down',
              114 => 'fa-retweet',
              115 => 'fa-shopping-cart',
              116 => 'fa-folder',
              117 => 'fa-folder-open',
              118 => 'fa-arrows-v',
              119 => 'fa-arrows-h',
              120 => 'fa-bar-chart',
              121 => 'fa-twitter-square',
              122 => 'fa-facebook-square',
              123 => 'fa-camera-retro',
              124 => 'fa-key',
              125 => 'fa-cogs',
              126 => 'fa-comments',
              127 => 'fa-thumbs-o-up',
              128 => 'fa-thumbs-o-down',
              129 => 'fa-star-half',
              130 => 'fa-heart-o',
              131 => 'fa-sign-out',
              132 => 'fa-linkedin-square',
              133 => 'fa-thumb-tack',
              134 => 'fa-external-link',
              135 => 'fa-sign-in',
              136 => 'fa-trophy',
              137 => 'fa-github-square',
              138 => 'fa-upload',
              139 => 'fa-lemon-o',
              140 => 'fa-phone',
              141 => 'fa-square-o',
              142 => 'fa-bookmark-o',
              143 => 'fa-phone-square',
              144 => 'fa-twitter',
              145 => 'fa-facebook',
              146 => 'fa-github',
              147 => 'fa-unlock',
              148 => 'fa-credit-card',
              149 => 'fa-rss',
              150 => 'fa-hdd-o',
              151 => 'fa-bullhorn',
              152 => 'fa-bell',
              153 => 'fa-certificate',
              154 => 'fa-hand-o-right',
              155 => 'fa-hand-o-left',
              156 => 'fa-hand-o-up',
              157 => 'fa-hand-o-down',
              158 => 'fa-arrow-circle-left',
              159 => 'fa-arrow-circle-right',
              160 => 'fa-arrow-circle-up',
              161 => 'fa-arrow-circle-down',
              162 => 'fa-globe',
              163 => 'fa-wrench',
              164 => 'fa-tasks',
              165 => 'fa-filter',
              166 => 'fa-briefcase',
              167 => 'fa-arrows-alt',
              168 => 'fa-users',
              169 => 'fa-link',
              170 => 'fa-cloud',
              171 => 'fa-flask',
              172 => 'fa-scissors',
              173 => 'fa-files-o',
              174 => 'fa-paperclip',
              175 => 'fa-floppy-o',
              176 => 'fa-square',
              177 => 'fa-bars',
              178 => 'fa-list-ul',
              179 => 'fa-list-ol',
              180 => 'fa-strikethrough',
              181 => 'fa-underline',
              182 => 'fa-table',
              183 => 'fa-magic',
              184 => 'fa-truck',
              185 => 'fa-pinterest',
              186 => 'fa-pinterest-square',
              187 => 'fa-google-plus-square',
              188 => 'fa-google-plus',
              189 => 'fa-money',
              190 => 'fa-caret-down',
              191 => 'fa-caret-up',
              192 => 'fa-caret-left',
              193 => 'fa-caret-right',
              194 => 'fa-columns',
              195 => 'fa-sort',
              196 => 'fa-sort-desc',
              197 => 'fa-sort-asc',
              198 => 'fa-envelope',
              199 => 'fa-linkedin',
              200 => 'fa-undo',
              201 => 'fa-gavel',
              202 => 'fa-tachometer',
              203 => 'fa-comment-o',
              204 => 'fa-comments-o',
              205 => 'fa-bolt',
              206 => 'fa-sitemap',
              207 => 'fa-umbrella',
              208 => 'fa-clipboard',
              209 => 'fa-lightbulb-o',
              210 => 'fa-exchange',
              211 => 'fa-cloud-download',
              212 => 'fa-cloud-upload',
              213 => 'fa-user-md',
              214 => 'fa-stethoscope',
              215 => 'fa-suitcase',
              216 => 'fa-bell-o',
              217 => 'fa-coffee',
              218 => 'fa-cutlery',
              219 => 'fa-file-text-o',
              220 => 'fa-building-o',
              221 => 'fa-hospital-o',
              222 => 'fa-ambulance',
              223 => 'fa-medkit',
              224 => 'fa-fighter-jet',
              225 => 'fa-beer',
              226 => 'fa-h-square',
              227 => 'fa-plus-square',
              228 => 'fa-angle-double-left',
              229 => 'fa-angle-double-right',
              230 => 'fa-angle-double-up',
              231 => 'fa-angle-double-down',
              232 => 'fa-angle-left',
              233 => 'fa-angle-right',
              234 => 'fa-angle-up',
              235 => 'fa-angle-down',
              236 => 'fa-desktop',
              237 => 'fa-laptop',
              238 => 'fa-tablet',
              239 => 'fa-mobile',
              240 => 'fa-circle-o',
              241 => 'fa-quote-left',
              242 => 'fa-quote-right',
              243 => 'fa-spinner',
              244 => 'fa-circle',
              245 => 'fa-reply',
              246 => 'fa-github-alt',
              247 => 'fa-folder-o',
              248 => 'fa-folder-open-o',
              249 => 'fa-smile-o',
              250 => 'fa-frown-o',
              251 => 'fa-meh-o',
              252 => 'fa-gamepad',
              253 => 'fa-keyboard-o',
              254 => 'fa-flag-o',
              255 => 'fa-flag-checkered',
              256 => 'fa-terminal',
              257 => 'fa-code',
              258 => 'fa-reply-all',
              259 => 'fa-star-half-o',
              260 => 'fa-location-arrow',
              261 => 'fa-crop',
              262 => 'fa-code-fork',
              263 => 'fa-chain-broken',
              264 => 'fa-question',
              265 => 'fa-info',
              266 => 'fa-exclamation',
              267 => 'fa-superscript',
              268 => 'fa-subscript',
              269 => 'fa-eraser',
              270 => 'fa-puzzle-piece',
              271 => 'fa-microphone',
              272 => 'fa-microphone-slash',
              273 => 'fa-shield',
              274 => 'fa-calendar-o',
              275 => 'fa-fire-extinguisher',
              276 => 'fa-rocket',
              277 => 'fa-maxcdn',
              278 => 'fa-chevron-circle-left',
              279 => 'fa-chevron-circle-right',
              280 => 'fa-chevron-circle-up',
              281 => 'fa-chevron-circle-down',
              282 => 'fa-html5',
              283 => 'fa-css3',
              284 => 'fa-anchor',
              285 => 'fa-unlock-alt',
              286 => 'fa-bullseye',
              287 => 'fa-ellipsis-h',
              288 => 'fa-ellipsis-v',
              289 => 'fa-rss-square',
              290 => 'fa-play-circle',
              291 => 'fa-ticket',
              292 => 'fa-minus-square',
              293 => 'fa-minus-square-o',
              294 => 'fa-level-up',
              295 => 'fa-level-down',
              296 => 'fa-check-square',
              297 => 'fa-pencil-square',
              298 => 'fa-external-link-square',
              299 => 'fa-share-square',
              300 => 'fa-compass',
              301 => 'fa-caret-square-o-down',
              302 => 'fa-caret-square-o-up',
              303 => 'fa-caret-square-o-right',
              304 => 'fa-eur',
              305 => 'fa-gbp',
              306 => 'fa-usd',
              307 => 'fa-inr',
              308 => 'fa-jpy',
              309 => 'fa-rub',
              310 => 'fa-krw',
              311 => 'fa-btc',
              312 => 'fa-file',
              313 => 'fa-file-text',
              314 => 'fa-sort-alpha-asc',
              315 => 'fa-sort-alpha-desc',
              316 => 'fa-sort-amount-asc',
              317 => 'fa-sort-amount-desc',
              318 => 'fa-sort-numeric-asc',
              319 => 'fa-sort-numeric-desc',
              320 => 'fa-thumbs-up',
              321 => 'fa-thumbs-down',
              322 => 'fa-youtube-square',
              323 => 'fa-youtube',
              324 => 'fa-xing',
              325 => 'fa-xing-square',
              326 => 'fa-youtube-play',
              327 => 'fa-dropbox',
              328 => 'fa-stack-overflow',
              329 => 'fa-instagram',
              330 => 'fa-flickr',
              331 => 'fa-adn',
              332 => 'fa-bitbucket',
              333 => 'fa-bitbucket-square',
              334 => 'fa-tumblr',
              335 => 'fa-tumblr-square',
              336 => 'fa-long-arrow-down',
              337 => 'fa-long-arrow-up',
              338 => 'fa-long-arrow-left',
              339 => 'fa-long-arrow-right',
              340 => 'fa-apple',
              341 => 'fa-windows',
              342 => 'fa-android',
              343 => 'fa-linux',
              344 => 'fa-dribbble',
              345 => 'fa-skype',
              346 => 'fa-foursquare',
              347 => 'fa-trello',
              348 => 'fa-female',
              349 => 'fa-male',
              350 => 'fa-gratipay',
              351 => 'fa-sun-o',
              352 => 'fa-moon-o',
              353 => 'fa-archive',
              354 => 'fa-bug',
              355 => 'fa-vk',
              356 => 'fa-weibo',
              357 => 'fa-renren',
              358 => 'fa-pagelines',
              359 => 'fa-stack-exchange',
              360 => 'fa-arrow-circle-o-right',
              361 => 'fa-arrow-circle-o-left',
              362 => 'fa-caret-square-o-left',
              363 => 'fa-dot-circle-o',
              364 => 'fa-wheelchair',
              365 => 'fa-vimeo-square',
              366 => 'fa-try',
              367 => 'fa-plus-square-o',
              368 => 'fa-space-shuttle',
              369 => 'fa-slack',
              370 => 'fa-envelope-square',
              371 => 'fa-wordpress',
              372 => 'fa-openid',
              373 => 'fa-university',
              374 => 'fa-graduation-cap',
              375 => 'fa-yahoo',
              376 => 'fa-google',
              377 => 'fa-reddit',
              378 => 'fa-reddit-square',
              379 => 'fa-stumbleupon-circle',
              380 => 'fa-stumbleupon',
              381 => 'fa-delicious',
              382 => 'fa-digg',
              383 => 'fa-pied-piper-pp',
              384 => 'fa-pied-piper-alt',
              385 => 'fa-drupal',
              386 => 'fa-joomla',
              387 => 'fa-language',
              388 => 'fa-fax',
              389 => 'fa-building',
              390 => 'fa-child',
              391 => 'fa-paw',
              392 => 'fa-spoon',
              393 => 'fa-cube',
              394 => 'fa-cubes',
              395 => 'fa-behance',
              396 => 'fa-behance-square',
              397 => 'fa-steam',
              398 => 'fa-steam-square',
              399 => 'fa-recycle',
              400 => 'fa-car',
              401 => 'fa-taxi',
              402 => 'fa-tree',
              403 => 'fa-spotify',
              404 => 'fa-deviantart',
              405 => 'fa-soundcloud',
              406 => 'fa-database',
              407 => 'fa-file-pdf-o',
              408 => 'fa-file-word-o',
              409 => 'fa-file-excel-o',
              410 => 'fa-file-powerpoint-o',
              411 => 'fa-file-image-o',
              412 => 'fa-file-archive-o',
              413 => 'fa-file-audio-o',
              414 => 'fa-file-video-o',
              415 => 'fa-file-code-o',
              416 => 'fa-vine',
              417 => 'fa-codepen',
              418 => 'fa-jsfiddle',
              419 => 'fa-life-ring',
              420 => 'fa-circle-o-notch',
              421 => 'fa-rebel',
              422 => 'fa-empire',
              423 => 'fa-git-square',
              424 => 'fa-git',
              425 => 'fa-hacker-news',
              426 => 'fa-tencent-weibo',
              427 => 'fa-qq',
              428 => 'fa-weixin',
              429 => 'fa-paper-plane',
              430 => 'fa-paper-plane-o',
              431 => 'fa-history',
              432 => 'fa-circle-thin',
              433 => 'fa-header',
              434 => 'fa-paragraph',
              435 => 'fa-sliders',
              436 => 'fa-share-alt',
              437 => 'fa-share-alt-square',
              438 => 'fa-bomb',
              439 => 'fa-futbol-o',
              440 => 'fa-tty',
              441 => 'fa-binoculars',
              442 => 'fa-plug',
              443 => 'fa-slideshare',
              444 => 'fa-twitch',
              445 => 'fa-yelp',
              446 => 'fa-newspaper-o',
              447 => 'fa-wifi',
              448 => 'fa-calculator',
              449 => 'fa-paypal',
              450 => 'fa-google-wallet',
              451 => 'fa-cc-visa',
              452 => 'fa-cc-mastercard',
              453 => 'fa-cc-discover',
              454 => 'fa-cc-amex',
              455 => 'fa-cc-paypal',
              456 => 'fa-cc-stripe',
              457 => 'fa-bell-slash',
              458 => 'fa-bell-slash-o',
              459 => 'fa-trash',
              460 => 'fa-copyright',
              461 => 'fa-at',
              462 => 'fa-eyedropper',
              463 => 'fa-paint-brush',
              464 => 'fa-birthday-cake',
              465 => 'fa-area-chart',
              466 => 'fa-pie-chart',
              467 => 'fa-line-chart',
              468 => 'fa-lastfm',
              469 => 'fa-lastfm-square',
              470 => 'fa-toggle-off',
              471 => 'fa-toggle-on',
              472 => 'fa-bicycle',
              473 => 'fa-bus',
              474 => 'fa-ioxhost',
              475 => 'fa-angellist',
              476 => 'fa-cc',
              477 => 'fa-ils',
              478 => 'fa-meanpath',
              479 => 'fa-buysellads',
              480 => 'fa-connectdevelop',
              481 => 'fa-dashcube',
              482 => 'fa-forumbee',
              483 => 'fa-leanpub',
              484 => 'fa-sellsy',
              485 => 'fa-shirtsinbulk',
              486 => 'fa-simplybuilt',
              487 => 'fa-skyatlas',
              488 => 'fa-cart-plus',
              489 => 'fa-cart-arrow-down',
              490 => 'fa-diamond',
              491 => 'fa-ship',
              492 => 'fa-user-secret',
              493 => 'fa-motorcycle',
              494 => 'fa-street-view',
              495 => 'fa-heartbeat',
              496 => 'fa-venus',
              497 => 'fa-mars',
              498 => 'fa-mercury',
              499 => 'fa-transgender',
              500 => 'fa-transgender-alt',
              501 => 'fa-venus-double',
              502 => 'fa-mars-double',
              503 => 'fa-venus-mars',
              504 => 'fa-mars-stroke',
              505 => 'fa-mars-stroke-v',
              506 => 'fa-mars-stroke-h',
              507 => 'fa-neuter',
              508 => 'fa-genderless',
              509 => 'fa-facebook-official',
              510 => 'fa-pinterest-p',
              511 => 'fa-whatsapp',
              512 => 'fa-server',
              513 => 'fa-user-plus',
              514 => 'fa-user-times',
              515 => 'fa-bed',
              516 => 'fa-viacoin',
              517 => 'fa-train',
              518 => 'fa-subway',
              519 => 'fa-medium',
              520 => 'fa-y-combinator',
              521 => 'fa-optin-monster',
              522 => 'fa-opencart',
              523 => 'fa-expeditedssl',
              524 => 'fa-battery-full',
              525 => 'fa-battery-three-quarters',
              526 => 'fa-battery-half',
              527 => 'fa-battery-quarter',
              528 => 'fa-battery-empty',
              529 => 'fa-mouse-pointer',
              530 => 'fa-i-cursor',
              531 => 'fa-object-group',
              532 => 'fa-object-ungroup',
              533 => 'fa-sticky-note',
              534 => 'fa-sticky-note-o',
              535 => 'fa-cc-jcb',
              536 => 'fa-cc-diners-club',
              537 => 'fa-clone',
              538 => 'fa-balance-scale',
              539 => 'fa-hourglass-o',
              540 => 'fa-hourglass-start',
              541 => 'fa-hourglass-half',
              542 => 'fa-hourglass-end',
              543 => 'fa-hourglass',
              544 => 'fa-hand-rock-o',
              545 => 'fa-hand-paper-o',
              546 => 'fa-hand-scissors-o',
              547 => 'fa-hand-lizard-o',
              548 => 'fa-hand-spock-o',
              549 => 'fa-hand-pointer-o',
              550 => 'fa-hand-peace-o',
              551 => 'fa-trademark',
              552 => 'fa-registered',
              553 => 'fa-creative-commons',
              554 => 'fa-gg',
              555 => 'fa-gg-circle',
              556 => 'fa-tripadvisor',
              557 => 'fa-odnoklassniki',
              558 => 'fa-odnoklassniki-square',
              559 => 'fa-get-pocket',
              560 => 'fa-wikipedia-w',
              561 => 'fa-safari',
              562 => 'fa-chrome',
              563 => 'fa-firefox',
              564 => 'fa-opera',
              565 => 'fa-internet-explorer',
              566 => 'fa-television',
              567 => 'fa-contao',
              568 => 'fa-500px',
              569 => 'fa-amazon',
              570 => 'fa-calendar-plus-o',
              571 => 'fa-calendar-minus-o',
              572 => 'fa-calendar-times-o',
              573 => 'fa-calendar-check-o',
              574 => 'fa-industry',
              575 => 'fa-map-pin',
              576 => 'fa-map-signs',
              577 => 'fa-map-o',
              578 => 'fa-map',
              579 => 'fa-commenting',
              580 => 'fa-commenting-o',
              581 => 'fa-houzz',
              582 => 'fa-vimeo',
              583 => 'fa-black-tie',
              584 => 'fa-fonticons',
              585 => 'fa-reddit-alien',
              586 => 'fa-edge',
              587 => 'fa-credit-card-alt',
              588 => 'fa-codiepie',
              589 => 'fa-modx',
              590 => 'fa-fort-awesome',
              591 => 'fa-usb',
              592 => 'fa-product-hunt',
              593 => 'fa-mixcloud',
              594 => 'fa-scribd',
              595 => 'fa-pause-circle',
              596 => 'fa-pause-circle-o',
              597 => 'fa-stop-circle',
              598 => 'fa-stop-circle-o',
              599 => 'fa-shopping-bag',
              600 => 'fa-shopping-basket',
              601 => 'fa-hashtag',
              602 => 'fa-bluetooth',
              603 => 'fa-bluetooth-b',
              604 => 'fa-percent',
              605 => 'fa-gitlab',
              606 => 'fa-wpbeginner',
              607 => 'fa-wpforms',
              608 => 'fa-envira',
              609 => 'fa-universal-access',
              610 => 'fa-wheelchair-alt',
              611 => 'fa-question-circle-o',
              612 => 'fa-blind',
              613 => 'fa-audio-description',
              614 => 'fa-volume-control-phone',
              615 => 'fa-braille',
              616 => 'fa-assistive-listening-systems',
              617 => 'fa-american-sign-language-interpreting',
              618 => 'fa-deaf',
              619 => 'fa-glide',
              620 => 'fa-glide-g',
              621 => 'fa-sign-language',
              622 => 'fa-low-vision',
              623 => 'fa-viadeo',
              624 => 'fa-viadeo-square',
              625 => 'fa-snapchat',
              626 => 'fa-snapchat-ghost',
              627 => 'fa-snapchat-square',
              628 => 'fa-pied-piper',
              629 => 'fa-first-order',
              630 => 'fa-yoast',
              631 => 'fa-themeisle',
              632 => 'fa-google-plus-official',
              633 => 'fa-font-awesome',
              634 => 'fa-handshake-o',
              635 => 'fa-envelope-open',
              636 => 'fa-envelope-open-o',
              637 => 'fa-linode',
              638 => 'fa-address-book',
              639 => 'fa-address-book-o',
              640 => 'fa-address-card',
              641 => 'fa-address-card-o',
              642 => 'fa-user-circle',
              643 => 'fa-user-circle-o',
              644 => 'fa-user-o',
              645 => 'fa-id-badge',
              646 => 'fa-id-card',
              647 => 'fa-id-card-o',
              648 => 'fa-quora',
              649 => 'fa-free-code-camp',
              650 => 'fa-telegram',
              651 => 'fa-thermometer-full',
              652 => 'fa-thermometer-three-quarters',
              653 => 'fa-thermometer-half',
              654 => 'fa-thermometer-quarter',
              655 => 'fa-thermometer-empty',
              656 => 'fa-shower',
              657 => 'fa-bath',
              658 => 'fa-podcast',
              659 => 'fa-window-maximize',
              660 => 'fa-window-minimize',
              661 => 'fa-window-restore',
              662 => 'fa-window-close',
              663 => 'fa-window-close-o',
              664 => 'fa-bandcamp',
              665 => 'fa-grav',
              666 => 'fa-etsy',
              667 => 'fa-imdb',
              668 => 'fa-ravelry',
              669 => 'fa-eercast',
              670 => 'fa-microchip',
              671 => 'fa-snowflake-o',
              672 => 'fa-superpowers',
              673 => 'fa-wpexplorer',
              674 => 'fa-meetup',
        );
        
        return apply_filters( 'ut_recognized_icons', $icons );
        
    } 

}










if ( !function_exists( 'ut_oembed_result' ) ) {

    function ut_oembed_result( $data, $url ) {
        /**
         * Extract the oEmbed URL from the oEmbed provider's returned content.
         *
         * @var array $extracted_urls
         */
        $extracted_urls = wp_extract_urls( $data );
        if ( empty( $extracted_urls[0] ) ) {
            return $data;
        }
        /**
         * Parse the original URL that was sent to the oEmbed provider for any URL query params.
         *
         * If the query component doesn't exist, will return null. May return false for seriously malformed URLs.
         *
         * @var bool|null|string $original_url_query
         */
        $original_url_query = parse_url( $url, PHP_URL_QUERY );
        if ( empty( $original_url_query ) ) {
            return $data;
        }
        /**
         * For easier identification, assign a variable name to $extracted_urls[0].
         *
         * @var string $embed_src
         */
        $embed_src = $extracted_urls[0];
        /**
         * Parse the extracted URL for any URL query params.
         *
         * If the query component doesn't exist, will return null. May return false for seriously malformed URLs.
         *
         * @var bool|null|string $embed_url_query
         */
        $embed_url_query = parse_url( $embed_src, PHP_URL_QUERY );
        /**
         * Parse $embed_url_query as if it were a URL query string, and store the variables in $embed_query_args array.
         *
         * @var array $embed_query_args
         */
        parse_str( $embed_url_query, $embed_query_args );
        /**
         * Parse $original_url_query as if it were a URL query string, and store the variables in $original_query_args array.
         *
         * @var array $original_query_args
         */
        parse_str( $original_url_query, $original_query_args );
        /**
         * Merge the two arrays of query args together.
         *
         * @var array $merged_args
         */
        $merged_args = array_merge( $embed_query_args, $original_query_args );
        /**
         * Reconstitute the embed src URL with all the query args.
         *
         * @var string $new_embed_src
         */
        $new_embed_src = add_query_arg( $merged_args, $embed_src );
        /**
         * Replace the existing embed_src URL with the reconstituted new_embed_src URL.
         *
         * @var string $data
         */
        $data = str_replace( $embed_src, $new_embed_src, $data );
        return $data;
        
    }
    
    add_filter( 'oembed_result', 'ut_oembed_result', 10, 2 );

}


/*
 * All Animation Effects
 */
 
if ( !function_exists( 'ut_recognized_animation_effects' ) ) {

    function ut_recognized_animation_effects() { 
        
        $effects = array(
            'bounce'            => 'bounce',
            'flash'             => 'flash',
            'pulse'             => 'pulse',
            'rubberBand'        => 'rubberBand',
            'shake'             => 'shake',
            'swing'             => 'swing',
            'tada'              => 'tada',
            'wobble'            => 'wobble',
            'jello'             => 'jello',
            'bounceIn'          => 'bounceIn',
            'bounceInDown'      => 'bounceInDown',
            'bounceInLeft'      => 'bounceInLeft',
            'bounceInRight'     => 'bounceInRight',
            'bounceInUp'        => 'bounceInUp',
            'bounceOut'         => 'bounceOut',
            'bounceOutDown'     => 'bounceOutDown',
            'bounceOutLeft'     => 'bounceOutLeft',
            'bounceOutRight'    => 'bounceOutRight',
            'bounceOutUp'       => 'bounceOutUp',
            'fadeIn'            => 'fadeIn',
            'fadeInDown'        => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'        => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'       => 'fadeInRight',
            'fadeInRightBig'    => 'fadeInRightBig',
            'fadeInUp'          => 'fadeInUp',
            'fadeInUpBig'       => 'fadeInUpBig',
            'fadeOut'           => 'fadeOut',
            'fadeOutDown'       => 'fadeOutDown',
            'fadeOutDownBig'    => 'fadeOutDownBig',
            'fadeOutLeft'       => 'fadeOutLeft',
            'fadeOutLeftBig'    => 'fadeOutLeftBig',
            'fadeOutRight'      => 'fadeOutRight',
            'fadeOutRightBig'   => 'fadeOutRightBig',
            'fadeOutUp'         => 'fadeOutUp',
            'fadeOutUpBig'      => 'fadeOutUpBig',
            'flip'              => 'flip',
            'flipInX'           => 'flipInX',
            'flipInY'           => 'flipInY',
            'flipOutX'          => 'flipOutX',
            'flipOutY'          => 'flipOutY',
            'lightSpeedIn'      => 'lightSpeedIn',
            'lightSpeedOut'     => 'lightSpeedOut',
            'rotateIn'          => 'rotateIn',
            'rotateInDownLeft'  => 'rotateInDownLeft',
            'rotateInDownRight' => 'rotateInDownRight',
            'rotateInUpLeft'    => 'rotateInUpLeft',
            'rotateInUpRight'   => 'rotateInUpRight',
            'rotateOut'         => 'rotateOut',
            'rotateOutDownLeft' => 'rotateOutDownLeft',
            'rotateOutDownRight'=> 'rotateOutDownRight',
            'rotateOutUpLeft'   => 'rotateOutUpLeft',
            'rotateOutUpRight'  => 'rotateOutUpRight',
            'slideInUp'         => 'slideInUp',
            'slideInDown'       => 'slideInDown',
            'slideInLeft'       => 'slideInLeft',
            'slideInRight'      => 'slideInRight',
            'slideOutUp'        => 'slideOutUp',
            'slideOutDown'      => 'slideOutDown',
            'slideOutLeft'      => 'slideOutLeft',
            'slideOutRight'     => 'slideOutRight',
            'zoomIn'            => 'zoomIn',
            'zoomInDown'        => 'zoomInDown',
            'zoomInLeft'        => 'zoomInLeft',
            'zoomInRight'       => 'zoomInRight',
            'zoomInUp'          => 'zoomInUp',
            'zoomOut'           => 'zoomOut',
            'zoomOutDown'       => 'zoomOutDown',
            'zoomOutLeft'       => 'zoomOutLeft',
            'zoomOutRight'      => 'zoomOutRight',
            'zoomOutUp'         => 'zoomOutUp',
            'hinge'             => 'hinge',
            'rollIn'            => 'rollIn',
            'rollOut'           => 'rollOut'
            
        );
          
        return apply_filters( 'ut_recognized_animation_effects', $effects );
        
    } 

}

/*
 * All In Animation Effects
 */
 
if ( !function_exists( 'ut_recognized_in_animation_effects' ) ) {

    function ut_recognized_in_animation_effects() { 
        
        $effects = array(
            'Standard'          => '',
            'bounce'            => 'bounce',
            'flash'             => 'flash',
            'pulse'             => 'pulse',
            'rubberBand'        => 'rubberBand',
            'shake'             => 'shake',
            'swing'             => 'swing',
            'tada'              => 'tada',
            'wobble'            => 'wobble',
            'jello'             => 'jello',
            'bounceIn'          => 'bounceIn',
            'bounceInDown'      => 'bounceInDown',
            'bounceInLeft'      => 'bounceInLeft',
            'bounceInRight'     => 'bounceInRight',
            'bounceInUp'        => 'bounceInUp',
            'fadeIn'            => 'fadeIn',
            'fadeInDown'        => 'fadeInDown',
            'fadeInDownBig'     => 'fadeInDownBig',
            'fadeInLeft'        => 'fadeInLeft',
            'fadeInLeftBig'     => 'fadeInLeftBig',
            'fadeInRight'       => 'fadeInRight',
            'fadeInRightBig'    => 'fadeInRightBig',
            'fadeInUp'          => 'fadeInUp',
            'fadeInUpBig'       => 'fadeInUpBig',
            'flip'              => 'flip',
            'flipInX'           => 'flipInX',
            'flipInY'           => 'flipInY',
            'lightSpeedIn'      => 'lightSpeedIn',
            'rotateIn'          => 'rotateIn',
            'rotateInDownLeft'  => 'rotateInDownLeft',
            'rotateInDownRight' => 'rotateInDownRight',
            'rotateInUpLeft'    => 'rotateInUpLeft',
            'rotateInUpRight'   => 'rotateInUpRight',
            'slideInUp'         => 'slideInUp',
            'slideInDown'       => 'slideInDown',
            'slideInLeft'       => 'slideInLeft',
            'slideInRight'      => 'slideInRight',
            'zoomIn'            => 'zoomIn',
            'zoomInDown'        => 'zoomInDown',
            'zoomInLeft'        => 'zoomInLeft',
            'zoomInRight'       => 'zoomInRight',
            'zoomInUp'          => 'zoomInUp',
            'hinge'             => 'hinge',
            'rollIn'            => 'rollIn'            
        );
          
        return apply_filters( 'ut_recognized_in_animation_effects', $effects );
        
    } 

}

/*
 * All Out Animation Effects
 */
 
if ( !function_exists( 'ut_recognized_out_animation_effects' ) ) {

    function ut_recognized_out_animation_effects() { 
        
        $effects = array(
            'Standard'          => '',
            'bounceOut'         => 'bounceOut',
            'bounceOutDown'     => 'bounceOutDown',
            'bounceOutLeft'     => 'bounceOutLeft',
            'bounceOutRight'    => 'bounceOutRight',
            'bounceOutUp'       => 'bounceOutUp',
            'fadeOut'           => 'fadeOut',
            'fadeOutDown'       => 'fadeOutDown',
            'fadeOutDownBig'    => 'fadeOutDownBig',
            'fadeOutLeft'       => 'fadeOutLeft',
            'fadeOutLeftBig'    => 'fadeOutLeftBig',
            'fadeOutRight'      => 'fadeOutRight',
            'fadeOutRightBig'   => 'fadeOutRightBig',
            'fadeOutUp'         => 'fadeOutUp',
            'fadeOutUpBig'      => 'fadeOutUpBig',
            'flipOutX'          => 'flipOutX',
            'flipOutY'          => 'flipOutY',
            'lightSpeedOut'     => 'lightSpeedOut',
            'rotateOut'         => 'rotateOut',
            'rotateOutDownLeft' => 'rotateOutDownLeft',
            'rotateOutDownRight'=> 'rotateOutDownRight',
            'rotateOutUpLeft'   => 'rotateOutUpLeft',
            'rotateOutUpRight'  => 'rotateOutUpRight',
            'slideOutUp'        => 'slideOutUp',
            'slideOutDown'      => 'slideOutDown',
            'slideOutLeft'      => 'slideOutLeft',
            'slideOutRight'     => 'slideOutRight',
            'zoomOut'           => 'zoomOut',
            'zoomOutDown'       => 'zoomOutDown',
            'zoomOutLeft'       => 'zoomOutLeft',
            'zoomOutRight'      => 'zoomOutRight',
            'zoomOutUp'         => 'zoomOutUp',
            'rollOut'           => 'rollOut'
            
        );
          
        return apply_filters( 'ut_recognized_out_animation_effects', $effects );
        
    } 

}
        

