<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Showcase Pxl', 'roofex' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => array('2'),
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'roofex' ),
                            'condition' => [
                                'layout' => array('1'),
                            ],
                        ),
                        array(
                            'name' => 'btn_text1',
                            'label' => esc_html__('Button Text 1', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link 1', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'roofex' ),
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'link2',
                            'label' => esc_html__('Link 2', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'roofex' ),
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Button Text Typography', 'roofex' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item-links a',
                        ),
                        array(
                            'name' => 'notification',
                            'label' => esc_html__('Show Notification', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'notification_label',
                            'label' => esc_html__('Notification Text', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'notification_bg',
                            'label' => esc_html__('Notification Background Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item-feature .notification' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'coming_soon_text',
                            'label' => esc_html__('Coming Soon Text', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => array('2'),
                            ],
                        ),
                        array(
                            'name' => 'notification_color',
                            'label' => esc_html__('Notification Color', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item-feature .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
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