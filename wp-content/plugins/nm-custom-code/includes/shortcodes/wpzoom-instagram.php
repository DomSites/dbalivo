<?php
    /* Convert $url to file path - from WPZOOM widget */
    function nm_wpzoom_convert_url_to_path( $url ) {
        return str_replace(
            wp_get_upload_dir()['baseurl'],
            wp_get_upload_dir()['basedir'],
            $url
        );
    }
    
    
    /* Output errors if widget is misconfigured and current user can manage options (plugin settings) - from WPZOOM widget */
	function nm_wpzoom_display_errors( $errors ) {
		if ( current_user_can( 'edit_theme_options' ) ) {
            ?>
			<div class="nm-wpzoom-instagram-error">
                <p>
                    <?php _e( 'Instagram Widget misconfigured or your Access Token <strong>expired</strong>. Please check', 'instagram-widget-by-wpzoom' ); ?>
				  <strong><a href="<?php echo admin_url( 'edit.php?post_type=wpz-insta_user' ); ?>" target="_blank"><?php _e( 'Instagram Settings Page', 'instagram-widget-by-wpzoom' ); ?></a></strong> <?php _e( 'and re-connect your account.', 'instagram-widget-by-wpzoom' ); ?>
                </p>
                <?php if ( ! empty( $errors ) ) : ?>
                    <ul>
                        <?php foreach ( $errors as $error ) : ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php
		} else {
            echo '&#8230;';
		}
	}
    
    
	/*
     *  Shortcode: nm_wpzoom_instagram
     *
     *  Note: The code below is a modified version of the "../plugins/instagram-widget-by-wpzoom/class-wpzoom-instagram-widget.php" file.
     */
	function nm_shortcode_wpzoom_instagram( $atts, $content = NULL ) {
        $atts = shortcode_atts( array(
			'username_hashtag'          => '', // Not a real setting, used as placeholder for info text
            'image_limit'               => 6,
			'images_per_row'            => 6,
            'image_aspect_ratio_class'  => 'aspect-ratio-square',
            'image_spacing_class'       => '',
            'instagram_user_link'       => ''
		), $atts );
        
        $image_size = apply_filters( 'nm_wpzoom_instagram_image_size', 640 );
        $image_resolution = apply_filters( 'nm_wpzoom_instagram_image_resolution', 'default_algorithm' );
        
        $wpzoom_instance = array(
			'title'                         => '',
			'button_text'                   => '',
			'image-limit'                   => $atts['image_limit'],
			'show-view-on-instagram-button' => false,
			'show-counts-on-hover'          => false,
			'show-user-info'                => false,
			'show-user-bio'                 => false,
			'lazy-load-images'              => false,
			'disable-video-thumbs'          => true,
			'display-media-type-icons'      => false,
			'lightbox'                      => false,
			'images-per-row'                => $atts['images_per_row'],
			'image-width'                   => intval( $image_size ),
			'image-spacing'                 => 0,
			'image-resolution'              => $image_resolution,
			'username'                      => '',
            //'bypass-transient'              => true, // NOTE: Can be used to disable transient/cache
		);
        
        $wpzoom_api = Wpzoom_Instagram_Widget_API::getInstance();
		
        $get_user = get_posts(
			array(
				'numberposts' => 1,
				'orderby'     => 'date',
        		'order'       => 'ASC',
				'post_type'   => 'wpz-insta_user'
			)
		);

		$user_id            = isset( $get_user[0]->ID ) ? intval( $get_user[0]->ID ) : -1;
		$user_account_token = get_post_meta( $user_id, '_wpz-insta_token', true ) ?: '-1';

		//Set token from first created user
		$wpzoom_api->set_access_token( $user_account_token );
		$wpzoom_api->set_feed_id( $user_id );
        
        $items  = $wpzoom_api->get_items( $wpzoom_instance );
        
		if ( ! is_array( $items ) ) {
            $errors = $wpzoom_api->errors->get_error_messages();
            
            ob_start();
            nm_wpzoom_display_errors( $errors );
            $output = ob_get_clean();
            return $output;
		} else {
            $username = $items['username'];
            
            $gallery_columns_desktop = intval( $atts['images_per_row'] );
            $gallery_columns_mobile = $gallery_columns_desktop / 2;
            $gallery_columns_class = apply_filters( 'nm_instagram_gallery_columns_class', 'large-block-grid-' . $gallery_columns_desktop . ' medium-block-grid-' . $gallery_columns_mobile . ' small-block-grid-' . $gallery_columns_mobile . ' xsmall-block-grid-' . $gallery_columns_mobile );

            $gallery_class = $atts['image_aspect_ratio_class'] . ' ' . $atts['image_spacing_class'];
            
            $count = 0;
            
            ob_start();
            ?>
            <div class="nm-instagram-gallery nm-wpzoom-instagram-gallery <?php echo esc_attr( $gallery_class ); ?>">
                <ul class="nm-instagram-gallery-ul <?php echo esc_attr( $gallery_columns_class ); ?>">
                    <?php foreach ( $items['items'] as $item ) :
                        $overwrite_src = false;
                        $src           = $item['image-url'];
                        $media_id      = $item['image-id'];

                        if ( ! empty( $media_id ) && empty( $src ) ) {
                            /*$inline_attrs  = 'data-media-id="' . esc_attr( $media_id ) . '"';
                            $inline_attrs .= 'data-nonce="' . wp_create_nonce( WPZOOM_Instagram_Image_Uploader::get_nonce_action( $media_id ) ) . '"';*/
                            $overwrite_src = true;
                        }

                        if (
                            ! empty( $media_id ) &&
                            ! empty( $src ) &&
                            ! file_exists( nm_wpzoom_convert_url_to_path( $src ) )
                        ) {
                            /*$inline_attrs  = 'data-media-id="' . esc_attr( $media_id ) . '"';
                            $inline_attrs .= 'data-nonce="' . wp_create_nonce( WPZOOM_Instagram_Image_Uploader::get_nonce_action( $media_id ) ) . '"';
                            $inline_attrs .= 'data-regenerate-thumbnails="1"';*/
                            $overwrite_src = true;
                        }

                        if ( $overwrite_src ) {
                            $src = $item['original-image-url'];
                        }
                        ?>
                        <li>
                            <a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" title="<?php echo esc_attr( $item['image-caption'] ); ?>">
                                <span class="nm-instagram-gallery-overlay"><i class="nm-font nm-font-instagram"></i></span>
                                <img src="<?php echo esc_url( $src ); ?>" alt="<?php echo esc_attr( $item['image-caption'] ); ?>">
                            </a>
                        </li>
                        <?php if ( ++$count == intval( $atts['image_limit'] ) ) break; ?>
                    <?php endforeach; ?>
                </ul>
                
                <?php if ( strlen( $atts['instagram_user_link'] ) > 0 ) : ?>
                <div class="nm-instagram-gallery-link">
                    <span><?php esc_html_e( 'Instagram', 'nm-instagram' ); ?></span> <a href="<?php printf( 'https://instagram.com/%s?ref=badge', esc_attr( $username ) ); ?>" target="_blank">@<?php echo esc_attr( $username ); ?></a>
                </div>
                <?php endif; ?>
            </div>
            <?php
            $output = ob_get_clean();
            
            return $output;
		}
	}
	
	add_shortcode( 'nm_wpzoom_instagram', 'nm_shortcode_wpzoom_instagram' );