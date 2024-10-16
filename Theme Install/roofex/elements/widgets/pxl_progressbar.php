<?php
// Register Progress Bar Widget
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_progressbar',
        'title'      => esc_html__( 'PXL Progress Bar', 'roofex'),
        'icon'       => 'eicon-skill-bar',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'pxl-progressbar',
            'roofex-progressbar' ,
            'progressbar'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'roofex' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name'     => 'progressbar_list',
                            'label'    => esc_html__( 'Progress Bar Lists', 'roofex' ),
                            'type'     => 'repeater',
                            'controls' => array_merge(
                                array(

                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__( 'Title', 'roofex' ),
                                        'type'        => 'text',
                                        'placeholder' => esc_html__( 'Enter your title', 'roofex' ),
                                        'default'     => esc_html__( 'My Skill', 'roofex' ),
                                        'label_block' => true
                                    ),
                                    array(
                                        'name'    => 'percent',
                                        'label'   => esc_html__( 'Percentage', 'roofex' ),
                                        'type'    => 'slider',
                                        'default' => [
                                            'size' => 50,
                                            'unit' => '%',
                                        ],
                                        'label_block' => true
                                    ),
                                    array(
                                        'name' => 'item_bar_color',
                                        'label' => esc_html__( 'Bar Background Color', 'roofex' ),
                                        'type' => \Elementor\Controls_Manager::COLOR,
                                        'selectors' => [
                                            '{{WRAPPER}} {{CURRENT_ITEM}} .pxl-progress-bar' => 'background-color: {{VALUE}}',
                                        ],
                                    ),
                                )
                            ),
                            'title_field' => '{{title}}'
                        )
                    )
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Style', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'height',
                            'label' => esc_html__('Height Bar', 'roofex' ),
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
                                '{{WRAPPER}} .pxl-progressbar .progress-bound' => 'height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-progressbar .pxl-progress-bar' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .progress-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__( 'Title Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .progress-title',
                        ),
                        array(
                            'name' => 'percent_color',
                            'label' => esc_html__( 'Percentage Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .progress-percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percentage_typography',
                            'label' => esc_html__( 'Percentage Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-progressbar .progress-percentage',
                        ),
                        array(
                            'name' => 'bound_color',
                            'label' => esc_html__( 'Bound Background Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-progressbar .progress-bound' => 'background-color: {{VALUE}};'
                            ],
                        ),
                    ),
                ),
            ),
),
),roofex_get_class_widget_path()
);