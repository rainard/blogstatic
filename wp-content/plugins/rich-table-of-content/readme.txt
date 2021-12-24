=== Rich Table of Contents ===
Contributors:ryota0101
Donate link: https://croover.co.jp/
Tags: Table of Contents,toc,cms,indexes,navigation,contents
Requires at least: WordPress 5.3.2
Tested up to: WordPress 5.8
Requires PHP: PHP 7.0
Stable tag: 1.2.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

RTOC is a table of contents generation plugin from Japan that allows anyone to easily create a table of contents. Equipped with the functions of the conventional table of contents plugin, it is designed to thoroughly pursue design and ease of use.

== Description ==
<span style="font-size: 16px;">RTOC is a table of contents generation plugin from Japan that allows anyone to easily create a table of contents. Equipped with the functions of the conventional table of contents plugin, it is designed to thoroughly pursue design and ease of use.
Introducing a real-time preview with an intuitive UI design allows you to create an ideal table of contents with a single button.It is definitely a plus factor for your blog or site.RTOC is easy to use, so please use it.</span>


<h3>Install</h3>
<p>【How to automatically install from the WordPress admin screen】<br>
	①Click "Plugins" → "Add New" from the WordPress administration screen.<br>
	②Type "Rich Table of Contents" in the new search box.<br>③Activate after installation
</p>
<br/>
<p>【How to install manually using FTP etc.】<br>
①Download this plugin from WordPress.org（There is a button called "Download" on the right side of the plugin title on this page, so download from there）<br>②Unzip the zip file called "rich-table-of-content" and download it to the / wp-content / plugins / directory.<br>③Click the plugin from the WordPress administration screen and click Activate.</p>

###Basic settings
<font size="2">Configure the basic settings for the table of contents.</font>
<ul>
	<li>Table of contents title: You can freely decide the title of the table of contents.</li>
	<li>Auto insert for the following content types: You can decide whether to show the table of contents on posts and pages.</li>
	<li>Heading to be displayed: Set which heading (h2, h3, h4) to display.</li>
	<li>Display conditions: Set the number of headings to display the table of contents.</li>
	<li>Font: Set font.</li>
</ul>


###Design settings
<font size="2">You can freely set the table of contents design.</font>
<ul>
	<li>Title display: Set whether the title position is left or center.</li>
	<li>H2 list design: Set the H2 list design.</li>
	<li>H3 list design: Set the H3 list design.</li>
	<li>Frame design: Sets the table of contents frame design.</li>
	<li>Animation: Set the animation when the table of contents is displayed。</li>
	<li>Smooth scroll	: Set whether to scroll to the headline when clicking (tapping) the table of contents.</li>
</ul>

###Preset color settings
<font size="2">RTOC color preset added by default. Choose and set the preset that suits your site.</font>

###Color settings(For advanced users)
<font size="2">In addition to the preset colors, you can set your own colors. If you want to set your own color or modify the preset color partially, please change the color here.</font>
<ul>
	<li>Title color: Set the title color.</li>
	<li>Text color: Set the text color.</li>
	<li>Back color: Set the back color.</li>
	<li>Border color: Set the border color.</li>
	<li>H2 list color: Set the H2 list color.</li>
	<li>H3 list color: Set the H3 list color.</li>
	<li>Back to table of contents button background color: Sets the background color of the back to table of contents button.（Available only when Back to Contents button is enabled）</li>
</ul>

###Advanced settings
<font size="2">If you want to do advanced customization such as the button to return to the table of contents and the exclusion of plugin CSS, please set here.</font>
<ul>
	<li>Button to return to table of contents: (Only for smartphones) Display a button to return to the table of contents.</li>
	<li>Button location to return to table of contents: (Only for smartphones) You can set the button to return to the table of contents to the left or right.</li>
	<li>Up and down adjustment of the button to return to the table of contents: （example -20,40）</li>
	<li>Excluded post ID: You can set posts that you do not want to show the table of contents. Set the table of contents not to be displayed in the article by entering the post article ID separated by commas.（Example 2,3,75）</li>
	<li>Excluded page ID: You can set pages that you do not want to display the table of contents. By entering page IDs separated by commas, you can set the table of contents not to be displayed in articles.（Example 4,6,91）</li>
	<li>Default table of contents settings: Select whether to display the table of contents open or closed.</li>
	<li>Do not load plugin CSS: If checked, all CSS of RTOC will not be read and all design settings will be invalid. If you have customized the table of contents using CSS, JS, etc., please check here and operate.</li>
</ul>

###RTOC shortcode
You can display the table of contents by pasting this code anywhere in the article. If you do not enter a value (such as title = "") and it is blank, the setting on the management screen will be reflected.
For details, see the actual setting screen, so check that.

###Help
Here is a list of items that you should check if you have any questions about basic settings or have any problems.
Here we will add the content you received in the WordPress forum, so if you have any questions or have any problems, please contact us from the WordPress forum.


== Installation ==

