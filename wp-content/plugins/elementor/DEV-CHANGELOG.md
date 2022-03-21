# Elementor Developer Edition - by Elementor.com

#### 3.6.0-dev44 - 2022-03-02
* Fix: Lower custom breakpoints didn't inherits upper breakpoints values in frontend [ED-6235] (#17475)
* New: Updated Elementor Icons library to v5.15.0 (#17632)
* Fix: Elementor React App - Back to Dashboard and Close (x) button can lead to wrong page [ED-6443] (#17752)

#### 3.6.0-dev43 - 2022-03-01
* Tweak: Added focus state and description on play icon in Video widget (#17559)
* Tweak: Added new variables colors to variables.scss file [OBXT-361] (#17560)
* Tweak: Added dynamic tag control to various core widgets and features [OBXT-384] (#17588)
* Tweak: Adjusted the inline icon control for design flexibility [OBXT-… (#17696)
* Tweak: Add Lazy load to all the widgets using Swiper [ED-2409] (#17734)
* Fix: Hash Commands [ED-6664] (#18018)
* Fix: Mobile browser background didn't work (#16566) [ED-6612] (#17972)
* New: Onboarding [ED-6175, PRDH-871] (#17605)

#### 3.6.0-dev42 - 2022-02-28
* Tweak: Added responsive capability to Icon Position control in Icon Box widget (#3040) [OBXT-573] (#17781)
* Tweak: Updated changelog for v3.5.6 (#18003)
* Tweak: One click site [ED-6569] (#17947)

#### 3.6.0-dev41 - 2022-02-24
* Fix: GitHub issue creation minor fixes [ED-6376] (#17918)
* Fix: GitHub issue creation minor fixes (#2) [ED-6376]
* Fix: GitHub issue creation minor fixes (#3) [ED-6376] (#17936)
* Tweak: Lightbox [ED-6517] (#17847)
* Tweak: Nested Infra - Allow dependencies for experiments [ED-6421] (#17663)

#### 3.6.0-dev40 - 2022-02-22
* Fix: Navigator keeps opening when dragging in a new widget [Dev edition] [ED-5776] (#17905)

#### 3.6.0-dev39 - 2022-02-17
* Fix: `remove_responsive_control()` doesn't remove controls for additional Custom breakpoints [ED-6294] (#17529)

#### 3.6.0-dev38 - 2022-02-14
* Tweak: Updated changelog for v3.5.5 (#17691)
* Fix: When the inline-font-icons experiment is active, the icon of the video lightbox is not getting the correct color (#17628)
* Fix: Video Widget - Privacy mode videos don't play in Lightbox since v3.5.5 [ED-6482] (#17747)
* Tweak: Admin Menu Handling Improvements (#17263)
* Fix: Favorites with WooCommerce widgets throws a critical error if it's is deactivated [ED-6442] (#17731)
* Fix: When the Additional Breakpoints experiment is active, the 'devices' parameter for `add_responsive_control()` isn't supported [ED-6478] (#17746)
* Fix: Global widgets search didn't work when core 3.5 is active [ED-5926] (#17331)
* Fix: tests (#17822)
* Tweak: Make typography weight strings translatable [ED-6392] (#17826)
* Tweak: Allowing to import and export plugins as part of the kit content [ED-4978] (#17830)
* Tweak: Remove legacy style tab and imporve CSS code [ED-6524] (#17833)
* Fix: Button trait alignment names are wrong [ED-6474] (#17736)
* Fix: Playwright for global widget search fails [ED-6523] (#17832)

#### 3.6.0-dev37 - 2022-02-03
* Fix: System info file displays inaccurate WP memory limit. [ED-5717] (#17252)

#### 3.6.0-dev36 - 2022-01-31
* Tweak: Added "Convert to Container" control to each legacy section, inner section and page [ED-5488] (#17515)

#### 3.6.0-dev35 - 2022-01-26
* Tweak: Test Responsive reverse columns control inoperative [ED-5931] (#17341)
* Tweak: Internal - Import Kit - Allow to override Kit import temp directory path [ED-5914] (#17381)

#### 3.6.0-dev34 - 2022-01-25
* Tweak: Handle deprecations [ED-5601]  (#17374)
* Tweak: Change Developer Edition promotional notice triggers [ED-5562] (#17528)

#### 3.6.0-dev33 - 2022-01-24
* Tweak: Updated changelog to v3.5.4 (#17546)
* Fix: When trying to import a kit, the general error try-again action is incorrect [ED-6273] (#17513)
* Tweak: Lightbox - only play a video if it has a registered provider [ED-6293] (#17527)

#### 3.6.0-dev32 - 2022-01-18
* Tweak: Updated Google Fonts list [ED-6245] (#17496)
* Tweak: Updated changelog for v3.5.4 (#17498)

#### 3.6.0-dev31 - 2022-01-17
* Fix: Debug Util - `onError` throws an error because of bad parameters [ED-6190] (#17435)
* Tweak: Update E-Icons library to v5.14.0 (#17378)
* Fix: Can't edit the page if Favorite Widgets are used in it (and experiment is enabled) [ED-6166] (#17426)

#### 3.6.0-dev30 - 2022-01-13
* Tweak: Added a deprecation notice for PHP 5.6 in WP dashboard [ED-5770] (#17273)
* Fix: Dynamic Tag switcher disappear in RTL (#17469)

#### 3.6.0-dev29 - 2022-01-12
* Fix: Can’t drag & drop elements inside a container  [ED-6077] (#17320)

#### 3.6.0-dev28 - 2022-01-10
* Fix: widescreen breakpoint  effects query media order (#17314)
* Tweak: Adding Responsive option to Text Stroke [ED-5846] (#17235)

#### 3.6.0-dev27 - 2022-01-07
* Fix: Core SVG icons from template library are imported empty [ED-5980] (#17373)
* Tweak: Adding Import Export to the Finder [ED-3997] (#17259)
* Tweak: Add border options in Image Box widget [ED-3927] (#17250)
* Tweak: Adding Kit Library to the Finder [ED-3726] (#17330)
* Tweak: "Library page" was replaced with "Page template" in Finder [ED-6138] (#17360)

#### 3.6.0-dev26 - 2022-01-06
* Fix: Internal - Swiper Util accepts only jQuery instances as the container parameter [ED-6050] (#17319)

#### 3.6.0-dev25 - 2022-01-03
* Fix: Image size with a link shrunk in Image widget [ED-3397] (#17245)

#### 3.6.0-dev22 - 2021-12-26
* Fix: Responsive reverse columns control inoperative []ED-5877 (#17246)
* Tweak: Remove `elementor-section-wrap` by adding it to the DOM experiment [ED-5865] (#17192)
* Fix: Favorites are not kept after page reload [ED-5903] (#17242)
* Tweak: Promoted some experiments status to Stable (#16986)
* Fix: Elements are pasted in reverse order when copying and pasting multi-selected elements [ED-5723] (#17231)
* Fix: Inner Section can’t be dragged into a column [ED-5910] (#17258)
* Tweak: Updated changelog v3.5.2 (#17281)
* Fix: Changelog links (#17285)

#### 3.6.0-dev21 - 2021-12-20
* Tweak: Delete deprecated 'Scheme' classes alias [ED-5894] (#17217)
* Fix: Revert task ED-1628 - document handle below the header with z-index above 99 (#17205)
* Revert "Tweak: Added Safe mode for Experiments [ED-741] (#16659)" (#17206)
* Tweak: Changelog for v3.5.1 (#17184)

#### 3.6.0-dev20 - 2021-12-17
* Tweak: New Admin Menu Rearrangement Experiment (#17208)
* Fix: Missing a wrapper when the Inner Section widget is in use (#17187) [ED-5875] (#17209)
* Fix: Missing escaping native WP translations (#17210)

#### 3.6.0-dev19 - 2021-12-16
* Fix: SVG and JSON files caused errors in Drag from Desktop [ED-5529] (#16966)

#### 3.6.0-dev18 - 2021-12-14
* Tweak: Navigator appears by default when loading the editor [ED-5742] (#17146)
* Fix: Elements are pasted in reverse order when copying and pasting multi-selected elements [ED-5723] (#17148)
* Revert "Fix: Elements are pasted in reverse order when copying and pasting multi-selected elements [ED-5723] (#17148)" (#17171)
* Fix: Elements are pasted in reverse order when copying and pasting multi-selected elements [ED-5723] (#17172)

#### 3.6.0-dev17 - 2021-12-13
* Tweak: Added `Difference`, `Exclusion` and `Hue` to Column and Section blend mode options [ED-5733] (#17079)
* New: Added a reusable button trait [ED-4597] (#17041) (#17092)
* Tweak: Favorites Widgets - Added an indication that a widget was added [ED-5500] (#17058)
* Tweak: Updated changelog release date (#17145)
* Fix: Several functions are being executed when not supposed to in all WP Dashboard screens [ED-5795] (#17163)
* Tweak: Added option to change the color of the navigation dots in carousel type widgets [ED-4970] (#16646)

#### 3.6.0-dev14 - 2021-12-01
* Fix: Dev Edition notice appears inside the Form Submission window [ED-4913] (#17067)

#### 3.6.0-dev11 - 2021-11-26
* Fix: Saving a template with a condition throws an error [ED-5661] (#17040)

#### 3.6.0-dev10 - 2021-11-24
* Fix: Templates Library is unreachable [ED-5613] (#17019)
* Fix: PayPal Button widget doesn't work with Core 3.5.0 beta3 [ED-5664] (#17022)

#### 3.6.0-dev9 - 2021-11-23
* Tweak: Contextual texts in the prompts - Document settings [ED-5324] (#16834)
* Tweak: Prompt the user permission to allow unfiltered file uploads in Import Template flow [ED-5279] (#16910)
* Fix: Broken button shortcodes and internal URLs (#16971) [ED-5566] (#17005)
* Fix: The data updater notice removed from update plugin page [ED-5381] (#17004)
* Fix: Choose control was in reversed order in RTL sites [ED-5461] (#16893)
* Fix: Scroll snap throw undefined error on Archive pages [ED-5544] (#17015)
* Fix: Z-index control override negative values (#17016)
* Fix: Text path widget is not optimized and makes redundant file system calls [ED-5420] (#16952)
* Fix: Conflict with JetEngine plugin in v3.5.0 [ED-5603] (#17021)

#### 3.6.0-dev8 - 2021-11-22
* Tweak: The maximum Offest values changes to 1000px in Advanced > Transform [ED-5600] (#17002)
* Fix: D&D issues with right and left positioned elements [ED-5494] (#16959)

#### 3.6.0-dev7 - 2021-11-19
* Fix: Default values in rotate 3D weren't apply in CSS Transfrom [ED-5568] (#16978)
* Tweak: Adjusting the widgets inline-CSS experiment to support custom-breakpoints [ED-5536] (#16922)

#### 3.6.0-dev6 - 2021-11-18
* Tweak: Removing redundant code that was needed in the past for the eicons and no longer needed due to the new inline-font experiment. (#16957)
* Fix: Widget > Advanced > Positioning Vertical align control isn't responsive [ED-5528] (#16927)

#### 3.6.0-dev5 - 2021-11-17
* Tweak: Updated changelog to v3.4.8 (#16951)
* Revert "Tweak: Added shortkey to panel tooltips [ED-4220] (#16478)" (#16889)
* Fix: Column padding affects absolute positioned elements [ED-5428] (#16930)
* Fix: Kit Library - Apply Kit throws an error with PHP 8 [ED-4974] (#16928)
* Fix: Text in beta users "Get beta updates" modal [ED-5446] (#16929)

#### 3.6.0-dev4 - 2021-11-16
* Fix: Sticky option throws an error and cause the editor not to work [ED-5539] (#16933)
* Fix: Font Awesome 4 support are wrong default value [ED-5404] (#16941)
* Fix: Font Awesome 4 support are wrong default value [ED-5404] (#16944)
* Fix: Some fields don't show placeholder values properly (closes #16608) [ED-4677] (#16948)

#### 3.6.0-dev3 - 2021-11-12
* Fix: Lightbox tweaks [ED-5532] (#16906)
* Fix: Empty state background is missing in Media controls [ED-5312] (#16768)

#### 3.6.0-dev2 - 2021-11-09
* Fix: Only one JSON browser-import is possible [ED-5443] (#16844)
* Fix: CSS Print method has wrong default value [ED-5883] (#16833)
* Fix: Font Awesome 4 support are wrong default value [ED-5404] (#16839)
* Fix: Additional Breakpoints - Conditional respon. controls disappear if exper. is active [ED-5362] (#16775)
* Fix: Template name changed if a dash mark was used in the import process [ED-4923] (#16788)
* Fix: The Top bar is disappearing from some pages [ED-5314] (#16835)
* Fix: data attributes are being printed to DOM when not needed in CSS Transform [ED-5419] (#16850)
* Fix: Activate and Deactivate all experiments buttons didn't work (#16802)
* Fix: Inner section cannot be added to the page [ED-5460] (#16863)
* Fix: 3.5.0 Core Beta - Skip SVG in Import Kit flow doesn't work properly [ED-5437] (#16837)
* Fix: CLI `library import` deletes the original imported file [ED-5203] (#16799)
* Fix: Drag from Desktop doesn’t work with SVG and JSON [ED-5454] (#16849)
* Fix: Nav menu not scrolling to the appropriate CSS ID if Scroll Snap is enabled [ED-5439] (#16808)
* Fix: Missing typography control in Text Path widget [ED-5455] (#16838)
* New: Added Container element [ED-2609] (#16105)

#### 3.6.0-dev1 - 2021-11-08
* Fix: Cannot open context menu in the 'Add New Section' area in the preview [ED-5453] (#16836)
* Fix: JSON browser-imports appear to be inserted at the top of the document [ED-5442] (#16845)
* Tweak: Statuses and experiments description changed in the new Experiments UI [ED-5316] (#16738)
* Fix: After downgrading from a version with Container - a PHP error is thrown [ED-5425] (#16842)

#### 3.5.0-dev51 - 2021-11-05
* Tweak: Delete deprecated 'Editor' class alias [ED-5429] (#16797)
* New: Drag files from desktop [ED-3817] (#16809)

#### 3.5.0-dev50 - 2021-11-04
* Fix: Can't upload JPG/JPEG files via Elementor Editor's WP media control (#16786) [ED-5406] (#16801)

#### 3.5.0-dev49 - 2021-11-03
* New: Added favorite widgets section to the editor panel [ED-1501] (#16630)
* Fix: Can't upload images via WP media library (#16786)

#### 3.5.0-dev48 - 2021-11-02
* Tweak: Adding new error handling scenarios to the import-export process [ED-4294] (#16720)
* Tweak: Renaming shared components names. (#16771)
* New: CLI - Added a command to import all templates in a directory [ED-5247] (#16666)

#### 3.5.0-dev47 - 2021-10-31
* Tweak: Updated changelog to v3.4.7 (#16762)
* Fix: UI Glitch in the new Experiments page [ED-5311] (#16763)

#### 3.5.0-dev46 - 2021-10-31
* Fix: Hamburger button didn't open on mobile in Nav menu widget [ED-5215] (#16686)
* Tweak: Added Safe mode for Experiments [ED-741] (#16659)
* Fix: Private Vimeo videos not loading in Video widget, Section Background Video, Media Carousel and Lightbox [ED-5128] (#16663)
* Tweak: Deprecate old const (#16687)
* Fix: Activate and Deactivate experiments buttons didn't work in Safari [ED-5115] (#16635)
* Tweak: Delete deprecated 'Core\Ajax' class alias [ED-5291] (#16697)
* Fix: Version control tab is visible to users without right capabilities [ED-5232] (#16699)
* Fix: Nav menu not scrolling to the appropriate CSS ID if Scroll Snap enabled [ED-5287] (#16711)
* Fix: Wrong HTML escaping in Pro features promotion (#16698)
* Fix: Custom width controls disappear in cascaded devices if Additional Breakpoints experiment is active [ED-5146] (#16633)
* Tweak: Internal - Moved Files Upload Handlers functionality to the Uploads Manager [ED-2585] (#16154)
* Tweak: The default values of Transition duration and Rotate 3d changed in CSS Transform [ED-5240] (#16696)

#### 3.5.0-dev45 - 2021-10-25
* Fix: PayPal button is unclickable [ED-5228] (#16656)
* Fix: Drag and Drop of multiple elements shouldn't be allowed in Navigator [ED-5266] (#16693)
* Fix: Right-click context-menu doesn't appear in favorite widgets [ED-5264] (#16692)
* Deprecated Utils::get_create_new_post_url  : Replaced by Plugin::$instance->documents->get_create_new_post_url (#15776)
* Tweak: Delete deprecated ajax method (#16688)

#### 3.5.0-dev44 - 2021-10-19
* Fix: Updated Admin Top Bar font for Non-English languages [ED-4903] (#16620)
* Tweak: Allow disabling Responsive Placeholder inheritance  [ED-5095] (#16513)

#### 3.5.0-dev43 - 2021-10-19
* Fix: SVG & Lottie files that don't already exist on a website, are not imported when included in templates (#15936)
* New: Added option to Multiselect page elements [ED-3682] (#16314)
* Tweak: Drag from desktop fixes [ED-5108] (#16537)
* New: Update E-Icons library to 5.13.0 [ED-5211] (#16619)
* Fix: Counter and Progress tracker didn't work with Scroll snap [ED-5210] (#16618)
* New: Added favorite widgets section to the editor panel [ED-1501] (#15068)
* Tweak: Updated changelog for v3.4.6 (#16621)

#### 3.5.0-dev42 - 2021-10-18
* Fix: Text Path custom SVG is not supported in some servers environment [ED-4557] (#16571)
* Tweak: In widget search, WP widgets are hidden [ED-4683] (#16422)

#### 3.5.0-dev41 - 2021-10-15
* Tweak: Adding styled-components infrastructure [ED-4561] (#16414)

#### 3.5.0-dev40 - 2021-10-14
* Tweak: Eicons to SVG [ED-2650] (#15897)
* Fix: Header Handle - handles don't show up [ED-1628] (#15700)
* Tweak: Removing a temporary BC support. (#16421)
* Tweak: Added a quick Apply Kit option using a popup modal in Kit Library [ED-4049] (#16492)
* Fix: Cleanup API info + `autoload=no` and  delete 'elementor_scheme_%'. [ED-3204] (#15755)

#### 3.5.0-dev39 - 2021-10-13
* Tweak: Updated changelog to v3.4.5 (#16553)
* Fix: Merge release/3.5.0 into feature/default-values (#16561)
* Tweak: Made placeholder values clearer in controls with CSS units [ED-4841] (#16488)
* Tweak: Hide the Archive Posts and Archive Title widgets from panel search results when not relevant [ED-4983] (#16486)
* Tweak: System Info - New experiments reporter [ED-1938] (#14800)
* Tweak: Added shortkey to panel tooltips [ED-4220] (#16478)
* Tweak: Default-Values - Loader on default values save [ED-4925] (#16212)

#### 3.5.0-dev38 - 2021-10-12
* Tweak: Updated featured video in readme.txt (#16552)

#### 3.5.0-dev37 - 2021-10-11
* Fix: Cannot open context menu in new section area [ED-5011] (#16361)
* Tweak: Changing the font-icon-svg experiment to be inactive for new sites. (#16535)
* New: CSS Transform [ED-4168] (#15800)

#### 3.5.0-dev36 - 2021-10-08
* Fix: Admin Top Bar experiment causes the WP "Add New Plugin" to disappear [ED-5090] (#16504)
* New: Drag image from desktop [ED-3817] (#15652)
* Fix: Section handler not reachable if Scroll snap is active [ED-4926] (#16508)
* Tweak: Updating the dialog library. (#16164)
* Tweak: Added reverse columns to Additional Custom Breakpoints Experiment (ED-4631) (#16098)

#### 3.5.0-dev35 - 2021-10-07
* Tweak: Height and width fields in Responsive bar cannot be edit in Desktop [ED-4529] (#16198)
* Fix: When adding margin to column of media-carousel widget it breaks the UI [ED-4915] (#16258)
* Tweak: Added an option for Storke in multiple widgets [ED-3914] (#16029)
* Tweak: Adjusting the widget promotional popup CTA text [ED-3971] (#16438)
* Tweak: New Experiments UI [ED-4179] (#16233)
* Tweak: Deprecate old properties [ED-4880] (#16158)
* Fix: Dividers not vertically centered in Icon List wisget [ED-5053] (#16440)

#### 3.5.0-dev34 - 2021-10-06
* Fix: Slides per view controls disappeared in multiple breakpoints in Testimonial Carousel [ED-5025] (#16388)

#### 3.5.0-dev33 - 2021-10-03
* Fix: Default value check for control validity [ED-5071] (#16437)

#### 3.5.0-dev31 - 2021-10-01
* Fix: When the "Optimized DOM" experiment is off and custom breakpoints are defined... [ED-4994] (#16385)

#### 3.5.0-dev30 - 2021-09-30
* Tweak: Apply filter for activate user in admin tool bar [ED-4309] (#15714)
* Fix: GitHub - Update servers to ubuntu 20.04 (#16413)
* Fix: GitHub - Update servers to ubuntu 20.04 (#16416)
* Fix: Admin top bar breaks admin dashboard [ED-5044] (#16424)

#### 3.5.0-dev28 - 2021-09-19
* Tweak: Adding a URL parameter to the import-export that skips the kit-content selection [ED-4750] (#16275)
* Tweak: Internal - Allow external extending of Element Editing Handles Buttons [ED-4480] (#16232)

#### 3.5.0-dev26 - 2021-09-15
* Tweak: Updated featured video in readme.txt (#16332)

#### 3.5.0-dev25 - 2021-09-14
* Fix: Elements panel UI glitch [ED-4959] (#16282)
* Fix: Offsets not working properly with an absolutely positioned widget and Improved DOM experiment [ED-4945] (#16253)

#### 3.5.0-dev24 - 2021-09-13
* Fix: If a responsive control is the first control in a popover, it breaks the popover for non-desktop devices   [ED-4979] (#16318)
* Fix: Large images are fully displayed before the swiper is initialized. (#16317)
* Tweak: Updated changelog for v3.4.4 (#16326)

#### 3.5.0-dev23 - 2021-09-13
* Fix: Element dragging after ctrl + click on Mac [ED-1827] (#15980)

#### 3.5.0-dev21 - 2021-09-10
* Tweak: CSS Transform - Change flip icon [ED-4462] (#16284)

#### 3.5.0-dev19 - 2021-09-06
* Fix: Editor doesn't load on v3.5.0 if `ELEMENTOR_DEBUG` is enabled [ED-4937] (#16256)

#### 3.5.0-dev18 - 2021-09-05
* Fix: Default global values override local global values [ED-4917] (#16206)

#### 3.5.0-dev16 - 2021-09-03
* JS API/Editor: Fix - Move 'Editor/Documents' to components folder. (#14602)
* Fix: Image content html tags appeared on Image carousel widget [ED-4828] (#16129)
* Tweak: Controls PHPCS (#16141)
* Tweak: Added "Justified" text alignment to columns & sections (#11512)
* Tweak: Add new "Word Spacing" control to typography controls [ED-4621] (#9152)
* Fix: PHP Lint failing during syntax lint (#16165)
* Tweak: Add step size to typography "Word Spacing" control [ED-4621] (#16167)
* Fix: Unable to import a kit via URL when not logged-in to WP [ED-4836] (#16157)
* Tweak: Show admin-top-bar only on elementor pages [ED-4879, ED-4899] (#16190)
* Tweak: Updated changelog for v3.4.3 (#16194)
* Tweak: Updated changelog for v3.4.3 (#16197)
* Fix: Page settings layout description [ED-1210] (#13360)
* Tweak: Add perspective to CSS transform [ED-4304] (#15774)
* Tweak: Changed default values experiment name [ED-4876] (#16155)
* Fix: Lighthouse CI test is failing - removed unused css [ED-3698] (#16200)
* Tweak: CSS Transform - Change flip icon [ED-4462] (#15933)
* Fix: Optimize Kit library index page performance [ED-4669] (#16201)
* Revert "Fix: Lighthouse CI test is failing - removed unused css [ED-3698] (#16200)" (#16207)
* Fix: Data Updater causes fatal error due to DB corruption [ED-4839] (#16195)
* Fix: SVG sanitizer is failing if there is a line break after "</svg" [ED-4853] (#16132)
* Tweak: Responsive bar - Make the minimum height smaller for all responsive devices (ED-4359) (#16017)
* Tweak: Internal - Add external filter for Context Menu Groups [ED-4483] (#16160)
* Tweak: Add CSS Transform section [ED-4767] (#16064)

#### 3.5.0-dev14 - 2021-08-26
* Fix: consistent hook names (#16099)
* New: Default values first iteration [ED-3683] (#15518)
* Fix: Landing page builder experiments causes page not found/ 404 errors with media files URLs (#15943) (ED-4806) (#16096)
* Fix: Animated elements disappear before entering the viewport (#2806) (ED-2513) (#16095)
* Tweak: Added Elementor price plan filter to Kit Library (closes #16075) [ED-4804] (#16102)
* Tweak: Entrance Animations - Once the element has been animated, unobserve it [ED-4845] (#16127)
* Tweak: Internal - Remove all usages of `Elementor\Utils::get_create_new_post_url()` (#16128)
* Fix: Controls in the Editor's JS system always have an empty string value as default, so they cannot be deleted (ED-4772) (#16042)
* Fix: Can't upload SVG files using Elementor (#16084, #16119, #16088) [ED-4813] (#16125)
* Fix: `wp_kses_post` strips `srcset` attribute from images (#16111) [ED-4840] (#16122)
* Fix: Inline CSS is parsed to an invalid charcaters. (#16143)
* Fix: When the inline-SVG experiment is active the list icons alignment can not be changed [ED-4758] (#16109)
* Fix: Autoplay not working for Vimeo videos in Lightbox (ED-4796) (#16068)
* Fix: Missing translations escaping in default values module (#16151)

#### 3.5.0-dev13 - 2021-08-23
* New: Docs - UI States [ED-4628] (#15961)
* Fix: Reflect inherited value in slider control [ED-4766] (#16040)
* Tweak: Library - On open, don't query all templates [ED-3149] (#15662)
* Fix: Custom Code Promotion [ED-508] (#15960)
* Tweak: Changed default cards view in Kit Library [ED-4484] (#15982)
* Tweak: Added the option to search by tag names in Kit Library [ED-4482] (#15959)
* Tweak: Changed Kit Library tab name [ED-3727] (#15986)
* Fix: Finder incorrectly identifies pages created. [ED-3708] (#15352)
* Fix: Admin Top Bar conflicts with WP customizer [ED-4768] (#16101)

#### 3.5.0-dev11 - 2021-08-19
* Revert: Fix: Gradient control doesn't work on frontend when using Global Colors (#16053)
* Fix: Background image controls missing when using dynamic image (Closes #16050) [ED-4785] (#16062)
* Fix: Motion effects popover is not visible since v3.4.1 (#16044) [ED-4788] (#16061)
* Fix: Responsive Site settings are not being applied on frontend when Additional Custom Breakpoints is active (ED-4787) (#16060)
* Tweak: Updated Changelog to v3.4.2 (#16066)

#### 3.5.0-dev10 - 2021-08-18
* Fix: Internal - `{device}_default` control properties are not deleted for responsive controls (ED-4741) (#16004)
* Fix: Gradient control doesn't work on frontend when using Global Colors (ED-3517) (#16002)
* Tweak: Added source=generic parameter when connecting through the top bar [ED-4459] (#15998)
* Fix: Control conditions are not being executed when has dash or underscore in the control slug (ED-4747) (#16014)
* Tweak - Adding SVG support to the global video play-icon. (#16031)
* Fix: Placeholder values of column width shouldn't cascade to mobile [ED-4664] (#16038)
* Tweak: Updated changelog for v3.4.1 (#16039)
* Fix: Source param at get_client_id request [ED-4459] (#16041)
