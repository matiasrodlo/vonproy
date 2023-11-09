<?php

if ( ! function_exists( 'dessau_select_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function dessau_select_register_header_vertical_closed_type( $header_types ) {
		$header_type = array(
			'header-vertical-closed' => 'DessauSelect\Modules\Header\Types\HeaderVerticalClosed'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'dessau_select_init_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function dessau_select_init_register_header_vertical_closed_type() {
		add_filter( 'dessau_select_register_header_type_class', 'dessau_select_register_header_vertical_closed_type' );
	}
	
	add_action( 'dessau_select_before_header_function_init', 'dessau_select_init_register_header_vertical_closed_type' );
}

if ( ! function_exists( 'dessau_select_include_header_vertical_closed_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function dessau_select_include_header_vertical_closed_menu( $menus ) {
		if ( ! array_key_exists( 'vertical-navigation', $menus ) ) {
			$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'dessau' );
		}
		
		return $menus;
	}
	
	if ( dessau_select_check_is_header_type_enabled( 'header-vertical-closed' ) ) {
		add_filter( 'dessau_select_register_headers_menu', 'dessau_select_include_header_vertical_closed_menu' );
	}
}

if ( ! function_exists( 'dessau_select_register_header_vertical_closed_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function dessau_select_register_header_vertical_closed_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-vertical-closed-area',
				'name'          => esc_html__( 'Header Vertical Closed Widget Area', 'dessau' ),
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'dessau' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-area-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="qodef-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( dessau_select_check_is_header_type_enabled( 'header-vertical-closed' ) ) {
		add_action( 'widgets_init', 'dessau_select_register_header_vertical_closed_widget_areas' );
	}
}

if ( ! function_exists( 'dessau_select_get_header_vertical_closed_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function dessau_select_get_header_vertical_closed_widget_areas() {
		$page_id                            = dessau_select_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'qodef_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'qodef-vertical-closed-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'qodef-vertical-closed-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'dessau_select_get_header_vertical_closed_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function dessau_select_get_header_vertical_closed_main_menu() {
		dessau_select_get_module_template_part( 'templates/vertical-closed-navigation', 'header/types/header-vertical-closed' );
	}
}

if ( ! function_exists( 'dessau_select_vertical_closed_header_holder_class' ) ) {
	/**
	 * Return holder class for this header type html
	 */
	function dessau_select_vertical_closed_header_holder_class() {
		$center_content = dessau_select_get_meta_field_intersect( 'vertical_header_center_content', dessau_select_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'qodef-vertical-alignment-center' : 'qodef-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'dessau_select_get_vertical_closed_header_icon_class' ) ) {
	/**
	 * Loads vertical closed icon class
	 */
	function dessau_select_get_vertical_closed_header_icon_class() {
		$classes = array(
			'qodef-vertical-area-opener'
		);
		
		$classes[] = dessau_select_get_icon_sources_class( 'vertical_closed', 'qodef-vertical-area-opener' );

		return $classes;
	}
}