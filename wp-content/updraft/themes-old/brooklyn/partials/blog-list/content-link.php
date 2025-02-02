<article id="post-<?php the_ID(); ?>" <?php post_class( 'ut-blog-list-article grid-100 tablet-grid-100 mobile-grid-100 clearfix' ); ?>>
    
    <div class="ut-blog-layout-list-article-inner">
    
        <a class="ut-format-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( post_format_link_content() ); ?>" rel="bookmark">
            
            <div class="ut-format-link-content">
            
                <h2 class="entry-title"><?php the_title(); ?></h2>
            
            </div>
            
        </a>            
    
    </div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->