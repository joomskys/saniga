<?php
/**
 * Custom template tags for this theme.
 *
 * @package Saniga
 */

/**
 * Page loading
 **/
if(!function_exists('saniga_page_loading')){
    function saniga_page_loading()
    {
        $page_loading = saniga_get_opt( 'show_page_loading', false );

        if($page_loading) { ?>
            <div id="cms-loadding" class="cms-loader">
                <div class="loading-spinner">
                    <div class="loading-dot1"></div>
                    <div class="loading-dot2"></div>
                </div>
            </div>
        <?php }
    }
}
/*
 * Content area css class
*/
if(!function_exists('saniga_content_css_class')){
    function saniga_content_css_class($args = []){
        $args = wp_parse_args($args,[
            'content_col'  => 'archive_content_col',
            'sidebar_pos'  => 'archive_sidebar_pos',
            'class'        => ''
        ]);
        $classes = [
            'cms-content-area'
        ];
        $sidebar            = saniga_get_sidebar();
        $sidebar_position   = saniga_sidebar_position(['sidebar_pos' => $args['sidebar_pos']]);
        $content_grid_class = saniga_get_opts($args['content_col'], saniga_configs('blog')['archive_content_col']);

        if( $sidebar_position === 'bottom' || $sidebar_position === '0' ){
            $classes[] = 'col-12';
        } else {
            if($sidebar && ('none' !== $sidebar_position || 'center' == $sidebar_position)){
                $classes[] = 'col-lg-'.$content_grid_class;
                if($sidebar_position == 'left') $classes[] = 'order-lg-last';
                if($sidebar_position == 'center') $classes[] = 'offset-lg-2';
            } else {
                $classes[] = 'col-12';
            }
        }
        $classes[] = $args['class'];
        echo trim(implode(' ', $classes));
    }
}

// Post link pages
if(!function_exists('saniga_post_link_pages')){
    add_filter('wp_link_pages_args', 'saniga_wp_link_pages_args');
    function saniga_wp_link_pages_args($args){
        $args['before']      = '';
        $args['after']       = '';
        $args['link_before'] = '<span>';
        $args['link_after']  = '</span>';
        return $args;   
    }
    function saniga_post_link_pages($args = []){
        $args = wp_parse_args($args, [
            'class' => ''
        ]);
    ?>
    <div class="<?php echo trim(implode(' ', ['navigation cms-page-links clearfix empty-none', $args['class']])); ?>"><?php 
        wp_link_pages(); 
    ?></div>
    <?php
    }
}
// Post title
if ( ! function_exists( 'saniga_post_title' ) ) :
    /**
     * Print post title
     *
     * @param  integer $length
     */
    function saniga_post_title($args = []){
        $args = wp_parse_args($args, [
            'tag'         => 'div',
            'sticky_icon' => '<span class="cmsi-thumbtack"></span>',
            'show_link'   => true,
            'class'       => ''
        ]);
        ?>
        <<?php echo esc_attr($args['tag']); ?> class="<?php echo trim(implode(' ', ['cms-heading cms-post-title', $args['class']]));?>"><?php 
            if($args['show_link'] && !is_single() ) { ?>
                <a href="<?php echo esc_url( get_permalink()); ?>"><?php 
            }
                if(is_sticky()) { echo wp_kses_post($args['sticky_icon']).'&nbsp;&nbsp;'; }
                the_title();
            if($args['show_link']) { ?>
                </a><?php 
            } ?></<?php echo esc_attr($args['tag']); ?>>
    <?php
    }
endif;

