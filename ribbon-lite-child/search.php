<?php
/**
 * The template for displaying search results pages.
 *
 * @package Ribbon Lite
 */

get_header(); ?>
	<div id="page" class="search-area">
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
			else : ?>
				<div class="single_post clear">
					<article id="content" class="article page">
						<header>
							<h1 class="title"><?php esc_html_e( 'Nothing Found', 'ribbon-lite' ); ?></h1>
						</header>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ribbon-lite' ); ?></p>
						<?php get_search_form(); ?>
					</article>
				</div>
			<?php endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>