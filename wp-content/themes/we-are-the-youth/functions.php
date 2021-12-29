<?php 
add_action( 'wp_enqueue_scripts', 'we_are_the_youth_enqueue_styles' );
function we_are_the_youth_enqueue_styles() {
	wp_enqueue_style( 'we-are-the-youth-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

require_once( get_stylesheet_directory() . '/inc/custom-header.php' );

function we_are_the_youth_load_google_fonts() {
	wp_enqueue_style( 'writers-blogily-google-fonts', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap' ); 
}
add_action( 'wp_enqueue_scripts', 'we_are_the_youth_load_google_fonts' );




function we_are_the_youth_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_textcolor'  )->section   = 'customize_navigation';
	$wp_customize->get_section('title_tagline')->title = __( 'Navigation Settings', 'we-are-the-youth' );
	$wp_customize->get_section('background_image')->title = __( 'Design: Posts/Pages', 'we-are-the-youth' );
	$wp_customize->get_section( 'background_image' )->priority  = 20;
	/* Posts And Pages Settings */

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'       => __( 'Background Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'background_color',
		) ) );

	$wp_customize->add_setting( 'global_headline', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_headline', array(
		'label'       => __( 'Headline Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'global_headline',
		) ) );

	$wp_customize->add_setting( 'global_byline', array(
		'default'           => '#4b3ffa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_byline', array(
		'label'       => __( 'Byline Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'global_byline',
		) ) );

	$wp_customize->add_setting( 'global_content', array(
		'default'           => '#5d5d5d',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_content', array(
		'label'       => __( 'Content Text Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'global_content',
		) ) );

	$wp_customize->add_setting( 'global_link', array(
		'default'           => '#fab526',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_link', array(
		'label'       => __( 'Link Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'global_link',
		) ) );

	$wp_customize->add_setting( 'global_borders', array(
		'default'           => '#eee',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'global_borders', array(
		'label'       => __( 'Border Color', 'we-are-the-youth' ),
		'section'     => 'background_image',
		'priority'   => 1,
		'settings'    => 'global_borders',
		) ) );

/* Blog Feed Settings */
	$wp_customize->add_section( 'blog_settings', array(
		'title'      => __('Design: Post Feed','we-are-the-youth'),
		'description'      => __('This will also have effect on archive and search page.','we-are-the-youth'),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'blog_site_background', array(
		'default'           => '#eee',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_site_background', array(
		'label'       => __( 'Site Background Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_site_background',
		) ) );
	$wp_customize->add_setting( 'blog_post_background', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_background', array(
		'label'       => __( 'Post Background Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_background',
		) ) );
	$wp_customize->add_setting( 'blog_post_headline', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_headline', array(
		'label'       => __( 'Headline Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_headline',
		) ) );
	$wp_customize->add_setting( 'blog_post_byline', array(
		'default'           => '#fab526',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_byline', array(
		'label'       => __( 'Byline Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_byline',
		) ) );
	$wp_customize->add_setting( 'blog_post_excerpt', array(
		'default'           => '#6d6d6d',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_excerpt', array(
		'label'       => __( 'Excerpt Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_excerpt',
		) ) );
	$wp_customize->add_setting( 'blog_post_navigation_bg', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_navigation_bg', array(
		'label'       => __( 'Post Navigation Background Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_navigation_bg',
		) ) );
	$wp_customize->add_setting( 'blog_post_navigation_link', array(
		'default'           => '#4b3ffa',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'blog_post_navigation_link', array(
		'label'       => __( 'Post Navigation Text Color', 'we-are-the-youth' ),
		'section'     => 'blog_settings',
		'priority'   => 1,
		'settings'    => 'blog_post_navigation_link',
		) ) );
	function we_are_the_youth_sanitize_checkbox( $input ) {
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}


}
add_action( 'customize_register', 'we_are_the_youth_customize_register' );



