<?php

if ( ! function_exists( 'dessau_select_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function dessau_select_register_search_opener_widget( $widgets ) {
		$widgets[] = 'DessauSelectSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_search_opener_widget' );
}