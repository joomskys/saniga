<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Saniga
 */
get_header();
if(is_singular('product')){
	$content_col = 'product_single_content_col';
	$sidebar_pos = 'product_single_sidebar_pos';
} else {
	$content_col = 'product_page_content_col';
	$sidebar_pos = 'product_page_sidebar_pos';
}
?>
<div class="container cms-content-container">
    <div class="row cms-content-row gutters-60">
        <div id="cms-content-area" class="<?php saniga_content_css_class(['content_col'=> $content_col,'sidebar_pos' => $sidebar_pos]); ?>"><?php 
        	woocommerce_content(); 
        ?></div>
        <?php saniga_sidebar(['content_col'=> $content_col,'sidebar_pos' => $sidebar_pos, 'class' => 'cms-sidebar-shop']); ?>
    </div>
</div>
<?php
get_footer();
