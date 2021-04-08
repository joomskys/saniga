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
                    <?php foreach ($settings['teams'] as $team): ?>
                        <div class="cms-team-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                            <div class="cms-team-item-inner cms-shadow-1 bg-white overflow-hidden">
                                <a <?php echo saniga_elementor_custom_link_attrs($team, [
                                    'name' => 'link',
                                    'echo' => true,
                                ]);?>>
                                        <?php saniga_image_by_size([
                                            'id'          => $team['image']['id'],
                                            'size'        => '400',
                                            'class'       => 'w-100',
                                            'default'     => true,
                                            'default_img' => $team['image']['url'],
                                            'before'      => '<div class="cms-team-img">',
                                            'after'       => '</div>'
                                        ]); 
                                    ?>
                                </a>
                                <div class="cms-team-info p-tb-40 p-lr-20 p-lr-lg-40">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto mt-n8 mb-n8">
                                            <div class="cms-heading text-20 pb-8"><?php echo esc_html($team['name']); ?></div>
                                            <div class="team-position"><?php echo esc_html($team['position']); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="cms-team-social">
                                                <?php if(!empty($team['social'])):
                                                    $team_socials = json_decode($team['social'], true);
                                                    foreach ($team_socials as $team_social): ?>
                                                        <a href="<?php echo esc_url($team_social['url']); ?>">
                                                            <span class="<?php echo esc_attr($team_social['icon']); ?> cms-transition"></span>
                                                        </a>
                                                    <?php endforeach;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
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
