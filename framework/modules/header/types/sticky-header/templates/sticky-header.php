<?php do_action('kvell_edge_before_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action( 'kvell_edge_after_sticky_menu_html_open' ); ?>
    <div class="edgtf-sticky-holder <?php echo esc_attr($menu_area_class); ?>">
        <?php if($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class="edgtf-vertical-align-containers">
                <div class="edgtf-position-left"><!--
                 --><div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            kvell_edge_get_logo('sticky');
                        } ?>
                        <?php if($menu_area_position === 'left') : ?>
                            <?php kvell_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($menu_area_position === 'center') : ?>
                    <div class="edgtf-position-center"><!--
                     --><div class="edgtf-position-center-inner">
                            <?php kvell_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="edgtf-position-right"><!--
                 --><div class="edgtf-position-right-inner">
                        <?php if($menu_area_position === 'right') : ?>
                            <?php kvell_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
                        <?php endif; ?>
                        <?php kvell_edge_get_sticky_header_widget_menu_area(); ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php do_action( 'kvell_edge_before_sticky_menu_html_close' ); ?>
</div>

<?php do_action('kvell_edge_after_sticky_header'); ?>