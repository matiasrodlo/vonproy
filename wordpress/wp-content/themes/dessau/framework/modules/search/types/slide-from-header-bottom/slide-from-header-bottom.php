<?php

if ( ! function_exists( 'dessau_select_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function dessau_select_search_body_class( $classes ) {
		$classes[] = 'qodef-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'dessau_select_search_body_class' );
}

if ( ! function_exists( 'dessau_select_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function dessau_select_get_search() {
		dessau_select_load_search_template();
	}
	
	add_action( 'dessau_select_before_page_header_html_close', 'dessau_select_get_search' );
	add_action( 'dessau_select_before_mobile_header_html_close', 'dessau_select_get_search' );
}

if ( ! function_exists( 'dessau_select_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function dessau_select_load_search_template() {
		$parameters = array(
			'search_submit_icon_class' => dessau_select_get_search_submit_icon_class()
		);

        dessau_select_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search', '', $parameters );
	}
}