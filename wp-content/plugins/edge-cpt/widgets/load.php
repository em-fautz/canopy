<?php

if(!function_exists('goodwish_edge_load_widget_class')) {
	/**
	 * Loades widget class file.
	 *
	 */
	function goodwish_edge_load_widget_class(){
		include_once 'widget-class.php';
	}

	add_action('goodwish_edge_before_options_map', 'goodwish_edge_load_widget_class');
}

if(!function_exists('goodwish_edge_load_widgets')) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to goodwish_edge_after_options_map action
	 */
	function goodwish_edge_load_widgets() {

		if ( edgt_core_theme_installed() ) {
			foreach (glob(EDGE_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php') as $widget_load) {
				include_once $widget_load;
			}
		}

		include_once 'widget-loader.php';
	}

	add_action('goodwish_edge_before_options_map', 'goodwish_edge_load_widgets');
}