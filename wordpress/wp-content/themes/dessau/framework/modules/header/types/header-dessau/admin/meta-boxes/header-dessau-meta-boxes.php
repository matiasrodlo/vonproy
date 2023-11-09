<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_dessau_meta_boxes' ) ) {
	function dessau_select_get_hide_dep_for_header_dessau_meta_boxes() {
		$hide_dep_options = apply_filters( 'dessau_select_header_dessau_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_dessau_meta_map' ) ) {
	function dessau_select_header_dessau_meta_map( $parent ) {
		$hide_dep_options = dessau_select_get_hide_dep_for_header_dessau_meta_boxes();
		
		dessau_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'dessau' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'dessau' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'dessau' ),
					'left'   => esc_html__( 'Left', 'dessau' ),
					'right'  => esc_html__( 'Right', 'dessau' ),
					'center' => esc_html__( 'Center', 'dessau' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'dessau_select_additional_header_area_meta_boxes_map', 'dessau_select_header_dessau_meta_map' );
}