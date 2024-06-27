<?php

/*********************************************************************
 * Function add brand text prefix to begin of single post
 *********************************************************************/
if ( ! function_exists('db_add_prefix') ) :
	function db_add_prefix ( $content ) {
	    // Check if is single and not is home page
	    if ( is_single()  && !is_home() ) {
	        $prefix = get_theme_mod ( 'begin_post_prefix' );
	        $custom_content = '<p><a href="' . get_home_url () . '" title="Home Page"><strong class="db-prefix-content">' . $prefix . '</strong></a> - ';
	        $content = preg_replace('/<p([^>]+)?>/', $custom_content, $content, 1);
	    }
	    return $content;
	}
	add_filter( 'the_content', 'db_add_prefix' );
endif;


/*********************************************************************
 * Function add support box at the bottom of single post
 *********************************************************************/
if ( ! function_exists('db_insert_support_notice') ) :
	function db_insert_support_notice () { ?>
		<div class="entry-notice-support">
			<h5>If you appreciate what we share in this blog, you can support us by:</h5>
			<ol>
				<li>Stay connected to: <a href="<?php echo get_theme_mod('facebook_url_menu') ?>" title="Facebook" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-facebook-square"></i> Facebook</a> | <a href="<?php echo get_theme_mod('twitter_url_menu') ?>" title="Twitter" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-twitter-square"></i> Twitter</a> | <a href="<?php echo get_theme_mod('google_plus_url_menu') ?>" title="Google Plus" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-google-plus-square"></i> Google Plus</a> | <a href="<?php echo get_theme_mod('youtube_url_menu') ?>" title="Youtube" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-youtube-square"></i> YouTube</a></li>
				<li>Subscribe email to recieve new posts from us: <a href="<?php echo get_theme_mod('subscribe_email') ?>" title="Subcribe Email" target="_blank">Sign up now</a>.</li>
				<li>Start your own <a href="<?php echo get_theme_mod('vps_ref_link') ?>" rel="external nofollow" target="_blank">blog with SSD VPS - Free Let's Encrypt SSL</a> ($2.5/month).</li>
				<li>Become a Supporter - <a href="<?php echo get_theme_mod('donate_page_url') ?>" target="_blank">Make a contribution via PayPal</a>.</li>
				<li>Support us by <a href="<?php echo get_theme_mod('purchase_page_url') ?>" target="_blank">purchasing Ribbon Lite Child theme</a> being using on this website.</li>
			</ol>
			<p class="entry-notice-close">We are thankful for your support.</p>
		</div>
	<?php }
endif;


/*********************************************************************
 * Function display related posts inside single post, via tags
 *********************************************************************/
// Function count paragraph
if ( ! function_exists('db_count_paragraph') ) :
	function db_count_paragraph ( $insertion, $paragraph_id, $content ) {

	    $closing_p = '</p>';
	    $paragraphs = explode( $closing_p, $content );

	    foreach ($paragraphs as $index => $paragraph) {
	        if ( trim( $paragraph ) ) {
	            $paragraphs[$index] .= $closing_p;
	        }
	        if ( $paragraph_id == $index + 1 ) {
	            $paragraphs[$index] .= $insertion;
	        }
	    }
	    return implode( '', $paragraphs );
	}
endif;

// Function insert related posts inside single post
add_filter( 'the_content', 'db_insert_related_inside' );
if ( ! function_exists('db_insert_related_inside') ) :
	function db_insert_related_inside ( $content ) {

	    // Check if is single post and has tags
	    if ( is_single() && has_tag() ) {

	        // Insert related posts block after paragraph number 2
	        return db_count_paragraph( db_related_inside_post (), 2, $content );
	    }
	    return $content;
	}
endif;

// Function get related posts via tags
if ( ! function_exists('db_related_inside_post') ) :
	function db_related_inside_post () {
        $post   = null;
        $string = null;

	    $orig_post = $post;
	    global $post;

	    $tags = wp_get_post_tags($post->ID);

	    if ($tags) {
	        $tag_ids = array();
	        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	        $args = array(
	            'tag__in'               => $tag_ids,
	            'post__not_in'          => array($post->ID), // Exclude current post
	            'posts_per_page'        => 3, // Number of related posts that will be shown.
	            'ignore_sticky_posts'   => 1
	        );

	        // Create variable $related_inside_post is a new object to query post
	        $related_inside_post = new wp_query( $args );
	        if( $related_inside_post->have_posts() ) {
	            $string .= '<div class="db-related-inside">';
	            $string .= '<div class="db-related-title"><span>Bài viết liên quan</span></div><ul class="db-related-list clearfix">';

	            while( $related_inside_post->have_posts() ) {
	                $related_inside_post->the_post();
	                $string .= '<li>';
	                $string .= '<a href="' . get_permalink() . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>';
	                $string .= '</li>';
	            }
	        }
	    }
	    $post = $orig_post;
	    wp_reset_query();
	    $string .= '</ul></div>';
	    return $string;
	}
endif;


/*********************************************************************
 * Function display random posts at bottom of single post
 *********************************************************************/
if ( ! function_exists('db_rand_posts') ) :
    function db_rand_posts() {
        ?>
        <div class="db-rand-title clearfix">
            <h3 class="rand-posts-title"><?php _e('Bài viết khác', 'ribbon-lite') ?></h3>
            <i></i>
        </div>
        <?php
        $args = array(
            'post__not_in'     => get_option( 'sticky_posts' ),
            'post_type'        => 'post', // Choose type post
            'orderby'          => 'rand',
            'posts_per_page'   =>  3, // Number of random posts will display
            'post_status'      => 'publish'
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            echo '<ol class="rand-posts-list">';
            while ($the_query->have_posts()) {
                $the_query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ol>';
            /* Restore original Post Data */
            wp_reset_postdata();
        }
    }
endif;
