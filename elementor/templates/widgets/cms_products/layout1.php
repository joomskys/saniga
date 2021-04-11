<?php
    $widget->add_render_attribute( 'options', 'limit', $widget->get_setting('limit', 8));
    $widget->add_render_attribute( 'options', 'columns', $widget->get_setting('columns', ['size' => 4])['size']);
    $widget->add_render_attribute( 'options', 'orderby', $widget->get_setting('orderby'));
    $widget->add_render_attribute( 'options', 'order', $widget->get_setting('order'));
    if($widget->get_setting('featured')) $widget->add_render_attribute( 'options', 'visibility', 'featured');
    $widget->add_render_attribute( 'options', 'on_sale', $widget->get_setting('on_sale'));
    $widget->add_render_attribute( 'options', 'best_selling', $widget->get_setting('best_selling'));
    $widget->add_render_attribute( 'options', 'top_rated', $widget->get_setting('top_rated'));
    $widget->add_render_attribute( 'options', 'paginate', $widget->get_setting('paginate'));
    
    echo do_shortcode('[products '.$widget->get_render_attribute_string( 'options' ).']'); 
            