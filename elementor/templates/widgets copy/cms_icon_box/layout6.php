<?php
// Background & Text color
$widget->add_render_attribute( 'wrap', 'class', 'p-20 p-md-40 pr-lg-20 cms-radius-8');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color', 'accent'));
$widget->add_render_attribute( 'wrap', 'class', 'text-'.$widget->get_setting('text_color', 'white'));
// Title
$title = $widget->get_setting('title', 'Save Your Money');
// Desc
$desc = $widget->get_setting('description', 'Save money on utilities or increase the value of your home by installing solar panels as a great option.');
?>
<div class="cms-icon-box-wrap relative">
    <?php saniga_elementor_image_render($settings, [
        'id'      => 'background_img',
        'size'    => 'background_size',
        'class'   => 'cms-radius-16'  
    ]); ?>
    <div class="cms-icon-box-content absolute">
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
                <div class="cms-heading font-400 text-25 lh-35 mt-n10 text-<?php echo esc_attr($widget->get_setting('text_color', 'white'));?>"><?php
                    etc_print_html($title);
                ?></div> 
                <div class="pt-15 font-700 mb-n8"><?php
                    etc_print_html($desc);
                ?></div>
            </div>
        </div>
    </div>
</div>


