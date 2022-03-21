<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fox009_wisdom
 */

get_header();
?>

	<main id="primary" class="main-content errer404 shadow">
		<div class="error-404 not-found">
			<div class="error-404-container padding20">
				<header class="error-header">
					<h2 class="error-title">
						<?php esc_html_e( 'Oops! 404!', 'fox009-wisdom' ); ?>
					</h2>
				</header>
				<div class="error-content">
					<p class="error-description">
						<?php esc_html_e( 'You seem to have come to an empty wasteland.', 'fox009-wisdom' ); ?>
					</p>
					<?php get_search_form(); ?>
					<p class="error-image">
						<image src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/404.jpg' ?>">
					</p>
				</div>
			</div>
		</div><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
