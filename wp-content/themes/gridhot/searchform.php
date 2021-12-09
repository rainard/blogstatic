<?php
/**
* The file for displaying the search form
*
* @package GridHot WordPress Theme
* @copyright Copyright (C) 2021 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="gridhot-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="gridhot-sr-only"><?php echo esc_html_x( 'Search for:', 'label', 'gridhot' ); ?></span>
    <input type="search" class="gridhot-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'gridhot' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="gridhot-search-submit" value="<?php echo esc_attr_x( '&#xf002;', 'submit button', 'gridhot' ); ?>" />
</form>