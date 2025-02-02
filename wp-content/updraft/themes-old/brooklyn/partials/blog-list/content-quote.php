<article id="post-<?php the_ID(); ?>" <?php post_class( 'ut-blog-list-article grid-100 tablet-grid-100 mobile-grid-100 clearfix' ); ?>>
    
    <div class="ut-blog-layout-list-article-inner">
    
        <?php if( get_post_format_quote_content() ) : ?>
            
            <a class="ut-quote-post-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>">           

                <div class="ut-quote-post">   
                    <?php post_format_quote_content(); ?> 
                </div>
                
            </a>
        
        <?php endif; ?>            
    
    </div>
    
</article>
<!-- #post-<?php the_ID(); ?> -->