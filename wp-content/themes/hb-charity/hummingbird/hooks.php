<?php
/**
 * Load hooks.
 *
 * @package HB Charity
 */

/*======================================================
			Doctype hook of the theme
======================================================*/
if( ! function_exists( 'hb_charity_doctype_action' ) ) :
	/**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
	function hb_charity_doctype_action() {
	?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
	<?php		
	}
endif;
add_action( 'hb_charity_doctype', 'hb_charity_doctype_action', 10 );


/*======================================================
			Head hook of the theme
======================================================*/
if( ! function_exists( 'hb_charity_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_charity_head_action() {
 	?>
 	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
 	<?php	
 	}
endif;
add_action( 'hb_charity_head', 'hb_charity_head_action', 10 );


/*======================================================
			Custom Logo of the theme
======================================================*/
if( ! function_exists( 'hb_charity_custom_logo_action' ) ) :
    /**
     * Logo hook of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_custom_logo_action() {
    ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-0 col-md-offset-0">
            <div class="logo clearfix">
                <?php 
                    if( has_custom_logo() ) :
                        the_custom_logo();
                    else :
                ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                    <h5 class="site-description">
                        <?php echo get_bloginfo( 'description' ); ?>
                    </h5>
                <?php
                    endif;
                ?>
            </div>
        </div>
    <?php
    }
endif;
add_action( 'hb_charity_custom_logo', 'hb_charity_custom_logo_action' );


/*======================================================
			Main Menu of the theme
======================================================*/
if( ! function_exists( 'hb_charity_main_menu_action' ) ) :
    /**
     * Main Menu hook of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_main_menu_action() {
    ?>
        <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="menu clearfix">
                <div class="nav-wrapper"> 
                    <!-- for toogle menu -->
                    <div class="visible-xs visible-sm  clearfix"><span id="showbutton" class="clearfix"><img class="img-responsive grow" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/button.png' ); ?>" alt=""/></span></div>
                    <div class=""></div>
                                          
                    <nav class="col-md-12 im-hiding">
                        <div class="clearfix">
                        <?php 
                            if( has_nav_menu( 'primary' ) ) :
                                $defaults = array(
                                    'theme_location'  => 'primary',
                                    'container'       => '',
                                    'menu_class'      => 'main-nav',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'depth'           => 0,
                                    'walker'          => '',
                                    'fallback_cb'     => 'wp_page_menu'
                                );
                                wp_nav_menu( $defaults );
                            endif;
                        ?>
                        </div>    
                    </nav><!-- / main nav -->
                </div>
            </div>
        </div>
    <?php    
    }
endif;
add_action( 'hb_charity_main_menu', 'hb_charity_main_menu_action', 10 );


/*======================================================
Top header containing flash events and modal form of the theme
======================================================*/
if( ! function_exists( 'hb_charity_top_header_action' ) ) :
    /**
     * Top Header declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_top_header_action() {
    ?>
        <div class="topheader">
            <div class="container">
                <div class="row">
                <?php
                    $flash_event_cat  = get_theme_mod( 'charity_header_flash_category', '0' );
                    $flash_event_no   = get_theme_mod( 'charity_header_flash_number', 3 );
                    $flash_args       = array(
                        'cat'               => absint( $flash_event_cat ),
                        'posts_per_page'    => absint( $flash_event_no ),
                        'post_type'         => 'post'   
                    );
                    $flashes = new WP_Query( $flash_args );
                    if( $flashes->have_posts() ) :
                ?>
                        <!-- Start Top header Headline-->
                        <div class="col-xs-12 col-sm-6 col-md-9">
                            <div class="headline clearfix">
                                <div id="owl-demo" class="owl-carousel owl-theme">
                                    <?php
                                        while( $flashes->have_posts() ) :
                                          $flashes->the_post();
                                    ?>
                                          <div class="item">
                                              <a href="<?php the_permalink(); ?>">
                                                  <?php
                                                      the_title();
                                                  ?>
                                              </a>
                                          </div>
                                    <?php
                                        endwhile;
                                    ?>            
                                </div>
                            </div>
                        </div>
                        <!-- End Top header Headline-->
                <?php
                    endif;
                ?>
                <?php
                    $form_shortcode = get_theme_mod( 'charity_header_form_shortcode', '' );
                    if( !empty( $form_shortcode ) ) :
                ?>
                    <!-- Start Top header Donate Us-->
                    <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-0 col-md-3 col-md-offset-0">
                        <?php
                            $button_name   = get_theme_mod( 'charity_header_button_title', '' );
                            $button_font   = get_theme_mod( 'charity_header_button_font', '' ); 
                            if( ! empty( $button_name ) ) :
                        ?>
                            <div class="header_donate">
                                <a href="" title="" data-toggle="modal" data-target="#donatenow">
                                    <i class="fa <?php if( !empty( $button_font ) ) : echo esc_attr( $button_font ); endif; ?>" aria-hidden="true"></i> 
                                    <?php
                                        echo esc_html( $button_name );
                                    ?>
                                </a>
                            </div>
                        <?php
                            endif;
                        ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade donatenowform" id="donatenow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <?php
                                    echo do_shortcode( $form_shortcode );
                                ?>
                            </div>
                            <!--/.Content-->
                        </div>
                    </div>
                    <!-- /.Live preview-->
                    <!-- End Top header Donate Us-->
                <?php
                    endif;
                ?>
                </div>
            </div>
        </div>
    <?php
    }
endif;
add_action( 'hb_charity_top_header', 'hb_charity_top_header_action', 10 );


/*======================================================
            Breadcrumb of the theme
======================================================*/
if( ! function_exists( 'hb_charity_breadcrumb_action' ) ) :
    /**
     * Breadcrumb Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_breadcrumb_action() {
        if( !is_front_page() && !is_home() ) :
            if( has_header_image() ) :
    ?>
            <div class="bredcrumb_full" style="background-image: url( <?php header_image(); ?> )">
    <?php
            else :
    ?>
            <div class="bredcrumb_full">
    <?php
            endif;
    ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 breadcrum">
                        <?php
                            $breadcrumb_args = array(
                                'show_browse' => true,
                                'separator' => '&nbsp;',
                                'post_taxonomy' => array(
                                    'post' => 'category'
                                ),
                                'labels' => array(
                                    'browse' => esc_html__( 'You are here:', 'hb-charity' ),
                                )                               
                            );
                            hb_charity_breadcrumb_trail( $breadcrumb_args );
                        ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        endif;
    }
endif;
add_action( 'hb_charity_breadcrumb', 'hb_charity_breadcrumb_action', 10 );


/*======================================================
            Footer Top of the theme
======================================================*/
if( ! function_exists( 'hb_charity_footer_top_action' ) ) :
    /**
     * Footer Top Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_footer_top_action() {
        if( is_active_sidebar( 'sidebar-2' ) ) :
    ?>
            <div class="topfooter">
                <div class="container">
                    <div class="row top_footer">
                        <?php
                            dynamic_sidebar( 'sidebar-2' );
                        ?>
                    </div>
                </div>
            </div>
    <?php
        endif;
    }
endif;
add_action( 'hb_charity_footer_top', 'hb_charity_footer_top_action', 10 );


/*======================================================
            Footer Bottom of the theme
======================================================*/
if( ! function_exists( 'hb_charity_footer_bottom_action' ) ) :
    /**
     * Footer Bottom Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_footer_bottom_action() {
    ?>
        <div class="bottom_footer">
            <div class="container">
                <div class="row">
                    <?php
                        $copyright_text = get_theme_mod( 'charity_footer_copyright_text', '' );
                        if( !empty( $copyright_text ) ) :
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="copyright">
                                <p>
                                    <?php
                                        echo wp_kses_post( $copyright_text );
                                    ?>
                                </p>
                            </div>
                        </div>
                    <?php
                        endif;
                    ?>
                    <?php
                        if( has_nav_menu( 'secondary' ) ) :
                    ?>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="footer_menu pull-right">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'    => 'secondary'
                                    ) );
                                ?>
                            </div>
                        </div>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    <?php    
    }
endif;
add_action( 'hb_charity_footer_bottom', 'hb_charity_footer_bottom_action', 10 );


/*======================================================
        Bottom to Top Scroll of the theme
======================================================*/
if( ! function_exists( 'hb_charity_scroll_top_action' ) ) :
    /**
     * Scroll Top Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_scroll_top_action() {
        $scrolltotop_disable = get_theme_mod('enable_scrolltotop','1');
        if($scrolltotop_disable == 1):
        ?>

        <a href="#" id="back-to-top" title="Back to top">
            <i class="fa fa-long-arrow-up"></i>
        </a>
    <?php
        endif;
    }
endif;
add_action( 'hb_charity_scroll_top', 'hb_charity_scroll_top_action', 10 );


/*======================================================
        Footer of the theme
======================================================*/
if( ! function_exists( 'hb_charity_footer_action' ) ) :
    /**
     * Footer Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_charity_footer_action() {
        wp_footer();
    ?>
            </body>
        </html>
    <?php
    }
endif;
add_action( 'hb_charity_footer', 'hb_charity_footer_action', 10 )
?>