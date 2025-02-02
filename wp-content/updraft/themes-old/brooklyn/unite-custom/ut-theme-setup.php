<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */ 
if ( ! isset( $content_width ) ) {
    $content_width = 1170; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
 if ( ! function_exists( 'unite_theme_setup' ) ) {

    function unite_theme_setup() {
        
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on unitedthemes, use a find and replace
         * to change 'unitedthemes' to the name of your theme in all the template files
         * we recommend to place the language files inside the child theme
         */         
        load_theme_textdomain( 'unitedthemes' , STYLE_DOCUMENT_ROOT . '/admin/languages' );
        
        
        /*
         * Add default posts and comments RSS feed links to head.
         */
	    add_theme_support( 'automatic-feed-links' );        
                
        /*
         * Let WordPress manage the document title.
         */
        add_theme_support( 'title-tag' );
        
        
        /*
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'unitedthemes' ),
            'mobile' => __( 'Mobile Menu', 'unitedthemes' ),
            //'overlay' => __( 'Overlay Menu', 'unitedthemes' ) 
        ) );
        
        /**
         * Enable support for Post Formats
         */
           
        add_post_type_support( 'portfolio', 'post-formats' );  
                
        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array( 'video', 'quote', 'audio', 'link', 'gallery' ) ); 
        
       /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' , array( 'post' , 'page' , 'portfolio' , 'product' , 'ajde_events' ) );
        
        /**
         * Register Custom Size
         *
         * @link https://codex.wordpress.org/Function_Reference/add_image_size
         */
        add_image_size( 'ut-lightbox', '1280', '720', false ); // Added with 4.4 for a better lightbox experience
        
        
    }
    
    add_action( 'after_setup_theme', 'unite_theme_setup' );
    
}