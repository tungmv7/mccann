(function ($, window, document, undefined) {
    'use strict';

    // Parallax Background
        jQuery(function() {
            jQuery(".image-parallax").css("min-height", jQuery(window).height());
            jQuery(".parallax").simpleParallax();
        });
        
    jQuery(document).ready(function() {

        jQuery("ul.nav.nav-tabs-services.nav-tabs li:nth-child(1), .tab-content div:nth-child(1)").addClass("active");      
        
        // Scroll Top
        jQuery(".fa-chevron-up, .navbar-brand").click(function() {
            jQuery('html, body').animate({
                scrollTop: jQuery("#page-top").offset().top
            }, 2000);
        });         

        jQuery("ul.navbar-nav li ul li.menu-item-has-children").mouseenter(function() {
            jQuery("ul.navbar-nav li ul li ul.dropdown-menu").css("display","block")
        }).mouseleave(function() {
            jQuery("ul.navbar-nav li ul li ul.dropdown-menu").css("display","none")
        }); 

        // Magnific popup
        jQuery('.video-popup').magnificPopup({
            type: 'iframe',
        });        

        // Reveal JS on scroll
        window.sr = new scrollReveal();
        
        //Navbar Scroll         
        jQuery('.navbar a').bind('click', function(event) {
            var jQueryanchor = jQuery(this);
            var url=jQueryanchor.attr('href');
            var hash = url.substring(url.indexOf('#'));
            if(jQuery(hash).length)
            {
                jQuery('html, body').stop().animate({
                    scrollTop: jQuery(hash).offset().top - 80
                }, 1000);
                event.preventDefault();
            }
        });
        jQuery('.main-actions a').bind('click', function(event) {
            var jQueryanchor = jQuery(this);
            var url=jQueryanchor.attr('href');
            var hash = url.substring(url.indexOf('#'));
            if(jQuery(hash).length)
            {
                jQuery('html, body').stop().animate({
                    scrollTop: jQuery(hash).offset().top - 80
                }, 1000);
                event.preventDefault();
            }
        });
        (function () {
            window.onerror = function myErrorHandler(errorMsg, url, lineNumber) {   
            return true;
            }
        })();  

        jQuery('.header-navbar li').removeClass('active');

        jQuery('.dropdown-menu li').removeClass('current');          

		jQuery('.navbar li').click(function() {
		    jQuery(".navbar li.current").removeClass("current");
		    jQuery(this).addClass('current');
		});             

        // jQuery to collapse the navbar on scroll
        jQuery(window).scroll(function() {
            if (jQuery(".navbar").offset().top > 100) {
                jQuery(".navbar-fixed-top").addClass("header-navbar-collapse");
            } else {
                jQuery(".navbar-fixed-top").removeClass("header-navbar-collapse");
            }
        });      

        // Closes the Responsive Menu on Menu Item Click
        jQuery('.navbar-collapse ul li a').click(function() {
            jQuery('.navbar-toggle:visible').click();
        });

    });


    jQuery(window).load(function() {
        // Page Loader
        jQuery("#preloader").delay(900).fadeOut(500);

        //Video Bg
        //jQuery(".player").mb_YTPlayer();
    });

})(jQuery, window, document);