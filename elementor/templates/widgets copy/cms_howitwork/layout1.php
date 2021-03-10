<div class="cms-howitwork relative">
    <div class="row justify-content-between cms-howitwork-img">
    <?php
        saniga_image_by_size([
            'id'      => $settings['image_l']['id'],
            'size'    => '750x620',
            'class'   => 'cms-radius-tr-16',
            'default' => true,
            'before'  => '<div class="img-left col-6 opacity-0"><div class="pr-35">',
            'after'   => '</div></div>'
        ]);
        saniga_image_by_size([
            'id'      => $settings['image_r']['id'],
            'size'    => '570',
            'class'   => 'cms-radius-bl-16 opacity-0',
            'default' => true,
            'before'  => '<div class="img-right col-6 align-self-end text-end" style="padding-top:230px;"><div style="padding-left:215px;"><div class="cms-howitwork-r-img cms-radius-bl-16" style="background-image:url('.saniga_get_image_url_by_size([
                    'id'            => $settings['image_r']['id'],
                    'size'          => 'full',
                    'default_thumb' => true
                ]).');">',
            'after'   => '</div></div></div>'
        ]);
    ?>
    </div>
    <div class="cms-howitwork-content">
        <div class="cms-howitwork-content-inner">
            <?php if(isset($settings['step']) && !empty($settings['step']) && count($settings['step'])): ?>
                <div class="cms-howitwork-sliders cms-slick-nav-style-long-arrow">
                    <div class="cms-howitwork-slider">
                        <?php foreach ($settings['step'] as $value): ?>
                            <div class="cms-howitwork-item cms-slick-slide slick-slide relative">
                                <?php
                                    if(empty($value['image']['id'])) $value['image']['id'] = $settings['image_l']['id'];
                                    saniga_image_by_size([
                                        'id'      => $value['image']['id'],
                                        'size'    => '750x620',
                                        'class'   => 'cms-radius-tr-16 opacity-0',
                                        'default' => true,
                                        'before'  => '<div class="cms-howitwork-item-img cms-radius-tr-16" style="background-image:url('.saniga_get_image_url_by_size([
                                            'id'            => $value['image']['id'],
                                            'size'          => 'full',
                                            'default_thumb' => true
                                        ]).');">',
                                        'after'   => '</div>'
                                    ]);
                                ?>
                                <div class="cms-howitwork-item-content bg-white p-15 p-lr-xl-100 pt-xl-80 pb-xl-90 p-lg-50 p-md-30">
                                    <div class="text-accent text-16 font-700 pb-5 empty-none"><?php
                                        etc_print_html($value['title']);
                                    ?></div>
                                    <div class="cms-heading text-24 text-lg-40 pb-15 empty-none"><?php
                                        etc_print_html($value['sub_title']);
                                    ?></div>
                                    <div class="text-16 empty-none"><?php 
                                        etc_print_html($value['description']); 
                                    ?></div>
                                    <div class="cms-slick-arrows"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['rating_rated']) || !empty($settings['rating_text'])) : ?>
            <div class="cms-howitwork-rating bg-white cms-radius-bl-16 ml-auto pt-40 pb-35 p-lr-15 p-lr-lg-50">
                <div class="row">
                    <?php if(!empty($settings['rating_rated'])) : ?>
                        <div class="col-12 col-lg-auto">
                            <span class="cms-howitwork-star cmsi-"></span>
                        </div>
                    <?php endif; ?>
                    <div class="col col-xl-6">
                        <span class="cms-howitwork-rated text-accent font-700"><?php 
                            etc_print_html($settings['rating_rated']);
                        ?></span>
                        <span><?php
                            etc_print_html($settings['rating_text']);
                        ?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

