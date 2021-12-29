				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
						<?php
						if ( is_sticky() ) {
						the_title( sprintf( '<h2 class="entry-title">%1$s <a href="%2$s" title="%3$s" rel="bookmark">', hjyl_get_svg( array( 'icon' => 'thumb-tack') ), esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}else{
						the_title( sprintf( '<h2 class="entry-title"><a href="%1$s" title="%2$s" rel="bookmark">', esc_url( get_permalink()), esc_html(get_the_title()) ), '</a></h2>' );
						}
						?>
						<div class="date">
							<span class="binds"></span>
							<span class="month"><?php the_time('Y/m'); ?></span>
							<span class="day"><?php the_time( 'd' ); ?></span>
							<span class="hour"><?php the_time( 'H:m' ); ?></span>
						</div>
						
					</header>
					
					<section class="oloEntry">
					<?php
						if(is_singular()){
							the_content();
							wp_link_pages( array( 'before' => '<nav class="page-link">'.hjyl_get_svg( array( 'icon' => 'bars') ).'<span>' . __( 'Pages:', 'olo' ) . '</span>', 'after' => '</nav>' ) );
						}else{
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'index' );
							}
						the_excerpt();
						}
					?>
					</section>
					
					<footer>
						<?php if(is_single()) {the_tags('<p class="tags">'.hjyl_get_svg( array( 'icon' => 'tags' ) ).'', ', ', '</p>'); } ?>
						<span class="author">
							<?php _e('Posted by', 'olo'); ?> <?php the_author_posts_link(); ?>
						</span>
						<?php if(!is_page()) {?> - 
						<span class="cat-links">
							<?php _e('Posted in', 'olo'); ?> <?php the_category(', '); ?>
						</span>
						<?php } if(is_page()){ ?>
						- <span class="last-updated">
							<?php if ((get_the_modified_time('Y')*365+get_the_modified_time('z')) > (get_the_time('Y')*365+get_the_time('z'))) : ?><?php _e('Last Updated', 'olo'); ?>: <?php the_modified_time('Y-m-j h:s'); ?><?php else : ?><?php echo null; ?><?php endif; ?>
						</span>
						<?php } if(!is_single()){ ?>
						- <span class="comments-views">
						<?php comments_popup_link( __( 'Leave a reply', 'olo' ), __( '<b>1</b> Reply', 'olo' ), __( '<b>%</b> Replies', 'olo' ) ); ?>
						</span>
						<?php } ?>
						<?php edit_post_link( __( 'Edit', 'olo' ), '<span class="edit-link">', '</span>' ); ?>
					</footer>
				</article><!-- #post-<?php the_ID(); ?> -->