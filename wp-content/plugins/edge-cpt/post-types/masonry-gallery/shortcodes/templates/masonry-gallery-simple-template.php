<article class="<?php echo esc_attr($item_classes) ?>">
<?php $background_class = ''; ?>
	<?php if (has_post_thumbnail()) { ?>
		<div class = "edgtf-masonry-gallery-image-holder">
			<?php the_post_thumbnail($item_thumb_size);
				$background_class = "edgtf-masonry-gallery-image-background";
			?>
		</div>
	<?php } ?>
	<div class="edgtf-masonry-gallery-item-outer <?php echo esc_html($background_class); ?>">
		<div class="edgtf-masonry-gallery-item-inner">
			<?php if ($item_link !== '') { ?>
				<a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_link_target); ?>" class="edgtf-mg-item-link"></a>
			<?php } ?>
			<div class="edgtf-masonry-gallery-item-content <?php echo esc_attr($text_alignment_class) ?>">
				<p class="edgtf-masonry-gallery-item-subtitle"><?php echo esc_html($item_subtitle); ?></p>
				<h2 class="edgtf-masonry-gallery-item-title"><?php the_title() ?></h2>
			</div>
		</div>
	</div>
</article>