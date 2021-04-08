<?php
$main_color = $widget->get_setting('main_color', 'secondary');
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-24 font-700 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_text_color', 'heading'));
if ( $settings['heading_text_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $widget->get_setting('heading_text_animation', ''));
}
if ( $settings['heading_text_animation_delay'] !== '') {
    $widget->add_render_attribute( 'heading', 'style', 'transition-delay:' . $widget->get_setting('heading_text_animation_delay').'ms');
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-desc empty-none pt-30 text-17 lh-27');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_text_color']);
if ( $settings['description_text_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_text_animation'] );
}
if($settings['description_text_color'] === 'custom' && !empty($settings['description_text_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_text_custom_color']);
}
// Features List 
$feature_icon_color = $widget->get_setting('icon_color', $main_color);
$feature_text_color = $widget->get_setting('features_color', 'primary');
$feature_lists = $widget->get_setting('feature2_lists', []);
// Price
$price_currency = $widget->get_setting('price_currency', '$');
$price_value = $widget->get_setting('price_value','150');
$price = $price_currency.$price_value;
$price_duration = $widget->get_setting('price_duration','/Mon');
?>
<div class="cms-pricing-wraps bg-white p-tb-50 p-lr-20 p-lr-lg-50 relative overflow-hidden h-100 cms-divider cms-divider-top cms-divider-<?php echo esc_attr($main_color);?> cms-shadow-1 d-flex">
    <div class="w-100">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
            etc_print_html($widget->get_setting('heading_text','Residential'));
        ?></div>
        <div class="cms-extra-space extra-space"></div>
        <div class="cms-price-features font-700 text-<?php echo esc_attr($feature_text_color);?> overflow-hidden w-100">
        <?php
            foreach ($feature_lists as $feature){
                if( empty($feature['feature_icon']['value'] )) {
                    $icon_id = 'feature2_icon';
                    $loop    = false;
                } else {
                    $icon_id = $feature['feature_icon'];
                    $loop    = true;
                }
                echo '<div class="cms-price-feature-item">';
                    saniga_elementor_icon_render($settings, [
                        'id'         => $icon_id, 
                        'loop'       => $loop, 
                        'tag'        => 'span', 
                        'wrap_class' => 'cms-price-feature-icon pr-10 text-'.$feature_icon_color,
                        'class'      => 'text-20',
                        'default_icon' => [
                            'library' => 'awesome',
                            'value'   => 'far fa-check-circle'
                        ]
                    ]);
                    echo '<span class="cms-price-feature-title">'.$feature['feature_text'].'</span>';
                echo '</div>';
            }
        ?>
        </div>
    </div>
    <div class="w-100 align-self-end">
        <div class="cms-pricing-price">
            <span class="cms-heading font-500">
                <span class="text-50"><?php 
                    etc_print_html($price);
                ?></span>
                <span class="cms-price-package text-14"><?php 
                    etc_print_html($price_duration); 
                ?></span>  
            </span>
        </div>
        <?php
        saniga_elementor_button_render($settings,[
            'prefix' => 'btn2',
            'class'  => 'cms-btn-pricing mt-25'
        ]);
        ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
            echo wpautop($widget->get_setting('description_text', 'Our extensive industry experience give us a leg up when it comes to cleaner, and healthier, than ever before.')); 
        ?></div>
    </div>
</div>