<?php

namespace simply_static_pro;

use Exception;
use Simply_Static;
use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Util;

/**
 * Class which handles AWS Deployment.
 */
class AWS_Empty_Task extends Simply_Static\Task {
	/**
	 * The task name.
	 *
	 * @var string
	 */
	protected static $task_name = 'aws_empty';

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		$options       = Options::instance();
		$this->options = $options;
	}

	/**
	 * Push a batch of files from the temp dir to GitHub.
	 *
	 * @return boolean true if done, false if not done.
	 * @throws Exception When the GitHub API returns an error.
	 */
	public function perform(): bool {
		$bucket     = $this->options->get( 'aws_bucket' );
		$api_secret = $this->options->get( 'aws_access_secret' );
		$api_key    = $this->options->get( 'aws_access_key' );
		$region     = $this->options->get( 'aws_region' );

		$client = new S3_Client();
		$client
			->set_bucket( $bucket )
			->set_api_secret( $api_secret )
			->set_api_key( $api_key )
			->set_region( $region );

		$message = __( 'Emptying S3 Bucket...', 'simply-static' );
		$this->save_status_message( $message );

		$files = $client->get_files( [], '', false );

		foreach ( $files as $file ) {
			$client->delete_file( $file );
		}

		$no_more_files = count( $files ) === 0;

		if ( $no_more_files ) {
			do_action( 'ssp_finished_aws_empty' );
		}

		return $no_more_files;
	}

}
