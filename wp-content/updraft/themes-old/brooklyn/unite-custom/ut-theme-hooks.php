<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/* before article */
function ut_before_article_hook(){

	do_action('ut_before_article_hook'); /* will be used in a future update for different blog types */

}

/* after article */
function ut_after_article_hook(){

	do_action('ut_after_article_hook'); /* will be used in a future update for different blog types */

}


/*
 * Located in header.php after , only gets used when Yoast Yeo is inactive  
 */
function ut_meta_theme_hook(){

	do_action( 'ut_meta_theme_hook' );

}

/* 
 * Located in footer.php after </footer><!-- #ut-footer .site-footer -->
 */
function ut_java_footer_hook(){

	do_action( 'ut_java_footer_hook' );

}

/* 
 * Located in partials hero-*.php after
 */
 
function ut_before_hero_content_hook(){

	do_action( 'ut_before_hero_content_hook' );

}

/* 
 * Located in partials hero-*.php after
 */
 
function ut_after_hero_content_hook(){

	do_action( 'ut_after_hero_content_hook' );

}