<?php

/**
 * Default Sidebar for Shop
 * by www.unitedthemes.com
 */

?>

<?php if( is_active_sidebar('shop-widget-area') ) : ?>
    
    <div id="secondary" class="widget-area grid-25 tablet-grid-100 mobile-grid-100" role="complementary">
        <ul class="sidebar">
            <?php dynamic_sidebar('shop-widget-area'); ?>
        </ul>
    </div>
    
<?php endif; ?>