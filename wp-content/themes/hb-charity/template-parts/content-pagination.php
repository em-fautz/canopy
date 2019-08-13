<?php
 /**
  *
  *
  *
  */
?>
<div class="col-sm-12">
	<?php
		the_posts_pagination( 
			array(
				'mid_size' 	=> 2,
				'prev_text' => __( '&laquo;', 'hb-charity' ),
				'next_text' => __( '&raquo;', 'hb-charity' ),
			) 
		);
	?>
</div>