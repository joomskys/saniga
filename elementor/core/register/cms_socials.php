<?php
// Register Quick Contact Widget
etc_add_custom_widget(
    array(
		'name'       => 'cms_socials',
		'title'      => esc_html__( 'CMS Social', 'saniga' ),
		'icon'       => 'eicon-social-icons',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
		'scripts'    => array(),
		'params'     => array(
            'sections' => array(
                array(
					'name'     => 'layout_section',
					'label'    => esc_html__( 'Layout', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
						saniga_elementor_row_align(),
                        array(
							'name'    => 'layout',
							'label'   => esc_html__( 'Templates', 'saniga' ),
							'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
							'default' => '1',
							'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_socials/layout-images/1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-socials-layout-'
                        ),
                    ),
                ),
                array(
					'name'     => 'social_section',
					'label'    => esc_html__( 'Socials Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
	                        array(
								'name'     => 'social_list',
								'label'    => esc_html__( 'Social Lists', 'saniga' ),
								'type'     => \Elementor\Controls_Manager::REPEATER,
								'controls' => array_merge(
									array(
		                                array(
											'name'        => 'social_name',
											'label'       => esc_html__( 'Name', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::TEXT,
											'label_block' => true,
		                                ),
		                                array(
											'name'        => 'social_link',
											'label'       => esc_html__( 'Link', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::URL,
											'placeholder' => esc_html__('https://your-link.com', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'             => 'social_icon',
											'label'            => esc_html__( 'Icon', 'saniga' ),
											'type'             => \Elementor\Controls_Manager::ICONS,
											'fa4compatibility' => 'social',
											'default'          => [],
				                        )
		                            ),
	                            ),
	                            'default' => [
	                                [
										'social_name' => 'Facebook',
										'social_link' => [
											'url'         => 'https://facebook.com',
											'is_external' => 'on'
										],
										'social_icon' => [
											'value'   => 'cmsi-facebook-1',
											'library' => 'cmsi',
										]
	                                ],
	                                [
										'social_name' => 'Twitter',
										'social_link' => [
											'url'         => 'https://twitter.com',
											'is_external' => 'on'
										],
										'social_icon' => [
											'value'   => 'cmsi-twitter-1',
											'library' => 'cmsi',
										]
	                                ],
	                                [
										'social_name' => 'Linkedin',
										'social_link' => [
											'url'         => 'https://linkedin.com',
											'is_external' => 'on'
										],
										'social_icon' => [
											'value'   => 'cmsi-linkedin-1',
											'library' => 'cmsi',
										]
	                                ]
	                            ],
	                            'title_field' => '{{{ elementor.helpers.renderIcon( this, social_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ social_name }}}'
	                        )
						),
						array(
							array(
								'name'    => 'social_shape',
								'label'   => esc_html__( 'Shape', 'saniga' ),
								'type'    => \Elementor\Controls_Manager::SELECT,
								'default' => '',
								'options' => [
									''        => esc_html__('Default', 'saniga'),
									'rounded' => esc_html__( 'Rounded', 'saniga' ),
									'square'  => esc_html__( 'Square', 'saniga' ),
									'circle'  => esc_html__( 'Circle', 'saniga' ),
								],
								'prefix_class' => 'cms-shape-',
				            ),
				            array(
								'name'       => 'social_shape_round',
								'label'      => esc_html__( 'Icon Rounded', 'saniga' ),
								'type'       => \Elementor\Controls_Manager::DIMENSIONS,
								'size_units' => [ 'px', '%' ],
								'selectors'  => [
	                                '{{WRAPPER}} a, {{WRAPPER}} .cms-icon-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
	                            ],
	                            'condition' => [
                                    'social_shape'    => ['rounded']                            
                                ],
				            ),
							array(
				                'name'  => 'social_size',
				                'label' => esc_html__( 'Size', 'saniga' ),
				                'type'  => \Elementor\Controls_Manager::SLIDER,
				                'range' => [
				                    'px' => [
				                        'min' => 20,
				                        'max' => 200,
				                    ],
				                ],
				                'default' => [
									'size' => '25',
								],
				                'selectors' => [
				                    '{{WRAPPER}} .cms-icon-wrap' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				                ]
				            )
	                    ),
	                    array(	
							array(
				                'name'  => 'social_icon_size',
				                'label' => esc_html__( 'Icon Size', 'saniga' ),
				                'type'  => \Elementor\Controls_Manager::SLIDER,
				                'range' => [
				                    'px' => [
				                        'min' => 10,
				                        'max' => 50,
				                    ],
				                ],
				                'default' => [
									'size' => '20',
								],
				                'selectors' => [
				                    '{{WRAPPER}} .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				                ]
				            )
	                    ),
						saniga_elementor_theme_colors([
							'name'            => 'social_icon_color',
							'label'           => esc_html__('Icon Color','saniga'),
							'custom_name'     => 'social_icon_color_custom',
							'custom_label'    => esc_html__('Custom Icon Color','saniga'),
							'custom_selector' => '.cms-icon'
						]),
						saniga_elementor_theme_colors([
							'name'            => 'social_icon_color_hover',
							'label'           => esc_html__('Hover Color','saniga'),
							'custom_name'     => 'social_icon_color_hover_custom',
							'custom_label'    => esc_html__('Custom Hover Color','saniga'),
							'custom_selector' => 'a:hover .cms-icon'
						]),
                        saniga_elementor_theme_colors([
							'name'            => 'social_bg_color',
							'label'           => esc_html__('Background Color','saniga'),
							'custom_name'     => 'social_bg_color_custom',
							'custom_label'    => esc_html__('Custom Background Color','saniga'),
							'custom_selector' => '.cms-icon-wrap'
						]),
						saniga_elementor_theme_colors([
							'name'                => 'social_bg_color_hover',
							'label'               => esc_html__('Background Hover Color','saniga'),
							'custom_name'         => 'social_bg_color_hover_custom',
							'custom_label'        => esc_html__('Custom Background Hover Color','saniga'),
							'custom_selector'     => 'a:hover .cms-icon-wrap',
							'custom_selector_tag' => 'background-color'
						])
                    )
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);