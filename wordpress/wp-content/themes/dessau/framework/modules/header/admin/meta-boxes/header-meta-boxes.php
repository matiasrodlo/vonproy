<?php

if ( ! function_exists( 'dessau_select_header_types_meta_boxes' ) ) {
	function dessau_select_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'dessau_select_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'dessau' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function dessau_select_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'dessau_select_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( SELECT_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'dessau_select_map_header_meta' ) ) {
	function dessau_select_map_header_meta() {
		$header_type_meta_boxes              = dessau_select_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = dessau_select_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'dessau' ),
				'name'  => 'header_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'dessau' ),
				'description'   => esc_html__( 'Select header type layout', 'dessau' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'dessau' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'dessau' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'dessau' ),
					'light-header' => esc_html__( 'Light', 'dessau' ),
					'dark-header'  => esc_html__( 'Dark', 'dessau' )
				)
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'qodef_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'dessau' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'dessau' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'dessau' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'dessau' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'dessau' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'dessau' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'dessau' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'dessau_select_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'dessau_select_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'dessau_select_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'dessau_select_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_header_meta', 50 );
}