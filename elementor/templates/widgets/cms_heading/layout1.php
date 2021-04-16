<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-16 font-700 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'secondary'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay','0').'ms');
}
// SubHeading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading font-700 text-40 pt-10');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_text_color', 'primary'));
if ( $settings['subheading_text_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $widget->get_setting('subheading_text_animation', ''));
}
if ( $settings['subheading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'subheading', 'style', 'transition-delay:' . $widget->get_setting('subheading_text_animation_delay','0').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc empty-none pt-50 text-16 lh-27');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_text_color']);
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_text_animation'] );
}
if($settings['description_text_color'] === 'custom' && !empty($settings['description_text_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_text_custom_color']);
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings);?>">
    <?php 
        saniga_elementor_icon_render($settings, [
            'wrap_class' => 'mb-20',
            'class'      => 'text-82 text-accent'
        ]);
    ?>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
        etc_print_html($widget->get_setting('heading_text','Let Us Help You With Your Cleaning & Disinfecting Responsibilities'));
    ?></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
        etc_print_html($widget->get_setting('subheading_text','Leading Provider Of Cleaning And Disinfecting Services In Huge Commercial Markets!'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div class="pl-lg-100">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
            echo wpautop($widget->get_setting('description_text', 'With more than 35 years getting to know every kind of client, from homeowners to facility & property managers to healthcare decision-makers. Our relentless passion for excellence and customer service means we continuously invest in improving our processes.

                Saniga is a leading provider of cleaning and restoration services in both the residential and commercial markets, operating through an extensive service network.')); 
        ?></div>
        <div class="cms-heading-singnature row gutters-30 align-items-center pt-50">
            <div class="col-auto">
                <div class="cms-heading cms-signature-name text-19 lh-29 mb-0 font-600 text-<?php echo esc_attr($widget->get_settings('singnature_color','primary'));?>"><?php echo esc_html($widget->get_setting('singnature_name','Michael Brian')); ?></div>
                <div class="cms-signature-job text-14 text-<?php echo esc_attr($widget->get_setting('singnature_job_color','body'));?>"><?php echo esc_html($widget->get_setting('singnature_job','Saniga Founder')) ?></div>
            </div>
            <div class="col-auto"><span class="cms-divider d-block"></span></div>
            <div class="col"><?php
                if(!empty($settings['singnature_image']['id'])){
                    saniga_elementor_image_render($settings, [
                        'id'          => 'singnature_image',
                        'custom_size' => 'full'
                    ]);
                } else {
                    echo '<img src="'.$settings['singnature_image']['url'].'" alt="saniga" />';
                }
            ?></div>
        </div>
    </div>
</div>