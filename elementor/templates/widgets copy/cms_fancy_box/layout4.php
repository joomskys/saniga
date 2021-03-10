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
                        <div class="row hover-active-readmore <?php echo saniga_elementor_align_class($settings);?>">
                            <?php  
                                saniga_elementor_icon_render($value,[
                                    'before' => '<div class="'.esc_attr($icon_classes).'">',
                                    'after'  => '</div>',
                                    'class'  => 'text-64 text-'.$icon_color
                                ]);
                                saniga_elementor_image_render($value,[
                                    'before' => '<div class="'.esc_attr($icon_classes).'">',
                                    'after'  => '</div>',
                                    'class' => 'text-64 text-'.$icon_color
                                ]);
                            ?>
                            <div class="col">
                                <div class="cms-heading text-18 text-<?php echo esc_attr($title_color);?>"><?php
                                    etc_print_html($value['title']);
                                ?></div> 
                                <?php if(!empty($value['description'])) { ?>
                                    <div class="pt-5 text-<?php echo esc_attr($desc_color);?>"><?php
                                         etc_print_html($value['description']);
                                    ?></div>
                                <?php } ?>
                                <?php 
                                    saniga_elementor_hyperlink_render($value,[
                                        'link_type' => $value['link_type'],
                                        'link_text' => $value['link_text'],
                                        'wrap_class'=> 'pt-15',
                                        'class'     => 'cms-readmore style-1'    
                                    ]);
                                ?>
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
<?php
        break;
}


