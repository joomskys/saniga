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
                                ]
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
                                'name'    => 'play_icon_style',
                                'label'   => esc_html__('Play Icon Style', 'saniga' ),
                                'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
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
                                    '5' => [
                                        'label' => esc_html__('Play Icon 5', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon5.png'
                                    ],
                                    '6' => [
                                        'label' => esc_html__('Play Icon 6', 'saniga' ),
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/play-icon6.png'
                                    ]
                                ],
                                'prefix_class' => 'cms-video-play-icon-style-'
                            ),
                            array(
                                'name'             => 'play_icon_icon',
                                'label'            => esc_html__( 'Play Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'default'          => [
                                    'library'   => 'cmsi',
                                    'value'     => 'cmsi-play'
                                ] 
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
                                    'play_icon_style' => ['2', '5']
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
                                ]
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
                                'condition' => [
                                    'layout'    => ['99']                            
                                ]
                            ),
                            array(
                                'name'  => 'heading_width',
                                'label' => esc_html__( 'Width', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => 200,
                                        'max' => 800,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .cms-video-title' => 'max-width: {{SIZE}}{{UNIT}};',
                                ]
                            )
                        ),
                        saniga_elementor_text_settings([
                            'name'     => 'heading_text',
                            'selector' => '.cms-heading'
                        ]),
                        saniga_elementor_theme_colors([
                            'name'                => 'heading_bg',
                            'label'               => esc_html__('Background Color','saniga'),
                            'custom_name'         => 'heading_bg_custom',
                            'custom_label'        => esc_html__('Custom Background Color','saniga'),
                            'custom_selector'     => '.cms-video-title',
                            'custom_selector_tag' => 'background-color'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Description', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'description_text',
                            'selector' => '.cms-desc'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);