<?php get_header(); ?>

<div class="nm-blog">
    <div class="nm-blog-heading">
    	<div class="nm-row">	
        	<div class="col-xs-12">
                <h1><?php wp_kses( printf( __( 'Tag Archives: %s', 'nm-framework' ), '<strong>' . single_tag_title( '', false ) . '</strong>' ), array( 'strong' => array() ) ); ?></h1>
            </div>
		</div>
    </div>
	
    <?php
		// Tag description
		$tag_description = tag_description();
		if ( ! empty( $tag_description ) ) :
	?>
    <div class="nm-term-description nm-tag-description">
        <div class="nm-row">
            <div class="col-xs-12">
                <?php echo $tag_description; ?>
            </div>
        </div>
    </div>
	<?php endif; ?>
    
	<?php get_template_part( 'content' ); ?>
</div>

<?php get_footer(); ?>
