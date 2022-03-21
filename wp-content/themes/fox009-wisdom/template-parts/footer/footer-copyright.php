<div class="copyright uppercase text-center">
	<h2><?php echo fox009_wisdom_theme_options('custom_copyright_text'); ?></h2>
	<p>
		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fox009-wisdom' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'fox009-wisdom' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'fox009-wisdom' ), 'Fox009 Wisdom', '<a href="http://www.fox009.cn">Fox009</a>' );
		?>
	</p>
</div>