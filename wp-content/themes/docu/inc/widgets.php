<?php
/**
 * Extended_WP_Widget extends WP_Widget to add more functionality like form fields
 * 
 */
abstract class Extended_WP_Widget extends WP_Widget {
    
    public function __construct($css_id_base, $title, $widget_ops ) {
        parent::__construct($css_id_base, $title, $widget_ops );
    }
    
    /**
     * Displays the widget
     * 
     * $args[name]          string
     *      [id]            string
     *      [description]   string 
     *      [class]         string 
     *      [before_widget] string 
     *      [after_widget]  string 
     *      [before_title]  string
     *      [after_title]   string
     *      [widget_id]     string
     *
     *      
     * @param array $args (See above)
     * @param array $instance Contains the field key:value pairs from form if there is any
     *
     * @return void
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
        if ( !empty($instance['title']) ) {
            $title = apply_filters('widget_title', $instance['title']);
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        // Print out the widget contents here...
        
        echo $args['after_widget'];
    }
    
    /**
     * Function to validate new data from form
     * 
     * @param array $new_instance New values from form to be validated and saved
     * @param array $old_instance Old values from db
     * 
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
    
    /**
     * Displays the widget form shown in WP admin
     * 
     * @param array $instance Old values from db
     * 
     * @return void
     */
    public function form( $instance ) {

    }
    
    /**
     * Prints out a label element
     */
    protected function print_label($key, $label){
        ?><label for="<?php echo $this->get_field_id($key); ?>"><?php echo esc_attr( $label ); ?></label><?php
    }
    
    /**
     * Prints out a textbox element
     */
    protected function print_textbox($key, $instance){
        ?><input class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" type="text" value="<?php echo esc_attr($instance[$key]); ?>" /><?php
    }
    
    /**
     * Prints out a textarea element
     */
    protected function print_textarea($key, $instance){
        ?><textarea class="widefat" name="<?php echo $this->get_field_name($key); ?>" id="<?php echo $this->get_field_id($key); ?>"><?php echo esc_textarea($instance[$key]); ?></textarea><?php
    }
    
    /**
     * Prints out a select element
     */
    protected function print_select($key, $instance, $options){
        ?><select class="widefat" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>">
            <?php foreach($options as $option) : ?>
            <option value="<?php echo esc_attr($option['value']); ?>" <?php selected( $instance[$key], $option['value'] ); ?>><?php echo esc_attr($option['name']); ?></option>
            <?php endforeach; ?>
        </select><?php
    }
    
    /**
     * Prints out a radio element
     */
    protected function print_radio($key, $instance, $options){
        foreach($options as $i=>$option) :
        ?><label for="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>">
            <input type="radio" id="<?php echo $this->get_field_id($key); ?>-option-<?php echo $i; ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo esc_attr($option['value']); ?>" <?php checked( $instance[$key], $option['value'] ); ?> /> <?php echo esc_attr($option['name']); ?></label> <br><?php
        endforeach;
    }
    
    /**
     * Prints out a checkbox element
     *
     * @param string $key The unique key of the field
     * @param array $instance The array of data from db with defaults applied
     * @param string $value Optional value of the field. If blank, $value will be used.
     *
     * @return void
     */
    protected function print_checkbox($key, $instance, $value=''){
        $value = ($value!=='') ? $value : $key; // If param $value is blank, use $key
        ?><input type="checkbox" id="<?php echo $this->get_field_id($key); ?>" name="<?php echo $this->get_field_name($key); ?>" value="<?php echo esc_attr($value); ?>" <?php checked( $instance[$key], $value ); ?> /><?php
    }
}

/**
 * Modified WP_Widget_Pages widget
 *
 * Added expandable CSS class to <ul>
 */
class Docu_Widget_Pages extends Extended_WP_Widget {
    
