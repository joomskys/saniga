<?php
	$copyright_text = $widget->get_setting('copyright_text' , '');
	// Attribute
	$widget->add_render_attribute( 'atts', 'class', 'cms-copyright-text');
	$widget->add_render_attribute( 'atts', 'class', saniga_elementor_align_class($settings));
	$widget->add_render_attribute( 'atts', 'class', 'text-'.$widget->get_setting('copyright_color','body'));
	//$widget->add_render_attribute( 'atts', 'class', 'link-'.$widget->get_setting('link_color','accent'));
	//$widget->add_render_attribute( 'atts', 'class', 'link-hover-'.$widget->get_setting('link_hover_color','secondary'));
	$link_color = 'link-'.$widget->get_setting('link_color','accent');
	$link_hover_color = 'link-hover-'.$widget->get_setting('link_hover_color','secondary');
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'atts' )); ?>>
	<?php echo saniga_default_copyright_text($copyright_text, [
		'link_color'       => $link_color,
		'link_hover_color' => $link_hover_color
	]); ?>
</div>