<?php

if ( ! function_exists( 'dessau_select_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function dessau_select_sticky_header_styles() {
		$background_color        = dessau_select_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = dessau_select_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = dessau_select_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = dessau_select_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo dessau_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array( 'background-color' => dessau_select_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo dessau_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = dessau_select_filter_px( $header_height ) . 'px';
			
			echo dessau_select_dynamic_css( '.qodef-page-header .qodef-sticky-header', array( 'height' => $height ) );
			echo dessau_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.qodef-sticky-header .qodef-sticky-holder .qodef-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = dessau_select_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( dessau_select_string_ends_with( $container_side_padding, 'px' ) || dessau_select_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = dessau_select_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = dessau_select_filter_px( $container_side_padding ) . 'px';
			}
			
			echo dessau_select_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = dessau_select_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.qodef-main-menu.qodef-sticky-nav > ul > li > a'
		);
		
		echo dessau_select_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = dessau_select_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
			'.qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item > a'
		);
		
		echo dessau_select_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_sticky_header_styles' );
}