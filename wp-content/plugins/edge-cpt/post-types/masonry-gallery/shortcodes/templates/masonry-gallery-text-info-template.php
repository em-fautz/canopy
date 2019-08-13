<article class="<?php echo esc_attr($item_classes) ?>">
	<?php if (has_post_thumbnail()) { ?>
		<div class = "edgtf-masonry-gallery-image-holder">
			<?php the_post_thumbnail($item_thumb_size); ?>
		</div>
	<?php } ?>
	<div class="edgtf-masonry-gallery-item-outer">
		<div class="edgtf-masonry-gallery-item-inner">
			<div class="edgtf-masonry-gallery-item-content">
				<?php if($item_subtitle) : ?>
					<p class="edgtf-masonry-gallery-item-subtitle"><?php echo esc_html($item_subtitle); ?></p>
				<?php endif; ?>
				<h2 class="edgtf-masonry-gallery-item-title"><?php the_title() ?></h2>
				<p class="edgtf-masonry-gallery-item-text"><?php echo esc_html($item_text); ?></p>
				<?php if ($item_link !== '') { ?>
					<a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_link_target); ?>" class="edgtf-masonry-gallery-read-more"><?php echo esc_html__('Read More', 'edge-cpt'); ?><span aria-hidden="true" class="edgtf-icon-font-elegant arrow_right"></span></a>
				<?php } ?>
			</div>
		</div>
	</div>
</article>