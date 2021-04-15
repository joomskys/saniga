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
    $padding_class = 'cms-post-has-thumbnail p-20 p-lg-30 p-xl-50';
} else {
    $padding_class = 'p-20 p-lg-30 p-xl-50';
}
if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor( $id ) ) {
        $post_content_classes = 'single-elementor-content ml-n20 mr-n20';
    }
} else {
    $post_content_classes = '';
}
?>
<div <?php post_class('cms-single-post cms-post-layout-1'); ?>>
    <div class="cms-shadow-1">
        <?php 
            saniga_post_media([
                'show_media'     => saniga_get_opts('post_feature_image_on', '1'),     
                'thumbnail_size' => $thumbnail_size,
                'wrap_class'     => '',
                'img_class'      => '',
                'show_link'      => false,   
                //'media_content'  => false,
                'after'          => '<div class="cms-media-meta cms-single-media-meta absolute"><span class="cms-post-grid-date absolute cms-badge cms-badge-1 text-center font-700 lh-19 pt-10">'.
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
        <div class="<?php echo esc_attr($padding_class);?> cms-bottom-divider">
            <?php
                saniga_post_meta([
                    'show_date'   => saniga_get_opts('post_date_on','1'),
                    'show_cat'    => saniga_get_opts('post_categories_on','1'),
                    'show_author' => saniga_get_opts('post_author_on','1'),
                    'show_cmt'    => saniga_get_opts('post_comments_on','1'),
                    'show_icon'   => false,
                    'class'       => 'mt-n15',
                    'separator' => '<div class="col-auto"><span class="cms-meta-separator"></span></div>'
                ]);
                saniga_post_title(['class' => 'text-24 text-lg-40 lh-lg-50 font-700 pt-15 mb-30']);
            ?>
            <div class="overflow-hidden">
                
                <div class="cms-post-content mb-30 text-17 clearfix <?php echo esc_attr($post_content_classes);?>"><?php
                    the_content();
                ?></div>
                <?php 
                    // post page
                    saniga_post_link_pages(['class' => 'mb-30']);
                ?>
                <div class="cms-post-tags-share row gutters-20 gutters-grid justify-content-between empty-none"><?php
                    // Post tag
                    // param: show_tag, title
                    saniga_post_tagged_in([
                        'show_tag'  => saniga_get_opts( 'post_tags_on', '1' ), 
                        'title'     => '<div class="col-12 cms-heading font-700 text-14">'.esc_html__('Post Tags:','saniga').'</div>',
                        'style'     => 'tagcloud', 
                        'separator' => '',
                        'class'     => 'col'
                    ]);
                    // post share
                    // param: show_share, class, title, social_class
                    saniga_socials_share_default([
                        'class'             => 'gutters-10 gutters-grid justify-content-between',
                        'show_share'        => saniga_get_opts( 'post_social_share_on', '0' ),   
                        'title'             => '<div class="col-12"><div class="cms-heading text-14 font-700">'.esc_html__('Share:','saniga').'</div></div>',
                        'social_class'      => 'cms-socials cms-socials-layout-4',
                        'social_item_class' => 'circle',
                        'before'            => '<div class="col-12 col-md-auto">',
                        'after'             => '</div>'
                    ]);
                ?></div>
            </div>
        </div>
    </div>
    <?php
        // Next/Preview Post link
        // param: show_nav, class, prev_title, next_title
        saniga_posts_nav_link([
            'show_nav'       => saniga_get_opt('post_nav_link_on', '1'),
            'show_title'     => false,
            'show_thumbnail' => false,
            'prev_title'     =>  esc_html__('Prev', 'saniga'). ' ' .get_post_type(),
            'next_title'     =>  esc_html__('Next', 'saniga'). ' ' . get_post_type(),
            'prev_icon'      => is_rtl() ? 'cmsi-arrow-right' : 'cmsi-arrow-left',
            'next_icon'      => is_rtl() ? 'cmsi-arrow-left' : 'cmsi-arrow-right',
            'class'          => 'gutters-grid',
            'thumbnail_size' => '90x67',
            'before'         => '<div class="overflow-hidden p-tb-40">',
            'after'          => '</div>' 
        ]);
    ?>
    <?php
        // Author info
        // param: show_author, class
        saniga_post_author_info([
            'class'       => 'gutters-30 gutters-grid',
            'title_class' => 'text-20 mb-10 mt-n5',
            'show_author' => saniga_get_opt('post_author_info_on', '0'),
            'before'      => '<div class="cms-shadow-1 p-20 p-lg-30 p-xl-50">',
            'after'       => '</div>' 
        ]);
        // Related post
        // param: class, show_related, title, posts_per_page, post_tyle
        saniga_related_post([
            'class'  => '',
            'before' => '<div class="cms-shadow-1 mt-40 p-20 p-lg-30 p-xl-50 clearfix">',
            'after'  => '</div>' 
        ]);
    ?>
</div>