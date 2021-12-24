jQuery(function($) {
	// 目次へ戻るボタン（スマホのみ）
	if( rtocBackButton.rtocBackButton == 'on' ){
		const ua = navigator.userAgent;
		if (ua.indexOf('iPhone') > -1 || (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)) {
			jQuery('body').append('<div id="rtoc_return"><a href="#rtoc-mokuji-wrapper">'+ rtocBackText.rtocBackText +'</a></div>');
			$('a[href^="#rtoc-mokuji-wrapper"]').click(function(){
				var speed = 400;
				var href= $(this).attr("href");
				var target = $(href == "#" || href == "" ? 'html' : href);
				var position = target.offset().top;
				$("html, body").animate({scrollTop:position}, speed, "swing");
				return false;
			});
		} else if (ua.indexOf('iPad') > -1 || ua.indexOf('Android') > -1) {
			return;
		} else {
			return;
		}
	}
	const back_button = document.querySelector('#rtoc_return');
	const back_button_link = document.querySelector('#rtoc_return a');

	if ( rtocButtonPosition.rtocButtonPosition == 'left' ){
		back_button.classList.add('back_button_left');
	} else if ( rtocButtonPosition.rtocButtonPosition == 'right' ){
		back_button.classList.add('back_button_right');
	}
	if ( rtocVerticalPosition.rtocVerticalPosition.length){
		console.log(rtocVerticalPosition.rtocVerticalPosition);
		back_button_link.style.bottom = rtocVerticalPosition.rtocVerticalPosition+'px';
	}
});
