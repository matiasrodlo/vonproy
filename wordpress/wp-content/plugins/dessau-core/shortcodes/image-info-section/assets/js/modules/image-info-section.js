(function($) {
	'use strict';
	
	var imageInfoSection = {};
	qodef.modules.imageInfoSection = imageInfoSection;

	imageInfoSection.qodefInitInfoBorderAppear = qodefInitInfoBorderAppear;
	
	imageInfoSection.qodefOnWindowLoad = qodefOnWindowLoad;
	
	$(window).load(qodefOnWindowLoad);

	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnWindowLoad() {
	    qodefInitInfoBorderAppear();
	}

	/**
	 * Initializes Elements Holder Appear Behaviour
	 */
	function qodefInitInfoBorderAppear(){

		var imageInfoHolder = $('.qodef-image-info-section-holder.qodef-has-border');
		
		if(imageInfoHolder.length && !qodef.htmlEl.hasClass('touch')){
			imageInfoHolder.each(function() {
				var thisImageInfoHolder = $(this);

				thisImageInfoHolder.appear(function() {
			      	// this element is now inside browser viewport
			     	thisImageInfoHolder.addClass('qodef-iis-item-animate-border');
			    }, {accX: 0, accY: -500});
			})
		}
	}

})(jQuery);