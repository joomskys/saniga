<?php
etc_add_custom_widget(
    array(
        'name'       => 'cms_company_history',
        'title'      => esc_html__('CMS Company History', 'saniga'),
        'icon'       => 'eicon-history',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_company_history/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'section_timelines',
                    'label'    => esc_html__('Timelines', 'saniga'),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'    => 'timelines',
                            'type'    => \Elementor\Controls_Manager::REPEATER,
                            'default' => [
                                [
                                    'timeline_year'    => '2020',
                                    'timeline_title'   => 'Royal College of Surgeons of Harvard',
                                    'timeline_content' => 'He then traveled to Philadelphia, Pennsylvania to complete a Fellowship in Intervention Cardiology at Hahnemann Hospital in conjunction with Drexel University, where he received extensive training in coronary as well as peripheral interventions and salvage procedures. ',
                                ],
                                [
                                    'timeline_year'    => '2015',
                                    'timeline_title'   => 'Fellowship, Royal College of Physicians of Harvard',
                                    'timeline_content' => 'After relocating to Louisiana he served as Director of the Cardiac Catheterization Lab at Regional Medical Center of Acadiana. He was honored by the Medical Association for Physician\'s Recognition Award from March of 2015 through May 2016.',
                                ],
                                [
                                    'timeline_year'    => '2010',
                                    'timeline_title'   => 'Residency, St. Harvard University Hospital',
                                    'timeline_content' => 'Dr has also had professional accomplishments at the University of Southern California School of Medicine and Medical Center including Instructor of Medicine, Chief Administrative Fellow, Division of Cardiology University of Southern California.',
                                ],
                            ],
                            'controls' => array(
                                array(
                                    'name'        => 'timeline_year',
                                    'label'       => esc_html__('Timeline Year', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => ''
                                ),
                                array(
                                    'name'        => 'timeline_title',
                                    'label'       => esc_html__('Content Title', 'saniga'),
                                    'type'        => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'default'     => ''
                                ),
                                array(
                                    'name'    => 'timeline_content',
                                    'label'   => __( 'Content', 'saniga' ),
                                    'type'    => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows'    => '10',
                                    'default' => '',
                                ),
                            ),
                            'title_field' => '{{{ timeline_year }}}',
                        ),
                    ),
                ),
                array(
                    'name'     => 'style_section',
                    'label'    => esc_html__('Text Style', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name'      => 'year_color',
                            'label'     => esc_html__('Years Color', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-company-history .timeline-year' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'      => 'content_color',
                            'label'     => esc_html__('Content Color', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .cms-company-history .timeline-text' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);