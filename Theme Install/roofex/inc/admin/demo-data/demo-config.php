<?php

$uri = get_template_directory_uri() . '/inc/admin/demo-data/demo-imgs/';
$pxl_server_info = apply_filters( 'pxl_server_info', ['demo_url' => 'https://demo.casethemes.net/roofex/'] ) ; 
// Demos
$demos = array(
	// Elementor Demos
	'roofex' => array(
		'title'       => 'Roofex',	
		'description' => '',
		'screenshot'  => $uri . 'roofex.png',
		'preview'     => $pxl_server_info['demo_url'],
	),	 
);