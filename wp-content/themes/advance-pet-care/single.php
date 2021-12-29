<?php
/**
 * The Template for displaying all single posts.
 *
 * @package advance-pet-care
 */

get_header(); ?>

<div class="container">
    <main role="main" id="maincontent" class="middle-align my-0 mx-auto py-3 px-0">
    	<?php
        $advance_pet_care_left_right = get_theme_mod( 'advance_pet_care_single_post_sidebar_layout','Right Sidebar');
        if($advance_pet_care_left_right == 'Left Sidebar'){ ?>
            <div class="row">
		    	<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
				<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

						endwhile; // End of the loop.
					?>
		       	</div>
		    </div>
	    <?php }else if($advance_pet_care_left_right == 'Right Sidebar'){ ?>
	    	<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }else if($advance_pet_care_left_right == 'One Column'){ ?>
			<div class="content-ts">
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-single' );
						
					endwhile; // End of the loop.
				?>
	       	</div>
		<?php } else { ?>
			<div class="row">
		       	<div class="col-lg-8 col-md-8" class="content-ts">
					<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content-single' );

						endwhile; // End of the loop.
					?>
		       	</div>
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			</div>
		<?php }?>
	    <div class="clearfix"></div>
    </main>
</div>

<?php get_footer(); ?>