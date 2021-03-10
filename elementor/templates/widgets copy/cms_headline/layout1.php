<?php
    $html_id   = etc_get_element_id($settings);
    $tax       = array();
    $source    = $widget->get_setting('source_'.$settings['post_type']);
    $orderby   = $widget->get_setting('orderby');
    $order     = $widget->get_setting('order');
    $limit     = $widget->get_setting('limit');

    extract(etc_get_posts_of_grid($settings['post_type'], [
        'source'   => $source,
        'orderby'  => $orderby,
        'order'    => $order,
        'limit'    => $limit,
    ]));

    if($settings['thumbnail_size'] != 'custom'){
        $img_size = $settings['thumbnail_size'];
    }
    elseif(!empty($settings['thumbnail_custom_dimension']['width']) && !empty($settings['thumbnail_custom_dimension']['height'])){
        $img_size = $settings['thumbnail_custom_dimension']['width'] . 'x' . $settings['thumbnail_custom_dimension']['height'];
    }
    else{
        $img_size = 'full';
    }

    // Nav & Dots left-side / right-side
    $_arrow_pos = '';
    if($settings['arrows_pos'] === 'left-side2'){
        $_arrow_pos = 'order-lg-first';
    }
?>
<div class="row">
    <?php 
        saniga_elementor_icon_render($settings,[
            'id'         => $settings['heading_icon'],
            'loop'       => true,  
            'tag'        => 'span',
            'wrap_class' => 'col-auto',
            'class'      => '',
        ]);
    ?>
    <div class="col empty-none"><?php 
        echo esc_html($settings['heading_text']); 
    ?></div>
</div>
<div class="cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="row justify-content-between align-items-center">
        <div class="col-12 col-xl-7">
            <div class="cms-slick-slider-wrap">
                <div <?php saniga_slick_slider_settings($widget); ?>>
                    <?php
                    switch ($settings['source_type']) {
                        case 'custom':
                                foreach ($settings['custom_content'] as $value): 
                                    ?>
                                    <div class="cms-headline-item cms-slick-slide slick-slide  font-700" style="padding: <?php echo esc_attr($settings['gap']/2);?>px;">
                                        <?php 
                                            echo esc_html($value['title']); 
                                            saniga_elementor_hyperlink_render($value, [
                                                'tag'          => 'span',
                                                'link_type'    => $value['link_type'],
                                                'link_text'    => $value['link_text'],
                                                'wrap_class'   => '',    
                                                'class'        => 'btn-underline',
                                                'default_icon' => [
                                                    'value'   => 'cmsi-long-arrow-right-1',
                                                    'library' => 'cmsi'
                                                ],
                                                'icon_align'   => 'right', 
                                            ]);
                                        ?>
                                    </div>
                                <?php 
                                endforeach;
                            break;
                        
                        default:
                            foreach ($posts as $post):
                                $img_id       = get_post_thumbnail_id( $post->ID );
                                $img          = etc_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $img_size,
                                    'class'      => 'cms-radius-4',
                                ) );
                                $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="cms-slick-item cms-slick-slide slick-slide" style="padding: <?php echo esc_attr($settings['gap']/2);?>px;">
                                <div class="cms-slick-item-inner">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false) && $settings['show_thumbnail'] == 'true') : ?>
                                        <div class="cms-featured">
                                            <div class="cms-featured-inner relative">
                                                <div class="post-image cms-post-image">
                                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php printf('%s', $thumbnail); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="cms-headline-title text-ellipsis">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_trim_words(get_the_title($post->ID), 400 , ''); ?>&nbsp;&nbsp;<span class="cmsi-long-arrow-<?php echo is_rtl() ? 'left' : 'right-1'; ?>"></span></a>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; 
                        break;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3 <?php echo esc_attr($_arrow_pos);?> text-end"><div class="d-inline-block pt-15"><?php
            saniga_slick_slider_arrows_side2($settings);
        ?></div></div>
    </div>
    <?php 
        saniga_slick_slider_dots($settings); 
        saniga_slick_slider_arrows($settings);
        saniga_slick_slider_arrows_side($settings);
        saniga_slick_slider_arrows_bottom($settings);
    ?>
</div>