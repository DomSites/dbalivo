<!-- post-<?php the_ID(); ?> -->    
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> >

    <!-- entry-header -->    
    <header class="entry-header">
    
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
                             
    </header><!-- close entry-header -->   

    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
        
        <!-- ut-post-thumbnail -->
        <div class="ut-post-thumbnail">     
        
            <?php 
            
            /* featured image */ 
            $fullsize   = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
            $fullsizeID = ut_get_attachment_id_from_url( $fullsize );
            
            $thumbnail = ut_resize( $fullsize , '855' , '425', true , true, true ); 
            $caption = get_post( $fullsizeID )->post_excerpt; 
            
            ?>    
            
            <div class="entry-thumbnail">
                <a title="<?php printf(esc_html__('Permanent Link to %s', 'unitedthemes'), get_the_title()); ?>" href="<?php the_permalink(); ?>">                
                    <img alt="<?php echo $caption; ?>" class="wp-post-image" src="<?php echo $thumbnail; ?>">
                </a>  
            </div>
                                         
        </div><!-- close ut-post-thumbnail -->
 
    <?php endif; ?>

    <!-- entry-summary -->
    <div class="entry-summary clearfix">
        
        <?php echo unite_get_vc_excerpt_by_id( $post ); ?>
        
        <p> 
            <a href="<?php the_permalink(); ?>" class="more-link">
                <span class="more-link"> <?php esc_html_e( 'Read more', 'unitedthemes' ); ?><i class="fa fa-chevron-circle-right"></i></span>
            </a>
        </p>
        
    </div><!-- close entry-summary -->

</article><!-- close post --> 