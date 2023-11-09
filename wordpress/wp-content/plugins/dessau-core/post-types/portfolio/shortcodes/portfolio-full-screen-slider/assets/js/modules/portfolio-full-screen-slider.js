(function($) {
    'use strict';

    var portfolioFullScreenSlider = {};
    qodef.modules.qodefInitPortfolioFullScreenSlider = qodefInitPortfolioFullScreenSlider;

    portfolioFullScreenSlider.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
	    qodefInitPortfolioFullScreenSlider();
    }


    /**
     * Initializes portfolio full screen slider logic
     */
    function qodefInitPortfolioFullScreenSlider(){
        var holders = $('.qodef-portfolio-full-screen-slider-holder');

        if(holders.length){
	        holders.each(function(){
                var holder = $(this),
                	infoBlock = $('#qodef-ptf-info-block'),
                	infoHolder = infoBlock.find('.qodef-pli-info-holder'),
                	titleArea = infoBlock.find('.qodef-pli-title'),
                    dateArea = infoBlock.find('.qodef-pli-date'),
                    catArea = infoBlock.find('.qodef-pli-cat'),
                	textInner = infoBlock.find('.qodef-pli-text-inner'),
                	excerptInfoArea = infoBlock.find('.qodef-pli-excerpt'),
                	categoryInfoArea = infoBlock.find('.qodef-pli-category-info > p'),
                	dateInfoArea = infoBlock.find('.qodef-pli-date-info > p'),
                	tagInfoArea = infoBlock.find('.qodef-pli-tag-info > p'),
                	shareListInfoArea = infoBlock.find('.qodef-social-share-holder > ul'),
                	infoOpener = infoBlock.find('.qodef-pli-up-arrow'),
	                swiperInstance = holder.find('.swiper-container');


            		var swiperSlider = new Swiper (swiperInstance, {
            			loop: true,
            			direction: 'vertical',
            			slidesPerView: 1,
                        mousewheel: {
                            invert: false,
                        },
            			speed: 1000,
            			autoplay: {
            			    delay: 2800,
            			},
                        pagination: {
                            el: '.swiper-pagination',
                            clickable: true,
                            renderBullet: function (index, className) {
                                return '<span class="' + className + '"></span>';
                            },
                        },
            			init: false
		    		});

                swiperSlider.on('transitionEnd', function () {
                	var currentSlide = holder.find('.qodef-pl-item.swiper-slide-active');

                    if (currentSlide.hasClass('qodef-light-header') ) {
                        $(document.body).addClass('qodef-light-header');
                        $(document.body).removeClass('qodef-dark-header');
                    } else if (currentSlide.hasClass('qodef-dark-header') ) {
                        $(document.body).addClass('qodef-dark-header');
                        $(document.body).removeClass('qodef-light-header');
                    } else {
                        $(document.body).removeClass('qodef-light-header');
                        $(document.body).removeClass('qodef-dark-header');
                    }
                });

            	var setInfo = function() {
            		var activeSlide = swiperInstance.find('.swiper-slide-active'),
            			titleHtml = activeSlide.find('.qodef-pli-title').html(),
            			dateVal = activeSlide.find('.qodef-pli-date-info').text(),
            			excerptVal = activeSlide.find('.qodef-pli-excerpt').text(),
            			categoryHtml = activeSlide.find('.qodef-pli-category-info > p').html(),
            			tagHtml = activeSlide.find('.qodef-pli-tag-info > p').html(),
            			shareListHtml = activeSlide.find('.qodef-social-share-holder > ul').html();

            		titleArea.html(titleHtml);
            		catArea.html(categoryHtml);
            		dateArea.text(dateVal);
            		excerptInfoArea.text(excerptVal);
            		categoryInfoArea.html(categoryHtml);
            		dateInfoArea.text(dateVal);
            		tagInfoArea.html(tagHtml);
            		shareListInfoArea.html(shareListHtml);
            	}

            	var infoToggle = function() {
            		infoOpener.on('click', function(){
            			qodef.body.toggleClass('qodef-pfss-item-is-active');
        				infoBlock.toggleClass('qodef-active');
        				infoOpener.toggleClass('qodef-active');
        				dateArea.toggleClass('qodef-hide');
        				catArea.toggleClass('qodef-hide');
        				infoHolder.toggleClass('qodef-show');

        				if (qodef.body.hasClass('qodef-pfss-item-is-active')) {
        					swiperSlider.autoplay.stop();
        				} else {
        					swiperSlider.autoplay.start();
        					swiperSlider.slideNext();
        				}
            		});
            	}

		        var fullscreenCalcs = function() {
		        	var topOffset = holder.offset().top,
                    	passepartoutHeight = qodef.body.hasClass('qodef-paspartu-enabled') ? parseInt( $('.qodef-wrapper').css('padding-top'), 10 ) : 0;

			        holder.css('height', qodef.windowHeight - topOffset - passepartoutHeight);
		        }


            	swiperSlider.on('init', function(){
            		holder.addClass('qodef-initialized');
			    });

            	swiperSlider.on('slideChangeTransitionStart', function(){
                    var sliderSpeed = swiperSlider.params['speed'];
                    setTimeout(function() {
                        textInner.removeClass("show").addClass("hide");
                    }, sliderSpeed/10);
                    setTimeout(function() {
                        setInfo();
                        textInner.addClass("show").removeClass("hide");
                    }, sliderSpeed/2);
			    });

		        holder.waitForImages(function(){
		        	fullscreenCalcs();
                	swiperSlider.init();
		        	infoToggle();
		        });

		        $(window).resize(function(){
		        	fullscreenCalcs();
		        });
            });
        }
    }

})(jQuery);