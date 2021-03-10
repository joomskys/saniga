<?php
// Register Quick Contact Widget
etc_add_custom_widget(
    array(
		'name'       => 'cms_quickcontact',
		'title'      => esc_html__( 'CMS Quick Contact', 'saniga' ),
		'icon'       => 'eicon-mail',
		'categories' => array( Elementor_Theme_Core::ETC_CATEGORY_NAME ),
		'scripts'    => array(),
		'params'     => array(
            'sections' => array(
                array(
					'name'     => 'layout_section',
					'label'    => esc_html__( 'Layout', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
						saniga_elementor_row_align([
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_quickcontact/layout-image/1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-quick-contact-layout-'
                        ),
                    ),
                ),
                array(
					'name'     => 'contact_section',
					'label'    => esc_html__( 'Contact Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
	                        array(
								'name'     => 'contact_list',
								'label'    => esc_html__( 'Contact Lists', 'saniga' ),
								'type'     => \Elementor\Controls_Manager::REPEATER,
								'controls' => array_merge(
									array(
		                                array(
											'name'        => 'contact_list_title_1',
											'label'       => esc_html__( 'Title 1', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::TEXT,
											'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
											'default'     => esc_html__( 'Enter your text', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'        => 'contact_list_text_1',
											'label'       => esc_html__( 'Text 1', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::TEXT,
											'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
											'default'     => esc_html__( 'Enter your text', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'        => 'contact_list_title_2',
											'label'       => esc_html__( 'Title 2', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::TEXT,
											'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
											'default'     => esc_html__( 'Enter your text', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'        => 'contact_list_text_2',
											'label'       => esc_html__( 'Text 2', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::TEXT,
											'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
											'default'     => esc_html__( 'Enter your text', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'        => 'contact_list_text_link',
											'label'       => esc_html__( 'Link', 'saniga' ),
											'type'        => \Elementor\Controls_Manager::URL,
											'placeholder' => esc_html__('https://your-link.com', 'saniga' ),
											'label_block' => true,
		                                ),
		                                array(
											'name'             => 'contact_list_icon',
											'label'            => esc_html__( 'Icon', 'saniga' ),
											'type'             => \Elementor\Controls_Manager::ICONS,
											'fa4compatibility' => 'icon',
											'default'          => [],
				                        )
		                            ),
		                            saniga_elementor_theme_colors([
										'name'            => 'contact_list_text_color',
										'label'           => esc_html__('Text Color','saniga'),
										'custom_name'     => 'contact_list_text_color_custom',
										'custom_label'    => esc_html__('Custom Text Color','saniga'),
										'custom_selector' => '.cms-qc-list'
									]),
									saniga_elementor_theme_colors([
										'name'            => 'contact_list_text_icon_color',
										'label'           => esc_html__('Icon Color','saniga'),
										'custom_name'     => 'contact_list_text_icon_color_custom',
										'custom_label'    => esc_html__('Custom Icon Color','saniga'),
										'custom_selector' => '.cms-qc-wrap .cms-qc-list .cms-icon'
									])
	                            ),
	                            'default' => [
	                                [
										'contact_list_title_1' => 'Emergency Line:',
										'contact_list_text_1'  => '(002) 01061245741',
										'contact_list_title_2' => '',
										'contact_list_text_2'  => '',
										'contact_list_icon'    => [
											'value'   => 'cmsi-phone-alt',
											'library' => 'cmsi',
										]
	                                ],
	                                [
	                                    'contact_list_title_1' => 'Location:',
	                                    'contact_list_text_1' => 'Brooklyn, New York',
	                                    'contact_list_title_2' => '',
	                                    'contact_list_text_2' => '',
	                                    'contact_list_icon'  => [
											'value'   => 'cmsi-map-marker-alt',
											'library' => 'cmsi',
										]
	                                ],
	                                [
	                                    'contact_list_title_1' => 'Mon - Fri:',
	                                    'contact_list_text_1' => '8.00am - 7.00pm',
	                                    'contact_list_title_2' => '',
	                                    'contact_list_text_2' => '',
	                                    'contact_list_icon'  => [
											'value'   => 'cmsi-clock',
											'library' => 'cmsi',
										]
	                                ]
	                            ],
	                            'title_field' => '{{{ elementor.helpers.renderIcon( this, contact_list_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ contact_list_title_1 }}} {{{ contact_list_text_1 }}}',
	                            'condition'   => [
									'layout' => ['1', '10']
								]
	                        )
						),
						saniga_elementor_theme_colors([
							'name'            => 'text_color',
							'label'           => esc_html__('Text Color','saniga'),
							'custom_name'     => 'text_color_custom',
							'custom_label'    => esc_html__('Custom Text Color','saniga'),
							'custom_selector' => '.cms-qc-inner > .row'
						]),
						array(	
							array(
				                'name'  => 'contact_list_icon_size',
				                'label' => esc_html__( 'Icon Size', 'saniga' ),
				                'type'  => \Elementor\Controls_Manager::SLIDER,
				                'range' => [
				                    'px' => [
				                        'min' => 10,
				                        'max' => 200,
				                    ],
				                ],
				                'selectors' => [
				                    '{{WRAPPER}} .cms-qc-list .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				                ]
				            )
	                    ),
						saniga_elementor_theme_colors([
							'name'            => 'contact_list_icon_color',
							'label'           => esc_html__('Icon Color','saniga'),
							'custom_name'     => 'contact_list_icon_color_custom',
							'custom_label'    => esc_html__('Custom Icon Color','saniga'),
							'custom_selector' => '.cms-qc-list .cms-icon'
						])
                    ),
					'condition'   => [
						'layout' => ['1','10']
					]
                ),
				array(
					'name'     => 'dropdown_section',
					'label'    => esc_html__( 'Dropdown Heading Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'dropdown_heading_text',
								'label'       => esc_html__( 'Dropdown Heading', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXT,
								'default'     => '',
								'placeholder' => esc_html__( '24/7 Emergency', 'saniga' ),
								'label_block' => true
	                        ),
	                        array(
                                'name'        => 'dropdown_heading_color',
                                'label'       => esc_html__( 'Dropdown Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'dropdown_heading_custom_color',
                                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'dropdown_heading_color'      => 'custom'
                                ],
                            )
                        )
					),
					'condition'   => [
						'layout' => ['8']
					]
				),
                array(
					'name'     => 'background_section',
					'label'    => esc_html__( 'Background Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'background_image',
								'label'       => esc_html__( 'Background Image', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::MEDIA,
								'default'	  => '',		
								'label_block' => true,
	                        ),
	                        array(
								'name'        => 'background_overlay',
								'label'       => esc_html__( 'Background Overlay', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::SELECT,
								'options'	  => [
									''     => esc_html__('Default', 'saniga'),
									'none' => esc_html__('None', 'saniga'),
									'1'    => esc_html__('Gradient 1', 'saniga'),
									'2'    => esc_html__('Gradient 2', 'saniga'),
									'3'    => esc_html__('Gradient 3', 'saniga'),
									'4'    => esc_html__('Gradient 4', 'saniga'),
								],
								'default' => ''
	                        ),
	                        array(
                                'name'        => 'gradient_bg_color',
                                'label'       => esc_html__( 'Background Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'options'     => '',  
                                'default'     => '',
                            ),
						)
					),
					'condition'   => [
						'layout' => ['2','3','4','5','6','7','8']
					]
				),
                array(
					'name'     => 'icon_section',
					'label'    => esc_html__( 'Icon Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'             => 'selected_icon',
								'label'            => esc_html__( 'Main Icon', 'saniga' ),
								'type'             => \Elementor\Controls_Manager::ICONS,
								'fa4compatibility' => 'icon',
								'default'          => [],
	                        ),
	                        array(
                                'name'        => 'icon_color',
                                'label'       => esc_html__( 'Icon Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            )
						)
					),
					'condition'   => [
						'layout' => ['2','3','4','5','6','7','8']
					]
				),
                array(
					'name'     => 'heading_section',
					'label'    => esc_html__( 'Heading Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'heading_text',
								'label'       => esc_html__( 'Heading', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXTAREA,
								'default'     => '',
								'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
								'label_block' => true
	                        ),
	                        array(
	                            'name'         => 'heading_text_typo',
	                            'type'         => \Elementor\Group_Control_Typography::get_type(),
	                            'control_type' => 'group',
	                            'default'      => '',
	                            'selector'     => '{{WRAPPER}} .cms-heading',
	                            'condition'    => [
                                    'heading_text!' => ''
                                ],
	                        ),
	                        array(
	                            'name'         => 'heading_text_shadow',
	                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
	                            'control_type' => 'group',
	                            'default'      => '',
	                            'selector'     => '{{WRAPPER}} .cms-heading',
	                            'condition'    => [
                                    'heading_text!' => ''
                                ],
	                        ),
	                        array(
								'name'      => 'heading_extra_space',
								'label'     => esc_html__( 'Extra bottom Space', 'saniga' ),
								'type'      => \Elementor\Controls_Manager::NUMBER,
								'condition' => [
	                                'heading_text!' => '',
	                            ],
	                        ),
	                        array(
                                'name'        => 'heading_color',
                                'label'       => esc_html__( 'Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                                'condition'   => [
                                    'heading_text!' => ''
                                ],
                            ),
                            array(
                                'name'        => 'heading_custom_color',
                                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'heading_color'      => 'custom'
                                ],
                            ),
                            array(
								'name'      => 'heading_animation',
								'label'     => esc_html__( 'Motion Effect', 'saniga' ),
								'type'      => \Elementor\Controls_Manager::ANIMATION,
								'condition' => [
                                    'heading_text!' => ''
                                ],
                            )
                        )
					),
					'condition'   => [
						'layout' => ['2','3','4','5','6','7','8','9']
					]
				),
				array(
					'name'     => 'desc_section',
					'label'    => esc_html__( 'Description Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'description_text',
								'label'       => esc_html__( 'Description', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXTAREA,
								'default'     => '',
								'placeholder' => esc_html__( 'Enter your description', 'saniga' ),
								'show_label'  => false
	                        ),
	                        array(
                                'name'        => 'description_color',
                                'label'       => esc_html__( 'Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'description_custom_color',
                                'label'       => esc_html__( 'Custom Description Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'description_color'      => 'custom'
                                ],
                            ),
                            array(
                                'name' => 'description_animation',
                                'label' => esc_html__( 'Motion Effect', 'saniga' ),
                                'type' => \Elementor\Controls_Manager::ANIMATION,
                                'condition'   => [
                                    'description_text!' => ''
                                ],
                            ),
                        )
					),
					'condition'   => [
						'layout' => ['2','3','4','5','6','7','8','9']
					]
				),
				array(
					'name'     => 'timetable_section',
					'label'    => esc_html__( 'Timetable', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
	                        array(
								'name'     => 'timetable',
								'label'    => esc_html__( 'Timetable', 'saniga' ),
								'type'     => \Elementor\Controls_Manager::REPEATER,
								'controls' => array(
	                                array(
										'name'        => 'date',
										'label'       => esc_html__( 'Date', 'saniga' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your date', 'saniga' ),
										'default'     => esc_html__( 'Enter your date', 'saniga' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'        => 'time',
										'label'       => esc_html__( 'Time', 'saniga' ),
										'type'        => \Elementor\Controls_Manager::TEXT,
										'placeholder' => esc_html__( 'Enter your time', 'saniga' ),
										'default'     => esc_html__( 'Enter your time', 'saniga' ),
										'label_block' => true,
	                                ),
	                                array(
										'name'             => 'timetable_icon',
										'label'            => esc_html__( 'Icon', 'saniga' ),
										'type'             => \Elementor\Controls_Manager::ICONS,
										'fa4compatibility' => 'icon',
										'default'          => [],
			                        ),
	                            ),
	                            'default' => [
	                                [
										'date' => 'Monday - Friday',
										'time'  => '8.00 - 7:00 pm',
	                                ],
	                                [
										'date' => 'Saturday',
										'time'  => '9.00 - 8.00 pm',
	                                ],
	                                [
										'date' => 'Sunday',
										'time'  => '10.00 - 9.00 pm',
	                                ]
	                            ],
	                            'title_field' => '{{{ elementor.helpers.renderIcon( this, timetable_icon, {}, "i", "panel" ) || \'<i class="{{ icon }}" aria-hidden="true"></i>\' }}} {{{ date }}} - {{{ time }}}',
	                        ),
	                        array(
                                'name'        => 'timetable_color',
                                'label'       => esc_html__( 'Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(),  
                                'default'     => '',
                            ),
                            array(
                                'name'        => 'timetable_custom_color',
                                'label'       => esc_html__( 'Custom Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::COLOR,
                                'condition'   => [
                                    'timetable_color'      => 'custom'
                                ],
                            ),
	                    )
                    ),
					'condition'   => [
						'layout' => ['3','6']
					]
                ),
				array(
					'name'     => 'phone_section',
					'label'    => esc_html__( 'Phone Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'             => 'phone_icon',
								'label'            => esc_html__( 'Phone Icon', 'saniga' ),
								'type'             => \Elementor\Controls_Manager::ICONS,
								'fa4compatibility' => 'icon',
								'default'          => [],
								'placeholder'      => esc_html__( 'Choose phone icon', 'saniga' ),
	                        ),
							array(
								'name'        => 'phone_number',
								'label'       => esc_html__( 'Phone Number', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXT,
								'default'     => '',
								'placeholder' => esc_html__( 'Enter your phone number', 'saniga' ),
								'label_block' => true
	                        ),
	                        array(
								'name'        => 'phone_bg',
								'label'       => esc_html__( 'Icon Phone Background', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::COLOR,
								'default'     => '',
								'selectors'	  => [
									'{{WRAPPER}} .cms-phone-icon' => 'background-color: {{VALUE}};',
								]
	                        ),
	                        array(
                                'name'        => 'phone_text_color',
                                'label'       => esc_html__( 'Text Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => 'white',
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'phone_text_color_hover',
                                'label'       => esc_html__( 'Text Hover Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),  
                                'default'     => 'white',
                                'label_block' => true,
                            ),
                        )
					),
					'condition'   => [
						'layout' => ['2','3','5','6','8','9']
					]
				),
				array(
					'name'     => 'button_section',
					'label'    => esc_html__( 'Button Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						saniga_elementor_button_settings(),
					),
					'condition'   => [
						'layout' => ['4']
					]
				),
				array(
					'name'     => 'button_section2',
					'label'    => esc_html__( 'Button Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						saniga_elementor_button_settings([
							'prefix' 		   => 'btn2',
							'btn_text'         => 'Schedule An Appointment',
							'btn_type_default' => 'btn btn-outline',
							'btn_color'		   => 'white',
							'btn_hover_color'  => 'white',
							'btn_size'		   => 'lg'		 
						]),
					),
					'condition'   => [
						'layout' => ['2']
					]
				),
				array(
					'name'     => 'map_section',
					'label'    => esc_html__( 'Map Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array_merge(
						array(
							array(
								'name'        => 'map_image',
								'label'       => esc_html__( 'Map Image', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::MEDIA,
								'default'	  => '',		
								'label_block' => true,
								'condition'   => [
									'layout' => ['7']
								]	
	                        ),
	                        array(
								'name'        => 'map_address',
								'label'       => esc_html__( 'Map Address', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXTAREA,
								'default'	  => '',		
								'label_block' => true,
								'condition'   => [
									'layout' => ['9']
								]	
	                        ),
	                        array(
								'name'        => 'map_link',
								'label'       => esc_html__( 'Map Link', 'saniga' ),
								'type'        => \Elementor\Controls_Manager::TEXT,
								'default'	  => 'https://maps.google.com',		
								'label_block' => true,
								'condition'   => [
									'layout'       => ['9'],
									'map_address!' => ''
								]	
	                        ),
	                        array(
                                'name'        => 'map_link_color',
                                'label'       => esc_html__( 'Map Link Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),
                                'label_block' => true,
                                'condition' => [
                                	'map_link!' => ''
                                ]
                            ),
                            array(
                                'name'        => 'map_link_color_hover',
                                'label'       => esc_html__( 'Map Link Hover Color', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::SELECT,
                                'options'     => saniga_elementor_theme_color_opts(['custom' => false]),
                                'label_block' => true,
                                'condition' => [
                                	'map_link!' => ''
                                ]
                            ),
						)
					),
					'condition'   => [
						'layout' => ['7','9']
					]
				),
				array(
					'name'     => 'button_section10',
					'label'    => esc_html__( 'Button Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => saniga_elementor_button_settings([
						'prefix'           => 'layout10',
						'btn_text'         => 'Request A Quote',
						'btn_type_default' => 'btn btn-fill'
		            ]),
					'condition'   => [
						'layout' => ['10']
					]
		        )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);