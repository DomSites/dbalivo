<?php

namespace simply_static_pro\integrations\Github;

use Simply_Static\Util;

class API {

	/**
	 * API URL
	 *
	 * @var string
	 */
	protected $api_url = 'https://api.github.com/';

	/**
	 * API Version
	 *
	 * @var string
	 */
	protected $api_version = '2022-11-28';

	/**
	 * API Token
	 *
	 * @var string
	 */
	protected $token = '';

	/**
	 * Set API Token.
	 *
	 * @param string $token Token.
	 *
	 * @return void
	 */
	public function set_token( $token ) {
		$this->token = $token;
	}

	/**
	 * Get Headers.
	 *
	 * @return array
	 */
	public function get_headers() {
		return [
			'Accept'               => 'application/vnd.github+json',
			'Authorization'        => 'Bearer ' . $this->token,
			'X-GitHub-Api-Version' => $this->api_version
		];
	}

	/**
	 * Get URL
	 *
	 * @param string $resource Resource.
	 *
	 * @return string
	 */
	public function get_url( $resource ) {
		return trailingslashit( $this->api_url ) . $resource;
	}

	/**
	 * Prepare response for usage.
	 *
	 * @param \WP_HTTP_Requests_Response|\WP_Error|null $response
	 * @param string $method Method name.
	 * @param array $args Arguments in request.
	 *
	 * @return array
	 */
	protected function prepare_response( $response, $method = null, $args = [], $resource = '' ) {


		if ( is_wp_error( $response ) ) {
			throw new \Exception( $response->get_error_message() );
		}

		$code = wp_remote_retrieve_response_code( $response );

		if ( $this->is_redirect_code( $code ) ) {
			$headers = wp_remote_retrieve_headers( $response );
			if ( ! empty( $headers['Location'] ) && $method ) {
				return $this->{$method}( $headers['Location'], $args );
			}

			throw new \Exception( __( 'Something went wrong with the request', 'simply-static-pro' ), $code );
		}

		$data = json_decode( wp_remote_retrieve_body( $response ), true );

		if ( $this->is_error_code( $code ) ) {
			if ( ! empty( $data['message'] ) ) {

				// Prepare content.
				$content = json_decode( $args['body'], true );
				unset( $content['content'] );
				$args['body'] = wp_json_encode( $content);

				// Log the response.
				Util::debug_log( $data['message'] . " Data: \n" . print_r( [
						'method'   => $method,
						'resource' => $resource,
						'args'     => $args,
					], true ) );

				throw new \Exception( $data['message'], $code );
			}

			if ( ! empty( $data['errpr'] ) ) {

				// Prepare content.
				$content = json_decode( $args['body'], true );
				unset( $content['content'] );
				$args['body'] = wp_json_encode( $content);

				// Log the response.
				Util::debug_log( print_r( $data['errors'], true ) . " Data: \n" . print_r( [
						'method'   => $method,
						'resource' => $resource,
						'args'     => $args,
					], true ) );

				throw new \Exception( print_r( $data['errors'], true ), $code );
			}

			throw new \Exception( __( 'Something went wrong with the request. Code: ' . $code, 'simply-static-pro' ), $code );
		}

		return $data;
	}

	/**
	 * Is this error code.
	 *
	 * @param string|int $code Code.
	 *
	 * @return bool
	 */
	protected function is_error_code( $code ) {
		return absint( $code ) >= 400;
	}

	/**
	 * Is this a redirect code.
	 *
	 * @param string|int $code Code.
	 *
	 * @return bool
	 */
	protected function is_redirect_code( $code ) {
		return absint( $code ) >= 300 && absint( $code ) < 400;
	}

	public function get( $resource, $headers = [] ) {

		$headers = wp_parse_args( $headers, $this->get_headers() );
		$args    = apply_filters(
			'ss_remote_get_args',
			array(
				'headers'     => $headers,
				'timeout'     => 30,
				'sslverify'   => false,
				'redirection' => 0, // disable redirection.
				'blocking'    => true // do not execute code until this call is complete.
			)
		);

		$resp = wp_remote_get( $this->get_url( $resource ), $args );

		return $this->prepare_response( $resp, 'get', $args, $resource );
	}

	public function post( $resource, $body = [], $headers = [] ) {

		$headers = wp_parse_args( $headers, $this->get_headers() );
		$args    = apply_filters(
			'ss_remote_get_args',
			array(
				'headers'     => $headers,
				'body'        => wp_json_encode( $body ),
				'timeout'     => 30,
				'sslverify'   => false,
				'redirection' => 0, // disable redirection.
				'blocking'    => true // do not execute code until this call is complete.
			)
		);

		$resp = wp_remote_post( $this->get_url( $resource ), $args );

		return $this->prepare_response( $resp, 'post', $args, $resource );
	}

	public function patch( $resource, $body = [], $headers = [] ) {
		$headers = wp_parse_args( $headers, $this->get_headers() );
		$args    = apply_filters(
			'ss_remote_get_args',
			array(
				'method'      => 'PATCH',
				'headers'     => $headers,
				'body'        => wp_json_encode( $body ),
				'timeout'     => 30,
				'sslverify'   => false,
				'redirection' => 0, // disable redirection.
				'blocking'    => true // do not execute code until this call is complete.
			)
		);

		$resp = wp_remote_request( $this->get_url( $resource ), $args );

		$this->prepare_response( $resp, 'patch', $args );

		return true;
	}

	public function put( $resource, $body = [], $headers = [] ) {
		$headers = wp_parse_args( $headers, $this->get_headers() );
		$args    = apply_filters(
			'ss_remote_get_args',
			array(
				'method'      => 'PUT',
				'headers'     => $headers,
				'body'        => wp_json_encode( $body ),
				'timeout'     => 30,
				'sslverify'   => false,
				'redirection' => 0, // disable redirection.
				'blocking'    => true // do not execute code until this call is complete.
			)
		);

		$resp = wp_remote_request( $this->get_url( $resource ), $args );

		$this->prepare_response( $resp, 'put', $args );

		return true;
	}

	public function delete( $resource, $body = [], $headers = [] ) {
		$headers = wp_parse_args( $headers, $this->get_headers() );
		$data    = apply_filters(
			'ss_remote_get_args',
			array(
				'method'      => 'DELETE',
				'headers'     => $headers,
				'timeout'     => 30,
				'sslverify'   => false,
				'redirection' => 0, // disable redirection.
				'blocking'    => true // do not execute code until this call is complete.
			)
		);

		if ( $body ) {
			$data['body'] = wp_json_encode( $body );
		}

		$resp = wp_remote_request( $this->get_url( $resource ), $data );

		$this->prepare_response( $resp, 'delete', $data );

		return true;
	}
}