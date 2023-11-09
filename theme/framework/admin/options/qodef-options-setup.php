<?php

if ( ! function_exists( 'dessau_select_admin_map_init' ) ) {
	function dessau_select_admin_map_init() {
		do_action( 'dessau_select_before_options_map' );
		
		foreach ( glob( SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/*/*.php' ) as $module_load ) {
			include_once $module_load;
		}
		
		do_action( 'dessau_select_options_map' );
		
		do_action( 'dessau_select_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'dessau_select_admin_map_init', 1 );
}