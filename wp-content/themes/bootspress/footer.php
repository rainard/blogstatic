<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootspress
 */

?>
		<?php if ( ! is_page_template( 'full-width-without-container.php' ) ): ?>
			</div><!-- .content-area .row -->
		</div><!-- .container -->
		<?php endif; ?>
	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
	
		<?php get_template_part( 'template-parts/footer', 'widgets' ); ?>
		
	</footer><!-- #footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
