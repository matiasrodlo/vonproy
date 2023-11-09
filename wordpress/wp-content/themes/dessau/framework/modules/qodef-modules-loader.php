<?php

if ( ! function_exists( 'dessau_select_load_modules' ) ) {
	/**
	 * Loades all modules by going through all folders that are placed directly in modules folder
	 * and loads load.php file in each. Hooks to dessau_select_after_options_map action
	 *
	 * @see http://php.net/manual/en/function.glob.php
	 */
	function dessau_select_load_modules() {
		foreach ( glob( SELECT_FRAMEWORK_ROOT_DIR . '/modules/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action( 'dessau_select_before_options_map', 'dessau_select_load_modules' );
}