<?php

if ( ! function_exists( 'dessau_select_portfolio_category_additional_fields' ) ) {
	function dessau_select_portfolio_category_additional_fields() {
		
		$fields = dessau_select_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		dessau_select_add_taxonomy_field(
			array(
				'name'   => 'qodef_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'dessau-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'dessau_select_custom_taxonomy_fields', 'dessau_select_portfolio_category_additional_fields' );
}