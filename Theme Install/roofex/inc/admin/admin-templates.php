<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Roofex_Admin_Templates extends Roofex_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'roofex' ),
		    esc_html__( 'Templates', 'roofex' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Roofex_Admin_Templates;
