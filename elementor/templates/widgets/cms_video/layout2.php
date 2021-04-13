<?php
$img_classes = '';
// wrap
$widget->add_render_attribute( 'wrap', 'class', 'cms-video-player relative cms-video-play-btn-'.$widget->get_setting('video_play_btn_position', 'center-center'));
if($settings['video_image_as_background'] === 'true'){
    $default_img = get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/thumb-2.jpg';
    $bg_img = saniga_get_image_url_by_size([
        'id'            => $settings['video_image_overlay']['id'],
        'size'          => 'full',
        'default_thumb' => true,
        'default_img'   => $default_img
    ]);
    $widget->add_render_attribute( 'wrap', 'class', 'w-100' );
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url("'.$bg_img.'");' );
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
    <div class="relative">
        <?php 
        saniga_elementor_image_render($settings, [
            'id'          => 'video_image_overlay',
            'size'        => 'video_image_overlay_size',
            'class'       => 'video-bg rtl-flip w-100 '.$img_classes,
            'default_img' => get_template_directory_uri() . '/elementor/templates/widgets/cms_video/layout-images/thumb-2.png'
        ]);
        ?>
        <?php if(!empty($video_link)) : ?>
            <div class="btn-video-wrap">
                <?php switch ($widget->get_setting('play_icon_style','4')) {
                    case '1':
                    ?>
                        <a class="cms-ripple cms-popup text-center" href="<?php echo esc_url($video_link); ?>">
                            <?php saniga_elementor_icon_render($settings,[
                                'id'           => 'play_icon_icon'
                            ]); ?>
                        </a>
                    <?php 
                        break;
                    case '2':
                    ?>
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
                    <?php 
                        break;
                    case '5':
                    ?>
                        <a class="cms-popup btn btn-fill btn-accent btn-hover-secondary btn-xl" href="<?php echo esc_url($video_link); ?>">
                            <span class="cms-btn-content">
                                <?php saniga_elementor_icon_render($settings,[
                                    'id'           => 'play_icon_icon',
                                    'wrap_class'   => 'cms-btn-icon cms-align-icon-left rtl-flip'
                                ]); ?>
                                <span class="cms-btn-text"><?php echo esc_html($widget->get_setting('play_icon_text', 'Watch Video!')); ?></span>
                            </span>
                        </a>
                    <?php 
                        break; 
                        case '6':
                    ?>
                        <a class="cms-popup btn btn-fill btn-secondary btn-hover-accent btn-xl" href="<?php echo esc_url($video_link); ?>">
                            <span class="cms-btn-content">
                                <?php saniga_elementor_icon_render($settings,[
                                    'id'           => 'play_icon_icon',
                                    'wrap_class'   => 'cms-btn-icon cms-align-icon-left rtl-flip'
                                ]); ?>
                                <span class="cms-btn-text"><?php echo esc_html($widget->get_setting('play_icon_text', 'Watch Video!')); ?></span>
                            </span>
                        </a>
                    <?php 
                        break;    
                    default:
                    ?>
                        <a class="cms-ripple cms-popup  text-center" href="<?php echo esc_url($video_link); ?>">
                            <?php saniga_elementor_icon_render($settings,[
                                'id' => 'play_icon_icon'
                            ]); ?>
                        </a>
                    <?php
                        break;
                } ?>
            </div>
        <?php endif; ?>
    </div>
</div>