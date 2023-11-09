(function($) {
	'use strict';
	
	var sectionTitle = {};
	qodef.modules.sectionTitle = sectionTitle;

	sectionTitle.qodefInitSectionTitleAppear = qodefInitSectionTitleAppear;

	sectionTitle.qodefOnWindowLoad = qodefOnWindowLoad;

	$(window).load(qodefOnWindowLoad);

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnWindowLoad() {
	    qodefInitSectionTitleAppear();
	}

	/**
	 * Initializes Elements Holder Appear Behaviour
	 */
	function qodefInitSectionTitleAppear(){

		var sectionTitle = $('.qodef-section-title-holder');
		
		if(sectionTitle.length && !qodef.htmlEl.hasClass('touch')){
			sectionTitle.each(function() {
				var thisSectionTitle = $(this);

				thisSectionTitle.appear(function() {
			      	// this element is now inside browser viewport
			     	thisSectionTitle.addClass('qodef-st-animate');
			    }, {accX: 0, accY: 30});
			})
		}
	}

})(jQuery);