<?php
// Register How It Work Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_howitwork',
        'title'      => esc_html__('CMS How It Work', 'saniga'),
        'icon'       => 'eicon-testimonial',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_howitwork/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_howitwork/layout-images/2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-howitwork-layout-'
                        )
                    ),
                ),
                array(
                    'name' => 'image',
                    'label' => esc_html__('Images', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'image_l',
                            'label'       => esc_html__('Image Left', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'image_r',
                            'label'       => esc_html__('Image Right', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
                ),
                array(
                    'name'     => 'content_list',
                    'label'    => esc_html__('Steps', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'step',
                            'label'    => esc_html__('Add Step', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'icon',
                                        'label'       => esc_html__('Icon', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::ICONS,
                                    ),
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__('Title', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'sub_title',
                                        'label'       => esc_html__('Sub Title', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                        'condition'   => [
                                            'layout' => ['0']
                                        ]
                                    ),
                                    array(
                                        'name'        => 'description',
                                        'label'       => esc_html__('Description', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'label_block' => true,
                                    ),
                                    array(
                                        'name'        => 'hyper_link',
                                        'label'       => esc_html__( 'Link', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::URL,
                                        'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                                        'default'     => [
                                            'url'         => '#',
                                            'is_external' => 'on'
                                        ]
                                    )
                                )
                            ),
                            'default' => [
                                [
                                    'title'       => 'Provide Us With The Details',
                                    'sub_title'   => 'We Design & Ship.',
                                    'description' => 'Just provide us the timing you want and we will set our schedule according to your need.',
                                    'icon'        => [
                                        'library' => 'cmsi',
                                        'value'   => 'flaticon-005-hand'
                                    ]  
                                ],
                                [
                                    'title'       => 'Pick The Suitable Plan For You',
                                    'sub_title'   => 'Contract Or Install',
                                    'description' => 'We come to you to inspect the area to prepare it for disinfection, and to take into concern.',
                                    'icon'        => [
                                        'library' => 'cmsi',
                                        'value'   => 'flaticon-022-bottle'
                                    ]
                                ],
                                [
                                    'title'       => 'Online Scheduling In Few Clicks',
                                    'sub_title'   => 'Power Your Home',
                                    'description' => 'We carry out the disinfection during couple of hours depending on house size and amount.',
                                    'icon'        => [
                                        'library' => 'cmsi',
                                        'value'   => 'flaticon-010-spray'
                                    ]
                                ],
                                [
                                    'title'       => 'Cleaning With Care & leave quickly',
                                    'sub_title'   => 'Power Your Home',
                                    'description' => 'After disinfection was done successfully, we will leave and you’ll have no worries!',
                                    'icon'        => [
                                        'library' => 'cmsi',
                                        'value'   => 'flaticon-003-glass'
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                array(
                    'name' => 'Other_Settings',
                    'label' => esc_html__('Other Settings', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'choose_icon',
                            'label'       => esc_html__('Choosed Step Icon', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::ICONS,
                        ),
                        array(
                            'name'        => 'readmore_text',
                            'label'       => esc_html__('Read More Text', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                        ),
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name' => 'contact_section',
                    'label' => esc_html__('Contact Settings', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'contact_text',
                                'label'       => esc_html__('Enter your Text', 'saniga'),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            )
                        ),
                        saniga_elementor_hyperlink_settings([
                            'prefix' => 'contact_link'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1','2']
                    ]
                ),
                array(
                    'name' => 'rating',
                    'label' => esc_html__('Rating', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'rating_rated',
                            'label'       => esc_html__('Rating', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => '99.9% Customer Satisfaction',
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'rating_text',
                            'label'       => esc_html__('Rating Text', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => 'based on 750+ reviews and 6,154 Completed Projects.',  
                            'label_block' => true,
                        ),
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
                )  
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);