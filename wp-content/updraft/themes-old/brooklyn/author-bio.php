<?php if( is_single() ) : 

    $author_social_links = array();

    // check if we have social links
    foreach( _ut_recognized_social_user_profiles() as $profile => $name ) {

       if( get_the_author_meta( $profile ) ) {

           $author_social_links[] = $profile;

       }    

    }

    if( get_the_author_meta( 'description' ) || !empty( $author_social_links ) ) : ?>

    <div class="grid-85 prefix-15 tablet-grid-80 tablet-prefix-20 mobile-grid-100">

        <div class="author-info clearfix">

            <div class="author-description">

                <figure class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'ut_author_bio_avatar_size', 80 ) ); ?>
                </figure>
                <!-- .author-avatar -->

                <div class="author-bio">

                    <h3 class="the-author">
                        <?php the_author(); ?>
                    </h3>

                    <?php the_author_meta( 'description' ); ?>

                    <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                        <?php printf( esc_html__( 'View all posts by %s', 'unitedthemes' ), get_the_author() ); ?><i class="fa fa fa-long-arrow-right"></i>
                    </a>

                    <?php if( !empty( $author_social_links ) ) : ?>

                        <ul class="author-social-links">

                            <?php foreach( $author_social_links as $profile ) : ?>

                                <li class="<?php echo esc_attr( $profile ); ?>"><a href="<?php echo esc_url( get_the_author_meta( $profile ) ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $profile ); ?>"></i></a></li>

                            <?php endforeach; ?>

                        </ul>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div> 

    <?php endif; ?>

<?php endif; ?>