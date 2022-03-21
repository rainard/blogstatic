<?php
/*
Plugin Name: What Time Is It
Plugin URI: https://wordpress.org/plugins/what-time-is-it/
Description: Create a beautiful Wordpress Widget to show your custom date and time.
Version: 1.3
Author: Tam Nguyen
Author URI: https://goo.gl/dsJ9kJ
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!class_exists('What_Time_Is_It')) {
    class What_Time_Is_It extends WP_Widget {

        /**
         * Widget construction
         */
        function __construct() {
            
            /* Widget registration */
            parent::__construct(
                'what_time_is_it',
                __('What Time Is It', 'wtii'),
                array('description' => __('Display date and time widget.', 'wtii'))
            );
        }

        /**
         * Get timezone offset by string
         * @param string $timezone Ex: America/New_York
         * @return int $offset Timezone offset
         */
        private function wtii_timezone_offset($timezone) {
            $date_timezone = new DateTimeZone($timezone);
            $date_time     = new DateTime("now");
            $offset        = timezone_offset_get($date_timezone, $date_time) / 3600;

            return $offset;
        }

        /** 
         * The analog clock
         * @param int $timezone_offset The timezone offset
         * @param int $widget_id The id to avoid duplicated scripts
         * @return string $html The clock's HTML
         */
        private function wtii_analog_clock($instance, $timezone_offset, $widget_id) {
            $color_clock       = $instance['wtii-clockcolor']!='' ? $instance['wtii-clockcolor'] : '#222';
            $color_background  = $instance['wtii-backgroundcolor']!='' ? $instance['wtii-backgroundcolor'] : 'transparent';
            $style_clockcolor  = 'style="background: ' . $color_clock . ';"';
            $style_clockcircle = 'style="background: ' . $color_background . '; border-color: ' . $color_clock . ';"';
            ?>
            <!-- This is from Idiot Inside's analog clock library -->
            <style>
                .wtii-clock-container.<?php echo $widget_id ?> .wtii-clock-face:after{
                    background: <?php echo $color_clock; ?>;
                }
            </style>
            <div class="wtii-clock-container <?php echo $widget_id; ?>">
                <div class="wtii-clock-circle" <?php echo $style_clockcircle ?>>
                    <div class="wtii-clock-face">
                        <div id="hour-<?php echo $widget_id; ?>" class="wtii-clock-hour" <?php echo $style_clockcolor ?>></div>
                        <div id="minute-<?php echo $widget_id; ?>" class="wtii-clock-minute" <?php echo $style_clockcolor ?>></div>
                        <div id="second-<?php echo $widget_id; ?>" class="wtii-clock-second" <?php echo $style_clockcolor ?>></div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                /* These lines are from KingKode JSClockGMT Library */
                function wtii_<?php echo str_replace('-', '_', $widget_id); ?>() {
                    var offset = <?php echo $timezone_offset; ?>;
                    offset = wtii_widget_offset_process(offset);

                    /* These lines are from both IdiotInside and KingKode */
                    function analogClock(offset) {}
                    analogClock.prototype.run = function() {
                        var d      = new Date;
                        var utc    = d.getTime() + (d.getTimezoneOffset() * 60000);
                        var date   = new Date(utc + (3600000 * offset));
                        var second = date.getSeconds()* 6;
                        var minute = date.getMinutes()* 6 + second / 60;
                        var hour   = ((date.getHours() % 12) / 12) * 360 + 90 + minute / 12;
                        jQuery('#hour-<?php echo $widget_id; ?>').css("transform", "rotate(" + hour + "deg)");
                        jQuery('#minute-<?php echo $widget_id; ?>').css("transform", "rotate(" + minute + "deg)");
                        jQuery('#second-<?php echo $widget_id; ?>').css("transform", "rotate(" + second + "deg)");
                    };
                    
                    /* Generate Clock */
                    jQuery(document).ready(function(){
                        var offset = 0;
                        var analogclock = new analogClock(offset);
                        analogclock.run(); 
                        window.setInterval(function(){ 
                            analogclock.run(); 
                        }, 1000);
                    });
                }
                wtii_<?php echo str_replace('-', '_', $widget_id); ?>();
            </script>
            <?php
        }

        /**
         * The digital clock
         * @param int $timezone_offset Timezone offset value
         * @param string $widget_id Widget ID
         * @return string $html Digital clock's HTML
         */
        private function wtii_digital_clock($instance, $timezone_offset, $widget_id) {
            $color_clock = $instance['wtii-clockcolor']!='' ? $instance['wtii-clockcolor'] : '#222';
            ?>
            <style>
                .wtii-clock-digital.<?php echo $widget_id; ?> ul li {
                    color: <?php echo $color_clock; ?>;
                }
            </style>
            <div class="wtii-clock-digital <?php echo $widget_id; ?>">
                <ul>
                    <li id="hour-<?php echo $widget_id; ?>" class="digiclock-hour"> </li>
                    <li>:</li>
                    <li id="min-<?php echo $widget_id; ?>" class="digiclock-min"> </li>
                    <li>:</li>
                    <li id="sec-<?php echo $widget_id; ?>" class="digiclock-sec"> </li>
                </ul>
            </div>
            <script>
                function wtii_<?php echo str_replace('-', '_', $widget_id); ?>() {
                    var offset = <?php echo $timezone_offset; ?>;
                    offset = wtii_widget_offset_process(offset);

                    /* These lines are from both IdiotInside and KingKode */
                    function analogClock(offset) {}
                    analogClock.prototype.run = function() {
                        var d      = new Date;
                        var utc    = d.getTime() + (d.getTimezoneOffset() * 60000);
                        var date   = new Date(utc + (3600000 * offset));
                        var second = date.getSeconds();
                        var minute = date.getMinutes();
                        var hour   = date.getHours();
                        jQuery("#sec-<?php echo $widget_id; ?>").html(( second < 10 ? "0" : "" ) + second);
                        jQuery("#min-<?php echo $widget_id; ?>").html(( minute < 10 ? "0" : "" ) + minute);
                        jQuery("#hour-<?php echo $widget_id; ?>").html(( hour < 10 ? "0" : "" ) + hour);
                    };
                    
                    /* Generate Clock */
                    jQuery(document).ready(function(){
                        var offset = 0;
                        var analogclock = new analogClock(offset);
                        analogclock.run(); 
                        window.setInterval(function(){ 
                            analogclock.run(); 
                        }, 1000);
                    });
                }
                wtii_<?php echo str_replace('-', '_', $widget_id); ?>();
            </script>
            <?php
        }

        /**
         * The widget
         * @param array $args Widget arguments
         * @param array $instance Widget instance
         */
        public function widget($args, $instance) {
            $color_clock = $instance['wtii-clockcolor']!='' ? $instance['wtii-clockcolor'] : '#222';
            /* Load before widget HTML */
            echo $args['before_widget'];
            /* Wdiget HTML */
            if ($instance['wtii-timezone']!='') {
                $timezone_offset = $this->wtii_timezone_offset($instance['wtii-timezone']);
            } else {
                $timezone_offset = get_option('gmt_offset');
            }

            if (!empty($instance['wtii-title'])) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['wtii-title'] ). $args['after_title'];
            }

            /* Display the clock */
            switch ($instance['wtii-template']) {
                case 'analog':
                    $this->wtii_analog_clock($instance, $timezone_offset, $this->id);
                    break;
                case 'digital':
                    $this->wtii_digital_clock($instance, $timezone_offset, $this->id);
                    break;
                default: 
                    $this->wtii_analog_clock($instance, $timezone_offset, $this->id);
                    break;
            }

            if ($instance['wtii-showdate'] == 'true') {
                echo '<p class="wtii-date">';
                if ($instance['wtii-timezone']!='') {
                    $timezone = new DateTimeZone($instance['wtii-timezone']);
                    $datetime = new DateTime('now', $timezone);
                    echo $datetime->format(get_option('date_format'));
                } else {
                    echo date(get_option('date_format'));
                }
                echo '</p>';
            }
            /* Load after widget HTML */
            echo $args['after_widget'];
        }

        /**
         * The form
         * @param array $instance Widget instance
         */
        public function form($instance) {
            /* Prepare instance */
            $wtii_title           = isset($instance['wtii-title']) ? $instance['wtii-title'] : 'What Time Is It?';
            $wtii_template        = isset($instance['wtii-template']) ? $instance['wtii-template'] : 'default';
            $wtii_showdate        = isset($instance['wtii-showdate']) ? $instance['wtii-showdate'] : 'true';
            $wtii_timezone        = isset($instance['wtii-timezone']) ? $instance['wtii-timezone'] : '';
            $wtii_clockcolor      = isset($instance['wtii-clockcolor']) ? $instance['wtii-clockcolor'] : '#000000';
            $wtii_backgroundcolor = isset($instance['wtii-backgroundcolor']) && !empty($instance['wtii-backgroundcolor']) ? $instance['wtii-backgroundcolor'] : '';
            ?>
            <!-- Title -->
            <p><label><?php _e('Title') ?>
            <input class="widefat" id="<?php echo $this->get_field_id( 'wtii-title' ); ?>" name="<?php echo $this->get_field_name( 'wtii-title' ); ?>" type="text" value="<?php echo esc_attr($wtii_title) ?>">
            </label></p>
            
            <!-- Template -->
            <p><label><?php _e('Template') ?>
            <select class="widefat"  name="<?php echo $this->get_field_name( 'wtii-template' ); ?>" id="<?php echo $this->get_field_id( 'wtii-template' ); ?>">
                <option value="analog" <?php echo $wtii_template=='analog' ? 'selected="selected"' : '' ?>>Analog</option>
                <option value="digital" <?php echo $wtii_template=='digital' ? 'selected="selected"' : '' ?>>Digital</option>
            </select>
            </label></p>
            
            <!-- Clock Color -->
            <p><label><?php _e('Clock Color') ?><br>
                <input id="<?php echo $this->get_field_id('wtii-clockcolor'); ?>" type="text" name="<?php echo $this->get_field_name('wtii-clockcolor'); ?>" value="<?php echo esc_attr($wtii_clockcolor); ?>" class="wtii-colorpicker"/>
            </label></p>
            
            <!-- Background Color -->
            <p><label><?php _e('Background Color (default is transparent)') ?><br>
                <input id="<?php echo $this->get_field_id('wtii-backgroundcolor'); ?>" type="text" name="<?php echo $this->get_field_name('wtii-backgroundcolor'); ?>" value="<?php echo esc_attr($wtii_backgroundcolor); ?>" class="wtii-colorpicker"/>
            </label></p>
            
            <!-- Show Date -->
            <p><label><?php _e('Show Date') ?>
            <select class="widefat"  name="<?php echo $this->get_field_name( 'wtii-showdate' ); ?>" id="<?php echo $this->get_field_id( 'wtii-showdate' ); ?>">
                <option value="true" <?php echo $wtii_showdate=='true' ? 'selected="selected"' : '' ?>>Yes</option>
                <option value="false" <?php echo $wtii_showdate=='false' ? 'selected="selected"' : '' ?>>No</option>
            </select>
            </label></p>
            
            <!-- Timezone -->
            <p><label><?php _e('Custom Timezone') ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'wtii-timezone' ); ?>" name="<?php echo $this->get_field_name( 'wtii-timezone' ); ?>" aria-describedby="timezone-description">
                <?php echo wp_timezone_choice($wtii_timezone); ?>
            </select>
            </label></p>

            <!-- Color Picker Script -->
            <script language="text/javascript">
                jQuery(document).ready(function($) { 
                    $('#<?php echo $this->get_field_id('wtii-clockcolor'); ?>, #<?php echo $this->get_field_id('wtii-backgroundcolor'); ?>').each(function() {
                        $(this).wpColorPicker();
                    });
                }); 
            </script>
            <?php
        }

        /**
         * The update process
         * @param array $new_instance The new options
         * @param array $old_instance The previous options
         */
        public function update($new_instance, $old_instance) {
            /* Instance processing */
            $instance = array();
            $instance['wtii-title']           = $new_instance['wtii-title'];
            $instance['wtii-template']        = $new_instance['wtii-template'];
            $instance['wtii-showdate']        = $new_instance['wtii-showdate'];
            $instance['wtii-timezone']        = $new_instance['wtii-timezone'];
            $instance['wtii-clockcolor']      = $new_instance['wtii-clockcolor'];
            $instance['wtii-backgroundcolor'] = $new_instance['wtii-backgroundcolor'];

            return $instance;
        }
    }
}

/**
 * Register new widget
 */
add_action('widgets_init', function(){
    register_widget('What_Time_Is_It');
});

/**
 * The scripts for admin page
 * @param string $hook Name of the hook
 */
 function wtii_admin_scripts($hook) {
    if ('widgets.php' != $hook) {
        return;
    }
    /* Enqueue scripts */
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('wtii-admin-script', plugin_dir_url(__FILE__) . 'js/wtii-admin-script.js');
}
add_action('admin_enqueue_scripts', 'wtii_admin_scripts');

/**
 * The scripts for frontend
 */
function wtii_scripts() {
    wp_enqueue_style('wtii-style', plugin_dir_url(__FILE__) . 'css/wtii-style.css');
    wp_enqueue_script('wtii-script', plugin_dir_url(__FILE__) . 'js/wtii-script.js');
}
add_action('wp_enqueue_scripts', 'wtii_scripts');
