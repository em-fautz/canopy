<?php
namespace EdgeCore\PostTypes\Event\Shortcodes;

use EdgeCore\Lib;

/**
 * Class EventInfo
 * @package EdgeCore\PostTypes\Event\Shortcodes
 */
class EventInfo implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_event_info';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map
	 */
	public function vcMap() {
		if(function_exists('vc_map')) {

			vc_map( array(
					'name' => esc_html__('Event Single Info','edge-cpt'),
					'base' => $this->getBase(),
					'category' => esc_html__('by EDGE','edge-cpt'),
					'icon' => 'icon-wpb-event-single-info extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params' => array(
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Event ID','edge-cpt'),
							'param_name' => 'event_id',
							'admin_label' => true,
							'description' => esc_html__('If event ID not set, current page ID will be taken','edge-cpt')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__('Title','edge-cpt'),
							'param_name' => 'title'
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Title Tag','edge-cpt'),
							'param_name' => 'title_tag',
							'value' => array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							),
							'dependency' => array('element' => 'title', 'not_empty' => true)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show Categories','edge-cpt'),
							'param_name' => 'show_categories',
							'value' => array(
								esc_html__('Yes','edge-cpt') => 'yes',
								esc_html__('No','edge-cpt') => 'no'
							)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show Location','edge-cpt'),
							'param_name' => 'show_location',
							'value' => array(
								esc_html__('Yes','edge-cpt') => 'yes',
								esc_html__('No','edge-cpt') => 'no'
							)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show Date','edge-cpt'),
							'param_name' => 'show_date',
							'value' => array(
								esc_html__('Show Start Date and Duration','edge-cpt') => 'date-duration',
								esc_html__('Show Start and End Date','edge-cpt') => 'start-end-date',
								esc_html__('No','edge-cpt') => 'no'
							)
						),
						array(
							'type' => 'dropdown',
							'heading' => esc_html__('Show Aditional Info','edge-cpt'),
							'param_name' => 'show_additional',
							'value' => array(
								esc_html__('Yes','edge-cpt') => 'yes',
								esc_html__('No','edge-cpt') => 'no'
							)
						)
					)
				)
			);
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'event_id' => '',
			'title' => '',
			'title_tag' => 'h5',
			'show_categories' => 'yes',
			'show_location' => 'yes',
			'show_date' => 'date-duration',
			'show_additional' => 'yes'
		);

		$params = shortcode_atts($args, $atts);

		if ($params['event_id'] == ''){
			$params['event_id'] = get_the_ID();
		}

		$params['date_params'] = $this->getDateParams($params);
		$params['custom_field_html'] = $this->getCustomFieldHtml($params);

		$html = edgt_core_get_shortcode_module_template_part('events','event-info', '', $params);
		return $html;
	}


	/**
	 * Returns date parameters
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getDateParams($params){
		$date_params = array();

		if (function_exists('goodwish_edge_event_get_date_params')){
			$date_params = goodwish_edge_event_get_date_params($params['event_id']);

			if ($params['show_date'] == 'date-duration'){
				$date_params['second_title'] = esc_html__('Duration:','edge-cpt');
				$date_params['second_desc'] = $date_params['duration'];
			}
			elseif ($params['show_date'] == 'start-end-date') {
				$date_params['second_title'] = esc_html__('End Date:','edge-cpt');
				$date_params['second_desc'] = $date_params['end_date'];
			}
		}

		return $date_params;
	}

	/**
	 * Generates custom fields html
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getCustomFieldHtml($params){
		$html = '';

		if (function_exists('goodwish_edge_get_repeater_values')){
			$custom_fields = goodwish_edge_get_repeater_values($params['event_id'], array('edgtf_event_title','edgtf_event_description'));

			if(is_array($custom_fields) && count($custom_fields) && $params['show_additional'] == 'yes') {
				foreach($custom_fields as $custom_field) {
					$html .= '<div class="edgtf-esi-item">';
					if(!empty($custom_field['edgtf_event_title'])) {
						$html .= '<span class="edgtf-esi-title">'.esc_html($custom_field['edgtf_event_title']).':</span>';
					}
					if(!empty($custom_field['edgtf_event_description'])) {
						$html .= '<span class="edgtf-esi-desc">'.esc_html($custom_field['edgtf_event_description']).'</span>';
					}
					$html .= '</div>';
				}
			}
		}
		
		return $html;
	}
}