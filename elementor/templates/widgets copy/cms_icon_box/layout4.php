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
$title = $widget->get_setting('title', 'Powerfull Strategy');
$desc = $widget->get_setting('description', 'Facilities meet high security requirements and are certified to the highest local standards.');
?>
<div class="row hover-active-readmore <?php echo saniga_elementor_align_class($settings);?>">
    <?php  
        saniga_elementor_icon_render($settings,[
            'before' => '<div class="'.esc_attr($icon_classes).'">',
            'after'  => '</div>',
            'class'  => 'text-64 text-'.$widget->get_setting('icon_color', 'accent')
        ]);
        saniga_elementor_image_render($settings,[
            'before' => '<div class="'.esc_attr($icon_classes).'">',
            'after'  => '</div>',
            'class' => 'text-64 text-'.$widget->get_setting('icon_color', 'accent')
        ]);
    ?>
    <div class="col">
        <div class="cms-heading text-18 text-<?php echo esc_attr($widget->get_setting('title_color', ''));?>"><?php
            etc_print_html($title);
        ?></div> 
        <?php if(!empty($desc)) { ?>
            <div class="pt-5 text-<?php echo esc_attr($widget->get_setting('description_color', ''));?>"><?php
                etc_print_html($desc);
            ?></div>
        <?php } ?>
        <?php 
            if($settings['hyperlink'] === ''){
                saniga_elementor_hyperlink_render($settings,[
                    'link_type' => $settings['link_type'],
                    'link_text' => $settings['link_text'],
                    'wrap_class'=> 'pt-15',
                    'class'     => 'cms-readmore style-1'    
                ]);
            } else {
                saniga_elementor_button_render($settings, [
                    'prefix'           => 'button',
                    'wrap_class'       => 'pt-10',
                    'btn_type_default' => 'btn btn-fill'
                ]);
            }
        ?>
    </div>
</div>


