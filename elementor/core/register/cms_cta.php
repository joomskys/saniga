<?php
// Register Call to Action Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_cta',
        'title'      => esc_html__( 'CMS Call to Action', 'saniga' ),
        'icon'       => 'eicon-image-rollover',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        saniga_elementor_row_align([
                            'condition' => [
                                'layout' => ['0']
                            ]
                        ]),
                        saniga_elementor_text_align([
                            'condition' => [
                                'layout' => ['1']
                            ]
                        ]),
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_cta/layout-images/1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-cta-layout-',
                        )
                    ),
                ),
                array(
                    'name'     => 'heading_section',
                    'label'    => esc_html__( 'Heading Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_text_settings([
                        'name'      => 'heading_text',
                        'selecttor' => '.cms-cta-title'
                    ])
                ),
                array(
                    'name'     => 'cta_link1',
                    'label'    => esc_html__( 'Heading Link', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => saniga_elementor_hyperlink_settings([
                        'prefix'    => 'link1'
                    ]),
                    'condition' => [
                        'layout' => ['1']
                    ]
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);