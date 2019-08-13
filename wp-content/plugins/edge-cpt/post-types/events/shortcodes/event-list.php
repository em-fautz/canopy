<?php
namespace EdgeCore\PostTypes\Event\Shortcodes;

use EdgeCore\Lib;

/**
 * Class EventList
 * @package EdgeCore\PostTypes\Event\Shortcodes
 */
class EventList implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'edgtf_event_list';

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
                    'name' => esc_html__('Event List','edge-cpt'),
                    'base' => $this->getBase(),
                    'category' => esc_html__('by EDGE','edge-cpt'),
                    'icon' => 'icon-wpb-event-list extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Event List Template','edge-cpt'),
                            'param_name' => 'type',
                            'value' => array(
                                esc_html__('Standard','edge-cpt') => 'standard',
                                esc_html__('Calendar','edge-cpt') => 'calendar',
                                esc_html__('Carousel', 'edge-cpt' ) => 'carousel',
                                esc_html__('Full Width','edge-cpt') => 'full-width',
                            ),
                            'admin_label' => true
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Padding Top/Bottom','edge-cpt'),
                            'param_name' => 'padding_top_bottom',
                            'description' => esc_html__('Enter top and bottom padding in px or %','edge-cpt'),
                            'dependency' => array('element' => 'type', 'value' => 'full-width')
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Background Color','edge-cpt'),
                            'param_name' => 'background_color',
                            'dependency' => array('element' => 'type', 'value' => array('calendar'))
                        ),
                        array(
                            'type' => 'colorpicker',
                            'heading' => esc_html__('Item Background Color','edge-cpt'),
                            'param_name' => 'item_background_color',
                            'dependency' => array('element' => 'type', 'value' => array('standard', 'carousel'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Image Size', 'edge-cpt'),
                            'param_name' => 'image_size',
                            'value' => array(
                                esc_html__('Original', 'edge-cpt') => 'original',
                                esc_html__('Landscape', 'edge-cpt') => 'landscape',
                                esc_html__('Square', 'edge-cpt') => 'square'
                            ),
                            'description' => '',
                            'dependency' => Array('element' => 'type', 'value' => array('standard', 'carousel')),
                            'save_always' => true
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
                            'dependency' => array('element' => 'type', 'value' => array('calendar','standard', 'carousel'))
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Title Size (px)','edge-cpt'),
                            'param_name' => 'title_size',
                            'description' => esc_html__('Default title size is 120px','edge-cpt'),
                            'dependency' => array('element' => 'type', 'value' => array('full-width'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Parallax on Background Image','edge-cpt'),
                            'param_name' => 'parallax',
                            'value' => array(
                                esc_html__('Yes','edge-cpt') => 'yes',
                                esc_html__('No','edge-cpt') => 'no'
                            ),
                            'dependency' => array('element' => 'type','value' => array('full-width'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Appear Effect on Event Content','edge-cpt'),
                            'param_name' => 'appear_fx',
                            'value' => array(
                                esc_html__('Yes','edge-cpt') => 'yes',
                                esc_html__('No','edge-cpt') => 'no'
                            ),
                            'dependency' => array('element' => 'type','value' => array('full-width'))
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Show More','edge-cpt'),
                            'param_name' => 'show_more',
                            'value' => array(
                                esc_html__('None','edge-cpt') => 'none',
                                esc_html__('Load More Button','edge-cpt') => 'load_more',
                                esc_html__('Infinite Scroll','edge-cpt') => 'infinite_scroll',
                            )
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order By','edge-cpt'),
                            'param_name' => 'order_by',
                            'value' => array(
                                esc_html__('Start Date','edge-cpt') => 'start-date',
                                esc_html__('Date','edge-cpt') => 'date',
                                esc_html__('Title','edge-cpt') => 'title',
                                esc_html__('Menu Order','edge-cpt') => 'menu_order',
                            ),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Order','edge-cpt'),
                            'param_name' => 'order',
                            'value' => array(
                                esc_html__('ASC','edge-cpt') => 'ASC',
                                esc_html__('DESC','edge-cpt') => 'DESC',
                            ),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('One-Category Event List','edge-cpt'),
                            'param_name' => 'category',
                            'description' => esc_html__('Enter one category slug (leave empty for showing all categories)','edge-cpt'),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Number of Events Per Page','edge-cpt'),
                            'param_name' => 'number',
                            'value' => '-1',
                            'description' => esc_html__('(enter -1 to show all)','edge-cpt'),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Show Event by Status','edge-cpt'),
                            'param_name' => 'event_status',
                            'value' => array(
                                esc_html__('All','edge-cpt') => 'all',
                                esc_html__('Current and Upcoming','edge-cpt') => 'upcoming',
                                esc_html__('Past','edge-cpt') => 'past',
                            ),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'dropdown',
                            'heading' => esc_html__('Number of Columns','edge-cpt'),
                            'param_name' => 'columns',
                            'value' => array(
                                esc_html__('Default','edge-cpt') => '',
                                esc_html__('One','edge-cpt') => '1',
                                esc_html__('Two','edge-cpt') => '2',
                                esc_html__('Three','edge-cpt') => '3',
                                esc_html__('Four','edge-cpt') => '4',
                                esc_html__('Five','edge-cpt') => '5',
                            ),
                            'description' => esc_html__('Default value is Three','edge-cpt'),
                            'dependency' => array('element' => 'type', 'value' => array('calendar', 'standard')),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
                        ),
                        array(
                            'type' => 'textfield',
                            'heading' => esc_html__('Show Only Projects with Listed IDs','edge-cpt'),
                            'param_name' => 'selected_projects',
                            'description' => esc_html__('Delimit ID numbers by comma (leave empty for all)','edge-cpt'),
                            'group' => esc_html__('Query and Layout Options','edge-cpt')
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
            'type' => 'standard',
            'background_color' => '',
            'item_background_color' => '',
            'image_size' => 'original',
            'padding_top_bottom' => '',
            'parallax' => 'yes',
            'appear_fx' => 'yes',
            'title_tag' => '',
            'title_size' => '',
            'columns' => '3',
            'order_by' => 'start-date',
            'order' => 'ASC',
            'event_status' => 'all',
            'number' => '-1',
            'category' => '',
            'selected_projects' => '',
            'show_more' => 'none',
            'next_page' => '',
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

        $query_array = $this->getQueryArray($params);
        $query_results = new \WP_Query($query_array);
        $params['query_results'] = $query_results;

        $default_date = true; //for full_width template
        if (($type == 'calendar') || ($type == 'standard') || ($type == 'carousel')){
            $default_date = false;
        }

        $params['default_date'] = $default_date;

        $data_atts = $this->getDataAtts($params);
        $data_atts .= 'data-max-num-pages = '.$query_results->max_num_pages;

        $classes = $this->getEventClasses($params);
        $events_style = $this->getEventsStyle($params);

        $single_data = array();

        $single_data['item_style'] = $this->getItemStyle($params);
        $single_data['title_data'] = $this->getTitleData($params);
        $single_data['title_tag'] = $this->getTitleTag($params);
        $single_data['thumb_image_size'] = $this->generateImageSize($params);
        $single_data['events_standard_style'] = $this->getItemStandardStyle($params);

        $html = '';

        $html .= '<div class="edgtf-event-list-holder '.esc_attr($classes).'" '.$data_atts.'>';
        $html .= '<div class="edgtf-event-list-holder-inner" '.goodwish_edge_get_inline_style($events_style).'>';

        if($query_results->have_posts()):
            $i = 1;
            while ( $query_results->have_posts() ) : $query_results->the_post();

                $params['id'] = get_the_ID();
                $single_data = array_merge($single_data, $this->getSingleData($params,$i));

                $html .= edgt_core_get_shortcode_module_template_part('events',$type, '', $single_data);

                $i++;

            endwhile;
        else:

            $html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.','edge-cpt') .'</p>';

        endif;
        $html .= '</div>'; // close edgtf-event-list-holder-inner
        if($show_more !== 'none'){
            $html .= edgt_core_get_shortcode_module_template_part('events','load-more-template', '', $params);
        }
        wp_reset_postdata();
        $html .= '</div>'; // close edgtf-event-list-holder
        return $html;
    }

    /**
     * Generates event list query attribute array
     *
     * @param $params
     *
     * @return array
     */
    public function getQueryArray($params){

        $query_array = array();
        $tax_query = array();
        $meta_query = array();
        $order_by = $params['order_by'];

        if ($params['order_by'] == 'start-date'){
            $order_by = 'meta_value';
        }

        $query_array = array(
            'post_type' => 'edge-event',
            'orderby' => $order_by,
            'order' => $params['order'],
            'posts_per_page' => $params['number']
        );

        if ($params['order_by'] == 'start-date'){
            $query_array['meta_key'] = 'edgtf_event_start_date'; //here because has to be added to query
        }

        //display date by event status, ex. end date larger then todays date or if it doesn't exist compare start date
        switch ($params['event_status']) {
            case 'upcoming':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'edgtf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '>='
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'edgtf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'edgtf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '>='
                        ),
                    )
                );
                break;
            case 'past':
                $meta_query = array(
                    'relation' => 'OR',
                    array(
                        'key' => 'edgtf_event_end_date',
                        'value' => date("Y-m-d"),
                        'compare' => '<'
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'key' => 'edgtf_event_end_date',
                            'compare' => 'NOT EXISTS'
                        ),
                        array(
                            'key' => 'edgtf_event_start_date',
                            'value' => date("Y-m-d"),
                            'compare' => '<'
                        ),
                    )
                );
                break;
        }

        if (is_array($meta_query) && count($meta_query)){
            $query_array['meta_query'][] = $meta_query;
        }

        if(!empty($params['category'])){
            $tax_query['taxonomy'] = 'edge-event-category';
            $tax_query['field'] = 'slug';
            $tax_query['terms'] = $params['category'];
        }

        if (is_array($tax_query) && count($tax_query)){
            $query_array['tax_query'][] = $tax_query;
        }

        $project_ids = null;
        if (!empty($params['selected_projects'])) {
            $project_ids = explode(',', $params['selected_projects']);
            $query_array['post__in'] = $project_ids;
        }

        $paged = '';
        if(empty($params['next_page'])) {
            if(get_query_var('paged')) {
                $paged = get_query_var('paged');
            } elseif(get_query_var('page')) {
                $paged = get_query_var('page');
            }
        }

        if(!empty($params['next_page'])){
            $query_array['paged'] = $params['next_page'];

        }else{
            $query_array['paged'] = 1;
        }

        return $query_array;
    }

    /**
     * Generates event classes
     *
     * @param $params
     *
     * @return string
     */
    public function getEventClasses($params){
        $classes = array();

        switch ($params['type']) {
            case 'full-width':
                $classes[] = 'edgtf-event-list-full-width';
                break;
            case 'calendar':
                $classes[] = 'edgtf-event-list-calendar';
                break;
            case 'standard':
                $classes[] = 'edgtf-event-list-standard';
                break;
            case 'carousel':
                $classes[] = 'edgtf-event-list-carousel';
                break;
            default:
                $classes[] = 'edgtf-event-list-standard';
                break;
        }

        switch ($params['show_more']) {
            case 'load_more':
                $classes[] = 'edgtf-event-list-show-more';
                $classes[] = 'edgtf-event-list-load-button';
                break;
            case 'infinite_scroll':
                $classes[] = 'edgtf-event-list-show-more';
                $classes[] = 'edgtf-event-list-infinite-scroll';
                break;
        }

        if (!empty($params['columns'])) {
            $classes[] = 'edgtf-event-list-col-'.$params['columns'];
        }

        if ($params['parallax'] == 'yes'){
            $classes[] = 'edgtf-event-list-parallax';
        }

        if ($params['appear_fx'] == 'yes'){
            $classes[] = 'edgtf-event-list-appear-fx';
        }

        return implode(' ',$classes);

    }

    /**
     * Return event list style
     *
     * @param $params
     *
     * @return string
     */
    public function getEventsStyle($params){
        $style = array();

        if ($params['background_color'] !== ''){
            $style[] = 'background-color: '.$params['background_color'];
        }

        return implode('; ', $style);
    }

    /**
     * Return event list standard item style
     *
     * @param $params
     *
     * @return string
     */
    public function getItemStandardStyle($params){
        $style = array();

        if ($params['item_background_color'] !== ''){
            $style[] = 'background-color: '.$params['item_background_color'];
        }

        return implode('; ', $style);
    }


    /**
     * Return item style
     *
     * @param $params
     *
     * @return string
     */
    public function getItemStyle($params){
        $item_style = array();

        if (!empty($params['padding_top_bottom'])){
            $item_style[] = 'padding: '.$params['padding_top_bottom'].' 0';
        }

        return implode('; ', $item_style);
    }

    /**
     * Return title tag
     *
     * @param $params
     *
     * @return string
     */
    public function getTitleTag($params){
        $title_tag = 'h2';

        if (!empty($params['title_tag'])){ //!empty because of possible null value from load more
            $title_tag = $params['title_tag'];
        }
        elseif ($params['type'] == 'calendar' || $params['type'] == 'standard' || $params['type'] == 'carousel') {
            $title_tag = 'h3';
        }

        return $title_tag;
    }

    /**
     * Return title data
     *
     * @param $params
     *
     * @return string
     */
    public function getTitleData($params){
        $title_data = array();

        if ($params['title_size'] !== ''){
            $title_data[] = 'data-font-size='.goodwish_edge_filter_px($params['title_size']).'';
        }
        else{
            $title_data[] = 'data-font-size=120';
        }

        return implode(' ', $title_data);
    }

    /**
     * Generates single data array
     *
     * @param $params, $number
     *
     * @return array
     */
    public function getSingleData($params,$number){
        $single_data = array();
        $even = false;
        $id = $params['id'];
        $default_date = $params['default_date'];
        $date = '';
        $categories = '';

        if ($number%2 == 0){
            $even = true;
        }

        if (function_exists('goodwish_edge_event_get_start_date')){
            $date = goodwish_edge_event_get_start_date($id,$default_date);
        }

        if (function_exists('goodwish_edge_event_get_categories')){
            $categories = goodwish_edge_event_get_categories($id);
        }

        $button_params = array();

        if ($even){
            $single_data['class'] = 'edgtf-el-item-even';
            $button_params['type'] = 'solid';
        }
        else{
            $single_data['class'] = 'edgtf-el-item-odd';
            $button_params['type'] = 'solid-white';
        }

        $button_params['link'] = get_permalink($id);
        $button_params['text'] = esc_html__('More Info','edge-cpt');

        $featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size
        $large_image = $featured_image_array[0];

        $location = get_post_meta($id,'edgtf_event_location',true);
        $start_time = get_post_meta($id,'edgtf_event_start_time',true);
        $end_time = get_post_meta($id,'edgtf_event_end_time',true);

        $single_data['date'] = ($date !== '') ? $date : '';
        $single_data['categories'] = ($categories !== '') ? $categories : '';
        $single_data['location'] = ($location !== '') ? $location : '';
        $single_data['start_time'] = ($start_time !== '') ? $start_time : '';
        $single_data['end_time'] = ($end_time !== '') ? $end_time : '';
        $single_data['button_params'] = $button_params;
        $single_data['image_background'] = ($large_image !== '') ? 'background-image: url('.esc_url($large_image).')' : '';

        return $single_data;
    }

    /**
     * Generates data attributes array
     *
     * @param $params
     *
     * @return array
     */
    public function getDataAtts($params){

        $data_attr = array();
        $data_return_string = '';

        if(get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif(get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if(!empty($paged)) {
            $data_attr['data-next-page'] = $paged+1;
        }
        if(!empty($params['type'])){
            $data_attr['data-type'] = $params['type'];
        }
        if(!empty($params['columns'])){
            $data_attr['data-columns'] = $params['columns'];
        }
        if(!empty($params['order_by'])){
            $data_attr['data-order-by'] = $params['order_by'];
        }
        if(!empty($params['order'])){
            $data_attr['data-order'] = $params['order'];
        }
        if(!empty($params['event_status'])){
            $data_attr['data-event-status'] = $params['event_status'];
        }
        if(!empty($params['number'])){
            $data_attr['data-number'] = $params['number'];
        }
        if(!empty($params['image_size'])){
            $data_attr['data-image-size'] = $params['image_size'];
        }
        if(!empty($params['category'])){
            $data_attr['data-category'] = $params['category'];
        }
        if(!empty($params['selected_projects'])){
            $data_attr['data-selected-projects'] = $params['selected_projects'];
        }
        if(!empty($params['show_more'])){
            $data_attr['data-show-more'] = $params['show_more'];
        }
        if(!empty($params['title_tag'])){
            $data_attr['data-title-tag'] = $params['title_tag'];
        }
        if(!empty($params['padding_top_bottom'])){
            $data_attr['data-padding-top-bottom'] = $params['padding_top_bottom'];
        }
        if(!empty($params['title_size'])){
            $data_attr['data-title-size'] = $params['title_size'];
        }
        if(!empty($params['parallax'])){
            $data_attr['data-parallax'] = $params['parallax'];
        }
        if(!empty($params['appear_fx'])){
            $data_attr['data-appear-fx'] = $params['appear_fx'];
        }

        foreach($data_attr as $key => $value) {
            if($key !== '') {
                $data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
            }
        }
        return $data_return_string;
    }

    /**
     * Generates image size option
     *
     * @param $params
     *
     * @return string
     */
    private function generateImageSize($params){
        $thumbImageSize = '';
        $imageSize = $params['image_size'];

        if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'goodwish_edge_landscape';
        } else if($imageSize === 'square'){
            $thumbImageSize .= 'goodwish_edge_square';
        } else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
        return $thumbImageSize;
    }
}