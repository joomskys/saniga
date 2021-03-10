<?php 
// Wrap 
$widget->add_render_attribute( 'wrap', 'class', 'cms-post-featured-wrapper');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings));
// Heading
$heading_text = $widget->get_setting('heading_text', get_the_title());
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-28 lh-32');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
if ( $settings['heading_animation'] ) {
    $widget->add_render_attribute( 'heading', 'class', 'animated ' . $settings['heading_animation'] );
}
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
// Sub Heading
$widget->add_render_attribute( 'subheading', 'class', 'cms-heading cms-subheading text-18 lh-28 pt-15');
$widget->add_render_attribute( 'subheading', 'class', 'text-'.$settings['subheading_color']);
if ( $settings['subheading_animation'] ) {
    $widget->add_render_attribute( 'subheading', 'class', 'animated ' . $settings['subheading_animation'] );
}
if($settings['subheading_color'] === 'custom' && !empty($settings['subheading_custom_color'])){
    $widget->add_render_attribute( 'subheading', 'style', 'color:'.$settings['subheading_custom_color']);
}
// Description
$description_text = $widget->get_setting('description_text', get_the_excerpt());
$widget->add_render_attribute( 'description', 'class', 'cms-heading-desc text-15 lh-25 pt-15');
$widget->add_render_attribute( 'description', 'class', 'text-'.$settings['description_color']);
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
// Button
$btn_class  = $settings['button_animation'] ? 'animated '.$settings['button_animation'] : '';
?>

<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-xl-7">
                <div class="p-lr-5 pl-lg-25 pr-lg-45">
                    <?php 
                        saniga_breadcrumb([
                            'show_breadcrumb' => $settings['show_breadcrumb'],
                            'class'           => 'mb-25',
                            'link_class'      => 'text-'.$settings['breadcrumb_link_color'],
                            'text_class'      => 'text-'.$settings['breadcrumb_color'],
                            'divider'         => '<span class="breadcrumb-divider cmsi-chevron-right flip-rtl text-'.$settings['breadcrumb_color'].'"></span>'
                        ]);
                    ?>
                    <div class="cms-post-featured-content relative bg-white p-10 p-lg-40 cms-radius-8 cms-shadow-2 mb-n50">
                        <div class="row">
                            <?php 
                                if(!empty($settings['selected_icon']['value'])){
                                    saniga_elementor_icon_render($settings, [
                                        'wrap_class' => 'col-12 col-sm-auto mb-25 mt-n5 empty-none',
                                        'class'      => 'text-64'
                                    ]);
                                }
                            ?>
                            <div class="col">
                                <?php 
                                    saniga_post_category([
                                        'post_id'       => get_the_ID(),
                                        'taxo'          => saniga_get_custom_post_taxonomies(get_post_type(), 'cat'),
                                        'class'         => 'd-block pb-15 mt-n8',
                                        'show_icon'     => false  
                                    ]);

                                    if ( !empty($heading_text) ) { ?>
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
                                <?php } 
                                    saniga_elementor_button_render($settings, ['class' => 'mt-15 d-inline-block', 'btn_class' => $btn_class]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>