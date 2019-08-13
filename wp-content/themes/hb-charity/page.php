<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
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
