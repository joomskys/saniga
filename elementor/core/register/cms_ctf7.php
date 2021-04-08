<?php
// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'saniga')] = 0;
    }

    etc_add_custom_widget(
        array(
            'name'       => 'cms_ctf7',
            'title'      => esc_html__('CMS Contact Form 7', 'saniga'),
            'icon'       => 'eicon-form-horizontal',
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
                                        'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_ctf7/layout-images/1.png'
                                    ]
                                ],
                                'prefix_class' => 'cms-cf7-layout-'
                            )
                        )
                    ),
                    array(
                        'name'     => 'source_section',
                        'label'    => esc_html__('Source Settings', 'saniga'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'        => 'form_title',
                                'label'       => esc_html__( 'Form Title', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXT,
                                'placeholder' => esc_html__( 'Request An Estimate', 'saniga' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'        => 'form_desc',
                                'label'       => esc_html__( 'Form Description', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                                'placeholder' => esc_html__( 'For a cleaning that meets your highest standards, you need a dedicated team of trained specialists with all supplies needed to thoroughly clean your home.', 'saniga' ),
                                'label_block' => true,
                            ),
                            array(
                                'name'    => 'ctf7_id',
                                'label'   => esc_html__('Select Form', 'saniga'),
                                'type'    => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            )
                        )
                    ),
                    array(
                        'name'     => 'image_section',
                        'label'    => esc_html__('Banner Settings', 'saniga'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'        => 'form_banner',
                                'label'       => esc_html__( 'Choose your banner', 'saniga' ),
                                'type'        => \Elementor\Controls_Manager::MEDIA,
                                'label_block' => true,
                                'condition'   => [
                                    'layout' => ['0']
                                ]
                            ),
                            array(
                                'name'         => 'thumbnail_size',
                                'type'         => \Elementor\Group_Control_Image_Size::get_type(),
                                'control_type' => 'group',
                                'default'      => 'full',
                                'condition'   => [
                                    'form_banner!' => ''
                                ]
                            )
                        ),
                        'condition' => [
                            'layout' => ['0']
                        ]
                    ),
                    array(
                        'name'     => 'icon_section',
                        'label'    => esc_html__('Icon Settings', 'saniga'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'             => 'selected_icon',
                                'label'            => esc_html__( 'Icon', 'saniga' ),
                                'type'             => \Elementor\Controls_Manager::ICONS,
                                'fa4compatibility' => 'icon',
                                'default'          => [
                                    'value'   => 'cmsi-paper-plane',
                                    'library' => 'cmsi',
                                ]
                            ),
                            array(
                                'name'         => 'icon_size',
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    'px' => [
                                        'min' => 20,
                                        'max' => 200,
                                    ]
                                ],
                                'size_units' => ['px'],
                                'default' => [
                                    'unit' => 'px',
                                    'size' => 50,
                                ],
                            )
                        ),
                        'condition' => [
                            'layout' => ['0']
                        ]
                    ),
                    array(
                        'name'     => 'rating_section',
                        'label'    => esc_html__('Rate Settings', 'saniga'),
                        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name'  => 'show_rate',
                                'type'  => \Elementor\Controls_Manager::SWITCHER,
                                'label' => esc_html__( 'Show Rate', 'saniga' ),
                                'default' => 'true'
                            ),
                            array(
                                'name'  => 'rate_star',
                                'type'  => \Elementor\Controls_Manager::MEDIA,
                                'label' => esc_html__( 'Star Icon', 'saniga' ),
                                'default' => [
                                    'url' => get_template_directory_uri().'/assets/images/icons/star-three.png'
                                ],
                                'condition' => [
                                    'show_rate' => 'true'
                                ]
                            ),
                            array(
                                'name'  => 'rate_star_bg',
                                'type'  => \Elementor\Controls_Manager::COLOR,
                                'label' => esc_html__( 'Star Icon Background', 'saniga' ),
                                'condition' => [
                                    'show_rate' => 'true'
                                ]
                            ),
                            array(
                                'name'  => 'rate_value',
                                'label' => esc_html__( 'Percent Value', 'saniga' ),
                                'type'  => \Elementor\Controls_Manager::SLIDER,
                                'range' => [
                                    '%' => [
                                        'min' => 1,
                                        'max' => 100,
                                    ]
                                ],
                                'size_units' => ['%'],
                                'default' => [
                                    'unit' => '%',
                                    'size' => '97' 
                                ],
                                'condition' => [
                                    'show_rate' => 'true'
                                ]
                            ),
                            array(
                                'name'  => 'rate_text',
                                'type'  => \Elementor\Controls_Manager::TEXTAREA,
                                'label' => esc_html__( 'Rate Text', 'saniga' ),
                                'condition' => [
                                    'show_rate' => 'true'
                                ]
                            )
                        ),
                        'condition' => [
                            'layout' => ['1']
                        ]
                    )
                )
            )
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}