<?php
// Register How It Work Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_pricing_table_slide',
        'title'      => esc_html__('CMS Pricing Table Slider', 'saniga'),
        'icon'       => 'eicon-price-table',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-jquery-slick',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'saniga' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'saniga' ),
                            'type' => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table_slide/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table_slide/layout-images/2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-pricing-slide-layout-'
                        )
                    ),
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
                                    /*array(
                                        'name'     => 'pricing_list_feature',
                                        'label'    => esc_html__('Add Feature', 'saniga'),
                                        'type'     => \Elementor\Controls_Manager::REPEATER,
                                        'controls' => array(
                                            array(
                                                //'fields'      => 'xxx',
                                                'name'        => 'feature_title',
                                                'label'       => esc_html__('Title', 'saniga'),
                                                'type'        => \Elementor\Controls_Manager::TEXT,
                                                'label_block' => true,
                                            )
                                        ),
                                        'title_field' => '{{{feature_title}}}',
                                    ),*/
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
                                    'badge_text'  => 'Best Choice',
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
                                    'badge_text'  => 'Best Value',
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
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);