<?php
$enable_section = get_theme_mod( 'charity_success_story_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

	<!-- Start sucess story Section -->
    <div class="container">
        <div class="row">
          	<div class="sucess_story">
          		<?php
          			$success_title = get_theme_mod( 'charity_success_story_title', '' );
          			if( !empty( $success_title ) ) :
          		?>
            		<h2 class="title">
            			<?php
            				echo esc_html( $success_title );
            			?>
            		</h2>
            	<?php
            		endif;
            	?>
            	<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
            	<?php
            		$success_cat 	= get_theme_mod( 'charity_success_story_post_category', '0' );
            		$success_no	 	= get_theme_mod( 'charity_success_story_post_number', 3 );
            		$success_args 	= array(
            			'cat'				=> absint( $success_cat ),
            			'posts_per_page'	=> absint( $success_no ),
            			'post_type'			=> 'post'	
            		);
            		$success 		= new WP_Query( $success_args );
            		if( $success->have_posts() ) : 
            	?>
	          		<div id="owl-demo2" class="owl-carousel owl-theme">  
	          			<?php
	          				while( $success->have_posts() ) :
	          					$success->the_post();
	          			?>  
		            		<div class="item">
		              			<div class="single_sucess">
		                			<div class="col-xs-12 col-sm-6 col-md-6">
		                  				<div class="sucess_story_img">
		                  					<?php
		                  						if( has_post_thumbnail() ) :
		                  					?>
			                    				<div class="view hm-zoom">
			                    					<?php
			                    						the_post_thumbnail( 'hb-charity-thumbnail-1', array( 'class' => 'img-fluid' ) );
			                    					?>
			                    				</div>
		                    				<?php
		                    					endif;
		                    				?>
		                  				</div>
		                			</div>
		                			<div class="col-xs-12 col-sm-6 co-l-md-6">
		                  				<div class="sucess_story_contain">
		                    				<h4>
		                    					<?php
		                    						the_title();
		                    					?>
		                    				</h4>
		                    				<div class="contain">
							                    <?php
							                    	the_excerpt();
							                    ?>
		                    				</div>
		                     				<div class="readmore"> 
		                     					<a href="<?php the_permalink(); ?>">
		                     						<?php 
		                     							echo esc_html__( 'Read More', 'hb-charity' ); 
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
	          			?>
	        		</div>
	        	<?php
	        		endif;
	        	?> 
	        </div> 
        </div>
    </div>
    <!-- End  sucess story  Section -->