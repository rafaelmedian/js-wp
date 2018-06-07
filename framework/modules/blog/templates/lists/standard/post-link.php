<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="edgtf-post-content">
        <div class="edgtf-post-text">
            <div class="edgtf-post-mark">
                <span class="linea-basic-10 icon-basic-link edgtf-link-mark"></span>
            </div>
            <div class="edgtf-post-text-inner">
                <div class="edgtf-post-text-main">
                    <?php kvell_edge_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="edgtf-post-info-bottom clearfix">
                    <div class="edgtf-post-info-bottom-left">
                        <?php kvell_edge_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php kvell_edge_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                        <?php if(kvell_edge_options()->getOptionValue('show_tags_area_blog') === 'yes') {
                            kvell_edge_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>