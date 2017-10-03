jQuery(document).ready( function() {
	jQuery('#searchicon').click(function() {
		jQuery('#jumbosearch').fadeIn();
		jQuery('#jumbosearch input').focus();
	});
	jQuery('#jumbosearch .closeicon').click(function() {
		jQuery('#jumbosearch').fadeOut();
	});
	jQuery('body').keydown(function(e){
	    
	    if(e.keyCode == 27){
	        jQuery('#jumbosearch').fadeOut();
	    }
	});
	
	//masonry
/*
	jQuery('.masonry-main').masonry({
	  itemSelector: '.hanne'
	});
*/
	
	// init Masonry
	var $grid = jQuery('.masonry-main').masonry({
	  itemSelector: '.hanne'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
	  $grid.masonry('layout');
	});
});

jQuery(window).load(function() {
        jQuery('#nivoSlider').nivoSlider({
	        prevText: "<i class='fa fa-chevron-circle-left'></i>",
	        nextText: "<i class='fa fa-chevron-circle-right'></i>",
        });

        jQuery('.sticky-sidebar').scrollToFixed({marginTop: function() {
            var marginTop = jQuery(window).height() - jQuery('.sticky-sidebar').outerHeight(true) - 20;
            if (marginTop >= 0) return 30;
            return marginTop;
        }});

    });
    
(function($) {
	$(document).ready(function() { 
		
		function showSlide(slide) {
			$('.slide').removeClass('visible');
			$('.'+slide).addClass('visible');
		}
		
		
		jQuery('.slide').addClass('not-visible');
		$('.slide1').addClass('visible');
		$('.thumb1').addClass('arrowed');
		$('.thumb').click(function() {
			$('.thumb').removeClass('arrowed');
			$(this).addClass('arrowed');
			
			if ( $(this).hasClass('thumb1') ) {
				showSlide('slide1');
			}
			if ( $(this).hasClass('thumb2') ) {
				showSlide('slide2');
			}
			if ( $(this).hasClass('thumb3') ) {
				showSlide('slide3');
			}
			if ( $(this).hasClass('thumb4') ) {
				showSlide('slide4');
			}
		});
	});
	
})( jQuery );		