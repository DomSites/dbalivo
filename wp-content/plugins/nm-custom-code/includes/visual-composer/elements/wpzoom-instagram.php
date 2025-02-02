<?php
	// VC element: nm_wpzoom_instagram
    vc_map( array(
       'name'			=> __( 'Instagram Gallery (new)', 'nm-framework-admin' ),
       'category'		=> __( 'Content', 'nm-framework-admin' ),
       'description'	=> __( 'Instagram gallery', 'nm-framework-admin' ),
       'base'			=> 'nm_wpzoom_instagram',
       'icon'			=> 'nm_instagram',
       'params'			=> array(
            array(
                'type' 			=> 'info', // This type doesn't exist (used to only display text)
                'heading'	=> sprintf(
                    __( '%sNOTE:%s Your Instagram account is connected via the WPZOOM <a href="%s" target="_blank">settings page</a>.', 'nm-framework-admin' ),
				    '<strong>',
                    '</strong>',
                    admin_url( 'edit.php?post_type=wpz-insta_user' )
                ),
                'param_name' 	=> 'username_hashtag',
                'std'			=> ''
            ),
            array(
                'type' 			=> 'textfield',
                'heading' 		=> __( 'Image Limit - Max. 12 (Instagram API limit)', 'nm-framework-admin' ),
                'param_name' 	=> 'image_limit',
                'description'	=> __( 'Number of images to display.', 'nm-framework-admin' ),
                'std'			=> '12'
            ),
            array(
                'type' 			=> 'dropdown',
                'heading' 		=> __( 'Images per Row', 'nm-framework-admin' ),
                'param_name' 	=> 'images_per_row',
                'description'   => __( 'Select number of images to display per row.', 'nm-framework-admin' ),
                'value' 		=> array(
                    '2' => '2',
                    '4' => '4',
                    '6' => '6',
                    '8' => '8'
                ),
                'std'			=> '6'
            ),
            /*array(
                'type' 			=> 'dropdown',
                'heading' 		=> __( 'Image Size', 'nm-framework-admin' ),
                'param_name' 	=> 'image_size',
                'description'   => __( 'Select image size.', 'nm-framework-admin' ),
                'value' 		=> array(
                    'Thumbnail' => 'thumbnail',
                    'Small'     => 'small',
                    'Medium'    => 'medium',
                    'Large'     => 'large',
                    'Original'  => 'original'
                ),
                'std'			=> 'medium'
            ),*/
            array(
                'type' 			=> 'dropdown',
                'heading' 		=> __( 'Image Aspect Ratio', 'nm-framework-admin' ),
                'param_name' 	=> 'image_aspect_ratio_class',
                'description'   => __( 'Select image aspect ratio.', 'nm-framework-admin' ),
                'value' 		=> array(
                    'Square'    => 'aspect-ratio-square',
                    'Original'  => 'aspect-ratio-original'
                ),
                'std'			=> 'aspect-ratio-square'
            ),
            array(
                'type' 			=> 'checkbox',
                'heading' 		=> __( 'Image Spacing', 'nm-framework-admin' ),
                'param_name' 	=> 'image_spacing_class',
                'description'	=> __( 'Display spacing between images.', 'nm-framework-admin' ),
                'value'			=> array(
                    __( 'Enable', 'nm-framework-admin' ) => 'has-spacing'
                ),
                'std'			=> '0'
            ),
            array(
                'type' 			=> 'checkbox',
                'heading' 		=> __( 'User Link', 'nm-framework-admin' ),
                'param_name' 	=> 'instagram_user_link',
                'description'	=> __( 'Display link to the Instagram user.', 'nm-framework-admin' ),
                'value'			=> array(
                    __( 'Enable', 'nm-framework-admin' ) => '1'
                ),
                'std'			=> '0'
            )
	   )
	) );