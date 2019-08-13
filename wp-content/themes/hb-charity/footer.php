<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HB_CHARITY
 */

?>

<?php
  /**
   * Hook - hb_charity_footer_top.
   *
   * @hooked hb_charity_footer_top_action - 10
   */
  do_action( 'hb_charity_footer_top' );

  /**
   * Hook - hb_charity_footer_bottom.
   *
   * @hooked hb_charity_footer_bottom_action - 10
   */
  do_action( 'hb_charity_footer_bottom' );

  /**
   * Hook - hb_charity_scroll_top.
   *
   * @hooked hb_charity_scroll_top_action - 10
   */
  do_action( 'hb_charity_scroll_top' );

  /**
   * Hook - hb_charity_footer.
   *
   * @hooked hb_charity_footer_action - 10
   */
  do_action( 'hb_charity_footer' );

?>

