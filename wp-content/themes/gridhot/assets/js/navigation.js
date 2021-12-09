/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
    var gridhot_secondary_container, gridhot_secondary_button, gridhot_secondary_menu, gridhot_secondary_links, gridhot_secondary_i, gridhot_secondary_len;

    gridhot_secondary_container = document.getElementById( 'gridhot-secondary-navigation' );
    if ( ! gridhot_secondary_container ) {
        return;
    }

    gridhot_secondary_button = gridhot_secondary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridhot_secondary_button ) {
        return;
    }

    gridhot_secondary_menu = gridhot_secondary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridhot_secondary_menu ) {
        gridhot_secondary_button.style.display = 'none';
        return;
    }

    gridhot_secondary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridhot_secondary_menu.className.indexOf( 'nav-menu' ) ) {
        gridhot_secondary_menu.className += ' nav-menu';
    }

    gridhot_secondary_button.onclick = function() {
        if ( -1 !== gridhot_secondary_container.className.indexOf( 'gridhot-toggled' ) ) {
            gridhot_secondary_container.className = gridhot_secondary_container.className.replace( ' gridhot-toggled', '' );
            gridhot_secondary_button.setAttribute( 'aria-expanded', 'false' );
            gridhot_secondary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridhot_secondary_container.className += ' gridhot-toggled';
            gridhot_secondary_button.setAttribute( 'aria-expanded', 'true' );
            gridhot_secondary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridhot_secondary_links    = gridhot_secondary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridhot_secondary_i = 0, gridhot_secondary_len = gridhot_secondary_links.length; gridhot_secondary_i < gridhot_secondary_len; gridhot_secondary_i++ ) {
        gridhot_secondary_links[gridhot_secondary_i].addEventListener( 'focus', gridhot_secondary_toggleFocus, true );
        gridhot_secondary_links[gridhot_secondary_i].addEventListener( 'blur', gridhot_secondary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridhot_secondary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridhot-focus' ) ) {
                    self.className = self.className.replace( ' gridhot-focus', '' );
                } else {
                    self.className += ' gridhot-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridhot_secondary_container ) {
        var touchStartFn, gridhot_secondary_i,
            parentLink = gridhot_secondary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridhot_secondary_i;

                if ( ! menuItem.classList.contains( 'gridhot-focus' ) ) {
                    e.preventDefault();
                    for ( gridhot_secondary_i = 0; gridhot_secondary_i < menuItem.parentNode.children.length; ++gridhot_secondary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridhot_secondary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridhot_secondary_i].classList.remove( 'gridhot-focus' );
                    }
                    menuItem.classList.add( 'gridhot-focus' );
                } else {
                    menuItem.classList.remove( 'gridhot-focus' );
                }
            };

            for ( gridhot_secondary_i = 0; gridhot_secondary_i < parentLink.length; ++gridhot_secondary_i ) {
                parentLink[gridhot_secondary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridhot_secondary_container ) );
} )();


( function() {
    var gridhot_primary_container, gridhot_primary_button, gridhot_primary_menu, gridhot_primary_links, gridhot_primary_i, gridhot_primary_len;

    gridhot_primary_container = document.getElementById( 'gridhot-primary-navigation' );
    if ( ! gridhot_primary_container ) {
        return;
    }

    gridhot_primary_button = gridhot_primary_container.getElementsByTagName( 'button' )[0];
    if ( 'undefined' === typeof gridhot_primary_button ) {
        return;
    }

    gridhot_primary_menu = gridhot_primary_container.getElementsByTagName( 'ul' )[0];

    // Hide menu toggle button if menu is empty and return early.
    if ( 'undefined' === typeof gridhot_primary_menu ) {
        gridhot_primary_button.style.display = 'none';
        return;
    }

    gridhot_primary_menu.setAttribute( 'aria-expanded', 'false' );
    if ( -1 === gridhot_primary_menu.className.indexOf( 'nav-menu' ) ) {
        gridhot_primary_menu.className += ' nav-menu';
    }

    gridhot_primary_button.onclick = function() {
        if ( -1 !== gridhot_primary_container.className.indexOf( 'gridhot-toggled' ) ) {
            gridhot_primary_container.className = gridhot_primary_container.className.replace( ' gridhot-toggled', '' );
            gridhot_primary_button.setAttribute( 'aria-expanded', 'false' );
            gridhot_primary_menu.setAttribute( 'aria-expanded', 'false' );
        } else {
            gridhot_primary_container.className += ' gridhot-toggled';
            gridhot_primary_button.setAttribute( 'aria-expanded', 'true' );
            gridhot_primary_menu.setAttribute( 'aria-expanded', 'true' );
        }
    };

    // Get all the link elements within the menu.
    gridhot_primary_links    = gridhot_primary_menu.getElementsByTagName( 'a' );

    // Each time a menu link is focused or blurred, toggle focus.
    for ( gridhot_primary_i = 0, gridhot_primary_len = gridhot_primary_links.length; gridhot_primary_i < gridhot_primary_len; gridhot_primary_i++ ) {
        gridhot_primary_links[gridhot_primary_i].addEventListener( 'focus', gridhot_primary_toggleFocus, true );
        gridhot_primary_links[gridhot_primary_i].addEventListener( 'blur', gridhot_primary_toggleFocus, true );
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function gridhot_primary_toggleFocus() {
        var self = this;

        // Move up through the ancestors of the current link until we hit .nav-menu.
        while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

            // On li elements toggle the class .focus.
            if ( 'li' === self.tagName.toLowerCase() ) {
                if ( -1 !== self.className.indexOf( 'gridhot-focus' ) ) {
                    self.className = self.className.replace( ' gridhot-focus', '' );
                } else {
                    self.className += ' gridhot-focus';
                }
            }

            self = self.parentElement;
        }
    }

    /**
     * Toggles `focus` class to allow submenu access on tablets.
     */
    ( function( gridhot_primary_container ) {
        var touchStartFn, gridhot_primary_i,
            parentLink = gridhot_primary_container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

        if ( 'ontouchstart' in window ) {
            touchStartFn = function( e ) {
                var menuItem = this.parentNode, gridhot_primary_i;

                if ( ! menuItem.classList.contains( 'gridhot-focus' ) ) {
                    e.preventDefault();
                    for ( gridhot_primary_i = 0; gridhot_primary_i < menuItem.parentNode.children.length; ++gridhot_primary_i ) {
                        if ( menuItem === menuItem.parentNode.children[gridhot_primary_i] ) {
                            continue;
                        }
                        menuItem.parentNode.children[gridhot_primary_i].classList.remove( 'gridhot-focus' );
                    }
                    menuItem.classList.add( 'gridhot-focus' );
                } else {
                    menuItem.classList.remove( 'gridhot-focus' );
                }
            };

            for ( gridhot_primary_i = 0; gridhot_primary_i < parentLink.length; ++gridhot_primary_i ) {
                parentLink[gridhot_primary_i].addEventListener( 'touchstart', touchStartFn, false );
            }
        }
    }( gridhot_primary_container ) );
} )();