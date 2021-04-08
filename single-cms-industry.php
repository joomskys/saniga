<?php
/**
 * The template for displaying all single CMS Footer
 *
 * @package Saniga
 */
get_header();
if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor( $id ) ) {
        $classes = 'elementor-container';
    }
} else {
    $classes = 'container';
}
?>
<div class="<?php echo esc_attr($classes);?> cms-content-container">
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
