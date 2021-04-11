<?php
// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox p-30 p-lg-50');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color', 'accent'));
//background image
$background_img = saniga_elementor_image_url_render($settings, [
    'id'            => 'background_img',
    'size'          => 'background_size',
    'default_thumb' => true,
    'default_img'   => get_template_directory_uri().'/elementor/templates/widgets/cms_fancy_box/layout-images/bg-12.jpg'
]);
//if(!empty($settings['background_img']['id'])){
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url('.$background_img.');');
//}

// Heading
$widget->add_render_attribute( 'small-heading', 'class', 'cms-smallheading text-16 font-700 mb-10');
$widget->add_render_attribute( 'small-heading', 'class', 'text-'.$widget->get_setting('title_color', 'white'));
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-32 font-600');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'white'));

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="row <?php echo saniga_elementor_align_class($settings);?>">
        <div class="col-12"><?php
            switch ($widget->get_setting('icon_type','')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class' => 'cms-fancy-icon'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon text-64 text-'.$widget->get_setting('icon_color', 'white'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-028-gloves'
                        ]
                    ]);
                break;
            }
        ?></div>
        <div class="col-12 cms-fancybox-content relative">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'small-heading' )); ?>><?php
                etc_print_html($widget->get_setting('small_title','Cleaning Excellence!'));
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($widget->get_setting('title','Cleaning Supplies <br />For All needs!'));
            ?></div>
        </div>
        <?php 
            saniga_elementor_button_render($settings, [
                'class'  => 'col-12 align-self-end mt-130',
                'prefix' => 'button12'
            ]);
        ?>
    </div>
</div>



