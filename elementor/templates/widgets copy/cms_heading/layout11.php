<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading cms-mainheading text-24 mt-n8 empty-none');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-subheading text-17 font-500 empty-none');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_color','primary'));
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc empty-none pt-25 text-16 lh-27');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings);?>">
    <div class="row gutters-40">
        <?php 
            saniga_elementor_icon_render($settings, [
                'wrap_class' => 'col-12 col-md-auto mb-40',
                'class'      => 'text-82 text-accent',
                'default'    => [
                    'value'   => 'cmsi-green-energy-6',
                    'library' => 'cmsi'
                ]
            ]);
        ?>
        <div class="col mt-n10">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                etc_print_html($widget->get_setting('heading_text',''));
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                etc_print_html($widget->get_setting('subheading_text','We drive the transition to more sustainable, reliable, and affordable energy systems. With our innovative technologies, we energize society, that’s our aim!'));
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                $description = $widget->get_setting('description_text', '<p>The increase in extreme weather events and rising sea levels are unmistakable signs of climate change. Roughly 850 million people still live without access to electricity, which is the foundation of sustainable development.</p>
                    <p>How can we meet the growing demand for electricity while protecting our climate and make planet a better place?</p>');
                echo wpautop($description); 
            ?></div>
            <div class="cms-heading-btns row gutters-30 gutters-grid empty-none pt-30 align-items-center"><?php 
                saniga_elementor_button_render($settings, [
                    'class'     => 'col-auto', 
                    'btn_class' => '',
                    'default'     => [
                        'btn_text' => esc_html__('Learn More','saniga'),
                        'btn_type' => ''
                    ]  
                ]);
                if(!empty($settings['singnature_name'])) : ?>
                    <div class="col-auto">
                        <div class="cms-heading-singnature relative"><?php
                            saniga_elementor_image_render($settings,[
                                'id'      => 'singnature_image',
                                'size'    => 'full',
                                'default' => false
                            ]); ?>
                            <div class="cms-heading text-19 lh-29 mb-0"><?php echo esc_html($settings['singnature_name']); ?></div>
                            <div class="text-14 text-accent"><?php echo esc_html($settings['singnature_job']) ?></div>
                        </div>
                    </div><?php 
                endif; 
            ?></div>
        </div>
    </div>
</div>