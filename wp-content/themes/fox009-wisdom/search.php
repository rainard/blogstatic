<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Fox009_wisdom
 */

get_header();
?>

	<main id="primary" class="main-content posts search">

		<?php if ( have_posts() ) : ?>
			<div class="page-header-container padding20 shadow">
				<header class="page-header">
					<h1 class="page-title">
						<?php
						printf(
							/* translators: 1: search key. */
							esc_html__( 'Search Results for: %s', 'fox009-wisdom' ), 
							'<span class="search-key">' . get_search_query() . '</span>'
						);
						?>
					<h1>
				</header><!-- .page-header -->
			</div>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'search' );

			endwhile;
			fox009_wisdom_posts_navigation();
		else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
