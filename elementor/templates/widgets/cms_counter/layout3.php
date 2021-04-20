<?php
// Wrap
$widget->add_render_attribute('wrap', [
    'class' => 'cms-counter-wrap '.saniga_elementor_align_class($settings)
]);
// Counter Number
$widget->add_render_attribute( 'counter', [
    'class' => 'cms-counter-number-wrap cms-heading font-400 text-60 lh-60 pt-15 text-'.$widget->get_setting('number_color','accent').' pb-5'
] );
$widget->add_render_attribute( 'counter-number', [
    'class'          => 'cms-counter-number',
    'data-duration'  => $widget->get_setting('duration', '300'),
    'data-to-value'  => $widget->get_setting('ending_number', '2512'),
    'data-delimiter' => $widget->get_setting('thousand_separator_char', ',' ),
] );
// Icons
$icon_color = 'text-'.$widget->get_setting('icon_text_color', 'primary');
// Title
$widget->add_render_attribute( 'title', [
    'class' => 'cms-counter-title cms-heading mb-15 text-14 font-700 text-'.$widget->get_setting('title_color','heading')
] );
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' ));?>>
    <div class="cms-counter-number-wrapper">
        <?php 
            if($settings['icon_type'] === 'icon'):
                saniga_elementor_icon_render($settings, [
                    'id'         => 'counter_icon',
                    'wrap_class' => 'cms-counter-icon',
                    'class'      => 'text-64 lh-64 '.$icon_color,   
                    'default_icon'    => [
                        'value'   => 'flaticon-030-facemask',
                        'library' => 'flaticon'
                    ],
                    'atts' => [$widget->get_render_attribute_string( 'icon_attrs')]
                ] ); 
            elseif($settings['icon_type'] === 'image'):
                saniga_elementor_image_render($settings, [
                    'id'          => 'icon_image',
                    'class'       => 'cms-counter-icon cms-counter-image',
                    'default_img' => get_template_directory_uri().'/assets/images/icons/030-facemask.svg',
                    'custom_size' => '64'  
                ]);
            endif; 
        ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'counter' )); ?>>
            <span class="cms-counter-number-prefix empty-none"><?php echo esc_html($widget->get_setting('prefix','')); ?></span>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'counter-number' )); ?>><?php 
                echo esc_html($settings['starting_number']); 
            ?></span><span class="cms-counter-number-suffix empty-none"><?php echo esc_html($widget->get_setting('suffix','')); ?></span>
        </div>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'title' )); ?>><?php 
            etc_print_html($widget->get_setting('title','Qualified Workers')); 
        ?></div>
    </div>
</div>