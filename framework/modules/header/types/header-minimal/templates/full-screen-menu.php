<div class="edgtf-fullscreen-menu-holder-outer">
	<div class="edgtf-fullscreen-menu-holder">
		<div class="edgtf-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="edgtf-container-inner">
			<?php endif;

			//Sidearea above menu
			if(is_active_sidebar( 'fullscreen_menu_above' ) ) : ?>
				<div class="edgtf-fullscreen-above-menu-widget-holder">
					<?php dynamic_sidebar('fullscreen_menu_above'); ?>
				</div>
			<?php endif;

			//Navigation
			kvell_edge_get_module_template_part('templates/full-screen-menu-navigation', 'header/types/header-minimal');;

			//Sidearea under menu
			if(is_active_sidebar('fullscreen_menu_below')) : ?>
				<div class="edgtf-fullscreen-below-menu-widget-holder">
					<?php dynamic_sidebar('fullscreen_menu_below'); ?>
				</div>
			<?php endif;

			if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>