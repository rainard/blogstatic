jQuery(document).ready(function($){
	$(document).on('click', '.expandable .expander', function(e){
        var parent = $(this).parent('li'),
            children = parent.children('.children,.sub-menu');
        if (children.length>0) {
            if (children.is(':visible')) {
                children.hide();
                parent.removeClass('expanded');
            } else {
                children.show();
                parent.addClass('expanded');
            }
        }
        
        e.preventDefault();
    });
	
	$(document).on('click', '.sidebar-toggler', function(e){
		var body = $('body');
		if (body.hasClass('sidebar-hidden')) {
			body.removeClass('sidebar-hidden');
		} else {
			body.addClass('sidebar-hidden');
		}
		e.preventDefault();
    });
    
    var sidebar = $(document).find('#sidebar');
    sidebar.find('ul.menu').addClass('expandable');
    sidebar.find('.expandable').find('.children,.sub-menu').each(function(){
        $(this).prev('a').before('<span class="expander"><i class="icon-caret-right"></i><i class="icon-caret-down"></i></span>').end().parent().addClass('has-children');
    })
})