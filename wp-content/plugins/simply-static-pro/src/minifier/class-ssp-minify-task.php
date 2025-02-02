<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Util;

/**
 * Class which handles GitHub commits.
 */
class Minify_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'minify';

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options       = Simply_Static\Options::instance();
		$this->options = $options;
	}

	/**
	 * Perform action to run on commit task.
	 *
	 * @return bool
	 */
	public function perform() {
		$this->save_status_message( __( 'Finding Files to Minify.', 'simply-static-pro' ) );

		$archive_dir = $this->options->get_archive_dir();

		$files = $this->get_files_to_minify( $archive_dir );

		$this->save_status_message( sprintf( __( 'Found %d files to minify.', 'simply-static-pro' ), count( $files ) ) );
		$this->save_status_message( __( 'Minifying pages/files...', 'simply-static-pro' ) );

		$this->minify_files( $files );

		$this->save_status_message( __( 'Minified all pages/files', 'simply-static-pro' ) );

		return true;
	}

	/**
	 * Get the minifier
	 *
	 * @return Minifer
	 */
	protected function get_minifer( $type = '' ) {
		if ( 'css' === $type ) {
			return new Minifer_CSS();
		}

		if ( 'js' === $type ) {
			return new Minifer_JS();
		}

		return new Minifer_HTML();
	}

	/**
	 * Minify Files
	 *
	 * @param array $files Array of file path to minify.
	 *
	 * @return void
	 */
	public function minify_files( $files ) {
		foreach ( $files as $file ) {
			$this->minify_file( $file );
		}
	}

	/**
	 * Minify the content from file path.
	 *
	 * @param string $file_path Path to the file to minify.
	 *
	 * @return void
	 */
	public function minify_file( $file_path ) {
		try {
			$filesystem = Helper::get_file_system();
			$content    = $filesystem->get_contents( $file_path );
			$file_info  = pathinfo( $file_path );
			$minified   = $this->minify_content( $content, $file_info['extension'] );

			file_put_contents( $file_path, $minified );
		} catch ( \Exception $e ) {
			$error = 'We could not minify the file: %s. Error: %s';
			Util::debug_log( sprintf( $error, $file_path, $e->getMessage() ) );
		}
	}

	/**
	 * Minify Content based on type.
	 *
	 * @param $content
	 * @param $type
	 *
	 * @return bool|string
	 */
	public function minify_content( $content, $type ) {
		$minifier = $this->get_minifer( $type );
		$minified = $minifier->minify( $content );

		return $minified;
	}

	/**
	 * Get all files to minify.
	 *
	 * @param string $dir File path.
	 * @param array $files Array of file paths.
	 *
	 * @return array|mixed
	 */
	public function get_files_to_minify( $dir, $files = [] ) {
		if ( ! is_dir( $dir ) ) {
			return $files;
		}

		$allowed_extensions = [];

		if ( $this->options->get( 'minify_html' ) ) {
			$allowed_extensions[] = 'html';
		}

		if ( $this->options->get( 'minify_css' ) ) {
			$allowed_extensions[] = 'css';
		}

		if ( $this->options->get( 'minify_js' ) ) {
			$allowed_extensions[] = 'js';
		}

		$scan = scandir( $dir );
		foreach ( $scan as $file_path ) {

			// Skipping to escape an infinite loop as it will scan dirs before.
			if ( $file_path === '.' || $file_path === '..' ) {
				continue;
			}

			$full_path = trailingslashit( $dir ) . $file_path;

			if ( is_dir( $full_path ) ) {
				$files = $this->get_files_to_minify( $full_path, $files );
				continue;
			}

			$file_info = pathinfo( $full_path );

			if ( ! $file_info ) {
				continue;
			}

			if ( empty( $file_info['extension'] ) ) {
				continue;
			}

			if ( ! in_array( $file_info['extension'], $allowed_extensions ) ) {
				continue;
			}

			$files[] = $full_path;
		}

		return $files;
	}
}
