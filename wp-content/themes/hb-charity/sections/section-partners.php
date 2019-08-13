<?php
$enable_section = get_theme_mod( 'charity_partner_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

	<!-- Start  Patner  Section -->
    <div class="container">
        <div class="row">
            <div class="patner clearfix">
              	<div class="col-xs-12 col-sm-4 col-md-4">
              		<?php
              			$partner_title = get_theme_mod( 'charity_partner_section_title', '' );
              			if( !empty( $partner_title ) ) :
              		?>
	                	<div class="patner_name">
	                  		<h4>
	                  			<?php
	                  				echo esc_html( $partner_title );
	                  			?>
	                  		</h4>
	                	</div>
	                <?php
	                	endif;
	                ?>
              	</div>
              	<?php
              		$partner_cat 	= get_theme_mod( 'charity_partner_post_category', '0' );
              		$partner_no 	= get_theme_mod( 'charity_partner_post_number', 3 );
              		$partner_args 	= array(
              			'cat'				=> absint( $partner_cat ),
              			'posts_per_page'	=> absint( $partner_no ),
              			'post_type'			=> 'post'
              		);
              		$partners = new WP_Query( $partner_args );
              		if( $partners->have_posts() ) :
              	?>
		              	<div class="col-xs-12 col-sm-8 col-md-8">
		              		<div id="owl-demo4" class="owl-carousel owl-theme"> 
		              			<?php
		              				while( $partners->have_posts() ) :
		              					$partners->the_post();
		              					if( has_post_thumbnail() ) :
		              			?>   
					              			<div class="item">
					                			<div class="patner_img">
					                				<?php
					                					the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
					                				?>
					                			</div>
					              			</div>
				              	<?php
				              			endif;
				              		endwhile;
				              		wp_reset_postdata();
				              	?>
		            		</div>
		            	</div>
		        <?php
		        	endif;
		        ?>
            </div>
        </div>
    </div>
    <!-- End  Patner  Section -->