<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_CHARITY
 */

get_header(); ?>

	<div class="innerpage class">
		<div class="container">
			<div class="row">
				<div class= "fullblog">
					<div class="col-md-12">
				        <div class="row">
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
									if ( have_posts() ) :
								?>
									<div class="masonry masonry-columns-2"> 
										<?php

										/* Start the Loop */
										while ( have_posts() ) : the_post();

											/*
											 * Include the Post-Format-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
											 */
											get_template_part( 'template-parts/content', 'archive' );

										endwhile;

										
										get_template_part( 'template-parts/content', 'pagination' );
										?>
									</div>
								<?php	
									else :

										get_template_part( 'template-parts/content', 'none' );

									endif; 
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
		</div>
	</div>
<?php
get_footer();
