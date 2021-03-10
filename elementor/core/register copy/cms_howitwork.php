<?php
// Register How It Work Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_howitwork',
        'title'      => esc_html__('CMS How It Work', 'saniga'),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_howitwork/layout-images/1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-howitwork-layout-'
                        )
                    ),
                ),
                array(
                    'name' => 'image',
                    'label' => esc_html__('Images', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'image_l',
                            'label'       => esc_html__('Image Left', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'image_r',
                            'label'       => esc_html__('Image Right', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'label_block' => true,
                        ),
                    )
                ),
                array(
                    'name'     => 'content_list',
                    'label'    => esc_html__('Steps', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'     => 'step',
                            'label'    => esc_html__('Add Step', 'saniga'),
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
                                    'name'        => 'description',
                                    'label'       => esc_html__('Description', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name'        => 'image',
                                    'label'       => esc_html__('Image', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::MEDIA,
                                    'label_block' => true,
                                )
                            ),
                            'default' => [
                                [
                                    'title'       => 'How It Works, Step One:',
                                    'sub_title'   => 'We Design & Ship.',
                                    'description' => 'We collaborate with you to design and deliver a system that meets your utility usage and needs, We also selecting equipment from 66+ manufacturers so you do not have to be worried or compromise with your money or with your effort.',
                                ],
                                [
                                    'title'       => 'How It Works, Step Two:',
                                    'sub_title'   => 'Contract Or Install',
                                    'description' => 'Whether you want to install the system or hire local contractors, managing installation yourself ensures the fastest return on your solar investment.We deliver a system that meets your utility usage and needs, We also selecting equipment from.',
                                ],
                                [
                                    'title'       => 'How It Works, Step Three:',
                                    'sub_title'   => 'Power Your Home',
                                    'description' => 'Even after your system is installed and operating, you can always count on Wholesale Solar to provide the support you need, just contact us at any time, and we will be there for you. Whether you want to install the system or hire local contractors.',
                                ],
                                
                            ],
                            'title_field' => '{{{ title }}}',
                        )
                    )
                ),
                array(
                    'name' => 'rating',
                    'label' => esc_html__('Rating', 'saniga'),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'rating_rated',
                            'label'       => esc_html__('Rating', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => '99.9% Customer Satisfaction',
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'rating_text',
                            'label'       => esc_html__('Rating Text', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'default'     => 'based on 750+ reviews and 6,154 Completed Projects.',  
                            'label_block' => true,
                        ),
                    )
                ),  
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);