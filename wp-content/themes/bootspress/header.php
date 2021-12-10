<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootspress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bootspress' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
		
            <nav class="navbar navbar-expand-xl">
                <div class="navbar-brand">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php endif; ?>
				<?php $blog_info = get_bloginfo( 'name' ); ?>
				<?php if ( ! empty( $blog_info ) ) : ?>
					<?php if ( is_front_page() && is_home() ) :?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
				<?php endif; ?>
				<?php $bootspress_description = get_bloginfo( 'description', 'display' );
				if ( $bootspress_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $bootspress_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
                </div>
				
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'bootspress' ); ?>"><span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'bootspress' ); ?></span><span class="navbar-toggler-icon"></span></button>
				
                <?php
                wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'menu_id'		  => 'primary-menu',
					'container'       => 'div',
					'container_id'    => 'main-nav',
					'container_class' => 'collapse navbar-collapse justify-content-end',
					'menu_class'      => 'navbar-nav',
					'depth'           => 3,
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker()
                ) );
                ?>
            </nav>		

		</div><!-- .container -->
	</header><!-- #masthead -->
	
	<?php bootspress_header_after(); ?>
	
	<div id="content" class="site-content">
		<?php if ( ! is_page_template( 'full-width-without-container.php' ) ): ?>
		<div class="container">
			<div class="content-area row">
		<?php endif; ?>