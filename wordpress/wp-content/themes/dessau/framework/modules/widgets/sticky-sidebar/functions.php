<?php

if(!function_exists('dessau_select_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function dessau_select_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'DessauSelectStickySidebar';
		
		return $widgets;
	}
	
	add_filter('dessau_select_register_widgets', 'dessau_select_register_sticky_sidebar_widget');
}