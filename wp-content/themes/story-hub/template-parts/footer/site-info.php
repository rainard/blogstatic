<?php
/**
 * Displays footer site info
 *
 * @package story-hub
 * @version 0.0.1
 */

?>
<!-- Bottom Bar -->
<div class="tm-bottom-bar">
	<div class="container">
	  <div class="row">
		<div class="copyright col-md-8">

			<?php 
			  $copyright_text = log_book_get_option( 'copyright_text' ); 
			    
	        if ( ! empty( $copyright_text ) ) : ?>
	    
	           <?php echo wp_kses_data( $copyright_text ); ?>
	    
	        <?php endif; ?>

	        <a href="<?php echo esc_url( __( 'https://www.wordpress.org/', 'story-hub' ) ); ?>">  <?php printf( esc_html__( ' Proudly powered by %s ', 'story-hub' ), 'WordPress ' ); ?>
							    </a>
								<span class="sep"> <?php esc_html_e('|','story-hub') ?>  </span>

				<?php printf( esc_html__( ' Theme: %1$s by %2$s', 'story-hub' ), 'Story Hub', '<a href="https://www.thememiles.com/" target="_blank">ThemeMiles</a>' ); ?>

		</div>

		<div class="bottom-nav col-md-4">
			
            <div class="social-icons">
                
                <?php   do_action( 'log_book_top_header_social_icon' );?>
                
            </div>
		</div>
      </div>
	</div>
</div><!-- /Bottom Bar -->