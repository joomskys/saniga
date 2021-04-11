<?php
// Register Contact Form 7 Widget
if(class_exists('WooCommerce')) {
    etc_add_custom_widget(
        array(
            'name'       => 'cms_products',
            'title'      => esc_html__('CMS Products', 'saniga'),
            'icon'       => 'eicon-products',
            'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_products/layout-images/1.png'
                                    ]
                                ],
                                'prefix_class' => 'cms-products-layout-'
                            )
                        )
                    ),
                    array(
                        'name'     => 'content_section',
                        'label'    => esc_html__('Content Settings', 'saniga'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'    => 'limit',
                                'label'   => esc_html__( 'Products to show', 'saniga' ),
                                'type'    => \Elementor\Controls_Manager::NUMBER,
                                'default' => 8
                            ),
                            array(
                                'name'  => 'columns',
                                'label' => esc_html__( 'Number of Columns', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    '' => [
                                        'min'  => 2,
                                        'max'  => 6,
                                        'step' => 1,
                                    ]
                                ],
                                'size_units' => [''],
                                'default' => [
                                    'unit' => '',
                                    'size' => 4
                                ]
                            ),
                            array(
                                'name'    => 'order',
                                'label'   => esc_html__('Order', 'saniga'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    ''     => esc_html__('Default', 'saniga'),
                                    'ASC'  => 'ASC',
                                    'DESC' => 'DESC'
                                ]
                            ),
                            array(
                                'name'    => 'orderby',
                                'label'   => esc_html__('Orderby', 'saniga'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    ''           => esc_html__('Default', 'saniga'),
                                    'date'       => esc_html__('Date', 'saniga'),
                                    'id'         => esc_html__('ID', 'saniga'),
                                    'menu_order' => esc_html__('Menu Order', 'saniga'),
                                    'popularity' => esc_html__('Popularity', 'saniga'),
                                    'rand'       => esc_html__('Random', 'saniga'),
                                    'rating'     => esc_html__('Rating', 'saniga'),
                                    'title'      => esc_html__('Title', 'saniga'),
                                ]
                            ),
                            array(
                                'name'  => 'featured',
                                'label' => esc_html__('Only Featured?', 'saniga'),
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name'  => 'on_sale',
                                'label' => esc_html__('On Sale', 'saniga'),
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name'  => 'best_selling',
                                'label' => esc_html__('Best Selling', 'saniga'),
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name'  => 'top_rated',
                                'label' => esc_html__('Top Rated', 'saniga'),
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                            ),
                            array(
                                'name'  => 'paginate',
                                'label' => esc_html__('Paginate', 'saniga'),
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                            )
                        )
                    )
                )
            )
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}