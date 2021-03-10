<?php 
	$search_placeholder = $widget->get_setting('search_text', esc_html__('Search Keywords&hellip;', 'saniga'));
	$icon_color = $widget->get_setting('search_icon_color', 'primary');
?>
<div class="cms-e-search-wrap">
	<form role="search" method="get" class="cms-e-search-form relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="cms-e-search-field" placeholder="<?php echo esc_attr( $search_placeholder ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="cms-e-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'saniga' ); ?>">
			<?php saniga_elementor_icon_render($settings, [
				'tag' => 'span',
				'class' => 'text-'.$icon_color
			]); ?>
		</button>
	</form>
</div>