<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ts">
 *
 * @package advance-pet-care
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
  } else {
    do_action( 'wp_body_open' );
  } ?>
  <header role="banner">
    <?php if(get_theme_mod('advance_pet_care_preloader_option',true) != '' || get_theme_mod('advance_pet_care_responsive_preloader', true) != ''){ ?>
      <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
      </div>
    <?php }?>
    <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'advance-pet-care' ); ?></a>
    <div id="header">
      <?php if( get_theme_mod('advance_pet_care_display_topbar') != ''){ ?>
        <div class="top-header pt-2 pb-4">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4">
                <div class="mail">
                  <?php if( get_theme_mod('advance_pet_care_mail1') != ''){ ?>
                    <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_pet_care_mail1','') ); ?>"><i class="fas fa-envelope me-2"></i><?php echo esc_html( get_theme_mod('advance_pet_care_mail1','')); ?><span class="screen-reader-text"><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('advance_pet_care_mail1','')); ?></span></a>
                  <?php } ?>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="phone text-center">
                  <?php if( get_theme_mod('advance_pet_care_phone1') != ''){ ?>
                    <a href="tel:<?php echo esc_attr( get_theme_mod('advance_pet_care_phone1','' )); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( get_theme_mod('advance_pet_care_phone1','' )); ?><span class="screen-reader-text"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('advance_pet_care_phone1','' )); ?></span></a>
                  <?php } ?>
                </div>       
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="social-icons text-end">
                  <?php if( get_theme_mod( 'advance_pet_care_facebook_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f ms-3" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','advance-pet-care' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_pet_care_twitter_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_twitter_url','' ) ); ?>"><i class="fab fa-twitter ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','advance-pet-care' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_pet_care_youtube_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_youtube_url','' ) ); ?>"><i class="fab fa-youtube ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','advance-pet-care' );?></span></a>
                    <?php } ?>
                    <?php if( get_theme_mod( 'advance_pet_care_insta_url') != '') { ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_insta_url','' ) ); ?>"><i class="fab fa-instagram ms-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','advance-pet-care' );?></span></a>
                  <?php } ?>                
                </div>  
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="pet-top my-2">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 align-self-center">
              <div class="time align-self-center">
                <div class="row m-0">
                  <?php if( get_theme_mod( 'advance_pet_care_time') != '' || get_theme_mod( 'advance_pet_care_time1' )!= '') { ?>
                    <div class="col-lg-1 col-md-2 p-0">
                      <i class="far fa-calendar-alt mt-2"></i>
                    </div>
                    <div class="col-lg-11 col-md-10">
                      <?php if( get_theme_mod('advance_pet_care_time') != ''){ ?>
                        <p class="color text-capitalize mb-0"><?php echo esc_html( get_theme_mod('advance_pet_care_time','')); ?></p>
                      <?php } ?>
                      <?php if( get_theme_mod('advance_pet_care_time1') != ''){ ?>
                        <p><?php echo esc_html( get_theme_mod('advance_pet_care_time1','')); ?></p>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-center">
              <div class="logo align-self-center">
                <?php if ( has_custom_logo() ) : ?>
                  <div class="site-logo text-center"><?php the_custom_logo(); ?></div>
                  <?php endif; ?>
                  <?php $blog_info = get_bloginfo( 'name' ); ?>
                  <?php if ( ! empty( $blog_info ) ) : ?>
                    <?php if( get_theme_mod('advance_pet_care_site_title',true) != ''){ ?>
                      <?php if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title text-center mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                      <?php else : ?>
                        <p class="site-title text-center mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                      <?php endif; ?>
                    <?php }?>
                  <?php endif; ?>
                  <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                    ?>
                  <?php if( get_theme_mod('advance_pet_care_tagline',true) != ''){ ?>
                    <p class="site-description text-center mb-md-0 mb-2">
                      <?php echo esc_html($description); ?>
                    </p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-center">
              <div class="address text-md-end text-center align-self-center">
                <div class="row m-0">
                  <?php if( get_theme_mod( 'advance_pet_care_address') != '' || get_theme_mod( 'advance_pet_care_address1' )!= '') { ?>
                    <div class="col-lg-11 col-md-10">
                      <?php if( get_theme_mod('advance_pet_care_address') != ''){ ?>
                        <p class="color mb-0"><?php echo esc_html( get_theme_mod('advance_pet_care_address','')); ?></p>
                      <?php } ?>
                      <?php if( get_theme_mod('advance_pet_care_address1') != ''){ ?>
                        <p><?php echo esc_html( get_theme_mod('advance_pet_care_address1','')); ?></p>
                      <?php } ?>
                    </div>
                    <div class="col-lg-1 col-md-2 p-0">
                      <i class="fas fa-location-arrow mt-2"></i>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main-menu <?php if( get_theme_mod( 'advance_pet_care_sticky_header', false) != '' || get_theme_mod( 'advance_pet_care_responsive_sticky_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-md-7 col-4 align-self-center">
              <?php 
                if(has_nav_menu('primary')){ ?>
                <div class="toggle-menu responsive-menu">
                  <button role="tab" class="mobiletoggle"><i class="fas fa-bars my-2"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','advance-pet-care'); ?></span></button>
                </div>
              <?php }?>
              <div id="menu-sidebar" class="nav sidebar text-lg-start text-center">
                <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'advance-pet-care' ); ?>">
                  <?php
                    if(has_nav_menu('primary')){ 
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav ps-lg-0 text-center">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) );
                    } 
                  ?>
                  <div id="contact-info w-100">
                    <div class="mail text-center my-1">
                      <?php if( get_theme_mod('advance_pet_care_mail1') != ''){ ?>
                        <a href="mailto:<?php echo esc_attr( get_theme_mod('advance_pet_care_mail1','') ); ?>" class="text-lowercase"><i class="fas fa-envelope me-2"></i><?php echo esc_html( get_theme_mod('advance_pet_care_mail1','')); ?><span class="screen-reader-text"><i class="fas fa-envelope"></i><?php echo esc_html( get_theme_mod('advance_pet_care_mail1','')); ?></span></a>
                      <?php } ?>
                    </div>
                    <div class="phone text-center my-1">
                      <?php if( get_theme_mod('advance_pet_care_phone1') != ''){ ?>
                        <a href="tel:<?php echo esc_attr( get_theme_mod('advance_pet_care_phone1','' )); ?>"><i class="fas fa-phone me-2"></i><?php echo esc_html( get_theme_mod('advance_pet_care_phone1','' )); ?><span class="screen-reader-text"><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('advance_pet_care_phone1','' )); ?></span></a>
                      <?php } ?>
                    </div>
                    <?php get_search_form();?>
                    <div class="social-icons text-center my-2">
                      <?php if( get_theme_mod( 'advance_pet_care_facebook_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f ms-2" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','advance-pet-care' );?></span></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'advance_pet_care_twitter_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_twitter_url','' ) ); ?>"><i class="fab fa-twitter ms-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','advance-pet-care' );?></span></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'advance_pet_care_youtube_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_youtube_url','' ) ); ?>"><i class="fab fa-youtube ms-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','advance-pet-care' );?></span></a>
                        <?php } ?>
                        <?php if( get_theme_mod( 'advance_pet_care_insta_url') != '') { ?>
                        <a href="<?php echo esc_url( get_theme_mod( 'advance_pet_care_insta_url','' ) ); ?>"><i class="fab fa-instagram ms-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','advance-pet-care' );?></span></a>
                      <?php } ?>                
                    </div> 
                  </div>
                  <a href="javascript:void(0)" class="closebtn responsive-menu"><i class="far fa-times-circle"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','advance-pet-care'); ?></span></a>
                </nav>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-4 align-self-center">
              <div class="search-box align-self-center">
                <button type="button" class="search-open"><i class="fas fa-search m-2 p-2"></i></button>
              </div>
            </div>
            <div class="col-lg-1 col-md-3 col-4 align-self-center">
              <div class="cart_icon align-self-center">
                <a href="<?php esc_url(the_permalink((get_option('woocommerce_cart_page_id')))); ?>"><i class="fas fa-shopping-bag p-3"></i><span class="screen-reader-text"><?php esc_html_e( 'Shopping Bag','advance-pet-care' );?></span></a>
              </div>
            </div>
          </div>
          <div class="search-outer">
            <div class="serach_inner w-100 h-100">
              <?php get_search_form(); ?>
            </div>
            <button type="button" class="search-close">X</span></button>
          </div>
        </div>
      </div>
    </div>
  </header>