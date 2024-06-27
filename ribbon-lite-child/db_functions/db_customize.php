<?php 

/*********************************************************************
 * Function create customize panel for Google Analytic
 *********************************************************************/
if ( ! function_exists('db_google_analytic_section') ) :
	function db_google_analytic_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'google_analytic_section', array(
			'title' => __( 'Google Analytic Section', 'ribbon-lite' ),
			'priority'    => 190,
			'panel'       => 'panel_id',
			'description' => __( 'This section allows you add your Google Analytic code.', 'ribbon-lite' )
		) );
		
		// Adding setting for javascript area
		$wp_customize->add_setting( 'google_analytic_code', array(
			'default' => '',
			'sanitize_js_callback' => '',
		) );

		$wp_customize->add_control( 'google_analytic_code', array(
			'label'   => 'Add your Google Analytic code here.',
			'section' => 'google_analytic_section',
			'type'    => 'textarea',
		) );
	}
endif;
add_action('customize_register', 'db_google_analytic_section');


/*********************************************************************
 * Function manage top social url in the header
 *********************************************************************/
if ( ! function_exists('db_top_social_menu_section') ) :
	function db_top_social_menu_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'top_social_menu_section', array(
			'title' => 'Top Social Menu Section',
			'priority'    => 200,
			'panel'       => 'panel_id',
			'description' => __( 'This section allows you add url for your social channel.', 'ribbon-lite' )
		) );

		// Adding setting Facebook URL
		$wp_customize->add_setting( 'facebook_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'facebook_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'Facebook Page URL', 'ribbon-lite' ),
			'description' => __( 'Type Facebook Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.facebook.com', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting Twitter URL
		$wp_customize->add_setting( 'twitter_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'twitter_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'Twitter Page URL', 'ribbon-lite' ),
			'description' => __( 'Type Twitter Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.twitter.com', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting Linkedin URL
		$wp_customize->add_setting( 'linkedin_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'linkedin_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'Linkedin Page URL', 'ribbon-lite' ),
			'description' => __( 'Type Linkedin Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.linkedin.com', 'ribbon-lite' ),
		),
		) );

		// Adding setting Reddit URL
		$wp_customize->add_setting( 'reddit_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'reddit_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'Reddit Page URL', 'ribbon-lite' ),
			'description' => __( 'Type Reddit Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.reddit.com', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting Youtube URL
		$wp_customize->add_setting( 'youtube_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'youtube_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'Youtube Channel URL', 'ribbon-lite' ),
			'description' => __( 'Type Youtube Channel URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.youtube.com', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting RSS URL
		$wp_customize->add_setting( 'rss_url_menu', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'rss_url_menu', array(
			'type' => 'url',
			'section' => 'top_social_menu_section',
			'label' => __( 'RSS Page URL', 'ribbon-lite' ),
			'description' => __( 'Type RSS Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://feedly.com', 'ribbon-lite' ),
		),
		) );
	}
endif;
add_action('customize_register', 'db_top_social_menu_section');


/*********************************************************************
 * Function create customize panel to control text prefix begin post
 *********************************************************************/
