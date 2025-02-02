<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Default Theme Constants
 *
 * @since 1.0
 */
 
define('UT_THEME_NAME', 'Brooklyn');
define('UT_THEME_VERSION', '4.5.3');

/* Unite Framework 
   if you are looking for scripts enqueue or other stuff which is usually 
   located inside this file please have a look into unite-custom folder 
*/
require( 'unite/unite-init.php' );


/* old admin - will be removed in a future update  */
if( is_admin() ) {
    
    /* option tree loader */    
    include( THEME_DOCUMENT_ROOT . '/admin/ot-loader.php' );
    
    include( THEME_DOCUMENT_ROOT . '/admin/ut-admin-loader.php' );
    
    /* layout loader for demo importer */ 
    include( get_template_directory() . '/admin/ut-layout-loader.php' );
    
    /* theme demo importer */
    include( THEME_DOCUMENT_ROOT . '/admin/ut-demo-importer.php' );
    
}
    

/**
 * Visual Composer Config
 *
 * @since     4.0
 */

include( THEME_DOCUMENT_ROOT . '/vc/vc-config.php' );


/**
 * Woocommerce
 */

if( ut_is_plugin_active('woocommerce/woocommerce.php') ) {
    
    /* remove default woocommerce content wrapper */
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content' , 'woocommerce_output_content_wrapper_end', 10);
    
}


/**
 * Default Content Width
 */
 
if ( !isset( $content_width ) ) {
    $content_width = 1170; /* pixels */
}


/**
 * Load required files
 */
include( THEME_DOCUMENT_ROOT . '/inc/sidebars/index.php' );   /* deprecated */

include( THEME_DOCUMENT_ROOT . '/inc/ut-image-resize.php' );  /* deprecated - will be moved to new core plugin in a future update */
include( THEME_DOCUMENT_ROOT . '/inc/ut-theme-postformat-tools.php' );

include( THEME_DOCUMENT_ROOT . '/inc/ut-prepare-header.php' );
include( THEME_DOCUMENT_ROOT . '/inc/ut-prepare-front-page.php' );
include( THEME_DOCUMENT_ROOT . '/inc/ut-prepare-csection.php' );
include( THEME_DOCUMENT_ROOT . '/inc/ut-section-player.php' );

/**
 * Load required files depending on site type
 */
if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
    
    include( THEME_DOCUMENT_ROOT . '/inc/ut-prepare-hero-onepage.php' );
    include( THEME_DOCUMENT_ROOT . '/inc/ut-menu-walker-onepage.php' );

} else {
    
    include( THEME_DOCUMENT_ROOT . '/inc/ut-prepare-hero-multisite.php' );
    include( THEME_DOCUMENT_ROOT . '/inc/ut-menu-walker.php' );
    
}

/*
 * Cutom JavaScript
 * 
 * can be placed within the child theme 
 */
if( file_exists( STYLE_DOCUMENT_ROOT . '/inc/ut-custom-js.php' ) ) {
    
    /* file inside child theme */
    include_once( STYLE_DOCUMENT_ROOT . '/inc/ut-custom-js.php' );

} else {
    
    /* file inside main theme */
    include_once( THEME_DOCUMENT_ROOT . '/inc/ut-custom-js.php' );
    
}


/*
|--------------------------------------------------------------------------
| WordPress Customizer
|--------------------------------------------------------------------------
*/
require get_template_directory() . '/inc/ut-customizer.php';


/*
|--------------------------------------------------------------------------
| Recognized Font Families
|--------------------------------------------------------------------------
*/

if ( !function_exists( 'ut_recognized_families' ) ) {

    function ut_recognized_families( $basefonts ) {
            
          $newfonts = array(
                "ralewayextralight"     => "Raleway Extralight",
                "ralewaylight"          => "Raleway Light",
                "ralewayregular"        => "Raleway Regular",
                "ralewaymedium"         => "Raleway Medium",
                "ralewaysemibold"       => "Raleway Semibold",
                "ralewaybold"           => "Raleway Bold"        
        );
        
        $basefonts = array_merge( $basefonts , $newfonts );
        return $basefonts;
      
    }
    
}

/*
|--------------------------------------------------------------------------
| Custom Search Form 
| due to WP echo on get_search_form Bug we need to make use a filter
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_searchform_filter' ) ) {

    function ut_searchform_filter( $form ) {

    $searchform = '<form role="search" method="get" class="search-form" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
        <label>
            <span>' .__( 'Search for:' , 'unitedthemes' ) . '</span>
            <input type="search" class="search-field" placeholder="' .esc_attr__( 'To search type and hit enter' , 'unitedthemes' ) . '" value="' . esc_attr( get_search_query() ) . '" name="s" title="' . __( 'Search for:' , 'unitedthemes' ) . '">
        </label>
        <input type="submit" class="search-submit" value="' . esc_attr__( 'Search' , 'unitedthemes' ) . '">
        </form>';
        
        return $searchform; 
    }
    
    add_filter( 'get_search_form', 'ut_searchform_filter' );

}


/*
|--------------------------------------------------------------------------
| helper function : return image ID by URL
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_get_image_id' ) ) {
    
    function ut_get_image_id($image_url) {
        
        global $wpdb;
        
        if( empty($image_url) ) {
            return;
        }
        
        $prefix = $wpdb->prefix;
        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $image_url )); 
        
        return isset($attachment[0]) ? $attachment[0] : ''; 
            
            
    }

}

/*
|--------------------------------------------------------------------------
| helper function : returns needed meta data of the current page
|--------------------------------------------------------------------------
*/

