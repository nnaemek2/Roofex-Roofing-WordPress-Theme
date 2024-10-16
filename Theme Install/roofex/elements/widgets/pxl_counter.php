<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('Pxl Counter', 'roofex'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'roofex-counter',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_counter/layout-image/layout5.jpg'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),

                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                        ),

                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'roofex'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'roofex'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'roofex'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'roofex'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'style_l2',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'effect',
            'label' => esc_html__('Effect', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'effect-default' => 'Default',
                'effect-slide' => 'Slide',
            ],
            'default' => 'effect-default',
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
                '{{WRAPPER}} .pxl-counter .pxl--item-title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-title',
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
                '{{WRAPPER}} .pxl-counter .pxl--item-desc' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--item-desc',
        ),
    ),
    'condition' => [
        'layout' => ['3'],
    ],
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'box_icon_color',
            'label' => esc_html__('Box Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter3 .pxl-item--icon svg' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .pxl-counter4 .pxl-item--icon' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['3','4'],
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter1 .pxl-item--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'section_number',
    'label' => esc_html__('Number', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'number_color',
            'label' => esc_html__('Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'number_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl--counter-number',
        ),
        array(
            'name' => 'duration',
            'label' => esc_html__('Animation Duration', 'roofex'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2000,
            'min' => 100,
            'step' => 100,
        ),
        array(
            'name' => 'number_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'roofex' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--counter-number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'section_extra',
    'label' => esc_html__('Extra', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'box_border_color',
            'label' => esc_html__('Box Border Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl--item-inner' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['5'],
            ],
        ),
    ),
),
roofex_widget_animation_settings(),
),
),
),
roofex_get_class_widget_path()
);