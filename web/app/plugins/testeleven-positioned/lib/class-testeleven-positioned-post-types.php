<?php
/**
 * Create the positioned post types
 */

class Testeleven_Positioned_Post_Types {
	// We only want to do this once!
	protected static $instance = null;

	public static function get_instance() {
		self::$instance === null && self::$instance = new self;

		return self::$instance;
	}

	protected function __construct() {
		add_action('init', array($this, 'register_post_types'));
	}

	// A public function to call the post_type function - it needs to be public so
	// we can hook into it.
	public function register_post_types() {
		$this->positioned_full_post();
		$this->positioned_content();
		$this->positioned_title();
		$this->positioned_image();
	}

	// Register the post types
	protected function positioned_full_post() {
		$labels = array(
			'name' => __('Positioned Full Posts', 't11-positioned'),
			'singular_name' => __('Positioned Full Post', 't11-positioned'),
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author'),
		);
		register_post_type('positioned_full', $args);
	}

	// A post type for displaying content without a heading
	protected function positioned_content() {
		$labels = array(
			'name' => __('Positioned Content', 't11-positioned'),
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array('editor', 'revisions', 'author'),
		);
		register_post_type('positioned_content', $args);
	}

	protected function positioned_title() {
		$labels = array(
			'name' => __('Positioned Titles', 't11-positioned'),
			'singular_name' => __('Positioned Title', 't11-positioned'),
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array('title', 'revisions'),
		);
		register_post_type('positioned_title', $args);
	}

	protected function positioned_image() {
		$labels = array(
			'name' => __('Positioned Images', 'roots'),
			'singular_name' => __('Positioned Image', 'roots'),
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'supports' => array('revisions'),
		);
		register_post_type('positioned_image', $args);
	}

}