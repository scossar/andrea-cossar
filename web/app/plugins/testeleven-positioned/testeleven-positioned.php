<?php
/**
 * Plugin Name: Testeleven Positioned Content
 * Text Domain: t11-positioned
 */

require_once(__DIR__ . '/autoloader.php');

// Register the positioned post types
$post_types = Testeleven_Positioned_Post_Types::get_instance();

// Create the 'positioned_image' field
$image_field = Positioned_Image_Field::get_instance();

// Make the template tags available
require_once(__DIR__ . '/lib/testeleven_positioned_template_tags.php');

