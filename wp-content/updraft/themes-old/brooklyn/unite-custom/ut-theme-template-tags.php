<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}


/**
 * Display navigation to next/previous pages when applicable
*/

if ( ! function_exists( 'unitedthemes_content_nav' ) ) :

    function unitedthemes_content_nav( $nav_id ) {
        
        global $wp_query, $post;
    
        // Don't print empty markup on single pages if there's nowhere to navigate.
        if ( is_single() ) {
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next = get_adjacent_post( false, '', false );
    
            if ( ! $next && ! $previous )
                return;
        }
        
        // anchor
        $anchor = apply_filters( 'ut_show_hero', false ) ? '#to-main-content' : '';
         
        // Don't print empty markup in archives if there's only one page.
        if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
            return;
    
        $nav_class = ( is_single() ) ? 'post-navigation clearfix' : 'paging-navigation clearfix';
    
        ?>
        <nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
    
        <?php if ( is_single() ) : // navigation links for single posts ?>
    
            <?php previous_post_link( '<div class="nav-previous">%link</div>', '<i class="fa fa-angle-left"></i>' ); ?>
            <?php next_post_link( '<div class="nav-next">%link</div>', '<i class="fa fa-angle-right"></i>' ); ?>
    
        <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>
    
            <?php if ( get_next_posts_link() ) : ?>
           
            <div class="nav-previous">
                <a href="<?php next_posts(); ?>#to-main-content<?php echo $anchor; ?>"><i class="Bklyn-Core-Left-2"></i> <?php esc_html_e( 'Previous', 'unitedthemes' ); ?></a>
            </div>
            
            <?php endif; ?>
    
            <?php if ( get_previous_posts_link() ) : ?>
           
            <div class="nav-next">
                <a href="<?php previous_posts();?>#to-main-content<?php echo $anchor; ?>"><?php esc_html_e( 'Next','unitedthemes' ); ?> <i class="Bklyn-Core-Right-2"></i></a>
            </div>
           
            <?php endif; ?>
    
        <?php endif; ?>
    
        </nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
        <?php
    }
    
endif;

/**
 * Template for comments and pingbacks
 * Used as a callback by wp_list_comments() for displaying the comments
 */
if ( ! function_exists( 'unitedthemes_comment' ) ) :
    
    function unitedthemes_comment( $comment, $args, $depth ) {
        
        $GLOBALS['comment'] = $comment;
        
        /* override default avatar size */
        $args['avatar_size'] = 80;
                
        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
    
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        
            <div class="comment-body">
                <?php _e( 'Pingback:', 'unitedthemes' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit Comment', 'unitedthemes' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
    
        <?php else : ?>
        
        <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
                
            <article id="div-comment-<?php comment_ID(); ?>" class="clearfix">
            
                <figure class="comment-avatar hide-on-mobile">
                    <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </figure><!-- .comment-avatar -->
                
                <div class="ut-arrow-left"></div>
                
                <div class="comment-body">
                <header class="comment-header">
                    
                    <div class="comment-author vcard">				
                        
                        <?php 
                        
                        // check if user has an account
                        $user = get_user_by( 'login', $comment->comment_author );
                        
                        if( $user && !empty( $user->display_name ) ) {
                            
                            $nickname = $user->display_name;
                            
                        } else {
                            
                            $nickname = get_comment_author_link();
                            
                        }
        
                        printf( __( '%s', 'unitedthemes' ), sprintf( '<h6>%s</h6>', $nickname ) ); ?>
                        
                    </div><!-- .comment-author -->
                    
                    <div class="comment-metadata">
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php printf( _x( '%1$s', '1: date', 'unitedthemes' ), get_comment_date() ); ?>
                            </time>
                        </a>
                    </div><!-- .comment-metadata --> 
    
                </header><!-- .comment-meta -->
    
                <div class="comment-content clearfix">
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'unitedthemes' ); ?></p>
                    <?php endif; ?>
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
    
                <footer class="comment-footer clearfix">				
                    <span class="reply-link">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'reply_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>' . esc_html__( 'Reply', 'unitedthemes' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span>               
                    <?php edit_comment_link( __( 'Edit Comment', 'unitedthemes' ), '<span class="edit-link"></i>', '</span>' ); ?>               
                </footer><!-- .reply -->
                
                </div>
            </article><!-- .comment-body -->
    
        <?php
        endif;
    }

endif;


/**
 * Returns true if a blog has more than 1 category
 */
 
if ( ! function_exists( 'unitedthemes_categorized_blog' ) ) :

function unitedthemes_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so unitedthemes_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so unitedthemes_categorized_blog should return false
		return true;
	}
}

