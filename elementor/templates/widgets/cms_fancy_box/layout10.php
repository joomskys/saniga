<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-18 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'primary'));

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="row <?php echo saniga_elementor_align_class($settings, ['default' => 'start']);?>">
        <div class="col-auto"><?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class' => 'cms-fancy-icon pl-10'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon pl-10',
                        'class'        => 'cms-fancyicon text-64 text-'.$widget->get_setting('icon_color', 'accent'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-028-gloves'
                        ]
                    ]);
                break;
            }
        ?></div>
        <div class="cms-fancybox-content relative col">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($widget->get_setting('title', '30 Day Return Policy'));
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($widget->get_setting('description', 'If you have any questions, or need help, just contact us and our support team will immediately help you.'));
            ?></div>
        </div>
    </div>
</div>



