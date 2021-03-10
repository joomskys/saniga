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
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_pricing_table/layout-images/4.png'
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
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [],
                        ),
                    ),
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
                    )
                ),
                array(
                    'name'      => 'heading_section',
                    'label'     => esc_html__('Heading Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'heading_text',
                            'label'       => esc_html__( 'Heading', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => 'Starter Plan',
                            'placeholder' => esc_html__( 'Enter your heading', 'saniga' ),
                            'label_block' => true,
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
                            'name' => 'heading_animation',
                            'label' => esc_html__( 'Motion Effect', 'saniga' ),
                            'type' => \Elementor\Controls_Manager::ANIMATION,
                            'condition'   => [
                                'heading_text!' => ''
                            ],
                        ),
                        array(
                            'name'        => 'subheading_text',
                            'label'       => esc_html__( 'Sub Heading', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => 'The perfect plan for small business',  
                            'placeholder' => esc_html__( 'Enter your sub heading', 'saniga' ),
                            'label_block' => true,
                        ),
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
                    'name'      => 'price_section',
                    'label'     => esc_html__('Price Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'slashed_price_value',
                            'label'       => esc_html__('Slashed Price', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'price_currency',
                            'label'       => esc_html__('Currency', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '$',
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'price_value',
                            'label'       => esc_html__('Price', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '29',
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'price_separator',
                            'label'       => esc_html__('Divider', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'price_duration',
                            'label'       => esc_html__('Duration', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => 'Month',
                            'label_block' => true,
                        ),
                    ),
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
                            'name'    => 'feature_lists',
                            'label'   => '',
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #1', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #2', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #3', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #4', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #5', 'saniga' ),
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #6', 'saniga' ),
                                ],
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
                            'default'     => '',
                            'label_block' => true,
                            'separator'   => 'before',
                            'condition'   => [
                                'feature_lists!' => ''
                            ],
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
                            'name'        => 'features_price_bg_color',
                            'label'       => esc_html__( 'Price Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
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
                    )
                ),
                array(
                    'name'     => 'features2_section',
                    'label'    => esc_html__( 'Features List 2', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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
                                ],
                                [
                                    'feature_icon' => '',
                                    'feature_text' => esc_html__( 'Your feature text #12', 'saniga' ),
                                ],
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
                        )
                    )
                ),
                array(
                    'name'      => 'button_section',
                    'label'     => esc_html__('Button Settings', 'saniga'),
                    'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls'  => saniga_elementor_button_settings([
                        'condition' => [],
                        'btn_text'  => 'Read More'
                    ])
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);