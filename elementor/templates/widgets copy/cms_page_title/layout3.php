<?php 
// Wrap 
$widget->add_render_attribute( 'wrap', 'class', 'cms-page-title-wrapper pt-100 pt-lg-150 pt-xl-240');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings));
// Heading
$heading_text = $widget->get_setting('heading_text', get_the_title());
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-45 lh-60');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color', 'white'));
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading text-16 lh-26 pt-15');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$widget->get_setting('subheading_color','white'));
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Description
$description_text = $widget->get_setting('description_text', '');
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-15 lh-25 pt-15');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color','white'));
if ( $settings['description_animation'] ) {
    $widget->add_render_attribute( 'description', 'class', 'animated ' . $settings['description_animation'] );
}
if($settings['description_color'] === 'custom' && !empty($settings['description_custom_color'])){
    $widget->add_render_attribute( 'description', 'style', 'color:'.$settings['description_custom_color']);
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
        <div class="cms-page-title-content">
            <?php 
                saniga_elementor_icon_render($settings, [
                    'wrap_class' => 'mb-20 empty-none',
                    'class'      => 'cms-icon-50 text-50'
                ]);
                saniga_breadcrumb([
                    'show_breadcrumb' => $settings['show_breadcrumb'],
                    'class'           => 'text-14 justify-content-'.$settings['text-align'],
                    'link_class'      => 'text-'.$widget->get_setting('breadcrumb_link_color','white'),
                    'text_class'      => 'text-'.$widget->get_setting('breadcrumb_color','white'),
                    'divider'         => '<span class="breadcrumb-divider cmsi-angle-right flip-rtl text-'.$widget->get_setting('breadcrumb_color','white').'"></span>'
                ]);
            ?>
            <?php if ( !empty($heading_text) ) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php 
                    echo esc_html($heading_text);
                ?></div>
            <?php }
                if(!empty($settings['subheading_text'])){ ?>
                    <div <?php etc_print_html($widget->get_render_attribute_string( 'subheading' )); ?>><?php 
                        echo esc_html($settings['subheading_text']);
                    ?></div>
            <?php }
                if(!empty($description_text)) { ?>
                <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
                    echo wpautop($description_text); 
                ?></div>
            <?php } ?>
        </div>
    </div>
</div>