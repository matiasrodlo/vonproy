<?php

if ( ! function_exists( 'dessau_select_centered_title_type_options_meta_boxes' ) ) {
	function dessau_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'dessau' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'dessau' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'dessau_select_additional_title_area_meta_boxes', 'dessau_select_centered_title_type_options_meta_boxes', 5 );
}