<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Ethic
 */
?>

<?php if(!is_front_page() && !is_post_type_archive('portfolio')) { ?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->
<?php } ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row">
                    <div class="contact-details">
                        <ul><?php if ( get_theme_mod('contact_email') !='' ) {  ?><li id="email"><?php echo esc_html(get_theme_mod('contact_email')); ?></li>

                          <?php } else {  ?> <li id="email"> <?php esc_html_e('hello@ideaboxcreations.com', 'ethic') ?></li>
                                   <?php } ?>

                          <?php if ( get_theme_mod('contact_phone') !='' ) {  ?><li id="phone"><?php echo esc_html(get_theme_mod('contact_phone')); ?></li>

                          <?php } else {  ?> <li id="phone"><?php esc_html_e('0294-678456', 'ethic') ?></li>
                                   <?php } ?>
                          </ul>
                    </div>
                    <div class="social-links col-lg-12">
                                <ul>
                                    <?php if (get_theme_mod('facebook_link_url')) { ?>
                                        <li class="ethic-fb"><a href="<?php echo get_theme_mod('facebook_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('twitter_link_url')) { ?>
                                        <li class="ethic-twitter"><a href="<?php echo  get_theme_mod('twitter_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('googleplus_link_url')) { ?>
                                        <li class="ethic-gplus"><a href="<?php echo get_theme_mod('googleplus_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if( get_theme_mod('pinterest_link_url')) { ?>
                                        <li class="ethic-pinterest"><a href="<?php echo get_theme_mod('pinterest_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if (get_theme_mod('github_link_url')) { ?>
                                        <li class="ethic-github"><a href="<?php echo get_theme_mod('github_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('youtube_link_url')) { ?>
                                        <li class="ethic-youtube"><a href="<?php echo get_theme_mod('youtube_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('dribbble_link_url')) { ?>
                                        <li class="ethic-dribbble"><a href="<?php echo get_theme_mod('dribbble_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('tumblr_link_url')) { ?>
                                        <li class="ethic-tumblr"><a href="<?php echo get_theme_mod('tumblr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('flickr_link_url')) { ?>
                                        <li class="ethic-flickr"><a href="<?php echo get_theme_mod('flickr_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('vimeo_link_url')) { ?>
                                        <li class="ethic-vimeo"><a href="<?php echo get_theme_mod('vimeo_link_url'); ?>"></a></li>
                                    <?php } ?>
                                    <?php if(get_theme_mod('linkedin_link_url')) { ?>
                                        <li class="ethic-linkedin"><a href="<?php echo get_theme_mod('linkedin_link_url'); ?>"></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
			<div class="site-footer-inner col-lg-12">

				<div class="site-info">
				
                                        <?php if(get_theme_mod('ethic_footer_footer_text')) { ?>
                                        <?php echo esc_html(get_theme_mod('ethic_footer_footer_text')); ?>
                                        <?php } else { ?>
                                        <p>
                                            <a href="<?php $ethic_theme = wp_get_theme(); echo $ethic_theme->get( 'ThemeURI' ); ?>">
                                                <?php _e('Ethic WordPress theme by IdeaBox', 'ethic'); ?>
                                            </a>
                                        </p>
                                        <?php } ?>
                                        
				</div><!-- close .site-info -->

			</div>
		</div>
            
	</div><!-- close .container -->
</footer><!-- close #colophon -->
<span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php wp_footer(); ?>

</body>
</html>