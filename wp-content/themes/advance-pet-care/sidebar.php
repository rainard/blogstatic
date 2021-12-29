<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package advance-pet-care
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget p-2 mb-3">
            <h3 class="widget-title text-capitalize text-start p-2"><?php esc_html_e( 'Archives', 'advance-pet-care');?></h3>
            <ul class="m-0">
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget p-2 mb-3">
            <h3 class="widget-title text-capitalize text-start p-2"><?php esc_html_e( 'Meta', 'advance-pet-care' ); ?></h3>
            <ul class="m-0">
                <?php wp_register();?>
                <li><?php wp_loginout();?></li>
                <?php wp_meta();?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>