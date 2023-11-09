<?php

if ( ! function_exists( 'dessau_select_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function dessau_select_register_social_icons_widget( $widgets ) {
		$widgets[] = 'DessauSelectClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_social_icons_widget' );
}