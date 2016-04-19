(function ($, window, document, undefined) {
    'use strict';

		// Testimonials Slider
		var gridTestimonials = $('#grid-slider-testimonials'),
		wrap, filtersCallback;


		/*********************************
			init cubeportfolio
		 *********************************/
		gridTestimonials.cubeportfolio({
			layoutMode: 'slider',
			drag: true,
			auto: false,
			autoTimeout: 5000,
			autoPauseOnHover: true,
			showNavigation: false,
			showPagination: true,
			rewindNav: true,
			scrollByPage: false,
			gridAdjustment: 'responsive',
			mediaQueries: [{
				width: 1,
				cols: 1
			}],
			gapHorizontal: 0,
			gapVertical: 0,
			caption: 'overlayBottomReveal',
			displayType: 'lazyLoading',
			displayTypeSpeed: 100,

			// lightbox
			lightboxDelegate: '.cbp-lightbox',
			lightboxGallery: true,
			lightboxTitleSrc: 'data-title',
			lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

			// singlePage popup
			singlePageDelegate: '.cbp-singlePage',
			singlePageDeeplinking: true,
			singlePageStickyNavigation: true,
			singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
			singlePageAnimation: 'fade',
			singlePageCallback: function(url, element) {
				// to update singlePage content use the following method: this.updateSinglePage(yourContent)
			},

			// single page inline
			singlePageInlineDelegate: '.cbp-singlePageInline',
			singlePageInlinePosition: 'above',
			singlePageInlineInFocus: true,
			singlePageInlineCallback: function(url, element) {
				// to update singlePage Inline content use the following method: this.updateSinglePageInline(yourContent)
			}
		});
})(jQuery, window, document);