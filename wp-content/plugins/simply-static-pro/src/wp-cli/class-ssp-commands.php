<?php

namespace simply_static_pro\commands;

use simply_static_pro\commands\deployment\Bunny_CDN;
use simply_static_pro\commands\deployment\SFTP;
use simply_static_pro\commands\deployment\Tiiny;
use simply_static_pro\commands\general\Delivery_Method;
use simply_static_pro\commands\general\Destination;
use simply_static_pro\commands\general\Local_Directory;
use simply_static_pro\commands\general\Simply_CDN;

class Commands {

	public function __construct() {
		$this->includes();

		spl_autoload_register( [ $this, 'load_commands' ] );

		$this->add_commands();
	}

	public function load_commands( $class_name ) {
		if ( false === strpos( $class_name, 'simply_static_pro\commands' ) ) {
			return null;
		}

		$path      = explode( "\\", $class_name );
		$file_path = [];
		$class     = '';
		$parts     = count( $path );
		foreach ( $path as $index => $path_string ) {
			if ( 'simply_static_pro' === $path_string || 'commands' === $path_string ) {
				continue;
			}

			if ( $index === ( $parts - 1 ) ) {
				$class = $path_string;
			} else {
				$file_path[] = $path_string;
			}

		}

		if ( ! $file_path ) {
			$file_path = '';
		} else {
			$file_path = implode( DIRECTORY_SEPARATOR, $file_path ) . DIRECTORY_SEPARATOR;
		}

		$name = 'class-ssp-' . strtolower( str_replace( '_', '-', $class ) ) . '.php';

		include $file_path . $name;
	}

	public function add_commands() {
		$export = new Run_Command();
		$this->add_command( $export );

		$command = new Delivery_Method();
		$this->add_command( $command );

		$command = new Destination();
		$this->add_command( $command );

		$command = new Local_Directory();
		$this->add_command( $command );

		$command = new Simply_CDN();
		$this->add_command( $command );

		$command = new Bunny_CDN();
		$this->add_command( $command );

		$command = new Tiiny();
		$this->add_command( $command );

		\WP_CLI::add_command( 'simply-static includes', new Includes() );
		\WP_CLI::add_command( 'simply-static excludes', new Excludes() );
		\WP_CLI::add_command( 'simply-static forms', new Forms() );
		\WP_CLI::add_command( 'simply-static basic-auth', new Basic_Auth() );
		\WP_CLI::add_command( 'simply-static deployment sftp', new SFTP() );
	}

	public function add_command( CLI_Command $command ) {
		\WP_CLI::add_command(
			$command->get_name(),
			$command,
			[
				'shortdesc' => $command->get_description(),
				'synopsis'  => $command->get_synopsis(),
			]
		);
	}

	public function includes() {
		require_once 'class-ssp-cli-command-interface.php';
		require_once 'class-ssp-cli-command.php';
		require_once 'class-ssp-run-command.php';
		require_once 'class-ssp-update-command.php';
	}
}

