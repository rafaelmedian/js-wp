<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-search-cover" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
	<?php } ?>
			<div class="edgtf-form-holder-outer">
				<div class="edgtf-form-holder">
					<div class="edgtf-form-holder-inner">
						<input type="text" placeholder="<?php esc_attr_e( 'Search', 'kvell' ); ?>" name="s" class="edgtf_search_field" autocomplete="off" />
						<a <?php kvell_edge_class_attribute( $search_close_icon_class ); ?> href="#">
							<?php echo kvell_edge_get_search_close_icon_html(); ?>
						</a>
					</div>
				</div>
			</div>
	<?php if ( $search_in_grid ) { ?>
		</div>
	</div>
	<?php } ?>
</form>