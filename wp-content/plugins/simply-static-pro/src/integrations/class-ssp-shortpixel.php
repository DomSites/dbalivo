<?php

namespace simply_static_pro;

use Simply_Static\Integration;
use Simply_Static\Options;
use Simply_Static\Page;
use Simply_Static\Util;


class Shortpixel extends Integration {

	/**
	 *
	 * @var string
	 */
	protected $api_key = null;

	protected $api_url = "https://api.shortpixel.com/v2/post-reducer.php";

	/**
	 * @var Options|null
	 */
	protected $options = null;

	protected $id = 'shortpixel';

	protected $always_active = true;

	public function __construct() {
		$this->name = __( 'Shortpixel', 'simply-static' );
		$this->description = __( 'Optimizes Images before exporting them for static sites.', 'simply-static' );
	}

	public function get_api_key() {
		if ( null === $this->api_key ) {
			$this->api_key = $this->get_options()->get('shortpixel_api_key');
		}

		return $this->api_key;
	}

	public function get_options() {
		if ( null === $this->options ) {
			$this->options = Options::instance();
		}

		return $this->options;
	}

	/**
	 * Get queued information from an attachment.
	 *
	 * @param integer $att_id Image ID.
	 *
	 * @return false|mixed
	 */
	public static function get_queued( $att_id ) {
		$meta = get_post_meta( $att_id, '_queued_shortpixel', true );

		if ( ! $meta ) {
			return false;
		}

		return $meta;
	}

	public function download_files( $file_urls ) {

		$file_array = [];
		$file_infos = [];

		foreach ( $file_urls as $url ) {
			$att_id = self::get_attachment_id_from_image( $url );
			$size   = self::get_image_size( $url );
			$original_url = self::get_queued_url( $url );

			if ( ! $original_url ) {
				continue;
			}

			$file_array[ $att_id . '-' . $size ] = $original_url;

			$file_infos[] = [
				'original_url' => $original_url,
				'key'          => $att_id . '-' . $size,
				'img_url'      => $url,
			];
		}

		$response = $this->get_files( $file_array );

		foreach ( $response as $processed_file ) {

			$status       = $processed_file['Status'];
			$original_url = $processed_file['OriginalURL'];
			$file_info    = null;

			foreach ( $file_infos as $info ) {
				if ( $original_url !== $info['original_url'] ) {
					continue;
				}

				$file_info = $info;
				break;
			}

			if ( ! $file_info ) {
				continue;
			}

			if ( $status['Code'] < 0 ) {
				$this->remove_from_queue( $file_info );
				continue;
			}

			// Still being processed.
			if ( intval( $status['Code'] ) !== 2 ) {
				continue;
			}

			$file_info = wp_parse_args( $processed_file, $file_info );

			$this->save_file( $file_info );
		}
	}

	/**
	 * Get the queued URL (the original URL from Shortpixel).
	 *
	 * @param string $file_url File url.
	 *
	 * @return false|mixed
	 */
	public static function get_queued_url( $file_url ) {

		$att_id = self::get_attachment_id_from_image( $file_url );

		// Not found in WP.
		if ( ! $att_id ) {
			return false;
		}

		$meta = self::get_queued( $att_id );

		if ( ! $meta ) {
			return false;
		}

		$size = self::get_image_size( $file_url );

		if ( empty( $meta[ $att_id . '-' . $size ] ) ) {
			return false;
		}

		return $meta[ $att_id . '-' . $size ]['original_url'];
	}


	/**
	 * Return if it's already queued.
	 *
	 * @param string $file_url File url.
	 *
	 * @return bool
	 */
	public function is_queued( $file_url ) {
		$url = self::get_queued_url( $file_url );

		return $url ? true : false;
	}

	/**
	 * Get all optimized data from an attachment by url
	 *
	 * @param string $file File url or Attachment ID.
	 *
	 * @return array|null|boolean
	 */
	public function get_optimized( $file, $id = false ) {

		if ( ! $id ) {
			$att_id = self::get_attachment_id_from_image( $file );

			// Not found in WP.
			if ( ! $att_id ) {
				return false;
			}
		} else {
			$att_id = $file;
		}

		return get_post_meta( $att_id, '_optimized_shortpixel', true );
	}

