<?php 

global $resumo_fn_option;
$post_type				= 'post';
if (isset($args['post_type'])) {
	$post_type 			= $args['post_type'];
}
if (have_posts()) : while (have_posts()) : the_post();
	$post_ID 			= get_the_id();
	$post_title			= '';
	if(get_the_title() !== ''){
		$post_title 	= '<div class="fn-container narrow"><div class="post_title"><h3 class="fn__title">'.get_the_title().'</h3></div></div>';
	}
		

	$post_thumbnail_id 	= get_post_thumbnail_id( $post_ID );
	$src 				= wp_get_attachment_image_src( $post_thumbnail_id, 'full');
	$image_URL 			= '';
	$has_image			= 0;
	if(isset($src[0])){
		$image_URL 		= $src[0];
	}
	if($image_URL != ''){
		$has_image		= 1;
	}
	$category_box		= $getInfoAboutAuthor =	$extra_meta			= '';
	$category_box		= resumo_fn_get_category_info($post_ID, 999);
	$getInfoAboutAuthor = resumo_get_author_info();
	
	$date			= '<div class="date">'.get_the_date().'</div>';
	$author_id		= get_post_field ('post_author', $post_ID);
	$author_name 	= get_the_author_meta( 'display_name' , $author_id );
	$author			= '<div class="author">'.esc_html__('By ','resumo').$author_name.'</div>';
	$comment		= '<div class="comment">'.sprintf( esc_html__( '%1$s Comments', 'resumo' ), get_comments_number() ).'</div>';
	$information 	= '<div class="fn-container narrow"><div class="single_meta">'.$date.$author.$category_box.$comment.'</div></div>';
?>

<div class="single_header">
	<?php echo wp_kses($post_title, 'post'); ?>
	<?php echo wp_kses($information, 'post'); ?>
	<div class="fn_post_image" data-image="<?php echo esc_attr($has_image);?>">
		<div class="fn-container">
			<img src="<?php echo esc_url($image_URL);?>" alt="<?php echo esc_attr__('Post Image', 'resumo');?>" />
		</div>
	</div>
</div>


	
	<!-- Content without title, image and comments -->
<div class="fn_single_content">


<!-- Elementor and Classic Content -->
<div class="blog_content">
	<div class="container">
	<?php the_content(); ?>
	</div>
</div>
<!-- /Elementor and Classic Content -->


<!-- Information -->
<div class="blog_info">
	<div class="container">
		<?php if(has_tag()){?>
			<div class="resumo_fn_tags">
				<label><?php the_tags(esc_html_e('Tags:', 'resumo').'</label>', ''); ?>
			</div>
		<?php } ?>
		<?php echo wp_kses($getInfoAboutAuthor, 'post');?>
	</div>
	<?php wp_link_pages(
		array(
			'before'      => '<div class="container"><div class="resumo_fn_pagelinks"><span class="title">' . esc_html__( 'Pages:', 'resumo' ). '</span>',
			'after'       => '</div></div>',
			'link_before' => '<span class="number">',
			'link_after'  => '</span>',
		)); 
	?>
</div>
<!-- /Information -->
</div>
<?php echo wp_kses(resumo_fn_prevnext(), 'post'); ?>
<!-- /Content without title, image and comments -->

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
<?php endwhile; endif;wp_reset_postdata();?>