endif;



/**
 * Page Pagination
 *
 * @param - before - string
 * @param - after - string
 * @param - nextpagelink - string
 * @param - previouspagelink - string 
 * @param - pagelink - string
 * @param - echo - bolean
 */

if ( ! function_exists( 'ut_link_pages' ) ) :

    function ut_link_pages( $args = '' ) {
        
        $defaults = array(
            'before' => '<p>', 
            'after' => '</p>',
            'next_or_number' => 'number', 
            'nextpagelink' => __('Next page', 'unitedthemes' ),
            'previouspagelink' => __('Previous page', 'unitedthemes'), 
            'pagelink' => '%',
            'echo' => 1
        );
    
        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'ut_link_pages_args', $r );
        extract( $r, EXTR_SKIP );
    
        global $page, $numpages, $multipage, $more, $pagenow;
    
        $output = '';
        
        if ( $multipage ) {
            
            if ( 'number' == $next_or_number ) {
                
                $output .= $before;
                $output .= '<ul>';
                $output .= '<li><span>'.__('Pages', 'unitedthemes' ).'</span></li>';
                
                for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
                    
                    $j = str_replace('%',$i,$pagelink);		
                    
                    if ( ($i != $page) || ((!$more) && ($page==1) ) ) {
                        
                        $output .= '<li>'._wp_link_page($i);
                        
                    } else {
                        $output .= '<li class="active"><a href="#">';					
                    }
                    
                    $output .= $j . '</a></li>';			
                        
                }
                $output .= '</ul>';
                $output .= $after;
                
            } else {
                
                if ( $more ) {
                    $output .= $before;
                    $output .= '<ul>';
                    
                    $i = $page - 1;
                    if ( $i && $more ) {
                        $output .= '<li>'._wp_link_page($i);
                        $output .= $previouspagelink . '</a></li>';
                    }
                    $i = $page + 1;
                    if ( $i <= $numpages && $more ) {
                        $output .= '<li>'._wp_link_page($i);
                        $output .=  $nextpagelink . '</a></li>';
                    }
                    
                    $output .= '</ul>';
                    $output .= $after;
                }
                
            }
        }
        
        if ( $echo )
            echo $output;
    
        return $output;
        
    }
    
endif;

/** 
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @return    html
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( 'unite_posted_on' ) ) :

    function unite_posted_on( $post_id = NULL, $link = false ) {
        
        global $post;
      
        $post_id = ( $post_id == NULL && isset( $post->ID ) ) ? $post->ID : $post_id;
        
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        
        if ( get_the_time( 'U', $post_id ) !== get_the_modified_time( 'U', $post_id ) ) {
            
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            
        }
    
        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( 'c', $post_id ) ),
            esc_html( get_the_date( '', $post_id ) )
        );
        
        if( ut_is_blog_related() ) {
            
            $link = get_the_permalink( $post_id );
            
        }
        
        if( $link ) {
        
            $posted_on = sprintf(
                esc_html_x( '%s', 'post date', 'unite' ),
                '<a href="' . esc_url( $link ) . '" rel="bookmark">' . $time_string . '</a>'
            );
        
        } else {
            
            $posted_on = $time_string;
            
        }
        
        echo '<span class="posted-on">' . $posted_on . '</span>';
    
    }
    
endif;


if( !function_exists('unite_sort_category_list') ) :

    function unite_sort_category_list( $categories='' ) {
        
        /* no categories available */
        if( empty( $categories ) ) {
            return false;
        }
        
        /* assemble a tree of category relationships */
        /* also re-key the category array for easier */
        $category_tree = array();
        $keyed_categories = array();
        
        foreach( (array)$categories as $c ) {
            $category_tree[$c->cat_ID] = $c->category_parent;
            $keyed_categories[$c->cat_ID] = $c;
        }
        
        /* now loop through and create a tiered list of categories */
        $tiered_categories = array();
        $tier = 0;
        
        /* this is the recursive bit */
        while ( !empty( $category_tree ) ) {
            $cats_to_unset = array();
            foreach( (array)$category_tree as $cat_id => $cat_parent ) {
                if ( !in_array( $cat_parent, array_keys( $category_tree ) ) ) {
                    $tiered_categories[$tier][] = $cat_id;
                    $cats_to_unset[] = $cat_id;
                }
            }
        
            foreach( $cats_to_unset as $ctu ) {
                unset( $category_tree[$ctu] );
            }
            $tier++;
        }
        
        /* walk through the tiers to order the cat objects properly */
        $ordered_categories = array();
        foreach( (array)$tiered_categories as $tier ) {
            foreach( (array)$tier as $tcat ) {
                $ordered_categories[] = $keyed_categories[$tcat];
            }
        }
        
        return $ordered_categories;
    
    }

