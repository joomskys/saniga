<?php
// Register Quick Contact Widget
etc_add_custom_widget(
    array(
		'name'       => 'cms_search',
		'title'      => esc_html__( 'CMS Search', 'saniga' ),
		'icon'       => 'eicon-search',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_search/layout-image/1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-e-search-layout-'
                        ),
                    ),
                ),
                array(
					'name'     => 'settings_section',
					'label'    => esc_html__( 'Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
                                'name'        => 'search_text',
                                'label'       => esc_html__( 'Placeholder Text', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                                'label_block' => true,
                            ),
							array(
								'name'             => 'selected_icon',
								'label'            => esc_html__( 'Main Icon', 'saniga' ),
								'type'             => \Elementor\Controls_Manager::ICONS,
								'fa4compatibility' => 'icon',
								'default'          => [
									'value'   => 'cmsi-search',
									'library' => 'cmsi'
								],
	                        )
						),
						saniga_elementor_theme_colors([
							'name'            => 'search_icon_color',
							'label'           => esc_html__('Search Color','saniga'),
							'custom_name'     => 'search_icon_custom',
							'custom_label'    => esc_html__('Custom Search Color','saniga'),
							'custom_selector' => '.cms-e-search-button .cms-icon'
						])
					)
				)
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);