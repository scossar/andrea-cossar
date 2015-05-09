<?php
/**
 * Create the custom field 'positioned_image'
 */

class Positioned_Image_Field {
	protected static $instance = null;

	public static function get_instance() {
		self::$instance === null && self::$instance = new self;

		return self::$instance;
	}

	protected function __construct() {
		$this->register_positioned_image();
	}

	public function register_positioned_image() {
		if( function_exists('register_field_group') ):

			register_field_group(array (
				'key' => 'group_54f53d437c142',
				'title' => 'Positioned Image',
				'fields' => array (
					array (
						'key' => 'field_54f53d54129cc',
						'label' => 'Positioned Image',
						'name' => 't11_pos_image',
						'prefix' => '',
						'type' => 'image',
						'instructions' => 'To change the image hover over its thumbnail and click on the \'x\' that appears. This will remove the current image and allow you to select another one.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'positioned_image',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));

		endif;
	}
}