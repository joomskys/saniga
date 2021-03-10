<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-16 lh-26');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','accent'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading text-40 lh-55 pt-10 mb-25');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$settings['subheading_color']);
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Testinominal Text
$widget->add_render_attribute( 'description', 'class', 'cms-client-desc');

// Inner
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-client-slider-inner row',
] );
?>
<div class="cms-client-slider">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div class="col-12 empty-none mb-20"><?php if ( !empty($settings['heading_text']) ) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                    echo esc_html($settings['heading_text']);
                ?></div>
            <?php } if(!empty($settings['subheading_text'])){ ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                    echo esc_html($settings['subheading_text']);
                ?></div>
            <?php } 
        ?></div>
        <div class="col-12">
            <div class="cms-slick-sliders">
                <?php saniga_slick_slider_arrows_top($settings); ?>
                <div class="relative">
                    <div <?php saniga_slick_slider_settings($widget); ?>>
                        <?php foreach ($settings['clients'] as $value): ?>
                            <div class="cms-client-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                                <a <?php echo saniga_elementor_custom_link_attrs($value, [
                                    'name' => 'image_link',
                                    'echo' => true,
                                ]);?>>
                                    <?php saniga_image_by_size([
                                        'id'          => $value['image']['id'],
                                        'size'        => 'full',
                                        'class'       => '',
                                        'default'     => true,
                                        'before'      => '<div class="cms-client-img">',
                                        'after'       => '</div>'
                                    ]);
                                    ?>
                                </a>
                                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                                    echo esc_html($value['description']); 
                                ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php saniga_slick_slider_arrows($settings); ?>  
                </div>
                <?php 
                    saniga_slick_slider_dots($settings); 
                    saniga_slick_slider_arrows_bottom($settings); 
                ?>
            </div>
        </div>
    </div>
</div>
