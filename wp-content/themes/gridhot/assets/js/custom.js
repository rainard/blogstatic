jQuery(document).ready(function($) {
    'use strict';

    if(gridhot_ajax_object.secondary_menu_active){
        $(".gridhot-nav-secondary .gridhot-secondary-nav-menu").addClass("gridhot-secondary-responsive-menu");

        $( ".gridhot-secondary-responsive-menu-icon" ).on( "click", function() {
            $(this).next(".gridhot-nav-secondary .gridhot-secondary-nav-menu").slideToggle();
        });

        $(window).on( "resize", function() {
            if(window.innerWidth > 1112) {
                $(".gridhot-nav-secondary .gridhot-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridhot-secondary-responsive-menu > li").removeClass("gridhot-secondary-menu-open");
            }
        });

        $( ".gridhot-secondary-responsive-menu > li" ).on( "click", function(event) {
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-secondary-menu-open");
            $(this).find(".children:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-secondary-menu-open");
        });

        $( "div.gridhot-secondary-responsive-menu > ul > li" ).on( "click", function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-secondary-menu-open");
        });
    }

    if(gridhot_ajax_object.primary_menu_active){
        $(".gridhot-nav-primary .gridhot-primary-nav-menu").addClass("gridhot-primary-responsive-menu");

        $( ".gridhot-primary-responsive-menu-icon" ).on( "click", function() {
            $(this).next(".gridhot-nav-primary .gridhot-primary-nav-menu").slideToggle();
        });

        $(window).on( "resize", function() {
            if(window.innerWidth > 1112) {
                $(".gridhot-nav-primary .gridhot-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridhot-primary-responsive-menu > li").removeClass("gridhot-primary-menu-open");
            }
        });

        $( ".gridhot-primary-responsive-menu > li" ).on( "click", function(event) {
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-primary-menu-open");
            $(this).find(".children:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-primary-menu-open");
        });

        $( "div.gridhot-primary-responsive-menu > ul > li" ).on( "click", function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridhot-submenu-toggle').parent().toggleClass("gridhot-primary-menu-open");
        });
    }

    if($(".gridhot-header-social-icon-search").length){
        $(".gridhot-header-social-icon-search").on('click', function (e) {
            e.preventDefault();
            //document.getElementById("gridhot-search-overlay-wrap").style.display = "block";
            $("#gridhot-search-overlay-wrap").fadeIn();
            const gridhot_focusableelements = 'button, [href], input';
            const gridhot_search_modal = document.querySelector('#gridhot-search-overlay-wrap');
            const gridhot_firstfocusableelement = gridhot_search_modal.querySelectorAll(gridhot_focusableelements)[0];
            const gridhot_focusablecontent = gridhot_search_modal.querySelectorAll(gridhot_focusableelements);
            const gridhot_lastfocusableelement = gridhot_focusablecontent[gridhot_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === gridhot_firstfocusableelement) {
                  gridhot_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === gridhot_lastfocusableelement) {
                  gridhot_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            gridhot_firstfocusableelement.focus();
        });
    }

    if($(".gridhot-search-closebtn").length){
        $(".gridhot-search-closebtn").on('click', function (e) {
            e.preventDefault();
            //document.getElementById("gridhot-search-overlay-wrap").style.display = "none";
            $("#gridhot-search-overlay-wrap").fadeOut();
        });
    }

    if(gridhot_ajax_object.fitvids_active){
        $(".entry-content, .widget").fitVids();
    }

    if(gridhot_ajax_object.backtotop_active){
        if($(".gridhot-scroll-top").length){
            var gridhot_scroll_button = $( '.gridhot-scroll-top' );
            gridhot_scroll_button.hide();

            $( window ).on( "scroll", function() {
                if ( $( window ).scrollTop() < 20 ) {
                    $( '.gridhot-scroll-top' ).fadeOut();
                } else {
                    $( '.gridhot-scroll-top' ).fadeIn();
                }
            } );

            gridhot_scroll_button.on( "click", function() {
                $( "html, body" ).animate( { scrollTop: 0 }, 300 );
                return false;
            } );
        }
    }

    // grab the initial top offset of the navigation 
    var gridhotstickyheadertop = $('#gridhot-header-end').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var gridhotstickyheader = function(){
        var gridhotscrolltop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(window.innerWidth > 1112) {
            if (gridhotscrolltop > gridhotstickyheadertop) {
                $('.gridhot-site-header').addClass('gridhot-fixed');
            } else {
                $('.gridhot-site-header').removeClass('gridhot-fixed');
            }
        }
    };

    gridhotstickyheader();
    // and run it again every time you scroll
    $(window).on( "scroll", function() {
        gridhotstickyheader();
    });

    if(gridhot_ajax_object.sticky_sidebar_active){
        $('.gridhot-main-wrapper, .gridhot-sidebar-one-wrapper').theiaStickySidebar({
            containerSelector: ".gridhot-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });

        $(window).on( "resize", function() {
            $('.gridhot-main-wrapper, .gridhot-sidebar-one-wrapper').theiaStickySidebar({
                containerSelector: ".gridhot-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 960,
            });
        });
    }

});