<?php

if ( ! function_exists( 'dessau_select_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function dessau_select_register_icon_widget( $widgets ) {
		$widgets[] = 'DessauSelectIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_icon_widget' );
}