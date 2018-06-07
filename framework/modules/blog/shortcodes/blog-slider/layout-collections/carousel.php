<li class="edgtf-blog-slider-item">
	<div class="edgtf-blog-slider-item-inner">
		<div class="edgtf-item-image">
			<a itemprop="url" href="<?php echo get_permalink(); ?>">
				<?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
			</a>
		</div>
		<div class="edgtf-bli-content">
			<?php kvell_edge_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
			
			<div class="edgtf-bli-excerpt">
				<?php kvell_edge_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
				<?php kvell_edge_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
			</div>
		</div>
	</div>
</li>