<?php

$post_classes = '';
$predefined_category_background = get_post_meta( get_the_ID(), 'edgtf_blog_category_predefined_background_meta', true);
$post_classes = !empty( $predefined_category_background ) ? 'edgtf-category-background-' . $predefined_category_background : '';
$post_classes .= ' ' . (kvell_edge_options()->getOptionValue('show_category_in_box_blog') == 'yes' ? 'edgtf-category-boxed' : '');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-heading">
            <?php kvell_edge_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="edgtf-post-text">
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-info-top">
                    <?php kvell_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="edgtf-post-text-main">
                    <?php kvell_edge_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php kvell_edge_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('kvell_edge_single_link_pages'); ?>
                </div>
                <div class="edgtf-post-info-bottom clearfix">
                    <div class="edgtf-post-info-bottom-left">
                        <?php kvell_edge_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                        <?php kvell_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php
                        if(kvell_edge_options()->getOptionValue('show_tags_area_blog') === 'yes') {
                            kvell_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>