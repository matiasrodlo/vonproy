<?php

if ( ! function_exists( 'dessau_select_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function dessau_select_register_separator_widget( $widgets ) {
		$widgets[] = 'DessauSelectSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_separator_widget' );
}