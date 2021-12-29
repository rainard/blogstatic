<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything upto navigation menu.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />

		<!-- Mobile Specific Data -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head(); ?>
	</head>
	<body <?php body_class( '' ); ?>>
        <?php
            if ( function_exists( 'wp_body_open' ) ) {
                wp_body_open();
            }
        ?>
        <a class="skip-link" href="#content">
        <?php esc_html_e( 'Skip to content', 'prem-blog' ); ?></a>
		<div class="mobile-menu-overlay"></div>
      <?php get_template_part( 'template-parts/header/section', 'topbar' ); ?>
	    <header class="site-header">
	        <div class="container">
	            <div class="row vertical-align">
	                <div class="col-md-12 header-left clearfix">
	                	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
		                <nav class="site-navigation">
		                	<?php
		                		if ( has_nav_menu( 'header_menu' ) ) :
				                	wp_nav_menu( array(
   										'theme_location' => 'header_menu',
   										'container' => 'nav',
   										'menu_class' => 'main-nav',
   									) );
   								endif;
   							?>
	                	</nav>
	                	<div class="prr-iconset desktop clearfix">
							<div class="prr-social">
								<?php
                              if ( has_nav_menu( 'social_menu' ) ) {
                                  wp_nav_menu(
                                          array(
                                              'theme_location'    => 'social_menu',
                                              'container'         => 'li',
                                              'menu_id'           => 'menu-social-items',
                                              'menu_class'        => 'menu-items menu-social',
                                              'depth'             => 1,
                                              'link_before'       => '<span class="screen-reader-text">',
                                              'link_after'        => '</span>',
                                              'fallback_cb'       => '',
                                          )
                                  );
                              }
                          ?>
		               </div><!-- .prr-social -->
							<div class="prr-useful">
								<a href="#" class="js-search-icon"><span class="search-icon"><span class="icon icofont-search-2"></span></span></a>
							</div><!-- .prr-useful -->

                            <div class="search-dropdown search-default">
                                <div class="header-search-form clearfix">
                                    <?php get_search_form( $echo = true ); ?>
                                    <a href="#" class="prr-icon-close"><span class="icofont-close"></span></a>
                                </div><!-- /.search-form -->
                            </div><!-- /.search-dropdown -->
	                	</div><!-- .prr-iconset -->

                        <a href="#" class="menubar-right"><span class="icon icofont-navigation-menu"></span></a>
	                </div><!-- .col-md-12 -->

	            </div><!-- .row -->
	        </div><!-- .container -->

	        <div class="container mobile-menu-container">
			    <div class="row">
				    <div class="mobile-navigation">
		        		<nav class="nav-parent">
				            <?php
                                if ( has_nav_menu( 'mobile_menu' ) ) :
                                    wp_nav_menu( array(
                                        'theme_location'    => 'mobile_menu',
                                        'container'         => false,
                                        'menu_class'        => 'mobile-nav',
                                        'depth'             => '4',
                                        'walker'            => new prem_blog_Dropdown_Toggle_Walker_Nav_Menu()
                                    ) );
                                elseif ( has_nav_menu( 'header_menu' ) ) :
                                    wp_nav_menu( array(
                                        'theme_location' => 'header_menu',
                                        'container'         => false,
                                        'menu_class'        => 'mobile-nav',
                                        'depth'             => '4',
                                        'walker'            => new prem_blog_Dropdown_Toggle_Walker_Nav_Menu()
                                    ) );

                                endif;
                            ?>
                            <div class="prr-social">
                                <?php
                                    if ( has_nav_menu( 'social_menu' ) ) {
                                        wp_nav_menu(
                                                array(
                                                    'theme_location'    => 'social_menu',
                                                    'container'         => 'li',
                                                    'menu_id'           => 'menu-social-items',
                                                    'menu_class'        => 'menu-items menu-social',
                                                    'depth'             => 1,
                                                    'link_before'       => '<span class="screen-reader-text">',
                                                    'link_after'        => '</span>',
                                                    'fallback_cb'       => '',
                                                )
                                        );
                                    }
                                ?>
                            </div><!-- .prr-social -->
                            <a href="#" class="menubar-close"><span class="icon icofont-close"></span></a>
		        		</nav>
					</div> <!-- .mobile-navigation -->
			    </div><!-- .row -->
	    	</div><!-- .container -->
	    </header>
