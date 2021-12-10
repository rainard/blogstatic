<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'my_wedding_above_slider' ); ?>

	<?php if( get_theme_mod('my_wedding_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
			    <?php $my_wedding_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'my_wedding_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $my_wedding_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($my_wedding_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $my_wedding_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			        	<div class="slider-img">
            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
            			</div>
            			<div class="carousel-caption">
				            <div class="inner-carousel">
				            	<div class="heart-shape"></div>
				              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				              	<?php if (get_theme_mod('my_wedding_slider_date') != '') {?>
				              		<span class="slider-date"><?php echo esc_html(get_theme_mod('my_wedding_slider_date')); ?></span>
				              	<?php }?>
				              	<?php if (get_theme_mod('my_wedding_slider_time') != '') {?>
				              		<span class="slider-time"><?php echo esc_html(get_theme_mod('my_wedding_slider_time')); ?></span>
				              	<?php }?>
		            		</div>
		            	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','my-wedding' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','my-wedding' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('my_wedding_below_slider'); ?>

	<?php if( get_theme_mod('my_wedding_groom_post') != '' || get_theme_mod('my_wedding_bride_groom_image') != '' || get_theme_mod('my_wedding_bride_post') != ''){ ?>
		<section id="about-section" class="py-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 align-self-center">
						<?php
				        $my_wedding_postData =  get_theme_mod('my_wedding_groom_post');
				        if($my_wedding_postData){
				          	$args = array( 'name' => esc_html($my_wedding_postData ,'my-wedding'));
				          	$query = new WP_Query( $args );
				          	if ( $query->have_posts() ) :
					            while ( $query->have_posts() ) : $query->the_post(); ?>
				              		<div class="groom-box text-md-right text-center">
				                  		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
				                  		<h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
				                    	<p><?php $my_wedding_excerpt = get_the_excerpt(); echo esc_html( my_wedding_string_limit_words( $my_wedding_excerpt,18 ) ); ?></p>
				               		</div>
					            <?php endwhile; 
					            wp_reset_postdata();?>
				            <?php else : ?>
				              <div class="no-postfound"></div>
				            <?php
				        endif;} ?>
					</div>
					<div class="col-lg-4 col-md-4 text-center align-self-center">
						<?php if (get_theme_mod('my_wedding_bride_groom_image') != '') { ?>
							<div class="image-box">
								<img src="<?php echo esc_url(get_theme_mod('my_wedding_bride_groom_image')); ?>" alt="<?php esc_attr('Bride Groom Image', 'my-wedding'); ?>">
							</div>
						<?php }?>
					</div>
					<div class="col-lg-4 col-md-4 align-self-center">
						<?php
				        $my_wedding_postData =  get_theme_mod('my_wedding_bride_post');
				        if($my_wedding_postData){
				          	$args = array( 'name' => esc_html($my_wedding_postData ,'my-wedding'));
				          	$query = new WP_Query( $args );
				          	if ( $query->have_posts() ) :
					            while ( $query->have_posts() ) : $query->the_post(); ?>
				              		<div class="bride-box text-md-left text-center">
				                  		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
				                  		<h3><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h3>
				                    	<p><?php $my_wedding_excerpt = get_the_excerpt(); echo esc_html( my_wedding_string_limit_words( $my_wedding_excerpt,18 ) ); ?></p>
				               		</div>
					            <?php endwhile; 
					            wp_reset_postdata();?>
				            <?php else : ?>
				              <div class="no-postfound"></div>
				            <?php
				        endif;} ?> 
					</div>
				</div>
			</div>
		</section>
	<?php }?>

	<?php do_action('my_wedding_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>