<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Hero State
 */

if ( ! function_exists( 'ut_hero_state' ) ) :

    function ut_hero_state() {
        
        /* onepage front page and blog always do have a hero */
        if( is_front_page() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' || is_home() && ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
            return true;            
        }
        
        /* sytem pages with hero support */
        if( is_search() || is_404() || is_archive() ) {
            return true;
        }
        
        /* hero support for single posts */
        if( is_single() && !is_singular( 'portfolio' ) ) {
            
            if( ut_collect_option( 'ut_post_hero', 'off', 'ut_' ) == 'on' && ( has_post_thumbnail( get_the_ID() ) || 'video' == get_post_format() ) ) {
                
                return true;
                
            } else {
                
                return false;
                
            }
            
        }
        
        /* check if current page has an active hero */
        $current = get_queried_object();
        
        if( isset( $current->ID ) && get_post_meta( $current->ID , 'ut_activate_page_hero' , true ) == 'on' ) {
            
            return true;
        }

        return false;
    
    }
    
    add_filter( 'ut_show_hero', 'ut_hero_state' );
    
endif;



/**
 * Change Blog Layout by URL
 */

if ( ! function_exists( 'change_blog_layout_by_url' ) ) :

    function change_blog_layout_by_url( $layout ) {
        
        global $ajax_blog_layout;
        
        $layouts = array(
            'classic',
            'mixed-grid',
            'grid',
            'list-grid',
            'list-grid-first-full'
        );        
        
        if( isset( $_GET['home_layout'] ) && in_array( $_GET['home_layout'], $layouts ) ) {            
            
            $layout = $_GET['home_layout'];
            
        }
        
        if( isset( $ajax_blog_layout ) && in_array( $ajax_blog_layout, $layouts ) ) {
            
            $layout = $ajax_blog_layout;
            
        }

        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'change_blog_layout_by_url', 90 );
    
endif;



/**
 * Change Blog Layout for Mobile
 */

if ( ! function_exists( 'change_blog_layout_by_device' ) ) :

    function change_blog_layout_by_device( $layout ) {
        
        if( unite_mobile_detection()->isMobile() ) {
            return 'grid';    
        }

        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'change_blog_layout_by_device', 91 );
    
endif;




/**
 * Activate Hero by URL
 */

