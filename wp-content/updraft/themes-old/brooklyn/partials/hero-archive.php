<section id="ut-hero" class="hero ha-waypoint parallax-section parallax-background" data-animate-up="ha-header-hide" data-animate-down="ha-header-hide">
    
    <div class="parallax-scroll-container"></div>
    
    <?php ut_before_hero_content_hook(); ?> 
    
    <div class="grid-container">
        
        <!-- hero holder -->
        <div class="hero-holder grid-100 mobile-grid-100 tablet-grid-100 <?php echo ut_return_hero_config('ut_hero_style' , 'ut-hero-style-1'); ?>">
            
            <div class="hero-inner">             
                
                <?php if( is_author() ) : ?>
                
                <div class="ut-archive-hero-avatar">

                    <?php $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>        

                    <?php echo get_avatar( $author->ID, 160 ); ?>        


                </div>
                
                <?php endif; ?>
                
                <div class="hth">
                
                    <h1 class="hero-title">
                    
                        <?php
                            if ( is_category() ) :
                                
                                single_cat_title();
    
                            elseif ( is_tag() ) :
                                
                                single_tag_title();
    
                            elseif ( is_author() ) :
                                
                                if( ot_get_option( "ut_author_hero_highlight", "on" ) == 'off' ) {
                                    
                                    echo get_the_author();
                                    
                                } else {
                        
                                    $author_name = array();
                                    $name = explode( ' ', get_the_author() );        

                                    foreach( $name as $key => $name_part ) {

                                        if( $key == 0 ) {

                                            $author_name[] = $name_part;

                                        } else {

                                            $author_name[] = '<span>' . $name_part . '</span>';                                            

                                        }

                                    }

                                    echo implode(' ', $author_name);
                                    
                                }
    
                            elseif ( is_day() ) :
                                
                                echo get_the_date();
    
                            elseif ( is_month() ) :
                                
                                echo get_the_date( 'F Y' );
    
                            elseif ( is_year() ) :
                                
                                echo get_the_date( 'Y' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                _e( 'Asides', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                _e( 'Images', 'unitedthemes');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                _e( 'Videos', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                _e( 'Quotes', 'unitedthemes' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                _e( 'Links', 'unitedthemes' );
    
                            else :
                                _e( 'Archives', 'unitedthemes' );
    
                            endif;
                        ?>
                    
                    </h1>
                    
                </div>
                
                
                <?php if ( term_description() ) : ?>
                
                <div class="hdb">
                    <span class="hero-description-bottom">
                        
                        <?php printf( '<p class="lead">%s</p>', term_description() ); ?>
                            
                    </span>
                </div>
                
                <?php endif; ?>
                
                <?php if( is_author() ) : ?>
                
                <div class="hdb">
                    <span class="hero-description-bottom">
                        
                        <?php esc_html_e( 'View all authors posts further down below.', 'unitedthemes' ); ?>
                            
                    </span>
                </div>                
                
                <?php endif; ?>
                
                
                <?php if( is_day() || is_month() || is_year() ) : ?>
                
                <div class="hdb">
                    <span class="hero-description-bottom">
                        
                        <?php esc_html_e( 'View all on this date written articles further down below.', 'unitedthemes' ); ?>
                            
                    </span>
                </div>                
                
                <?php endif; ?>
                                
            </div>
            
            <div class="hero-down-arrow-wrap">                        
                        
                <span class="hero-down-arrow">

                    <a href="#ut-to-first-section"><i class="Bklyn-Core-Down-3"></i></a>

                </span>

            </div>
            
        </div>
        <!-- close hero-holder -->
    
    </div>
    
    <?php ut_after_hero_content_hook(); ?> 
    
</section>
<!-- end hero section -->