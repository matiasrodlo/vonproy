<?php

if ( ! function_exists( 'dessau_select_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function dessau_select_register_custom_font_widget( $widgets ) {
		$widgets[] = 'DessauSelectCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_custom_font_widget' );
}