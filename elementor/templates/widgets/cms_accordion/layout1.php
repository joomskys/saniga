<?php
$default_settings = [
    'active_section' => '',
    'cms_accordion'  => '',
    'main_icon'      => '',
    'icon_active'    => '',
    'title_html_tag' => 'div'
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
$active_section = intval($active_section);
$accordions = $widget->get_settings('cms_accordion');
$is_new = \Elementor\Icons_Manager::is_migration_allowed();

$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-24 font-700 empty-none mb-30');
?>
<div id="<?php echo esc_attr($html_id); ?>" class="cms-accordion">
    <div <?php etc_print_html($widget->get_render_attribute_string( 'heading' ));?>><?php 
        etc_print_html($widget->get_setting('heading', ''));
    ?></div>
    <?php foreach ($accordions as $key => $value):
        $is_active     = ($key + 1) == $active_section;
        $_id           = isset($value['_id']) ? $value['_id'] : '';
        $ac_title      = isset($value['ac_title']) ? $value['ac_title'] : '';
        $ac_title_icon = isset($value['ac_title_icon']) ? $value['ac_title_icon'] : '';
        $ac_content    = isset($value['ac_content']) ? $value['ac_content'] : '';
        $title_key     = $widget->get_repeater_setting_key( 'ac_title', 'cms_accordion', $key );
        $widget->add_render_attribute( $title_key, [
            'class' => [ 'cms-heading cms-ac-title-text col' ],
        ] );
        $widget->add_inline_editing_attributes( $title_key, 'basic' );

        $content_key = $widget->get_repeater_setting_key( 'ac_content', 'cms_accordion', $key );
        $widget->add_render_attribute( $content_key, [
            'id' => $_id,
            'class' => [ 'cms-ac-content' ],
        ] );
        if($is_active){
            $widget->add_render_attribute( $content_key, 'style', 'display:block;' );
        }
        $widget->add_inline_editing_attributes( $content_key, 'basic' );

        if($settings['explain_icon_pos'] == 'left'){
            $title_icon_class = 'order-first';
        } else {
            $title_icon_class = 'order-last';
        }
    ?>
        <div class="cms-accordion-item cms-transition <?php echo esc_attr($is_active?'active':''); ?>" data-target="<?php echo esc_attr('#' . $_id); ?>">
            <<?php etc_print_html($title_html_tag); ?> class="cms-ac-title cms-heading row gutters-20 justify-content-between">
                <span class="cms-ac-title-icon col-auto <?php echo esc_attr($title_icon_class);?>">
                    <?php
                        if($is_new):
                            \Elementor\Icons_Manager::render_icon(
                                $settings['main_icon'],
                                [
                                    'aria-hidden' => 'true',
                                    'class'       => 'cms-ac-title-icon-close'
                                ]
                            );
                            \Elementor\Icons_Manager::render_icon(
                                $settings['icon_active'],
                                [
                                    'aria-hidden' => 'true',
                                    'class'       => 'cms-ac-title-icon-open'
                                ]
                            );
                    ?>
                    <?php else: ?>
                        <i class="cms-ac-title-icon-close <?php echo esc_attr($main_icon); ?>"></i>
                        <i class="cms-ac-title-icon-open <?php echo esc_attr($icon_active); ?>"></i>
                    <?php endif; ?>
                </span>
                <a <?php etc_print_html($widget->get_render_attribute_string( $title_key )); ?>><?php 
                    if($is_new){
                        \Elementor\Icons_Manager::render_icon(
                            $ac_title_icon,
                            [
                                'aria-hidden' => 'true',
                                'class'       => 'ac-title-icon'
                            ]
                        );
                    }
                    echo esc_html($ac_title); 
                ?></a>
            </<?php etc_print_html($title_html_tag); ?>>
            <div <?php etc_print_html($widget->get_render_attribute_string( $content_key )); ?>><?php etc_print_html(nl2br($ac_content)); ?></div>
        </div>
    <?php
        endforeach;
    ?>
</div>