<?php

if ( ! function_exists( 'dessau_select_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function dessau_select_register_blog_list_widget( $widgets ) {
		$widgets[] = 'DessauSelectBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_blog_list_widget' );
}