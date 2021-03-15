<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Saniga
 */
if(has_post_thumbnail() || saniga_configs('default_post_thumbnail') === '1'){
    $class = 'cms-has-post-thumbnail pt-35';
} else {
    $class = 'cms-no-post-thumbnail';
}
?>
<div <?php post_class('cms-post-archive clearfix'); ?>>
    <div class="clearfix">
        <?php 
            saniga_post_media([
                'thumbnail_size' => 'large',
                'wrap_class'     => '',
                'img_class'      => ''
            ]);
        ?>
        <div class="<?php echo esc_attr($class);?>"><?php
            saniga_post_meta([
                'show_icon' => false,
                'class'     => 'mb-20',
                'separator' => '<div class="col-auto"><span class="cms-meta-separator"></span></div>'
            ]);
            saniga_post_title(['class' => 'text-24 mb-20']);
            saniga_post_excerpt();
            saniga_post_link_pages();
            saniga_post_readmore(['wrap_class' => 'mt-20', 'class' => 'cms-blog-readmore d-inline-block']);
        ?></div>
    </div>
</div>