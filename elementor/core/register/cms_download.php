<?php
// Register Fancy Box Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_download',
        'title'      => esc_html__( 'CMS Download', 'saniga' ),
        'icon'       => 'eicon-anchor',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(),
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
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_download/layout-images/1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-download-layout-'
                        )
                    )
                ),
                 array(
                    'name'     => 'setting_section',
                    'label'    => esc_html__( 'Download Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        saniga_elementor_text_settings([
                            'name'  => 'heading_text'
                        ])
                    )
                ),
                array(
                    'name'     => 'dowload_section',
                    'label'    => esc_html__( 'Download Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array (
                            array(
                                'name'             => 'icon_type',
                                'label'            => esc_html__( 'Icon Type', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::SELECT,
                                'options'          => [
                                    'icon' => esc_html__('Icon','saniga'),
                                    'img'  => esc_html__('Image','saniga'),
                                ],
                                'default' => 'img'
                            ),
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [],
                                'condition' => [
                                    'icon_type'    => 'icon'                            
                                ],
                            ),
                            array(
                                'name'             => 'selected_img',
                                'label'            => esc_html__( 'Image', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::MEDIA,
                                'default'          => '',
                                'condition' => [
                                    'icon_type'    => 'img'                            
                                ],
                            )
                        ),
                        array(
                            array(
                                'name'     => 'download_list',
                                'label'    => esc_html__( 'Download Lists', 'saniga' ),
                                'type'     => \Elementor\Controls_Manager::REPEATER,
                                'controls' => array_merge(
                                    array(
                                        array(
                                            'name'        => 'download_title',
                                            'label'       => esc_html__( 'Title', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::TEXT,
                                            'label_block' => true,
                                        ),
                                        array(
                                            'name'        => 'download_link',
                                            'label'       => esc_html__( 'Attachment Link', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::URL,
                                            'placeholder' => esc_html__('https://your-link.com', 'saniga' ),
                                            'label_block' => true,
                                            'default'     => [
                                                'url'         => get_template_directory_uri().'/assets/docs/CMS-Brochure.pdf',
                                                'is_external' => 'on'
                                            ]  
                                        ),
                                        array(
                                            'name'             => 'download_icon_type',
                                            'label'            => esc_html__( 'Icon Type', 'saniga' ),
                                            'type'             => \Elementor\Controls_Manager::SELECT,
                                            'options'          => [
                                                ''     => esc_html__('Default','saniga'),
                                                'icon' => esc_html__('Icon','saniga'),
                                                'img'  => esc_html__('Image','saniga'),
                                            ]
                                        ),
                                        array(
                                            'name'      => 'download_icon',
                                            'label'     => esc_html__( 'Icon', 'saniga' ),
                                            'type'      => \Elementor\Controls_Manager::ICONS,
                                            'condition' => [
                                                'download_icon_type' => 'icon'
                                            ]
                                        ),
                                        array(
                                            'name'      => 'download_icon_img',
                                            'label'     => esc_html__( 'Icon', 'saniga' ),
                                            'type'      => \Elementor\Controls_Manager::MEDIA,
                                            'default'   => '',
                                            'condition' => [
                                                'download_icon_type'    => 'img'                  
                                            ],
                                        ),
                                        array(
                                            'name'        => 'text_color',
                                            'label'       => esc_html__( 'Text Color', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::SELECT,
                                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                        ),
                                        array(
                                            'name'        => 'bg_color',
                                            'label'       => esc_html__( 'Background Color', 'saniga' ),
                                            'type'        => \Elementor\Controls_Manager::SELECT,
                                            'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                        )
                                    )
                                ),
                                'default' => [
                                    [
                                        'download_title' => 'Our Report 2022',
                                        'download_link' => [
                                            'url'         => get_template_directory_uri().'/assets/docs/CMS-Brochure.pdf',
                                            'is_external' => 'on'
                                        ],
                                        'download_icon' => [
                                            'value'   => 'cmsi-pdf',
                                            'library' => 'cmsi',
                                        ]
                                    ],
                                    [
                                        'download_title' => 'Company Brochure',
                                        'download_link' => [
                                            'url'         => get_template_directory_uri().'/assets/docs/CMS-Brochure.pdf',
                                            'is_external' => 'on'
                                        ],
                                        'download_icon' => [
                                            'value'   => 'cmsi-pdf',
                                            'library' => 'cmsi',
                                        ]
                                    ]
                                ],
                                'title_field' => '{{{ elementor.helpers.renderIcon( this, download_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ download_title }}}'
                            )
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);