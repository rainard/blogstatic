<?php
get_header();
global $post;

// CHeck if page is password protected	
if(post_password_required($post)){
	$protected = resumo_fn_protectedpage();
	echo wp_kses($protected, 'post');
}
else
{
?>
<?php get_template_part( 'template-parts/single-post-template' );?>
<?php } ?>

<?php get_footer(); ?>  