if ( ! function_exists( 'saniga_post_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function saniga_post_excerpt($args = []) {
        $args = wp_parse_args($args, [
            'class'  => '',
            'length' => saniga_get_opt('archive_excerpt_length', '55'),
            'more'   => ''
        ]);
    ?>
    <div class="<?php echo trim(implode(' ', ['cms-post-excerpt', $args['class']])) ?>">
        <?php 
            $cms_the_excerpt = get_the_excerpt();
            if(!empty(get_the_excerpt())) {
                echo wp_trim_words( $cms_the_excerpt, $args['length'], $args['more'] );
            } else {
                echo saniga_get_the_excerpt( $args['length'], $args['more']);
            }
        ?>
    </div>
    <?php
    }
endif;

if ( ! function_exists( 'saniga_post_readmore' ) ) :
    /**
     * Print post Readmore.
     *
     * @param 
     */
    function saniga_post_readmore($args = []){
        $args = wp_parse_args($args, [
            'wrap_class' => '',
            'class'      => '',
            'text'       => esc_html__('Read More', 'saniga'),
            'icon'       => 'cmsi-arrow-circle-right',
            'icon_rtl'   => 'cmsi-arrow-circle-left',
            'icon_pos'   => 'left'
        ]);
       ?>
       <div class="<?php echo trim(implode(' ', ['cms-post-readmore', $args['wrap_class']]));?>">
            <a href="<?php echo esc_url( get_permalink()); ?>" class="<?php echo trim(implode(' ', ['cms-readmore', $args['class']]));?>">
                <span class="cms-btn-content">
                    <span class="cms-btn-icon cms-align-icon-<?php echo esc_attr($args['icon_pos']);?>">
                        <span aria-hidden="true" class="<?php echo is_rtl() ? esc_attr($args['icon_rtl']) : esc_attr($args['icon']);?>"></span>
                    </span>
                    <span class="cms-btn-text"><?php echo esc_html($args['text']); ?></span>
                </span>        
            </a>
        </div>
       <?php 
    }
endif;

/**
 * Prints post edit link when applicable
 */
if(!function_exists('saniga_post_edit_link')){
    function saniga_post_edit_link()
    {
        edit_post_link(
            sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    esc_html__( 'Edit', 'saniga' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<div class="cms-post-edit-link"><span class="cmsi-edit"></span>',
            '</div>'
        );
    }
}

/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function saniga_posts_pagination( $query = null, $ajax = false )
{
    if($ajax){
        add_filter('paginate_links', 'saniga_ajax_paginate_links');
    }

    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = $query->get( 'paged', '' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = $query->get( 'page', '' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $paginate_links_args = array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => saniga_pagination_prev_text(),
        'next_text' => saniga_pagination_next_text(),
    );
    if($ajax){
        $paginate_links_args['format'] = '?page=%#%';
    }
    $links = paginate_links( $paginate_links_args );
    if ( $links ):
    ?>
    <nav class="navigation posts-pagination <?php echo esc_attr($ajax?'ajax':''); ?>">
        <?php
            printf('%s',$links);
        ?>
    </nav>
    <?php
    endif;
}
if(!function_exists('saniga_pagination_prev_text')){
    function saniga_pagination_prev_text(){
        return '<span class="nav-prev-icon"></span>';
    }
}
if(!function_exists('saniga_pagination_next_text')){
    function saniga_pagination_next_text(){
        return '<span class="nav-next-icon"></span>';
    }
}

/**
 * List socials share for post.
 * <a class="pin-social pinterest hover-effect" title="Pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo esc_attr($pinterestimage[0]); ?>&description=<?php the_title(); ?>"><i class="cmsi-pinterest"></i></a>
                <a class="it-social instagram hover-effect" title="Instagram" target="_blank" href="https://instagram.com/<?php echo saniga_get_opt('instagram_user');?>"><i class="cmsi-instagram"></i></a>
 */
if(!function_exists('saniga_socials_share_default')){
    function saniga_socials_share_default($args = []) {
        $args = wp_parse_args($args, [
            'echo'              => true, 
            'show_share'        => '1',
            'class'             => '',
            'title'             => '<div class="cms-post-share-title cms-heading col">'.esc_html__('Share:','saniga').'</div>',
            'social_class'      => '',
            'social_item_class' => '',
            'before'            => '',
            'after'             => '',
            'icon_facebook'     => 'cmsi-facebook-1',
            'icon_twitter'      => 'cmsi-twitter-1',
            'icon_linkedin'     => 'cmsi-linkedin-1',
            'icon_instagram'    => '',
            'icon_pinterest'    => ''
        ]);
        if($args['show_share'] != '1') return;
        $pinterestimage = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        ob_start();
            printf('%s', $args['before']);
        ?>
            <div class="<?php echo trim(implode(' ',['cms-post-share row align-items-center',  $args['class']]));?>">
                <?php if(!empty($args['title'])) printf('%s', $args['title']); ?>
                <div class="<?php echo trim(implode(' ',['col-auto cms-social',  $args['social_class']]));?>">
                    <div class="row gutters-10 gutters-grid">
                        <?php if(!empty($args['icon_facebook'])) { ?>
                        <div class="cms-social cms-social-item col-auto">
                            <a class="<?php echo esc_attr($args['social_item_class']);?>" title="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"><i class="<?php echo esc_attr($args['icon_facebook']) ?>"></i></a>
                        </div>
                        <?php } if(!empty($args['icon_twitter'])) { ?>
                        <div class="cms-social cms-social-item col-auto">
                            <a class="<?php echo esc_attr($args['social_item_class']);?>" title="Twitter" target="_blank" href="https://twitter.com/intent/tweet?original_referer=<?php echo urldecode(home_url('/')); ?>&url=<?php echo urlencode(get_permalink()); ?>&text=<?php the_title();?>&via=<?php echo saniga_get_opt('twitter_user', 'joomskys');?>"><i class="<?php echo esc_attr($args['icon_twitter']) ?>"></i></a>
                        </div>
                        <?php } if(!empty($args['icon_linkedin'])) { ?>
                        <div class="cms-social cms-social-item col-auto">
                            <a class="<?php echo esc_attr($args['social_item_class']);?>" title="Linkedin" target="_blank" href="https://www.linkedin.com/cws/share?url=<?php echo urlencode(get_permalink());?>"><i class="<?php echo esc_attr($args['icon_linkedin']) ?>"></i></a>
                        </div>
                        <?php } if(!empty($args['icon_instagram'])) { ?>
                            <div class="cms-social cms-social-item col-auto">
                                <a class="<?php echo esc_attr($args['social_item_class']);?>" title="Instagram" target="_blank" href="https://instagram.com/<?php echo saniga_get_opt('instagram_user');?>"><i class="<?php echo esc_attr($args['icon_instagram']) ?>"></i></a>
                            </div>
                        <?php } if(!empty($args['icon_pinterest'])) { ?>
                            <div class="cms-social cms-social-item col-auto">
                                <a class="<?php echo esc_attr($args['social_item_class']);?>" title="Pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&media=<?php echo esc_attr($pinterestimage); ?>&description=<?php the_title(); ?>"><i class="<?php echo esc_attr($args['icon_pinterest']) ?>"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
            printf('%s', $args['after']);

        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}

/**
 * Post Author Info
****/
if(!function_exists('saniga_post_author_info')){
    function saniga_post_author_info($args = []){
        $args = wp_parse_args($args,[
            'class'       => '',
            'title_class' => '',
            'show_author' => saniga_get_opt('post_author_info_on','0'),
            'before'      => '',
            'after'       => ''  
        ]);
        if($args['show_author'] != '1' || get_the_author_meta( 'description' ) == '' ) return;
        printf('%s', $args['before']);
    ?>
        <div class="<?php echo trim(implode(' ', ['entry-author-info', $args['class']]));?>">
            <div class="cms-post-author row text-center text-md-start">
                <div class="cms-post-author-avatar col-12 col-md-auto mb-20 mb-md-0">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), '120', '', esc_html__('Saniga', 'saniga'), [
                            'width' => '120',
                            'height' => '120'
                        ] ); ?>
                    </div>
                <div class="cms-post-author-description col"><?php 
                    echo '<div class="cms-post-author-title cms-heading '.$args['title_class'].'">'.get_the_author().'</div>';
                    echo '<div class="cms-post-author-description">'.get_the_author_meta( 'description' ).'</div>';
                    saniga_get_user_social([
                        'class'             => 'cms-socials-layout-5 pt-15',
                        'social_item_class' => 'circle'
                    ]); 
                ?></div>
            </div>
        </div>
    <?php 
        printf('%s', $args['after']);
    }
}
/**
 * Single  Next/Prev Link
*/
if(!function_exists('saniga_posts_nav_link')) { 
    function saniga_posts_nav_link($args = []){
        $args = wp_parse_args($args, [
            'show_nav'       => '1',
            'show_thumbnail' => '1',
            'thumbnail_size' => '80',
            'show_title'     => '1',
            'prev_title'     =>  esc_html__('Previous', 'saniga'). ' ' .get_post_type(),
            'next_title'     =>  esc_html__('Next', 'saniga'). ' ' . get_post_type(),
            'prev_icon'      => 'cmsi-long-arrow-alt-left',
            'next_icon'      => 'cmsi-long-arrow-alt-right',
            'class'          => '',
            'img_class'      => '',
            'before'         => '',
            'after'          => ''
        ]);
        if($args['show_nav'] != '1' ) return;
        $next_post = get_next_post();
        $previous_post = get_previous_post();
        if(empty($previous_post) && empty($next_post)) return;
        printf('%s', $args['before']);
    ?>
        <div class="<?php echo trim(implode(' ', ['cms-single-next-prev-navigation row gutters-10 justify-content-between align-items-center', $args['class']])); ?>">
            <?php if(!empty($previous_post)) { ?>
            <div class="cms-single-next-prev cms-single-prev col-6 relative text-start">
                <div class="cms-single-next-prev-inner cms-single-prev-inner cms-single-nav-inner">
                    <?php 
                        // overlay link
                        previous_post_link('%link',''); 
                    ?>
                    <div class="row align-items-center gutters-20 gutters-grid">
                        <?php if('1' === $args['show_thumbnail']):
                            saniga_post_thumbnail([
                                'id'             => $previous_post->ID, 
                                'thumbnail_size' => $args['thumbnail_size'], 
                                'class'          => '', 
                                'img_class'      => $args['img_class'],
                                'before'         => '<div class="col-auto">',
                                'after'          => '</div>'
                            ]);
                        endif;
                            if('1' !== $args['show_thumbnail'] && !empty($args['prev_icon'])){
                                echo '<div class="col-12 col-sm-auto"><span class="cms-nav-icon '.$args['prev_icon'].'"></span></div>';
                            }
                         ?>
                        <div class="col"><?php 
                            // label
                            if(!empty($args['prev_title'])) printf('<div class="cms-nav-label text-15 font-700 text-primary">%s</div>', esc_html($args['prev_title']));
                            // title
                            if('1' === $args['show_title']) printf('<div class="cms-nav-title cms-heading text-16 lh-22">%s</div>', get_the_title($previous_post->ID ));
                        ?></div>
                    </div>
                </div>
            </div>
            <?php } else { 
                echo '<div class="col-6 relative text-start"></div>'; 
            }
            if(!empty($next_post)) : ?>
            <div class="cms-single-next-prev cms-single-next col-6 relative text-end">
                <div class="cms-single-next-prev-inner cms-single-next-inner cms-single-nav-inner">
                    <?php 
                        // overlay link
                        next_post_link('%link','');
                    ?>
                    <div class="row align-items-center gutters-20 gutters-grid">
                        <div class="col"><?php
                            // label
                            if(!empty($args['prev_title'])) printf('<div class="cms-nav-label text-15 font-700 text-primary">%s</div>', esc_html($args['next_title']));
                            // title
                            if('1' === $args['show_title']) printf('<div class="cms-nav-title cms-heading text-16 lh-22">%s</div>', get_the_title($next_post->ID ));
                        ?></div>
                        <?php if('1' === $args['show_thumbnail']):
                            saniga_post_thumbnail([
                                'id'             => $next_post->ID,
                                'thumbnail_size' => $args['thumbnail_size'], 
                                'class'          => '', 
                                'img_class'      => $args['img_class'],
                                'before'         => '<div class="col-auto">',
                                'after'          => '</div>'
                            ]); 
                        endif;
                            if('1' !== $args['show_thumbnail'] && !empty($args['next_icon'])){
                                echo '<div class="col-12 col-sm-auto order-first order-sm-last"><span class="cms-nav-icon '.$args['next_icon'].'"></span></div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    <?php 
        printf('%s', $args['after']);
    }
}

/**
 * Related Post
 */
if(!function_exists('saniga_related_post')){
    function saniga_related_post($args = [])
    {
        $args = wp_parse_args($args, [
            'class'          => '',
            'show_related'   => saniga_get_opt( 'post_related_on', '0' ),
            'title'          => esc_html__('Related Posts','saniga'),
            'posts_per_page' => '2',
            'post_type'      => 'post',
            'before'         => '',
            'after'          => ''
        ]);

        if($args['show_related'] != '1') return;
        
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);
        if (empty($posttags)) return;
        $tags = array();
        foreach ($posttags as $tag) {
            $tags[] = $tag->term_id;
        }
        $query_similar = new WP_Query(array(
            'posts_per_page' => $args['posts_per_page'], 
            'post_type'      => $args['post_type'], 
            'post_status'    => 'publish', 
            'category__in'   => $tags
        ));
        if (count($query_similar->posts) > 1) {
            printf('%s', $args['before']);
            ?>
            <div class="<?php echo trim(implode(' ', ['cms-related-post', $args['class']]));?>">
                <?php if(!empty($args['title'])) echo '<div class="cms-heading cms-related-heading text-24 mb-25">'.esc_html($args['title']).'</div>'; ?>
                <div class="cms-related-post-inner row">
                    <?php foreach ($query_similar->posts as $post):
                        if ($post->ID !== $current_id) : ?>
                            <div class="grid-item col-lg-6 col-12">
                                <div class="grid-item-inner">
                                    <?php 
                                        saniga_post_media([
                                            'id'             => $post->ID,
                                            'thumbnail_size' => 'medium',
                                            'img_class'      => 'cms-radius-8'
                                        ]);
                                    ?>
                                    <h4 class="item-title mt-25">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php 
            printf('%s', $args['after']);
        }
        wp_reset_postdata();
    }
}
/**
 * User custom fields.
 */
if(!function_exists('saniga_user_fields')){
    add_action( 'show_user_profile', 'saniga_user_fields' );
    add_action( 'edit_user_profile', 'saniga_user_fields' );
    function saniga_user_fields($user){

        $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
        $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
        $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
        $user_skype = get_user_meta($user->ID, 'user_skype', true);
        $user_google = get_user_meta($user->ID, 'user_google', true);
        $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
        $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
        $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
        $user_rss = get_user_meta($user->ID, 'user_rss', true);
        $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
        $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
        $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

        ?>
        <h3><?php esc_html_e('Social', 'saniga'); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="user_facebook"><?php esc_html_e('Facebook', 'saniga'); ?></label></th>
                <td>
                    <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_twitter"><?php esc_html_e('Twitter', 'saniga'); ?></label></th>
                <td>
                    <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'saniga'); ?></label></th>
                <td>
                    <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_skype"><?php esc_html_e('Skype', 'saniga'); ?></label></th>
                <td>
                    <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_google"><?php esc_html_e('Google', 'saniga'); ?></label></th>
                <td>
                    <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_youtube"><?php esc_html_e('Youtube', 'saniga'); ?></label></th>
                <td>
                    <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'saniga'); ?></label></th>
                <td>
                    <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'saniga'); ?></label></th>
                <td>
                    <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_rss"><?php esc_html_e('Rss', 'saniga'); ?></label></th>
                <td>
                    <input id="user_rss" name="user_rss" type="text" value="<?php echo esc_attr(isset($user_rss) ? $user_rss : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'saniga'); ?></label></th>
                <td>
                    <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_instagram"><?php esc_html_e('Instagram', 'saniga'); ?></label></th>
                <td>
                    <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_yelp"><?php esc_html_e('Yelp', 'saniga'); ?></label></th>
                <td>
                    <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
                </td>
            </tr>
        </table>
        <?php
    }
}
/**
 * Save user custom fields.
 */
