<?php

namespace simply_static_pro;

use Simply_Static;
use Simply_Static\Options;

/**
 * Class which handles GitHub commits.
 */
class Tiiny_Deploy_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'tiiny_deploy';

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options       = Options::instance();
		$this->options = $options;
	}

	/**
	 * Perform action to run on commit task.
	 *
	 * @return bool
	 */
	public function perform() {
		$this->save_status_message( __( 'Creating the ZIP file and sending it to Tiiny.host.', 'simply-static-pro' ) );
		$zip_file = Tiiny_Updater::create_zip( $this->options );

		if ( file_exists( $zip_file ) ) {
			$uploaded = Tiiny_Updater::upload_zip( $zip_file, $this->options );

			if ( $uploaded ) {
				$this->save_status_message( __( 'Finshed the deployment to Tiiny.host', 'simply-static-pro' ) );

				return true;
			} else {
				$this->save_status_message( __( 'There was an error submitting the ZIP file to Tiiny.host - please review your connection details.', 'simply-static-pro' ) );

				return true;
			}
		}
	}
}
