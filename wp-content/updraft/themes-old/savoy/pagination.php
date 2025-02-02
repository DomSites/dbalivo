<div class="nm-blog-pagination">
    <div class="nm-row">
        <div class="col-xs-12">
            <?php 
            if ( function_exists( 'wp_pagenavi' ) ) :
                wp_pagenavi();
            else :
            ?>
            <div class="nm-blog-prev">
                <?php next_posts_link( esc_html__( 'Older Posts', 'nm-framework' ) ); ?>
            </div>
            <div class="nm-blog-next">
                <?php previous_posts_link( esc_html__( 'Newer Posts', 'nm-framework' ) ); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>