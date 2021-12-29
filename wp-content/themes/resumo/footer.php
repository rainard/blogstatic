<?php 
global $resumo_fn_option;



// magic cursor options
$magic_cursor 		= array();
if(isset($resumo_fn_option['magic_cursor'])){
	$magic_cursor 	= $resumo_fn_option['magic_cursor'];
}
$mcursor__count		= 0;
$mcursor__default 	= 'no';
$mcursor__link 		= 'no';
$mcursor__slider 	= 'no';
if(!empty($magic_cursor)){
	$mcursor__count = count($magic_cursor);
	foreach($magic_cursor as $key => $value) {
		if($value == 'default'){$mcursor__default 	= 'yes';}
		if($value == 'link'){$mcursor__link 		= 'yes';}
		if($value == 'slider'){$mcursor__slider 	= 'yes';}
	}
}
if(isset($_GET['remove_mcursor'])){
	$mcursor__count = 0;
}
if(isset($resumo_fn_option['footer_copyright__switcher']) && $resumo_fn_option['footer_copyright__switcher'] == 'disabled'){
	$copyright = '';
}else{
	if(isset($resumo_fn_option['footer_copyright']) && $resumo_fn_option['footer_copyright'] !== ''){
		$copyright = $resumo_fn_option['footer_copyright'];
	}else{
		$linkS = '<a class="fn__link" href="https://frenify.com/" target="_blank">';
		$linkE = '</a>';
		$br = '<br />';
		$copyright = sprintf( esc_html__( 'Copyright &copy; 2021. All rights reserved. %1$s Designed &amp; Developed by %2$sFrenify%3$s', 'resumo' ), $br,$linkS, $linkE );
	}
}
if($copyright != ''){
	$copyright = '<div class="desc"><p>'.$copyright.'</p></div>';
}
?>
					<footer id="footer">
						<div class="footer_top">
							<a href="#" class="resumo_fn_totop"><span></span></a>
						</div>
						<div class="footer_content">
							<div class="container">
								<?php echo wp_kses($copyright,'post');?>
							</div>
						</div>
					</footer>

				</div>
			</div>
		</div>
	</div>
	
	<?php if($mcursor__count > 0){ ?>
	<div class="frenify-cursor cursor-outer" data-default="<?php echo esc_attr($mcursor__default);?>" data-link="<?php echo esc_attr($mcursor__link);?>" data-slider="<?php echo esc_attr($mcursor__slider);?>"><span class="fn-cursor"></span></div>
	<div class="frenify-cursor cursor-inner" data-default="<?php echo esc_attr($mcursor__default);?>" data-link="<?php echo esc_attr($mcursor__link);?>" data-slider="<?php echo esc_attr($mcursor__slider);?>"><span class="fn-cursor"><span class="fn-left"></span><span class="fn-right"></span></span></div>
	<?php } ?>

</div>
<!-- HTML ends here -->


<?php wp_footer(); ?>
</body>
</html>