<?php

namespace simply_static_pro;

use Simply_Static\Util;

/**
 * Class to handle iframe embeds.
 */
class Iframe {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Returns instance of Iframe.
	 *
	 * @return object
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor for Iframe.
	 */
	public function __construct() {
		add_action( 'ss_dom_before_save', array( $this, 'iframe_urls' ), 10, 2 );
		add_action( 'wp_footer', array( $this, 'iframe_custom_css' ), 10, 2 );
		add_action( 'ss_dom_before_save', array( $this, 'iframe_forms' ), 20, 2 );
	}

	/**
	 * Replace entire pages with iframe embeds.
	 *
	 * @param object $dom given DOM object.
	 * @param string $url given static URL.
	 *
	 * @return mixed
	 */
	public function iframe_urls( $dom, $url ) {
		// Get list of URls to proxy.
		$options = get_option( 'simply-static' );

		if ( ! empty( $options['iframe_urls'] ) ) {
			$urls = array_unique( Util::string_to_array( $options['iframe_urls'] ) );

			if ( in_array( $url, $urls ) ) {
				// Check for Basic Auth.
				$http_basic_auth_username = $options['http_basic_auth_username'];
				$http_basic_auth_password = $options['http_basic_auth_password'];

				if ( ! empty( $http_basic_auth_username ) && ! empty( $http_basic_auth_password ) ) {
					$url_parts = parse_url( $url );
					$url       = $url_parts['scheme'] . '://' . $http_basic_auth_username . ':' . $http_basic_auth_password . '@' . $url_parts['host'];
				}

				// Replace body with iFrame.
				foreach ( $dom->find( 'body' ) as $body ) {
					$body->outertext = '<body><iframe src="' . esc_url( $url ) . '" style="width:100%;height:100vh;border:none;"></iframe></body>';
				}
			}
		}

		return $dom;
	}

	/**
	 * Add custom CSS to iframe embeds.
	 */
	public function iframe_custom_css() {
		// Get list of URls to proxy.
		$options = get_option( 'simply-static' );

		if ( empty( $options['iframe_urls'] ) || empty( $options['iframe_custom_css'] ) ) {
			return;
		}

		// Check if current page should be embedded as iframe.
		$iframe_urls = array_unique( Util::string_to_array( $options['iframe_urls'] ) );
		$current_url = get_permalink( get_the_ID() );

		if ( ! in_array( $current_url, $iframe_urls ) ) {
			return;
		}

		// Add custom css.
		?>
        <style>
            <?php echo $options['iframe_custom_css']; ?>
        </style>
		<?php
	}

	/**
	 * Replace forms with iframe embeds.
	 *
	 * @param object $dom given DOM object.
	 * @param string $url given static URL.
	 *
	 * @return mixed
	 */
	public function iframe_forms( $dom, $url ) {
		$options = get_option( 'simply-static' );

		// Skip if forms not used.
		if ( ! $options['use_forms'] ) {
			return $dom;
		}

		// Get list of form integrations.
		$args      = array( 'numberposts' => - 1, 'post_type' => 'ssp-form', 'fields' => 'ids' );
		$ssp_forms = get_posts( $args );
		$forms     = array();

		if ( ! empty( $ssp_forms ) ) {
			foreach ( $ssp_forms as $form_id ) {
				$form              = new \stdClass();
				$form->form_type   = get_post_meta( $form_id, 'form_type', true );
				$form->form_plugin = get_post_meta( $form_id, 'form_plugin', true );
				$form->form_id     = get_post_meta( $form_id, 'form_id', true );

				// Check for Basic Auth.
				$url                      = get_permalink( $form_id );
				$http_basic_auth_username = $options['http_basic_auth_username'];
				$http_basic_auth_password = $options['http_basic_auth_password'];

				if ( ! empty( $http_basic_auth_username ) && ! empty( $http_basic_auth_password ) ) {
					$url_parts = parse_url( $url );
					$url       = $url_parts['scheme'] . '://' . $http_basic_auth_username . ':' . $http_basic_auth_password . '@' . $url_parts['host'];
				}

				$form->link = $url;

				if ( $form->form_type === 'embedded' && ! empty( $form->form_id ) ) {
					$forms[] = $form;
				}
			}
		}

		if ( ! empty( $forms ) ) {
			foreach ( $forms as $form ) {
				// Replace form with iFrame.
				foreach ( $dom->find( '#' . $form->form_id ) as $form_element ) {
					$form_element->outertext = '<iframe src="' . esc_url( $form->link ) . '" style="width:100%;height:100vh;border:none;"></iframe>';
				}
			}
		}

		return $dom;
	}
}
