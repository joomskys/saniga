<div class="cms-client-slider cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="cms-slick-slider-wrap">
        <div <?php saniga_slick_slider_settings($widget); ?>>
            <?php foreach ($settings['clients'] as $value): ?>
                <div class="cms-client-item cms-slick-slide slick-slide" style="padding-left: <?php echo esc_attr($settings['gap']/2);?>px; padding-right: <?php echo esc_attr($settings['gap']/2);?>px;">
                    <a <?php echo saniga_elementor_custom_link_attrs($value, [
                        'name' => 'image_link',
                        'echo' => true,
                    ]);?>>
                        <?php 
                        saniga_image_by_size([
                            'id'          => $value['image']['id'],
                            'size'        => 'full',
                            'class'       => '',
                            'default_img' => $value['image']['url'],
                            'before'      => '<div class="cms-client-img">',
                            'after'       => '</div>'
                        ]);
                        ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php 
        saniga_slick_slider_dots($settings); 
        saniga_slick_slider_arrows($settings);
        saniga_slick_slider_arrows_side($settings);
        saniga_slick_slider_arrows_bottom($settings);
    ?>
</div>
