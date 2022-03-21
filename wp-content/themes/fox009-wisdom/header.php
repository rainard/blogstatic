<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fox009_wisdom
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'fox009-wisdom' ); ?>
	</a>
	<header id="masthead" class="site-header">
		<div class="float-layer">
			<div class="container">
				<div class="site-branding text-center">
					<?php
					if(has_custom_logo()){
						the_custom_logo();
					}else{
					?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php
					}
					?>
				</div><!-- .site-branding -->
				<?php
				if(fox009_wisdom_theme_options('header_main_menu')==1){
				?>
					<nav id="main-navigation" class="main-navigation primary-menu">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="menu-text"><?php echo esc_html(fox009_wisdom_theme_options('main_menu_text')); ?></span>
							<i class="fa fa-bars open-icon"></i>
							<i class="fa fa-close close-icon"></i>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu',
								'container_class'=> 'primary-menu-container',
								'fallback_cb'	 => 'fox009_wisdom_menu_fallback',
							)
						);
						?>
					</nav>
				<?php
				}
				?>
				<div class="header-search">
					<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<span class="screen-reader-text"><?php echo esc_html_x( 'Search for', 'label', 'fox009-wisdom' ) ?></span>
							<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'fox009-wisdom' ) ?>" value="<?php get_search_query() ?>" name="s" />				
							<button type="submit" class="search-submit">
								<i class="fa fa-search"></i>
							</button>
						</label>
					</form>
				</div>
				<?php
				if(fox009_wisdom_theme_options('header_social_menu')){
				?>
					<nav id="social-navigation" class="social-navigation social-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'social',
								'menu_id'        => 'social-menu',
								'target'		 => '_blank',
								'fallback_cb'	 => 'fox009_wisdom_menu_fallback',
							)
						);
						?>
					</nav>
				<?php
				}
				if(fox009_wisdom_theme_options('header_main_menu')==1){
				?>
					<nav id="main-navigation-mobile" class="main-navigation primary-menu">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="menu-text"><?php echo esc_html(fox009_wisdom_theme_options('main_menu_text')); ?></span>
							<i class="fa fa-bars open-icon"></i>
							<i class="fa fa-close close-icon"></i>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_id'        => 'primary-menu-mobile',
								'container_class'=> 'primary-menu-container',
								'fallback_cb'	 => 'fox009_wisdom_menu_fallback',
							)
						);
						?>
					</nav>
				<?php
				}
				?>
			</div>
		</div>
	</header><!-- #masthead -->
	<div class="breadcrumbs-container">
		<div class="container">
			<?php fox009_wisdom_breadcrumb(); ?>
		</div>
	</div>
	<div class="page-content container">
		<div class="row">