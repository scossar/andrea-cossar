<?php
/*
 * Create_Positioned_Post
 * A 'positioned_post' is a post of one of the positioned types with metadata
 * values for 't11_post_position' and 't11_preview_template'.
 * The class constructor calls the protected method 'create($post_type, $position)'
 * to create the new positioned post.
 */


class Positioned_Post_Creator{
	protected $position;
	protected $post_type;

	public function __construct($post_type, $position) {
		$this->post_type = $post_type;
		$this->position = $position;

		// Create the post
		add_action('init', array($this, 'create'));
	}

	/**
	 * @internal param $post_type
	 * @internal param Position $position
	 */
	public function create() {
		$position = $this->position;
		$post_type =$this->post_type;
		// Give the post a temporary title based on its position.
		$post_position = $position->get_position();
		$preview_template = $position->get_preview_template();
		$preview_sidebar = $position->get_preview_sidebar();
		$tmp_title = ucwords(str_replace('-', ' ', $position->get_position()));
		$tmp_content = 'Dapibus aliquam magna. Ornare phasellus lobortis, metus sodales ut, sem eget sit. Commodo eu pharetra, pellentesque ut, id ut. Nam sit, ac accumsan, a quos. Aenean est dui, in lectus ultricies. Quam elit, hendrerit aliquam vivamus, quisque suscipit.';
//		$tmp_image = plugin_dir_url(__FILE__) . 'images/image.jpg';

		// Check of the post already exists
		if ($this->post_in_position($post_type, $post_position)) {
			return;
		}

		// Check what features the given post_type supports and create an appropriate post
		// for it at the given position.

		// 'positioned_full' and 'positioned_content' post types
		if (post_type_supports($post_type, 'editor')) {
				$args = array(
					'post_title' => $tmp_title,
					'post_content' => $tmp_content,
					'post_type' => $post_type,
					'post_status' => 'publish',
				);
			$post_id = wp_insert_post($args);
			// add the 't11_post_position' and 't11_preview_position' metadata to the post
			update_post_meta($post_id, 't11_position', $post_position);
			update_post_meta($post_id, 't11_preview', $preview_template);
			update_post_meta($post_id, 't11_preview_sidebar', $preview_sidebar);
		} elseif (post_type_supports($post_type, 'title')) {
			$args = array(
				'post_title' => $tmp_title,
				'post_type' => $post_type,
				'post_status' => 'publish',
			);
			$post_id = wp_insert_post($args);
			update_post_meta($post_id, 't11_position', $post_position);
			update_post_meta($post_id, 't11_preview', $preview_template);
			update_post_meta($post_id, 't11_preview_sidebar', $preview_sidebar);
		} elseif ($post_type == 'positioned_image') {
			$args = array(
				'post_title' => $tmp_title,
				'post_type' => $post_type,
				'post_status' => 'publish',
			);
			$post_id = wp_insert_post($args);
			update_post_meta($post_id, 't11_position', $post_position);
			update_post_meta($post_id, 't11_preview', $preview_template);
			update_post_meta($post_id, 't11_preview_sidebar', $preview_sidebar);
//			update_post_meta($post_id, 't11_pos_image', $tmp_image);
		}
	}

	// Utility functions
	/*
	 * Checks to see if a post already exists in a named position.
	 * This function know about the meta_key 't11_post_position' - find a way around that!
	 */
	private function post_in_position($post_type, $position) {
		$args = array(
			'meta_key' => 't11_position',
			'meta_value' => $position,
			'post_type' => $post_type,
		);
		$query = new WP_Query($args);
		return $query->have_posts();
	}
}
