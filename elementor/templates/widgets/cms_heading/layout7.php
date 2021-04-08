<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-24 font-700 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'heading'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc pt-10 text-17 lh-27');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_text_color']);
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_text_animation'] );
}
if($settings['description_text_color'] === 'custom' && !empty($settings['description_text_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_text_custom_color']);
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings);?>">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
        saniga_elementor_icon_render($settings, [
            'tag' => 'span'
        ]);
        etc_print_html($widget->get_setting('heading_text','Overview'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
        echo wpautop($widget->get_setting('description_text', 'With more than 35 years getting to know every kind of client, from homeowners to facility & property managers to healthcare decision-makers. Our relentless passion for excellence and customer service means we invest in continuously improving our processes. Sanera is a leading provider of cleaning and restoration services in both the residential and commercial markets, operating through an extensive service network.

Business owners and property managers are key to keeping patrons, guests, patients and visitors safe. They are responsible for taking every step to ensure the health and safety of their communities. Whether a large retail shop,we have the disinfection know-how to customize a cleaning plan for your needs.')); 
    ?></div>
</div>