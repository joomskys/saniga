<?php
// Register Fancy Box Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_fancy_box',
        'title'      => esc_html__( 'CMS Fancy Box', 'saniga' ),
        'icon'       => 'eicon-icon-box',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
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
                            ]
                        ),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/4.png'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/5.png'
                                ],
                                '6' => [
                                    'label' => esc_html__( 'Layout 6', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/6.png'
                                ],
                                '7' => [
                                    'label' => esc_html__( 'Layout 7', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/7.png'
                                ],
                                '8' => [
                                    'label' => esc_html__( 'Layout 8', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/8.png'
                                ],
                                '9' => [
                                    'label' => esc_html__( 'Layout 9', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/9.png'
                                ],
                                '10' => [
                                    'label' => esc_html__( 'Layout 10', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/10.png'
                                ],
                                '11' => [
                                    'label' => esc_html__( 'Layout 11', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/11.png'
                                ],
                                '12' => [
                                    'label' => esc_html__( 'Layout 12', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_fancy_box/layout-images/12.png'
                                ]
                            ],
                            'prefix_class' => 'cms-fancybox-layout-'
                        )
                    )
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
                                    ''     => esc_html__('Default','saniga'),
                                    'icon' => esc_html__('Icon','saniga'),
                                    'img'  => esc_html__('Image','saniga'),
                                ]
                            ),
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [],
                                'condition' => [
                                    'icon_type'    => ['','icon']                            
                                ],
                            ),
                            array(
                                'name'             => 'selected_img',
                                'label'            => esc_html__( 'Image', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::MEDIA,
                                'default'          => '',
                                'condition' => [
                                    'icon_type'    => ['','img']                            
                                ],
                            ),
                            array(
                                'name'         => 'thumbnail_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'condition'    => [
                                    'icon_type'    => 'img'                            
                                ],
                                'default' => 'custom'
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
                                    '{{WRAPPER}} .cms-fancyicon' => 'font-size: {{SIZE}}{{UNIT}};',
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
                            )
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
                                'name'        => 'small_title',
                                'label'       => esc_html__( 'Small Text', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                'label_block' => true,
                                'dynamic'   => [
                                    'active' => true,
                                ],
                                'condition' => [
                                    'layout' => ['11']
                                ]
                            ),
                            array(
                                'name'        => 'title',
                                'label'       => esc_html__( 'Title', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                                'dynamic'   => [
                                    'active' => true,
                                ]
                            ),
                            array(
                                'name'        => 'title_color',
                                'label'       => esc_html__( 'Title Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
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
                                    'layout' => ['2','5','6','7','8','10']
                                ]
                            ),
                            array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),
                                'condition' => [
                                    'description!' => ''
                                ]
                            )
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
                                    'text_link' => esc_html__('Text Link','saniga'),
                                    'button'    => esc_html__('Button','saniga'),
                                ]
                            )
                        ),
                        saniga_elementor_hyperlink_settings([
                            'condition' => [
                                'hyperlink' => '',                           
                            ]
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
                        'layout' => ['1','3','4','5']
                    ]
                ),
                array(
                    'name'     => 'link_section2',
                    'label'    => esc_html__( 'Link', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'link_section2',
                        'btn_text'         => 'Explore More',
                        'btn_align'        => 'center' 
                    ]),
                    'condition' => [
                        'layout' => ['2']   
                    ]
                ),
                array(
                    'name'     => 'link_section6',
                    'label'    => esc_html__( 'Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'button6',
                            'btn_type_default' => 'btn btn-outline', 
                            'btn_text'         => 'Explore More',
                            'btn_color'        => 'primary',
                            'btn_hover_color'  => 'accent'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['6']
                    ]
                ),
                array(
                    'name'     => 'phone_section8',
                    'label'    => esc_html__( 'Phone', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'phone_number',
                            'label' => esc_html__('Phone Number','saniga'),
                            'type'  => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name'        => 'phone_color',
                            'label'       => esc_html__( 'Phone Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                        )
                    ),
                    'condition' => [
                        'layout' => ['8']
                    ]
                ),
                array(
                    'name'     => 'link_section8',
                    'label'    => esc_html__( 'Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'button8',
                            'btn_type_default' => 'btn btn-outline', 
                            'btn_text'         => 'Explore Our Offers',
                            'btn_color'        => 'white',
                            'btn_hover_color'  => 'white',
                            'btn_size'         => 'xl',
                            'btn_align'        => 'justify'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['8']
                    ]
                ),
                array(
                    'name'     => 'contact_section9',
                    'label'    => esc_html__( 'Contact Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'contact_list3',
                                'label'    => esc_html__( 'Contact Lists', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array_merge(
                                    array(
                                        array(
                                            'name'             => 'contact_list_icon',
                                            'label'            => esc_html__( 'Icon', 'saniga' ),
                                            'type'             => \Elementor\Controls_Manager::ICONS,
                                            'default'          => [
                                                'library'   => 'cmsi',
                                                'value'     => 'cmsi-arrow-cirle-right'
                                            ]
                                        ),
                                        array(
                                            'name'        => 'contact_list_title',
                                            'label'       => esc_html__( 'Title', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                            'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                            'default'     => esc_html__( 'Enter your text', 'saniga' ),
                                            'label_block' => true,
                                        ),
                                        array(
                                            'name'        => 'contact_list_text',
                                            'label'       => esc_html__( 'Text', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                            'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                            'default'     => esc_html__( 'Enter your text', 'saniga' ),
                                            'label_block' => true,
                                        ),
                                        array(
                                            'name'        => 'contact_list_text_link',
                                            'label'       => esc_html__( 'Link', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::URL,
                                            'placeholder' => esc_html__('https://your-link.com', 'saniga' ),
                                            'label_block' => true,
                                        )
                                    ),
                                    saniga_elementor_theme_colors([
                                        'name'            => 'contact_list_text_color3',
                                        'label'           => esc_html__('Text Color','saniga'),
                                        'custom_name'     => 'contact_list_text_color_custom3',
                                        'custom_label'    => esc_html__('Custom Text Color','saniga'),
                                        'custom_selector' => '.cms-qc-list'
                                    ])
                                ),
                                'default' => [
                                    [
                                        'contact_list_title' => 'Emergency Line:',
                                        'contact_list_text'  => '(002) 01061245741',
                                        'contact_list_icon'  => [
                                            'library' => 'cmsi',
                                            'value'   => 'cmsi-phone-alt'
                                        ]
                                    ],
                                    [
                                        'contact_list_title' => 'Location:',
                                        'contact_list_text'  => 'Brooklyn, New York, USA',
                                        'contact_list_icon'  => [
                                            'library' => 'cmsi',
                                            'value'   => 'cmsi-map'
                                        ]
                                    ],
                                    [
                                        'contact_list_title' => 'Mon - Fri:',
                                        'contact_list_text'  => '8:00 am - 7:00 pm',
                                        'contact_list_icon'  => [
                                            'library' => 'cmsi',
                                            'value'   => 'cmsi-clock'
                                        ]
                                    ]
                                ],
                                'title_field' => '{{{ contact_list_title }}} {{{ contact_list_text }}}',
                            )
                        ),
                        saniga_elementor_theme_colors([
                            'name'            => 'text_color3',
                            'label'           => esc_html__('Text Color','saniga'),
                            'custom_name'     => 'text_color_custom3',
                            'custom_label'    => esc_html__('Custom Text Color','saniga'),
                            'custom_selector' => '.cms-qc-list'
                        ]),
                        array(  
                            array(
                                'name'  => 'contact_list_icon_size3',
                                'label' => esc_html__( 'Icon Size', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => 10,
                                        'max' => 200,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .cms-qc-list .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                                ]
                            )
                        ),
                        saniga_elementor_theme_colors([
                            'name'            => 'contact_list_icon_color3',
                            'label'           => esc_html__('Icon Color','saniga'),
                            'custom_name'     => 'contact_list_icon_color_custom3',
                            'custom_label'    => esc_html__('Custom Icon Color','saniga'),
                            'custom_selector' => '.cms-qc-list .cms-icon'
                        ])
                    ),
                    'condition'   => [
                        'layout' => ['9']
                    ]
                ),
                array(
                    'name'     => 'link_section9',
                    'label'    => esc_html__( 'Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'button9',
                            'btn_type_default' => 'btn btn-outline', 
                            'btn_text'         => 'Explore Our Offers',
                            'btn_color'        => 'white',
                            'btn_hover_color'  => 'white',
                            'btn_size'         => 'xl',
                            'btn_align'        => 'justify'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['9']
                    ]
                ),
                array(
                    'name'     => 'link_section11',
                    'label'    => esc_html__( 'Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'button11',
                            'btn_text'         => 'Add To Cart',
                            'btn_color'        => 'white',
                            'btn_size'         => 'lg',
                            'icon_default'     => [
                                'library' => 'cmsi',
                                'value'   => 'cmsi-shopping-cart'  
                            ]
                        ])
                    ),
                    'condition' => [
                        'layout' => ['11']
                    ]
                ),
                array(
                    'name'     => 'link_section12',
                    'label'    => esc_html__( 'Button', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'button12',
                            'btn_text'         => 'Explore Our Offers',
                            'btn_color'        => 'primary',
                            'btn_size'         => 'xl'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['12']
                    ]
                ),
                array(
                    'name'     => 'saleoff_section11',
                    'label'    => esc_html__( 'Sale Off', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'  => 'saleoff11',
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'label' => esc_html__( 'Sale Off', 'saniga' ),
                                'range' => [
                                    '%' => [
                                        'min'  => 1,
                                        'max'  => 100,
                                        'step' => 1
                                    ]
                                ],
                                'size_units' => [''],
                                'default' => [
                                    'unit' => '%',
                                    'size' => 50
                                ]
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['11']
                    ]
                ),
                array(
                    'name'     => 'background_section',
                    'label'    => esc_html__( 'Background', 'saniga' ),
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
                            )
                        ),
                        saniga_elementor_theme_colors([
                            'name'                => 'bg_color',
                            'label'               => esc_html__('Background Color','saniga'),
                            'custom_name'         => 'background_color_custom',
                            'custom_label'        => esc_html__('Custom Background Color','saniga'),
                            'custom_selector'     => '.cms-fancybox',
                            'custom_selector_tag' => 'background-color'
                        ]) 
                    ),
                    'condition'   => [
                        'layout' => ['1','3','4','6','8','9','11','12']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);