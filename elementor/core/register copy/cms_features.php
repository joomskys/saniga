<?php
function saniga_cms_features_list_opts($i, $condition = []){
    $features = array(
        'name'     => 'feature'.$i.'_section',
        'label'    => 'Features '.$i,
        'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
        'controls' => array(
            array(
                'name'             => 'heading'.$i.'_icon',
                'label'            => esc_html__('Select Heading Icon', 'saniga'),
                'type'             => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'     => '',
                    'library'   => '',
                ],
            ),
            array(
                'name'        => 'heading'.$i.'_text',
                'label'       => esc_html__( 'Heading', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => '',
                'placeholder' => esc_html__( 'Enter your title', 'saniga' ),
                'label_block' => true,
            ),
            array(
                'name'        => 'heading'.$i.'_color',
                'label'       => esc_html__( 'Heading Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(),  
                'default'     => '',
            ),
            array(
                'name'        => 'heading'.$i.'_custom_color',
                'label'       => esc_html__( 'Custom Heading Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'condition'   => [
                    'heading'.$i.'_color'      => 'custom'
                ],
            ),
            array(
                'name'             => 'feature'.$i.'_icon',
                'label'            => esc_html__( 'Feture Icon', 'saniga' ),
                'type'             => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
                'default'          => [
                    'value'     => '',
                    'library'   => '',
                ],
                'separator' => 'before'
            ),
            array(
                'name'        => 'icon'.$i.'_color',
                'label'       => esc_html__( 'Icon Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(),  
                'default'     => '',
                'condition'   => [
                    'feature_icon[value]!' => ''
                ]
            ),
            array(
                'name'        => 'icon'.$i.'_custom_color',
                'label'       => esc_html__( 'Custom Icon Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'condition'   => [
                    'icon'.$i.'_color'      => 'custom'
                ],
            ),
            array(
                'name'    => 'feature'.$i.'_lists',
                'label'   => '',
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'default' => [],
                'controls' => array(
                    array(
                        'name'        => 'feature_text',
                        'type'        => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true
                    )
                ),
                'title_field'   => '{{{ feature_text }}}',
                'separator'     => 'before',
                'prevent_empty' => false,
                //'empty'         => false,
            ),
            array(
                'name'        => 'feature'.$i.'_color',
                'label'       => esc_html__( 'Text Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'options'     => saniga_elementor_theme_color_opts(),  
                'default'     => '',
                'separator'   => 'before',
                'condition'   => [
                    'feature_lists!' => ''
                ],
            ),
            array(
                'name'        => 'feature'.$i.'_custom_color',
                'label'       => esc_html__( 'Custom Text Color', 'saniga' ),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'condition'   => [
                    'feature'.$i.'_color'      => 'custom'
                ],
            ),
        ),
        /*'condition' => [
            'number_of_feature_list' => ['1','2','3']
        ]*/
    );
    return $features;
}
function saniga_cms_features_list_render($widget, $settings, $i , $args = []){
    $args = wp_parse_args($args, [
        'heading_text'         => '',
        'heading_color'        => '26365e',
        'heading_icon'         => [],
        'heading_custom_color' => '',
        'feature_lists'        => [],
        'feature_icon'         => [],
        'feature_icon_color'   => '',
        'feature_color'        => '',
        'bg'                   => '' 
    ]);
    // Heading
    $widget->add_render_attribute( 'heading', 'class', 'col-12 col-md-4 text-14 font-700');
    $widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading'.$i.'_color', $args['heading_color']));

    if($settings['heading'.$i.'_color'] === 'custom' && !empty($settings['heading'.$i.'_custom_color'])){
        $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading'.$i.'_custom_color']);
    }
    ?>
    <div class="cms-features-section bg-<?php echo esc_attr($args['bg']);?>">
        <div class="row">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                saniga_elementor_icon_render($settings,[
                    'id'           => 'heading'.$i.'_icon',
                    'tag'          => 'span',
                    'default_icon' => $args['heading_icon']
                ]);
                echo esc_html($widget->get_setting('heading'.$i.'_text', $args['heading_text']));
            ?></div>
            <?php
                $feature_lists = $widget->get_setting('feature'.$i.'_lists', $args['feature_lists']);
                if(!empty($feature_lists)){
                    echo '<div class="cms-features col-12 col-md-8 text-14 text-'.$settings['feature'.$i.'_color'].'">';
                    foreach ($feature_lists as $feature){
                        echo '<div class="cms-feature-item">';
                            saniga_elementor_icon_render($settings, [
                                'id'           => 'feature'.$i.'_icon', 
                                'tag'          => 'span', 
                                'wrap_class'   => 'text-10 text-'.$widget->get_setting('icon'.$i.'_color', $args['feature_icon_color']), 
                                'default_icon' => $args['feature_icon']
                            ]);
                            echo '<span class="cms-feature-title">'.$feature['feature_text'].'</span>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <?php
    
}
etc_add_custom_widget(
    array(
        'name'       => 'cms_features',
        'title'      => esc_html__('CMS Features', 'saniga'),
        'icon'       => 'eicon-feature',
        'categories' => array(Elementor_Theme_Core::ETC_CATEGORY_NAME),
        'params'     => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout Settings', 'saniga' ),
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/cms_features/layout-images/1.png'
                                ]
                            ],
                            'prefix_class' => 'cms-features-layout-'
                        ),
                    )
                ),
                array(
                    'name'     => 'background_section',
                    'label'    => esc_html__( 'Background Settings', 'saniga' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name'        => 'odd_bg',
                            'label'       => esc_html__( 'Odd Background', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                        ),
                        array(
                            'name'        => 'even_bg',
                            'label'       => esc_html__( 'Even Background', 'saniga' ),
                            'type'        => \Elementor\Controls_Manager::SELECT,
                            'options'     => saniga_elementor_theme_color_opts(),  
                            'default'     => '',
                        ),
                        /*array(
                            'name'    => 'number_of_feature_list',
                            'label'   => esc_html__( 'Number of Features', 'saniga' ),
                            'type'    => \Elementor\Controls_Manager::SLIDER,
                            'default' => [
                                'size' => 2,
                            ],
                            'range' => [
                                'px' => [
                                    'max'  => 10,
                                    'min'  => 2,
                                    'step' => 1,
                                ],
                            ],
                        ),*/
                    )
                ),
                saniga_cms_features_list_opts(1, ['1','2','3','4','5','6','7','8','9','10']),
                saniga_cms_features_list_opts(2, ['2','3','4','5','6','7','8','9','10']),
                saniga_cms_features_list_opts(3, ['3','4','5','6','7','8','9','10']),
                saniga_cms_features_list_opts(4, ['4','5','6','7','8','9','10']),
                saniga_cms_features_list_opts(5, ['5','6','7','8','9','10']),
                saniga_cms_features_list_opts(6, ['6','7','8','9','10']),
                saniga_cms_features_list_opts(7, ['7','8','9','10']),
                saniga_cms_features_list_opts(8, ['8','9','10']),
                saniga_cms_features_list_opts(9, ['9','10']),
                saniga_cms_features_list_opts(10, ['10']),
            )
        )
    ),
    get_template_directory() . '/elementor/core/widgets/'
);