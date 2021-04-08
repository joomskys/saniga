<?php
$title = $widget->get_setting('title', 'Highly Trained & Professional');
$icon_color = $widget->get_setting('icon_color', 'white');
$title_color = $widget->get_setting('title_color', 'white');

// Wrap Classes 
$widget->add_render_attribute( 'wrap', 'class', 'cms-fancybox');

// Heading
$title = $widget->get_setting('title', 'Residential Cleaning');
$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-18 font-700 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('title_color', 'heading'));

// Description
$description = $widget->get_setting('description', 'Provide residential house cleaning services and focus on cleaning for health, our extensive industry.');
$widget->add_render_attribute( 'description', 'class', 'cms-description pb-20');
$widget->add_render_attribute( 'description', 'class', 'text-'.$widget->get_setting('description_color', 'body'));

?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
    <div class="<?php echo saniga_elementor_align_class($settings);?>">
        <?php
            switch ($widget->get_setting('icon_type','icon')) {
                case 'img':
                    saniga_elementor_image_render($settings,[
                        'class' => 'cms-fancy-icon'
                    ]);
                break;
                case 'icon':
                    saniga_elementor_icon_render($settings,[
                        'wrap_class'   => 'cms-transition cms-fancy-icon',
                        'class'        => 'cms-fancyicon text-64 text-'.$widget->get_setting('icon_color', 'accent'),
                        'default_icon' => [
                            'library' => 'flaticon',
                            'value'   => 'flaticon-001-house'
                        ]
                    ]);
                break;
            }
        ?>
        <div class="cms-fancybox-content relative pt-25">
            <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
                etc_print_html($title);
            ?></div>
            <div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php
                etc_print_html($description);
            ?></div>
            <?php 
                $link_arrow = is_rtl() ? 'cmsi-arrow-circle-left' : 'cmsi-arrow-circle-right';
                if($settings['hyperlink'] === 'button'){
                    // Button
                    saniga_elementor_button_render($settings, [
                        'class'  => '',
                        'prefix' => 'button'
                    ]);
                } else {
                    // Custom Link 
                    saniga_elementor_hyperlink_render($settings,[
                        'link_type'        => $settings['link_type'],
                        'wrap_class'       => '',
                        'class'            => 'font-700',
                        'link_color'       => '',
                        'link_hover_color' => '',
                        'default_icon'     => [
                            'value'   => $link_arrow,
                            'library' => 'cmsi'
                        ],
                        'icon_class'    => 'text-22'
                    ]);
                }
            ?>
        </div>
    </div>
</div>



