<?php

if ( ! function_exists( 'dessau_select_register_widgets' ) ) {
	function dessau_select_register_widgets() {
		$widgets = apply_filters( 'dessau_select_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'dessau_select_register_widgets' );
}