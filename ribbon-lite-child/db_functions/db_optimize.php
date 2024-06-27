<?php

/*********************************************************************
 * Remove wordpress meta generator version
 *********************************************************************/
remove_action('wp_head', 'wp_generator');


/*********************************************************************
 * Function remove version of JS, CSS files
 *********************************************************************/
if ( ! function_exists('db_remove_wp_ver_css_js') ) :
	function db_remove_wp_ver_css_js( $src ) {
	    if ( strpos( $src, 'ver=' ) )
	        $src = remove_query_arg( 'ver', $src );
	    return $src;
	}
	add_filter( 'style_loader_src', 'db_remove_wp_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'db_remove_wp_ver_css_js', 9999 );
endif;


/*********************************************************************
 * Function auto add defer attribute to javascript
 *********************************************************************/
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if( is_admin() ) {
		return $tag;
	}
	return str_replace( ' src', ' defer src', $tag );
}, 10, 2 );


/*********************************************************************
 * Function remove js emoji wordpress
 *********************************************************************/
// Disable the emoji's
if ( ! function_exists('db_disable_emojis') ) :
	function db_disable_emojis () {
	    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	    remove_action( 'admin_print_styles', 'print_emoji_styles' );
	    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	    add_filter( 'tiny_mce_plugins', 'db_disable_emojis_tinymce' );
	    add_filter( 'wp_resource_hints', 'db_disable_emojis_remove_dns_prefetch', 10, 2 );
	}
	add_action( 'init', 'db_disable_emojis' );
endif;

// Filter function used to remove the tinymce emoji plugin.
if ( ! function_exists('db_disable_emojis_tinymce') ) :
	function db_disable_emojis_tinymce ( $plugins ) {
	    if ( is_array( $plugins ) ) {
	        return array_diff( $plugins, array( 'wpemoji' ) );
	    } else {
	        return array();
	    }
	}
endif;

// Remove emoji CDN hostname from DNS prefetching hints.
if ( ! function_exists('db_disable_emojis_remove_dns_prefetch') ) :
	function db_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	    if ( 'dns-prefetch' == $relation_type ) {
	        /** This filter is documented in wp-includes/formatting.php */
	        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
	        $urls = array_diff( $urls, array( $emoji_svg_url ) );
	    }
	    return $urls;
	}
endif;


/*********************************************************************
 * Function limit number tags of tag cloud
 *********************************************************************/
if ( ! function_exists('db_limit_tag_cloud') ) :
	function db_limit_tag_cloud($args) {
		//Check if taxonomy option inside widget is set to tags
		if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
			$args['number'] = 10; //Limit number of tags
		}
		return $args;
	}
endif;
//Register tag cloud filter callback
add_filter('widget_tag_cloud_args', 'db_limit_tag_cloud');