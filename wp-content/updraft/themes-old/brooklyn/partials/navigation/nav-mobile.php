<?php

$mobile = array(
    'echo' => false,
    'container' => 'nav',
    'container_id' => 'ut-mobile-nav',
    'menu_id' => 'ut-mobile-menu',
    'menu_class' => 'ut-mobile-menu',
    'fallback_cb' => 'ut_default_menu',
    'container_class' => 'ut-mobile-menu mobile-grid-100 tablet-grid-100 hide-on-desktop',
    'items_wrap' => '<div class="ut-scroll-pane-wrap"><div class="ut-scroll-pane"><ul id="%1$s" class="%2$s">%3$s</ul></div></div>',
    'walker' => new ut_menu_walker()
);

if( has_nav_menu( 'mobile' ) ) {
    
    // mobile navigation trigger
    echo '<div class="ut-mm-trigger tablet-grid-20 mobile-grid-20 hide-on-desktop"><button class="ut-mm-button"></button></div>';
    
    // add location
    $mobile['theme_location'] = 'mobile';
    
    // mobile navigation
    echo wp_nav_menu( $mobile );
    
} else {
    
    if ( has_nav_menu( 'primary' ) ) {

        // mobile navigation trigger
        echo '<div class="ut-mm-trigger tablet-grid-20 mobile-grid-20 hide-on-desktop"><button class="ut-mm-button"></button></div>';
        
        // add location
        $mobile['theme_location'] = 'primary';
        
        // mobile navigation
        echo wp_nav_menu( $mobile );

    }
    
}