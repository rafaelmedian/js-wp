<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'kvell' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'kvell' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'kvell' ); ?>"/>
		<button type="submit" class="edgtf-search-submit"><?php echo kvell_edge_icon_collections()->renderIcon( 'fa-search', 'font_awesome' ); ?></button>
	</div>
</form>