<p>【How to automatically install from the WordPress admin screen】<br>
	①Click "Plugins" → "Add New" from the WordPress administration screen.<br>
	②Type "Rich Table of Contents" in the new search box.<br>③Activate after installation
</p>
<br/>
<p>【How to install manually using FTP etc.】<br>
①Download this plugin from WordPress.org（There is a button called "Download" on the right side of the plugin title on this page, so download from there）<br>②Unzip the zip file called "rich-table-of-content" and download it to the / wp-content / plugins / directory.<br>③Click the plugin from the WordPress administration screen and click Activate.</p>

== Changelog ==

= 1.0 =
First Release.

= 1.0.1 =
The version has been upgraded with minor corrections!

= 1.0.2 =
The version has been upgraded with minor corrections!

= 1.0.3 =
＜Corrected item＞
・[JIN only] Fixed the problem that characters written in the category disappeared
・Fixed the problem that the heading icon short code was displayed
・Fixed an issue that short code is not displayed when SPACE is included
・Fixed an issue where pasting a shortcode into a tracking widget was not reflected
・Fixed the problem that it is not displayed correctly only with '(' and '['
・Fixed display bug on IE and EDGE

= 1.0.4 =
＜Corrected item＞
・Fixed an issue where footer copyright display was broken by affinger
・Fixed an issue where the $ hook string was exposed on the admin screen
・Fixed an issue where a line break on a text editor would cause the line break to disappear even if the line was saved on a text editor.
・Fixed the problem that the set id is deleted when the id is set in the headline
┗The problem of IDs being deleted in the table of contents created with shortcodes continues.
・Fixed the problem that the top article disappears if RTOC is included when the fixed top page is set in "AFFINGER management"> "Top page" in affinger5

= 1.0.5 =
＜Corrected item＞
・fixed HTML structure of table of contents is broken
・Fixed a problem where the table of contents is displayed on a page even if the display check is removed.
・Fixed a problem where id is lost if id is set to a heading when a shortcode is used to generate a table of contents.
・Adding Help Items
・Correction of typos and omissions in the management screen.

= 1.0.6 =
＜Corrected item＞
・Fixed a problem where the "Back to Table of Contents" button is displayed even if there is no table of contents.

= 1.0.9 =
＜Corrected item＞
・Confirmed support for WordPress 5.4


= 1.1.0 =
＜Added item＞
・Added translation files to support English and Japanese.

= 1.1.2 =
＜Corrected item＞
・Corrected a typo in the management screen.

= 1.1.4 =
＜Corrected item＞
・Fixed a problem with HTML anchors in headings that caused the headings to jump to other headings when the table of contents was clicked.
・Fixed a problem where the design is not reflected when the headline design is customized. (Only font size is supported.)
・Fixed a problem that does not work even if you put RTOC in the sidebar follow widget and click it on the category page.
・Fixed the problem of links not jumping on category pages.
・Fixed a problem in which the ad above the first heading of JIN is displayed on the table of contents when the table of contents is set above the heading when using RTOC. (JIN only)

＜Added item＞
・Added an item that can change the text of the Back to Table of Contents button.
・Added an item that can change the text of the open/close button.

= 1.1.6 =
＜Corrected item＞
・Fixed a problem with the first heading.
・Fixed a problem with shortcode headings not jumping.

= 1.1.7 =
＜Corrected item＞
・Fixed a problem with a count() error when adding headings to a category page.
・Fixed an issue where IDs are not given for the first heading and you can't jump from the table of contents.

= 1.1.9 =
＜Corrected item＞
・Fixed an issue where an article created in Gutenberg and edited in Classic Editor does not scroll when clicked on to check the article.
・Fixed an issue where the sequential numbering of the table of contents does not scroll correctly when using numbers.

= 1.1.97 =
＜Corrected item＞
・Added "rtoc-" to the name used in counter to prevent duplication when counter-increment is used in other themes and plugins.
・Fixed a problem where the sequential numbering was broken if H2 was numbered "1." and H3 was numbered "01 |".
・In RTOC Settings > Shortcodes > Table of Contents shortcode, change heading="h3" to heading="".
・Fixed earlyacccess of Noto Sans JP to the official version.
・Fixed the paragraph structure of the output table of contents.
・Make it possible to handle Japanese characters in the id name.

= 1.1.98 =
＜Corrected item＞
・Added placeholder to the exclude ID setting in the application settings.
・Fixed a problem where the table of contents would also reflect headings that were bold or italicized, or contained other elements such as img tags in the headings.
・Fixed an issue where the Gutenberg Widget in WordPress 5.8 would throw an error.
・Fixed an issue where a popup would appear when using JIN, even if a color other than JIN color was set.

= 1.2.1 =
＜New Features＞
・Added a function to measure the usage rate of the table of contents for 7 days. Only articles with a table of contents are supported, and you can check the value on the article edit screen. (This figure is calculated by our own method.)
・Adjustment of existing designs
・Refactoring the code

= 1.2.2 =
＜Corrected item＞
・Fixed Syntax Error in PHP 7.2 and below that was found in Ver1.2.1.


== Frequently Asked Questions ==
