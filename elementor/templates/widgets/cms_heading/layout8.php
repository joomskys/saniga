<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-30 lh-40 text-lg-50 lh-lg-60 text-xl-75 lh-xl-85 font-700');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'heading'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'animation-delay:' . $widget->get_setting('heading_text_animation_delay','0').'ms');
}

// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc relative empty-none pt-15 text-17 lh-27 font-700');
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
        etc_print_html($widget->get_setting('heading_text','Helping Industries And Huge Facilities!'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
        echo wpautop($widget->get_setting('description_text', 'Our cleaning experts deliver the highest quality of clean you can always count,<br /> let us help you with all of your cleaning and disinfecting responsibilities now.')); 
    ?></div>
    <div class="cms-heading-feature row gutters-40 gutters-grid align-items-center pt-30">
        <?php 
            foreach ($settings['heading_feature8'] as $feature) {
                $icon_color  = !empty($feature['icon_color']) ? $feature['icon_color'] : 'accent';
                switch ($feature['icon_type']) {
                    case 'image':
                        saniga_elementor_image_render($feature, [
                            'id'          => $feature['image']['id'],
                            'default_img' => $feature['image']['url']
                        ]);
                        break;
                    
                    default:
                        saniga_elementor_icon_render($feature,[
                            'id'   => 'icon',
                            'wrap_class' => 'col-auto',
                            //'loop' => true,
                            'class' => 'text-68 text-'.$icon_color
                        ]);
                        break;
                }
            }
            saniga_elementor_button_render($settings, [
                'prefix' => 'btn8',
                'class'  => 'col-auto'
            ]);
        ?>
    </div>
</div>