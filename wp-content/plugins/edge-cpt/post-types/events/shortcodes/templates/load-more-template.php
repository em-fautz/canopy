<?php

if ($show_more == 'load_more'){
	$text = esc_html__('Show More','edge-cpt');
	$type = 'transparent';
} else {
	$text = esc_html__('Loading...','edge-cpt');
	$type = 'transparent';
}

if($query_results->max_num_pages>1 && function_exists('goodwish_edge_get_button_html')){ ?>
	<div class="edgtf-el-list-paging">
		<span class="edgtf-el-list-load-more">
			<?php
			echo goodwish_edge_get_button_html(array(
				'type' => $type,
				'link' => 'javascript: void(0)',
				'text' => $text
			));
			?>
		</span>
	</div>
<?php }