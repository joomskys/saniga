<?php
etc_add_custom_widget(
    array(
        'name'       => 'cms_copyright',
        'title'      => esc_html__('CMS Copyright', 'saniga'),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_copyright/layout-images/1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-copyright-layout-'
                        )
                    )
                ),
                array(
                    'name'     => 'setting_section',
                    'label'    => esc_html__('Settings', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'copyright_text',
                            'label'       => esc_html__('Copyright Text', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name'        => 'copyright_color',
                            'label'       => esc_html__( 'Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'condition'   => [
                                'copyright_text!' => ''
                            ]
                        ),
                        array(
                            'name'        => 'copyright_custom_color',
                            'label'       => esc_html__( 'Custom Text Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::COLOR,
                            'condition'   => [
                                'copyright_text!' => '',
                                'copyright_color' => 'custom'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .cms-copyright-text' => 'color:{{VALUE}};'
                            ]
                        ),
                        array(
                            'name'        => 'link_color',
                            'label'       => esc_html__( 'Link Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                        ),
                        array(
                            'name'        => 'link_hover_color',
                            'label'       => esc_html__( 'Link Hover Color', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                        ),
                        saniga_elementor_text_align([
                            'label'     => esc_html__('Text Align','saniga')
                        ]),
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);