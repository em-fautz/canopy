<?php
$enable_section = get_theme_mod( 'charity_testimonial_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

    <!-- Start  testimonail  Section -->
    <div class="testimonail_full">
        <div class="container">
            <div class="row">
              	<div class="col-xs-12 col-sm-10 col-md-10 col-xs-offset-0 col-xs-offset-1 col-md-offset-1">
                	<div class="testimonial">
                		<?php
                			$testimonial_title = get_theme_mod( 'charity_testimonial_section_title', '' );
                			if( !empty( $testimonial_title ) ) :
                		?>
                  			<h2 class="title">
                  				<?php
                  					echo esc_html( $testimonial_title );
                  				?>
                  			</h2>
                  		<?php
                  			endif;
                  		?>
            			<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
            			<?php
            				$testimonial_cat	= get_theme_mod( 'charity_testimonial_post_category', '0' );
            				$testimonial_no 	= get_theme_mod( 'charity_testimonial_post_number', 3 );
            				$testimonial_args 	= array(
            					'cat'				=> absint( $testimonial_cat ),
            					'posts_per_page'	=> absint( $testimonial_no ),
            					'post_type'			=> 'post'
            				);
            				$testimonial = new WP_Query( $testimonial_args );
            				if( $testimonial->have_posts() ) :
            			?>
	                		<div id="owl-demo3" class="owl-carousel owl-theme">    
	                			<?php
	                				while( $testimonial->have_posts() ) :
	                					$testimonial->the_post();
	                			?>
			                   			<div class="item">
			                   				<?php
			                   					if( has_post_thumbnail() ) :
			                   						the_post_thumbnail( 'hb-charity-thumbnail-2', array( 'class' => 'img-circle testi_img' ) );
			                  					endif;
			                  				?>
			                  				<h5 class="clientname">
			                  					<?php
			                  						the_title();
			                  					?>
			                  				</h5>
				                  			<div class="contain">
				                  				<?php
				                  					the_excerpt();
				                  				?>
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
        </div>
    </div>
    <!-- End  testimonail  Section -->