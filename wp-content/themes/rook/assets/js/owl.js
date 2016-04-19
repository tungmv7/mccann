(function ($, window, document, undefined) {
    'use strict';

    $(document).ready(function() {
		
		// Owl Carousel
        $("#fullwidth-slider, #blog-slider, #small-slider").owlCarousel({
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true
        });

        // Owl Carousel
        $("#service-slider, #clients-slider").owlCarousel({
            items: 3,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });

	});

})(jQuery, window, document);