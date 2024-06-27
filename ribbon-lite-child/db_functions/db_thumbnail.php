<?php

/*********************************************************************
 * Function add image size 70x60 for thumbnail widget in sidebar
 *********************************************************************/
if ( ! function_exists('db_add_image_size') ) :
    function db_add_image_size () {
        add_image_size( 'db-widget-thumbnail', 70, 60, true );
    }
endif;
add_action( 'after_setup_theme', 'db_add_image_size', 11 );


/*********************************************************************
 * Function auto use the first image on single post as featured image
 *********************************************************************/
if ( ! function_exists('db_autoset_featured') ) :
	function db_autoset_featured () {
	    global $post;

	    // Lấy hình ảnh thumbnail của bài viết hiện tại
	    $already_has_thumb = has_post_thumbnail($post->ID);

	    // Kiểm tra nếu bài viết chưa được thiết lập ảnh thumbnail
	    if (!$already_has_thumb) {
	        $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
	        if ($attached_image) {
	            foreach ($attached_image as $attachment_id => $attachment) {
	                set_post_thumbnail($post->ID, $attachment_id);
	            }
	        }
	    }
	}
	add_action('the_post', 'db_autoset_featured');
	add_action('save_post', 'db_autoset_featured');
	add_action('draft_to_publish', 'db_autoset_featured');
	add_action('new_to_publish', 'db_autoset_featured');
	add_action('pending_to_publish', 'db_autoset_featured');
	add_action('future_to_publish', 'db_autoset_featured');
endif;