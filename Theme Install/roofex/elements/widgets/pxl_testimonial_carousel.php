<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('Pxl Testimonial Carousel', 'roofex'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'roofex' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout5.jpg'
                                ],
                                 '6' => [
                                    'label' => esc_html__('Layout 6', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout8.jpg'
                                ],
                                '9' => [
                                    'label' => esc_html__('Layout 9', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_testimonial_carousel/layout-image/layout9.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'roofex'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'height_slider',
                            'label' => esc_html__('Height Slider', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .swiper-container-vertical' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'layout' => ['2','5'],
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'style1' => 'Style 1',
                            ],
                            'default' => 'Default',
                            'condition' => [
                                'layout' => ['4','7'],
                            ],
                        ),
                        array(
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'roofex'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'roofex'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'roofex'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'star',
                                    'label' => esc_html__('Style', 'roofex' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '5' => '5',
                                    ],
                                    'default' => '5',
                                ),
                                array(
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'roofex' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'roofex' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'image_quote',
                                    'label' => esc_html__('Quote', 'roofex' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),

                    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title',
        ),
    ),
),
array(
    'name' => 'section_style_position',
    'label' => esc_html__('Position', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'position_color',
            'label' => esc_html__('Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'position_typography',
            'label' => esc_html__('Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position',
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc',
        ),
    ),
),
array(
    'name' => 'section_settings_carousel',
    'label' => esc_html__('Settings', 'roofex'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_sm',
            'label' => esc_html__('Columns SM Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_lg',
            'label' => esc_html__('Columns LG Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xxl',
            'label' => esc_html__('Columns XXL Devices', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'inherit',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                'inherit' => 'Inherit',
            ],
        ),

        array(
            'name' => 'slides_to_scroll',
            'label' => esc_html__('Slides to scroll', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'arrows',
            'label' => esc_html__('Show Arrows', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'pagination',
            'label' => esc_html__('Show Pagination', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
        ),
        array(
            'name' => 'pagination_type',
            'label' => esc_html__('Pagination Type', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'bullets',
            'options' => [
                'bullets' => 'Bullets',
                'fraction' => 'Fraction',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),
        array(
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'vertical',
            'label' => esc_html__('Vertical', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay_speed',
            'label' => esc_html__('Autoplay Speed', 'roofex'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5000,
            'condition' => [
                'autoplay' => 'true'
            ]
        ),
        array(
            'name' => 'infinite',
            'label' => esc_html__('Infinite Loop', 'roofex'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'roofex'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 500,
        ),
    ),
),
roofex_widget_animation_settings(),
),
),
),
roofex_get_class_widget_path()
);