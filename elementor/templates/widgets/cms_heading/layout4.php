<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading cms-mainheading text-40 lh-55 font-700 mt-n8');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'heading'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay','0').'ms');
}
// SubHeading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading font-700 text-16 pb-20 empty-none');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_text_color', 'primary'));
if ( $settings['subheading_text_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $widget->get_setting('subheading_text_animation', ''));
}
if ( $settings['subheading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'subheading', 'style', 'transition-delay:' . $widget->get_setting('subheading_text_animation_delay','0').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc pt-25 text-16 lh-27 font-700');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_text_color','body'));
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_texts_animation'] );
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
    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
        etc_print_html($widget->get_setting('subheading_text',''));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
        etc_print_html($widget->get_setting('heading_text','Your Clients & Employees Deserve A Clean, Safe And Healthy Environment!!'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
        echo wpautop($widget->get_setting('description_text', 'We continuously invest in improving our processes, our employees and our relationship with each and every business we serve.')); 
    ?></div>
    <div class="cms-desc-extra-space extra-space"></div> 
    <div class="row gutters-30 gutters-grid pt-30"><?php 
        saniga_elementor_button_render($settings, [
            'prefix' => 'btn3',
            'class' => 'col-auto'
        ]);
        saniga_elementor_button_render($settings, [
            'prefix' => 'btn4',
            'class'  => 'col-auto'
        ]);
    ?></div>
</div>