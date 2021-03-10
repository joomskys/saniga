<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Saniga
 */
?>
<div class="no-results not-found">
    <div class="cms-heading h1"><?php esc_html_e( 'Nothing Found', 'saniga' ); ?></div>
    <div class="cms-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php
                printf(
                    wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'saniga' ),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
            ?></p>
        <?php elseif ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'saniga' ); ?></p>
            <?php
            get_search_form();
        else : ?>
            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'saniga' ); ?></p>
            <?php
            get_search_form();
        endif; ?>
    </div>
</div>