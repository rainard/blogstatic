	<aside id="oloWidget">
		<ul>
			<li class="twitter_rss">
			<?php 
				global $olo_theme_options;
				$twitter_name = 'Follow me on twitter!';
				$twitter_url = '';
				if ($olo_theme_options['twitter_url'] != '') $twitter_url = esc_url( $olo_theme_options['twitter_url'] );
				if ($olo_theme_options['twitter_name'] != '') esc_attr( $twitter_name = $olo_theme_options['twitter_name'] );
				
				$weibo_name = 'WeiBo';
				$weibo_url = '';
				if ($olo_theme_options['weibo_url'] != '') $weibo_url = esc_url( $olo_theme_options['weibo_url'] );
				if ($olo_theme_options['weibo_name'] != '') esc_attr( $weibo_name = $olo_theme_options['weibo_name'] );
				
				$email_name = 'Email to me!';
				$email_url = '';
				if ($olo_theme_options['email_url'] != '') $email_url = esc_url( $olo_theme_options['email_url'] );
				if ($olo_theme_options['email_name'] != '') esc_attr( $email_name = $olo_theme_options['email_name'] );
				
				$rss_name = 'Subscribe me!';
				$rss_url = '';
				if ($olo_theme_options['rss_url'] != '') $rss_url = esc_url( $olo_theme_options['rss_url'] );
				if ($olo_theme_options['rss_name'] != '') esc_attr( $rss_name = $olo_theme_options['rss_name'] );
				
				$qrcode_name = 'Add me on WeiXin!';
				$qrcode_url = '';
				if ($olo_theme_options['qrcode_url'] != '') $qrcode_url = esc_url( $olo_theme_options['qrcode_url'] );
				if ($olo_theme_options['qrcode_name'] != '') esc_attr( $qrcode_name = $olo_theme_options['qrcode_name'] );
			?>
				<?php if ($twitter_url != '') { ?>
					<a href="<?php echo $twitter_url; ?>" rel="bookmark" title="<?php echo $twitter_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'twitter') ); ?></span></a>
				<?php } ?>
				<?php if ($weibo_url != '') { ?>
					<a href="<?php echo $weibo_url; ?>" rel="bookmark" title="<?php echo $weibo_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'weibo') ); ?></span></a>
				<?php } ?>
				<?php if ($email_url != '') { ?>
					<a href="<?php echo $email_url; ?>" rel="bookmark" title="<?php echo $email_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'email') ); ?></span></a>
				<?php } ?>
				<?php if ($rss_url != '') { ?>
					<a href="<?php echo $rss_url; ?>" rel="bookmark" title="<?php echo $rss_name; ?>"><span><?php echo hjyl_get_svg( array( 'icon' => 'feed') ); ?></span></a>
				<?php } ?>
				<?php if ($qrcode_url != '') { ?>
				<span class="qrcode"><?php echo hjyl_get_svg( array( 'icon' => 'qrcode') ); ?></span>
				<img src="<?php echo $qrcode_url; ?>" width="258" height="258" alt="<?php echo $qrcode_name; ?>" class="qrcodeimg" />
				<?php } ?>
			</li>
			<?php if (is_home()) { ?>
				<?php if ( !dynamic_sidebar('home') ) : ?>
					<li id="archives" class="widget widget_archive">
						<h2><span><?php _e( 'Archives', 'olo' ); ?></span></h2>
						<ul>
							<?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true ) ); ?>
						</ul>
					</li>

					<li id="meta" class="widget">
						<h2><span><?php _e( 'Meta', 'olo' ); ?></span></h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
					</li>
				<?php endif; ?>
			<?php } elseif( is_single() ) { ?>
				<?php dynamic_sidebar( 'single' ); ?>
			<?php } else { ?>
				<?php dynamic_sidebar( 'other' ); ?>
			<?php } ?>
		</ul>
	</aside><!-- #oloWidget-->