if( !function_exists('ut_return_meta') ) {

    function ut_return_meta( $key = '' ) {
        
        if( empty($key) ) {
            return;
        }
        
        global $post, $wp_query;
        
        // woo commerce shop ID
        if( function_exists('is_shop') ) {
            
            if( is_shop() ) {
                $pageID = get_option('woocommerce_shop_page_id');
            }
            
        }
        
        // blog page ID
        if( is_home() || ut_is_blog_related() ) {
            
            $pageID = get_option('page_for_posts');
        
        // all other pages
        } else {
            
            $pageID = ( isset($wp_query->post) ) ? $wp_query->post->ID : NULL;
            
        }
        
        if ( !empty($key) ) {
            
            return get_post_meta( $pageID , $key , true);
             
        } else {
            
            return get_post_meta( $pageID );
            
        }
        
    }
        
}




/*
|--------------------------------------------------------------------------
| helper function : default menu output
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_default_menu') ) {
    
    function ut_default_menu() {
        
        echo '<nav id="navigation" class="grid-85 hide-on-tablet hide-on-mobile ">';
            
            echo '<ul id="menu-main">';
            
                echo '<li><a class="ut-setup-menu" href="' . get_admin_url() . 'nav-menus.php">' . esc_html__('Set Up Your Menu', 'unitedthemes') . '</a></li>';
            
            echo '</ul>';
            
        echo '</nav>';
        
    }
    
}


/*
|--------------------------------------------------------------------------
| helper function : QTranslate Quicktags Support for Meta and Theme Options
|--------------------------------------------------------------------------
*/
if ( ! function_exists( 'ut_translate_meta' ) ) :
    
    function ut_translate_meta($content) {
        
        if( function_exists ( 'qtrans_useCurrentLanguageIfNotFoundShowAvailable' ) ) {
            return qtrans_useCurrentLanguageIfNotFoundShowAvailable($content);
        }
        
        if( function_exists ( 'ppqtrans_useCurrentLanguageIfNotFoundShowAvailable' ) ) {
            return ppqtrans_useCurrentLanguageIfNotFoundShowAvailable($content);
        }
        
        if( function_exists ( 'qtranxf_useCurrentLanguageIfNotFoundShowAvailable' ) ) {
            return qtranxf_useCurrentLanguageIfNotFoundShowAvailable($content);
        }
        
        return $content;
        
    }
    
endif;


/*
|--------------------------------------------------------------------------
| Helper Function: create background video player
|--------------------------------------------------------------------------
*/

if( !function_exists('ut_dynamic_conditional') ) :

    function ut_dynamic_conditional($option = '') {
        
        if(empty($option)) {
            return false;
        }
        
        $dynamic_for = ot_get_option($option);
        $dynamic_match = false;
        
        if( !empty($dynamic_for) && is_array($dynamic_for) ) {
            
            foreach( $dynamic_for as $key => $conditional ) {
                
                if( $conditional() && $conditional != 'is_singular' ) {

                    $dynamic_match = true;
                    
                    /* front page gets handeled as a page too */
                    if( $conditional == 'is_page' && is_front_page() ) {
                        
                        $dynamic_match = false;
                    
                    } elseif( $conditional == 'is_single' && is_singular('portfolio') ) {
                       
                        $dynamic_match = false;
                            
                    } else {
                    
                        /* we have a match , so we can stop the loop */
                        break;
                    
                    }
                    
                }
                
                if( $conditional('portfolio') && $conditional == 'is_singular' ) {
                    
                    $dynamic_match = true;
                    break;
                
                }
            
            }
            
        }
        
        return $dynamic_match;
        
    }
    
endif;





if( !function_exists('ut_installation_note') ) :

    function ut_installation_note() { ?>
        
        <div class="grid-container section-content">
                            
            <div class="grid-100 mobile-grid-100 tablet-grid-100">
                    
            <div class="section-content">
                <div class="ut-install-note">
                
                <h2><?php _e( 'Setup Information' , 'unitedthemes' ); ?></h2>
                
                <p>
                <?php _e( 'Thank you for purchasing our theme. We hope you enjoy our product! If you have any questions that are beyond the scope of the help file, please feel free to contact us on our Support Forum at.' , 'unitedthemes' ); ?>
                <a href="http://support.unitedthemes.com/">http://support.unitedthemes.com</a>
                </p>
                
                <p>
                <?php _e( 'Information: There are no Pages are assigned to the menu yet or the assigned pages are not set to menutype "Section"! Please read the delivered documentation carefully. We recommend to start with the "Start from Scratch Setup" documentation part.' , 'unitedthemes' ); ?> <br />
                </p>
                
                <p><strong><?php _e( 'Useful links to start with:' , 'unitedthemes' ); ?></strong></p>
                
                <ul>
                    <li><a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=install-required-plugins"><?php _e( 'Install required plugins', 'unitedthemes' ); ?></a></li>
                    <li><a href="<?php echo home_url(); ?>/wp-admin/customize.php"><?php _e( 'Customize Theme', 'unitedthemes' ); ?></a></li>
                    <li><a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=ot-theme-options"><?php _e( 'Theme Options', 'unitedthemes' ); ?></a></li>
                    <li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php _e( 'Set Up Your Menu', 'unitedthemes' ); ?></a></li>
                </ul>
                </div>
                
            </div>
            
        </div>
        
    <?php }
   
