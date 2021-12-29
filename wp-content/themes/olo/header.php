<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if (is_archive() && ($paged > 1)&& ($paged < $wp_query->max_num_pages)) { ?>
<link rel="prefetch" href="<?php echo get_next_posts_page_link(); ?>">
<link rel="prerender" href="<?php echo get_next_posts_page_link(); ?>">
<?php } ?>
<?php wp_head();?>
</head>
<body <?php body_class(); ?> id="olo">
<?php wp_body_open(); ?>
	<header id="oloLogo">
		<h1>
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo esc_url(get_template_directory_uri());?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" width="100" height="100" />
			</a>
			<?php endif; ?>
		</h1>
		<?php get_search_form(); ?>
		<nav id="oloMenu">
		<?php if(!IsMobile) { ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'olo_wp_list_pages', 'container' => false ) ); ?>
		<?php }else{ ?>
		<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'fallback_cb' => 'olo_wp_list_pages', 'container' => false ) ); ?>
		<?php } ?>
		</nav>
	</header>
	<div class="clear"></div>
	