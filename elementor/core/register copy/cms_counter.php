<?php
//Register Counter Widget
 etc_add_custom_widget(
    array(
        'name'       => 'cms_counter',
        'title'      => esc_html__('CMS Counter', 'saniga'),
        'icon'       => 'eicon-counter-circle',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-numerator',
            'cms-counter',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_text_align(['default' => '']),
                        array(
                            'name'         => 'layout',
                            'label'        => esc_html__( 'Templates', 'saniga' ),
                            'type'         => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'prefix_class' => 'cms-counter-layout',
                            'default'      => '1',
                            'options'      => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout-images/3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_counter/layout-images/4.png'
                                ]
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'section_counter',
                    'label'    => esc_html__('Counter', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'starting_number',
                            'label'   => esc_html__('Starting Number', 'saniga'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name'    => 'ending_number',
                            'label'   => esc_html__('Ending Number', 'saniga'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name'        => 'prefix',
                            'label'       => esc_html__('Number Prefix', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'placeholder' => '1',
                        ),
                        array(
                            'name'        => 'suffix',
                            'label'       => esc_html__('Number Suffix', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'placeholder' => '+',
                        ),
                        array(
                            'name'        => 'number_color',
                            'label'       => esc_html__( 'Number Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'condition'   => [
                                'title!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'number_custom_color',
                            'label'       => esc_html__( 'Custom Number Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'number_color'      => 'custom'
                            ],
                            'selectors'    => [
                                '{{WRAPPER}} .cms-counter-number-wrapper' => 'color:{{VALUE}};',
                                '{{WRAPPER}} .cms-counter-number' => 'color:{{VALUE}};'
                            ]
                        ),
                        array(
                            'name'    => 'duration',
                            'label'   => esc_html__('Animation Duration', 'saniga'),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2000,
                            'min'     => 100,
                            'step'    => 100,
                        ),
                        array(
                            'name'    => 'thousand_separator',
                            'label'   => esc_html__('Thousand Separator', 'saniga'),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name'      => 'thousand_separator_char',
                            'label'     => esc_html__('Separator', 'saniga'),
                            'type'      => \Elementor\Controls_Manager::SELECT,
                            'condition' => [
                                'thousand_separator' => 'true',
                            ],
                            'options' => [
                                ''  => 'Default',
                                '.' => 'Dot',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        )
                    )
                ),
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Icon', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'show_icon',
                                'label'   => esc_html__('Show Icon', 'saniga'),
                                'type'    => \Elementor\Controls_Manager::SWITCHER,
                                'default' => 'false',
                            ),
                            array(
                                'name'    => 'icon_type',
                                'label'   => esc_html__( 'Icon Type', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'icon' => esc_html__('Icon', 'saniga'),
                                    'image' => esc_html__('Image', 'saniga'),
                                ],
                                'default'   => 'icon',
                                'condition' => [
                                    'show_icon' => 'true'
                                ]
                            ),
                            array(
                                'name'             => 'counter_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'condition'        => [
                                    'show_icon' => 'true',
                                    'icon_type' => 'icon'
                                ]
                            ),
                            array(
                                'name'      => 'icon_image',
                                'label'     => esc_html__( 'Icon Image', 'saniga' ),
                                'type'      => \Elementor\Controls_Manager::MEDIA,
                                'default'   => '',
                                'condition' => [
                                    'show_icon' => 'true',
                                    'icon_type' => 'image'
                                ]
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'title_section',
                    'label'    => esc_html__( 'Title', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'title',
                                'label'       => esc_html__('Title', 'saniga'),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'label_block' => true,
                                'default'     => esc_html__( 'Counter', 'saniga' ),
                                'placeholder' => esc_html__( 'Counter Title', 'saniga' ),
                            ),
                            array(
                                'name'         => 'title_text_typo',
                                'type'         => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'default'      => '',
                                'selector'     => '{{WRAPPER}} .cms-counter-title'
                            ),
                            array(
                                'name'        => 'title_color',
                                'label'       => esc_html__( 'Title Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'condition'   => [
                                    'title!' => ''
                                ]
                            ),
                            array(
                                'name'        => 'title_custom_color',
                                'label'       => esc_html__( 'Custom Title Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'title_color'      => 'custom'
                                ],
                                'selectors'    => [
                                    '{{WRAPPER}} .cms-counter-title' => 'color:{{VALUE}};'
                                ]
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
                                'default'     => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'condition'   => [],
                            ),
                            array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'description_custom_color',
                                'label'       => esc_html__( 'Custom Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'description_color'      => 'custom'
                                ],
                                'selectors'    => [
                                    '{{WRAPPER}} .cms-counter-desc' => 'color:{{VALUE}};'
                                ]
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1','4']
                    ]
                ),
                array(
                    'name'     => 'link_section',
                    'label'    => esc_html__( 'Link', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'counter_link',
                                'label'       => esc_html__('Add Link(s)', 'saniga'),
                                'type'        => \Elementor\Controls_Manager::REPEATER,
                                'controls'    => saniga_elementor_hyperlink_settings(),
                                'title_field' => '{{{ link_text }}}',
                            ),
                            array(
                                'name'        => 'link_color',
                                'label'       => esc_html__( 'Link Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'link_custom_color',
                                'label'       => esc_html__( 'Custom Link Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'link_color'      => 'custom'
                                ],
                                'selectors'    => [
                                    '{{WRAPPER}} .cms-counter-link' => 'color:{{VALUE}};'
                                ]
                            ),
                            array(
                                'name'        => 'link_color_hover',
                                'label'       => esc_html__( 'Link Color Hover', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'link_custom_color_hover',
                                'label'       => esc_html__( 'Custom Link Color Hover', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'link_color_hover'      => 'custom'
                                ],
                                'selectors'    => [
                                    '{{WRAPPER}} .cms-counter-link:hover' => 'color:{{VALUE}};'
                                ]
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1','4']
                    ]
                ),
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);