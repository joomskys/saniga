<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_heading',
        'title'      => esc_html__( 'CMS Heading', 'saniga' ),
        'icon'       => 'eicon-t-letter',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_text_align(['default' => '']),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label'      => esc_html__( 'Layout 1', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout1.png',
                                ],
                                /*
                                '2' => [
                                    'label'      => esc_html__( 'Layout 2', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout2.png',
                                ],
                                '3' => [
                                    'label'      => esc_html__( 'Layout 3', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout3.png',
                                ],*/
                                '4' => [
                                    'label'      => esc_html__( 'Layout 4', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout4.png',
                                ],
                                '5' => [
                                    'label'      => esc_html__( 'Layout 5', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout5.png',
                                ],
                                '6' => [
                                    'label'      => esc_html__( 'Layout 6', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout6.png',
                                ],
                                '7' => [
                                    'label'      => esc_html__( 'Layout 7', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout7.png',
                                ],
                                '8' => [
                                    'label'      => esc_html__( 'Layout 8', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout8.png',
                                ],
                                '9' => [
                                    'label'      => esc_html__( 'Layout 9', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout9.png',
                                ],
                                '10' => [
                                    'label'      => esc_html__( 'Layout 10', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout4.png',
                                ],
                                '11' => [
                                    'label'      => esc_html__( 'Layout 11', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/layout11.png',
                                ],
                            ],
                            'prefix_class' => 'cms-heading-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'image_section',
                    'label'    => esc_html__( 'Image', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'             => 'selected_img',
                            'label'            => esc_html__( 'Image', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name'         => 'thumbnail_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'large',
                        ),
                        array(
                            'name'    => 'thumbnail_pos',
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'label'   => esc_html__('Image Position', 'saniga'),
                            'options' => [
                                'order-last' => esc_html__('Left','saniga'),
                                'order-first'  => esc_html__('Right','saniga'),
                            ],
                            'default' => 'order-first'
                        )
                    ),
                    'condition' => [
                        'layout' => ['7']
                    ]
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
                                'condition' => [],
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'This is the heading', 'saniga' ),
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'         => 'heading_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-mainheading'
                            ),
                            array(
                                'name'         => 'heading_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-mainheading'
                            ),
                            array(
                                'name'        => 'heading_color',
                                'label'       => esc_html__( 'Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'heading_custom_color',
                                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
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
                                'selectors' => [
                                    '{{WRAPPER}} .cms-heading-extra-space' => 'height: {{SIZE}}px;',
                                ]
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
                    'name'     => 'subheading_section',
                    'label'    => esc_html__( 'Sub Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'subheading_text',
                                'label'       => esc_html__( 'Sub Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your sub title', 'saniga' ),
                                'label_block' => true,
                                'condition'   => [],
                            ),
                            array(
                                'name'         => 'subheading_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-subheading'
                            ),
                            array(
                                'name'         => 'subheading_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-subheading'
                            ),
                            array(
                                'name'        => 'subheading_color',
                                'label'       => esc_html__( 'Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'sheading_custom_color',
                                'label'       => esc_html__( 'Custom Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'subheading_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'subheading_extra_space',
                                'label' => esc_html__( 'Extra bottom Space', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'condition'   => [
                                    'subheading_text!' => ''
                                ],
                            ),
                            array(
                                'name' => 'subheading_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'subheading_text!' => ''
                                ],
                            ),
                        )
                    ),
                    'condition' => [
                        'layout' => ['4','5','6','7','8','9','10','11']
                    ]
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
                                'selector'     => '{{WRAPPER}} .cms-heading-desc'
                            ),
                            array(
                                'name'         => 'description_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-heading-desc'
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
                    ),
                    'condition' => [
                        'layout' => ['1','4','5','6','7','8', '9','10','11']
                    ]
                ),
                array(
                    'name'     => 'desc2_section',
                    'label'    => esc_html__( 'Description 2', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'description2_text',
                                'label'       => esc_html__( 'Description', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'condition'   => [],
                            ),
                            array(
                                'name'         => 'description2_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-heading-desc2'
                            ),
                            array(
                                'name'         => 'description2_text_shadow',
                                'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-heading-desc2'
                            ),
                            array(
                                'name'        => 'description2_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'description2_custom_color',
                                'label'       => esc_html__( 'Custom Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'description2_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'description2_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'description_text2!' => ''
                                ],
                            ),
                        )
                    ),
                    'condition'   => [
                        'layout' => ['4','8','10']
                    ],
                ),
                array(
                    'name'     => 'features_section',
                    'label'    => esc_html__( 'Features List', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'             => 'feature_icon',
                            'label'            => esc_html__( 'Feture Icon', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'     => '',
                                'library'   => '',
                            ]
                        ),
                        array(
                            'name'  => 'feature_icon_size',
                            'label' => esc_html__( 'Icon Size', 'saniga' ),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 200,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-heading-feature-item .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                            ]
                        ),
                        array(
                            'name'        => 'icon_bg_color',
                            'label'       => esc_html__( 'Icon Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                            'default'     => '',
                            'label_block' => true,
                            'condition'   => [
                                'feature_icon[value]!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'icon_color',
                            'label'       => esc_html__( 'Icon Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
                            'condition'   => [
                                'feature_icon[value]!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'icon_custom_color',
                            'label'       => esc_html__( 'Custom Icon Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'label_block' => true,
                            'condition'   => [
                                'icon_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'     => 'features_list',
                            'label'    => esc_html__('Features List', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'default'  => [],
                            'controls' => array(
                                array(
                                    'name'        => 'feature',
                                    'label'       => esc_html__('Feature Title', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                )
                            ),
                            'title_field' => '{{{ feature }}}',
                            'separator'   => 'before'
                        ),
                        array(
                            'name'        => 'features_color',
                            'label'       => esc_html__( 'Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
                            'separator'   => 'before'
                        ),
                        array(
                            'name'        => 'features_custom_color',
                            'label'       => esc_html__( 'Custom Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'label_block' => true,
                            'condition'   => [
                                'features_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name' => 'features_animation',
                            'label' => esc_html__( 'Motion Effect', 'saniga' ),
                            'type' => \Elementor\Controls_Manager::ANIMATION,
                            'condition'   => [
                                'features_list!' => ''
                            ],
                            'separator'   => 'before'
                        ),
                    ),
                    'condition' => [
                        'layout' => ['4','5','6','7','8','10']
                    ]
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
                        'layout' => ['4','5','6','7','8','9','10','11']
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
                        'layout' => ['4','5','6','7','8']
                    ]
                ),
                array(
                    'name'     => 'button_video',
                    'label'    => esc_html__( 'Buttons Video', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'    => 'heading_btn_video',
                        ]),
                        array(
                            array(
                                'name'         => 'button_video_box_shadow',
                                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .heading_btn_video'
                            ),
                            array(
                                'name' => 'button_video_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'heading_btn_videobtn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['4','5','6','7','8','10']
                    ]
                ),
                array(
                    'name'     => 'signature_section',
                    'label'    => esc_html__( 'Singnature', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'singnature_image',
                            'label'       => esc_html__( 'Singnature Image', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'singnature_name',
                            'label'       => esc_html__( 'Singnature Name', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter your name', 'saniga' ),
                            'label_block' => true,
                            'condition'   => [],
                        ),
                        array(
                            'name'        => 'singnature_color',
                            'label'       => esc_html__( 'Singnature Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'condition'   => [
                                'singnature_name!' => ''
                            ],
                        ),
                        array(
                            'name'        => 'singnature_custom_color',
                            'label'       => esc_html__( 'Custom Singnature Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'singnature_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'        => 'singnature_job',
                            'label'       => esc_html__( 'Job', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter your job', 'saniga' ),
                            'condition'   => [
                                'singnature_name!' => ''
                            ],
                        ),
                        array(
                            'name'        => 'singnature_job_color',
                            'label'       => esc_html__( 'Job Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'condition'   => [
                                'singnature_name!' => '',
                                'singnature_job!' => ''
                            ],
                        ),
                        array(
                            'name'        => 'singnature_job_custom_color',
                            'label'       => esc_html__( 'Job Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'singnature_job_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'      => 'singnature_animation',
                            'label'     => esc_html__( 'Motion Effect', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::ANIMATION,
                            'condition' => [
                                'singnature_name!' => ''
                            ],
                        )
                    ),
                    'condition' => [
                        'layout' => ['4','5','6','7','8','9','10','11']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);