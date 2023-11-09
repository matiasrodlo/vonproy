(function($) {
    'use strict';

    var portfolioMotion = {};
    qodef.modules.portfolioMotion = portfolioMotion;

    portfolioMotion.qodefOnWindowLoad = qodefOnWindowLoad;

    $(window).load(qodefOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitPortfolioMotionCategory();
    }

    /**
     * Initializes portfolio motion category
     */
    function qodefInitPortfolioMotionCategory(){

        var motionList = $('.qodef-portfolio-mc-holder');

        if( motionList.length ) {
            var swiper = new Swiper('.qodef-pl-inner', {
                direction: 'vertical',
                slidesPerView: 'auto',
                freeMode: true,
                mousewheel: true
            });

            var mobSwiper = new Swiper('.qodef-portfolio-mc-mobile-container', {
                centeredSlides: true,
                autoplay: true,
                autoplayDisableOnInteraction: false,
                effect: 'fade'
            });
        }
    }

})(jQuery);