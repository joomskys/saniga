<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-19 lh-29 mt-n5');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-15 lh-26 pt-12');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}

// Features List 
$feature_icon_color = $widget->get_setting('icon_color', 'accent');
$feature_text_color = $widget->get_setting('features_color', '');
?>
<div class="cms-pricing-wraps cms-radius-br-8 bg-f6f6f6 p-20 p-lg-40 relative overflow-hidden">
    <?php
        // Icon
        saniga_elementor_icon_render($settings, ['wrap_class' => 'cms-pricing-icon text-100 lh-100 text-accent mb-20']);
        // Badge
        if(!empty($settings['badge_text'])) printf('<div class="cms-pricing-badge">%s</div>', $settings['badge_text']);
        // Heading
        if ( !empty($settings['heading_text']) ) { ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                echo esc_html($settings['heading_text']);
            ?></div>
        <?php }
        // Description
        if(!empty($settings['description_text'])) { ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
            echo wpautop($settings['description_text']); 
        ?></div>
    <?php } 
    // Feature list
    if(isset($settings['feature_lists']) && !empty($settings['feature_lists'])){
        echo '<div class="cms-price-features text-15 text-'.$feature_text_color.' overflow-hidden mt-7">';
        foreach ($settings['feature_lists'] as $feature){
            if( empty($feature['feature_icon']['value'] )) {
                $icon_id = 'feature_icon';
                $loop = false;
            } else {
                $icon_id = $feature['feature_icon'];
                $loop = true;
            }
            $feature_price = !empty($feature['feature_price']) ? $feature['feature_price'] : $settings['price_currency'].$settings['price_value'];
            echo '<div class="cms-price-feature-item row gutters-15 align-items-center">';
                echo '<span class="cms-price-feature-title col font-700">';
                    saniga_elementor_icon_render($settings, ['id' => $icon_id, 'loop' => $loop, 'tag' => 'span', 'wrap_class' => 'cms-price-feature-icon text-'.$feature_icon_color]);
                echo    ''.$feature['feature_text'].'</span>';
                echo '<span class="cms-price-feature-price col-auto text-15"><span class="font-700 bg-'.$widget->get_setting('features_price_bg_color','435ba1').' text-white cms-radius-br-4">'.$feature_price.'</span></span>';
            echo '</div>';
        }
        echo '</div>';
    }
    saniga_elementor_button_render($settings,['wrap_class' => 'pt-40']);
    ?>
</div>