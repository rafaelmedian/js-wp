<?php
/*
Template Name: WooCommerce
*/
?>
<?php
$edgtf_sidebar_layout = kvell_edge_sidebar_layout();

get_header();
kvell_edge_get_title();
get_template_part( 'slider' );
do_action('kvell_edge_before_main_content');

//Woocommerce content
if ( ! is_singular( 'product' ) ) { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-grid-row">
				<div <?php echo kvell_edge_get_content_sidebar_class(); ?>>
					<?php kvell_edge_woocommerce_content(); ?>
				</div>
				<?php if ( $edgtf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo kvell_edge_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="edgtf-container">
		<div class="edgtf-container-inner clearfix">
			<?php kvell_edge_woocommerce_content(); ?>
		</div>
	</div>
<?php } ?>
<?php get_footer(); ?>