if(! function_exists('we_are_the_youth_customize_register_output' ) ):
	function we_are_the_youth_customize_register_output(){
		?>

		<style type="text/css">
			/* Navigation */
			.main-navigation a, #site-navigation span.dashicons.dashicons-menu:before, .iot-menu-left-ul a { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?>; }
			.navigation-wrapper, .main-navigation ul ul, #iot-menu-left{ background: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			<?php if ( get_theme_mod( 'hide_navigation' ) == '1' ) : ?>
				.navigation-wrapper {display: none;}
			<?php endif; ?>
			<?php if ( get_theme_mod( 'display_navigation_tagline' ) == '1' ) : ?>
				.site-description {display:block;}
				.main-navigation a {line-height:63px;}
			<?php endif; ?>


			/* Global */
			.single .content-area a, .page .content-area a { color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
			.page .content-area a.button, .single .page .content-area a.button {color:#fff;}
			a.button,a.button:hover,a.button:active,a.button:focus, button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
			.tags-links a, .cat-links a{ border-color: <?php echo esc_attr(get_theme_mod( 'global_link')); ?>; }
			.single main article .entry-meta *, .single main article .entry-meta, .archive main article .entry-meta *, .comments-area .comment-metadata time{ color: <?php echo esc_attr(get_theme_mod( 'global_byline')); ?>; }
			.single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single .content-area th, .blog.related-posts main article h4 a, .single b.fn, .page b.fn, .error404 h1, .search-results h1.page-title, .search-no-results h1.page-title, .archive h1.page-title{ color: <?php echo esc_attr(get_theme_mod( 'global_headline')); ?>; }
			.comment-respond p.comment-notes, .comment-respond label, .page .site-content .entry-content cite, .comment-content *, .about-the-author, .page code, .page kbd, .page tt, .page var, .page .site-content .entry-content, .page .site-content .entry-content p, .page .site-content .entry-content li, .page .site-content .entry-content div, .comment-respond p.comment-notes, .comment-respond label, .single .site-content .entry-content cite, .comment-content *, .about-the-author, .single code, .single kbd, .single tt, .single var, .single .site-content .entry-content, .single .site-content .entry-content p, .single .site-content .entry-content li, .single .site-content .entry-content div, .error404 p, .search-no-results p { color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
			.page .entry-content blockquote, .single .entry-content blockquote, .comment-content blockquote { border-color: <?php echo esc_attr(get_theme_mod( 'global_content')); ?>; }
			.error-404 input.search-field, .about-the-author, .comments-title, .related-posts h3, .comment-reply-title{ border-color: <?php echo esc_attr(get_theme_mod( 'global_borders')); ?>; }

			<?php if ( get_theme_mod( 'fullwidth_pages' ) == '1' ) : ?>
				.page #primary.content-area { width: 100%; max-width: 100%;}
				.page aside#secondary { display: none; }
			<?php endif; ?>

			<?php if ( get_theme_mod( 'fullwidth_posts' ) == '1' ) : ?>
				.single div#primary.content-area { width: 100%; max-width: 100%; }
				.single aside#secondary { display: none; }
			<?php endif; ?>

			/* Blog Feed */
			body.custom-background.blog, body.blog, body.custom-background.archive, body.archive, body.custom-background.search-results, body.search-results{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_site_background')); ?>; }
			.blog main article, .search-results main article, .archive main article{ background-color: <?php echo esc_attr(get_theme_mod( 'blog_post_background')); ?>; }
			.blog main article h2 a, .search-results main article h2 a, .archive main article h2 a{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_headline')); ?>; }
			.blog main article .entry-meta, .archive main article .entry-meta, .search-results main article .entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_byline')); ?>; }
			.blog main article p, .search-results main article p, .archive main article p { color: <?php echo esc_attr(get_theme_mod( 'blog_post_excerpt')); ?>; }
			.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover { background: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_bg')); ?>; }
			.nav-links span, .nav-links a, .pagination .current, .nav-links span:hover, .nav-links a:hover, .pagination .current:hover{ color: <?php echo esc_attr(get_theme_mod( 'blog_post_navigation_link')); ?>; }

			<?php if ( get_theme_mod( 'blog_feed_fullwidth' ) == '1' ) : ?>
				.fp-blog-grid {
					width: 100% !important;
					max-width: 100% !important;
				}
				.blog #secondary,
				.archive #secondary,
				.search-results #secondary {
					display:none;
				}
				.blog main article, .search-results main article, .archive main article {
					flex: 0 0 32%;
					max-width: 32%;
				}
				.blog main, .search-results main, .archive main {
					display: flex;
					flex-wrap: wrap;
					justify-content: space-between;
				}
				@media screen and (max-width: 900px) {
					.blog main article, .search-results main article, .archive main article {
						flex: 0 0 48%;
						max-width: 48%;
					}
				}
				@media screen and (max-width: 700px) {
					.blog main article, .search-results main article, .archive main article {
						flex: 0 0 100%;
						max-width: 100%;
					}
					.blog main article, .search-results main article, .archive main article {
						display: inline-block;
						flex-wrap: none;
						float: left;
						width: 100%;
						justify-content: none;
					}
				}
			<?php endif; ?>



		</style>
	<?php }
	add_action( 'wp_head', 'we_are_the_youth_customize_register_output' );
endif;
