<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_top_header_options' ) ) {
	function dessau_select_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'dessau_select_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_top_options_map' ) ) {
	function dessau_select_header_top_options_map( $panel_header ) {
		$hide_dep_options = dessau_select_get_hide_dep_for_top_header_options();
		
		$top_header_container = dessau_select_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'dessau' ),
				'parent'        => $top_header_container,
			)
		);
		
		$top_bar_container = dessau_select_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'dependency' => array(
					'hide' => array(
						'top_bar'  => 'no'
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'dessau' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'dessau' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_in_grid_container = dessau_select_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_in_grid'  => 'no'
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'dessau' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'dessau' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'dessau' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'dessau' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'Set background color for top bar', 'dessau' ),
				'parent'      => $top_bar_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'dessau' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'dessau' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'dessau' ),
				'description'   => esc_html__( 'Set top bar border', 'dessau' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_border_container = dessau_select_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_border'  => 'no'
					)
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border Color', 'dessau' ),
				'description' => esc_html__( 'Set border color for top bar', 'dessau' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'dessau' ),
				'description' => esc_html__( 'Enter top bar height (Default is 46px)', 'dessau' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'name'   => 'top_bar_side_padding',
				'type'   => 'text',
				'label'  => esc_html__( 'Top Bar Side Padding', 'dessau' ),
				'parent' => $top_bar_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'dessau' )
				)
			)
		);
	}
	
	add_action( 'dessau_select_header_top_options_map', 'dessau_select_header_top_options_map', 10, 1 );
}