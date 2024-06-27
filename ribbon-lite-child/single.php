<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ribbon Lite
 */
$ribbon_lite_single_breadcrumb_section = get_theme_mod('ribbon_lite_single_breadcrumb_section', '1');
$ribbon_lite_single_tags_section = get_theme_mod('ribbon_lite_single_tags_section', '1');
$ribbon_lite_authorbox_section = get_theme_mod('ribbon_lite_authorbox_section', '1');
$ribbon_lite_relatedposts_section = get_theme_mod('ribbon_lite_relatedposts_section', '1');

get_header(); ?>

<main id="page" class="single" role="main">
	<div class="content">

		<!-- Start Article -->
		<article class="article" <?php db_article_tag_schema(); ?>>
		    <meta itemscope itemprop="mainEntityOfPage" itemtype="http://schema.org/WebPage"/>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                    <?php db_set_post_view(get_the_ID()); ?>
					<div class="single_post">
					    <div class="entry-published post-date-ribbon" title="Date Published" itemprop="datePublished"><div class="corner"></div><?php the_time( get_option( 'date_format' ) ); ?></div>
					    <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb('<p id="breadcrumbs">','</p>'); }
                        ?>

						<header class="entry-header">
							<!-- Start Title -->
							<h1 class="entry-title title single-title" itemprop="headline"><?php the_title(); ?></h1>
							<!-- End Title -->
							<!-- Start Post Meta -->
							<div class="entry-meta post-info">
                                <span class="entry-modified-time modified-time updated" itemprop="dateModified" title="Thời gian cập nhật"><span><i class="fa fa-lg fa-refresh"></i></span><?php the_modified_time( get_option( 'date_format' ) ); ?></span>
                                <span class="entry-author theauthor vcard author" itemprop="author" itemscope itemtype="https://schema.org/Person" title="Tác giả"><span><i class="ribbon-icon icon-users"></i></span><?php _e('Đăng bởi','ribbon-lite'); ?>&nbsp;<a class="entry-author-link" itemprop="url" rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><span class="entry-author-name fn" itemprop="name"><?php the_author(); ?></span></a></span>
                                <span class="entry-categories featured-cat" itemprop="articleSection" title="Danh mục""><span><i class="ribbon-icon icon-bookmark"></i></span><?php the_category(', '); ?></span>
                                <span class="entry-comment thecomment" itemprop="commentCount" title="Bình luận"><span><i class="ribbon-icon icon-comment"></i></span>&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number(__('0 Bình luận','ribbon-lite'),__('1 Bình luận','ribbon-lite'),__('% Bình luận','ribbon-lite')); ?></a></span>
                                <span class="entry-view-count" itemprop="interactionStatistic" title="Lượt xem"><span><i class="fa fa-lg fa-eye"></i></span>&nbsp;<?php echo db_get_post_view(get_the_ID()); ?></span>
                                <?php db_publisher_schema(); ?>
                            </div>
							<!-- End Post Meta -->
						</header>

						<!-- Start Content -->
						<div id="content" class="post-single-content box mark-links" itemprop="articleBody">
							<?php dynamic_sidebar('widget-post-top'); ?>
							<?php the_content(); ?>
							<?php db_insert_support_notice (); ?>
							<?php dynamic_sidebar('widget-post-bottom'); ?>
							<?php wp_link_pages(array('before' => '<div class="pagination">', 'after' => '</div>', 'link_before'  => '<span class="current"><span class="currenttext">', 'link_after' => '</span></span>', 'next_or_number' => 'next_and_number', 'nextpagelink' => __('Next', 'ribbon-lite' ), 'previouspagelink' => __('Previous', 'ribbon-lite' ), 'pagelink' => '%','echo' => 1 )); ?>

							<?php if($ribbon_lite_single_tags_section == '1') { ?>
								<!-- Start Tags -->
								<div class="entry-tags tags">
								    <span class="tagtext">Tags: </span>
                                    <?php if(has_tag()) : ?>
                                        <?php
                                        $tags = get_the_tags(get_the_ID());
                                            foreach($tags as $tag){
                                                echo '<a href="'.get_tag_link($tag->term_id).'" rel="tag"><span itemprop="keywords">'.$tag->name.'</span></a>';
                                        } ?>
                                    <?php endif; ?>
								</div>
								<!-- End Tags -->
								
							<?php } ?>

							<?php previous_post_link('<span class="db-pagination left">&laquo;&laquo; %link</span>');
 							next_post_link('<span class="db-pagination right">%link &raquo;&raquo;</span>');
							?>
						</div><!-- End Content -->
						
						<?php if($ribbon_lite_relatedposts_section == '1') { ?>
						    <!-- Start Related Posts -->
							<?php $categories = get_the_category($post->ID);
							if ($categories) { $category_ids = array();
								foreach($categories as $individual_category)
									$category_ids[] = $individual_category->term_id;
								    $args=array( 'category__in' => $category_ids,
								    'post__not_in' => array($post->ID),
								    'ignore_sticky_posts' => 1,
								    'showposts'=> 4,
								    'orderby' => 'rand' );
									$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
								echo '<div class="related-posts"><div class="postauthor-top"><h3>'.__('Bài viết liên quan', 'ribbon-lite').'</h3></div>';
								$pexcerpt=1; $j = 0; $counter = 0;
								while( $my_query->have_posts() ) {
								$my_query->the_post();?>
								<article class="post excerpt  <?php echo (++$j % 3== 0) ? 'last' : ''; ?>">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
											<div class="featured-thumbnail">
												<?php the_post_thumbnail('ribbon-lite-related',array('title' => '')); ?>
												<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
											</div>
											<header>
												<h4 class="title front-view-title"><?php the_title(); ?></h4>
											</header>
										</a>
									<?php } else { ?>
										<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
											<div class="featured-thumbnail">
												<img src="<?php echo get_template_directory_uri(); ?>/images/nothumb-related.png" class="attachment-featured wp-post-image" alt="<?php the_title_attribute(); ?>">
												<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
											</div>
											<header>
												<h4 class="title front-view-title"><?php the_title(); ?></h4>
											</header>
										</a>
									<?php } ?>
								</article><!--.post.excerpt-->
								<?php $pexcerpt++;?>
								<?php } echo '</div>'; }} wp_reset_postdata(); ?>
							<!-- End Related Posts -->
						<?php }?>

						<div class="rand-posts-bottom">
							<?php db_rand_posts(); ?>
						</div>

						<?php if($ribbon_lite_authorbox_section == '1') { ?>
							<!-- Start Author Box -->
							<div class="postauthor">
								<?php
								if ( get_the_author_meta( 'description' ) ) :
    									get_template_part( 'author-bio' );
								endif;
								?>
							</div>
							<!-- End Author Box -->
						<?php }?>

						<?php comments_template( '', true ); ?>
					</div>
				</div>
			<?php endwhile; ?>
		</article>
		<!-- End Article -->
		<!-- Start Sidebar -->
		<?php get_sidebar(); ?>
		<!-- End Sidebar -->
	</div>
</main>
<?php get_footer(); ?>
