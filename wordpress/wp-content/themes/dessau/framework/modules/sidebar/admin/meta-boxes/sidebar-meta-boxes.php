<?php

if ( ! function_exists( 'dessau_select_map_sidebar_meta' ) ) {
	function dessau_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => apply_filters( 'dessau_select_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'dessau' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'dessau' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'dessau' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => dessau_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = dessau_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			dessau_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'dessau' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'dessau' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_sidebar_meta', 31 );
}