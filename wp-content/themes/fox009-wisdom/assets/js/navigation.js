function navigationExtension(nav_expr) {
	navigation = jQuery(nav_expr)
	if(navigation.length==0){
		return;
	}
	button = navigation.children('button');
	menu = navigation.find('ul.menu');
	if(button.length==0 || menu.length==0){
		return;
	}
	menu.addClass('nav-menu');
	
	button.click({
			navigation:navigation, 
			button: button
		},
		function(event){
			navigation=event.data.navigation;
			button=event.data.button;
			navigation.toggleClass('toggled');
			button.attr('aria-expanded', button.attr('aria-expanded')=='true'?'false':'true');
		}
	);
	jQuery(document).on('click keydown keyup', {
			nav_expr: nav_expr,
			navigation: navigation,
			button: button
		},
		function(event){
			nav_expr=event.data.nav_expr;
			navigation=event.data.navigation;
			button=event.data.button;
			target=jQuery(event.target);
			if(target.parents(nav_expr).length==0){
				navigation.removeClass('toggled');
				button.attr('aria-expanded', 'false');
				navigation.find('.focus').removeClass('focus');
			}
		}
	);
	
	menu.find('li.menu-item-has-children').prepend('<span class="submenu-toggle fa fa-angle-down"></span>');
	menu.find('.submenu-toggle').click({
			navigation:navigation
		},
		function(event){
			navigation=event.data.navigation;
			isFocus=jQuery(event.target).parent().hasClass('focus');
			navigation.find('.focus').removeClass('focus');
			if(isFocus)
				jQuery(event.target).parents('.nav-menu li').removeClass('focus');
			else
				jQuery(event.target).parents('.nav-menu li').addClass('focus');
		}
	);
	
	menu.find('a').on('focus blur', {
			navigation:navigation
		},
		function(event){
			navigation=event.data.navigation;
			navigation.find('.focus').removeClass('focus');
			jQuery(event.target).parents('.nav-menu li').toggleClass('focus');
		}
	);
};

jQuery(document).ready(function(){
	navigationExtension('#main-navigation');
	navigationExtension('#main-navigation-mobile');
});
