<?php
// Register Testimonial List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_slider',
        'title'      => esc_html__('CMS Slider', 'saniga'),
        'icon'       => 'eicon-slides',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array( 
            'jquery-slick',
            'cms-jquery-slick',
            'jquery',
            'magnific-popup'
        ),
        'styles' => array(
            'magnific-popup'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_slider/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_slider/layout-images/2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-slider-layout-'
                        )
                    ),
                ),
                 array(
                    'name'     => 'slider_settings',
                    'label'    => esc_html__('Settings', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'label'        => esc_html__('Slider Height', 'saniga'), 
                            'name'         => 'slider_height',
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'selectors'    => [
                                '{{WRAPPER}} .cms-sliders' => 'height:{{VALUE}}px'
                            ],
                            'default'      => '740' 
                        ),
                        array(
                            'label'        => esc_html__('Content Width', 'saniga'), 
                            'name'         => 'content_width',
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'options'      => [
                                ''                => esc_html__('Default','saniga'),
                                'container'       => esc_html__('Boxed','saniga'),
                                'container-wide'  => esc_html__('Wide','saniga'),
                                'container-fluid' => esc_html__('Full Width','saniga')
                            ] 
                        )
                    )
                ),
                array(
                    'name'     => 'slider_small_heading_typo',
                    'label'    => esc_html__('Small Heading Typo', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'small_heading_typo',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .small-heading'
                        ),
                        array(
                            'name'         => 'small_heading_shadow',
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .small-heading'
                        )
                    )
                ),
                array(
                    'name'     => 'slider_large_heading_typo',
                    'label'    => esc_html__('Large Heading Typo', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'large_heading_typo',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .large-heading'
                        ),
                        array(
                            'name'         => 'large_heading_shadow',
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .large-heading'
                        )
                    )
                ),
                array(
                    'name'     => 'slider_description_typo',
                    'label'    => esc_html__('Description Typo', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'description_typo',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .description'
                        ),
                        array(
                            'name'         => 'description_shadow',
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .description'
                        )
                    )
                ),
                array(
                    'name'     => 'cms_slides_list',
                    'label'    => esc_html__('Slides List', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'cms_slides',
                            'label'    => esc_html__('Add Slide', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'image',
                                        'label'       => esc_html__('Slide Image', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::MEDIA,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'small_heading',
                                        'label'       => esc_html__('Small Heading'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'small_heading_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'small_heading_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'small_heading_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .small-heading' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'        => 'small_heading_animation',
                                        'label'       => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::ANIMATION,
                                        'label_block' => false,
                                    ),
                                    array(
                                        'name'      => 'small_heading_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT
                                    ),
                                    array(
                                        'name'        => 'large_heading',
                                        'label'       => esc_html__('Large Heading'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'large_heading_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'large_heading_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'large_heading_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .large-heading' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'      => 'large_heading_animation',
                                        'label'     => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::ANIMATION
                                    ),
                                    array(
                                        'name'      => 'large_heading_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT
                                    ),
                                    array(
                                        'name'        => 'description',
                                        'label'       => esc_html__('Description'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'description_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'description_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'description_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .description' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'      => 'description_animation',
                                        'label'     => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::ANIMATION
                                    ),
                                    array(
                                        'name'      => 'description_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT,
                                        'separator' => 'after'
                                    ),

                                    array(
                                        'name'        => 'description2_icon',
                                        'label'       => esc_html__('Description2 Icon'),
                                        'type'        => \Elementor\Controls_Manager::ICONS,
                                        'label_block' => true,
                                        'separator'   => 'before',
                                        'default'     => [
                                            'library' => 'flaticon',
                                            'value'   => 'flaticon-020-character'
                                        ]  
                                    ),
                                    array(
                                        'name'        => 'description2',
                                        'label'       => esc_html__('Description2'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'default'     => 'Delivering the highest standards of clean and guarantee to treat your home and office.',
                                        'separator'   => 'before'
                                    ),
                                ),
                                // button our service
                                saniga_elementor_button_settings([
                                    'btn_text'         => 'Our Services',
                                    'btn_type_default' => 'btn btn-fill', 
                                    'btn_size'         => 'xl',
                                    'btn_color'        => 'white',
                                    'btn_hover_color'  => 'secondary',
                                    'icon_default'     => [
                                        'library' => 'cmsi',
                                        'value'   => 'cmsi-arrow-right'   
                                    ]
                                ]),
                                // video 
                                array(
                                    array(
                                        'name'        => 'video_link',
                                        'label'       => esc_html__( 'Video URL', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::URL,
                                        'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                                        'default'     => [
                                            'url'         => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                                            'is_external' => 'on'
                                        ],
                                        'separator' => 'before'
                                    ),
                                    array(
                                        'name'        => 'video_text',
                                        'label'       => esc_html__( 'Video Text', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => esc_html__('Our Video!','saniga')
                                    )
                                )
                            ),
                            'default' => [
                                [
                                    'small_heading'   => esc_html__( 'Get A Customized Cleaning Plan That Meets Your Needs', 'saniga' ),
                                    'large_heading'   => 'Keep Your Home Clean And Healthy!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'description2'    => 'Delivering the highest standards of clean and guarantee to treat your home and office.',
                                    'description2_icon' => [
                                        'library' => 'flaticon',
                                        'value'   => 'flaticon-020-character'
                                    ],
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home2-1.jpg'
                                    ]
                                ],
                                [
                                    'small_heading'   => esc_html__( 'Get A Customized Cleaning Plan That Meets Your Needs', 'saniga' ),
                                    'large_heading'   => 'Helping Industries And Huge Facilities!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'description2'    => 'We proudly offer our proprietary Capture and Cleaning system, which works better.',
                                    'description2_icon' => [
                                        'library' => 'flaticon',
                                        'value'   => 'flaticon-037-towel'
                                    ],
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home2-2.jpg'
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ large_heading }}}',
                        )
                    ),
                    'condition' => [
                        'layout' => '1'
                    ]
                ),
                array(
                    'name'     => 'rating_section',
                    'label'    => esc_html__('Rate Settings', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'  => 'show_rate',
                            'type'  => \Elementor\Controls_Manager::SWITCHER,
                            'label' => esc_html__( 'Show Rate', 'saniga' ),
                            'default' => 'true'
                        ),
                        array(
                            'name'  => 'rate_star',
                            'type'  => \Elementor\Controls_Manager::MEDIA,
                            'label' => esc_html__( 'Star Icon', 'saniga' ),
                            'default' => [
                                'url' => get_template_directory_uri().'/assets/images/icons/star-three.png'
                            ],
                            'condition' => [
                                'show_rate' => 'true'
                            ]
                        ),
                        array(
                            'name'  => 'rate_star_bg',
                            'type'  => \Elementor\Controls_Manager::COLOR,
                            'label' => esc_html__( 'Star Icon Background', 'saniga' ),
                            'condition' => [
                                'show_rate' => 'true'
                            ]
                        ),
                        array(
                            'name'  => 'rate_value',
                            'label' => esc_html__( 'Percent Value', 'saniga' ),
                            'type'  => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                '%' => [
                                    'min' => 1,
                                    'max' => 100,
                                ]
                            ],
                            'size_units' => ['%'],
                            'default' => [
                                'unit' => '%',
                                'size' => '97' 
                            ],
                            'condition' => [
                                'show_rate' => 'true'
                            ]
                        ),
                        array(
                            'name'  => 'rate_text',
                            'type'  => \Elementor\Controls_Manager::TEXTAREA,
                            'label' => esc_html__( 'Rate Text', 'saniga' ),
                            'condition' => [
                                'show_rate' => 'true'
                            ]
                        )
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'cms_slides_list2',
                    'label'    => esc_html__('Slides List', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'cms_slides2',
                            'label'    => esc_html__('Add Slide', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'image',
                                        'label'       => esc_html__('Slide Image', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::MEDIA,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'small_heading',
                                        'label'       => esc_html__('Small Heading'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'small_heading_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'small_heading_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'small_heading_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .small-heading' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'        => 'small_heading_animation',
                                        'label'       => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::ANIMATION,
                                        'label_block' => false,
                                    ),
                                    array(
                                        'name'      => 'small_heading_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT
                                    ),
                                    array(
                                        'name'        => 'large_heading',
                                        'label'       => esc_html__('Large Heading'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'large_heading_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'large_heading_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'large_heading_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .large-heading' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'      => 'large_heading_animation',
                                        'label'     => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::ANIMATION
                                    ),
                                    array(
                                        'name'      => 'large_heading_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT
                                    ),
                                    array(
                                        'name'        => 'description',
                                        'label'       => esc_html__('Description'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
                                        'label_block' => true,
                                        'separator'   => 'before'
                                    ),
                                    array(
                                        'name'        => 'description_color',
                                        'label'       => esc_html__( 'Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::SELECT,
                                        'options'     => saniga_elementor_theme_color_opts()
                                    ),
                                    array(
                                        'name'        => 'description_custom_color',
                                        'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::COLOR,
                                        'condition'   => [
                                            'description_color'      => 'custom'
                                        ],
                                        'selectors'  => [
                                            '{{WRAPPER}} .description' => 'color:{{VALUE}};'
                                        ]
                                    ),
                                    array(
                                        'name'      => 'description_animation',
                                        'label'     => esc_html__( 'Motion Effect', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::ANIMATION
                                    ),
                                    array(
                                        'name'      => 'description_animation_delay',
                                        'label'     => esc_html__( 'Transition Delay', 'saniga' ),
                                        'type'      => \Elementor\Controls_Manager::TEXT,
                                        'separator' => 'after'
                                    )
                                ),
                                // button More About Us
                                saniga_elementor_button_settings([
                                    'btn_text'         => 'More About Us',
                                    'btn_type_default' => 'btn btn-fill', 
                                    'btn_size'         => 'xl',
                                    'icon_default'     => [
                                        'library' => 'cmsi',
                                        'value'   => 'cmsi-arrow-right'   
                                    ]
                                ]),
                                // button Shop Now
                                saniga_elementor_button_settings([
                                    'prefix'           => 'btn2', 
                                    'btn_text'         => 'Shop Now',
                                    'btn_type_default' => 'btn btn-fill', 
                                    'btn_size'         => 'xl',
                                    'btn_color'        => 'white',
                                    'btn_hover_color'  => 'secondary',
                                    'icon_default'     => []
                                ]),
                                // video 
                                array(
                                    array(
                                        'name'        => 'video_link',
                                        'label'       => esc_html__( 'Video URL', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::URL,
                                        'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                                        'default'     => [
                                            'url'         => '',
                                            'is_external' => 'on'
                                        ],
                                        'separator' => 'before'
                                    ),
                                    array(
                                        'name'        => 'video_text',
                                        'label'       => esc_html__( 'Video Text', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'default'     => esc_html__('Our Video!','saniga')
                                    )
                                )
                            ),
                            'default' => [
                                [
                                    'small_heading'   => esc_html__( 'Explore Our Featured Products', 'saniga' ),
                                    'large_heading'   => 'Cleaning Supplies For All Needs!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home3-1.jpg'
                                    ]
                                ],
                                [
                                    'small_heading'   => esc_html__( 'Explore Our Featured Products', 'saniga' ),
                                    'large_heading'   => 'Helping Industries And Huge Facilities!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home3-2.jpg'
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ large_heading }}}',
                        )
                    ),
                    'condition' => [
                        'layout' => '2'
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);