(function($){
	$(document).ready(function(){
		$('article .read-more').each(function() {
			$(this).click(function(){
				article = $(this).parents('article');
				if(article.find('.post-full').html() == ''){
					var id = article.attr('id').substring(5);
					if(/^\d+$/.test(id)) {
						$.post(
							'',
							{
								id: id,
								action: 'post_full',
								time: (new Date()).getTime()
							},
							function(data){
								article = $('#post-'+data.id);
								article.find('.post-intro').hide();
								article.find('.post-full').html(data.content).show();
								article.find('.show-intro').show();
							},
							'json'
						);
					}
				}else{
					article.find('.post-intro').hide();
					article.find('.post-full').show();
					article.find('.show-intro').show();
				}

				return false;
			});

		});
		
		$('article .show-intro a').each(function() {		
			$(this).click(function(){
				article = $(this).parents('article');
				article.find('.post-intro').show();
				article.find('.post-full').hide();
				article.find('.show-intro').hide();
				if(article.offset().top<$(document).scrollTop()){
					$(document).scrollTop(article.offset().top-150);
				}
				return false;
			});
		});
	});
}(jQuery));


/*			var id = $(this).attr('id').substring(5);
			if(/^\d+$/.test(id)) {
				
			}*/