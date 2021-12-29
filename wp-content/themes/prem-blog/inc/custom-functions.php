<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'prem_blog_fonts_url' ) ) :

function prem_blog_fonts_url() {
  $prem_blog_fonts_url  = '';
  $prem_blog_merri   = _x( 'on', 'Merriweather font: on or off', 'prem-blog' );
  $prem_blog_open = _x( 'on', 'Open Sans font: on or off', 'prem-blog' );

  if ( 'off' !== $prem_blog_merri || 'off' !== $prem_blog_open ) {
    $prem_blog_font_families = array();

    if ( 'off' !== $prem_blog_merri ) {
      $prem_blog_font_families[] = 'Merriweather:wght@300,400,700';
    }

    if ( 'off' !== $prem_blog_open ) {
      $prem_blog_font_families[] = 'Open Sans:wght@300;400;600;700';
    }
  }

  $prem_blog_query_args = array(
    'family' => urlencode( implode( '|', $prem_blog_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $prem_blog_fonts_url = add_query_arg( $prem_blog_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $prem_blog_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class prem_blog_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$prem_blog_output, $prem_blog_depth = 0, $prem_blog_args = array() ) {
        $prem_blog_indent = str_repeat( "\t", $prem_blog_depth );
        if( 'mobile_menu' == $prem_blog_args->theme_location ) {
            $prem_blog_output .='<a href="#" class="dropdown-toggle"><i class="icofont-caret-down"></i></a>';
        }
        $prem_blog_output .= "\n$prem_blog_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 * Estimated reading time
 ************************************************************************************************************************/

/* Word read count */
function prem_blog_post_read_time( $post_id ) {

      // get the post content
      $content = get_post_field( 'post_content', $post_id );

      // count the words
      $word_count = str_word_count( strip_tags( $content ) );

      // reading time itself
      $readingtime = ceil($word_count / 200);

      if ($readingtime == 1) {
       $timer = " Minute read";
      } else {
       $timer = " Minutes read"; // or your version :) I use the same wordings for 1 minute of reading or more
      }

      // I'm going to print 'X minute read' above my post
      $totalreadingtime = $readingtime . $timer;
      echo esc_html( $totalreadingtime, 'prem-blog' );

}

/****************************************************************************
 *  Custom Excerpt Length
 ****************************************************************************/

function prem_blog_excerpt( $limit ) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

/****************************************************************************
 *  Excerpt Dots change
 ****************************************************************************/
function prem_blog_excerpt_more( $more ) {
  return '...';
}

add_filter('excerpt_more', 'prem_blog_excerpt_more');


/****************************************************************************
 *  Tab filter Section
 ****************************************************************************/

function prem_blog_ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/assets/js/ajax-filter-post.js', false, null, false);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'prem_blog_ajax_filter_posts_scripts', 100);

// Script for getting posts
function prem_blog_ajax_filter_get_posts( $taxonomy ) {

  // Verify nonce
  $ct_nonce = sanitize_text_field( wp_unslash( $_POST['afp_nonce'] ) );
  if( !isset( $ct_nonce ) || !wp_verify_nonce( $ct_nonce, 'afp_nonce' ) )
    die('Permission denied');

  $ct_tax = sanitize_text_field( wp_unslash( $_POST['taxonomy'] ) );
  $taxonomy = ( $ct_tax ) ? $ct_tax : '' ;

  // WP Query
  $args = array(
    'category_name' => $taxonomy,
    'post_type' => 'post',
    'posts_per_page' => 1,
  );

  // If taxonomy is not set, remove key from array and get all posts
  // if( !$taxonomy ) {
  //   unset( $args['category'] );
  // }

  $query = new WP_Query( $args );

  $prem_list_args = array(
    'post_type'         =>  'post',
    'category_name' => $taxonomy,
    'posts_per_page'    =>  4,
    'offset'            =>  1,
  );
   // If taxonomy is not set, remove key from array and get all posts
  if( !$taxonomy ) {
    unset( $prem_list_args['category'] );
  }

  $prem_list_item  = new WP_Query( $prem_list_args );?>
        <?php if ( $query->have_posts() ): ?>
        <div class="ct-posts-list-container ct-posts-items">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="ct-post-item ct-featured-left">
                <div class="ct-big-thumb-left-box-inner" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat scroll center center / cover;">
                </div>
                <div class="ct-block-content">
                     <a href="<?php the_permalink(); ?>"><h1><span class="animated-underline"><?php the_title(); ?></span></h1></a>
                     <div class="ct-post-meta">
                          <div class="ct-block">
                                <span class="ct-icon icofont-user-alt-3"></span>
                                <span class="ct-meta ct-author"><?php the_author(); ?></span><!-- .ct-author -->
                          </div><!-- /.ct-block -->
                          <div class="ct-block">
                                <span class="ct-icon icofont-clock-time"></span>
                                <span class="ct-meta ct-times-read"><?php echo esc_html( get_the_date() ); ?></span>
                          </div><!-- .ct-block -->
                     </div><!-- .ct-post-meta -->
                </div>
            </div>
            <?php endwhile; ?>
            <?php else: ?>
            <div class="tagged-posts">
                <h2><?php esc_html_e( 'No posts found', 'prem-blog' ); ?></h2>
            </div>
            <?php endif; ?>
            <div class="tagged-posts">
              <?php if ( $prem_list_item->have_posts() ): ?>
              <?php while ( $prem_list_item->have_posts() ) : $prem_list_item->the_post(); ?>
              <div class="ct-post-list-items ">
                  <div class="ct-featured-right">
                      <div class="ct-post-item">
                          <a href="<?php the_permalink(); ?>" class="ct-post-thumb">
                              <?php the_post_thumbnail('prem-blog-250x220'); ?>
                          </a>
                      </div>
                      <div class="ct-post-details">
                          <a href="<?php the_permalink(); ?>"><h2><span class="animated-underline"><?php the_title(); ?><span></h2></a>
                      </div>
                  </div>
              </div>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
    </div>

  <?php

  die();
}

add_action('wp_ajax_filter_posts', 'prem_blog_ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'prem_blog_ajax_filter_get_posts');















