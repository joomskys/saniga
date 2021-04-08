<?php
// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox');
// Heading
$title = $widget->get_setting('title', 'Family Business Award');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-20 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'heading'));
// Description
$desc = $widget->get_setting('description', 'We believe that partnerships are fundamental to our growth. We\'ll seek the highest quality global forwarding services.');
$widget->add_render_attribute( 'description', 'class', 'description');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'body'));
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="<?php echo saniga_elementor_align_class($settings,['default' => 'start']);?>">
        <div class="cms-fancy-icon-wrap cms-transition"><?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class'       => 'cms-fancy-icon',
                        'default_img' => '/wp-content/themes/saniga/elementor/templates/widgets/cms_fancy_box/layout-images/certificate-1.jpg',
                        'custom_size' => '230x157'  
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon text-100 text-'.$widget->get_setting('icon_color', 'accent'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-001-house'
                        ]
                    ]);
                break;
            }
        ?></div>
        <div class="cms-fancybox-content relative pt-35 p-lr-20 p-lr-xl-40">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($desc);
            ?></div>
        </div>
    </div>
</div>



