<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}

/*
 * Gets the excerpt of a specific post ID or object
 *
 * @param - $post - object/int - the ID or object of the post to get the excerpt of
 * @param - $length - int - the length of the excerpt in words
 * @param - $tags - string - the allowed HTML tags. These will not be stripped out
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 *
 */
if ( !function_exists( 'unite_get_excerpt_by_id' ) ) :
	
	function unite_get_excerpt_by_id( $post, $length = 30, $tags = '' ) {
                
        if( !is_object( $post ) ) {
            
            $post = get_post( $post );
        
        }
	 	
        $the_excerpt = NULL;
        
        /* check for custom excerpt first */
		if( has_excerpt( $post->ID ) ) {			
            
            $the_excerpt = apply_filters( 'the_content', $post->post_excerpt );
            			
		} else {
			
            /* assign content */
			$the_excerpt = $post->post_content;
			
		}
        
        /* remove shortcodes first */
        $the_excerpt = strip_shortcodes( $the_excerpt );
        
        /* remove oembed links as well */
        foreach( _ut_recognized_oembed_providers() as $pattern => $provider ) {
            $the_excerpt = preg_replace($pattern, '', $the_excerpt);            
        }
        
        /* now trim words */
        $the_excerpt = unite_trim_words( $the_excerpt, $length, NULL, $tags );
        
        /* apply content filter for formatting */
        $the_excerpt = apply_filters( 'unite_the_excerpt', $the_excerpt );
            
        $the_excerpt = wpautop( $the_excerpt );
        
        /* return excerpt */
		return $the_excerpt;
		
	}
	
endif;


/*
 * Gets the excerpt of a specific post ID or object
 *
 * @param - $post - object/int - the ID or object of the post to get the excerpt of
 * @param - $length - int - the length of the excerpt in words
 * @param - $tags - string - the allowed HTML tags. These will not be stripped out
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 *
 */
if ( !function_exists( 'unite_get_vc_excerpt_by_id' ) ) :
	
	function unite_get_vc_excerpt_by_id( $post, $length = 30, $tags = '' ) {
                
        if( !is_object( $post ) ) {
            
            $post = get_post( $post );
        
        }
	 	
        $the_excerpt = NULL;
        
        /* check for custom excerpt first */
		if( has_excerpt( $post->ID ) ) {			
            
            $the_excerpt = apply_filters( 'the_content', $post->post_excerpt );
            return apply_filters( 'unite_the_excerpt', $post->post_excerpt );
			
		} else {
			
            /* assign content */
			$the_excerpt = $post->post_content;
			
		}
        
        /* add html stuff */        
        $the_excerpt = do_shortcode( $post->post_content );
        
        /* now strip out */
        $the_excerpt = preg_replace( '#<script(.*?)>(.*?)</script>#is', '', $the_excerpt );
        $the_excerpt = preg_replace( '#<style(.*?)>(.*?)</style>#is', '', $the_excerpt );
        $the_excerpt = strip_tags( $the_excerpt );
        
        /* remove oembed links as well */
        foreach( _ut_recognized_oembed_providers() as $pattern => $provider ) {
            $the_excerpt = preg_replace($pattern, '', $the_excerpt);            
        }
        
        /* now trim words */
        $the_excerpt = unite_trim_words( $the_excerpt, $length, NULL, $tags );
        
        /* apply content filter for formatting */
        $the_excerpt = apply_filters( 'unite_the_excerpt', $the_excerpt );
        $the_excerpt = apply_filters( 'the_content', $the_excerpt );
        
        /* return excerpt */
		return $the_excerpt;
		
	}
	
endif;




/**
 * Trims text to a certain number of words with HTML.
 *
 * This function is localized. For languages that count 'words' by the individual
 * character (such as East Asian languages), the $num_words argument will apply
 * to the number of individual characters.
 *
 * @since 1.0.0
 *
 * @param string $text Text to trim.
 * @param int $num_words Number of words. Default 55.
 * @param string $more Optional. What to append if $text needs to be trimmed. Default '&hellip;'.
 * @return string Trimmed text.
 */
if ( !function_exists( 'unite_trim_words' ) ) :

    function unite_trim_words( $text, $num_words = 55, $more = NULL, $tags = '' ) {
        
        if ( NULL === $more ) {
            $more = __( '&hellip;' , 'unite' );
        }
        
        $original_text = $text;
        $text = strip_tags( $text, $tags );
        
        /* translators: If your word count is based on single characters (East Asian characters),
           enter 'characters'. Otherwise, enter 'words'. Do not translate into your own language. */
        if ( 'characters' == __( 'words', 'word count: words or characters?' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
            $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
            preg_match_all( '/./u', $text, $words_array );
            $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
            $sep = '';
        } else {
            $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
            $sep = ' ';
        }
        if ( count( $words_array ) > $num_words ) {
            array_pop( $words_array );
            $text = implode( $sep, $words_array );
            $text = $text . $more;
        } else {
            $text = implode( $sep, $words_array );
        }
        
        /**
         * Filter the text content after words have been trimmed.
         *
         * @since 1.0.0
         *
         * @param string $text          The trimmed text.
         * @param int    $num_words     The number of words to trim the text to. Default 5.
         * @param string $more          An optional string to append to the end of the trimmed text, e.g. &hellip;.
         * @param string $original_text The text before it was trimmed.
         */
        return apply_filters( 'unite_trim_words', $text, $num_words, $more, $original_text );
    }

endif;


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
if ( !function_exists( 'unitedthemes_page_menu_args' ) ) { 
    
    function unitedthemes_page_menu_args( $args ) {
        $args['show_home'] = true;
        return $args;
    }
    add_filter( 'wp_page_menu_args', 'unitedthemes_page_menu_args' );
    
}

/**
 * Adds custom classes to the array of body classes.
 */
if ( !function_exists( 'unitedthemes_body_classes' ) ) {  

    function unitedthemes_body_classes( $classes ) {
        // Adds a class of group-blog to blogs with more than 1 published author
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }
    
        return $classes;
    }
    add_filter( 'body_class', 'unitedthemes_body_classes' );
    
}

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
if ( !function_exists( 'unitedthemes_enhanced_image_navigation' ) ) { 

    function unitedthemes_enhanced_image_navigation( $url, $id ) {
        if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
            return $url;
    
        $image = get_post( $id );
        if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
            $url .= '#main';
    
        return $url;
    }
    add_filter( 'attachment_link', 'unitedthemes_enhanced_image_navigation', 10, 2 );
    
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
if ( !function_exists( 'unitedthemes_wp_title' ) ) {  

    function unitedthemes_wp_title( $title, $sep ) {
        global $page, $paged;
    
        if ( is_feed() )
            return $title;
    
        // Add the blog name
        $title .= get_bloginfo( 'name' );
    
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            $title .= " $sep $site_description";
    
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            $title .= " $sep " . sprintf( __( 'Page %s', 'unitedthemes' ), max( $paged, $page ) );
    
        return $title;
    }
    add_filter( 'wp_title', 'unitedthemes_wp_title', 10, 2 );
    
}



/**
 * let read more jump to article top
 */
if ( !function_exists( 'ut_remove_more_link_scroll' ) ) {  

    function ut_remove_more_link_scroll( $link ) {
        $link = preg_replace( '|#more-[0-9]+|', '', $link );
        return $link;
    }
    
    add_filter( 'the_content_more_link', 'ut_remove_more_link_scroll' );
    
}