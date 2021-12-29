<?php

require get_template_directory() . '/inc/widgets/widgets-base.php';

if (!class_exists('EnterMag_Posts_Carousel')) :
    /**
     * Adds EnterMag_Posts_Carousel widget.
     */
    class EnterMag_Posts_Carousel extends AFthemes_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {


            $this->text_fields = array('enternews-posts-slider-title', 'enternews-posts-slider-subtitle', 'enternews-posts-slider-number');
            $this->select_fields = array('enternews-select-category','enternews-select-background', 'enternews-select-background-type');

            $widget_ops = array(
                'classname' => 'enternews_posts_carousel_widget grid-layout aft-widget',
                'description' => __('Displays posts carousel from selected category.', 'entermag'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('enternews_posts_carousel', __('AFTN Posts Carousel', 'entermag'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::enternews_sanitize_data($instance, $instance);
            /** This filter is documented in wp-includes/default-widgets.php */

            $title = apply_filters('widget_title', $instance['enternews-posts-slider-title'], $instance, $this->id_base);
            if(isset($instance['enternews-select-background']) && !empty($instance['enternews-select-background'])){
                $background = $instance['enternews-select-background'];
            }else{
                $background = 'secondary-background';
            }

            if(isset($instance['enternews-select-background-type']) && !empty($instance['enternews-select-background-type'])){
                $background_type = $instance['enternews-select-background-type'];
            }else{
                $background_type = 'default';
            }

            $background .= ' ' . $background_type;
            $number_of_posts = isset($instance['enternews-posts-slider-number']) ? $instance['enternews-posts-slider-number'] : 5;
            $category = isset($instance['enternews-select-category']) ? $instance['enternews-select-category'] : '0';
    
            if ( !empty($background) ){
                $args['before_widget']= enternews_update_widget_before($args, $background,'aft-widget');
            }


            $color_class = 'category-color-1';
            if(absint($category) > 0){
                $color_id = "category_color_" . $category;
                // retrieve the existing value(s) for this meta field. This returns an array
                $term_meta = get_option($color_id);
                $color_class = ($term_meta) ? $term_meta['color_class_term_meta'] : 'category-color-1';
            }

            // open the widget container
            echo $args['before_widget'];
            ?>
            <?php if (!empty($title)): ?>
            <div class="em-title-subtitle-wrap">
                <?php if (!empty($title)): ?>
                    <h4 class="widget-title header-after1">
                        <span class="header-after <?php echo esc_attr($color_class); ?>">
                            <?php echo esc_html($title);  ?>
                        </span>
                    </h4>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            <?php
            $all_posts = enternews_get_posts($number_of_posts, $category);

            ?>
            <div class="widget-block widget-wrapper">
            <div class="posts-carousel af-post-carousel af-widget-carousel slick-wrapper">
                    <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();


                            global $post;
                            $url = enternews_get_freatured_image_url($post->ID, 'medium');
                            $thumbnail_size = 'medium';
                            ?>

                            <div class="slick-item">
                                <div class="read-single color-pad">
                                        <div class="read-img pos-rel read-bg-img">
                                            <?php if (!empty($url)): ?>
                                            <?php the_post_thumbnail($thumbnail_size); ?>
                                            <?php endif; ?>
                                            <div class="min-read-post-format">
                                                <?php echo enternews_post_format($post->ID); ?>
                                                <span class="min-read-item">
                                                <?php enternews_count_content_words($post->ID); ?>
                                            </span>
                                            </div>
                                            <a href="<?php the_permalink(); ?>"></a>
                                            <div class="read-categories af-category-inside-img">
                                                <?php enternews_post_categories(); ?>
                                            </div>
                                        </div>
                                        <div class="read-details color-tp-pad no-color-pad">

                                            <div class="read-title">
                                                <h4>
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </div>
                                            <div class="entry-meta">
                                                <?php enternews_post_item_meta(); ?>
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>

                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
            </div>
            </div>

            <?php
            //print_pre($all_posts);

            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $background = array(
                'default' => __('Default', 'entermag'),
                'dim' => __('Dim', 'entermag'),
            );

            $categories = enternews_get_terms();
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo parent::enternews_generate_text_input('enternews-posts-slider-title', 'Title', 'Posts Carousel');
                echo parent::enternews_generate_select_options('enternews-select-category', __('Select category', 'entermag'), $categories);
                echo parent::enternews_generate_text_input('enternews-posts-slider-number', __('Number of posts', 'entermag'), '5');
                echo parent::enternews_generate_select_options('enternews-select-background', __('Select Background', 'entermag'), $background, '', 'default');


            }
        }
    }
endif;