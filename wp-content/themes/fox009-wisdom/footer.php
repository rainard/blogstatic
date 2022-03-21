<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fox009_wisdom
 */
?>
				</div>
			</div>
			<footer id="footer" class="site-footer">
				<div class="site-info">
					<?php get_template_part( 'template-parts/footer/footer', 'copyright'); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->
		<button class="skip-to-top" title="<?php esc_attr_e('Skip to Top', 'fox009-wisdom') ?>">
			<i class="fa fa-arrow-up"></i>
		</button>
		<?php wp_footer(); ?>

	</body>
</html>
