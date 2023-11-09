<?php

if ( ! function_exists( 'dessau_select_map_woocommerce_meta' ) ) {
	function dessau_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'dessau' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'dessau' ),
				'description' => esc_html__( 'Choose image layout when it appears in Select Product List - Masonry layout shortcode', 'dessau' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'dessau' ),
					'small'              => esc_html__( 'Small', 'dessau' ),
					'large-width'        => esc_html__( 'Large Width', 'dessau' ),
					'large-height'       => esc_html__( 'Large Height', 'dessau' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'dessau' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'dessau' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'dessau' ),
				'options'       => dessau_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'dessau' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_woocommerce_meta', 99 );
}