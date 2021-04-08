<?php
// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox relative bg-white p-40 h-100');

// Icon
$icon_color = $widget->get_setting('icon_color', 'accent');
// Heading
$title = $widget->get_setting('title', 'Healthy Teams And Social Distance ');
$title_color = $widget->get_setting('title_color', 'white');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-18 font-700 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color'));

// Description
$description = $widget->get_setting('description', 'Our experts are thoroughly trained and use proprietary disinfecting systems.');
$widget->add_render_attribute( 'description', 'class', 'cms-description');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'body'));

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="<?php echo saniga_elementor_align_class($settings, ['default' => 'center']);?>">
        <?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings, [
                        'class' => 'cms-fancy-icon-bg'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon-bg mb-20',
                        'class'        => 'cms-fancyicon cms-transition text-64 text-'.$widget->get_setting('icon_color','accent'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-028-gloves'
                        ]
                    ]);
                break;
            }
        ?>
        <div class="cms-fancybox-content relative cms-transition overflow-hidden">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($description);
            ?></div>
        </div>
        <?php 
            saniga_elementor_button_render($settings, [
                'prefix' => 'link_section2',
                'class'  => 'cms-transition bg-white'
            ]);
        ?>
    </div>
</div>