if ( ! function_exists('db_begin_post_prefix_section') ) :
	function db_begin_post_prefix_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'begin_post_prefix_section', array(
			'title' => __( 'Begin Post Prefix Section', 'ribbon-lite' ),
			'priority'    => 210,
			'panel'       => 'panel_id',
			'description' => __( 'This section allows you set text to prefix begin of single post.', 'ribbon-lite' )
		) );
		
		// Adding setting for javascript area
		$wp_customize->add_setting( 'begin_post_prefix', array(
			'default' => 'Default Text For Begin Post Prefix',
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$wp_customize->add_control( 'begin_post_prefix', array(
			'label'   => 'Add your text for begin post prefix here.',
			'section' => 'begin_post_prefix_section',
			'type'    => 'textarea',
		) );
	}
endif;
add_action('customize_register', 'db_begin_post_prefix_section');


/*********************************************************************
 * Function add the ads javascript code in the middle of the post
 *********************************************************************/
if ( ! function_exists('db_middle_post_ad_section') ) :
	function db_middle_post_ad_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'middle_post_ad_section', array(
			'title' => __( 'Middle Post Ad Section', 'ribbon-lite' ),
			'priority'    => 220,
			'panel'       => 'panel_id',
			'description' => __( 'This section allows you to insert the javascript ad code in the middle of the single post, for example: Adsense.', 'ribbon-lite' )
		) );
		
		// Adding setting for javascript area
		$wp_customize->add_setting( 'middle_post_ad_code', array(
			'default' => '',
			'sanitize_js_callback' => '',
		) );

		$wp_customize->add_control( 'middle_post_ad_code', array(
			'label'   => 'Add javascript ad code here. Max width: 668px.',
			'section' => 'middle_post_ad_section',
			'type'    => 'textarea',
		) );
	}
endif;
add_action('customize_register', 'db_middle_post_ad_section');


/*********************************************************************
 * Function allow you add custom text/content to bottom of post
 *********************************************************************/
 
/* Function add text area section to customize panel */
if ( ! function_exists('db_bottom_content_section') ) :
	function db_bottom_content_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'bottom_content_section', array(
			'title' => 'Bottom Post Content Section',
			'priority'    => 230,
			'panel'       => 'panel_id',
			'description' => __( 'Section add a paragraph to bottom in each post.', 'ribbon-lite' )
		) );

		// Adding setting for text area
		$wp_customize->add_setting( 'text_setting', array(
			'default' => 'Default Text For Content Bottom Prefix Section',
			'sanitize_callback' => 'wp_kses_post'
		) );

		$wp_customize->add_control( 'text_setting', array(
			'label'   => 'Text Here.',
			'section' => 'bottom_content_section',
			'type'    => 'textarea',
		) );
	}
endif;
add_action('customize_register', 'db_bottom_content_section');

/* Function get text from bottom post content section */
if ( ! function_exists('db_bottom_content_display') ) :
	function db_bottom_content_display ( $content ) {
        $my_custom_text = null;

		/* If text area have content */
		if( get_theme_mod( 'text_setting') != "" ) {
			$my_custom_text = '<em class="db-bottom-text">' . get_theme_mod( 'text_setting') . '</em>';
		}

		/* If current page is single post and not is home page */
		if( is_single () && ! is_home () ) {
			$content .= $my_custom_text;
		}
		return $content;
	}
endif;
add_filter('the_content','db_bottom_content_display');


/*********************************************************************
 * Function add cutomize panel for support box at bottom post
 *********************************************************************/
if ( ! function_exists('db_support_box_section') ) :
	function db_support_box_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'support_box_section', array(
			'title' => 'Support Box Section',
			'priority'    => 240,
			'panel'       => 'panel_id',
			'description' => __( 'Section add a notice support box in single post', 'ribbon-lite' )
		) );

		// Adding setting Subscribe Email
                $wp_customize->add_setting( 'subscribe_email', array(
                        'capability' => 'edit_theme_options',
                        'sanitize_callback' => 'esc_url_raw',
                ) );

                $wp_customize->add_control( 'subscribe_email', array(
                        'type' => 'url',
                        'section' => 'support_box_section',
                        'label' => __( 'Subscribe Page Link.', 'ribbon-lite' ),
                        'description' => __( 'Type Subscribe Page URL here.', 'ribbon-lite' ),
                        'input_attrs' => array(
                        'placeholder' => __( 'https://www.danieblog.com/subscribe-email', 'ribbon-lite' ),
                ),
                ) );

		// Adding setting VPS Ref Link
		$wp_customize->add_setting( 'vps_ref_link', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'vps_ref_link', array(
			'type' => 'url',
			'section' => 'support_box_section',
			'label' => __( 'VPS Ref Link.', 'ribbon-lite' ),
			'description' => __( 'Type VPS Ref URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.vultr.com/?ref=7173479', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting Donate page URL
		$wp_customize->add_setting( 'donate_page_url', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'donate_page_url', array(
			'type' => 'url',
			'section' => 'support_box_section',
			'label' => __( 'Donate Page Link.', 'ribbon-lite' ),
			'description' => __( 'Type Donate Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.danieblog.com/donate-to-danieblog', 'ribbon-lite' ),
		),
		) );
		
		// Adding setting Purchase theme page URL
		$wp_customize->add_setting( 'purchase_page_url', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'purchase_page_url', array(
			'type' => 'url',
			'section' => 'support_box_section',
			'label' => __( 'Purchase Theme Page Link.', 'ribbon-lite' ),
			'description' => __( 'Type Purchase Theme Page URL here.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.danieblog.com/purchase-theme', 'ribbon-lite' ),
		),
		) );
	}
