<?php
	global $nm_theme_options, $nm_page_includes;
	
	$nm_page_includes['blog-grid'] = true;
	
    // Preloader classes
    $ul_class = ( $nm_theme_options['blog_grid_preloader'] ) ? 'nm-loader hide ' : '';

	// Column classes
	$columns_large = $nm_theme_options['blog_grid_columns'];
	$columns_medium = ( intval( $columns_large ) > 3 ) ? '3' : '2';
	$ul_class .= apply_filters( 'nm_blog_grid_columns_class', 'small-block-grid-1 medium-block-grid-' . $columns_medium . ' large-block-grid-' . $columns_large );

    // Image size slug
    $image_size = apply_filters( 'nm_blog_image_size', '' );
?>

<div class="nm-row">
    <div class="col-xs-12">
        <ul id="nm-blog-grid-ul" class="<?php echo esc_attr( $ul_class ); ?>">
			<?php while ( have_posts() ) : the_post(); // Start the Loop ?>
            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					$blog_slider = ( $nm_theme_options['blog_gallery'] === '1' ) ? nm_get_blog_slider( get_the_ID(), 'blog-grid' ) : false;
					
					if ( $blog_slider ) :
						
						echo $blog_slider;
					
					elseif ( has_post_thumbnail() ) :
				?>
                <div class="nm-post-thumbnail">
                    <a href="<?php esc_url( the_permalink() ); ?>">
						<?php the_post_thumbnail( $image_size ); ?>
						<div class="nm-image-overlay"></div>
					</a>
                </div>
                <?php endif; ?>
                
                <div class="nm-post-meta">
                    <span><?php the_time( get_option( 'date_format' ) ); ?></span>
                </div>
            
                <h1 class="nm-post-title"><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h1>
                    
                <div class="nm-post-content">
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
                    <?php else : ?>
                        <div class="nm-post-excerpt">
							<?php the_excerpt(); ?>
                            <a href="<?php esc_url( the_permalink() ); ?>" class="nm-post-read-more"><?php esc_html_e( 'More &nbsp;&rarr;', 'nm-framework' ); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </li>
			<?php endwhile; ?>
    	</ul>
    </div>
</div>
