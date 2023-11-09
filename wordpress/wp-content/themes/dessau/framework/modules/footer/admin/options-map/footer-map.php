<?php

if ( ! function_exists( 'dessau_select_footer_options_map' ) ) {
	function dessau_select_footer_options_map() {

		dessau_select_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'dessau' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = dessau_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'dessau' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'dessau' ),
				'parent'        => $footer_panel
			)
		);

        dessau_select_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'dessau' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'dessau' ),
                'parent'        => $footer_panel,
            )
        );

		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'dessau' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = dessau_select_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3',
				'label'         => esc_html__( 'Footer Top Columns', 'dessau' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'dessau' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'dessau' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'dessau' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'dessau' ),
					'left'   => esc_html__( 'Left', 'dessau' ),
					'center' => esc_html__( 'Center', 'dessau' ),
					'right'  => esc_html__( 'Right', 'dessau' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		dessau_select_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'Set background color for top footer area', 'dessau' ),
				'parent'      => $show_footer_top_container
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'dessau' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'dessau' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = dessau_select_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		dessau_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'dessau' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'dessau' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		dessau_select_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'dessau' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'dessau' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'dessau_select_options_map', 'dessau_select_footer_options_map', 6 );
}