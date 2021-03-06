<?php

class tournament_signup extends WP_Widget {


    /** constructor -- name this the same as the class above */
    function tournament_signup() {
        parent::WP_Widget(false, $name = 'Tournament Action - Signup');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        global $wp_query, $post;

        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        ?>
        <?php if(!isset($wp_query->query_vars['signup']) && get_field('signup_closed') !== true): ?>

            <?php echo $before_widget; ?>

                    <a href="<?php the_permalink(); ?>/signup" class='custom-button'><span>Signup to tournament</span></a>

            <?php echo $after_widget; ?>

        <?php endif; ?>


    <?php
    }

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['message'] = strip_tags($new_instance['message']);
        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

        //todo add default to stop notice errors

        $title 		= esc_attr($instance['title']);
        $message	= esc_attr($instance['message']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
    <?php
    }


}
add_action('widgets_init', create_function('', 'return register_widget("tournament_signup");'));