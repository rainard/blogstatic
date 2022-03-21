<?php 
get_header();
global $resumo_fn_option;


// SEO
$seo_404_number 			= 'h2';
if(isset($resumo_fn_option['seo_404_number'])){
	$seo_404_number 		= esc_html($resumo_fn_option['seo_404_number']);
}
$seo_404_number__start 		= sprintf( '<%1$s class="fn__title">', $seo_404_number );
$seo_404_number__end 		= sprintf( '</%1$s>', $seo_404_number );

$seo_404_not_found 			= 'h3';
if(isset($resumo_fn_option['seo_404_not_found'])){
	$seo_404_not_found 		= esc_html($resumo_fn_option['seo_404_not_found']);
}
$seo_404_not_found__start 	= sprintf( '<%1$s class="fn__heading">', $seo_404_not_found );
$seo_404_not_found__end 	= sprintf( '</%1$s>', $seo_404_not_found );

$seo_404_desc 				= 'p';
if(isset($resumo_fn_option['seo_404_desc'])){
	$seo_404_desc 			= esc_html($resumo_fn_option['seo_404_desc']);
}
$seo_404_desc__start 		= sprintf( '<%1$s class="fn__desc">', $seo_404_desc );
$seo_404_desc__end 			= sprintf( '</%1$s>', $seo_404_desc );
?>
          	
<!-- ERROR PAGE -->
<div class="resumo_fn_404">
	<div class="container">
		<div class="error_wrap">
			<div class="error_box">
				<div class="title_holder">
					<?php echo wp_kses($seo_404_number__start,'post'); ?><?php esc_html_e('404', 'resumo') ?><?php echo wp_kses($seo_404_number__end,'post'); ?>
					<?php echo wp_kses($seo_404_not_found__start,'post'); ?><?php esc_html_e('Page Not Found', 'resumo') ?><?php echo wp_kses($seo_404_not_found__end,'post'); ?>
					<?php echo wp_kses($seo_404_desc__start,'post'); ?><?php esc_html_e('Sorry, but the page you are looking for was moved, removed, renamed or might never existed...', 'resumo') ?><?php echo wp_kses($seo_404_desc__end,'post'); ?>
				</div>
				<div class="search_holder">
					<form action="<?php echo esc_url(home_url('/')); ?>" method="get" >
						<div>
							<input type="text" placeholder="<?php esc_attr_e('Search anything...','resumo');?>" name="s" autocomplete="off" />
							<input type="submit" class="pe-7s-search" value="" />
							<span><?php echo wp_kses(resumo_fn_getSVG_theme('search'), 'post');?></span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /ERROR PAGE -->

        
<?php get_footer(); ?>