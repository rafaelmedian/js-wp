<div class="edgtf-grid-row">
	<div <?php echo kvell_edge_get_content_sidebar_class(); ?>>
		<div class="edgtf-search-page-holder">
			<?php kvell_edge_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'kvell_edge_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo kvell_edge_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>