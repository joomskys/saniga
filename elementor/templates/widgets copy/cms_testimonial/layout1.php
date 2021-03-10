<?php
// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-16 lh-26');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
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
$widget->add_render_attribute( 'description', 'class', 'cms-ttmn-desc cms-heading font-400 text-16 lh-26 text-lg-20 lh-lg-30 text-xl-26 lh-xl-41');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
}

// Inner
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-ttmn-slider-inner row justify-content-between',
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="cms-ttmn-slider">
        <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div class="col-12 mb-35 empty-none"><?php if ( !empty($settings['heading_text']) ) { ?>
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                        echo esc_html($settings['heading_text']);
                    ?></div><?php 
                } if(!empty($settings['subheading_text'])){ 
                    ?><div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                        echo esc_html($settings['subheading_text']);
                    ?></div>
                <?php } 
            ?></div>
            <div class="col-12">
                <div class="cms-slick-sliders">
                    <?php if(in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                        <div class="cms-slick--arrows empty-none"><div class="cms-slick-arrows empty-none"></div></div>
                    <?php endif; ?>
                    <div <?php saniga_slick_slider_settings($widget); ?>>
                        <?php foreach ($settings['testimonial'] as $value): ?>
                            <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                                    echo esc_html($value['description']); 
                                ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cms-slick-dots empty-none"></div>
                    <?php if(!in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                        <div class="cms-slick--arrows"><div class="cms-slick-arrows empty-none"></div></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($settings['asnavfor'] === 'true'): ?>
            <div class="col-12 cms-ttmn-navs mt-40">
                <div class="cms-ttmn-nav-avatar">
                    <div class="cms-slick-slider-nav" data-asnavfor="true">
                        <?php foreach ($settings['testimonial'] as $value): 
                            $img = etc_get_image_by_size( array(
                                'attach_id'  => $value['image']['id'],
                                'thumb_size' => '61',
                                'class'      => '',
                            ));
                            $thumbnail = $img['thumbnail'];
                            ?>
                            <div class="cms-ttmn-nav-item">
                                <?php saniga_image_by_size([
                                    'id'      => $value['image']['id'],
                                    'size'    => '40',
                                    'class'   => 'circle',
                                    'default' => true,
                                    'before'  => '<div class="cms-slick-nav-img d-inline-block relative">',
                                    'after'   => '</div>'
                                ]); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cms-ttmn-nav-avatar-info">
                    <div class="cms-slick-sliders">
                        <div class="cms-slick-slider-meta">
                            <?php foreach ($settings['testimonial'] as $value): ?>
                                <div class="cms-ttmn-item cms-slick-slide slick-slide text-white">
                                    <div class="cms-ttmn-title text-16 font-700"><?php echo esc_html($value['title']); ?></div>
                                    <div class="cms-ttmn-position text-13 lh-17"><?php echo esc_html($value['position']); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
