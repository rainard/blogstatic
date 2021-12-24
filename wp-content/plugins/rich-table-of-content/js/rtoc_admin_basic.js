// jQuery(function($) {
// 	function SetStateBasic(){
// 		const rtocSvgLeft = '<svg class="rtoc_left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.89 8.93"><defs><style>.cls-1{fill:none;stroke:#707070;stroke-linecap:round;stroke-miterlimit:10;stroke-width:0.5px;}</style></defs><g><g><g><line class="cls-1" x1="0.25" y1="0.9" x2="8.03" y2="8.68"/><line class="cls-1" x1="6.37" y1="0.25" x2="9.64" y2="5.9"/></g></g></g></svg>';
// 		const rtocSvgRight = '<svg class="rtoc_right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.91 8.93"><defs><style>.cls-1,.cls-2{fill:none;stroke:#707070;stroke-linecap:round;stroke-width:0.5px;}</style></defs><g><g><g><line class="cls-1" x1="9.66" y1="0.9" x2="1.87" y2="8.68"/><line class="cls-2" x1="3.51" y1="0.25" x2="0.25" y2="5.9"/></g></g></g></svg>';
// 		addon_switch = $("#rtoc_addon_switch_on:checked").prop("checked");
// 		if (addon_switch == true) {
// 			$('#rtoc-mokuji-wrapper').addClass('addon_on');
// 			$('#rtoc-mokuji-wrapper').removeClass('addon_off');
// 			if ( $('#rtoc-mokuji-wrapper .rtoc-mokuji.level-1').hasClass('addon6') ){
// 				$('#rtoc-mokuji-title.addon6_title span').prepend(rtocSvgLeft);
// 				$('#rtoc-mokuji-title.addon6_title span').append(rtocSvgRight);
// 			}
// 		}
// 		addon_switch = $("#rtoc_addon_switch_off:checked").prop("checked");
// 		if (addon_switch == true) {
// 			$('#rtoc-mokuji-wrapper').addClass('addon_off');
// 			$('#rtoc-mokuji-wrapper').removeClass('addon_on');
// 			$('#rtoc-mokuji-title.addon6_title span svg').remove();
// 			$('#rtoc-mokuji-title.addon6_title span svg').remove();
// 		}
// 	}
// 	$(document).ready(function () {
// 		SetStateBasic();
// 		$("*[name='rtoc_addon_switch']").click(function(){SetStateBasic();})
// 	});
// });
