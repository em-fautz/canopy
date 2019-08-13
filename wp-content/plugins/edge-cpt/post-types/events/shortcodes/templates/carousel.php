<div class="edgtf-el-item <?php echo esc_attr($class);?>">
	<div class="edgtf-el-item-inner">
		<div class="edgtf-el-item-inner-holder">
			<div class="edgtf-el-item-image">
				<a href="<?php echo get_permalink();?>">
				<?php
					 echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>
				</a>
			</div>
			<?php if (is_array($date) && count($date)) { ?>
				<div class="edgtf-el-item-date">
					<span class="edgtf-el-item-day"><?php echo esc_html($date['day']); ?></span>
					<div class="edgtf-el-item-my">
						<span class="edgtf-el-item-month"><?php echo esc_html($date['month']); ?></span>
					</div>
				</div>
			<?php } ?>
			<div class="edgtf-el-item-content" <?php echo goodwish_edge_get_inline_style($events_standard_style);?>>
				<div class="edgtf-el-item-location-title-holder">
					<h3 class="edgtf-el-item-title">
						<a href="<?php echo get_permalink();?>">
							<?php echo esc_attr(get_the_title()); ?>
						</a>
					</h3>
					<?php if (($start_time != '')||($end_time != '')): ?>
				   		<div class="edgtf-el-item-time">
				            <span>
				            	<?php 
				            		echo esc_html($start_time);
				            		if (($start_time != '')&&($end_time != '')) {
				            			echo ' - ';
				            		}
				            		echo esc_html($end_time); 
				            	?>
				            </span>
				        </div>
				    <?php endif; ?>
				    <?php if ($location != ''): ?>
				        <div class="edgtf-el-item-location">
				            <span><?php echo esc_html($location); ?></span>
				        </div>
			        <?php endif; ?>
			        <div class="edgtf-el-read-more-link">
			        	<a href="<?php echo get_permalink();?>"><?php echo esc_html__( 'Read More', 'edge-cpt' ); ?></a>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>