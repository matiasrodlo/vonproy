<?php

if ( ! function_exists( 'dessau_select_get_hide_dep_for_header_vertical_closed_options' ) ) {
	function dessau_select_get_hide_dep_for_header_vertical_closed_options() {
		$hide_dep_options = apply_filters( 'dessau_select_header_vertical_closed_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'dessau_select_header_vertical_closed_options_map' ) ) {
	function dessau_select_header_vertical_closed_options_map( $panel_header ) {
		$hide_dep_options = dessau_select_get_hide_dep_for_header_vertical_closed_options();
		
		$vertical_closed_container = dessau_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'vertical_closed_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		dessau_select_add_admin_section_title(
			array(
				'parent' => $vertical_closed_container,
				'name'   => 'vertical_closed_opener_style',
				'title'  => esc_html__( 'Vertical Closed Opener Style', 'dessau' )
			)
		);

		dessau_select_add_admin_field(
			array(
				'parent'        => $vertical_closed_container,
				'type'          => 'select',
				'name'          => 'vertical_closed_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Vertical Closed Icon Source', 'dessau' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'dessau' ),
				'options'       => dessau_select_get_icon_sources_array()
			)
		);

		$vertical_closed_icon_pack_container = dessau_select_add_admin_container(
			array(
				'parent'          => $vertical_closed_container,
				'name'            => 'vertical_closed_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'vertical_closed_icon_source' => 'icon_pack'
					)
				)
			)
		);

		dessau_select_add_admin_field(
			array(
				'parent'        => $vertical_closed_icon_pack_container,
				'type'          => 'select',
				'name'          => 'vertical_closed_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Vertical Closed Icon Pack', 'dessau' ),
				'description'   => esc_html__( 'Choose icon pack for vertical closed menu icon', 'dessau' ),
				'options'       => dessau_select_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
			)
		);

		$vertical_closed_icon_svg_path_container = dessau_select_add_admin_container(
			array(
				'parent'          => $vertical_closed_container,
				'name'            => 'vertical_closed_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'vertical_closed_icon_source' => 'svg_path'
					)
				)
			)
		);

		dessau_select_add_admin_field(
			array(
				'parent'      => $vertical_closed_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_closed_icon_svg_path',
				'label'       => esc_html__( 'Vertical Closed Icon SVG Path', 'dessau' ),
				'description' => esc_html__( 'Enter your vertical closed icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dessau' ),
			)
		);

		dessau_select_add_admin_field(
			array(
				'parent'      => $vertical_closed_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'vertical_closed_close_icon_svg_path',
				'label'       => esc_html__( 'Vertical Closed Close Icon SVG Path', 'dessau' ),
				'description' => esc_html__( 'Enter your vertical closed close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dessau' ),
			)
		);

		$vertical_closed_icon_style_group = dessau_select_add_admin_group(
			array(
				'parent'      => $vertical_closed_container,
				'name'        => 'vertical_closed_icon_style_group',
				'title'       => esc_html__( 'Vertical Closed Icon Style', 'dessau' ),
				'description' => esc_html__( 'Define styles for vetical closed icon', 'dessau' )
			)
		);
		
		$vertical_closed_icon_colors_row = dessau_select_add_admin_row(
			array(
				'parent' => $vertical_closed_icon_style_group,
				'name'   => 'vertical_closed_icon_colors_row'
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_color',
				'label'  => esc_html__( 'Color', 'dessau' ),
			)
		);
		
		dessau_select_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'dessau' ),
			)
		);
		
		do_action( 'dessau_select_header_vertical_closed_additional_options', $panel_header );
	}
	
	add_action( 'dessau_select_additional_header_menu_area_options_map', 'dessau_select_header_vertical_closed_options_map' );
}