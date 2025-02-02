<?php

namespace simply_static_pro;

use Simply_Static\Integration;
use Simply_Static\Url_Fetcher;
use voku\helper\HtmlDomParser;

class SS_Multilingual extends Integration {

	/**
	 * A string ID of integration.
	 *
	 * @var string
	 */
	protected $id = 'multilingual';

	public function __construct() {
		$this->name = __( 'WPML - Multilingual', 'simply-static' );
		$this->description = __( 'Integrates WPML to work with exported sites.', 'simply-static' );
	}

	public function dependency_active() {
		return is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' );
	}

	/**
	 * Run the integration.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'ss_match_tags', array( $this, 'find_translated_pages' ) );

		// Check for WPML before doing anything.
		if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) ) {
			add_filter( 'wpml_enqueue_browser_redirect_language', '__return_false' );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_public_scripts' ) );
		}
	}

	/**
	 * Add translations from meta tags.
	 *
	 * @param array $match_tags list of matching tags for extraction.
	 *
	 * @return array
	 */
	public function find_translated_pages( array $match_tags ): array {
		$match_tags['link'] = array( 'href' );

		return $match_tags;
	}

	/**
	 * Enqueue scripts for geo redirects.
	 *
	 * @return void
	 */
	public function add_public_scripts() {
		$use_geo_redirect = apply_filters( 'ssp_use_geo_redirect', true );

		if ( $use_geo_redirect ) {
			wp_enqueue_script( 'ssp-wpml-geo', SIMPLY_STATIC_PRO_URL . '/assets/ssp-wpml-geo.js', array( 'jquery' ), SIMPLY_STATIC_PRO_VERSION, true );
		}
	}

	/**
	 * Get related translations of a page.
	 *
	 * @param int $single_id single post id.
	 *
	 * @return array
	 */
	public static function get_related_translations( int $single_id ): array {
		$related_translations = array();

		$response = Url_Fetcher::remote_get( get_permalink( $single_id ) );
		$dom      = HtmlDomParser::str_get_html( wp_remote_retrieve_body( $response ) );

		foreach ( $dom->find( 'link' ) as $link ) {
			if ( $link->hasAttribute( 'hreflang' ) ) {
				if ( get_permalink( $single_id ) === $link->getAttribute( 'href' ) && 'x-default' !== $link->getAttribute( 'hreflang' ) ) {
					$related_translations[] = $link->getAttribute( 'href' );
				}
			}
		}

		return $related_translations;
	}

}