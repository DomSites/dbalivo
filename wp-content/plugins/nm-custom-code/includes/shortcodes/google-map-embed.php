<?php
	
	// Shortcode: nm_gmap_embed
	function nm_shortcode_gmap_embed( $atts, $content = NULL ) {
		extract( shortcode_atts( array(
			//'embed_code' => base64_encode( '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d77979.83662232387!2d4.833921149313544!3d52.35464494722058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sno!2sno!4v1622041282381!5m2!1sno!2sno" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>' ),
			'embed_code' => '',
            'height'     => '500',
		), $atts ) );
		
        $embed_code = ( strlen( $embed_code ) > 0 )
            ? rawurldecode( base64_decode( wp_strip_all_tags( $embed_code ) ) ) // Code from "../js_composer/include/templates/shortcodes/vc_raw_html.php"
            : '<p class="nm-gmap-embed-no-code">' . esc_html__( '(add Google Maps embed code)', 'nm-framework-admin' ) . '</p>';
        
        $output = sprintf( '<div class="nm-gmap-embed" style="height:%spx">%s</div>',
            intval( $height ),
            $embed_code
        );
        
        return $output;
	}
	
	add_shortcode( 'nm_gmap_embed', 'nm_shortcode_gmap_embed' );
	