<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-18 lh-28 mt-n8');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','primary'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-14 lh-24 pt-15');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}
// Features List 
$feature_icon_color = $widget->get_setting('icon_color', 'accent');
$feature_icon_bg_color = $widget->get_setting('icon_bg_color', 'transparent');
?>
<div class="bg-white p-20 p-md-50 cms-radius-8 cms-shadow-4 relative overflow-hidden">
    <?php
    // Badge
    saniga_elementor_badge_render($settings, [
        'before' => '<div class="cms-pricing-badge">',
        'after'  => '</div>'
    ]);
    // Icon
    saniga_elementor_icon_render($settings, ['wrap_class' => 'cms-pricing-icon text-40 text-accent']);
    ?>
    <?php 
         
        if ( !empty($settings['heading_text']) ) { ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                etc_print_html($widget->get_setting('heading_text','Starter Plan'));
            ?></div>
        <?php }
            if(!empty($settings['subheading_text'])){
                ?>
                <div class="subheading"><?php etc_print_html($settings['subheading_text']); ?></div>
                <?php
            }
        ?>
        <div class="cms-pricing-separator"></div>
        <div class="cms-pricing-price">
            <span class="cms-heading text-50 lh-30 text-primary font-400"><?php 
                    echo esc_html($settings['price_currency'].$settings['slashed_price_value']);
                    echo esc_html($settings['price_value']); 
                ?><span class="cms-price-package text-14"><?php 
                    echo esc_html($settings['price_separator'].$settings['price_duration']); 
                ?></span>  
            </span>
        </div>
        <?php
        if(!empty($settings['description_text'])) { ?>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                echo wpautop($settings['description_text']); 
            ?></div>
        <?php } 
        saniga_elementor_button_render($settings,['class' => 'mt-35']);
        if(isset($settings['feature_lists']) && !empty($settings['feature_lists'])){
                echo '<div class="cms-heading-features text-15 mt-45 text-'.$settings['features_color'].'" style="min-height:'.$settings['features_height'].'px;">';
                foreach ($settings['feature_lists'] as $feature){
                    if( empty($feature['feature_icon']['value'] )) {
                        $icon_id = 'feature_icon';
                        $loop = false;
                    } else {
                        $icon_id = $feature['feature_icon'];
                        $loop = true;
                    }
                    echo '<div class="cms-heading-feature-item row gutters-15 align-items-center">';
                        saniga_elementor_icon_render($settings, ['id' => $icon_id, 'loop' => $loop, 'tag' => 'span', 'wrap_class' => 'cms-heading-feature-icon col-auto', 'class' => 'bg-'.$feature_icon_bg_color.' text-'.$feature_icon_color]);
                        echo '<span class="cms-heading-feature-title col font-700">'.$feature['feature_text'].'</span>';
                    echo '</div>';
                }
                echo '</div>';
            }
    ?>
</div>