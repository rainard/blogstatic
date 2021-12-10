<?php
/**
 * The template part for displaying post
 *
 * @package Moving Company Lite 
 * @subpackage moving-company-lite
 * @since moving-company-lite 1.0
 */
?>
<?php 
  $moving_company_lite_archive_year  = get_the_time('Y'); 
  $moving_company_lite_archive_month = get_the_time('m'); 
  $moving_company_lite_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box wow zoomInDown delay-1000" data-wow-duration="2s">
    <?php $moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_blog_layout_option','Default');
    if($moving_company_lite_theme_lay == 'Default'){ ?>
      <div class="row m-0">
        <?php if(has_post_thumbnail() && get_theme_mod( 'moving_company_lite_featured_image_hide_show',true) != '') {?>
          <div class="box-image col-lg-6 col-md-6">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <div class="new-text <?php if(has_post_thumbnail() && get_theme_mod( 'moving_company_lite_featured_image_hide_show',true) != '') { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
          <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
          <?php if( get_theme_mod( 'moving_company_lite_toggle_postdate',true) != '' || get_theme_mod( 'moving_company_lite_toggle_author',true) != '' || get_theme_mod( 'moving_company_lite_toggle_comments',true) != '' || get_theme_mod( 'moving_company_lite_toggle_time',true) != '') { ?>
            <div class="post-info">
              <?php if(get_theme_mod('moving_company_lite_toggle_postdate',true)==1){ ?>
                <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $moving_company_lite_archive_year, $moving_company_lite_archive_month, $moving_company_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
              <?php } ?>

              <?php if(get_theme_mod('moving_company_lite_toggle_author',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
              <?php } ?>

              <?php if(get_theme_mod('moving_company_lite_toggle_comments',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'moving-company-lite'), __('0 Comments', 'moving-company-lite'), __('% Comments', 'moving-company-lite') ); ?> </span>
              <?php } ?>

              <?php if(get_theme_mod('moving_company_lite_toggle_time',true)==1){ ?>
                <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
              <?php } ?>
              <hr>
            </div>
          <?php } ?>
          <div class="entry-content">
            <p>
              <?php $moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_excerpt_settings','Excerpt');
              if($moving_company_lite_theme_lay == 'Content'){ ?>
                <?php the_content(); ?>
              <?php }
              if($moving_company_lite_theme_lay == 'Excerpt'){ ?>
                <?php if(get_the_excerpt()) { ?>
                  <?php $excerpt = get_the_excerpt(); echo esc_html( moving_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('moving_company_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('moving_company_lite_excerpt_suffix',''));?>
                <?php }?>
              <?php }?>
            </p>
          </div>
          <?php if( get_theme_mod('moving_company_lite_button_text','READ MORE') != ''){ ?>
            <div class="more-btn">
              <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?></span></a>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php }else if($moving_company_lite_theme_lay == 'Center'){ ?>
      <div class="service-text">
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'moving_company_lite_featured_image_hide_show',true) != '') { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <?php if( get_theme_mod( 'moving_company_lite_toggle_postdate',true) != '' || get_theme_mod( 'moving_company_lite_toggle_author',true) != '' || get_theme_mod( 'moving_company_lite_toggle_comments',true) != '' || get_theme_mod( 'moving_company_lite_toggle_time',true) != '') { ?>
          <div class="post-info">
            <?php if(get_theme_mod('moving_company_lite_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $moving_company_lite_archive_year, $moving_company_lite_archive_month, $moving_company_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'moving-company-lite'), __('0 Comments', 'moving-company-lite'), __('% Comments', 'moving-company-lite') ); ?> </span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_excerpt_settings','Excerpt');
            if($moving_company_lite_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($moving_company_lite_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $excerpt = get_the_excerpt(); echo esc_html( moving_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('moving_company_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('moving_company_lite_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('moving_company_lite_button_text','READ MORE') != ''){ ?>
          <div class="more-btn">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php }else if($moving_company_lite_theme_lay == 'Left'){ ?>
      <div class="service-text">
        <?php if( get_theme_mod( 'moving_company_lite_featured_image_hide_show',true) != '') { ?>
          <div class="box-image">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
        <?php if( get_theme_mod( 'moving_company_lite_toggle_postdate',true) != '' || get_theme_mod( 'moving_company_lite_toggle_author',true) != '' || get_theme_mod( 'moving_company_lite_toggle_comments',true) != '' || get_theme_mod( 'moving_company_lite_toggle_time',true) != '') { ?>
          <div class="post-info">
            <?php if(get_theme_mod('moving_company_lite_toggle_postdate',true)==1){ ?>
              <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $moving_company_lite_archive_year, $moving_company_lite_archive_month, $moving_company_lite_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_author',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_comments',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'moving-company-lite'), __('0 Comments', 'moving-company-lite'), __('% Comments', 'moving-company-lite') ); ?> </span>
            <?php } ?>

            <?php if(get_theme_mod('moving_company_lite_toggle_time',true)==1){ ?>
              <span><?php echo esc_html(get_theme_mod('moving_company_lite_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
            <hr>
          </div>
        <?php } ?>
        <div class="entry-content">
          <p>
            <?php $moving_company_lite_theme_lay = get_theme_mod( 'moving_company_lite_excerpt_settings','Excerpt');
            if($moving_company_lite_theme_lay == 'Content'){ ?>
              <?php the_content(); ?>
            <?php }
            if($moving_company_lite_theme_lay == 'Excerpt'){ ?>
              <?php if(get_the_excerpt()) { ?>
                <?php $excerpt = get_the_excerpt(); echo esc_html( moving_company_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('moving_company_lite_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('moving_company_lite_excerpt_suffix',''));?>
              <?php }?>
            <?php }?>
          </p>
        </div>
        <?php if( get_theme_mod('moving_company_lite_button_text','READ MORE') != ''){ ?>
          <div class="more-btn">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('moving_company_lite_button_text',__('READ MORE','moving-company-lite')));?></span></a>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</article>