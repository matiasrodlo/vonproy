<?php

if ( ! function_exists( 'dessau_core_map_testimonials_meta' ) ) {
	function dessau_core_map_testimonials_meta() {
		$testimonial_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'dessau-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'dessau-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'dessau-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);

		dessau_select_create_meta_box_field(
			array(
				'type'     => 'select',
				'name'     => 'qodef_testimonial_quotes',
				'label'    => esc_html__( 'Show Quotation', 'dessau-core' ),
				'description' => esc_html__( 'Quotation mark for standard list', 'dessau-core' ),
				'options'  => array(
					'yes'   => esc_html__( 'Yes', 'dessau-core' ),
					'no'    => esc_html__( 'No', 'dessau-core' )
				),
				'parent'   => $testimonial_meta_box,
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'dessau-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'dessau-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'dessau-core' ),
				'description' => esc_html__( 'Enter author name', 'dessau-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'dessau-core' ),
				'description' => esc_html__( 'Enter author job position', 'dessau-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_core_map_testimonials_meta', 95 );
}