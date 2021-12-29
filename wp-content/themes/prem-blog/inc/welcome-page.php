<?php
/*******************************************************************************
 *  Adds theme page of ( About Theme )
 *******************************************************************************/

function prem_blog_admin_menu() {
   $menus = $GLOBALS[ 'menu' ];
   $priority = array_filter( $menus, function( $item ) {
      return 'themes.php' === $item[2];
   } );
   $priority = ! empty( $priority ) && 1 === count( $priority ) ? key( $priority ) - 1 : null;

   add_menu_page(
      __( 'Prem Blog', 'prem-blog' ),
      __( 'Prem Blog', 'prem-blog' ),

      'edit_theme_options',
      'theme-info.php',
      'prem_blog_about',
      'dashicons-admin-customizer',
      $priority
   );
}
add_action( 'admin_menu', 'prem_blog_admin_menu' );

function prem_blog_about() {

    $theme = wp_get_theme();
    $theme_name = esc_html( $theme->get( 'Name' ) );
    $theme_description = $theme->get( 'Description' );
    $theme_user = wp_get_current_user();
    $theme_slug = basename( get_stylesheet_directory() );
    $premium_url = "https://www.crafthemes.com/theme/prem-blog-pro/";
?>

<div class="container about-theme">
    <div class="row ct-screenshot">
      <div class="twelve columns clearfix">
          <div class="ct-welcome-area">
             <h1><?php printf( esc_html__( 'Welcome to Prem Blog', 'prem-blog' ) ); ?></h1>
              <p><?php echo esc_html( $theme_description ); ?></p>
          </div>
      </div><!-- /.apex-desh-hl -->
    </div><!-- /.row -->
</div>

<div class="container about-theme">
    <div class="row ct-screenshot">
      <div class="row">
        <div class="twelve columns about-title">
          <h1><?php printf( esc_html__( 'Import Pre Built Theme Demos!', 'prem-blog' ) ); ?></h1>
        </div>
      </div>

      <div class="row">
         <div class="four columns ct-img-col">
            <img class="ct-bordered" src="<?php echo esc_url( "https://dc.crafthemes.com/prem-blog/free/screenshot.jpg" ); ?>" alt="Demo Image">
            <div class="ct-theme-options">
              <p class="ct-demo-text"><?php esc_html_e( 'Default Demo', 'prem-blog' ); ?></p>
              <div class="ct-theme-actions">
                 <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.live/prem-blog/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'prem-blog' ); ?></a>
                 <a class="jquery-btn-get-started jquery-btn-import button button-primary" href="#" data-name="" data-slug=""><?php esc_html_e( 'Import Demo', 'prem-blog' ); ?></a>
              </div>
            </div>
         </div>
         <div class="four columns ct-img-col">
           <img class="ct-bordered" src="<?php echo esc_url( "https://dc.crafthemes.com/prem-blog/prem-blog-pro/screenshot.jpg" ); ?>" alt="Demo Image">
           <div class="ct-theme-options">
               <p class="ct-demo-text"><?php esc_html_e( 'Premium Demo', 'prem-blog' ); ?></p>
               <div class="ct-theme-actions">
                  <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.live/prem-blog-pro/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'prem-blog' ); ?></a>
                  <a class="button button-primary" href="<?php echo esc_url( $premium_url ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Buy Premium', 'prem-blog' ); ?></a>
               </div>
           </div>
         </div>
         <div class="four columns ct-img-col">
              <img class="ct-bordered" src="<?php echo esc_url( "https://dc.crafthemes.com/prem-blog/prem-blog-pro-two/screenshot.jpg" ); ?>" alt="Demo Image">
              <div class="ct-theme-options">
                 <p class="ct-demo-text"><?php esc_html_e( 'Slider Demo', 'prem-blog' ); ?></p>
                 <div class="ct-theme-actions">
                    <a class="button ct-btn-preview" href="<?php echo esc_url( "https://crafthemes-demo.live/prem-blog-pro-two/" ); ?>" target="_blank"><?php esc_html_e( 'Live Preview', 'prem-blog' ); ?></a>
                    <a class="button button-primary" href="<?php echo esc_url( $premium_url ); ?>" data-name="" data-slug=""><?php esc_html_e( 'Buy Premium', 'prem-blog' ); ?></a>
                 </div>
              </div>
         </div>
      </div>
    </div>
</div>


<div class="container about-theme">
   <div class="row ct-screenshot">
       <div class="twelve columns clearfix">
           <div class="ct-welcome-area about-title">
              <h1><?php printf( esc_html__( 'Comparison between Free and Pro Version', 'prem-blog' ) ); ?></h1>
                  <p><?php esc_html_e( 'All our themes are search engine optimized & have an unmatchable page speed.
              Amazing customer support is our number one priority.', 'prem-blog' ); ?></p>
              </div>
        </div><!-- /.apex-desh-hl -->

      <div class="twelve columns">
        <div class="eae-ct-container">
           <table class="comparison-table">
              <tbody>
                 <tr>
                    <th class="empty-cell comparison-table-tfeatures"></th>
                    <th class="comparison-table-free eae-center-td"><?php esc_html_e( 'FREE', 'prem-blog' ); ?></th>
                    <th class="comparison-table-pro eae-center-td"><?php esc_html_e( 'PREMIUM', 'prem-blog' ); ?></th>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Logo Upload', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Color Changes', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Footer Widgets', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Ads Integration', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Dark Mode', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Author Introduction Section', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Slider Section', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Customized Banner Section', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Newsletter Section', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Instagram Feed Section', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Typography', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Easy Google Fonts (650+)', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Social Share Buttons', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Sortable Option For Home Page Sections', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Remove Author info &amp; Post date', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Remove Footer Credits', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Footer Menu', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Post Sidebar Options', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-row ">
                    <td class="comparison-table-heading"><?php esc_html_e( 'Premium Support', 'prem-blog' ); ?></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-no-alt"></span></td>
                    <td class="eae-center-td"><span class="dashicons dashicons-yes"></span></td>
                 </tr>
                 <tr class="comparison-table-footer">
                    <td></td>
                    <td class="comparison-table-free"></td>
                    <td class="comparison-table-pro"> <a href="<?php echo esc_url( $premium_url ); ?>" class="eae-ct-buy-link"><?php esc_html_e( 'BUY NOW', 'prem-blog' ); ?></a></td>
                 </tr>
              </tbody>
           </table>
          </div>
        </div>
      </div>
      <div class="ct-screenshot">
        <div class="ct-welcome-upgrade-box">
          <h3><?php esc_html_e('Upgrade To Premium Version (14 Days Money Back Guarantee)','prem-blog')?></h3>
          <p><?php esc_html_e('With Prem Blog Pro theme you can create a beautiful website. Further if you want to unlock more possibilities then upgrade to the premium version, Try the Premium version and check if it fits your need or not. If not, we have 14 days money-back guarantee.','prem-blog'); ?></p>
          <a class="upgrade-button" href="https://www.crafthemes.com/theme/prem-blog/" target="_blank"><?php esc_html_e( 'Upgrade Now', 'prem-blog' ); ?></a>
        </div><!-- /.ct-welcome-upgrade-box -->
      </div><!-- /.ct-screenshot -->
</div><!-- /.container about-writer -->

<?php
}
