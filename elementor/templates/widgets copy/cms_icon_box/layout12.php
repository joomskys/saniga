<?php
// Background & Text color
$widget->add_render_attribute( 'wrap', 'class', 'cms-icon-box-inner p-lr-20 p-lg-lr-40 cms-radius-8');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color', 'accent'));
$widget->add_render_attribute( 'wrap', 'class', 'text-'.$widget->get_setting('text_color', 'white'));
// Title
$title = $widget->get_setting('title', 'Our Process In Few Steps');
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="<?php echo saniga_elementor_align_class($settings);?>">
        <div class="icon-position opacity-01"><?php  
            saniga_elementor_icon_render($settings,[
                'class' => 'text-'.esc_attr($widget->get_setting('icon_color', 'white'))
            ]);
            saniga_elementor_image_render($settings,[
                'class' => 'text-'.esc_attr($widget->get_setting('icon_color', 'white'))
            ]);
        ?></div>
        <div class="cms-heading text-24 lh-34 text-<?php echo esc_attr($widget->get_setting('text_color', 'white'));?>"><?php
            etc_print_html($title);
        ?></div>
    </div>
</div>


