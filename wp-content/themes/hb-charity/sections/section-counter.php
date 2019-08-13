<?php
$enable_section = get_theme_mod( 'charity_counter_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

  	<!-- Start Counter Section -->
    <div class="work_count">
      	<div class="container">
        	<div class="row">
        		<?php
        			$counter_no = 4;
        			for( $i=1; $i<=$counter_no; $i++ ) {
        				$counter_icon 	 = 'charity_counter_icon_'.$i;
        				$counter_title	 = 'charity_counter_title_'.$i;
        				$counter_number  = 'charity_counter_number_'.$i;
        				$counter_icon_ 	 = get_theme_mod( $counter_icon, '' );
        				$counter_title_  = get_theme_mod( $counter_title, '' );
        				$counter_number_ = get_theme_mod( $counter_number, '' ); 
        		?>
          		<div class="col-md-3 counter_container">
            		<div class="row single_work_counter">
              			<div class="single_work_right_border clearfix">
              				<?php
              					if( !empty( $counter_icon_ ) ) :
              				?>
	              				<div class="col-md-3">
	                				<div class="counter_icon">
	                  					<i class="fa <?php echo esc_attr( $counter_icon_ ); ?>" aria-hidden="true"></i>
	                				</div>
	              				</div>
              				<?php
              					endif;
              				?>
              				<div class="col-md-9">
                				<div class="counter_details">
                					<?php
                						if( !empty( $counter_title_ ) ) :
                					?>
                  					<h3 class="subtitlea">
                  						<?php
                  							echo esc_html( $counter_title_ );
                  						?>
                  					</h3>
                  					<?php
                  						endif;
                  						if( !empty( $counter_number_ ) ) :
                  					?>
                  						<p class="counter">
                  							<?php
                  								echo esc_html( absint( $counter_number_ ) );
                  							?>
                  						</p>
                  					<?php
                  						endif;
                  					?>
                				</div>
              				</div>
              			</div>
            		</div>
          		</div>
          		<?php
          			}
          		?>
        	</div>
      	</div>
    </div>
    <!-- End Counter Section -->