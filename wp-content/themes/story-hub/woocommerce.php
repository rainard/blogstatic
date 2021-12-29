<?php
/**
 * The template for displaying all pages
 * @package Story Hub
 * @version 0.0.1
 */
get_header(); ?>
<div id="content" class="site-content">
	<div class="container">
        <div class="row">
         <div <?php if(get_theme_mod('pages_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-12" <?php endif; ?> >
                <div id="primary" class="content-area">
                    <main id="main" class="site-main post-wrapper" role="main">
            
                       <?php 
                        if (have_posts()) :
                            woocommerce_content();
                        endif;
                        ?>
            
                    </main><!-- #main -->
                </div><!-- #primary -->

            </div>
			
        </div><!-- .row -->
	</div>
</div>
<?php get_footer();
