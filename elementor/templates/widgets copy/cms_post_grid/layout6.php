<?php
$html_id = etc_get_element_id($settings);
$tax     = array();
$source  = $widget->get_setting('source_'.$settings['post_type'], '');
$orderby = $widget->get_setting('orderby', 'date');
$order   = $widget->get_setting('order', 'desc');
$limit   = $widget->get_setting('limit', 6);
extract(etc_get_posts_of_grid($settings['post_type'], [
    'source'   => $source,
    'orderby'  => $orderby,
    'order'    => $order,
    'limit'    => $limit
]));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');

$grid_class = 'cms-grid-inner cms-grid-masonry row';

$masonry_mode = $widget->get_setting('masonry_mode', 'fitRows');

$filter                     = $widget->get_setting('filter', 'false');
$filter_alignment           = $widget->get_setting('filter_alignment', 'center');

$pagination_type            = $widget->get_setting('pagination_type', 'false');

$load_more = array(
    'layout'                     => $settings['layout'],
    'startPage'                  => $paged,
    'maxPages'                   => $max,
    'total'                      => $total,
    'perpage'                    => $limit,
    'nextLink'                   => $next_link,
    'source'                     => $source,
    'orderby'                    => $orderby,
    'order'                      => $order,
    'limit'                      => $limit,
    // Element settings
    'col_xl'                     => $widget->get_setting('col_xl', '4'),
    'col_lg'                     => $widget->get_setting('col_lg', '3'),
    'col_md'                     => $widget->get_setting('col_md', '2'),
    'col_sm'                     => $widget->get_setting('col_sm', '1'),
    'gap'                        => $widget->get_setting('gap', '30'),
    'gap_extra'                  => $widget->get_setting('gap_extra', ''),   
    'thumbnail_size'             => $widget->get_setting('thumbnail_size', 'medium'),
    'thumbnail_custom_dimension' => $widget->get_setting('thumbnail_custom_dimension', ''),
    // excerpt
    'excerpt_lenght'             => $widget->get_setting('excerpt_lenght', '25'),
    'excerpt_more_text'          => $widget->get_setting('excerpt_more_text', '...'),
    // Read more
    'readmore_text'              => $widget->get_setting('readmore_text',''),
    // Socical
    'show_fb'                    => $widget->get_setting('show_fb', ''),     
    'show_tw'                    => $widget->get_setting('show_tw', ''),     
    'show_insta'                 => $widget->get_setting('show_insta', ''),     
    'show_email'                 => $widget->get_setting('show_email', ''),     
    'show_phone'                 => $widget->get_setting('show_phone', ''),   
);

?>

<div <?php saniga_elementor_masonry_settings_render_attrs($widget, $settings);?>>
    <?php if ($filter == "true"): ?>
        <div class="cms-grid-filter-wrap row gutters-35 justify-content-<?php echo esc_attr($filter_alignment); ?>">
            <span class="cms-filter-item active col-auto" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php 
                    $category_arr = explode('|', $category); 
                    $tax[]        = $category_arr[1];
                    $term         = get_term_by('slug',$category_arr[0], $category_arr[1]); 
                ?>
                <span class="cms-filter-item col-auto" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="<?php echo esc_attr($grid_class); ?> animation-time relative" data-layout="<?php echo esc_attr($masonry_mode); ?>" style="margin: <?php echo esc_attr($settings['gap']/-2);?>px">
        <div class="cms-grid-sizer col-1"></div>
        <?php 
            $load_more['tax'] = $tax;
            saniga_get_post_grid($posts, $load_more);
        ?>
        <div class="cms-grid-overlay"></div>
    </div>
    <?php if ($pagination_type == 'pagination') { ?>
        <div class="cms-post-pagination cms-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php saniga_posts_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $pagination_type == 'loadmore') { ?>
        <div class="cms-post-pagination cms-load-more text-center" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-loading-text="Loading">
            <span class="btn btn-lg btn-fill btn-accent">
                <span class="cms-btn-content">
                    <span class="cms-btn-icon text-20 cmsi-arrow-circle-right"></span>
                    <span class="cms-btn-text"><?php echo esc_html($settings['loadmore_text']); ?></span>
                </span>
            </span>
        </div>
    <?php } ?>
</div>