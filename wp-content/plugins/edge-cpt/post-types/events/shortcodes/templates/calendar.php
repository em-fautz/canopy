<div class="edgtf-el-item <?php echo esc_attr($class);?>">
	<div class="edgtf-el-item-inner">
		<div class="edgtf-el-item-inner-holder">
			<a class="edgtf-el-item-link" href="<?php echo get_permalink();?>"></a>
			<div class="edgtf-el-item-background" <?php echo goodwish_edge_get_inline_style($image_background);?>></div>
			<div class="edgtf-el-item-content">
				<?php if (is_array($date) && count($date)) { ?>
					<div class="edgtf-el-item-date">
						<span class="edgtf-el-item-day"><?php echo esc_html($date['day']); ?></span>
						<div class="edgtf-el-item-my">
							<span class="edgtf-el-item-month"><?php echo esc_html($date['month']); ?></span>
							<span class="edgtf-el-item-year"><?php echo esc_html($date['year']); ?></span>
						</div>
					</div>
				<?php } ?>
				<div class="edgtf-el-item-location-title-holder">
					<?php 
						if ($location !== ''){ ?>
							<span class="edgtf-el-item-location">
								<?php echo esc_html($location); ?>
							</span>
						<?php }
					?>
					<<?php echo esc_attr($title_tag); ?> class="edgtf-el-item-title">
						<?php echo esc_attr(get_the_title()); ?>
					</<?php echo esc_attr($title_tag); ?>>
				</div>
			</div>
		</div>
	</div>
</div>