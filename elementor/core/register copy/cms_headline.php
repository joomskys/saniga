<?php
// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_headline',
        'title'      => esc_html__( 'CMS Headline', 'saniga' ),
        'icon'       => 'eicon-posts-carousel',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'jquery-slick',
            'cms-jquery-slick',
        ],
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                'label' => esc_html__( 'Layout 1', 'saniga' ),
                                'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_headline/layout-image/1.png'
                            ],
                            'prefix_class' => 'cms-headline-layout-'
                        ),
                    ),
                ),
                // Slick Slider Settings
                saniga_elementor_slick_slider_settings(),
                // Content Settings
                array(
                    'name'     => 'heading_section',
                    'label'    => esc_html__( 'Heading Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'             => 'heading_icon',
                            'label'            => esc_html__( 'Heading Icon', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'   => '',
                                'library' => '',
                            ],
                        ),   
                        array(
                            'name'        => 'heading_text',
                            'label'       => esc_html__( 'Heading', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'default'     => '',
                            'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                            'label_block' => true,
                            'condition'   => []
                        )
                    )
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'source_type',
                                'label'    => esc_html__( 'Source Type', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::SELECT,
                                'options'  => [
                                    'buildin'    => esc_html__('Build In', 'saniga'),
                                    'custom'     => esc_html__('Custom', 'saniga')
                                ],
                                'default'  => 'buildin'
                            ),
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::SELECT,
                                'multiple' => true,
                                'options'  => etc_get_post_type_options(),
                                'default'  => 'post',
                                'condition' => [
                                    'source_type' => 'buildin'
                                ]
                            )
                        ),
                        etc_get_grid_term_by_post_type_options([
                            'custom_condition' => [
                                'source_type' => ['buildin']
                            ]
                        ]),
                        array(
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__( 'Order By', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date'   => esc_html__( 'Date', 'saniga' ),
                                    'ID'     => esc_html__( 'ID', 'saniga' ),
                                    'author' => esc_html__( 'Author', 'saniga' ),
                                    'title'  => esc_html__( 'Title', 'saniga' ),
                                    'rand'   => esc_html__( 'Random', 'saniga' ),
                                ],
                                'condition' => [
                                    'source_type' => 'buildin'
                                ]
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__( 'Sort Order', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__( 'Descending', 'saniga' ),
                                    'asc'  => esc_html__( 'Ascending', 'saniga' ),
                                ],
                                'condition' => [
                                    'source_type' => 'buildin'
                                ]
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__( 'Total items', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                                'condition' => [
                                    'source_type' => 'buildin'
                                ]
                            )
                        )
                    )
                ),
                array(
                    'name'     => 'thumbnail_section',
                    'label'    => esc_html__( 'Thumbnail Options', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'show_thumbnail',
                            'label'   => esc_html__( 'Show Thumbnail', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'thumbnail',
                            'condition'    => [
                                'show_thumbnail' => ['true']
                            ]
                        )
                    ),
                    'condition' => [
                        'source_type' => 'buildin'
                    ]
                ),
                array(
                    'name'     => 'content_list',
                    'label'    => esc_html__('Custom Content', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'custom_content',
                            'label'    => esc_html__('Add Item', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__('Title', 'saniga'),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'label_block' => true,
                                    )
                                ),
                                saniga_elementor_hyperlink_settings()
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'We drive the transition to more sustainable, reliable & affordable energy systems #1,', 'saniga' )
                                ],
                                [
                                    'title'       => esc_html__( 'We drive the transition to more sustainable, reliable & affordable energy systems #2', 'saniga' )
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    ),
                    'condition' => [
                        'source_type' => 'custom'
                    ]
                ),
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);