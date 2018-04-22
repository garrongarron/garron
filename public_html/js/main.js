(function ($) {
	"use strict";
    jQuery(document).ready(function(){
	
	/*====================================
	// 	Mobile Nav
	======================================*/ 	
	jQuery('.nav').slicknav({
		prependTo:".mobile-nav",
	});
	
	/*====================================
	// 	Search Jquery
	======================================*/ 	
	jQuery('.search li a').on( "click", function(){
            jQuery('.search-form').toggleClass('active');
        });
    jQuery('.search-form i').on( "click", function(){
            jQuery('.search-form').toggleClass('active');
     });   
	
	/*======================================
	//  Wow JS
	======================================*/ 		
	var window_width = jQuery(window).width();   
      if(window_width > 767){
            new WOW().init();
		}
		
	/*======================================
	// Main Slider
	======================================*/ 
	jQuery(".slide-main").owlCarousel({
		loop:true,
		autoplay:true,
		smartSpeed: 700,
		autoplayTimeout:5000,
		center:false,
		items:1,
		nav:true,
		dots:true,
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
	});
	var owl = jQuery('.slide-main');
    owl.owlCarousel();
    owl.on('translate.owl.carousel', function (event) {
        jQuery('.slide-text h1').removeClass('fadeInLeft animated').hide();
        jQuery('.slide-text p').removeClass('fadeInLeft animated').hide();
        jQuery('.slide-text .button').removeClass('fadeInLeft animated').hide();
    })
    owl.on('translated.owl.carousel', function (event) {
        jQuery('.slide-text h1').addClass('fadeInLeft animated').show();
        jQuery('.slide-text p').addClass('fadeInLeft animated').show();
        jQuery('.slide-text .button').addClass('fadeInLeft animated').show();
    });
	
	/*======================================
	// Service Hover
	======================================*/ 
	jQuery('.single-service').on('mouseenter', function(){
    jQuery(' .single-service').removeClass('active');
    jQuery(this).addClass('active');
    });
	
	jQuery('.social li').on('mouseenter', function(){
        jQuery(' .social li').removeClass('active');
        jQuery(this).addClass('active');
    });

	/*======================================
	// Testimonial Carousel
	======================================*/ 
	jQuery(".testimonial-carousel").owlCarousel({
		loop:true,
		autoplay:true,
		smartSpeed: 700,
		autoplayTimeout:5000,
		center:true,
		margin:15,
		nav:false,
		dots:true,
		responsive:{
			300: {
                items: 1,
				center:false,
            },
            480: {
                items: 1,
				center:false,
            },
            768: {
                items: 2,
				center:false,
            },
            1170: {
                items: 3,
            },
		}
	});	
	
	/*======================================
	// Blog Carousel
	======================================*/	
	jQuery(".blog-main").owlCarousel({
		loop:true,
		autoplay:false,
		smartSpeed: 600,
		margin:15,
		nav:false,
		dots:true,
		responsive:{
			300: {
                items: 1,
            },
            480: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1170: {
                items: 3,
            },
		}
	});	
	
	/*======================================
	//  Onepage Nav & Smooth Scroll
	======================================*/ 
	if ($.fn.onePageNav) {
        jQuery('.nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 600,
        });     
		jQuery('.slicknav_nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 600,
        });
    }

	/*======================================
	//  Clients Carousel
	======================================*/ 	
	jQuery(".clients-main").owlCarousel({
		loop:true,
		autoplay:true,
		smartSpeed: 1000,
		items:6,
		margin:10,
		nav:true,
		navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
		dots:false,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:3
			},
			600:{
				items:2
			},
			1000:{
				items:6
			},
			
		}
	});
	
	/*======================================
	// Scrool Sticky
	======================================*/ 
	jQuery(window).on('scroll', function() {
        if (jQuery(this).scrollTop() > 1) {
            jQuery('#header').addClass("sticky");
        } else {
            jQuery('#header').removeClass("sticky");
        }
    });
		
	/*======================================
	// Parallax Js
	======================================*/ 
	jQuery(window).stellar({
		horizontalOffset: 40,
		verticalOffset: 150
	});
	
	/*======================================
	// Typed JS
	======================================*/ 
	jQuery(".info").typed({
		strings: ["Business", "Acting", "Dancing"],
		typeSpeed: 150,
		loop: false
	});
	
	/*======================================
	// Magnific Popup
	======================================*/ 
	jQuery('.video-play').magnificPopup({
        type: 'video',	
    });
	
	/*======================================
	// Counter JS
	======================================*/  
	jQuery('.counter').counterUp({
		time: 1000
	});

	/*======================================
	// Scrool Up
	======================================*/  	
	$.scrollUp({
        scrollName: 'scrollUp',      // Element ID
        scrollDistance: 300,         // Distance from top/bottom before showing element (px)
        scrollFrom: 'top',           // 'top' or 'bottom'
        scrollSpeed: 1000,            // Speed back to top (ms)
        easingType: 'linear',        // Scroll to top easing (see http://easings.net/)
        animation: 'fade',           // Fade, slide, none
        animationSpeed: 200,         // Animation speed (ms)
        scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
        scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
        scrollText: ["<i class='fa fa-angle-up'></i>"], // Text for element, can contain HTML
        scrollTitle: false,          // Set a custom <a> title if required.
        scrollImg: false,            // Set true to use image
        activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647           // Z-Index for the overlay
    });
});
	
	/*======================================
	// Extra JS
	======================================*/ 	
	jQuery('.button').on("click", function (e) {
		var anchor = jQuery(this);
			jQuery('html, body').stop().animate({
				scrollTop: jQuery(anchor.attr('href')).offset().top - 70
		}, 1000);
		e.preventDefault();
	});
		
		
	/*======================================
	// Preloader
	======================================*/ 	
	jQuery(window).load(function(){
			jQuery('.loader').fadeOut('slow', function(){
			jQuery(this).remove();
		});
	});
})(jQuery);	