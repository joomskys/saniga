<?php
	$heading_text = $widget->get_setting('heading_text' , 'Services We Offer');
	// Heading
	$widget->add_render_attribute( 'heading', 'class', 'cms-heading text-20 mt-n15 mb-25');
	$widget->add_render_attribute( 'heading', 'class', 'text-'.$widget->get_setting('heading_color','primary'));
	// link
	$link_color       = $widget->get_setting('link_color', 'white');
	$link_color_hover = $widget->get_setting('link_hover_color', 'white');
	// background
	$bg_color       = $widget->get_setting('link_bg_color', 'primary');
	$bg_hover_color = $widget->get_setting('link_bg_hover_color', 'accent');
?>
<div class="cms-menu-wraps bg-white cms-shadow-1 p-tb-50 p-lr-25 p-lr-lg-50 relative">
	<div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php echo esc_html($heading_text); ?></div>
	<?php 
		wp_nav_menu(array(
			'fallback_cb'          => '',
			'menu'                 => $settings['menu'],
			'menu_class'           => 'cms-menu cms-menu-ver font-700',
			'container_aria_label' => $heading_text,
			'before' 			   => '<div class="link-'.$link_color.' link-hover-'.$link_color_hover.' bg-'.$bg_color.' bg-hover-'.$bg_hover_color.' cms-transition">',
			'after'				   => '</div>',		
			'link_before'		   => '<span class="cmsi-arrow-right rtl-flip text-12 pr-8"></span>',
			'theme_location'       => ''
	    ));
	?>
</div>