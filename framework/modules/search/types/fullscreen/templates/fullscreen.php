<div class="edgtf-fullscreen-search-holder">
    <div class="edgtf-fullscreen-search-close-container">
        <?php kvell_edge_get_logo('search'); ?>
        <div class="edgtf-search-close-holder">
            <a <?php kvell_edge_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
                <?php echo kvell_edge_get_search_close_icon_html(); ?>
            </a>
        </div>
    </div>
	<div class="edgtf-fullscreen-search-table">
		<div class="edgtf-fullscreen-search-cell">
			<div class="edgtf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="edgtf-fullscreen-search-form" method="get">
					<div class="edgtf-form-holder">
						<div class="edgtf-form-holder-inner">
							<div class="edgtf-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Type your search...', 'kvell' ); ?>" name="s" class="edgtf-search-field" autocomplete="off"/>
							</div>
							<button type="submit" <?php kvell_edge_class_attribute( $search_submit_icon_class ); ?>>
								<?php echo kvell_edge_get_search_icon_html(); ?>
							</button>
							<div class="edgtf-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>