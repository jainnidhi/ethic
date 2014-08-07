<?php
/**
 * 
 * Description: Displays a full-width front page. The front page template provides an optional
 * featured section that allows for highlighting a key message. It can contain up to 2 widget areas,
 * in one or two columns. These widget areas are dynamic so if only one widget is used, it will be
 * displayed in one column. If two are used, then they will be displayed over 2 columns.
 * There are also four front page only widgets displayed just beneath the two featrued widgets. Like the
 * featured widgets, they will be displayed in anywhere from one to four columns, depending on
 * how many widgets are active.
 * 
 * The front page template also displays EDD featured products and featured posts 
 * depending on the settings from Theme Customizer 
 *
 * @package Ethic
 * @since Ethic 1.0
 */
get_header();
?>


<section class="slider-wrapper clearfix">
    <div class="container slider-block">
        <div class="row">
      <div class="flexslider loading col-lg-12"  id="main-slider">
        <ul class="slides">
            <?php 
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li>
                    <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                    <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-1.jpg" alt="first-slider-image"/>
                    </div>
                <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                           <a class="slider-button" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'ethic') ?>
                        </a>
                    </div>
                </div>
                </li>
                
                <li>
                <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-2.jpg" alt="second-slider-image"/>
                </div>
                <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                          <a class="slider-button" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'ethic') ?>
                        </a>
                    </div>
                 </div>
                </li>
                
                <li>
                  <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-3.jpg" alt=" third-slider-image"/>
                  </div>
                <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                           <a class="slider-button" href="#">
                            <?php esc_html_e('Start Building Your Website Now', 'ethic') ?>
                        </a>
                    </div>
                 </div>
                </li>
            <?php } ?>
                
          <?php 
          // if user adds a cusotm slide then display the slides 
          // load first slide
          if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1" class="home-slider"> 
                         <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                        <img href="#" src="<?php echo esc_url(get_theme_mod('slider_one')); ?>" alt="first-slider-image"/>
                         </div>
                            <?php if ( get_theme_mod('slider_title_one') !='' ||  get_theme_mod('slider_one_description') !='' ) {  ?>
                        <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-text-container">
                                <h2 class="slider-title"><a href="#"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></a></h2>
                                    <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                            
                            <?php if ( get_theme_mod('slider_one_link_url') !='' && get_theme_mod('slider_one_link_text') !=''  ) {  ?>
                           <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_one_link_url')); ?>">
                            <?php  echo esc_html(get_theme_mod('slider_one_link_text')); ?>
                            <?php } ?> 
                            </a>
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                    
                     <?php 
                     // load second slide
                     if ( get_theme_mod('slider_two') !='' ) {  ?>
                    <li id="slider2" class="home-slider"> 
                         <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                        <img href="#" src="<?php echo esc_url(get_theme_mod('slider_two')); ?>" alt="second-slider-image"/>
                         </div>
                     <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                        <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="#"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                                <?php if ( get_theme_mod('slider_two_link_url') !='' && get_theme_mod('slider_two_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_two_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('slider_two_link_text')); ?>
                                <?php } ?>
                            </a>
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php
                    // load third slide
                    if ( get_theme_mod('slider_three') !='' ) {  ?>
                    <li id="slider3" class="home-slider"> 
                         <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                        <img href="#" src="<?php echo esc_url(get_theme_mod('slider_three')); ?>" alt="third-slider-image"/>
                         </div>
                   <?php if ( get_theme_mod('slider_title_three') !='' || get_theme_mod('slider_three_description') !='' ) {  ?>
                        <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="#"><?php echo esc_html(get_theme_mod('slider_title_three')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_three_description')); ?></p>
                             
                              <?php if ( get_theme_mod('slider_three_link_url') !='' && get_theme_mod('slider_three_link_text') !=''  ) {  ?>
                            <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_three_link_url')); ?>">
                            <?php echo esc_html(get_theme_mod('slider_three_link_text')); ?>
                                <?php } ?>
                            </a>
                            </div>
                         </div>
                   <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php 
                    // load fourth slide
                    if ( get_theme_mod('slider_four') !='' ) {  ?>
                    <li id="slider4" class="home-slider"> 
                         <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                        <img href="#" src="<?php echo esc_url(get_theme_mod('slider_four')); ?>" alt="fourth-slider-image"/>
                         </div>
                    <?php if ( get_theme_mod('slider_title_four') !='' || get_theme_mod('slider_four_description') !='' ) {  ?>
                        <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="#"><?php echo esc_html(get_theme_mod('slider_title_four')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_four_description')); ?></p>
                                
                                  <?php if ( get_theme_mod('slider_four_link_url') !='' && get_theme_mod('slider_four_link_text') !=''  ) {  ?>
                                   <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_four_link_url')); ?>">
                                     <?php echo esc_html(get_theme_mod('slider_four_link_text')); ?>
                                        <?php } ?>
                                   </a>
                            </div>
                        </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
                         
                    <?php
                    // load fifth slide
                    if ( get_theme_mod('slider_five') !='' ) {  ?>
                    <li id="slider5" class="home-slider">  
                         <div class="slider-image col-lg-6 col-md-6 col-sm-6">
                            <img href="#" src="<?php echo esc_url(get_theme_mod('slider_five')); ?>" alt="fifth-slider-image"/>
                         </div>
                    <?php if ( get_theme_mod('slider_title_five') !='' || get_theme_mod('slider_five_description') !='' ) {  ?>
                        <div class="flex-caption col-lg-6 col-md-6 col-sm-6">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="#"><?php echo esc_html(get_theme_mod('slider_title_five')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_five_description')); ?></p>
                              
                               <?php if ( get_theme_mod('slider_five_link_url') !='' && get_theme_mod('slider_five_link_text') !=''  ) {  ?>
                                   <a class="slider-button" href="<?php echo esc_url(get_theme_mod('slider_five_link_url')); ?>">
                                     <?php echo esc_html(get_theme_mod('slider_five_link_text')); ?>
                                        <?php } ?>
                                   </a>
                            </div>
                         </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
           <?php } ?>
        </ul>
      </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.slider-wrapper -->

 <!-- Start business-tagline area -->
        <section class="business-tagline-area">
            <div class="container">
                <div class="row">
                    <div class="business-tagline col-lg-12 col-md-12 col-sm-12" data-scroll-reveal="enter from the top after 0.2s">
                        <?php if ( get_theme_mod('tagline_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('tagline_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Welcome to Ethic', 'ethic') ?></h3>
                                   <?php } ?>

                          <?php if ( get_theme_mod('tagline_description') !='' ) {  ?>
                          <p><?php echo esc_html(get_theme_mod('tagline_description')); ?></p>
                                   <?php } else { ?>
                                  <p><?php esc_html_e('Creating your Restaurant & Food based website with Ethic is completely easy.
                                      You just need to perform few tweaks in the theme option panel and your website will be ready to use.
                                      Showcase all important features of your website on homepage.', 'ethic') ?> </p>
                                                   <?php } ?>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- end business tagline area -->

 <section class="home-featured-area">
     <div class="container">
         <div class="row">
        
            <div class="home-featured clearfix">
                <div class="home-featured-one col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_one') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_one'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa-th-large fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_one') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_one')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Products', 'ethic') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_one') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_one')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Showcase your best quality products on home page to grab visitor&rsquo;s attention.', 'ethic') ?> </p>
                                           <?php } ?>

                    </div>
                </div>

                <div class="home-featured-two col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_two') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_two'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class="fa-gittip fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_two') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_two')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Services', 'ethic') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_two') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_two')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show your multiple services that will explore your website among the audience.', 'ethic') ?> </p>
                                           <?php } ?>

                    </div>
                </div>


                <div class="home-featured-three col-lg-4 col-md-4 col-sm-4 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
                    <div class="featured">
                    <?php if ( get_theme_mod('home_featured_three') !='' ) {  ?>
                     <div class="featured-image"><?php echo get_theme_mod('home_featured_three'); ?></div>
                    <?php } else {  ?>
                     <div class="featured-image"><i class=" fa-twitter fa"></i></div>
                     <?php } ?>


                           <?php if ( get_theme_mod('home_title_three') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('home_title_three')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Our Clients', 'ethic') ?></h3>
                           <?php } ?>

                  <?php if ( get_theme_mod('home_description_three') !='' ) {  ?>
                  <p><?php echo esc_html(get_theme_mod('home_description_three')); ?></p>
                           <?php } else { ?>
                          <p><?php esc_html_e('Show testimonials of your clients that will build the trust among the audience.', 'ethic') ?> </p>
                                           <?php } ?>

                    </div>
                </div>
               
            </div>
         </div><!-- /.row -->
     </div> <!-- /.container -->
    </section><!-- end home featured area -->
    
    <?php if(get_theme_mod('ethic_video_section_check')) { ?>
    <section class="home-video-area">
        <div class="container video-wrap">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 video-content" data-scroll-reveal="enter from the left after 0.2s">
                      <?php if ( get_theme_mod('video_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('video_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Take A Quick Look To Ethic Demo', 'ethic') ?></h3>
                           <?php } ?>
                  
                  <?php if ( get_theme_mod('video_description') !='' ) {  ?><p><?php echo esc_html(get_theme_mod('video_description')); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Why Ethic is a perfect Theme- Watch this quick demo and you will get the answer.', 'ethic') ?></p>
                           <?php } ?>
                   </div>
                    <div class="video-code col-lg-6 col-md-6 col-sm-6 col-xs-12" data-scroll-reveal="enter from the right after 0.2s">
                         <?php if ( get_theme_mod('video_code_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('video_code_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Video Title', 'ethic') ?></h3>
                           <?php } ?>
                  
                        <?php if ( get_theme_mod('home_video') !='' ) {  ?> 
                         <?php echo get_theme_mod('home_video'); ?>
                          <?php } else { ?>
                       <iframe width="560" height="315" src="//www.youtube.com/embed/j5q780fa1vY" frameborder="0" allowfullscreen></iframe> 
                           <?php } ?>
                    </div>
               
            </div><!-- /.row -->
        </div><!-- /.container -->
                    
    </section><!-- /. home-video-area -->
    <?php } ?>
        
               
      <?php  // Display featured posts on front page
            get_template_part('content', 'frontteam'); ?>
    
    <?php if(get_theme_mod('ethic_gallery_check')) { ?>
    <section class="gallery-area">
        <div class="container gallery-block">
            <div class="row">
                <div class="col-lg-12">
                <?php if ( get_theme_mod('gallery_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('gallery_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Gallery', 'ethic') ?></h3>
                           <?php } ?>
                    <div class="gallery-wrap">
                        <?php if ( get_theme_mod('ethic_gallery') !='' ) {  ?> 
                           <?php echo do_shortcode(get_theme_mod('ethic_gallery')); ?>
                          <?php } else { ?>
                          <?php esc_html_e('You can add your gallery here.', 'ethic'); ?> 
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
        
        
    <!-- Home testimonial slider starts here --> 
    <?php if(get_theme_mod('ethic_testimonial_slider_check')) { ?>
        <section class="testimonial-slider">
            <div class="container testimonial-wrap">
                <div class="row">
            <div id="reviewslider">
                <ul class="client-wrapper clearfix">
                    <?php if ( get_theme_mod('tslider_one') =='' ) {  ?>
                      <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider1">
                         <div class="client-block clearfix">
                            <div class="testimonial-image">
                            <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-1.jpg" alt=""/>
                            
                            </div>
                            <div class="flex-caption">
                                <div class="client-testimonial">
                                    <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                                </div>
                                 <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('John', 'ethic') ?>
                                </a>
                            </div>
                           </div>
                        </div>
                    </li>
                    
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider2">
                      <div class="client-block clearfix">
                        <div class="testimonial-image">
                        <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-2.jpg" alt=""/>
                        
                        </div>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                               <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>                  
                            </div>
                            <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('Era', 'ethic') ?>
                                </a>
                            </div>
                            
                        </div>
                      </div>
                    </li>
                    
                     <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider3">
                       <div class="client-block clearfix">
                         <div class="testimonial-image">
                        <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-3.jpg" alt=""/>
                        
                         </div>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                            </div>
                            <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('Johny', 'ethic') ?>
                                </a>
                            </div>
                        </div>
                       </div>
                    </li>
                    
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider4">
                      <div class="client-block clearfix">
                         <div class="testimonial-image">
                        <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-4.jpg" alt=""/>
                       </div>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                            </div>
                            
                             <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('Johny', 'ethic') ?>
                                </a>
                            </div>
                         
                        </div>
                      </div>
                    </li>
                <?php } ?>
                    
                     <?php if ( get_theme_mod('tslider_one') !='' ) {  ?>
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider1">
                      <div class="client-block clearfix">
                        <div class="testimonial-image">
                        <img  src="<?php echo esc_url(get_theme_mod('tslider_one')); ?>" alt=""/>
                        </div>
                        <?php if ( get_theme_mod('tslider_one_description') !='' || get_theme_mod('client_name_url_one') !='' || get_theme_mod('client_name_one') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <?php echo wpautop(esc_html(get_theme_mod('tslider_one_description'))); ?>
                            </div>
                            <div class="client-name">
                                 <a href="<?php echo esc_url(get_theme_mod('client_name_url_one')); ?>">
                                     <?php echo esc_html(get_theme_mod('client_name_one')); ?>
                                 </a>
                            </div>
                       </div>
                      <?php } ?>
                          </div>
                    </li>
                    
                    <?php if ( get_theme_mod('tslider_two') !='' ) {  ?>
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider2">
                      <div class="client-block clearfix">
                        <div class="testimonial-image">
                        <img  src="<?php echo esc_url(get_theme_mod('tslider_two')); ?>" alt=""/>
                        </div>
                        <?php } ?>
                     <?php if ( get_theme_mod('tslider_two_description') !='' || get_theme_mod('client_name_url_two') !='' || get_theme_mod('client_name_two') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <?php echo wpautop(esc_html(get_theme_mod('tslider_two_description'))); ?>
                            </div>
                            <div class="client-name">
                                 <a href="<?php echo esc_url(get_theme_mod('client_name_url_two')); ?>">
                                     <?php echo esc_html(get_theme_mod('client_name_two')); ?>
                                 </a>
                            </div>
                        </div>
                     <?php } ?>
                        </div>
                    </li>
                    
                     <?php if ( get_theme_mod('tslider_three') !='' ) {  ?>
                     <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider3">
                       <div class="client-block clearfix"> 
                         <div class="testimonial-image">
                        <img  src="<?php echo esc_url(get_theme_mod('tslider_three')); ?>" alt=""/>
                         </div>
                        <?php } ?>
                     <?php if ( get_theme_mod('tslider_three_description') !='' || get_theme_mod('client_name_url_three') !='' || get_theme_mod('client_name_three') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <?php echo wpautop(esc_html(get_theme_mod('tslider_three_description'))); ?>
                            </div>
                            <div class="client-name">
                                 <a href="<?php echo esc_url(get_theme_mod('client_name_url_three')); ?>">
                                     <?php echo esc_html(get_theme_mod('client_name_three')); ?>
                                 </a>
                            </div>
                         </div>
                     <?php } ?>
                       </div>
                    </li>
                    
                     <?php if ( get_theme_mod('tslider_four') !='' ) {  ?>
                     <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tslider4"> 
                        <div class="client-block clearfix">
                        <div class="testimonial-image">
                            <img  src="<?php echo esc_url(get_theme_mod('tslider_four')); ?>" alt=""/>
                        </div>
                        <?php } ?>
                      <?php if ( get_theme_mod('tslider_four_description') !='' || get_theme_mod('client_name_url_four') !='' || get_theme_mod('client_name_four') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <?php echo wpautop(esc_html(get_theme_mod('tslider_four_description'))); ?>
                            </div>
                            <div class="client-name">
                                 <a href="<?php echo esc_url(get_theme_mod('client_name_url_four')); ?>">
                                     <?php echo esc_html(get_theme_mod('client_name_four')); ?>
                                 </a>
                            </div>
                       </div>
                      <?php } ?>
                        </div>
                    </li>
                                       
                 <?php } ?>
                    
               </ul>
            </div>
        </div><!-- /.row -->
       </div><!-- /.container -->
    </section>
    <?php } ?>
    
    <?php
    get_template_part('content','frontportfolio'); ?>
    
    <?php if(get_theme_mod('ethic_cta_section_check')) { ?>
    <div class="cta-area">
        <div class="container cta-wrap">
            <div class="row">
                <?php if ( get_theme_mod('cta_title') !='' ) {  ?><h3 class="cta-title"><?php echo esc_html(get_theme_mod('cta_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('CTA Title', 'ethic') ?></h3>
                                   <?php } ?>
             
               <div class="cta-wrapper">
                        <?php if ( get_theme_mod('ethic_cta') !='' ) {  ?> 
                         <?php echo do_shortcode(get_theme_mod('ethic_cta')); ?>
                        <?php } else { ?>
                        <?php esc_html_e('You can add your cta text here.', 'ethic'); ?> 
                          <?php } ?>
                        </div>
                    <?php if ( get_theme_mod('cta_link_url') !='' && get_theme_mod('cta_link_text') !=''  ) {  ?>
                            <a class="cta-button" href="<?php echo esc_url(get_theme_mod('cta_link_url')); ?>">
                              <?php echo esc_html(get_theme_mod('cta_link_text')); ?>
                            </a>
                    <?php } else { ?>
                           <a class="cta-button" href="#">
                              <?php esc_html_e('Read More', 'ethic'); ?>
                            </a>
                    <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    
  <?php  get_template_part('content','frontposts'); ?>
      
    <section class="contact-area">
        <div class="container contact-wrap">
            <div class="row">
                <div class="home-contact-form col-lg-12">
                     <?php if ( get_theme_mod('contact_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('contact_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Contact Us', 'ethic') ?></h3>
                                   <?php } ?>
                          
                           <?php if ( get_theme_mod('contact_description') !='' ) {  ?><p class="description"><?php echo esc_html(get_theme_mod('contact_description')); ?></p>

                          <?php } else {  ?> <p class="description"><?php esc_html_e('Send in your queries and we will get back to you!!', 'ethic') ?></p>
                                   <?php } ?>
                          
                        <div class="contact-form-wrapper">
                        <?php if ( get_theme_mod('ethic_contact_form') !='' ) {  ?> 
                         <?php echo do_shortcode(get_theme_mod('ethic_contact_form')); ?>
                        <?php } else { ?>
                        <?php esc_html_e('You can add contact form here with a contact form shortcode'
                                . 'from Gravity Forms or Contact Form7 or any other plugin of your choice.', 'ethic'); ?> 
                          <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="contact-map">
        <div class="container">
            <div class="row">
         <?php if ( get_theme_mod('map_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('map_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Location Map', 'ethic') ?></h3>
                                   <?php } ?>
            </div>
        </div>
                          
        <div class="map-code">
                        <?php if ( get_theme_mod('home_map') !='' ) {  ?> 
                         <?php echo get_theme_mod('home_map'); ?>
                          <?php } else { ?>
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3628.3373274884793!2d73.68860100000003!3d24.57755199999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3967e564ac2e9c8d%3A0x87292b7f148a532d!2sIdeaBox+Creations!5e0!3m2!1sen!2sin!4v1406726113881" width="100%" height="450px" frameborder="0" style="border:0"></iframe>
                           <?php } ?>
                      </div>
        
    </section>
       
         <span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php
get_footer();
?>