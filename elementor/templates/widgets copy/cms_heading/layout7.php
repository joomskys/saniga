<?php 
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-mainheading text-16 lh-26 font-700');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','accent'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading text-24 text-lg-30 text-xl-40');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_color',''));
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Description
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-16 lh-27 pl-xl-100 pl-lg-50 pl-15');
if($settings['thumbnail_pos'] === 'order-first'){
    $widget->add_render_attribute( 'description', 'class', 'pr-xl-80');
}
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}
// Features List  
$feature_icon_color = $widget->get_setting('icon_color', 'accent');
$feature_icon_bg_color = $widget->get_setting('icon_bg_color', 'white');
$feature_text_color = $widget->get_setting('features_color', 'body');
//Button
$btn_class  = $settings['button_animation'] ? 'animated '.$settings['button_animation'] : '';
$btn2_class = $settings['button2_animation'] ? 'animated '.$settings['button2_animation'] : '';
$btn_video_class = '';
?>
<div class="cms-heading-wrapper relative <?php echo saniga_elementor_align_class($settings);?>">
    <div class="row">
        <?php 
            saniga_elementor_image_render($settings, [
                'before' => '<div class="cms-heading-img col-md-7 '.$settings['thumbnail_pos'].'">',
                'after'  => '</div>',
                'class'  => 'w-100 cms-radius-16'
            ]);
        ?>
        <div class="cms-heading-content bg-white cms-radius-t-16 col-11 col-md-10 offset-1 col-xl-52/5 p-lr-15 pt-xl-70 pt-lg-40 pt-20 <?php echo esc_attr($settings['thumbnail_pos']); ?>">
            <?php 
                saniga_elementor_icon_render($settings, [
                    'wrap_class' => 'mb-20 empty-none',
                    'class'      => 'cms-icon-50 text-50 '.'text-'.$widget->get_setting('heading_color','accent')
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
            <?php 
            if(!empty($settings['description_text'])) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                    echo wpautop($settings['description_text']); 
                ?></div>
            <?php } 
                if(isset($settings['features_list']) && !empty($settings['features_list'])){
                    echo '<div class="cms-heading-features pl-xl-100 pl-lg-50 pl-15 mt-40 text-'.$settings['features_color'].'">';
                    foreach ($settings['features_list'] as $feature){
                        echo '<div class="cms-heading-feature-item row gutters-15 align-items-center">';
                            saniga_elementor_icon_render($settings, ['id' => 'feature_icon', 'tag' => 'span', 'wrap_class' => 'cms-heading-feature-icon col-auto', 'class' => 'bg-'.$feature_icon_bg_color.' text-'.$feature_icon_color ]);
                            echo '<span class="cms-heading-feature-title col font-700">'.$feature['feature'].'</span>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="cms-heading-btns row gutters-30 gutters-grid empty-none pt-20 align-items-center"><?php 
                saniga_elementor_button_render($settings, ['class' => 'col-auto', 'btn_class' => $btn_class]);
                saniga_elementor_button_render($settings, ['class' => 'col-auto','btn_class' => $btn2_class, 'prefix' => 'heading_btn2']);
                saniga_elementor_button_render($settings, ['class' => 'col-auto','btn_class' => $btn_video_class, 'prefix' => 'heading_btn_video']);
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