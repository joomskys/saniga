<?php
/**
 * Ajax paginate links
*/
if(!function_exists('saniga_ajax_paginate_links')){
    function saniga_ajax_paginate_links($link){
        $parts = parse_url($link);
        parse_str($parts['query'], $query);
        if(isset($query['page']) && !empty($query['page'])){
            return '#' . $query['page'];
        }
        else{
            return '#1';
        }
    }
}

/**
 * AJAX HTML for pagination
*/
if(!function_exists('saniga_get_pagination_html')){
    add_action( 'wp_ajax_saniga_get_pagination_html', 'saniga_get_pagination_html' );
    add_action( 'wp_ajax_nopriv_saniga_get_pagination_html', 'saniga_get_pagination_html' );
    function saniga_get_pagination_html(){
        try{
            if(!isset($_POST['query_vars'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'saniga'));
            }
            $query = new WP_Query($_POST['query_vars']);
            ob_start();
           		saniga_posts_pagination( $query,  true );
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status'  => true,
                    'message' => esc_html__('Load Pagination Successfully!', 'saniga'),
                    'data'    => array(
                        'html'       => $html,
                        'query_vars' => $_POST['query_vars'],
                        'post'       => $query->have_posts()
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}
// Post Layout 
if(!function_exists('saniga_get_post_grid')){
    function saniga_get_post_grid($posts = [], $settings = [], $args = []){
        if(empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)){
            return false;
        }
        extract($settings);
        if($thumbnail_size != 'custom'){
            $img_size = $thumbnail_size;
        }
        elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
            $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
        }
        else{
            $img_size = 'full';
        }
        $col_xl = isset($settings['col_xl']) ? 'col-xl-'.(12 / intval($settings['col_xl'])) : '';
        $col_lg = isset($settings['col_lg']) ? 'col-lg-'.(12 / intval($settings['col_lg'])) : '';
        $col_md = isset($settings['col_md']) ? 'col-md-'.(12 / intval($settings['col_md'])) : '';
        $col_sm = isset($settings['col_sm']) ? 'col-'.(12 / intval($settings['col_sm'])) : '';

        $args = wp_parse_args($args, [
            'item_class' => trim(implode(' ', ['cms-grid-item', $col_xl, $col_lg, $col_md, $col_sm]))
        ]);

        $item_class = $args['item_class'];
        $settings['gap_extra'] = empty($settings['gap_extra']) ? '0' : $settings['gap_extra'];
        // Start build post item 
        foreach ($posts as $post):
            $filter_class = etc_get_term_of_post_to_class($post->ID, array_unique($tax));
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>" style="padding: <?php echo esc_attr($settings['gap']/2);?>px; margin-bottom: <?php echo esc_attr($settings['gap_extra']);?>px">
                <?php switch ($settings['layout']) {
                    case '4':
                ?>
                    <div class="cms-item-content bg-white cms-hover-img-scale cms-transition clearfix relative">
                        <?php 
                        ob_start();
                        saniga_post_icon([
                                'id' => $post->ID,
                                'class' => 'cms-transition text-80 lh-80 text-accent mb-10'
                            ]);
                        $media_icon = ob_get_clean();
                        saniga_post_media([
                            'id'             => $post->ID, 
                            'default_thumb'  => '1',
                            'thumbnail_size' => $img_size,
                            'wrap_class'     => 'relative',
                            'img_class'      => 'w-100',
                            'after'          => $media_icon
                        ]); ?>
                        <div class="cms-item-content-inner p-lr-15 p-lr-md-50 pt-50 pb-100">
                            <div class="cms-item-content-title cms-heading font-700 text-23 lh-32 mb-27">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a>
                            </div>
                            <div class="cms-item-content-excerpt mb-n8"><?php
                                if(!empty($post->post_excerpt)){
                                    echo wp_trim_words( $post->post_excerpt, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                                else{
                                    $content = strip_shortcodes( $post->post_content );
                                    $content = apply_filters( 'the_content', $content );
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo wp_trim_words( $content, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                            ?></div>
                            <?php 
                            //$readmore = '';
                            if(!empty($settings['readmore_text'])){ 
                                //ob_start(); ?>
                                <div class="cms-btn-wraps cms-post-item-readmore cms-transition">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="cms-readmore btn btn-primary btn-hover-accent btn-lg">
                                        <span class="cms-btn-content">
                                            <span class="cms-btn-icon text-20 cmsi-arrow-circle-<?php echo is_rtl() ? 'left' : 'right';?>"></span>
                                            <span class="cms-btn-text cms-transition"><?php echo esc_html($settings['readmore_text']); ?></span>
                                        </span>
                                    </a>
                                </div>
                            <?php 
                            //$readmore = ob_get_clean();
                        } ?>
                        </div>
                    </div>
                <?php break; 
                    case '3':
                ?>
                    <div class="cms-item-content cms-hover-img-scale relative overflow-hidden">
                        <?php 
                        saniga_post_media([
                            'id'             => $post->ID, 
                            'default_thumb'  => '1',
                            'thumbnail_size' => $img_size,
                            'wrap_class'     => '',
                            'img_class'      => 'w-100'
                        ]); ?>
                        <div class="cms-item-content-inner p-15 p-md-40 absolute">
                            <div class="d-flex overflow-hidden h-100">
                                <div class="align-self-start"><?php 
                                    saniga_post_icon([
                                        'id'    => $post->ID,
                                        'class' => 'cms-badge-2 text-30',
                                        'icon_class' => 'text-30'
                                    ]); 
                                    saniga_post_saleoff([
                                        'id'    => $post->ID,
                                        'class' => 'cms-badge-2'
                                    ]);
                                ?></div>
                                <div class="cms-item--content align-self-end overflow-hidden cms-transition">
                                    <div class="cms-item-content-title cms-heading text-24 font-700 mb-15 text-white">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a>
                                    </div>
                                    <div class="cms-item-content-excerpt text-white mb-15"><?php
                                        if(!empty($post->post_excerpt)){
                                            echo wp_trim_words( $post->post_excerpt, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                        }
                                        else{
                                            $content = strip_shortcodes( $post->post_content );
                                            $content = apply_filters( 'the_content', $content );
                                            $content = str_replace(']]>', ']]&gt;', $content);
                                            echo wp_trim_words( $content, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                        }
                                    ?></div>
                                    <?php if(!empty($settings['readmore_text'])){  ?>
                                        <div class="cms-post-item-readmore text-14 font-700 mb-n5">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="cms-readmore d-inline-block text-accent text-hover-white">
                                                <span class="cms-btn-content">
                                                    <span class="cms-btn-icon text-12 cmsi-arrow-<?php echo is_rtl() ? 'left' : 'right';?>"></span>
                                                    <span class="cms-btn-text"><?php echo esc_html($settings['readmore_text']); ?></span>
                                                </span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php break; 
                    case '2':
                ?>
                    <div class="cms-item-content bg-white cms-hover-img-scale cms-hover-readmore cms-transition clearfix">
                        <div class="cms-item-content-inner p-lr-15 p-lr-md-50 pt-50 pb-50">
                            <?php saniga_post_icon([
                                'id' => $post->ID,
                                'class' => 'text-80 lh-80 text-accent mb-10'
                            ]); ?>
                            <div class="cms-item-content-title cms-heading text-23 lh-32 mb-27">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a>
                            </div>
                            <div class="cms-item-content-excerpt mb-n8"><?php
                                if(!empty($post->post_excerpt)){
                                    echo wp_trim_words( $post->post_excerpt, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                                else{
                                    $content = strip_shortcodes( $post->post_content );
                                    $content = apply_filters( 'the_content', $content );
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo wp_trim_words( $content, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                            ?></div>
                            <?php 
                            $readmore = '';
                            if(!empty($settings['readmore_text'])){ 
                                ob_start(); ?>
                                <div class="cms-btn-wraps cms-post-item-readmore cms-transition">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="cms-readmore btn btn-accent btn-hover-secondary btn-lg cms-blog-readmore2">
                                        <span class="cms-btn-content">
                                            <span class="cms-btn-icon text-20 cmsi-arrow-circle-<?php echo is_rtl() ? 'left' : 'right';?>"></span>
                                            <span class="cms-btn-text"><?php echo esc_html($settings['readmore_text']); ?></span>
                                        </span>
                                    </a>
                                </div>
                            <?php 
                            $readmore = ob_get_clean();
                        } ?>
                        </div>
                        <?php 
                        saniga_post_media([
                            'id'             => $post->ID, 
                            'default_thumb'  => '1',
                            'thumbnail_size' => $img_size,
                            'wrap_class'     => 'relative overflow-hidden',
                            'img_class'      => 'w-100',
                            'after'          => $readmore
                        ]); ?>
                    </div>
                <?php break; 
                    default:
                ?>
                    <div class="cms-item-content bg-white cms-hover-img-scale cms-hover-readmore cms-transition clearfix"><?php 
                        saniga_post_media([
                            'id'             => $post->ID, 
                            'default_thumb'  => '1',
                            'thumbnail_size' => $img_size,
                            'wrap_class'     => '',
                            'img_class'      => 'w-100',
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
                                ])
                            .'</span>'
                        ]); ?>
                        <div class="cms-item-content-inner p-lr-15 p-lr-md-40 pt-40 pb-40 mt-n8">
                            <div class="cms-post-meta mb-20 mt-n8">
                                <div class="cms-post-meta-inner row align-items-center gutters-10">
                                    <?php 
                                        saniga_post_category([
                                            'post_id'       => $post->ID,
                                            'taxo'          => saniga_get_custom_post_taxonomies($post->post_type, 'cat'),
                                            'class'         => 'col-auto',
                                            'show_icon'     => false    
                                        ]);
                                    ?>
                                    <div class="col-auto cms-meta-separator"></div>
                                    <?php
                                        saniga_post_author([
                                            'post_id'       => $post->ID,
                                            'class'         => 'col-auto',
                                            'show_icon'     => false    
                                        ]);
                                        
                                    ?>
                                </div>
                            </div>
                            <div class="cms-item-content-title cms-heading text-21 lh-29 mb-20">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo get_the_title($post->ID); ?></a>
                            </div>
                            <div class="cms-item-content-excerpt mb-20"><?php
                                if(!empty($post->post_excerpt)){
                                    echo wp_trim_words( $post->post_excerpt, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                                else{
                                    $content = strip_shortcodes( $post->post_content );
                                    $content = apply_filters( 'the_content', $content );
                                    $content = str_replace(']]>', ']]&gt;', $content);
                                    echo wp_trim_words( $content, $settings['excerpt_lenght'], $settings['excerpt_more_text'] );
                                }
                            ?></div>
                            <?php 
                            if(!empty($settings['readmore_text'])){ ?>
                                <div class="cms-btn-wraps cms-post-item-readmore cms-transition">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>" class="cms-readmore cms-blog-readmore d-inline-block">
                                        <span class="cms-btn-content">
                                            <span class="cms-btn-icon text-20 cmsi-arrow-circle-<?php echo is_rtl() ? 'left' : 'right';?>"></span>
                                            <span class="cms-btn-text"><?php echo esc_html($settings['readmore_text']); ?></span>
                                        </span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php break; 
                    } ?>
            </div>
        <?php
        endforeach;
    }
}
// Load More Post
if(!function_exists('saniga_load_more_post_grid')){
    add_action( 'wp_ajax_saniga_load_more_post_grid', 'saniga_load_more_post_grid' );
    add_action( 'wp_ajax_nopriv_saniga_load_more_post_grid', 'saniga_load_more_post_grid' );
    function saniga_load_more_post_grid(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'saniga'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(etc_get_posts_of_grid($settings['post_type'], [
                'source'   => isset($settings['source'])?$settings['source']:'',
                'orderby'  => isset($settings['orderby'])?$settings['orderby']:'date',
                'order'    => isset($settings['order'])?$settings['order']:'desc',
                'limit'    => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
                saniga_get_post_grid($posts, $settings);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => __('Load Post Grid Successfully!', 'saniga'),
                    'data' => array(
                        'html'  => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}