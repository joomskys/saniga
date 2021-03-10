<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Saniga
 */
?>
<div <?php post_class('cms-single-page clearfix'); ?>><?php 
	the_content();
?></div>
<?php 
	saniga_post_link_pages(); 
?>
