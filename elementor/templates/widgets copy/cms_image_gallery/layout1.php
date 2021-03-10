<?php
if ( ! $settings['wp_gallery'] ) {
    return;
}

$col_xl = 12 / intval($widget->get_setting('gallery_col', 4));
$col_lg = 12 / intval($widget->get_setting('gallery_col_tablet', 3));
$col_sm = 12 / intval($widget->get_setting('gallery_col_mobile', 2));

$thumbnail_size = $widget->get_setting('thumbnail_size', '');
$thumbnail_custom_dimension = $widget->get_setting('thumbnail_custom_dimension', '');
$randGallery = $settings['wp_gallery'];
if ($settings['gallery_rand'] == 'rand'){
    shuffle($randGallery);
}
?>

<div class="cms-image-gallery clearfix">
    <div class="row cms-images-light-box" style="margin: <?php echo esc_attr($settings['gap']/-2);?>px;">
        <?php
        if ($thumbnail_size != 'custom') {
            $img_size = $thumbnail_size;
        } elseif (!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])) {
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        } else {
            $img_size = 'full';
        }
        foreach ( $randGallery as $key => $value):
            $image = isset($value['id']) ? $value['id'] : '';
            $image_title = get_the_title($image);
            $img = etc_get_image_by_size( array(
                'attach_id'  => $image,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            $item_class = "cms-gallery-item cms-overlay-wrap cms-overlay-zoom-in col-{$col_sm} col-md-{$col_lg} col-lg-{$col_xl}";
            ?>
            <div class="<?php echo esc_attr($item_class); ?>" style="padding: <?php echo esc_attr($settings['gap']/2);?>px;">
                <div class="grid-item-inner cms-radius-8 overflow-hidden relative">
                    <span class="hover-effect cms-over">
                        <?php if(!empty($image)) : ?>
                            <?php printf('%s', $thumbnail); ?>
                        <?php endif; ?>
                    </span>
                    <div class="gallery-item-content">
                        <a class="cms-galleries-light-box cms-overlay-content d-flex align-items-center justify-content-center text-white text-30" data-elementor-open-lightbox="no" href="<?php echo esc_url(wp_get_attachment_image_url($image, 'full')); ?>" title="<?php echo esc_attr($image_title)?>">
                                <span class="cmsi-eye"></span>
                        </a>
                    </div>
                </div>
                <div class="image-caption empty-none"><?php echo wp_get_attachment_caption($image);?></div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>