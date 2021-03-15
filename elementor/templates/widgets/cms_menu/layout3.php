<?php
	$heading_text = $widget->get_setting('heading_text' , '');
	// Heading
	$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-16 font-700 mb-35');
	$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','secondary'));
	// link
	$link_color = $widget->get_setting('link_color', 'white');
	$link_color_hover = $widget->get_setting('link_hover_color', 'secondary');
?>
<div class="cms-menu-wraps relative">
	<?php if(!empty($heading_text)){ ?>
		<div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php echo esc_html($heading_text); ?></div>
	<?php } 
		wp_nav_menu(array(
			'fallback_cb'          => '',
			'menu'                 => $settings['menu'],
			'menu_class'           => 'cms-menu cms-menu-horz text-14 '.saniga_elementor_row_justify_class($settings),
			'container_aria_label' => $heading_text,
			'before' 			   => '<span class="text-'.$link_color.' link-hover-'.$link_color_hover.'">',
			'after'				   => '</span>',		
			'link_before'		   => '<span class="menu-icon"></span>',
			'theme_location'       => ''
	    ));
	?>
</div>