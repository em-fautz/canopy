<?php
$enable_section = get_theme_mod( 'charity_causes_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

  	<!-- Start Causes Section -->
    <div class="causes">
      	<div class="container">
      		<?php
      			$causes_title = get_theme_mod( 'charity_causes_section_title', '' );
     			if( !empty( $causes_title ) ) :
      		?>
         			<h1 class="title">
         				<?php
         					echo esc_html( $causes_title );
         				?>
         			</h1>
         	<?php
         		endif;
         	?>
          	<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
          	<?php
          		$causes_subtitle = get_theme_mod( 'charity_causes_section_subtitle', '' );
          		if( !empty( $causes_subtitle ) ) :
          	?>
		          	<p class="text-center">
		          		<?php
		          			echo esc_html( $causes_subtitle );
		          		?>
					</p>
			<?php
				endif;
			?>
			<?php
				$causes_post_category 	= get_theme_mod( 'charity_causes_post_category', '1' );
				$causes_post_no 		= get_theme_mod( 'charity_causes_post_number', 3 );
				$causes_args 			= array(
					'post_type'			=> 'post',
					'posts_per_page'	=> absint( $causes_post_no ),
					'cat'				=> absint( $causes_post_category )
				);
				$causes = new WP_Query( $causes_args );
				if( $causes->have_posts() ) :
			?>
	        	<div class="row">
	          		<div class="col-md-12">
	          			<div id="owl-demo1" class="owl-carousel owl-theme">
		          			<?php
		          				while( $causes->have_posts() ) :
		          					$causes->the_post();
		          			?>
				            		<div class="item">
				              			<div class="single_causes_item">
				              				<?php
				              					if( has_post_thumbnail() ) :
				              				?>
					                			<div class="single_causes_item_img view hm-zoom">
					                				<?php
					                					the_post_thumbnail( 'hb-charity-thumbnail-1', array( 'class' => 'img-fluid' ) );
					                				?>
					                			</div>
					                		<?php
					                			endif;
					                		?>
				                			<div class="single_causes_item_contain">
				                				<!-- <div class="causes_percentage">
				                						                   					<h5>50%</h5>
				                				</div> -->
				                  				<h3 class="subtitle">
				                  					<?php
				                  						the_title();
				                  					?>
				                  				</h3>
				                  				<div class="contain">                  
				                  					<?php
				                  						the_excerpt();
				                  					?>
				                 				</div>
				                  				<center>
				                  					<a href="<?php the_permalink(); ?>" class="viewdetails">
				                  						<?php 
				                  							echo esc_html__( 'View Details', 'hb-charity' ); 
				                  						?>
				                  					</a>
				                  				</center>
				                			</div>
				              			</div>
				            		</div>
			            	<?php
			            		endwhile;
			            		wp_reset_postdata();
			            	?>
		        		</div>
	          		</div>
	      		</div>
	      	<?php
	      		endif;
	      	?>
    	</div>
  	</div>
  	<!-- End Causes Section -->