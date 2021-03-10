<?php
// Register Call to Action Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_cta',
        'title'      => esc_html__( 'CMS Call to Action', 'saniga' ),
        'icon'       => 'eicon-image-rollover',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_row_align([
                            'condition' => [
                                'layout' => ['1']
                            ]
                        ]),
                        saniga_elementor_text_align([
                            'condition' => [
                                'layout' => ['1']
                            ]
                        ]),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_cta/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_cta/layout-images/2.png'
                                ],
                            ],
                            'prefix_class' => 'cms-cta-layout-',
                        )
                    ),
                ),
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
                                'value'     => '',
                                'library'   => '',
                            ]
                        ),
                        array(
                            'name'        => 'heading_text',
                            'label'       => esc_html__( 'Heading Text', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'heading_color',
                            'label'       => esc_html__( 'Heading Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                            'default'     => '',
                        )
                    )
                ),
                array(
                    'name'     => 'button_section',
                    'label'    => esc_html__( 'Button Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'btn_text' => 'Click Me',
                        ])
                    ),
                    'condition' => [
                        'layout' => ['1']
                    ]
                ),
                array(
                    'name'     => 'button_brochure1',
                    'label'    => esc_html__( 'Button Brochure 01', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'   => 'brochure1',
                            'btn_text' => 'Company Report',
                            'btn_size' => 'xl',
                            'btn_align'       => 'justify',
                            'icon_default'    => [
                                'value'     => 'cmsi-download',
                                'library'   => 'cmsi'
                            ],
                            'icon_align'    => 'right'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                ),
                array(
                    'name'     => 'button_brochure2',
                    'label'    => esc_html__( 'Button Brochure 02', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_button_settings([
                            'prefix'          => 'brochure2',
                            'btn_text'        => 'Company Brochure',
                            'btn_size'        => 'xl',
                            'btn_color'       => 'primary',
                            'btn_hover_color' => 'accent',
                            'btn_align'       => 'justify',  
                            'icon_default'    => [
                                'value'     => 'cmsi-download',
                                'library'   => 'cmsi'
                            ],
                            'icon_align'    => 'right'
                        ])
                    ),
                    'condition' => [
                        'layout' => ['2']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);