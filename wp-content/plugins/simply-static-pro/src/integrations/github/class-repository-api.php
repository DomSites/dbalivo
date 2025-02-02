<?php

namespace simply_static_pro\integrations\Github;

class Repository_API extends API {

	public function update( $owner, $repository, $data ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository );

		return $this->patch( $resource, $data );
	}

	public function delete_repository( $owner, $repository ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository );

		return $this->delete( $resource );
	}

	public function create( $name, $message = '', $private = false ) {
		return $this->post( 'user/repos', [
			'name'        => $name,
			'private'     => $private,
			'description' => $message,
		] );
	}

	public function create_organization( $organization, $name, $message = '', $private = false ) {
		return $this->post( 'orgs/' . rawurlencode( $organization ) . '/repos', [
			'name'        => $name,
			'private'     => $private,
			'description' => $message,
		] );
	}

	public function add_file( $owner, $repository, $file_name, $content, $commit_message, $branch = '', $committer = [] ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/contents/' . rawurlencode( $file_name );

		$data = [
			'message' => $commit_message,
			'content' => base64_encode( $content ),
		];

		if ( $branch ) {
			$data['branch'] = $branch;
		}

		if ( $committer ) {
			$data['committer'] = $committer;
		}

		return $this->put( $resource, $data );
	}

	public function get_file( $owner, $repository, $file_name, $branch = '' ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/contents/' . rawurlencode( $file_name );

		if ( $branch ) {
			$resource .= '?ref=' . rawurlencode( $branch );
		}

		return $this->get( $resource );
	}

	public function delete_file( $owner, $repository, $file_name, $sha, $commit, $branch = '', $committer = [] ) {
		$resource = 'repos/' . rawurlencode( $owner ) . '/' . rawurlencode( $repository ) . '/contents/' . rawurlencode( $file_name );

		$data = [
			'sha'     => $sha,
			'message' => $commit
		];

		if ( $branch ) {
			$data['branch'] = $branch;
		}

		if ( $committer ) {
			$data['committer'] = $committer;
		}

		$this->delete( $resource, $data );
	}
}