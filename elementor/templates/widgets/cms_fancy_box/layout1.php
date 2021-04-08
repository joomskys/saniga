<?php
$icon_pos = $widget->get_setting('icon_position', 'top');
switch ($icon_pos) {
    case 'start':
        $icon_classes = 'col-sm-auto';
        break;
    case 'end':
        $icon_classes = 'col-sm-auto order-last';
        break;
    case 'bottom':
        $icon_classes = 'col-12 order-last mt-20';
        break;
    default:
        $icon_classes = 'col-12 mb-25';
        break;
}
$title = $widget->get_setting('title', 'Highly Trained & Professional');
$icon_color = $widget->get_setting('icon_color', 'white');
$title_color = $widget->get_setting('title_color', 'white');

// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox pt-40 p-lr-40 pb-15 cms-hover-show-more-text-wrap');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color', 'secondary'));
$widget->add_render_attribute( 'wrap', 'class', 'text-'.$widget->get_setting('text_color', 'white'));
//background image
$background_img = saniga_elementor_image_url_render($settings, [
    'id'   => 'background_img',
    'size' => 'background_size'
]);
if(!empty($settings['background_img']['id'])){
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url('.$background_img.');');
}

// Heading
$widget->add_render_attribute( 'heading', 'class', 'col cms-heading text-18 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'white'));

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="row <?php echo saniga_elementor_align_class($settings);?>">
        <div class="<?php echo esc_attr($icon_classes);?>"><?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class' => 'cms-fancy-icon'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon text-48 text-'.$widget->get_setting('icon_color', 'white'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-028-gloves'
                        ]
                    ]);
                break;
            }
        ?></div>
        <div class="cms-fancybox-content relative">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <?php 
                if($settings['hyperlink'] === 'button'){
                    // Button
                    saniga_elementor_button_render($settings, [
                        'class'  => 'col-12',
                        'prefix' => 'button'
                    ]);
                } else {
                    // Custom Link 
                    saniga_elementor_hyperlink_render($settings,[
                        'link_type'        => $settings['link_type'],
                        'wrap_class'       => 'col-12',
                        'class'            => 'cms-hover-show-more-text font-700',
                        'link_color'       => 'white',
                        'link_hover_color' => 'white',
                        'default_icon'     => [
                            'value'   => 'cmsi-arrow-right',
                            'library' => 'cmsi'
                        ],
                        'icon_class'    => 'text-12'
                    ]);
                }
            ?>
        </div>
    </div>
</div>



