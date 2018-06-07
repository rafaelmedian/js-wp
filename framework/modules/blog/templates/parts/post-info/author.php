<div class="edgtf-post-info-author">
    <div class="edgtf-post-info-author-image"> <?php echo kvell_edge_kses_img( get_avatar('thumbnail' ) ); ?> </div>
    <span class="edgtf-post-info-author-text">
        <?php esc_html_e('By', 'kvell'); ?>
    </span>
    <a itemprop="author" class="edgtf-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
        <?php the_author_meta('display_name'); ?>
    </a>
</div>