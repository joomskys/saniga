<?php
// Wrap
$widget->add_render_attribute('wrap', [
    'class' => 'cms-counter-wrap '.saniga_elementor_align_class($settings)
]);
// Counter Number
$widget->add_render_attribute( 'counter', [
    'class' => 'cms-counter-number cms-heading text-30 lh-30 mb-n8 text-'.$widget->get_setting('number_color','accent'),
    'data-duration' => $widget->get_settings('duration', '300'),
    'data-to-value' => $widget->get_settings('ending_number', 999),
] );

if ( ! empty( $settings['thousand_separator'] ) ) {
    $delimiter = empty( $settings['thousand_separator_char'] ) ? ',' : $settings['thousand_separator_char'];
    $widget->add_render_attribute( 'counter', 'data-delimiter', $delimiter );
}

// Title
$widget->add_render_attribute( 'title', [
    'class' => 'cms-counter-title text-16 lh-26 font-700 pb-8 mt-n8 text-'.$widget->get_setting('title_color','primary')
] );
// Description 
$widget->add_render_attribute( 'description', [
    'class' => 'cms-counter-desc pt-25 text-'.$widget->get_setting('description_color','')
] );
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' ));?>>
    <?php if ( $settings['title'] ) : ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'title' )); ?>><?php etc_print_html($settings['title']); ?></div>
    <?php endif; ?>
    <div class="row gutters-15 justify-content-center align-items-center">
        <?php if($settings['icon_type'] === 'icon'): ?>
            <div class="cms-counter-icon mb-5 text-40 text-accent col-12"><?php 
                saniga_elementor_icon_render($settings, [
                    'id' => 'counter_icon'
                ] ); 
            ?></div>
        <?php elseif($settings['icon_type'] == 'image'): ?>
            <div class="cms-counter-image mb-5 col-12"><?php
                saniga_elementor_image_render($settings, [
                    'id' => 'icon_image'
                ]);
            ?></div>
        <?php endif; ?>
        <div class="cms-counter-number-wrapper cms-heading col-12">
            <span class="cms-counter-number-prefix cms-heading text-30 lh-30 text-<?php echo esc_attr($widget->get_setting('number_color','accent'));?>"><?php echo esc_html($settings['prefix']); ?></span>
            <span <?php etc_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
            <span class="cms-counter-number-suffix cms-heading text-30 lh-30 text-<?php echo esc_attr($widget->get_setting('number_color','accent'));?>"><?php echo esc_html($settings['suffix']); ?></span>
        </div>
    </div>  
</div>