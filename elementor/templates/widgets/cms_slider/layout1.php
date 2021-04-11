<?php 
// Wrap
$widget->add_render_attribute( 'wrap', 'class', 'cms-sliders overflow-hidden');
//$widget->add_render_attribute( 'wrap', 'style', 'max-height:'.$widget->get_setting('slider_height', '740').'px;');
// Slides list
$cms_slides = $settings['cms_slides'];
$widget->add_render_attribute( 'item', 'class', 'cms-slide-item h-100 relative');
// Slide content
$widget->add_render_attribute( 'item-content', 'class', 'cms-slide-comtent cms-overlay d-flex align-items-center');
// Slide content inner 
$widget->add_render_attribute( 'item-content-inner', 'class', $widget->get_setting('content_width', 'container'));
$widget->add_render_attribute( 'item-content-inner', 'class', 'd-flex align-items-center');
// Rate star
$widget->add_render_attribute( 'rate_star', 'class', 'cms-rate-star text-center'); 
$widget->add_render_attribute( 'rate_star', 'style', 'background-color:'.$widget->get_setting('rate_star_bg', '#ff830c')); 
?>
<div class="cms-sliders-wrap cms-sliders-wrap-1 cms-slick-nav-in-vertical cms-slick-nav-style-default">
	<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
		<?php 
			$delay_time = 300;
			foreach ($cms_slides as $slide) {
				$data_id = $slide['_id'];
				// small heading 
				//$widget->add_render_attribute( 'small-heading', 'data-id', $data_id, true);
				$small_heading_animation = !empty($slide['small_heading_animation']) ? $slide['small_heading_animation'] : 'fadeInLeft';
				//small_heading_animation_delay = !empty($slide['small_heading_animation_delay']) ? $slide['small_heading_animation_delay'] : $delay_time;
				$small_heading_color = !empty($slide['small_heading_color']) ? $slide['small_heading_color'] : 'white';
				//$widget->add_render_attribute( 'small-heading', 'class', 'elementor-element small-heading text-16 font-700 cms-animate elementorx/invisible text-'.$small_heading_color, true);
				//$widget->add_render_attribute( 'small-heading', 'class', 'text-'.$slide['small_heading_color'], true);
				//$widget->add_render_attribute( 'small-heading', 'class', 'animated '.$slide['small_heading_animation']);
				//$widget->add_render_attribute( 'small-heading', 'data-settings', '{"_animation":"'.$small_heading_animation.'"}', true);
				//$widget->add_render_attribute( 'small-heading', 'style', 'animation-delay:'.$small_heading_animation_delay.'ms', true);
				
				// large heading
				//$widget->add_render_attribute( 'large-heading', 'data-id', $data_id, true);
				$large_heading_animation = !empty($slide['large_heading_animation']) ? $slide['large_heading_animation'] : 'fadeInLeft';
				//$large_heading_animation_delay = !empty($slide['large_heading_animation_delay']) ? $slide['large_heading_animation_delay'] : $delay_time;
				$large_heading_color = !empty($slide['large_heading_color']) ? $slide['large_heading_color'] : 'white';
				//$widget->add_render_attribute( 'large-heading', 'class', 'large-h?eading text-30 text-lg-50 text-xl-75 font-700 heading cms-animate elementorx/invisible text-'.$large_heading_color. ' '.$large_heading_animation, true);
				//$widget->add_render_attribute( 'large-heading', 'class', 'text-'.$slide['large_heading_color']);
				//$widget->add_render_attribute( 'large-heading', 'class', 'animated '.$slide['large_heading_animation']);
				//$widget->add_render_attribute( 'large-heading', 'data-settings', '{"animation":"'.$large_heading_animation.'"}', true);
				//$widget->add_render_attribute( 'large-heading', 'style', 'animation-delay:'.$large_heading_animation_delay.'ms', true);
				// description
				//$widget->add_render_attribute( 'description', 'data-id', $data_id, true);
				$description_animation = !empty($slide['description_heading_animation']) ? $slide['description_heading_animation'] : 'fadeInLeft';
				//$description_heading_animation_delay = !empty($slide['description_heading_animation_delay']) ? $slide['description_heading_animation_delay'] : $delay_time;
				$description_color = !empty($slide['description_color']) ? $slide['description_color'] : 'white';
				//$description_color = empty($slide['description_color']) ? $slide['description_color'] : 'white';
				//$widget->add_render_attribute( 'description', 'class', 'description text-16 font-700 cms-animate elementorx/invisible text-'.$description_color. ' '.$description_heading_animation, true);
				//$widget->add_render_attribute( 'description', 'class', 'text-'.$slide['description_color']);
				//$widget->add_render_attribute( 'description', 'class', 'animated '.$slide['description_animation']);
				//$widget->add_render_attribute( 'description', 'data-settings', '{"animation":"'.$description_heading_animation.'"}', true);
				//$widget->add_render_attribute( 'description', 'style', 'animation-delay:'.$description_heading_animation_delay.'ms', true);
				$widget->add_render_attribute([
					'small-heading' => [
						'class' => 'small-heading text-16 font-700 text-'.$small_heading_color.' '.$small_heading_animation
					],
					'large-heading' => [
						'class' => 'large-heading text-30 text-lg-50 text-xl-75 font-700 heading text-'.$large_heading_color.' '.$large_heading_animation
					],
					'description' => [
						'class' => 'description text-16 font-700 text-'.$description_color.' '.$description_animation
					]
				]);
			?>
				<div <?php etc_print_html($widget->get_render_attribute_string( 'item' )); ?>>
					<div class="cms-slide-img h-100">
						<img src="<?php echo esc_url($slide['image']['url']);?>" alt="<?php echo get_bloginfo('name');?>" class="w-100 h-100 img-cover" />
						<div class="cms-slide-img-overlay cms-overlay"></div>
					</div>
					<div <?php etc_print_html($widget->get_render_attribute_string( 'item-content' )); ?>>
						<div <?php etc_print_html($widget->get_render_attribute_string( 'item-content-inner' )); ?>>
							<div class="row justify-content-between gutters-30 gutters-grid">
								<div class="col-lg-8 col-xl-7">
									<div <?php etc_print_html($widget->get_render_attribute_string( 'small-heading' )); ?>><?php
										etc_print_html($slide['small_heading']);
									?></div>
									<div <?php etc_print_html($widget->get_render_attribute_string( 'large-heading' )); ?>><?php 
										etc_print_html($slide['large_heading']);
									 ?></div>
									<div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
										etc_print_html($slide['description']);
									?></div>
									<div class="row gutters-40 gutters-grid pt-30 align-items-center jusity-content-start">
								        <?php 
								            saniga_elementor_button_render($slide, [
								                'class'        => 'col-auto'
								            ]);
								            if(!empty($slide['video_link']['url'])) {
								        ?>
								        <div class="col-auto">
								            <div class="row align-items-center">
								                <div class="col-auto">
								                    <a class="cms-popup cms-video-1" href="<?php echo esc_url($slide['video_link']['url']);?>"><span class="cmsi cmsi-play"></span></a>
								                </div>
								                <div class="col font-700 cms-heading-desc text-<?php echo esc_attr($description_color) ?>">
								                    <?php etc_print_html($slide['video_text']); ?>
								                </div>
								            </div>
								        </div>
								        <?php } ?>
								    </div>
								</div>
								<div class="col-lg-4 col-xl-3 relative cms-hidden-md">
									<div class="bg-white relative p-50">
										<?php 
											saniga_elementor_icon_render($slide,[
												'id'   => $slide['description2_icon'],
												'loop' => true,
												'class' => 'text-80 text-accent mb-30'
											]);
										?>
										<div class="text-17 font-700 text-heading"><?php 
											etc_print_html($slide['description2']);
										?></div>
										<?php if($widget->get_setting('show_rate') === 'true') { ?>
								            <div class="cms-slide-rating absolute">
								                <div <?php etc_print_html($widget->get_render_attribute_string( 'rate_star' )); ?>><?php
								                    saniga_elementor_image_render($settings, [
								                        'id'          => 'rate_star',
								                        'default_img' => get_template_directory_uri().'/assets/images/icons/star-three.png',
								                        'class'   => 'cms-rate-star'
								                    ]);
								                ?></div>
								                <div class="cms-badge-3">
								                    <div class="cms-heading text-white text-22"><?php 
								                        echo esc_html($widget->get_setting('rate_value')['size'].$widget->get_setting('rate_value')['unit']);
								                    ?></div>
								                    <div class=""><?php 
								                        echo esc_html($widget->get_setting('rate_text', 'Customer Rating'));
								                    ?></div>
								                </div>
								            </div>
								        <?php } ?>
								        <div class="cms-slide-dots cms-slide-dots-layer mt-20"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			}
		?>
	</div>
	<div class="cms-slick-dots-color-hover-white"><div class="cms-slide-dots cms-slide-dots-main"></div></div>
	<div class="cms-slide-arrows"></div>
</div>