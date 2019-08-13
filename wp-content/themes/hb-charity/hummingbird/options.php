<?php

$wp_customize->add_panel( 'theme_options', array(
	'title'			=> __( 'HB Charity Theme Options', 'hb-charity' ),
	'description'	=> __( 'HB Charity Theme Customization Options', 'hb-charity' ),
	'priority'		=> 10	
) );

/*-----------------------------------------
		Image Carousel Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_image_carousel_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Carousel Section', 'hb-charity' ),
	'description'	=> __( 'Configure Image Carousel', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_image_carousel_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_image_carousel_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_image_carousel_section',
		'settings' => 'charity_image_carousel_enable',
		'type'     => 'checkbox',
	) ) );

$wp_customize->add_setting('charity_image_carousel_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '1',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_image_carousel_category', array(
	'label' => __('Choose Category','hb-charity'),
	'section' => 'charity_image_carousel_section',
	'settings' => 'charity_image_carousel_category',
	'type'=> 'dropdown-taxonomies',
) ) );

$wp_customize->add_setting('charity_image_carousel_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_image_carousel_number', array(
	'label' => __('No of Posts','hb-charity'),
	'section' => 'charity_image_carousel_section',
	'settings' => 'charity_image_carousel_number',
	'type'=> 'number',
) );

// Button Title
$wp_customize->add_setting( 'charity_image_carousel_button_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_image_carousel_button_title', array(
	'label'				=> __( 'Button Title', 'hb-charity' ),
	'section'			=> 'charity_image_carousel_section',
	'settings'			=> 'charity_image_carousel_button_title',
	'type'				=> 'text' 
) );


/*-----------------------------------------
		Services Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_services_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Services Section', 'hb-charity' ),
	'description'	=> __( 'Configure Icons and Pages For Services', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_services_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_services_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_services_section',
		'settings' => 'charity_services_section_enable',
		'type'     => 'checkbox',
	) ) );

$services_no = 3;
for( $i = 1; $i <= $services_no; $i++ ) {

	// Services Icon
	$icon_setting = 'charity_service_icon_'.$i;
	$wp_customize->add_setting( $icon_setting, array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> ''
	) );
	$wp_customize->add_control( $icon_setting, array(
		'label'				=> __( 'Icon For Service ', 'hb-charity' ).$i,
		'section'			=> 'charity_services_section',
		'settings'			=> $icon_setting,
		'type'				=> 'text'
	) );

	// Services Page
	$page_setting = 'charity_service_page_'.$i;
	$wp_customize->add_setting( $page_setting, array(
		'sanitize_callback'	=> 'hb_charity_sanitize_dropdown_pages',
		'default'			=> 1
	) );
	$wp_customize->add_control( $page_setting, array(
		'label'				=> __( 'Page For Service ', 'hb-charity' ).$i,
		'section'			=> 'charity_services_section',
		'settings'			=> $page_setting,
		'type'				=> 'dropdown-pages'
	) );
}


/*-----------------------------------------
		About Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_about_section', array(
	'priority'		=> 20,
	'title'			=> __( 'About Section', 'hb-charity' ),
	'description'	=> __( 'Configure About Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_about_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_about_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_about_section',
		'settings' => 'charity_about_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_about_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_about_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_about_section',
	'settings'			=> 'charity_about_section_title',
	'type'				=> 'text' 
) );

// Section Page
$wp_customize->add_setting( 'charity_about_section_page', array(
	'sanitize_callback'	=> 'hb_charity_sanitize_dropdown_pages',
	'default'			=> 1
) );
$wp_customize->add_control( 'charity_about_section_page', array(
	'label'				=> __( 'Select Page', 'hb-charity' ),
	'section'			=> 'charity_about_section',
	'settings'			=> 'charity_about_section_page',
	'type'				=> 'dropdown-pages'
) );

// Section Sub Pages
$subpages_no = 4;
for( $i = 1; $i <= $subpages_no; $i++ ) {

	// Subpage Icon
	$icon_setting = 'charity_subpage_icon_'.$i;
	$wp_customize->add_setting( $icon_setting, array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> ''
	) );
	$wp_customize->add_control( $icon_setting, array(
		'label'				=> __( 'Icon For Sub Page ', 'hb-charity' ).$i,
		'section'			=> 'charity_about_section',
		'settings'			=> $icon_setting,
		'type'				=> 'text'
	) );

	// Services Page
	$page_setting = 'charity_subpage_page_'.$i;
	$wp_customize->add_setting( $page_setting, array(
		'sanitize_callback'	=> 'hb_charity_sanitize_dropdown_pages',
		'default'			=> 1
	) );
	$wp_customize->add_control( $page_setting, array(
		'label'				=> __( 'Page For Sub Page ', 'hb-charity' ).$i,
		'section'			=> 'charity_about_section',
		'settings'			=> $page_setting,
		'type'				=> 'dropdown-pages'
	) );
}


/*-----------------------------------------
	Causes Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_causes_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Causes Section', 'hb-charity' ),
	'description'	=> __( 'Configure Causes Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

// Enable
$wp_customize->add_setting( 'charity_causes_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_causes_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_causes_section',
		'settings' => 'charity_causes_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_causes_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_causes_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_causes_section',
	'settings'			=> 'charity_causes_section_title',
	'type'				=> 'text' 
) );

// Section Sub Title
$wp_customize->add_setting( 'charity_causes_section_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_causes_section_subtitle', array(
	'label'				=> __( 'Section Sub Title', 'hb-charity' ),
	'section'			=> 'charity_causes_section',
	'settings'			=> 'charity_causes_section_subtitle',
	'type'				=> 'text' 
) );

// Causes Category
$wp_customize->add_setting('charity_causes_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '1',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_causes_post_category', array(
	'label' => __('Choose Category','hb-charity'),
	'section' => 'charity_causes_section',
	'settings' => 'charity_causes_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// No of Causes Posts
$wp_customize->add_setting('charity_causes_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_causes_post_number', array(
	'label' => __('No of Posts','hb-charity'),
	'section' => 'charity_causes_section',
	'settings' => 'charity_causes_post_number',
	'type'=> 'number',
) );


/*-----------------------------------------
	Counter Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_counter_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Counter Section', 'hb-charity' ),
	'description'	=> __( 'Configure Counter Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

// Enable
$wp_customize->add_setting( 'charity_counter_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_counter_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_counter_section',
		'settings' => 'charity_counter_section_enable',
		'type'     => 'checkbox',
	) ) );

$counter_no = 4;
for( $i = 1; $i <= $counter_no; $i++ ) {

	// Counter Icon
	$icon_setting = 'charity_counter_icon_'.$i;
	$wp_customize->add_setting( $icon_setting, array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> ''
	) );
	$wp_customize->add_control( $icon_setting, array(
		'label'				=> __( 'Counter Icon ', 'hb-charity' ).$i,
		'section'			=> 'charity_counter_section',
		'settings'			=> $icon_setting,
		'type'				=> 'text'
	) );

	// Counter Title
	$title_setting = 'charity_counter_title_'.$i;
	$wp_customize->add_setting( $title_setting, array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'			=> ''
	) );
	$wp_customize->add_control( $title_setting, array(
		'label'				=> __( 'Counter Title ', 'hb-charity' ).$i,
		'section'			=> 'charity_counter_section',
		'settings'			=> $title_setting,
		'type'				=> 'text'
	) );

	// Counter Number
	$number_setting = 'charity_counter_number_'.$i;
	$wp_customize->add_setting( $number_setting, array(
		'sanitize_callback'	=> 'hb_charity_sanitize_number_absint',
		'default'			=> ''
	) );
	$wp_customize->add_control( $number_setting, array(
		'label'				=> __( 'Counter Number ', 'hb-charity' ).$i,
		'section'			=> 'charity_counter_section',
		'settings'			=> $number_setting,
		'type'				=> 'text'
	) );
}


/*-----------------------------------------
  Event And Gallery Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_event_gallery_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Event & Gallery Section', 'hb-charity' ),
	'description'	=> __( 'Configure Event & Gallery Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_event_gallery_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_event_gallery_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_event_gallery_section',
		'settings' => 'charity_event_gallery_section_enable',
		'type'     => 'checkbox',
	) ) );

// Event Section Title
$wp_customize->add_setting( 'charity_event_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_event_section_title', array(
	'label'				=> __( 'Event Section Title', 'hb-charity' ),
	'section'			=> 'charity_event_gallery_section',
	'settings'			=> 'charity_event_section_title',
	'type'				=> 'text' 
) );

// Event Post Category
$wp_customize->add_setting('charity_event_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_event_post_category', array(
	'label' => __('Choose Event Category','hb-charity'),
	'section' => 'charity_event_gallery_section',
	'settings' => 'charity_event_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Event Posts
$wp_customize->add_setting('charity_event_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_event_post_number', array(
	'label' => __('No of Event Posts','hb-charity'),
	'section' => 'charity_event_gallery_section',
	'settings' => 'charity_event_post_number',
	'type'=> 'number',
) );

// Gallery Section Title
$wp_customize->add_setting( 'charity_gallery_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_gallery_section_title', array(
	'label'				=> __( 'Gallery Section Title', 'hb-charity' ),
	'section'			=> 'charity_event_gallery_section',
	'settings'			=> 'charity_gallery_section_title',
	'type'				=> 'text' 
) );

// Gallery Post Category
$wp_customize->add_setting('charity_gallery_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_gallery_post_category', array(
	'label' => __('Choose Gallery Category','hb-charity'),
	'section' => 'charity_event_gallery_section',
	'settings' => 'charity_gallery_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Gallery Posts
$wp_customize->add_setting('charity_gallery_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_gallery_post_number', array(
	'label' => __('No of Gallery Posts','hb-charity'),
	'section' => 'charity_event_gallery_section',
	'settings' => 'charity_gallery_post_number',
	'type'=> 'number',
) );


/*-----------------------------------------
  Main Highlight Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_main_highlight_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Main Highlight Section', 'hb-charity' ),
	'description'	=> __( 'Configure Main Highlight Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_main_highlight_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_main_highlight_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_main_highlight_section',
		'settings' => 'charity_main_highlight_section_enable',
		'type'     => 'checkbox',
	) ) );

$wp_customize->add_setting( 'charity_main_highlight_page', array(
	'sanitize_callback'	=> 'hb_charity_sanitize_dropdown_pages',
	'default'			=> 1
) );

$wp_customize->add_control( 'charity_main_highlight_page', array(
	'label'				=> __( 'Select Page For Highlight', 'hb-charity' ),
	'section'			=> 'charity_main_highlight_section',
	'settings'			=> 'charity_main_highlight_page',
	'type'				=> 'dropdown-pages'
) );


/*-----------------------------------------
  Success Story Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_success_story_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Success Story Section', 'hb-charity' ),
	'description'	=> __( 'Configure Success Story Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_success_story_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_success_story_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_success_story_section',
		'settings' => 'charity_success_story_section_enable',
		'type'     => 'checkbox',
	) ) );

// Success Story Title
$wp_customize->add_setting( 'charity_success_story_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_success_story_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_success_story_section',
	'settings'			=> 'charity_success_story_title',
	'type'				=> 'text'
) );

// Success Story Category
$wp_customize->add_setting('charity_success_story_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_success_story_post_category', array(
	'label' => __('Choose Success Story Category','hb-charity'),
	'section' => 'charity_success_story_section',
	'settings' => 'charity_success_story_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Event Posts
$wp_customize->add_setting('charity_success_story_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_success_story_post_number', array(
	'label' => __('No of Event Posts','hb-charity'),
	'section' => 'charity_success_story_section',
	'settings' => 'charity_success_story_post_number',
	'type'=> 'number',
) );


/*-----------------------------------------
  		Blog Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_blog_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Blog Section', 'hb-charity' ),
	'description'	=> __( 'Configure Blog Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_blog_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_blog_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_blog_section',
		'settings' => 'charity_blog_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_blog_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_blog_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_blog_section',
	'settings'			=> 'charity_blog_section_title',
	'type'				=> 'text' 
) );

// Section Sub Title
$wp_customize->add_setting( 'charity_blog_section_subtitle', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_blog_section_subtitle', array(
	'label'				=> __( 'Section Sub Title', 'hb-charity' ),
	'section'			=> 'charity_blog_section',
	'settings'			=> 'charity_blog_section_subtitle',
	'type'				=> 'text' 
) );

// Blog Category
$wp_customize->add_setting('charity_blog_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_blog_post_category', array(
	'label' => __('Choose Blog Category','hb-charity'),
	'section' => 'charity_blog_section',
	'settings' => 'charity_blog_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Blog Posts
$wp_customize->add_setting('charity_blog_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_blog_post_number', array(
	'label' => __('No of Blog Posts','hb-charity'),
	'section' => 'charity_blog_section',
	'settings' => 'charity_blog_post_number',
	'type'=> 'number',
) );



/*-----------------------------------------
  		Team Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_team_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Team Section', 'hb-charity' ),
	'description'	=> __( 'Configure Team Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_team_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_team_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_team_section',
		'settings' => 'charity_team_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_team_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_team_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_team_section',
	'settings'			=> 'charity_team_section_title',
	'type'				=> 'text' 
) );

// Team Category
$wp_customize->add_setting('charity_team_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_team_post_category', array(
	'label' => __('Choose Team Category','hb-charity'),
	'section' => 'charity_team_section',
	'settings' => 'charity_team_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Team Members
$wp_customize->add_setting('charity_team_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_team_post_number', array(
	'label' => __('No of Members','hb-charity'),
	'section' => 'charity_team_section',
	'settings' => 'charity_team_post_number',
	'type'=> 'number',
) );



/*-----------------------------------------
  	Testimonial Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_testimonial_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Testimonial Section', 'hb-charity' ),
	'description'	=> __( 'Configure Testimonial Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_testimonial_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_testimonial_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_testimonial_section',
		'settings' => 'charity_testimonial_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_testimonial_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_testimonial_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_testimonial_section',
	'settings'			=> 'charity_testimonial_section_title',
	'type'				=> 'text' 
) );

// Testimonail Category
$wp_customize->add_setting('charity_testimonial_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_testimonial_post_category', array(
	'label' => __('Choose Testimonial Category','hb-charity'),
	'section' => 'charity_testimonial_section',
	'settings' => 'charity_testimonial_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Testimonials
$wp_customize->add_setting('charity_testimonial_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_testimonial_post_number', array(
	'label' => __('No of Testimonial','hb-charity'),
	'section' => 'charity_testimonial_section',
	'settings' => 'charity_testimonial_post_number',
	'type'=> 'number',
) );



/*-----------------------------------------
  	Partner Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_partner_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Partner Section', 'hb-charity' ),
	'description'	=> __( 'Configure Partner Section', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

//Enable
$wp_customize->add_setting( 'charity_partner_section_enable', array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default'           => false,
) );

$wp_customize->add_control(
	new WP_Customize_Control($wp_customize,'charity_partner_section_enable',array(
		'label'    => __( 'Enable', 'hb-charity' ),
		'section'  => 'charity_partner_section',
		'settings' => 'charity_partner_section_enable',
		'type'     => 'checkbox',
	) ) );

// Section Title
$wp_customize->add_setting( 'charity_partner_section_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_partner_section_title', array(
	'label'				=> __( 'Section Title', 'hb-charity' ),
	'section'			=> 'charity_partner_section',
	'settings'			=> 'charity_partner_section_title',
	'type'				=> 'text' 
) );

// Partner Category
$wp_customize->add_setting('charity_partner_post_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_partner_post_category', array(
	'label' => __('Choose Partner Category','hb-charity'),
	'section' => 'charity_partner_section',
	'settings' => 'charity_partner_post_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Partners
$wp_customize->add_setting('charity_partner_post_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_partner_post_number', array(
	'label' => __('No of Partners','hb-charity'),
	'section' => 'charity_partner_section',
	'settings' => 'charity_partner_post_number',
	'type'=> 'number',
) );



/*-----------------------------------------
  	Header Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_header_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Top Header Option', 'hb-charity' ),
	'description'	=> __( 'Configure Top Header', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

// Select Category For Flash Events
$wp_customize->add_setting('charity_header_flash_category',array(
	'sanitize_callback' => 'hb_charity_sanitize_category',
	'default' =>  '0',
) );

$wp_customize->add_control(
	new HB_Charity_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'charity_header_flash_category', array(
	'label' => __('Choose Flash Category','hb-charity'),
	'section' => 'charity_header_section',
	'settings' => 'charity_header_flash_category',
	'type'=> 'dropdown-taxonomies',
) ) );

// Numbers of Flash Events
$wp_customize->add_setting('charity_header_flash_number',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' =>  3,
) );

$wp_customize->add_control( 'charity_header_flash_number', array(
	'label' => __('No of Flash Events','hb-charity'),
	'section' => 'charity_header_section',
	'settings' => 'charity_header_flash_number',
	'type'=> 'number',
) );

// Button Name
$wp_customize->add_setting( 'charity_header_button_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_header_button_title', array(
	'label'				=> __( 'Shortcode Button Title', 'hb-charity' ),
	'description'		=> __( 'Insert button name.', 'hb-charity' ),
	'section'			=> 'charity_header_section',
	'settings'			=> 'charity_header_button_title',
	'type'				=> 'text' 
) );

// Button Font
$wp_customize->add_setting( 'charity_header_button_font', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_header_button_font', array(
	'label'				=> __( 'Shortcode Button Icon', 'hb-charity' ),
	'description'		=> __( 'Insert class of icon form FontAwesome. It is displayed before button name.', 'hb-charity' ),
	'section'			=> 'charity_header_section',
	'settings'			=> 'charity_header_button_font',
	'type'				=> 'text' 
) );

// ShortCode for form
$wp_customize->add_setting( 'charity_header_form_shortcode', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_header_form_shortcode', array(
	'label'				=> __( 'Shortcode', 'hb-charity' ),
	'description'		=> __( 'Copy and paste shordcode of form form Contact Form 7, Gravity Form etc...', 'hb-charity' ),
	'section'			=> 'charity_header_section',
	'settings'			=> 'charity_header_form_shortcode',
	'type'				=> 'text' 
) );



/*-----------------------------------------
  	Footer Section Theme Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_footer_section', array(
	'priority'		=> 20,
	'title'			=> __( 'Bottom Footer Option', 'hb-charity' ),
	'description'	=> __( 'Configure Bottom Footer', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

// Copyright Text
$wp_customize->add_setting( 'charity_footer_copyright_text', array(
	'sanitize_callback'	=> 'wp_kses_post',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_footer_copyright_text', array(
	'label'				=> __( 'Copyright Text', 'hb-charity' ),
	'description'		=> __( 'Insert copyright text.', 'hb-charity' ), 
	'section'			=> 'charity_footer_section',
	'settings'			=> 'charity_footer_copyright_text',
	'type'				=> 'text' 
) );


/*-----------------------------------------
  	Theme Sidebar Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_sidebar_section', array(
	'priority'			=> 20,
	'title'				=> __( 'Sidebar Option', 'hb-charity' ),
	'description'		=> __( 'Configure Sidebar Position', 'hb-charity' ),
	'panel'				=> 'theme_options'	
) );

$wp_customize->add_setting('charity_sidebar_position', array(
	'sanitize_callback'	=> 'hb_charity_sanitize_sidebar',
	'default'			=> 'right'
));

$wp_customize->add_control('charity_sidebar_position', array(
	'label'      		=> __('Sidebar Position', 'hb-charity'),
	'description'		=> __( 'Select Sidebar Postion. Select none to hide sidebar.', 'hb-charity' ),
	'section'    		=> 'charity_sidebar_section',
	'settings'   		=> 'charity_sidebar_position',
	'type'       		=> 'radio',
	'choices'    		=> array(
		'left'   		=> __('Left','hb-charity'),
		'right'  		=> __('Right','hb-charity'),
		'none'	 		=> __('None','hb-charity'),
	),
) );



/*-----------------------------------------
  	Theme Other Option
-----------------------------------------*/
$wp_customize->add_section( 'charity_other_option', array(
	'priority'		=> 20,
	'title'			=> __( 'Other Options', 'hb-charity' ),
	'description'	=> __( 'Configure Other Options', 'hb-charity' ),
	'panel'			=> 'theme_options'	
) );

