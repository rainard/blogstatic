<?php
/**
 * Template Name: Left Sidebar
 * Template Post Type: post, page, product
 */

get_header();
get_sidebar();
?>
	<main id="primary" class="site-main" role="main">

            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            endwhile; // End of the loop.
            ?>

	</main><!-- #primary -->

<?php
get_footer();
