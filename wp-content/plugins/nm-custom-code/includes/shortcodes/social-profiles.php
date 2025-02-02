<?php
	
	// Shortcode: nm_social_profiles
	function nm_shortcode_social_profiles( $atts, $content = NULL ) {
		extract( shortcode_atts( array(
			'social_profile_facebook'	    => '',
			'social_profile_instagram'	    => '',
			'social_profile_twitter'	    => '',
            'social_profile_flickr'         => '',
            'social_profile_linkedin'	    => '',
			'social_profile_pinterest'	    => '',
			'social_profile_rss'		    => '',
            'social_profile_snapchat'       => '',
            'social_profile_behance'        => '',
            'social_profile_dribbble'       => '',
            'social_profile_line'           => '',
            'social_profile_messenger'      => '',
            'social_profile_mixcloud'       => '',
            'social_profile_odnoklassniki'  => '',
            'social_profile_soundcloud'     => '',
            'social_profile_telegram'       => '',
            'social_profile_tiktok'		    => '',
            'social_profile_tumblr'		    => '',
			'social_profile_viber'		    => '',
            'social_profile_vimeo'		    => '',
            'social_profile_vk'             => '',
            'social_profile_weibo'          => '',
            'social_profile_whatsapp'       => '',
            'social_profile_youtube'	    => '',
            'social_profile_email'          => '',
			'icon_size'					    => 'medium',
			'alignment'					    => 'center'
		), $atts ) );
		
        $x_twitter_data = ( function_exists( 'nm_get_x_twitter_data' ) ) ? nm_get_x_twitter_data() : array( 'title' => 'X / Twitter', 'share_title' => __( 'Share on Twitter', 'nm-framework' ), 'icon_class' => 'nm-font-x-twitter' );
        
		$social_profiles = array(
			'facebook'		=> array( 'title' => 'Facebook', 'icon_class' => 'nm-font-facebook', 'url' => $social_profile_facebook ),
			'instagram'		=> array( 'title' => 'Instagram', 'icon_class' => 'nm-font-instagram', 'url' => $social_profile_instagram ),
			'twitter'		=> array( 'title' => $x_twitter_data['title'], 'icon_class' => $x_twitter_data['icon_class'], 'url' => $social_profile_twitter ),
            'flickr'		=> array( 'title' => 'Flickr', 'icon_class' => 'nm-font-flickr', 'url' => $social_profile_flickr ),
            'linkedin'		=> array( 'title' => 'LinkedIn', 'icon_class' => 'nm-font-linkedin', 'url' => $social_profile_linkedin ),
			'pinterest'		=> array( 'title' => 'Pinterest', 'icon_class' => 'nm-font-pinterest', 'url' => $social_profile_pinterest ),
			'rss-square'	=> array( 'title' => 'RSS', 'icon_class' => 'nm-font-rss-square', 'url' => $social_profile_rss ),
            'snapchat'      => array( 'title' => 'Snapchat', 'icon_class' => 'nm-font-snapchat', 'url' => $social_profile_snapchat ),
            'behance'		=> array( 'title' => 'Behance', 'icon_class' => 'nm-font-behance', 'url' => $social_profile_behance ),
            'dribbble'		=> array( 'title' => 'Dribbble', 'icon_class' => 'nm-font-dribbble', 'url' => $social_profile_dribbble ),
            'line-app'      => array( 'title' => 'LINE', 'icon_class' => 'nm-font-line-app', 'url' => $social_profile_line ),
            'messenger'     => array( 'title' => 'Messenger', 'icon_class' => 'nm-font-facebook-messenger', 'url' => $social_profile_messenger ),
            'mixcloud'      => array( 'title' => 'MixCloud', 'icon_class' => 'nm-font-mixcloud', 'url' => $social_profile_mixcloud ),
            'odnoklassniki' => array( 'title' => 'OK.RU', 'icon_class' => 'nm-font-odnoklassniki', 'url' => $social_profile_odnoklassniki ),
            'soundcloud'    => array( 'title' => 'SoundCloud', 'icon_class' => 'nm-font-soundcloud', 'url' => $social_profile_soundcloud ),
            'telegram'	    => array( 'title' => 'Telegram', 'icon_class' => 'nm-font-telegram', 'url' => $social_profile_telegram ),
            'tiktok'		=> array( 'title' => 'TikTok', 'icon_class' => 'nm-font-tiktok', 'url' => $social_profile_tiktok ),
            'tumblr'		=> array( 'title' => 'Tumblr', 'icon_class' => 'nm-font-tumblr', 'url' => $social_profile_tumblr ),
			'viber'	        => array( 'title' => 'Viber', 'icon_class' => 'nm-font-viber', 'url' => $social_profile_viber ),
            'vimeo'	        => array( 'title' => 'Vimeo', 'icon_class' => 'nm-font-vimeo-square', 'url' => $social_profile_vimeo ),
            'vk'			=> array( 'title' => 'VK', 'icon_class' => 'nm-font-vk', 'url' => $social_profile_vk ),
            'weibo'			=> array( 'title' => 'Weibo', 'icon_class' => 'nm-font-weibo', 'url' => $social_profile_weibo ),
            'whatsapp'		=> array( 'title' => 'WhatsApp', 'icon_class' => 'nm-font-whatsapp', 'url' => $social_profile_whatsapp ),
            'youtube'		=> array( 'title' => 'YouTube', 'icon_class' => 'nm-font-youtube', 'url' => $social_profile_youtube ),
            'email'         => array( 'title' => 'Email', 'icon_class' => 'nm-font-envelope', 'url' => $social_profile_email )
		);
		
		$output = '';
		foreach ( $social_profiles as $service => $details ) {
            if ( $details['url'] !== '' ) {
                if ( $service == 'envelope' ) {
                    $details['url'] = 'mailto:' . $details['url'];
                }
                
                $output .= '<li><a href="' . esc_url( $details['url'] ) . '" target="_blank" title="' . esc_attr( $details['title'] ) . '" class="dark"><i class="nm-font ' . esc_attr( $details['icon_class'] ) . '"></i></a></li>';
			}
		}
		
		return '<ul class="nm-social-profiles icon-size-' . esc_attr( $icon_size ) . ' align-' . esc_attr( $alignment ) . '">' . $output . '</ul>';
	}
	
	add_shortcode( 'nm_social_profiles', 'nm_shortcode_social_profiles' );
	