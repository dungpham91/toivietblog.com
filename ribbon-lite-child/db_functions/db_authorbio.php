<?php

/*********************************************************************
 * Function add social field for the author bio
 *********************************************************************/
if ( ! function_exists('db_change_contact_info') ) :
	function db_change_contact_info ( $contactmethods ) {
	    unset($contactmethods['aim']);
	    unset($contactmethods['yim']);
	    unset($contactmethods['jabber']);
        $contactmethods['facebook_profile']     = 'Facebook profile URL';
        $contactmethods['twitter_profile']      = 'Twitter profile URL';
        $contactmethods['gplus_profile']        = 'Google+ profile URL';
        $contactmethods['linkedin_profile']     = 'Linkedin profile URL';
        $contactmethods['instagram_profile']    = 'Instagram profile URL';
	    return $contactmethods;
	}
	add_filter('user_contactmethods','db_change_contact_info',10,1);
endif;


/*********************************************************************
 * Function display author informations to author box
 *********************************************************************/
if ( ! function_exists('db_author_box') ) :
	function db_author_box () {
        $authsocial = null;
        $authinfo   = null;
	    $facebook   = get_the_author_meta ('facebook_profile');
	    $twitter    = get_the_author_meta ('twitter_profile');
	    $gplus      = get_the_author_meta ('gplus_profile');
		$linkedin   = get_the_author_meta ('linkedin_profile');
		$instagram  = get_the_author_meta ('instagram_profile');
	    $flength = strlen ($facebook);
	    $tlength = strlen ($twitter);
	    $glength = strlen ($gplus);
	    $llength = strlen ($linkedin);
	    $ilength = strlen ($instagram);

	    $authsocial .= '<ul>';
	    if ($flength > 1) {
	        $authsocial .= '<li>' . '<a class="ribbon-icon icon-facebook author-facebook" href="' . $facebook . '" target="_blank" rel="external" title="' . get_the_author_meta('display_name') . ' on Facebook' . '">' . '</a></li>';
	    }
	    if ($tlength > 1) {
		    $authsocial .= '<li>' . '<a class="ribbon-icon icon-twitter author-twitter" href="' . $twitter . '" target="_blank" rel="external" title="' . get_the_author_meta('display_name') . ' on Twitter' . '">' . '</a></li>';
	    }
	    if ($glength > 1) {
		    $authsocial .= '<li>' . '<a class="ribbon-icon icon-gplus author-google-plus" href="' . $gplus . '" target="_blank" rel="external" title="' . get_the_author_meta('display_name') . ' on Google Plus' . '">' . '</a></li>';
	    }
	    if ($llength > 1) {
		    $authsocial .= '<li>' . '<a class="ribbon-icon icon-linkedin author-linkedin" href="' . $linkedin . '" target="_blank" rel="external" title="' . get_the_author_meta('display_name') . ' on Linkedin' . '">' . '</a></li>';
	    }
		if ($ilength > 1) {
			$authsocial .= '<li>' . '<a class="ribbon-icon icon-instagram author-instagram" href="' . $instagram . '" target="_blank" rel="external" title="' . get_the_author_meta('display_name') . ' on Instagram' . '">' . '</a></li>';
		}
	    $authsocial .= '</ul>';

		$authinfo .= '<div class="author-bio">';
		$authinfo .= get_avatar( get_the_author_meta ('email') , 100 );
		$authinfo .= '<div class="author-info">';
		$authinfo .= '<h4 class="author-title">' . 'Tác giả ' . get_the_author_link() . '</h4>';
		$authinfo .= '<div class="author-description">' . get_the_author_meta ('description');
		$authinfo .= ' ' . '<a class="author-link" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author">'. '>> Xem tất cả bài viết của tác giả ' . get_the_author() . '</a></div>';
		$authinfo .= '<div class="author-box-social">' . $authsocial . '</div>';
		$authinfo .= '</div></div>';

	    if ( is_single() ) {
	        echo $authinfo;
	    }
	}
endif;