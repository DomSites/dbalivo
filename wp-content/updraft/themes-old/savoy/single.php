<?php
	global $nm_theme_options, $post;
	
	$show_sidebar = ( $nm_theme_options['single_post_sidebar'] != 'none' ) ? true : false;
	$post_column_class = ( $show_sidebar ) ? 'col col-md-8 col-sm-12 col-xs-12' : 'nm-post-col';
	
	// Get post thumbnail
	$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), false, '' );

    $share_links = apply_filters( 'nm_post_share_links', array(
        '<a href="//www.facebook.com/sharer.php?u=' . esc_url( get_permalink() ) . '" target="_blank" title="' . esc_html__( 'Share on Facebook', 'nm-framework' ) . '"><i class="nm-font nm-font-facebook"></i></a>',
        '<a href="//twitter.com/share?url=' . esc_url( get_permalink() ) . '" target="_blank" title="' . esc_html__( 'Share on Twitter', 'nm-framework' ) . '"><i class="nm-font nm-font-twitter"></i></a>',
        '<a href="//pinterest.com/pin/create/button/?url=' . esc_url( get_permalink() ) . '&amp;media=' . esc_url( $post_thumbnail[0] ) . '&amp;description=' . urlencode( get_the_title() ) . '" target="_blank" title="' . esc_html__( 'Pin on Pinterest', 'nm-framework' ) . '"><i class="nm-font nm-font-pinterest"></i></a>'
    ) );
?>

<?php get_header(); ?>
		
<div class="nm-post nm-post-sidebar-<?php echo esc_attr( $nm_theme_options['single_post_sidebar'] ); ?>">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>    	
	
	<div class="nm-post-body">
        <div class="nm-row">
            <div class="nm-post-content-col <?php echo $post_column_class; ?>">
                <header class="nm-post-header">
                    <?php
                        if ( $nm_theme_options['single_post_display_featured_image'] && has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                    ?>

                    <h1><?php the_title(); ?></h1>

                    <div class="nm-post-meta">
                        <span><?php esc_html_e( 'By', 'nm-framework' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'nm-framework' ); ?> <?php the_date(); ?></span>
                    </div>
                </header>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="nm-post-content entry-content clear">
                        <?php the_content(); ?>
                        <?php
                            wp_link_pages( array(
                                'before' 		=> '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nm-framework' ) . '</span>',
                                'after' 		=> '</div>',
                                'link_before'	=> '<span>',
                                'link_after'	=> '</span>'
                            ) );
                        ?>
                    </div>
                </article>
                
                <?php //the_meta(); ?>
                
                <?php
                    $has_meta = false;
                    $meta_output = '';
                    $categories_list = get_the_category_list( ', ' );
                    $tag_list = get_the_tag_list( '', ', ' );

                    if ( $categories_list ) {
                        $has_meta = true;

                        $meta_output = esc_html__( 'Posted in ', 'nm-framework' ) . $categories_list;

                        if ( $tag_list ) {
                            $meta_output .= esc_html__( ' and tagged ', 'nm-framework' ) . $tag_list;
                        }

                        $meta_output .= '.';
                    } else {
                        if ( $tag_list ) {
                            $has_meta = true;

                            $meta_output = esc_html__( 'Tagged ', 'nm-framework' ) . $tag_list . '.';
                        }
                    }

                    if ( $has_meta ) {
                        echo '<div class="nm-single-post-meta">' . $meta_output . '</div>';
                    }
                ?>

                <div class="nm-post-share">
                    <span><?php esc_html_e( 'Share', 'nm-framework' ); ?></span>
                    <?php
                        foreach ( $share_links as $link ) {
                            echo $link;
                        }
                    ?>
                </div>

                <div class="nm-post-pagination">
                    <div class="nm-post-prev">
                        <?php next_post_link( '%link', '<span>' . esc_html__( '&larr;&nbsp; Newer', 'nm-framework' ) . '</span><span class="subtitle">%title</span>', false ); ?>
                    </div>
                    <div class="nm-post-next">
                        <?php previous_post_link( '%link', '<span>' . esc_html__( 'Older &nbsp;&rarr;', 'nm-framework' ) . '</span><span class="subtitle">%title</span>', false ); ?>
                    </div>
                </div>
            </div>

            <?php if ( $show_sidebar ) : ?>
            <div class="nm-post-sidebar-col col-md-4 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
		
	<?php endwhile; ?>
		   
<?php else : ?>

	<div class="col col-xs-8 centered">
		<?php get_template_part( 'content', 'none' ); ?>
	</div>
	
<?php endif; ?>

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
?>
	<div id="comments" class="nm-comments">
		<div class="nm-row">
			<div class="<?php echo $post_column_class; ?>">
				<?php comments_template(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php 
if ( $nm_theme_options['single_post_related'] ) :
    /*Alt. - Get related posts by tags:
    $terms = wp_get_post_tags( $post->ID );
    
    if ( $terms ) :
    
    $term_ids = array();
    foreach( $terms as $term ) {
        $term_ids[] = $term->term_id;
    }*/
    $term_ids = wp_get_post_categories( $post->ID );
    
    if ( $term_ids ) :
    
    $args = apply_filters( 'nm_related_posts_args', array(
        'ignore_sticky_posts'   => 1,
        'no_found_rows'         => 1,
        'posts_per_page'        => intval( $nm_theme_options['single_post_related_per_page'] ),
        'orderby'               => 'rand',
        //'tag__in'               => $term_ids,
        'category__in'          => $term_ids,
        'post__not_in'          => array( $post->ID )
    ) );

    $related_posts = new WP_Query( $args );
    
    if ( $related_posts->have_posts() ) :
    
    // Columns
	$columns_class = apply_filters( 'nm_related_posts_columns_class', 'small-block-grid-2 medium-block-grid-2 large-block-grid-' . $nm_theme_options['single_post_related_columns'] );
    ?>
    <div class="nm-related-posts">
        <div class="nm-row">
            <div class="col-xs-12">
                <h2><?php _e( 'Related Posts', 'nm-framework' ); ?></h2>
                
                <ul class="<?php echo esc_attr( $columns_class ); ?>">
                <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                    <li>
                        <a href="<?php esc_url( the_permalink() ); ?>" class="nm-related-posts-image">
                            <?php the_post_thumbnail(); ?>
                            <div class="nm-image-overlay"></div>
                        </a>

                        <div class="nm-related-posts-content">
                            <div class="nm-post-meta"><?php the_time( get_option( 'date_format' ) ); ?></div>
                            <h3><a href="<?php esc_url( the_permalink() ); ?>" class="dark"><?php the_title(); ?></a></h3>
                            <div class="nm-related-posts-excerpt"><?php esc_html( the_excerpt() ); ?></div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
<?php 
    endif;
    
    endif;
    
    wp_reset_postdata();
endif;
?>
    
</div>

<?php get_footer(); ?>
