<div id="cms-footer" class="<?php saniga_footer_css_class();?>"><?php 
        do_action('saniga_before_footer');
        $footer_layout = saniga_get_opts('footer_layout', '1');
        if(!in_array($footer_layout, ['-1','0','1'])){
        	saniga_footer_elementor_builder();
	    } else {
	        saniga_footer_bottom();
	    }
	    do_action('saniga_after_footer'); 
?></div>