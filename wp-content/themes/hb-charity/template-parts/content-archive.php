<?php
/**
 * Template part for displaying results in archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB Charity
 */

?>	
	<div class="masonry-item">
		<?php 
			if( has_post_thumbnail() ) :
		?>
			<div class="media">
				<?php
					the_post_thumbnail( 'full', array( 'class' => 'img-responsive center-block' ) );
				?>
			</div>
		<?php
			endif;
		?>
		<h2 class="post-title">
			<?php
				the_title();
			?>
		</h2>
		<?php
			if ( 'post' === get_post_type() ) : 
		?>
			<div class="entry-meta">
				<?php hb_charity_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
			endif; 
		?>
		<?php
			the_excerpt();
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="read-more">
			<?php echo esc_html__( 'Read More', 'hb-charity' ); ?>
		</a>
		<footer class="tag-comment clearfix">
			<?php hb_charity_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>