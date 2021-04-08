<?php 
    // wrap
    $widget->add_render_attribute( 'item', 'class', 'cms-pricing-table-slide-item relative');
    // item title 
    $widget->add_render_attribute( 'item-title', 'class', 'cms-heading text-heading text-37 font-700 mb-20');
    // item desc
    $widget->add_render_attribute( 'item-desc', 'class', 'cms-desc text-17 mb-30');
    // Item feature
    $widget->add_render_attribute( 'item-feature', 'class', 'cms-feature row text-heading font-700 mb-30');
    $items = $settings['pricing_list'];
    // item price
    $widget->add_render_attribute( 'item-price', 'class', 'cms-price cms-heading font-500 col-auto');

    // RTL
    $rtl = is_rtl() ? 'true' : 'false';
    $dir = is_rtl() ? 'rtl' : 'ltr';
?>
<div class="cms-pricing-table-wrap relative">
    <div class="cms-pricing-table-slide cms-shadow-1">
        <?php 
            $count = 0;
            foreach ($items as $item) {
                $count++;
                if($count%2 == 0) { $order = 'order-lg-first'; } else {$order = '';}
            // item color
            $item_color = !empty($item['item_color']) ? $item['item_color'] : 'secondary';
        ?>
        <div <?php etc_print_html($widget->get_render_attribute_string( 'item' )); ?>>
            <?php if(!empty($item['badge_text'])): ?>
                <div class="cms-badge cms-ribbon"><span class="main bg-<?php echo esc_attr($item_color);?>"><span class="triangle before bdr-<?php echo esc_attr($item_color);?>"></span><?php etc_print_html($item['badge_text']); ?><span class="triangle after bdr-<?php echo esc_attr($item_color);?>"></span></span></div>
            <?php endif; ?>
            <div class="row gutters-0">
                <div class="col-lg-6"><?php 
                    saniga_elementor_image_render($item, [
                        'id'          => 'image',
                        'custom_size' => '640x750',
                        'class'       => 'w-100 h-100 img-cover rtl-flip',
                        'default_img' => $item['image']['url']
                    ]); 
                ?></div>
                <div class="col-lg-6 bg-white <?php echo esc_attr($order); ?>">
                    <div class="p-20 p-md-50 p-lg-90">
                        <div class="pl-xl-20">
                            <?php saniga_elementor_icon_render($item, ['class' => 'text-80 mb-38 text-'.$item_color]); ?>
                            <div <?php etc_print_html($widget->get_render_attribute_string( 'item-title' )); ?>>
                                <?php etc_print_html($item['title']); ?>
                            </div> 
                            <div <?php etc_print_html($widget->get_render_attribute_string( 'item-desc' )); ?>>
                                <?php etc_print_html($item['description']); ?>
                            </div>
                            <div <?php etc_print_html($widget->get_render_attribute_string( 'item-feature' )); ?>>
                                <?php
                                    $pee = $item['pricing_list_feature_text'];
                                    $pee = preg_replace( "/\n\n+/", "\n\n", $pee );
                                    // Split up the contents into an array of strings, separated by line breaks.
                                    $pees = preg_split( '/\n\s*/', $pee, -1, PREG_SPLIT_NO_EMPTY );
                                    // Reset $pee prior to rebuilding.
                                    $pee = '';
                                    // Rebuild the content as a string, wrapping every bit with a <div>.
                                    $count_pee = 0;
                                    foreach ( $pees as $tinkle ) {
                                        $count_pee ++;
                                        $pee .= '<div class="col-md-6 col-lg-12 col-xl-6 pb-10">' . saniga_elementor_icon_render($item, ['id' => 'feature_icon', 'tag' => 'span','class' => 'text-20 pr-5 text-'.$item_color, 'echo' => false]). trim( $tinkle, "\n" ) . "</div>\n";
                                        if($count_pee%2 === 0) {
                                            $pee .= '<div class="w-100"></div>';
                                        }
                                    }
                                    etc_print_html($pee);
                                ?>
                            </div>
                            <div class="row gutters-30 gutters-md-50 gutters-grid align-items-center">
                                <?php saniga_elementor_button_render($item,[
                                    'class' => 'col-auto'
                                ]); ?>
                                <div <?php etc_print_html($widget->get_render_attribute_string( 'item-price' )); ?>>
                                    <span class="text-50"><?php echo $item['price_currency'].$item['price_value']; ?></span>
                                    <span class="text-14"><?php echo $item['price_duration'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>