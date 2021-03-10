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

// Inner
$widget->add_render_attribute( 'inner', [
    'class' => 'cms-team-slider-inner row',
] );
?>
<div class="cms-team-slider">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div class="col-12">
            <?php if ( !empty($settings['heading_text']) ) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                    echo esc_html($settings['heading_text']);
                ?></div>
            <?php } if(!empty($settings['subheading_text'])){ ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                    echo esc_html($settings['subheading_text']);
                ?></div>
            <?php } ?>
        </div>
        <div class="col-12">
            <div class="cms-slick-sliders">
                <?php if(in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                    <div class="cms-slick--arrows empty-none"><div class="cms-slick-arrows empty-none"></div></div>
                <?php endif; ?>
                <div <?php saniga_slick_slider_settings($widget); ?>>
                    <?php foreach ($settings['teams'] as $value): ?>
                        <div class="cms-team-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                            <div class="cms-team-item-inner cms-lg-shadow-4 cms-shadow-hover-4 cms-radius-8 cms-transition overflow-hidden">
                                <div class="cms-team-img-wrap relative">
                                    <a <?php echo saniga_elementor_custom_link_attrs($value, [
                                        'name' => 'link',
                                        'echo' => true,
                                    ]);?>>
                                            <?php saniga_image_by_size([
                                                'id'          => $value['image']['id'],
                                                'size'        => '570x781',
                                                'class'       => 'cms-radius-8 w-100',
                                                'default'     => true,
                                                'before'      => '<div class="cms-team-img">',
                                                'after'       => '</div>'
                                            ]); 
                                        ?>
                                    </a>
                                    <?php if(!empty($value['social'])): ?>
                                        <div class="cms-team-social-wrap cms-transition absolute">
                                            <div class="cms-team-social justify-content-center">
                                                <?php
                                                    $team_social = json_decode($value['social'], true);
                                                    foreach ($team_social as $team): ?>
                                                        <a href="<?php echo esc_url($team['url']); ?>">
                                                            <span class="<?php echo esc_attr($team['icon']); ?>"></span>
                                                        </a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="cms-team-info p-20 p-lg-30 text-center">
                                    <div class="cms-heading text-18 mt-n8"><?php echo esc_html($value['name']); ?></div>
                                    <div class="text-14"><?php echo esc_html($value['position']); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="cms-slick-dots empty-none"></div>
                <?php if(!in_array($settings['arrows_pos'], ['top-left', 'top-right'])): ?>
                    <div class="cms-slick--arrows empty-none"><div class="cms-slick-arrows mt-30 empty-none"></div></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