$wp_customize->add_setting('enable_scrolltotop',array(
	'sanitize_callback' => 'hb_charity_sanitize_checkbox',
	'default' => '1',
) );

$wp_customize->add_control(new WP_Customize_Control($wp_customize,'enable_scrolltotop',array(
	'label' => __('Show Scroll To Top Button','hb-charity'),
	'section' => 'charity_other_option',
	'settings' => 'enable_scrolltotop',
	'type'=> 'checkbox',
)));

// Excerpt Length
$wp_customize->add_setting('charity_excerpt_length',array(
	'sanitize_callback' => 'hb_charity_sanitize_number_absint',
	'default' 			=>  40,
) );

$wp_customize->add_control( 'charity_excerpt_length', array(
	'label' 			=> __('Excerpt Length','hb-charity'),
	'description'		=> __( 'By default, excerpt length is 40', 'hb-charity' ),
	'section' 			=> 'charity_other_option',
	'settings' 			=> 'charity_excerpt_length',
	'type'				=> 'number',
) );

// Exclude Category
$wp_customize->add_setting( 'charity_category_exclude', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> ''
) );
$wp_customize->add_control( 'charity_category_exclude', array(
	'label'				=> __( 'Exclude Categories', 'hb-charity' ),
	'description'		=> __( 'Exclude categories form Blog page and Blog section. Insert Category Id Separated By Comma', 'hb-charity' ),
	'section'			=> 'charity_other_option',
	'settings'			=> 'charity_category_exclude',
	'type'				=> 'text' 
) );
?>