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
<div <?php post_class('cms-post-archive cms-post-layout-1 clearfix'); ?>>
    <div class="clearfix">
        <?php 
            saniga_post_media([
                'thumbnail_size' => 'large',
                'wrap_class'     => '',
                'img_class'      => '',
                'after'          => '<div class="cms-media-meta cms-archive-media-meta absolute"><span class="cms-post-grid-date absolute cms-badge cms-badge-1 text-center font-700 lh-19 pt-10">'.
                    saniga_post_date([
                        'post_id'     => $post->ID,
                        'echo'        => false,
                        'show_icon'   => false,
                        'class'       => 'badge-date', 
                        'date_format' => 'j'  
                    ]).
                    saniga_post_date([
                        'post_id'     => $post->ID,
                        'echo'        => false,
                        'show_icon'   => false,
                        'class'       => 'badge-month',
                        'date_format' => 'M'  
                    ]).'</span>'.
                    saniga_socials_share_default([
                        'echo'              => false, 
                        'class'             => '',
                        'show_share'        => saniga_get_opts( 'post_social_share_on', '0' ),   
                        'title'             => '',
                        'social_class'      => 'cms-socials bg-white cms-socials-layout-3',
                        'social_item_class' => 'circle',
                        'before'            => '',
                        'after'             => ''
                    ])
                .'</div>'
            ]);
        ?>
        <div class="<?php echo esc_attr($class);?>"><?php
            saniga_post_meta([
                'show_icon' => false,
                'show_date' => false,
                'class'     => 'mb-20',
                'separator' => '<div class="col-auto"><span class="cms-meta-separator"></span></div>'
            ]);
            saniga_post_title(['class' => 'text-24 mb-20']);
            saniga_post_excerpt();
            saniga_post_link_pages(['class' => 'pt-20 pb-10']);
            saniga_post_readmore(['wrap_class' => 'mt-20', 'class' => 'cms-blog-readmore d-inline-block']);
        ?></div>
    </div>
</div>