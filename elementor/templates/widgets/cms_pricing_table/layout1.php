<?php
// Features List 
$feature_icon_color = $widget->get_setting('icon_color', 'accent');
$feature_text_color = $widget->get_setting('features_color', 'primary');
?>
<div class="cms-pricing-wraps bg-f4f4f4 p-20 p-lg-40 relative overflow-hidden h-100 d-flex">
    <?php
    // Feature list
    if(isset($settings['feature_lists']) && !empty($settings['feature_lists'])){
        echo '<div class="cms-price-features text-15 font-700 text-'.$feature_text_color.' overflow-hidden w-100">';
        foreach ($settings['feature_lists'] as $feature){
            if( empty($feature['feature_icon']['value'] )) {
                $icon_id = 'feature_icon';
                $loop = false;
            } else {
                $icon_id = $feature['feature_icon'];
                $loop = true;
            }
            $feature_price = !empty($feature['feature_price']) ? $feature['feature_price'] : '$50';
            echo '<div class="cms-price-feature-item row gutters-15 align-items-center">';
                echo '<span class="cms-price-feature-title col font-700">';
                    saniga_elementor_icon_render($settings, ['id' => $icon_id, 'loop' => $loop, 'tag' => 'span', 'wrap_class' => 'cms-price-feature-icon text-'.$feature_icon_color]);
                echo    ''.$feature['feature_text'].'</span>';
                echo '<span class="cms-price-feature-price col-auto text-15"><span class="font-700 bg-'.$widget->get_setting('features_price_bg_color','secondary').' text-white">'.$feature_price.'</span></span>';
            echo '</div>';
        }
        echo '</div>';
    }
    saniga_elementor_button_render($settings,['class' => 'cms-btn-pricing mt-25 w-100 align-self-end']);
    ?>
</div>