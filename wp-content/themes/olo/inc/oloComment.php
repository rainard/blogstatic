<?php
//comment
if ( ! function_exists( 'olo_comment' ) ) :
function olo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $commentcount;
	if(!$commentcount) { 
		$page = ( get_query_var('cpage') ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );
		$cpp=get_option('comments_per_page');
		$commentcount = $cpp * ($page - 1);
	}
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<span class="floor">
			<?php if (!empty(get_option('thread_comments'))) { ?>
				<?php if(!$parent_id = $comment->comment_parent) {printf('#%s', ++$commentcount);} ?>
			<?php }else{ ?>
				<?php printf('#%s', ++$commentcount); ?>
			<?php } ?>
		</span>
		<div id="comment-<?php comment_ID(); ?>" class="comment">
		<div class="comment-author vcard">
			<?php
			$default= ''; echo get_avatar( $comment, 64, $default, $comment->comment_author );
			?>
			<div class="comment_meta">
				<h4><?php printf( '<cite class="fn"> %s </cite>', get_comment_author_link() ); ?></h4>
				<a class="comment_time" href="#comment-<?php comment_ID() ?>" title="<?php printf( '%s', comment_date('Y/m/d '),  comment_time()); ?>"><?php printf(__('%s','olo'), timeago($comment->comment_date_gmt)); ?></a>
				<?php if(function_exists('wpua_custom_output')) {wpua_custom_output();} //UA ICON ?>
			<span class="reply">
				<?php if ($depth == get_option('thread_comments_depth')) : ?>
					 <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php echo $comment->comment_parent; ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' )" href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">-@</a>
				 <?php else: ?>
					 <a onclick="return addComment.moveForm( 'comment-<?php comment_ID() ?>','<?php comment_ID() ?>', 'respond','<?php echo $comment->comment_post_ID; ?>' ) " href="?replytocom=<?php comment_ID() ?>#respond" class="comment-reply-link" rel="nofollow">-@</a>
				 <?php endif; ?>
			</span><!-- .reply -->
			</div>
		</div><!-- .comment-author .vcard -->
			<div class="comment-body"><?php comment_text(); ?></div>


		</div><!-- #comment-##  -->

<?php }endif;
//pingback and trackback
function hjyl_pings($comment, $args, $depth) {
    if('pingback' == get_comment_type()) $pingtype = 'Pingback';
    else $pingtype = 'Trackback';
	$GLOBALS['comment'] = $comment;
?>
    <li id="comment-<?php echo $comment->comment_ID ?>">
        [<?php echo $pingtype; ?>] <?php comment_author_link(); ?>
		<span class="ping_time"><?php echo mysql2date('Y.m.d', $comment->comment_date); ?></span>
<?php }

// WordPress AJAX Comments
if(!function_exists('fa_ajax_comment_err')) :

    function fa_ajax_comment_err($a) {
        header('HTTP/1.0 500 Internal Server Error');
        header('Content-Type: text/plain;charset=UTF-8');
        echo $a;
        exit;
    }

endif;

if(!function_exists('fa_ajax_comment_callback')) :

    function fa_ajax_comment_callback(){
        $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
        if ( is_wp_error( $comment ) ) {
            $data = $comment->get_error_data();
            if ( ! empty( $data ) ) {
            	fa_ajax_comment_err($comment->get_error_message());
            } else {
                exit;
            }
        }
        $user = wp_get_current_user();
        do_action('set_comment_cookies', $comment, $user);
        $GLOBALS['comment'] = $comment; //Modify according to your comment structure. If you use the default topic, you don't need to modify
        ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>"  class="comment">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'olo' ); ?></em><br />
				<?php endif; ?>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment,$size='64',$comment->comment_author); ?>
				<div class="comment-meta">
					<h4><?php printf( __( '%s', 'olo'), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h4>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php printf( __( '%1$s at %2$s', 'olo' ), get_comment_date(),  get_comment_time() ); ?>"><?php printf(__('%s','olo'), timeago($comment->comment_date_gmt)); ?></a>
				</div>
				</div>
				<div class="comment-body"><?php comment_text(); ?></div>
			</div>
        </li>
        <?php die();
    }

endif;

add_action('wp_ajax_nopriv_ajax_comment', 'fa_ajax_comment_callback');
add_action('wp_ajax_ajax_comment', 'fa_ajax_comment_callback');
