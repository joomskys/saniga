<?php
// Register Careers Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_careers',
        'title'      => esc_html__( 'CMS Careers', 'saniga' ),
        'icon'       => 'eicon-lock-user',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => array(
            'jquery-slick',
            'cms-jquery-slick',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_text_align(['default' => '']),
                        array(
                            'name'    => 'hover_effect',
                            'label'   => esc_html__( 'Hover Styles', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__('Default','saniga'),
                            ],
                            'default' => ''
                        ),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_careers/layout-images/1.png'
                                ],
                                
                            ],
                            'prefix_class' => 'cms-careers-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'carousel_section',
                    'label'    => esc_html__( 'Career Items', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'career_list',
                            'label'    => esc_html__('Add Career', 'saniga'),
                            'type'     => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array_merge(
                                array(
                                    array(
                                        'name'        => 'job_type',
                                        'label'       => esc_html__( 'Job Type', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'placeholder' => esc_html__( 'Enter your job type', 'saniga' ),
                                        'dynamic'   => [
                                            'active' => true,
                                        ],
                                    ),
                                    array(
                                        'name'        => 'job_address',
                                        'label'       => esc_html__( 'Job Address', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXT,
                                        'placeholder' => esc_html__( 'Enter your jon address', 'saniga' ),
                                        'dynamic'   => [
                                            'active' => true,
                                        ],
                                        'separator' => 'before'
                                    ),
                                    array(
                                        'name'        => 'title',
                                        'label'       => esc_html__( 'Title', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                        'label_block' => true,
                                        'dynamic'   => [
                                            'active' => true,
                                        ],
                                        'separator' => 'before'
                                    ),
                                    array(
                                        'name'        => 'description',
                                        'label'       => esc_html__( 'Description', 'saniga' ),
                                        'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                        'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
                                        'rows'        => 10,
                                        'show_label'  => false,
                                        'dynamic'   => [
                                            'active' => true,
                                        ],
                                        'separator' => 'after'
                                    ),
                                ),
                                saniga_elementor_button_settings([
                                    'btn_text' => 'Read More',
                                    'btn_type_default' => 'btn btn-outline'
                                ]),
                            ),
                            'default' => [
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ],
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ],
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ],
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ],
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ],
                                [
                                    'job_type'    => '',
                                    'job_address' => '',
                                    'title'       => '',
                                    'description' => '',
                                ]
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                saniga_elementor_slick_slider_settings(),
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);