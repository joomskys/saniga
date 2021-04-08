<?php 
// Slides list
$cms_slides = $settings['cms_slides'];
$widget->add_render_attribute( 'item', 'class', 'cms-slide-item h-100');
?>
<div class="cms-sliders">
	<?php 
		foreach ($cms_slides as $slide) {
			$slide_img_url = saniga_get_image_url_by_size([
				'id'            => $slide['image']['id'],
				'default_thumb' => true,
				'default_img'   => $slide['image']['url'],
				'size'			=> 'full'
			]);
			$slide_img = saniga_elementor_image_render($slide,[
				'id' => $slide['image']['id']
			]);
			// get image
			$widget->add_render_attribute( 'item', 'style', 'background-image:url('.$slide_img_url.');', true);
			// small heading 
			$widget->add_render_attribute( 'small-heading', 'class', 'small-heading text-'.$slide['small_heading_color'].' elementor-invisible elementor elementor-'.$slide['small_heading_animation'], true);
			$widget->add_render_attribute( 'small-heading', 'data-settings', '{"animation":"'.$slide['small_heading_animation'].'"}', true);
			$widget->add_render_attribute( 'small-heading', 'style', 'transition-delay:'.$slide['small_heading_animation_delay'].'ms', true);
			// large heading
			$widget->add_render_attribute( 'large-heading', 'class', 'large-heading', true);
			$widget->add_render_attribute( 'large-heading', 'class', 'text-'.$slide['large_heading_color'], true);
			$widget->add_render_attribute( 'large-heading', 'class', 'elementor elementor-'.$slide['large_heading_animation'], true);
			$widget->add_render_attribute( 'large-heading', 'style', 'transition-delay:'.$slide['large_heading_animation_delay'].'ms', true);
			// description
			$widget->add_render_attribute( 'description', 'class', 'description', true);
			$widget->add_render_attribute( 'description', 'class', 'text-'.$slide['description_color'], true);
			$widget->add_render_attribute( 'description', 'class', 'elementor elementor-'.$slide['description_animation'], true);
			$widget->add_render_attribute( 'description', 'style', 'transition-delay:'.$slide['description_animation_delay'].'ms', true);
		?>
			<div <?php etc_print_html($widget->get_render_attribute_string( 'item' )); ?>>
				<div class="container d-flex align-items-center">
					<div <?php etc_print_html($widget->get_render_attribute_string( 'small-heading' )); ?>><?php
						etc_print_html($slide['small_heading']);
					?></div>
					<div <?php etc_print_html($widget->get_render_attribute_string( 'large-heading' )); ?>><?php 
						etc_print_html($slide['large_heading']);
					 ?></div>
					<div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
						etc_print_html($slide['description']);
					?></div>
				</div>
			</div>
		<?php
		}
	?>
</div>