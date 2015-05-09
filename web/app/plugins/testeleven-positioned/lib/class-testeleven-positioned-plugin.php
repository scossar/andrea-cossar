<?php

/**
 * Class Testeleven_Positioned_Content_Plugin
 *
 * Initializes the plugin.
 * The 'register_content' method returns a new instance of 'positioned_content'.
 * The 'positioned_content' instance knows about displaying itself.
 */
class Testeleven_Positioned_Plugin {
	protected static $instance = null;

	public static function get_instance() {
		self::$instance === null && self::$instance = new self;

		return self::$instance;
	}

	public function create_positioned_post($registrar_class, $post_type, $position) {
		return new $registrar_class($post_type, $position);
	}
}