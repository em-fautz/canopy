<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package HB_CHARITY
 */

get_header(); ?>

	<div class="innerpage class">
		<div class="container">
			<div class="row">				
				<!-- Start Blog Section -->
				<div class= "causesfull clearfix">
					<?php
				    	$class_name = 'col-md-12';
				        $sidebar_position = get_theme_mod( 'charity_sidebar_position', 'right' );
				        if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar-1' ) ) :
				        	$class_name = 'col-md-8';
				        endif;
				        if( $sidebar_position == 'left' ) :
				        	get_sidebar();
				        endif;
				    ?>
					<div class="<?php echo esc_attr( $class_name ); ?>">

						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="error-title text-center"><?php esc_html_e( '404', 'hb-charity' ); ?><small><?php esc_html_e( ' error', 'hb-charity' ); ?></small></h1>
								<h5 class="error-subtitle text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hb-charity' ); ?></h5>
							</header><!-- .page-header -->

							<div class="page-content">
								<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'hb-charity' ); ?></p>
								<?php
									get_search_form();
								?>
							</div><!-- .page-content -->
						</section><!-- .error-404 -->
					</div>
					<?php
						if( $sidebar_position == 'right' ) :
							get_sidebar();
						endif;
					?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
