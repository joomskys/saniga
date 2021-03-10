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
<div class="cms-icon-boxes bg-white hover-active-readmore">
    <div class="p-40">
        <div class="row <?php echo saniga_elementor_align_class($settings);?>">
            <div class="<?php echo esc_attr($icon_classes);?>"><?php  
                saniga_elementor_icon_render($settings,[
                    'wrap_class' => 'cms-main-icon',
                    'class'      => 'mb-10 text-78 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
                ]);
                saniga_elementor_image_render($settings,[
                    'wrap_class' => 'cms-main-icon',
                    'class'      => 'mb-10 text-78 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
                ]);
            ?></div>
            <div class="col">
                <div class="cms-heading text-21 lh-29"><?php
                    echo wpautop($title);
                ?></div> 
                <div class="pt-15"><?php
                    echo wpautop($desc);
                ?></div>
                <?php 
                if($settings['hyperlink'] === ''){
                    saniga_elementor_hyperlink_render($settings,[
                        'class' => 'cms-readmore style-2 mt-20'
                    ]);
                } else {
                    saniga_elementor_button_render($settings, [
                        'prefix' => 'button',
                        'class'  => 'd-inline-block pt-20'
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
</div>


