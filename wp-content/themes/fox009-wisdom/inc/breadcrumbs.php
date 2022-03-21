<?php
if( ! function_exists( 'fox009_wisdom_breadcrumb' ) ) {

	function fox009_wisdom_breadcrumb() {
		$enable_breadcrumbs = fox009_wisdom_theme_options('enable_breadcrumbs');
		if(!$enable_breadcrumbs){
			return;
		}
		$disable_home = fox009_wisdom_theme_options('disable_breadcrumbs_home');
		$disable_archive = fox009_wisdom_theme_options('disable_breadcrumbs_archive');
		$disable_search = fox009_wisdom_theme_options('disable_breadcrumbs_search');
		$disable_single = fox009_wisdom_theme_options('disable_breadcrumbs_single');
		$disable_page = fox009_wisdom_theme_options('disable_breadcrumbs_page');
		$disable_404 = fox009_wisdom_theme_options('disable_breadcrumbs_404');
		if((is_home() && $disable_home) ||
			(is_archive() && $disable_archive) ||
			(is_search() && $disable_search) ||
			(is_single() && $disable_single) ||
			(is_page() && $disable_page) ||
			(is_404() && $disable_404)){
			return;
		}
		
		$separator = fox009_wisdom_theme_options('breadcrumbs_separator');
		$home_text = __('Home', 'fox009-wisdom');
		$separator = ' <span class="separator">' . $separator . '</span> ';
		$before = '<span>';
		$after = '</span>';
		?>
		<nav class="breadcrumbs-nav">
			<ol>
				<li class="item home">
					<a href="<?php echo esc_url(home_url()); ?>">
						<span class="fa fa-home"></span>
						<?php echo $before . esc_html( $home_text ) . $after; ?>
					</a>
				</li>
				<?php
				if(is_search()){
				?>
					<li class="item search">
						<?php echo $separator . $before . __('Search Results for: ', 'fox009-wisdom') . 
							get_search_query() . $after; ?>
					</li>
				<?php
				}elseif(is_404()){
				?>
					<li class="item errer404">
						<?php echo $separator . $before . __('404', 'fox009-wisdom') . $after; ?>
					</li>
				<?php
				}elseif(is_tag()){
					$tag = get_tag(get_query_var('tag_id'));
					?>
					<li class="item tag">
						<?php echo $separator . $before . __('Tag: ', 'fox009-wisdom') . esc_html($tag->name) . $after; ?>
					</li>
				<?php
				}elseif(is_author()){
					$author_name = get_the_author_meta('display_name', get_query_var('author_id'));
					?>
					<li class="item tag">
						<?php echo $separator . $before . __('Author: ', 'fox009-wisdom') . esc_html($author_name) . $after; ?>
					</li>
				<?php
				}elseif(is_year()){
					$year = get_the_time('Y');
					?>
					<li class="item year">
						<?php echo $separator . $before . $year . $after; ?>
					</li>
				<?php
				}elseif(is_month()){
					$year = get_the_time('Y');
					$month = get_the_time('F');
					?>
					<li class="item year">
						<?php echo $separator; ?>
						<a href="<?php echo esc_url( get_year_link(year)); ?>">
							<?php echo $before . $year . $after; ?>
						</a>
					</li>
					<li class="item month">
						<?php echo $separator . $before . $month . $after; ?>
					</li>
				<?php
				}elseif(is_day()){
					$year = get_the_time('Y');
					$month = get_the_time('F');
					$day = get_the_time('j');
					?>
					<li class="item year">
						<?php echo $separator; ?>
						<a href="<?php echo esc_url( get_year_link($year)); ?>">
							<?php echo $before . $year . $after; ?>
						</a>
					</li>
					<li class="item month">
						<?php echo $separator; ?>
						<a href="<?php echo esc_url( get_month_link($year, $month)); ?>">
							<?php echo $before . $month . $after; ?>
						</a>
					</li>
					<li class="item day">
						<?php echo $separator . $before . $day . $after; ?>
					</li>
				<?php
				}elseif(is_page()){
				?>
					<li class="item page">
						<?php echo $separator . $before . get_the_title() . $after ?>
					</li>
				<?php
				}elseif(is_category()){
					$category = get_category( get_query_var( 'cat' ), false );
					if($category->parent != 0){
						$category_parent = get_category( $category->parent, false );
						fox009_wisdom_breadcrumb_category($category_parent, $before, $after, $separator);
					}
					?>
					<li class="item category">
						<?php echo $separator . $before . esc_html( $category->name ) . $after; ?>
					</li>
				<?php
				}elseif(is_single()){
					if(is_attachment()){
						$attachment_parent = get_post( $post->post_parent );
						$categories = get_the_category( $attachment_parent->ID ); 
						if(is_array($categories)){
							fox009_wisdom_breadcrumb_category($categories[0], $before, $after, $separator);
						}
						?>
						<li class="item post">
							<?php echo $separator; ?>
							<a href="<?php get_the_permalink($attachment_parent); ?>">
								<?php echo $before . get_the_title($attachment_parent) . $after ?>
							</a>
						</li>	
						<li class="item attachment">
							<?php echo $separator . $before . get_the_title() . $after ?>
						</li>
					<?php
					}else{
						$categories = get_the_category();
						if(is_array($categories)){
							fox009_wisdom_breadcrumb_category($categories[0], $before, $after, $separator);
						}
					?>
						<li class="item post">
							<?php echo $separator . $before . get_the_title() . $after ?>
						</li>
					<?php
					}
	
				}
				?>
			</ol>
		</nav>
	<?php
	}
}

if( ! function_exists( 'fox009_wisdom_breadcrumb_category' ) ) {

	function fox009_wisdom_breadcrumb_category($category, $before, $after, $separator) {
		if($category->parent){
			$parent_names = explode( ',', 
				get_category_parents( $category->parent, false, ',' ));
			foreach ( $parent_names as $parent_name ) {
				$parent = get_term_by( 'name', $parent_name, 'category' );
				if(is_object($parent)){
				?>
					<li class="item category">
						<?php echo $separator; ?>
						<a href="<?php echo get_term_link( $parent->term_id ); ?>">
							<?php echo $before . $parent->name . $after; ?>
						</a>
					</li>
				<?php
				}
			}
		}
		?>
		<li class="item category">
			<?php echo $separator; ?>
			<a href="<?php echo get_term_link( $category->term_id ); ?>">
				<?php echo $before . $category->name . $after; ?>
			</a>
		</li>
		<?php	
	}
}
?>