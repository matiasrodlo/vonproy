<?php

if ( ! function_exists( 'dessau_select_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function dessau_select_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'DessauSelectWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'dessau_select_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function dessau_select_get_dropdown_cart_icon_class() {
		$classes = array(
			'qodef-header-cart'
		);
		
		$classes[] = dessau_select_get_icon_sources_class( 'dropdown_cart', 'qodef-header-cart' );
		
		return $classes;
	}
}