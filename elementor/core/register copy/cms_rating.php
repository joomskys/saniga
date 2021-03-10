<?php
// Register Rating Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_rating',
        'title'      => esc_html__('CMS Ratings', 'saniga'),
        'icon'       => 'eicon-rating',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'scripts'    => array(
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_rating/layout-images/1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-rating-layout-'
                        )
                    ),
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