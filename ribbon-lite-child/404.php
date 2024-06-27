<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Ribbon Lite
 */

get_header(); ?>

<div id="page" class="single">
	<article id="content" class="article page page404 single_post" itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement">
	    <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
        ?>

		<header class="page-404">
			<h2 class="title" itemprop="headline"><?php _e('Error 404 Not Found', 'ribbon-lite' ); ?></h2>
		</header>
		<div class="post-content" itemprop="text">
			<p><?php _e('Oops! We couldn\'t find this Page.', 'ribbon-lite' ); ?></p>
			<p><?php _e('Please check your URL or use the search form below.', 'ribbon-lite' ); ?></p>
			<?php get_search_form();?>
			<div class="return-home">
			    <a rel="home" href="<?php echo esc_url(home_url()); ?>"><i class="fa fa-lg fa-arrow-circle-left"></i>Back to Home Page</a>
			</div>
			<img title="Error 404 Page" itemprop="image" class="lazy img-responsive size-full lazy-loaded" src="<?php echo get_stylesheet_directory_uri(); ?>/images/error-404.png" data-lazy-type="image" data-lazy-src="<?php echo get_stylesheet_directory_uri(); ?>/images/error-404.png" alt="error-404 Error 404 Page" width="auto" height="auto" />
		</div><!--.post-content--><!--#error404 .post-->
	</article>
</div>
<?php get_footer(); ?>