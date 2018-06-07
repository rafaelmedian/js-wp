<?php if(comments_open()) { ?>
	<div class="edgtf-post-info-comments-holder">
		<a itemprop="url" class="edgtf-post-info-comments" href="<?php comments_link(); ?>">
			<?php comments_number('0 ' . esc_html__('Comments','kvell'), '1 '.esc_html__('Comment','kvell'), '% '.esc_html__('Comments','kvell') ); ?>
		</a>
	</div>
<?php } ?>