<?php
// Register Video Player Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_video',
        'title'      => esc_html__('CMS Video', 'saniga' ),
        'icon'       => 'eicon-play',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'jquery',
            'magnific-popup'
        ),
        'styles'     => array(
            'magnific-popup'
        ),
        'params'     => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'saniga' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/3.png'
                                ],
                            ],
                            'prefix_class' => 'cms-video-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'video_section',
                    'label'    => esc_html__('Video', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'video_link',
                            'label' => esc_html__('Link', 'saniga' ),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                            'default' => ''
                        )
                    )
                ),
                array(
                    'name'     => 'image_section',
                    'label'    => esc_html__('Image Overlay', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'video_image_overlay',
                            'label'   => esc_html__( 'Choose Image', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                //'url' => \Elementor\Utils::get_placeholder_image_src(),
                            ],
                            'dynamic' => [
                                'active' => true,
                            ],
                        ),
                        array(
                            'name'         => 'video_image_overlay_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'full',
                            'separator'    => 'none',
                        ),
                        array(
                            'name'    => 'video_image_as_background',
                            'label'   => esc_html__( 'Make Image as Background', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name'        => 'gradient_overlay',
                            'label'       => esc_html__( 'Gradient Overlay', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'label_block' => true,
                            'options'     => [
                                '' => esc_html__('Default', 'saniga'),
                                '1' => esc_html__('Gradient 1', 'saniga'),
                                '2' => esc_html__('Gradient 2', 'saniga'),
                                '3' => esc_html__('Gradient 3', 'saniga'),
                                '4' => esc_html__('Gradient 4', 'saniga'),
                                '5' => esc_html__('Gradient 5', 'saniga'),
                            ],
                            'default' => ''
                        ),
                        array(
                            'name'        => 'gradient_bg_color',
                            'label'       => esc_html__( 'Gradient Overlay Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'options'     => '',  
                            'default'     => '',
                            'label_block' => true,
                            'condition'   => [
                                'gradient_overlay!' => ''
                            ]
                        ),
                        array(
                            'name'       => 'border_radius',
                            'label'      => esc_html__( 'Border Radius', 'saniga' ),
                            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors'  => [
                                '{{WRAPPER}} .cms-video-player' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .cms-video-player .video-bg.cms-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        )
                    )
                ),
                array(
                    'name'     => 'play_section',
                    'label'    => esc_html__('Play Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'video_play_btn_style',
                                'label'   => esc_html__('Style', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'icon'       => esc_html__('Play Icon','saniga'),
                                    'custom-btn' => esc_html__('Custom Button','saniga'),
                                ],
                                'default' => 'icon',
                            ),                            
                            array(
                                'name'    => 'play_icon_style',
                                'label'   => esc_html__('Play Icon Style', 'saniga' ),
                                'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                                'default' => '2',
                                'options' => [
                                    '1' => [
                                        'label' => esc_html__('Play Icon 1', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon1.png'
                                    ],
                                    '2' => [
                                        'label' => esc_html__('Play Icon 2', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon2.png'
                                    ],
                                    '3' => [
                                        'label' => esc_html__('Play Icon 3', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon3.png'
                                    ],
                                    '4' => [
                                        'label' => esc_html__('Play Icon 4', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon4.png'
                                    ],
                                ],
                                'condition'    => [
                                    'video_play_btn_style' => 'icon'
                                ],
                                'prefix_class' => 'cms-video-play-icon-style-'
                            ),
                            array(
                                'name'             => 'play_icon_icon',
                                'label'            => esc_html__( 'Play Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'     => '',
                                    'library'   => '',
                                ],
                                'condition' => [
                                    'video_play_btn_style'    => ['icon']                            
                                ],
                            ),
                            array(
                                'name'    => 'play_icon_img',
                                'label'   => esc_html__( 'Choose Play Image', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::MEDIA,
                                'default' => [
                                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                                ],
                                'dynamic' => [
                                    'active' => true,
                                ],
                                'condition'    => [
                                    'play_icon_style' => ['2']
                                ],
                            ),
                            array(
                                'name'      => 'play_icon_text',
                                'label'     => esc_html__('Play Text', 'saniga' ),
                                'type'      => \Elementor\Controls_Manager::TEXT,
                                'condition' => [
                                    'play_icon_style' => ['2','3']
                                ]
                            ),
                            array(
                                'name'    => 'video_play_btn_position',
                                'label'   => esc_html__('Position', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    ''              => esc_html__('Default','saniga'),
                                    'top-left'      => esc_html__('Top Left','saniga'),
                                    'top-center'    => esc_html__('Top Center','saniga'),
                                    'top-right'     => esc_html__('Top Right','saniga'),
                                    'center-left'   => esc_html__('Center Left','saniga'),
                                    'center-center' => esc_html__('Center Center','saniga'),
                                    'center-right'  => esc_html__('Center Right','saniga'),
                                    'bottom-left'   => esc_html__('Bottom Left','saniga'),
                                    'bottom-center' => esc_html__('Bottom Center','saniga'),
                                    'bottom-right'  => esc_html__('Bottom Right','saniga')
                                ],
                                'default'      => '',
                                //'prefix_class' => 'cms-video-play-btn-'
                            ),
                        ),
                        saniga_elementor_button_settings([
                            'prefix'    => 'video_',
                            'btn_link_type' => [
                                'video' => esc_html__('Open Video','saniga')
                            ],
                            'btn_type'   => [
                                'btn-video2' => esc_html__('Video 2', 'saniga')
                            ],
                            'condition' => [
                                'video_play_btn_style' => 'custom-btn'
                            ]
                        ]),
                        array(
                            array(
                                'name'       => 'btn_margin',
                                'label'      => esc_html__( 'Margin', 'saniga' ),
                                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px'],
                                'selectors'  => [
                                    '{{WRAPPER}} .btn-video-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name'       => 'btn_padding',
                                'label'      => esc_html__( 'Padding', 'saniga' ),
                                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => ['px'],
                                'selectors'  => [
                                    '{{WRAPPER}} .btn-video-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'heading_section',
                    'label'    => esc_html__( 'Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'     => '',
                                    'library'   => '',
                                ],
                                'condition' => [
                                    'layout'    => ['99']                            
                                ],
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'         => 'heading_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-video-title'
                            ),
                            array(
                                'name'         => 'heading_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-video-title'
                            ),
                            array(
                                'name'        => 'heading_color',
                                'label'       => esc_html__( 'Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'heading_custom_color',
                                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'heading_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'heading_extra_space',
                                'label' => esc_html__( 'Extra bottom Space', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'condition'   => [
                                    'heading_text!' => '',
                                    'layout'        => ['1']
                                ],
                            ),
                            array(
                                'name' => 'heading_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'heading_text!' => ''
                                ],
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Description', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'description_text',
                                'label'       => esc_html__( 'Description', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'condition'   => [],
                            ),
                            array(
                                'name'         => 'description_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-video-sub-title'
                            ),
                            array(
                                'name'         => 'description_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-video-sub-title'
                            ),
                            array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'description_custom_color',
                                'label'       => esc_html__( 'Custom Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'description_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'description_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'description_text!' => ''
                                ],
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'button_section1',
                    'label'    => esc_html__( 'Buttons 01', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings(),
                        array(
                            array(
                                'name' => 'button_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'btn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout!' => ['3']
                    ]
                ),
                array(
                    'name'     => 'button_section2',
                    'label'    => esc_html__( 'Buttons 02', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'heading_btn2'
                        ]),
                        array(
                            array(
                                'name' => 'button2_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'heading_btn2btn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout!' => ['3']
                    ]
                ),
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);