<?php
$enable_section = get_theme_mod( 'charity_main_highlight_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

	<!-- Start notice section Section -->
	<?php
		$highlight_page = get_theme_mod( 'charity_main_highlight_page', 1 );
		$highlight = new WP_Query( array(
			'page_id'		=> absint( $highlight_page ),
			'post_type'		=> 'page'
		) );
		if( $highlight->have_posts() ) :
			while( $highlight->have_posts() ) :
				$highlight->the_post();
				$highlight_background_url = wp_get_attachment_url( get_post_thumbnail_id() );
	?>
				<div class="noticesection" style="background-image: url(<?php echo esc_url( $highlight_background_url ); ?>);">
				    <div class="container">
				      	<div class="col-xs-12 col-sm-7 col-md-6 col-xs-offset-0 col-sm-offset-5 col-md-offset-6">
				           	<div class="notice_details">
				           		<h3>
				           			<?php
				           				the_title();
				           			?>
				           		</h3>
				           		<div class="contain">
					           		<?php
					           			the_excerpt();
					           		?>
					           	</div>
					           	<div class="readmore"> 
	                  				<a href="<?php the_permalink(); ?>">
	                  					<?php
	                  						echo esc_html__( 'View More', 'hb-charity' );
	                  					?>
	                  				</a>
	                  			</div>
				          	</div>
				       	</div>
				    </div>
				</div>
	<?php
			endwhile;
			wp_reset_postdata();
		endif;
	?>
    <!-- End notice section Section -->