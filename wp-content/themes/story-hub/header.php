<?php
/**
 * The header for our theme
 *
 * @package Story Hub
 * @version 0.0.1
 */
// For top header
$back_to_top_type = log_book_get_option( 'back_to_top_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
   if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
    else { do_action( 'wp_body_open' ); }


if($back_to_top_type == 'enable'): ?>
  <div id="backTop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
<?php endif; ?>

 <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'story-hub'); ?></a>

    <!-- Menu Bar -->
    <div class="menu-bar default">
        <div class="container">

            <div class="logo-top">
               <div class="site-branding">
                    <?php if( has_custom_logo() ) { ?>
                        <div class="custom-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                <?php } 
                 if (display_header_text()==true){
                 ?>
                    <div class="site-branding-text">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                    </div>
                  <?php } ?>
                </div><!-- .site-branding -->

            </div>
        </div>  
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="header-menu">    
                     <div class="container">    
                        <div class="menu-links">
                             <?php wp_nav_menu( array(
                                    'theme_location' => 'primary',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'main-menu',
                                    ) ); 
                                    ?>
                        </div>
                    </div>    
                 </div>    
            <?php endif; ?>
    </div>
    <!-- /Menu Bar -->
    <!-- Mobile Menu -->
    <div id="dl-menu" class="dl-menuwrapper">
        <button class="dl-trigger"><?php esc_html_e('Open Menu','story-hub'); ?></button>
         <?php wp_nav_menu( array(
            'container'       => false, 
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'dl-menu',
            ) ); 
            ?>
    </div><!-- /dl-menuwrapper -->
    <!-- /Mobile Menu -->
     <?php 
    // Custom image.
    global $header_image, $header_style;
    $header_image = get_header_image();
 
    if( $header_image ){
        $header_style = 'style="background-image: url('.esc_url( $header_image ).');"'; 
    } else{

         $log_book_primary_color  = log_book_get_option('primary_color');
         $header_style = 'style="background-color:'.$log_book_primary_color.'"';
    }

   ?>   