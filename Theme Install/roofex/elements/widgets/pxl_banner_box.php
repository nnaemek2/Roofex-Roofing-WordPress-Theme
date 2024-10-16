<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_banner_box',
        'title' => esc_html__('Pxl Banner Box', 'roofex'),
        'icon' => 'eicon-posts-ticker',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_banner_box/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_banner_box/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_banner_box/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_banner_box/layout-image/layout4.jpg'
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
                            'name' => 'banner_title',
                            'label' => esc_html__('Title', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'banner_number',
                            'label' => esc_html__('Number', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['2','4'],
                            ],
                        ),
                        array(
                            'name' => 'banner_number_suffix',
                            'label' => esc_html__('Number Suffix', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['2','4'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-banner .pxl-item--title',
                            'separator' => 'before',
                        ),
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Image', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'banner_image_2',
                            'label' => esc_html__('Image Quality', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_project',
                    'label' => esc_html__('Project Box', 'roofex'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'pxl_icon_project',
                            'label' => esc_html__('Icon', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'pr_name',
                            'label' => esc_html__('Name', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pr_title',
                            'label' => esc_html__('Title', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'pr_date',
                            'label' => esc_html__('Date', 'roofex'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                ),
                roofex_widget_animation_settings(),
            ),
        ),
    ),
    roofex_get_class_widget_path()
);