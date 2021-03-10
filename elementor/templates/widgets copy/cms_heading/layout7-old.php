<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-16 lh-27 font-700');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-subheading text-16 lh-27 pt-25');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$settings['subheading_color']);
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-16 lh-27');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}
// Features List  
$feature_icon_color = $widget->get_setting('icon_color', 'white');
$feature_text_color = $widget->get_setting('features_color', '26365e');
$feature_icon_bg_color = $widget->get_setting('icon_bg_color', '435ba1');
//Button
$btn_class  = $settings['button_animation'] ? 'animated '.$settings['button_animation'] : '';
$btn2_class = $settings['button2_animation'] ? 'animated '.$settings['button2_animation'] : '';

if(!empty($settings['description_text']) || !empty($settings['features_list'])){
    $main_col = 'col-lg-8';
} else {
    $main_col = 'col-12';
}
?>
<div class="cms-heading-wrapper <?php echo saniga_elementor_align_class($settings);?>">
    <div class="row">
        <div class="<?php echo esc_attr($main_col);?>">
            <?php 
                saniga_elementor_icon_render($settings, [
                    'wrap_class' => 'mb-20 empty-none',
                    'class'      => 'cms-icon-50 text-50'
                ]);
            ?>
            <?php if ( !empty($settings['heading_text']) ) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                    echo esc_html($settings['heading_text']);
                ?></div>
            <?php }
                if(!empty($settings['subheading_text'])){ ?>
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                        echo wpautop($settings['subheading_text']);
                    ?></div>
            <?php } 
            if(!empty($settings['subheading_extra_space'])) printf('<div style="height: %spx"></div>', $settings['subheading_extra_space']);
            ?>
        </div>
        <?php if(!empty($settings['description_text']) || !empty($settings['features_list'])) : ?>
            <div class="col-lg-4"><?php 
            if(!empty($settings['description_text'])) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                    echo wpautop($settings['description_text']); 
                ?></div>
            <?php } 
                if(isset($settings['features_list']) && !empty($settings['features_list'])){
                    echo '<div class="cms-heading-features mt-25 text-'.$settings['features_color'].'">';
                    foreach ($settings['features_list'] as $feature){
                        echo '<div class="cms-heading-feature-item row gutters-15 align-items-center">';
                            saniga_elementor_icon_render($settings, ['id' => 'feature_icon', 'tag' => 'span', 'wrap_class' => 'cms-heading-feature-icon col-auto', 'class' => 'bg-'.$feature_icon_bg_color.' text-'.$feature_icon_color ]);
                            echo '<span class="cms-heading-feature-title col font-700">'.$feature['feature'].'</span>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?></div>
        <?php endif; ?>
    </div>
    <div class="cms-heading-btns row gutters-30 gutters-grid empty-none pt-20 align-items-center"><?php 
        saniga_elementor_button_render($settings, ['class' => 'col-auto', 'btn_class' => $btn_class]);
        saniga_elementor_button_render($settings, ['class' => 'col-auto','btn_class' => $btn2_class, 'prefix' => 'heading_btn2']);
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