<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image',
        'title' => esc_html__('Pxl Image', 'roofex' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__('Image Alignment', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'roofex' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'roofex' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'roofex' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_tilt',
                            'label' => esc_html__('Parallax Move Mouse', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'img-hover-scale' => 'Yes',
                            ],
                            'default' => 'no',
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_img',
                    'label' => esc_html__('Image', 'roofex' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__('Image Height', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'roofex' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'roofex' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ], 
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .ct-image-bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__('Image Width', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                '100%' => [
                                    'title' => esc_html__('100%', 'roofex' ),
                                ],
                                'auto' => [
                                    'title' => esc_html__('Auto', 'roofex' ),
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'roofex' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-image-single img'
                        ),
                        array(
                            'name' => 'img_effect',
                            'label' => esc_html__('Image Effect', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'twinkle' => 'Twinkle',
                                'pxl-image-effect1' => 'Zigzag',
                                'pxl-image-tilt' => 'Tilt',
                                'pxl-image-spin' => 'Spin',
                                'pxl-image-spin2' => 'Spin2',
                                'slide-top-to-bottom' => 'Slide Top To Bottom ',
                                'pxl-image-effect2' => 'Slide Bottom To Top ',
                                'slide-right-to-left' => 'Slide Right To Left ',
                                'slide-left-to-right' => 'Slide Left To Right ',
                                'pxl-image-lr' => 'Left To Right ',
                                'pxl-image-lrt' => 'Left To Right Up ',
                                'pxl-image-lrb' => 'Left To Right Down',
                            ],
                            'default' => '',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'max_tilt',
                            'label' => esc_html__('Max Tilt', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '10',
                        ),
                        array(
                            'name' => 'speed_tilt',
                            'label' => esc_html__('Speed Tilt', 'roofex' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '400',
                        ),
                    ),
                ),
                roofex_widget_animation_settings(),
            ),
        ),
    ),
    roofex_get_class_widget_path()
);