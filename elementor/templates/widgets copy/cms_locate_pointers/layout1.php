<?php
$html_id = etc_get_element_id($settings);
$image_html_bg = \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'full', 'image_bg' );
?>
<div class="cms-imagepointers-wrapper cms-imagepointers-layout1 <?php echo saniga_elementor_align_class($settings);?>">
    <div class="inner-content d-inline-block">
        <?php if ( $image_html_bg ) : ?>
            <div class="img-bg rtl-flip">
                <?php etc_print_html($image_html_bg); ?>
            </div>
        <?php endif; ?>
        <?php if(isset($settings['content_list']) && !empty($settings['content_list']) && count($settings['content_list'])): ?>
            <div class="cms-imagepointers-list">
                <?php foreach ($settings['content_list'] as $key => $value):
                    $content = isset($value['content']) ? $value['content'] : '';
                    $content_hover = isset($value['content_hover']) ? $value['content_hover'] : '';
                    ?>
                    <div id="<?php echo esc_attr( $value['_id'] ); ?>" class="item-pointer <?php echo esc_attr( $content_hover ); ?> elementor-repeater-item-<?php echo esc_attr( $value['_id'] ); ?>">
                        <div class="item--inner <?php echo esc_attr($settings['cms_animate']); ?>">
                            <div class="item--image relative">
                                <?php if(!empty($value['image']['url'])) { ?>
                                    <img src="<?php echo esc_url($value['image']['url']);?>" alt="<?php echo esc_attr($content) ?>" />
                                <?php } ?>
                                <div class="cms-ripple locate-point size-22">
                                    <div class="cms-ripple-inner"></div>
                                </div>
                            </div>
                            <?php if(!empty($content)) { ?>
                                <div class="item-holder text-start">
                                    <div class="inner-holder">
                                        <div class="row gutters-20">
                                            <div class="col-auto empty-none"><?php
                                                saniga_elementor_icon_render($value, [
                                                    'class' => 'text-accent text-48'
                                                ]);
                                            ?></div>
                                            <div class="col">
                                                <div class="item--number empty-none cms-heading font-400 text-35 mt-n10"><?php 
                                                    echo esc_html($value['number']);
                                                ?></div>
                                                <div class="item--excerpt empty-none font-700 text-16"><?php 
                                                        echo wpautop($content); 
                                                ?></div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php } ?>
                       </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>