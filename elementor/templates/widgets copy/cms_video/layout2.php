<?php
$img_classes = '';
// wrap
$widget->add_render_attribute( 'wrap', 'class', 'cms-video-player relative cms-video-play-btn-'.$widget->get_setting('video_play_btn_position', 'top-left'));
if($settings['video_image_as_background'] === 'true'){
    $widget->add_render_attribute( 'wrap', 'class', 'w-100' );
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url("'.$settings['video_image_overlay']['url'].'");' );
    // Images
    $img_classes = 'opacity-0';
}
// Gradient
$widget->add_render_attribute( 'gradient', 'class', 'cms-overlay cms-gradient-'.$widget->get_setting('gradient_overlay', ''));
$widget->add_render_attribute( 'gradient', 'style', 'background-color:'.$widget->get_setting('gradient_bg_color','rgba(9,29,62,0.05)'));
// video 
$video_link = $widget->get_setting('video_link', 'https://www.youtube.com/watch?v=XHOmBV4js_E');

// Play Icon
$widget->add_render_attribute( 'play-icon', 'class', 'cms-play-video-icon '.$widget->get_setting('gradient_overlay', ''));
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <?php 
    if($settings['gradient_overlay'] != ''){
    ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'gradient' )); ?>></div>
    <?php   } ?>
    <div class="row">
        <div class="cms-video-heading col-11 col-xl-52 bg-white pb-20 pb-lg-90 p-lr-xl-0">
            <div class="cms-video-title cms-heading text-40 lh-55 empty-none"><?php echo esc_html($settings['heading_text']); ?></div>
            <div class="cms-video-sub-title text-16 lh-27 empty-none"><?php echo wpautop($settings['description_text']); ?></div>
        </div>
        <div class="col-12 align-self-end">
            <div class="row justify-content-between relative">
                <?php
                    saniga_elementor_image_render($settings, [
                        'id'     => 'video_image_overlay',
                        'size'   => 'video_image_overlay_size',
                        'class'  => 'video-bg rtl-flip '.$img_classes,
                        'before' => '<div class="col-xl-9 ml-auto">',
                        'after'  => '</div>'
                    ]);
                ?>
                <?php 
                    if(!empty($video_link)) : ?>
                    <div class="btn-video-wrap">
                        <?php if($settings['video_play_btn_style'] === 'icon' && $settings['play_icon_style'] === '1' ) : ?>
                            <a class="cms-ripple cms-popup" href="<?php echo esc_url($video_link); ?>">
                                <?php saniga_elementor_icon_render($settings,[
                                    'id'           => 'play_icon_icon',
                                    'default_icon' => [
                                        'value'   => 'cmsi-play',
                                        'library' => 'cmsi'
                                    ]
                                ]); ?>
                            </a>
                        <?php endif;
                            if($settings['video_play_btn_style'] === 'icon' && $settings['play_icon_style'] === '3' ) : ?>
                            <a class="cms-popup" href="<?php echo esc_url($video_link); ?>">
                                <?php 
                                etc_print_html('<span class="cms-text text-primary font-700">'.$widget->get_setting('play_icon_text', 'Watch Our Intro!').'</span>');

                                saniga_elementor_icon_render($settings,[
                                    'id'           => 'play_icon_icon',
                                    'tag'          => 'span', 
                                    'wrap_class'   => 'cms-ripple size-90 cms-ripple-accent',     
                                    'default_icon' => [
                                        'value'   => 'cmsi-play',
                                        'library' => 'cmsi'
                                    ]
                                ]); ?>
                            </a>
                        <?php endif; ?>
                        <?php if($settings['video_play_btn_style'] === 'icon' && $settings['play_icon_style'] === '2') : ?>
                            <a class="cms-popup" href="<?php echo esc_url($video_link); ?>">
                                <?php
                                    saniga_elementor_image_render($settings,[
                                        'id'          => 'play_icon_img',
                                        'size'        => '',
                                        'custom_size' => '100',
                                        'img_class'   => 'cms-radius-8'
                                    ]);
                                    saniga_elementor_icon_render($settings,[
                                        'id'           => 'play_icon_icon',
                                        'wrap_class'   => 'cms-ripple size-42 text-primary',
                                        'default_icon' => [
                                            'value'   => 'cmsi-play',
                                            'library' => 'cmsi'
                                        ]
                                    ]);
                                    etc_print_html('<div class="text-center font-700 text-primary p-tb-15 lh-19">'.$widget->get_setting('play_icon_text', 'Watch Our Intro!').'</div>');
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php saniga_elementor_button_render($settings, $args = ['prefix' => 'video_', 'custom_link' => $video_link]); ?>
                    </div>
                    <?php endif; 
                ?>
            </div>
        </div>
    </div>
</div>