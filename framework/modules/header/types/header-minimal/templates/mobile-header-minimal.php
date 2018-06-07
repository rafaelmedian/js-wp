<?php do_action('kvell_edge_before_mobile_header'); ?>

<header class="edgtf-mobile-header">
	<?php do_action('kvell_edge_after_mobile_header_html_open'); ?>
	
	<div class="edgtf-mobile-header-inner">
		<div class="edgtf-mobile-header-holder">
			<div class="edgtf-grid">
				<div class="edgtf-vertical-align-containers">
					<div class="edgtf-position-left"><!--
					 --><div class="edgtf-position-left-inner">
							<?php kvell_edge_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="edgtf-position-right"><!--
					 --><div class="edgtf-position-right-inner">
							<a href="javascript:void(0)" <?php kvell_edge_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<span class="edgtf-fullscreen-menu-close-icon">
								    <span class="fa fa-times"></span>
							    </span>
                                <span class="edgtf-fm-lines">
                                    <span class="edgtf-fm-line edgtf-line-1"></span>
                                    <span class="edgtf-fm-line edgtf-line-2"></span>
                                    <span class="edgtf-fm-line edgtf-line-3"></span>
                                    <span class="edgtf-fm-line edgtf-line-4"></span>
                                    <span class="edgtf-fm-line edgtf-line-5"></span>
                                    <span class="edgtf-fm-line edgtf-line-6"></span>
                                    <span class="edgtf-fm-line edgtf-line-7"></span>
                                    <span class="edgtf-fm-line edgtf-line-8"></span>
                                    <span class="edgtf-fm-line edgtf-line-9"></span>
                                </span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('kvell_edge_before_mobile_header_html_close'); ?>
</header>

<?php do_action('kvell_edge_after_mobile_header'); ?>