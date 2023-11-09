<?php

if ( ! function_exists( 'dessau_select_add_product_list_simple_shortcode' ) ) {
	function dessau_select_add_product_list_simple_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'DessauCore\CPT\Shortcodes\ProductListSimple\ProductListSimple',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_filter( 'dessau_core_filter_add_vc_shortcode', 'dessau_select_add_product_list_simple_shortcode' );
	}
}

if ( ! function_exists( 'dessau_select_add_product_list_simple_into_shortcodes_list' ) ) {
	function dessau_select_add_product_list_simple_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'qodef_product_list_simple';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'dessau_select_woocommerce_shortcodes_list', 'dessau_select_add_product_list_simple_into_shortcodes_list' );
}