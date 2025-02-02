<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Instagram_Author' ) ) {
	
    class UT_Instagram_Author {
        
        private $shortcode;        
        private $feed_items;
        
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_instagram_author';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Instagram Author Box', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Community',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/default.png',
                        'class'           => 'ut-vc-icon-module ut-community-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Instagram Username', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Please enter your Instagram Username.', 'ut_shortcodes' ),
                                'group'             => 'General',
                                'param_name'        => 'instagram_user',
                                'admin_label'       => true
                            ),        
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Cache Instagram Feeds?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'This option will activate a cache which has a lifetime of 1 hour and caches all your feeds inside the WordPress Database. Turning this option on is recommended for production sites, since it increases your page loading speed.', 'ut_shortcodes' ), 
                                'param_name'        => 'cache',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!' , 'ut_shortcodes' )  => 'off',
                                    esc_html__( 'yes, please!' , 'ut_shortcodes' ) => 'on',
                                )
                            ),
                    
                    
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'instagram_user' => '',
                'cache' => ''
            ), $atts ) ); 
            
            /* start output */
            $output = '';
        
            if( !$instagram_user ) {
                return esc_html__( 'Please enter your instagram username.', 'ut_shortcodes' );
            }
            
            if( !$this->feed_items ) {
            
                // initiate API
                $instagram = new UT_Instagram_API();

                // assign username and settings
                $instagram->set_username( $instagram_user );
                $instagram->set_cache( $cache );            

                $this->feed_items = $instagram->get_instagram_author_bio();
            
            }
            
            //ut_print( $this->feed_items );
                
            
            
            $output .= '<img src="' . esc_url( $this->feed_items["user"]["profile_pic_url_hd"] ) . '" alt="' . esc_attr( $this->feed_items["user"]["full_name"] )  . '">';
            
            $output .= $this->feed_items["user"]["full_name"];
            $output .= $this->feed_items["user"]["username"];
            $output .= $this->feed_items["user"]["biography"];
            $output .= $this->feed_items["user"]["external_url"];
            
            $output .= $this->feed_items["user"]["followed_by"]["count"];
            $output .= $this->feed_items["user"]["follows"]["count"];
            
            
            
            

                
            return $output;
        
        }
            
    }

}

new UT_Instagram_Author;