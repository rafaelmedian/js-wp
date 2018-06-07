<?php do_action( 'kvell_edge_before_footer_content' ); ?>
</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer && ($display_footer_top || $display_footer_bottom)) { ?>
			<footer class="edgtf-page-footer <?php echo esc_attr($holder_classes); ?>">
				<?php
					if($display_footer_top) {
						kvell_edge_get_footer_top();
					}
					if($display_footer_bottom) {
						kvell_edge_get_footer_bottom();
					}
				?>
			</footer>
		<?php } ?>
	</div> <!-- close div.edgtf-wrapper-inner  -->
</div> <!-- close div.edgtf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>