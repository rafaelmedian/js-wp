<?php get_header(); ?>
				<div class="edgtf-page-not-found">
					<?php
					$edgtf_title_image_404 = kvell_edge_options()->getOptionValue( '404_page_title_image' );
					$edgtf_title_404       = kvell_edge_options()->getOptionValue( '404_title' );
					$edgtf_subtitle_404    = kvell_edge_options()->getOptionValue( '404_subtitle' );
					$edgtf_text_404        = kvell_edge_options()->getOptionValue( '404_text' );
					$edgtf_button_label    = kvell_edge_options()->getOptionValue( '404_back_to_home' );
					$edgtf_button_style    = kvell_edge_options()->getOptionValue( '404_button_style' );
					
					if ( ! empty( $edgtf_title_image_404 ) ) { ?>
						<div class="edgtf-404-title-image">
							<img src="<?php echo esc_url( $edgtf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'kvell' ); ?>" />
						</div>
					<?php } ?>
					
					<h1 class="edgtf-404-title">
						<?php if ( ! empty( $edgtf_title_404 ) ) {
							echo esc_html( $edgtf_title_404 );
						} else {
							esc_html_e( '404', 'kvell' );
						} ?>
					</h1>
					
					<h3 class="edgtf-404-subtitle">
						<?php if ( ! empty( $edgtf_subtitle_404 ) ) {
							echo esc_html( $edgtf_subtitle_404 );
						} else {
							esc_html_e( 'Ooops! The page is not found.', 'kvell' );
						} ?>
					</h3>
					
					<p class="edgtf-404-text">
						<?php if ( ! empty( $edgtf_text_404 ) ) {
							echo esc_html( $edgtf_text_404 );
						} else {
							esc_html_e( 'The page you’re looking for is not here. Woopsie Daisy! Looks like you have lost your way! The page you are trying to see does not exist. You may have typed the address incorrectly or the page has been moved or deleted altogether. Try returning to our home page.', 'kvell' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $edgtf_button_label ) ? $edgtf_button_label : esc_html__( 'Go back', 'kvell' ),
                            'icon_pack'    => 'font_awesome',
                            'fa_icon'      => 'fa-chevron-right',
                            'icon_class'   => 'edgtf-btn-icon',
						);
					
						if ( $edgtf_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'edgtf-btn-light-style';
						}
						
						echo kvell_edge_return_button_html( $button_params );
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>