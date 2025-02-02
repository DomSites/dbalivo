    </div><!-- close main-content-background -->
        
    <div class="clear"></div>
        
    <?php ut_before_footer_hook(); ?>
    
    <?php 

    $current = get_queried_object(); 
    $post_ID = isset( $current->ID ) ? $current->ID : ''; ?>                         
                          
    <?php if( ut_return_csection_config('ut_activate_csection', 'on') == 'on' ) :

        // custom contact section classes
        $csection_classes = array();
        
        $csection_classes[] = ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' ? 'ut-contact-section-scroll-top' : '';
        $csection_classes[] = !unite_mobile_detection()->isMobile() && ot_get_option( 'ut_csection_parallax', 'off' ) == 'on' ? 'parallax-background parallax-section' : 'normal-background';
        $csection_classes[] = ot_get_option( 'ut_csection_skin' );

        /* section header style */
        $ut_csection_header_style = ot_get_option( 'ut_csection_header_style', 'pt-style-1' );
        $ut_csection_header_style = ( $ut_csection_header_style == 'global' ) ? ot_get_option( 'ut_global_headline_style' ) : $ut_csection_header_style;

        /* section header style 1 */
        $ut_csection_title_style = ( ot_get_option( 'ut_csection_title_style_1_type', 'global' ) == 'global' ) ? ot_get_option( 'ut_global_page_headline_style_1_type', 'section' ) : ot_get_option( 'ut_csection_title_style_1_type', 'section' );   
    
        /* contact section background and overlay - available inside theme options as well as on pages */
        $ut_csection_overlay = ut_return_csection_config( 'ut_csection_overlay', 'on' );
        $ut_overlay_class = $ut_csection_overlay == 'on' ? 'ut-contact-section-with-overlay' : 'ut-contact-section-without-overlay';    
          
    
        /* contact section background and overlay - currently only located inside theme options panel */
        $ut_csection_background_type = ot_get_option( 'ut_csection_background_type', 'image' );
        $ut_csection_overlay_pattern = ot_get_option( 'ut_csection_overlay_pattern', 'off' ) == 'on' ? 'parallax-overlay-pattern' : '';

        /* google map */
        $ut_csection_map = ot_get_option( 'ut_csection_map' );
        $ut_csection_map_class = $ut_csection_map && $ut_csection_background_type == 'map' ? 'contact-map' : '';

        /* section video class */
        $ut_csection_video_source = ot_get_option( 'ut_csection_video_source', 'youtube' );
        $ut_section_video_class = $ut_csection_background_type == 'video' && $ut_csection_video_source == 'selfhosted' ? 'ut-video-section' : '';

        /* contact section areas */
        $ut_left_csection_content_area = ot_get_option( 'ut_left_csection_content_area' );
        $ut_right_csection_content_area = ot_get_option( 'ut_right_csection_content_area' );

        $ut_left_csection_content_area_width = !empty( $ut_right_csection_content_area ) ? 'grid-50 mobile-grid-100 tablet-grid-100' : 'grid-100 mobile-grid-100 tablet-grid-100';
        $ut_right_csection_content_area_width = !empty( $ut_left_csection_content_area ) ? 'grid-50 mobile-grid-100 tablet-grid-100' : 'grid-100  mobile-grid-100 tablet-grid-100'; ?>
    
    <section id="contact-section" data-effect="fadeIn" class="animated contact-section <?php echo implode(" ", $csection_classes); ?> <?php echo $ut_csection_map_class; ?> <?php echo $ut_section_video_class; ?> <?php echo $ut_overlay_class; ?>">   		
    
    <a class="ut-offset-anchor" id="section-contact"></a> 
        
        <?php if( ot_get_option('ut_csection_parallax' , 'off') == 'on' && !unite_mobile_detection()->isMobile() ) : ?>
        
            <div class="parallax-scroll-container"></div>
        
        <?php endif; ?>        
            
        <?php if( $ut_csection_map && $ut_csection_background_type == 'map' ) : ?>       
        
        <div class="background-map"><?php echo do_shortcode($ut_csection_map); ?></div>
        
        <?php endif; ?>
        
        <?php if( $ut_csection_background_type == 'video' ) : ?>
            
            <?php ut_create_csection_bg_video(); ?>
            
        <?php endif; ?>
        
        <?php if( $ut_csection_overlay == 'on' ) : ?>
        
        <div class="parallax-overlay <?php echo $ut_csection_overlay_pattern; ?> <?php echo ot_get_option( 'ut_csection_overlay_pattern_style' , 'style_one' ); ?>">
		
        <?php endif; ?>
        
        <div class="grid-container parallax-content">
        	
            <?php 
            
            // contact section headline 
            $ut_csection_header_slogan = ot_get_option( 'ut_csection_header_slogan' );
            $ut_csection_header_expertise_slogan = ot_get_option( 'ut_csection_header_expertise_slogan' );            
            
            if( !empty($ut_csection_header_slogan) || !empty($ut_csection_header_expertise_slogan) ) : ?>
            
            <!-- parallax header -->
            <div class="grid-70 prefix-15 mobile-grid-100 tablet-grid-100">
                
                <header class="csection-title <?php echo $ut_csection_title_style; ?>-header <?php echo $ut_csection_header_style; ?>">
                    
                    <?php if( !empty($ut_csection_header_slogan) ) : ?>
                    	
                    	<?php if( $ut_csection_header_style == 'pt-style-1' ) : ?>
                    	
                    	    <h2 class="bklyn-divider-styles bklyn-divider-style-1 <?php echo $ut_csection_title_style; ?>-title"><span><?php echo do_shortcode( nl2br($ut_csection_header_slogan) ); ?></span></h2>
                    	
                    	<?php else : ?>
                    	    
                    	    <h2 class="<?php echo ot_get_option('ut_csection_parallax' , 'off') == 'off' ? 'section-title' : 'parallax-title'; ?>"><span><?php echo do_shortcode( nl2br($ut_csection_header_slogan) ); ?></span></h2>
                    	
                    	<?php endif; ?>
                    	
                    <?php endif; ?>
                    
                    <?php if( !empty($ut_csection_header_expertise_slogan) ) : ?>
                    
                        <div class="lead"><p><?php echo do_shortcode( nl2br( $ut_csection_header_expertise_slogan ) ); ?></p></div>
                    		
                    <?php endif; ?>
                    
                </header>
                
            </div>
            <!-- close parallax header -->
            
            <div class="clear"></div>
            
            <?php endif; ?>
        
        </div>
        <div class="grid-container section-content">
            
            <!-- contact wrap -->
            <div class="grid-100 mobile-grid-100 tablet-grid-100 grid-parent">
                <div class="contact-wrap clearfix">
                
                    <?php if( !empty($ut_left_csection_content_area) ) : ?>
                    
                    <!-- contact message -->
                    <div class="<?php echo $ut_left_csection_content_area_width; ?>">
                        <div class="ut-left-footer-area clearfix">
                            
                            <?php echo do_shortcode(wpautop($ut_left_csection_content_area)); ?>
                            
                        </div>
                    </div><!-- close contact message -->
                    
                    <?php endif; ?>
                    
                    <?php if( !empty($ut_right_csection_content_area) ) :?>
                    
                    <!-- contact form-holder -->
                    <div class="<?php echo $ut_right_csection_content_area_width; ?>">
                        <div class="ut-right-footer-area clearfix">
                        	
                            <?php echo do_shortcode(wpautop($ut_right_csection_content_area)); ?>
                                
                        </div>
                    </div><!-- close contact-form-holder -->
                	
                    <?php endif; ?>                    
                    
                </div>
            </div><!-- close contact wrap -->
            
            
		</div><!-- close container -->
        
        <?php if( ot_get_option( 'ut_csection_fancy_border' ) == 'on') : ?>
        
            <div class="ut-fancy-border"></div>
        
        <?php endif; ?>
        
        <?php if( $ut_csection_overlay == 'on' ) : ?>
        
        </div><!-- parallax overlay -->
		
        <?php endif; ?>
        
	</section>
    
    <div class="clear"></div>
    
    <?php endif; //#ut_activate_csection ?>    
    
    </div><!-- close #main-content -->
    
    <!-- Footer Section opening tag in sidebar-footer.php -->
          
        <?php get_sidebar( 'footer' ); ?>                
        
        <?php if( ut_return_csection_config('ut_show_scroll_up_button' , 'on') == 'on' && ut_search_result_status() ) : ?>
        
            <a href="#top" class="toTop"><i class="Bklyn-Core-Solid-Up-3"></i></a>
    	
        <?php endif; ?>        
        
        
        <?php if( ut_page_option( 'ut_subfooterarea', 'on' ) == 'on' ) : ?>
        
            <div class="footer-content">        

                <div class="grid-container">

                    <?php if( ot_get_option( 'ut_subfooter_border_top_color' ) && get_post_meta( $post_ID, 'ut_page_subfooter_border_top', true ) != 'on' ) : ?>

                        <div class="grid-100 mobile-grid-100 tablet-grid-100"><div class="ut-sub-footer-border-top"></div></div>

                    <?php endif; ?>

                    <div class="grid-100 mobile-grid-100 tablet-grid-100 ut-sub-footer-<?php echo ot_get_option( 'ut_subfooter_style' , 'style-1'); ?> <?php echo ot_get_option( 'ut_subfooter_style' , 'style-2') && ot_get_option('ut_subfooter_style_reverse', 'no') == 'yes' ? '' : 'ut-sub-footer-style-2-reverse'; ?>">

                        <?php 

                            $social = ot_get_option('ut_footer_social_icons');

                            if( is_array( $social ) && !empty( $social ) ) {

                                echo '<div class="ut-sub-footer-social-icons"><ul class="ut-footer-so">';    

                                    foreach( $social as $icon => $value) {

                                        $link  = !empty( $value["link"] )  ? $value["link"] : '#' ;
                                        $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

                                        echo '<li>';
                                            echo '<a target="_blank" ' . $title . ' href="' . esc_url( $link ) . '"><i class="fa ' . esc_attr( $value["icon"] ) . ' fa-lg"></i></a>';
                                        echo '</li>';

                                    }

                                echo '</ul></div>';    

                            } 

                            unset($social);

                        ?>

                        <div class="ut-sub-footer-content">    

                        <?php echo do_shortcode( ot_get_option('ut_site_copyright') ); ?>

                        <span class="copyright">

                            <?php if( ot_get_option('ut_subfooter_copyright', 'off' ) == 'off' || !ot_get_option( 'ut_subfooter_copyright_text' ) ) : ?>

                                <?php bloginfo( 'name' ); ?> <?php printf( __( 'POWERED BY %2$s', 'unitedthemes' ), date("Y"), '<a href="http://www.unitedthemes.com/" data-rel="designer">United Themes™</a>' ); ?>

                            <?php else : ?>

                                <?php echo ot_get_option( 'ut_subfooter_copyright_text' ); ?>

                            <?php endif; ?>

                        </span>

                        </div><!-- close sub footer -->        

                    </div>

                </div><!-- close container -->        

            </div><!-- close footer content -->
        
        <?php endif; ?>
        
        <?php ut_after_footer_content_hook(); // action hook, see inc/ut-theme-hooks.php ?>               
                
	</footer><!-- close footer -->
    
    <?php get_template_part( 'partials/navigation/nav', 'overlay' ); ?>        
                
   	<?php ut_after_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?>
	
    <?php wp_footer(); ?>    
    
	<script type="text/javascript">
    /* <![CDATA[ */        
        
		<?php ut_java_footer_hook(); // action hook, see inc/ut-theme-hooks.php ?> 
		
		<?php if( ot_get_option('ut_google_analytics') ) : ?>
          
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', '<?php echo stripslashes( ot_get_option('ut_google_analytics') ); ?>', 'auto');
          ga('send', 'pageview');
		  
		<?php endif; ?>
		     
     /* ]]> */
    </script>    
    
    <?php echo ut_create_bg_videoplayer('body'); ?>
    
    </body>
    
</html>