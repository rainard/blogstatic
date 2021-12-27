
(function($){
	$(document).scroll(function(){
		if($(this).scrollTop() > 200) {
			$('.skip-to-top').fadeIn();
		} else {
			$('.skip-to-top').fadeOut();
		}
	});

	$('.skip-to-top').click(function(){
		$('html,body').animate({scrollTop : 0},600);
		return false;
	});
}(jQuery));