<?php

namespace EdgeCore\CPT\Testimonials\Shortcodes;


use EdgeCore\Lib;

/**
 * Class Testimonials
 * @package EdgeCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_testimonials';

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
                'name' => esc_html__('Testimonials', 'edge-cpt'),
                'base' => $this->base,
                'category' => esc_html__('by EDGE', 'edge-cpt'),
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
					array(
						'type' => 'dropdown',
						'admin_label' => true,
						'heading' => esc_html__('Type', 'edge-cpt'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Simple', 'edge-cpt') => 'simple',
							esc_html__('Carousel', 'edge-cpt') => 'carousel'
						),
						'description' => ''
					),
					array(
                        'type' => 'textfield',
						'admin_label' => true,
                        'heading' => esc_html__('Category', 'edge-cpt'),
                        'param_name' => 'category',
                        'value' => '',
                        'description' => esc_html__('Category Slug (leave empty for all)', 'edge-cpt')
                    ),
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Number', 'edge-cpt'),
                        'param_name' => 'number',
                        'value' => '',
                        'description' => esc_html__('Number of Testimonials', 'edge-cpt')
                    ),
	                array(
		                'type' => 'colorpicker',
		                'admin_label' => true,
		                'heading' => esc_html__('Text Color', 'edge-cpt'),
		                'param_name' => 'text_color',
	                ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Title', 'edge-cpt'),
                        'param_name' => 'show_title',
                        'value' => array(
                            esc_html__('Yes', 'edge-cpt') => 'yes',
                            esc_html__('No', 'edge-cpt') => 'no'
                        ),
						'save_always' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'colorpicker',
                        'admin_label' => true,
                        'heading' => esc_html__('Title Color', 'edge-cpt'),
                        'param_name' => 'title_color',
                        'dependency' => array('element' => 'show_title', 'value' => array('yes')),
                    ),
	                array(
		                'type' => 'dropdown',
		                'heading' => esc_html__('Show Author Image', 'edge-cpt'),
		                'param_name' => 'show_image',
		                'value' => array(
			                esc_html__('Yes', 'edge-cpt') => 'yes',
			                esc_html__('No', 'edge-cpt') => 'no',
		                ),
		                'dependency' => array('element' => 'type', 'value' => array('simple')),
		                'description' => ''
	                ),
	                array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Author', 'edge-cpt'),
                        'param_name' => 'show_author',
                        'value' => array(
                            esc_html__('Yes', 'edge-cpt') => 'yes',
                            esc_html__('No', 'edge-cpt') => 'no'
                        ),
						'save_always' => true,
                        'description' => ''
                    ),
	                array(
		                'type' => 'colorpicker',
		                'admin_label' => true,
		                'heading' => esc_html__('Author Color', 'edge-cpt'),
		                'param_name' => 'author_color',
		                'dependency' => array('element' => 'show_author', 'value' => array('yes')),
	                ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Show Author Job Position', 'edge-cpt'),
                        'param_name' => 'show_position',
                        'value' => array(
                            esc_html__('Yes', 'edge-cpt') => 'yes',
							esc_html__('No', 'edge-cpt') => 'no',
                        ),
						'save_always' => true,
                        'dependency' => array('element' => 'show_author', 'value' => array('yes')),
                        'description' => ''
                    ), 
                    array(
                        'type' => 'textfield',
                        'admin_label' => true,
                        'heading' => esc_html__('Animation speed', 'edge-cpt'),
                        'param_name' => 'animation_speed',
                        'value' => '',
                        'description' => esc_html__('Speed of slide animation in miliseconds', 'edge-cpt')
                    ),
					array(
						'type' => 'dropdown',
						'admin_label' => true,
						'heading' => esc_html__('Show Arrows navigation', 'edge-cpt'),
						'param_name' => 'arrows_navigation',
						'value' => array(
							esc_html__('Yes', 'edge-cpt') => 'yes',
							esc_html__('No', 'edge-cpt') => 'no',
						),
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'admin_label' => true,
						'heading' => esc_html__('Show Dots navigation', 'edge-cpt'),
						'param_name' => 'dots_navigation',
						'value' => array(
							esc_html__('Yes', 'edge-cpt') => 'yes',
							esc_html__('No', 'edge-cpt') => 'no',
						),
						'description' => ''
					),
	                array(
		                'type' => 'dropdown',
		                'admin_label' => true,
		                'heading' => esc_html__('Dots Skin', 'edge-cpt'),
		                'param_name' => 'dots_skin',
		                'value' => array(
			                esc_html__('Light', 'edge-cpt') => 'edgtf-light-dots',
			                esc_html__('Dark', 'edge-cpt') => 'edgtf-dark-dots',
		                ),
		                'description' => '',
		                'dependency' => array('element' => 'dots_navigation', 'value' => array('yes')),
	                )
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
            'type'				=> 'simple',
            'number'			=> '-1',
            'category'			=> '',
            'text_color'		=> '',
            'show_title'		=> 'yes',
            'title_color'       => '',
            'show_author'		=> 'yes',
            'author_color'		=> '',
            'show_position' 	=> 'yes',
            'animation_speed'	=> '',
            'arrows_navigation'	=> 'yes',
            'dots_navigation'	=> 'yes',
	        'show_image'        => 'yes',
	        'dots_skin'         => 'edgtf-light-dots'
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);

        $number = esc_attr($number);
        $category = esc_attr($category);
        $animation_speed = esc_attr($animation_speed);
		
		$data_attr = $this->getDataParams($params);
		$query_args = $this->getQueryParams($params);
	    $params['author_color']= ($author_color !== '')?'color:'.$author_color:'';
	    $params['text_color']= ($text_color !== '')?'color:'.$text_color:'';
        $params['title_color']= ($title_color !== '')?'color:'.$title_color:'';

	    $classes = 'edgtf-slick-slider-navigation-style edgtf-testimonials edgtf-testimonials-type-'. $type.' '.$dots_skin;


		$html = '';
        $html .= '<div class="edgtf-testimonials-holder clearfix">';
        $html .= '<div class="'.$classes.'" ' . $data_attr . '>';

        query_posts($query_args);
        if (have_posts()) :
            while (have_posts()) : the_post();
                $author = get_post_meta(get_the_ID(), 'edgtf_testimonial_author', true);
                $text = get_post_meta(get_the_ID(), 'edgtf_testimonial_text', true);
                $title = get_post_meta(get_the_ID(), 'edgtf_testimonial_title', true);
                $job = get_post_meta(get_the_ID(), 'edgtf_testimonial_author_position', true);

				$params['author'] = $author;
				$params['text'] = $text;
				$params['title'] = $title;
				$params['job'] = $job;
				$params['current_id'] = get_the_ID();				
					$html .= edgt_core_get_shortcode_module_template_part('testimonials', $type . '-testimonials-template', '', $params);

            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'edge-cpt');
        endif;

        wp_reset_query();
        $html .= '</div>';
		$html .= '</div>';
		
        return $html;
    }
	/**
    * Generates testimonial data attribute array
    *
    * @param $params
    *
    * @return string
    */
	private function getDataParams($params){
		$data_attr = '';
		
		if(!empty($params['animation_speed'])){
			$data_attr .= ' data-animation-speed ="' . $params['animation_speed'] . '"';
		}

		if(!empty($params['arrows_navigation']) && $params['arrows_navigation'] == 'no'){
			$data_attr .= ' data-arrows-navigation ="false"';
		}

		if(!empty($params['dots_navigation']) && $params['dots_navigation'] == 'no'){
			$data_attr .= ' data-dots-navigation ="false"';
		}
		
		return $data_attr;
	}

	/**
    * Generates testimonials query attribute array
    *
    * @param $params
    *
    * @return array
    */
	private function getQueryParams($params){
		
		$args = array(
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );

        if ($params['category'] != '') {
            $args['testimonials_category'] = $params['category'];
        }
		return $args;
	}
	 
}