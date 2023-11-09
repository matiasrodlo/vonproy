<?php

if ( ! function_exists( 'dessau_select_register_header_dessau_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function dessau_select_register_header_dessau_type( $header_types ) {
		$header_type = array(
			'header-dessau' => 'DessauSelect\Modules\Header\Types\HeaderDessau'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'dessau_select_init_register_header_dessau_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function dessau_select_init_register_header_dessau_type() {
		add_filter( 'dessau_select_register_header_type_class', 'dessau_select_register_header_dessau_type' );
	}
	
	add_action( 'dessau_select_before_header_function_init', 'dessau_select_init_register_header_dessau_type' );
}