<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-16 font-700 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'accent'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay','0').'ms');
}
// SubHeading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading font-700 text-37 pt-10');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_text_color', 'primary'));
if ( $settings['subheading_text_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $widget->get_setting('subheading_text_animation', ''));
}
if ( $settings['subheading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'subheading', 'style', 'transition-delay:' . $widget->get_setting('subheading_text_animation_delay','0').'ms');
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings,['default' => 'center']);?>">
    <?php 
        saniga_elementor_icon_render($settings, [
            'wrap_class' => 'mb-20',
            'class'      => 'text-82 text-accent'
        ]);
    ?>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
        etc_print_html($widget->get_setting('heading_text','Cleaning Plans That Meets Your Needs'));
    ?></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
        etc_print_html($widget->get_setting('subheading_text','Specialist Disinfection Services That Fits Your Premises'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
</div>