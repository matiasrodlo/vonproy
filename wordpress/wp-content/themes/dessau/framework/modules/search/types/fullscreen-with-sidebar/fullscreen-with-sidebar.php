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
		$classes[] = 'qodef-fullscreen-search-with-sidebar';
		$classes[] = 'qodef-search-fade';
		
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
	
	add_action( 'dessau_select_before_page_header', 'dessau_select_get_search' );
}

if ( ! function_exists( 'dessau_select_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function dessau_select_load_search_template() {
        $parameters = array();

        $parameters['search_in_grid'] 			= dessau_select_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? 'qodef-grid' : '';
        $parameters['search_close_icon_class'] 	= dessau_select_get_search_close_icon_class();
        $parameters['search_submit_icon_class'] = dessau_select_get_search_submit_icon_class();

        dessau_select_get_module_template_part( 'types/fullscreen-with-sidebar/templates/fullscreen-with-sidebar', 'search', '', $parameters );
	}
}

if ( ! function_exists( 'dessau_select_get_fullscreen_sidebar' ) ) {
    /**
     * Return footer top HTML
     */
    function dessau_select_get_fullscreen_sidebar() {
        $parameters = array();

        //get number of top footer columns
        $parameters['search_sidebar_columns'] = dessau_select_options()->getOptionValue( 'search_sidebar_columns' );


        dessau_select_get_module_template_part( 'types/fullscreen-with-sidebar/templates/parts/fullscreen-sidebar', 'search', '', $parameters );
    }
}
