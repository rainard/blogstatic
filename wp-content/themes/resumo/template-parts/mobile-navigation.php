<?php 
	global $resumo_fn_option, $post;



	$mobMenuOpen 				= 'disable';
	$mobileHambClass			= '';
	$mobileActiveClass			= '';
	$mobileMenuDisplay			= 'none';
	if(isset($resumo_fn_option['mobile_menu_open_default'])){
		$mobMenuOpen	 		= $resumo_fn_option['mobile_menu_open_default'];
		if($mobMenuOpen == 'enable'){
			$mobileMenuDisplay	= 'block';
			$mobileHambClass	= 'is-active';
		}
	}
?>
   
<!-- MOBILE MENU -->
<div class="resumo_fn_mobilemenu_wrap">


	<!-- LOGO & HAMBURGER -->
	<div class="logo_hamb">
		<div class="in">
			<div class="menu_logo">
				<?php echo wp_kses(resumo_fn_get_logo('','mobile'), 'post'); ?>
			</div>
			<?php if(has_nav_menu('mobile_menu')){ ?>
				<a href="#" class="ham_wrapper">
					<div class="hamburger hamburger--collapse-r <?php echo esc_attr($mobileHambClass);?>">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
	<!-- /LOGO & HAMBURGER -->

	<!-- MOBILE DROPDOWN MENU -->
	<?php if(has_nav_menu('mobile_menu')){ ?>
		<div class="mobilemenu <?php echo esc_attr($mobileActiveClass);?>" style="display: <?php echo esc_attr($mobileMenuDisplay);?>">
			<?php wp_nav_menu(  array('theme_location'  => 'mobile_menu','menu_class' => 'vert_menu_list nav_ver','menu_id' => 'vert_menu_list') ); ?>
		</div>
	<?php } ?>
	<!-- /MOBILE DROPDOWN MENU -->

</div>
<!-- /MOBILE MENU -->