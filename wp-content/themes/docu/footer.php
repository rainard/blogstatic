		</div>
	</div><!-- end #main -->
	<div id="footer" class="footer">
		<div>
			<?php
			$theme_settings = docu_get_my_theme_options();
			
			echo $theme_settings['footer_copyright']; ?>
		</div>
	</div><!-- end #footer -->
<?php 
wp_footer();
?>
</body>
</html>