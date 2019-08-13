<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HB_CHARITY
 */

?>
<?php
  /**
   * Hook - hb_charity_doctype.
   *
   * @hooked hb_charity_doctype_action - 10
   */
  do_action( 'hb_charity_doctype' );
?>
<?php
  /**
   * Hook - hb_charity_head.
   *
   * @hooked hb_charity_head_action - 10
   */
  do_action( 'hb_charity_head' );
?>

<body <?php body_class(); ?>>

  <?php
      /**
       * Hook - hb_charity_top_header.
       *
       * @hooked hb_charity_top_header_action - 10
       */
        do_action( 'hb_charity_top_header' );
  ?>
  <!-- Start Menu Section -->
  <div class="inner middle_header">
      <div class="container">
          <div class="row">
        	    <?php
                  /**
                   * Hook - hb_charity_custom_logo.
                   *
                   * @hooked hb_charity_custom_logo_action - 10
                   */
                  do_action( 'hb_charity_custom_logo' );
              ?>
              <?php
                  /**
                   * Hook - hb_charity_main_menu.
                   *
                   * @hooked hb_charity_main_menu_action - 10
                   */
                  do_action( 'hb_charity_main_menu' );
              ?>
          </div>
      </div>
  </div>
  <!-- End Menu Section -->

  <?php
      /**
       * Hook - hb_charity_breadcrumb.
       *
       * @hooked hb_charity_breadcrumb - 10
       */
      do_action( 'hb_charity_breadcrumb' );
  ?>