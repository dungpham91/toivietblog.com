<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ribbon Lite
 */

?>
	<footer id="site-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
		<?php if ( is_active_sidebar( 'footer-first' ) || is_active_sidebar( 'footer-second' ) || is_active_sidebar( 'footer-third' ) || is_active_sidebar( 'footer-widget-info' ) ) { ?>
	    	<div class="container">
	    	    <div class="footer-widgets">
		    		<div class="footer-widget">
			    		<?php if ( is_active_sidebar( 'footer-first' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-first' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget">
						<?php if ( is_active_sidebar( 'footer-second' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-second' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget">
						<?php if ( is_active_sidebar( 'footer-third' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-third' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-widget last">
						<?php if ( is_active_sidebar( 'footer-four' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-four' ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="footer-widget-info">
					<div class="footer-brand-widget">
						<?php if ( is_active_sidebar( 'footer-widget-info' ) ) : ?>
			        		<?php dynamic_sidebar( 'footer-widget-info' ); ?>
						<?php endif; ?>
					</div>
					<div class="footer-social-widget">
						<h5 class="footer-social-title">Theo dõi chúng tôi</h5>
						<ul class="footer-social-menu-list">
						<li><a class="social-facebook" href="<?php echo get_theme_mod('facebook_url_menu') ?>" title="Facebook" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-facebook-square"></i></a></li>
							<li><a class="social-twitter" href="<?php echo get_theme_mod('twitter_url_menu') ?>" title="Twitter" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-twitter-square"></i></a></li>
							<li><a class="social-linkedin" href="<?php echo get_theme_mod('linkedin_url_menu') ?>" title="Linkedin" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-linkedin-square"></i></a></li>
							<li><a class="social-reddit" href="<?php echo get_theme_mod('reddit_url_menu') ?>" title="Reddit" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-reddit-square"></i></a></li>
							<li><a class="social-youtube" href="<?php echo get_theme_mod('youtube_url_menu') ?>" title="Youtube" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-youtube-square"></i></a></li>
							<li><a class="social-rss" href="<?php echo get_theme_mod('rss_url_menu') ?>" title="RSS" target="_blank" rel="external nofllow"><i class="fa fa-lg fa-rss-square"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		<?php }
		ribbon_lite_copyrights_credit(); ?>
	</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</div>
<button class="fa fa-lg fa-arrow-up backtotop">Top</button>
</body>
</html>
