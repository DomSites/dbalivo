<?php

namespace simply_static_pro\commands;

use Simply_Static\Options;
use Simply_Static\Plugin;
use Simply_Static\Util;
use simply_static_pro\Build;
use simply_static_pro\Single;

class Run_Command extends CLI_Command {

	protected $blog_id = 0;

	protected $options = null;

	protected $task_list = [];

	public function get_description() {
		return 'Export Site into a secure Static website';
	}

	public function get_command_name() {
		return 'run';
	}

	public function get_synopsis() {
		$synopsis = [];

		$synopsis[] = array(
			'type'        => 'assoc',
			'name'        => 'build',
			'description' => 'Build ID.',
			'optional'    => true,
			'repeating'   => false,
		);

		$synopsis[] = array(
			'type'        => 'assoc',
			'name'        => 'single',
			'description' => 'Single Post/Page ID.',
			'optional'    => true,
			'repeating'   => false,
		);

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

	public function set_blog_id( $blog_id ) {
		if ( ! is_multisite() ) {
			$this->blog_id = get_current_blog_id();

			return;
		}

		switch_to_blog( $blog_id );
		$this->blog_id = $blog_id;
	}

	public function restore_blog() {
		if ( ! is_multisite() ) {
			return;
		}

		restore_current_blog();
	}

	public function get_tasks() {

		$this->options   = Options::instance();
		$this->task_list = apply_filters( 'simplystatic.archive_creation_job.task_list', array(), $this->options->get( 'delivery_method' ) );

		\WP_CLI::line( sprintf( 'Found %s registered tasks', count( $this->task_list ) ) );

		return $this->task_list;
	}

	protected function reset_options() {

		\WP_CLI::line( 'Resetting Options before the start.' );

		$archive_name = join( '-', array( Plugin::SLUG, $this->blog_id, time() ) );

		\WP_CLI::line( sprintf( 'Archive Name set to: %s', $archive_name ) );
		$this->options
			->set( 'archive_status_messages', array() )
			->set( 'archive_name', $archive_name )
			->set( 'archive_start_time', Util::formatted_datetime() )
			->set( 'archive_end_time', null )
			->save();
	}

	public function perform_task( $task ) {
		$class_name = 'Simply_Static\\' . ucwords( $task ) . '_Task';
		$class_name = apply_filters( 'simply_static_class_name', $class_name, $task );

		// this shouldn't ever happen, but just in case...
		if ( ! class_exists( $class_name ) ) {
			throw new \Exception( "Class doesn't exist: " . $class_name, 'error' );
		}

		$task_object = new $class_name();

		\WP_CLI::line( sprintf( 'Performing task: %s', $task ) );

		return $task_object->perform();
	}

	public function process_tasks() {
		$progress = \WP_CLI\Utils\make_progress_bar( 'Processing Tasks', count( $this->task_list ) );
		foreach ( $this->task_list as $task ) {
			$done = $this->perform_task( $task );
			while ( ! $done ) {
				$done = $this->perform_task( $task );
			}
			$progress->tick();
		}
		$progress->finish();
	}

	protected function maybe_run_build( $options ) {
		if ( empty( $options['build'] ) ) {
			return;
		}

		$term = get_term( absint( $options['build'] ), 'ssp-build' );

		if ( ! $term || is_wp_error( $term ) ) {
			\WP_CLI::error( 'No Such Build' );

			return;
		}

		\WP_CLI::line( 'Preparing for Build Export' );

		Build::get_instance()->prepare_build( absint( $options['build'] ) );

	}

	protected function maybe_run_single( $options ) {
		if ( empty( $options['single'] ) ) {
			return;
		}

		$post = get_post( absint( $options['single'] ) );

		if ( ! $post || is_wp_error( $post ) ) {
			\WP_CLI::error( 'No Content Found' );

			return;
		}

		\WP_CLI::line( 'Preparing for Single Export' );

		Single::get_instance()->prepare_single_export( absint( $options['single'] ) );
	}

	public function __invoke( $args, $options ) {

		try {
			$this->set_blog_id( $options['blog_id'] ?? get_current_blog_id() );

			\WP_CLI::line( 'Starting to export Blog ID: ' . get_current_blog_id() . '. URL:' . home_url() );

			$this->maybe_run_build( $options );

			$this->maybe_run_single( $options );

			$this->get_tasks();

			$this->reset_options();

			$this->process_tasks();

			if ( isset( $options['blog_id'] ) ) {
				$this->restore_blog();
			}

            Util::debug_log( '[wp_cli] Completing the job' );

            $end_time    = Util::formatted_datetime();
            $start_time  = $this->options->get( 'archive_start_time' );
            $duration    = strtotime( $end_time ) - strtotime( $start_time );
            $time_string = gmdate( "H:i:s", $duration );

            $this->options->set( 'archive_end_time', $end_time )->save();

            $message = sprintf( __( 'Export Completed. Finished in %s', 'simply-static' ), $time_string );

            $this->options
                ->add_status_message( $message, 'wp_cli')
                ->save();

            Util::debug_log( '[wp_cli] ' . $message );
            \WP_CLI::success( $message );
		} catch ( \Exception $e ) {
			\WP_CLI::error( $e->getMessage() );
		}
	}
}