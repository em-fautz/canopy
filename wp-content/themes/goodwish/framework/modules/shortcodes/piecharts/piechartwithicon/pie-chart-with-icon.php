<?php
namespace GoodwishEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon;

use GoodwishEdge\Modules\Shortcodes\Lib\ShortcodeInterface;

class PieChartWithIcon implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'edgtf_pie_chart_with_icon';

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
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see edgt_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Edge Pie Chart With Icon', 'goodwish'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart-with-icon extended-custom-icon',
			'category' => esc_html__('by EDGE', 'goodwish'),
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Percentage','goodwish'),
						'param_name' => 'percent',
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Size(px)','goodwish'),
						'param_name' => 'size',
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__('Design Options','goodwish'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Margin below chart (px)','goodwish'),
						'param_name' => 'margin_below_chart',
						'description' => '',
						'group' => esc_html__('Design Options','goodwish'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title','goodwish'),
						'param_name' => 'title',
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Title Tag','goodwish'),
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
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Active Color','goodwish'),
                        'param_name' => 'active_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'goodwish')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Inactive Color','goodwish'),
                        'param_name' => 'inactive_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options', 'goodwish')
                    ),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Title Color','goodwish'),
						'param_name' => 'title_color',
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__('Design Options','goodwish')
					)
				),
				goodwish_edge_icon_collections()->getVCParamsArray(),
				array(
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__('Icon Color','goodwish'),
						'param_name' => 'icon_color',
						'dependency' => Array('element' => 'icon_pack', 'value' => goodwish_edge_icon_collections()->getIconCollectionsKeys()),
						'group' => esc_html__('Design Options','goodwish'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Size (px)','goodwish'),
						'param_name' => 'icon_custom_size',
						'dependency' => Array('element' => 'icon_pack', 'value' => goodwish_edge_icon_collections()->getIconCollectionsKeys()),
						'admin_label' => true,
						'group' => esc_html__('Design Options','goodwish'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text','goodwish'),
						'param_name' => 'text',
						'description' => '',
						'admin_label' => true
					)
				)
			)

		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null)
	{

		$args = array(
			'size' => '',
			'percent' => '',
			'icon_color' => '',
			'icon_custom_size' => '',
			'title' => '',
			'title_tag' => 'h4',
			'text' => '',
            'active_color' => '',
            'inactive_color' => '',
            'title_color' => '',
			'margin_below_chart' => ''
		);

		$args = array_merge($args, goodwish_edge_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);

		$params['title_tag'] = $this->getValidTitleTag($params, $args);
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
		$params['title_pie_chart_style'] = $this->getTitlePieChartStyle($params);
		$params['icon'] = $this->getPieChartIcon($params);

		$html = goodwish_edge_get_shortcode_module_template_part('templates/pie-chart-with-icon', 'piecharts/piechartwithicon', '', $params);

		return $html;

	}

	/**
	 * Return correct heading value. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 * @param $args
	 */
	private function getValidTitleTag($params, $args) {

		$headings_array = array('h2', 'h3', 'h4', 'h5', 'h6');
		return (in_array($params['title_tag'], $headings_array)) ? $params['title_tag'] : $args['title_tag'];

	}

	/**
	 * Return Pie Chart icon style for icon getPieChartIcon() method
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {

		$iconStyles = array();

		if ($params['icon_color'] !== '') {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}

		if ($params['icon_custom_size'] !== '') {
			$iconStyles[] = 'font-size: ' . $params['icon_custom_size'] . 'px';
		}

		return implode(';', $iconStyles);

	}

	/**
	 * Return Pie Chart style
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

	/**
	 * Return Title Pie Chart style
	 *
	 * @param $params
	 * @return array
	 */
	private function getTitlePieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['title_color'] !== '') {
			$pieChartStyle[] = 'color: ' . $params['title_color'];
		}

		return $pieChartStyle;

	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }

		return $pieChartData;

	}

	/**
	 * Return Pie Chart Icon
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getPieChartIcon($params) {

		$icon = goodwish_edge_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

		$pie_chart_icon = goodwish_edge_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );

		return $pie_chart_icon;

	}

}