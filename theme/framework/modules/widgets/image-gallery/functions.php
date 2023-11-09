<?php

if ( ! function_exists( 'dessau_select_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function dessau_select_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'DessauSelectImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'dessau_select_register_widgets', 'dessau_select_register_image_gallery_widget' );
}