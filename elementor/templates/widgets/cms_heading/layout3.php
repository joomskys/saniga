<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-16 font-700 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'accent'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay').'ms');
}
// SubHeading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading font-700 text-37 lh-54 pt-10');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_text_color', 'primary'));
if ( $settings['subheading_text_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $widget->get_setting('subheading_text_animation', ''));
}
if ( $settings['subheading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('subheading_text_animation_delay').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc empty-none pt-15 pt-lg-35 text-16 lh-27 font-700');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_text_color','body'));
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_texts_animation'] );
}
if($settings['description_text_color'] === 'custom' && !empty($settings['description_text_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_text_custom_color']);
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings);?>">
    <div class="row justify-content-between">
        <div class="col-12 col-lg-5">
            <?php 
                saniga_elementor_icon_render($settings, [
                    'wrap_class' => 'mb-20',
                    'class'      => 'text-82 text-accent'
                ]);
            ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                etc_print_html($widget->get_setting('heading_text','Why Should You Choose Us?'));
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                etc_print_html($widget->get_setting('subheading_text','Your Clients & Employees Deserve A Clean, Safe and Healthy Environment!!'));
            ?></div>
            <div class="cms-heading-extra-space extra-space"></div>
        </div>
        <div class="col-12 col-lg-6">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                echo wpautop($widget->get_setting('description_text', 'The processes and systems we put in place provide a consistent, high quality service with a focus on safety. All our employees are trained and certified in the most current pandemic cleanup and disinfection techniques of clean for health.

                    Now more than ever, detailed disinfecting methods should be in place to protect the guests and employees of your facility.')); 
            ?></div>
            <div class="cms-desc-extra-space extra-space"></div> 
            <div class="row gutters-30 gutters-grid pt-40"><?php 
                saniga_elementor_button_render($settings, [
                    'class' => 'col-auto'
                ]);
                saniga_elementor_button_render($settings, [
                    'prefix' => 'btn2',
                    'class'  => 'col-auto'
                ]);
            ?></div>
        </div>
    </div>
</div>