<?php

if ( ! function_exists( 'dessau_select_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function dessau_select_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'DessauSelectRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_recent_posts_widget' );
}