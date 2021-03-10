<?php
/**
 * The template for displaying all single CMS Footer
 *
 * @package Saniga
 */
get_header();
?>
<div class="container cms-content-container">
    <?php
        while ( have_posts() )
        {
            the_post();
            the_content();
        }
    ?>
</div>
<?php
get_footer();
