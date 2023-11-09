<?php

if ( ! function_exists( 'dessau_select_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function dessau_select_register_author_info_widget( $widgets ) {
		$widgets[] = 'DessauSelectAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_author_info_widget' );
}