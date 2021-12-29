<?php
/**
 * Template part for displaying posts
 * @package story-hub
 * @version 0.0.1
 */

 
$column = 'col-sm-12';
$readmore       = log_book_get_option( 'readmore_text' );
$excerpt_length = log_book_get_option( 'excerpt_length' );
$hide_category  = log_book_get_option( 'post_categories' );
$share_url      = urlencode( get_permalink( get_the_ID() ) );
$story_hub_title= strip_tags(get_the_title(get_the_ID()));
$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

?>
  
<article id="post-<?php the_ID(); ?>" <?php post_class( $column ); ?>>
    <!-- Blog Post -->
    
    <div class="blog-post">
    <?php if( has_post_thumbnail() ) { 
        $image_id = get_post_thumbnail_id();
        $image_url = wp_get_attachment_image_src($image_id,'full',true); 
        ?>
            <div class="col-sm-6 nopadding">
                <div class="post-thumbnail">
                 <a href="<?php the_permalink(); ?>">   <img src="<?php echo esc_url($image_url[0]); ?>" alt="" class="img-responsive" /></a>
                    <div class="share-post">
                        <span class="icon-share"></span>
                        <ul>
                            <li><a  target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url($share_url);?>"><span class="icon-facebook-logo"></span></a></li>
                            <li class="linkedin-icons"><a class="hint--top" data-hint="LinkedIn" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo esc_attr($story_hub_title);?>&amp;url=<?php echo esc_url($share_url);?>&amp;summary=<?php echo esc_attr($story_hub_title);?>"><i class="fa fa-linkedin"></i></a></li>
                            <li> <?php  echo ' <a href="http://pinterest.com/pin/create/button/?url=' . $share_url. '&media=' . $pinterestimage[0] . '&description=' . esc_attr($story_hub_title)?>'"  target="_blank" class="hint--top"> <span class="icon-pinterest"></span></a></li>
                            <li><a  target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo esc_attr($story_hub_title);?>&amp;url=<?php echo esc_url($share_url);?>&amp;"><span class="icon-twitter-logo-silhouette"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
    <?php } ?>    
        <div class="col-sm-6">
            <div class="post-content">
                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="post-description">
                   <?php  echo wp_kses_post( wp_trim_words(get_the_content(),20) );?>
                </p>
                <div class="blog-post-meta">
                    <ul>
                          <?php if ( 'post' === get_post_type() ): log_book_posted_on(); endif; 
                    
                    $the_cat = get_the_category();
                    if(!empty($the_cat))
                    {
                        $category_name = $the_cat[0]->cat_name;
                        $category_description = $the_cat[0]->category_description;
                        $category_link = get_category_link( $the_cat[0]->cat_ID );
                    }
                    if( $hide_category != 1)
                    {
                    ?>

                    <li <i class="fa fa-folder-o " aria-hidden="true" ></i><a href="<?php echo esc_url( $category_link); ?> "><?php
                 echo esc_html(" ".$category_name);?></a></li>

                 <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
   
    <!-- /Blog Post -->
    
</article><!-- #post-## -->
