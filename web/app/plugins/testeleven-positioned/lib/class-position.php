<?php
/*
 * Class Position returns an object that associates a 'position' with a
 * 'preview_position'.
 */
class Position {
	protected $position;
	protected $preview_template;

	function __construct($position, $preview_template, $preview_sidebar = false) {
		$this->position = $position;
		$this->preview_template = $preview_template;
		$this->preview_sidebar = $preview_sidebar;

	}

	public function get_position() {
		return $this->position;
	}

	public function get_preview_template() {
		return $this->preview_template;
	}

	public function get_preview_sidebar() {
		return $this->preview_sidebar;
	}
}