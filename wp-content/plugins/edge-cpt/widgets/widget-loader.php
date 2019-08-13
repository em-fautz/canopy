<?php

if (!function_exists('goodwish_edge_register_widgets')) {

	function goodwish_edge_register_widgets() {

		$widgets = array(
			'GoodwishEdgeLatestPosts',
			'GoodwishEdgeSearchOpener',
			'GoodwishEdgeSideAreaOpener',
			'GoodwishEdgeStickySidebar',
			'GoodwishEdgeSocialIconWidget',
			'GoodwishEdgeSeparatorWidget'
		);

		if ( goodwish_edge_is_woocommerce_installed() ){
			$widgets[] = 'GoodwishEdgeWoocommerceDropdownCart';
		}

        if (goodwish_edge_is_give_installed()) {
        	$widgets[] = 'GoodwishEdgeLatestCauses';
    	}

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'goodwish_edge_register_widgets');