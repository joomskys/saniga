<?php 
// Wrap 
$widget->add_render_attribute( 'wrap', 'class', 'cms-page-title-wrapper p-tb-50 pt-tb-lg-100 p-tb-xl-200');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings));
// Content Widht 
$col_xl = 'col-xl-'.$widget->get_setting('content_col', '5');
$col_lg = 'col-lg-'.$widget->get_setting('content_col_tablet', '8');
$col    = 'col-'.$widget->get_setting('content_col_mobile', '12');
// Heading
$heading_text = $widget->get_setting('heading_text', get_the_title());
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-30 lh-40 text-lg-50 lh-lg-60 text-xl-75 lh-xl-85 font-700 mt-n15 mb-n20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','white'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}

// Background 
$background = '';
if(!empty($settings['background']['url'])){
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url('.$settings['background']['url'].');');
} elseif( has_post_thumbnail()) {
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url('.get_the_post_thumbnail_url(null, 'full').');');
}
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($col.' '.$col_lg.' '.$col_xl);?>">
                <div class="cms-page-title-content">
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                        echo esc_html($heading_text);
                    ?></div>
                    <?php
                        saniga_breadcrumb([
                            'show_breadcrumb' => $widget->get_setting('show_breadcrumb','0'),
                            'class'           => 'text-14 pt-40',
                            'link_class'      => 'text-'.$widget->get_setting('breadcrumb_link_color','white'),
                            'text_class'      => 'text-'.$widget->get_setting('breadcrumb_color','secondary'),
                            'divider'         => '<span class="breadcrumb-divider cmsi-angle-right flip-rtl text-'.$widget->get_setting('breadcrumb_link_color','white').'"></span>'
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>