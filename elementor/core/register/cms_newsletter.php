<?php
if(!class_exists('Newsletter')) return;
// Register CMS Newsletter
etc_add_custom_widget(
    array(
		'name'       => 'cms_newsletter',
		'title'      => esc_html__( 'CMS Newsletter', 'saniga' ),
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
                        array(
							'name'    => 'layout',
							'label'   => esc_html__( 'Templates', 'saniga' ),
							'type'    => Elementor_Theme_Core::LAYOUT_CONTROL,
							'default' => '1',
							'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'saniga' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_newsletter/layout-images/1.png'
                                ],
                            ],
                            'prefix_class' => 'cms-newsletter-layout-'
                        ),
                    ),
                ),
                array(
					'name'     => 'content_section',
					'label'    => esc_html__( 'Content', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
					'controls' => array(
                        array(
                            'name'        => 'stamp',
                            'label'       => esc_html__('Stamp', 'saniga'),
                            'type'        => \Elementor\Controls_Manager::MEDIA,
                            'default' => [
                                'url' => saniga_elementor_opt_default_image('footer-layout/stamp.png'),
                            ],
                            'label_block' => true,
                        ),
                        array(
							'name'        => 'title',
							'label'       => esc_html__( 'Title', 'saniga' ),
							'type'        => \Elementor\Controls_Manager::TEXTAREA,
							'placeholder' => esc_html__( 'Sign up for industry alerts, news and insights from Saniga.', 'saniga' ),
							'label_block' => true,
                        ),
                        array(
                            'name'        => 'name_text',
                            'label'       => esc_html__( 'Name Text', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter placeholder text', 'saniga' ),
                            'label_block' => true,
                            'condition'   => [
                                'layout' => ['1']
                            ]  
                        ),
                        array(
                            'name'        => 'email_text',
                            'label'       => esc_html__( 'Email Text', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter placeholder text', 'saniga' ),
                            'label_block' => true,
                            'condition'   => [
                                'layout' => ['1']
                            ] 
                        ),
                        array(
                            'name'        => 'button_text',
                            'label'       => esc_html__( 'Button Text', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__( 'Enter button text', 'saniga' ),
                            'label_block' => true,
                            'condition'   => [
                                'layout' => ['1']
                            ] 
                        )
                    ),
                )
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);