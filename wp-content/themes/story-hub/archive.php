<?php
/**
 * The template for displaying archive pages
 * @package Story Hub
 * @version 0.0.1
 */

get_header(); ?>

<!-- Breadcrumb Header -->
    <div class="tm-breadcrumb" <?php echo wp_kses_data($header_style); ?>>
        <div class="container">
            <h1 class="title"><?php the_archive_title(); ?></h1>
            <?php do_action( 'log_book_breadcrumb_options' ); ?>
        </div>
    </div>
    <!-- /Breadcrumb Header -->

<div class="container">
    <!-- Main Content Area -->
    <section class="section-wrap">
        <div class="row">
            <div class="col-sm-12">
                <!-- Blog Grid Posts -->
                <div class="tm-blog-grid">
                    <div class="row">
                        <div <?php if(get_theme_mod('archive_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8 left-block" <?php endif; ?> >
                       
                            <div class="tm-blog-list">   
                       
                                 <div id="primary" class="row">
              
                                    <?php
                                      
                                     if ( have_posts() ) :
                                                    
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
                        

                                            get_template_part( 'template-parts/post/content-list');
                                    
                                        endwhile;
                        
                                        else :
                        
                                          get_template_part( 'template-parts/post/content', 'none' );
                        
                                        endif;
                                      ?>
                                 </div>
                             </div> 
                            <div class="tm-pagination">
                               <?php the_posts_pagination( array(
                                'mid_size'  => 2,
                                'prev_text' => __( '<<', 'story-hub' ),
                                'next_text' => __( '>>', 'story-hub' ),
                                 ) ); ?>
                            </div>
                            
                       </div>
                          
                     <?php if(get_theme_mod('archive_sidebar')==false) : ?> 
              
                 <div class="col-md-4">    
                            
                    <div class="tm-sidebar">
                        
                         <?php get_sidebar(); ?>

                    </div> 
                            
                </div>
                  
                <?php endif; ?> 
                </div><!-- .row -->
              </div>
            </div>
        </div>  
    </section>    
</div> 
<?php get_footer();