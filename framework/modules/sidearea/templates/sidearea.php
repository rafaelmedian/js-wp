<section class="edgtf-side-menu">
	<a <?php kvell_edge_class_attribute( $side_area_close_icon_class ); ?> href="#">
        <span class="fa fa-times"></span>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>