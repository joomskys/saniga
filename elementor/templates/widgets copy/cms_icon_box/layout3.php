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
        $icon_classes = 'col-12 mb-10';
        break;
}
$title = $widget->get_setting('title', 'Save Your Money');
$desc = $widget->get_setting('description', 'Save money on utilities or increase the value of your home by installing solar panels as a great option.');
?>
<div class="cms-icon-boxes bg-white cms-radius-8 p-40 cms-shadow-2 cms-transition">
    <div class="row gutters-30 gutters-grid <?php echo saniga_elementor_align_class($settings);?>">
        <div class="<?php echo esc_attr($icon_classes);?>"><?php  
            saniga_elementor_icon_render($settings,[
                'wrap_class' => 'main-icon',
                'class' => 'text-64 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
            ]);
            saniga_elementor_image_render($settings,[
                'wrap_class' => 'main-icon',
                'class' => 'text-64 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
            ]);
        ?></div>
        <div class="col">
            <div class="cms-heading text-18"><?php
                etc_print_html($title);
            ?></div> 
            <div class="pt-15"><?php
                etc_print_html($desc);
            ?></div>
            <?php 
            if($settings['hyperlink'] === ''){
                saniga_elementor_hyperlink_render($settings);
            } else {
                saniga_elementor_button_render($settings, [
                    'prefix' => 'button',
                    'class'  => 'd-inline-block pt-10'
                ]);
            }
            ?>
        </div>
    </div>
</div>


