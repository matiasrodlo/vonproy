<?php

if (!function_exists('dessau_select_sidearea_options_map')) {
    function dessau_select_sidearea_options_map() {

        dessau_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'dessau'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = dessau_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'dessau'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'dessau'),
                'description'   => esc_html__('Choose a type of Side Area', 'dessau'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'dessau'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'dessau'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'dessau'),
                ),
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'dessau'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'dessau'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = dessau_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'dessau'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'dessau'),
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'dessau'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'dessau'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'predefined',
                'label'         => esc_html__('Select Side Area Icon Source', 'dessau'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'dessau'),
                'options'       => dessau_select_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = dessau_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'dessau'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'dessau'),
                'options'       => dessau_select_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = dessau_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'dessau'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dessau'),
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'dessau'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'dessau'),
            )
        );

        $side_area_icon_style_group = dessau_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'dessau'),
                'description' => esc_html__('Define styles for Side Area icon', 'dessau')
            )
        );

        $side_area_icon_style_row1 = dessau_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'dessau')
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'dessau')
            )
        );

        $side_area_icon_style_row2 = dessau_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'dessau')
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'dessau')
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'dessau'),
                'description' => esc_html__('Choose a background color for Side Area', 'dessau')
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'dessau'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'dessau'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        dessau_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'dessau'),
                'description'   => esc_html__('Choose text alignment for side area', 'dessau'),
                'options'       => array(
                    ''       => esc_html__('Default', 'dessau'),
                    'left'   => esc_html__('Left', 'dessau'),
                    'center' => esc_html__('Center', 'dessau'),
                    'right'  => esc_html__('Right', 'dessau')
                )
            )
        );
    }

    add_action('dessau_select_options_map', 'dessau_select_sidearea_options_map', 16);
}