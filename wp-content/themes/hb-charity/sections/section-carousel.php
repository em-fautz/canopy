	<?php
        $carousel_image_category = get_theme_mod( 'charity_image_carousel_category', '1' );
        $carousel_image_no       = get_theme_mod( 'charity_image_carousel_number', 3 );
        $carousel_image_enable   = get_theme_mod( 'charity_image_carousel_enable', false );
        $carousel_args           = array(
            'cat'            => absint( $carousel_image_category ),
            'posts_per_page' => absint( $carousel_image_no )
        );

		$carousel_result			= new WP_Query( $carousel_args );

		if( $carousel_result->have_posts() && $carousel_image_enable ) :
			$i = 0;
	?>
		<!-- Start Slider Section -->
	    <div class="slider">
	        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		        <?php if ( $carousel_result->have_posts() && $carousel_result->post_count > 1 ) { ?>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
				        <?php
				        while ( $carousel_result->have_posts() ) :
					        $carousel_result->the_post();
					        if ( $i == 0 ) :
						        ?>
                                <li data-target="#carousel-example-generic"
                                    data-slide-to="<?php echo esc_attr( $i ); ?>" class="active"></li>
						        <?php
						        $i = $i + 1;
					        else :
						        ?>
                                <li data-target="#carousel-example-generic"
                                    data-slide-to="<?php echo esc_attr( $i ); ?>"></li>

						        <?php
						        $i = $i + 1;
					        endif;
				        endwhile;
				        $i = 0;
				        wp_reset_postdata();
				        ?>
                    </ol>
		        <?php } ?>

		        <!-- Wrapper for slides -->
		        <div class="carousel-inner" role="listbox">
		        	<?php
		        		while( $carousel_result->have_posts() ) :
		        			$carousel_result->the_post();
		        			if( $i == 0 ) :
		        	?>
					          	<div class="item active">
					          		<?php
					          			if( has_post_thumbnail() ) :
					          				the_post_thumbnail();
					            		endif;
					            	?>
					            	<div class="carousel-caption">
					              		<h3>
					              			<?php
					              				the_title();
					              			?>
					              		</h3>
					              		<?php
					              			the_excerpt();
					              		?>
					              		<?php
					              			$carousel_button_title = get_theme_mod( 'charity_image_carousel_button_title', '' );
					              			if( !empty( $carousel_button_title ) ) :
					              		?>
					              		<a href="<?php the_permalink(); ?>" class="donatenow">
					              			<?php
												echo esc_html( $carousel_button_title );
											?>
					              		</a>
					              		<?php
					              			endif;
					              		?>
					            	</div>
					          	</div>
				        <?php
			        			$i = $i+1;
			        		else :
			        	?>
			        			<div class="item">
					          		<?php
					          			if( has_post_thumbnail() ) :
					          				the_post_thumbnail();
					            		endif;
					            	?>
					            	<div class="carousel-caption">
					              		<h3>
					              			<?php
					              				the_title();
					              			?>
					              		</h3>
					              		<?php
					              			the_excerpt();
					              		?>
					              		<?php
					              			$carousel_button_title = get_theme_mod( 'charity_image_carousel_button_title', '' );
					              			if( !empty( $carousel_button_title ) ) :
					              		?>
					              		<a href="<?php the_permalink(); ?>" class="donatenow">
					              			<?php
												echo esc_html( $carousel_button_title );
											?>
					              		</a>
					              		<?php
					              			endif;
					              		?>
					            	</div>
					          	</div>
					<?php
								$i = $i+1;
			        		endif;
			        	endwhile;
			        	$i = 0;
			        	wp_reset_postdata();
			        ?>
		        </div>

		        <?php if ( $carousel_result->have_posts() && $carousel_result->post_count > 1 ) { ?>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo __( 'Previous', 'hb-charity' ); ?></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only"><?php echo __( 'Next', 'hb-charity' ); ?></span>
                    </a>

		        <?php } ?>

	      	</div>
	    </div>
	  <!-- End Slider Section -->
	<?php
		endif;
	?>