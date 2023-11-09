(function($) {
    'use strict';

    var portfolio = {};
    qodef.modules.portfolio = portfolio;
	
    portfolio.qodefOnDocumentReady = qodefOnDocumentReady;
	
    $(window).load(qodefOnDocumentReady);
	
	/*
	 All functions to be called on $(window).load() should be in this function
	 */
	function qodefOnDocumentReady() {
		qodefPortfolioSingleFollow().init();
		qodefPortfolioSliderHeight();
	}

    var qodefPortfolioSliderHeight = function () {
        var item = $('.qodef-portfolio-list-holder.qodef-pl-gallery .qodef-owl-slider .qodef-pl-item-inner'),
        	itemImg = $('.qodef-portfolio-list-holder.qodef-pl-gallery .qodef-owl-slider .qodef-pl-item-inner img'),
			header = $('.qodef-mobile-header-inner'),
            holder = $('html');

        if (item.length && holder.hasClass('touch')) {
            var headerHeight = header.outerHeight(),
				heightCalc = $(window).height() - headerHeight +'px';

            
            item.css('height', heightCalc);
            itemImg.css('height', heightCalc);
        }
    }
	
	var qodefPortfolioSingleFollow = function () {
		var info = $('.qodef-follow-portfolio-info .qodef-portfolio-single-holder .qodef-ps-info-sticky-holder');
		
		if (info.length) {
			var infoHolder = info.parent(),
				infoHolderOffset = infoHolder.offset().top,
				infoHolderHeight = infoHolder.height(),
				mediaHolder = $('.qodef-ps-image-holder'),
				mediaHolderHeight = mediaHolder.height(),
				header = $('.header-appear, .qodef-fixed-wrapper'),
				headerHeight = (header.length) ? header.height() : 0,
				constant = 30; //30 to prevent mispositioned
		}
		
		var infoHolderPosition = function () {
			if (info.length && mediaHolderHeight >= infoHolderHeight) {
				if (qodef.scroll >= infoHolderOffset - headerHeight - qodefGlobalVars.vars.qodefAddForAdminBar - constant) {
					var marginTop = qodef.scroll - infoHolderOffset + qodefGlobalVars.vars.qodefAddForAdminBar + headerHeight + constant;
					// if scroll is initially positioned below mediaHolderHeight
					if (marginTop + infoHolderHeight > mediaHolderHeight) {
						marginTop = mediaHolderHeight - infoHolderHeight + constant;
					}
					info.stop().animate({
						marginTop: marginTop
					});
				}
			}
		};
		
		var recalculateInfoHolderPosition = function () {
			if (info.length && mediaHolderHeight >= infoHolderHeight) {
				//Calculate header height if header appears
				if (qodef.scroll > 0 && header.length) {
					headerHeight = header.height();
				}
				
				if (qodef.scroll >= infoHolderOffset - headerHeight - qodefGlobalVars.vars.qodefAddForAdminBar - constant) {
					if (qodef.scroll + headerHeight + qodefGlobalVars.vars.qodefAddForAdminBar + constant + infoHolderHeight < infoHolderOffset + mediaHolderHeight) {
						info.stop().animate({
							marginTop: (qodef.scroll - infoHolderOffset + qodefGlobalVars.vars.qodefAddForAdminBar + headerHeight + constant)
						});
						//Reset header height
						headerHeight = 0;
					} else {
						info.stop().animate({
							marginTop: mediaHolderHeight - infoHolderHeight
						});
					}
				} else {
					info.stop().animate({
						marginTop: 0
					});
				}
			}
		};
		
		return {
			init: function () {
				infoHolderPosition();
				$(window).scroll(function () {
					recalculateInfoHolderPosition();
				});
			}
		};
	};

})(jQuery);