endif;

/**
 * Custom Category List
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */
if( !function_exists('unite_get_the_category_list') ) {

    function unite_get_the_category_list( $post_id = NULL, $sep = '', $limit = 1 ) {
     
        global $post;
        
        $post_id = ( $post_id == NULL ) ? $post->ID : $post_id;
        
        /* check for meta value first */
        $cat_id = ut_get_meta( 'ut_special_caption', $post_id );
        
        if( $cat_id ) {
            
            $category = get_category( $cat_id );
            
            $output = '<ul class="post-categories">';
                
                $output .=  '<li><a class="cat-' . esc_attr( $category->slug ) . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'unite' ), $category->name ) ) . '" rel="category tag"> ' . esc_html( $category->cat_name ) . '</a>' . $sep . '</li>';    
                
            $output .= '</ul>';
            
            return $output;
            
        }
        
        /* default query */
        $categories = get_the_category( $post_id );
        $categories = unite_sort_category_list( $categories );        
        $categories = array_reverse( $categories );        
        
        $current_category_id = get_query_var('cat');
        
        $counter = $limit ? 0 : false;
        
        if( !empty( $categories ) ) {
            
            $output = '<ul class="post-categories">';
            
            foreach( ( array )$categories as $category ) {
                
                if( $limit && $counter == $limit ) {
                    break;
                }
                
                $output .=  '<li><a class="cat-' . esc_attr( $category->slug ) . '" href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'unite' ), $category->name ) ) . '" rel="category tag"> ' . esc_html( $category->cat_name ) . '</a>' . $sep . '</li>';
                
                $counter++;                
                
            }
            
            $output .= '</ul>';
        
        }
        
        return $output;
        
    }

}


/** 
 * Prints HTML Category Links.
 *
 * @return    html
 *
 * @access    public
 * @since     4.4.0
 * @version   1.0.0
 */
 
if ( ! function_exists( 'unite_get_caption_category' ) ) :

    function unite_get_caption_category( $max = 5, $link = false ) {

        $categories_list = get_the_category();

        $cat_list = array();

        $count = 0;

        foreach( $categories_list as $cat ) {

            if( $count == $max ) {
                break;
            }

            if( !$link ) {

                $cat_list[] = $cat->name;

            } else {

                $cat_list[] = '<a class="cat-' . esc_attr( $cat->slug ) . '" href="' . esc_url( get_category_link( $cat->term_id ) ) . '" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'unitedthemes' ), $cat->name ) ) . '" rel="category tag"> ' . esc_html( $cat->name ) . '</a>';

            }

            $count++;

        }

        return sprintf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'unitedthemes' ) . '</span>', implode(', ',$cat_list) );    

    }

endif;



/** 
 * Get Custom Read More Icon
 *
 * @return    html
 *
 * @access    public
 * @since     4.5.0
 * @version   1.0.0
 */

if ( ! function_exists( 'ut_custom_read_more_icon' ) ) :
    
    function ut_custom_read_more_icon() {
        
        $read_more_icon = '<i class="fa fa-long-arrow-right"></i>';
        
        if( ot_get_option( 'ut_blog_read_more_icon_source', 'default' ) == 'custom' && ot_get_option( 'ut_blog_read_more_custom_icon' ) ) {
            
            $read_more_icon = '<i class="' . ot_get_option('ut_blog_read_more_custom_icon') . '"></i>';
        
        }
        
        if( ot_get_option( 'ut_blog_read_more_icon_source', 'default' ) == 'off' ) {
            
            $read_more_icon = '';
                
        }        
        
        
        
        return $read_more_icon;
        
    }

endif;