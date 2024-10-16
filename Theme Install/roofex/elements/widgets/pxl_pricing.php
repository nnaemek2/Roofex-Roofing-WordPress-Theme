<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Pxl Pricing', 'roofex'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pricing/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'roofex' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_pricing/layout-image/layout2.jpg'
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
                            'name' => 'style_star',
                            'label' => esc_html__('Choose Star', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''           => '0 Star',
                                'one-star'   => '1 Star',
                                'two-star'   => '2 Star',
                                'three-star' => '3 Star',
                                'four-star'  => '4 Star',
                                'five-star'  => '5 Star',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('Feature', 'roofex'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'roofex'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'roofex' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'non-active' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'is-active',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Button Link', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Video Link', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'video_image',
                            'label' => esc_html__('Video Image', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                    ),
),

array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'roofex' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--title, {{WRAPPER}} .pxl-pricing .pxl-item--title span' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--title',
        ),
        array(
            'name' => 'sub_title_color',
            'label' => esc_html__('Title Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--subtitle' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'sub_title_typography',
            'label' => esc_html__('Title Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--subtitle',
        ),
        array(
            'name' => 'feature_color',
            'label' => esc_html__('Feature Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'feature_line_color',
            'label' => esc_html__('Feature Divider Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature li' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'feature_typography',
            'label' => esc_html__('Feature Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature',
        ),
        array(
            'name' => 'box_price_color',
            'label' => esc_html__('Box Price Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'price_color',
            'label' => esc_html__('Price Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'price_typography',
            'label' => esc_html__('Price Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price',
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Description Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--description' => 'color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Description Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--description',
            'condition' => [
                'layout' => ['2'],
            ],
        ),
        array(
            'name' => 'popular_color',
            'label' => esc_html__('Popular Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--popular span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_bg_color',
            'label' => esc_html__('Background Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing:before' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing:after' => 'background-color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .item--star' => 'box-shadow: {{VALUE}} -8px 31px 50px;',
            ],
        ),
        array(
            'name' => 'popular_typography',
            'label' => esc_html__('Popular Typography', 'roofex' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--popular span',
        ),
        array(
            'name' => 'box_video_color',
            'label' => esc_html__('Box Video Color', 'roofex' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--video a' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'layout' => ['2'],
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