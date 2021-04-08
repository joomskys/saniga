<div class="cms-howitwork-wrap row gutters-0">
    <?php 
        $count = 0;
        foreach ($settings['step'] as $value): 
            $count++;
    ?>
    <div class="cms-howitwork-item col-lg-3 col-md-6 text-center bg-white">
        <div class="cms-howitwork-item-inner pt-70 pb-50 p-lr-20 p-lr-lg-40">
            <?php 
                echo '<div class="box-icon bg-white text-16 font-700 text-primary">'.esc_html($count).'</div>';
                saniga_elementor_icon_render($settings, [
                    'id'           => 'choose_icon',
                    'default_icon' => [
                        'library' => 'cmsi', 
                        'value'   => 'cmsi-check'
                    ],
                    'class' => 'box-icon bg-primary text-white text-16'
                ]);
                saniga_elementor_icon_render($value, [
                    'id' =>'icon',
                    'class' => 'text-64 text-accent'
                ]);
            ?>
            <div class="cms-heading text-18 font-700 pb-20 pt-25"><?php
                etc_print_html($value['title']);
            ?></div>
            <div class="cms-description empty-none"><?php 
                etc_print_html($value['description']); 
            ?></div>
            <a <?php echo saniga_elementor_custom_link_attrs($value,[
                    'echo' => true,
                    'class' => 'btn btn-accent btn-hover-secondary'
                ]); ?>>
                <span class="cms-btn-content">
                    <span class="cms-btn-icon">
                        <span class="cmsi cmsi-arrow-right"></span>
                    </span>
                    <span class="cms-btn-text"><?php echo esc_html($widget->get_setting('readmore_text', 'Explore More')); ?></span>
                </span>     
            </a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<div class="cms-howitwork-contact row justify-content-center pt-30">
    <div class="col-xl-6 text-14 font-700 text-center">
        <?php 
            saniga_elementor_hyperlink_render($settings, [
                'prefix'       => 'contact_link',
                'link_text'    => 'Contact Us For More Information',
                'icon_align'   => 'right',
                'before'       => $widget->get_setting('contact_text', 'For a cleaning that meets your highest standards, you need a dedicated team of trained specialists. We arrive at each visit with all supplies needed to thoroughly clean your home with our extensive Cleaning Process.')
            ]);
        ?>
    </div>
</div>
                   