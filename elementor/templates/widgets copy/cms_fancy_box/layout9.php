<?php
$icon_pos = $widget->get_setting('icon_position', 'top');
switch ($icon_pos) {
    case 'start':
        $icon_classes = 'col-sm-auto';
        break;
    case 'end':
        $icon_classes = 'col-sm-auto order-sm-last';
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

$icon_color = $widget->get_setting('icon_color', 'accent');
$title_color = $widget->get_setting('title_color', '');
$desc_color = $widget->get_setting('description_color', '');
switch ($settings['mode']) {
    case 'carousel':
    ?>
    <div class="cms-slick-slider-data-settings"  data-slick='{"slidesToShow": 4, "slidesToScroll": 4, "arrows": false, "dots":true, "appendDots":".cms-slick-dots", "dotsClass":"cms-slick-dot"}'>
        <?php
            foreach ($settings['fancy_list'] as $value) {
                ?>
                    <div class="cms-slick-slide slick-slide slick-item">
                        <div class="cms-icon-boxes bg-white cms-radius-8 p-40 relative cms-transition hover-active-readmore">
                            <div class="row <?php echo saniga_elementor_align_class($settings);?>">
                                <div class="<?php echo esc_attr($icon_classes);?>"><?php  
                                    saniga_elementor_icon_render($value,[
                                        'wrap_class' => 'main-icon',
                                        'class' => 'text-64 text-'.$icon_color
                                    ]);
                                    saniga_elementor_image_render($value,[
                                        'wrap_class' => 'main-icon',
                                        'class' => 'text-64 text-'.$icon_color
                                    ]);
                                ?></div>
                                <div class="col">
                                    <div class="cms-heading text-19"><?php
                                        etc_print_html($value['title']);
                                    ?></div> 
                                    <div class="pt-15 text-<?php echo esc_attr($desc_color);?>"><?php
                                        etc_print_html($value['description']);
                                    ?></div>
                                    <?php 
                                        saniga_elementor_hyperlink_render($value,[
                                            'wrap_class' => 'mt-15',
                                            'class'      => 'cms-readmore style-1'
                                        ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
        ?>
    </div>
    <div class="cms-slick-dots"></div>
        <?php
        break;
     default:    
?>
<div class="cms-icon-boxes bg-white pt-25 p-lr-40 pb-10 cms-transition">
    <div class="row <?php echo saniga_elementor_align_class($settings);?>">
        <div class="<?php echo esc_attr($icon_classes);?>"><?php  
            saniga_elementor_icon_render($settings,[
                'wrap_class' => 'main-icon d-inline-block',
                'class' => 'text-64 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
            ]);
            saniga_elementor_image_render($settings,[
                'wrap_class' => 'main-icon',
                'class' => 'text-64 text-'.esc_attr($widget->get_setting('icon_color', 'accent'))
            ]);
        ?></div>
        <div class="col">
            <div class="cms-heading text-18 mt-30 mt-sm-0"><?php
                etc_print_html($title);
            ?></div> 
            <div class="pt-15"><?php
                etc_print_html($desc);
            ?></div>
            <?php 
            if($settings['hyperlink'] === ''){
                saniga_elementor_hyperlink_render($settings, [
                    'wrap_class' => 'pt-10',
                    'class'      => 'cms-readmore'
                ]);
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
<?php
        break;
}


