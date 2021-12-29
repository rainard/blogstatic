<?php 

	define('IsMobile', wp_is_mobile());
	define('TPLDIR', get_template_directory_uri());

add_action( 'after_setup_theme', 'olo_setup' );
function olo_setup(){
	// for /languages/
	load_theme_textdomain( 'olo', get_template_directory() . '/languages' );

	//set content width for video
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 600;

	//wp_title
	add_theme_support( 'title-tag' );
	add_filter( 'document_title_separator', 'hjyl_title_separator_to_line' );
	add_filter( 'document_title_parts', 'hjyl_document_title_parts' );
	
	//Add background for theme
	add_theme_support('custom-background');
	
	add_theme_support( "responsive-embeds" );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
	//post-thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size('index', 160, 90);
	
	//editor style
	add_editor_style('css/editor.css');
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	
	add_theme_support( 'align-wide' );
	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	//olo Title Tag
	add_theme_support( "title-tag" );
	
	// Enqueue style-file, if it exists.
	add_action('wp_enqueue_scripts', 'olo_script');
	
	//copyright below single
	add_filter('the_content', 'olo_copyright');
	
	// add @ for comment
	add_filter( 'comment_text' , 'hjyl_comment_add_at', 20, 2);
	
	// Add sidebar
	add_action( 'widgets_init', 'olo_widgets' );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		$args = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		);
	add_theme_support( "html5", $args );

	//Add support for core custom logo.
		$args = array(
			'height'			=> 100,
			'width'				=> 100,
			'flex-width'		=> true,
			'flex-height'		=> true,
			'header-text'		=> array( 'site-title', 'site-description' ),
		);
	add_theme_support( "custom-logo", $args );
	add_theme_support( "custom-header" );
	// Add menu
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'olo'),
		'mobile' => __( 'Mobile Navigation', 'olo'),
	) );
};

//change the_title "-" to "|"
function hjyl_title_separator_to_line(){
        return '|';
}
function hjyl_document_title_parts( $title ){
    if( is_home() && isset( $title['tagline'] ) ) unset( $title['tagline'] );
	//no title
	if(is_singular() && ""==get_the_title() ) { 
		$title['title'] = sprintf(__('Untitled #%s', 'olo'),get_the_date('Y-m-d'));
	};
    return $title;
}

//Custom wp_list_pages
function olo_wp_list_pages(){
	echo "<ul>";
	echo wp_list_pages('title_li=&depth=1');
	echo "</ul>";
}

// Enqueue style-file, if it exists.
function olo_script() {
	if( !IsMobile ){
		wp_enqueue_style( 'olo', get_stylesheet_uri(),  array(), '20210702', false);
	}else{
		wp_enqueue_style('mobile', TPLDIR . '/css/mobile.css', array(), '20210702', false);
	};
	wp_enqueue_style( 'Play', '//fonts.googleapis.com/css?family=Play', array(), '20210702', 'all');
	wp_enqueue_script( 'olo', TPLDIR . '/js/olo.js', array('jquery'), '20210702', true);
	if ( is_singular() && comments_open() ) {
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'ajax-comment', TPLDIR . '/js/comments-ajax.js', array('jquery'), '20210702', true);
	}
	wp_localize_script( 'ajax-comment', 'ajaxcomment', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'order' => get_option('comment_order'),
		'formpostion' => 'bottom',
		'txt1' => __('Wait a moment...', 'olo'),
		'txt2' => __('Good Comment', 'olo'),
	) );	
	if( is_page('archives') ){
		wp_enqueue_script( 'archives', TPLDIR . '/js/archives.js', array(), '20210702', false);
		wp_enqueue_style( 'archives', TPLDIR . '/css/archives.css', array(), '20210702', 'screen');
	};
	if(is_404()){
		wp_enqueue_style( '4041', 'http://fonts.googleapis.com/css?family=Press+Start+2P', array(), '20210702', 'screen');
		wp_enqueue_style( '4042', 'http://fonts.googleapis.com/css?family=Oxygen:700', array(), '20210702', 'screen');
		wp_enqueue_style( '4043', TPLDIR . '/css/404.css', array(), '20210702', 'screen');
	}
}

//copyright below single
function olo_copyright($content) {
  if (is_singular() || is_feed()) {
    $content .=
      '<div id="content-copyright"><span style="font-weight:bold;text-shadow:0 1px 0 #ddd;font-size: 13px;">'.
	  __('CopyRights: ','olo').
	  '</span><span style="font-size: 13px;">'.
	  __('The Post by ','olo').
	  '<a rel="nofollow" href="https://creativecommons.org/licenses/by-nc-sa/3.0/" title="'.
	  __('CC BY-NC-SA 3.0','olo').
	  '">BY-NC-SA</a> '.
	  __('For Authorization，Original If Not Noted，Reprint Please Indicate From ','olo').
	  '<a href="' .
      home_url() .
      '">' .
      get_bloginfo('name') .
      '</a><br>'.
	  __('Post Link: ','olo').
	  '<a rel="bookmark" title="' .
      get_the_title() .
      '" href="' .
      get_permalink() .
      '">' .
      get_the_title() .
      '</a></span></div>';
  }
	return $content;
}
// add @ for comment
function hjyl_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}
//time formats "xxxx ago"
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if ($etime < 1) return __('Just Now','olo');
    $interval = array(
        12 * 30 * 24 * 60 * 60 => __('years ago', 'olo'),
        30 * 24 * 60 * 60 => __('month ago', 'olo'),
        7 * 24 * 60 * 60 => __('weeks ago', 'olo'),
        24 * 60 * 60 => __('days ago', 'olo'),
        60 * 60 => __('hours ago', 'olo'),
        60 => __('minutes ago', 'olo'),
        1 => __('seconds ago', 'olo')
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    };
}

// Add sidebar
function olo_widgets(){
    register_sidebar(array(
		'name' =>''.__('Home', 'olo').'',
		'id' => 'home',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
		'name'=>''.__('Single', 'olo').'',
		'id' => 'single',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
	register_sidebar(array(
		'name'=>''.__('Other', 'olo').'',
		'id' => 'other',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2><span class="star">',
        'after_title' => '</span></h2>',
    ));
}

//move comment field to bottom
function move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom' );
//Load Custom parts
require( get_template_directory() . '/inc/theme_inc.php' );
require( get_template_directory() . '/inc/oloComment.php' );
require( get_template_directory() . '/inc/functions-svg.php');
 $olo_theme_options = get_option('olo_theme_options');
