<?php
	/*
	 * Template Name: FrontPage
	 *
	 */
	get_header();

	// FrontPage Section
	get_template_part( 'sections/section', 'carousel' );

	// Services Section
	get_template_part( 'sections/section', 'services' );

	// About Section
	get_template_part( 'sections/section', 'about' );

	// Causes Section
	get_template_part( 'sections/section', 'causes' );

	// Counter Section
	get_template_part( 'sections/section', 'counter' );

	// Event Section
	get_template_part( 'sections/section', 'event' );

	// Highlight Section
	get_template_part( 'sections/section', 'highlight' );

	// Success Story Section
	get_template_part( 'sections/section', 'story' );

	// Blog Section
	get_template_part( 'sections/section', 'blog' );
	
	// Team Section
	get_template_part( 'sections/section', 'team' );
	
	// Testimonial Section
	get_template_part( 'sections/section', 'testimonial' );

	// Partners Section
	get_template_part( 'sections/section', 'partners' );


?>



 




<?php
	get_footer();
?>