    public function __construct() {
        $widget_ops = array(
            'css_id_base' => 'docu_pages', //Widget ID
            'css_class' => 'widget-docu-pages' , //CSS class
            'title' => __('Docu Pages', 'docu' ), //Widget name
            'description' => __('Extended Pages widget. Creates expandable child menus.', 'docu' ) //Widget description
        );
        parent::__construct($widget_ops['css_id_base'], $widget_ops['title'], array( 'classname' => $widget_ops['css_class'], 'description' => $widget_ops['description'] ) );
    }

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Docu Pages', 'docu' ) : $instance['title'], $instance, $this->id_base);
		$sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
		$exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];

		if ( $sortby == 'menu_order' )
			$sortby = 'menu_order, post_title';

		$out = wp_list_pages( apply_filters('widget_pages_args', array('title_li' => '', 'echo' => 0, 'sort_column' => $sortby, 'exclude' => $exclude) ) );

		if ( !empty( $out ) ) {
			echo $before_widget;
			if ( $title)
				echo $before_title . $title . $after_title;
		?>
		<ul class="expandable">
			<?php echo $out; ?>
		</ul>
		<?php
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID' ) ) ) {
			$instance['sortby'] = $new_instance['sortby'];
		} else {
			$instance['sortby'] = 'menu_order';
		}

		$instance['exclude'] = strip_tags( $new_instance['exclude'] );

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '', 'exclude' => '') );
		$title = esc_attr( $instance['title'] );
		$exclude = esc_attr( $instance['exclude'] );
	?>
        <p>
            <?php $this->print_label( 'title', __( 'Title', 'docu' ) ); ?>
            <?php $this->print_textbox( 'title', $instance ); ?>
        </p>

		<p>
			<label for="<?php echo $this->get_field_id('sortby'); ?>"><?php _e( 'Sort by:', 'docu' ); ?></label>
			<select name="<?php echo $this->get_field_name('sortby'); ?>" id="<?php echo $this->get_field_id('sortby'); ?>" class="widefat">
				<option value="post_title"<?php selected( $instance['sortby'], 'post_title' ); ?>><?php _e('Page title', 'docu'); ?></option>
				<option value="menu_order"<?php selected( $instance['sortby'], 'menu_order' ); ?>><?php _e('Page order', 'docu'); ?></option>
				<option value="ID"<?php selected( $instance['sortby'], 'ID' ); ?>><?php _e( 'Page ID', 'docu' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e( 'Exclude:', 'docu' ); ?></label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Page IDs, separated by commas.', 'docu' ); ?></small>
		</p>
<?php
	}

}

/**
 * Modified WP Search widget 
 */
class Docu_Widget_Search extends Extended_WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'css_id_base' => 'docu_search', //Widget ID
            'css_class' => 'widget-docu-search' , //CSS class
            'title' => __('Docu Search', 'docu' ), //Widget name
            'description' => __('Extended search form for your site.', 'docu' ) //Widget description
        );
        parent::__construct($widget_ops['css_id_base'], $widget_ops['title'], array( 'classname' => $widget_ops['css_class'], 'description' => $widget_ops['description'] ) );
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;

        // Use current theme search form if it exists
        get_search_form();

        echo $after_widget;
    }

    function form( $instance ) {
        $defaults = array(
            'title' => ''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );
?>
        <p>
            <?php $this->print_label('title', 'Title'); ?>
            <?php $this->print_textbox('title', $instance); ?>
        </p>
<?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

}

/**
 * Modified WP_Widget_Categories widget
 *
 * Added expandable CSS class to <ul>
 */
class Docu_Widget_Categories extends Extended_WP_Widget {
    
    public function __construct() {
        $widget_ops = array(
            'css_id_base' => 'docu_categories', //Widget ID
            'css_class' => 'widget-docu-categories' , //CSS class
            'title' => __('Docu Categories', 'docu' ), //Widget name
            'description' => __('Extended Categories widget. Creates expandable child menus.', 'docu' ) //Widget description
        );
        parent::__construct($widget_ops['css_id_base'], $widget_ops['title'], array( 'classname' => $widget_ops['css_class'], 'description' => $widget_ops['description'] ) );
    }
    
    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Docu Categories', 'docu' ) : $instance['title'], $instance, $this->id_base);
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;

        $cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h);

        if ( $d ) {
            $cat_args['show_option_none'] = __('Select Category', 'docu' );
            wp_dropdown_categories(apply_filters('widget_categories_dropdown_args', $cat_args));
?>

<script type='text/javascript'>
/* <![CDATA[ */
    var dropdown = document.getElementById("cat");
    function onCatChange() {
        if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
            location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
        }
    }
    dropdown.onchange = onCatChange;
/* ]]> */
</script>

<?php
        } else {
?>
        <ul class="expandable">
<?php
        $cat_args['title_li'] = '';
        wp_list_categories(apply_filters('widget_categories_args', $cat_args));
?>
        </ul>
<?php
        }

        echo $after_widget;
    }
    
    function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
		$instance['dropdown'] = !empty($new_instance['dropdown']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
		$dropdown = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'docu' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('dropdown'); ?>" name="<?php echo $this->get_field_name('dropdown'); ?>"<?php checked( $dropdown ); ?> />
		<label for="<?php echo $this->get_field_id('dropdown'); ?>"><?php _e( 'Display as dropdown', 'docu' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts', 'docu' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy', 'docu' ); ?></label></p>
<?php
	}
    
}

/* Register custom widgets */
add_action('widgets_init', 'docu_widgets_init');
function docu_widgets_init(){
	register_widget('Docu_Widget_Pages');
    register_widget('Docu_Widget_Search');
    register_widget('Docu_Widget_Categories');
    
}

/* This code filters the Categories archive widget to include the post count inside the link */
add_filter('wp_list_categories', 'docu_cat_count_span');
function docu_cat_count_span($links) {
    $links = str_replace('</a> (', ' <span class="count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter('get_archives_link', 'docu_archive_count_span');
function docu_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', ' <span class="count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}