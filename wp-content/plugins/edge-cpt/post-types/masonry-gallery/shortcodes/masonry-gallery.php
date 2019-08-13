<?php

namespace EdgeCore\CPT\MasonryGallery\Shortcodes;


use EdgeCore\Lib;

/**
 * Class MasonryGallery
 * @package EdgeCore\CPT\MasonryGallery\Shortcodes
 */
class MasonryGallery implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_masonry_gallery';

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
				'name' => esc_html__('Masonry Gallery', 'edge-cpt'),
				'base' => $this->base,
				'category' => esc_html__('by EDGE', 'edge-cpt'),
				'icon' => 'icon-wpb-masonry-gallery extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category', 'edge-cpt'),
						'param_name' => 'category',
						'value' => '',
						'description' => esc_html__('Category Slug (leave empty for all)', 'edge-cpt')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Number', 'edge-cpt'),
						'param_name' => 'number',
						'value' => '',
						'description' => esc_html__('Number of Masonry Gallery Items', 'edge-cpt')
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Order', 'edge-cpt'),
						'param_name' => 'order',
						'value' => array(
							'DESC' => 'DESC',
							'ASC' => 'ASC'
						)
					)
                )
            ));
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

        $default_args = array(
            'category'				=> '',
            'number'				=> -1,
            'order'					=> 'DESC'
		);
        extract(shortcode_atts($default_args, $atts));

		
        $html = '';

        /* Query for items */
        $query_args = array(
            'post_type' => 'masonry-gallery',
            'orderby' => 'date',
            'order' => $order,
            'posts_per_page' => $number
        );

        if ($category != "") {
            $query_args['masonry-gallery-category'] = $category;
        }
        $query = new \WP_Query( $query_args );
		

        $html .= '<div class="edgtf-masonry-gallery-holder">';
       	$html .= '<div class="edgtf-masonry-gallery-grid-sizer"></div>';

        if ($query->have_posts()) :
            while ( $query->have_posts() ) : $query->the_post();

				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) !== '') {
					$type = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true);
				} else {
					$type = 'standard';
				}

                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_text', true) !== '') {
                    $params['item_text'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_text', true);
                } else {
                	$params['item_text'] = '';
                }
				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_subtitle', true) !== '') {
                    $params['item_subtitle'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_subtitle', true);
                } else {
                	$params['item_subtitle'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link', true) !== '') {
					$params['item_link'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link', true);
                } else {
                	$params['item_link'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link_target', true) !== '') {
					$params['item_link_target'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_link_target', true);
                } else {
                	$params['item_link_target'] = '';
                }
				if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true) !== '') {
					$params['enable_hover'] = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true);
                } else {
                	$params['enable_hover'] = '';
                }
                if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_text_alignment', true) !== '') {
					$params['text_alignment_class'] = 'edgtf-masonry-gallery-item-content-'.get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_text_alignment', true);
                } else {
                	$params['text_alignment_class'] = '';
                }

				$params['current_id'] = get_the_ID();
				$params['item_classes']  = $this->getItemClasses();
				$params['item_thumb_size']  = $this->getImageSize();
				$params['background_image_url'] = $this->getBackgroundImage($params);


				$html .= edgt_core_get_shortcode_module_template_part('masonry-gallery', 'masonry-gallery-'. $type . '-template', '', $params);

            endwhile;
        else:
            $html .= __('Sorry, no posts matched your criteria.', 'edge-cpt');
        endif;
		wp_reset_postdata();
        $html .= '</div>';

        return $html;
    }

	private function getItemClasses(){
		$classes = array('edgtf-masonry-gallery-item');

		if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size', true) !== '') {
			$classes[] = 'edgtf-mg-' . get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size', true);
		}

		if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) !== '') {
			$classes[] = 'edgtf-mg-' . get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true);
		}

        if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_type', true) == 'standard') {
            if (get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_enable_hover', true) == 'yes') {
                $classes[] = 'edgtf-mg-standard-hover-text';
            } 
        }

		return implode(' ', $classes);
	}

	private function getImageSize(){
		$thumb_size = 'goodwish_edge_square';

		$masonry_size = get_post_meta(get_the_ID(), 'edgtf_masonry_gallery_item_size',true);

		switch($masonry_size):
			default :
				$thumb_size = 'goodwish_edge_square';
				break;
			case 'rectangle-landscape' :
				$thumb_size = 'goodwish_edge_large_width';
				break;
			case 'rectangle-portrait' :
				$thumb_size = 'goodwish_edge_large_height';
				break;
			case 'square-big' :
				$thumb_size = 'goodwish_edge_large_width_height';
				break;
		endswitch;


		return $thumb_size;
	}

	public function getBackgroundImage($params){

		$id = $params['current_id'];
		$masonry_image_url = wp_get_attachment_url(get_post_thumbnail_id($id),$params['item_thumb_size']);

		return $masonry_image_url;

	}

}