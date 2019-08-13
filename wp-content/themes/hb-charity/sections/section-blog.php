<?php
$enable_section = get_theme_mod( 'charity_blog_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

    <!-- Start  Blog  Section -->
    <div class="blog-section">
        <div class="container">
        	<?php
        		$blog_section_title 	= get_theme_mod( 'charity_blog_section_title', '' );        		
        		if( !empty( $blog_section_title ) ) :
        	?>
          			<h2 class="title">
          				<?php
          					echo esc_html( $blog_section_title );
          				?>
          			</h2>
          	<?php
          		endif;
          	?>
          	<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
          	<?php
          		$blog_section_subtitle 	= get_theme_mod( 'charity_blog_section_subtitle' );
          		if( !empty( $blog_section_subtitle ) ) :
          	?>
          		<p class="text-center">
          			<?php
          				echo esc_html( $blog_section_subtitle );
          			?>
          		</p>
          	<?php
          		endif;
          		$blog_cat 		= get_theme_mod( 'charity_blog_post_category', '0' );
          		$blog_post_no 	= get_theme_mod( 'charity_blog_post_number', 3 );
          		$exclude_cat = explode( ', ', get_theme_mod( 'charity_category_exclude', '' ) );
          		$blog_args 		= array(
          			'cat'				=> absint( $blog_cat ),
          			'posts_per_page'	=> absint( $blog_post_no ),
          			'category__not_in'  => $exclude_cat,
          			'post_type'			=> 'post'
          		);
          		$blog = new WP_Query( $blog_args );
          		if( $blog->have_posts() ) :
          	?>
	           	<div class="row clearfix grid">
	           		<?php
	           			while( $blog->have_posts() ) :
	           				$blog->the_post();
	           		?>
		              	<div class="col-xs-12 col-sm-4 col-md-4 grid-item">
		              		<div class="single_causes_item blog_single_item">
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
		                		<div class="single_causes_item_contain blog_contain">
		                  			<h3 class="subtitle">
		                  				<?php
		                  					the_title();
		                  				?>
		                  			</h3>
		                    		<ul class="blog_info">
		                      			<li>
		                      				<?php
		                      					echo get_the_date();
		                      				?>
		                      			</li>
		                      			<?php
		                      				$categories_list = get_the_category_list( esc_html__( ', ', 'hb-charity' ) );
		                      				if( !empty( $categories_list ) ) :
		                      			?>
			                      			<li class="blog_info_category_list">
			                      				<?php
			                      					echo $categories_list;
			                      				?>
			                      			</li>
		                      			<?php
		                      				endif;
		                      			?>
		                      			<li>
		                      				<i class="fa fa-comment" aria-hidden="true"></i>
		                      				<?php
		                      					echo get_comments_number();
		                      				?>
		                      			</li>
		                    		</ul>
		                  			<div class="contain">
		                  				<?php
		                  					the_excerpt();
		                  				?>
		                  			</div>
		                 			<a href="<?php the_permalink(); ?>" class="viewdetails">
		                 				<?php 
		                 					echo esc_html__( 'View Details', 'hb-charity' ); 
		                 				?>
		                 			</a>
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
    <!-- End  Blog  Section -->