if ( ! function_exists( 'change_hero_by_url' ) ) :

    function change_hero_by_url( $status ) {
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'on' ) {
            return true;
        }
        
        if( isset( $_GET['hero'] ) && $_GET['hero'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_hero', 'change_hero_by_url', 90 );
    
endif;



/**
 * Activate / Deactive Sidebar by URL
 */

if ( ! function_exists( 'change_sidebar_by_url' ) ) :

    function change_sidebar_by_url( $status ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_sidebar', 'change_sidebar_by_url', 90 );
    
endif;


/**
 * Activate / Deactive Sidebar by URL
 */

if ( ! function_exists( 'change_sidebar_by_url' ) ) :

    function change_sidebar_by_url( $status ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' ) {
            return false;
        }

        return $status;
    
    }
    
    add_filter( 'ut_show_sidebar', 'change_sidebar_by_url', 90 );
    
endif;



/**
 * Excerpt Length List Grid without Sidebar
 */

if ( ! function_exists( 'change_excerpt_list_grid_by_url' ) ) :

    function change_excerpt_list_grid_by_url( $length ) {
        
        if( isset( $_GET['sidebar'] ) && $_GET['sidebar'] == 'off' && isset( $_GET['home_layout'] ) && $_GET['home_layout'] == 'list-grid' ) {
            return 70;
        }

        return $length;
    
    }
    
    add_filter( 'ut_blog_list_excerpt_length', 'change_excerpt_list_grid_by_url', 90 );
    
endif;








/**
 * Page Title
 *
 * @access    public 
 * @version   1.0.0
 */ 
 
if( !function_exists('ut_page_title') ) :

    function ut_page_title() { 
        
        global $wp_version;
        
        if ( $wp_version <= 4.1 ) { ?>
            
            <title><?php echo wp_title( '|', true, 'right' ); ?></title>
        
        <?php }
        
    }

    add_action('ut_meta_theme_hook', 'ut_page_title' );
    
endif;


/**
 * Page Title Separator
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */ 

if( !function_exists('ut_page_title_separator') ) :

    function ut_page_title_separator( $sep ) {
    
        $sep = "|";
    
        return $sep;
    
    }
    
    add_filter( 'document_title_separator', 'ut_page_title_separator' );

endif;


/**
 * Extra Classs For Body
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */ 
 
if ( ! function_exists( 'ut_body_classes' ) ) :

    function ut_body_classes( $classes ) {
        
        global $post;
        
        if( ( is_singular("portfolio") || is_page() ) && $post && !preg_match( '/vc_section/', $post->post_content ) ) {
            
            $classes[] = 'ut-vc-disabled';
            
        } else {
            
            $classes[] = 'ut-vc-enabled';
            
        }        
        
        if( ( $post && empty( $post->post_content ) && ut_page_option( 'ut_footerarea', 'on' ) == 'off' && ut_return_csection_config('ut_activate_csection', 'on') == 'off' ) || !ut_search_result_status() ) {
            $classes[] = 'ut-page-has-no-content';
        }
        
        // hero height classes for single pages
        if( is_single() && !is_singular( 'portfolio' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') <= 49 ) {
        
            $classes[] = 'ut-hero-height-50';
            
        } elseif( is_single() && !is_singular( 'portfolio' ) && apply_filters( 'ut_show_hero', false ) && ut_collect_option('ut_post_hero_height', '50', 'ut_') >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
        
        // hero height classes for archive pages
        if( is_archive() && ot_get_option('ut_archive_hero_height') <= 49 ) {
        
            $classes[] = 'ut-hero-height-50';
            
        } elseif( is_archive() && ot_get_option('ut_archive_hero_height') >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
       
        // hero for all other pages
        if( ut_return_hero_config('ut_hero_type', 'image') == 'image' && ut_return_hero_config( 'ut_hero_dynamic_content_height', '50' ) <= 49 ) {
            
            $classes[] = 'ut-hero-height-50';
            
        } elseif( ut_return_hero_config('ut_hero_type', 'image') == 'image' && ut_return_hero_config( 'ut_hero_dynamic_content_height', '50' ) >= 50 ) {
            
            $classes[] = 'ut-hero-height-100';
            
        }
        
        // extra class if header is not visible on hero
        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) != 'ut-header-custom' && ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'off' || ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' && ut_return_header_config( 'ut_navigation_customskin_state', 'off' ) == 'off' ) {
            
            if( apply_filters( 'ut_show_hero', false ) ) {
                $classes[] = 'ut-hero-header-off';            
            }
            
        }
        
        // site border
        if( ut_page_option( 'ut_site_border', 'hide' ) == 'show' ) {
            $classes[] = 'ut-site-border';
        }
               
                
        if( ut_page_option( 'ut_top_header', 'hide' ) == 'show' ) {
            $classes[] = 'ut-has-top-header';
        }
        
        if( ut_page_option( 'ut_display_section_header', 'show', 'ut_' ) == 'show' ) {
            $classes[] = 'ut-has-page-title';
        }
        
        // scroll top 
        if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' && ( ut_return_csection_config('ut_activate_csection' , 'on') == 'off' || !ut_return_csection_config('ut_activate_csection' , 'on') == 'off' ) ) {            
            $classes[] = 'ut-has-scroll-top';
        }        
                
        if( is_home() && ot_get_option( 'ut_animate_blog_articles', 'off' ) == 'on' ) {
            $classes[] = 'ut-blog-has-animation';
        }
        
        if( apply_filters( 'ut_show_hero', false ) ) {
            
            $classes[] = 'has-hero';
            
        } else {
            
            $classes[] = 'has-no-hero';
            
        }
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' ) {
            $classes[] = 'ut-has-bklyn-sidenav';
        }
        
        if( apply_filters( 'ut_maintenance_mode_active', false ) ) {
            $classes[] = 'ut-bklyn-maintenance';
        } 
        
        if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
            
            $classes[] = 'ut-bklyn-onepage';        
            
        } else {
        
            $classes[] = 'ut-bklyn-multisite';    
        
        }
        
        return $classes;        
        
    }
    
    add_filter( 'body_class', 'ut_body_classes' );
    
endif;



/**
 *  Site Frame
 *
 * @access    public 
 * @since     4.4.4
 * @version   1.0.0
 */


if ( ! function_exists( 'ut_site_frame_state' ) ) :

    function ut_site_frame_state() {
        
        // pages and portfolios can have individual settings
        if( isset( get_queried_object()->ID ) && ( is_page() || is_singular("portfolio") || is_home() ) )  {
            
            // check if we are using a global option
            $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );
            
            if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

                $ut_site_border = ot_get_option( 'ut_site_border', 'hide' );

            } else {

                $ut_site_border = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

            }
            
            
        } else {
            
            $ut_site_border = ot_get_option( 'ut_site_border', 'hide' );            
            
        }        
        
        return $ut_site_border;
        
    }

    add_filter( 'ut_show_siteframe', 'ut_site_frame_state' );