endif;
add_action('customize_register', 'db_support_box_section');


/*********************************************************************
 * Function add customize panel for notice privacy in comment box
 *********************************************************************/
if ( ! function_exists('db_comment_privacy_url_section') ) :
	function db_comment_privacy_url_section ( $wp_customize ) {

		//adding section in wordpress customizer
		$wp_customize->add_section( 'comment_privacy_url_section', array(
			'title' => 'Comment Privacy Notice Section',
			'priority'    => 250,
			'panel'       => 'panel_id',
			'description' => __( 'Section add link to privacy page for notice of the comment form.', 'ribbon-lite' )
		) );

		//adding setting Akismet
		$wp_customize->add_setting( 'akismet_page_url', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'akismet_page_url', array(
			'type' => 'url',
			'section' => 'comment_privacy_url_section',
			'label' => __( 'Akismet Privacy Page URL.', 'ribbon-lite' ),
			'description' => __( 'Type the link to Akismet privacy page.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://automattic.com/privacy-notice/', 'ribbon-lite' ),
		),
		) );
		
		//adding setting privacy page of current blog
		$wp_customize->add_setting( 'current_privacy_page_url', array(
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( 'current_privacy_page_url', array(
			'type' => 'url',
			'section' => 'comment_privacy_url_section',
			'label' => __( 'Current Blog Privacy Page URL.', 'ribbon-lite' ),
			'description' => __( 'Type the link to current privacy page of this blog.', 'ribbon-lite' ),
			'input_attrs' => array(
			'placeholder' => __( 'https://www.danieblog.com/comment-policy', 'ribbon-lite' ),
		),
		) );
	}
endif;
add_action('customize_register', 'db_comment_privacy_url_section');


/*********************************************************************
 * Function add the ads javascript code in the bottom of the post
 *********************************************************************/
if ( ! function_exists('db_bottom_post_ad_section') ) :
	function db_bottom_post_ad_section ( $wp_customize ) {

		// Adding section in wordpress customizer
		$wp_customize->add_section( 'bottom_post_ad_section', array(
			'title' => __( 'Bottom Post Ad Section', 'ribbon-lite' ),
			'priority'    => 260,
			'panel'       => 'panel_id',
			'description' => __( 'This section allows you to insert the javascript ad code in the bottom of the single post content, for example: Adsense.', 'ribbon-lite' )
		) );
		
		// Adding setting for javascript area
		$wp_customize->add_setting( 'bottom_post_ad_code', array(
			'default' => '',
			'sanitize_js_callback' => '',
		) );

		$wp_customize->add_control( 'bottom_post_ad_code', array(
			'label'   => 'Add javascript ad code here. Max width: 668px.',
			'section' => 'bottom_post_ad_section',
			'type'    => 'textarea',
		) );
	}
endif;
add_action('customize_register', 'db_bottom_post_ad_section');
