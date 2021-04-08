<?php
// Register Accordion Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_accordion',
        'title'      => esc_html__( 'CMS Accordion', 'saniga' ),
        'icon'       => 'eicon-accordion',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'cms-accordion'
        ),
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
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_accordion/layout-images/layout1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-accordion-layout-'
                        ),
                    ),
                ),
                array(
                    'name'     => 'source_section',
                    'label'    => esc_html__( 'Source Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'      => 'heading',
                            'label'     => esc_html__( 'Heading', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::TEXT,
                            'separator' => 'after',
                        ),
                        array(
                            'name'      => 'active_section',
                            'label'     => esc_html__( 'Active section', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::NUMBER,
                            'separator' => 'after',
                        ),
                        array(
                            'name'    => 'cms_accordion',
                            'label'   => esc_html__( 'Accordion Items', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'ac_title'   => esc_html__( 'Accordion #1', 'saniga' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                ],
                                [
                                    'ac_title'   => esc_html__( 'Accordion #2', 'saniga' ),
                                    'ac_content' => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'  => 'ac_title',
                                    'label' => esc_html__( 'Title', 'saniga' ),
                                    'type'  => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'             => 'ac_title_icon',
                                    'label'            => esc_html__( 'Title Icon', 'saniga' ),
                                    'type'             => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default'          => [
                                        'value' => '',
                                        'library' => '',
                                    ],
                                ),
                                array(
                                    'name'  => 'ac_content',
                                    'label' => esc_html__( 'Content', 'saniga' ),
                                    'type'  => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows'  => 10,
                                ),
                            ),
                            'title_field' => '{{{ ac_title }}}',
                            'separator'   => 'after',
                        )
                    )
                ),
                array(
                    'name'     => 'explain_section',
                    'label'    => esc_html__( 'Explain Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'explain_icon_pos',
                            'label'   => esc_html__('Explain Icon position','saniga'),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'left' => esc_html__('Left','saniga'),
                                'right' => esc_html__('Right','saniga')
                            ],
                            'default' => 'right'
                        ),
                        array(
                            'name'             => 'main_icon',
                            'label'            => esc_html__( 'Icon', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'   => 'cmsi-plus',
                                'library' => 'cmsi',
                            ],
                        ),
                        array(
                            'name'             => 'icon_active',
                            'label'            => esc_html__( 'Active Icon', 'saniga' ),
                            'type'             => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'default'          => [
                                'value'   => 'cmsi-minus',
                                'library' => 'cmsi',
                            ],
                            'condition' => [
                                'main_icon!' => '',
                            ],
                            'separator' => 'after',
                        )
                    )
                )
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);