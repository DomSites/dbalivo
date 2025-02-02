<?php 

/**
 * Hero Template Part
 */
 
if( !apply_filters( 'ut_show_hero', false ) ) {
    return;    
}

/* template file by config */
$hero = ut_return_hero_config( 'ut_hero_type' );

// fallback 
$hero = $hero == 'dynamic' ? 'image' : $hero;

/* search */
if( is_search() ) {
    $hero = 'search';
}

/* 404 */
if( is_404() ) {
    $hero = '404';
}

/* archive */
if( is_archive() ) {
    
    if( have_posts() ) {
    
        $hero = 'archive';
    
    } else {
        
        $hero = 'search';
        
    }
    
}

/* single post hero */
if( is_single() && !is_singular( 'portfolio' ) ) {
    $hero = 'post';
}

get_template_part( 'partials/hero', $hero ); ?>

<div class="clear"></div> 