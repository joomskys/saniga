<?php
// Register Image Galleries Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_image_gallery',
        'title'      => esc_html__('CMS Image Gallery', 'saniga' ),
        'icon'       => 'eicon-gallery-grid',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'magnific-popup'
        ],
        'styles' => [
            'magnific-popup'
        ],
        'params'     => array(
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_image_gallery/layout-images/1.png'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'grid_section',
                    'label'    => esc_html__('Image Gallery', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'       => 'wp_gallery',
                            'label'      => esc_html__( 'Add Images', 'saniga' ),
                            'type'       => \Elementor\Controls_Manager::GALLERY,
                            'show_label' => false,
                            'dynamic'    => [
                                'active' => true,
                            ],
                        ),
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'large',
                        ),
                        array(
                            'name'         => 'gallery_col',
                            'label'        => esc_html__('Columns', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'default'      => '3',
                            'control_type' => 'responsive',
                            'options'      => [
                                '1' => esc_html__('1', 'saniga' ),
                                '2' => esc_html__('2', 'saniga' ),
                                '3' => esc_html__('3', 'saniga' ),
                                '4' => esc_html__('4', 'saniga' ),
                                '6' => esc_html__('6', 'saniga' ),
                            ],
                        ),
                        array(
                            'name'    => 'gallery_rand',
                            'label'   => esc_html__( 'Order By', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                ''     => esc_html__( 'Default', 'saniga' ),
                                'rand' => esc_html__( 'Random', 'saniga' ),
                            ],
                            'default' => '',
                        ),
                        array(
                            'name'    => 'gallery_show',
                            'label'   => esc_html__( 'Number of item to show', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                        array(
                            'name'    => 'gallery_loadmore_show',
                            'label'   => esc_html__( 'Number of item to show on load more', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::NUMBER,
                            'default' => '6',
                        ),
                        array(
                            'name'    => 'load_more_text',
                            'label'   => esc_html__( 'Load More Text', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::TEXT
                        )
                    ),
                ),
                array(
                    'name'     => 'gallery_images_section',
                    'label'    => esc_html__('Images', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'         => 'gap',
                            'label'        => esc_html__('Image Gap', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'control_type' => 'responsive',
                            'default'      => 30
                        ),
                    ),
                ),
                array(
                    'name'     => 'caption_section',
                    'label'    => esc_html__('Caption', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'    => 'gallery_display_caption',
                            'label'   => esc_html__( 'Display', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'none',
                            'options' => [
                                'none' => esc_html__( 'Hide', 'saniga' ),
                                ''     => esc_html__( 'Show', 'saniga' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image-caption' => 'display: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'    => 'caption_align',
                            'label'   => __( 'Alignment', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'left' => [
                                    'title' => __( 'Left', 'saniga' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'saniga' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => __( 'Right', 'saniga' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .image-caption' => 'text-align: {{VALUE}};',
                            ],
                            'default'   => 'center',
                            'condition' => [
                                'gallery_display_caption' => '',
                            ],
                        ),
                        array(
                            'name'      => 'caption_color',
                            'label'     => esc_html__( 'Text Color', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} .image-caption' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'gallery_display_caption' => '',
                            ],
                        ),
                        array(
                            'name'         => 'caption_typography',
                            'type'         => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .image-caption',
                            'condition'    => [
                                'gallery_display_caption' => '',
                            ]
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);