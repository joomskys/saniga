<?php
// Register Banner Box Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_locate_pointers',
        'title'      => esc_html__('CMS Locate Pointers', 'saniga' ),
        'icon'       => 'eicon-info-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__('Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__('Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_locate_pointers/layout-images/layout1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_locate_pointers/layout-images/layout2.png'
                                ],
                            ],
                            'prefix_class' => 'cms-locate-pointer-layout-'
                        ),
                    ),
                ),
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__('Banner Box', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        saniga_elementor_text_align([
                            'label' => esc_html__('Backround Image Alignment','saniga'),
                            'label_block' => 'true'
                        ]),
                        array(
                            'name'    => 'image_bg',
                            'label'   => esc_html__('Backround Image', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                'url' => get_template_directory_uri().'/assets/images/world-map.png',
                            ]
                        ),
                        array(
                            'name'     => 'content_list',
                            'label'    => esc_html__('Pointers List', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'default'  => [
                                [
                                    'image'         => [],
                                    'selected_icon' => [
                                        'value'     => 'cmsi-solar-panel',
                                        'library'   => 'cmsi'        
                                    ],
                                    'number'        => '748',
                                    'content'       => 'Awards Milestones Awarded To Us.',
                                    'content_hover' => 'holder-right',
                                    'item_postion'  => [
                                        'unit' => '%',
                                        'top'  => '26',
                                        'left' => '19'
                                    ]
                                ],
                                [
                                    'image'         => [],
                                    'selected_icon' => [
                                        'value'     => 'cmsi-solar-panel',
                                        'library'   => 'cmsi' 
                                    ],
                                    'number'        => '2307',
                                    'content'       => 'Beverley Rd Brooklyn, New York 11226 U.S.',
                                    'content_hover' => 'holder-right',
                                    'item_postion'  => [
                                        'unit' => '%',
                                        'top'  => '44',
                                        'left' => '46'
                                    ]
                                ],
                                [
                                    'image'         => [],
                                    'selected_icon' => [
                                        'value'     => 'cmsi-solar-panel',
                                        'library'   => 'cmsi' 
                                    ],
                                    'number'        => '',
                                    'content'       => '',
                                    'content_hover' => 'holder-right',
                                    'item_postion'  => [
                                        'unit' => '%',
                                        'top'  => '16',
                                        'left' => '63'
                                    ]
                                ]
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image Pointers', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                    'default'     => [ 
                                        'url' => ''
                                    ]
                                ),
                                array(
                                    'name'             => 'selected_icon',
                                    'label'            => esc_html__( 'Icon', 'saniga' ),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default'          => [
                                        'value'   => 'cmsi-solar-panel',
                                        'library' => 'cmsi',
                                    ]
                                ),
                                array(
                                    'name'        => 'number',
                                    'label'       => esc_html__('Add Number', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'default'     => ''
                                ),
                                array(
                                    'name'        => 'content',
                                    'label'       => esc_html__('Content', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'    => 'content_hover',
                                    'label'   => esc_html__('Holder Style', 'saniga' ),
                                    'type'    => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'holder-right' => 'Holder Right',
                                        'holder-left'  => 'Holder Left'
                                    ],
                                    'default' => 'holder-right',
                                ),
                                array(
                                    'name'               => 'item_postion',
                                    'label'              => esc_html__('Item Postion', 'saniga' ),
                                    'type'               => \Elementor\Controls_Manager::DIMENSIONS,
                                    'control_type'       => 'responsive',
                                    'allowed_dimensions' => ['top', 'left'],
                                    'size_units'         => [ 'px', '%' ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'default' => [
                                        'top' => '10',
                                        'left' => '10'
                                    ],
                                    'selectors' => [
                                        '{{WRAPPER}} {{CURRENT_ITEM}}.item-pointer' => 'top: {{TOP}}{{UNIT}};left: {{LEFT}}{{UNIT}};',
                                        '.rtl {{WRAPPER}} {{CURRENT_ITEM}}.item-pointer' => 'left: auto; right: {{LEFT}}{{UNIT}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ content }}}',
                        ),
                        array(
                            'name'    => 'cms_animate',
                            'label'   => esc_html__('Theme Animate', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => saniga_animate(),
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);