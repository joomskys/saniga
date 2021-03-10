<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Saniga
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="cms-page" class="cms-page">
        <div class="cms-header-wraps">
            <?php 
                saniga_header_top();
                saniga_header_layout();
            ?>
        </div>
        <?php 
        	saniga_page_loading();
            saniga_page_title_layout();
        ?>
        <div id="cms-main" class="cms-main">
        	<div class="cms-main-inner">
