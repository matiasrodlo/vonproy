<?php

if ( ! function_exists( 'dessau_select_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function dessau_select_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'dessau' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'dessau' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'dessau_select_additional_title_area_meta_boxes', 'dessau_select_breadcrumbs_title_type_options_meta_boxes' );
}