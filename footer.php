<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Ethic
 */
?>

<?php if(!is_front_page()) { ?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
                    <div class="social-links col-lg-12">
                                <ul>
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="passion-fb"><a href="<?php echo get_theme_mod('facebook_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_link_url')) { ?>
                                        <li class="passion-twitter"><a href="<?php echo  get_theme_mod('twitter_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="passion-gplus"><a href="<?php echo get_theme_mod('googleplus_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if( get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="passion-pinterest"><a href="<?php echo get_theme_mod('pinterest_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="passion-github"><a href="<?php echo get_theme_mod('github_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('youtube_link_url')) { ?>
                                        <li class="passion-youtube"><a href="<?php echo get_theme_mod('youtube_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('dribbble_link_url')) { ?>
                                        <li class="passion-dribbble"><a href="<?php echo get_theme_mod('dribbble_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('tumblr_link_url')) { ?>
                                        <li class="passion-tumblr"><a href="<?php echo get_theme_mod('tumblr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('flickr_link_url')) { ?>
                                        <li class="passion-flickr"><a href="<?php echo get_theme_mod('flickr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('vimeo_link_url')) { ?>
                                        <li class="passion-vimeo"><a href="<?php echo get_theme_mod('vimeo_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('linkedin_link_url')) { ?>
                                        <li class="passion-linkedin"><a href="<?php echo get_theme_mod('linkedin_link_url'); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
			<div class="site-footer-inner col-lg-12">

				<div class="site-info">
					<?php do_action( 'ethic_credits' ); ?>
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'ethic' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'ethic' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'ethic' ), 'ethic', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
				</div><!-- close .site-info -->

			</div>
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>