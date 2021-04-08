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
                            'controls' => array(
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
                                    'type'      => \Elementor\Controls_Manager::TEXT
                                )
                            ),
                            'default' => [
                                [
                                    'small_heading'   => esc_html__( 'Get A Customized Cleaning Plan That Meets Your Needs', 'saniga' ),
                                    'large_heading'   => 'Keep Your Home Clean And Healthy!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home2-1.jpg'
                                    ]
                                ],
                                [
                                    'small_heading'   => esc_html__( 'Get A Customized Cleaning Plan That Meets Your Needs', 'saniga' ),
                                    'large_heading'   => 'Keep Your Home Clean And Healthy!',
                                    'description'     => 'Our cleaning experts deliver the highest quality of clean you can always count, let us help you with all of your cleaning and disinfecting responsibilities now.',
                                    'image'       => [
                                        'url' => get_template_directory_uri().'/assets/images/sliders/home2-2.jpg'
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ large_heading }}}',
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);