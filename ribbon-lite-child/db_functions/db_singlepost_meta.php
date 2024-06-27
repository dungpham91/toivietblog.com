<?php

/**
 * Function get post view count number
 */
if ( ! function_exists( 'db_get_post_view' ) ) :
    function db_get_post_view($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 Lượt xem";
        }
        else if ( $count == '1' ) {
            return "1 Lượt xem";
        }
        return $count.' Lượt xem';
    }
endif;

if ( ! function_exists( 'db_set_post_view' ) ) :
    function db_set_post_view($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
endif;

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);