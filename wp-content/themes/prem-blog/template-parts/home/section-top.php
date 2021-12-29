<?php
/**
 * Template part for displaying Top section in homepage
 */
$prem_blog_cat_id = intval( get_theme_mod( 'prem_blog_grid_section_category_setting', 1 ) );

	$prem_blog_list_args = array(
		'post_type'         =>  'post',
		'posts_per_page'    =>  4,
		'cat'               =>  $prem_blog_cat_id,
	 );

	$prem_blog_list_item  = new WP_Query( $prem_blog_list_args );

$prem_blog_cat_id2 = intval( get_theme_mod( 'prem_blog_scroll_section2_category_setting', 1 ) );
	$prem_blog_block_args = array(
		'post_type'         =>  'post',
		'posts_per_page'    =>  2,
		'ignore_sticky_posts' => 1,
		'cat'               =>  $prem_blog_cat_id2,

	);

	$prem_blog_block_item  = new WP_Query( $prem_blog_block_args );

$prem_blog_cat_id3 = intval( get_theme_mod( 'prem_blog_bottom_section3_category_setting', 1 ) );
	$prem_blog_main_block_args = array(
		'post_type'         =>  'post',
		'posts_per_page'    =>  2,
		'offset'            =>  3,
		'ignore_sticky_posts' => 1,
		'cat'               =>  $prem_blog_cat_id3,

	);

	$prem_blog_main_block_item  = new WP_Query( $prem_blog_main_block_args );
?>
<div id="content" class="container header-slider ct-section-top">
	 <div class="row">
	 	<div class="col-lg-4 col-md-12">
	 		<div class="ct-headline-line">
	 			<h2 class="ct-smart-listing-title"><?php esc_html_e('Trending&nbsp;','prem-blog'); ?>
		 			<span><?php esc_html_e('News','prem-blog'); ?></span>
		 		</h2>
	 		</div><!-- /.ct-headline-line -->
	 		<ul class="ct-list-style">
	 			<?php
					if ( $prem_blog_list_item->have_posts() ) :
						while ( $prem_blog_list_item->have_posts() ) : $prem_blog_list_item->the_post();
				?>
			  	<li>
				    <article class="post ct-horizontal-post">
						<div class="ct-post-thumb">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail( 'prem-blog-1x1' ); ?>
								<?php endif ?>
							</a>
						</div><!-- /.ct-post-thumb -->

						<div class="ct-post-content">
							<h4 class="ct-post-title"><span class="animated-underline">
							  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							</h4>
							<div class="ct-post-meta">
								<div class="ct-block">
									<span class="ct-icon icofont-user-alt-3"></span>
									<span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
								</div><!-- /.ct-block -->
								<div class="ct-block">
									<span class="ct-icon icofont-clock-time"></span>
									<span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
								</div><!-- .ct-block -->
							</div><!-- .ct-post-meta -->
						</div>
					</article>
				</li>
				<?php
					endwhile;
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif;
					wp_reset_postdata();
				?>
			</ul>
	 	</div>
		  <div class="col-lg-5 col-md-12">
		  	<div class="ct-headline-line">
	 			<h2 class="ct-smart-listing-title"><?php esc_html_e('Main&nbsp;','prem-blog'); ?>
		 			<span><?php esc_html_e('News','prem-blog'); ?></span>
		 		</h2>
	 		</div>
				<div class="ct-slider-container">
					 <div class="ct-slider">
						  	<?php
								if ( $prem_blog_main_block_item->have_posts() ) :
									 while ( $prem_blog_main_block_item->have_posts() ) : $prem_blog_main_block_item->the_post();
						  	?>
							  	<div class="ct-slide">
									<div class="ct-slide-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>
									<div class="ct-slide-content">
										 <a href="<?php the_permalink(); ?>"><h1><span class="animated-underline"><?php the_title(); ?></span></h1></a>
										 <div class="ct-post-meta">
											  <div class="ct-block">
													<span class="ct-icon icofont-user-alt-3"></span>
													<span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
											  </div><!-- /.ct-block -->
											  <div class="ct-block">
													<span class="ct-icon icofont-clock-time"></span>
													<span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
											  </div><!-- .ct-block -->
										 </div><!-- .ct-post-meta -->
									</div>
							  </div><!-- /.ct-slide -->
						  	<?php
								endwhile;
								else :
									 get_template_part( 'template-parts/post/content', 'none' );
								endif;

								wp_reset_postdata();
						  	?>
					 </div><!-- /.ct-slider -->

					<div class="ct-slider-arrow">
						<div class="prev icofont-rounded-left"></div>
						<div class="next icofont-rounded-right"></div>
					</div><!-- /.ct-slider-arrow -->
				</div><!-- /.ct-slider-container -->
		  </div><!-- /.col-md-6 -->


		  <div class="col-lg-3 col-md-12">
		  	<div class="ct-headline-line">
	 			<h2 class="ct-smart-listing-title"><?php esc_html_e('Top&nbsp;','prem-blog'); ?>
		 			<span><?php esc_html_e('News','prem-blog'); ?></span>
		 		</h2>
	 		</div>
				<div class="header-sidebar">
					 <?php
						  if ( $prem_blog_block_item->have_posts() ) :
								while ( $prem_blog_block_item->have_posts() ) : $prem_blog_block_item->the_post();
					 ?>

					<div class="ct-top-block">
						<?php if (has_post_thumbnail()): ?>
							<div class="ct-block-bg" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;"></div>
						<?php endif ?>
						<div class="ct-block-content">
							 <a href="<?php the_permalink(); ?>"><h3><span class="animated-underline"><?php the_title(); ?></span></h3></a>
							 <div class="ct-post-meta">
								  <div class="ct-block">
										<span class="ct-icon icofont-user-alt-3"></span>
										<span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
								  </div><!-- /.ct-block -->
								  <div class="ct-block">
										<span class="ct-icon icofont-clock-time"></span>
										<span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
								  </div><!-- .ct-block -->
							 </div><!-- .ct-post-meta -->
						</div>
					</div>
					 <?php
						  endwhile;
						  else :
								get_template_part( 'template-parts/post/content', 'none' );
						  endif;

						  wp_reset_postdata();
					 ?>
				</div><!-- /.header-sidebar -->
		  </div><!-- /.col-md-4 -->
	 </div><!-- /.row -->
</div><!-- /.container -->
