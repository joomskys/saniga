<?php
// Register Icon Box Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_icon_box',
        'title'      => esc_html__( 'CMS Icon Box', 'saniga' ),
        'icon'       => 'eicon-icon-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(

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
                            'name'    => 'hover_effect',
                            'label'   => esc_html__( 'Hover Styles', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default','saniga'),
                            ],
                            'default' => ''
                        ),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/4.png'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/5.png'
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/6.png'
                                ],
                                '7' => [
                                    'label' => esc_html__( 'Layout 7', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/7.png'
                                ],
                                '11' => [
                                    'label' => esc_html__( 'Layout 11', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/11.png'
                                ],
                                '12' => [
                                    'label' => esc_html__( 'Layout 12', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_icon_box/layout-images/12.png'
                                ],
                            ],
                            'prefix_class' => 'cms-icon-box-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'color_section',
                    'label'    => esc_html__( 'Colors', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'bg_color',
                                'label'       => esc_html__( 'Background Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'text_color',
                                'label'       => esc_html__( 'Text Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => '',
                            ),
                        ),
                    ),
                    'condition'   => [
                        'layout' => ['2', '6', '12']
                    ]
                ),
                array(
                    'name'     => 'image_section',
                    'label'    => esc_html__( 'Image', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'background_img',
                                'label'            => esc_html__( 'Image', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::MEDIA,
                                'default'          => '',
                            ),
                            array(
                                'name'         => 'background_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full'
                            ),
                        )
                    ),
                    'condition' => [
                        'layout' => ['6']
                    ]
                ),
                array(
                    'name'     => 'icon_section',
                    'label'    => esc_html__( 'Icons', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'icon_type',
                                'label'            => esc_html__( 'Icon Type', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::SELECT,
                                'options'          => [
                                    'icon' => esc_html__('Icon','saniga'),
                                    'img'  => esc_html__('Image','saniga'),
                                ],
                                'default'  => 'icon'
                            ),
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'   => 'cmsi-hydro-power-2',
                                    'library' => 'cmsi',
                                ],
                                'condition' => [
                                    'icon_type'    => 'icon'                            
                                ],
                            ),
                            array(
                                'name'             => 'selected_img',
                                'label'            => esc_html__( 'Image', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::MEDIA,
                                'default'          => '',
                                'condition' => [
                                    'icon_type'    => 'img'                            
                                ],
                            ),
                            array(
                                'name'         => 'thumbnail_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                                'condition'    => [
                                    'icon_type'    => 'img'                            
                                ],
                            ),
                            array(
                                'name'    => 'icon_position',
                                'label'   => esc_html__( 'Icon Position', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::CHOOSE,
                                'options' => [
                                    'start' => [
                                        'title' => esc_html__( 'Left', 'saniga' ),
                                        'icon'  => 'eicon-h-align-left',
                                    ],
                                    'top' => [
                                        'title' => esc_html__( 'Top', 'saniga' ),
                                        'icon'  => 'eicon-v-align-top',
                                    ],
                                    'bottom' => [
                                        'title' => esc_html__( 'Left', 'saniga' ),
                                        'icon'  => 'eicon-v-align-bottom',
                                    ],
                                    'end' => [
                                        'title' => esc_html__( 'Right', 'saniga' ),
                                        'icon'  => 'eicon-h-align-right',
                                    ]
                                ],
                                'prefix_class' => 'cms-icon-box-icon-position-',
                                'toggle'       => false,
                            ),
                            array(
                                'name'               => 'icon_position_start',
                                'label'              => esc_html__('Custom Postion', 'saniga' ),
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
                                    'top' => '',
                                    'left' => ''
                                ],
                                'condition'    => [
                                    'icon_position'    => 'start',
                                    'layout'           => ['2', '6','12']                         
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .icon-position' => 'top: {{TOP}}{{UNIT}};left: {{LEFT}}{{UNIT}}',
                                ],
                            ),
                            array(
                                'name'               => 'icon_position_right',
                                'label'              => esc_html__('Custom Postion', 'saniga' ),
                                'type'               => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type'       => 'responsive',
                                'allowed_dimensions' => ['top', 'right'],
                                'size_units'         => [ 'px', '%' ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'top' => '',
                                    'left' => ''
                                ],
                                'condition'    => [
                                    'icon_position'    => 'top',
                                    'layout'           => ['2','6','12']                          
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .icon-position' => 'top: {{TOP}}{{UNIT}};right: {{RIGHT}}{{UNIT}}',
                                ],
                            ),
                            array(
                                'name'               => 'icon_position_bottom',
                                'label'              => esc_html__('Custom Postion', 'saniga' ),
                                'type'               => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type'       => 'responsive',
                                'allowed_dimensions' => ['bottom', 'left'],
                                'size_units'         => [ 'px', '%' ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'top' => '',
                                    'left' => ''
                                ],
                                'condition'    => [
                                    'icon_position'    => 'bottom',
                                    'layout'           => ['2','6','12']                            
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .icon-position' => 'bottom: {{BOTTOM}}{{UNIT}};left: {{LEFT}}{{UNIT}}',
                                ],
                            ),
                            array(
                                'name'               => 'icon_position_end',
                                'label'              => esc_html__('Custom Postion', 'saniga' ),
                                'type'               => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type'       => 'responsive',
                                'allowed_dimensions' => ['bottom', 'right'],
                                'size_units'         => [ 'px', '%' ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'default' => [
                                    'top' => '',
                                    'left' => ''
                                ],
                                'condition'    => [
                                    'icon_position'    => 'end',
                                    'layout'           => ['2','6','12']                           
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .icon-position' => 'bottom: {{BOTTOM}}{{UNIT}};right: {{RIGHT}}{{UNIT}}',
                                ],
                            ),
                            array(
                                'name'  => 'icon_size',
                                'label' => esc_html__( 'Icon Size', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => 15,
                                        'max' => 300,
                                    ],
                                ],
                                'condition'    => [
                                    'icon_type' => 'icon'                          
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                ]
                            ),
                            array(
                                'name'        => 'icon_color',
                                'label'       => esc_html__( 'Icon Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => '',
                                'condition'    => [
                                    'icon_type'    => 'icon'                            
                                ],
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'text_section',
                    'label'    => esc_html__( 'Title', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'title',
                                'label'       => esc_html__( 'Title', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                                'dynamic'   => [
                                    'active' => true,
                                ],
                            ),
                            array(
                                'name'        => 'title_color',
                                'label'       => esc_html__( 'Title Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'description',
                                'label'       => esc_html__( 'Description', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
                                'rows'        => 10,
                                'show_label'  => false,
                                'dynamic'   => [
                                    'active' => true,
                                ],
                                'separator' => 'before',
                                'condition' => [
                                    'layout!' => ['12']
                                ]
                            ),
                            array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => '',
                                'condition' => [
                                    'layout!' => ['12']
                                ]
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'link_section',
                    'label'    => esc_html__( 'Hyperlink', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'hyperlink',
                                'label'   => esc_html__('Hyperlink As','saniga'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    ''          => esc_html__('Default','saniga'),
                                    'button'    => esc_html__('Button','saniga'),
                                ],
                                'default' => '',
                            )
                        ),
                        saniga_elementor_hyperlink_settings([
                            'condition' => [
                                'hyperlink' => '',                           
                            ],
                        ]),
                        saniga_elementor_button_settings([
                            'condition' => [
                                'hyperlink'    => 'button'                            
                            ],
                            'prefix'           => 'button',
                            'btn_text'         => 'Read More',
                        ])
                    ),
                    'condition' => [
                        'layout' => ['3','4','5','7','11']
                    ]
                ),
                // layout 2 link
                array(
                    'name'     => 'link2_section',
                    'label'    => esc_html__( 'Hyperlink', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_hyperlink_settings([
                        'prefix' => 'layout2'                            
                    ]),
                    'condition' => [
                        'layout' => ['2']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);