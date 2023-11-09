(function($) {
    'use strict';

    var accordions = {};
    qodef.modules.accordions = accordions;

    accordions.qodefInitAccordions = qodefInitAccordions;


    accordions.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitAccordions();
    }

    /**
     * Init accordions shortcode
     */
    function qodefInitAccordions(){
        var accordion = $('.qodef-accordion-holder');

        if(accordion.length){
            accordion.each(function(){
                var thisAccordion = $(this),
                    widthHolder = thisAccordion.find('.qodef-accordion-width');

                if (thisAccordion.hasClass('qodef-in-grid')){
                    widthHolder.each(function () {
                        var thisWidthHolder = $(this);

                        thisWidthHolder.addClass('qodef-grid');
                    });
                }

                if(thisAccordion.hasClass('qodef-accordion')){
                    thisAccordion.accordion({
                        animate: "easeOutQuad",
                        collapsible: true,
                        active: 0,
                        icons: "",
                        heightStyle: "content",
                        activate: function(event, ui){
                            var reinitButtons = ui.newPanel.find('.qodef-btn.qodef-btn-text-on-hover');

                            reinitButtons.each(function(){
                                var thisButton = $(this);

                                thisButton.removeClass('qodef-btn-initialized');
                                thisButton.css('width','auto');
                                thisButton.find('.qodef-btn-arrow').css('position','relative');

                                qodef.modules.button.qodefReinitButton();
                            });
                        }
                    });
                }

                if(thisAccordion.hasClass('qodef-toggle')){
                    var toggleAccordion = $(this),
                        toggleAccordionTitle = toggleAccordion.find('.qodef-accordion-title'),
                        toggleAccordionContent = toggleAccordionTitle.next();

                    toggleAccordion.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
                    toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
                    toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();

                    toggleAccordionTitle.each(function(){
                        var thisTitle = $(this);

                        thisTitle.on('hover', function(){
                            thisTitle.toggleClass("ui-state-hover");
                        });

                        thisTitle.on('click',function(){
                            thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
                            thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(500, 'easeOutQuad' , function(e){
                                qodef.modules.common.qodefInitParallax();

                                var reinitButtons = thisTitle.next().find('.qodef-btn.qodef-btn-text-on-hover');

                                reinitButtons.each(function(){
                                    var thisButton = $(this);

                                    thisButton.removeClass('qodef-btn-initialized');
                                    thisButton.css('width','auto');
                                    thisButton.find('.qodef-btn-arrow').css('position','relative');

                                    qodef.modules.button.qodefReinitButton();
                                });
                            });
                        });
                    });
                }
            });
        }
    }

})(jQuery);