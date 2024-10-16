<?php 

add_action( 'elementor/element/section/section_structure/after_section_end', 'roofex_add_custom_section_controls' ); 
add_action( 'elementor/element/column/layout/after_section_end', 'roofex_add_custom_columns_controls' ); 
function roofex_add_custom_section_controls( \Elementor\Element_Base $element) {

	$element->start_controls_section(
		'section_pxl',
		[
			'label' => esc_html__( 'Roofex Settings', 'roofex' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'header_layout_type',
		[
			'label'   => esc_html__( 'Header Layout Type', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'        => esc_html__( 'None', 'roofex' ),
				'clip'   => esc_html__( 'Clip', 'roofex' ),
			),
			'prefix_class' => 'pxl-type-header-',
			'default'      => 'none',
		]
	);
	$element->add_control(
		'pxl_section_offset',
		[
			'label'   => esc_html__( 'Section Offset', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl_section_offset-',
			'hide_in_inner' =>true,
			'options' => array(
				'none'        => esc_html__( 'None', 'roofex' ),
				'left'   => esc_html__( 'Left', 'roofex' ),
				'right'   => esc_html__( 'Right', 'roofex' ),
			),
			'default'      => 'none',
			'condition' => [
				'layout' =>'full_width'
			]
		]
	);
	$element->add_control(
		'pxl_container_offset',
		[
			'label'   => esc_html__( 'Container Width', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl-container-width-',
			'hide_in_inner' =>true,
			'options' => array(
				'container-1200'        => esc_html__( '1200px', 'roofex' ),
			),
			'default'      => 'container-1200',
			'condition' => [
				'layout' =>'full_width',
				'pxl_section_offset!'=>'none'
			]
		]
	);


	$element->add_control(
		'pxl_color_offset',
		[
			'label'   => esc_html__( 'Background - Left Space', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'        => esc_html__( 'No', 'roofex' ),
				'left'   => esc_html__( 'Yes', 'roofex' ),
			),
			'prefix_class' => 'pxl-bg-color-',
			'default'      => 'none',
		]
	);
	$element->add_control(
		'pxl_parallax_bg',
		[
			'label'   => esc_html__( 'Background Parallax', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'        => esc_html__( 'No', 'roofex' ),
				'1'   => esc_html__( 'Yes', 'roofex' ),
			),
			'prefix_class' => 'parallax-',
			'default'      => 'none',
		]
	);

	$element->add_control(
		'offset_color',
		[
			'label' => esc_html__('Background Color', 'roofex' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}}.pxl-bg-color-left:before' => 'background-color: {{VALUE}};',
			],
			'condition' => [
				'pxl_color_offset' => ['left'],
			],
		]
	);

	

	$element->add_control(
		'full_content_with_space',
		[
			'label' => esc_html__( 'Full Content with space from?', 'roofex' ),
			'type'         => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl-full-content-with-space-',
			'options'      => array(
				'none'    => esc_html__( 'None', 'roofex' ),
				'start'   => esc_html__( 'Start', 'roofex' ),
				'end'     => esc_html__( 'End', 'roofex' ),
			),
			'default'      => 'none',
			'condition' => [
				'layout' => 'full_width'
			]
		]
	);

	$element->add_control(
		'pxl_container_width',
		[
			'label' => esc_html__('Container Width', 'roofex'),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'default' => 1200,
			'condition' => [
				'layout' => 'full_width',
				'full_content_with_space!' => 'none'
			]           
		]
	);

	$element->add_control(
		'row_scroll_fixed',
		[
			'label'   => esc_html__( 'Row Scroll - Column Fixed', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'        => esc_html__( 'No', 'roofex' ),
				'fixed'   => esc_html__( 'Yes', 'roofex' ),
			),
			'prefix_class' => 'pxl-row-scroll-',
			'default'      => 'none',      
		]
	);

	$element->add_control(
		'pxl_parallax_bg_img',
		[
			'label' => esc_html__( 'Parallax Background Image', 'roofex' ),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'hide_in_inner' => true,
			'selectors' => [
				'{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
			],
		]
	);
	$element->end_controls_section();
};
add_filter( 'pxl_section_start_render', 'roofex_custom_section_start_render', 10, 3 );
function roofex_custom_section_start_render($html, $settings, $el){

	if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $html .= '<div class="pxl-section-bg-parallax"></div>';
    }
    return $html;
}
function roofex_add_custom_columns_controls( \Elementor\Element_Base $element) {
	$element->start_controls_section(
		'columns_pxl',
		[
			'label' => esc_html__( 'Roofex Settings', 'roofex' ),
			'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
	$element->add_control(
		'pxl_section_offset',
		[
			'label'   => esc_html__( 'Section Offset', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl_section_offset-',
			'hide_in_inner' =>true,
			'options' => array(
				'none'        => esc_html__( 'None', 'roofex' ),
				'left'   => esc_html__( 'Left', 'roofex' ),
				'right'   => esc_html__( 'Right', 'roofex' ),
			),
			'default'      => 'none',
			// 'condition' => [
			// 	'layout' =>'full_width'
			// ]
		]
	);
	$element->add_control(
		'pxl_parallax_bg_cl',
		[
			'label'   => esc_html__( 'Background Parallax', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'        => esc_html__( 'No', 'roofex' ),
				'1'   => esc_html__( 'Yes', 'roofex' ),
			),
			'prefix_class' => 'parallax-',
			'default'      => 'none',
		]
	);
	$element->add_control(
		'pxl_container_offset',
		[
			'label'   => esc_html__( 'Container Width', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'prefix_class' => 'pxl-container-width-',
			'hide_in_inner' =>true,
			'options' => array(
				'container-1200'        => esc_html__( '1200px', 'roofex' ),
			),
			'default'      => 'container-1200',
			// 'condition' => [
			// 	'layout' =>'full_width',
			// 	'pxl_section_offset!'=>'none'
			// ]
		]
	);
	$element->add_control(
		'col_divider',
		[
			'label'   => esc_html__( 'Divider', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				''        => esc_html__( 'None', 'roofex' ),
				'left'   => esc_html__( 'Left', 'roofex' ),
				'right'   => esc_html__( 'Right', 'roofex' ),
			),
			'prefix_class' => 'pxl-col-divider-',
			'default'      => '',
		]
	);

	$element->add_control(
		'col_divider_color',
		[
			'label' => esc_html__('Divider Color', 'roofex' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}} .pxl-col-divider-right:before' => 'background-color: {{VALUE}};',
				'{{WRAPPER}} .pxl-col-divider-left:before' => 'background-color: {{VALUE}};',
			],
		]
	);
	
	$element->add_control(
		'col_line',
		[
			'label'   => esc_html__( 'Column Line Style', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'           => esc_html__( 'None', 'roofex' ),
				'line1'           => esc_html__( 'Line 1', 'roofex' ),
				'line2'           => esc_html__( 'Line 2', 'roofex' ),
			),
			'default' => 'none',
			'prefix_class' => 'pxl-col-'
		]
	);

	$element->add_control(
		'col_line_color',
		[
			'label' => esc_html__('Column Line Color', 'roofex' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'selectors' => [
				'{{WRAPPER}}.pxl-col-line2:before' => 'background-color: {{VALUE}};',
			],
			'condition' => [
				'col_line' => ['line2'],
			],
		]
	);

	$element->add_control(
		'col_line_height',
		[
			'label' => esc_html__('Column Line Height', 'roofex' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'control_type' => 'responsive',
			'size_units' => [ 'px', '%' ],
			'range' => [
				'px' => [
					'min' => 0,
					'max' => 3000,
				],
			],
			'selectors' => [
				'{{WRAPPER}}.pxl-col-line2:before' => 'height: {{SIZE}}{{UNIT}};',
			],
			'separator' => 'after',
			'condition' => [
				'col_line' => ['line2'],
			],
		]
	);

	$element->add_control(
		'col_content_align',
		[
			'label'   => esc_html__( 'Column Content Align', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				''           => esc_html__( 'Default', 'roofex' ),
				'start'           => esc_html__( 'Start', 'roofex' ),
				'center'           => esc_html__( 'Center', 'roofex' ),
				'end'           => esc_html__( 'End', 'roofex' ),
			),
			'default' => '',
			'prefix_class' => 'pxl-col-align-'
		]
	);
	$element->add_control(
		'col_sticky',
		[
			'label'   => esc_html__( 'Column Sticky', 'roofex' ),
			'type'    => \Elementor\Controls_Manager::SELECT,
			'options' => array(
				'none'           => esc_html__( 'No', 'roofex' ),
				'sticky' => esc_html__( 'Yes', 'roofex' ),
			),
			'default' => 'none',
			'prefix_class' => 'pxl-column-'
		]
	);
	$element->end_controls_section();
}

add_action( 'elementor/element/after_add_attributes', 'roofex_custom_el_attributes', 10, 1 );
function roofex_custom_el_attributes($el){
	if( 'section' !== $el->get_name() ) {
		return;
	}
	$settings = $el->get_settings();

	$pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

	if( isset( $settings['stretch_section']) && $settings['stretch_section'] == 'section-stretched') 
		$pxl_container_width = $pxl_container_width - 30;

	$pxl_container_width = $pxl_container_width.'px';

	if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'start' ) {

		$el->add_render_attribute( '_wrapper', 'style', 'padding-left: calc( (100% - '.$pxl_container_width.')/2);');
	}
	if ( isset( $settings['full_content_with_space'] ) && $settings['full_content_with_space'] === 'end' ) {

		$el->add_render_attribute( '_wrapper >', 'style', 'padding-right: calc( (100% - '.$pxl_container_width.')/2);');
	}
}
