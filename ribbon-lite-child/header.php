<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ribbon Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<meta itemprop="accessibilityControl" content="fullKeyboardControl">
	<meta itemprop="isFamilyFriendly" content="TRUE">
    <meta itemprop="copyrightHolder" content="Danie Pham">
    <meta itemprop="copyrightYear" content="2020">
    <meta itemprop="keywords" content="Tutorials, Linux, Linux Bash, Linux Bash Script, Linux Shell, Linux Shell Script, Automatic Script, Website, Site, Blog, How to, DevOps, AWS, CI/CD, Automation">
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<?php echo get_theme_mod ( 'google_analytic_code' ); ?>
	<meta name="yandex-verification" content="9a31268045509848" />
</head>

<body <?php body_class("eupopup eupopup-bottom"); ?>>
    <div class="main-container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ribbon-lite' ); ?></a>
		<header id="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			<div class="top-navigation">
				<a href="#" id="top-pull" class="top-toggle-mobile-menu"><?php _e('Top Menu', 'ribbon-lite'); ?></a>
				<div class="container clear">
					<nav id="top-navigation" class="top-navigation mobile-menu-wrapper" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php if ( has_nav_menu( 'top' ) ) { ?>
							<?php wp_nav_menu( array( 'before' => '<span itemprop="name">', 'after' => '</span>', 'theme_location' => 'top', 'menu_class' => 'menu clearfix', 'container' => '' ) ); ?>
						<?php } else { ?>
							<ul class="menu clearfix">
								<?php wp_list_categories('title_li='); ?>
							</ul>
						<?php } ?>
						<ul class="social-menu-list">
							<li><a class="social-facebook" href="<?php echo get_theme_mod('facebook_url_menu') ?>" title="Facebook" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-facebook-square"></i></a></li>
							<li><a class="social-twitter" href="<?php echo get_theme_mod('twitter_url_menu') ?>" title="Twitter" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-twitter-square"></i></a></li>
							<li><a class="social-linkedin" href="<?php echo get_theme_mod('linkedin_url_menu') ?>" title="Linkedin" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-linkedin-square"></i></a></li>
							<li><a class="social-reddit" href="<?php echo get_theme_mod('reddit_url_menu') ?>" title="Reddit" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-reddit-square"></i></a></li>
							<li><a class="social-youtube" href="<?php echo get_theme_mod('youtube_url_menu') ?>" title="Youtube" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-youtube-square"></i></a></li>
							<li><a class="social-rss" href="<?php echo get_theme_mod('rss_url_menu') ?>" title="RSS" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-rss-square"></i></a></li>
						</ul>
					</nav><!-- #site-navigation -->
				</div>
			</div>
			<div class="container clear">
				<div class="site-branding" itemscope itemtype="http://schema.org/Organization">
					<?php if (has_custom_logo()) { ?>
						<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo" class="image-logo" itemprop="headline">
								<?php the_custom_logo(); ?>
							</h1><!-- END #logo -->
						<?php } else { ?>
						    <h2 id="logo" class="image-logo" itemprop="headline">
								<?php the_custom_logo(); ?>
							</h2><!-- END #logo -->
						<?php } ?>
					<?php } else { ?>
						<?php if( is_front_page() || is_home() || is_404() ) { ?>
							<h1 id="logo" class="site-title" itemprop="headline">
								<a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
							</h1><!-- END #logo -->
							<div class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></div>
						<?php } else { ?>
						    <h2 id="logo" class="site-title" itemprop="headline">
								<a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
							</h2><!-- END #logo -->
							<div class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></div>
						<?php } ?>
					<?php } ?>
				</div><!-- .site-branding -->
				<?php 
					if ( !is_404 () ) {
						dynamic_sidebar('widget-header');
					}
				?>
			</div>
			<div class="primary-navigation">
				<a href="#" id="pull" class="toggle-mobile-menu"><?php _e('Primary Menu', 'ribbon-lite'); ?></a>
				<div class="container clear">
					<nav id="navigation" class="primary-navigation mobile-menu-wrapper" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php if ( has_nav_menu( 'primary' ) ) { ?>
							<?php wp_nav_menu( array( 'before' => '<span itemprop="name">', 'after' => '</span>', 'theme_location' => 'primary', 'menu_class' => 'menu clearfix', 'container' => '' ) ); ?>
						<?php } else { ?>
							<ul class="menu clearfix">
								<?php wp_list_categories('title_li='); ?>
							</ul>
						<?php } ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->
