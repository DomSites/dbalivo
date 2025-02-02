<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Util;

/**
 * Class which handles GitHub commits.
 */
class Optimize_Directories_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'optimize_directories';

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
		$this->save_status_message( __( 'Replace Directories...', 'simply-static-pro' ) );

		$author_directory      = trim( $this->options->get( 'author_url' ) );
		$wp_content_directory  = trim( $this->options->get( 'wp_content_directory' ) );
		$wp_uploads_directory  = trim( $this->options->get( 'wp_uploads_directory' ) );
		$wp_plugins_directory  = trim( $this->options->get( 'wp_plugins_directory' ) );
		$wp_themes_directory   = trim( $this->options->get( 'wp_themes_directory' ) );
		$wp_includes_directory = trim( $this->options->get( 'wp_includes_directory' ) );
		$new_style          = trim( $this->options->get( 'theme_style_name' ) );
		$archive_dir        = untrailingslashit( $this->options->get_archive_dir() ) . '/';
		$plugin_names       = Filter::get_hashed_plugin_names();

		if ( $new_style && 'style' !== $new_style ) {
			$style_path     = $archive_dir . 'wp-content/themes/' . get_stylesheet() . '/style.css';
			$new_style_path = $archive_dir . 'wp-content/themes/' . get_stylesheet() . '/' . $new_style . '.css';
			rename( $style_path, $new_style_path );
		}

		if ( $author_directory && 'author' !== $author_directory && '/' !== $author_directory ) {
			rename( $archive_dir . 'author', $archive_dir . $author_directory );
		}

		if ( $plugin_names && $this->options->get( 'rename_plugin_directories' ) ) {
			foreach ( $plugin_names as $plugin_name => $hashed_name ) {
				$plugin_path = $archive_dir . 'wp-content/plugins/' . $plugin_name;
				$hashed_path = $archive_dir . 'wp-content/plugins/' . $hashed_name;
				rename( $plugin_path, $hashed_path );
			}
		}

		if ( $wp_plugins_directory && 'wp-content/plugins' !== $wp_plugins_directory && '/' !== $wp_plugins_directory ) {
			rename( $archive_dir . 'wp-content/plugins', $archive_dir . $wp_plugins_directory );
		}

		if ( $wp_themes_directory && 'wp-content/themes' !== $wp_themes_directory && '/' !== $wp_themes_directory ) {
			rename( $archive_dir . 'wp-content/themes', $archive_dir . $wp_themes_directory );
		}

		if ( $wp_uploads_directory && 'wp-content/uploads' !== $wp_uploads_directory && '/' !== $wp_uploads_directory ) {
			rename( $archive_dir . 'wp-content/uploads', $archive_dir . $wp_uploads_directory );
		}

		if ( $wp_content_directory && 'wp-content' !== $wp_content_directory && '/' !== $wp_content_directory ) {
			rename( $archive_dir . 'wp-content', $archive_dir . $wp_content_directory );
		}

		if ( $wp_includes_directory && 'wp-includes' !== $wp_includes_directory && '/' !== $wp_includes_directory ) {
			rename( $archive_dir . 'wp-includes', $archive_dir . $wp_includes_directory );
		}

		$this->save_status_message( __( 'Replaced Directories', 'simply-static-pro' ) );

		return true;
	}

}
