<?php
// Wrap
$widget->add_render_attribute('wrap', [
    'class' => 'cms-counter-wrap '.saniga_elementor_align_class($settings)
]);
// Counter Number
$widget->add_render_attribute( 'counter', [
    'class' => 'cms-counter-number-wrap absolute cms-heading font-600 text-80 lh-80 text-'.$widget->get_setting('number_color','accent')
] );
$widget->add_render_attribute( 'counter-number', [
    'class'          => 'cms-counter-number',
    'data-duration'  => $widget->get_setting('duration', '300'),
    'data-to-value'  => $widget->get_setting('ending_number', '97'),
    'data-delimiter' => $widget->get_setting('thousand_separator_char', ',' ),
] );
// Title
$widget->add_render_attribute( 'title', [
    'class' => 'cms-counter-title cms-heading text-24 font-700 pt-25 pb-15 pl-30 text-'.$widget->get_setting('title_color','')
] );
// Description 
$widget->add_render_attribute( 'description', [
    'class' => 'cms-counter-desc pl-30 font-700 text-'.$widget->get_setting('description','body')
] );
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' ));?>>
    <div class="cms-counter-number-wrapper relative">
        <?php 
        if($settings['icon_type'] === 'icon'):
            saniga_elementor_icon_render($settings, [
                'id'         => 'counter_icon',
                'wrap_class' => 'cms-counter-icon',
                'default_icon'    => [
                    'value'   => '',
                    'library' => 'cmsi'
                ]
            ] ); 
        elseif($settings['icon_type'] === 'image'):
            saniga_elementor_image_render($settings, [
                'id'          => 'icon_image',
                'class'       => 'cms-counter-icon cms-counter-image',
                'default_img' => get_template_directory_uri().'/assets/images/icons/quote-left-accent.png',
                'custom_size' => '162x118'  
            ]);
        endif; 
        ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'counter' )); ?>>
            <span class="cms-counter-number-prefix empty-none"><?php echo esc_html($widget->get_setting('prefix','')); ?></span>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'counter-number' )); ?>><?php 
                echo esc_html($settings['starting_number']); 
            ?></span><span class="cms-counter-number-suffix empty-none"><?php echo esc_html($widget->get_setting('suffix', '%')); ?></span>
        </div>
    </div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'title' )); ?>><?php etc_print_html($widget->get_setting('title','Customer Satisfaction')); ?></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php etc_print_html($widget->get_setting('description','Based on 750+ reviews and 6,154 Cleaned Industries.')); ?></div>
</div>