<?php
namespace EdgeCore\CPT\Event;

use EdgeCore\Lib\PostTypeInterface;

/**
 * Class EventRegister
 * @package EdgeCore\PostTypes\Event
 */
class EventRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base		= 'edge-event';
        $this->taxBase	= 'edge-event-category';

        add_filter('single_template', array($this, 'registerSingleTemplate'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }

    /**
     * Registers event single template if one doesn't exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-edge-event.php')) {
                return EDGE_CORE_CPT_PATH.'/events/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $goodwish_edge_Framework, $goodwish_edge_options;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        $slug = 'event';

        if(edgt_core_theme_installed()) {
            $menuPosition = $goodwish_edge_Framework->getSkin()->getMenuItemPosition('event');
            $menuIcon = $goodwish_edge_Framework->getSkin()->getMenuIcon('event');

            if(isset($goodwish_edge_options['event_single_slug'])) {
                if($goodwish_edge_options['event_single_slug'] != ""){
                    $slug = $goodwish_edge_options['event_single_slug'];
                }
            }
        }

        register_post_type( $this->base,
            array(
                'labels'		=> array(
                    'name'			=> esc_html__( 'Events','edge-cpt' ),
                    'singular_name'	=> esc_html__( 'Event','edge-cpt' ),
                    'add_item'		=> esc_html__( 'New Event','edge-cpt' ),
                    'add_new_item'	=> esc_html__( 'Add New Event','edge-cpt' ),
                    'edit_item'		=> esc_html__( 'Edit Event','edge-cpt' )
                ),
                'public'		=> true,
                'has_archive'	=> true,
                'rewrite'		=> array('slug' => $slug),
                'menu_position'	=> $menuPosition,
                'show_ui'		=> true,
                'supports'		=> array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
                'menu_icon'		=> $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name'				=> esc_html__( 'Event Categories', 'edge-cpt' ),
            'singular_name'		=> esc_html__( 'Event Category', 'edge-cpt' ),
            'search_items'		=> esc_html__( 'Search Event Categories', 'edge-cpt' ),
            'all_items'			=> esc_html__( 'All Event Categories', 'edge-cpt' ),
            'parent_item'		=> esc_html__( 'Parent Event Category', 'edge-cpt' ),
            'parent_item_colon'	=> esc_html__( 'Parent Event Category:', 'edge-cpt' ),
            'edit_item'			=> esc_html__( 'Edit Event Category', 'edge-cpt' ),
            'update_item'		=> esc_html__( 'Update Event Category', 'edge-cpt' ),
            'add_new_item'		=> esc_html__( 'Add New Event Category', 'edge-cpt' ),
            'new_item_name'		=> esc_html__( 'New Event Category Name', 'edge-cpt' ),
            'menu_name'			=> esc_html__( 'Event Categories', 'edge-cpt' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical'		=> true,
            'labels'			=> $labels,
            'show_ui'			=> true,
            'query_var'			=> true,
	        'show_admin_column'	=> true,
            'rewrite'			=> array( 'slug' => 'event-category' ),
        ));
    }
}