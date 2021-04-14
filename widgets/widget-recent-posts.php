<?php 
defined( 'ABSPATH' ) or exit( -1 );
/**
 * Recent Posts widgets
 *
 * @package Saniga
 * @version 1.0
 */

if(!function_exists('etc_register_wp_widget')) return;
add_action( 'widgets_init', function(){
    etc_register_wp_widget( 'CMS_Recent_Posts_Widget' );
});

class CMS_Recent_Posts_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'cms_recent_posts',
            esc_html__( '*CMS Recent Posts', 'saniga' ),
            array(
                'description' => esc_attr__( 'Shows your most recent posts.', 'saniga' ),
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array $args An array of standard parameters for widgets in this theme
     * @param array $instance An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    function widget( $args, $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'     => '',
            'number'    => 4,
            'post_type' => 'post',
            'post_in'   => '',
            'layout'    => '1',
        ) );

        $title = empty( $instance['title'] ) ? '' : $instance['title'];
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        printf( '%s', $args['before_widget']);

        if(!empty($title)){
            printf( '%s %s %s', $args['before_title'] , $title , $args['after_title']);
        }

        $number = absint( $instance['number'] );
        if ( $number <= 0 || $number > 10)
        {
            $number = 4;
        }
        $post_type = $instance['post_type'];
        $post_in   = $instance['post_in'];
        $layout    = $instance['layout'];
        $sticky = '';
        if($post_in == 'featured') {
            $sticky = get_option( 'sticky_posts' );
        }
        $r = new WP_Query( array(
            'post_type'           => $post_type,
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
            'post__in'            => $sticky,
            'post__not_in'        => array(get_the_ID())
        ) );

        if ( $r->have_posts() )
        {
            echo '<div class="posts-list layout-'.esc_attr($layout).'">';

            while ( $r->have_posts() )
            {
                $r->the_post();
                global $post;
                echo '<div class="post-item row gutters-20 cms-list-item">';
                    switch ($layout) {
                        case '3':
                            break;
                        default :
                            saniga_post_media([
                                'thumbnail_size' => '80',
                                'wrap_class'     => 'col-auto',
                                'img_class'      => 'cms-radius-8',
                                'media_content'  => false
                            ]);
                        break;
                    }
                    ?>
                    <div class="cms-post-content col">
                        <?php switch ($layout) {
                            case '3':
                                printf(
                                    '<div class="cms-post-title cms-heading text-16 lh-23 font-600 text-hover-accent"><a href="%1$s" title="%2$s">%3$s</a></div>',
                                    esc_url( get_permalink() ),
                                    esc_attr( get_the_title() ),
                                    get_the_title()
                                );
                                break;
                            case '2':
                        ?>
                            <div class="row h-100">
                                <?php printf(
                                    '<div class="cms-post-title cms-heading text-16 lh-23 font-600 text-hover-accent col-12 mt-n5"><a href="%1$s" title="%2$s">%3$s</a></div>',
                                    esc_url( get_permalink() ),
                                    esc_attr( get_the_title() ),
                                    get_the_title()
                                ); ?>
                                <div class="cms-post-meta col-12 align-self-end mb-n5"><div class="cms-post-meta-inner row gutters-20">
                                    <?php saniga_post_author(['class' => 'col-auto']); ?>
                                    <?php saniga_post_comment(['class' => 'col-auto', 'text' => '','cmt_with_text' => false]); ?>
                                </div></div>
                            </div>
                        <?php
                                break;
                            
                            default:
                        ?>
                        <div class="row h-100">
                            <div class="cms-post-meta col-12 mt-n5"><?php echo saniga_post_date([
                                'show_icon'   => false, 
                                'class'       => 'text-secondary',
                                'date_format' => 'M j, Y'
                            ]); ?>
                            </div>
                            <?php printf(
                                '<div class="cms-post-title cms-heading text-16 lh-23 font-600 text-hover-accent col-12 align-self-end"><a href="%1$s" title="%2$s">%3$s</a></div>',
                                esc_url( get_permalink() ),
                                esc_attr( get_the_title() ),
                                get_the_title()
                            ); ?>
                        </div>
                        <?php
                                break;
                        } ?>
                    </div>
                </div>
            <?php }

            echo '</div>';
        }
        wp_reset_postdata();
        printf('%s', $args['after_widget']);
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array $new_instance An array of new settings as submitted by the admin
     * @param array $old_instance An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    function update( $new_instance, $old_instance )
    {
        $instance              = $old_instance;
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['number']    = absint( $new_instance['number'] );
        $instance['post_type'] = $new_instance['post_type'];
        $instance['post_in']   = $new_instance['post_in'];
        $instance['layout']    = $new_instance['layout'];
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array $instance An array of the current settings for this widget
     * @return void Echoes it's output
     **/
    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array(
            'title'         => esc_html__( 'Recent Posts', 'saniga' ),
            'post_type'     => 'post',
            'post_in'       => 'recent',
            'layout'        => '1',
            'number'        => 4,
        ) );

        $title     = $instance['title'] ? esc_attr( $instance['title'] ) : esc_html__( 'Recent Posts', 'saniga' );
        $number    = absint( $instance['number'] );
        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : '';
        $post_in   = isset($instance['post_in']) ? esc_attr($instance['post_in']) : '';
        $layout    = isset($instance['layout']) ? esc_attr($instance['layout']) : '1';

        $post_type_list = etc_get_post_type_options();
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'saniga' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_url($this->get_field_id('post_type')); ?>"><?php esc_html_e( 'Post Type', 'saniga' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_type') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_type') ); ?>">
            <?php 
                foreach ($post_type_list as $key => $value) {
                ?>
                    <option value="<?php echo esc_attr($key) ?>"<?php if( $post_type == $key ){ echo 'selected="selected"';} ?>><?php echo esc_html($value); ?></option>
                <?php
                }
            ?>
            </select>
        </p>
        <p><label for="<?php echo esc_url($this->get_field_id('post_in')); ?>"><?php esc_html_e( 'Post in', 'saniga' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_in') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_in') ); ?>">
            <option value="recent"<?php if( $post_in == 'recent' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Recent', 'saniga'); ?></option>
            <option value="featured"<?php if( $post_in == 'featured' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Featured', 'saniga'); ?></option>
         </select>
         </p>
          <p><label for="<?php echo esc_url($this->get_field_id('layout')); ?>"><?php esc_html_e( 'Layout', 'saniga' ); ?></label>
         <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('layout') ); ?>" name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>">
            <option value="1"<?php if( $layout == '1' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Default', 'saniga'); ?></option>
            <option value="2"<?php if( $layout == '2' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 2', 'saniga'); ?></option>
            <option value="3"<?php if( $layout == '3' ){ echo 'selected="selected"';} ?>><?php esc_html_e('Layout 3', 'saniga'); ?></option>
         </select>
         </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'saniga' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" />
        </p>

        <?php
    }
}
