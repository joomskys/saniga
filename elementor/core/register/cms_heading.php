<?php
// Register Heading Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_heading',
        'title'      => esc_html__( 'CMS Heading', 'saniga' ),
        'icon'       => 'eicon-t-letter',
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
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/1.png'
                                ],
                                '2' => [
                                    'label'      => esc_html__( 'Layout 2', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/2.png'
                                ],
                                '3' => [
                                    'label'      => esc_html__( 'Layout 3', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/3.png'
                                ],
                                '4' => [
                                    'label'      => esc_html__( 'Layout 4', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/4.png'
                                ],
                                '5' => [
                                    'label'      => esc_html__( 'Layout 5', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/5.png'
                                ],
                                '6' => [
                                    'label'      => esc_html__( 'Layout 6', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/6.png'
                                ],
                                '7' => [
                                    'label'      => esc_html__( 'Layout 7', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_heading/layout-images/7.png'
                                ]
                            ],
                            'prefix_class' => 'cms-heading-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'image_section',
                    'label'    => esc_html__( 'Image', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'             => 'selected_img',
                            'label'            => esc_html__( 'Image', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name'         => 'thumbnail_size',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'large',
                        ),
                        array(
                            'name'    => 'thumbnail_pos',
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'label'   => esc_html__('Image Position', 'saniga'),
                            'options' => [
                                'order-last' => esc_html__('Left','saniga'),
                                'order-first'  => esc_html__('Right','saniga'),
                            ],
                            'default' => 'order-first'
                        )
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
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
                                'condition' => [
                                    'layout' => ['0']
                                ],
                            )
                        ),
                        saniga_elementor_text_settings([
                            'name'     => 'heading_text',
                            'selector' => '.cms-mainheading'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1', '2', '3','4','5','6', '7']
                    ]
                ),
                array(
                    'name'     => 'subheading_section',
                    'label'    => esc_html__( 'Sub Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'subheading_text',
                            'selector' => '.cms-subheading'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1', '2', '3','4', '5']
                    ]
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Description', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'description_text',
                            'selector' => '.cms-heading-desc'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1', '3', '4','5','6', '7']
                    ]
                ),
                array(
                    'name'     => 'feature_section',
                    'label'    => esc_html__( 'Features', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'heading_feature_icon',
                                'label'    => esc_html__( 'Feature Icon', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::ICONS,
                            ),
                            array(
                                'name'     => 'heading_feature',
                                'label'    => esc_html__( 'Features', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array(
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__('Feature Text', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                    )
                                ),
                                'default' => [
                                    [
                                        'title' => 'Quality Control System, 100% Satisfaction Guarantee',
                                    ],
                                    [
                                        'title' => 'Highly Professional Staff, Accurate Testing Processes',
                                    ],
                                    [
                                        'title' => 'Unrivalled workmanship, Professional and Qualified',
                                    ]
                                ],
                                'title_field' => '{{{ title }}}',
                            )
                        )
                    ),
                    'condition' => [
                        'layout' => ['5']
                    ]
                ),
                array(
                    'name'     => 'signature_section',
                    'label'    => esc_html__( 'Singnature', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'singnature_image',
                                'label'       => esc_html__( 'Singnature Image', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::MEDIA,
                                'default'     => [
                                    'url' => saniga_elementor_opt_default_image('signature/signature-accent.png'),
                                ],
                                'label_block' => true
                            )
                        ),
                        saniga_elementor_text_settings([
                            'name'     => 'singnature_name',
                            'selector' => '.cms-signature-name'
                        ]),
                        saniga_elementor_text_settings([
                            'name'     => 'singnature_job',
                            'selector' => '.cms-signature-job'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1','5']
                    ]
                ),
                array(
                    'name'     => 'button_section',
                    'label'    => esc_html__( 'Button 01', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'btn_text'         => 'Awards & Milestones',
                        'btn_type_default' => 'btn btn-secondary', 
                        'btn_size'         => 'lg' 
                    ]),
                    'condition'        => [
                        'layout' => ['3']
                    ]
                ),
                array(
                    'name'     => 'button_section2',
                    'label'    => esc_html__( 'Button 02', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn2', 
                        'btn_text'         => 'Meet Our Experts',
                        'btn_type_default' => 'btn btn-outline', 
                        'btn_size'         => 'lg',
                        //'btn_color'        => '',
                        //'btn_hover_color'  => 'secondary',
                        'icon_default'     => [
                            'library' => '',
                            'value'   => ''  
                        ] 
                    ]),
                    'condition'        => [
                        'layout' => ['3']
                    ]
                ),
                array(
                    'name'     => 'button_section3',
                    'label'    => esc_html__( 'Explore More', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn3', 
                        'btn_text'         => 'Explore More',
                        'btn_type_default' => 'btn btn-secondary', 
                        'btn_size'         => 'xl' 
                    ]),
                    'condition'        => [
                        'layout' => ['4']
                    ]
                ),
                array(
                    'name'     => 'button_section4',
                    'label'    => esc_html__( 'Our Products', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn4', 
                        'btn_text'         => 'Our Products',
                        'btn_type_default' => 'btn btn-outline', 
                        'btn_size'         => 'xl',
                        //'btn_color'        => '',
                        //'btn_hover_color'  => 'secondary',
                        'icon_default'     => [
                            'library' => '',
                            'value'   => ''  
                        ] 
                    ]),
                    'condition'        => [
                        'layout' => ['4']
                    ]
                ),
                array(
                    'name'     => 'button_section5',
                    'label'    => esc_html__( 'Contact Us', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn5', 
                        'btn_text'         => 'Contact Us',
                        'btn_type_default' => 'btn btn-primary', 
                        'btn_size'         => 'xl',
                    ]),
                    'condition'        => [
                        'layout' => ['5']
                    ]
                ),
                array(
                    'name'     => 'button_section6',
                    'label'    => esc_html__( 'Our Services', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn6', 
                        'btn_text'         => 'Our Services',
                        'btn_type_default' => 'btn btn-fill', 
                        'btn_size'         => 'xl',
                        //'btn_color'        => '',
                        //'btn_hover_color'  => 'secondary',
                        'icon_default'     => [
                            'library' => 'cmsi',
                            'value'   => 'cmsi-arrow-right'   
                        ] 
                    ]),
                    'condition'        => [
                        'layout' => ['6']
                    ]
                ),
                array(
                    'name'     => 'button_contact6',
                    'label'    => esc_html__( 'Contact Us', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_button_settings([
                        'prefix'           => 'btn_contact6', 
                        'btn_text'         => '',
                        'btn_type_default' => 'btn btn-outline', 
                        'btn_size'         => 'xl',
                        'icon_default'     => [
                            'library' => 'cmsi',
                            'value'   => 'cmsi-arrow-right'   
                        ] 
                    ]),
                    'condition'        => [
                        'layout' => ['6']
                    ]
                ),
                array(
                    'name'     => 'button_video6',
                    'label'    => esc_html__( 'Our Video', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'video_link',
                            'label'       => esc_html__( 'Video URL', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                            'default'     => [
                                'url'         => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                                'is_external' => 'on'
                            ]
                        ),
                        array(
                            'name'        => 'video_text',
                            'label'       => esc_html__( 'Video Text', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => esc_html__('Our Video','saniga')
                        )
                    ),
                    'condition'        => [
                        'layout' => ['6']
                    ]
                ),
                array(
                    'name'     => 'breadcrum6',
                    'label'    => esc_html__( 'Breadcrum', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'show_breadcrum',
                            'label'       => esc_html__( 'Show Breadcrum', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SWITCHER,
                            'default'     => 'true'
                        )
                    ),
                    'condition'        => [
                        'layout' => ['6']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);