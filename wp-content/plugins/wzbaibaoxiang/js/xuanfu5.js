jQuery(document).ready(function($){
    $(".websitebox_top").on("click", function() {
        console.log(11)
        $("html, body").animate({
            scrollTop: 0
        }, 400);
        return false;
    })
$(function () {
     var right_nav = $(".websitebox_right_nav")
     if(right_nav) {
         return
     }
    var offset_top = $('.websitebox_right_nav').offset().top; 
    var begin = 0,
       end = 0,
       timer = null;
    $('.websitebox_right_nav li:last').hide(); 

    $(window).scroll(function (evt) {
       clearInterval(timer);
       var scroll_top = $(window).scrollTop();
       end = offset_top + scroll_top;
       scroll_top > 100 ? $('.websitebox_right_nav li:last').fadeIn() : $('.websitebox_right_nav li:last').fadeOut(); 

       timer = setInterval(function () { 
          begin = begin + (end - begin) * 0.2;
          if (Math.round(begin) === end) {
             clearInterval(timer);
          }
       }, 10);
    });
 });
 var right_nav = $(".websitebox_right_nav");
 var tempS;
 $(".websitebox_right_nav").hover(function () {
       var thisObj = $(this);
       tempS = setTimeout(function () {
          thisObj.find("li").each(function (i) {
             var tA = $(this);
             setTimeout(function () {
                tA.animate({
                   right: "0"
                }, 200);
             }, 50 * i);
          });
       }, 200);
    },
    function () {
       if (tempS) {
          clearTimeout(tempS);
       }
       $(this).find("li").each(function (i) {
          var tA = $(this);
          setTimeout(function () {
             tA.animate({
                right: "-70"
             }, 200, function () {});
          }, 50 * i);
       });
    });
 $(".websitebox_right_nav li").each(function (i) {
    if (i == 0 || i == 1 || i == 2 || i==3 || i==4) {
       $(this).mouseover(function () {
          $(this).children(".websitebox_hideBox").stop().fadeIn();
          right_nav.css('overflow', 'visible')
       });
       $(this).mouseout(function () {
          $(this).children(".websitebox_hideBox").hide();
          right_nav.css('overflow', 'hidden')
       });
    } 
 })
})