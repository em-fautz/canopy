<div class="edgtf-el-item <?php echo esc_attr($class);?>" <?php echo goodwish_edge_get_inline_style($item_style);?>>
	<div class="edgtf-el-item-background" <?php echo goodwish_edge_get_inline_style($image_background);?>></div>
	<div class="edgtf-el-content-holder">
		<?php if ($categories !== '') { ?>
		<div class="edgtf-el-item-cats">
			<?php echo wp_kses_post($categories); ?>
		</div>
		<?php } ?>
		<<?php echo esc_attr($title_tag); ?> class="edgtf-el-item-title" <?php echo esc_attr($title_data);?>>
			<a href="<?php echo get_permalink();?>"> 
				<?php echo esc_attr(get_the_title()); ?>
			</a>
		</<?php echo esc_attr($title_tag); ?>>
		<?php if ($date !== '') { ?>
			<div class="edgtf-el-item-date">
				<?php echo esc_html($date); ?>
			</div>
		<?php } ?>
		<?php
		if (function_exists('goodwish_edge_get_button_html')){
			echo goodwish_edge_get_button_html($button_params);
		}
		?>
	</div>
</div>