<?php
/**
 * Template part for displaying results in single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_CHARITY
 */

?>
<div class="singlecauses">
	<div class="post_title">
		<h5>
			<?php
				the_title();
			?>
		</h5>
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
	<?php
		if( has_post_thumbnail() ) :
	?>
		<div class="singlecauses_img">
			<?php
				the_post_thumbnail( 'full', array( 'class' => 'img-responsive center-block' ) );
			?>
		</div>
	<?php
		endif;
	?>
	<div class="contain">	
		<?php
			the_content();
			wp_link_pages( array(
            'before' => '<div class="page-links clearfix">' . esc_html__( 'Pages:', 'hb-charity' ),
            'after'  => '</div>',
        ) );
		?>									
	</div>
</div>