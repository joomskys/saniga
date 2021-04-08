<?php
if(!function_exists('saniga_add_cpt_support')){
    add_action( 'after_switch_theme', 'saniga_add_cpt_support');
    function saniga_add_cpt_support() {
        $cpt_support = get_option( 'elementor_cpt_support' );
        if( ! $cpt_support ) {
            $cpt_support = [ 'page', 'post', 'cms-service', 'cms-industry', 'cms-footer','cms-header-top', 'cms-mega-menu' ];
            update_option( 'elementor_cpt_support', $cpt_support );
        } else if( ! in_array( 'service', $cpt_support ) ) {
            $cpt_support[] = 'service';
            update_option( 'elementor_cpt_support', $cpt_support );
        } else if( ! in_array( 'industry', $cpt_support ) ) {
            $cpt_support[] = 'industry';
            update_option( 'elementor_cpt_support', $cpt_support );
        } else if( ! in_array( 'footer', $cpt_support ) ) {
            $cpt_support[] = 'footer';
            update_option( 'elementor_cpt_support', $cpt_support );
        } else if( ! in_array( 'cms-mega-menu', $cpt_support ) ) {
            $cpt_support[] = 'cms-mega-menu';
            update_option( 'elementor_cpt_support', $cpt_support );
        }
    }
}
// Add custom field to section
if(!function_exists('saniga_custom_section_params')){
    add_filter('etc-custom-section/custom-params', 'saniga_custom_section_params'); 
    function saniga_custom_section_params(){
        return array(
            'sections' => array(
                array(
                    'name'     => 'cms_custom_layout',
                    'label'    => esc_html__( 'Custom Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        // make section full content with a space on start / end
                        array(
                            'name'         => 'full_content_with_space',
                            'label'        => esc_html__( 'Full Content with space from?', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'prefix_class' => 'cms-full-content-with-space-',
                            'options'      => array(
                                'none'    => esc_html__( 'None', 'saniga' ),
                                'start'   => esc_html__( 'Start', 'saniga' ),
                                'end'     => esc_html__( 'End', 'saniga' ),
                                'start-wide'   => esc_html__( 'Start (Container Wide)', 'saniga' ),
                                'end-wide'     => esc_html__( 'End (Container Wide)', 'saniga' ),
                            ),
                            'default'      => 'none'
                        ),
                        // this field hasn't config prefix_class
                        // its value will be handled at saniga_custom_section_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
                            'name'    => 'column_hori_align',
                            'label'   => esc_html__( 'Horizontal Align', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                ''        => esc_html__( 'Default', 'saniga' ),
                                'start'   => esc_html__( 'Start', 'saniga' ),
                                'center'  => esc_html__( 'Center', 'saniga' ),
                                'end'     => esc_html__( 'End', 'saniga' ),
                                'around'  => esc_html__( 'Space Around', 'saniga' ),
                                'between' => esc_html__( 'Space Between', 'saniga' ),
                                'center cms-justify-content-xxl-between' => esc_html__( 'Space Center - XXL Between', 'saniga' ),
                            ),
                            'prefix_class' => 'cms-justify-content-',
                            'default'      => '',
                        ),
                        array(
                            'name'         => 'cms_boxed_bg',
                            'label'        => esc_html__( 'Boxed Background', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::SWITCHER,
                            'prefix_class' => 'cms-boxed-bg-',
                            'default'      => 'false',
                            'separator'    => 'before'
                        ),
                        array(
                            'name'      => 'cms_boxed_overlay',
                            'label'     => esc_html__( 'Overlay Color','saniga' ),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} > .cms-section-boxed-bg:before' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'cms_boxed_bg' => 'true'
                            ], 
                        ),
                        array(
                            'name'         => 'cms_boxed_bg_background',
                            'title'        => esc_html__( 'Boxed Background Type', 'saniga' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types'         => [ 'classic' ],
                            'fields_options' => [
                                'background' => [
                                    'frontend_available' => true,
                                ],
                            ],
                            'selector'  => '{{WRAPPER}} > .cms-section-boxed-bg',
                            'condition'    => [
                                'cms_boxed_bg' => ['true']
                            ]
                        ),
                        array(
                            'name'         => 'cms_boxed_divider',
                            'label'        => esc_html__( 'Boxed Divider', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::SWITCHER,
                            'prefix_class' => 'cms-section-boxed-divider-',
                            'default'      => 'false',
                            'separator'    => 'before'
                        ),
                        array(
                            'name'         => 'cms_boxed_divider_pos',
                            'label'        => esc_html__( 'Boxed Divider Position', 'saniga' ),
                            'type'         => \Elementor\Controls_Manager::SELECT,
                            'prefix_class' => 'cms-section-boxed-divider-',
                            'options'      => [
                                'top'    => esc_html__('Top', 'saniga'),
                                'bottom' => esc_html__('Bottom', 'saniga')
                            ],
                            'default'      => 'top',
                        ),
                        array(
                            'name'      => 'cms_boxed_divider_color',
                            'label'     => esc_html__( 'Divider Color','saniga' ),
                            'type'      => \Elementor\Controls_Manager::COLOR,
                            'default'   => '',
                            'selectors' => [
                                '{{WRAPPER}} > .cms-section-boxed-divider' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'cms_boxed_divider' => 'true'
                            ], 
                        ),
                        array(
                            'name'      => 'cms_boxed_divider_h',
                            'label'     => esc_html__( 'Divider Height', 'saniga' ),
                            'type'      => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min'  => 1,
                                    'max'  => 100,
                                    'step' => 1,
                                ],
                            ],
                            'default' => [
                                'size' => '1',
                            ],
                            'size_units' => [ 'px'],
                            'selectors' => [
                                '{{WRAPPER}} > .cms-section-boxed-divider' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'cms_boxed_divider' => 'true'
                            ] 
                        )
                    )
                )
            )
        );
    }
}

// add html to before row
if(!function_exists('saniga_boxed_bg')){
    add_filter('etc-custom-section/before-elementor-row', 'saniga_boxed_bg', 10 , 2);
    function saniga_boxed_bg( $html, $widget){
        $html .= '<div class="cms-section-boxed-bg"></div>';
        return $html;
    }
}
if(!function_exists('saniga_boxed_divider')){
    add_filter('etc-custom-section/before-elementor-row', 'saniga_boxed_divider', 11 , 2);
    function saniga_boxed_divider( $html, $widget){
        $html .= '<div class="cms-section-boxed-divider"></div>';
        return $html;
    }
}