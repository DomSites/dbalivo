<?php

namespace simply_static_pro\commands;

use Simply_Static\Options;
use Simply_Static\Util;
use simply_static_pro\Form_Settings;

/**
 * Manage Forms
 */
class Forms {

	/**
	 * Show all saved Forms
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static forms list
	 *
	 * @when after_wp_load
	 */
	function list( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$forms = get_posts( [ 'post_type' => 'ssp-form', 'posts_per_page' => - 1 ] );
		$items = [];

		foreach ( $forms as $form ) {
			$items[] = [
				'id'    => $form->ID,
				'title' => $form->post_title
			];
		}

		\WP_CLI\Utils\format_items( 'table', $items, array( 'id', 'title' ) );

		$this->maybe_restore_blog( $options );
	}

	protected function get_fields() {
		return [
			'title'        => [
				'name'  => 'post_title',
				'label' => 'Title',
				'type'  => 'post',
			],
			'tool'         => [
				'name'    => 'tool',
				'label'   => 'Choose a Tool:' . "\n - cf7 : Contact Form 7\n - gravity_forms : Gravity Forms\n - external : External Service\nTool:",
				'allowed' => [
					'cf7',
					'gravity_forms',
					'external'
				]
			],
			'form-id'      => [
				'name'  => 'form-id',
				'label' => 'Form ID (Required if using Form plugin)'
			],
			'subject'      => [
				'name'  => 'subject',
				'label' => 'Subject (Only required when using a form plugin.)'
			],
			'name'         => [
				'name'  => 'name-attributes',
				'label' => 'Name (Add a comma-separated list of the name attributes of your form.)'
			],
			'message'      => [
				'name'  => 'message',
				'label' => 'Message (Use HTML)'
			],
			'email'        => [
				'name'  => 'email',
				'label' => 'E-mail (where the e-mail should be sent to.)'
			],
			'headers'      => [
				'name'  => 'additional-headers',
				'label' => 'Headers (You can add CC, BCC or Reply to e-mails here. You can add multiple headers here by separating them with comma.)'
			],
			'endpoint'     => [
				'name'  => 'endpoint',
				'label' => 'Endpoint (Add an endpoint URL from Zapier, IFTT or use the Simply Static endpoint.)'
			],
			'redirect-url' => [
				'name'  => 'redirect-url',
				'label' => 'Redirect URL (Redirect a user after successful submission to this URL.)'
			]
		];
	}

	/**
	 * Add a new Form
	 *
	 * ## OPTIONS
	 *
	 * [--blog_id=<blog_id>]
	 * : Blog ID. Used only on multisite.
	 *
	 * ## EXAMPLES
	 *
	 *     wp simply-static includes add_url https://url.com/to/remove
	 *
	 * @when after_wp_load
	 */
	function add_form( $args, $options ) {
		$this->maybe_switch_blog( $options );

		$fields = $this->get_fields();
		$data   = [];

		foreach ( $fields as $field ) {
			$value                  = $this->ask_field( $field );
			$data[ $field['name'] ] = $value;
		}

		$form_id = wp_insert_post( [
			'post_title'  => $data['post_title'],
			'post_type'   => 'ssp-form',
			'post_status' => 'publish',
		] );

		if ( is_wp_error( $form_id ) ) {
			\WP_CLI::error( $form_id->get_error_message() );
		} else {
			foreach ( $data as $key => $value ) {
				if ( 'post_title' === $key ) {
					continue;
				}
				update_post_meta( $form_id, $key, $value );
			}


			Form_Settings::get_instance()->create_config_file();
			\WP_CLI::success( 'Form Created' );
		}

		$this->maybe_restore_blog( $options );
	}

	protected function ask_field( $field ) {
		$value = $this->ask( $field['label'] );
		if ( ! empty( $field['allowed'] ) ) {
			if ( ! in_array( $value, $field['allowed'] ) ) {
				\WP_CLI::line( \WP_CLI::colorize( "%YNot an allowed value. Please enter again." ) );

				return $this->ask_field( $field );
			}
		}

		return $value;
	}

	/**
	 * We are asking a question and returning an answer as a string.
	 *
	 * @param $question
	 *
	 * @return string
	 */
	protected function ask( $question ) {
		// Adding space to question and showing it.
		fwrite( STDOUT, $question . ' ' );

		return strtolower( trim( readline() ) );
	}

	protected function update( $value, $name ) {
		$options = Options::instance();
		$options->set( $name, $value );
		$options->save();
	}

	protected function maybe_switch_blog( $options ) {
		if ( ! is_multisite() ) {
			return;
		}

		if ( ! isset( $options['blog_id'] ) || ! absint( $options['blog_id'] ) ) {
			return;
		}

		switch_to_blog( absint( $options['blog_id'] ) );
	}

	protected function maybe_restore_blog( $options ) {
		if ( ! is_multisite() ) {
			return;
		}

		if ( ! isset( $options['blog_id'] ) || ! absint( $options['blog_id'] ) ) {
			return;
		}

		restore_current_blog();
	}

}