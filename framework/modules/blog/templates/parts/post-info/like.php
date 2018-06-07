<?php if(kvell_edge_core_plugin_installed()) { ?>
    <div class="edgtf-blog-like">
        <?php if( function_exists('kvell_edge_get_like') ) kvell_edge_get_like(); ?>
    </div>
<?php } ?>