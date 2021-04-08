<?php
// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox p-tb-50 p-lr-25 p-lr-md-50 cms-shadow-1');
$widget->add_render_attribute( 'wrap', 'class', 'bg-'.$widget->get_setting('bg_color','accent'));
// Heading
$title = $widget->get_setting('title', 'Expanded Disinfection Services Fits All needs!');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-22 mb-30 mt-n8');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'white'));
// Description
$desc = $widget->get_setting('description', 'The processes and systems we put in place provide high quality service with a focus on safety.');
$widget->add_render_attribute( 'description', 'class', 'description text-16 pb-95');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'white'));

// Phone
$phone = $widget->get_setting('phone_number','01061245741');
$widget->add_render_attribute( 'phone', 'class', 'cms-phone heading text-24 font-400 mb-20');
$widget->add_render_attribute( 'phone', 'class', 'text-'.$widget->get_setting('phone_color','white'));
$widget->add_render_attribute( 'phone', 'class', 'link-'.$widget->get_setting('phone_color','white'));
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
            <div <?php etc_print_html($widget->get_render_attribute_string( 'phone' )); ?>>
                <a href="tel:<?php echo esc_attr($phone);?>">
                    <span class="phone-icon cmsi-phone-alt pr-10 text-large"></span><?php
                    etc_print_html($phone);
                ?></a>
            </div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                <?php 
                    saniga_elementor_button_render($settings, [
                        'prefix' => 'button8'
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>



