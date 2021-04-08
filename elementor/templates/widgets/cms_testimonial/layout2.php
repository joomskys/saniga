<?php
// Testinominal Text
$widget->add_render_attribute( 'description', 'class', 'cms-ttmn-desc cms-heading font-400i text-18 lh-28 text-lg-25 lh-lg-43 mb-40');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_typo_color']);
?>
<div class="cms-ttmn-slider cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="cms-slick-slider-wrap">
        <div <?php saniga_slick_slider_settings($widget); ?>>
            <?php foreach ($settings['testimonial'] as $value): ?>
                <div class="cms-ttmn-item cms-slick-slide slick-slide" style="padding: <?php echo esc_attr($settings['gap']/2);?>px;">
                    <div class="cms-ttmn-item-inner pr-xl-50 pt-30">
                        <div class="row">
                            <div class="col-12">
                                <div class="cms-ttmn-star mb-10"><?php 
                                    saniga_star_rating([
                                        'rated'       => $value['star'],
                                        'text'        => $value['star_text'],
                                        'class'       => 'text-primary',
                                        'rated_class' => 'text-primary',
                                        'text_class'  => 'text-16 font-700 text-'.$settings['description_typo_color']
                                    ]);
                                ?></div>
                            </div>
                            <div class="col-12">
                                <div class="cms-ttmn-content">
                                    <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                                        echo esc_html($value['description']); 
                                    ?></div>
                                    <div class="row gutters-30">
                                        <?php 
                                            saniga_elementor_image_render($value, [
                                                'id'          => 'image',
                                                'custom_size' => '70',  
                                                'default_img' => $value['image']['url'],
                                                'class' => 'col-auto'
                                        ]); ?>
                                        <div class="col">
                                            <?php 
                                                if($settings['qicon_type'] === 'icon'):
                                                    saniga_elementor_icon_render($settings, [
                                                        'id'         => 'quote_icon',
                                                        'wrap_class' => 'cms-quote-icon',
                                                        'default_icon'    => [
                                                            'value'   => '',
                                                            'library' => 'cmsi'
                                                        ]
                                                    ] ); 
                                                elseif($settings['qicon_type'] === 'image'):
                                                    saniga_elementor_image_render($settings, [
                                                        'id'          => 'quote_image',
                                                        'class'       => 'cms-quote-icon cms-quote-image',
                                                        'default_img' => '/wp-content/themes/saniga/assets/images/icons/quote-right.png',
                                                        'custom_size' => '30x22'  
                                                    ]);
                                                endif; 
                                            ?>
                                            <div class="cms-ttmn-author pt-10">
                                                <div class="cms-ttmn-name cms-heading text-16 font-700 <?php echo 'text-'.$settings['description_typo_color'];?>"><?php echo $value['title'];?>,</div>
                                                <div class="cms-ttmn-subtitle text-13 <?php echo 'text-'.$settings['description_typo_color'];?>"><?php  echo $value['sub_title'];?></div>
                                            </div>
                                        </div>
                                    </div>
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
