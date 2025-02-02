<?php

if( ot_get_option('ut_global_overlay_navigation', 'off') == 'off' ) {
    return;
}

$container_class= array();

// underline animation effect
$container_class[] = 'ut-overlay-nav-animation-' . ot_get_option( 'ut_global_overlay_link_animation', 'off' );
$container_class[] = 'ut-overlay-nav-' . ot_get_option( 'ut_global_overlay_content_vertical_align', 'middle' );

$menu = array(
    'container'         => 'nav',
    'container_id'      => 'ut-overlay-nav',
    'container_class'   => implode(" ", $container_class),
    'items_wrap'        => '<ul id="%1$s" class="%2$s ut-overlay-menu">%3$s</ul>',
    'theme_location'    => 'primary', 
    'walker'            => new ut_menu_walker()
);

if ( !has_nav_menu( 'primary' ) ) {    
    return;    
} 

// footer social icons
$social = ot_get_option( 'ut_overlay_social_icons' );

// footer copyright
$copyright = ot_get_option( 'ut_overlay_copyright' );

// overlay classes
$classes = array();

$classes[] = 'ut-overlay-menu-' . ot_get_option( "ut_global_overlay_content_width", "fullwidth" );
$classes[] = 'ut-overlay-menu-align-' . ot_get_option( "ut_global_overlay_content_align", "centered" );
$classes[] = 'ut-overlay-menu-reverse-' . ot_get_option( "ut_global_overlay_footer_reverse", "off");

if( $social || $copyright ) {
    
    $classes[] = 'ut-overlay-menu-with-footer';
    
} ?>


<div id="ut-overlay-menu" class="ut-overlay-menu <?php echo implode(" ", $classes ); ?>">
        
    <?php if( ot_get_option( 'ut_global_overlay_logo', 'off' ) == 'text' ) : ?>

        <div class="site-logo">
            <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        </div>

    <?php endif; ?>
        
    <?php if( ot_get_option( 'ut_global_overlay_logo', 'off' ) == 'custom' && ot_get_option("ut_overlay_logo") ) : ?>    
        
        <div id="ut-overlay-site-logo" class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo ot_get_option("ut_overlay_logo"); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
        </div>        
        
    <?php endif; ?>   
    
    <div class="ut-overlay-menu-row">
        
        <div class="ut-overlay-menu-row-inner">
             
             <?php echo wp_nav_menu( $menu ); ?>            
        
        </div>
        
        <?php if( $social || $copyright ) : ?>
        
            <!-- overlay footer -->
            <div id="ut-overlay-menu-footer" class="ut-overlay-menu-row-inner">

                <?php 
                
                echo '<div class="ut-overlay-footer-icons-wrap ut-overlay-menu-cell">';
                
                if( is_array( $social ) && !empty( $social ) ) {
                    
                    echo '<ul class="ut-overlay-footer-icons">';    

                        foreach( $social as $icon => $value) {

                            $link  = !empty( $value["link"] )  ? esc_url( $value["link"] ) : '#' ;
                            $title = !empty( $value["title"] ) ? 'title="' . esc_attr( $value["title"] ) . '"' : '' ;

                            echo '<li>';
                                echo '<a '.$title.' href="'.$link.'" target="_blank"><i class="fa '.$value["icon"].' fa-lg"></i></a>';
                            echo '</li>';

                        }

                    echo '</ul>';    

                }             
                
                echo '</div>';
                
                ?>
                    
                <div class="ut-overlay-copyright ut-overlay-menu-cell">

                    <?php echo ot_get_option( 'ut_overlay_copyright' ); ?> 

                </div>                                                                         
                
            </div>    
            <!-- /end overlay footer --> 
        
        <?php endif; ?>                          
                
    </div>
    
</div>