<!-- post -->    
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ut-blog-classic-article clearfix' ); ?> >
    
    <?php $grid = !ut_blog_has_sidebar() ? 'grid-15 tablet-grid-20 hide-on-mobile' : 'grid-25 tablet-grid-25 hide-on-mobile' ; ?>
    
    <!-- entry-meta -->
    <div class="<?php echo $grid; ?>">
         
        <div class="entry-meta">
        
            <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m') ); ?>">
                <div class="date-format">
                    <span class="day"><?php the_time('d'); ?></span>
                    <span class="month"><?php the_time('M'); ?> <?php the_time('Y'); ?></span>
                </div>
            </a>            
            <span class="ut-sticky"><i class="fa fa-thumb-tack"></i></span>
            <span class="author-links"><i class="fa fa-user-o"></i><?php the_author_posts_link(); ?></span>  
            <?php edit_post_link( esc_html__( 'Edit Article', 'unitedthemes' ), '<span class="edit-link">', '</span>' ); ?> 
            
        </div>       
    
    </div><!-- close entry-meta -->  
    
    <?php $grid = !ut_blog_has_sidebar() ? 'grid-85 tablet-grid-80 mobile-grid-100' : 'grid-75 tablet-grid-75 mobile-grid-100' ; ?>
    
    <div class="<?php echo $grid; ?>">
    
        <a class="ut-format-link" title="<?php echo esc_attr( wp_strip_all_tags( get_the_title() ) ); ?>" href="<?php echo esc_url( post_format_link_content() ); ?>" rel="bookmark">
            
            <div class="ut-format-link-content">
            
                <h2 class="entry-title"><?php the_title(); ?></h2>
            
            </div>
            
        </a>   
             
    </div>
         
</article><!-- close post -->

<?php get_template_part( 'author-bio' ); ?>