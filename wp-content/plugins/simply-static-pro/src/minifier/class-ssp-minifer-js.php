<?php

namespace simply_static_pro;

use JShrink\Minifier;

class Minifer_JS implements Minifer {

	/**
	 * @throws \Exception
	 */
	public function minify( $content ) {
		if ( ! $content || trim( $content ) === '' || ! is_string( $content ) ) {
			return $content;
		}

		$output = Minifier::minify( $content );

		return $output;
	}
}