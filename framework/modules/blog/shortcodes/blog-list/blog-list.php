<?php
namespace KvellCore\CPT\Shortcodes\BlogList;

use KvellCore\Lib;

class BlogList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'edgtf_blog_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Category filter
        add_filter('vc_autocomplete_edgtf_blog_list_category_callback', array(&$this, 'blogCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Category render
        add_filter('vc_autocomplete_edgtf_blog_list_category_render', array(&$this, 'blogCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(
            array(
                'name'                      => esc_html__('Edge Blog List', 'kvell'),
                'base'                      => $this->base,
                'icon'                      => 'icon-wpb-blog-list extended-custom-icon',
                'category'                  => esc_html__('by KVELL', 'kvell'),
                'allowed_container_element' => 'vc_row',
                'params'                    => array(
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'type',
                        'heading'     => esc_html__('Type', 'kvell'),
                        'value'       => array(
                            esc_html__('Standard', 'kvell') => 'standard',
                            esc_html__('Boxed', 'kvell')    => 'boxed',
                            esc_html__('Masonry', 'kvell')  => 'masonry',
                            esc_html__('Simple', 'kvell')   => 'simple',
                            esc_html__('Minimal', 'kvell')  => 'minimal'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'number_of_posts',
                        'heading'    => esc_html__('Number of Posts', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'number_of_columns',
                        'heading'    => esc_html__('Number of Columns', 'kvell'),
                        'value'      => array(
                            esc_html__('One', 'kvell')   => '1',
                            esc_html__('Two', 'kvell')   => '2',
                            esc_html__('Three', 'kvell') => '3',
                            esc_html__('Four', 'kvell')  => '4',
                            esc_html__('Five', 'kvell')  => '5'
                        ),
                        'dependency' => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'space_between_items',
                        'heading'     => esc_html__('Space Between Items', 'kvell'),
                        'value'       => array_flip(kvell_edge_get_space_between_items_array()),
                        'save_always' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'orderby',
                        'heading'     => esc_html__('Order By', 'kvell'),
                        'value'       => array_flip(kvell_edge_get_query_order_by_array()),
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
                        'type'        => 'autocomplete',
                        'param_name'  => 'category',
                        'heading'     => esc_html__('Category', 'kvell'),
                        'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'kvell')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'image_size',
                        'heading'     => esc_html__('Image Size', 'kvell'),
                        'value'       => array(
                            esc_html__('Original', 'kvell')  => 'full',
                            esc_html__('Square', 'kvell')    => 'kvell_edge_square',
                            esc_html__('Landscape', 'kvell') => 'kvell_edge_landscape',
                            esc_html__('Portrait', 'kvell')  => 'kvell_edge_portrait',
                            esc_html__('Thumbnail', 'kvell') => 'thumbnail',
                            esc_html__('Medium', 'kvell')    => 'medium',
                            esc_html__('Large', 'kvell')     => 'large'
                        ),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'title_tag',
                        'heading'    => esc_html__('Title Tag', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_title_tag(true)),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'title_transform',
                        'heading'    => esc_html__('Title Text Transform', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_text_transform_array(true)),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'excerpt_length',
                        'heading'     => esc_html__('Text Length', 'kvell'),
                        'description' => esc_html__('Number of characters', 'kvell'),
                        'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry', 'simple')),
                        'group'       => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_image',
                        'heading'    => esc_html__('Enable Post Info Image', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_section',
                        'heading'    => esc_html__('Enable Post Info Section', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_author',
                        'heading'    => esc_html__('Enable Post Info Author', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_date',
                        'heading'    => esc_html__('Enable Post Info Date', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_category',
                        'heading'    => esc_html__('Enable Post Info Category', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_category_boxed',
                        'heading'    => esc_html__('Put Category in a box', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false, false)),
                        'dependency' => Array('element' => 'post_info_category', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_comments',
                        'heading'    => esc_html__('Enable Post Info Comments', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_like',
                        'heading'    => esc_html__('Enable Post Info Like', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_share',
                        'heading'    => esc_html__('Enable Post Info Share', 'kvell'),
                        'value'      => array_flip(kvell_edge_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'kvell')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'pagination_type',
                        'heading'    => esc_html__('Pagination Type', 'kvell'),
                        'value'      => array(
                            esc_html__('None', 'kvell')            => 'no-pagination',
                            esc_html__('Standard', 'kvell')        => 'standard-shortcodes',
                            esc_html__('Load More', 'kvell')       => 'load-more',
                            esc_html__('Infinite Scroll', 'kvell') => 'infinite-scroll'
                        ),
                        'group'      => esc_html__('Additional Features', 'kvell')
                    )
                )
            )
        );
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type'                     => 'standard',
            'number_of_posts'          => '-1',
            'number_of_columns'        => '3',
            'space_between_items'      => 'normal',
            'category'                 => '',
            'orderby'                  => 'title',
            'order'                    => 'ASC',
            'image_size'               => 'full',
            'title_tag'                => 'h4',
            'title_transform'          => '',
            'excerpt_length'           => '40',
            'post_info_section'        => 'yes',
            'post_info_image'          => 'yes',
            'post_info_author'         => 'yes',
            'post_info_date'           => 'yes',
            'post_info_category'       => 'yes',
            'post_info_category_boxed' => 'no',
            'post_info_comments'       => 'no',
            'post_info_like'           => 'no',
            'post_info_share'          => 'no',
            'pagination_type'          => 'no-pagination'
        );
        $params = shortcode_atts($default_atts, $atts);

        $queryArray = $this->generateQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $params['holder_data'] = $this->getHolderData($params);
        $params['holder_classes'] = $this->getHolderClasses($params, $default_atts);
        $params['module'] = 'list';

        $params['max_num_pages'] = $query_result->max_num_pages;
        $params['paged'] = isset($query_result->query['paged']) ? $query_result->query['paged'] : 1;

        $params['this_object'] = $this;

        ob_start();

        kvell_edge_get_module_template_part('shortcodes/blog-list/holder', 'blog', $params['type'], $params);

        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }

    public function getHolderClasses($params, $default_atts) {
        $holderClasses = array();

        $holderClasses[] = !empty($params['type']) ? 'edgtf-bl-' . $params['type'] : 'edgtf-bl-' . $default_atts['type'];
        $holderClasses[] = $this->getColumnNumberClass($params['number_of_columns']);
        $holderClasses[] = !empty($params['space_between_items']) ? 'edgtf-' . $params['space_between_items'] . '-space' : 'edgtf-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = !empty($params['pagination_type']) ? 'edgtf-bl-pag-' . $params['pagination_type'] : 'edgtf-bl-pag-' . $default_atts['pagination_type'];
        $holderClasses[] = $params['post_info_category_boxed'] == 'yes' ? 'edgtf-boxed-category' : '';

        return implode(' ', $holderClasses);
    }

    public function getColumnNumberClass($params) {
        switch ($params) {
            case 1:
                $classes = 'edgtf-bl-one-column';
                break;
            case 2:
                $classes = 'edgtf-bl-two-columns';
                break;
            case 3:
                $classes = 'edgtf-bl-three-columns';
                break;
            case 4:
                $classes = 'edgtf-bl-four-columns';
                break;
            case 5:
                $classes = 'edgtf-bl-five-columns';
                break;
            default:
                $classes = 'edgtf-bl-three-columns';
                break;
        }

        return $classes;
    }

    public function getHolderData($params) {
        $dataString = '';

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $query_result = $params['query_result'];

        $params['max_num_pages'] = $query_result->max_num_pages;

        if (!empty($paged)) {
            $params['next-page'] = $paged + 1;
        }

        foreach ($params as $key => $value) {
            if ($key !== 'query_result' && $value !== '') {
                $new_key = str_replace('_', '-', $key);

                $dataString .= ' data-' . $new_key . '=' . esc_attr(str_replace(' ', '', $value));
            }
        }

        return $dataString;
    }

    public function generateQueryArray($params) {
        $queryArray = array(
            'post_status'    => 'publish',
            'post_type'      => 'post',
            'orderby'        => $params['orderby'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'post__not_in'   => get_option('sticky_posts')
        );

        if (!empty($params['category'])) {
            $queryArray['category_name'] = $params['category'];
        }

        if (!empty($params['next_page'])) {
            $queryArray['paged'] = $params['next_page'];
        } else {
            $query_array['paged'] = 1;
        }

        return $queryArray;
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

    /**
     * Filter blog categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['category_title']) > 0) ? esc_html__('Category', 'kvell') . ': ' . $value['category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find blog category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get portfolio category
            $category = get_term_by('slug', $query, 'category');
            if (is_object($category)) {

                $category_slug = $category->slug;
                $category_title = $category->name;

                $category_title_display = '';
                if (!empty($category_title)) {
                    $category_title_display = esc_html__('Category', 'kvell') . ': ' . $category_title;
                }

                $data = array();
                $data['value'] = $category_slug;
                $data['label'] = $category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}