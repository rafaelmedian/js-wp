<?php

namespace KvellCore\CPT\Shortcodes\ProductList;

use KvellCore\Lib;

class ProductList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_product_list';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name'                      => esc_html__('Edge Product List', 'kvell'),
                    'base'                      => $this->base,
                    'icon'                      => 'icon-wpb-product-list extended-custom-icon',
                    'category'                  => esc_html__('by KVELL', 'kvell'),
                    'allowed_container_element' => 'vc_row',
                    'params'                    => array(
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'type',
                            'heading'     => esc_html__('Type', 'kvell'),
                            'value'       => array(
                                esc_html__('Standard', 'kvell') => 'standard',
                                esc_html__('Masonry', 'kvell')  => 'masonry'
                            ),
                            'admin_label' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'info_position',
                            'heading'     => esc_html__('Product Info Position', 'kvell'),
                            'value'       => array(
                                esc_html__('Info On Image Hover', 'kvell') => 'info-on-image',
                                esc_html__('Info Below Image', 'kvell')    => 'info-below-image'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'number_of_posts',
                            'heading'    => esc_html__('Number of Products', 'kvell')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'number_of_columns',
                            'heading'     => esc_html__('Number of Columns', 'kvell'),
                            'value'       => array(
                                esc_html__('One', 'kvell')   => '1',
                                esc_html__('Two', 'kvell')   => '2',
                                esc_html__('Three', 'kvell') => '3',
                                esc_html__('Four', 'kvell')  => '4',
                                esc_html__('Five', 'kvell')  => '5',
                                esc_html__('Six', 'kvell')   => '6'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'space_between_items',
                            'heading'     => esc_html__('Space Between Items', 'kvell'),
                            'value'       => array_flip(kvell_edge_get_space_between_items_array()),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'orderby',
                            'heading'     => esc_html__('Order By', 'kvell'),
                            'value'       => array_flip(kvell_edge_get_query_order_by_array(false, array('on-sale' => esc_html__('On Sale', 'kvell')))),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'order',
                            'heading'     => esc_html__('Order', 'kvell'),
                            'value'       => array_flip(kvell_edge_get_query_order_array()),
                            'save_always' => true
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'taxonomy_to_display',
                            'heading'     => esc_html__('Choose Sorting Taxonomy', 'kvell'),
                            'value'       => array(
                                esc_html__('Category', 'kvell') => 'category',
                                esc_html__('Tag', 'kvell')      => 'tag',
                                esc_html__('Id', 'kvell')       => 'id'
                            ),
                            'save_always' => true,
                            'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'kvell')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'taxonomy_values',
                            'heading'     => esc_html__('Enter Taxonomy Values', 'kvell'),
                            'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'kvell')
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'image_size',
                            'heading'     => esc_html__('Image Proportions', 'kvell'),
                            'value'       => array(
                                esc_html__('Default', 'kvell')       => '',
                                esc_html__('Original', 'kvell')      => 'full',
                                esc_html__('Square', 'kvell')        => 'square',
                                esc_html__('Landscape', 'kvell')     => 'landscape',
                                esc_html__('Portrait', 'kvell')      => 'portrait',
                                esc_html__('Medium', 'kvell')        => 'medium',
                                esc_html__('Large', 'kvell')         => 'large',
                                esc_html__('Shop Single', 'kvell')    => 'woocommerce_single',
                                esc_html__('Shop Thumbnail', 'kvell') => 'woocommerce_thumbnail'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_title',
                            'heading'    => esc_html__('Display Title', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'product_info_skin',
                            'heading'    => esc_html__('Product Info Skin', 'kvell'),
                            'value'      => array(
                                esc_html__('Default', 'kvell') => 'default',
                                esc_html__('Light', 'kvell')   => 'light',
                                esc_html__('Dark', 'kvell')    => 'dark'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-on-image')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'title_tag',
                            'heading'    => esc_html__('Title Tag', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_title_tag(true)),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'title_transform',
                            'heading'    => esc_html__('Title Text Transform', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_text_transform_array(true)),
                            'dependency' => array('element' => 'display_title', 'value' => array('yes')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_category',
                            'heading'    => esc_html__('Display Category', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_excerpt',
                            'heading'    => esc_html__('Display Excerpt', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'excerpt_length',
                            'heading'     => esc_html__('Excerpt Length', 'kvell'),
                            'description' => esc_html__('Number of characters', 'kvell'),
                            'dependency'  => array('element' => 'display_excerpt', 'value' => array('yes')),
                            'group'       => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_rating',
                            'heading'    => esc_html__('Display Rating', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_price',
                            'heading'    => esc_html__('Display Price', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'display_button',
                            'heading'    => esc_html__('Display Button', 'kvell'),
                            'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                            'group'      => esc_html__('Product Info', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'button_skin',
                            'heading'    => esc_html__('Button Skin', 'kvell'),
                            'value'      => array(
                                esc_html__('Default', 'kvell') => 'default',
                                esc_html__('Light', 'kvell')   => 'light',
                                esc_html__('Dark', 'kvell')    => 'dark'
                            ),
                            'dependency' => array('element' => 'display_button', 'value' => array('yes')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'shader_background_color',
                            'heading'    => esc_html__('Shader Background Color', 'kvell'),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'info_bottom_text_align',
                            'heading'    => esc_html__('Product Info Text Alignment', 'kvell'),
                            'value'      => array(
                                esc_html__('Default', 'kvell') => '',
                                esc_html__('Left', 'kvell')    => 'left',
                                esc_html__('Center', 'kvell')  => 'center',
                                esc_html__('Right', 'kvell')   => 'right'
                            ),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'info_bottom_margin',
                            'heading'    => esc_html__('Product Info Bottom Margin (px)', 'kvell'),
                            'dependency' => array('element' => 'info_position', 'value' => array('info-below-image')),
                            'group'      => esc_html__('Product Info Style', 'kvell')
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type'                    => 'standard',
            'info_position'           => 'info-on-image',
            'number_of_posts'         => '8',
            'number_of_columns'       => '4',
            'space_between_items'     => 'normal',
            'orderby'                 => 'date',
            'order'                   => 'ASC',
            'taxonomy_to_display'     => 'category',
            'taxonomy_values'         => '',
            'image_size'              => 'full',
            'display_title'           => 'yes',
            'product_info_skin'       => '',
            'title_tag'               => 'h3',
            'title_transform'         => '',
            'display_category'        => 'no',
            'display_excerpt'         => 'no',
            'excerpt_length'          => '20',
            'display_rating'          => 'yes',
            'display_price'           => 'yes',
            'display_button'          => 'yes',
            'button_skin'             => 'default',
            'shader_background_color' => '',
            'info_bottom_text_align'  => '',
            'info_bottom_margin'      => ''
        );
        $params = shortcode_atts($default_atts, $atts);

        $params['class_name'] = 'pli';
        $params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
        $params['info_position'] = !empty($params['info_position']) ? $params['info_position'] : $default_atts['info_position'];
        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];

        $additional_params = array();
        $additional_params['holder_classes'] = $this->getHolderClasses($params, $default_atts);

        $queryArray = $this->generateProductQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $additional_params['query_result'] = $query_result;

        $params['this_object'] = $this;

        $html = kvell_edge_get_woo_shortcode_module_template_part('templates/product-list', 'product-list', $params['type'], $params, $additional_params);

        return $html;
    }

    private function getHolderClasses($params, $default_atts) {
        $holderClasses = array();
        $holderClasses[] = !empty($params['type']) ? 'edgtf-' . $params['type'] . '-layout' : 'edgtf-' . $default_atts['type'] . '-layout';
        $holderClasses[] = !empty($params['space_between_items']) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = $this->getColumnNumberClass($params);
        $holderClasses[] = !empty($params['info_position']) ? 'edgtf-' . $params['info_position'] : 'edgtf-' . $default_atts['info_position'];
        $holderClasses[] = !empty($params['product_info_skin']) ? 'edgtf-product-info-' . $params['product_info_skin'] : '';

        return implode(' ', $holderClasses);
    }

    private function getColumnNumberClass($params) {
        $columnsNumber = '';
        $columns = $params['number_of_columns'];

        switch ($columns) {
            case 1:
                $columnsNumber = 'edgtf-one-column';
                break;
            case 2:
                $columnsNumber = 'edgtf-two-columns';
                break;
            case 3:
                $columnsNumber = 'edgtf-three-columns';
                break;
            case 4:
                $columnsNumber = 'edgtf-four-columns';
                break;
            case 5:
                $columnsNumber = 'edgtf-five-columns';
                break;
            case 6:
                $columnsNumber = 'edgtf-six-columns';
                break;
            default:
                $columnsNumber = 'edgtf-four-columns';
                break;
        }

        return $columnsNumber;
    }

    private function generateProductQueryArray($params) {
        $queryArray = array(
            'post_status'         => 'publish',
            'post_type'           => 'product',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => $params['number_of_posts'],
            'orderby'             => $params['orderby'],
            'order'               => $params['order']
        );

        if ($params['orderby'] === 'on-sale') {
            $queryArray['no_found_rows'] = 1;
            $queryArray['post__in'] = array_merge(array(0), wc_get_product_ids_on_sale());
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
    }

    public function getItemClasses($params) {
        $itemClasses = array();

        $image_size_meta = get_post_meta(get_the_ID(), 'edgtf_product_featured_image_size', true);

        if (!empty($image_size_meta)) {
            $itemClasses[] = 'edgtf-woo-fixed-masonry edgtf-woo-image-' . $image_size_meta;
        }

        return implode(' ', $itemClasses);
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

    public function getShaderStyles($params) {
        $styles = array();

        if (!empty($params['shader_background_color'])) {
            $styles[] = 'background-color: ' . $params['shader_background_color'];
        }

        return implode(';', $styles);
    }

    public function getTextWrapperStyles($params) {
        $styles = array();

        if (!empty($params['info_bottom_text_align'])) {
            $styles[] = 'text-align: ' . $params['info_bottom_text_align'];
        }

        if ($params['info_bottom_margin'] !== '') {
            $styles[] = 'margin-bottom: ' . kvell_edge_filter_px($params['info_bottom_margin']) . 'px';
        }

        return implode(';', $styles);
    }
}