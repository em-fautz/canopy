<?php
$enable_section = get_theme_mod( 'charity_about_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

  	<!-- Start About Us Section -->
    <div class="container aboutus">
      	<div class="row">
        	<h1 class="title">
        		<?php
        			$about_section_title = get_theme_mod( 'charity_about_section_title', '' );
        			if( !empty( $about_section_title ) ) :
        				echo esc_html( $about_section_title );
        			endif;
        		?>
        	</h1>
        	<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
        	<?php
        		$about_page = get_theme_mod( 'charity_about_section_page', 1 );
        		$about_page_args = array(
        			'page_id'	=> absint( $about_page ),
        			'post_type'	=> 'page'
        		);
        		$about_page_ = new WP_Query( $about_page_args );
        		if( $about_page_->have_posts() ) :
        			while( $about_page_->have_posts() ) :
        				$about_page_->the_post();
        	?>
			          	<div class="col-md-6">
			            	<div class="abt_contain contain">
				              	<h4>
				              		<?php
				              			the_title();
				              		?>
				              	</h4>
								<?php
									the_excerpt();
								?>
				               	<div class="readmore">
				               		<a href="<?php the_permalink(); ?>">
				               			<?php 
				               				echo esc_html__( 'Read More', 'hb-charity' ); 
				               			?>
				               		</a>
				               	</div>
				            </div>
			          	</div>
          	<?php
          			endwhile;
          			wp_reset_postdata();
          		endif;
          	?>
          	<div class="col-md-6">
            	<div class="row about_list">
				<?php
	      			$subpages_no = 4;
	      			for( $i = 1; $i<=$subpages_no; $i++ ) {
	      				$subpage_icon = 'charity_subpage_icon_'.$i;
	      				$subpage_page = 'charity_subpage_page_'.$i;
	      				$subpage_icon_ 	= get_theme_mod( $subpage_icon, '' );
	      				$subpage_id	= get_theme_mod( $subpage_page, 1 );
	      				$subpage_args = array(
	      					'post_type'		=> 'page',
	      					'page_id'		=> absint( $subpage_id )
	      				);
	      				$subpage = new WP_Query( $subpage_args );
	      				if( $subpage->have_posts() ) :
	      					while( $subpage->have_posts() ) :
	      						$subpage->the_post();
	      						$background_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
	      		?>
				              	<div class="col-md-6">
				                	<div class="row single_abt_list clearfix">
				                  		<a href="<?php the_permalink(); ?>">
				                    		<div class="col-md-4 single_abt_list_icon">
				                    			<i class="fa <?php echo esc_attr( $subpage_icon_ ); ?>" aria-hidden="true"></i>
				                    		</div>
				                    		<div class="col-md-8 single_abt_list_contain">
				                      			<h4 class="abt_section_title">
				                      				<?php
				                      					the_title();
				                      				?>                      				
				                      			</h4>
				                        		<div class="contain">
				                          			<?php
				                          				the_excerpt();
				                          			?>
				                        		</div>
				                    		</div>
				                  		</a>
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
      	</div>
    </div>
  	<!-- End About Us Section -->