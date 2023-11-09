<?php

if ( ! function_exists( 'dessau_select_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function dessau_select_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'dessau' );
		
		return $type;
	}
	
	add_filter( 'dessau_select_title_type_global_option', 'dessau_select_set_title_centered_type_for_options' );
	add_filter( 'dessau_select_title_type_meta_boxes', 'dessau_select_set_title_centered_type_for_options' );
}