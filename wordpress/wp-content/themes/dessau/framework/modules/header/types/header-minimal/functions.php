<?php

if ( ! function_exists( 'dessau_select_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function dessau_select_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'DessauSelect\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'dessau_select_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function dessau_select_init_register_header_minimal_type() {
		add_filter( 'dessau_select_register_header_type_class', 'dessau_select_register_header_minimal_type' );
	}
	
	add_action( 'dessau_select_before_header_function_init', 'dessau_select_init_register_header_minimal_type' );
}

if ( ! function_exists( 'dessau_select_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function dessau_select_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'dessau' );
		
		return $menus;
	}
	
	if ( dessau_select_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'dessau_select_register_headers_menu', 'dessau_select_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'dessau_select_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function dessau_select_get_fullscreen_menu_icon_class() {
		$classes = array(
			'qodef-fullscreen-menu-opener'
		);
		
		$classes[] = dessau_select_get_icon_sources_class( 'fullscreen_menu', 'qodef-fullscreen-menu-opener' );
		
		return $classes;
	}
}

if ( ! function_exists( 'dessau_select_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function dessau_select_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'dessau' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'dessau' ),
				'before_widget' => '<div class="%2$s qodef-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="qodef-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'dessau' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'dessau' ),
				'before_widget' => '<div class="%2$s qodef-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="qodef-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( dessau_select_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'dessau_select_register_header_minimal_full_screen_menu_widgets' );
	}
}