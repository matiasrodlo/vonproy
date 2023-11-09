(function($) {
    'use strict';

    var portfolioSlider = {};
    qodef.modules.portfolioSlider = portfolioSlider;

    portfolioSlider.qodefOnWindowLoad = qodefOnWindowLoad;

    $(window).load(qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitPortfolioSliderActiveItem();
    }

    /**
     * Initializes portfolio slider active item custom handling
     */
    function qodefInitPortfolioSliderActiveItem(){

        var portSliderHolder = $('.qodef-portfolio-slider-holder');

        if(portSliderHolder.length){
            portSliderHolder.each(function(){
                var thisPortSlider = $(this).find('.qodef-pl-standard-shader-slider');
                var thisPortSliderStage = thisPortSlider.find('.owl-stage');
                var thisPortSliderItems = thisPortSliderStage.children('.owl-item');

                // Add our class to first item after load
                thisPortSliderStage.find('.owl-item.active:first').addClass("qodef-slider-item-active");

                // Add and remove our class on carousel change
                thisPortSlider.on('changed.owl.carousel', function() {
                    thisPortSliderItems.removeClass("qodef-slider-item-active");
                    setTimeout(function() {
                        thisPortSliderStage.find('.owl-item.active:first').addClass("qodef-slider-item-active");
                    }, 50);
                })
            });
        }
    }
})(jQuery);