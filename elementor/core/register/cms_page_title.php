<?php
// Register Page Title Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_page_title',
        'title'      => esc_html__( 'CMS Page Title', 'saniga' ),
        'icon'       => 'eicon-archive-title',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_text_align(['default' => '']),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label'      => esc_html__( 'Layout 1', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_page_title/layout-images/1.png'
                                ],
                                '2' => [
                                    'label'      => esc_html__( 'Layout 2', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_page_title/layout-images/2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-page-title-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'settings_section',
                    'label'    => esc_html__( 'Setting', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' =>  array(
                        array(
                            'name'         => 'content_col',
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'label'        => esc_html__('Content Width','saniga'),  
                            'options'      => ['' => esc_html__('Default','saniga'),1,2,3,4,5,6,7,8,9,10,11,12],
                            'control_type' => 'responsive'
                        )
                    )
                ),
                array(
                    'name'     => 'heading_section',
                    'label'    => esc_html__( 'Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'     => '',
                                    'library'   => '',
                                ],
                                'condition' => [
                                    'layout'    => ['0']                            
                                ],
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your title. Default is title of page', 'saniga' ),
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
                        )
                    )
                ),
                array(
                    'name'     => 'subheading_section',
                    'label'    => esc_html__( 'Sub Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'subheading_text',
                                'label'       => esc_html__( 'Sub Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your sub title', 'saniga' ),
                                'label_block' => true,
                                'condition'   => [],
                            ),
                            array(
                                'name'        => 'subheading_color',
                                'label'       => esc_html__( 'Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'sheading_custom_color',
                                'label'       => esc_html__( 'Custom Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'subheading_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'subheading_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'subheading_text!' => ''
                                ],
                            ),
                        )
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
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
                                'default'     => '',
                                'placeholder' => esc_html__( 'Enter your description. Default is excerpt', 'saniga' ),
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
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'breadcrumb_section',
                    'label'    => esc_html__( 'Breadcrumb', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'show_breadcrumb',
                            'label'   => esc_html__( 'Show Breadcrumb', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default', 'saniga'),
                                '1' => esc_html__('Yes', 'saniga'),
                                '0' => esc_html__('No', 'saniga')
                            ]    
                        ),
                        array(
                            'name'        => 'breadcrumb_link_color',
                            'label'       => esc_html__( 'Breadcrumb Link Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
                            'condition'   => [
                                'show_breadcrumb'      => ['', '1']
                            ],
                            'separator'     => 'before'
                        ),
                        array(
                            'name'        => 'breadcrumb_link_custom_color',
                            'label'       => esc_html__( 'Custom Breadcrumb Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'breadcrumb_link_color'      => 'custom'
                            ],
                        ),
                        array(
                            'name'        => 'breadcrumb_color',
                            'label'       => esc_html__( 'Breadcrumb Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
                            'condition'   => [
                                'show_breadcrumb'      => ['','1']
                            ],
                            'separator'     => 'before'
                        ),
                        array(
                            'name'        => 'breadcrumb_custom_color',
                            'label'       => esc_html__( 'Custom Breadcrumb Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'breadcrumb_color'      => 'custom'
                            ],
                        ),
                    )
                ),
                array(
                    'name'     => 'button_section',
                    'label'    => esc_html__( 'Button 01', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'btn_size'         => 'xl',
                        ]),
                        array(
                            array(
                                'name'  => 'button_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'btn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'button_section2',
                    'label'    => esc_html__( 'Button 02', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'btn2',
                            'btn_text'         => 'Pricing & Plans',
                            'btn_type_default' => 'btn btn-outline',
                            'btn_color'        => 'white',
                            'btn_hover_color'  => 'white',
                            'btn_size'         => 'xl',
                            'icon_default'     => [
                                'value'   => '',
                                'library' => ''
                            ]
                        ]),
                        array(
                            array(
                                'name'  => 'button2_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'btn2btn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'button_section3',
                    'label'    => esc_html__( 'Buttons 03', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'           => 'btn3',
                            'btn_text'         => 'Request An Estimate',
                            'btn_color'        => 'white',
                            'btn_hover_color'  => 'accent',
                            'btn_size'         => 'xl', 
                        ]),
                        array(
                            array(
                                'name'  => 'button3_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'btn3btn_text!' => ''
                                ],
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'background_section',
                    'label'    => esc_html__( 'Background', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'background',
                            'label'       => esc_html__( 'Background Image', 'saniga' ),
                            'description' => esc_html__( 'Choose Background. Default is post feature image', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::MEDIA  
                        ),
                        array(
                            'name'        => 'bg_overlay',
                            'label'       => esc_html__( 'Background Overlay', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'label_block' => true,
                            'options'     => [
                                ''       => esc_html__('Default', 'saniga'),
                                'none'   => esc_html__('None', 'saniga'),
                                'custom' => esc_html__('Custom', 'saniga')
                            ]
                        ),
                        array(
                            'name'        => 'bg_overlay_color',
                            'label'       => esc_html__( 'Background Overlay Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'options'     => '',  
                            'default'     => '',
                            'condition'   => [
                                'bg_overlay!' => 'none'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-page-title-gradient' => 'background-color: {{VALUE}};'
                            ]
                        ),
                        array(
                            'name'       => 'bg_overlay_color_stop',
                            'label'      => _x( 'Location', 'Background Control', 'saniga' ),
                            'type'       => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'default'    => [
                                'unit' => '%',
                                'size' => 0,
                            ],
                            'render_type' => 'ui',
                            'of_type'     => 'gradient',
                            'condition'   => [
                                'bg_overlay' => ['custom']
                            ],
                        ),
                        array(
                            'name'        => 'bg_overlay_color_b',
                            'label'       => _x( 'Second Color', 'Background Control', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'default'     => '#f2295b',
                            'render_type' => 'ui',
                            'condition'   => [
                                'bg_overlay' => ['custom']
                            ],
                            'of_type' => 'gradient',
                        ),
                        array(
                            'name'       => 'bg_overlay_color_b_stop',
                            'label'      => _x( 'Location', 'Background Control', 'saniga' ),
                            'type'       => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ '%' ],
                            'default'    => [
                                'unit' => '%',
                                'size' => 100,
                            ],
                            'render_type' => 'ui',
                            'condition'   => [
                                'bg_overlay'      => [ 'custom' ],
                            ],
                            'of_type' => 'gradient',
                        ),
                        array(
                            'name'    => 'bg_overlay_type',
                            'label'   => _x( 'Type', 'Background Control', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'linear' => _x( 'Linear', 'Background Control', 'saniga' ),
                                'radial' => _x( 'Radial', 'Background Control', 'saniga' ),
                            ],
                            'default'     => 'linear',
                            'render_type' => 'ui',
                            'condition'   => [
                                'bg_overlay'      => [ 'custom' ],
                            ],
                            'of_type' => 'gradient',
                        ),
                        array(
                            'name'       => 'bg_overlay_angle',
                            'label'      => _x( 'Angle', 'Background Control', 'saniga' ),
                            'type'       => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'deg' ],
                            'default'    => [
                                'unit' => 'deg',
                                'size' => 180,
                            ],
                            'range' => [
                                'deg' => [
                                    'step' => 10,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-page-title-gradient' => 'background-color: transparent; background-image: linear-gradient({{SIZE}}{{UNIT}}, {{bg_overlay_color.VALUE}} {{bg_overlay_color_stop.SIZE}}{{bg_overlay_color_stop.UNIT}}, {{bg_overlay_color_b.VALUE}} {{bg_overlay_color_b_stop.SIZE}}{{bg_overlay_color_b_stop.UNIT}})',
                            ],
                            'condition' => [
                                'bg_overlay'      => [ 'custom' ],
                                'bg_overlay_type' => 'linear',
                            ],
                            'of_type' => 'gradient',
                        ),
                        array(
                            'name'    => 'bg_overlay_position',
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'center center' => _x( 'Center Center', 'Background Control', 'saniga' ),
                                'center left'   => _x( 'Center Left', 'Background Control', 'saniga' ),
                                'center right'  => _x( 'Center Right', 'Background Control', 'saniga' ),
                                'top center'    => _x( 'Top Center', 'Background Control', 'saniga' ),
                                'top left'      => _x( 'Top Left', 'Background Control', 'saniga' ),
                                'top right'     => _x( 'Top Right', 'Background Control', 'saniga' ),
                                'bottom center' => _x( 'Bottom Center', 'Background Control', 'saniga' ),
                                'bottom left'   => _x( 'Bottom Left', 'Background Control', 'saniga' ),
                                'bottom right'  => _x( 'Bottom Right', 'Background Control', 'saniga' ),
                            ],
                            'default'   => 'center center',
                            'selectors' => [
                                '{{WRAPPER}} .cms-page-title-gradient' => 'background-color: transparent; background-image: radial-gradient(at {{VALUE}}, {{bg_overlay_color.VALUE}} {{bg_overlay_color_stop.SIZE}}{{bg_overlay_color_stop.UNIT}}, {{bg_overlay_color_b.VALUE}} {{bg_overlay_color_b_stop.SIZE}}{{bg_overlay_color_b_stop.UNIT}})',
                            ],
                            'condition' => [
                                'bg_overlay'      => [ 'custom' ],
                                'bg_overlay_type' => 'radial',
                            ],
                            'of_type' => 'gradient',
                        ),
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);