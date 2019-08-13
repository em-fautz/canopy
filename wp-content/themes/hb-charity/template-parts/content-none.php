<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_CHARITY
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h3 class="none-title text-center"><?php esc_html_e( 'Nothing Found', 'hb-charity' ); ?></h3>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hb-charity' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="text-center"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'hb-charity' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p class="text-center"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hb-charity' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->