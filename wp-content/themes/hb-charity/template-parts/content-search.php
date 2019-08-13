<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_CHARITY
 */

?>

<div class="col-md-12">
	<div class="blog_single_horizontal clearfix">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6">
				<?php 
					if( has_post_thumbnail() ) :
				?>
					<div class="blog_single_horizontal_img">
						<?php
							the_post_thumbnail( 'full', array( 'class' => 'img-responsive center-block' ) );
						?>
					</div>
				<?php
					endif;
				?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">
				<div class="blog_single_horizontal_contain singleblog">
					<div class="singleblog_contain">
						<h3>
							<?php
								the_title();
							?>
						</h3>
					</div>
					<?php
					if ( 'post' === get_post_type() ) : 
					?>
						<div class="entry-meta">
							<?php hb_charity_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php
						endif; 
					?>
					<div class="contain">
						<?php
							the_excerpt();
						?>
						<div class="clearfix">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
								<?php echo esc_html__( 'Read More', 'hb-charity' ); ?>
							</a>
						</div>
					</div>
					<footer class="tag-comment clearfix">
						<?php hb_charity_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
			</div>
		</div>	
	</div>
</div>