	/**
	 * Check if the URL has been optimized already.
	 *
	 * @param string $file_url File url.
	 *
	 * @return bool
	 */
	public function is_optimized( $file_url ) {
		$att_id = self::get_attachment_id_from_image( $file_url );

		// Not found in WP.
		if ( ! $att_id ) {
			return true;
		}

		$meta = $this->get_optimized( $att_id, true );

		if ( ! $meta ) {
			return false;
		}

		$key = $att_id . '-' . self::get_image_size( $file_url );

		return in_array( $key, $meta, true );
	}

	/**
	 * Send the request.
	 *
	 * @param $options
	 * @param $files
	 *
	 * @return bool|string
	 */
	public function send_request( $options, $files = [] ) {
		$curl = curl_version();
		$userAgent = "ShortPixel/1.0 " . " curl/" . $curl["version"];
		$request = curl_init();
		curl_setopt($request, CURLOPT_URL, $this->api_url);
		curl_setopt_array($request, array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_BINARYTRANSFER => true,
			CURLOPT_HEADER => true,
			CURLOPT_TIMEOUT => 60,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_USERAGENT => $userAgent,
		));

		$options = wp_parse_args( $options, array(
			"key" => $this->get_api_key(),
			"lossy" => 1,
			"refresh" => 0,
		) );

		$this->custom_post_fields($request, $options, $files);
		$response = curl_exec( $request );
		curl_close($request);

