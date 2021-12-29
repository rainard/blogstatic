<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header();
?>

<div class="prr-content-js">
    <?php get_template_part( 'template-parts/home/section', 'top' ); ?>
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'prem_blog-main-sidebar' ) ){
                echo '<div class="col-md-9">';
            }
            else{
                echo '<div class="col-md-12">';
            }?>
                <?php get_template_part( 'template-parts/home/section', 'tab' ); ?>
                <?php get_template_part( 'template-parts/home/section', 'hot-news' ); ?>
                <?php get_template_part( 'template-parts/home/section', 'more' ); ?>
            </div>
            <div class="col-md-3">
                <div class="ct-home-widget">
                    <?php
                        dynamic_sidebar( 'prem_blog-main-sidebar' );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
