<?php

if ( ! function_exists( 'dessau_select_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function dessau_select_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'dessau' );
		
		return $type;
	}
	
	add_filter( 'dessau_select_title_type_global_option', 'dessau_select_set_title_standard_type_for_options' );
	add_filter( 'dessau_select_title_type_meta_boxes', 'dessau_select_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'dessau_select_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function dessau_select_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'dessau_select_default_title_type_global_option', 'dessau_select_set_title_standard_type_as_default_options' );
}