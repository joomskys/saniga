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
        $icon_classes = 'col-12 mb-20';
        break;
}
$title = $widget->get_setting('title', 'Save Your Money');
$desc = $widget->get_setting('description', '');
?>
<div class="row <?php echo saniga_elementor_align_class($settings);?>">
    <div class="<?php echo esc_attr($icon_classes);?>"><?php  
        saniga_elementor_icon_render($settings,[
            'class' => 'text-64 text-'.$widget->get_setting('icon_color', 'accent')
        ]);
        saniga_elementor_image_render($settings,[
            'class' => 'text-64 text-'.$widget->get_setting('icon_color', 'accent')
        ]);
    ?></div>
    <div class="col">
        <div class="cms-heading text-18 text-<?php echo esc_attr($widget->get_setting('title_color', ''));?>"><?php
            etc_print_html($title);
        ?></div> 
        <?php if(!empty($desc)) { ?>
            <div class="pt-15 text-<?php echo esc_attr($widget->get_setting('description_color', ''));?>"><?php
                etc_print_html($desc);
            ?></div>
        <?php } ?>
    </div>
</div>


