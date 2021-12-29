<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header();
?>

<div class="container prr-content-js">
    <div class="row">
        <div class="col-md-12">
            <div class="entry-meta" id="content">
                <?php
                    $prem_blog_categories_list = get_the_category_list( esc_html__( ' / ', 'prem-blog' ) );
                    if ( $prem_blog_categories_list ) {
                        printf(
                            /* translators: 1: SVG icon. 2: posted in label, only visible to screen readers. 3: list of categories. */
                            '<span class="prr-cat-tag">%1$s</span>',
                            $prem_blog_categories_list
                        );
                    }

                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                                the_title( '<h1 class="entry-title"><span class="prr-title">', '</span></h1>' );
                        endwhile; // End of the loop.
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>

<?php if ( get_theme_mod( 'prem_blog_single_page_image_setting', 'container' ) == 'container' ) :?>
    <div class="prr-single-image-container container">
    <?php endif; ?>

    <?php if ( get_theme_mod( 'prem_blog_single_page_image_setting', 'full-width' ) == 'full-width' ) : ?>
    <div class="prr-single-image-container">
<?php endif; ?>

<?php
    if ( have_posts() ) :

        while ( have_posts() ) : the_post();
             if ( has_post_thumbnail() ):
    ?>
                <div class="featured-single-image adjusted-image">
                    <?php the_post_thumbnail(); ?>
                </div><!-- /.image-container -->
    <?php
            endif;
        endwhile; // End of the loop.
    endif;
?>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php
                if ( have_posts() ) :

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content/content', 'single' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                    endwhile; // End of the loop.
                else :

                    get_template_part( 'template-parts/content/content', 'none' );

                endif;
            ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div><!-- .container -->

<?php
get_footer();
