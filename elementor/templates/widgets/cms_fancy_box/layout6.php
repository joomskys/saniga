<?php
// Wrap Classes 
$content_align = $widget->get_setting('text-align','center');
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox bg-'.$widget->get_setting('bg_color','white'));
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings, ['default' => $content_align]));

// Heading
$title = $widget->get_setting('title', 'Healthy Teams And Social Distance');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-18 font-700 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'heading'));

// Description
$description = $widget->get_setting('description', 'Our experts are thoroughly trained and use proprietary disinfecting systems.');
$widget->add_render_attribute( 'description', 'class', 'cms-description pb-30');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'body'));

$inner_class = '';
if($widget->get_setting('bg_color','') === ''){
   $inner_class = 'p-lr-lg-40'; 
}
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="cms-fancybox-inner cms-shadow-2 p-20 p-tb-lg-40 <?php echo esc_attr($inner_class);?>">
        <?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class' => 'cms-fancy-icon'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon text-64 text-'.$widget->get_setting('icon_color', 'accent'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-028-gloves'
                        ]
                    ]);
                break;
            }
        ?>
        <div class="cms-fancybox-content relative pt-25">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($description);
            ?></div>
            <?php 
                $link_arrow = is_rtl() ? 'cmsi-arrow-left' : 'cmsi-arrow-right';
                saniga_elementor_button_render($settings, [
                    'class'  => '',
                    'prefix' => 'button6',
                    'default_icon' => [
                        'library' => 'flaticon',
                        'value'   => $link_arrow
                    ],
                    'align'   => $content_align
                ]);
            ?>
        </div>
    </div>
</div>



