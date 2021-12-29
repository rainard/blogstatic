<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package advance-pet-care
 */
get_header(); ?>

<main role="main" id="maincontent" class="content-ts">
	<div class="container">
        <div class="middle-align my-0 mx-auto py-3 px-0">
			<h1><?php echo esc_html(get_theme_mod('advance_pet_care_title_404_page',__('404 Not Found','advance-pet-care')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('advance_pet_care_content_404_page',__('Looks like you have taken a wrong turn&hellip. Dont worry&hellip it happens to the best of us.','advance-pet-care')));?></p>
			<?php if( get_theme_mod('advance_pet_care_button_404_page','Back to Home Page') != ''){ ?>
				<div class="read-moresec my-4 mx-0">
	        		<a href="<?php echo esc_url(home_url()); ?>" class="button p-3"><?php echo esc_html(get_theme_mod('advance_pet_care_button_404_page',__('Back to Home Page','advance-pet-care')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_pet_care_button_404_page',__('Back to Home Page','advance-pet-care')));?></span></a>
	        	</div>
        	<?php } ?>
			<div class="clearfix"></div>
        </div>
	</div>
</main>

<?php get_footer(); ?>