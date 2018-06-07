<?php

if (!function_exists('kvell_edge_sidearea_options_map')) {
    function kvell_edge_sidearea_options_map() {

        kvell_edge_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'kvell'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = kvell_edge_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'kvell'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'kvell'),
                'description'   => esc_html__('Choose a type of Side Area', 'kvell'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'kvell'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'kvell'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'kvell'),
                ),
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'kvell'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'kvell'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = kvell_edge_add_admin_container(
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

        kvell_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'kvell'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'kvell'),
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'kvell'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'kvell'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        $side_area_icon_style_group = kvell_edge_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'kvell'),
                'description' => esc_html__('Define styles for Side Area icon', 'kvell')
            )
        );

        $side_area_icon_style_row1 = kvell_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'kvell')
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'kvell')
            )
        );

        $side_area_icon_style_row2 = kvell_edge_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'kvell')
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'kvell')
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'kvell'),
                'description' => esc_html__('Choose a background color for Side Area', 'kvell')
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'kvell'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'kvell'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        kvell_edge_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'kvell'),
                'description'   => esc_html__('Choose text alignment for side area', 'kvell'),
                'options'       => array(
                    ''       => esc_html__('Default', 'kvell'),
                    'left'   => esc_html__('Left', 'kvell'),
                    'center' => esc_html__('Center', 'kvell'),
                    'right'  => esc_html__('Right', 'kvell')
                )
            )
        );
    }

    add_action('kvell_edge_options_map', 'kvell_edge_sidearea_options_map', 15);
}