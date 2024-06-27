<?php
/**
 * The template for displaying archive pages.
 *
 * Used for displaying archive-type pages. These views can be further customized by
 * creating a separate template for each one.
 *
 * - author.php (Author archive)
 * - category.php (Category archive)
 * - date.php (Date archive)
 * - tag.php (Tag archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>
<?php get_header(); ?>

<main id="page" class="home-page" role="main">
	<div id="content" class="article">
		<div class="archive-header">
			<?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
			?>

			<h1 class="postsby" itemprop="headline">
				<span>
					<?php the_archive_title(); ?>
				</span>
			</h1>

			<div class="category-description" itemprop="description">
				<?php the_archive_description(); ?>
			</div>
		</div>
		
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
			ribbon_lite_post_navigation();
		endif; ?>
	</div>
	<?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>