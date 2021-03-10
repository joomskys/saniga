<?php
$default_settings = [
    'ctf7_id' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = etc_get_element_id($settings);
if(class_exists('WPCF7') && !empty($ctf7_id)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="cms-cf7 overflow-hidden bg-white p-20 p-lg-30 p-xl-50 cms-radius-16 cms-shadow-3">
        <div class="cms-cf7-inner"><?php 
            if(!empty($settings['form_title'])){ ?>
                <div class="cms-form-heading cms-heading text-24 font-500 mt-n12"><?php echo esc_html($settings['form_title']); ?></div>
            <?php }
                if(!empty($settings['form_desc'])){ ?>
                <div class="cms-form-desc text-15 lh-26 pt-10"><?php echo esc_html($settings['form_desc']); ?></div>
            <?php } ?>
            <div class="pt-20"><?php 
                echo do_shortcode('[contact-form-7 id="'.esc_attr( $ctf7_id ).'"]'); 
            ?></div>
        </div>
    </div>
<?php endif;