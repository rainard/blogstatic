<?php
/**
 * Displays the footer widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bootspress
 */

if ( is_active_sidebar( 'footer' ) ) : ?>

	<aside id="sidebar-footer" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'bootspress' ); ?>">
		<div class="container">
			<div class="sidebar-footer-area row">
				<?php dynamic_sidebar('footer'); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</aside><!-- #sidebar-footer -->

<?php endif; ?>
	
	<aside id="sidebar-colophon" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Colophon', 'bootspress' ); ?>">
		<div class="container">
			<div class="sidebar-colophon-area row">
			
				<div class="widget-container">
					<section id="text-colophon" class="widget widget_custom_html">
						<div class="textwidget">
							<div class="site-info">
								<?php
								/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html__( 'Theme %1$s by %2$s.', 'bootspress' ), '<a href="https://bootspress.com" class="site-theme">BootsPress</a>', '<a href="https://bootspress.com" class="theme-author">bootspress.com</a>' );
								?>
							</div><!-- .site-info -->	
						</div>
					</section>
				</div>
				
				<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
					<div class="widget-container">
						<section id="nav_menu-footer" class="widget widget_nav_menu">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'footer',
							'menu_id'		  => 'footer-menu',
							'depth'           => 1,
							'fallback_cb'     => false,
						) );
						?>
						</section>
					</div>
				<?php endif; ?>
				
			<?php if ( is_active_sidebar( 'colophon' ) ) : ?>
		
				<?php dynamic_sidebar( 'colophon' ); ?>
				
			<?php endif; ?>
				
			</div><!-- .row -->
		</div><!-- .container -->
	</aside><!-- #sidebar-colophon -->