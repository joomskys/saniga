<?php
// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox p-tb-50 p-lr-25 p-lr-md-50');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color','secondary'));
// Heading
$title = $widget->get_setting('title', 'Expanded Disinfection Services Fits All needs!');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-22 mb-30 mt-n8');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'white'));
// Description
$desc = $widget->get_setting('description', 'The processes and systems we put in place provide high quality service with a focus on safety.');
$widget->add_render_attribute( 'description', 'class', 'description text-16 pb-70');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'white'));
// Contact Lists
$contact_lists = $widget->get_setting('contact_list3');
// Button
$widget->add_render_attribute( 'button', 'class', 'cms-button');

//background image
$background_img = saniga_elementor_image_url_render($settings, [
    'id'   => 'background_img',
    'size' => 'background_size'
]);
if(!empty($settings['background_img']['id'])){
    $widget->add_render_attribute( 'wrap', 'style', 'background-image:url('.$background_img.');');
}
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="<?php echo saniga_elementor_align_class($settings,['default' => 'start']);?>">
        <div class="cms-fancy-icon-wrap cms-transition"><?php
            switch ($widget->get_setting('icon_type','')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class'       => 'cms-fancy-icon mb-40',
                        'default_img' => '/wp-content/themes/saniga/elementor/templates/widgets/cms_fancy_box/layout-images/icon.png'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon mb-40 text-100 text-'.$widget->get_setting('icon_color', 'white'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-001-house'
                        ]
                    ]);
                break;
            }
        ?></div>
        <div class="cms-fancybox-content">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($desc);
            ?></div>
            <div class="cms-qc-lists row">
                <?php foreach ($contact_lists as $value): 
                    $link_attrs = [];
                    if ( ! empty( $value['contact_list_text_link']['url'] ) ) {
                        $url = str_replace(' ', '', $value['contact_list_text_link']['url']);
                        $link_attrs[] = 'href="'.$url.'"';
                    }
                    if ( ! empty($value['contact_list_text_link']['is_external'] )) {
                        $link_attrs[] = 'target="_blank"';
                    }
                    if ( ! empty($value['contact_list_text_link']['nofollow'] )) {
                        $link_attrs[] = 'rel="nofollow"';
                    }
                    if( ! empty($value['contact_list_text_link']['custom_attributes'])){
                        $custom_attributes = explode('|', $value['contact_list_text_link']['custom_attributes']);
                        foreach ($custom_attributes as $atts_value) {
                            $_custom_attributes = explode(':', $atts_value);
                            $link_attrs[] = $_custom_attributes[0].'="'.$_custom_attributes[1].'"';
                        }
                    }
                    $color = !empty($value['contact_list_text_color3']) ? $value['contact_list_text_color3'] : $widget->get_setting('text_color3','white');
                ?>
                    <div class="cms-qc-list col-12 text-<?php echo esc_attr($color);?> text-14 font-700">
                        <div class="cms-qc-list-item">
                            <?php 
                                saniga_elementor_icon_render($settings,[
                                    'id'         => $value['contact_list_icon'],
                                    'loop'       => true,
                                    'tag'        => 'span', 
                                    'wrap_class' => 'cms-fancy-icon pr-10',
                                    'class'      => 'rtl-flip text-'.$widget->get_setting('contact_list_icon_color3','white')
                                ]);
                            ?>
                            <span class="cms-contact-title"><?php
                                echo esc_html($value['contact_list_title']); 
                            ?></span>
                            <?php
                            if ( ! empty( $link_attrs ) ){
                            ?>
                                <a <?php echo implode(' ', $link_attrs); ?>><?php 
                            }
                                echo esc_html($value['contact_list_text']);
                            if ( ! empty( $link_attrs ) ) { 
                                ?></a><?php 
                            }
                        ?></div>
                    </div>      
                <?php endforeach; ?>
            </div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <?php 
                    saniga_elementor_button_render($settings, [
                        'prefix' => 'button9',
                        'class'  => 'mt-25'
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>



