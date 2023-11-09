<?php

if ( ! function_exists( 'dessau_select_sidebar_options_map' ) ) {
	function dessau_select_sidebar_options_map() {
		
		dessau_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'dessau' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = dessau_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'dessau' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		dessau_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'dessau' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'dessau' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => dessau_select_get_custom_sidebars_options()
		) );
		
		$dessau_custom_sidebars = dessau_select_get_custom_sidebars();
		if ( count( $dessau_custom_sidebars ) > 0 ) {
			dessau_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'dessau' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'dessau' ),
				'parent'      => $sidebar_panel,
				'options'     => $dessau_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'dessau_select_options_map', 'dessau_select_sidebar_options_map', 9 );
}