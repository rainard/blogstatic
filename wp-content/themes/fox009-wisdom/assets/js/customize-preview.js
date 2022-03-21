
(function($){
	wp.customize('fox009_wisdom_container_layout', function(obj){
		obj.bind(function(val){
			if(val=='full'){
				$('.container').css('max-width', 'unset');
			}else{
				$('.container').css('max-width', wp.customize._value.fox009_wisdom_container_max_width()+'px');
			}
		});
	});
	
	wp.customize('fox009_wisdom_container_max_width', function(obj){
		obj.bind(function(val){
			if(wp.customize._value.fox009_wisdom_container_layout()=='limit'){
				$('.container').css('max-width', val+'px');
			}
		});
	});

	wp.customize('fox009_wisdom_primary_color', function(obj){
		obj.bind(function(val){
			$(':root').css('--primary-color',val);
			$(':root').css('--primary-color-rgb',
				parseInt('0x' + val.slice(1, 3)) + ',' + parseInt('0x' + val.slice(3, 5)) + ',' + parseInt('0x' + val.slice(5, 7)));
		});
	});
	
	wp.customize('fox009_wisdom_font_size', function(obj){
		obj.bind(function(val){
			$(':root').css('font-size',val+'px');
		});
	});
	
	wp.customize('fox009_wisdom_sidebar_width', function(obj){
		obj.bind(function(val){
			$(':root').css('--primary-column-width',(100-val)+'%');
			$(':root').css('--sidebar-column-width',val+'%');
		});
	});
	
	wp.customize('fox009_wisdom_button_color', function(obj){
		obj.bind(function(val){
			$(':root').css('--button-color',val);
		});
	});
	
	wp.customize('fox009_wisdom_button_border_radius', function(obj){
		obj.bind(function(val){
			$(':root').css('--button-border-radius',val+'px');
		});
	});
	
	wp.customize('blogname', function(obj){
		obj.bind(function(val){
			$('.site-title a').text(val);
		});
	});
	
	wp.customize('blogdescription', function(obj){
		obj.bind(function(val){
			$('.site-description').text(val);
		});
	});
	
	wp.customize('fox009_wisdom_site_title_font_size', function(obj){
		obj.bind(function(val){
			$('.site-branding .site-title').css('font-size', val+'rem');
		});
	});
	
	wp.customize('fox009_wisdom_main_menu_transform', function(obj){
		obj.bind(function(val){
			$('.main-navigation .menu a').css('text-transform', val);
		});
	});
		
	wp.customize('fox009_wisdom_main_menu_padding', function(obj){
		obj.bind(function(val){
			$('.main-navigation .menu > li').css('padding', '0 '+val+'px');
		});
	});
	
	wp.customize('fox009_wisdom_main_menu_text', function(obj){
		obj.bind(function(val){
			$('.main-navigation button').text(val);
		});
	});
	
	wp.customize('fox009_wisdom_archive_excerpt_lines', function(obj){
		obj.bind(function(val){
			$('.main-content.posts .post-summary').css('-webkit-line-clamp', val);
		});
	});
	
	wp.customize('fox009_wisdom_archive_read_more', function(obj){
		obj.bind(function(val){
			$('.read-more-text').text(val);
		});
	});
	
	wp.customize('fox009_wisdom_custom_copyright_text', function(obj){
		obj.bind(function(val){
			$('.copyright h2').html(val);
		});
	});
	

	
}(jQuery));
