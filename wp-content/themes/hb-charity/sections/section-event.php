<?php
$enable_section = get_theme_mod( 'charity_event_gallery_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

    <!-- Start Events & Gallery Section -->
  	<div class="eventgallery">
    	<div class="half-bg-right accent-bg"></div>
    	<div class="container">
      		<div class="row">
        		<div class="event_gallery">
          			<!-- Start Events  Section -->
            		<div class="col-xs-12 col-sm-6 col-md-6">
              			<div class="event">
                			<h3>
                				<?php
                					$event_title = get_theme_mod( 'charity_event_section_title', '' );
                					echo esc_html( $event_title );
                				?>
                			</h3>
                  			<ul class="events-compact-list clearfix">
                  				<?php
                  					$event_category = get_theme_mod( 'charity_event_post_category', '0' );
                  					$event_posts_no = get_theme_mod( 'charity_event_post_number', 3 );
                  					$event_args 	= array(
                  						'cat'				=> absint( $event_category ),
                  						'posts_per_page' 	=> absint( $event_posts_no ),
                  						'post_type'			=> 'post'
                  					);
                  					$events  = new WP_Query( $event_args );
                  					if( $events->have_posts() ) :
                  						while( $events->have_posts() ) :
                  							$events->the_post();
                  				?>
			                    			<li class="event-list-item clearfix">  
			                      				<span class="event-date">
				                        			<span class="date">
				                        				<?php
				                        					echo esc_html( get_the_date( __( 'd', 'hb-charity' ) ) );
				                        				?>
				                        			</span>
				                        			<span class="month">
				                        				<?php
				                        					echo esc_html( get_the_date( __( 'M', 'hb-charity' ) ) );
				                        				?>
				                        			</span>
				                        			<span class="year">
				                        				<?php
				                        					echo esc_html( get_the_date( __( 'Y', 'hb-charity' ) ) );
				                        				?>
				                        			</span>
			                      				</span>
			                      				<div class="event-list-cont">
			                          				<h4 class="post-title">
			                          					<a href="<?php the_permalink(); ?>">
			                          						<?php
			                          							the_title();
			                          						?>
			                          					</a>
			                          				</h4>
			                          				<div class="contain">
			                          					<?php
			                          						the_excerpt();
			                          					?>
			                          				</div>
			                      				</div>
			                    			</li>
		                    	<?php
		                    			endwhile;
                              wp_reset_postdata();
		                    		endif;
		                    	?>
                  			</ul>
                  			<div class="readmore"> 
                  				<a href="<?php echo esc_url( get_category_link( absint( $event_category ) ) ); ?>">
                  					<?php
                  						echo esc_html__( 'View More', 'hb-charity' );
                  					?>
                  				</a>
                  			</div>
              			</div>
            		</div>
          			<!-- End Events  Section -->

          			<!-- Start Gallery  Section -->
            		<div class="col-xs-12 col-sm-6 col-md-6">
              			<div class="row gallery clearfix">
                  			<div class="gallery-updates-overlay">
                      			<?php
                      				$gallery_title = get_theme_mod( 'charity_gallery_section_title', '' );
                      				echo esc_html( $gallery_title );
                      			?>
                  			</div>
                  			<div class="fullgallery clearfix grid">
                  				<?php
                  					$gallery_category 	= get_theme_mod( 'charity_gallery_post_category', '0' );
                  					$gallery_posts_no 	= get_theme_mod( 'charity_gallery_post_number', 3 );
                  					$gallery_args 		= array(
                  						'cat'				=> absint( $gallery_category ),
                  						'posts_per_page'	=> absint( $gallery_posts_no ),
                  						'post_type'			=> 'post'
                  					);
                  					$gallery = new WP_Query( $gallery_args );
                  					if( $gallery->have_posts() ) :
                  						while( $gallery->have_posts() ) :
                  							$gallery->the_post();
                  				?>
                  						<?php
                  							if( has_post_thumbnail() ) :
                  						?>
			                      			<div class="col-xs-12 col-sm-6 col-md-6 no-gutter grid-item">
			                        			<a href="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id() ) ); ?>" data-lightbox="roadtrip">
			                        				<?php
			                        					the_post_thumbnail( 'full' );
			                        				?>
			                        			</a>
			                      			</div>
			                      		<?php
			                      			endif;
			                      		?>
                      			<?php
                      					endwhile;
                                wp_reset_postdata();
                      				endif;
                      			?>

                   			</div>
              			</div>
            		</div>
          			<!-- End gallery  Section -->
        		</div>
      		</div>
    	</div>
  	</div>
  	<!-- End Events & Gallery Section -->