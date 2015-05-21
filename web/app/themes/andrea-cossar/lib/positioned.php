<?php
namespace Testeleven\AndreaCossar\Positioned;


$plugin = \Testeleven_Positioned_Plugin::get_instance();
$creator = 'Positioned_Post_Creator';

// Footer posts
$footer_where = new \Position('footer-where', 'front-page.php');
$footer_who = new \Position('footer-who', 'front-page.php');
$footer_site_info = new \Position('footer-site-info', 'front-page.php');

$plugin->create_positioned_post($creator, 'positioned_full', $footer_who);
$plugin->create_positioned_post($creator, 'positioned_full', $footer_where);
$plugin->create_positioned_post($creator, 'positioned_full', $footer_site_info);