<?php 
	global $resumo_fn_option, $post;
	
	if(has_nav_menu('main_menu')){
		$menu = wp_nav_menu( array('theme_location'  => 'main_menu','menu_class' => 'resumo_fn_main_nav', 'echo' => false, 'link_before' => '<span class="link">', 'link_after' => '</span>') );
	}else{
		$menu = '<ul class="resumo_fn_main_nav"><li><a href=""><span class="link">'.esc_html__('No menu assigned', 'resumo').'</span></a></li></ul>';
	}
	if(isset($resumo_fn_option['desktop_copyright__switcher']) && $resumo_fn_option['desktop_copyright__switcher'] == 'disabled'){
		$copyright = '';
	}else{
		if(isset($resumo_fn_option['desktop_copyright']) && $resumo_fn_option['desktop_copyright'] !== ''){
			$copyright = $resumo_fn_option['desktop_copyright'];
		}else{
			$linkS = '<a href="https://frenify.com/" target="_blank">';
			$linkE = '</a>';
			$copyright = sprintf( esc_html__( '%1$sDeveloped by Frenify%2$s', 'resumo' ), $linkS, $linkE );
		}
	}
	if($copyright != ''){
		$copyright = '<div class="desc"><p>'.$copyright.'</p></div>';
	}
?>

<div class="resumo_fn_navigation" role="dialog">
	<a href="#" class="closer"></a>

	<!-- Navigation Content -->
	<div class="nav_in">

		<nav id="nav">
			<div class="logo">
				<?php echo wp_kses(resumo_fn_get_logo('','desktop'), 'post'); ?>
			</div>
			<?php echo wp_kses($menu, 'post'); ?>
		</nav>

		<div class="nav_footer">
			<div class="social">
				<?php echo wp_kses(resumo_fn_getSocialList(),'post');?>
			</div>
			<div class="copyright">
				<?php echo wp_kses($copyright,'post');?>
			</div>
		</div>

	</div>
	<!-- /Navigation Content -->
	<div class="resumo_fn_searchpopup">
		<div class="search_inner">
			<div class="fn-container">
				<div class="search_box">
					<form action="<?php echo esc_url(home_url('/')); ?>" method="get" >
						<input type="text" placeholder="<?php esc_attr_e('Search anything...', 'resumo');?>" name="s" autocomplete="off" />
						<input type="submit" class="pe-7s-search" value="" />
						<span><?php echo wp_kses_post(resumo_fn_getSVG_theme('search-new'));?></span>
					</form>
					<h3><?php esc_html_e('Type your search terms and press enter.', 'resumo');?></h3>
				</div>
			</div>
		</div>
	</div>
	
</div>


<div class="resumo_fn_hidden more_cats">
 	<div class="resumo_fn_more_categories">
		<a href="#" data-more="<?php esc_attr_e('Show More','resumo'); ?>" data-less="<?php esc_attr_e('Show Less','resumo');?>">
			<span class="text"><?php esc_html_e('Show More','resumo'); ?></span>
			<span class="fn_count"></span>
		</a>
	</div>
</div>