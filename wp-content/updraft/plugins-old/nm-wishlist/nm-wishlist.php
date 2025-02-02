<?php
/*
	Plugin Name: Savoy Theme - Wishlist
	Plugin URI: http://themeforest.net/item/savoy-minimalist-ajax-woocommerce-theme/12537825
	Description: Wishlist plugin for the Savoy theme.
	Version: 1.1.1
	Author: NordicMade
	Author URI: http://www.nordicmade.com
	Text Domain: nm-wishlist
	Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/*
 * Class: NM Wishlist
 */
class NM_Wishlist {
	
	
	/* Plugin version */
	private $version = '1.1.1';
	
	/* Wishlist cookie name */
	private $cookie_name = 'nm-wishlist-items';
	
	
	/* Constructor */
	function __construct() {
		define( 'NM_WISHLIST_DIR', plugin_dir_path( __FILE__ ) );
		
		// Load plugin text-domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
		
		// Set the wishlist id's global (returns empty array if no products are added)
		global $nm_wishlist_ids;
        if ( isset( $_GET['nmwl_share'] ) && ! empty( $_GET['nmwl_share'] ) ) {
            $nm_wishlist_ids = $this->get_share_url_ids();
        } else {
            $nm_wishlist_ids = $this->get_products_cookie();
        }
		
		// Actions
		add_action( 'wp_footer', array( $this, 'enqueue_scripts' ), 19 );
		
		// Register Ajax functions
		add_action( 'wp_ajax_nm_wishlist_toggle' , array( $this, 'toggle' ) );
		add_action( 'wp_ajax_nopriv_nm_wishlist_toggle', array( $this, 'toggle' ) );
		
		// Wishlist shortcode
		add_shortcode( 'nm_wishlist', array( $this, 'wishlist' ) );
	}
	
	
	/* Load plugin text-domain */
	function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'nm-wishlist' );
		
		load_textdomain( 'nm-wishlist', WP_LANG_DIR . '/nm-wishlist/nm-wishlist-' . $locale . '.mo' );
		load_plugin_textdomain( 'nm-wishlist', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
	}
	
	
	/* Build plugin url */
	function url( $path ) {
		return plugins_url( $path, __FILE__ );
	}
	
	
	/* Enqueue scripts */
	function enqueue_scripts() {
		global $nm_page_includes;
				
		// Only enqueue script on single product page, page with products or main whislist page
		if ( is_product() || isset( $nm_page_includes['products'] ) || isset( $nm_page_includes['wishlist-home'] ) ) {
			wp_enqueue_script( 'nm-wishlist', $this->url( 'assets/js/nm-wishlist.min.js' ), array( 'jquery' ), $this->version );
			
			// Add localized Javascript variables
    		$localized_js_vars = array(
				'wlButtonTitleAdd'		=> __( 'Add to Wishlist', 'nm-wishlist' ),
				'wlButtonTitleRemove'	=> __( 'Remove from Wishlist', 'nm-wishlist' )
			);
    		wp_localize_script( 'nm-wishlist', 'nm_wishlist_vars', $localized_js_vars );
		}
	}
	
	
	/* AJAX: Add/remove product from wishlist (removes if already added) */
	function toggle() {
		$return_data = array();
        $product_id = isset( $_POST['product_id'] ) ? intval( $_POST['product_id'] ) : null;
		
		if ( $product_id ) {
            global $nm_wishlist_ids;
            
            $remove_item = ( isset( $_POST['remove_item'] ) && $_POST['remove_item'] ) ? true : false;
			
            if ( $remove_item ) {
                // Is the product added?
                if ( isset( $nm_wishlist_ids[$product_id] ) ) {
                    unset( $nm_wishlist_ids[$product_id] ); // Remove product-id from array
                
                    $return_data['status'] = "0";
                }
            } else {
                $nm_wishlist_ids[$product_id] = "1"; // Add product-id to array
				
				$return_data['status'] = "1";
            }
			
            $this->set_products_cookie( $nm_wishlist_ids );
			
            $return_data['count'] = count( $nm_wishlist_ids );
		}
		
		echo json_encode( $return_data );
		
		exit;
	}
	
	
	/* Set products cookie */
	function set_products_cookie( $wishlist_ids = array() ) {
        $wishlist_ids_json = json_encode( stripslashes_deep( $wishlist_ids ) ); // JSON encode array before saving to cookie
		$expiration = time() + 60 * 60 * 24 * 30; // 30 days
        
		wc_setcookie( $this->cookie_name, $wishlist_ids_json, $expiration, false );
	}
	
	
	/* Get products cookie */
	function get_products_cookie() {
		if ( isset( $_COOKIE[$this->cookie_name] ) ) {
			return json_decode( stripslashes( $_COOKIE[$this->cookie_name] ), true ); // Return -array- from JSON string
		}
		
		return array();
	}
    
    
    /* Get wishlist share URL id's */
    function get_share_url_ids() {
        $query_string_ids = explode( ',', $_GET['nmwl_share'] );
        $wishlist_ids = array();
        
        foreach( $query_string_ids as $id ) {
            $wishlist_ids[$id] = '1';
        }
        
        return $wishlist_ids;
    }
	
	
	/* Shortcode: Wishlist */
	function wishlist() {
		// Set page include
		global $nm_page_includes;
		$nm_page_includes['wishlist-home'] = true;
		
        // Get theme/child-theme template (if available)
        $wishlist_template = get_stylesheet_directory() . '/wishlist.php'; 
        
        // Include wishlist template
        if ( file_exists( $wishlist_template ) ) {
            include( $wishlist_template );
        } else {
            include( NM_WISHLIST_DIR . 'templates/wishlist.php' );
        }
		
		// Restore original Post Data
		wp_reset_postdata();
	}
	
	
}


/* Function: Init wishlist */
function nm_wishlist_init() {
	// Make the WooCommerce plugin is activated
	if ( class_exists( 'WooCommerce' ) )  {
		$NM_Wishlist = new NM_Wishlist();
	}
}
add_action( 'plugins_loaded', 'nm_wishlist_init' );


/* Function: Include wishlist button */
function nm_wishlist_button() {
	global $nm_wishlist_ids, $product;
	
	$button_class = '';
	$title = NULL;
    $product_id = esc_attr( $product->get_id() );
    
	// Is the product added?
	if ( isset( $nm_wishlist_ids[$product->get_id()] ) ) {
		$button_class = ' added';
		$title = esc_html__( 'Remove from Wishlist', 'nm-wishlist' );
	}
	
	$title = ( $title ) ? $title : esc_html__( 'Add to Wishlist', 'nm-wishlist' );
    $icon = apply_filters( 'nm_wishlist_button_icon', '<i class="nm-font nm-font-heart-o"></i>' );
    
    $output = sprintf( '<a href="#" id="nm-wishlist-item-%s-button" class="nm-wishlist-button nm-wishlist-item-%s-button%s" data-product-id="%s" title="%s">%s</a>',
        $product_id,
        $product_id,
        $button_class,
        $product_id,
        $title,
        $icon
    );
	
	echo $output;
}
