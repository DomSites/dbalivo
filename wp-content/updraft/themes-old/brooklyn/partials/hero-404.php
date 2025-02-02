<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div class="parallax-scroll-container"></div>
    
    <?php ut_before_hero_content_hook(); ?> 
    
    <div class="grid-container">
        
        <!-- hero holder -->
        <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?>">
            
            <div class="hero-inner">             
                
                <div class="hth">
                    <h1 class="hero-title"><?php _e( 'Uh-Oh! 404', 'unitedthemes' ); ?></h1>
                </div>
                
                <div class="hdb">
                    
                    <span class="hero-description-bottom">
                        
                        <?php esc_html_e( "The page you are looking for can't be found.", 'unitedthemes' ); ?>
                            
                    </span>
                    
                </div>
                
                <span class="hero-btn-holder">
                
                    <a target="_self" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ut-btn"><?php _e( 'Back', 'unitedthemes' ); ?></a>
                    
                </span>
                                
            </div>
        
        </div>
        <!-- close hero-holder -->
    
    </div>
    
    <?php ut_after_hero_content_hook(); ?> 
    
</section>
<!-- end hero section -->