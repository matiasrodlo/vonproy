<?php

if ( ! function_exists( 'dessau_select_set_header_vertical_closed_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function dessau_select_set_header_vertical_closed_type_global_option( $header_types ) {
		$header_types['header-vertical-closed'] = array(
			'image' => SELECT_FRAMEWORK_HEADER_TYPES_ROOT . '/header-vertical-closed/assets/img/header-vertical-closed.png',
			'label' => esc_html__( 'Vertical - Closed', 'dessau' )
		);
		
		return $header_types;
	}
	
	add_filter( 'dessau_select_header_type_global_option', 'dessau_select_set_header_vertical_closed_type_global_option' );
}

if ( ! function_exists( 'dessau_select_set_header_vertical_closed_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function dessau_select_set_header_vertical_closed_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-vertical-closed'] = esc_html__( 'Vertical - Closed', 'dessau' );
		
		return $header_type_options;
	}
	
	add_filter( 'dessau_select_header_type_meta_boxes', 'dessau_select_set_header_vertical_closed_type_meta_boxes_option' );
}

if ( ! function_exists( 'dessau_select_set_hide_dep_options_header_vertical_closed' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function dessau_select_set_hide_dep_options_header_vertical_closed( $hide_dep_options ) {
		$hide_dep_options[] = 'header-vertical-closed';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'dessau_select_header_logo_area_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_menu_area_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_main_menu_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_top_header_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	
	// header global panel meta boxes
	add_filter( 'dessau_select_header_logo_area_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_menu_area_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_top_header_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	
	// header behavior panel options
	add_filter( 'dessau_select_header_behavior_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_fixed_header_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_sticky_header_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	
	// header behavior panel meta boxes
	add_filter( 'dessau_select_header_behavior_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	
	// header types panel options
	add_filter( 'dessau_select_full_screen_menu_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_centered_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_standard_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_vertical_sliding_hide_global_option', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	
	// header types panel meta boxes
	add_filter( 'dessau_select_header_centered_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
	add_filter( 'dessau_select_header_standard_hide_meta_boxes', 'dessau_select_set_hide_dep_options_header_vertical_closed' );
}