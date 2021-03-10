<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-24 lh-34');
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
$feature_icon_bg_color = $widget->get_setting('icon_bg_color', 'accent');
$feature_icon_color = $widget->get_setting('icon_color', 'white');
$feature_text_color = $widget->get_setting('features_color', '26365e');
?>
<div class="cms-pricing-wraps cms-radius-br-8 bdr-solid bdr-2 bdr-e6e8eb p-30 p-lr-lg-50 pt-lg-42 pb-lg-50 relative overflow-hidden">
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
        echo '<div class="cms-heading-features  bg-e6f8fb cms-radius-br-8 p-15 p-tb-lg-33 p-lr-lg-40 mt-35 text-15 text-'.$feature_text_color.'">';
        foreach ($settings['feature_lists'] as $feature){
            if( empty($feature['feature_icon']['value'] )) {
                $icon_id = 'feature_icon';
                $loop = false;
            } else {
                $icon_id = $feature['feature_icon'];
                $loop = true;
            }
            echo '<div class="cms-heading-feature-item row gutters-15 align-items-center">';
                saniga_elementor_icon_render($settings, [
                    'id'         => $icon_id, 
                    'loop'       => $loop, 
                    'tag'        => 'span', 
                    'wrap_class' => 'cms-heading-feature-icon col-auto',
                    'class'      => 'text-'.$feature_icon_color.' bg-'.$feature_icon_bg_color
                ]);
                echo '<span class="cms-heading-feature-title col font-700">'.$feature['feature_text'].'</span>';
            echo '</div>';
        }
        echo '</div>';
    }
    ?>
    <div class="row gutters-40 gutters-grid align-items-center pt-40 justify-content-center justify-content-sm-start">
        <div class="col-auto">
            <div class="cms-pricing-price">
                <span class="cms-heading text-50 lh-30 text-435ba1 font-400"><?php 
                        echo esc_html($settings['price_currency'].$settings['slashed_price_value']);
                        echo esc_html($settings['price_value']); 
                    ?><span class="cms-price-package text-14"><?php 
                        echo esc_html($settings['price_separator'].$settings['price_duration']); 
                    ?></span>  
                </span>
            </div>
        </div>
        <div class="col-12 col-sm-auto text-center"><?php 
            saniga_elementor_button_render($settings);
        ?>
        </div>
    </div>
</div>