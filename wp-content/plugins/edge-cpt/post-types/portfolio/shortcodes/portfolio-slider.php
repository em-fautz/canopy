<?php
namespace EdgeCore\CPT\Portfolio\Shortcodes;

use EdgeCore\Lib;

/**
 * Class PortfolioSlider
 * @package EdgeCore\CPT\Portfolio\Shortcodes
 */
class PortfolioSlider implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_portfolio_slider';

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
     * @see vc_map()
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                'name' => esc_html__('Portfolio Slider', 'edge-cpt'),
                'base' => $this->base,
                'category' => esc_html__('by EDGE', 'edge-cpt'),
                'icon' => 'icon-wpb-portfolio-slider extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Portfolio Slider Template', 'edge-cpt'),
                        'param_name' => 'type',
                        'value' => array(
							esc_html__('Standard', 'edge-cpt') => 'standard',
                            esc_html__('Gallery', 'edge-cpt') => 'gallery'                           
                        ),
						'save_always' => true,
						'admin_label' => true,
                        'description' => '',
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Image size', 'edge-cpt'),
                        'param_name' => 'image_size',
                        'value' => array(
                            esc_html__('Default', 'edge-cpt') => '',
                            esc_html__('Original Size', 'edge-cpt') => 'full',
                            esc_html__('Square', 'edge-cpt') => 'square',
                            esc_html__('Landscape', 'edge-cpt') => 'landscape',
                            esc_html__('Portrait', 'edge-cpt') => 'portrait'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        
                        'heading' => esc_html__('Order By', 'edge-cpt'),
                        'param_name' => 'order_by',
                        'value' => array(
                            '' => '',
                            esc_html__('Menu Order', 'edge-cpt') => 'menu_order',
                            esc_html__('Title', 'edge-cpt') => 'title',
                            esc_html__('Date', 'edge-cpt') => 'date'
                        ),
						'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',                        
                        'heading' => esc_html__('Order', 'edge-cpt'),
                        'param_name' => 'order',
                        'value' => array(
                            '' => '',
                            'ASC' => 'ASC',
                            'DESC' => 'DESC',
                        ),
						'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',                        
                        'heading' => esc_html__('Number', 'edge-cpt'),
                        'param_name' => 'number',
                        'value' => '-1',
						'admin_label' => true,
                        'description' => esc_html__('Number of portolios on page (-1 is all)', 'edge-cpt')
                    ),
                    array(
                        'type' => 'dropdown',                        
                        'heading' => esc_html__('Number of Portfolios Shown', 'edge-cpt'),
                        'param_name' => 'portfolios_shown',
						'admin_label' => true,
                        'value' => array(
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6'
                        ),
                        'save_always' => true,
                        'description' => esc_html__('Number of portfolios that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)', 'edge-cpt'),
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Category', 'edge-cpt'),
                        'param_name' => 'category',
                        'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Category Slug (leave empty for all)', 'edge-cpt')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Selected Projects', 'edge-cpt'),
                        'param_name' => 'selected_projects',
                        'value' => '',
						'admin_label' => true,
                        'description' => esc_html__('Selected Projects (leave empty for all, delimit by comma)', 'edge-cpt')
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Title Tag', 'edge-cpt'),
                        'param_name' => 'title_tag',
                        'value' => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                        ),
                        'description' => ''
                    ),
	                array(
		                'type' => 'dropdown',
		                'heading' => esc_html__('Animation Type', 'edge-cpt'),
		                'param_name' => 'animation_type',
		                'value' => array(
			                esc_html__('Light', 'edge-cpt') => 'edgtf-light',
			                esc_html__('Dark', 'edge-cpt') => 'edgtf-dark',
			                esc_html__('Follow', 'edge-cpt') => 'edgtf-follow'
		                ),
		                'dependency' => array('element' => 'type', 'value' => array('masonry','gallery','gallery-with-space','pinterest','pinterest-with-space')),
	                ),
                )
            ) );
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
            'type' => 'standard',
            'image_size' => 'full',
            'order_by' => 'date',
            'order' => 'ASC',
            'number' => '-1',
            'category' => '',
            'selected_projects' => '',
            'title_tag' => 'h4',
			'portfolios_shown' => '3',
			'portfolio_slider' => 'yes',
	        'animation_type'   => 'edgtf-dark'
        );

        $args = array_merge($args, goodwish_edge_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		
		extract($params);
		
		$html ='';
		$html .= goodwish_edge_execute_shortcode('edgtf_portfolio_list', $params);
        return $html;
    }
	
	
}