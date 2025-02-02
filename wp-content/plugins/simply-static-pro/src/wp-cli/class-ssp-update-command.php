<?php

namespace simply_static_pro\commands;
;

use Simply_Static\Options;

class Update_Command extends CLI_Command {

	/**
	 * Description
	 *
	 * @var string
	 */
	protected $description = '';

	protected $section = '';

	protected $name = '';

	protected $option_name = '';

	public function get_description() {
		return $this->description;
	}

	public function set_description( $description ) {
		$this->description = $description;
	}

	public function set_section( $section ) {
		$this->section = $section;
	}

	public function get_command_name() {
		return 'update ' . ( $this->section ? $this->section . ' ' : '' ) . $this->name;
	}

	public function get_synopsis() {

		$synopsis = [];

		if ( is_multisite() ) {
			$synopsis[] = array(
				'type'        => 'assoc',
				'name'        => 'blog_id',
				'description' => 'Blog ID. If empty, it\'ll use the first blog (sites) (Blog with lower ID).',
				'optional'    => true,
				'repeating'   => false,
			);
		}

		return $synopsis;
	}

	public function update( $value, $name = null ) {
		if ( ! $name ) {
			$name = $this->option_name;
		}
		$options = Options::instance();
		$options->set( $name, $value );
		$options->save();
	}

	public function __invoke( $args, $options ) {
		if ( isset( $options['blog_id'] ) ) {
			$this->set_blog_id( $options['blog_id'] );
		}

		$this->run( $args, $options );

		if ( isset( $options['blog_id'] ) ) {
			$this->restore_blog();
		}
	}

	public function run( $args, $options ) {
	}

	public function set_blog_id( $blog_id ) {
		if ( ! is_multisite() ) {
			return;
		}

		switch_to_blog( $blog_id );
	}

	public function restore_blog() {
		if ( ! is_multisite() ) {
			return;
		}

		restore_current_blog();
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
}