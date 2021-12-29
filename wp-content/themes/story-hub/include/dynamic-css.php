<?php
/**
 * Dynamic css
 *
 * @since Story Hub
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('story_hub_dynamic_css')) :

    function story_hub_dynamic_css()
    {
        

        /* Color Options Options */
        $story_hub_primary_color      = esc_attr(log_book_get_option('log_book_primary_color'));
              
        $custom_css = '';

        //Primary  Background 
        if (!empty($story_hub_primary_color)) {
            $custom_css .= "
              .btn-colored, .menu-bar .sub-menu li a:hover, .tagline, .post-tag, .owl-nav .owl-prev, .owl-nav .owl-next, .owl-carousel.style2 .share-post, .owl-carousel.style3 .owl-dots .owl-dot.active, .owl-carousel.style3 .owl-dots .owl-dot:hover, .menu-bar.style-3, .menu-bar.style-4 .sub-menu, .owl-carousel.style4 .slide-content .indata .p-link, .img-caption, .blog-detail .post-meta, .menu-bar.style-5 .sub-menu, .blog-inner-gallery .slide .overlay-data .icon-magnifying-glass, .blog-tags ul li a:hover, .tm-post-nav .arrow, .btn-dark:hover, .tm-pagination ul li.active a, .tm-pagination ul li:hover a, #backTop, .dl-menuwrapper button, .tm-modal .modal-heading,.nav-links span.current,.submit, button, input[type='button'], input[type='submit'],:root .has-vivid-red-background-color
            
            { 
                background-color: ". $story_hub_primary_color."; 
                
            }";

        }

         //Primary Color
        if (!empty($story_hub_primary_color)) {
            $custom_css .= " 
             blockquote, a.btn-colored:focus
             { 
                border-color : ". $story_hub_primary_color."; 
            }";
        }

        //Primary Color
        if (!empty($story_hub_primary_color)) {
            $custom_css .= " 
             a:hover, .tm-topbar.white .social-icons ul li a:hover, .widget.twitter-feeds .feeds-list li a, .widget.twitter-feeds .feeds-list li p span, .tm-blog-list.full .con .share-post .icon-share, .widget.recent-comments .comment-posts .comment-content a:hover, .tm-author-detail .full-detail a,
              h1.site-title a,.single-post .blog-detail p a,.current-menu-item a,.page-inner-wrap .entry-content p a, .entry-content h1 a, .entry-content h2 a,.entry-content h3 a, .entry-content h4 a, .entry-content h5 a, .entry-content ul a, .blog-detail .post-title ul a
             { 
                color : ". $story_hub_primary_color."; 
            }";
        }

       //Footer color
        if (!empty($story_hub_primary_color)) {
            $custom_css .= "
            .copyright a, .copyright a:hover{ 
               color : ". $story_hub_primary_color." !important;

            }";
        }
       

        //Header Overlay
        if (!empty($story_hub_primary_color)) {
            $custom_css .= "
            .tm-breadcrumb:before{ 
                background-color : ". $story_hub_primary_color."; 
                opacity: 0.6;

            }";
        }

      


        wp_add_inline_style('story-hub', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'story_hub_dynamic_css', 99);