<?php
get_header();
global $post, $resumo_fn_option;


$seo_page_title 			= 'h3';
if(isset($resumo_fn_option['seo_page_title'])){
	$seo_page_title 		= esc_html($resumo_fn_option['seo_page_title']);
}
$seo_page_title__start 		= sprintf( '<%1$s class="fn__title">', $seo_page_title );
$seo_page_title__end 		= sprintf( '</%1$s>', $seo_page_title );


$searchBox = '<div class="container"><div class="resumo_fn_searchbox">
				<div class="title_holder">
					<p>'.esc_html__('If you are not happy with the results below please do another search', 'resumo').'</p>
				</div>
				<div class="search_holder">
					<form action="'.esc_url(home_url('/')).'" method="get" >
						<div>
							<input type="text" placeholder="'.esc_attr__('Search anything...','resumo').'" name="s" autocomplete="off" />
							<input type="submit" class="pe-7s-search" value="" />
							<span>'.resumo_fn_getSVG_theme('search').'</span>
						</div>
					</form>
				</div>
			</div></div>';
$have = false;
if(have_posts()){$have = true;}
?>
	
<div class="resumo_fn_search_page has_<?php echo esc_attr($have);?>">

	<div class="resumo_fn_pagetitle">
		<div class="container">
			<div class="title_holder">
				<?php echo wp_kses($seo_page_title__start,'post'); ?>
				<?php printf( esc_html__('Results For: "%s"', 'resumo'), get_search_query() ); ?>
				<?php echo wp_kses($seo_page_title__end,'post'); ?>
			</div>
		</div>
	</div>
	
	<?php echo wp_kses($searchBox,'post'); ?>

	<div class="resumo_fn_searchpagelist">
		<div class="container">
			<?php if($have){ ?>
			<ul class="resumo_fn_postlist resumo_fn_searchlist">
				<?php get_template_part( 'template-parts/posts', '', array('from_page' => 'search')  );?>
			</ul>
			<div class="clearfix"></div>
			<?php resumo_fn_pagination(); ?>
			<?php }else{ ?>
			<h3 class="nothing_found"><?php esc_html_e('It seems we can\'t find what you\'re looking for.','resumo');?></h3>
			<?php } ?>
		</div>
	</div>

	<?php wp_reset_postdata(); ?>
</div>
<!-- /SEARCH --> 
        
<?php get_footer('null'); ?>   