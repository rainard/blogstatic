<?php 

get_header();

global $post, $resumo_fn_option;
$resumo_fn_pagetitle 	= '';
$resumo_fn_pagestyle 	= '';

if(function_exists('rwmb_meta')){
	$resumo_fn_pagetitle 	= get_post_meta(get_the_ID(),'resumo_fn_page_title', true);
	$resumo_fn_pagestyle 	= get_post_meta(get_the_ID(),'resumo_fn_page_style', true);
}

if($resumo_fn_pagestyle == 'ws' && !resumo_fn_if_has_sidebar()){
	$resumo_fn_pagestyle	= 'full';
}

// CHeck if page is password protected	
if(post_password_required($post)){
	$protected = resumo_fn_protectedpage();
	echo wp_kses($protected, 'post');
}
else
{
 	$seo_page_title 			= 'h3';
	if(isset($resumo_fn_option['seo_page_title'])){
		$seo_page_title 		= esc_html($resumo_fn_option['seo_page_title']);
	}
	$seo_page_title__start 		= sprintf( '<%1$s class="fn__title">', $seo_page_title );
	$seo_page_title__end 		= sprintf( '</%1$s>', $seo_page_title );
	
?>




<div class="resumo_fn_full_page_template">
	<?php if($resumo_fn_pagetitle !== 'disable'){ ?>
		<!-- PAGE TITLE -->
		<div class="resumo_fn_pagetitle">
			<div class="container">
				<div class="title_holder">
					<?php echo wp_kses($seo_page_title__start,'post'); the_title(); echo wp_kses($seo_page_title__end,'post'); ?>
					<?php resumo_fn_breadcrumbs();?>
				</div>
			</div>
		</div>
		<!-- /PAGE TITLE -->
	<?php } ?>

	<!-- ALL PAGES -->		
	<div class="resumo_fn_full_page_in">
		<?php if($resumo_fn_pagestyle !== 'full'){ ?>
		<div class="container">
		<?php } ?>
			<!-- PAGE -->
			<div class="full_content resumo_fn_page_content">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php the_content(); ?>

				<?php wp_link_pages(
					array(
						'before'      => '<div class="resumo_fn_pagelinks"><span class="title">' . esc_html__( 'Pages:', 'resumo' ). '</span>',
						'after'       => '</div>',
						'link_before' => '<span class="number">',
						'link_after'  => '</span>',
					)); 
				?>
			</div>
			<!-- /PAGE -->

		
		<?php if($resumo_fn_pagestyle !== 'full'){ ?></div><?php } ?>
		
		
	</div>		
	<!-- /ALL PAGES -->
		
	<?php if ( comments_open() || get_comments_number()){?>
	<!-- POST COMMENT -->
	<div class="resumo_fn_comment_wrapper">
		<div class="container">
			<div class="resumo_fn_comment" id="comments">
				<div class="comment_in">
					<?php comments_template(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /POST COMMENT -->
	<?php } ?>
	<?php endwhile; endif; ?>
</div>





<?php } ?>

<?php get_footer(); ?>  