<?php

namespace simply_static_pro;

use voku\helper\HtmlMin;

class Minifer_HTML implements Minifer {

	public function minify( $content ) {
		$minifer  = new HtmlMin();
		$options  = \Simply_Static\Options::instance();
		$minified = $minifer->minify( $content );

		if ( $options->get( 'minify_inline_css' ) ) {
			$minified = $this->minify_inline_css( $minified );
		}

		if ( $options->get( 'minify_inline_js' ) ) {
			$minified = $this->minify_inline_js( $minified );
		}

		return $minified;
	}

	public function minify_inline_js( $content ) {
		if ( \strpos( $content, '</script>' ) !== false ) {
			$content = (string) \preg_replace_callback(
				'#<script(.*?)>(.*?)</script>#is',
				array( $this, 'minify_script_tag_match' ),
				$content
			);
		}

		return $content;
	}

	public function minify_script_tag_match( $matches ) {
		return '<script' . $matches[1] . '>' . $this->minify_js( $matches[2] ) . '</script>';
	}

	public function minify_js( $content ) {
		$minifer = new Minifer_JS();

		return $minifer->minify( $content );
	}

	public function minify_css( $content ) {
		$minifer = new Minifer_CSS();

		return $minifer->minify( $content );
	}

	public function minify_style_attribute_match( $matches ) {
		return '<' . $matches[1] . ' style=' . $matches[2] . $this->minify_css( $matches[3] ) . $matches[2];
	}

	public function minify_style_tag_match( $matches ) {
		return '<style' . $matches[1] . '>' . $this->minify_css( $matches[2] ) . '</style>';
	}

	public function minify_inline_css( $content ) {
		// Minify inline CSS declaration(s)
		if ( \strpos( $content, ' style=' ) !== false ) {
			$content = (string) \preg_replace_callback(
				'#<([^<]+?)\s+style=([\'"])(.*?)\2(?=[\/\s>])#s',
				array( $this, 'minify_style_attribute_match' ),
				$content
			);
		}

		if ( \strpos( $content, '</style>' ) !== false ) {
			$content = (string) \preg_replace_callback(
				'#<style(.*?)>(.*?)</style>#is',
				array( $this, 'minify_style_tag_match' ),
				$content
			);
		}

		return $content;
	}
}