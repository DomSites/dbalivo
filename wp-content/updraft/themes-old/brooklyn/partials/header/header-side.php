<?php if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) { return; } ?>

<div id="bklyn-sidenav-wrap" class="hide-on-tablet hide-on-mobile <?php ut_side_header_class(); ?>">
    
    <div class="bklyn-sidenav-scroll">
    
        <div id="bklyn-sidenav-inner-wrap">
            
            <div class="bklyn-sidenav-table-top">
                
                <div class="bklyn-sidenav-table-top-inner">
                
                    <?php if ( ut_return_logo_config( 'ut_site_logo' ) ) : ?>
                    
                        <div class="side-site-logo">
                            
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img <?php echo ut_return_logo_config( 'ut_site_logo_retina' ) ? 'data-rjs="' . ut_return_logo_config( 'ut_site_logo_retina' ) . '"' : ''; ?> src="<?php echo ut_return_logo_config( 'ut_site_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
                            
                        </div>
                    
                    <?php else : ?>
                                
                        <div class="side-site-logo">
                            
                            <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            
                        </div>
                        
                    <?php endif; ?>
                
                </div>
            
            </div>
            
            <div class="bklyn-sidenav-table-mid">
                
                <div class="bklyn-sidenav-table-mid-inner">
                
                    <?php get_template_part( 'partials/navigation/nav', 'side' );  ?>    
                            
                    <?php if( ut_return_header_config( 'ut_side_header_search_form', 'on' ) == 'on' ) : ?>
                    
                        <form role="search" method="get" class="search-form" id="bklyn-sidenav-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr__( 'Search' , 'unitedthemes' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php esc_attr_e( 'Search for:' , 'unitedthemes' ); ?>">                
                            
                        </form>
                    
                    <?php endif; ?>
                
                </div>
                
            </div>
            
            <div class="bklyn-sidenav-table-bot">
            
                <?php if( ut_return_header_config( 'ut_side_header_activate_social_icons', 'on' ) == 'on' ) : ?>
                
                    <?php $social = ot_get_option('ut_side_header_social_icons'); ?>
                              
                    <?php if( is_array( $social ) && !empty( $social ) ) : ?>
                        
                        <div class="bklyn-sidenav-table-bot-inner">
                            
                            <?php if( ot_get_option('ut_side_header_copyright') ) : ?>
                            
                                <div class="bklyn-sidenav-copyright">
                                    <span><?php echo ot_get_option('ut_side_header_copyright'); ?></span>
                                </div>
                            
                            <?php endif; ?>
                            
                            <ul class="ut-sociallinks">
                      
                                <?php foreach( $social as $icon => $value ) : ?>
                            
                                    <?php 
                                    
                                    $link  = !empty( $value["link"] )  ? esc_url( $value["link"] ) : '#' ;
                                    $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;
                                    
                                    ?>
                            
                                    <li><a <?php echo $title; ?> href="<?php echo $link; ?>"><i class="fa <?php echo $value["icon"]; ?>"></i></a></li>
                    
                                <?php endforeach; ?>
                    
                            </ul>
                                
                        </div>
                        
                    <?php endif; ?>
                
                <?php endif; ?>
            
            </div>
            
        </div>
    
    </div>
        
</div> 