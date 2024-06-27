<?php

/*********************************************************************
 * Function add Menu Top
 *********************************************************************/
if ( ! function_exists( 'db_add_top_menu' ) ) :
    function db_add_top_menu () {
		register_nav_menus(
			array(
			  'top' => __( 'Top', 'ribbon-lite' ),
			)
		);
    }
	add_action( 'init', 'db_add_top_menu' );
endif;