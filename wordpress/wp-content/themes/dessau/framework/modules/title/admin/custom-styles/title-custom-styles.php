<?php

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/custom-styles/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'dessau_select_title_area_typography_style' ) ) {
	function dessau_select_title_area_typography_style() {
		
		// title default/small style
		
		$item_styles = dessau_select_get_typography_styles( 'page_title' );
		
		$item_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-page-title'
		);
		
		echo dessau_select_dynamic_css( $item_selector, $item_styles );
		
		// subtitle style
		
		$item_styles = dessau_select_get_typography_styles( 'page_subtitle' );
		
		$item_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-page-subtitle'
		);
		
		echo dessau_select_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'dessau_select_style_dynamic', 'dessau_select_title_area_typography_style' );
}