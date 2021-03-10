<div class="cms-slick-sliders">
    <?php saniga_slick_slider_arrows_top($settings); ?>
    <div class="cms-slick-slider-wrap">
        <div <?php saniga_slick_slider_settings($widget); ?>>
            <?php 
            foreach ($settings['career_list'] as $value) { 
                    $job_type    = !empty($value['job_type']) ? $value['job_type'] : 'Full Time';
                    $job_address = !empty($value['job_address']) ? $value['job_address'] : 'New York';
                    $title       = !empty($value['title']) ? $value['title'] : 'Chief Executive Officer';
                    $description = !empty($value['description']) ? $value['description'] : 'A chief executive officer (CEO) is the highest-ranking executive in a company, and their primary responsibilities include making major corporate decisions.';
                ?>
                <div class="cms-career-item cms-slick-slide slick-item slick-slide">
                    <div class="cms-career-item-inner bg-white cms-radius-8 p-20 p-lg-40 cms-shadow-4 <?php echo saniga_elementor_align_class($settings);?>">
                        <div class="row gutters-15 align-items-center text-13">
                            <div class="col-auto"><div class="job-type"><?php etc_print_html($job_type); ?></div></div>
                            <div class="col-auto"><div class="job-address"><?php etc_print_html($job_address); ?></div></div>
                        </div>
                        <div class="cms-heading job-title text-20 pt-30"><?php
                            //etc_print_html($title);
                            saniga_elementor_button_link_render($value, ['text' => $title])
                        ?></div> 
                        <div class="job-desc pt-15"><?php
                            etc_print_html($description);
                        ?></div>
                        <?php  
                            saniga_elementor_button_render($value,[
                                'class' => 'mt-30'
                            ]);
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php 
        saniga_slick_slider_dots($settings); 
        saniga_slick_slider_arrows($settings);
        saniga_slick_slider_arrows_side($settings);
    ?>
</div>