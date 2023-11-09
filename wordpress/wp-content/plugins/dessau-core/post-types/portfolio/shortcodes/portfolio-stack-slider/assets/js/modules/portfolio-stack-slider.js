(function($) {
    'use strict';

    var portfolioStackSlider = {};
    qodef.modules.qodefInitPortfolioStackSlider = qodefInitPortfolioStackSlider;

    portfolioStackSlider.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /* 
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
	    qodefInitPortfolioStackSlider();
    }

    /**
     * Initializes portfolio stack slider logic
     */
    function qodefInitPortfolioStackSlider(){
        var holders = $('.qodef-portfolio-stack-slider-holder');

        if(holders.length){
	        holders.each(function(){
                var thisHolder = $(this),
                thisDataHolder = thisHolder.find('.qodef-pl-stack-slider'),
                thisSlider = thisHolder.find('.qodef-stack-slider'),
                // The info box vars
                infoBox = thisHolder.find('.qodef-info-box'),
                infoBoxTitle = infoBox.find('.qodef-pli-title'),
                infoBoxLink = infoBox.find('.qodef-btn-plus'),
                infoBoxLinkTitle = infoBox.find('.qodef-pli-link-title'),
                // Nav and buttons
                nav = thisHolder.find('.qodef-slider-nav'),
                buttonNext = nav.find('.qodef-next'),
                buttonPrev = nav.find('.qodef-prev'),
                curSlide = thisSlider.find('.qodef-stack-slide:last'),
                prevSlide,
                autoplayTimeout,
                autoplayInterval,
                // Slider variables
                sliderSpeed = thisDataHolder.data('slider-speed-animation'),
                autoplaySpeed = thisDataHolder.data('slider-speed'),
                autoplayOption = thisDataHolder.data('enable-autoplay'),
                autoplayTimeoutTime = 3000;

                // Check to disable navigation
                if (thisDataHolder.data('enable-navigation') === "yes") {
                    nav.css({display: "block"});
                }

                // Function to reset autoplay interval and timeout
                var resetTimeouts = function() {
                    if(autoplayOption === "yes") {
                        clearTimeout(autoplayTimeout);
                        clearInterval(autoplayInterval);
                        autoplayTimeout = setTimeout(function() {
                            autoplayInterval = setInterval(function() {
                                goNext();
                            }, autoplaySpeed);
                        }, autoplayTimeoutTime);
                    }
                }

                var infoBoxMain = function(slideItem) {
                    // Read current slide item data
                    var title = slideItem.find('.qodef-info-box-data-hidden > h2').text(),
                        link = slideItem.find('.qodef-info-box-data-hidden > a'),
                        linkHref = link.attr('href');

                    // Animate infoBox
                    infoBox.removeClass('qodef-info-box-animate')
                    setTimeout(function() {
                        infoBox.addClass('qodef-info-box-animate');
                    }, 10);

                    // Set info box information
                    setTimeout(function() {
                        infoBoxTitle.text(title);
                        infoBoxLink.attr("href", linkHref);
                        infoBoxLinkTitle.attr("href", linkHref);
                    }, 500);
                }

                function goNext() {
                    nav.addClass("disabled");
                    thisSlider.addClass("disabled");
                    curSlide = thisSlider.find('.qodef-stack-slide:last');
                    curSlide.css({transform: "translateX(100%)", transition: sliderSpeed + "ms ease"});
                    prevSlide = curSlide;
                    curSlide =  curSlide.prev();
                    infoBoxMain(curSlide);
                    setTimeout(function() {
                        prevSlide.css({transform: "", transition: ""});
                        prevSlide.prependTo(thisSlider);
                        nav.removeClass("disabled");
                        thisSlider.removeClass("disabled");
                    }, sliderSpeed + 100);
                }

                function goPrev() {
                    nav.addClass("disabled");
                    thisSlider.addClass("disabled");
                    curSlide = thisSlider.find('.qodef-stack-slide:first');
                    curSlide.addClass('prepMoveBack');
                    curSlide.appendTo(thisSlider);
                    infoBoxMain(curSlide);
                    setTimeout(function() {
                        curSlide.css({transform: "translateX(0)", transition: sliderSpeed + "ms ease"});
                        prevSlide = curSlide;
                        curSlide =  thisSlider.find('.qodef-stack-slide:first');
                    }, 100);
                    setTimeout(function() {
                        nav.removeClass("disabled");
                        thisSlider.removeClass("disabled");
                        prevSlide.css({transform: "", transition: ""});
                        prevSlide.removeClass('prepMoveBack');
                    }, sliderSpeed + 100);
                }

                // Nav buttons handling
                buttonNext.on("click", function() {
                    goNext();
                    resetTimeouts();
                });

                buttonPrev.on("click", function() {
                    goPrev();
                    resetTimeouts();
                });

                thisHolder.waitForImages(function() {
                    // Initialize infoBox
                    infoBoxMain(curSlide);
                    setTimeout(function() {
                        infoBox.removeClass('qodef-info-box-hidden');
                    }, 1000);

                    // Start autoplay if on
                    if (autoplayOption === "yes") {
                        autoplayInterval = setInterval(function() {
                            goNext();
                        }, autoplaySpeed);
                    }
                });
            });
        }
    }
})(jQuery);