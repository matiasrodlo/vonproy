(function ($) {
	"use strict";
	
	var footer = {};
    qodef.modules.footer = footer;
	
	footer.qodefOnWindowLoad = qodefOnWindowLoad;
	
	$(window).load(qodefOnWindowLoad);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	 
	function qodefOnWindowLoad() {
		uncoveringFooter();
	}
	
	function uncoveringFooter() {
		var uncoverFooter = $('body:not(.error404) .qodef-footer-uncover'),
        	wrapperPadding = $('.qodef-paspartu-enabled .qodef-wrapper').css('padding-bottom'),
			wrapper = wrapperPadding;

		if (uncoverFooter.length && !qodef.htmlEl.hasClass('touch')) {

			var footer = $('footer'),
				footerHeight = footer.outerHeight(),
				content = $('.qodef-content');

			var uncoveringCalcs = function () {
				content.css('margin-bottom', footerHeight);
				footer.css('height', footerHeight);
				footer.css('bottom', wrapper);
			};


			//set
			uncoveringCalcs();
			
			$(window).resize(function () {
				//recalc
				footerHeight = footer.find('.qodef-footer-inner').outerHeight();
				uncoveringCalcs();
			});
		}
	}
	
})(jQuery);