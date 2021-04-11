<?php 
// Wrap
$widget->add_render_attribute( 'wrap', 'class', 'cms-sliders overflow-hidden');
//$widget->add_render_attribute( 'wrap', 'style', 'max-height:'.$widget->get_setting('slider_height', '740').'px;');
// Slides list
$cms_slides = $settings['cms_slides2'];
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
<div class="cms-sliders-wrap cms-sliders-wrap-1 cms-slick-nav-in-vertical cms-slick-nav-style-default text-center">
	<div <?php etc_print_html($widget->get_render_attribute_string( 'wrap' )); ?>>
		<?php 
			$delay_time = 300;
			foreach ($cms_slides as $slide) {
				$data_id = $slide['_id'];
				// small heading 
				$small_heading_animation = !empty($slide['small_heading_animation']) ? $slide['small_heading_animation'] : 'fadeInLeft';
				$small_heading_color = !empty($slide['small_heading_color']) ? $slide['small_heading_color'] : 'white';
				// large heading
				$large_heading_animation = !empty($slide['large_heading_animation']) ? $slide['large_heading_animation'] : 'fadeInLeft';
				$large_heading_color = !empty($slide['large_heading_color']) ? $slide['large_heading_color'] : 'white';
				// description
				$description_animation = !empty($slide['description_heading_animation']) ? $slide['description_heading_animation'] : 'fadeInLeft';
				$description_color = !empty($slide['description_color']) ? $slide['description_color'] : 'white';
				// add attribute
				$widget->add_render_attribute([
					'small-heading' => [
						'class' => 'small-heading text-16 font-700 text-'.$small_heading_color.' '.$small_heading_animation
					],
					'large-heading' => [
						'class' => 'large-heading text-30 text-lg-50 text-xl-75 font-700 heading text-'.$large_heading_color.' '.$large_heading_animation
					],
					'description' => [
						'class' => 'description text-17 font-700 text-'.$description_color.' '.$description_animation
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
							<div class="row justify-content-center gutters-30 gutters-grid">
								<div class="col-xl-7">
									<div <?php etc_print_html($widget->get_render_attribute_string( 'small-heading' )); ?>><?php
										etc_print_html($slide['small_heading']);
									?></div>
									<div <?php etc_print_html($widget->get_render_attribute_string( 'large-heading' )); ?>><?php 
										etc_print_html($slide['large_heading']);
									 ?></div>
									<div <?php etc_print_html($widget->get_render_attribute_string( 'description' )); ?>><?php 
										etc_print_html($slide['description']);
									?></div>
									<div class="row gutters-40 gutters-grid pt-30 align-items-center justify-content-center">
								        <?php 
								            saniga_elementor_button_render($slide, [
								                'class'        => 'col-auto',
								                'btn_class'    => 'mw-150'
								            ]);
								            saniga_elementor_button_render($slide, [
								            	'prefix'       => 'btn2',
								                'class'        => 'col-auto',
								                'btn_class'    => 'mw-150'
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