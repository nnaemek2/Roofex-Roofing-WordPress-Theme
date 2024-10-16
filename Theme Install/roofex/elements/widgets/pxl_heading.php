<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Pxl Heading', 'roofex' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'description' => 'Create highlight text width shortcode: [highlight text="Text Demo"]',
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'roofex' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'roofex' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'roofex' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'roofex' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .wrap-subtitle' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__('Max Width', 'roofex' ),
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
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5', 
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Inherit',
                                'gr' => 'Gradient Text',
                            ],
                            'default' => 'Playfair Display',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'roofex' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => roofex_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .wrap-subtitle svg' => 'fill: {{VALUE}};',
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                            ],
                        ),
                        array(
                            'name' => 'sub_title_typography',
                            'label' => esc_html__('Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle',
                        ),
                        array(
                            'name' => 'sub_title_space_bottom',
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
                                '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_style',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                'sub-style-gradient' => 'Button Gradient',
                                'sub-text-gradient' => 'Text Gradient',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name'         => 'btn_gradient',
                            'label' => esc_html__( 'Background Type', 'roofex' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle.sub-style-gradient span',
                            'condition' => [
                                'sub_style' => ['sub-style-gradient'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate_sub',
                            'label' => esc_html__('Case Animate', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => roofex_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay_sub',
                            'label' => esc_html__('Animate Delay', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_highlight',
                    'label' => esc_html__('Highlight', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'highlight_style',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'highlight-default' => 'Default',
                                'highlight-text-gradient' => 'Text Gradient',
                            ],
                            'default' => 'highlight-default',
                        ),
                        array(
                            'name' => 'highlight_color',
                            'label' => esc_html__('Highlight Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'highlight_style' => ['highlight-default'],
                            ],
                        ),
                        array(
                            'name' => 'highlight_typography',
                            'label' => esc_html__('Highlight Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
                            'separator' => 'after',
                        ),
                    ),
                ),
            ),
        ),
    ),
    roofex_get_class_widget_path()
);