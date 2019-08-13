<?php
$enable_section = get_theme_mod( 'charity_services_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

	<!-- Start services Section -->
    <div class="container-fluid services">
      	<div class="row">
      		<?php
      			$services_no = 3;
      			for( $i = 1; $i<=$services_no; $i++ ) {
      				$service_icon = 'charity_service_icon_'.$i;
      				$service_page = 'charity_service_page_'.$i;
      				$service_icon_ 	= get_theme_mod( $service_icon, '' );
      				$service_page_id	= get_theme_mod( $service_page, 1 );
      				$service_args = array(
      					'post_type'		=> 'page',
      					'page_id'		=> absint( $service_page_id )
      				);
      				$service = new WP_Query( $service_args );
      				if( $service->have_posts() ) :
      					while( $service->have_posts() ) :
      						$service->the_post();
      						$background_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
      		?>
				        	<div class="col-xs-12 col-sm-4 col-md-4">
						        <div class="row services_box donation" style="background-image:url(<?php echo esc_url( $background_image_url ); ?>);">
						       	    <div class="mask clearfix">
						        	    <a href="">
							            	<div class="col-md-3">
							              		<div class="service_icon">
							                		<i class="fa <?php echo esc_attr( $service_icon_ ); ?>" aria-hidden="true"></i>
							              		</div>
					            			</div>
					            			<div class="col-md-9">
					              				<div class="service_contain">
					                				<h4>
					                					<?php  
					                						the_title(); 
					                					?>
					                				</h4>
					                				<?php
					                					the_excerpt();
					                				?>
					                				<a href="<?php the_permalink(); ?>" class="donatenow">
					                					<?php echo esc_html__( 'View Detail', 'hb-charity' ); ?>
					                				</a>
					              				</div>
					            			</div>
				            			</a>
				            		</div>
				          		</div>
				        	</div>
			<?php
						endwhile;
						wp_reset_postdata();
					endif;
				}
			?>
      	</div>
    </div>
  	<!-- End services Section -->