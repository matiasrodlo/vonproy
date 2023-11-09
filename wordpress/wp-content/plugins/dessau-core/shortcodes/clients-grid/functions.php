<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Qodef_Clients_Grid extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'dessau_core_add_clients_holder_shortcodes' ) ) {
	function dessau_core_add_clients_holder_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'DessauCore\CPT\Shortcodes\ClientsGrid\ClientsGrid'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'dessau_core_filter_add_vc_shortcode', 'dessau_core_add_clients_holder_shortcodes' );
}

if ( ! function_exists( 'dessau_core_set_clients_holder_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for clients grid shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function dessau_core_set_clients_holder_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-clients-grid';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'dessau_core_filter_add_vc_shortcodes_custom_icon_class', 'dessau_core_set_clients_holder_icon_class_name_for_vc_shortcodes' );
}