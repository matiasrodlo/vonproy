<?php

if ( ! function_exists( 'dessau_select_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function dessau_select_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'dessau' );

        return $search_type_options;
    }

    add_filter( 'dessau_select_search_type_global_option', 'dessau_select_set_search_fullscreen_global_option' );
}