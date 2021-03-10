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
                                ],
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
                            ),
                            array(
                                'name'        => 'heading_text',
                                'label'       => esc_html__( 'Heading', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'default'     => esc_html__( 'This is the heading', 'saniga' ),
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
                                'default'     => esc_html__( 'This is the sub heading', 'saniga' ),
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
                    'name'     => 'content_list',
                    'label'    => esc_html__('Testimonial', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'testimonial',
                            'label'    => esc_html__('Add Item', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
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
                                ),
                                array(
                                    'name'        => 'position',
                                    'label'       => esc_html__('Position', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
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
                                    'default' => '100',
                                    'label_block' => true
                                ),
                                array(
                                    'name'        => 'star_text',
                                    'label'       => esc_html__('Star Text', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,  
                                    'default'     => 'Execellent!!',
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                ),
                            ),
                            'default' => [
                                [
                                    'title'       => esc_html__( 'Name #1', 'saniga' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #1',
                                    'description' => esc_html__( '#1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg' 
                                ],
                                [
                                    'title'       => esc_html__( 'Name #2', 'saniga' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #2',
                                    'description' => esc_html__( '#2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ],
                                [
                                    'title'       => esc_html__( 'Name #3', 'saniga' ),
                                    'sub_title'   => '',
                                    'position'    => 'Manager #3',
                                    'description' => esc_html__( '#3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'saniga' ),
                                    'image'       => get_template_directory_uri() . '/images/assets/placeholder/no-image.jpg'
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                array(
                    'name'     => 'desc_section',
                    'label'    => esc_html__( 'Testimonial Text Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'description_custom_color',
                                'label'       => esc_html__( 'Custom Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'label_block' => true,
                                'condition'   => [
                                    'description_color'      => 'custom'
                                ],
                            )
                        )
                    )
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);