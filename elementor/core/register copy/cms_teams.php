<?php
// Register Testimonial List Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_teams',
        'title'      => esc_html__('CMS Teams', 'saniga'),
        'icon'       => 'eicon-slider-push',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
            'jquery-slick',
            'cms-jquery-slick'
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_teams/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_teams/layout-images/2.png'
                                ],
                            ],
                            'prefix_class' => 'cms-teams-layout-'
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
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'heading_color',
                                'label'       => esc_html__( 'Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => false,
                                'condition'   => [
                                    'heading_text!'      => ''
                                ],
                            ),
                            array(
                                'name'        => 'heading_custom_color',
                                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => false,
                                'condition'   => [
                                    'heading_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name'        => 'heading_animation',
                                'label'       => esc_html__( 'Motion Effect', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::ANIMATION,
                                'label_block' => false,
                                'condition'   => [
                                    'heading_text!' => ''
                                ],
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'subheading_section',
                    'label'    => esc_html__( 'Sub Heading', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'subheading_text',
                                'label'       => esc_html__( 'Sub Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your sub title', 'saniga' ),
                                'label_block' => true,
                                'condition'   => [],
                            ),
                            array(
                                'name'        => 'subheading_color',
                                'label'       => esc_html__( 'Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => false,
                                'condition'   => [
                                    'subheading_text!'      => ''
                                ],
                            ),
                            array(
                                'name'        => 'sheading_custom_color',
                                'label'       => esc_html__( 'Custom Sub Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => false,
                                'condition'   => [
                                    'subheading_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name'        => 'subheading_animation',
                                'label'       => esc_html__( 'Motion Effect', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::ANIMATION,
                                'label_block' => false,
                                'condition'   => [
                                    'subheading_text!' => ''
                                ],
                            ),
                        )
                    )
                ),
                array(
                    'name'     => 'teams_list',
                    'label'    => esc_html__('Teams', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'teams',
                            'label' => esc_html__('Add Item', 'saniga'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'saniga'),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'saniga'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'saniga'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name'        => 'link',
                                    'label'       => esc_html__('Link', 'saniga' ),
                                    'type'        => \Elementor\Controls_Manager::URL,
                                    'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                                    'default'     => [
                                        'url'         => '#',
                                        'is_external' => 'on'
                                    ],
                                ),
                                array(
                                    'name' => 'social',
                                    'label' => esc_html__( 'Social', 'saniga' ),
                                    'type' => Elementor_Theme_Core::ICONS_CONTROL,
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
                            'default'     => [
                                [
                                    'name'     => 'Mike Dooley',
                                    'position' => 'Chief Executive',
                                    'link'     => [
                                        'url' => '#',
                                        'is_extalnal' => 'true'
                                    ],
                                    'social'   => ''
                                ],
                                [
                                    'name'     => 'Michael Brian',
                                    'position' => 'Managing Director',
                                    'social'   => ''
                                ],
                                [
                                    'name'     => 'Chris Wensel',
                                    'position' => 'Vice President',
                                    'social'   => ''
                                ]
                            ]
                        ),
                    )
                ),
                array(
                    'name'     => 'hover_section',
                    'label'    => esc_html__( 'Hover Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'hover_style',
                                'label'       => esc_html__( 'Hover Style', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'options'     => [
                                    ''      => esc_html__('Default', 'saniga')
                                ]
                            )
                        )
                    )
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);