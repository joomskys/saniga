<?php
// Wrap Class
$widget->add_render_attribute( 'wrap', 'class', 'cms-cta-wrap font-700');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings));

// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-cta-title text-'.$widget->get_setting('heading_color',''));
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
		<span <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
			saniga_elementor_icon_render($settings,[
				'id'         => 'heading_icon',
				'tag'        => 'span',
				'wrap_class' => '',
				'class'      => ''
			]);
			printf('<span>%s</span>', $widget->get_setting('heading_text','This is the heading')); 
		?>&nbsp;</span> 
	<?php
		$btn_class = 'd-inline-block';
		if($settings['btn_type'] === 'just-link') $btn_class .= ' btn-underline';
		saniga_elementor_button_render($settings, ['wrap' => false, 'btn_class' => $btn_class]);
?></div>