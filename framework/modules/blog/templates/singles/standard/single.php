<?php

kvell_edge_get_single_post_format_html($blog_single_type);

do_action('kvell_edge_after_article_content');

kvell_edge_get_module_template_part('templates/parts/single/author-info', 'blog');

kvell_edge_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

kvell_edge_get_module_template_part('templates/parts/single/comments', 'blog');

kvell_edge_get_module_template_part('templates/parts/single/single-navigation', 'blog');