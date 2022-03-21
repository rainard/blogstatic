<?php
/**
 * Dynamic css
 *
 * @since Log Book 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('log_book_dynamic_css')) :

    function log_book_dynamic_css()
    {
        

        /* Color Options Options */
        $log_book_primary_color      = esc_attr(log_book_get_option('log_book_primary_color'));
              
        $custom_css = '';

        //Primary  Background 
        if (!empty($log_book_primary_color)) {
            $custom_css .= "
              .btn-colored, .menu-bar .sub-menu li a:hover, .tagline, .post-tag, .owl-nav .owl-prev, .owl-nav .owl-next, .owl-carousel.style2 .share-post, .owl-carousel.style3 .owl-dots .owl-dot.active, .owl-carousel.style3 .owl-dots .owl-dot:hover, .menu-bar.style-3, .menu-bar.style-4 .sub-menu, .owl-carousel.style4 .slide-content .indata .p-link, .img-caption, .blog-detail .post-meta, .menu-bar.style-5 .sub-menu, .blog-inner-gallery .slide .overlay-data .icon-magnifying-glass, .blog-tags ul li a:hover, .tm-post-nav .arrow, .btn-dark:hover, .tm-pagination ul li.active a, .tm-pagination ul li:hover a, #backTop, .dl-menuwrapper button, .tm-modal .modal-heading,span.current,.submit, button, input[type='button'], input[type='submit'],:root .has-vivid-red-background-color
            
            { 
                background-color: ". $log_book_primary_color."; 
                
            }";

            

        }

         //Primary Color
        if (!empty($log_book_primary_color)) {
            $custom_css .= " 
             blockquote, a.btn-colored:focus
             { 
                border-color : ". $log_book_primary_color."; 
            }";
        }

        //Primary Color
        if (!empty($log_book_primary_color)) {
            $custom_css .= " 
             a:hover, .tm-topbar.white .social-icons ul li a:hover, .widget.twitter-feeds .feeds-list li a, .widget.twitter-feeds .feeds-list li p span, .tm-blog-list.full .con .share-post .icon-share, .widget.recent-comments .comment-posts .comment-content a:hover, .tm-author-detail .full-detail a,
              h1.site-title a,.single-post .blog-detail p a,.current-menu-item a,.page-inner-wrap .entry-content p a
             { 
                color : ". $log_book_primary_color."; 
            }";
        }

       

        //Header Overlay
        if (!empty($log_book_primary_color)) {
            $custom_css .= "
            .tm-breadcrumb:before{ 
                background-color : ". $log_book_primary_color."; 
                opacity: 0.8;

            }";
        }

      


        wp_add_inline_style('log-book', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'log_book_dynamic_css', 99);