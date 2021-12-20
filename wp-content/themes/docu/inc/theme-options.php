<?php
/*** Custom Theme Options - Change all instances of "mytheme" into the name of your theme and delete this comment. ***/

/**
* Class ThemeOptions
*/
class ThemeOptions{
	
	/**
	* Config settings change as needed
	*/
	private static $config = array(
		'option_group' => 'mytheme_option_group',
		'option_name' => 'mytheme_option_name',
		'page_title' => 'Theme Options',
		'menu_title' => 'Theme Options',
		'menu_slug' => 'theme_options'
	);
	
	/**
	* Initializes the plugin by setting localization, filters, and administration functions.
	*/
	public function __construct() {
		add_action( 'admin_init', array( $this, 'register_settings') );
		add_action( 'admin_menu', array( $this, 'theme_options_menu') );
	}
	
	/**
	* Prepare option data
	*/
	public function register_settings() {
		register_setting(
			self::get_config('option_group'),
			self::get_config('option_name'),
			array( $this, 'validate_options')
		);
	}
	
	/**
	* Add page and menu
	*/
	function theme_options_menu() {
		add_theme_page(
			self::get_config('page_title'),
			self::get_config('menu_title'),
			'edit_theme_options',
			self::get_config('menu_slug'),
			array( $this, 'theme_options_page')
		);
	}
	
	/**
	* Set defaults
	*/
	public static function get_default_theme_options() {
		$defaults = array(
			'footer_copyright' => '&copy; ' . date('Y') . ' '.get_bloginfo('name').'. All rights reserved.'
		);
	
		return $defaults;
	}
	
	/**
	* Settings page HTML
	*/
	function theme_options_page() {
	?>
	 
		<div class="wrap">
			<?php screen_icon(); ?>
			<h2><?php echo _( 'Theme Options'); ?></h2>
			<?php settings_errors(); ?>
	 
	 
			<form method="post" action="options.php">
		  
				<?php
				$settings = self::get_theme_options();
				settings_fields( self::get_config('option_group') );
				/* This function outputs some hidden fields required by the form,
				including a nonce, a unique number used to ensure the form has been submitted from the admin page
				and not somewhere else, very important for security */ ?>
				<h3>Footer Options</h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="footer_copyright">Copyright Text</label></th>
						<td>
							<textarea id="footer_copyright" name="<?php echo self::get_config('option_name'); ?>[footer_copyright]" class="widefat"><?php echo esc_textarea($settings['footer_copyright']); ?></textarea>
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		  
		</div>
		<?php
	}
	
	/**
	* Validate data from form
	*/
	function validate_options( $input ) {
		$defaults = self::get_default_theme_options();
	
		
		if(empty($input['footer_copyright'])){
			$input['footer_copyright'] = $defaults['footer_copyright'];
		} else {
			// We strip all tags from the text field, to avoid vulnerablilties like XSS
			$input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );
		}
	 
		return $input;
	}
	
	/**
	* Get config data
	*/
	public static function get_config($key) {
		return isset(self::$config[$key]) ? self::$config[$key] : false;
	}
	
	/**
	* Get options
	*/
	public static function get_theme_options() {
		return get_option( self::get_config('option_name'), self::get_default_theme_options() );
	}
	
	
}

/**
* Get My Theme Options
*
* Wrapper function for our class
*
* @return array Array of theme options data.
*/
function docu_get_my_theme_options(){
	return ThemeOptions::get_theme_options();
}

$my_theme_options = new ThemeOptions();