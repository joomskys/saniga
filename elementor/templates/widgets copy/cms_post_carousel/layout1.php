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

    $link_attrs = [];
    if ( ! empty( $settings['other_link']['url'] ) ) {
        $link_attrs[] = 'href="'.$settings['other_link']['url'].'"';
    }
    if ( ! empty($settings['other_link']['is_external'] )) {
        $link_attrs[] = 'target="_blank"';
    }
    if ( ! empty($settings['other_link']['nofollow'] )) {
        $link_attrs[] = 'rel="nofollow"';
    }
    if( ! empty($settings['other_link']['custom_attributes'])){
        $custom_attributes = explode('|', $settings['other_link']['custom_attributes']);
        foreach ($custom_attributes as $atts_value) {
            $_custom_attributes = explode(':', $atts_value);
            $link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
        }
    }
?>
<div class="cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="cms-slick-slider-wrap">
        <div <?php saniga_slick_slider_settings($widget); ?>>
            <?php
                $settings['tax'] = $tax;
                saniga_get_post_grid($posts, $settings, [
                    'item_class' => 'cms-slick-slide slick-slide'
                ]); 
            ?>
        </div>
    </div>
    <?php 
    saniga_slick_slider_dots($settings); 
    saniga_slick_slider_arrows($settings);
    saniga_slick_slider_arrows_side($settings);
    if(!empty($settings['other_text'])) { 
    ?>
        <div class="row empty-none">
            <div class="col-12 col-md-6 col-lg-8 empty-none"><?php saniga_slick_slider_arrows_bottom($settings); ?></div>
            <div class="col-md-6 col-lg-4 order-md-first other-text font-700 <?php echo 'text-'.$settings['other_text_color'];?> pt-30">
                <?php 
                    echo esc_html($settings['other_text']); 
                    if(!empty($settings['other_link_text'])){
                        ?>
                            <a data-other-link="other-link" <?php echo implode(' ', $link_attrs); ?>><?php echo esc_html($settings['other_link_text']); ?> <span class="cmsi-arrow-right2 ml-5 text-12"></span></a>
                        <?php
                    }
                ?>
            </div>
        </div>
    <?php } else {
        saniga_slick_slider_arrows_bottom($settings);
    } ?>
</div>