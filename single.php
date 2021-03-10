<?php
/**
 * The template for displaying all single posts
 *
 * @package Saniga
 */
get_header();
?>
<div class="container cms-content-container">
    <div class="row cms-content-row">
        <div id="cms-content-area" class="<?php saniga_content_css_class(['content_col'=> 'single_content_col','sidebar_pos' => 'single_sidebar_pos']); ?>">
            <?php
                while ( have_posts() )
                {
                    the_post();
                    get_template_part( 'template-parts/content-single/content', get_post_format() );
                    if ( comments_open() || get_comments_number() )
                    {
                        comments_template();
                    }
                }
            ?>
        </div>
        <?php saniga_sidebar(['content_col'=> 'single_content_col','sidebar_pos' => 'single_sidebar_pos', 'class' => 'pl-xl-55']); ?>
    </div>
</div>
<?php
get_footer();
