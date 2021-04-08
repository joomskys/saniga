<?php
/* Meta Post Author */
if(!function_exists('saniga_post_author')){
    function saniga_post_author($args = []){
        $args = wp_parse_args($args,[
            'post_id'     => get_the_ID(),
			'show_author' => true,
			'class'       => '',
			'text'        => '',
			'show_icon'   => true,
			'icon'        => 'cmsi-user',
			'icon_class'  => 'text-accent',
            'echo'        => true
        ]);

        if(!$args['show_author']) return;
        ob_start();
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-author', $args['class']]));?>">
            <?php 
            	if($args['show_icon']){
	                // author icon
	                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
	                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'">&nbsp;</span>';
	            }
                // Author text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
                // Author name
                $my_post = get_post( $args['post_id'] );
                $user_id = $my_post->post_author;
            ?>
            <a href="<?php the_author_meta( 'user_url', $user_id ); ?>" title="<?php the_author_meta('display_name', $user_id); ?>"><?php the_author_meta('display_name', $user_id); ?></a>
        </span>
    <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}
/* Meta Post Category */
if(!function_exists('saniga_post_category')){
    function saniga_post_category($args = []){
        $args = wp_parse_args($args,[
            'show_cat'   => true,
            'class'      => '',
            'text'       => '',
            'show_icon'  => true,
            'icon'       => 'cmsi-folder-open',
            'icon_class' => 'text-accent',
            'taxo'       => 'category',
            'separator'  => ', ',
            'post_id'    => get_the_ID(),
            'echo'       => true   
        ]);
        if(!$args['show_cat']) return;
        ob_start();
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-cat', $args['class']]));?>">
            <?php 
            	if($args['show_icon']){
	                // cat icon
	                $icon_class = implode(' ', ['meta-icon',$args['icon'], $args['icon_class']]);
	                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'">&nbsp;</span>';
	            }
                // cat text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
                // cat list
                the_terms( $args['post_id'], $args['taxo'], '', $args['separator'], '' );
            ?>
        </span>
    <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}
/* Meta Post Comment */
if(!function_exists('saniga_post_comment')){
    function saniga_post_comment($args = []){
        $args = wp_parse_args($args,[
            'post_id'       => get_the_ID(),
			'show_cmt'      => true,
			'text'          => esc_html__('Comments','saniga'),
			'class'         => '',
			'show_icon'     => true,
			'icon'          => 'cmsi-comments',
			'icon_class'    => 'text-accent',
			'cmt_with_text' => true,
            'echo'          => true
        ]);

        if(!$args['show_cmt']) return;
        ob_start();
    ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-cmt', $args['class']]));?>">
            <?php 
            	if($args['show_icon']){
	                // comment icon
	                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
	                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
	            }
                // comment text
                if(!empty($args['text'])):  echo '<span>'.esc_html($args['text']).'&nbsp;</span>'; endif; 
            ?>
            <a class="cms-scroll" href="<?php the_permalink();?>#comments"><?php
                if($args['cmt_with_text']) 
                    echo comments_number(
                        esc_html__('Comments: ', 'saniga').'<span class="cmt-count">0</span>',
                        esc_html__('Comment: ', 'saniga').'<span class="cmt-count">1</span>',
                        esc_html__('Comments: ', 'saniga').'<span class="cmt-count">%</span>',
                        $args['post_id']
                    ); 
                else 
                    echo comments_number(
                        '0',
                        '1',
                        '%',
                        $args['post_id']
                    );
            ?></a>
        </span>
    <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}
/* Meta post author */
if(!function_exists('saniga_post_date')){
    function saniga_post_date($args = []){
        $args = wp_parse_args($args, [
            'post_id'     => get_the_ID(),
			'show_date'   => true,
			'date_format' => get_option('date_format'),
			'class'       => '',
			'show_icon'   => true,
			'icon'        => 'cmsi-clock',
			'icon_class'  => 'text-accent',
            'echo'        => true  
        ]);
        if(!$args['show_date']) return;
        ob_start();
        ?>
        <span class="<?php echo trim(implode(' ', ['cms-post-date', $args['class']]));?>">
            <?php 
            	if($args['show_icon']){
	                // date icon
	                $icon_class = implode(' ', ['meta-icon', $args['icon'], $args['icon_class']]);
	                if(!empty($args['icon'])) echo '<span class="'.esc_attr($icon_class).'"></span>';
	            }
            ?>
            <span><?php echo get_the_date($args['date_format'], $args['post_id'] ); ?></span>
        </span>
        <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}

/**
 * Prints post meta
 */
if ( ! function_exists( 'saniga_post_meta' ) ) :
    function saniga_post_meta($args=[]) {
        $args = wp_parse_args($args,[
            'show_author' => saniga_get_opt( 'archive_author_on', true ),
            'show_cat'    => saniga_get_opt( 'archive_categories_on', true ),
            'show_cmt'    => saniga_get_opt( 'archive_comments_on', true ),
            'show_date'   => saniga_get_opt( 'archive_date_on', true ),
            'show_icon'	  => true, 
            'class'       => '',
            'inner_class' => '',
            'item_class'  => '',
            'post_id'     => get_the_ID(),
            'date_format' => get_option('date_format'),
            'gutters'	  => '10',
            'taxo'        => saniga_get_custom_post_taxonomies(get_post_type(), 'cat'),
            'separator'   => '',
            'echo'        => false  
        ]);
       	$inner_class = ['cms-post-meta-inner', 'row align-items-center', 'gutters-'.$args['gutters'], $args['inner_class']];
        $metas = [
            saniga_post_category([
                'show_icon' => $args['show_icon'],
                'show_cat'  => $args['show_cat'],
                'class'     => 'col-auto empty-none '.$args['item_class'],
                'post_id'   => $args['post_id'],
                'text'      =>  '',
                'taxo'      => $args['taxo'],
                'echo'      => $args['echo']
            ]),
            saniga_post_date([
                'post_id'     => $args['post_id'],
                'show_date'   => $args['show_date'],
                'show_icon'   => $args['show_icon'],
                'date_format' => $args['date_format'],
                'class'       => 'col-auto '.$args['item_class'],
                'echo'        => $args['echo']
            ]),
            saniga_post_author([
                'post_id'     => $args['post_id'],
                'show_author' => $args['show_author'], 
                'show_icon'   => $args['show_icon'],
                'show_author' => $args['show_author'],
                'class'       => 'col-auto '.$args['item_class'],
                'echo'        => $args['echo']
            ]),
            saniga_post_comment([
                'post_id'   => $args['post_id'],
                'show_icon' => $args['show_icon'],
                'show_cmt'  => $args['show_cmt'],
                'class'     => 'col-auto '.$args['item_class'],  
                'text'      => '',
                'echo'      => $args['echo']
            ])
        ];
        if($args['show_author'] || $args['show_cat'] || $args['show_cmt'] || $args['show_date']) : ?>
            <div class="<?php echo implode(' ', ['cms-post-meta', $args['class']]); ?>">
                <div class="<?php echo trim(implode(' ', $inner_class));?>">
                    <?php 
                        echo implode($args['separator'], array_filter($metas));
                    ?>
                </div>
            </div>
        <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'saniga_post_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function saniga_post_tagged_in($args = [])
    {
        $args = wp_parse_args($args, [
            'title'    => '',
            'class'    => '',
            'style'    => 'tagcloud',     
            'show_tag' => '1',
            'post_id'  => get_the_ID(),
            'separator' => '',
        ]);
        if($args['show_tag'] !== '1') return;
        $tags_list = get_the_tag_list( '<div class="'.$args['style'].'">', $args['separator'], '</div>', $args['post_id']);
        if ( $tags_list )
        {
            echo '<div class="'.trim(implode(' ', ['cms-post-tags', $args['class']])).'"><div class="row gutters-10 gutters-grid align-items-center">';
                if($args['title'] != '') printf('%s', $args['title']);
                printf('<div class="col">%2$s</div>', '', $tags_list);
            echo '</div></div>';
        }
    }
endif;

// Get Post icon
if(!function_exists('saniga_post_icon')){
    function saniga_post_icon($args = []){
        $args = wp_parse_args($args, [
            'id'         => get_the_ID(),
            'class'      => '',     
            'before'     => '',
            'after'      => '',
            'icon_class' => '',
            'img_size'   => '88x100',
            'echo'       => true    
        ]);
        $icon     = saniga_get_post_format_value($args['id'], 'cms_service_icon', '');
        $icon_img = saniga_get_post_format_value($args['id'], 'cms_service_icon_img', ['id' => '']);
        $img_url  = saniga_get_image_url_by_size([
            'id'   => $icon_img['id'],
            'size' => $args['img_size']
        ]);
        $img_size = explode('x', $args['img_size']);
        $img_w = $img_size[0];
        $img_h = isset($img_size[1]) ? $img_size[1] : $img_size[0];
        if(empty($icon) && empty($icon_img['id'])) return;
        $_icon = $_icon_img = '';
        if( empty($icon) && !empty($icon_img['id']) ) $_icon_img = '<span class="icon-img d-inline-block '.$args['icon_class'].'" style="width:'.$img_w.'px; height:'.$img_h.'px;"><img src="'.$img_url.'" alt="Saniga" /></span>';
        if(!empty($icon)) $_icon = '<span class="'.$icon.' '.$args['icon_class'].'"></span>';

        ob_start();
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-post-icon', $args['class']]));?>"><?php 
                printf('%1$s %2$s %3$s %4$s', $args['before'], $_icon, $_icon_img, $args['after'] ); 
            ?></div>
        <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}
// Get post sale off
if(!function_exists('saniga_post_saleoff')){
    function saniga_post_saleoff($args = []){
        $args = wp_parse_args($args, [
            'id'         => get_the_ID(),
            'class'      => '',     
            'before'     => '',
            'after'      => '',
            'text'       => 'off',  
            'echo'       => true    
        ]);
        $sale = saniga_get_post_format_value($args['id'], 'cms_saleoff', '');
        if(empty($sale)) return;
        ob_start(); 
        ?>
            <div class="<?php echo trim(implode(' ', ['cms-saleoff', $args['class']]));?>"><?php 
                printf('%1$s%2$s %3$s%4$s', $args['before'], $sale, $args['text'], $args['after'] ); 
            ?></div>
        <?php
        if($args['echo']){
            echo ob_get_clean();
        } else {
            return ob_get_clean();
        }
    }
}