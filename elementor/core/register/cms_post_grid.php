<?php
// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_post_grid',
        'title'      => esc_html__( 'CMS Post Grid', 'saniga' ),
        'icon'       => 'eicon-posts-grid',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [
            'imagesloaded',
            'isotope',
            'cms-post-grid',
        ],
        'params' => array(
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
                            'options' => saniga_elementor_post_layout(),
                            'prefix_class' => 'cms-post-layout-'
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Options', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::SELECT,
                                'multiple' => true,
                                'options'  => etc_get_post_type_options(),
                                'default'  => 'post'
                            )
                        ),
                        etc_get_grid_term_by_post_type_options(),
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
                            ),
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__( 'Items to show', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            )
                        )
                    )
                ),
                saniga_elementor_masonry_settings(),
                saniga_elementor_masonry_filter_settings(),
                saniga_elementor_masonry_column_settings(),
                saniga_elementor_masonry_pagination_settings(),
                array(
                    'name'     => 'thumbnail_section',
                    'label'    => esc_html__( 'Thumbnail Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'         => 'thumbnail',
                            'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                            'control_type' => 'group',
                            'default'      => 'full',
                        )
                    )
                ),
                array(
                    'name'     => 'excerpt_section',
                    'label'    => esc_html__( 'Excerpt Options', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'excerpt_lenght',
                            'label'     => esc_html__( 'Excerpt lenght', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'default'   => 25,
                            'separator' => 'after',
                        ),
                        array(
                            'name'      => 'excerpt_more_text',
                            'label'     => esc_html__( 'Excerpt more text', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => '...',
                            'separator' => 'after',
                        )
                    ),
                    'condition' => [
                        'layout!' => ['4']
                    ]
                ),
                array(
                    'name'     => 'readmore_section',
                    'label'    => esc_html__( 'Read More Options', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => [
                        array(
                            'name'      => 'readmore_text',
                            'label'     => esc_html__( 'Read More Text', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'default'   => esc_html__('Read More','saniga'),
                            'separator' => 'after',
                        ),
                    ],
                    'condition' => [
                        'layout!' => ['4']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);