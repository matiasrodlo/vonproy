<?php

if ( ! function_exists( 'dessau_select_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function dessau_select_dropdown_cart_icon_styles() {
		$icon_color       = dessau_select_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = dessau_select_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo dessau_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo dessau_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_dropdown_cart_icon_styles' );
}