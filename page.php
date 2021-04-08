<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Soapee
 */
get_header();

if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor( $id ) ) {
        $classes = 'elementor-container';
    } else {
        $classes = 'container';
    }
} else {
    $classes = 'container';
}

?>
    <div class="<?php echo esc_attr($classes);?> cms-content-container">
        <?php 
            if ( is_singular() && class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() ) ) { 
                while ( have_posts() )
                {
                    the_post();
                    the_content();
                }
            } else {
        ?>
            <div class="row cms-content-row">
                <div id="cms-content-area" class="<?php saniga_content_css_class(['content_col'=> 'page_content_col','sidebar_pos' => 'page_sidebar_pos']); ?>">
                    <?php
                        while ( have_posts() )
                        {
                            the_post();
                            get_template_part( 'template-parts/content', 'page' );
                            if ( comments_open() || get_comments_number() )
                            {
                                comments_template();
                            }
                        }
                    ?>
                </div>
                <?php saniga_sidebar(['content_col'=> 'page_content_col', 'sidebar_pos' => 'page_sidebar_pos']); ?>
            </div>
        <?php } ?>
    </div>
<?php
get_footer();