<div class="edgtf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="edgtf-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'kvell' ); ?>" name="s" class="edgtf-search-field" autocomplete="off" />
			<button type="submit" <?php kvell_edge_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo kvell_edge_get_search_icon_html(); ?>
			</button>
		</div>
	</form>
</div>