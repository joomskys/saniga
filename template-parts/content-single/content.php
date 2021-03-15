<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Soapee
 */
$sidebar = saniga_sidebar_position();
if(in_array($sidebar, ['0','none', 'bottom'])){
    $thumbnail_size = 'post-thumbnail';
} else {
    $thumbnail_size = 'large';
}
if(has_post_thumbnail() || saniga_configs('default_post_thumbnail') === '1'){
    $padding_class = 'cms-post-has-thumbnail pt-20';
} else {
    $padding_class = '';
}
?>
<div <?php post_class('cms-single-post cms-post-layout-1'); ?>>
    <?php 
        saniga_post_media([
            'show_media'     => saniga_get_opts('post_feature_image_on', '1'),     
            'thumbnail_size' => $thumbnail_size,
            'wrap_class'     => '',
            'img_class'      => '',
            //'media_content'  => false,
            'after'          => '<span class="cms-post-grid-date absolute cms-badge cms-badge-1 text-center font-700 lh-19 pt-10">'.
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
                ]).
                saniga_socials_share_default([
                    'echo'         => false, 
                    'class'        => '',
                    'show_share'   => saniga_get_opts( 'post_social_share_on', '0' ),   
                    'title'        => '',
                    'social_class' => 'cms-socials cms-social-layout-3',
                    'before'       => '<div class="bg-white">',
                    'after'        => '</div>'
                ])
            .'</span>'
        ]);
    ?>
    <div class="<?php echo esc_attr($padding_class);?>">
        <?php
            saniga_post_meta([
                'show_date'   => '0',
                'show_cat'    => saniga_get_opts('post_categories_on','1'),
                'show_author' => saniga_get_opts('post_author_on','1'),
                'show_cmt'    => saniga_get_opts('post_comments_on','1'),
                'show_icon'   => false,
                'class'       => '',
                'separator' => '<div class="col-auto"><span class="cms-meta-separator"></span></div>'
            ]);
            saniga_post_title(['class' => 'text-24 text-lg-40 lh-lg-50 font-700 pt-15 mb-30']);
        ?>
        <div class="cms-post-content mb-30 clearfix"><?php
            the_content();
        ?></div>
        <?php 
            // post page
            saniga_post_link_pages();
        ?>
        <?php
            // post share
            // param: show_share, class, title, social_class
            saniga_socials_share_default([
                'class'        => 'gutters-10 gutters-grid justify-content-between',
                'show_share'   => saniga_get_opts( 'post_social_share_on', '0' ),   
                'title'        => '<div class="col-auto"><div class="cms-heading font-700">'.esc_html__('Share This Article','saniga').'</div></div>',
                'social_class' => 'cms-socials cms-social-layout-3',
                'before'       => '<div class="bdr-2 bdr-solid bdr-accent p-20 mt-30">',
                'after'        => '</div>'
            ]);
            // Post tag
            // param: show_tag, title
            saniga_post_tagged_in([
                'show_tag'  => saniga_get_opts( 'post_tags_on', '1' ), 
                'title'     => '<div class="cms-heading font-700">'.esc_html__('Tags:','saniga').'</div>',
                'style'     => 'custom', 
                'separator' => ', ',
                'class'     => 'mt-30'                                                                            
            ]);
        ?>
    </div>
    <?php
        // Next/Preview Post link
        // param: show_nav, class, prev_title, next_title
        saniga_posts_nav_link([
            'show_nav'       => saniga_get_opt('post_nav_link_on', '1'),
            'class'          => 'gutters-grid',
            'thumbnail_size' => '90x67',
            'before'         => '<div class="mt-25 overflow-hidden p-tb-30 bdr-tb-1 bdr-lr-0 bdr-main bdr-solid">',
            'after'          => '</div>' 
        ]);

        // Author info
        // param: show_author, class
        saniga_post_author_info([
            'class'       => 'gutters-30 gutters-grid',
            'title_class' => 'text-18 mb-10 mt-n8',
            'show_author' => saniga_get_opt('post_author_info_on', '0'),
            'before'      => '<div class="mt-40 pt-40 p-lr-40 pb-30 bg-light-accent cms-radius-8 clearfix overflow-hidden cms-bottom-divider cms-bottom-divider-accent">',
            'after'       => '</div>' 
        ]);
        // Related post
        // param: class, show_related, title, posts_per_page, post_tyle
        saniga_related_post([
            'class'  => '',
            'before' => '<div class="mt-30 clearfix">',
            'after'  => '</div>' 
        ]);
    ?>
</div>