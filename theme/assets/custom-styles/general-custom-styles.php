<?php

if(!function_exists('dessau_select_design_styles')) {
    /**
     * Generates general custom styles
     */
    function dessau_select_design_styles() {
	    $font_family = dessau_select_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && dessau_select_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo dessau_select_dynamic_css( $font_family_selector, array( 'font-family' => dessau_select_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = dessau_select_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
	            'a:hover',
	            'h1 a:hover',
	            'h2 a:hover',
	            'h3 a:hover',
	            'h4 a:hover',
	            'h5 a:hover',
	            'h6 a:hover',
	            'p a:hover',
	            '.qodef-comment-holder .qodef-comment-text .comment-edit-link:hover',
	            '.qodef-comment-holder .qodef-comment-text .comment-reply-link:hover',
	            '.qodef-comment-holder .qodef-comment-text .replay:hover',
	            '.qodef-owl-slider .owl-nav .owl-next:hover',
	            '.qodef-owl-slider .owl-nav .owl-prev:hover',
	            '.qodef-fullscreen-sidebar .widget ul li a:hover',
	            '.qodef-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
	            '.qodef-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
	            '.qodef-side-menu .widget ul li a:hover',
	            '.qodef-side-menu .widget #wp-calendar tfoot a:hover',
	            '.qodef-side-menu .widget.widget_search .input-holder button:hover',
	            '.qodef-side-menu .widget.widget_tag_cloud a:hover',
	            '.wpb_widgetised_column .widget ul li a:hover',
	            'aside.qodef-sidebar .widget ul li a:hover',
	            '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
	            'aside.qodef-sidebar .widget #wp-calendar tfoot a:hover',
	            '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
	            'aside.qodef-sidebar .widget.widget_search .input-holder button:hover',
	            '.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
	            'aside.qodef-sidebar .widget.widget_tag_cloud a:hover',
	            '.widget ul li a:hover',
	            '.widget #wp-calendar tfoot a:hover',
	            '.widget.widget_search .input-holder button:hover',
	            '.widget.widget_tag_cloud a:hover',
	            'body .pp_pic_holder a.pp_next:hover',
	            'body .pp_pic_holder a.pp_previous:hover',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
	            '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
	            '.qodef-blog-holder article.sticky .qodef-post-title a',
	            '.qodef-blog-holder article .qodef-post-info-top>div a:hover',
	            '.qodef-bl-standard-pagination ul li.qodef-bl-pag-active a',
	            '.qodef-blog-pagination ul li a.qodef-pag-active',
	            '.qodef-author-description .qodef-author-description-text-holder .qodef-author-name a:hover',
	            '.qodef-author-description .qodef-author-description-text-holder .qodef-author-social-icons a:hover',
	            '.qodef-blog-single-navigation .qodef-blog-single-next:hover',
	            '.qodef-blog-single-navigation .qodef-blog-single-prev:hover',
	            '.qodef-blog-list-holder .qodef-bli-info>div a:hover',
	            '.qodef-blog-list-holder.qodef-bl-minimal .qodef-post-info-date a:hover',
	            '.qodef-blog-list-holder.qodef-bl-simple .qodef-bli-content .qodef-post-info-date a:hover',
	            '.qodef-main-menu ul li a:hover',
	            '.qodef-top-bar .widget a:hover',
	            '.qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a:hover',
	            '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-main-menu>ul>li>a:hover',
	            '.qodef-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
	            '.qodef-drop-down .wide .second .inner>ul>li.current-menu-item>a',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-fullscreen-menu-opener.qodef-fm-opened',
	            '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-fullscreen-menu-opener:hover',
	            'nav.qodef-fullscreen-menu ul li ul li.current-menu-ancestor>a',
	            'nav.qodef-fullscreen-menu ul li ul li.current-menu-item>a',
	            'nav.qodef-fullscreen-menu>ul>li.qodef-active-item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu ul li a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu ul li.current-menu-ancestor>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu ul li.current-menu-item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu ul li.current_page_item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu ul li.qodef-active-item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current-menu-item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current_page_item>a',
	            '.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.qodef-active-item>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-ancestor>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-item>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.current_page_item>a',
	            '.qodef-header-vertical .qodef-vertical-menu ul li.qodef-active-item>a',
	            '.qodef-mobile-header .qodef-mobile-menu-opener.qodef-mobile-menu-opened a',
	            '.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>a',
	            '.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>h6',
	            '.qodef-mobile-header .qodef-mobile-nav ul li a:hover',
	            '.qodef-mobile-header .qodef-mobile-nav ul li h6:hover',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>a',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>h6',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>a',
	            '.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>h6',
	            '.qodef-sticky-header .qodef-main-menu>ul>li.qodef-active-item>a',
	            '.qodef-sticky-header .qodef-main-menu>ul>li>a:hover',
	            '.qodef-search-page-holder article.sticky .qodef-post-title a',
	            '.qodef-search-cover .qodef-search-close:hover',
	            '.qodef-side-menu-button-opener.opened',
	            '.qodef-side-menu-button-opener:hover',
	            '.qodef-title-holder.qodef-standard-with-breadcrumbs-type .qodef-breadcrumbs a:hover',
	            '.qodef-portfolio-full-screen-slider-holder #qodef-ptf-info-block .qodef-pli-info-holder .qodef-pli-info p a:hover',
	            '.qodef-portfolio-full-screen-slider-holder .qodef-portfolio-list-holder.qodef-nav-light-skin .qodef-next:hover',
	            '.qodef-portfolio-full-screen-slider-holder .qodef-portfolio-list-holder.qodef-nav-light-skin .qodef-prev:hover',
	            '.qodef-portfolio-full-screen-slider-holder .qodef-portfolio-list-holder.qodef-nav-dark-skin .qodef-next:hover',
	            '.qodef-portfolio-full-screen-slider-holder .qodef-portfolio-list-holder.qodef-nav-dark-skin .qodef-prev:hover',
	            '.qodef-pl-filter-holder ul li:hover span',
	            '.qodef-pl-standard-pagination ul li.qodef-pl-pag-active a',
	            '.qodef-portfolio-list-holder.qodef-pl-gallery-overlay-simple article .qodef-pli-text .qodef-pli-category-holder a:hover',
	            '.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article .qodef-pli-text .qodef-pli-category-holder a:hover',
	            '.qodef-portfolio-list-holder.qodef-pl-gallery-slide-up article .qodef-pli-text .qodef-pli-category-holder a:hover',
	            '.qodef-portfolio-list-holder.qodef-pl-standard-trim article .qodef-pli-text .qodef-pli-category-holder a:hover',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-nav-light-skin .owl-nav .owl-next:hover',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-nav-light-skin .owl-nav .owl-prev:hover',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-nav-dark-skin .owl-nav .owl-next:hover',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-nav-dark-skin .owl-nav .owl-prev:hover',
	            '.qodef-portfolio-stack-slider-holder .qodef-slider-nav .qodef-next:hover',
	            '.qodef-portfolio-stack-slider-holder .qodef-slider-nav .qodef-prev:hover',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination .qodef-testimonials-image-pagination-inner .qodef-testimonials-author-job',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-next:hover',
	            '.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-prev:hover',
	            '.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener:hover',
	            '.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li a',
	            '.qodef-twitter-list-holder .qodef-tweet-text a:hover',
	            '.qodef-twitter-list-holder .qodef-twitter-profile a:hover',
	            '.widget.widget_qodef_twitter_widget .qodef-twitter-widget li .qodef-tweet-text a:hover',
            );

            $woo_color_selector = array();
            if(dessau_select_is_woocommerce_installed()) {
                $woo_color_selector = array(
	                '.woocommerce-pagination .page-numbers li a.current',
	                '.woocommerce-pagination .page-numbers li a:hover',
	                '.woocommerce-pagination .page-numbers li span.current',
	                '.woocommerce-pagination .page-numbers li span:hover',
	                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-minus:hover',
	                '.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-plus:hover',
	                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-minus:hover',
	                'div.woocommerce .qodef-quantity-buttons .qodef-quantity-plus:hover',
	                '.qodef-woo-single-page .qodef-single-product-summary .product_meta>span a:hover',
	                '.qodef-woo-single-page .qodef-single-product-summary .product_meta>span span:hover',
	                '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
	                '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-shopping-cart-holder .qodef-header-cart:hover',
	                '.widget.woocommerce.widget_layered_nav ul li.chosen a',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover span',
	                '.widget.woocommerce.widget_product_search .woocommerce-product-search button span:hover',
	                '.qodef-plc-holder.qodef-plc-nav-light-skin .owl-nav .owl-next:hover',
	                '.qodef-plc-holder.qodef-plc-nav-light-skin .owl-nav .owl-prev:hover',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
		        '.qodef-light-header .qodef-page-header>div:not(.fixed):not(.qodef-sticky-header) .qodef-menu-area .widget a:hover',
		        '.qodef-light-header .qodef-page-header>div:not(.fixed):not(.qodef-sticky-header).qodef-menu-area .widget a:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.fixed):not(.qodef-sticky-header) .qodef-menu-area .widget a:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.fixed):not(.qodef-sticky-header).qodef-menu-area .widget a:hover',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu ul li a',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu ul li a:hover',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu ul li ul li.current-menu-ancestor>a',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu ul li ul li.current-menu-item>a',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu ul li ul li.current_page_item>a',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
		        '.qodef-light-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.qodef-active-item>a',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li>a:hover',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current-menu-item>a',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.current_page_item>a',
		        '.qodef-dark-header.qodef-header-vertical-closed .qodef-vertical-menu>ul>li.qodef-active-item>a',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-ancestor>a',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-item>a',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current_page_item>a',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
		        '.qodef-light-header.qodef-header-vertical .qodef-vertical-menu>ul>li.qodef-active-item>a',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-ancestor>a',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-item>a',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current_page_item>a',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
		        '.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu>ul>li.qodef-active-item>a',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-search-opener:hover',
		        '.qodef-light-header .qodef-top-bar .qodef-search-opener:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-search-opener:hover',
		        '.qodef-dark-header .qodef-top-bar .qodef-search-opener:hover',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener.opened',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-side-menu-button-opener:hover',
		        '.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener.opened',
		        '.qodef-light-header .qodef-top-bar .qodef-side-menu-button-opener:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-icon-widget-holder:hover',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-icon-widget-holder:hover',
		        '.qodef-dark-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-social-icon-widget-holder:hover',
		        '.qodef-light-header .qodef-page-header>div:not(.qodef-sticky-header):not(.fixed) .qodef-social-icon-widget-holder:hover',
	        );

            $background_color_selector = array(
	            '.qodef-st-loader .pulse',
	            '.qodef-st-loader .double_pulse .double-bounce1',
	            '.qodef-st-loader .double_pulse .double-bounce2',
	            '.qodef-st-loader .cube',
	            '.qodef-st-loader .rotating_cubes .cube1',
	            '.qodef-st-loader .rotating_cubes .cube2',
	            '.qodef-st-loader .stripes>div',
	            '.qodef-st-loader .wave>div',
	            '.qodef-st-loader .two_rotating_circles .dot1',
	            '.qodef-st-loader .two_rotating_circles .dot2',
	            '.qodef-st-loader .five_rotating_circles .container1>div',
	            '.qodef-st-loader .five_rotating_circles .container2>div',
	            '.qodef-st-loader .five_rotating_circles .container3>div',
	            '.qodef-st-loader .atom .ball-1:before',
	            '.qodef-st-loader .atom .ball-2:before',
	            '.qodef-st-loader .atom .ball-3:before',
	            '.qodef-st-loader .atom .ball-4:before',
	            '.qodef-st-loader .clock .ball:before',
	            '.qodef-st-loader .mitosis .ball',
	            '.qodef-st-loader .lines .line1',
	            '.qodef-st-loader .lines .line2',
	            '.qodef-st-loader .lines .line3',
	            '.qodef-st-loader .lines .line4',
	            '.qodef-st-loader .fussion .ball',
	            '.qodef-st-loader .fussion .ball-1',
	            '.qodef-st-loader .fussion .ball-2',
	            '.qodef-st-loader .fussion .ball-3',
	            '.qodef-st-loader .fussion .ball-4',
	            '.qodef-st-loader .wave_circles .ball',
	            '.qodef-st-loader .pulse_circles .ball',
	            'footer .widget #wp-calendar td#today',
	            '.qodef-fullscreen-sidebar .widget #wp-calendar td#today',
	            '.qodef-side-menu .widget #wp-calendar td#today',
	            '.ps.ps--in-scrolling.ps--x>.ps__scrollbar-x-rail>.ps__scrollbar-x',
	            '.ps.ps--in-scrolling.ps--y>.ps__scrollbar-y-rail>.ps__scrollbar-y',
	            '.ps:hover.ps--in-scrolling.ps--x>.ps__scrollbar-x-rail>.ps__scrollbar-x',
	            '.ps:hover.ps--in-scrolling.ps--y>.ps__scrollbar-y-rail>.ps__scrollbar-y',
	            '.ps:hover>.ps__scrollbar-x-rail:hover>.ps__scrollbar-x',
	            '.ps:hover>.ps__scrollbar-y-rail:hover>.ps__scrollbar-y',
	            '.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
	            '.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
	            '.qodef-search-fade .qodef-fullscreen-with-sidebar-search-holder .qodef-fullscreen-search-table',
	            '.qodef-social-icons-group-widget.qodef-square-icons .qodef-social-icon-widget-holder:hover',
	            '.qodef-social-icons-group-widget.qodef-square-icons.qodef-light-skin .qodef-social-icon-widget-holder:hover',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-pag-light-skin .owl-dots .owl-dot.active span',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-pag-light-skin .owl-dots .owl-dot:hover span',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-pag-dark-skin .owl-dots .owl-dot.active span',
	            '.qodef-portfolio-slider-holder .qodef-portfolio-list-holder.qodef-pag-dark-skin .owl-dots .owl-dot:hover span',
	            '.qodef-icon-shortcode.qodef-circle',
	            '.qodef-icon-shortcode.qodef-dropcaps.qodef-circle',
	            '.qodef-icon-shortcode.qodef-square',
	            '.qodef-process-holder .qodef-process-circle',
	            '.qodef-process-holder .qodef-process-line',
	            '.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-hover a',
	            '.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-active a',
	            '.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-hover a',
            );

            $woo_background_color_selector = array();
            if(dessau_select_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .added_to_cart:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .button:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .added_to_cart:hover',
	                '.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .button:hover',
	                '.qodef-plc-holder.qodef-plc-pag-light-skin .owl-dots .owl-dot span',
	                '.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-light-skin .added_to_cart:hover',
	                '.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-light-skin .button:hover',
	                '.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .added_to_cart:hover',
	                '.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .button:hover',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
	            '.qodef-st-loader .pulse_circles .ball',
	            '.qodef-owl-slider+.qodef-slider-thumbnail>.qodef-slider-thumbnail-item.active img',
            );

            echo dessau_select_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo dessau_select_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo dessau_select_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo dessau_select_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = dessau_select_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.qodef-content'
		    );
		    echo dessau_select_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $page_background_image  = dessau_select_options()->getOptionValue( 'page_background_image' );
	    $page_background_repeat = dessau_select_options()->getOptionValue( 'page_background_image_repeat' );
	
	    if ( ! empty( $page_background_image ) ) {
		
		    if ( $page_background_repeat === 'yes' ) {
			    $background_image_style = array(
				    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
				    'background-repeat'   => 'repeat',
				    'background-position' => '0 0',
			    );
		    } else {
			    $background_image_style = array(
				    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
				    'background-repeat'   => 'no-repeat',
				    'background-position' => 'center 0',
				    'background-size'     => 'cover'
			    );
		    }
		
		    echo dessau_select_dynamic_css( '.qodef-content', $background_image_style );
	    }
	
	    $selection_color = dessau_select_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo dessau_select_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo dessau_select_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( dessau_select_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . dessau_select_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo dessau_select_dynamic_css( '.qodef-preload-background', $preload_background_styles );
    }

    add_action('dessau_select_style_dynamic', 'dessau_select_design_styles');
}

if ( ! function_exists( 'dessau_select_content_styles' ) ) {
	function dessau_select_content_styles() {
		$content_style = array();
		
		$padding = dessau_select_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);
		
		echo dessau_select_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = dessau_select_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
		);
		
		echo dessau_select_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_content_styles' );
}

if ( ! function_exists( 'dessau_select_h1_styles' ) ) {
	function dessau_select_h1_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h1_styles' );
}

if ( ! function_exists( 'dessau_select_h2_styles' ) ) {
	function dessau_select_h2_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h2_styles' );
}

if ( ! function_exists( 'dessau_select_h3_styles' ) ) {
	function dessau_select_h3_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h3_styles' );
}

if ( ! function_exists( 'dessau_select_h4_styles' ) ) {
	function dessau_select_h4_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h4_styles' );
}

if ( ! function_exists( 'dessau_select_h5_styles' ) ) {
	function dessau_select_h5_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h5_styles' );
}

if ( ! function_exists( 'dessau_select_h6_styles' ) ) {
	function dessau_select_h6_styles() {
		$margin_top    = dessau_select_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = dessau_select_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = dessau_select_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = dessau_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = dessau_select_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_h6_styles' );
}

if ( ! function_exists( 'dessau_select_text_styles' ) ) {
	function dessau_select_text_styles() {
		$item_styles = dessau_select_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo dessau_select_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_text_styles' );
}

if ( ! function_exists( 'dessau_select_link_styles' ) ) {
	function dessau_select_link_styles() {
		$link_styles      = array();
		$link_color       = dessau_select_options()->getOptionValue( 'link_color' );
		$link_font_style  = dessau_select_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = dessau_select_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = dessau_select_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo dessau_select_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_link_styles' );
}

if ( ! function_exists( 'dessau_select_link_hover_styles' ) ) {
	function dessau_select_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = dessau_select_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = dessau_select_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo dessau_select_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo dessau_select_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_link_hover_styles' );
}

if ( ! function_exists( 'dessau_select_smooth_page_transition_styles' ) ) {
	function dessau_select_smooth_page_transition_styles( $style ) {
		$id            = dessau_select_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = dessau_select_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.qodef-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= dessau_select_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = dessau_select_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.qodef-st-loader .qodef-rotate-circles > div',
			'.qodef-st-loader .pulse',
			'.qodef-st-loader .double_pulse .double-bounce1',
			'.qodef-st-loader .double_pulse .double-bounce2',
			'.qodef-st-loader .cube',
			'.qodef-st-loader .rotating_cubes .cube1',
			'.qodef-st-loader .rotating_cubes .cube2',
			'.qodef-st-loader .stripes > div',
			'.qodef-st-loader .wave > div',
			'.qodef-st-loader .two_rotating_circles .dot1',
			'.qodef-st-loader .two_rotating_circles .dot2',
			'.qodef-st-loader .five_rotating_circles .container1 > div',
			'.qodef-st-loader .five_rotating_circles .container2 > div',
			'.qodef-st-loader .five_rotating_circles .container3 > div',
			'.qodef-st-loader .atom .ball-1:before',
			'.qodef-st-loader .atom .ball-2:before',
			'.qodef-st-loader .atom .ball-3:before',
			'.qodef-st-loader .atom .ball-4:before',
			'.qodef-st-loader .clock .ball:before',
			'.qodef-st-loader .mitosis .ball',
			'.qodef-st-loader .lines .line1',
			'.qodef-st-loader .lines .line2',
			'.qodef-st-loader .lines .line3',
			'.qodef-st-loader .lines .line4',
			'.qodef-st-loader .fussion .ball',
			'.qodef-st-loader .fussion .ball-1',
			'.qodef-st-loader .fussion .ball-2',
			'.qodef-st-loader .fussion .ball-3',
			'.qodef-st-loader .fussion .ball-4',
			'.qodef-st-loader .wave_circles .ball',
			'.qodef-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= dessau_select_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'dessau_select_add_page_custom_style', 'dessau_select_smooth_page_transition_styles' );
}