<?php
etc_add_custom_widget(
    array(
        'name'       => 'cms_pricing_table',
        'title'      => esc_html__('CMS Pricing Table', 'saniga'),
        'icon'       => 'eicon-price-table',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout-images/3.png'
                                ]
                            ],
                            'prefix_class' => 'cms-pricing-layout-'
                        ),
                    )
                ),
                array(
                    'name'      => 'icon_section',
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'label'     => esc_html__('Icon Settings', 'saniga'),
                    'controls' => array(
                        array(
                            'name'             => 'selected_icon',
                            'label'            => esc_html__('Select an Icon', 'saniga'),
                            'type'             => \Elementor\Controls_Manager::ICONS
                        ),
                    ),
                    'condition' => [
                        'layout' => []
                    ]
                ),
                array(
                    'name'      => 'badge_section',
                    'label'     => esc_html__('Badge Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'show_badge',
                            'label'       => esc_html__('Show Badge', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::SWITCHER,
                            'default'     => 'false'
                        ),
                        array(
                            'name'        => 'badge_text',
                            'label'       => esc_html__('Text', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'condition'   => [
                                'show_badge' => 'true'
                            ]
                        )
                    ),
                    'condition' => [
                        'layout' => []
                    ]
                ),
                array(
                    'name'      => 'setting_section',
                    'label'     => esc_html__('Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'heading_text',
                            'selector' => '.cms-heading'
                        ]),
                        array(
                            array(
                                'name'    => 'main_color',
                                'label'   => esc_html__('Main Color','saniga'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' =>  saniga_elementor_theme_color_opts(['custom' => false])
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Description', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'description_text',
                            'label'    => 'Description',
                            'selector' => '.cms-desc'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'      => 'price_section',
                    'label'     => esc_html__('Price Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'price_currency',
                            'label'       => esc_html__('Currency', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name'        => 'price_value',
                            'label'       => esc_html__('Price', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name'        => 'price_duration',
                            'label'       => esc_html__('Duration', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'     => 'features_section',
                    'label'    => esc_html__( 'Features List', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'             => 'feature_icon',
                            'label'            => esc_html__( 'Feture Icon', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::ICONS
                        ),
                        array(
                            'name'        => 'icon_bg_color',
                            'label'       => esc_html__( 'Icon Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                            'condition'   => [
                                'feature_icon[value]!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'icon_color',
                            'label'       => esc_html__( 'Icon Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'condition'   => [
                                'feature_icon[value]!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'icon_custom_color',
                            'label'       => esc_html__( 'Custom Icon Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'icon_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'    => 'feature_lists',
                            'label'   => '',
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #1', 'saniga' ),
                                    'feature_price' => '$50',
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #2', 'saniga' ),
                                    'feature_price' => '$80',
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #3', 'saniga' ),
                                    'feature_price' => '$60',
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #4', 'saniga' ),
                                    'feature_price' => '$75',
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #5', 'saniga' ),
                                    'feature_price' => '$45',
                                ]
                            ],
                            'controls' => array(
                                array(
                                    'name'             => 'feature_icon',
                                    'label'            => esc_html__('Icon', 'saniga'),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name'        => 'feature_text',
                                    'label'       => esc_html__('Text', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'feature_price',
                                    'label'       => esc_html__('Price', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                )
                            ),
                            'title_field' => '<i class="{{{ feature_icon }}}" aria-hidden="true"></i> {{{ feature_text }}}',
                            'separator'   => 'before',
                            'empty'       => true
                        ),
                        array(
                            'name'        => 'features_color',
                            'label'       => esc_html__( 'Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'condition'   => [
                                'feature_lists!' => ''
                            ],
                        ),
                        array(
                            'name'        => 'features_custom_color',
                            'label'       => esc_html__( 'Custom Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'features_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'        => 'features_price_bg_color',
                            'label'       => esc_html__( 'Price Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),
                            'separator'   => 'before',
                            'condition'   => [
                                'feature_lists!' => '',
                                'layout'    => ['2']
                            ],
                        ),
                        array(
                            'name'        => 'features_price_bg_custom_color',
                            'label'       => esc_html__( 'Custom Price Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'label_block' => true,
                            'condition'   => [
                                'features_price_bg_color'      => 'custom',
                                'layout'    => ['2']
                            ],
                        ),
                        array(
                            'name'  => 'features_height',
                            'label' => esc_html__( 'Min Height?', 'saniga' ),
                            'type'  => \Elementor\Controls_Manager::NUMBER,
                            'condition'   => [
                                'feature_lists!' => '',
                                'layout'         => ['1']
                            ],
                        ),
                        array(
                            'name'  => 'features_animation',
                            'label' => esc_html__( 'Motion Effect', 'saniga' ),
                            'type'  => \Elementor\Controls_Manager::ANIMATION,
                            'condition'   => [
                                'feature_lists!' => ''
                            ],
                            'separator'   => 'before'
                        ),
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'features2_section',
                    'label'    => esc_html__( 'Features List 2', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'feature2_icon',
                            'type'  => \Elementor\Controls_Manager::ICONS,
                            'label' => esc_html__('Default Icon', 'saniga')
                        ),
                        array(
                            'name'    => 'feature2_lists',
                            'label'   => '',
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #7', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #8', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #9', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #10', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #11', 'saniga' ),
                                ]
                            ],
                            'controls' => array(
                                array(
                                    'name'             => 'feature_icon',
                                    'label'            => esc_html__('Icon', 'saniga'),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                ),
                                array(
                                    'name'        => 'feature_text',
                                    'label'       => esc_html__('Text', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                )
                            ),
                            'title_field' => '<i class="{{{ feature_icon }}}" aria-hidden="true"></i> {{{ feature_text }}}',
                            'separator'   => 'before',
                            'empty'       => true
                        )
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'      => 'button_section',
                    'label'     => esc_html__('Button Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls'  => saniga_elementor_button_settings([
                        'condition' => [],
                        'btn_text'  => 'Explode More',
                        'btn_size'  => 'xl',
                        'btn_align' => 'justify',
                        'icon_default' => [
                            'library' => 'cmsi',
                            'value'   => 'cmsi-arrow-right'  
                        ]
                    ]),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'      => 'button_section2',
                    'label'     => esc_html__('Button Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls'  => saniga_elementor_button_settings([
                        'prefix'          => 'btn2',
                        'btn_text'        => 'Purchase Now',
                        'btn_size'        => 'xl',
                        'btn_color'       => 'secondary',
                        'btn_hover_color' => 'accent',
                        'btn_align'       => 'justify',
                        'icon_default'    => [
                            'library' => 'cmsi',
                            'value'   => 'cmsi-arrow-right'  
                        ]
                    ]),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'     => 'pricing_lists',
                    'label'    => esc_html__('Pricings', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'pricing_list',
                            'label'    => esc_html__('Add Pricing', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'  => 'item_color',
                                        'label' => esc_html__('Color', 'saniga'),
                                        'type'  => \Elementor\Controls_Manager::SELECT,
                                        'options' => saniga_elementor_theme_color_opts(['custom' => false])
                                    ),
                                    array(
                                        'name'  => 'image',
                                        'label' => esc_html__('Image', 'saniga'),
                                        'type'  => \Elementor\Controls_Manager::MEDIA,
                                    ),
                                    array(
                                        'name'  => 'badge_text',
                                        'label' => esc_html__('Badge Text', 'saniga'),
                                        'type'  => \Elementor\Controls_Manager::TEXT,
                                    ),
                                    array(
                                        'name'  => 'selected_icon',
                                        'label' => esc_html__('Select an Icon', 'saniga'),
                                        'type'  => \Elementor\Controls_Manager::ICONS
                                    ),
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__('Title', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'description',
                                        'label'       => esc_html__('Description', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'             => 'feature_icon',
                                        'label'            => esc_html__('Choose Feature Icon', 'saniga'),
                                        'type'             => \Elementor\Controls_Manager::ICONS,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'pricing_list_feature_text',
                                        'label'       => esc_html__('Add Feature', 'saniga'),
                                        'description' => esc_html__('Each feature per line','saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'price_currency',
                                        'label'       => esc_html__('Currency', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => '$',
                                        'label_block' => true,
                                        'separator' => 'before'
                                    ),
                                    array(
                                        'name'        => 'price_value',
                                        'label'       => esc_html__('Price', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => '650',
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'price_duration',
                                        'label'       => esc_html__('Duration', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => '/Mon',
                                        'label_block' => true,
                                    )
                                ),
                                saniga_elementor_button_settings([
                                    'separator' => 'before'
                                ])
                            ),
                            'default' => [
                                [
                                    'image'       => ['url' => get_template_directory_uri().'/elementor/templates/widgets/cms_pricing_table_slide/layout-images/item1.jpg'],
                                    'badge_text'  => '',
                                    'selected_icon' => [
                                        'library' => 'cmsi',
                                        'value'  => 'flaticon-001-house'
                                    ],
                                    'title'       => 'Residential',
                                    'description' => 'We provide residential house cleaning services and always focus on cleaning for health, our extensive industry experience give us a leg up when it comes to leaving your house cleaner, and healthier, than ever before.',
                                    'feature_icon' => [
                                        'library' => 'cmsi',
                                        'value'   => 'cmsi-check-circle'
                                    ],
                                    'pricing_list_feature' => [
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ],
                                        [
                                           'feature_title' => 'Window sills & ledges' 
                                        ]
                                    ],
                                    'btn_text'        => 'Purchase Now',
                                    'btn_size'        => 'xl',
                                    'btn_color'       => 'secondary',
                                    'btn_hover_color' => 'accent',
                                    'icon_default'    => [
                                        'value'   => 'cmsi-arrow-circle-right',
                                        'library' => 'cmsi'
                                    ],
                                    'pricing_list_feature_text' => 'Window sills & ledges
Appliance exteriors
Hard surface floors
Ranges and ovens
Remove cobwebs
Cabinet doors
Empty trash'
                                ],
                                [
                                    'item_color'  => 'accent',
                                    'image'       => ['url' => get_template_directory_uri().'/elementor/templates/widgets/cms_pricing_table_slide/layout-images/item2.jpg'],
                                    'badge_text'  => '',
                                    'selected_icon' => [
                                        'library' => 'cmsi',
                                        'value'  => 'flaticon-025-products'
                                    ],
                                    'title'       => 'Commercial',
                                    'description' => 'Providing commercial cleaning services which will help you protect your customers and employees, we care about clean and it shows in our work, our people, and also in our commitment to delivering on our word, every day.',
                                    'feature_icon' => [
                                        'library' => 'cmsi',
                                        'value'   => 'cmsi-check-circle'
                                    ],
                                    'pricing_list_feature' => [
                                        [
                                           'feature_title' => 'Office Buildings' 
                                        ],
                                        [
                                           'feature_title' => 'Government buildings' 
                                        ],
                                        [
                                           'feature_title' => 'Manufacturing Facilities' 
                                        ],
                                        [
                                           'feature_title' => 'Financial Institutions' 
                                        ],
                                        [
                                           'feature_title' => 'Educational Facilities' 
                                        ],
                                        [
                                           'feature_title' => 'Religious Building' 
                                        ],
                                        [
                                           'feature_title' => 'Medical Facilities' 
                                        ]
                                    ],
                                    'btn_text'        => 'Purchase Now',
                                    'btn_size'        => 'xl',
                                    'btn_color'       => 'accent',
                                    'btn_hover_color' => 'secondary', 
                                    'icon_default'    => [
                                        'value'   => 'cmsi-arrow-circle-right',
                                        'library' => 'cmsi'
                                    ],
                                    'pricing_list_feature_text' => 'Office Buildings
Government buildings
Manufacturing Facilities
Financial Institutions
Educational Facilities
Religious Building
Medical Facilities'
                                ]
                            ],
                            'title_field' => '{{{ title }}}'
                        )
                    ),
                    'condition' => [
                        'layout' => ['3']
                    ]
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);