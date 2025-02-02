<?php

/*
 *	NM: Post - Include social share buttons
 */

function nm_ce_post_social_share() {
    global $post;

    // Get post thumbnail
    $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );
    $post_thumbnail_url = ( $post_thumbnail ) ? $post_thumbnail[0] : '';
    
    $x_twitter_data = ( function_exists( 'nm_get_x_twitter_data' ) ) ? nm_get_x_twitter_data() : array( 'title' => 'X / Twitter', 'share_title' => __( 'Share on Twitter', 'nm-framework' ), 'icon_class' => 'nm-font-x-twitter' );
        
    
    $share_links_escaped = apply_filters( 'nm_post_share_links', array(
        '<a href="//www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '" target="_blank" title="' . esc_attr__( 'Share on Facebook', 'nm-framework' ) . '"><i class="nm-font nm-font-facebook"></i></a>',
        '<a href="//twitter.com/share?url=' . esc_url( get_permalink() ) . '" target="_blank" title="' . esc_attr( $x_twitter_data['share_title'] ) . '"><i class="nm-font ' . esc_attr( $x_twitter_data['icon_class'] ) . '"></i></a>',
        '<a href="//pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;media=' . esc_url( $post_thumbnail_url ) . '&amp;description=' . urlencode( get_the_title() ) . '" target="_blank" title="' . esc_attr__( 'Pin on Pinterest', 'nm-framework' ) . '"><i class="nm-font nm-font-pinterest"></i></a>'
    ) );

    $share_links = '';
    foreach ( $share_links_escaped as $link_escaped ) {
        $share_links .= $link_escaped;
    }

    $output_escaped = '<div class="nm-post-share"><span>' . esc_html__( 'Share', 'nm-framework' ) . '</span>' . $share_links . '</div>';

    echo $output_escaped;
}
add_action( 'nm_after_post', 'nm_ce_post_social_share' );
