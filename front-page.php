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
      <div class="flexslider col-sm-12"  id="main-slider">
        <ul class="slides">
            <?php 
            // check if the slider is blank.
            // if there are no slides by user then load default slides. 
            
            if ( get_theme_mod('slider_one') =='' ) {  ?>
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-1.jpg" alt="first-slider-image"/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                        
                    </div>
                </div>
                </li>
                
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-2.jpg" alt="second-slider-image"/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                         
                    </div>
                 </div>
                </li>
                
                <li>
                <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/slider-3.jpg" alt=""/>
                <div class="flex-caption">
                    <div class="slider-text-container">
                     <h2 class="slider-title"><a href="#"><?php esc_html_e('Showcase Your Restaurant Services', 'ethic') ?></a></h2>
                          <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                          
                    </div>
                 </div>
                </li>
            <?php } ?>
                
          <?php 
          // if user adds a cusotm slide then display the slides 
          // load first slide
          if ( get_theme_mod('slider_one') !='' ) {  ?>
                    <li id="slider1" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_one_url') !='' ) { echo esc_url(get_theme_mod('slider_one_url')); } ?>" src="<?php echo get_theme_mod('slider_one'); ?>" alt=""/>
                        <?php if ( get_theme_mod('slider_title_one') !='' || get_theme_mod('slider_one_url') !='' || get_theme_mod('slider_one_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                                <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_one_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_one')); ?></a></h2>
                                    <p><?php echo esc_html(get_theme_mod('slider_one_description')); ?></p>
                            
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                    
                     <?php 
                     // load second slide
                     if ( get_theme_mod('slider_two') !='' ) {  ?>
                    <li id="slider2" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_two_url') !='' ) { echo esc_url(get_theme_mod('slider_two_url')); } ?>" src="<?php echo get_theme_mod('slider_two'); ?>" alt=""/>
                       
                     <?php if ( get_theme_mod('slider_title_two') !='' || get_theme_mod('slider_two_url') !='' || get_theme_mod('slider_two_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_two_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_two')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_two_description')); ?></p>
                         
                            </div>
                         </div>
                         <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php
                    // load third slide
                    if ( get_theme_mod('slider_three') !='' ) {  ?>
                    <li id="slider3" class="home-slider">  
                        <img href="<?php if ( get_theme_mod('slider_three_url') !='' ) { echo esc_url(get_theme_mod('slider_three_url')); } ?>" src="<?php echo get_theme_mod('slider_three'); ?>" alt=""/>
                       
                   <?php if ( get_theme_mod('slider_title_three') !='' || get_theme_mod('slider_three_url') !='' || get_theme_mod('slider_three_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_three_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_three')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_three_description')); ?></p>
                      
                            </div>
                         </div>
                   <?php } ?>
                    </li>
                     <?php } ?>
                    
                    <?php 
                    // load fourth slide
                    if ( get_theme_mod('slider_four') !='' ) {  ?>
                    <li id="slider4" class="home-slider"> 
                        <img href="<?php if ( get_theme_mod('slider_four_url') !='' ) { echo esc_url(get_theme_mod('slider_four_url')); } ?>" src="<?php echo get_theme_mod('slider_four'); ?>" alt=""/>
                       
                    <?php if ( get_theme_mod('slider_title_four') !='' || get_theme_mod('slider_four_url') !='' || get_theme_mod('slider_four_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_four_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_four')); ?></a></h2>
                                <p><?php echo esc_html(get_theme_mod('slider_four_description')); ?></p>
                          
                            </div>
                        </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
                         
                    <?php
                    // load fifth slide
                    if ( get_theme_mod('slider_five') !='' ) {  ?>
                    <li id="slider5" class="home-slider">  
                                <img href="<?php if ( get_theme_mod('slider_five_url') !='' ) { echo esc_url(get_theme_mod('slider_five_url')); } ?>" src="<?php echo get_theme_mod('slider_five'); ?>" alt=""/>
                         
                    <?php if ( get_theme_mod('slider_title_five') !='' || get_theme_mod('slider_five_url') !='' || get_theme_mod('slider_five_description') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="slider-text-container">
                            <h2 class="slider-title"><a href="<?php echo esc_url(get_theme_mod('slider_five_url')); ?>"><?php echo esc_html(get_theme_mod('slider_title_five')); ?></a></h2>
                              <p><?php echo esc_html(get_theme_mod('slider_five_description')); ?></p>
                    
                            </div>
                         </div>
                    <?php } ?>
                    </li>
                     <?php } ?>
           <?php } ?>
        </ul>
      </div>
</section><!-- /.slider-wrapper -->

 <!-- Start business-tagline area -->
        <section class="business-tagline-area">
            <div class="container">
                <div class="row">
                    <div class="business-tagline col-sm-12">
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
                <div class="home-featured-one col-lg-4">
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

                <div class="home-featured-two col-lg-4">
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


                <div class="home-featured-three col-lg-4">
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
    
    <div class="home-video-area">
        <div class="container video-wrap">
            <div class="row">
                <div class="col-lg-12">
                      <?php if ( get_theme_mod('video_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('video_title')); ?></h3>
                  <?php } else {  ?> <h3><?php esc_html_e('Take A Quick Look To Ethic Demo', 'ethic') ?></h3>
                           <?php } ?>
                  
                  <?php if ( get_theme_mod('video_description') !='' ) {  ?><p><?php echo esc_html(get_theme_mod('video_description')); ?></p>
                  <?php } else {  ?> <p><?php esc_html_e('Why Ethic is a perfect Theme- Watch this quick demo and you will get the answer.', 'ethic') ?></p>
                           <?php } ?>
                  
                    <div class="video-code">
                        <?php if ( get_theme_mod('home_video') !='' ) {  ?> 
                         <?php echo get_theme_mod('home_video'); ?>
                          <?php } else { ?>
                       <iframe width="560" height="315" src="//www.youtube.com/embed/j5q780fa1vY" frameborder="0" allowfullscreen></iframe> 
                           <?php } ?>
                      </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
                    
    </div><!-- /. home-video-area -->
        
               
      <?php  // Display featured posts on front page
            get_template_part('content', 'frontteam'); ?>
        
        
    <!-- Home testimonial slider starts here --> 
        <section class="testimonial-slider">
            <div class="container testimonial-wrap">
                <div class="row">
            <div class="flexslider" id="reviewslider">
                <ul class="slides">
                    <?php if ( get_theme_mod('tslider_one') =='' ) {  ?>
                        <li id="tslider1">
                            <div class="testimonial-image col-lg-2">
                            <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-1.jpg" alt=""/>
                             <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('John', 'ethic') ?>
                                </a>
                            </div>
                            </div>
                        <div class="flex-caption col-lg-10">
                            <div class="client-testimonial">
                                <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                            </div>
                           
                       </div>
                    </li>
                    
                    <li id="tslider2">
                        <div class="testimonial-image col-lg-2">
                        <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-2.jpg" alt=""/>
                        <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('Era', 'ethic') ?>
                                </a>
                            </div>
                        </div>
                        <div class="flex-caption col-lg-10">
                            <div class="client-testimonial">
                               <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>                  
                            </div>
                            
                        </div>
                    </li>
                    
                     <li id="tslider3">
                         <div class="testimonial-image col-lg-2">
                        <img  src="<?php echo get_template_directory_uri(); ?>/includes/images/tes-3.jpg" alt=""/>
                        <div class="client-name">
                                 <a class="client" href="#">
                                    <?php esc_html_e('Johny', 'ethic') ?>
                                </a>
                            </div>
                         </div>
                        <div class="flex-caption col-lg-10">
                            <div class="client-testimonial">
                                <p><?php esc_html_e('Showcase your multiple services and let users understand about your business.', 'ethic') ?> </p>
                            </div>
                            
                        </div>
                    </li>
                    
                <?php } ?>
                    
                     <?php if ( get_theme_mod('tslider_one') !='' ) {  ?>
                    <li id="tslider1">
                        <img  src="<?php echo get_theme_mod('tslider_one'); ?>" alt=""/>
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
                    </li>
                    
                    <?php if ( get_theme_mod('tslider_two') !='' ) {  ?>
                    <li id="tslider2">
                        <img  src="<?php echo get_theme_mod('tslider_two'); ?>" alt=""/>
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
                    </li>
                    
                     <?php if ( get_theme_mod('tslider_three') !='' ) {  ?>
                     <li id="tslider3"> 
                        <img  src="<?php echo get_theme_mod('tslider_three'); ?>" alt=""/>
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
                    </li>
                    
                     <?php if ( get_theme_mod('tslider_four') !='' ) {  ?>
                     <li id="tslider4"> 
                        <img  src="<?php echo get_theme_mod('tslider_four'); ?>" alt=""/>
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
                    </li>
                    
                     <?php if ( get_theme_mod('tslider_five') !='' ) {  ?>
                     <li id="tslider5"> 
                        <img  src="<?php echo get_theme_mod('tslider_five'); ?>" alt=""/>
                        <?php } ?>
                        <?php if ( get_theme_mod('tslider_five_description') !='' || get_theme_mod('client_name_url_five') !='' || get_theme_mod('client_name_five') !='' ) {  ?>
                        <div class="flex-caption">
                            <div class="client-testimonial">
                                <?php echo wpautop(esc_html(get_theme_mod('tslider_five_description'))); ?>
                            </div>
                            <div class="client-name">
                                 <a href="<?php echo esc_url(get_theme_mod('client_name_url_five')); ?>">
                                     <?php echo esc_html(get_theme_mod('client_name_five')); ?>
                                 </a>
                            </div>
                         </div>
                        <?php } ?>
                    </li>
                    
                 <?php } ?>
                    
               </ul>
            </div>
        </div><!-- /.row -->
       </div><!-- /.container -->
    </section>
    
    <?php
    get_template_part('content','frontportfolio'); 
    
    get_template_part('content','frontposts'); ?>
      
    <div class="contact-area">
        <div class="container contact-wrap">
            <div class="row">
                <div class="home-contact-form col-lg-12">
                     <?php if ( get_theme_mod('contact_title') !='' ) {  ?><h3><?php echo esc_html(get_theme_mod('contact_title')); ?></h3>

                          <?php } else {  ?> <h3><?php esc_html_e('Contact Us', 'ethic') ?></h3>
                                   <?php } ?>
                          
                           <?php if ( get_theme_mod('contact_description') !='' ) {  ?><p><?php echo esc_html(get_theme_mod('contact_description')); ?></p>

                          <?php } else {  ?> <p><?php esc_html_e('Send in your queries and we will get back to you!!', 'ethic') ?></p>
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
    </div>
    <div class="contact-map">
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
                       <iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Arera+Colony,+Bhopal,+Madhya+Pradesh,+India&amp;aq=1&amp;oq=arera+&amp;sll=23.199431,77.414254&amp;sspn=0.029189,0.052314&amp;ie=UTF8&amp;hq=&amp;hnear=Arera+Colony,+Bhopal,+Madhya+Pradesh,+India&amp;ll=23.199422,77.41426&amp;spn=0.029187,0.052314&amp;t=m&amp;z=14&amp;output=embed"></iframe>
                           <?php } ?>
                      </div>
        
    </div>
       
         <span class="top"><a class="back-to-top"><i class="fa fa-arrow-up"></i></a></span>
            
  
<?php
get_footer();
?>