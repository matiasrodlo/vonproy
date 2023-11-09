<?php

if ( ! function_exists( 'dessau_select_include_blog_shortcodes' ) ) {
	function dessau_select_include_blog_shortcodes() {
		include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-list/blog-list.php';
		include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/blog-slider/blog-slider.php';
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_action( 'dessau_core_action_include_shortcodes_file', 'dessau_select_include_blog_shortcodes' );
	}
}

if ( ! function_exists( 'dessau_select_add_blog_shortcodes' ) ) {
	function dessau_select_add_blog_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'DessauCore\CPT\Shortcodes\BlogList\BlogList',
			'DessauCore\CPT\Shortcodes\BlogSlider\BlogSlider'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_filter( 'dessau_core_filter_add_vc_shortcode', 'dessau_select_add_blog_shortcodes' );
	}
}

if ( ! function_exists( 'dessau_select_set_blog_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function dessau_select_set_blog_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-blog-slider';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( dessau_select_core_plugin_installed() ) {
		add_filter( 'dessau_core_filter_add_vc_shortcodes_custom_icon_class', 'dessau_select_set_blog_list_icon_class_name_for_vc_shortcodes' );
	}
}