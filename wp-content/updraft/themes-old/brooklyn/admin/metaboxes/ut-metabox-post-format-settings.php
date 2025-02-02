<?php

if ( ! function_exists( 'ut_post_format_settings' ) ) :
 
    add_action( 'admin_init', 'ut_post_format_settings' );
    
    function ut_post_format_settings() {
        
        $ut_post_format_settings = array(
            
            'id'          => 'ut_post_format_settings',
            'title'       => 'Post Format Settings',
            'pages'       => array( 'post' ),
            'type'        => 'simple',
            'context'     => 'normal',
            'priority'    => 'low',
            'fields'      => array(
                
                array(
                    'id'          => '_format_video_embed',
                    'label'       => 'Video Embedded Code, Shortcode or URL',
                    'type'        => 'textarea-simple',
                ),
                array(
                    'id'          => '_format_audio_embed',
                    'label'       => 'Audio Embedded Code, Shortcode or URL',
                    'type'        => 'textarea-simple',
                ),
                array(
                    'id'          => '_format_link_url',
                    'label'       => 'Link to website, please add http://',
                    'type'        => 'text',
                ),                
                array(
                    'id'          => '_format_quote',
                    'label'       => 'Quote',
                    'type'        => 'text',
                ),
                array(
                    'id'          => '_format_quote_source_name',
                    'label'       => 'Name',
                    'type'        => 'text',
                ),                
                
            )
        
        ); 
                
        ot_register_meta_box( $ut_post_format_settings );
        
    }

endif;

?>