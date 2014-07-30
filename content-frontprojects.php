<?php
/**
 * The template for displaying featured project on Front Page 
 *
 * @package Ethic
 * @since Ethic 1.0
 */
?>

<?php
// Start a new query for displaying featured posts on Front Page

if (get_theme_mod('ethic_front_featured_project_check')) {
    $featured_count = intval(get_theme_mod('ethic_front_featured_project_count'));

    $featured_project_args = array(
        'post_type' => 'project',
        'posts_per_page' => $featured_count,
        'post__not_in' => get_option('sticky_posts'),
    );
    $featuredproject = new WP_Query($featured_project_args);
    ?>
<section class="project-area">
    <div class="container project-wrap">
        <div class="row">
    <div class="home-project-title-area" id="project-title">
            <div class="home-project-title section-title">
                 <?php if ( get_theme_mod('ethic_project_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('ethic_project_title')); ?></h3>
                  <?php } else {  ?> <h3 class="title"><?php esc_html_e('Recent Project', 'ethic') ?></h3>
                           <?php } ?>
                  
                   <?php if ( get_theme_mod('project_description') !='' ) {  ?>
                            <p><?php echo esc_html(get_theme_mod('project_description')); ?></p>
                                     <?php } else { ?>
                                    <p><?php esc_html_e('This is the Project Description block.', 'ethic') ?> </p>
                                            <?php } ?>
            </div>
    </div>
     

            <div id="featured-project" class="clearfix">
                <div class="project-wrap">
                
                <?php if ($featuredproject->have_posts()) : $i = 1; ?>

                    <?php while ($featuredproject->have_posts()) : $featuredproject->the_post(); ?>
                                     
                        <div class="home-featured-project col-lg-3">

                            <div class="featured-project-content">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="project-featured-image">
                                    <?php the_post_thumbnail('post_project_thumb'); ?>
                                    </div>
                                   
                                </a>
                               
                            </div> <!--end .featured-post-content -->

                           
                        </div><!--end .home-featured-project-->
                  
                        <?php $i+=1; ?>

                    <?php endwhile; ?>

                <?php else : ?>

                    <h2 class="center"><?php esc_html_e('Not Found', 'ethic'); ?></h2>
                    <p class="center"><?php esc_html_e('Sorry, but you are looking for something that is not here', 'ethic'); ?></p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
           </div>         
        </div> <!-- /#featured-project -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
      
<?php
} 

 if (!get_theme_mod('ethic_front_featured_project_check') && !get_theme_mod('ethic_hide_sample_project')) 
    { // end Featured project query  ?>
    
<section class="project-area">
    <div class="container project-wrap">
        <div class="row">
    <div class="home-project-title-area" id="project-title">
            <div class="home-project-title section-title">
                <h3 class="title"><?php esc_html_e('Recent Project', 'ethic') ?></h3>
                    <p><?php esc_html_e('This is the Project Description block.', 'ethic') ?> </p>
            </div>
    </div>
   

            <div id="featured-project" class="clearfix">
                <div class="project-wrap">
                  
                        <div class="home-featured-project col-lg-3" id="project-one" data-scroll-reveal="enter from the left after 0.3s">
                             <div class="featured-project-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-1.jpg" alt=""/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-project-->
                        
                        
                        <div class="home-featured-project col-lg-3" id="project-two" data-scroll-reveal="enter from the left after 0.3s">
                            <div class="featured-project-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-2.jpg" alt=""/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-project-->
                        
                        <div class="home-featured-project col-lg-3" id="project-three" data-scroll-reveal="enter from the right after 0.3s">
                            <div class="featured-project-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-3.jpg" alt=""/>
                                   
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-project-->
                        
                         <div class="home-featured-project col-lg-3" id="project-four" data-scroll-reveal="enter from the right after 0.3s">
                            <div class="featured-project-content">
                                <a href="#">
                                    <img class="attachment-post_feature_thumb" src="<?php echo get_template_directory_uri(); ?>/includes/images/port-4.jpg" alt=""/>
                                    
                                </a>
                            </div> <!--end .featured-post-content -->
                        </div><!--end .home-featured-project-->
                  
           </div>         
        </div> <!-- /#featured-project -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<?php } ?>
