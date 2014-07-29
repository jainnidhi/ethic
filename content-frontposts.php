<?php
/**
 * The template for displaying featured posts on Front Page 
 *
 * @package Ethic
 * @since Ethic 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('ethic_front_featured_posts_check')) {
    $featured_count = intval(get_theme_mod('ethic_front_featured_posts_count'));
    $var = get_theme_mod('ethic_front_featured_posts_cat');

    // if no category is selected then return 0 
    $featured_cat_id = max((int) $var, 0);

    $featured_post_args = array(
        'post_type' => 'post',
        'posts_per_page' => $featured_count,
        'cat' => $featured_cat_id,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredposts = new WP_Query($featured_post_args);
    ?>
<section class="blog-area">
    <div class="container">
        <div class="row">
    <div class="home-post-title-area" id="post-title">
            <div class="home-post-title section-title">
                 <?php if ( get_theme_mod('ethic_post_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('ethic_post_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Recent Blogs', 'ethic') ?></h3>
                           <?php } ?>
                  
                  <?php if ( get_theme_mod('ethic_post_description') !='' ) {  ?><p><?php echo esc_html(get_theme_mod('ethic_post_description')); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Recent Blogs', 'ethic') ?></p>
                           <?php } ?>
            </div>
        </div>
    <div id="front-featured-posts">

        <div id="featured-posts-container" class="row">

            <div id="featured-posts">
                
                <?php if ($featuredposts->have_posts()) : $i = 1; ?>

                    <?php while ($featuredposts->have_posts()) : $featuredposts->the_post(); ?>

                        <div class="col-lg-4 home-featured-post">

                            <div class="featured-post-image">
                             
                                <a href="<?php the_permalink(); ?>">

                                    <?php the_post_thumbnail('post_feature_thumb'); ?>
                                    <?php ethic_post_format_icon(); ?>

                                </a>
                            
                            </div> <!--end .featured-post-content -->
                            
                            <div class="featured-post-content">
                                <a href="<?php the_permalink(); ?>">

                                    <h3 class="home-featured-post-title"><?php the_title(); ?></h3>

                                </a>

                                <p class="post-meta">
                                    <span class="posted_by">by <a href="#"><?php the_author_posts_link(); ?></a></span>
                                    <span class="posted_on"><?php the_time(esc_html('j M Y','ethic')); ?></span>						
                                </p>

                                <?php the_excerpt(); ?>
                            </div>

                        </div><!--end .home-featured-post-->

                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'ethic'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'ethic'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>

            </div> <!-- /#featured-posts -->

        </div> <!-- /#featured-posts-container -->

    </div> <!-- /#front-featured-posts -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<?php
} // end Featured post query ?>