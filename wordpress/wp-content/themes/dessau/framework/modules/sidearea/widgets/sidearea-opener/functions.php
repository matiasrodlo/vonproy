<?php

if ( ! function_exists( 'dessau_select_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function dessau_select_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'DessauSelectSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_sidearea_opener_widget' );
}