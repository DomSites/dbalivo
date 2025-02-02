<?php

namespace simply_static_pro;

use Simply_Static\Plugin;
use simply_static_pro\integrations\Github\Repository_API;


/**
 * Class to handle GitHub repositories.
 */
class Github_Repository {

	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Contains new GitHub client.
	 *
	 * @var object|Repository_API
	 */
	public $client;

	/**
	 * Contains the user who commits.
	 *
	 * @var array
	 */
	public $committer;

	/**
	 * Contains the username.
	 *
	 * @var string
	 */
	public $user;

	/**
	 * Is an organization account?
	 *
	 * @var string
	 */
	public $is_organization;

	/**
	 * Contains the repository name.
	 *
	 * @var string
	 */
	public $repository;

	/**
	 * Contains the branch name.
	 *
	 * @var string
	 */
	public $branch;

	/**
	 * Contains the visibility of the repository.
	 *
	 * @var string
	 */
	public $visibility;

	/**
	 * Returns instance of Github_Repository.
	 *
	 * @return object
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor for repository class.
	 */
	public function __construct() {
		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_GITHUB' ) ) {
			$options = SSP_GITHUB;
		}

		if ( ! empty( $options['github_personal_access_token'] ) ) {

			// Setup data.
			$this->client     = Plugin::instance()->get_integration( 'github' )->api( 'repo' );
			$this->user       = $options['github_user'];
			$this->repository = $options['github_repository'];
			$this->branch     = $options['github_branch'] ?? 'main';
			$this->visibility = $options['github_repository_visibility'] ?? 'public';

			$this->committer = array(
				'name'  => $options['github_user'],
				'email' => $options['github_email']
			);

			// Maybe use organization.
			if ( ! empty( $options['github_account_type'] ) && 'organization' === $options['github_account_type'] ) {
				$this->is_organization = 'yes';
			} else {
				$this->is_organization = 'no';
			}
		}
	}

	/**
	 * Add repository via API.
	 *
	 * @return array
	 */
	public function add_repository(): array {
		try {
			if ( 'yes' === $this->is_organization ) {
				$this->client->create_organization( $this->user, $this->repository, __( 'This repository was created with Simply Static Pro', 'simply-static-pro' ), true );
			} else {
				$this->client->create( $this->repository, __( 'This repository was created with Simply Static Pro', 'simply-static-pro' ), true );
			}

			// Add the sample file.
			$this->add_file( 'simply-static.txt', 'This file was created by Simply Static Pro.', __( 'Added the sample file.', 'simply-static-pro' ) );

			$response = array( 'message' => __( 'Repository was successfully created.', 'simply-static-pro' ) );

			// Change repository status.
			$this->change_visibility();

		} catch ( \Exception $e ) {
			$response = array(
				'message' => $e->getMessage(),
				'error'   => true
			);
		}

		return $response;
	}

	/**
	 * Delete the repository via API.
	 */
	public function delete_repository(): array {
		// Try to delete repository.
		try {
			$this->client->delete( $this->user, $this->repository );
			$response = array(
				'message' => __( 'Repository was successfully deleted.', 'simply-static-pro' )
			);
		} catch ( \Exception $e ) {
			$response = array(
				'message' => $e->getMessage(),
				'error'   => true
			);
		}

		// We should reset the options before going further.
		$options                      = get_option( 'simply-static' );
		$options['github_repository'] = '';

		update_option( 'simply-static', $options );

		return $response;
	}

	/**
	 * Change visibility of a repository.
	 *
	 * @return string
	 */
	public function change_visibility() {
		try {
			return $this->client->update( $this->user, $this->repository, [ 'private' => 'private' === $this->visibility ] );
		} catch ( \Exception $e ) {
			return $e->getMessage();
		}
	}

	/**
	 * Adding a file to the repository.
	 *
	 * @param string $file_name given file name.
	 * @param string $content content of the file.
	 * @param string $commit_message given commit message.
	 *
	 * @return bool|string
	 */
	public function add_file( string $file_name, string $content, string $commit_message ) {

		if ( ! empty( $this->user ) && ! empty( $this->repository ) ) {
			try {
				return $this->client->add_file( $this->user, $this->repository, $file_name, $content, $commit_message, $this->branch, $this->committer );
			} catch ( \Exception $e ) {
				return $e->getMessage();
			}
		}
	}

	/**
	 * Delete a file to the repository.
	 *
	 * @param string $path given file name.
	 * @param string $commit_message given commit message.
	 *
	 * @return bool|string
	 */
	public function delete_file( string $path, string $commit_message ) {
		try {
			$old_file = $this->client->get_file( $this->user, $this->repository, $path, $this->branch );
			$this->client->delete_file( $this->user, $this->repository, $path, $old_file['sha'], $commit_message, $this->branch, $this->committer );

			return true;
		} catch ( \Exception $e ) {
			return $e->getMessage();
		}
	}
}
