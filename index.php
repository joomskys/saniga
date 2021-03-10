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
?>
<div class="container cms-content-container">
    <div class="row cms-content-row gutters-xl-70">
        <div id="cms-content-area" class="<?php saniga_content_css_class(); ?>">
            <?php if ( have_posts() ) { ?>
                <div class="cms-content-archive">
                    <?php    while ( have_posts() )
                        {
                            the_post();
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called loop-post-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content' );
                        }
                    ?>
                </div>
                <?php   
                    saniga_posts_pagination();
                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
            ?>
        </div>
        <?php saniga_sidebar(['class' => '']); ?>
    </div>
</div>
<?php
get_footer();
