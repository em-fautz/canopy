<div class="edgtf-event-single-info">
	<?php if ($title !== '') { ?>
		<<?php echo esc_attr($title_tag);?> class="edgtf-event-single-info-title">
			<?php echo esc_html($title);?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
	<?php if ($show_categories == 'yes' && function_exists('goodwish_edge_event_get_categories') && goodwish_edge_event_get_categories($event_id) !== '') { ?>
		<div class="edgtf-esi-item">
			<span class="edgtf-esi-title"><?php esc_html_e('Category:', 'edge-cpt'); ?></span>
			<span class="edgtf-esi-desc"><?php echo goodwish_edge_event_get_categories($event_id); ?></span>
		</div>
	<?php } ?>
	<?php if ($show_location == 'yes') { 
		$location = get_post_meta($event_id,'edgtf_event_location',true);

		if ($location !== '') { ?>
		<div class="edgtf-esi-item">
			<span class="edgtf-esi-title"><?php esc_html_e('Location:', 'edge-cpt'); ?></span>
			<span class="edgtf-esi-desc"><?php echo esc_html($location); ?></span>
		</div>
	<?php }
	} ?>
	<?php if ($show_date !== 'no' && count($date_params)) { ?>
		<div class="edgtf-esi-item">
			<span class="edgtf-esi-title"><?php esc_html_e('Date:', 'edge-cpt'); ?></span>
			<span class="edgtf-esi-desc"><?php echo esc_html($date_params['start_date']);?></span>
		</div>
		<div class="edgtf-esi-item">
			<span class="edgtf-esi-title"><?php echo esc_html($date_params['second_title']); ?></span>
			<span class="edgtf-esi-desc"><?php echo esc_html($date_params['second_desc']);?></span>
		</div>
	<?php } ?>
	<?php echo wp_kses_post($custom_field_html); ?>
</div>