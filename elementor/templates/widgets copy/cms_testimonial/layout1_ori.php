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
$widget->add_render_attribute( 'description', 'class', 'cms-ttmn-desc cms-heading font-400 text-25 lh-43');
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
            <div class="col-12 col-xl-4">
                <?php if ( !empty($settings['heading_text']) ) { ?>
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                        echo esc_html($settings['heading_text']);
                    ?></div>
                <?php } if(!empty($settings['subheading_text'])){ ?>
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                        echo esc_html($settings['subheading_text']);
                    ?></div>
                <?php } 
                    if($settings['asnavfor'] === 'true') : 
                ?>
                <div class="cms-slick-slider-nav d-none d-xl-block pt-20" data-asnavfor="true" data-rtl="<?php echo is_rtl() ? 'true': 'false';?>" dir="<?php echo is_rtl() ? 'rtl': 'ltr';?>">
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
                                'size'    => '80',
                                'class'   => 'cms-radius-tr-8',
                                'default' => true,
                                'before'  => '<div class="cms-slick-nav-img d-inline-block relative">',
                                'after'   => '</div>'
                            ]); ?>
                            <div class="pt-10 d-block">
                                <div class="cms-ttmn-title text-white text-16 font-700"><?php echo esc_html($value['title']); ?></div>
                                <div class="cms-ttmn-position text-13 lh-17"><?php echo esc_html($value['position']); ?></div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-xl-7 pt-20">
                <div class="cms-slick-sliders">
                    <?php if(in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                        <div class="cms-slick--arrows empty-none"><div class="cms-slick-arrows empty-none"></div></div>
                    <?php endif; ?>
                    <div <?php saniga_slick_slider_settings($widget); ?>>
                        <?php foreach ($settings['testimonial'] as $value): ?>
                            <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                                    echo esc_html($value['description']); 
                                ?>
                                    <div class="cms-zodoc-rating row align-items-center gutters-20 pt-40">
                                        <div class="cms-zodoc-rated col-auto cms-heading text-37 text-white">
                                            4.9
                                        </div>
                                        <div class="cms-zodoc-text col">
                                            <span class="text-13 text-white"><span class="text-border-bottom"><span class="text-14 font-700 text-accent">Zocdoc</span> Overall Rating</span>, based on 7541 reviews.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cms-slick-dots empty-none"></div>
                    <?php if(!in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                        <div class="cms-slick--arrows empty-none mt-30 mt-md-n50"><div class="cms-slick-arrows empty-none"></div></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 d-xl-none">
                <div class="cms-slick-slider-nav pt-60" data-asnavfor="true">
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
                                'size'    => '80',
                                'class'   => 'cms-radius-tr-8',
                                'default' => true,
                                'before'  => '<div class="cms-slick-nav-img d-inline-block relative">',
                                'after'   => '</div>'
                            ]); ?>
                            <div class="pt-10 d-block">
                                <div class="cms-ttmn-title text-white text-16 font-700"><?php echo esc_html($value['title']); ?></div>
                                <div class="cms-ttmn-position text-13 lh-17"><?php echo esc_html($value['position']); ?></div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
