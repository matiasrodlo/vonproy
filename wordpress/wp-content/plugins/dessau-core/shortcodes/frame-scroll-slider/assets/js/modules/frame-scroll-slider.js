(function($) {
    'use strict';

    var frameScrollSlider = {};
    qodef.modules.qodefInitFrameScrollSlider = qodefInitFrameScrollSlider;

    frameScrollSlider.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
	    qodefInitFrameScrollSlider();
    }


    /**
     * Initializes frame scroll slider slider logic
     */
    function qodefInitFrameScrollSlider(){
        var holders = $('.qodef-frame-scroll-slider-holder-wrapper');

        if(holders.length){
	        holders.each(function(){
                var holder = $(this),
	                swiperInstance = holder.find('.swiper-container'),
                    scrollLock = true;

        		var swiperSlider = new Swiper (swiperInstance, {
        			direction: 'vertical',
        			slidesPerView: 1,
        			init: false,
                    speed: 1000,
                    mousewheel: {
                        invert: false,
                        eventsTarged: holder,
                    }
	    		});

                // Function to scroll to section with id
                var scrollToSection = function() {
                    var offset = -50;
                    qodef.html.animate({
                        scrollTop: $("#qodef-scroll-to-section").offset().top + offset
                    }, 800);
                }

            	swiperSlider.on('init', function(){
            		holder.addClass('qodef-initialized');

                    // start autoplay and disable mousewheel on touch devices
                    if (qodef.windowWidth < 1025 && qodef.htmlEl.hasClass("touch")) {
                        swiperSlider.autoplay.start();
                        swiperSlider.mousewheel.disable();

                        $(".svg-scroll-down > svg").on("click", function(){
                            scrollToSection();
                        });
                    }
			    });

                // disable mousewheel after last slide
                swiperSlider.on('transitionEnd', function() {
                    if (swiperSlider.isEnd && qodef.htmlEl.hasClass("no-touch")) {
                        swiperSlider.mousewheel.disable();

                        // scroll to section with id on next scroll
                        qodef.window.one('scroll', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            scrollToSection();
                        });
                    }
                });

		        holder.waitForImages(function(){
                	swiperSlider.init();
                    $(window).scroll(function() {
                       if (qodef.scroll === 0) {
                            // enable mousewheel again when user returns to the top
                            swiperSlider.mousewheel.enable();
                            scrollLock = true;
                        } else if (scrollLock) {
                            swiperSlider.mousewheel.disable();
                            scrollLock = false;
                        }
                    });
		        });  
            });
        }
    }

})(jQuery);