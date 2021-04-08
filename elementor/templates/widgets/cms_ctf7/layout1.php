<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
if(class_exists('WPCF7') && !empty($ctf7_id)) : 
    // Rate star
    $widget->add_render_attribute( 'rate_star', 'class', 'cms-cf7-star'); 
    $widget->add_render_attribute( 'rate_star', 'style', 'background-color:'.$widget->get_setting('rate_star_bg', '#ff830c')); 
?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 bg-white p-20 p-lg-30 p-xl-50 relative">
        <div class="cms-cf7-inner">
            <div class="cms-form-heading cms-heading text-24 font-700 mt-n8 pb-8"><?php echo esc_html($widget->get_setting('form_title','Request An Estimate')); ?></div>
            <div class="cms-form-desc text-15 lh-25 pt-10"><?php echo esc_html($widget->get_setting('form_desc', 'For a cleaning that meets your highest standards, you need a dedicated team of trained specialists with all supplies needed to thoroughly clean your home.')); ?></div>
            <div class="pt-25"><?php 
                echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
            ?></div>
        </div>
        <?php if($widget->get_setting('show_rate') === 'true') { ?>
            <div class="cms-cf7-rating absolute">
                <div <?php etc_print_html($widget->get_render_attribute_string( 'rate_star' )); ?>><?php
                    saniga_elementor_image_render($settings, [
                        'id'          => 'rate_star',
                        'default_img' => get_template_directory_uri().'/assets/images/icons/star-three.png'
                    ]);
                ?></div>
                <div class="cms-badge-3">
                    <div class="cms-heading text-white text-22"><?php 
                        echo esc_html($widget->get_setting('rate_value')['size'].$widget->get_setting('rate_value')['unit']);
                    ?></div>
                    <div class=""><?php 
                        echo esc_html($widget->get_setting('rate_text', 'Customer Rating'));
                    ?></div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php endif;