<?php

/**
 * Default Sidebar for Pages
 * by www.unitedthemes.com
 */

if( !apply_filters( 'ut_show_sidebar', true ) ) {
    return;    
}

if( ot_get_option( 'ut_site_layout', 'onepage' ) == 'onepage' ) {
    
    $sidebar = 'blog-widget-area';
    
} else {
    
    $ut_get_sidebar_settings = ut_get_sidebar_settings();
    
    // fallback
    if( !$ut_get_sidebar_settings['primary_sidebar'] ) {
        
        $sidebar = 'blog-widget-area';
        
    } else {
        
        $sidebar = $ut_get_sidebar_settings['primary_sidebar'];
        
    }    
    
} ?>

<?php if( ut_blog_has_sidebar() ) : ?>
    
    <div id="secondary" class="widget-area grid-25 tablet-grid-100 mobile-grid-100" role="complementary">
        <ul class="sidebar sidebar-<?php echo ot_get_option('ut_sidebar_align' , 'right'); ?>">
            
            <?php dynamic_sidebar($sidebar); ?>
            
        </ul>
    </div>
    
<?php endif; ?>