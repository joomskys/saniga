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
                        saniga_elementor_text_align(),
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
                            'type'    => \Elementor\Controls_Manager::NUMBER
                        ),
                        array(
                            'name'        => 'prefix',
                            'label'       => esc_html__('Number Prefix', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT
                        ),
                        array(
                            'name'        => 'suffix',
                            'label'       => esc_html__('Number Suffix', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT
                        ),
                        array(
                            'name'        => 'number_color',
                            'label'       => esc_html__( 'Number Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
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
                                'name'    => 'icon_type',
                                'label'   => esc_html__( 'Icon Type', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'icon' => esc_html__('Icon', 'saniga'),
                                    'image' => esc_html__('Image', 'saniga'),
                                ],
                                'default'   => 'image'
                            ),
                            array(
                                'name'             => 'counter_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'condition'        => [
                                    'icon_type' => 'icon'
                                ]
                            )
                        ),
                        saniga_elementor_typo_settings([
                            'name'     => 'icon_text',
                            'selector' => '.cms-counter-icon .cms-icon',
                            'condition' => [
                                'icon_type' => 'icon'
                            ]
                        ]),
                        array(
                            array(
                                'name'      => 'icon_image',
                                'label'     => esc_html__( 'Icon Image', 'saniga' ),
                                'type'      => \Elementor\Controls_Manager::MEDIA,
                                'default'   => '',
                                'condition' => [
                                    'icon_type' => 'image'
                                ]
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1','3']
                    ]
                ),
                array(
                    'name'     => 'title_section',
                    'label'    => esc_html__( 'Title', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'title',
                            'selector' => '.cms-counter-title'
                        ])
                    )
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Description', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'description',
                            'selector' => '.cms-counter-desc'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1', '2']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);