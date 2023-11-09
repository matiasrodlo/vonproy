<?php

if ( ! function_exists( 'dessau_select_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function dessau_select_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'dessau' ),
				'description'   => esc_html__( 'Side Area', 'dessau' ),
				'before_widget' => '<div id="%1$s" class="widget qodef-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="qodef-widget-title-holder"><h6 class="qodef-widget-title">',
				'after_title'   => '</h6></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'dessau_select_register_side_area_sidebar' );
}

if ( ! function_exists( 'dessau_select_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function dessau_select_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'qodef_side_area_opener' ) ) {
			
			if ( dessau_select_options()->getOptionValue( 'side_area_type' ) ) {
				$classes[] = 'qodef-' . dessau_select_options()->getOptionValue( 'side_area_type' );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'dessau_select_side_menu_body_class' );
}

if ( ! function_exists( 'dessau_select_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function dessau_select_get_side_area() {
		
		if ( is_active_widget( false, false, 'qodef_side_area_opener' ) ) {
			$parameters = array(
				'close_icon_classes' => dessau_select_get_side_area_close_icon_class()
			);
			
			dessau_select_get_module_template_part( 'templates/sidearea', 'sidearea', '', $parameters );
		}
	}
	
	add_action( 'dessau_select_after_body_tag', 'dessau_select_get_side_area', 10 );
}

if ( ! function_exists( 'dessau_select_get_side_area_close_class' ) ) {
	/**
	 * Loads side area close icon class
	 */
	function dessau_select_get_side_area_close_icon_class() {
		$classes = array(
			'qodef-close-side-menu'
		);
		
		$classes[] = dessau_select_get_icon_sources_class( 'side_area', 'qodef-close-side-menu' );
		
		return $classes;
	}
}