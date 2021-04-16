<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading cms-mainheading text-40 text-lg-60 lh-lg-70 text-xl-75 lh-xl-85 font-700');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'heading'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay','0').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc pt-15 text-17 lh-27 font-700');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_text_color','body'));
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_texts_animation'] );
}
if($settings['description_text_color'] === 'custom' && !empty($settings['description_text_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_text_custom_color']);
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings, ['default' => 'center']);?>">
    <?php 
        saniga_elementor_icon_render($settings, [
            'wrap_class' => 'mb-20',
            'class'      => 'text-82 text-accent'
        ]);
    ?>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
        etc_print_html($widget->get_setting('heading_text','About Us'));
    ?></div>
    <div class="cms-heading-extra-space extra-space"></div>
    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
        echo wpautop($widget->get_setting('description_text', 'The processes and systems we put in place provide a consistent, high quality service with a focus on safety, our employees are trained and certified in the most current pandemic cleanup.')); 
    ?></div>
    <div class="cms-desc-extra-space extra-space"></div> 
    <div class="row gutters-40 gutters-grid pt-30 <?php echo saniga_elementor_align_class($settings, ['default' => 'center', 'prefix' => 'justify-content-']);?> align-items-center">
        <?php 
            saniga_elementor_button_render($settings, [
                'prefix'       => 'btn6',
                'class'        => 'col-auto'
            ]);
            saniga_elementor_button_render($settings, [
                'prefix'       => 'btn_contact6',
                'class'        => 'col-auto'
            ]);
            if(!empty($settings['video_link']['url'])) {
        ?>
        <div class="col-auto">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a class="cms-popup cms-video-1" href="<?php echo esc_url($settings['video_link']['url']);?>"><span class="cmsi cmsi-play"></span></a>
                </div>
                <div class="col font-700 cms-heading-desc text-<?php echo esc_attr($widget->get_setting('description_text_color','heading')) ?>">
                    <?php etc_print_html($settings['video_text']); ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php if($settings['show_breadcrum'] === 'true'){ 
        saniga_breadcrumb([
            'show_breadcrumb' => '1',
            'class'           => 'pt-90 text-'.$widget->get_setting('description_text_color','heading'). ' link-'.$widget->get_setting('description_text_color','heading').' '.saniga_elementor_align_class($settings, ['default' => 'center', 'prefix' => 'justify-content-']),
            'divider'         => '<span class="breadcrumb-divider cmsi-angle-right rtl-flip d-inline-block"></span>'
        ]);
    } ?>
</div>