(function($) {
    "use strict";

    var headerDessau = {};
    qodef.modules.headerDessau = headerDessau;

    headerDessau.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
	    qodefHeaderExpand();
    }

    /*
     **	Header expand animation function
     */
	function qodefHeaderExpand() {
		var header = $('.qodef-page-header');

		if(qodef.body.hasClass('qodef-header-dessau')){
			// Check if header is on top on scroll
			$(window).scroll(function () {
				if ($(window).scrollTop() === 0) {
					header.removeClass('qodef-full-width');
				} else {
					header.addClass('qodef-full-width');
				}
			});
		}
	}

})(jQuery);