		return $response;
	}

	/**
	 * Get information on files from Shortpixel.
	 *
	 * @param array $files Array of original URLs (received from Shortpixel)
	 *
	 * @return mixed
	 */
	public function get_files( $files ) {
		$options = [
			'file_urls' => json_encode( $files )
		];

		return json_decode( $this->send_request( $options, $files ), true );
	}

	/**
	 * Optimize Files by sending it to Shortpixel.
	 *
	 * @param array $files Array of file urls.
	 *
	 * @return mixed
	 */
	public function optimize_files( $files = [] ) {
		$options = array(
			"file_paths" => json_encode( $files )
		);

		return json_decode( $this->send_request( $options, $files ), true );
	}

	/**
	 * Send files to Shortpixel and queue them.
	 *
	 * @param array $files File URLs.
	 *
	 * @return void
	 */
	public function queue_files( $files ) {
		$file_array = [];
		$urls       = [];

		foreach ( $files as $file ) {
			$att_id = self::get_attachment_id_from_image( $file['url'] );
			$size   = self::get_image_size( $file['url'] );
			$file_array[ $att_id . '-' . $size ] = $file['path'];
			$urls[ $att_id . '-' . $size ] = $file['url'];
		}

		$response = $this->optimize_files( $file_array );

		Util::debug_log("===== SHORTPIXEL OPTIMISATION START =====");
		Util::debug_log("Files: " . print_r( $file_array, true ) );
		Util::debug_log("Response: " . print_r( $response, true ) );
		Util::debug_log("===== SHORTPIXEL OPTIMISATION END =====");

		foreach ( $response as $processed_file ) {
			$status       = $processed_file['Status'];
			$original_url = $processed_file['OriginalURL'];
			$img_path     = $file_array[ $processed_file['Key'] ];
			$img_url      = $urls[ $processed_file['Key'] ];

			if ( intval( $status['Code'] ) < 1 ) {
				$code    = absint( $status['Code'] );
				$message = $status['Message'];
				// 100-400, image related error.
				if ( $code < 400 ) {

					foreach( $files as $file ) {
						if ( $img_url === $file['url'] ) {
							/** @var Page $page */
							$page = $file['page'];
							$page->set_error_message( $message );
							$page->save();
							break;
						}
					}

					continue;
				} else {
					// Above 400 - API Quota/System related error - halt all.
					throw new \Exception( $message );
				}
			}

			$file_info = [
				'original_url' => $original_url,
				'key'          => $processed_file['Key'],
				'img_url'      => $img_url,
				'img_path'     => $img_path
			];

			$this->save_to_queue( $file_info );
		}

	}

	/**
	 * Add a message to the array of status messages for the job
	 *
	 * Providing a unique key for the message is optional. If one isn't
	 * provided, the state_name will be used. Using the same key more than once
	 * will overwrite previous messages.
	 *
	 * @param  string $message Message to display about the status of the job.
	 * @param  string $key     Unique key for the message.
	 * @return void
	 */
	protected function save_status_message( $message, $key = null ) {
		$task_name = $key ?: 'shortpixel';
		$messages = $this->options->get( 'archive_status_messages' );
		Util::debug_log( 'Status message: [' . $task_name . '] ' . $message );

		$messages = Util::add_archive_status_message( $messages, $task_name, $message );

		$this->options
			->set( 'archive_status_messages', $messages )
			->save();

		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			\WP_CLI::line( $message );
		}
	}

	/**
	 * Save file info that's given from Shortpixel
	 *
	 * @param array $file_info
	 *
	 * @return bool
	 */
	public function remove_from_optimized( $id, $size ) {
		$optimized = self::get_optimized( $id, true );

		if ( ! $optimized ) {
			return true;
		}

		$key = $id . '-' . $size;

		if ( ! in_array( $key, $optimized, true ) ) {
			return true;
		}

		$index = array_search( $key, $optimized, true );

		if ( $index >= 0 ) {
			unset( $optimized[ $index ] );
			$optimized = array_values( $optimized );
			update_post_meta( $id, '_optimized_shortpixel', $optimized );
			return true;
		}

		return false;
	}

	/**
	 * Save file info that's given from Shortpixel
	 *
	 * @param array $file_info
	 *
	 * @return void
	 */
	public function save_to_optimized( $file_info ) {
		$att_id    = self::get_attachment_id_from_image( $file_info['img_url'] );
		$optimized = self::get_optimized( $att_id, true );

		if ( ! $optimized ) {
			$optimized = [];
		}

		$optimized[] = $file_info['key'];

		update_post_meta( $att_id, '_optimized_shortpixel', $optimized );
	}

	/**
	 * Save file info that's sent to Shortpixel.
	 *
	 * @param array $file_info
	 *
	 * @return void
	 */
	public function save_to_queue( $file_info ) {
		$att_id = self::get_attachment_id_from_image( $file_info['img_url'] );
		$queued = self::get_queued( $att_id );

		if ( ! $queued ) {
			$queued = [];
		}

		$queued[ $file_info['key'] ] = $file_info;

		update_post_meta( $att_id, '_queued_shortpixel', $queued );
	}


	/**
	 * Remove a file from Queued.
	 *
	 * @param $file_info
	 *
	 * @return true
	 */
	public function remove_from_queue( $file_info ) {
		$att_id = self::get_attachment_id_from_image( $file_info['img_url'] );
		$queued = self::get_queued( $att_id );

		if ( ! $queued ) {
			return true;
		}

		if ( empty( $queued[ $file_info['key'] ] ) ) {
			return true;
		}

		unset( $queued[ $file_info['key'] ] );

		if ( empty( $queued ) ) {
			delete_post_meta( $att_id, '_queued_shortpixel' );
			return true;
		}

		update_post_meta( $att_id, '_queued_shortpixel', $queued );
		return true;
	}

	/**
	 * Add POST fields to the CURL request.
	 *
	 * @param $ch
	 * @param $assoc
	 * @param $files
	 * @param $header
	 *
	 * @return bool
	 */
	public function custom_post_fields( $ch, $assoc  = [],  $files = [], $header = [] ) {
		$output_body = [];
		$body = [];
		// invalid characters for "name" and "filename"
		static $disallow = array(
			"\0",
			"\"",
			"\r",
			"\n"
		);
		// build normal parameters
		foreach ($assoc as $k => $v) {
			$k = str_replace($disallow, "_", $k);
			$body[] = implode("\r\n", array(
				"Content-Disposition: form-data; name=\"{$k}\"",
				"",
				filter_var($v) ,
			));
			$output_body[] = end( $body );
		}
		// build file parameters
		foreach ($files as $k => $v) {
			switch (true) {
				case false === $v = realpath(filter_var($v)):
				case !is_file($v):
				case !is_readable($v):
					continue 2; // or return false, throw new InvalidArgumentException

			}
			$data = file_get_contents($v);
			$val = explode(DIRECTORY_SEPARATOR, $v);
			$v = end( $val);
			$k = str_replace($disallow, "_", $k);
			$v = str_replace($disallow, "_", $v);
			$body[] = implode("\r\n", array(
				"Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$v}\"",
				"Content-Type: application/octet-stream",
				"",
				$data,
			));
			$output_body[] = implode("\r\n", array(
				"Content-Disposition: form-data; name=\"{$k}\"; filename=\"{$v}\"",
				"Content-Type: application/octet-stream",
				"",
				'---- IMAGE DATA WOULD BE HERE',
			));
		}
		$count = 1;
		// generate safe boundary
		do {
		//$boundary = "---------------------" . md5(mt_rand() . microtime());
			$boundary = "---------------------" . md5( current($files) ); $count++;
		} while (preg_grep("/{$boundary}/", $body));

		// add boundary for each parameters
		array_walk($body, function (&$part) use ($boundary) {
			$part = "--{$boundary}\r\n{$part}";
		});array_walk($output_body, function (&$part) use ($boundary) {
			$part = "--{$boundary}\r\n{$part}";
		});
		// add final boundary
		$body[] = "--{$boundary}--";
		$body[] = "";

		$output_body[] = "--{$boundary}--";
		$output_body[] = "";

		// set options
		return @curl_setopt_array($ch, array(
			CURLOPT_POST => true,
			CURLOPT_HEADER => false,
			CURLOPT_BINARYTRANSFER => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => implode("\r\n", $body) ,
			CURLOPT_HTTPHEADER => array_merge(array(
				"Expect: 100-continue",
				"Content-Type: multipart/form-data; boundary={$boundary}", // change Content-Type

			) , $header) ,
		));
	}

	/**
	 * Save the file from Shortpixel into the site.
	 *
	 * @param $file_path
	 *
	 * @return void
	 */
	public function save_file( $file_info ) {

		$lossy_url = $file_info['LossyURL'];

		$file = download_url( $lossy_url );

		if ( $file ) {
			$dir     = $this->get_options()->get_archive_dir();
			$img_url = $file_info['img_url'];
			$page    = Page::query()->find_by( 'url', $img_url );

			if ( ! $page ) {
				// Page doesn't exist anymore. Remove it from queued.
				$this->remove_from_queue( $file_info );
				return;
			}

			$id   = explode( '-', $file_info['key'] )[0];
			$path = wp_get_original_image_path( $id );

			// Making sure we're saving the correct image (Original path contains full image path)
			// We're maybe saving an image size.
			$path = str_replace( basename( $path ), basename( $img_url ), $path );

			// We need to backup first or we lose the file on copy.
			$this->maybe_backup( $path, $id );

			$copy = @copy( $file, $path ); // Core uploads file.

			if ( $copy ) {

				if ( $page ) {
					// Static exported file.
					@copy( $file, $dir . $page->file_path );
				}

				$this->remove_from_queue( $file_info );
				$this->save_to_optimized( $file_info );
			}

			@unlink($file);
		}
	}

	public function find_backup_files( $folder ) {
		$file_names = [];

		$possible_file_names = array_diff( scandir( $folder ), [ '.', '..' ] );

		// Find nested files in the unzipped path. This happens for example when the user imports a Website Kit.
		foreach ( $possible_file_names as $possible_file_name ) {
			$full_possible_file_name = $folder . $possible_file_name;
			if ( is_dir( $full_possible_file_name ) ) {
				$file_names = array_merge( $file_names, $this->find_backup_files( $full_possible_file_name . '/' ) );
			} else {
				$file_names[] = $full_possible_file_name;
			}
		}

		return $file_names;
	}

	protected function get_allowed_extensons() {
		return [
			'jpeg',
			'jpg',
			'avif',
			'png',
			'gif',
			'webp'
		];
	}

	public function is_file_allowed( $file ) {
		$file_info = pathinfo( $file );


		if ( ! in_array( $file_info['extension'], $this->get_allowed_extensons() ) ) {
			return false;
		}

		return true;
	}

	public function allow_only_images_delete_othwerwise( $file ) {
		$allowed = $this->is_file_allowed( $file );

		if ( ! $allowed ) {
			@unlink( $file );
		}

		return $allowed;
	}

	public function restore_all_backups() {
		$backup_folder     = $this->get_backup_folder();
		$files             = $this->find_backup_files( $backup_folder );
		$files             = array_filter( $files, [ $this, 'allow_only_images_delete_othwerwise'] );
		$uploads_dir       = wp_upload_dir();
		$base_dir          = $uploads_dir['basedir'];

		if ( ! $files ) {
			return true;
		}

		foreach ( $files as $file ) {
			$file_path = str_replace( $backup_folder, trailingslashit( $base_dir ), $file );
			$file_url  = str_replace( $backup_folder, trailingslashit( $uploads_dir['baseurl'] ), $file );

			if ( @copy( $file, $file_path ) ) {
				$file_id = self::get_attachment_id_from_image( $file_url );
				$file_size = self::get_image_size( $file_url );
				if ( ! $file_id ) {
					continue;
				}

				$this->remove_from_optimized( $file_id, $file_size );
				@unlink( $file );
			}
		}

		return true;
	}

	public function restore_backup( $file_path ) {
		// Create backup file info.
		$uploads_dir = wp_upload_dir();
		$base_dir    = $uploads_dir['basedir'];
		$backup_dir  = $this->get_backup_folder();
		// shortpixel_backup_folder contains the full path to the file after the '/uploads'
		$backup_path = $backup_dir . str_replace( $base_dir . DIRECTORY_SEPARATOR, '', $file_path );

		if ( ! file_exists( $backup_path ) ) {
			return true;
		}

		$file_url = str_replace( $base_dir, $uploads_dir['baseurl'], $file_path );
		$id       = self::get_attachment_id_from_image( $file_url );
		$size     = self::get_image_size( $file_url );

		self::remove_from_optimized( $id, $size );
		@copy( $backup_path, $file_path);
		@unlink( $backup_path );
	}

	/**
	 * Backup file.
	 *
	 * @param $path
	 * @param $id
	 *
	 * @return bool
	 */
	public function maybe_backup( $path, $id ) {
		if ( ! file_exists( $path ) ) {
			return false;
		}

		// Check if option is enabled
		$backup = $this->get_options()->get( 'shortpixel_backup_enabled' );

		if ( ! $backup ) {
			return false;
		}

		// Save the file to the path (remove everything until uploads)
		$uploads_dir = wp_upload_dir();
		$base_dir    = $uploads_dir['basedir'];
		$backup_dir  = $this->get_backup_folder();
		// shortpixel_backup_folder contains the full path to the file after the '/uploads'
		$backup_path = $backup_dir . str_replace( $base_dir . DIRECTORY_SEPARATOR, '', $path );

		$backup_path_folders = str_replace( basename( $backup_path ), '', $backup_path );
		if ( ! is_dir( $backup_path_folders ) ) {
			wp_mkdir_p( $backup_path_folders );
		}

		$copy = @copy( $path, $backup_path );

		if ( ! $copy ) {
			$errors= error_get_last();
			Util::debug_log( "SHORTPIXEL BACKUP ERROR: " . $errors['message'] . ". TYPE: " . $errors['type'] );
		}
		return $copy;
	}

	public function get_backup_folder() {
		$uploads_dir       = wp_upload_dir();
		$simply_static_dir = $uploads_dir['basedir'] . DIRECTORY_SEPARATOR . 'simply-static' . DIRECTORY_SEPARATOR . 'shortpixel' . DIRECTORY_SEPARATOR;

		if ( ! is_dir( $simply_static_dir ) ) {
			wp_mkdir_p( $simply_static_dir );
		}

		return $simply_static_dir;
	}

	/**
	 * Get image size from the URL.
	 *
	 * @param string $path URL path.
	 *
	 * @return array|string|string[]
	 */
	public static function get_image_size( $path ) {

		$size = 'full';

		if ( preg_match('/^(.*)(\-\d*x\d*)(\.\w{1,})/i', $path, $matches ) ) {
			$size = str_replace( '-', '', $matches[2] ); // Removing the initial '-'.
		}

		return $size;

	}

	/**
	 * Get the Attachment ID from the image URL.
	 *
	 * @param string $url Image URL.
	 *
	 * @return int
	 */
	public static function get_attachment_id_from_image( $url ) {
		$post_id = attachment_url_to_postid($url);

		if ( $post_id ) {
			return $post_id;
		}

	    $dir  = wp_upload_dir();
		$path = $url;
		if ( 0 === strpos($path, $dir['baseurl'] . '/') ) {
			$path = substr($path, strlen($dir['baseurl'] . '/'));
		}

		if ( preg_match('/^(.*)(\-\d*x\d*)(\.\w{1,})/i', $path, $matches ) ) {
			$url     = $dir['baseurl'] . '/' . $matches[1] . $matches[3];
			$post_id = attachment_url_to_postid($url);
		}

		return $post_id;
	}
}