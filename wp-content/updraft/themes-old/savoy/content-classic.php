<?php
	global $nm_theme_options;

    $show_sidebar = ( $nm_theme_options['blog_sidebar'] != 'none' ) ? true : false;
    $post_column_class = ( $show_sidebar ) ? 'col-md-8 col-sm-12 col-xs-12' : 'col-xs-12';
    $content_column_class = ( $show_sidebar ) ? 'col-xs-12' : 'col col-lg-8 col-md-12 centered';

    // Image size slug
    $image_size = apply_filters( 'nm_blog_image_size', '' );
?>

<div class="nm-blog-sidebar-<?php echo esc_attr( $nm_theme_options['blog_sidebar'] ); ?> nm-row">
    <div class="nm-blog-content-col <?php echo esc_attr( $post_column_class ); ?>">
        <?php while ( have_posts() ) : the_post(); // Start the Loop ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="nm-blog-header nm-row">
                <div class="<?php echo esc_attr( $content_column_class ); ?>">
                    <h1 class="nm-post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h1>

                    <div class="nm-post-meta">
                        <span><?php the_time( get_option( 'date_format' ) ); ?></span>
                    </div>
                </div>
            </div>
                
            <?php
                $blog_slider = ( $nm_theme_options['blog_gallery'] === '1' ) ? nm_get_blog_slider( get_the_ID(), 'blog-grid' ) : false;

                if ( $blog_slider ) :

                    echo $blog_slider;

                elseif ( has_post_thumbnail() ) :
            ?>
            <div class="nm-post-thumbnail">   
                <a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail( $image_size ); ?></a>
            </div>
            <?php endif; ?>
            
            <div class="nm-post-content nm-row">
                <div class="<?php echo esc_attr( $content_column_class ); ?>">
                <?php if ( $nm_theme_options['blog_show_full_posts'] === '1' ) : ?>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <?php
                        wp_link_pages( array(
                            'before' 		=> '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nm-framework' ) . '</span>',
                            'after' 		=> '</div>',
                            'link_before'	=> '<span>',
                            'link_after'	=> '</span>'
                        ) );
                    ?>
                    <div class="nm-post-content-comments-link">
                        <a href="<?php esc_url( the_permalink() ); ?>#comments">
                            <i class="nm-font nm-font-messenger"></i>
                            <span><?php comments_number( __( 'Leave a comment', 'nm-framework' ), __( '1 comment', 'nm-framework' ), __( '% comments', 'nm-framework' ) ); ?></span>
                        </a>
                    </div>
                <?php else : ?>
                    <div class="nm-post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>

            <div class="nm-post-divider">&nbsp;</div>
        </div>
        <?php endwhile; ?>
    </div>

    <?php if ( $show_sidebar ) : ?>
    <div class="nm-blog-sidebar-col col-md-4 col-sm-12 col-xs-12">
        <?php get_sidebar(); ?>
    </div>
    <?php endif; ?>
</div>
