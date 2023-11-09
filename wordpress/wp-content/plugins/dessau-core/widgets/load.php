<?php

if ( !function_exists('dessau_select_load_widget_class') ) {
	/**
	 * Loades widget class file.
	 */
	function dessau_select_load_widget_class() {
		include_once 'widget-class.php';
	}
	
	add_action('dessau_select_before_options_map', 'dessau_select_load_widget_class');
}

if ( !function_exists('dessau_select_load_widgets') ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to dessau_select_after_options_map action
	 */
	function dessau_select_load_widgets() {
		
		if ( dessau_core_theme_installed() ) {
			foreach ( glob(SELECT_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php') as $widget_load ) {
				include_once $widget_load;
			}
		}
		
		include_once 'widget-loader.php';
	}
	
	add_action('dessau_select_before_options_map', 'dessau_select_load_widgets');
}