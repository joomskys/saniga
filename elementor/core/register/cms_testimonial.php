<?php
// Register Testimonial List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_testimonial',
        'title'      => esc_html__('CMS Testimonial', 'saniga'),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_testimonial/layout-images/2.png'
                                ]
                            ],
                            'prefix_class' => 'cms-testimonial-layout-'
                        )
                    ),
                ),
                saniga_elementor_slick_slider_settings([
                    'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
                ]),
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
                                    'layout'    => ['99']                            
                                ],
                            )
                        ),
                        saniga_elementor_text_settings([
                            'name'     => 'heading_text'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
                ),
                array(
                    'name'     => 'subheading_section',
                    'label'    => esc_html__( 'Sub Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'     => 'subheading_text'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['0']
                    ]
                ),
                array(
                    'name'     => 'testimonial_list',
                    'label'    => esc_html__('Testimonial', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'testimonial',
                            'label'    => esc_html__('Add Item', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Author Image', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'title',
                                    'label'       => esc_html__('Author Name', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'sub_title',
                                    'label'       => esc_html__('Sub Title', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'position',
                                    'label'       => esc_html__('Position', 'saniga'),
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
                                    'name'        => 'star',
                                    'label'       => esc_html__('Star', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::SELECT,
                                    'options'     => [
                                        '100' => esc_html__('5 Star','saniga'),
                                        '80'  => esc_html__('4 Star','saniga'),
                                        '60'  => esc_html__('3 Star','saniga'),
                                        '40'  => esc_html__('2 Star','saniga'),
                                        '20'  => esc_html__('1 Star','saniga'),                                    
                                    ],  
                                    'default' => '100'
                                ),
                                array(
                                    'name'        => 'star_text',
                                    'label'       => esc_html__('Star Text', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT
                                )
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'Name #1', 'saniga' ),
                                    'sub_title'   => 'Manager #1',
                                    'position'    => '',
                                    'description' => esc_html__( '#1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => [
                                        'url' => '/wp-content/themes/saniga/assets/images/avatar/1.jpg'
                                    ]
                                ],
                                [
                                    'title'       => esc_html__( 'Name #2', 'saniga' ),
                                    'sub_title'   => 'Manager #2',
                                    'position'    => '',
                                    'description' => esc_html__( '#2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => [
                                        'url' => '/wp-content/themes/saniga/assets/images/avatar/2.jpg'
                                    ]
                                ],
                                [
                                    'title'       => esc_html__( 'Name #3', 'saniga' ),
                                    'sub_title'   => 'Manager #3',
                                    'position'    => '',
                                    'description' => esc_html__( '#3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => [
                                        'url' => '/wp-content/themes/saniga/assets/images/avatar/3.jpg'
                                    ]
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                array(
                    'name'     => 'quote_icon_section',
                    'label'    => esc_html__( 'Quote Icon', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'    => 'qicon_type',
                                'label'   => esc_html__( 'Icon Type', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'icon' => esc_html__('Icon', 'saniga'),
                                    'image' => esc_html__('Image', 'saniga'),
                                ],
                                'default'   => 'image'
                            ),
                            array(
                                'name'             => 'quote_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'condition'        => [
                                    'qicon_type' => 'icon'
                                ]
                            ),
                            array(
                                'name'      => 'quote_image',
                                'label'     => esc_html__( 'Icon Image', 'saniga' ),
                                'type'      => \Elementor\Controls_Manager::MEDIA,
                                'default'   => '',
                                'condition' => [
                                    'qicon_type' => 'image'
                                ]
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'testimonial_desc_section',
                    'label'    => esc_html__( 'Testimonial Text Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_typo_settings([
                            'name'     => 'description_typo',
                            'selector' => '.cms-ttmn-desc'
                        ])
                    )
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);