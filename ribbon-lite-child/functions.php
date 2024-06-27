<?php

/*********************************************************************
 * Function load css & js (do not use @import)
 *********************************************************************/
if ( ! function_exists( 'db_enqueue_styles' ) ) :
    function db_enqueue_styles() {
        // Enqueue parent styles
        wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');

        // Enqueue child styles
        //wp_enqueue_style('child-theme', get_stylesheet_directory_uri() .'/style.css', array('parent-theme'));
	
	// Enqueue fontawsome css
	wp_enqueue_style('font-awsome', get_stylesheet_directory_uri() . '/css/fontawsome.css');
	
	// Enqueue backtotop.js
	wp_enqueue_script('backtotop-script', get_stylesheet_directory_uri() . '/js/custom.js',array( 'jquery' ));

	// Enqueue FancyBox
	wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ));
    	wp_enqueue_style( 'lightbox-style', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css' );

    }
    add_action('wp_enqueue_scripts', 'db_enqueue_styles');
endif;

/* Implement functions for single post */
require get_theme_file_path ( 'db_functions/db_singlepost_meta.php' );

/* Implement the customize function */
require get_theme_file_path ( 'db_functions/db_customize.php' );

/* Implement the widgets function */
require get_theme_file_path ( 'db_functions/db_widgets.php' );

/* Implement the thumbnail function */
require get_theme_file_path ( 'db_functions/db_thumbnail.php' );

/* Implement the optimize function */
require get_theme_file_path ( 'db_functions/db_optimize.php' );

/* Implement the schema function */
require get_theme_file_path ( 'db_functions/db_schema.php' );

/* Implement the navigation function */
require get_theme_file_path ( 'db_functions/db_navigation.php' );

/* Implement the comment function */
require get_theme_file_path ( 'db_functions/db_comment.php' );

/* Implement the minify function */
//require get_theme_file_path ( 'db_functions/db_minify.php' );

/* Implement the author bio function */
require get_theme_file_path ( 'db_functions/db_authorbio.php' );

/* Implement the ads function */
require get_theme_file_path ( 'db_functions/db_ads.php' );

/* Implement the singlepost function */
require get_theme_file_path ( 'db_functions/db_singlepost.php' );

/* Implement the highlight search term function */
require get_theme_file_path ( 'db_functions/db_highlight_search.php' );

/* Implement custom editor wordpress function */
require get_theme_file_path ( 'db_functions/db_editor.php' );

/*********************************************************************
 * Post Layout for Archives
 *********************************************************************/
if ( ! function_exists( 'ribbon_lite_archive_post' ) ) {
    /**
     * Display a post of specific layout.
     * 
     * @param string $layout
     */
    function ribbon_lite_archive_post( $layout = '' ) { 
        $ribbon_lite_full_posts = get_theme_mod('ribbon_lite_full_posts', '0'); ?>

        <article id="post-<?php the_ID(); ?>" class="post excerpt" role="article" <?php db_article_tag_schema(); ?>>
            <meta itemscope itemprop="mainEntityOfPage" itemtype="http://schema.org/WebPage"/>

            <div class="entry-published post-date-ribbon" itemprop="datePublished"><div class="corner"></div><?php the_time( get_option( 'date_format' ) ); ?></div>
            <header class="entry-header">                        
                <h2 class="entry-title title" itemprop="headline">
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" itemprop="url"><?php the_title(); ?></a>
                </h2>
                <div class="entry-meta post-info">
                    <span class="entry-modified-time modified-time updated" itemprop="dateModified" title="Thời gian cập nhật"><span><i class="fa fa-lg fa-refresh"></i></span><?php the_modified_time( get_option( 'date_format' ) ); ?></span>
                    <span class="entry-author theauthor vcard author" itemprop="author" itemscope itemtype="https://schema.org/Person" title="Tác giả"><span><i class="ribbon-icon icon-users"></i></span><?php _e('Đăng bởi','ribbon-lite'); ?>&nbsp;<a class="entry-author-link" itemprop="url" rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><span class="entry-author-name fn" itemprop="name"><?php the_author(); ?></span></a></span>
                    <span class="entry-categories featured-cat" itemprop="articleSection" title="Danh mục""><span><i class="ribbon-icon icon-bookmark"></i></span><?php the_category(', '); ?></span>
                    <span class="entry-comment thecomment" itemprop="commentCount" title="Bình luận"><span><i class="ribbon-icon icon-comment"></i></span>&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number(__('0 Bình luận','ribbon-lite'),__('1 Bình luận','ribbon-lite'),__('% Bình luận','ribbon-lite')); ?></a></span>
                    <?php db_publisher_schema(); ?>
                </div>
            </header><!--.header-->

            <?php if ( empty($ribbon_lite_full_posts) ) : ?>
                <?php if ( has_post_thumbnail() ) { ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
                        <div class="featured-thumbnail">
                            <?php the_post_thumbnail('ribbon-lite-featured',array('title' => '', 'itemprop' => 'image')); ?>
                            <?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
                        </div>
                    </a>
                <?php } else { ?>
                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
                        <div class="featured-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/nothumb-featured.png" class="attachment-featured wp-post-image" alt="<?php the_title_attribute(); ?>" itemprop="image">
                            <?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
                        </div>
                    </a>
                <?php } ?>

                <div class="post-content" itemprop="text">
                    <?php echo ribbon_lite_excerpt(56); ?>
                </div>
                <?php ribbon_lite_readmore(); ?>

            <?php else : ?>
                <div class="post-content full-post" itemprop="articleBody">
                    <?php the_content(); ?>
                </div>
                <?php if (ribbon_lite_post_has_moretag()) : ?>
                    <?php ribbon_lite_readmore(); ?>
                <?php endif; ?>
            <?php endif; ?>
        </article>
    <?php }
}

/*********************************************************************
 * Hàm Copyrights
 *********************************************************************/
if ( ! function_exists( 'ribbon_lite_copyrights_credit' ) ) {
    function ribbon_lite_copyrights_credit() { 
    global $mts_options
?>
<!--start copyrights-->
<div class="copyrights">
    <div class="container">
        <div class="row" id="copyright-note">
            <span><a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a> <?php _e('Copyright','ribbon-lite'); ?> &copy; 2017 - <?php echo date("Y") ?>.</span>
            <div class="top">
                <?php
                $ribbon_lite_copyright_text = get_theme_mod('ribbon_lite_copyright_text', 'Theme by <a href="' . get_home_url() . '">MyThemeShop</a>.');
                    echo $ribbon_lite_copyright_text;
                ?>
                <a href="#top" class="toplink"><?php _e('Back to Top','ribbon-lite'); ?> &uarr;</a>
            </div>
        </div>
    </div>
</div>
<!--end copyrights-->
<?php }
}
