<?php
$enable_section = get_theme_mod( 'charity_team_section_enable', false );
if ( ! $enable_section ) {
	return;
}
?>

    <!-- Start  Team  Section -->
    <div class="container">
        <div class="row team">
        	<?php
        		$team_title = get_theme_mod( 'charity_team_section_title', '' );
        		if( !empty( $team_title ) ) :
        	?>
            	<h2 class="title">
            		<?php
            			echo esc_html( $team_title );
            		?>
            	</h2>
            <?php
            	endif;
            ?>
            <div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>
    	    <?php
    	    	$team_cat 		= get_theme_mod( 'charity_team_post_category', '0' );
    	    	$team_member_no = get_theme_mod( 'charity_team_post_number', 3 );
    	    	$team_args		= array(
    	    		'cat'				=> absint( $team_cat ),
    	    		'posts_per_page'	=> absint( $team_member_no ),
    	    		'post_type'			=> 'post'
    	    	);
    	    	$team = new WP_Query( $team_args );
    	    	if( $team->have_posts() ) :
    	    		while( $team->have_posts() ) :
    	    			$team->the_post();
    	    ?>
			            <div class="col-xs-12 col-sm-4 col-md-4">
			              	<div class="single_team">
			              		<?php
			              			if( has_post_thumbnail() ) :
			              		?>
				               		<div class="team_member_img view hm-zoom">
				               			<?php
				               				the_post_thumbnail( 'hb-charity-thumbnail-2', array( 'class' => 'img-fluid' ) );
				               			?>
				               		</div>
			               		<?php
			               			endif;
			               		?>
			               		<div class="team_member_details">
			                   		<h5>
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
			              	</div>
			            </div>
		    <?php
		    		endwhile;
                    wp_reset_postdata();
		    	endif;
		    ?>
        </div>
    </div>
    <!-- End  team  Section -->