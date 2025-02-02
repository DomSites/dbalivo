<?php

if( !class_exists( "UT_Instagram_API" ) ) :

class UT_Instagram_API {
    
    /**
     * Instagram Username
     * @var string
     */ 
    
    public $username;
    
    /**
     * Max ID
     * @var string
     */ 
    
    public $max_id;    
    
    /**
     * Bio URL
     * @var string
     */ 
    
    public $bio_url;
    
    /**
     * Media URL
     * @var string
     */ 
    
    public $media_url;    
    
    
    /**
     * Instagram Count
     * @var number
     */ 
    
    public $count;    
    
    
    /**
     * Instagram Cache
     * @var string
     */ 
    
    public $cache; 
    
    function __construct() {
                
        // set necessary URL for json
        if( $this->username ) {
        
            $this->bio_url = 'https://www.instagram.com/' . trim( $this->username ) . '?__a=1';
            $this->media_url = 'https://www.instagram.com/' . trim( $this->username ) . '/media/';
        
        }
        
    }    
    
    public function get_instagram_feed() {
        
        $feed_items = '';
        
        // check cache
        if( $this->cache == 'on' ) {

            $feed_items = get_transient('ut_instagram_feed_by_' . $this->username );

        }
        
        // no cached instagram feeds
        if( empty( $feed_items ) ) {

            // fetch data
            if( $this->max_id ) {
            
                $remote = wp_remote_get( 'https://www.instagram.com/' . trim( $this->username ) . '/media/?max_id=' . $this->max_id );

            } else {
                
                $remote = wp_remote_get( 'https://www.instagram.com/' . trim( $this->username ) . '/media/' );
                
            }
                
            if ( is_wp_error( $remote ) ) {

                $error = new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'ut_shortcodes' ) ); 
                return $error->get_error_message();

            }

            if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {

                $error = new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'ut_shortcodes' ) );
                return $error->get_error_message();

            }

            $feed_items = !empty( $remote['body'] ) ? json_decode( $remote['body'] , TRUE ) : false; 
            $feed_items = !empty( $feed_items['items'] ) ? $feed_items['items'] : false;
            
            if( $this->count ) {
                
                $feed_items = array_slice( $feed_items, 0, $this->count );
                
            }

        } 
        
        // set cache 
        if( $this->cache == 'on' ) {
                
            set_transient('ut_instagram_feed_by_' . $this->username, $feed_items, 60 * 10 );

        }
        
        return $feed_items;
        
    }
    
    
    public function get_instagram_author_bio() {
        
        $user_bio = '';
            
        // check bio cache
        if( $this->cache == 'on' ) {

            $user_bio = get_transient('ut_instagram_bio_' . $this->username );

        }

        /* no cached instagram user bio */
        if( empty( $user_bio ) ) {

            /* fetch data */
            $remote = wp_remote_get( 'https://www.instagram.com/' . trim( $this->username ) . '?__a=1' );

            if ( is_wp_error( $remote ) ) {

                $error = new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'ut_shortcodes' ) ); 
                return $error->get_error_message();

            }

            if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {

                $error = new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'ut_shortcodes' ) );
                return $error->get_error_message();

            }

            $user_bio = !empty( $remote['body'] ) ? json_decode( $remote['body'] , TRUE ) : false; 

        }
        
        // set cache 
        if( $this->cache == 'on' ) {
                
            set_transient('ut_instagram_bio_' . $this->username, $user_bio, 60 * 10 );

        }
        
        return $user_bio;
        
        
        
        
    }    
    
    
    public function set_username( $username ) {
        
        // make sure its lower case and now @is in front of instagram name
        $username = strtolower( $username );
        $username = str_replace( '@', '', $username );
        
        $this->username = $username;        
        
    }
    
    public function set_count( $count ) {
        
        $this->count = $count;
        
    }
    
    public function set_max_id( $max_id ) {
                
        $this->max_id = $max_id;
        
    }
        
    public function set_cache( $cache ) {
        
        $this->cache = $cache;
        
    }
    
    
    
}

endif;




/**
 * Ajax Request for Instagram Feeds
 *
 * @return    strring
 *
 * @access    public
 * @since     4.4.6
 *
 */

if ( ! function_exists( 'ut_get_gallery_instagram_feed' ) ) :

	function ut_get_gallery_instagram_feed() {
        
        // get shortcode atts
        $atts = json_decode( stripslashes( $_POST['atts'] ), true );
                
        // initiate API
        $instagram = new UT_Instagram_API();
                
        // assign username and settings
        $instagram->set_username( $atts['instagram_user'] );
        $instagram->set_max_id( $atts['max_id'] );
        $instagram->set_count( $atts['count'] );
        
        // get feed items
        $feed_items = $instagram->get_instagram_feed();
        
        // get gallery items
        $gallery = new UT_Instagram_Gallery();
        $gallery->set_feed_items( $feed_items );
        
        // assign new max id
        $last_item_id = end( $feed_items );                
        $atts["max_id"] = $last_item_id["id"];
        
        // ajax json response 
        header( "Content-Type: application/json" );
        echo json_encode( array( 
            'feeds' => $gallery->ut_create_shortcode( $atts ),
            'atts' => $atts,  
        ) );
        
        exit;   
        
    }

endif;

add_action( 'wp_ajax_nopriv_ut_get_gallery_instagram_feed', 'ut_get_gallery_instagram_feed'  );
add_action( 'wp_ajax_ut_get_gallery_instagram_feed', 'ut_get_gallery_instagram_feed' );