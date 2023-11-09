<?php

if ( ! function_exists( 'dessau_select_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function dessau_select_register_button_widget( $widgets ) {
		$widgets[] = 'DessauSelectButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_button_widget' );
}