if(!function_exists('saniga_save_user_custom_fields')){
    add_action( 'personal_options_update', 'saniga_save_user_custom_fields' );
    add_action( 'edit_user_profile_update', 'saniga_save_user_custom_fields' );
    function saniga_save_user_custom_fields( $user_id )
    {
        if ( !current_user_can( 'edit_user', $user_id ) )
            return false;

        if(isset($_POST['user_facebook']))
            update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
        if(isset($_POST['user_twitter']))
            update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
        if(isset($_POST['user_linkedin']))
            update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
        if(isset($_POST['user_skype']))
            update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
        if(isset($_POST['user_google']))
            update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
        if(isset($_POST['user_youtube']))
            update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
        if(isset($_POST['user_vimeo']))
            update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
        if(isset($_POST['user_tumblr']))
            update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
        if(isset($_POST['user_rss']))
            update_user_meta( $user_id, 'user_rss', $_POST['user_rss'] );
        if(isset($_POST['user_pinterest']))
            update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
        if(isset($_POST['user_instagram']))
            update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
        if(isset($_POST['user_yelp']))
            update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
    }
}

/* Author Social */
if(!function_exists('saniga_get_user_social')){
    function saniga_get_user_social($args = []) {
        $args = wp_parse_args($args,[
            'class'             => '',
            'social_item_class' => ''
        ]);
        $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
        $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
        $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
        $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
        $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
        $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
        $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
        $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
        $user_rss = get_user_meta(get_the_author_meta( 'ID' ), 'user_rss', true);
        $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
        $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
        $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

        ?>
        <div class="<?php echo trim(implode(' ', ['user-social cms-socials', $args['class']]));?>">
            <div class="row gutters-10 gutters-grid">
                <?php if(!empty($user_facebook)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_facebook); ?>"><i class="cmsi-facebook-1"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_twitter)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_twitter); ?>"><i class="cmsi-twitter-1"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_linkedin)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_linkedin); ?>"><i class="cmsi-linkedin-1"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_rss)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_rss); ?>"><i class="cmsi-rss"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_instagram)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_instagram); ?>"><i class="cmsi-instagram"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_google)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_google); ?>"><i class="cmsi-google"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_skype)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_skype); ?>"><i class="cmsi-skype"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_pinterest)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_pinterest); ?>"><i class="cmsi-pinterest"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_vimeo)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_vimeo); ?>"><i class="cmsi-vimeo"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_youtube)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_youtube); ?>"><i class="cmsi-youtube"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_yelp)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_yelp); ?>"><i class="cmsi-yelp"></i></a>
                    </div>
                <?php } ?>
                <?php if(!empty($user_tumblr)) { ?>
                    <div class="cms-social cms-social-item col-auto">
                        <a class="<?php echo esc_attr($args['social_item_class']);?>" href="<?php echo esc_url($user_tumblr); ?>"><i class="cmsi-tumblr"></i></a>
                    </div>
                <?php } ?>
            </div>
        </div> <?php
    }
}

function saniga_product_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="product-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a class="nav-link-prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="cmsi-long-arrow-left"></i></a>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <a class="nav-link-next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="cmsi-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    <?php }
}