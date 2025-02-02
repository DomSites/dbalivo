<?php

namespace simply_static_pro\commands;
;

abstract class CLI_Command implements CLI_Command_Interface {

	/**
	 * {@inheritdoc}
	 */
	public function get_synopsis() {
		return [];
	}

	/**
	 * {@inheritdoc}
	 */
	final public function get_name() {
		return sprintf( 'simply-static %s', $this->get_command_name() );
	}

	/**
	 * Get the "my-plugin" command name.
	 *
	 * @return string
	 */
	abstract protected function get_command_name();
}