(function($){
	$(document).ready(function(){
		$('.customize-control-range-container').each(function(){
			container=$(this);
			range_id=container.attr('for');	
			text_id=range_id+'-text';
			reset_id=range_id+'-reset';
			
			$('#'+range_id).on('input propertychange',function(){
				range=$(this);
				if(range.is(':focus')){
					$('#'+range.attr('id')+'text').val(range.val);
				}
			});
			
			$('#'+text_id).on('input propertychange',function(){
				text=$(this);
				if(text.is(':focus')){
					$('#'+text.attr('for')).val(text.val);
				}
			});
			
			$('#'+reset_id).click(function(){
				reset=$(this);
				reset_default=reset.attr('default');
				range_id=reset.attr('for');
				text_id=range_id+'-text';
				$('#'+range_id).val(reset_default).change();
				$('#'+text_id).val(reset_default);
			});
		});
		
		customize_control_sortable_updata=function(container){
			selected_lis=container.find('.customize-control-sortable-item.selected');
			result_text='';
			for(var index=0;index<selected_lis.length;index++){
				if(index>0){
					result_text+=',';
				}
				result_text+=selected_lis.eq(index).attr('value');
			}
			container.parent().find('input').val(result_text).change();
		};
		$('.customize-control-sortable-container').each(function(){
			container=$(this);
			container.sortable({
				stop: function(event, ui) {
					container=$(event.target);
					customize_control_sortable_updata(container);
				}
			});
			container.find('.item-selecte').click(function(){
				$(this).parent().toggleClass('selected');
				customize_control_sortable_updata($(this).parents('.customize-control-sortable-container'));
			});
		});
	});
	
}(jQuery));