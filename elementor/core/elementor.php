<?php
/**
 * Get Page List 
 * @return array 
*/
if(!function_exists('saniga_elementor_list_page_opts')){
    function saniga_elementor_list_page_opts($default = []){
        $page_list = array();
        if(!empty($default))
            $page_list[$default['value']] = $default['label'];
        $pages = get_pages(array('hierarchical' => 0, 'posts_per_page' => '-1'));
        foreach($pages as $page){
            $page_list[$page->post_name] = $page->post_title;
        }
        return $page_list;
    }
}
/**
 * Term option for post type
 * make option for elementor element option 
*/
if(!function_exists('etc_get_grid_term_by_post_type_options')){
    function etc_get_grid_term_by_post_type_options($args=[]){
        $args = wp_parse_args($args, ['condition' => 'post_type', 'custom_condition' => []]);
        $post_types = get_post_types([
            'public'   => true,
            //'_builtin' => false
        ], 'objects');
        $DefaultExcludedPostTypes = [
            'page',
            'attachment',
            'revision',
            'nav_menu_item',
            'vc_grid_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'cms-mega-menu',
            'elementor_library'
        ];
        $ExtraExcludedPostTypes = apply_filters('etc_get_post_types', []);
        $excludedPostTypes      = array_merge($DefaultExcludedPostTypes, $ExtraExcludedPostTypes );

        $result = [];
        if (!is_array($post_types))
            return $result;
        foreach ($post_types as $post_type) {
            if (!$post_type instanceof WP_Post_Type)
                continue;
            if (in_array($post_type->name, $excludedPostTypes))
                continue;
            $result[] = array(
                'name'     => 'source_'.$post_type->name,
                'label'    => sprintf(esc_html__( 'Select Term of %s', 'saniga' ), $post_type->labels->singular_name),
                'type'     => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options'  => etc_get_grid_term_options($post_type->name),
                'condition' => array_merge(
                    [
                        $args['condition'] => [$post_type->name]
                    ],
                    $args['custom_condition']
                )
            );
        }
  
        return $result;
    }
}
if(!function_exists('saniga_etc_get_post_types')){
    add_filter('etc_get_post_types', 'saniga_etc_get_post_types');
    function saniga_etc_get_post_types(){
        return ['e-landing-page'];
    }
}
/**
 * Extra Elementor Icons
*/
if(!function_exists('saniga_register_custom_icon_library')){
    add_filter('elementor/icons_manager/native', 'saniga_register_custom_icon_library');
    function saniga_register_custom_icon_library($tabs){
        $custom_tabs = [
            'cmsi_icon' => [
                'name'          => 'cmsi-icon',
                'label'         => esc_html__( 'CMS Icons', 'saniga' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/font-cmsi/styles.css',
                'enqueue'       => [],
                'prefix'        => 'cmsi-',
                'displayPrefix' => '',
                'labelIcon'     => 'cmsi-arrow-circle-right',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/font-cmsi.js',
                'native'        => true,
            ],
            'cmsi_saniga' => [
                'name'          => 'cmsi-saniga',
                'label'         => esc_html__( 'CMS Saniga', 'saniga' ),
                'url'           => get_template_directory_uri() . '/assets/fonts/font-saniga/flaticon.css',
                'enqueue'       => [],
                'prefix'        => 'flaticon-',
                'displayPrefix' => '',
                'labelIcon'     => 'flaticon-001-house',
                'ver'           => '1.0.0',
                'fetchJson'     => get_template_directory_uri() . '/assets/fonts/font-saniga.js',
                'native'        => true,
            ]
        ];
        $tabs = array_merge($custom_tabs, $tabs);
        return $tabs;
    }
}

// Elementor Post layout
if(!function_exists('saniga_elementor_post_layout')){
    function saniga_elementor_post_layout(){
        return [
            '1' => [
                'label' => esc_html__( 'Layout 1', 'saniga' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/1.png'
            ],
            '2' => [
                'label' => esc_html__( 'Layout 2', 'saniga' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/2.png'
            ],
            '3' => [
                'label' => esc_html__( 'Layout 3', 'saniga' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/3.png'
            ],
            '4' => [
                'label' => esc_html__( 'Layout 4', 'saniga' ),
                'image' => get_template_directory_uri() . '/elementor/templates/layouts/posts/4.png'
            ]
        ];
    }
}

/**
 * Elementor Default Image
*/
function saniga_elementor_opt_default_image($name){
    return get_template_directory_uri() .'/assets/images/'.$name;
}
/**
 * Elementor Text Settings
*/
function saniga_elementor_text_settings($args){
    $args = wp_parse_args($args, [
        'label'    => esc_html__( 'Heading', 'saniga' ),
        'name'     => 'text',
        'selector' => '.text',
        'separator' => ''
    ]);
    return array(
        array(
            'name'        => $args['name'],
            'label'       => $args['label'],
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'placeholder' => esc_html__( 'Enter your text', 'saniga' ),
            'label_block' => true,
            'separator'   => $args['separator']
        ),
        array(
            'name'         => $args['name'].'_typo',
            'type'         => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} '.$args['selector'],
            'condition'    => [
                $args['name'].'!' => ''
            ],
        ),
        array(
            'name'         => $args['name'].'_shadow',
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} '.$args['selector'],
            'condition'    => [
                $args['name'].'!' => ''
            ],
        ),
        array(
            'name'      => $args['name'].'_extra_space',
            'label'     => esc_html__( 'Extra bottom Space', 'saniga' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'selectors'  => [
                '{{WRAPPER}} '.$args['selector'].' + .extra-space' => 'margin-bottom:{{VALUE}}px;'
            ],
            'condition' => [
                $args['name'].'!' => '',
            ],
        ),
        array(
            'name'        => $args['name'].'_color',
            'label'       => esc_html__( 'Color', 'saniga' ),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => saniga_elementor_theme_color_opts(),  
            'default'     => '',
            'condition'   => [
                $args['name'].'!' => ''
            ],
        ),
        array(
            'name'        => $args['name'].'_custom_color',
            'label'       => esc_html__( 'Custom Color', 'saniga' ),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'condition'   => [
                $args['name'].'_color'      => 'custom'
            ],
            'selectors'  => [
                '{{WRAPPER}} '.$args['selector'] => 'color:{{VALUE}};'
            ]
        ),
        array(
            'name'      => $args['name'].'_animation',
            'label'     => esc_html__( 'Motion Effect', 'saniga' ),
            'type'      => \Elementor\Controls_Manager::ANIMATION,
            'condition' => [
                $args['name'].'!' => ''
            ],
        ),
        array(
            'name'      => $args['name'].'_animation_delay',
            'label'     => esc_html__( 'Transition Delay', 'saniga' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'condition' => [
                $args['name'].'_animation!' => ''
            ],
        )
    );
}
/**
 * Elementor Typo Settings
*/
function saniga_elementor_typo_settings($args){
    $args = wp_parse_args($args, [
        'name'     => 'typo_text',
        'selector' => '.typo-text',
        'condition'=> []
    ]);
    return array(
        array(
            'name'         => $args['name'].'_typo',
            'type'         => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} '.$args['selector'],
            'condition'    => $args['condition']
        ),
        array(
            'name'         => $args['name'].'_shadow',
            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} '.$args['selector'],
            'condition'    => $args['condition']
        ),
        array(
            'name'        => $args['name'].'_color',
            'label'       => esc_html__( 'Color', 'saniga' ),
            'type'        => \Elementor\Controls_Manager::SELECT,
            'options'     => saniga_elementor_theme_color_opts(),
            'condition'    => $args['condition'] 
        ),
        array(
            'name'        => $args['name'].'_custom_color',
            'label'       => esc_html__( 'Custom Color', 'saniga' ),
            'type'        => \Elementor\Controls_Manager::COLOR,
            'condition'   => array_merge(
                [
                    $args['name'].'_color'      => 'custom'
                ],
                $args['condition']
            ),
            'selectors'  => [
                '{{WRAPPER}} '.$args['selector'] => 'color:{{VALUE}};'
            ]
        )
    );
}
/**
 * Elementor Animate
*/
function saniga_animate() {
    $cms_animate = array(
        ''                       => 'None',
        'wow bounce'             => 'bounce',
        'wow flash'              => 'flash',
        'wow pulse'              => 'pulse',
        'wow rubberBand'         => 'rubberBand',
        'wow shake'              => 'shake',
        'wow swing'              => 'swing',
        'wow tada'               => 'tada',
        'wow wobble'             => 'wobble',
        'wow bounceIn'           => 'bounceIn',
        'wow bounceInDown'       => 'bounceInDown',
        'wow bounceInLeft'       => 'bounceInLeft',
        'wow bounceInRight'      => 'bounceInRight',
        'wow bounceInUp'         => 'bounceInUp',
        'wow bounceOut'          => 'bounceOut',
        'wow bounceOutDown'      => 'bounceOutDown',
        'wow bounceOutLeft'      => 'bounceOutLeft',
        'wow bounceOutRight'     => 'bounceOutRight',
        'wow bounceOutUp'        => 'bounceOutUp',
        'wow fadeIn'             => 'fadeIn',
        'wow fadeInDown'         => 'fadeInDown',
        'wow fadeInDownBig'      => 'fadeInDownBig',
        'wow fadeInLeft'         => 'fadeInLeft',
        'wow fadeInLeftBig'      => 'fadeInLeftBig',
        'wow fadeInRight'        => 'fadeInRight',
        'wow fadeInRightBig'     => 'fadeInRightBig',
        'wow fadeInUp'           => 'fadeInUp',
        'wow fadeInUpBig'        => 'fadeInUpBig',
        'wow fadeOut'            => 'fadeOut',
        'wow fadeOutDown'        => 'fadeOutDown',
        'wow fadeOutDownBig'     => 'fadeOutDownBig',
        'wow fadeOutLeft'        => 'fadeOutLeft',
        'wow fadeOutLeftBig'     => 'fadeOutLeftBig',
        'wow fadeOutRight'       => 'fadeOutRight',
        'wow fadeOutRightBig'    => 'fadeOutRightBig',
        'wow fadeOutUp'          => 'fadeOutUp',
        'wow fadeOutUpBig'       => 'fadeOutUpBig',
        'wow flip'               => 'flip',
        'wow flipInX'            => 'flipInX',
        'wow flipInY'            => 'flipInY',
        'wow flipOutX'           => 'flipOutX',
        'wow flipOutY'           => 'flipOutY',
        'wow lightSpeedIn'       => 'lightSpeedIn',
        'wow lightSpeedOut'      => 'lightSpeedOut',
        'wow rotateIn'           => 'rotateIn',
        'wow rotateInDownLeft'   => 'rotateInDownLeft',
        'wow rotateInDownRight'  => 'rotateInDownRight',
        'wow rotateInUpLeft'     => 'rotateInUpLeft',
        'wow rotateInUpRight'    => 'rotateInUpRight',
        'wow rotateOut'          => 'rotateOut',
        'wow rotateOutDownLeft'  => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft'    => 'rotateOutUpLeft',
        'wow rotateOutUpRight'   => 'rotateOutUpRight',
        'wow hinge'              => 'hinge',
        'wow rollIn'             => 'rollIn',
        'wow rollOut'            => 'rollOut',
        'wow zoomIn'             => 'zoomIn',
        'wow zoomInDown'         => 'zoomInDown',
        'wow zoomInLeft'         => 'zoomInLeft',
        'wow zoomInRight'        => 'zoomInRight',
        'wow zoomInUp'           => 'zoomInUp',
        'wow zoomOut'            => 'zoomOut',
        'wow zoomOutDown'        => 'zoomOutDown',
        'wow zoomOutLeft'        => 'zoomOutLeft',
        'wow zoomOutRight'       => 'zoomOutRight',
        'wow zoomOutUp'          => 'zoomOutUp',
    );
    return $cms_animate;
}
// Theme Colors
if(!function_exists('saniga_elementor_theme_color_opts')){
    function saniga_elementor_theme_color_opts($args = []){
        $args = wp_parse_args($args, [
            'custom' => true
        ]);
        $theme_colors = saniga_configs('theme_colors');
        $option = ['' => esc_html('Default', 'saniga')];
        foreach ($theme_colors as $key => $color) {
            $option[$key] = $color['title'];
        }
        if($args['custom']) $option['custom'] = esc_html('Custom', 'saniga');
        return $option;
    }
}

if(!function_exists('saniga_elementor_theme_colors')){
    function saniga_elementor_theme_colors($args = []){
        $args = wp_parse_args($args, [
            'name'                => 'main_color',
            'label'               => esc_html__('Main Color', 'saniga'),
            'custom'              => true,
            'custom_label'        => esc_html__('Custom Main Color', 'saniga'),
            'custom_selector'     => '',
            'custom_selector_tag' => 'color',
            'prefix_class'        => '',
            'relation'            => ''  
        ]);
        $custom_selector = [];
        if(!empty($args['custom_selector'])){
            if($args['relation'] === 'and'){
                $custom_selector = [
                    '{{WRAPPER}}'.$args['custom_selector'] => $args['custom_selector_tag'].': {{VALUE}};' //$custom_selector
                ];
            } else {
                $custom_selector = [
                    '{{WRAPPER}} '.$args['custom_selector'] => $args['custom_selector_tag'].': {{VALUE}};' //$custom_selector
                ];
            }
        } 
        $color = [
            [
                'name'        => $args['name'],
                'label'       => $args['label'],
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(),  
                'default'     => '',
                'prefix_class'=> $args['prefix_class']
            ]
        ];
        if($args['custom']){
            $color[] = [
                'name'        => 'custom_'.$args['name'],
                'label'       => $args['custom_label'],
                'type'        => \Elementor\Controls_Manager::COLOR,
                'condition'   => [
                    $args['name'] => 'custom'
                ],
                'selectors'    => $custom_selector,
            ];
        }
        return  $color;
    }
}

// Alignment options
if(!function_exists('saniga_elementor_text_align')){
    function saniga_elementor_text_align($args = []) {
        $args = wp_parse_args($args, [
            'default' => '',
            'label'   => esc_html__( 'Content Alignment', 'saniga' ),
            'label_block' => false
        ]);
        return array(
            'name'         => 'text-align',
            'label'        => $args['label'],
            'label_block'  => $args['label_block'],
            'type'         => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'options'      => saniga_text_align_opts(),
            'default'      => $args['default'],
        );
    }
}
if(!function_exists('saniga_text_align_opts')){
    function saniga_text_align_opts($args = []){
        $args = wp_parse_args($args, [
            'default' => '',
        ]);
        return [
            'start' => [
                'title' => esc_html__( 'Start', 'saniga' ),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => esc_html__( 'Center', 'saniga' ),
                'icon' => 'eicon-text-align-center',
            ],
            'end' => [
                'title' => esc_html__( 'End', 'saniga' ),
                'icon' => 'eicon-text-align-right',
            ],
            'justify' => [
                'title' => esc_html__( 'Justified', 'saniga' ),
                'icon' => 'eicon-text-align-justify',
            ],
        ];
    }
}
// Alignment css class
// Text Align
if(!function_exists('saniga_elementor_align_class')){
    function saniga_elementor_align_class($settings, $args = []){
        $args = wp_parse_args($args, [
            'id'          => 'text-align',
            'extra_class' => '',
            'default'     => 'start',
            'prefix'      => 'text-'  
        ]);
        $align_class = [];
        $align_class[] = empty($settings[$args['id'].'_mobile']) ? $args['prefix'].$args['default'] : $args['prefix'].$settings[$args['id'].'_mobile'];
        $align_class[] = empty($settings[$args['id'].'_tablet']) ? $args['prefix'].'md-'.$args['default'] : $args['prefix'].'md-'.$settings[$args['id'].'_tablet']; 
        $align_class[] = empty($settings[$args['id']]) ? $args['prefix'].'lg-'.$args['default'] : $args['prefix'].'lg-'.$settings[$args['id']];
        $align_class[] = $args['extra_class'];
        return trim(implode(' ', $align_class));
    }
}
// Row content align
if(!function_exists('saniga_elementor_row_align')){
    function saniga_elementor_row_align($args = []) {
        $args = wp_parse_args($args, [
            'name'      => 'row-align',  
            'label'     => esc_html__( 'Justify Content', 'saniga' ),    
            'default'   => '',
            'condition' => [],
            'prefix_class' => ''
        ]);
        return array(
            'name'         => $args['name'],
            'label'        => $args['label'],
            'type'         => \Elementor\Controls_Manager::CHOOSE,
            'control_type' => 'responsive',
            'options'      => [
                'start' => [
                    'title' => esc_html__( 'Start', 'saniga' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'saniga' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'end' => [
                    'title' => esc_html__( 'End', 'saniga' ), 
                    'icon' => 'eicon-text-align-right',
                ],
                'around' => [
                    'title' => esc_html__( 'Around', 'saniga' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'between' => [
                    'title' => esc_html__( 'Between', 'saniga' ),
                    'icon' => 'eicon-text-align-justify',
                ],
            ],
            'default'      => $args['default'],
            'condition'    => $args['condition'],
            'prefix_class' => $args['prefix_class']
        );
    }
}
// Row Alignment content
if(!function_exists('saniga_elementor_row_justify_class')){
    function saniga_elementor_row_justify_class($settings, $id = 'row-align', $extra_class = ''){
        $align_class = [];
        $align_class[] = empty($settings[$id.'_mobile']) ? 'justify-content-start' : 'justify-content-'.$settings[$id.'_mobile'];
        $align_class[] = empty($settings[$id.'_tablet']) ? 'justify-content-md-start' : 'justify-content-md-'.$settings[$id.'_tablet']; 
        $align_class[] = empty($settings[$id]) ? 'justify-content-lg-start' : 'justify-content-lg-'.$settings[$id];
        $align_class[] = $extra_class;
        return trim(implode(' ', $align_class));
    }
}
// Doctor social
if(!function_exists('saniga_doctor_infomation_opts')){
    function saniga_doctor_infomation_opts($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
            'condition' => [
                'post_type' => 'cms-doctor'
            ]
        ]);
        return array(
            'name'     => 'doctor_infomation_settings',
            'label'    => esc_html__('Doctor Info', 'saniga'),
            'tab'      => $args['tab'],
            'controls' => array(
                array(
                    'name'         => 'show_fb',
                    'label'        => esc_html__('Show Facebook', 'saniga'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'default'      => 'true'
                ),
                array(
                    'name'         => 'show_tw',
                    'label'        => esc_html__('Show Twitter', 'saniga'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'default'      => 'true'
                ),
                array(
                    'name'         => 'show_insta',
                    'label'        => esc_html__('Show Instagram', 'saniga'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'default'      => 'false'
                ),
                array(
                    'name'         => 'show_email',
                    'label'        => esc_html__('Show Email', 'saniga'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'default'      => 'true'
                ),
                array(
                    'name'         => 'show_phone',
                    'label'        => esc_html__('Show Phone', 'saniga'),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'default'      => 'true'
                ),
            ),
            'condition' => $args['condition']
        );
    }
}
// Slick Slider Settings
if(!function_exists('saniga_elementor_slick_slider_settings')){
    function saniga_elementor_slick_slider_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        $slides_to_show = range( 1, 10 );
        $slides_to_show = array_combine( $slides_to_show, $slides_to_show );
        return array(
            'name'     => 'section_slick_slider_settings',
            'label'    => esc_html__('Carousel Settings', 'saniga'),
            'tab'      => $args['tab'],
            'controls' => array_merge(
                array(
                    array(
                        'name' => 'slide_rows',
                        'label' => esc_html__('Rows', 'saniga'),
                        'description' => esc_html__('Setting this to more than 1 initializes grid mode. Use slidesPerRow to set how many slides should be in each row.', 'saniga'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => [
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4'
                        ],
                        'control_type' => 'responsive',
                        'default'      => '1',
                    ),
                    array(
                        'name' => 'slide_mode',
                        'label' => esc_html__('Slide mode', 'saniga'),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'options' => [
                            'true' => esc_html__('Fade', 'saniga'),
                            'false' => esc_html__('Slide', 'saniga'),
                        ],
                        'default' => 'false',
                    ),
                    array(
                        'name'         => 'slides_to_show',
                        'label'        => esc_html__('Slides to Show', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'control_type' => 'responsive',
                        'default'      => '',
                        'options'      => [
                                '' => esc_html__('Default', 'saniga' ),
                            ] + $slides_to_show,
                        'condition' => [
                            'slide_mode' => 'false'
                        ]
                    ),
                    array(
                        'name'         => 'slides_to_scroll',
                        'label'        => esc_html__('Slides to Scroll', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'control_type' => 'responsive',
                        'default'      => '',
                        'options'      => [
                                '' => esc_html__('Default', 'saniga' ),
                            ] + $slides_to_show,
                        'condition' => [
                            'slide_mode'      => 'false',
                            'slides_to_show!' => '1',
                        ],
                    ),
                    array(
                        'name'         => 'gap',
                        'label'        => esc_html__('Item Gap', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::NUMBER,
                        'default'      => 30,
                    ),
                    array(
                        'name'         => 'gap_extra',
                        'label'        => esc_html__( 'Extra Gap Bottom', 'saniga' ),
                        'description'  => esc_html__( 'Add extra space at bottom of each items','saniga'),
                        'type'         => \Elementor\Controls_Manager::NUMBER,
                        'default'      => 0,
                    ),
                    array(
                        'name'         => 'asnavfor',
                        'label'        => esc_html__('as Nav For', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SWITCHER,
                        'control_type' => '',
                        'default'      => 'false',
                        'separator'    => 'before', 
                    ),
                    array(
                        'name'         => 'arrows',
                        'label'        => esc_html__('Show Arrows', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SWITCHER,
                        'default'      => 'false', 
                        'control_type' => 'responsive',
                        'separator'    => 'before',
                    ),
                    array(
                        'name'         => 'arrows_pos',
                        'label'        => esc_html__('Arrows Position', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        //'control_type' => 'responsive',
                        'default'      => 'in-vertical',
                        'options'      => [
                            'in-vertical'   => esc_html__('Inside Vertical','saniga'),
                            'out-vertical'  => esc_html__('Outside Vertical','saniga'),
                            'top-left'      => esc_html__('Top Left','saniga'),
                            'top-right'     => esc_html__('Top Right','saniga'),
                            'top-center'    => esc_html__('Top Center','saniga'),
                            'bottom-left'   => esc_html__('Bottom Left','saniga'),
                            'bottom-right'  => esc_html__('Bottom Right','saniga'),
                            'bottom-center' => esc_html__('Bottom Center','saniga'),
                            'left-side'     => esc_html__('Left Side','saniga'),
                            'right-side'    => esc_html__('Right Side','saniga'),
                            'left-side2'     => esc_html__('Left Side2','saniga'),
                            'right-side2'    => esc_html__('Right Side2','saniga')
                        ],
                        'condition' => [
                            'arrows'   => 'true'
                        ],
                        'prefix_class' => 'cms-slick-nav-',
                    ),
                    array(
                        'name'         => 'arrows_style',
                        'label'        => esc_html__('Arrows Styles', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'default'      => 'default',
                        'options'      => [
                            'default'  => esc_html__('Default','saniga'),
                            'long-arrow-text' => esc_html__('Long Arrow with Text','saniga'),
                        ],
                        'condition' => [
                            'arrows'   => 'true'
                        ],
                        'prefix_class' => 'cms-slick-nav-style-',
                    ),
                    array(
                        'name'         => 'arrows_color',
                        'label'        => esc_html__('Arrows Color', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'default'      => '',
                        'options'      => saniga_elementor_theme_color_opts(['custom' =>  false]),
                        'condition' => [
                            'arrows'   => 'true'
                        ],
                        'prefix_class' => 'cms-slick-nav-color-',
                    ),
                    array(
                        'name'         => 'arrows_color_hover',
                        'label'        => esc_html__('Arrows Color Hover', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'default'      => '',
                        'options'      => saniga_elementor_theme_color_opts(['custom' =>  false]),
                        'condition' => [
                            'arrows'   => 'true'
                        ],
                        'prefix_class' => 'cms-slick-nav-color-hover-',
                    ),
                    array(
                        'name'         => 'dots',
                        'label'        => esc_html__('Show Dots', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SWITCHER,
                        'control_type' => 'responsive',
                        'default'      => 'true',
                        'separator'    => 'before',
                    ),
                    array(
                        'name'         => 'dots_in_nav',
                        'label'        => esc_html__('Dots In Nav', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SWITCHER,
                        'default'      => '',
                        'separator'    => 'before',
                        'condition'    => [
                            'dots'       => 'true',
                            'arrows'     => 'true',
                            'arrows_pos' => ['top-left', 'top-right', 'top-center','bottom-left', 'bottom-right', 'bottom-center','left-side2','right-side2']
                        ] 
                    ),
                    array(
                        'name'         => 'dots_pos',
                        'label'        => esc_html__('Dots Position', 'saniga'),
                        'type'         => \Elementor\Controls_Manager::SELECT,
                        'control_type' => 'responsive',
                        'default'      => 'out',
                        'options'      => [
                            'in'  => esc_html__('Inside','saniga'),
                            'out' => esc_html__('Outside','saniga'),
                        ],
                        'condition' => [
                            'dots'        => 'true',
                            'dots_in_nav' => ''
                        ],
                        'prefix_class' => 'cms-slick-dots-',
                        'separator'    => 'before',
                    )
                ),
                saniga_elementor_theme_colors([
                    'name'                => 'dots_color',
                    'label'               => esc_html__('Dots Color', 'saniga'),
                    'custom_label'        => esc_html__('Custom Dots Color', 'saniga'),
                    'custom_selector'     => '.cms-slick-dots-color-custom ul.cms-slick-dot li:not(.slick-active):not(:hover) button:before',
                    'custom_selector_tag' => 'background',
                    'prefix_class'        => 'cms-slick-dots-color-',
                    'relation'            => 'and'  
                ]),
                saniga_elementor_theme_colors([
                    'name'                => 'dots_color_hover',
                    'label'               => esc_html__('Dots Color Hover', 'saniga'),
                    'custom_label'        => esc_html__('Custom Dots Color Hover', 'saniga'),
                    'custom_selector'     => '.cms-slick-dots-color-hover-custom ul.cms-slick-dot li.slick-active button:before, .cms-slick-dots-color-hover-custom ul.cms-slick-dot li:hover button:before',
                    'custom_selector_tag' => 'background',
                    'prefix_class'        => 'cms-slick-dots-color-hover-',
                    'relation'            => 'and'  
                ]),
                array(
                    saniga_elementor_row_align([
                        'name'      => 'dots_align',
                        'label'     => esc_html__('Dots Align', 'saniga'),
                        'condition' => [
                            'dots'        => 'true',
                            'dots_in_nav' => ''
                        ],
                        'prefix_class' => 'cms-slick-dots-align%s-'
                    ]),
                    array(
                        'name'    => 'pause_on_hover',
                        'label'   => esc_html__('Pause on Hover', 'saniga'),
                        'type'    => \Elementor\Controls_Manager::SWITCHER,
                        'default' => 'true'
                    ),
                    array(
                        'name'    => 'autoplay',
                        'label'   => esc_html__('Autoplay', 'saniga'),
                        'type'    => \Elementor\Controls_Manager::SWITCHER,
                        'default' => 'true'
                    ),
                    array(
                        'name'      => 'autoplay_speed',
                        'label'     => esc_html__('Autoplay Speed', 'saniga'),
                        'type'      => \Elementor\Controls_Manager::NUMBER,
                        'default'   => 2000,
                        'condition' => [
                            'autoplay' => 'true'
                        ]
                    ),
                    array(
                        'name'  => 'infinite',
                        'label' => esc_html__('Infinite Loop', 'saniga'),
                        'type'  => \Elementor\Controls_Manager::SWITCHER,
                    ),
                    array(
                        'name'    => 'speed',
                        'label'   => esc_html__('Animation Speed', 'saniga'),
                        'type'    => \Elementor\Controls_Manager::NUMBER,
                        'default' => 500,
                    )
                )
            ),
            'condition' => $args['condition']
        );
    }
}
if(!function_exists('saniga_slick_slider_arrows')){
    function saniga_slick_slider_arrows($settings){
        if(in_array($settings['arrows_pos'], ['in-vertical', 'out-vertical'])): ?>
            <div class="cms-slick--arrows"><div class="cms-slick-arrows"><?php 
            ?></div></div>
        <?php endif;
    }
}
if(!function_exists('saniga_slick_slider_arrows_side')){
    function saniga_slick_slider_arrows_side($settings){
        if(in_array($settings['arrows_pos'], ['left-side', 'right-side'])): 
        ?>
            <div class="cms-slick--arrows"><div class="cms-slick-arrows"></div></div>
        <?php
            $link_attrs = [];
            if ( ! empty( $settings['other_link']['url'] ) ) {
                $link_attrs[] = 'href="'.$settings['other_link']['url'].'"';
            }
            if ( ! empty($settings['other_link']['is_external'] )) {
                $link_attrs[] = 'target="_blank"';
            }
            if ( ! empty($settings['other_link']['nofollow'] )) {
                $link_attrs[] = 'rel="nofollow"';
            }
            if( ! empty($settings['other_link']['custom_attributes'])){
                $custom_attributes = explode('|', $settings['other_link']['custom_attributes']);
                foreach ($custom_attributes as $atts_value) {
                    $_custom_attributes = explode(':', $atts_value);
                    $link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
                }
            }
            echo esc_html($settings['other_text']); 
            if(!empty($settings['other_link_text'])){
                ?>
                    <a data-other-link="other-link" <?php echo implode(' ', $link_attrs); ?>><?php echo esc_html($settings['other_link_text']); ?> <span class="cmsi-arrow-right2 ml-5 text-12"></span></a>
                <?php
            }
        endif;
    }
}
if(!function_exists('saniga_slick_slider_arrows_side2')){
    function saniga_slick_slider_arrows_side2($settings){
        if(in_array($settings['arrows_pos'], ['left-side2', 'right-side2'])): 
        ?>
            <div class="cms-slick--arrows"><div class="cms-slick-arrows"><?php 
                saniga_slick_slider_dots_in_nav($settings);
            ?></div></div>
        <?php
        endif;
    }
}
if(!function_exists('saniga_slick_slider_arrows_top')){
    function saniga_slick_slider_arrows_top($settings){
        if(in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
            <div class="cms-slick--arrows"><div class="cms-slick-arrows empty-none"><?php 
                saniga_slick_slider_dots_in_nav($settings);
            ?></div></div>
        <?php endif;
    }
}
if(!function_exists('saniga_slick_slider_arrows_bottom')){
    function saniga_slick_slider_arrows_bottom($settings){
        if(in_array($settings['arrows_pos'], ['bottom-left', 'bottom-right'])): ?>
            <div class="cms-slick--arrows"><div class="cms-slick-arrows empty-none"><?php
                saniga_slick_slider_dots_in_nav($settings);
            ?></div></div>
        <?php endif;
    }
}
if(!function_exists('saniga_slick_slider_dots')){
    function saniga_slick_slider_dots($settings){
        if($settings['dots'] === 'true' && $settings['dots_in_nav'] !== 'true') {
        ?>
            <div class="cms-slick-dots empty-none"></div>
        <?php
        }
    }
}
if(!function_exists('saniga_slick_slider_dots_in_nav')){
    function saniga_slick_slider_dots_in_nav($settings){
        if($settings['dots'] === 'true' && $settings['dots_in_nav'] === 'true') {
        ?>
            <div class="cms-slick-dots empty-none"></div>
        <?php
        }
    }
}
if(!function_exists('saniga_slick_slider_settings')){
    function saniga_slick_slider_settings($widget, $class=''){
        $slide_mode              = $widget->get_setting('slide_mode', 'false');
        $slide_rows              = $widget->get_setting('slide_rows', '1');
        $slides_to_show          = $widget->get_setting('slides_to_show', '3');
        $slides_to_show_tablet   = $widget->get_setting('slides_to_show_tablet', '2');
        $slides_to_show_mobile   = $widget->get_setting('slides_to_show_mobile', '1');
        $slides_to_scroll        = $widget->get_setting('slides_to_scroll', $slides_to_show );
        $slides_to_scroll_tablet = $widget->get_setting('slides_to_scroll_tablet', $slides_to_show_tablet);
        $slides_to_scroll_mobile = $widget->get_setting('slides_to_scroll_mobile', $slides_to_show_mobile);

        $slideRows =  !empty($slide_rows) ? $slide_rows : 1;
        $slideRowsTablet = !empty($slide_rows_tablet) ? $slide_rows_tablet : $slideRows;
        $slideRowsMobile = !empty($slide_rows_mobile) ? $slide_rows_mobile : $slideRows;

        if($slide_mode == 'true'){
            $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = 1;
        } else {
            if(1 === (int)$slides_to_show){
                $slidesToShow = $slidesToShowTablet = $slidesToShowMobile = $slidesToScroll = $slidesToScrollTablet = $slidesToScrollMobile = 1;
            } else {
                $slidesToShow       = $slides_to_show;
                $slidesToShowTablet = $slides_to_show_tablet;
                $slidesToShowMobile = $slides_to_show_mobile;

                $slidesToScroll = $slides_to_scroll;
                $slidesToScrollTablet = $slides_to_scroll_tablet;
                $slidesToScrollMobile = $slides_to_scroll_mobile;
            }
        }

        $slides_gutter  = (int) $widget->get_setting('gap', '30')/2;
        $asnavfor       = $widget->get_setting('asnavfor');
        $arrows         = $widget->get_setting('arrows', 'false');
        $arrows_tablet  = $widget->get_setting('arrows_tablet', 'false');
        $arrows_mobile  = $widget->get_setting('arrows_mobile', 'false');
        $arrows_pos     = $widget->get_setting('arrows_pos','in-vertical');
        $dots           = $widget->get_setting('dots');
        $dots_tablet    = $widget->get_setting('dots_tablet', $dots);
        $dots_mobile    = $widget->get_setting('dots_mobile', $dots_tablet);
        $dots_pos       = $widget->get_setting('dots_pos','out');
        $pause_on_hover = $widget->get_setting('pause_on_hover', 'true');
        $autoplay       = $widget->get_setting('autoplay');
        $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
        $infinite       = $widget->get_setting('infinite');
        $speed          = $widget->get_setting('speed', '500');
        $titlenext      = $widget->get_setting('nav_title_next', 'Next');
        $titleprev      = $widget->get_setting('nav_title_prev', 'Prev');

        $dir = is_rtl() ? 'true' : 'false';
        $rtl = is_rtl() ? 'rtl' : 'ltr';
        $widget->add_render_attribute( 'cms-slider-settings', [
            'class'                     => trim('cms-slick-slider '.$class),
            'data-fade'                 => $slide_mode,
            'data-rows'                 => $slideRows,
            'data-rowstablet'           => $slideRowsTablet,
            'data-rowsmobile'           => $slideRowsMobile,
            'data-arrows'               => $arrows,
            'data-arrowstablet'         => $arrows_tablet,
            'data-arrowsmobile'         => $arrows_mobile,
            'data-dots'                 => $dots,
            'data-dotstablet'           => $dots_tablet,
            'data-dotsmobile'           => $dots_mobile,
            'data-pauseOnHover'         => $pause_on_hover,
            'data-autoplay'             => $autoplay,
            'data-autoplaySpeed'        => $autoplay_speed,
            'data-infinite'             => $infinite,
            'data-speed'                => $speed,
            'data-slidestoshow'         => $slidesToShow,
            'data-slidestoshowtablet'   => $slidesToShowTablet,
            'data-slidestoshowmobile'   => $slidesToShowMobile,
            'data-slidestoscroll'       => $slidesToScroll,
            'data-slidestoscrolltablet' => $slidesToScrollTablet,
            'data-slidestoscrollmobile' => $slidesToScrollMobile,
            'data-gutter'               => $slides_gutter,
            'data-rtl'                  => $dir,
            'dir'                       => $rtl,
            'data-asnavfor'             => $asnavfor,
            'data-titlenext'            => $titlenext,
            'data-titleprev'            => $titleprev,
            'style'                     => 'margin:-'.$slides_gutter.'px;',    
        ] );
        if((int)$slideRows > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-xl');
        if((int)$slideRowsTablet > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-lg');
        if((int)$slideRowsMobile > 1) $widget->add_render_attribute( 'cms-slider-settings', 'class', 'multi-rows-md');

        etc_print_html($widget->get_render_attribute_string( 'cms-slider-settings' ));
    }
}
// Grid settings
if(!function_exists('saniga_column_settings')){
    function saniga_column_settings(){
        $options = [
            '12' => '12',
            '6'  => '6',
            '3'  => '3',
            '4'  => '4',
            '2'  => '2',
            '1'  => '1'
        ];
        return array(
            array(
                'name'    => 'col_sm',
                'label'   => esc_html__( 'Mobile', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => $options
            ),
            array(
                'name'    => 'col_md',
                'label'   => esc_html__( 'Table', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '2',
                'options' => $options
            ),
            array(
                'name'    => 'col_lg',
                'label'   => esc_html__( 'Small Desktop', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => $options
            ),
            array(
                'name'    => 'col_xl',
                'label'   => esc_html__( 'Large Desktop', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => $options
            ),
            array(
                'name'         => 'gap',
                'label'        => esc_html__( 'Item Gap', 'saniga' ),
                'type'         => \Elementor\Controls_Manager::NUMBER,
                'control_type' => 'responsive',
                'default'      => 30,
            ),
            array(
                'name'         => 'gap_extra',
                'label'        => esc_html__( 'Extra Gap Bottom', 'saniga' ),
                'description'  => esc_html__( 'Add extra space at bottom of each items','saniga'),
                'type'         => \Elementor\Controls_Manager::NUMBER,
                'default'      => 0,
            )
        );
    }
}
if(!function_exists('saniga_grid_column_settings')){
    function saniga_grid_column_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => [],
            'extra'     => []    
        ]);
        return array(
            'name'     => 'section_grid_settings',
            'label'    => esc_html__('Grid Columns Settings', 'saniga'),
            'tab'      => $args['tab'],
            'controls' => array_merge(
                saniga_column_settings(),
                $args['extra']
            ),
            'condition' => $args['condition']
        );
    }
}
// get column width
if(!function_exists('saniga_elementor_grid_column_class')){
    function saniga_elementor_grid_column_class($widget, $settings){
        $class = [];
        $class[] = 'col-xl-'.round(12/$settings['col_xl']);
        $class[] = 'col-lg-'.round(12/$settings['col_lg']);
        $class[] = 'col-md-'.round(12/$settings['col_md']);
        $class[] = 'col-sm-'.round(12/$settings['col_sm']);

        echo trim(implode(' ', $class));
    }
}

/**
 * Masonry Settings
*/
if(!function_exists('saniga_elementor_masonry_settings')){
    function saniga_elementor_masonry_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        
        return array(
            'name'      => 'section_masonry_settings',
            'label'     => esc_html__('Masonry Settings', 'saniga'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name'    => 'masonry_mode',
                        'label'   => esc_html__( 'Masonry Mode', 'saniga' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => [
                            'fitRows' => esc_html__( 'Basic Grid', 'saniga' ),
                            'masonry' => esc_html__( 'Masonry Grid', 'saniga' ),
                        ],
                        'default'   => 'fitRows'
                    )
                )
            )
        );
    }
}
if(!function_exists('saniga_elementor_masonry_filter_settings')){
    function saniga_elementor_masonry_filter_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        return array(
            'name'      => 'section_filter_settings',
            'label'     => esc_html__('Filter Settings', 'saniga'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name'    => 'filter',
                        'label'   => esc_html__( 'Show Filter', 'saniga' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'false',
                        'options' => [
                            'true'  => esc_html__( 'Enable', 'saniga' ),
                            'false' => esc_html__( 'Disable', 'saniga' ),
                        ]
                    ),
                    array(
                        'name'      => 'filter_default_title',
                        'label'     => esc_html__( 'Default Title', 'saniga' ),
                        'type'      => \Elementor\Controls_Manager::TEXT,
                        'default'   => esc_html__( 'All', 'saniga' ),
                        'condition' => [
                            'filter' => 'true',
                        ],
                    ),
                    array(
                        'name'    => 'filter_alignment',
                        'label'   => esc_html__( 'Alignment', 'saniga' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'center',
                        'options' => [
                            'start'  => esc_html__( 'Start', 'saniga' ),
                            'center' => esc_html__( 'Center', 'saniga' ),
                            'end'    => esc_html__( 'End', 'saniga' ),
                        ],
                        'condition' => [
                            'filter' => 'true',
                        ],
                    )
                )
            )
        );
    }
}
if(!function_exists('saniga_elementor_masonry_pagination_settings')){
    function saniga_elementor_masonry_pagination_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        
        return array(
            'name'      => 'section_pagination_settings',
            'label'     => esc_html__('Pagination Settings', 'saniga'),
            'tab'       => $args['tab'],
            'condition' => $args['condition'],
            'controls'  => array_merge(
                array(
                    array(
                        'name'    => 'pagination_type',
                        'label'   => esc_html__( 'Pagination Type', 'saniga' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'default' => 'false',
                        'options' => [
                            'pagination' => esc_html__( 'Pagination', 'saniga' ),
                            'loadmore'   => esc_html__( 'Loadmore', 'saniga' ),
                            'false'      => esc_html__( 'Disable', 'saniga' ),
                        ]
                    ),
                    array(
                        'name'      => 'loadmore_text',
                        'label'     => esc_html__( 'Load More text', 'saniga' ),
                        'type'      => \Elementor\Controls_Manager::TEXT,
                        'default'   => esc_html__('Load More','saniga'),
                        'condition' => [
                            'pagination_type' => 'loadmore'
                        ]
                    ),
                )
            )
        );
    }
}
if(!function_exists('saniga_elementor_masonry_column_settings')){
    function saniga_elementor_masonry_column_settings($args = []){
        $args = wp_parse_args($args, [
            'tab'       => \Elementor\Controls_Manager::TAB_LAYOUT,
            'condition' => []
        ]);
        return  saniga_grid_column_settings([
            'tab'       => $args['tab'],
            'condition' => $args['condition']
        ]);
    }
}

if(!function_exists('saniga_elementor_masonry_settings_render_attrs')){
    function saniga_elementor_masonry_settings_render_attrs($widget, $settings, $_args = []){
        $_args = wp_parse_args($_args,[
            'post_type' => 'post',
            'class'     => ''
        ]);
        $html_id   = etc_get_element_id($settings);
        extract(etc_get_posts_of_grid($_args['post_type'], [
            'source'   => $widget->get_setting('source_'.$_args['post_type'], ''),
            'orderby'  => $widget->get_setting('orderby', 'date'),
            'order'    => $widget->get_setting('order', 'desc'),
            'limit'    => $widget->get_setting('limit', 6),
            'post_ids' => $widget->get_setting('post_ids', ''),
        ]));
        $widget->add_render_attribute( 'wrapper', [
            'id'              => $html_id,
            'class'           => trim('cms-grid '.$_args['class']),
            'data-layoutmode' => $settings['masonry_mode'],
            'data-layout'     => 'masonry',
            'data-start-page' => $paged,
            'data-max-pages'  => $max,
            'data-total'      => $total,
            'data-perpage'    => $widget->get_setting('limit', 6),
            'data-next-link'  => $next_link
        ]);
        etc_print_html($widget->get_render_attribute_string( 'wrapper' ));
    }
}
/**
 * Hyperlink Settings
**/
if(!function_exists('saniga_elementor_hyperlink_settings')){
    function saniga_elementor_hyperlink_settings($args = []){
        $args = wp_parse_args($args, [
            'options'           => [],
            'condition'         => [],
            'prefix'            => '',
            'link_type'         => '',
            'link_type_default' => 'custom',
            'link_page'         => true,
            'link_text'         => ''
        ]);
        $_link_type = [
            'custom'   => esc_html__('Custom','saniga')
        ];  
        if($args['link_page']){
            $_link_type['page'] =  esc_html__('Internal Page','saniga');
        }
        $default = [
            array(
                'name'        => $args['prefix'].'link_type',
                'label'       => esc_html__( 'Link Type', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['link_type_default'],
                'options'     => array_merge(
                    $_link_type, 
                    $args['options']
                ),
                'condition'   => array_merge($args['condition']),
            ),
            array(
                'name'      => $args['prefix'].'link_text',
                'label'     => esc_html__( 'Text', 'saniga' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'condition' => array_merge($args['condition']),
                'dynamic'   => [
                    'active' => true,
                ]
            ),
            array(
                'name'        => $args['prefix'].'link_page',
                'label'       => esc_html__( 'Page Link', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '',
                'options'     => saniga_elementor_list_page_opts(),
                'condition'   => array_merge($args['condition'], [$args['prefix'].'link_type' => 'page']),
            ), 
            array(
                'name'        => $args['prefix'].'hyper_link',
                'label'       => esc_html__( 'Custom Link', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                'default'     => [
                    'url'         => '#',
                    'is_external' => 'on'
                ],
                'condition'   => array_merge($args['condition'], [$args['prefix'].'link_type' => 'custom']),
            ),
            array(
                'name'        => $args['prefix'].'link_color',
                'label'       => esc_html__( 'Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(['custom' =>  false]),
                'condition'   => array_merge($args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'link_hover_color',
                'label'       => esc_html__( 'Hover Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(['custom' =>  false]),
                'condition'   => array_merge($args['condition']),
            ),
            array(
                'name'         => $args['prefix'].'link_align',
                'label'        => esc_html__( 'Alignment', 'saniga' ),
                'type'         => \Elementor\Controls_Manager::CHOOSE,
                'control_type' => 'responsive',
                'options'      => saniga_text_align_opts(),
                'condition'    => array_merge($args['condition'])
            ),
            array(
                'name'             => $args['prefix'].'link_icon',
                'label'            => esc_html__( 'Icon', 'saniga' ),
                'type'             => \Elementor\Controls_Manager::ICONS,
                'label_block'      => true,
                'fa4compatibility' => 'icon',
                'condition' => array_merge($args['condition'])
            ),
            array(
                'name'    => $args['prefix'].'link_icon_align',
                'label'   => esc_html__( 'Icon Position', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left'  => esc_html__( 'Before', 'saniga' ),
                    'right' => esc_html__( 'After', 'saniga' ),
                ],
                'condition' => array_merge([
                        $args['prefix'].'link_icon[value]!' => ''
                    ],
                    $args['condition']
                )
            ),
            array(
                'name'  => $args['prefix'].'link_icon_size',
                'label' => esc_html__( 'Icon Size', 'saniga' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 15,
                        'max' => 200,
                    ],
                ],
                'condition' => array_merge([
                        $args['prefix'].'link_icon[value]!' => ''
                    ],
                    $args['condition']
                ),
                'selectors' => [
                    '{{WRAPPER}} .cms-link .cms-icon' => 'font-size: {{SIZE}}{{UNIT}};'
                ]
            ),
            array(
                'name'  => $args['prefix'].'link_icon_indent',
                'label' => esc_html__( 'Icon Spacing', 'saniga' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'condition' => array_merge([
                        $args['prefix'].'link_icon[value]!' => ''
                    ],
                    $args['condition']
                ),
                'selectors' => [
                    '{{WRAPPER}} .cms-link .cms-link-icon.cms-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cms-link .cms-link-icon.cms-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                ]
            )
        ];
        return wp_parse_args($args['options'], $default);
    }
}
if(!function_exists('saniga_elementor_custom_link_attrs')){
    function saniga_elementor_custom_link_attrs($settings, $args = []){
        $args = wp_parse_args($args, [
            'name'   => 'hyper_link',
            'prefix' => '',
            'class'  => '',
            'echo'   => false
        ]);
        $settings[$args['prefix'].$args['name']]['custom_attributes'] =  empty($settings[$args['prefix'].$args['name']]['custom_attributes']) ? 'class|' : $settings[$args['prefix'].$args['name']]['custom_attributes'];
        $link_attrs = [];
        if ( ! empty( $settings[$args['prefix'].$args['name']]['url'] ) ) {
            $link_attrs[] = 'href="'.$settings[$args['prefix'].$args['name']]['url'].'"';
        }
        if ( ! empty($settings[$args['prefix'].$args['name']]['is_external'] )) {
            $link_attrs[] = 'target="_blank"';
        }
        if ( ! empty($settings[$args['prefix'].$args['name']]['nofollow'] )) {
            $link_attrs[] = 'rel="nofollow"';
        }
        if( ! empty($settings[$args['prefix'].$args['name']]['custom_attributes'])){
            $custom_attributes = explode(',', $settings[$args['prefix'].$args['name']]['custom_attributes']);
            foreach ($custom_attributes as $atts_value) {
                $_custom_attributes = explode('|', $atts_value);
                if($_custom_attributes[0] === 'class') $_custom_attributes[1] .= ' '.$args['class'];
                $link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
            }
        }
        if($args['echo']){
            return trim(implode(' ', $link_attrs));
        } else {
            return $link_attrs;
        }
    }
}
if(!function_exists('saniga_elementor_page_link_attrs')){
    function saniga_elementor_page_link_attrs($settings, $args = []){
        $args = wp_parse_args($args, [
            'prefix' => '',
            'class'  => '',
            'echo'   => false,
        ]);
        $page_link_attrs = [];
        $page_link_attrs[] = 'href="'.saniga_get_link_by_slug($settings[$args['prefix'].'link_page'],'page').'"';
        $page_link_attrs[] = 'target="_blank"';
        $page_link_attrs[] = 'class="'.$args['class'].'"';

        if($args['echo']){
            return trim(implode(' ',$page_link_attrs));
        } else {
            return $page_link_attrs;
        }
    }
}

if(!function_exists('saniga_elementor_hyperlink_render')){
    function saniga_elementor_hyperlink_render($settings, $args = []){
        $args = wp_parse_args($args, [
            'prefix'           => '',
            'tag'              => 'div',
            'link_type'        => 'custom',
            'link_text'        => esc_html__('Read More','saniga'),
            'link_color'       => '',
            'link_hover_color' => '',
            'wrap_class'       => '',    
            'class'            => '',
            'default_icon'     => [
                'value'   => 'cmsi-arrow-right',
                'library' => 'cmsi'
            ],
            'icon_class' => '',
            'icon_align' => 'left', 
            'before'     => '',
            'after'      => '',
            'echo'       => true,
        ]);
        
        $link_text = !empty($settings[$args['prefix'].'link_text']) ? $settings[$args['prefix'].'link_text'] : $args['link_text'];
        
        $link_attrs = '';
        $link_color = !empty($settings[$args['prefix'].'link_color']) ? $settings[$args['prefix'].'link_color'] : $args['link_color'];
        $link_hover_color = !empty($settings[$args['prefix'].'link_hover_color']) ? $settings[$args['prefix'].'link_hover_color'] : $args['link_hover_color'];
        $args['class'] .= ' d-inline-block text-'.$link_color.' text-hover-'.$link_hover_color;

        if($settings[$args['prefix'].'link_type'] === 'custom'){
            $link_attrs = saniga_elementor_custom_link_attrs($settings, $args);
        } else {
            $link_attrs = saniga_elementor_page_link_attrs($settings, $args);
        }

        $settings[$args['prefix'].'link_icon_align'] = empty($settings[$args['prefix'].'link_icon_align']) ? $args['icon_align'] : $settings[$args['prefix'].'link_icon_align'];
        if($settings[$args['prefix'].'link_icon_align'] === 'left'){
            $icon_class = 'order-first';
        } else {
            $icon_class = 'order-last';
        }
        ?>
            <<?php printf('%s', $args['tag']);?> class="<?php echo trim(implode(' ', ['cms-link', $args['wrap_class']]));?>">
                <?php printf('%s', $args['before']); ?>
                <a <?php printf('%s', $link_attrs) ;?>>
                    <span class="cms-btn-content"><?php 
                        saniga_elementor_icon_render($settings, [
                            'id'           => $args['prefix'].'link_icon',
                            'loop'         => false,
                            'tag'          => 'span',   
                            'wrap_class'   => 'cms-btn-icon '.$icon_class,
                            'class'        => 'cms-link-icon cms-align-icon-'.$settings[$args['prefix'].'link_icon_align'].' '.$args['icon_class'].' rtl-flip',
                            'style'        => '',
                            'before'       => '',
                            'after'        => '',
                            'atts'         => [],
                            'default_icon' => $args['default_icon']
                        ]);
                        printf('%s', '<span class="cms-btn-text">'.$link_text.'</span>');
                    ?></span>
                </a>
                <?php printf('%s', $args['after']); ?>
            </<?php printf('%s', $args['tag']);?>>
        <?php
    }
}
/**
 * Buttons Settings
**/
if(!function_exists('saniga_elementor_button_settings')){
    function saniga_elementor_button_settings($args = []){
        $args = wp_parse_args($args, [
            'options'               => [],
            'condition'             => [],
            'prefix'                => '',
            'btn_text'              => '',
            'btn_type'              => [],
            'btn_type_default'      => 'btn btn-fill',
            'btn_link_type'         => [],
            'btn_link_type_default' => 'custom',
            'btn_color'             => 'accent',
            'btn_hover_color'       => 'secondary',
            'btn_size'              => '',
            'btn_align'             => '',
            'icon_default'          => [
                'value'             => 'cmsi-arrow-right',
                'library'           => 'cmsi'
            ],
            'icon_align'            => 'left',
            'separator'             => ''
        ]);
        $default = [
            array(
                'name'        => $args['prefix'].'btn_text',
                'label'       => esc_html__( 'Button Text', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => $args['btn_text'],
                'placeholder' => esc_html__('Your Text', 'saniga'),
                'condition'   => $args['condition'],
                'separator'   => $args['separator']
            ),
            array(
                'name'        => $args['prefix'].'show_btn_text',
                'label'       => esc_html__( 'Show Button Text', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SWITCHER,
                'default'     => 'true',
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'show_in_popup',
                'label'       => esc_html__( 'Show Content In Popup', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SWITCHER,
                'default'     => 'false',
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_link_type',
                'label'       => esc_html__( 'Link Type', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_link_type_default'],
                'options'     => array_merge(
                    [
                        'custom'   => esc_html__('Custom','saniga'),
                        'page'     => esc_html__('Internal Page','saniga'),
                    ],
                    $args[ 'btn_link_type']
                ),
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_link_page',
                'label'       => esc_html__( 'Page Link', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => '',
                'options'     => saniga_elementor_list_page_opts(),
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'], [$args['prefix'].'btn_link_type' => 'page']),
            ),            
            array(
                'name'        => $args['prefix'].'btn_link',
                'label'       => esc_html__( 'Link', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'saniga' ),
                'default'     => [
                    'url' => '#',
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'], [$args['prefix'].'btn_link_type' => 'custom']),
            ),
            array(
                'name'        => $args['prefix'].'btn_type',
                'label'       => esc_html__( 'Mode', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_type_default'],
                'options'     => array_merge(
                    [
                        'btn btn-fill'    => esc_html__('Fill','saniga'),
                        'btn btn-outline' => esc_html__('Outline','saniga'),
                        'btn-overlay'     => esc_html__('Overlay','saniga'),
                        'just-link'       => esc_html__('Plain Text','saniga'),
                    ],
                    $args['btn_type']
                ),
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_color',
                'label'       => esc_html__( 'Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_color'],
                'options'     => saniga_elementor_theme_color_opts(['custom' =>  false]),
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_hover_color',
                'label'       => esc_html__( 'Hover Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_hover_color'],
                'options'     => saniga_elementor_theme_color_opts(['custom' =>  false]),
                'condition'   => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
            ),
            array(
                'name'        => $args['prefix'].'btn_size',
                'label'       => esc_html__( 'Size', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'default'     => $args['btn_size'],
                'options'     => [
                    'xs'  => esc_html__('Extra Small','saniga'),  
                    'sm'  => esc_html__('Small','saniga'),  
                    ''    => esc_html__('Default','saniga'),
                    'md'  => esc_html__('Medium','saniga'),
                    'lg'  => esc_html__('Large','saniga'),
                    'xl'  => esc_html__('Extra Large','saniga'),
                ],
                'condition' => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'],[$args['prefix'].'btn_type!' => ['btn-overlay', 'btn-text', 'just-link']]), 
            ),
            array(
                'name'         => $args['prefix'].'align',
                'label'        => esc_html__( 'Button Alignment', 'saniga' ),
                'type'         => \Elementor\Controls_Manager::CHOOSE,
                'control_type' => 'responsive',
                'options'      => saniga_text_align_opts(),
                'default'      => $args['btn_align'],
                'condition'    => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition'])
            ),
            array(
                'name'             => $args['prefix'].'btn_icon',
                'label'            => esc_html__( 'Icon', 'saniga' ),
                'type'             => \Elementor\Controls_Manager::ICONS,
                'label_block'      => true,
                'fa4compatibility' => 'icon',
                'condition'        => array_merge([$args['prefix'].'btn_text!' => ''], $args['condition']),
                'default'          => $args['icon_default']
            ),
            array(
                'name'        => $args['prefix'].'show_btn_icon',
                'label'       => esc_html__( 'Show Button Icon', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SWITCHER,
                'default'     => 'true',
                'condition' =>  array_merge([
                        $args['prefix'].'btn_text!' => '',
                        $args['prefix'].'btn_icon[value]!' => ''
                    ],
                    $args['condition']
                ),
            ),
            array(
                'name'    => $args['prefix'].'icon_align',
                'label'   => esc_html__( 'Icon Position', 'saniga' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => $args['icon_align'],
                'options' => [
                    'left'  => esc_html__( 'Before', 'saniga' ),
                    'right' => esc_html__( 'After', 'saniga' ),
                ],
                'condition' => array_merge([
                        $args['prefix'].'btn_text!' => '',
                        $args['prefix'].'btn_icon[value]!' => '',
                        $args['prefix'].'show_btn_icon' => 'true'
                    ],
                    $args['condition']
                )
            ),
            array(
                'name'  => $args['prefix'].'icon_size',
                'label' => esc_html__( 'Icon Size', 'saniga' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                ],
                'condition' => array_merge([
                        $args['prefix'].'btn_text!' => '',
                        $args['prefix'].'btn_icon[value]!' => '',
                        $args['prefix'].'show_btn_icon' => 'true'
                    ],
                    $args['condition']
                ),
                'selectors' => [
                    '{{WRAPPER}} .cms-btn-content-'.$args['prefix'].' .cms-btn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cms-btn-content-'.$args['prefix'].' .cms-btn-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ),
            array(
                'name'  => $args['prefix'].'icon_indent',
                'label' => esc_html__( 'Icon Spacing', 'saniga' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 200,
                    ],
                ],
                'condition' => array_merge([
                        $args['prefix'].'btn_text!' => '',
                        $args['prefix'].'btn_icon[value]!' => '',
                        $args['prefix'].'show_btn_icon' => 'true'
                    ],
                    $args['condition']
                ),
                'selectors' => [
                    '{{WRAPPER}} .cms-btn-content-'.$args['prefix'].' .cms-btn-icon.cms-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cms-btn-content-'.$args['prefix'].' .cms-btn-icon.cms-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                ]
            ),
            array(
                'name'        => $args['prefix'].'btn_css_class',
                'label'       => esc_html__( 'Custom CSS Class', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'condition' => array_merge([
                        $args['prefix'].'btn_text!' => ''
                    ],
                    $args['condition']
                )
            )
        ];
        return wp_parse_args($args['options'], $default);
    }
}
// Button Render
if(!function_exists('saniga_elementor_button_render')){
    function saniga_elementor_button_render( $settings, $args = []){
        $args = wp_parse_args($args, [
            'post_id'     => '',
            'tag'         => 'div',
            'overwrite'   => false,
            'prefix'      => '',
            'wrap'        => true,
            'class'       => '',
            'btn_class'   => '',
            'icon_before' => '',
            'icon_after'  => '',
            'custom_link' => '',
            'default'     => [
                'btn_text' => '',
                'btn_type' => ''
            ],
            'align'        => '' 
        ]);
        if(empty($settings[$args['prefix'].'btn_text'])) return;
        $button_attrs = [];
        $button_class = [$settings[$args['prefix'].'btn_type']];
        if($settings[$args['prefix'].'show_in_popup'] === 'true'){
            $button_class[] = 'cms-popup';
        }
        if($settings[$args['prefix'].'btn_link_type'] === 'page'){
            $button_attrs[] = 'href="'.saniga_get_link_by_slug($settings[$args['prefix'].'btn_link_page'],'page').'"';
        } elseif ( ! empty( $settings[$args['prefix'].'btn_link']['url'] ) ) {
            // link 
            $url = str_replace(' ', '', $settings[$args['prefix'].'btn_link']['url']);
            $button_attrs[] = 'href="'.$url.'"';
            // target
            if ( $settings[$args['prefix'].'btn_link']['is_external'] ) {
                $button_attrs[]  = 'target = "_blank"';
            }
            // rel
            if ( $settings[$args['prefix'].'btn_link']['nofollow'] ) {
                $button_attrs[] = 'rel="nofollow"';
            }
        } elseif($settings[$args['prefix'].'btn_link_type'] === 'post'){
            $button_attrs[] = 'href="'.get_the_permalink($args['post_id']).'"';
        }  elseif($settings[$args['prefix'].'btn_link_type'] === 'video'){
            $button_attrs[] = 'href="'.$args['custom_link'].'"';
            $button_class[] = 'cms-video-button';
        }
        if(empty($settings[$args['prefix'].'btn_type'])) $settings[$args['prefix'].'btn_type'] = $args['default']['btn_type'];
        if( !in_array($settings[$args['prefix'].'btn_type'], ['just-link','btn-overlay']) ){
            if ( ! empty( $settings[$args['prefix'].'btn_color'] ) ) {
                $button_class[] = 'btn-' . $settings[$args['prefix'].'btn_color'];
            }
            if ( ! empty( $settings[$args['prefix'].'btn_hover_color'] ) ) {
                $button_class[] = 'btn-hover-' . $settings[$args['prefix'].'btn_hover_color'];
            }
            if ( ! empty( $settings[$args['prefix'].'btn_size'] ) ) {
                $button_class[] = 'btn-' . $settings[$args['prefix'].'btn_size'];
            }
        } else {
            if ( ! empty( $settings[$args['prefix'].'btn_color'] ) ) {
                $button_class[] = 'text-' . $settings[$args['prefix'].'btn_color'];
            }
            if ( ! empty( $settings[$args['prefix'].'btn_hover_color'] ) ) {
                $button_class[] = 'text-hover-' . $settings[$args['prefix'].'btn_hover_color'];
            }
            if ( ! empty( $settings[$args['prefix'].'btn_size'] ) ) {
                $button_class[] = 'btn-' . $settings[$args['prefix'].'btn_size'];
            }
        }
        //$button_class[] = 'text-'.$settings[$args['prefix'].'align'];
        if( !empty($settings[$args['prefix'].'align'.'_mobile']) && $settings[$args['prefix'].'align'.'_mobile'] === 'justify' ){
            $button_class[] = 'd-sm-block';
        }
        if( !empty($settings[$args['prefix'].'align'.'_tablet']) && $settings[$args['prefix'].'align'.'_tablet'] === 'justify'){
            $button_class[] = 'd-md-block';
        }
        if( !empty($settings[$args['prefix'].'align']) && $settings[$args['prefix'].'align'] === 'justify' && ($settings[$args['prefix'].'align'.'_mobile'] !== 'justify' && $settings[$args['prefix'].'align'.'_tablet'] !== 'justify' ) ) {
            $button_class[] = 'd-block';
        } elseif( !empty($settings[$args['prefix'].'align']) && $settings[$args['prefix'].'align'] === 'justify'){
            $button_class[] = 'd-lg-block';
        }

        $button_class[] = $args['btn_class'];
        $button_class[] = $settings[$args['prefix'].'btn_css_class'];
        $button_attrs[] = 'class="'.trim(implode(' ', $button_class)).'"';

        $is_new = \Elementor\Icons_Manager::is_migration_allowed();

        $settings[$args['prefix'].'icon_align'] = isset($settings[$args['prefix'].'icon_align']) ? $settings[$args['prefix'].'icon_align'] : 'left';
        if($args['wrap'] == true):
    ?>
        <<?php echo esc_html($args['tag']);?> class="cms-btn-wraps <?php echo esc_attr($args['class'].' '.saniga_elementor_align_class($settings, [ 'id' => $args['prefix'].'align', 'default' => $args['align'] ] ) );?>">
    <?php endif; ?>
            <a <?php echo trim(implode(' ', $button_attrs)); ?>>
                <span class="cms-btn-content cms-btn-content-<?php echo esc_attr($args['prefix']);?>">
                    <?php if($settings[$args['prefix'].'icon_align'] === 'left' && !empty($settings[$args['prefix'].'btn_icon']['value']) && $settings[$args['prefix'].'show_btn_icon'] === 'true' ) : ?>
                        <span class="cms-btn-icon cms-align-icon-<?php echo esc_attr($settings[$args['prefix'].'icon_align']);?> rtl-flip">
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings[$args['prefix'].'btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; 
                    if($settings[$args['prefix'].'show_btn_text'] === 'true') {
                    ?>
                    <span class="cms-btn-text"><?php printf('%s', $settings[$args['prefix'].'btn_text']); ?></span>
                    <?php }
                    if($settings[$args['prefix'].'icon_align'] === 'right' && !empty($settings[$args['prefix'].'btn_icon']['value'] ) && $settings[$args['prefix'].'show_btn_icon'] === 'true' ) : ?>
                        <span class="cms-btn-icon cms-align-icon-<?php echo esc_attr($settings[$args['prefix'].'icon_align']);?> rtl-flip">
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings[$args['prefix'].'btn_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                        </span>
                    <?php endif; ?>
                </span>
            </a>
        <?php  if($args['wrap'] == true): ?>
        </<?php echo esc_html($args['tag']);?>>
    <?php
        endif;
    }
}
// Button Link Render
if(!function_exists('saniga_elementor_button_link_render')){
    function saniga_elementor_button_link_render( $settings, $args = []){
        $args = wp_parse_args($args, [
            'text' => ''  
        ]);
        if(empty($args['text'])) return;
        $button_attrs = [];        
        if($settings[$args['prefix'].'btn_link_type'] === 'page'){
            $button_attrs[] = 'href="'.saniga_get_link_by_slug($settings[$args['prefix'].'btn_link_page'],'page').'"';
        } elseif ( ! empty( $settings[$args['prefix'].'btn_link']['url'] ) ) {
            // link 
            $button_attrs[] = 'href="'.$settings[$args['prefix'].'btn_link']['url'].'"';
            // target
            if ( $settings[$args['prefix'].'btn_link']['is_external'] ) {
                $button_attrs[]  = 'target = "_blank"';
            }
            // rel
            if ( $settings[$args['prefix'].'btn_link']['nofollow'] ) {
                $button_attrs[] = 'rel="nofollow"';
            }
        } elseif($settings[$args['prefix'].'btn_link_type'] === 'post'){
            $button_attrs[] = 'href="'.get_the_permalink($args['post_id']).'"';
        }  elseif($settings[$args['prefix'].'btn_link_type'] === 'video'){
            $button_attrs[] = 'href="'.$args['custom_link'].'"';
        }
       ?>
            <a <?php echo trim(implode(' ', $button_attrs)); ?>>
                <?php echo esc_html($args['text']); ?>
            </a>
        <?php 
    }
}
// Image Render 
if(!function_exists('saniga_elementor_image_render')){
    function saniga_elementor_image_render($settings, $args = []){
        $args = wp_parse_args($args, [
            'id'          => 'selected_img',
            'size'        => 'thumbnail_size',
            'custom_size' => '',
            'class'       => '',
            'default'     => true,
            'before'      => '',
            'after'       => '',
            'default_img' => ''
        ]);      
        if(empty($settings[$args['id']])) return;
        $custom_size = explode('x', $args['custom_size']);
        $custom_size[1] = isset($custom_size[1]) ? $custom_size[1] : $custom_size[0];
        $thumbnail_size_custom = isset($settings[$args['size'].'_custom_dimension']) ? $settings[$args['size'].'_custom_dimension'] : ['width' => $custom_size[0], 'height' => $custom_size[1]];
        
        if(isset($settings[$args['size'].'_size']) && $settings[$args['size'].'_size'] != 'custom'){
            $img_size = $settings[$args['size'].'_size'];
        } elseif(!empty($thumbnail_size_custom['width']) && !empty($thumbnail_size_custom['height'])){
            $img_size = $thumbnail_size_custom['width'] . 'x' . $thumbnail_size_custom['height'];
        } else {
            $img_size = $args['custom_size'];
        }
        
        saniga_image_by_size([
            'id'          => $settings[$args['id']]['id'],
            'size'        => $img_size,
            'class'       => $args['class'],
            'default'     => $args['default'],
            'default_img' => $args['default_img'],
            'before'      => $args['before'],
            'after'       => $args['after']
        ]);
    }
}

// Image URL Render 
if(!function_exists('saniga_elementor_image_url_render')){
    function saniga_elementor_image_url_render($settings, $args = []){
        $args = wp_parse_args($args, [
            'id'          => 'selected_img',
            'size'        => 'thumbnail_size',
            'custom_size' => '',
            'default_img' => ''  
        ]); 
        if(empty($settings[$args['id']]) && empty($args['url'])) return;
        if(empty($args['custom_size'])){
            $thumbnail_size_custom = isset($settings[$args['size'].'_custom_dimension']) ? $settings[$args['size'].'_custom_dimension'] : ['width' => '', 'height' => ''];
            if(isset($settings[$args['size'].'_size']) && $settings[$args['size'].'_size'] != 'custom'){
                $img_size = $settings[$args['size'].'_size'];
            }
            elseif(!empty($thumbnail_size_custom['width']) && !empty($thumbnail_size_custom['height'])){
                $img_size = $thumbnail_size_custom['width'] . 'x' . $thumbnail_size_custom['height'];
            }
            else{
                $img_size = 'full';
            }
        } else {
            $img_size = $args['custom_size'];
        }

        return saniga_get_image_url_by_size([
            'id'          => $settings[$args['id']]['id'],
            'size'        => $img_size,
            'default_img' => $args['default_img']  
        ]);
    }
}

// Render icon 
if(!function_exists('saniga_elementor_icon_render')){
    function saniga_elementor_icon_render( $settings, $args = []){
        //var_dump($settings);
        $args = wp_parse_args($args, [
            'id'         => 'selected_icon',
            'loop'       => false,
            'tag'        => 'div',   
            'wrap_class' => '',
            'class'      => '',
            'style'      => '',
            'before'     => '',
            'after'      => '',
            'atts'       => [],
            'default_icon'    => [
                'value'   => '',
                'library' => ''
            ],
            'echo' => true
        ]);
        if($args['loop']) {
            $icon = $args['id'];
        } else {
            $icon = $settings[$args['id']];
        }
        if(empty($icon['value'])) $icon = $args['default_icon'];
        if (empty($icon['value'])) return;
        $atts = [];
        foreach ($args['atts'] as $key => $att) {
            $atts[] = $key.'="'.$att.'"';
        }
        ob_start();
        printf('%s', $args['before']);
        ?>
        <<?php echo esc_html($args['tag']);?> class="<?php echo trim(implode(' ',['cms-icon-wrap', $args['wrap_class']]));?>" <?php echo implode(' ', $atts);?>><?php \Elementor\Icons_Manager::render_icon( $icon, [ 
                'aria-hidden' => 'true', 
                'class'       => trim(implode(' ', ['cms-icon', $args['class'] ])),
                'style'       => $args['style']  
            ]); ?></<?php echo esc_html($args['tag']);?>>
        <?php
        printf('%s', $args['after']);

        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}

// Render link options
if(!function_exists('saniga_elementor_link_render')){
    function saniga_elementor_link_render($key, $args =[]){
        $attributes = $atts = [];
        if ( ! empty( $key['url'] ) ) {
            $attributes['href'] = esc_url( $key['url'] );
        }

        if ( ! empty( $key['is_external'] ) ) {
            $attributes['target'] = '_blank';
        }

        if ( ! empty( $key['nofollow'] ) ) {
            $attributes['rel'] = 'nofollow';
        }
        
        if ( ! empty( $key['custom_attributes'] ) ) {
            // Custom URL attributes should come as a string of comma-delimited key|value pairs
            $attributes = array_merge( $attributes, saniga_parse_custom_attributes( $key['custom_attributes'] ) );
        }

        $attributes = saniga_array_merge_recursive($attributes, $args);
        
        echo trim(implode(' ', $attributes));
    }
}
// Get Excerpt
if(!function_exists('saniga_elementor_excerpt')){
    function saniga_elementor_excerpt($post, $num_words, $more ){
        if(!empty($post->post_excerpt)){
            echo wp_trim_words( $post->post_excerpt, $num_words, $more = null );
        } else {
            $content = strip_shortcodes( $post->post_content );
            $content = apply_filters( 'the_content', $content );
            $content = str_replace(']]>', ']]&gt;', $content);
            echo wp_trim_words( $content, $num_words, '' );
        }
    }
}
// Custom Attributes 
if(!function_exists('saniga_parse_custom_attributes')){
    function saniga_parse_custom_attributes( $attributes_string, $delimiter = ',' ) {
        $attributes = explode( $delimiter, $attributes_string );
        $result = [];

        foreach ( $attributes as $attribute ) {
            $attr_key_value = explode( '|', $attribute );

            $attr_key = mb_strtolower( $attr_key_value[0] );

            // Remove any not allowed characters.
            preg_match( '/[-_a-z0-9]+/', $attr_key, $attr_key_matches );

            if ( empty( $attr_key_matches[0] ) ) {
                continue;
            }

            $attr_key = $attr_key_matches[0];

            // Avoid Javascript events and unescaped href.
            if ( 'href' === $attr_key || 'on' === substr( $attr_key, 0, 2 ) ) {
                continue;
            }

            if ( isset( $attr_key_value[1] ) ) {
                $attr_value = trim( $attr_key_value[1] );
            } else {
                $attr_value = '';
            }

            $result[ $attr_key ] = $attr_value;
        }

        return $result;
    }
}
// Badge
if(!function_exists('saniga_elementor_badge_render')){
    function saniga_elementor_badge_render($settings, $args = []){
        $args = wp_parse_args($args, [
            'show_badge' => 'show_badge',
            'badge_text' => 'badge_text',
            'class'      => '',
            'style'      => '1',
            'before'     => '',
            'after'      => ''        
        ]);
        if($settings[$args['show_badge']] === 'true'){
            printf('%s', $args['before']);
            ?>
            <div class="cms-badge cms-badge-<?php echo esc_attr($args['style']);?> <?php echo esc_attr($args['class']);?>">
                <div class="cms-badge-text empty-none"><?php if(!empty($settings[$args['badge_text']])) echo esc_html($settings[$args['badge_text']]); ?></div>
            </div>
        <?php
            printf('%s', $args['after']);
        }
    }
}

// Zocdoc rating 
if(!function_exists('saniga_zocdoc_rating')){
    function saniga_zocdoc_rating($args = []){
        $args = wp_parse_args($args, [
            'show_rating'        => 'true',
            'rating_rated'       => '4.9',
            'rating_total'       => '7541',
            'rating_text1'       => esc_html__('Zocdoc', 'saniga'),
            'rating_text2'       => esc_html__('Overall Rating', 'saniga'),
            'rating_text3'       => esc_html__(', based on.', 'saniga'),
            'rating_text4'       => esc_html__('reviews.', 'saniga'),
            'rated_color'        => 'white',
            'text1_color'        => 'accent',
            'wrap_class'  => ''  
        ]);
        if($args['show_rating'] !== 'true') return;
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-zodoc-rating row align-items-center gutters-20', $args['wrap_class'], 'text-'.$args['rated_color'] ]));?>">
                <div class="cms-zodoc-rated col-auto cms-heading text-37 text-<?php echo esc_attr($args['rated_color']);?>"><?php 
                    echo esc_html($args['rating_rated']);
                ?></div>
                <div class="cms-zodoc-text col">
                    <span class="text-13"><span class="text-border-bottom"><span class="text-14 font-700 text-<?php echo esc_attr($args['text1_color']);?>"><?php echo esc_html($args['rating_text1']);?></span> <?php echo esc_html($args['rating_text2']);?></span><?php echo esc_html($args['rating_text3']);?> <?php echo esc_html($args['rating_total']);?> <?php echo esc_html($args['rating_text4']);?></span>
                </div>
            </div>
        <?php
    }
}

// Newsletter Extension
if(!function_exists('saniga_element_newsletter_form_list')){
    function saniga_element_newsletter_form_list(){
        if(class_exists('Newsletter')) {
            $forms = array_filter( (array) get_option( 'newsletter_forms', array() ) );

            $newsletter_forms = array(
                'default' => esc_html__( 'Default Form', 'saniga' )
            );

            if ( $forms )
            {
                $index = 1;
                foreach ( $forms as $key => $form )
                {
                    $newsletter_forms[$key] = sprintf( esc_html__( 'Form %s', 'saniga' ), $index );
                    $index ++;
                }
            }
        } else {
            $newsletter_forms = [];
        }
    }
}



// Scan element (need add to bottom of this file)
$files = scandir(get_template_directory() . '/elementor/core/register');
foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}
// Testinomial Rating
if(!function_exists('saniga_star_rating')){
    function saniga_star_rating($args = []){
        $args = wp_parse_args($args, [
            'rated'      => '100',
            'text'       => '',
            'class'      => '',
            'rated_class' => '',
            'text_class' => ''    
        ]);
        $text_class = !empty($args['text_class']) ? $args['text_class'] : 'text-16 font-700';
    ?>
        <div class="row align-items-center gutters-15 text-accent">
            <div class="col-auto">
                <div class="cms-star-rating relative <?php echo esc_attr($args['class']);?>">
                    <div class="cms-star-rated absolute <?php echo esc_attr($args['rated_class']);?>" data-width="<?php echo esc_attr($args['rated']);?>"></div>
                </div>
            </div>
            <div class="col empty-none <?php echo esc_attr($text_class);?>"><?php
                echo esc_html($args['text']);
            ?></div>
        </div>
    <?php
    }
}


