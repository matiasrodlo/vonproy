<?php

if ( ! function_exists( 'dessau_select_set_header_dessau_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function dessau_select_set_header_dessau_type_global_option( $header_types ) {
		$header_types['header-dessau'] = array(
			'image' => SELECT_FRAMEWORK_HEADER_TYPES_ROOT . '/header-dessau/assets/img/header-dessau.png',
			'label' => esc_html__( 'Dessau', 'dessau' )
		);
		
		return $header_types;
	}
	
	add_filter( 'dessau_select_header_type_global_option', 'dessau_select_set_header_dessau_type_global_option' );
}

if ( ! function_exists( 'dessau_select_set_header_dessau_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function dessau_select_set_header_dessau_type_as_global_option( $header_type ) {
		$header_type = 'header-dessau';
		
		return $header_type;
	}
	
	add_filter( 'dessau_select_default_header_type_global_option', 'dessau_select_set_header_dessau_type_as_global_option' );
}

if ( ! function_exists( 'dessau_select_set_header_dessau_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function dessau_select_set_header_dessau_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-dessau'] = esc_html__( 'Dessau', 'dessau' );
		
		return $header_type_options;
	}
	
	add_filter( 'dessau_select_header_type_meta_boxes', 'dessau_select_set_header_dessau_type_meta_boxes_option' );
}

if ( ! function_exists( 'dessau_select_set_hide_dep_options_header_dessau' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function dessau_select_set_hide_dep_options_header_dessau( $hide_dep_options ) {
		$hide_dep_options[] = 'header-dessau';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'dessau_select_header_logo_area_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	
	// header global panel meta boxes
	add_filter( 'dessau_select_header_logo_area_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_dessau' );
	
	// header types panel options
	add_filter( 'dessau_select_header_centered_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_full_screen_menu_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_header_vertical_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_header_vertical_menu_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_header_vertical_closed_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_header_vertical_sliding_hide_global_option', 'dessau_select_set_hide_dep_options_header_dessau' );
	
	// header types panel meta boxes
	add_filter( 'dessau_select_header_centered_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_dessau' );
	add_filter( 'dessau_select_header_vertical_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_dessau' );
}