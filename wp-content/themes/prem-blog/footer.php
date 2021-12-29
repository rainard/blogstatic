<?php if( is_active_sidebar( 'prem_blog-footer-left' ) ||
			is_active_sidebar( 'prem_blog-footer-middle' ) ||
			is_active_sidebar( 'prem_blog-footer-right' ) ) : ?>
		<div class="ct-bottom-sec">
			<footer class="prr-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
								<?php
									if( is_active_sidebar( 'prem_blog-footer-left' ) ) {
										dynamic_sidebar( 'prem_blog-footer-left' );
									}
								?>
						</div>
						<div class="col-md-4">
							<?php
								if( is_active_sidebar( 'prem_blog-footer-middle' ) ) {
									dynamic_sidebar( 'prem_blog-footer-middle' );
								}
							?>
						</div>
						<div class="col-md-4">
							<?php
								if( is_active_sidebar( 'prem_blog-footer-right' ) ) {
									dynamic_sidebar( 'prem_blog-footer-right' );
								}
							?>
						</div>
					</div>
				</div>
			</footer>
			<?php endif; ?>
			<div class="container">
				<div class="footer-site-info">
					<?php
						$prem_blog_footer_text = get_theme_mod( 'prem_blog_home_copyright_desc_free_setting', 'Copyright. All Rights Reserved.' );
						printf(  esc_html( '%1$s' ), $prem_blog_footer_text );
					?>
					<span class="footer-info-right">
					<?php echo esc_html__(' | Designed by', 'prem-blog') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/'); ?>"><?php echo esc_html__(' Crafthemes.com', 'prem-blog') ?></a>
					</span>
				</div><!-- /.footer-site-info -->
			</div>
		</div>
    <?php wp_footer(); ?>
  </body>
</html>
