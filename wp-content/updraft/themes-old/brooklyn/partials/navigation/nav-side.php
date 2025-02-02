<?php

if( ut_return_header_config( 'ut_header_layout', 'default' ) != 'side' ) {
    return;
}

if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {

    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'bklyn-sidenav',
        'fallback_cb'         => 'ut_default_menu',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'theme_location'    => 'primary',
        'depth'             => 3,
        'walker'            => new ut_menu_walker() 
    );

} else {
    
    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'bklyn-sidenav',
        'fallback_cb'         => 'ut_default_menu',
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'             => 3,
        'theme_location'    => 'primary'      
    );

}

?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

    <?php echo wp_nav_menu( $menu ); ?>
    
<?php endif; ?>