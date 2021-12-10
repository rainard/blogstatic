=== BootsPress ===
Contributors: krusze
Requires at least: 4.7
Tested up to: 5.8
Requires PHP: 5.6
Stable tag: 0.9.2.1
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A starter theme called BootsPress. BootsPress is a WordPress theme allowing you to create any type of website you want.

== Description ==

Hi. I'm a starter theme called BootsPress. I'm a theme which combines the world’s most popular front-end open source toolkit called Bootstrap with open source software which you can use to create a beautiful website called WordPress. You can use me as a Parent Theme or hack me and try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

Here are some interesting things you'll find here:

* Theme that looks great on any device and allow you to create any type of website you want.
* A just right amount of simple, well-commented, modern, responsive, HTML5 templates.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Bootstrap CSS and JS files enqueued.
* A custom header implementation in `inc/custom-header.php`.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and prevent code duplication.
* Some small code tweaks in `inc/template-functions.php` which enhance the theme.
* 3 page templates: full width, full width without container and left-sidebar.
* Support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php` and styling override woocommerce.css.
* Licensed under GPLv2 or later so you can use it to make something cool :)

For a live demo go to https://bootspress.com

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

BootsPress includes support for WooCommerce and for Infinite Scroll in Jetpack.

= Need a helping hand with theme? =

If you have any questions, suggestions, bug reports or feature requests feel free to visit 
https://bootspress.com or [support forum] (https://wordpress.org/support/theme/bootspress).

== Changelog ==

= 1.0 - October 04 2021 =
* Initial release

== Credits ==

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* Bootstrap https://getbootstrap.com/, (C) 2011–2021 the [Bootstrap Authors](https://github.com/twbs/bootstrap/graphs/contributors) and [Twitter, Inc.](https://twitter.com) Code released under the [MIT License](https://github.com/twbs/bootstrap/blob/main/LICENSE)
* WP Bootstrap Navwalker v4.3.0 https://github.com/wp-bootstrap/wp-bootstrap-navwalker, Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz, [GPL-3.0+](https://www.gnu.org/licenses/gpl-3.0.txt)

== Changelog ==

= 0.9.2.1 - 16.11.2021 =
* Bugfix : Remove doubled menu_id from wp_nav_menu in header.php
* Changed : Minor CSS fixes.

= 0.9.2 - 12.11.2021 =
* Bugfix : Correct file path to skip-link-focus-fix.js in bootspress_skip_link_focus_fix.
* Bugfix : Validate readme.txt file using validator here: https://wordpress.org/plugins/developers/readme-validator/.
* Bugfix : Added footer menu location to footer-widgets.php.
* Changed : Added starter content. Now theme requires at least WP 4.7.
* Changed : Added `back compat` functionality.
* Changed : Modify screenshot.png to show how theme looks when starter content is applied.
* Changed : Move bootstrap, images and js folders to newly created assets folder.
* Changed : Load bootstrap.css before style.css.
* Changed : Remove prefix from bootstrap css and js scripts because these are 3rd-party framework scripts.
* Changed : Minor CSS fixes.

= 0.9.1.1 - 02.11.2021 =
* Bugfix : Added neccessary styles for page, product templates full width and full width without container. Fix get template part on page templates full width and full width without container.
* Changed : Some CSS modifications: captions and media; move WP Bootstrap Navwalker to the end; set margin for entry-content, entry-summary and page-content; remove underline from buttons.
* Changed : Modify screenshot.png size to 1200x900.

= 0.9.1 - 26.10.2021 =
* Bugfix : Now skip link moves to #primary area. Added function bootspress_skip_link_focus_fix. Skip link: is the first focusable element perceived by a user via a screen reader or keyboard navigation; is visible when keyboard focus moves to the link; move focus to the main content area of the page when activated. 
* Bugfix : Provide visual keyboard focus highlighting in dropdown navigation menu. Drop down menus are available when tabbing (using keyboard only).
* Bugfix : Provide a unique prefix for function bootspress_bs5_dropdown_data_attribute.
* Changed : Added some CSS for skip links.
* Changed : Leave only one link in sidebar colophon.
* Changed : Upgrade Bootstrap from 5.1.2 to 5.1.3.
* Changed : Upgrade class WP_Bootstrap_Navwalker.
* Changed : Modify Theme URI and author URI webpages. These websites have now informationa about the theme and theme author.

= 0.9.0 - 22.10.2021 =
* Initial release.
