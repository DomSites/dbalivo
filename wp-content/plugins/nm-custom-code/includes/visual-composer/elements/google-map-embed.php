<?php

	// VC element: nm_gmap
	vc_map( array(
	   'name'			=> esc_html__( 'Google Map Embed', 'nm-framework-admin' ),
	   'category'		=> esc_html__( 'Content', 'nm-framework-admin' ),
	   'description'	=> esc_html__( 'Embed a Google Map (no API key needed)', 'nm-framework-admin' ),
	   'base'			=> 'nm_gmap_embed',
	   'icon'			=> 'nm_gmap',
	   'params'			=> array(
            array(
				'type' 			=> 'textarea_raw_html',
				'heading' 		=> esc_html__( 'Google Maps Embed Code', 'nm-framework-admin' ),
				'param_name' 	=> 'embed_code',
				'description'	=> sprintf( esc_html__( 'Add your %sGoogle Maps embed code%s (click the link for instructions).', 'nm-framework-admin' ), '<a href="https://www.businessinsider.com/how-to-embed-google-map" target="_blank">', '</a>' ),
                //'value'         => base64_encode( '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d77979.83662232387!2d4.833921149313544!3d52.35464494722058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sno!2sno!4v1622041282381!5m2!1sno!2sno" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>' )
                'value'         => ''
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> esc_html__( 'Map Height', 'nm-framework-admin' ),
				'param_name' 	=> 'height',
				'description'	=> esc_html__( 'Enter a map height.', 'nm-framework-admin' )
			)
	   )
	) );
	