(function ($) {
	'use strict';
	
	var fullScreenImageSlider = {};
	qodef.modules.fullScreenImageSlider = fullScreenImageSlider;
	
	
	fullScreenImageSlider.qodefOnWindowLoad = qodefOnWindowLoad;
	
	$(window).load(qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodefOnWindowLoad() {
		qodefInitFullScreenImageSlider();
	}
	
	/**
	 * Init Full Screen Image Slider Shortcode
	 */
	function qodefInitFullScreenImageSlider() {
		var holder = $('.qodef-fsis-slider');
		
		if (holder.length) {
			holder.each(function () {
				var sliderHolder = $(this),
					mainHolder = sliderHolder.parent(),
					prevThumbNav = mainHolder.children('.qodef-fsis-prev-nav'),
					nextThumbNav = mainHolder.children('.qodef-fsis-next-nav'),
					maskHolder = mainHolder.children('.qodef-fsis-slider-mask');
				
				mainHolder.addClass('qodef-fsis-is-init');
				
				qodefImageBehavior(sliderHolder);
				qodefPrevNextImageBehavior(sliderHolder, prevThumbNav, nextThumbNav, -1); // -1 is arbitrary value because 0 can be index of item
				
				sliderHolder.on('drag.owl.carousel', function () {
					setTimeout(function () {
						if (!maskHolder.hasClass('qodef-drag') && !mainHolder.hasClass('qodef-fsis-active')) {
							maskHolder.addClass('qodef-drag');
						}
					}, 200);
				});
				
				sliderHolder.on('dragged.owl.carousel', function () {
					setTimeout(function () {
						if (maskHolder.hasClass('qodef-drag')) {
							maskHolder.removeClass('qodef-drag');
						}
					}, 300);
				});
				
				sliderHolder.on('translate.owl.carousel', function (e) {
					qodefPrevNextImageBehavior(sliderHolder, prevThumbNav, nextThumbNav, e.item.index);
				});
				
				sliderHolder.on('translated.owl.carousel', function () {
					qodefImageBehavior(sliderHolder);
					
					setTimeout(function () {
						maskHolder.removeClass('qodef-drag');
					}, 300);
				});
			});
		}
	}
	
	function qodefImageBehavior(sliderHolder) {
		var activeItem = sliderHolder.find('.owl-item.active'),
			imageHolder = sliderHolder.find('.qodef-fsis-item');
		
		imageHolder.removeClass('qodef-fsis-content-image-init');
		
		qodefResetImageBehavior(sliderHolder);
		
		if (activeItem.length) {
			var activeImageHolder = activeItem.find('.qodef-fsis-item'),
				activeItemImage = activeImageHolder.children('.qodef-fsis-image');
			
			setTimeout(function () {
				activeImageHolder.addClass('qodef-fsis-content-image-init');
			}, 100);
			
			activeItemImage.off().on('mouseenter', function () {
				activeImageHolder.addClass('qodef-fsis-image-hover');
			}).on('mouseleave', function () {
				activeImageHolder.removeClass('qodef-fsis-image-hover');
			}).on('click', function () {
				if (activeImageHolder.hasClass('qodef-fsis-active-image')) {
					sliderHolder.trigger('play.owl.autoplay');
					sliderHolder.parent().removeClass('qodef-fsis-active');
					activeImageHolder.removeClass('qodef-fsis-active-image');
				} else {
					sliderHolder.trigger('stop.owl.autoplay');
					sliderHolder.parent().addClass('qodef-fsis-active');
					activeImageHolder.addClass('qodef-fsis-active-image');
				}
			});
			
			//Close on escape
			$(document).keyup(function (e) {
				if (e.keyCode === 27) { //KeyCode for ESC button is 27
					sliderHolder.trigger('play.owl.autoplay');
					sliderHolder.parent().removeClass('qodef-fsis-active');
					activeImageHolder.removeClass('qodef-fsis-active-image');
				}
			});
		}
	}
	
	function qodefPrevNextImageBehavior(sliderHolder, prevThumbNav, nextThumbNav, itemIndex) {
		var activeItem = itemIndex === -1 ? sliderHolder.find('.owl-item.active') : $(sliderHolder.find('.owl-item')[itemIndex]),
			prevItemImage = activeItem.prev().find('.qodef-fsis-image').css('background-image'),
			nextItemImage = activeItem.next().find('.qodef-fsis-image').css('background-image');
		
		if (prevItemImage.length) {
			prevThumbNav.css({'background-image': prevItemImage});
		}
		
		if (nextItemImage.length) {
			nextThumbNav.css({'background-image': nextItemImage});
		}
	}
	
	function qodefResetImageBehavior(sliderHolder) {
		var imageHolder = sliderHolder.find('.qodef-fsis-item');
		
		if (imageHolder.length) {
			imageHolder.removeClass('qodef-fsis-active-image');
		}
	}
	
})(jQuery);