endif;


/*
|--------------------------------------------------------------------------
| Helper Function: returns sidebar id for current page
|--------------------------------------------------------------------------
*/
if( !function_exists('ut_get_sidebar_settings') ) {

	function ut_get_sidebar_settings() {
        
        /* create sidebar settings array */
        $sidebar_settings = array();
        
        /* assign primary sidebar */
        $sidebar_settings['primary_sidebar'] = ut_return_meta('ut_select_sidebar');        
                
        /* return sidebar config */
        return $sidebar_settings;
            
    }

}


if( !function_exists('ut_blog_has_sidebar') ) {

    function ut_blog_has_sidebar(){
        
        if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
            
            return is_active_sidebar('blog-widget-area') && apply_filters( 'ut_show_sidebar', true );
            
        } else {
            
            if( is_single() ) {
                
                if( ot_get_option( 'ut_single_posts_sidebar', 'on' ) == 'on' && is_active_sidebar( 'blog-widget-area' ) && apply_filters( 'ut_show_sidebar', true ) ) {
                    
                    return true;
                    
                } else {
                    
                    return false;
                    
                }
                
            } else {            
                
                $ut_get_sidebar_settings = ut_get_sidebar_settings();
                
                if( $ut_get_sidebar_settings['primary_sidebar'] ) {
                
                    return is_active_sidebar( $ut_get_sidebar_settings['primary_sidebar'] ) && apply_filters( 'ut_show_sidebar', true ) && $ut_get_sidebar_settings['primary_sidebar'] != 'no_sidebar';

                } else {
                    
                    return is_active_sidebar('blog-widget-area') && apply_filters( 'ut_show_sidebar', true );
                    
                }
            
            }
                
        }
        
    }

}


/*
|--------------------------------------------------------------------------
| Helper Function: removes numerics from section ID's and replaces them 
| to avoid CSS styling issues
|--------------------------------------------------------------------------
*/
if ( !function_exists( 'ut_clean_section_id' ) ) {

    function ut_clean_section_id( $slug ) {
        
        /* check if slug contains any numbers */
        if ( !preg_match('/[0-9]/', $slug) ) {
            return $slug;        
        }
        
        $slug    = str_split($slug);
        $newslug = '';
        
        $dictionary  = array(
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine'
        );
        
        foreach($slug as $char) {
            
            if( ctype_digit($char) ) {
                
                $newslug.= $dictionary[$char];
                
            } else {
                
                $newslug.= $char;
                
            }
            
        }
        
        return $newslug;
        
            
    }

}


/*
|--------------------------------------------------------------------------
| Helper Function: enhance crop settings under settings media
|--------------------------------------------------------------------------
*/
function ut_crop_settings_api_init() {
	
    add_settings_section(
		'crop_settings_section',
		'Crop images',
		'ut_crop_settings_callback_function',
		'media'
	);
	
    add_settings_field(
		'medium_crop',
		'Medium size crop',
		'ut_crop_medium_callback_function',
		'media',
		'crop_settings_section'
	);
	
    add_settings_field(
		'large_crop',
		'Large size crop',
		'ut_crop_large_callback_function',
		'media',
		'crop_settings_section'
	);
    
	register_setting( 'media', 'medium_crop' );
	register_setting( 'media', 'large_crop' );
    
} 

add_action( 'admin_init', 'ut_crop_settings_api_init', 1 );

function ut_crop_settings_callback_function() {
    echo '<p>Choose whether to crop the medium and large size images</p>';
}

function ut_crop_medium_callback_function() {
	echo '<input name="medium_crop" type="checkbox" id="medium_crop" value="1"';
    $mediumcrop = get_option( "medium_crop");
    if ( $mediumcrop == 1 ) {
        echo ' checked';
	} 
	echo '/>';
	echo '<label for="medium_crop">Crop medium to exact dimensions</label>';
}

function ut_crop_large_callback_function() {
	echo '<input name="large_crop" type="checkbox" id="large_crop" value="1"';
    $largecrop = get_option( "large_crop");
    if ( $largecrop == 1 ) {
        echo ' checked';
	} 
	echo '/>';
	echo '<label for="large_crop">Crop large to exact dimensions</label>';
}