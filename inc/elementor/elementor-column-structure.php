<?php
// Add custom field to column
if(!function_exists('saniga_custom_column_params')){
    add_filter('etc-custom-column/custom-params', 'saniga_custom_column_params');
    function saniga_custom_column_params(){
        return array(
            'sections' => array(
                array(
					'name'     => 'custom_section',
					'label'    => esc_html__( 'Custom Settings', 'saniga' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
                        // this field hasn't config prefix_class
                        // its value will be handled at saniga_custom_column_classes function
                        // screen shot - http://prntscr.com/tjco9g
                        array(
							'name'    => 'element_display',
							'label'   => esc_html__( 'Element Display Settings', 'saniga' ),
							'type'    => \Elementor\Controls_Manager::SELECT,
							'options' => array(
								''           => esc_html__( 'Default', 'saniga' ),
								'horizontal' => esc_html__( 'Horizontal', 'saniga' ),
                            ),
                            'default' => '',
                            'prefix_class' => 'cms-column-element-'
                        )
                    )
                )
            )
        );
    }
}