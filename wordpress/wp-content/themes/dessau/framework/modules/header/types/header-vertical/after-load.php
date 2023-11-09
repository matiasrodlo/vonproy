<?php

if ( ! function_exists( 'dessau_select_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function dessau_select_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( dessau_select_check_is_header_type_enabled( 'header-vertical', dessau_select_get_page_id() ) ) {
		add_filter( 'dessau_select_allow_sticky_header_behavior', 'dessau_select_disable_behaviors_for_header_vertical' );
		add_filter( 'dessau_select_allow_content_boxed_layout', 'dessau_select_disable_behaviors_for_header_vertical' );
	}
}