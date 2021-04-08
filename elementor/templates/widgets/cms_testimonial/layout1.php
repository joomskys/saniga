<?php
// Testinominal Text
$widget->add_render_attribute( 'description', 'class', 'cms-ttmn-desc cms-heading font-500i text-16 lh-26 text-lg-20 lh-lg-30 text-xl-26 lh-xl-41 mt-n8 mb-20');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_typo_color']);
?>
<div class="cms-ttmn-slider cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="cms-slick-slider-wrap">
        <div <?php saniga_slick_slider_settings($widget); ?>>
            <?php foreach ($settings['testimonial'] as $value): ?>
                <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding: <?php echo esc_attr($settings['gap']/2);?>px;">
                    <div class="row gutters-40 gutters-grid">
                        <div class="col-auto">
                            <?php 
                                saniga_elementor_image_render($value, [
                                    'id'          => 'image',
                                    'custom_size' => '70',  
                                    'default_img' => $value['image']['url']
                            ]); ?>
                        </div>
                        <div class="col-12 col-md-basic">
                            <div class="cms-ttmn-content relative">
                                <?php 
                                if($settings['qicon_type'] === 'icon'):
                                    saniga_elementor_icon_render($settings, [
                                        'id'         => 'quote_icon',
                                        'wrap_class' => 'cms-quote-icon absolute',
                                        'default_icon'    => [
                                            'value'   => '',
                                            'library' => 'cmsi'
                                        ]
                                    ] ); 
                                elseif($settings['qicon_type'] === 'image'):
                                    saniga_elementor_image_render($settings, [
                                        'id'          => 'quote_image',
                                        'class'       => 'cms-quote-icon cms-quote-image absolute',
                                        'default_img' => '/wp-content/themes/saniga/assets/images/icons/quote-right.png',
                                        'custom_size' => '30x22'  
                                    ]);
                                endif; 
                                ?>
                                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                                    echo esc_html($value['description']); 
                                ?></div>
                                <div class="cms-ttmn-star"><?php 
                                    saniga_star_rating([
                                        'rated' => $value['star'],
                                        'text'  => $value['star_text']
                                    ]);
                                ?></div>
                                <div class="cms-ttmn-author">
                                    <span class="cms-ttmn-name cms-heading text-16 font-700"><?php echo $value['title'];?>,</span>
                                    <span class="cms-ttmn-subtitle text-13"><?php  echo $value['sub_title'];?></span>
                                </div>
                            </div>
                        </div>
                    </div>
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
