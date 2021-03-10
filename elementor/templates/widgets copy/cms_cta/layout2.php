<?php
// Wrap Class
$widget->add_render_attribute( 'wrap', 'class', 'cms-cta-wrap');
$widget->add_render_attribute( 'wrap', 'class', saniga_elementor_align_class($settings));

// Heading
$widget->add_render_attribute( 'heading', 'class', 'cms-cta-heading-wrap empty-none cms-heading cms-cta-heading text-19 mt-n8 mb-20');
$widget->add_render_attribute( 'heading', 'class', 'text-'.$settings['heading_color']);
if($settings['heading_color'] === 'custom' && !empty($settings['heading_custom_color'])){
    $widget->add_render_attribute( 'heading', 'style', 'color:'.$settings['heading_custom_color']);
}
?>
<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
	<div <?php etc_print_html($widget->get_render_attribute_string( 'heading' )); ?>>
		<?php
		    saniga_elementor_icon_render($settings, [
		    	'id'		 => 'heading_icon',
				'tag'        => 'span',
		    ]);
	    ?>
		<span><?php 
			etc_print_html($widget->get_setting('heading_text','Download Brochure')); 
		?></span>
	</div>
	<?php
		saniga_elementor_button_render($settings, [
			'prefix' => 'brochure1',
			'class'  => ''
		]);
		saniga_elementor_button_render($settings, [
			'prefix' => 'brochure2',
			'class'  => 'mt-20'
		]); 
	?>
</div>

 