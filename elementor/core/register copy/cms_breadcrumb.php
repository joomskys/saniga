<?php
// Register Breadcrumb
etc_add_custom_widget(
    array(
        'name'       => 'cms_breadcrumb',
        'title'      => esc_html__( 'CMS Breadcrumb', 'saniga' ),
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
                        saniga_elementor_text_align(['default' => 'center']),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label'      => esc_html__( 'Layout 1', 'saniga' ),
                                    'image'      => get_template_directory_uri() . '/elementor/templates/widgets/cms_breadcrumb/layout-images/layout1.png',
                                ],
                                
                            ],
                            'prefix_class' => 'cms-breadcrumb-layout-'
                        )
                    ),
                ),
                array(
                    'name'     => 'breadcrumb_section',
                    'label'    => esc_html__( 'Breadcrumb', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'breadcrumb_link_color',
                            'label'       => esc_html__( 'Breadcrumb Link Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'label_block' => true,
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
                        array(
                            'name'        => 'breadcrumb_separator',
                            'label'       => esc_html__( 'Custom Breadcrumb Separator', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'     => '',
                                'library'   => '',
                            ]
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);