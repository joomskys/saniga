<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $single_menu ) {
        if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->term_id ) ) {
            $custom_menus[ $single_menu->slug ] = $single_menu->name;
        }
    }
} else {
    $custom_menus = '';
}
etc_add_custom_widget(
    array(
        'name'       => 'cms_menu',
        'title'      => esc_html__('CMS Menu', 'saniga'),
        'icon'       => 'eicon-menu-bar',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_menu/layout-images/1.png'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_menu/layout-images/2.png'
                                ],
                                '3' => [
                                    'label' => esc_html__( 'Layout 3', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_menu/layout-images/3.png'
                                ],
                                '4' => [
                                    'label' => esc_html__( 'Layout 4', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_menu/layout-images/4.png'
                                ],
                                '5' => [
                                    'label' => esc_html__( 'Layout 5', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_menu/layout-images/5.png'
                                ]
                            ],
                            'prefix_class' => 'cms-menu-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'setting_section',
                    'label'    => esc_html__('Settings', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'heading_text',
                            'label'       => esc_html__('Heading', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition'   => [
                                'layout'  => ['2','4','5']
                            ]
                        ),
                        array(
                            'name'        => 'heading_color',
                            'label'       => esc_html__( 'Heading Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                            'condition'   => [
                                'heading_text!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'heading_custom_color',
                            'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'heading_text!' => '',
                                'heading_color' => 'custom'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-heading' => 'color:{{VALUE}};'
                            ]
                        ),
                        array(
                            'name'        => 'heading_link_page',
                            'label'       => esc_html__( 'Heading Link', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'default'     => '',
                            'options'     => saniga_elementor_list_page_opts(),
                            'condition'   => [
                                'layout' => ['5']
                            ]
                        ), 
                        array(
                            'name'      => 'menu',
                            'label'     => esc_html__('Select Menu', 'saniga'),
                            'type'      => \Elementor\Controls_Manager::SELECT,
                            'options'   => $custom_menus,
                            'separator' => 'before'
                        ),
                        array(
                            'name'        => 'link_color',
                            'label'       => esc_html__( 'Link Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts([
                                'custom'   => false
                            ]),
                            'selectors'   => [
                                '{{WRAPPER}} .cms-menu > li:not(:last-child):after' => 'background-color:var(--color-{{VALUE}});'
                            ]
                        ),
                        array(
                            'name'        => 'link_hover_color',
                            'label'       => esc_html__( 'Link Hover Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts([
                                'custom'   => false
                            ]),
                        ),
                        array(
                            'name'        => 'link_bg_color',
                            'label'       => esc_html__( 'Item Background Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts([
                                'custom'   => false
                            ])
                        ),
                        array(
                            'name'        => 'link_bg_hover_color',
                            'label'       => esc_html__( 'Item Background Hover Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts([
                                'custom'   => false
                            ])
                        ),
                        saniga_elementor_row_align([
                            'label'     => esc_html__('Text Align','saniga'),
                            'condition' => [
                                'layout' => ['1']
                            ]
                        ])
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);