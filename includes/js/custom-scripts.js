/* 
 * This file contains calls to various javascript files
 * 
 * Editing this file might lead to some broken theme features.
 * 
 */


/* Trigger home page slider and testimonial slider */
/* Both home page and testimonial slider are powered by FlexSlider by WooThemes */
jQuery(window).load(function() {
    jQuery('#main-slider').flexslider( { 
        prevText: "<i class='fa fa-angle-left'></i>",
	nextText: "<i class='fa fa-angle-right'></i>",
        start: function(slider) {
                        slider.removeClass('loading');
                }
    });
    
    jQuery('.gallery').flexslider( { 
        prevText: "<i class='fa fa-angle-left'></i>",
	nextText: "<i class='fa fa-angle-right'></i>"
    });
    
    jQuery('.portfolio-wrap').mixItUp();
});

jQuery(function() {

        window.scrollReveal = new scrollReveal({ reset: true, move: '50px' });
      });

/* Add a custom back to top button */
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });


    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    });
    
    
    
});
