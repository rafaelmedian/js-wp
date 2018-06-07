<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(kvell_edge_options()->getOptionValue('enable_social_share') === 'yes' && kvell_edge_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="edgtf-blog-share">
        <span class="edgtf-pslist-share-label"><?php esc_html_e( 'Share', 'kvell' ); ?></span><?php echo kvell_edge_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>