<?php

/*** Post Settings ***/

if ( ! function_exists( 'dessau_select_map_post_meta' ) ) {
	function dessau_select_map_post_meta() {
		
		$post_meta_box = dessau_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'dessau' ),
				'name'  => 'post-meta'
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'dessau' ),
				'parent'        => $post_meta_box,
				'options'       => dessau_select_get_yes_no_select_array()
			)
		);
		
		dessau_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'dessau' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'dessau' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => dessau_select_get_custom_sidebars_options( true )
			)
		);
		
		$dessau_custom_sidebars = dessau_select_get_custom_sidebars();
		if ( count( $dessau_custom_sidebars ) > 0 ) {
			dessau_select_create_meta_box_field( array(
				'name'        => 'qodef_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'dessau' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'dessau' ),
				'parent'      => $post_meta_box,
				'options'     => dessau_select_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		dessau_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'dessau' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'dessau' ),
				'parent'      => $post_meta_box
			)
		);

		do_action('dessau_select_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'dessau_select_meta_boxes_map', 'dessau_select_map_post_meta', 20 );
}
