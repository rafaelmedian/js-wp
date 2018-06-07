<?php
if (!function_exists('kvell_edge_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function kvell_edge_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id'            => 'sidearea',
                'name'          => esc_html__('Side Area', 'kvell'),
                'description'   => esc_html__('Side Area', 'kvell'),
                'before_widget' => '<div id="%1$s" class="widget edgtf-sidearea %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="edgtf-widget-title-holder"><h5 class="edgtf-widget-title">',
                'after_title'   => '</h5></div>'
            )
        );
    }

    add_action('widgets_init', 'kvell_edge_register_side_area_sidebar');
}

if (!function_exists('kvell_edge_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function kvell_edge_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            if (kvell_edge_options()->getOptionValue('side_area_type')) {

                $classes[] = 'edgtf-' . kvell_edge_options()->getOptionValue('side_area_type');

            }

        }

        return $classes;
    }

    add_filter('body_class', 'kvell_edge_side_menu_body_class');
}

if (!function_exists('kvell_edge_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function kvell_edge_get_side_area() {

        if (is_active_widget(false, false, 'edgtf_side_area_opener')) {

            $parameters = array(
                'side_area_close_icon_class' => kvell_edge_get_side_area_close_icon_class()
            );

            kvell_edge_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
        }
    }

    add_action('kvell_edge_after_body_tag', 'kvell_edge_get_side_area', 10);
}

if (!function_exists('kvell_edge_get_side_area_close_class')) {
    /**
     * Loads side area close icon class
     */
    function kvell_edge_get_side_area_close_icon_class() {

        $side_area_icon_source = kvell_edge_options()->getOptionValue('side_area_icon_source');

        $side_area_close_icon_class_array = array(
            'edgtf-close-side-menu'
        );

        $side_area_close_icon_class_array[] = $side_area_icon_source == 'icon_pack' ? 'edgtf-close-side-menu-icon-pack' : 'edgtf-close-side-menu-svg-path';

        return $side_area_close_icon_class_array;
    }
}

if (!function_exists('kvell_edge_get_side_area_close_icon_html')) {
    /**
     * Loads side area close icon HTML
     */
    function kvell_edge_get_side_area_close_icon_html() {

        $side_area_icon_source = kvell_edge_options()->getOptionValue('side_area_icon_source');
        $side_area_icon_pack = 'font_awesome';
        $side_area_close_icon_svg_path = kvell_edge_options()->getOptionValue('side_area_close_icon_svg_path');

        $side_area_close_icon_html = '';

        if (($side_area_icon_source == 'icon_pack') && isset($side_area_icon_pack)) {
            $side_area_close_icon_html .= kvell_edge_icon_collections()->getMenuCloseIcon($side_area_icon_pack);
        } else if (isset($side_area_close_icon_svg_path)) {
            $side_area_close_icon_html .= $side_area_close_icon_svg_path;
        }

        return $side_area_close_icon_html;
    }
}