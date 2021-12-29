<!DOCTYPE html >
<html <?php language_attributes(); ?>>
<head>
<?php global $resumo_fn_option, $post; ?>

<meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head(); ?>


</head>
<?php 
	$desktop_animation		= 'disabled';
	if(isset($resumo_fn_option['desktop_animation'])){
		$desktop_animation 	= esc_html($resumo_fn_option['desktop_animation']);
	}
?>
<body <?php body_class();?>>
	<?php wp_body_open(); ?>
	
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'resumo' ); ?></a>
	<!-- Right Hidden Navigation -->
	<?php get_template_part( 'template-parts/desktop-navigation' );?>
	<!-- /Right Hidden Navigation -->

	<!-- HTML starts here -->
	<div class="resumo_fn_wrapper_all" data-animation="<?php echo esc_attr($desktop_animation);?>">
		
		<div class="resumo_fn_wrapper">

			<!-- Mobile Menu starts here -->
			<?php get_template_part( 'template-parts/mobile-navigation' );?>
			<!-- Mobile Menu ends here -->


			<!-- All website content starts here -->
			<div class="resumo_fn_content">
				
				
				<!-- Main Right Part -->
				<?php echo wp_kses(resumo_fn_right_part(),'post');?>
				<!-- /Main Right Part -->
				
				
				<!-- Main Left Part -->
				<div class="resumo_fn_left" id="content">

					<!-- Page -->
					<div class="resumo_fn_pages">
				
				