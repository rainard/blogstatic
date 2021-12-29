<?php
/**
 * The main template file
 * @package Story Hub
 * @version 0.0.1
 */
get_header();
?>
<div id="content" class="site-content">
	<div class="container">
	<!-- Main Content Area -->
		<section class="section-wrap">
			<div class="row">
				<div class="col-sm-12">
					<!-- Blog Grid Posts -->
					<div class="tm-blog-grid">
						<div class="row">
							<div <?php if(get_theme_mod('home_sidebar')==true) : ?> class="col-md-12" <?php else: ?>class="col-md-8 classic left-block" <?php endif; ?> >

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
	                    <?php if(get_theme_mod('home_sidebar')==false) : ?> 
		                       <!-- Sidebar -->
								<div class="col-md-4"  id="secondary">
									<div class="tm-sidebar">
		                            
		                             <?php get_sidebar(); ?>

		                            </div> 
									
								</div>
								<!-- /Sidebar -->
	                    <?php endif; ?> 
				    	</div>	
				    </div>
					<!-- Blog Grid Posts -->	
		        </div>
			</div>
		</section>
	</div>
</div>	
<?php get_footer();