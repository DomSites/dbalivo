<?php

namespace simply_static_pro;

use Simply_Static\Plugin;
use Simply_Static\Util;
use simply_static_pro\integrations\Github\Database_API;
use simply_static_pro\integrations\Github\Rate_Limit_API;

/**
 * Class to handle GitHub repositories.
 */
class Github_Database {
	/**
	 * Contains instance or null
	 *
	 * @var object|null
	 */
	private static $instance = null;

	/**
	 * Contains new GitHub client.
	 *
	 * @var objecť|Database_API
	 */
	private $client;

	/**
	 * Contains the username.
	 *
	 * @var string
	 */
	private $user;

	/**
	 * Contains the name of the repository.
	 *
	 * @var string
	 */
	private $repository;

	/**
	 * Contains the name of the branch.
	 *
	 * @var string
	 */
	private $branch;

	/**
	 * Returns instance of Github_Database.
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
	 * Constructor for file class.
	 */
	public function __construct() {
		$options = get_option( 'simply-static' );

		// Maybe use constant instead of options.
		if ( defined( 'SSP_GITHUB' ) ) {
			$options = SSP_GITHUB;
		}

		$this->client     = Plugin::instance()->get_integration( 'github' )->api( 'data' );
		$this->user       = $options['github_user'];
		$this->repository = $options['github_repository'];
		$this->branch     = $options['github_branch'];

		if ( empty( $this->branch ) ) {
			$this->branch = 'main';
		}

		add_filter( 'ssp_github_commit_message', array( $this, 'maybe_modify_commit_message' ) );
	}

	/**
	 * Create blob from file input.
	 *
	 * @param string $file_path given file path.
	 * @param string $relative_path given relative file path.
	 * @param string $content given file content.
	 *
	 * @return array|false
	 *
	 *
	 */
	public function create_blob( string $file_path, string $relative_path, string $content ) {
		// Set up the content.
		$args = array(
			'content'  => base64_encode( $content ),
			'encoding' => 'base64'
		);

		// if it's a UTF-8 compatible mime type, change the args.
		$file_info       = pathinfo( $file_path );
		$utf8_mime_types = apply_filters(
			'ssp_utf8_mime_types',
			array(
				'shtml',
				'xhtml',
				'html',
				'xml',
				'json',
				'csv',
				'css',
				'scss',
				'js',
				'txt',
				'cur'
			)
		);

		if ( in_array( $file_info['extension'], $utf8_mime_types, true ) ) {
			$args = array(
				'content'  => $content,
				'encoding' => 'utf-8'
			);
		}

		Util::debug_log( 'Trying to convert the following file to a blob: ' . $file_path );
		Util::debug_log( 'We will encode that as ' . $args['encoding'] . " because it's a " . $file_info['extension'] );

		try {
			$response = $this->client->create_blob( $this->user, $this->repository, $args['content'], $args['encoding'] );

			if ( isset( $response['url'] ) ) {
				Util::debug_log( 'Created the blob here: ' . $response['url'] );
			} else {
				Util::debug_log( 'We could not convert the file to a blob.' );
			}

			// Add required data to blob.
			return array(
				'path' => $relative_path,
				'mode' => '100644',
				'type' => 'blob',
				'sha'  => $response['sha']
			);
		} catch ( \Exception $e ) {
			Util::debug_log( $e->getMessage() );

			return false;
		}
	}

	/**
	 * Prepare the Blob to contain content from file path.
	 *
	 * @param array $blob Blob chunk
	 *
	 * @return mixed
	 */
	public function prepare_blob_with_content( $blob ) {
		if ( ! isset( $blob['file_path'] ) ) {
			return $blob;
		}

		$filesystem = Helper::get_file_system();
		$file_path  = $blob['file_path'];

		unset( $blob['file_path'] );

		if ( is_dir( $file_path ) || ! file_exists( $file_path ) ) {
			return null;
		}

		$content         = $filesystem->get_contents( $file_path );
		$blob['content'] = $content;

		return $blob;
	}

	/**
	 * Create new tree with blobs.
	 *
	 * @param array $blobs an array of blobs.
	 *
	 * @return array|false
	 */
	public function create_tree( array $blobs ) {
		$base_tree_sha = '';

		try {
			// Get the base tree.
			$base_tree     = $this->client->get_tree( $this->user, $this->repository, $this->branch );
			$base_tree_sha = $base_tree['sha'];
		} catch ( \Exception $e ) {
			throw new $e;
			// 404 means it's not found, so maybe we're on the first tree.
			if ( absint( $e->getCode() ) !== 404 ) {
				throw new $e;
			}
		}

		// Divide blobs in chunks due to GitHub tree array limits (see: https://docs.github.com/en/rest/git/trees).
		$chunk_size   = apply_filters( 'ssp_github_tree_chunk_size', 250 );
		$blobs_chunks = array_chunk( $blobs, $chunk_size );
		$base         = $base_tree_sha;

		foreach ( $blobs_chunks as $blob_chunk ) {

			try {
				$blob_chunk = $this->prepare_blob_with_content( $blob_chunk );

				if ( ! $blob_chunk ) {
					continue;
				}

				$tree = $this->client->create_tree( $this->user, $this->repository, $base, $blob_chunk );
			} catch ( \Exception $e ) {
				Util::debug_log( $e->getMessage() );

				return false;
			}

			$base = $tree['sha'];
		}

		return array(
			'tree-sha'      => $base,
			'base-tree-sha' => $base_tree_sha
		);
	}

	/**
	 * Commit changes to GitHub.
	 *
	 * @param string $message given commit message.
	 * @param array $tree_data given tree SHAs.
	 *
	 * @return false|void
	 */
	public function commit( string $message, array $tree_data ) {
		$commit_data = apply_filters( 'ssp_commit_data', array(
			'message' => $message,
			'tree'    => $tree_data['tree-sha'],
			'parents' => array( $tree_data['base-tree-sha'] )
		) );

		try {
			$commit = $this->client->commit( $this->user, $this->repository, $commit_data );
		} catch ( \Exception $e ) {
			Util::debug_log( $e->getMessage() );

			return false;
		}

		// Now update the reference.
		$ref_data = array(
			'sha'   => $commit['sha'],
			'force' => true
		);

		try {
			$this->client->update_reference( $this->user, $this->repository, 'heads/' . $this->branch, $ref_data );
		} catch ( \Exception $e ) {
			Util::debug_log( $e->getMessage() );

			return false;
		}
	}

	/**
	 * Get the rate limit.
	 *
	 * @return array
	 */
	public function get_rate_limits(): array {
		/** @var Rate_Limit_API $api */
		$api = Plugin::instance()->get_integration( 'github' )->api( 'limit' );

		return array(
			'core'      => intval( $api->get_core_data( 'limit' ) ),
			'remaining' => intval( $api->get_core_data( 'remaining' ) ),
			'reset'     => intval( $api->get_core_data( 'reset' ) ),
		);
	}

	/**
	 * Modify commit message to prevent auto deploys.
	 *
	 * @param string $message given commit message.
	 *
	 * @return string
	 */
	public function maybe_modify_commit_message( $message ) {
		$options = get_option( 'simply-static' );

		if ( ! empty( $options['github_webhook_url'] ) && false !== strpos( $options['github_webhook_url'], 'netlify' ) ) {
			return '[skip netlify]' . $message;
		}

		return $message;
	}
}
