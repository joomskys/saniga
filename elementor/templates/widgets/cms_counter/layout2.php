<?php
// Wrap
$widget->add_render_attribute('wrap', [
    'class' => 'cms-counter-wrap '.saniga_elementor_align_class($settings)
]);
// Counter Number
$widget->add_render_attribute( 'counter', [
    'class' => 'cms-counter-number-wrap cms-heading font-600 text-70 lh-70 text-'.$widget->get_setting('number_color','accent').' col-xs-auto  pt-xs-25 pb-25'
] );
$widget->add_render_attribute( 'counter-number', [
    'class'          => 'cms-counter-number',
    'data-duration'  => $widget->get_setting('duration', '300'),
    'data-to-value'  => $widget->get_setting('ending_number', '2512'),
    'data-delimiter' => $widget->get_setting('thousand_separator_char', ',' ),
] );
// Title
$widget->add_render_attribute( 'title', [
    'class' => 'cms-counter-title cms-heading mb-15 text-24 font-700 text-'.$widget->get_setting('title_color','heading')
] );
// Description 
$widget->add_render_attribute( 'description', [
    'class' => 'cms-counter-desc font-700 text-'.$widget->get_setting('description_color','body')
] );
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' ));?>>
    <div class="cms-counter-number-wrapper row gutters-xl-70">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'counter' )); ?>>
            <span class="cms-counter-number-prefix empty-none"><?php echo esc_html($widget->get_setting('prefix','')); ?></span>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'counter-number' )); ?>><?php 
                echo esc_html($settings['starting_number']); 
            ?></span><span class="cms-counter-number-suffix empty-none"><?php echo esc_html($widget->get_setting('suffix','')); ?></span>
        </div>
        <div class="col">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'title' )); ?>><?php etc_print_html($widget->get_setting('title','Qualified Workers')); ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php etc_print_html($widget->get_setting('description','Using unique industry leading processes and extensive, customized training, our cleaning procedures have been developed to help a wide range of all facilities needs.')); ?></div>
        </div>
    </div>
</div>