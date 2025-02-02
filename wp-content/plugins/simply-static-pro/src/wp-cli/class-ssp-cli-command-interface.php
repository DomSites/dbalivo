<?php

namespace simply_static_pro\commands;
;

interface CLI_Command_Interface {

	/**
	 * Get the command name.
	 *
	 * @return string
	 */
	public function get_name();

	/**
	 * Executes the command.
	 *
	 * @param array $arguments
	 * @param array $options
	 */
	public function __invoke( $arguments, $options );

	/**
	 * Get the positional and associative arguments a command accepts.
	 *
	 * @return array
	 */
	public function get_synopsis();

	/**
	 * Get the command description.
	 *
	 * @return string
	 */
	public function get_description();
}