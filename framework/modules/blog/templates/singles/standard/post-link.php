<?php

$article_classes = '';
$predefined_category_background = get_post_meta( get_the_ID(), 'edgtf_blog_category_predefined_background_meta', true);
$article_classes = !empty( $predefined_category_background ) ? 'edgtf-category-background-' . $predefined_category_background : '';
$article_classes = kvell_edge_options()->getOptionValue('show_category_in_box_blog') == 'yes' ? 'edgtf-category-boxed' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($article_classes) ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-content">
            <div class="edgtf-post-text">
                <div class="edgtf-post-mark">
                    <span class="linea-basic-10 icon-basic-link edgtf-link-mark"></span>
                </div>
                <div class="edgtf-post-text-inner">
                    <div class="edgtf-post-info-top">
                    </div>
                    <div class="edgtf-post-text-main">

                        <?php kvell_edge_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="edgtf-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="edgtf-post-info-bottom clearfix">
        <div class="edgtf-post-info-bottom-left">
            <?php kvell_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
            <?php kvell_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
            <?php kvell_edge_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
        </div>
        <div class="edgtf-post-info-bottom-right">
            <?php kvell_edge_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>