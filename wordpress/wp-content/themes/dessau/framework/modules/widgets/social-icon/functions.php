<?php

if ( ! function_exists( 'dessau_select_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function dessau_select_register_social_icon_widget( $widgets ) {
		$widgets[] = 'DessauSelectSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_social_icon_widget' );
}