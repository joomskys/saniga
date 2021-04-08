<?php
// Wrap Class
$widget->add_render_attribute( 'wrap', 'class', 'cms-cta-wrap font-700');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings, ['default' => 'center']));

// Heading
$heading = $widget->get_setting('heading_text', 'For a cleaning that meets your highest standards, you need to');
$widget->add_render_attribute( 'heading', 'class', 'cms-cta-title text-'.$widget->get_setting('heading_color','body'));
// Hyper link
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
	<div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>><?php
		etc_print_html($heading);
		saniga_elementor_hyperlink_render($settings, [
			'prefix'    => 'link1',
			'tag'		=> 'span',
			'link_text' => 'Contact Us Quickly!!',
			'default_icon'     => [
                'value'   => '',
                'library' => ''
            ]
		]);
	?></div>
</div>