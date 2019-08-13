<?php
namespace EdgeCore\CPT\MasonryGallery;

use EdgeCore\Lib;

/**
 * Class MasonryGalleryRegister
 * @package EdgeCore\CPT\MasonryGallery
 */
class MasonryGalleryRegister implements Lib\PostTypeInterface  {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'masonry-gallery';
        $this->taxBase = 'masonry-gallery-category';
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
     * Registers custom post type with WordPress
     */

   private function registerPostType() {


	   global $goodwish_edge_Framework;

	   $menuPosition = 5;
	   $menuIcon = 'dashicons-admin-post';

	   if(edgt_core_theme_installed()) {
		   $menuPosition = $goodwish_edge_Framework->getSkin()->getMenuItemPosition('masonry-gallery');
		   $menuIcon = $goodwish_edge_Framework->getSkin()->getMenuIcon('masonry-gallery');
	   }

        register_post_type($this->base,
            array(
                'labels' 		=> array(
                    'name' 				=> __('Masonry Gallery','edge-cpt' ),
                    'all_items'			=> __('Masonry Gallery Items','edge-cpt'),
                    'singular_name' 	=> __('Masonry Gallery Item','edge-cpt' ),
                    'add_item'			=> __('New Masonry Gallery Item','edge-cpt'),
                    'add_new_item' 		=> __('Add New Masonry Gallery Item','edge-cpt'),
                    'edit_item' 		=> __('Edit Masonry Gallery Item','edge-cpt')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'masonry-gallery'),
				'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail'),
				'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => __( 'Masonry Gallery Categories', 'edge-cpt' ),
            'singular_name' => __( 'Masonry Gallery Category', 'edge-cpt' ),
            'search_items' =>  __( 'Search Masonry Gallery Categories','edge-cpt' ),
            'all_items' => __( 'All Masonry Gallery Categories','edge-cpt' ),
            'parent_item' => __( 'Parent Masonry Gallery Category','edge-cpt' ),
            'parent_item_colon' => __( 'Parent Masonry Gallery Category:','edge-cpt' ),
            'edit_item' => __( 'Edit Masonry Gallery Category','edge-cpt' ),
            'update_item' => __( 'Update Masonry Gallery Category','edge-cpt' ),
            'add_new_item' => __( 'Add New Masonry Gallery Category','edge-cpt' ),
            'new_item_name' => __( 'New Masonry Gallery Category Name','edge-cpt' ),
            'menu_name' => __( 'Masonry Gallery Categories','edge-cpt' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'masonry-gallery-category' ),
        ));
    }
}