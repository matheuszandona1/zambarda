(function($) { 

	"use strict";
	
	/* ================ Revolution Slider. ================ */
	if($('.tp-banner').length > 0){
		$('.tp-banner').show().revolution({
			delay:6000,
	        startheight: 550,
	        startwidth: 1040,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullWidth: 'on'
		});
	}
	if($('.tp-banner-full').length > 0){
		$('.tp-banner-full').show().revolution({
			delay:6000,
	        hideThumbs: 1000,
	        navigationType: 'none',
	        touchenabled: 'on',
	        onHoverStop: 'on',
	        navOffsetHorizontal: 0,
	        navOffsetVertical: 0,
	        dottedOverlay: 'none',
	        fullScreen: 'on'
		});
	}
	

/* ================ Collaps for faqs ================ */

	$(document).ready(function() {
		$('.collaps p').hide();
		$(document).on("click", '.collaps h4', function() {
			if( $(this).hasClass('active') ){
				$(this).next('p').slideUp();
				$(this).removeClass('active');
			} else {
				$(this).next('p').slideDown();
				$(this).addClass('active');
			}
		});
	});


	
})(jQuery);