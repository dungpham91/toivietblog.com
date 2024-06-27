<?php

/*********************************************************************
 * Function create additional ad widgets
 *********************************************************************/
if ( ! function_exists( 'db_add_ads_widget' ) ) :
	function db_add_ads_widget () {	

        // Ads: Homepage loop
		register_sidebar(array(
			'name'          => __('Ads: Homepage Loop', 'ribbon-lite'),
			'description'   => __( '720x100 Ads Area', 'ribbon-lite' ),
            'id'            => 'widget-home-loop',
			'before_widget' => '<div id="%1$s" class="widget-home-loop">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		));
        
        // Ads: Homepage Under Navigation
		register_sidebar(array(
			'name'          => __('Ads: Homepage Under Navigation', 'ribbon-lite'),
			'description'   => __( '720x100 Ads Area', 'ribbon-lite' ),
			'id'            => 'widget-home-bottom',
			'before_widget' => '<div id="%1$s" class="widget-home-bottom">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		));
        
        // Ads: Single Post Top
		register_sidebar(array(
			'name'          => __('Ads: Single Post Top', 'ribbon-lite'),
			'description'   => __( '668x100 Ads Area', 'ribbon-lite' ),
            'id'            => 'widget-post-top',
			'before_widget' => '<div id="%1$s" class="widget-post-top">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		));
        
        // Ads: Single Post Bottom
		register_sidebar(array(
			'name' => __('Ads: Single Post Bottom', 'ribbon-lite'),
			'description'   => __( '668x100 Ads Area', 'ribbon-lite' ),
			'id' => 'widget-post-bottom',
			'before_widget' => '<div id="%1$s" class="widget-post-bottom">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));
        
        // Footer: Widget Info
		register_sidebar(array(
			'name' => __('Footer Info', 'ribbon-lite'),
			'description'   => __( 'Footer Info Widget Area', 'ribbon-lite' ),
			'id' => 'footer-widget-info',
			'before_widget' => '<div id="%1$s" class="footer-widget-info">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
        ));
        
        // Four Footer
        register_sidebar( array(
            'name'          => __( 'Footer 4', 'ribbon-lite' ),
            'description'   => __( 'Four footer column', 'ribbon-lite' ),
            'id'            => 'footer-four',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

	}
	add_action( 'widgets_init', 'db_add_ads_widget' );
endif;


/*********************************************************************
 * Function create widget recent posts with smaill thumbnail 70x60
 *********************************************************************/
class DB_Recent_Posts_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'db-recent-posts', // Base ID
            esc_html__( 'DB Recent Posts', 'ribbon-lite' ), // Name
            array( 'description' => esc_html__( 'Display recent posts with small thumbnail 70x60', 'ribbon-lite' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget ( $args, $instance ) {
        extract($args, EXTR_SKIP);
        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        if (!empty($title))
            echo $before_title . $title . $after_title;;

        $rand_query_posts = new WP_Query( array(
            'post__not_in'     => get_option( 'sticky_posts' ),
            'posts_per_page'   => 4,
            'post_status'      => 'publish'
        ) );

        if (have_posts()) :
            echo '<ul class="widget-recent-posts">';
            while ( $rand_query_posts->have_posts() ) : $rand_query_posts->the_post();
                echo '<li class="recent-posts-item">';
                echo '<div class="recent-posts-thumbnail"><a href="'.get_permalink().'">';
                echo the_post_thumbnail('db-widget-thumbnail').'</a></div>';
                echo '<div class="recent-posts-title"><a href="'.get_permalink().'">'.get_the_title().'</a><div class="tab-time">' . get_the_date() . '</div></div>';
                // echo '<div class="random-posts-meta">'.get_the_date().' - '.get_comments_number().' comment'.'</div>'; //.do_shortcode("[post_date]");
                echo '</li>';
            endwhile;
            echo "</ul>";
        endif;
        wp_reset_postdata();
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form ( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }
}

function db_create_recent_posts_widget () {
	register_widget("DB_Recent_Posts_Widget");
}
add_action( 'widgets_init', 'db_create_recent_posts_widget' );


/*********************************************************************
 * Function create widget random posts with smaill thumbnail 70x60
 *********************************************************************/
class DB_Random_Posts_Widget extends WP_Widget {
    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'db-random-posts', // Base ID
            esc_html__( 'DB Random Post', 'ribbon-lite' ), // Name
            array( 'description' => esc_html__( 'Display random posts with small thumbnail 70x60', 'ribbon-lite' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget ( $args, $instance ) {
        extract($args, EXTR_SKIP);
        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
        if (!empty($title))
            echo $before_title . $title . $after_title;;


        $rand_query_posts = new WP_Query( array(
            'post__not_in'     => get_option( 'sticky_posts' ),
            'posts_per_page'   => 4,
            'orderby'          => 'rand',
            'post_status'      => 'publish'
        ) );

        if (have_posts()) :
            echo '<ul class="widget-random-posts">';
            while ( $rand_query_posts->have_posts() ) : $rand_query_posts->the_post();
                echo '<li class="random-posts-item">';
                echo '<div class="random-posts-thumbnail"><a href="'.get_permalink().'">';
                echo the_post_thumbnail('db-widget-thumbnail').'</a></div>';
                echo '<div class="random-posts-title"><a href="'.get_permalink().'">'.get_the_title().'</a><div class="tab-time">' . get_the_date() . '</div></div>';
                // echo '<div class="random-posts-meta">'.get_the_date().' - '.get_comments_number().' comment'.'</div>'; //.do_shortcode("[post_date]");
                echo '</li>';
            endwhile;
            echo "</ul>";
        endif;
        wp_reset_postdata();

        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form ( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update ( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }
}

function db_create_random_posts_widget () {
	register_widget("DB_Random_Posts_Widget");
}
add_action( 'widgets_init', 'db_create_random_posts_widget' );
