<?php
add_action( 'pxl_post_metabox_register', 'roofex_page_options_register' );
function roofex_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'roofex' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'roofex' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						roofex_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']) 
					)
				],
				'header' => [
					'title'  => esc_html__( 'Header', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						roofex_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'roofex' ),
								'options'  => roofex_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'roofex' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						roofex_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'content' => [
					'title'  => esc_html__( 'Content', 'roofex' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						roofex_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'roofex' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'roofex' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						roofex_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'roofex' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						roofex_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'roofex' ),
								'options'  => roofex_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'roofex' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						roofex_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'content' => [
					'title'  => esc_html__( 'Content', 'roofex' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						roofex_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'roofex' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'roofex' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						roofex_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'roofex' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'roofex'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'secondary_color',
								'type'        => 'color',
								'title'       => esc_html__('Secondary Color', 'roofex'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'regular_color',
								'type'        => 'color',
								'title'       => esc_html__('Regular Color', 'roofex'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'fourth_color',
								'type'        => 'color',
								'title'       => esc_html__('Fourth Color', 'roofex'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'fifth_color',
								'type'        => 'color',
								'title'       => esc_html__('Fifth Color', 'roofex'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'gradient_color',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color', 'roofex'),
								'transparent' => false,
							),
						)
					)
				]
			]
		],
		'product' => [ //post_type
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Product Settings', 'roofex' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'general' => [
					'title'  => esc_html__( 'General', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'product_feature_text',
					            'type' => 'text',
					            'title' => esc_html__('Featured Text', 'roofex'),
					            'default' => '',
					        ),
						)
				    )
				],
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'roofex' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'general' => [
					'title'  => esc_html__( 'General', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'portfolio_excerpt',
								'type' => 'textarea',
								'title' => esc_html__('Excerpt', 'roofex'),
								'validate' => 'html_custom',
								'default' => '',
							),

							array(
								'id'       => 'portfolio_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon Font', 'roofex'),
							),

							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'roofex' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'header' => [
					'title'  => esc_html__( 'Header', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						roofex_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'roofex' ),
								'options'  => roofex_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'roofex' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						roofex_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'roofex' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						roofex_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'roofex' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'gerenal' => [
					'title'  => esc_html__( 'General', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'roofex'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'=> 'service_excerpt',
								'type' => 'textarea',
								'title' => esc_html__('Excerpt', 'roofex'),
								'validate' => 'html_custom',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'roofex'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'roofex'),
									'image'  => esc_html__('Image', 'roofex'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'roofex'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'roofex'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'roofex' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
					)
				],
				'header' => [
					'title'  => esc_html__( 'Header', 'roofex' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						roofex_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'roofex' ),
								'options'  => roofex_get_nav_menu_slug(),
								'default' => '',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'roofex' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						roofex_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)

				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'roofex' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						roofex_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Options', 'roofex' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'roofex' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'roofex'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'roofex'), 
							'header'       => esc_html__('Header', 'roofex'), 
							'footer'       => esc_html__('Footer', 'roofex'), 
							'mega-menu'    => esc_html__('Mega Menu', 'roofex'), 
							'page-title'   => esc_html__('Page Title', 'roofex'), 
							'tab' => esc_html__('Tab', 'roofex'),
							'hidden-panel' => esc_html__('Hidden Panel', 'roofex'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'button_set',
						'title' => esc_html__('Header Type', 'roofex'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'roofex'), 
							'px-header--transparent'       => esc_html__('Transparent', 'roofex'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),
				),

			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
