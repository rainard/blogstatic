jQuery(document).ready(function($){
//up to top
$body=(window.opera)?(document.compatMode=="CSS1Compat"?$('html'):$('body')):$('html,body');
$(window).scroll(function(){
	if($(window).scrollTop()>=300){
		$('#oloUp').fadeIn(600);
	}else{
		$('#oloUp').fadeOut(600);
}});
$('#oloUp').click(function() {
	$body.animate({
		scrollTop: 0
	}, 600)
});

//add external link to entry a tag;
$('.oloEntry p a').each(function(){
    $self = $(this);
    if(!$self.has('img').length && !$self.hasClass('oloCopy')){
            $self.append('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#227EC0" fill-rule="evenodd" d="M19,14 L19,19 C19,20.1045695 18.1045695,21 17,21 L5,21 C3.8954305,21 3,20.1045695 3,19 L3,7 C3,5.8954305 3.8954305,5 5,5 L10,5 L10,7 L5,7 L5,19 L17,19 L17,14 L19,14 Z M18.9971001,6.41421356 L11.7042068,13.7071068 L10.2899933,12.2928932 L17.5828865,5 L12.9971001,5 L12.9971001,3 L20.9971001,3 L20.9971001,11 L18.9971001,11 L18.9971001,6.41421356 Z"/></svg>');
    }
});

 $('.svg-search').click(function(){
	$(this).toggleClass('active');
	$('#searchform').fadeToggle(250);
	setTimeout(function(){
		$('#searchform input').focus();
	}, 300);
});

 $('.qrcode').click(function(){
	$(this).toggleClass('active');
	$('.qrcodeimg').fadeToggle(250);
});
}); 