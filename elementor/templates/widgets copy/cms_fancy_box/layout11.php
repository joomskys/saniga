<?php
$small_title = $widget->get_setting('small_title', 'Step One:');
$title = $widget->get_setting('title', 'We Design & Ship.');
$desc = $widget->get_setting('description', 'We collaborate with you to design and deliver a system that meets your utility usage and needs, selecting from 66+ manufacturers so you do not have to compromise with your money or with your effort.');

$icon_color = $widget->get_setting('icon_color', 'accent');
$title_color = $widget->get_setting('title_color', '');
$desc_color = $widget->get_setting('description_color', '');

switch ($settings['mode']) {
    case 'carousel':
        foreach ($settings['fancy_list'] as $value) {
            
        ?>
        <div class="cms-fancy-box-item xslick-item xslick-slide">
            <div class="xbg-white xcms-radius-8">
                <div class="row <?php echo saniga_elementor_align_class($settings);?>">
                    <div class="<?php echo esc_attr($icon_classes);?>"><?php  
                        saniga_elementor_icon_render($value,[
                            'class' => 'text-64 text-'.$icon_color
                        ]);
                        saniga_elementor_image_render($value,[
                            'class' => 'text-64 text-'.$icon_color
                        ]);
                    ?></div>
                    <div class="col">
                        <div class="cms-heading text-18 text-<?php echo esc_attr($title_color);?>"><?php
                            etc_print_html($value['title']);
                        ?></div> 
                        <?php if(!empty($value['description'])) { ?>
                            <div class="pt-15 text-<?php echo esc_attr($desc_color);?>"><?php
                                etc_print_html($value['description']);
                            ?></div>
                        <?php } 
                            saniga_elementor_hyperlink_render($value);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
        break;
    
    default:
?>
<div class="row gutters-50 grid-gutters gutters-grid <?php echo saniga_elementor_align_class($settings);?>">
    <div class="col-md-6 order-md-<?php echo esc_attr($settings['image_order']);?>"><?php  
        saniga_elementor_image_render($settings,[
            'id'      => 'background_img',
            'size'    => 'background_size',
            'class'   => 'cms-radius-8'  
        ]);
    ?></div>
    <div class="col-md-6">
        <div class="text-16 text-accent font-700 mt-n8"><?php etc_print_html($small_title); ?></div>
        <div class="cms-heading text-24 text-<?php echo esc_attr($widget->get_setting('title_color', ''));?>"><?php
            etc_print_html($title);
        ?></div> 
        <?php if(!empty($desc)) { ?>
            <div class="pt-15 text-<?php echo esc_attr($widget->get_setting('description_color', ''));?>"><?php
                etc_print_html($desc);
            ?></div>
        <?php } ?>
    </div>
</div>
<?php
        break;
}



