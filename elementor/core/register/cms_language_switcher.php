<?php
if(!class_exists('TRP_Translate_Press')) return;
// Register Post Grid Widget
etc_add_custom_widget(
    array(
        'name'       => 'cms_language_switcher',
        'title'      => esc_html__( 'CMS Languae Switcher', 'saniga' ),
        'icon'       => 'eicon-posts-carousel',
        'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
        'scripts'    => [],
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Items Layout', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Templates', 'saniga' ),
                            'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                'label' => esc_html__( 'Layout 1', 'saniga' ),
                                'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_language_switcher/layout-image/1.png'
                            ],
                            'prefix_class' => 'cms-ls-layout-'
                        )
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);