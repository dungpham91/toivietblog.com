<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php get_header(); ?>
	<main id="page" class="home-page" role="main">
		<div id="content" class="article">
			<?php if ( have_posts() ) :
				$ribbon_lite_full_posts = get_theme_mod('ribbon_lite_full_posts');
				$count = 0;
				while ( have_posts() ) : the_post();
					$count++;
					if ( $count == 6 ) {
						dynamic_sidebar('widget-home-loop');
					}
					ribbon_lite_archive_post();
				endwhile;
				dynamic_sidebar('widget-home-bottom');
				ribbon_lite_post_navigation();
			endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
	</main>
<?php get_footer(); ?>
