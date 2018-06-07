<?php
$edgtf_blog_type = kvell_edge_get_archive_blog_list_layout();
kvell_edge_include_blog_helper_functions( 'lists', $edgtf_blog_type );
$edgtf_holder_params = kvell_edge_get_holder_params_blog();

get_header();
kvell_edge_get_title();
do_action('kvell_edge_before_main_content');
?>

<div class="<?php echo esc_attr( $edgtf_holder_params['holder'] ); ?>">
	<?php do_action( 'kvell_edge_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $edgtf_holder_params['inner'] ); ?>">
		<?php kvell_edge_get_blog( $edgtf_blog_type ); ?>
	</div>
	
	<?php do_action( 'kvell_edge_before_container_close' ); ?>
</div>

<?php do_action( 'kvell_edge_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>