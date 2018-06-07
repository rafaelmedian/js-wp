<?php

$item_classes[] = 'edgtf-bl-item edgtf-item-space clearfix';
$predefined_category_background = get_post_meta( get_the_ID(), 'edgtf_blog_category_predefined_background_meta', true);
$item_classes[] = !empty( $predefined_category_background ) ? 'edgtf-category-background-' . $predefined_category_background : '';

?>

<li <?php kvell_edge_class_attribute($item_classes); ?>>
	<div class="edgtf-bli-inner">
        <?php if ( $post_info_image == 'yes' ) { ?>
            <div class="edgtf-bli-image-category-holder">
                <?php kvell_edge_get_module_template_part( 'templates/parts/media', 'blog', '', $params ); ?>
                <?php if ($post_info_section == 'yes' && $post_info_category_boxed == 'yes' && $post_info_category == 'yes') { ?>
                    <div class="edgtf-bli-info-category-boxed">
                        <?php kvell_edge_get_module_template_part( 'templates/parts/post-info/list-category', 'blog', '', $params ); ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="edgtf-bli-content">
	
	        <?php kvell_edge_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="edgtf-bli-excerpt">
		        <?php kvell_edge_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
	        </div>

            <?php if ($post_info_section == 'yes') { ?>
                <div class="edgtf-bli-info">
                    <?php
                    if ( $post_info_date == 'yes' ) {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
                    }
                    if ( $post_info_category == 'yes' && $post_info_category_boxed == 'no') {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/list-category', 'blog', '', $params );
                    }
                    if ( $post_info_author == 'yes' ) {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                    }
                    if ( $post_info_comments == 'yes' ) {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
                    }
                    if ( $post_info_like == 'yes' ) {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
                    }
                    if ( $post_info_share == 'yes' ) {
                        kvell_edge_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
	</div>
</li>