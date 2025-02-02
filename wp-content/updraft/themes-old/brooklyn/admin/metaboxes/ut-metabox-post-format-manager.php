<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class UT_Post_Formats_Manager {
    
    private $token;
    
    public function __construct( $file ) {
        
        $this->token = 'post';
        
        if ( is_admin() ) {
            
            /* meta box html */
            add_action( 'admin_menu', array( &$this, 'meta_box_setup' ), 20 );
            
            /* necessary scripts and styles */
            add_action( 'admin_print_styles-post.php', array( &$this, 'register_settings_styles' ) );
            add_action( 'admin_print_styles-post-new.php', array( &$this, 'register_settings_styles' ) );
                        
        }
    
    }
    
    public function register_settings_styles() {
        
        $min = NULL;
            
        if( !WP_DEBUG ){
            $min = '.min';
        } 
        
        wp_enqueue_style(
            'unite-post-format-manager', 
            FW_WEB_ROOT . '/core/admin/assets/css/unite-post-format-manager' . $min . '.css', 
            false, 
            UT_VERSION
        );
        
        wp_enqueue_script(
            'unite-post-format-manager', 
            FW_WEB_ROOT . '/core/admin/assets/js/unite-post-format-manager' . $min . '.js', 
            array(), 
            UT_VERSION,
            true
        );

    
    }
    
    public function meta_box_setup() {
    
        add_meta_box( 
            'ut-post-formats' , 
            esc_html__( 'Post Format Settings' , 'unitedthemes' ), 
            array( &$this, 'meta_box_content' ), 
            $this->token, 
            'normal', 
            'default'
        );
    
    }
    
    public function meta_box_content() {
        
        ?>
        
        <div id="ut-post-format-manager">
    
            <div class="ut-post-format-options">
            
                <a class="ut-post-format-state-0" href="#" data-ut-format="0" title="Standard">
                    <div class="standard">
                        <div class="dashicons dashicons-format-standard"></div>
                    </div>
                    <span class="post-format-title"><?php echo esc_html__( 'Standard', 'unitedthemes' ); ?></span>
                </a>
                
                <!-- <a class="ut-post-format-state-image" href="#" data-ut-format="image" title="Image">
                    <div class="standard">
                        <div class="dashicons dashicons-format-image"></div>
                    </div>
                    <span class="post-format-title"><?php echo esc_html__( 'Image', 'unitedthemes' ); ?></span>
                </a> -->
                
                <a class="ut-post-format-state-video" href="#" data-ut-format="video" title="Video">                
                    <div class="video">
                        <div class="dashicons dashicons-format-video"></div>
                    </div>                    
                    <span class="post-format-title"><?php echo esc_html__( 'Video', 'unitedthemes' ); ?></span>
                </a>
                
                <a class="ut-post-format-state-quote" href="#" data-ut-format="quote" title="Quote">                
                    <div class="video">
                        <div class="dashicons dashicons-format-quote"></div>
                    </div>                    
                    <span class="post-format-title"><?php echo esc_html__( 'Quote', 'unitedthemes' ); ?></span>
                </a>
                
                <a class="ut-post-format-state-audio" href="#" data-ut-format="audio" title="Audio">
                    <div class="audio">
                        <div class="dashicons dashicons-format-audio"></div>
                    </div>                    
                    <span class="post-format-title"><?php echo esc_html__( 'Audio','unitedthemes' ); ?></span>
                </a>
                
                <a class="ut-post-format-state-link" href="#" data-ut-format="link" title="Link">
                    <div class="audio">
                        <div class="dashicons dashicons-format-links"></div>
                    </div>                    
                    <span class="post-format-title"><?php echo esc_html__( 'Link', 'unitedthemes' ); ?></span>
                </a>
                
                <a class="ut-post-format-state-gallery" href="#" data-ut-format="gallery" title="Gallery">
                    <div class="gallery">
                        <div class="dashicons dashicons-format-gallery"></div>
                    </div>        
                    <span class="post-format-title"><?php echo esc_html__( 'Gallery', 'unitedthemes' ); ?></span>
                </a>
            
            </div>
            
            <div id="ut-post-format-0" class="ut-post-format-box clearfix">        
                  
                <div class="grid-100">
                    <h3><?php echo esc_html__( 'Standard', 'unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'This post format does not need any settings.', 'unitedthemes' ); ?></p>
                </div>
                
                <div class="post_format_0"></div>
                
            </div>
            
            <!-- <div id="ut-post-format-image" class="ut-post-format-box clearfix">        
                  
                <div class="grid-100">
                    <h3><?php echo esc_html__( 'Image', 'unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'Please upload a featured image.', 'unitedthemes' ); ?></p>
                </div>
                  
            </div> -->
            
            <div id="ut-post-format-video" class="ut-post-format-box clearfix">        
                  
                <div class="grid-30">
                    <h3><?php echo esc_html__( 'Video','unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'Paste a video link, embed or video shortcode into the box.', 'unitedthemes' ); ?></p>
                </div>
                  
                <div class="grid-70 post_format_video ut-post-format-content"></div>
                  
            </div>
            
            <div id="ut-post-format-quote" class="ut-post-format-box clearfix">        
                
                <div class="grid-30">
                    <h3><?php echo esc_html__( 'Quote','unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'Please insert a quote inside the editor or use these boxes.', 'unitedthemes' ); ?></p>
                </div>  
                  
                <div class="grid-70 post_format_quote ut-post-format-content">
                
                    <p class="quote">
                        Quote <br>
                    </p>
                    
                    <p class="name">
                        Name <br>
                    </p>
                
                </div>
                  
            </div>
            
            <div id="ut-post-format-audio" class="ut-post-format-box clearfix">        
                
                <div class="grid-30">
                    <h3><?php echo esc_html__( 'Audio','unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'Paste down a audio link, embed or audio shortcode into the box.', 'unitedthemes' ); ?></p>    
                </div>
                
                <div class="grid-70 post_format_audio ut-post-format-content"></div>
                  
            </div>
            
            <div id="ut-post-format-link" class="ut-post-format-box clearfix">
                
                <div class="grid-30">
                    <h3><?php echo esc_html__( 'Link','unitedthemes' ); ?></h3>
                    <p><?php esc_html_e( 'Paste down a link to a website. Please do not forget to add http:// in front.', 'unitedthemes' ); ?></p>    
                </div>
                                  
                  <div class="grid-70 post_format_link ut-post-format-content"></div>
                  
            </div>
            
            <div id="ut-post-format-gallery" class="ut-post-format-box clearfix">        
                  <div class="post_format_gallery">
                    
                  Simply place a standard WordPress Gallery inside your editor. For further informations about how to setup a gallery please have a look here: <a href="http://codex.wordpress.org/Gallery_Shortcode" target="_blank">Gallery Codex</a>
                  
                  </div>
            </div>
            
        </div>
                
        <?php
        
        
        
    
    }    

}

new UT_Post_Formats_Manager( __FILE__ );