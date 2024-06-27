<?php

/*********************************************************************
 * Function insert ad code to middle of single post
 *********************************************************************/
add_filter( 'the_content', 'db_values_between_post_ads' );
if ( ! function_exists( 'db_values_between_post_ads' ) ) :
	function db_values_between_post_ads( $content ) {
		
		$ad_code = get_theme_mod( 'middle_post_ad_code' );
		
		if ( is_single() && ! is_admin() && get_post_type() === 'post' ) {
			return db_insert_between_post_ads( $ad_code, $content );
		}
		
		return $content;
	}
endif;

if ( ! function_exists( 'db_insert_between_post_ads' ) ) :
	function db_insert_between_post_ads( $insertion, $content ) {
		$closing_p = '</p>';
		$paragraphs = explode( $closing_p, $content );
		
		// floor or ceil; to make it round
		$mid = ceil(count($paragraphs) / 3);
		
		foreach ($paragraphs as $index => $paragraph) {
			if ( trim( $paragraph ) ) {
				$paragraphs[$index] .= $closing_p;
			}
			if ( $mid == $index + 1 ) {
				$paragraphs[$index] .= $insertion;
			}
		}
		return implode( '', $paragraphs );
	}
endif;


/*********************************************************************
 * Function insert ad code to bottom of single post
 *********************************************************************/
add_filter( 'the_content', 'db_values_bottom_post_ads' );
if ( ! function_exists( 'db_values_bottom_post_ads' ) ) :
        function db_values_bottom_post_ads( $content ) {

                $ad_code = get_theme_mod( 'bottom_post_ad_code' );

                if ( is_single() && ! is_admin() && get_post_type() === 'post' ) {
			$content = $content.$ad_code;
                }

                return $content;
        }
endif;
