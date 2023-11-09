<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_standard_options' ) ) {
	function dessau_select_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'dessau_select_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_standard_map' ) ) {
	function dessau_select_header_standard_map( $parent ) {
		$hide_dep_options = dessau_select_get_hide_dep_for_header_standard_options();
		
		dessau_select_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'dessau' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'dessau' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'dessau' ),
					'left'   => esc_html__( 'Left', 'dessau' ),
					'center' => esc_html__( 'Center', 'dessau' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'dessau_select_additional_header_menu_area_options_map', 'dessau_select_header_standard_map' );
}