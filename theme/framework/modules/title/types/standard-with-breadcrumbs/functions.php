<?php

if ( ! function_exists( 'dessau_select_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function dessau_select_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'dessau' );
		
		return $type;
	}
	
	add_filter( 'dessau_select_title_type_global_option', 'dessau_select_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'dessau_select_title_type_meta_boxes', 'dessau_select_set_title_standard_with_breadcrumbs_type_for_options' );
}