endif;



/**
 * Extra Classs For Body
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */ 
 
if ( ! function_exists( 'ut_body_site_frame_classes' ) ) :

    function ut_body_site_frame_classes( $classes ) {
                
        // pages and portfolios can have individual settings
        if( isset( get_queried_object()->ID ) && ( is_page() || is_singular("portfolio") || is_home() ) )  {
                        
            // check if we are using a global option
            $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

            if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

                $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

            } else {

                $ut_site_border_status = get_post_meta( get_queried_object()->ID, 'ut_page_site_border_status', true );

            }                        

        // all other pages are based on global settings    
        } else {

            $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

        }
        
        if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' && ut_page_option( 'ut_top_header', 'hide' ) == 'hide' && isset( $ut_site_border_status['margin-top'] ) && $ut_site_border_status['margin-top'] == 'on' ) {
            $classes[] = 'ut-site-frame-top';
        } 
        
        return $classes;
        
    }
    
    add_filter( 'body_class', 'ut_body_site_frame_classes' );

endif;



/**
 * Loader Overlay Markup
 *
 * @access    public 
 * @since     4.1.0
 * @version   1.0.1
 */ 
 
if ( ! function_exists( 'ut_loader_overlay' ) ) :

    function ut_loader_overlay( $classes ) {
        
        if( ot_get_option( 'ut_use_image_loader' ) == 'on' ) {
					
            if( ut_dynamic_conditional( 'ut_use_image_loader_on' ) ) {
        
                echo '<div class="ut-loader-overlay"></div>';
                echo '<div id="qLoverlay"><div class="ut-inner-overlay"></div></div>';
            
            }
        
        }
        
    }
    
    add_action( 'ut_before_header_hook', 'ut_loader_overlay' );
    
endif;



/**
 * Delete Category Transient
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if ( ! function_exists( 'unitedthemes_category_transient_flusher' ) ) : 
 
    function unitedthemes_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient( 'all_the_cool_cats' );
    }
    
    add_action( 'edit_category', 'unitedthemes_category_transient_flusher' );
    add_action( 'save_post',     'unitedthemes_category_transient_flusher' );

endif;


/**
 * fix wordpress w3c rel
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if( !function_exists('ut_replace_cat_tag') ) {
    
    function ut_replace_cat_tag ( $text ) {
        
        $text = preg_replace('/rel="category tag"/', 'data-rel="category tag"', $text); return $text;
        
    }
    
    add_filter( 'the_category', 'ut_replace_cat_tag' );
    
}


/**
 * add editor styles
 *
 * @access    public 
 * @since     1.0
 * @version   1.0
 */ 

if ( !function_exists( 'ut_add_editor_styles' ) ) {

    function ut_add_editor_styles() {
        
        add_editor_style( 'ut-editor.css' );
        
    }
    
    add_action( 'init', 'ut_add_editor_styles' );
    
}


/**
 * Side Navigation Content Wrap Open
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_open') ) :

    function ut_side_navigation_content_wrap_open() { 
        
        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }        
        
        echo '<div id="bklyn-sidenav-content-wrap">';        
        
    }

    add_action('ut_before_header_hook', 'ut_side_navigation_content_wrap_open' );
    
endif;

/**
 * Side Navigation Content Wrap Close
 *
 * @access    public 
 * @version   4.2.0
 */ 
 
if( !function_exists('ut_side_navigation_content_wrap_close') ) :

    function ut_side_navigation_content_wrap_close() { 

        if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
            return;
        }
        
        echo '</div>';
        
    }

    add_action('ut_after_footer_hook', 'ut_side_navigation_content_wrap_close' );
    
endif;



/*
 * Change Category Blog Layout
 *
 * @access    public 
 * @since     4.2.0
 * @version   1.0.0
 */
           
if ( ! function_exists( 'search_blog_layout' ) ) :

    function search_blog_layout( $layout ) {
        
        if( is_search() || is_archive() || is_author() ) {
            
            $layout = 'grid';
            
        }
        
        return $layout;
    
    }
    
    add_filter( 'unite_blog_layout', 'search_blog_layout', 90 );
    
endif;

