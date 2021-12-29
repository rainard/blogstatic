<?php
/*
	Template Name: Blog Page
*/
get_header();

global $post, $resumo_fn_option;
$resumo_fn_pagetitle 	= '';

if(function_exists('rwmb_meta')){
	if(isset(get_post_meta(get_the_ID())['resumo_fn_page_title'])){
		$resumo_fn_pagetitle = get_post_meta(get_the_ID(), 'resumo_fn_page_title', true);
	}
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
	
	$pageContent 				= get_the_content();
	$hasContent = 0; if($pageContent != ''){$hasContent = 1;}
?>
	
	<div class="resumo_fn_blog_content" data-content="<?php echo esc_attr($hasContent);?>">
		<div class="container">
			<div class="blog_content">
				<?php the_content();?>
			</div>
		</div>
	</div>
	
	<?php if($resumo_fn_pagetitle !== 'disable'){ ?>
	<!-- PAGE TITLE -->
	<div class="resumo_fn_pagetitle">
		<div class="container">
			<div class="title_holder">
				<?php 
					echo wp_kses($seo_page_title__start,'post');
					the_title();
					echo wp_kses($seo_page_title__end,'post');
					resumo_fn_breadcrumbs();
				?>
			</div>
		</div>
	</div>
	<!-- /PAGE TITLE -->
	<?php } ?>

	<div class="fn_page_blog" data-content="<?php echo esc_attr($hasContent);?>">
		<div class="container">
			<ul class="resumo_fn_postlist">
				<?php get_template_part( 'template-parts/posts' );?>
			</ul>
			<div class="clearfix"></div>
			<?php resumo_fn_pagination(); ?>
		</div>
	</div>

<?php } ?>

<?php get_footer(); ?>  